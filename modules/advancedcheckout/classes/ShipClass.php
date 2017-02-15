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

class ShipClass extends ObjectModel
{
    public $id;
    public $id_carrier;
    public $id_payment_module;
    public $active;
    public static $definition = array(
        'table' => 'advcheckout_ship_to_pay',
        'primary' => 'id_ship',
        'fields' => array(
            'id_carrier' => array(
                'type' => self::TYPE_INT,
                'required' => true
            ) ,
            'active' => array(
                'type' => self::TYPE_BOOL,
                'validate' => 'isBool',
                'required' => true
            ) ,
            'id_payment_module' => array(
                'type' => self::TYPE_STRING,
                'required' => true
            ) ,
        )
    );
}
