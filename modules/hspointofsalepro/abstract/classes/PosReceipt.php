<?php
/**
 * RockPOS - Point of Sale for PrestaShop
 *
 * @author    Hamsa Technologies
 * @copyright Hamsa Technologies
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

/**
 * @todo: This class should not exist. Instead, let's move to a meaningful model.
 */
class PosReceipt extends Configuration
{
    /**
     * Get address : address 1, city name.
     *
     * @param int $id_shop
     *
     * @return type
     */
    public static function getAddress($id_shop)
    {
        $address1 = self::get('POS_RECEIPT_SHOW_ADDRESS') ? self::get('PS_SHOP_ADDR1', null, null, $id_shop) : '';
        $city = self::get('POS_RECEIPT_SHOW_CITY') ? self::get('PS_SHOP_CITY', null, null, $id_shop) : '';
        $address = array();
        if (!empty($address1)) {
            $address[] = $address1;
        }
        if (!empty($city)) {
            $address[] = $city;
        }
        $state = self::get('POS_RECEIPT_SHOW_STATE') ? State::getNameById(self::get('PS_SHOP_STATE_ID', null, null, $id_shop)) : '';
        $zipcode = self::get('POS_RECEIPT_SHOW_ZIPCODE') ? self::get('PS_SHOP_CODE', null, null, $id_shop) : '';
        if (!empty($state)) {
            $address[] = $state;
        }
        if (!empty($zipcode)) {
            $address[] = $zipcode;
        }

        return implode(', ', $address);
    }

    /**
     * @param int $id_shop
     *
     * @return string
     */
    public static function getPhoneNumber($id_shop)
    {
        return self::get('POS_RECEIPT_SHOW_PHONE') ? self::get('PS_SHOP_PHONE', null, null, $id_shop) : '';
    }

    /**
     * @param int $id_shop
     *
     * @return string
     */
    public static function getFaxNumber($id_shop)
    {
        return self::get('POS_RECEIPT_SHOW_FAX') ? self::get('PS_SHOP_FAX', null, null, $id_shop) : '';
    }

    /**
     * @param int $id_shop
     *
     * @return string
     */
    public static function getTaxCodeNumber($id_shop)
    {
        return self::get('POS_RECEIPT_SHOW_REG_NUMBER') ? self::get('PS_SHOP_DETAILS', null, null, $id_shop) : '';
    }

    /**
     * @param int $id_shop
     *
     * @return boolean
     */
    public static function getShopName($id_shop)
    {
        return (bool) self::get('PS_SHOP_NAME', null, null, $id_shop);
    }

    public static function getMessageOnReceipt()
    {
        return self::get('POS_RECEIPT_FOOTER_TEXT');
    }

    /**
     * @param int $id_shop
     *
     * @return string
     */
    public static function getShopUrl($id_shop)
    {
        $shop_url = '';
        if (self::get('POS_RECEIPT_SHOW_WEBSITE_URL')) {
            $shop = new PosShop((int) $id_shop);
            $shop_url = Validate::isLoadedObject($shop) ? $shop->domain : '';
        }

        return $shop_url;
    }

    /**
     * @return string
     */
    public static function showLogo()
    {
        return self::get('POS_RECEIPT_SHOW_LOGO');
    }

    /**
     * @return string
     */
    public static function getLogoFileName()
    {
        $logo_file_name = '';
        if (PosConfiguration::get('POS_RECEIPT_LOGO') && file_exists(_PS_IMG_DIR_ . PosConfiguration::get('POS_RECEIPT_LOGO'))) {
            $logo_file_name = PosConfiguration::get('POS_RECEIPT_LOGO');
        } elseif (PosConfiguration::get('PS_LOGO') && file_exists(_PS_IMG_DIR_ . PosConfiguration::get('PS_LOGO'))) {
            $logo_file_name = PosConfiguration::get('PS_LOGO');
        }
        return $logo_file_name;
    }
}
