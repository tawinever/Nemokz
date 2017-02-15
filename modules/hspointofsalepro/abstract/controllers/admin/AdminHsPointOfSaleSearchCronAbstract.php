<?php
/**
 * RockPOS - Point of Sale for PrestaShop
 *
 * @author    Hamsa Technologies
 * @copyright Hamsa Technologies
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

require_once dirname(__FILE__) . '/AbstractAdminHsPointOfSaleCommon.php';

/**
 * Controller of admin page - Point Of Sale
 */
class AdminHsPointOfSaleSearchCronAbstract extends AbstractAdminHsPointOfSaleCommon
{
    public function processIndex()
    {
        $full = (bool) Tools::getValue('full', 0);
        $search_index = new PosSearchIndex($full);
        $search_index->run();
        Tools::redirectAdmin($this->context->link->getAdminLink($this->module->pos_tabs['AdminHsPointOfSalePreferences']['tab_class']) . '&currentFormTab=product&conf=4');
    }
}
