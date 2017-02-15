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
class PosCurrency extends Currency
{
    /**
     * Get all currency active.
     *
     * @return array
     *               <pre>
     *               Array(<pre>
     *               [0] => Array (
     *               [id_currency] => 2
     *               [name] => Euro
     *               [iso_code] => EUR
     *               [iso_code_num] => 978
     *               [sign] => €
     *               [blank] => 0
     *               [format] => 1
     *               [decimals] => 0
     *               [conversion_rate] => 0.732650
     *               [deleted] => 0
     *               [active] => 1 )
     *               ...
     *
     * )
     */
    public static function getPosCurrencies()
    {
        $sql = 'SELECT * FROM `'._DB_PREFIX_.'currency` WHERE `active` = 1 AND `deleted` = 0;';

        return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
    }
}
