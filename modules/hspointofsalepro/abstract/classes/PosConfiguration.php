<?php
/**
 * RockPOS - Point of Sale for PrestaShop
 *
 * @author    Hamsa Technologies
 * @copyright Hamsa Technologies
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

/**
 * @since 2.3.7
 */
class PosConfiguration extends Configuration
{
    /**
     * @return array
     * array(<pre>
     *      [key] => value
     * )</pre>
     */
    public static function getSettings()
    {
        $general_settings = self::getGeneralSettings();
        $product_settings = self::getProductSettings();
        $customer_settings = self::getCustomerSettings();
        $invoice_settings = self::getInvoiceSettings();
        $receipt_settings = self::getReceiptSettings();
        $order_settings = self::getOrderSettings();
        return array_merge($general_settings, $product_settings, $customer_settings, $invoice_settings, $receipt_settings, $order_settings);
    }
    
    /**
     * @return array
     * array(<pre>
     *      [key] => value
     * )</pre>
     */
    public static function getGeneralSettings()
    {
        return array(
            'POS_COLLECTING_PAYMENT' => 1,
            'POS_DEFAULT_PAYMENT_ID' => PosPayment::getFirstPaymentId(),
            'POS_DEF_PRODUCT_DISCOUNT_TYPE' => PosConstants::DISCOUNT_TYPE_PERCENTAGE,
            'POS_DEF_ORDER_DISCOUNT_TYPE' => PosConstants::DISCOUNT_TYPE_PERCENTAGE,
            'POS_DEFAULT_CARRIER' => (int) self::get('PS_CARRIER_DEFAULT'),
            'POS_FREE_SHIPPING' => 1,
            'POS_ROCKPOS_NAME' => null,
            'POS_REBUILD_SEARCH_INDEX' => 1
            );
    }
    
    /**
     * @return array
     * array(<pre>
     *      [key] => value
     * )</pre>
     */
    public static function getProductSettings()
    {
        $product_settings = array(
            'POS_ORDER_OUT_OF_STOCK' => 0,
            'POS_VISIBILITY_EVERYWHERE' => 1,
            'POS_VISIBILITY_CATALOG_ONLY' => 0,
            'POS_VISIBILITY_SEARCH_ONLY' => 1,
            'POS_VISIBILITY_NOWHERE' => 0,
            'POS_AUTO_INDEXING' => 0
            );
        return array_merge($product_settings, self::getOutputProductSearchSettings(), self::getActiveProductSetting());
    }
    
    /**
     * @return array
     * array(<pre>
     *      [key] => value
     * )</pre>
     */
    public static function getOutputProductSearchSettings()
    {
        return array(
            'POS_SHOW_ID' => 1,
            'POS_SHOW_REFERENCE' => 1,
            'POS_SHOW_STOCK' => 1,
            'POS_SHOW_NAME' => 1
            );
    }

    /**
     * @return array
     * array(<pre>
     *      [key] => value
     * )</pre>
     */
    public static function getCustomerSettings()
    {
        return array(
            'POS_ALLOW_GUEST_SEARCH' => 0,
            'POS_GUEST_CHECKOUT' => 1,
            // POS_DEFAULT_GUEST_ACCOUNT
            'POS_SHOW_CUS_INFO_ON_RECEIPT' => 1,
            );
    }
    
    /**
     * @return array
     * array(<pre>
     *      [key] => value
     * )</pre>
     */
    public static function getInvoiceSettings()
    {
        return array(
            'POS_PRESTASHOP_INVOICE' => 0,
            'POS_INVOICE_AUTO_PRINT' => 0,
            'POS_INVOICE_PAGE_SIZE' => PosConstants::PAGE_SIZE_A4,
            'POS_INVOICE_ORIENTATION' => '',// Empty means "Automatic"
            'POS_INVOICE_LOGO' => '',
            'POS_INVOICE_SHOW_SHOP_NAME' => 1,
            'POS_INVOICE_SHOW_EMPLOYEE_NAME' => 0,
            'POS_INVOICE_SHOW_EAN_JAN' => 0,
            'POS_INVOICE_SHOW_SIGNATURE' => 0,
            'POS_SEND_EMAIL_TO_CUSTOMER' => 1,// @todo:Move to outside of Invoice tab
            'POS_INVOICE_FOOTER_TEXT' => '',
            );
    }
    
