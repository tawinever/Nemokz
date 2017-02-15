<?php
/**
 * RockPOS - Point of Sale for PrestaShop
 * 
 * @author    Hamsa Technologies
 * @copyright Hamsa Technologies
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

/**
 * Callback: upgrade module to 1.11.6
 * @param HsPointOfSalePro $module
 * @return boolean
 */
function upgrade_module_1_11_6($module)
{
    return $module->upgrade('1.11.6');
}
