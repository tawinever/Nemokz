<?php
/**
 * RockPOS - Point of Sale for PrestaShop
 *
 * @author    Hamsa Technologies
 * @copyright Hamsa Technologies
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

/**
 * PosConstants for Point of Sale
 */
class PosConstants
{
    const INVOICE_LOGO_PREFIX       = 'pos_invoice_logo';
    const INVOICE_LOGO_MAX_HEIGHT   = 70; // In pixel
    const RECEIPT_LOGO_PREFIX       = 'pos_receipt_logo';
    const RECEIPT_LOGO_MAX_HEIGHT   = 40; // In pixel
    const RECEIPT_PREFIX            = 'SR_';
    const PAGE_SIZE_A4              = 'A4';
    const PAGE_SIZE_A5              = 'A5';
    const PAGE_SIZE_LETTER          = 'LETTER';
    const PAGE_SIZE_K80             = 'K80';
    const PAGE_SIZE_K57             = 'K57';
    const ORIENTATION_PORTRAIT      = 'P';
    const ORIENTATION_LANDSCAPE     = 'L';
    const NOT_AVAILABLE             = 'N/A';
    const DEFAULT_POSTCODE          = '00000';
    const DEFAULT_PHONE_NUMBER      = '0000000000';
    const LINK_TO_ADDON_PAGE        = 'http://addons.prestashop.com/en/ratings.php';
    const LINK_TO_PRESTAMONSTER     = 'http://addons.prestashop.com/en/89_prestamonster';
    const DISCOUNT_TYPE_PERCENTAGE  = 'percentage';
    const DISCOUNT_TYPE_AMOUNT      = 'amount';
    const DISCOUNT_TYPE_VOUCHER     = 'voucher';
    const DISCOUNT_DURATION_ORDER   = 864000; //10 days x 24 hours x 60 minutes x 60 seconds
    const DISCOUNT_DURATION_PRODUCT = 864000; //10 days x 24 hours x 60 minutes x 60 seconds
    const PRODUCT_PRICE_TYPE        = 'price';
    const DURATION_TODAY            = 'today';
    const DURATION_YESTERDAY        = 'yesterday';
    const DURATION_LAST_7_DAYS      = 'last_7_days';
    const DURATION_LAST_WEEK        = 'last_week';
    const DURATION_LAST_MONTH       = 'last_month';
    const DURATION_LAST_12_MONTHS   = 'last_12_months';
    const DURATION_CUSTOM_DATES     = 'custom_dates';
    const ADDRESS_ALIAS             = 'RockPOS';
}
