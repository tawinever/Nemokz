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
class Address extends AddressCore
{
    /*
    * module: advancedcheckout
    * date: 2016-11-30 19:49:55
    * version: 3.1.7
    */
    public function validateController($htmlentities = true, $mod = null)
    {
        if ($mod) {
            $errors = array();
            foreach ($this->def['fields'] as $field => $data) {
                $value = $this->{$field};
                if (isset($data['required']) && $data['required'] && empty($value) && $value !== '0') {
                    if (!$this->id || $field != 'passwd') {
                        $errors[$field] = '<b>'.
                            self::displayFieldName($field, get_class($this), $htmlentities).
                            '</b> '.Tools::displayError('is required.');
                    }
                }
                if (isset($data['size']) && !empty($value) && Tools::strlen($value) > $data['size']) {
                    $errors[$field] = sprintf(
                        Tools::displayError('%1$s is too long. Maximum length: %2$d'),
                        self::displayFieldName($field, get_class($this), $htmlentities),
                        $data['size']
                    );
                }
                $dv = '';
                if (isset($data['validate'])) {
                    $dv = $data['validate'];
                }
                if (isset($data['validate']) && !Validate::$dv($value) &&
                    (!empty($value) || (isset($data['required']) && $data['required']))) {
                    $errors[$field] = '<b>'.self::displayFieldName($field, get_class($this), $htmlentities).
                        '</b> '.Tools::displayError('is invalid.');
                }
            }
            return $errors;
        } else {
            return parent::validateController($htmlentities);
        }
    }
    /*
    * module: advancedcheckout
    * date: 2016-11-30 19:49:55
    * version: 3.1.7
    */
    public function __construct($id_address = null, $id_lang = null, $set = null, $mod = null)
    {
        parent::__construct($id_address, $id_lang);
        if ($mod) {
            if (!$set) {
                foreach ($this->def['fields'] as &$df) {
                    $df['copy_post'] = false;
                }
                $res = Db::getInstance()->ExecuteS(
                    'SELECT * FROM `'._DB_PREFIX_.'advcheckout` a
                    LEFT JOIN `'._DB_PREFIX_.'advcheckout_lang` al ON (a.`id_field` = al.`id_field` 
                    AND al.`id_lang` = '.(int)Context::getContext()->language->id.')
                    WHERE a.`required` = 1
                    ORDER BY a.`position`'
                );
                $arr = array();
                foreach ($res as $r) {
                    $arr[] = $r['name'];
                }
                $this->fieldsRequired = array();
                if (in_array('dni', $arr)) {
                    $this->def['fields']['dni']['required'] = 1;
                    $this->fieldsRequired[] = 'firstname';
                } else {
                    $this->def['fields']['dni']['required'] = 0;
                }
                if (in_array('vat_number', $arr)) {
                    $this->def['fields']['vat_number']['required'] = 1;
                    $this->fieldsRequired[] = 'vat_number';
                } else {
                    $this->def['fields']['firstname']['required'] = 0;
                }
                if (in_array('firstname', $arr)) {
                    $this->def['fields']['firstname']['required'] = 1;
                    $this->fieldsRequired[] = 'firstname';
                } else {
                    $this->def['fields']['firstname']['required'] = 0;
                }
                if (in_array('lastname', $arr)) {
                    $this->def['fields']['lastname']['required'] = 1;
                    $this->fieldsRequired[] = 'lastname';
                } else {
                    $this->def['fields']['lastname']['required'] = 0;
                }
                if (in_array('city', $arr)) {
                    $this->def['fields']['city']['required'] = 1;
                    $this->fieldsRequired[] = 'city';
                } else {
                    $this->def['fields']['city']['required'] = 0;
                }
                if (in_array('company', $arr)) {
                    $this->def['fields']['company']['required'] = 1;
                    $this->fieldsRequired[] = 'company';
                } else {
                    $this->def['fields']['company']['required'] = 0;
                }
                if (in_array('phone', $arr)) {
                    $this->def['fields']['phone']['required'] = 1;
                    $this->fieldsRequired[] = 'phone';
                } else {
                    $this->def['fields']['phone']['required'] = 0;
                }
                if (in_array('phone_mobile', $arr)) {
                    $this->def['fields']['phone_mobile']['required'] = 1;
                    $this->fieldsRequired[] = 'phone_mobile';
                } else {
                    $this->def['fields']['phone_mobile']['required'] = 0;
                }
                if (in_array('id_country', $arr)) {
                    $this->def['fields']['id_country']['required'] = 1;
                    $this->fieldsRequired[] = 'id_country';
                } else {
                    $this->def['fields']['id_country']['required'] = 0;
                }
                if (in_array('id_state', $arr)) {
                    $this->def['fields']['id_state']['required'] = 1;
                    $this->fieldsRequired[] = 'id_state';
                } else {
                    $this->def['fields']['id_state']['required'] = 0;
                }
                if (in_array('address1', $arr)) {
                    $this->def['fields']['address1']['required'] = 1;
                    $this->fieldsRequired[] = 'address1';
                } else {
                    $this->def['fields']['address1']['required'] = 0;
                }
                if (in_array('address2', $arr)) {
                    $this->def['fields']['address2']['required'] = 1;
                    $this->fieldsRequired[] = 'address2';
                } else {
                    $this->def['fields']['address2']['required'] = 0;
                }
                if (in_array('postcode', $arr)) {
                    $this->def['fields']['postcode']['required'] = 1;
                    $this->fieldsRequired[] = 'postcode';
                } else {
                    $this->def['fields']['postcode']['required'] = 0;
                }
                if (in_array('other', $arr)) {
                    $this->def['fields']['other']['required'] = 1;
                    $this->fieldsRequired[] = 'other';
                } else {
                    $this->def['fields']['other']['required'] = 0;
                }
            } elseif ($set) {
                $this->fieldsRequired = array();
                foreach ($this->def['fields'] as $k => &$fl) {
                    $fl['required'] = 0;
                    unset($this->def['fields'][$k]['validate']);
                    unset($this->def['fields'][$k]['size']);
                }
            }
        }
    }
}