    /**
     * @return array
     * array(<pre>
     *      [key] => value
     * )</pre>
     */
    public static function getReceiptSettings()
    {
        return array(
            'POS_RECEIPT_PAGE_SIZE' => PosConstants::PAGE_SIZE_K80,
            'POS_RECEIPT_MARGIN' => 0,
            'POS_RECEIPT_LOGO' => '',
            'POS_RECEIPT_SHOW_SIGNATURE' => 0,
            'POS_RECEIPT_AUTO_PRINT' => 0,
            'POS_RECEIPT_SHOW_LOGO' => 1,
            'POS_RECEIPT_SHOW_SHOP_NAME' => 1,
            'POS_RECEIPT_SHOW_PHONE' => 1,
            'POS_RECEIPT_SHOW_FAX' => 1,
            'POS_RECEIPT_SHOW_REG_NUMBER' => 1,
            'POS_RECEIPT_SHOW_WEBSITE_URL' => 1,
            'POS_RECEIPT_SHOW_ADDRESS' => 1,
            'POS_RECEIPT_SHOW_CITY' => 1,
            'POS_RECEIPT_SHOW_STATE' => 1,
            'POS_RECEIPT_SHOW_ZIPCODE' => 1,
            'POS_RECEIPT_SHOW_PRODUCT_NAME' => 1,
            'POS_RECEIPT_SHOW_PRODUCT_REF' => 1,
            'POS_RECEIPT_SHOW_EAN_JAN' => 0,
            'POS_RECEIPT_SHOW_UPC' => 0,
            'POS_RECEIPT_SHOW_COMBINATION' => 0,
            'POS_RECEIPT_SHOW_UNIT_PRICE' => 1,
            'POS_RECEIPT_SHOW_PROD_DISCOUNT' => 1,
            'POS_RECEIPT_SHOW_ORDER_INFO' => 1,
            'POS_RECEIPT_SHOW_EMPLOYEE_ID' => 0,
            'POS_RECEIPT_SHOW_EMPLOYEE_NAME' => 1,
            'POS_RECEIPT_FOOTER_TEXT' => '',
            );
    }
    
    /**
     * @return array
     * array(<pre>
     *      [key] => value
     * )</pre>
     */
    public static function getOrderSettings()
    {
        return array(
            'POS_SELECTED_ORDER_STATES' => '',
            'POS_DEFAULT_ORDER_STATE' => PosOrderState::getFistOrderStateId(),
            'POS_SHOW_ORDERS_UNDER_PS_ORDERS' => 1
            );
    }

    /**
     * @return array
     * array(
     *      ['key'] => value
     * );
     */
    public static function getDefaultSettings()
    {
        $settings = self::getSettings();
        $old_setting = self::getMultiple(array_keys($settings));
        return array_merge($settings, array_diff($old_setting, array('')));
    }

    /**
     * Remove all configuration keys of module
     * @return boolean
     */
    public static function removeSettings()
    {
        $keys_setting = array_keys(self::getSettings());
        $flag = true;
        foreach ($keys_setting as $key) {
            $flag &= self::deleteByName($key);
        }
        return $flag;
    }
    
    /**
     * @return string
     */
    public static function getModuleName()
    {
        return Configuration::get('POS_ROCKPOS_NAME') ? Configuration::get('POS_ROCKPOS_NAME') : 'hspointofsalepro';
    }
    
    /**
     * 
     * @param string $old_key
     * @param string $new_key
     * @return boolean
     */
    public static function rename($old_key, $new_key)
    {
        $success = array();
        $sql = "UPDATE `"._DB_PREFIX_."configuration` SET `name` = '$new_key' WHERE `name` = '$old_key'";
        $success[] = Db::getInstance()->execute($sql);
        return array_sum($success) >= count($success);
    }

    /**
     * 
     * @param array $old_keys
     * <pre>
     * array(
     *  string,// a configuration key
     *  string
     *  ...
     * )
     * @param array $new_keys
     * <pre>
     * array(
     *  string,// a configuration key
     *  string
     *  ...
     * )
     * @return boolean
     */
    public static function renameMultiple(array $old_keys, array $new_keys)
    {
        $final_result = false;
        if (count($old_keys) == count($new_keys)) {
            $success = array();
            foreach ($old_keys as $index => $key) {
                $success[] = self::rename($key, $new_keys[$index]);
            }
            $final_result = array_sum($success) >= count($success);
        }
        return $final_result;
    }
    
    /**
     * @return array
     * array(<pre>
     *      'key' => 'value',
     *      ...
     * )</pre>
     */
    public static function getProductVisibilities()
    {
        return array(
            'POS_VISIBILITY_EVERYWHERE' => 'both',
            'POS_VISIBILITY_SEARCH_ONLY' => 'search',
            'POS_VISIBILITY_CATALOG_ONLY' => 'catalog',
            'POS_VISIBILITY_NOWHERE' => 'none'
        );
    }
    
    /**
     * 
     * @return array
     * array(<pre>
     *      'key' => 'value',
     *      ...
     * )</pre>
     */
    public static function getActiveProductSetting()
    {
        return array(
            'POS_ORDER_DISABLED_PRODUCTS' => 0,
        );
    }
}
