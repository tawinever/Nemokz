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
class PosUpgrader2411 extends PosUpgrader
{
    /**
     *
     * @var array
     */
    protected $hooks_to_register = array(
        'posAddToCart'
    );
}
