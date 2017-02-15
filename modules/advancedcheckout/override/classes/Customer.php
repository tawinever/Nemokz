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

class Customer extends CustomerCore
{
    public function __construct($id = null, $mod = null)
    {
        parent::__construct($id);
        if ($mod) {
            $res = Db::getInstance()->ExecuteS('SELECT * FROM `'._DB_PREFIX_.'advcheckout` a
											LEFT JOIN `'._DB_PREFIX_.'advcheckout_lang` al ON (a.`id_field` = al.`id_field` 
											AND al.`id_lang` = '.(int)Context::getContext()->language->id.')
											WHERE a.`required` = 1
											ORDER BY a.`position`');
            $arr = array();
            foreach ($res as $r) {
                $arr[] = $r['name'];
            }
            $this->fieldsRequired = array();
            if (in_array('birthday', $arr)) {
                $this->def['fields']['birthday']['required'] = 1;
                $this->fieldsRequired[] = 'birthday';
            } else {
                $this->def['fields']['birthday']['required'] = 0;
            }

            if (in_array('gender', $arr)) {
                $this->def['fields']['id_gender']['required'] = 1;
                $this->fieldsRequired[] = 'id_gender';
            } else {
                $this->def['fields']['id_gender']['required'] = 0;
            }

            if (in_array('newsletter', $arr)) {
                $this->def['fields']['newsletter']['required'] = 1;
                $this->fieldsRequired[] = 'newsletter';
            } else {
                $this->def['fields']['newsletter']['required'] = 0;
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

            if (in_array('email', $arr)) {
                $this->def['fields']['email']['required'] = 1;
                $this->fieldsRequired[] = 'email';
            } else {
                $this->def['fields']['email']['required'] = 0;
            }

            if (in_array('passwd', $arr)) {
                $this->def['fields']['passwd']['required'] = 1;
                $this->fieldsRequired[] = 'passwd';
            } else {
                $this->def['fields']['passwd']['required'] = 0;
            }
        }
    }
}
