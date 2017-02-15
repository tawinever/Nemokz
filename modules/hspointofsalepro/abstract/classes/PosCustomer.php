<?php
/**
 * RockPOS - Point of Sale for PrestaShop
 *
 * @author    Hamsa Technologies
 * @copyright Hamsa Technologies
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

/**
 * Custom Customer for Point of Sale
 * - searchByName(): Allow searching for guest customers (beside standard custommers)
 */
class PosCustomer extends Customer
{
    /**
     * Light back office search for customers (and guests)
     *
     * @param string $keyword
     * @param int $limit How many customers to be returned
     *
     * @return array
     * <pre>
     * array(
     *  int => array(
     *      'id_customer' => int,
     *      'firstname' => string,
     *      'lastname' => string,
     *      'email' => string
     *  )
     *  ...
     */
    public static function search($keyword, $limit = null)
    {
        $db_query = new DbQuery();
        $db_query->select('c.`id_customer`, c.`firstname`, c.`lastname`, c.`email`');
        $db_query->select('a.`phone`, a.`phone_mobile`');
        $db_query->select('IF(ISNULL(NULLIF(c.`company`,"")), a.`company`, c.`company`) AS `company`');
        $db_query->from('customer', 'c');
        $db_query->leftJoin('address', 'a', 'a.`id_customer` = c.`id_customer`');
        $db_query->groupBy('c.`id_customer`')->orderBy('c.`firstname` ASC');
        if ($limit) {
            $db_query->limit($limit);
        }

        $db_query->where('c.`active` = 1');
        $db_query->where('a.`active` = 1 OR a.`active` IS NULL');
        $db_query->where(Configuration::get('POS_ALLOW_GUEST_SEARCH') ? null : 'c.`is_guest` = 0');
        $db_query->where('1 ' . Shop::addSqlRestriction(Shop::SHARE_CUSTOMER));
        $db_query->where('c.`id_customer` != ' . (int) Configuration::get('POS_DEFAULT_GUEST_ACCOUNT'));
        $sanitized_keyword = pSQL($keyword);
        $where = array();
        foreach (Customer::$definition['fields'] as $field => $field_definition) {
            $where[] = self::isSearchField($field_definition) ? "c.`$field` LIKE '%$sanitized_keyword%'" : '';
        }
        foreach (Address::$definition['fields'] as $field => $field_definition) {
            $where[] = self::isSearchField($field_definition) ? "a.`$field` LIKE '%$sanitized_keyword%'" : '';
        }
        $db_query->where(implode(' OR ', array_diff($where, array(''))));
        return Db::getInstance()->executeS($db_query);
    }

    /**
     * Check if a field is available for search
     * @param array $field_definition Definition of a field of an ObjectModel class
     * <pre>
     * array(
     *  'type' => int,
     *  'copy_post' => string (optional)
     *  'validate' => string (optional)
     *  ...
     * )
     * @return boolean
     */
    protected static function isSearchField(array $field_definition)
    {
        return (
                $field_definition['type'] == self::TYPE_STRING &&
                (!isset($field_definition['copy_post']) || (isset($field_definition['copy_post']) && $field_definition['copy_post'])) &&
                (!isset($field_definition['validate']) || (isset($field_definition['validate']) && !in_array($field_definition['validate'], array('isMd5', 'isPasswd'))))
                );
    }

    /**
     * Create  dummy customer for guest checkout.
     *
     * @param int $id_customer
     *
     * @return boolean
     */
    public static function createDummyCustomer($id_customer)
    {
        $guest_customer = new self((int) $id_customer);

        if (!empty($id_customer) && Validate::isLoadedObject($guest_customer)) {
            return true;
        }

        $customer = new self();
        $customer->email = Configuration::get('PS_SHOP_EMAIL');
        $customer->firstname = 'POS';
        $customer->lastname = 'Guest';
        $customer->passwd = Tools::encrypt(Tools::passwdGen());
        $customer->id_gender = 1;
        $customer->active = 1;

        $flag = false;
        if ($customer->add()) {
            if (Configuration::updateGlobalValue('POS_DEFAULT_GUEST_ACCOUNT', (int) $customer->id)) {
                $flag = PosAddress::createDummyAddress($customer);
            }
        }

        return $flag;
    }

