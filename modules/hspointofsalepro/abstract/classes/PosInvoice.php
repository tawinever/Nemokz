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
class PosInvoice extends Configuration
{
    /**
     * @return string
     */
    public static function getLogoFileName()
    {
        $logo_file_name = '';
        if (PosConfiguration::get('POS_INVOICE_LOGO') && file_exists(_PS_IMG_DIR_ . PosConfiguration::get('POS_INVOICE_LOGO'))) {
            $logo_file_name = PosConfiguration::get('POS_INVOICE_LOGO');
        } elseif (PosConfiguration::get('PS_LOGO_INVOICE') && file_exists(_PS_IMG_DIR_ . PosConfiguration::get('PS_LOGO_INVOICE'))) {
            $logo_file_name = PosConfiguration::get('PS_LOGO_INVOICE');
        } elseif (PosConfiguration::get('PS_LOGO') && file_exists(_PS_IMG_DIR_ . PosConfiguration::get('PS_LOGO'))) {
            $logo_file_name = PosConfiguration::get('PS_LOGO');
        }
        return $logo_file_name;
    }
}
