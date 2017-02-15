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

class PickupClass extends ObjectModel
{
    public $id;
    public $latitude;
    public $longitude;
    public $number;
    public $address;
    public $email;
    public $times;
    public $name;
    public $description;
    public $active;
    public $fax;
    public $postcode;
    public $city;

    public static $definition = array(
        'table' => 'advcheckout_pickup',
        'primary' => 'id_pickup',
        'multilang' => true,
        'fields' => array(
            'postcode' => array('type' => self::TYPE_STRING, 'validate' => 'isPostCode', 'size' => 12),
            'city' => array('type' => self::TYPE_STRING, 'validate' => 'isCityName', 'required' => true, 'size' => 64),
            'name' => array('type' => self::TYPE_STRING, 'validate' => 'isString',
                'required' => true, 'lang' => true, 'size' => 1024),
            'latitude' => array('type' => self::TYPE_STRING, 'required' => true, 'size' => 128),
            'longitude' => array('type' => self::TYPE_STRING, 'required' => true, 'size' => 128),
            'fax' => array('type' => self::TYPE_STRING, 'validate' => 'isPhoneNumber', 'size' => 128),
            'number' => array('type' => self::TYPE_STRING,
                'validate' => 'isPhoneNumber', 'required' => true, 'size' => 128),
            'email' => array('type' => self::TYPE_STRING, 'size' => 128, 'validate' => 'isEmail'),
            'address' => array('type' => self::TYPE_STRING, 'required' => true, 'size' => 1024),
            'times' => array('type' => self::TYPE_STRING, 'size' => 1024),
            'active' => array('type' => self::TYPE_BOOL, 'validate' => 'isBool', 'required' => true),
            'description' => array('type' => self::TYPE_STRING,
                'lang' => true, 'validate' => 'isString', 'required' => true, 'size' => 1024),
        )
    );
}
