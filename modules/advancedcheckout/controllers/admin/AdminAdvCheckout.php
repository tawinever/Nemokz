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

class AdminAdvCheckoutController extends ModuleAdminController
{
    public $is_new;

    protected function l($string, $class = null, $addslashes = false, $htmlentities = true)
    {
        if ($class === null) {
            $class = get_class($this);
        }
        return parent::l($string, $class, $addslashes, $htmlentities);
    }

    public function __construct()
    {
        $this->bootstrap = true;
        $this->context = Context::getContext();
        $this->table = 'advcheckout';
        $this->table_id = 'advcheckout_id';
        $this->identifier = 'id_field';
        $this->position_identifier = 'id_field';
        $this->position_group_identifier = 'position';
        $this->className = 'FieldClass';
        $this->_defaultOrderBy = 'position';
        $this->lang = true;
        $this->list_no_link = true;
        $this->toolbar_scroll = false;
        $this->addRowAction('edit');
        $this->addRowAction('delete');
        $this->bulk_actions = false;

        $this->fields_list = array(
            'id_field' => array(
                'title' => $this->l('#'),
                'width' => 10,
                'type' => 'text',
                'filter' => false,
                'search' => false
            ),
            'name' => array(
                'title' => $this->l('Name'),
                'width' => 150,
                'type' => 'text',
                'filter' => false,
                'search' => false
            ),
            'tooltip' => array(
                'title' => $this->l('Tip'),
                'width' => 200,
                'type' => 'text',
                'filter' => false,
                'search' => false
            ),
            'description' => array(
                'title' => $this->l('Display name'),
                'width' => 150,
                'type' => 'text',
                'filter_key' => 'a!ip',
                'filter' => false,
                'search' => false
            ),
            'required' => array(
                'title' => $this->l('Required?'),
                'active' => 'required',
                'filter_key' => 'a!required',
                'align' => 'text-center',
                'type' => 'bool',
                'class' => 'fixed-width-sm reqajax',
                'orderby' => false,
                'filter' => false,
                'search' => false,
                'ajax' => true
            ),
            'active' => array(
                'title' => $this->l('Status'),
                'active' => 'status',
                'align' => 'text-center',
                'type' => 'bool',
                'class' => 'fixed-width-sm activeajax',
                'orderby' => false,
                'filter' => false,
                'search' => false,
                'ajax' => true
            ),
            'position' => array(
                'title' => $this->l('Position'),
                'position' => 'position',
                'align' => 'center',
                'class' => 'fixed-width-xs',
                'filter' => false,
                'search' => false,
            ),
        );

        if (_PS_VERSION_ >= '1.6.0.0') {
            $this->is_new = true;
        } elseif (_PS_VERSION_ >= '1.5.0.0' && _PS_VERSION_ <= '1.6.0.0') {
            $this->is_new = false;
        }

        parent::__construct();
    }

