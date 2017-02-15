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

class Unpay extends ObjectModel
{
    public $id;
    public $active = 1;
    public $id_order_state = 1;
    public $position;
    public $date_add;
    public $date_upd;
    public $name;
    public $logo;
    public $description_short;
    public $description;
    public $description_success;
    public static $definition = array(
        'table' => 'advcheckout_unpay',
        'primary' => 'id_unpay',
        'multilang' => true,
        'fields' => array(
            'active' =>                array('type' => self::TYPE_BOOL, 'validate' => 'isBool', 'required' => true),
            'date_add' =>                array('type' => self::TYPE_DATE, 'shop' => true, 'validate' => 'isDateFormat'),
            'date_upd' =>                array('type' => self::TYPE_DATE, 'shop' => true, 'validate' => 'isDateFormat'),
            'id_order_state' =>        array('type' => self::TYPE_INT,
                'validate' => 'isUnsignedId', 'required' => true),
            'name' =>                    array('type' => self::TYPE_STRING,
                'lang' => true, 'validate' => 'isGenericName', 'required' => true, 'size' => 128),
            'description' =>            array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isString'),
            'description_success' =>    array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isString'),
            'description_short' =>        array('type' => self::TYPE_STRING, 'lang' => true,
                'validate' => 'isGenericName', 'required' => true, 'size' => 256),
        ),
    );

    public function __construct($id = null, $id_lang = null)
    {
        if (file_exists(_PS_MODULE_DIR_.'advancedcheckout/img/payments/unpay_'.$id.'.gif')) {
            $this->logo = '<img src="'._PS_BASE_URL_.
                __PS_BASE_URI__.'modules/advancedcheckout/img/payments/unpay_'.$id.'.gif" />';
        } else {
            $this->logo = '<img src="'._PS_BASE_URL_.
                __PS_BASE_URI__.'modules/advancedcheckout/img/payments/default.png" />';
        }
        return parent::__construct($id, $id_lang);
    }

    public static function getUnpay($id_lang, $active = true, $in = '')
    {
        if (!Validate::isBool($active)) {
            die(Tools::displayError());
        }

        if ($in == '999' && $in != '') {
            return array();
        }

        $result = Db::getInstance(_PS_USE_SQL_SLAVE_)->ExecuteS(
            'SELECT *
            FROM `'._DB_PREFIX_.'advcheckout_unpay` au
            LEFT JOIN `'._DB_PREFIX_.'advcheckout_unpay_lang` aul ON au.`id_unpay` = aul.`id_unpay`
            WHERE `id_lang` = '.(int)$id_lang.
            ($active ? ' AND au.`active` = 1' : '').
            ($in != '' ? ' AND au.`id_unpay` IN('.$in.')' : '').'
            ORDER BY au.`position` ASC'
        );

        return $result;
    }

    public function updateCarrier($old_carrier_id, $new_carrier_id)
    {
        Db::getInstance()->update(
            'advcheckout_ship_to_pay',
            array(
                'id_carrier' => (int)$new_carrier_id
            ),
            'id_carrier = '.(int)$old_carrier_id
        );
    }
}
