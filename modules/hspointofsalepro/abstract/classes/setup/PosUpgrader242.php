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
class PosUpgrader242 extends PosUpgrader
{

    /**
     *
     * @var array
     * <pre>
     * array(
     *  string, // hook name, validated against Validate::isHookName()
     *  string
     *  ...
     * )
     */
    protected $hooks_to_register = array(
        'actionAdminOrdersListingFieldsModifier'
    );

    /**
     * @see parent::$configurations_to_install
     */
    protected $configurations_to_install = array(
        'POS_SHOW_ORDERS_UNDER_PS_ORDERS' => 1
    );

    /**
     * @return boolean
     */
    protected function installConfigs()
    {
        $success = array();
        $success[] = parent::installConfigs();
        $success[] = PosConfiguration::rename('POS_DEFAULT_PRODUCT_DISCOUNT_TYPE', 'POS_DEF_PRODUCT_DISCOUNT_TYPE'); // http://www.abbreviations.com/abbreviation/default
        $success[] = PosConfiguration::rename('PS_POS_INVOICE_DISPLAY_EMPLOYEE_NAME', 'POS_INVOICE_SHOW_EMPLOYEE_NAME');
        $success[] = PosConfiguration::rename('POS_INVOICE_CUSTOM_TEXTS_AT_FOOTER', 'POS_INVOICE_FOOTER_TEXT');
        $success[] = PosConfiguration::rename('POS_DEFAULT_ORDER_DISCOUNT_TYPE', 'POS_DEF_ORDER_DISCOUNT_TYPE');
        $success[] = PosConfiguration::rename('PS_POS_VISIBILITY_EVERYWHERE', 'POS_VISIBILITY_EVERYWHERE');
        $success[] = PosConfiguration::rename('PS_POS_DEFAULT_CARRIER', 'POS_DEFAULT_CARRIER');
        $success[] = PosConfiguration::rename('PS_POS_GUEST_CHECKOUT', 'POS_GUEST_CHECKOUT');
        $success[] = PosConfiguration::rename('PS_POS_DEFAULT_GUEST_ACCOUNT', 'POS_DEFAULT_GUEST_ACCOUNT');
        $success[] = PosConfiguration::rename('PS_POS_PRINT_INVOICE_AU', 'POS_INVOICE_AUTO_PRINT');
        $success[] = PosConfiguration::rename('PS_POS_INVOICE_PAGE_SIZE_FORMAT', 'POS_INVOICE_PAGE_SIZE');
        $success[] = PosConfiguration::rename('PS_POS_INVOICE_ORIENTATION', 'POS_INVOICE_ORIENTATION');
        $success[] = PosConfiguration::rename('PS_POS_INVOICE_LOGO', 'POS_INVOICE_LOGO');
        $success[] = PosConfiguration::rename('PS_POS_INVOICE_DISPLAY_SHOP_NAME', 'POS_INVOICE_SHOW_SHOP_NAME');
        $success[] = PosConfiguration::rename('PS_POS_INVOICE_SHOW_EAN_OR_JAN', 'POS_INVOICE_SHOW_EAN_JAN');
        $success[] = PosConfiguration::rename('PS_POS_SIGNATURE_ON_INVOICE', 'POS_INVOICE_SHOW_SIGNATURE');
        $success[] = PosConfiguration::rename('PS_POS_SEND_EMAIL_TO_CUSTOMER', 'POS_SEND_EMAIL_TO_CUSTOMER');
        $success[] = PosConfiguration::rename('PS_POS_RECEIPT_PAGE_SIZE_FORMAT', 'POS_RECEIPT_PAGE_SIZE');
        $success[] = PosConfiguration::rename('PS_POS_RECEIPT_LOGO', 'POS_RECEIPT_LOGO');
        $success[] = PosConfiguration::rename('PS_POS_SIGNATURE_ON_RECEIPT', 'POS_RECEIPT_SHOW_SIGNATURE');
        $success[] = PosConfiguration::rename('PS_POS_PRINT_RECEIPT_AU', 'POS_RECEIPT_AUTO_PRINT');
        $success[] = PosConfiguration::rename('PS_POS_RECEIPT_SHOW_SHOP_NAME', 'POS_RECEIPT_SHOW_SHOP_NAME');
        $success[] = PosConfiguration::rename('POS_SHOW_LOGO', 'POS_RECEIPT_SHOW_LOGO');
        $success[] = PosConfiguration::rename('POS_CUSTOMER_TEXTS_AT_FOOTER', 'POS_RECEIPT_FOOTER_TEXT');
        $success[] = PosConfiguration::rename('POS_SHOW_PHONE', 'POS_RECEIPT_SHOW_PHONE');
        $success[] = PosConfiguration::rename('POS_SHOW_FAX', 'POS_RECEIPT_SHOW_FAX');
        $success[] = PosConfiguration::rename('POS_SHOW_REGISTRATION_NUMBER', 'POS_RECEIPT_SHOW_REG_NUMBER');
        $success[] = PosConfiguration::rename('POS_SHOW_WEBSITE_URL', 'POS_RECEIPT_SHOW_WEBSITE_URL');
        $success[] = PosConfiguration::rename('POS_SHOW_ADDRESS', 'POS_RECEIPT_SHOW_ADDRESS');
        $success[] = PosConfiguration::rename('POS_SHOW_CITY', 'POS_RECEIPT_SHOW_CITY');
        $success[] = PosConfiguration::rename('POS_SHOW_STATE', 'POS_RECEIPT_SHOW_STATE');
        $success[] = PosConfiguration::rename('POS_SHOW_ZIPCODE', 'POS_RECEIPT_SHOW_ZIPCODE');
        $success[] = PosConfiguration::rename('POS_SHOW_PRODUCT_NAME', 'POS_RECEIPT_SHOW_PRODUCT_NAME');
        $success[] = PosConfiguration::rename('POS_SHOW_PRODUCT_REFERENCE', 'POS_RECEIPT_SHOW_PRODUCT_REF');
        $success[] = PosConfiguration::rename('POS_SHOW_PRODUCT_EAN_JAN', 'POS_RECEIPT_SHOW_EAN_JAN');
        $success[] = PosConfiguration::rename('POS_SHOW_PRODUCT_UPC_BARCODE', 'POS_RECEIPT_SHOW_UPC');
        $success[] = PosConfiguration::rename('POS_SHOW_PRODUCT_COMBINATION', 'POS_RECEIPT_SHOW_COMBINATION');
        $success[] = PosConfiguration::rename('POS_SHOW_PRODUCT_UNIT_PRICE', 'POS_RECEIPT_SHOW_UNIT_PRICE');
        $success[] = PosConfiguration::rename('POS_SHOW_PRODUCT_DISCOUNT', 'POS_RECEIPT_SHOW_PROD_DISCOUNT');
        $success[] = PosConfiguration::rename('POS_SHOW_ORDER_INFO', 'POS_RECEIPT_SHOW_ORDER_INFO');
        $success[] = PosConfiguration::rename('POS_SHOW_CASHIER_ID', 'POS_RECEIPT_SHOW_EMPLOYEE_ID');
        $success[] = PosConfiguration::rename('POS_SHOW_CASHIER_NAME', 'POS_RECEIPT_SHOW_EMPLOYEE_NAME');
        $success[] = PosConfiguration::rename('PS_POS_DEFAULT_ORDER_STATE', 'POS_DEFAULT_ORDER_STATE');
        return array_sum($success) >= count($success);
    }
}