    public function renderForm()
    {
        $this->initToolbar();
        $dis = false;
        $id = (int)Tools::getValue('id_field');
        if ($this->display == 'edit') {
            $res = Db::getInstance()->getRow('SELECT * FROM `'._DB_PREFIX_.'advcheckout` WHERE `id_field` = '.$id);
            $this->fields_value['position'] = $res['position'];
            $this->fields_value['group'] = $res['group'];
            $this->fields_value['is_custom'] = $res['is_custom'];
        } elseif ($this->display == 'add') {
            $res = Db::getInstance()->getRow('SELECT MAX(`position`) as `max` FROM `'._DB_PREFIX_.'advcheckout`');
            $this->fields_value['position'] = ($res['max'] + 1);
            $this->fields_value['group'] = 'custom';
            $this->fields_value['is_custom'] = 1;
        }

        if (_PS_VERSION_ >= '1.6.0.0') {
            $tp = 'switch';
        } elseif (_PS_VERSION_ >= '1.5.0.0' && _PS_VERSION_ <= '1.6.0.0') {
            $tp = 'radio';
        }

        if (isset($id) && $id >= 0 && $id <= 21 && Tools::isSubmit('updateadvcheckout')) {
            $dis = true;
        } elseif (Tools::isSubmit('addadvcheckout') || Tools::isSubmit('submitAddadvcheckout')) {
            $dis = false;
        }

        $ps_validate_type = array(
            array('id' => 'isAnything', 'name' => 'isAnything'),
            array('id' => 'isEmail', 'name' => 'isEmail'),
            array('id' => 'isUnsignedInt', 'name' => 'isUnsignedInt'),
            array('id' => 'isInt', 'name' => 'isInt'),
            array('id' => 'isFloat', 'name' => 'isFloat'),
            array('id' => 'isName', 'name' => 'isName'),
            array('id' => 'isMessage', 'name' => 'isMessage'),
            array('id' => 'isAddress', 'name' => 'isAddress'),
            array('id' => 'isPhoneNumber', 'name' => 'isPhoneNumber'),
            array('id' => 'isZipCodeFormat', 'name' => 'isZipCodeFormat'),
            array('id' => 'isDate', 'name' => 'isDate'),
            array('id' => 'isBool', 'name' => 'isBool'),
            array('id' => 'isUrl', 'name' => 'isUrl'),
            array('id' => 'isString', 'name' => 'isString')
        );

        $this->fields_form = array(
            'tinymce' => true,
            'legend' => array(
                'title' => $this->l('Add new field.'),
                'icon' => 'icon-info-sign'
            ),
            'submit' => array(
                'title' => $this->l('Save'),
            ));
        $arr = array('checkbox', 'select');
        if (in_array($res['type'], $arr)) {
            $this->fields_form['input'][] = array(
                'type' => 'hidden',
                'name' => 'type',
                'value' => $res['type']
            );
        } else {
            $this->fields_form['input'][] = array(
                    'type' => 'radio',
                    'label' => $this->l('Type:'),
                    'name' => 'type',
                    'required' => true,
                    'is_bool' => false,
                    'class' => 't',
                    'disabled' => $dis,
                    'values' => array(
                        array(
                            'id' => 'input',
                            'value' => 'input',
                            'label' => $this->l('Input')
                        ),
                        array(
                            'id' => 'textarea',
                            'value' => 'textarea',
                            'label' => $this->l('Textarea')
                        ),
                    ),
                );
        }
        $this->fields_form['input'][] =    array(
                'type' => 'text',
                'label' => $this->l('Name (Identificator):'),
                'name' => 'name',
                'required' => true,
                'class' => 't',
                'disabled' => $dis,
                'hint' => $this->l('Invalid characters (Only latin. character):').' <>;=#{}'
            );
        $this->fields_form['input'][] = array(
                'type' => 'hidden',
                'name' => 'group'
            );
        $this->fields_form['input'][] =    array(
                'type' => 'hidden',
                'name' => 'position'
            );
        $this->fields_form['input'][] =    array(
                'type' => 'hidden',
                'name' => 'is_custom'
            );
        $this->fields_form['input'][] =    array(
                'type' => 'text',
                'label' => $this->l('Display name:'),
                'name' => 'description',
                'class' => 't',
                'lang' => true,
                'required' => true,
            );
        $this->fields_form['input'][] =    array(
                'type' => 'text',
                'label' => $this->l('Tip:'),
                'name' => 'tooltip',
                'class' => 't',
                'lang' => true,
                'required' => true,
            );
        $this->fields_form['input'][] = array(
                    'type' => $tp,
                    'label' => $this->l('Display?'),
                    'name' => 'active',
                    'required' => true,
                    'class' => 't',
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'active_on',
                            'value' => 1,
                            'label' => $this->l('Enabled')
                        ),
                        array(
                            'id' => 'active_off',
                            'value' => 0,
                            'label' => $this->l('Disabled')
                        )
                    ),
                );

        $this->fields_form['input'][] = array(
                    'type' => $tp,
                    'label' => $this->l('Required?:'),
                    'name' => 'required',
                    'required' => true,
                    'class' => 't',
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'required_on',
                            'value' => 1,
                            'label' => $this->l('Required')
                        ),
                        array(
                            'id' => 'required_off',
                            'value' => 0,
                            'label' => $this->l('No required')
                        )
                    ),
                );

        if (!$dis) {
            $this->fields_form['input'][] = array(
                    'type' => 'select',
                    'label' => $this->l('Type validate:'),
                    'name' => 'validate',
                    'class' => 't',
                    'required' => true,
                    'options' => array(
                        'query' => $ps_validate_type,
                        'id' => 'id',
                        'name' => 'name'),
                    'desc' => $this->l('Select type validate field.')
                );
        } else {
            $this->fields_form['input'][] =    array(
                'type' => 'hidden',
                'name' => 'validate'
            );
            $this->fields_value['validate'] = $res['validate'];
        }

        if (!($this->loadObject(true))) {
            return;
        }

        return parent::renderForm();
    }

    public function deleteFile($filename, $folder)
    {
        $file = _PS_MODULE_DIR_.'advancedcomments/upload/'.$folder.'/'.$filename;
        if (file_exists($file)) {
            return unlink($file);
        }

        return false;
    }

    public function processPosition()
    {
        $id = (int)Tools::getValue('id_field');
        $object = new FieldClass((int)$id);
        if (!Validate::isLoadedObject($object)) {
            $this->errors[] = Tools::displayError('An error occurred while updating the status for an object.').
                ' <b>'.$this->table.'</b> '.Tools::displayError('(cannot load object)');
        } elseif (!$object->updatePosition((int)Tools::getValue('way'), (int)Tools::getValue('position'))) {
            $this->errors[] = Tools::displayError('Failed to update the position.');
        } else {
            $id_identifier_str = ($id_identifier = (int)Tools::getValue($this->identifier)) ?
                '&'.$this->identifier.'='.$id_identifier : '';
            $redirect = self::$currentIndex.'&'.$this->table.'Orderby=position&'.
                $this->table.'Orderway=asc&conf=5'.$id_identifier_str.'&token='.$this->token;
            $this->redirect_after = $redirect;
        }
        return $object;
    }

    public function renderList()
    {
        $this->initToolbar();
        $this->context->smarty->assign(array(
            'has_bulk_actions' => 0
        ));
        return parent::renderList();
    }

    public function postProcess()
    {
        if (Tools::isSubmit('submitAdd'.$this->table)) {
            $this->action = 'save';
            $object = parent::postProcess();
            if ($object !== false) {
                Tools::redirectAdmin(
                    self::$currentIndex.'&conf=3&id_cms_category='.
                    (int)$object->id.'&token='.Tools::getValue('token')
                );
            }
            return $object;
        } elseif (Tools::isSubmit('delete'.$this->table)) {
            if ($this->tabAccess['delete'] === '1') {
                if (Validate::isLoadedObject($object = $this->loadObject())) {
                    if (!in_array($object->id, range(0, 21))) {
                        if (isset($object->no_zero_object) &&
                            count(call_user_func(array($this->className, $object->no_zero_object))) <= 1) {
                            $this->errors[] = Tools::displayError('You need at least one object.').
                                ' <b>'.$this->table.'</b><br />'.
                                Tools::displayError('You cannot delete all of the items.');
                        } else {
                            if ($this->deleted) {
                                $object->deleted = 1;
                                if ($object->update()) {
                                    Tools::redirectAdmin(self::$currentIndex.'&conf=1&token='.Tools::getValue('token'));
                                }
                            } elseif ($object->delete()) {
                                Tools::redirectAdmin(self::$currentIndex.'&conf=1&token='.Tools::getValue('token'));
                            } else {
                                $this->errors[] = Tools::displayError('An error occurred during deletion.');
                            }
                        }
                    } else {
                        Tools::redirectAdmin(self::$currentIndex.'&conf=1&token='.Tools::getValue('token'));
                    }
                } else {
                    $this->errors[] = Tools::displayError('An error occurred while deleting the object.')
                        .' <b>'.$this->table.'</b> '.Tools::displayError('(cannot load object)');
                }
            }
        } elseif (Tools::getValue('action') == 'updatePositions' && Tools::isSubmit('field')) {
            $positions = Tools::getValue('field');

            $field = array();
            foreach ($positions as $v) {
                $x = explode('_', $v);
                $field[$x[2]] = ($x[2] - 1);
            }

            $position = 0;
            $field = array_flip($field);
            foreach ($field as $id_field) {
                $field_class = new FieldClass((int)$id_field);
                $field_class->position = $position;
                $field_class->update();
                $position++;
            }

            die(1);
        } elseif (Tools::isSubmit('statusadvcheckout') && Tools::getValue($this->identifier)) {
            if ($this->tabAccess['edit'] === '1') {
                if (Validate::isLoadedObject($object = $this->loadObject())) {
                    if ($object->toggleStatus()) {
                        die(Tools::jsonEncode(array('success' => 1,
                            'text' => $this->l('The status has been updated successfully.'))));
                    } else {
                        die(Tools::jsonEncode(array('success' => 0,
                            'text' => $this->l('An error occurred while updating this object.'))));
                    }
                } else {
                    die(Tools::jsonEncode(array('success' => 0,
                        'text' => $this->l('An error occurred while updating this object.'))));
                }
            } else {
                die(Tools::jsonEncode(array('success' => 0,
                    'text' => $this->l('You do not have permission to edit this.'))));
            }
        } elseif (Tools::isSubmit('requiredadvcheckout') && Tools::getValue($this->identifier)) {
            if ($this->tabAccess['edit'] === '1') {
                if (Validate::isLoadedObject($object = $this->loadObject())) {
                    if ($object->toggleR()) {
                        die(Tools::jsonEncode(array('success' => 1,
                            'text' => $this->l('The status has been updated successfully.'))));
                    } else {
                        die(Tools::jsonEncode(array('success' => 0,
                            'text' => $this->l('An error occurred while updating this object.'))));
                    }
                } else {
                    die(Tools::jsonEncode(array('success' => 0,
                        'text' => $this->l('An error occurred while updating this object.'))));
                }
            } else {
                die(Tools::jsonEncode(array('success' => 0,
                    'text' => $this->l('You do not have permission to edit this.'))));
            }
        }
    }

    public function processSave()
    {
        $db = Db::getInstance();
        $name = Tools::getValue('name');
        $query = new DbQuery();
        $query->select('name');
        $query->from('advcheckout');
        $query->where('is_custom = 0');
        $list = $db->ExecuteS($query);
        $lst = array();
        foreach ($list as $l) {
            $lst[] = $l['name'];
        }
        if (in_array($name, $lst)) {
            $this->errors[] = Tools::displayError(
                'Идентификатор не '.
                'должен совпадать с стандартными!('.implode(', ', $lst).')'
            );
        }

        $object = parent::processSave();
        return $object;
    }
}
