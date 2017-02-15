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

class CustomClass extends ObjectModel
{
    public $id;
    public $value;
    public $id_order;
    public $id_cart;
    public $id_pickup;
    public $message;
    public static $definition = array(
        'table' => 'advcheckout_custom',
        'primary' => 'id_custom',
        'fields' => array(
            'value' => array('type' => self::TYPE_STRING, 'required' => true, 'size' => 1024),
            'message' => array('type' => self::TYPE_STRING),
            'id_cart' => array('type' => self::TYPE_INT, 'required' => true),
            'id_order' => array('type' => self::TYPE_INT),
            'id_pickup' => array('type' => self::TYPE_INT),
        )
    );

    public function add($autodate = true, $nullvalues = false)
    {
        if (empty($this->value)) {
            $this->value = serialize(array());
        }
        return parent::add($autodate, $nullvalues);
    }
}
