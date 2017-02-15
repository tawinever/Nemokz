<?php
/**
 * RockPOS - Point of Sale for PrestaShop
 * 
 * @author    Hamsa Technologies
 * @copyright Hamsa Technologies
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

/**
 * Callback: upgrade module to 2.2.2
 * @param HsPointOfSalePro $module
 * @return boolean
 */
function upgrade_module_2_2_2($module)
{
    return $module->upgrade('2.2.2');
}
