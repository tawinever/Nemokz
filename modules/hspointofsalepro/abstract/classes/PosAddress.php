<?php
/**
 * RockPOS - Point of Sale for PrestaShop
 *
 * @author    Hamsa Technologies
 * @copyright Hamsa Technologies
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

/**
 * 
 */
class PosAddress extends Address
{
    /**
     * Create  dummy address for customer.
     *
     * @return boolean
     */
    public static function createDummyAddress(PosCustomer $customer)
    {
        if (!Validate::isLoadedObject($customer)) {
            return false;
        }
        $address = new self();
        $address->id_customer = (int) $customer->id;
        $address->id_country = (int) Configuration::get('PS_COUNTRY_DEFAULT');
        $address->firstname = $customer->firstname;
        $address->lastname = $customer->lastname;
        $address->alias = PosConstants::ADDRESS_ALIAS . '_' . Tools::passwdGen();
        return $address->add();
    }

    /**
     * 
     * @param boolean $autodate
     * @param boolean $null_values
     * @return boolean
     */
    public function add($autodate = true, $null_values = false)
    {
        $default_instance = self::generateDefaultInstance($this->id_country);
        foreach (get_object_vars($default_instance) as $field => $value) {
            if (empty($this->$field)) {
                $this->$field = $value;
            }
        }
        return parent::add($autodate, $null_values);
    }
    
    /**
     * 
     * @param int $id_country
     * @return \stdClass
     */
    public static function generateDefaultInstance($id_country = null)
    {
        $address = new stdClass();
        $address->id_country = !empty($id_country) ? $id_country : Configuration::get('PS_COUNTRY_DEFAULT');
        $address_fields_required = PosAddressFormat::getFieldsRequired();
        foreach ($address_fields_required as $required_field) {
            if (!isset(self::$definition['fields'][$required_field])) {
                continue;
            }
            switch (self::$definition['fields'][$required_field]['validate']) {
                case 'isPhoneNumber':
                    $address->$required_field = PosConstants::DEFAULT_PHONE_NUMBER;
                    break;
                case 'isPostCode':
                    $address->$required_field = PosCountry::generateDefaultZipCode($address->id_country);
                    break;
                default:
                    $address->$required_field = PosConstants::NOT_AVAILABLE;
                    break;
            }
        }
        return $address;
    }

    /**
     * Override this function to use for PS version <= 1.6.0.11 they don't have this.
     * get fields required address from database.
     *
     * @return array
     *               <pre>
     *               array
     *               (
     *               int => string,
     *               ............
     *               )
     */
    public function getFieldsRequiredDB()
    {
        // Retro PS1.5.x
        if (method_exists($this, 'cacheFieldsRequiredDatabase')) {
            $this->cacheFieldsRequiredDatabase(false);
        }
        return isset(self::$fieldsRequiredDatabase['Address']) ? self::$fieldsRequiredDatabase['Address'] : array();
    }
}