    /**
     * @return boolean
     */
    public function isDefaultCustomer()
    {
        return ((int) $this->id === (int) Configuration::get('POS_DEFAULT_GUEST_ACCOUNT'));
    }

    /**
     * Get default customer.
     *
     * @return Customer
     */
    public static function getDefaultCustomer()
    {
        $id_customer = (int) Configuration::get('POS_DEFAULT_GUEST_ACCOUNT');
        if ($id_customer) {
            $customer = new PosCustomer($id_customer);
        } else {
            $customer = new PosCustomer();
        }

        return $customer;
    }

    /**
     *
     * @param Customer $customer
     *
     * @return string
     */
    public static function getPhoneNumber(Customer $customer)
    {
        $addresses = $customer->getAddresses(Context::getContext()->language->id);
        $phone = '';

        if (!empty($addresses)) {
            foreach ($addresses as $address) {
                if (!empty($address['phone']) && $address['phone'] != PosConstants::DEFAULT_PHONE_NUMBER) {
                    $phone = $address['phone'];
                } elseif (!empty($address['phone_mobile']) && $address['phone_mobile'] != PosConstants::DEFAULT_PHONE_NUMBER) {
                    $phone = $address['phone_mobile'];
                }
            }
        }

        return $phone;
    }

    /**
     *
     * @return boolean
     */
    public function addPosCustomerGroup()
    {
        $flag = true;
        $pos_customer_id_group = (int) Configuration::get('POS_CUSTOMER_ID_GROUP');
        $id_groups = $this->getGroups();
        if ($pos_customer_id_group && !in_array($pos_customer_id_group, $id_groups)) {
            $flag = (bool) $this->addGroups(array($pos_customer_id_group));
        }
        return $flag;
    }

    /**
     * 
     * @param boolean $autodate
     * @param boolean $null_values
     * @return boolean
     */
    public function add($autodate = true, $null_values = true)
    {
        $default_instance = self::generateDefaultInstance();
        foreach (get_object_vars($default_instance) as $field => $value) {
            if (empty($this->$field)) {
                $this->$field = $value;
            }
        }
        return parent::add($autodate, $null_values);
    }

    /**
     * 
     * @return \stdClass
     */
    public static function generateDefaultInstance()
    {
        $customer = new stdClass();
        foreach (self::$definition['fields'] as $field => $definition) {
            if (!isset($definition['required']) || (isset($definition['required']) && !$definition['required'])) {
                continue;
            }
            switch ($definition['validate']) {
                case 'isEmail':
                    $customer->$field = Configuration::get('PS_SHOP_EMAIL');
                    break;
                case 'isPasswd':
                    $customer->$field = Tools::encrypt(Tools::passwdGen());
                    break;
                default:
                    $customer->$field = PosConstants::NOT_AVAILABLE;
                    break;
            }
        }
        return $customer;
    }

    /**
     * This is combined from 2 functions: ObjectModel::validateFields() and ObjectModel::validateFieldsLang().
     * @return array
     * <pre>
     * array(
     *  string,
     *  string,
     *  ...
     * )
     */
    public function validate()
    {
        $error_messages = array();
        foreach ($this->def['fields'] as $field => $data) {
            if (empty($data['lang'])) {
                // see ObjectModel::validateFields()
                if (is_array($this->update_fields) && empty($this->update_fields[$field]) && isset($this->def['fields'][$field]['shop']) && $this->def['fields'][$field]['shop']) {
                    continue;
                }
                $error_messages[] = $this->validateField($field, $this->$field);
            } else {
                // see ObjectModel::validateFieldsLang()
                $this->field = is_array($this->field) ? $this->field : array($this->id_lang => $this->field);
                if (!isset($this->field[Configuration::get('PS_LANG_DEFAULT')])) {
                    $this->field[Configuration::get('PS_LANG_DEFAULT')] = '';
                }
                foreach ($this->field as $id_lang => $value) {
                    if (is_array($this->update_fields) && empty($this->update_fields[$field][$id_lang])) {
                        continue;
                    }
                    $error_messages[] = $this->validateField($field, $value, $id_lang);
                }
            }
        }
        return array_diff($error_messages, array(true)); // "true" means "no error"
    }
    
    public static function flushCache()
    {
        if (is_callable('parent::flushCache')) {
            parent::flushCache();
        }
        self::$_defaultGroupId = array();
        self::$_customerHasAddress = array();
        self::$_customer_groups = array();
    }
}
