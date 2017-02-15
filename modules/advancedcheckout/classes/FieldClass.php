<?php
/**
* Module is prohibited to sales! Violation of this condition leads to the deprivation of the license!
*
* @category  Front Office Features
* @package   Advanced Checkout Module
* @author    Maxim Bespechalnih <2343319@gmail.com>
* @copyright 2013-2015 Max
* @license   license.txt in the module folder.
*/

class FieldClass extends ObjectModel
{
    public $id;
    public $name;
    public $description;
    public $tooltip;
    public $type = 'input';
    public $position = 1;
    public $required;
    public $is_custom = 0;
    public $active;
    public $validate;
    public $group;
    public static $definition = array(
        'table' => 'advcheckout',
        'primary' => 'id_field',
        'multilang' => true,
        'fields' => array(
            'name' => array('type' => self::TYPE_STRING,
                'validate' => 'isGenericName', 'required' => true, 'size' => 50),
            'type' => array('type' => self::TYPE_STRING, 'required' => true, 'size' => 20),
            'group' => array('type' => self::TYPE_STRING),
            'validate' => array('type' => self::TYPE_STRING, 'required' => true, 'size' => 50),
            'position' => array('type' => self::TYPE_INT, 'required' => true),
            'required' => array('type' => self::TYPE_BOOL, 'validate' => 'isBool', 'required' => true),
            'is_custom' => array('type' => self::TYPE_BOOL, 'validate' => 'isBool', 'required' => true),
            'active' => array('type' => self::TYPE_BOOL, 'validate' => 'isBool', 'required' => true),
            'description' => array('type' => self::TYPE_STRING, 'lang' => true,
                'validate' => 'isString', 'required' => true, 'size' => 255),
            'tooltip' => array('type' => self::TYPE_STRING, 'lang' => true,
                'validate' => 'isString', 'required' => true, 'size' => 255),
        )
    );


    public function updatePosition($way, $position, $id_field = null)
    {
        if (!$res = Db::getInstance()->executeS(
            'SELECT `position`, `id_field`
            FROM `'._DB_PREFIX_.'advcheckout`
            WHERE `id_field` = '.($id_field ? (int)$id_field : (int)$this->id).'
            ORDER BY `position` ASC'
        )) {
            return false;
        }

        foreach ($res as $field) {
            if ((int)$field['id_field'] == (int)$this->id) {
                $moved_field = $field;
            }
        }

        if (!isset($moved_field) || !isset($position)) {
            return false;
        }

        return (Db::getInstance()->execute('
            UPDATE `'._DB_PREFIX_.'advcheckout`
            SET `position` = `position` '.($way ? '- 1' : '+ 1').'
            WHERE `position`
            '.($way
                ? '> '.(int)$moved_field['position'].' AND `position` <= '.(int)$position
                : '< '.(int)$moved_field['position'].' AND `position` >= '.(int)$position))
        && Db::getInstance()->execute('
            UPDATE `'._DB_PREFIX_.'advcheckout`
            SET `position` = '.(int)$position.'
            WHERE `id_field`='.(int)$moved_field['id_field']));
    }

    public function update($null_values = false)
    {
        if (!parent::update($null_values)) {
            return false;
        }
        $fields = array();
        $this->getFieldsLang();
        $result = '';
        if (count($fields) && isset($fields)) {
            foreach ($fields as $field) {
                foreach (array_keys($field) as $key) {
                    if (!Validate::isTableOrIdentifier($key)) {
                        die(Tools::displayError());
                    }
                }

                $sql = 'SELECT `id_lang` FROM `'.pSQL(_DB_PREFIX_.$this->def['table']).'_lang`
                        WHERE `'.$this->def['primary'].'` = '.(int)$this->id.'
                            AND `id_lang` = '.(int)$field['id_lang'];
                $mode = Db::getInstance()->getRow($sql);
                $result &= (!$mode) ? Db::getInstance()->insert($this->def['table'].'_lang', $field) :
                Db::getInstance()->update(
                    $this->def['table'].'_lang',
                    $field,
                    '`'.$this->def['primary'].'` = '.(int)$this->id.' AND `id_lang` = '.(int)$field['id_lang']
                );
            }
        }

        return true;
    }

    public function add($autodate = true, $null_values = false)
    {
        if (!parent::add($autodate, $null_values)) {
            return false;
        }
        $fields = array();
        $this->getFieldsLang();
        $result = '';
        foreach ($fields as $field) {
            foreach (array_keys($field) as $key) {
                if (!Validate::isTableOrIdentifier($key)) {
                    die(Tools::displayError());
                }
            }

            $sql = 'SELECT `id_lang` FROM `'.pSQL(_DB_PREFIX_.$this->def['table']).'_lang`
                     WHERE `'.$this->def['primary'].'` = '.(int)$this->id.'
                         AND `id_lang` = '.(int)$field['id_lang'];
            $mode = Db::getInstance()->getRow($sql);
            $result &= (!$mode) ? Db::getInstance()->insert($this->def['table'].'_lang', $field) :
            Db::getInstance()->update(
                $this->def['table'].'_lang',
                $field,
                '`'.$this->def['primary'].'` = '.(int)$this->id.' AND `id_lang` = '.(int)$field['id_lang']
            );
        }
        return true;
    }

    public function toggleR()
    {
        if (!array_key_exists('required', $this)) {
            throw new PrestaShopException('property "active" is missing in object '.get_class($this));
        }

        $this->setFieldsToUpdate(array('required' => true));
        $this->required = !(int)$this->required;
        return $this->update(false);
    }
}
