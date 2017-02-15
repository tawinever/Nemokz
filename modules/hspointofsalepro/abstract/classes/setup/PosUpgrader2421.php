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
class PosUpgrader2421 extends PosUpgrader
{
    /**
     * @see parent::$configuration_keys_to_uninstall
     */
    protected $configuration_keys_to_uninstall = array(
        'POS_SHOW_COMBINATION'
    );
}
