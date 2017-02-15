<?php
/**
 * RockPOS - Point of Sale for PrestaShop
 * 
 * @author    Hamsa Technologies
 * @copyright Hamsa Technologies
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

/**
 * Callback: upgrade module to 2.3.14
 * @param HsPointOfSalePro $module
 * @return boolean
 */
function upgrade_module_2_3_14($module)
{
    return $module->upgrade('2.3.14');
}
