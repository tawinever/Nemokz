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
class PosAddressFormat extends AddressFormat
{
    /**
     * Reformat POS full address text.
     *
     * @param Address $address
     * @param array   $pattern_rules A defined rules array to avoid some pattern
     * @param string  $new_line      A string containing the newLine format
     * @param string  $separator    A string containing the separator format
     * @param array   $style
     *
     * @return string
     */
    public static function generateAddress(Address $address, $pattern_rules = array(), $new_line = "\r\n", $separator = ' ', $style = array())
    {
        $default_address_instance = PosAddress::generateDefaultInstance($address->id_country);
        foreach (get_object_vars($address) as $field => $value) {
            if (isset($default_address_instance->$field) && $default_address_instance->$field == $value) {
                $address->$field = null;// unset dummy value
            }
        }
        $formatted_address = AddressFormat::generateAddress($address, $pattern_rules, $new_line, $separator, $style);

        // Compatible with PrestaShop 1.6.0.11 and older
        // For more information, please refer to AddressFormat::_setOriginalDisplayFormat(), version 1.6.0.12 or upper
        if (version_compare(_PS_VERSION_, '1.6.0.11') <= 0) {
            $lines = PosTools::convertHtmlToLines($formatted_address);
            foreach ($lines as $index => $line) {
                if (in_array($line, array(','))) {
                    unset($lines[$index]);
                }
            }
            $formatted_address = implode('<br />', $lines);
        }
        return $formatted_address;
    }

    /**
     * Override this function to use for PS version <= 1.6.0.11 they don't have this.
     * @return array
     *               <pre>
     *               array
     *               (
     *               int => string,
     *               ............
     *               )
     */
    public static function getFieldsRequired()
    {
        $address = new PosAddress();

        return array_unique(array_merge($address->getFieldsRequiredDB(), AddressFormat::$requireFormFieldsList));
    }
}
