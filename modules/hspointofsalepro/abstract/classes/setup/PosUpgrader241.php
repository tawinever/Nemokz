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
class PosUpgrader241 extends PosUpgrader
{
    /**
     * @see parent::$hooks_to_register
     */
    protected $hooks_to_register = array(
        'actionCarrierUpdate'
    );
    
    /**
     * @see parent::$configuration_keys_to_uninstall
     */
    protected $configuration_keys_to_uninstall = array(
        'POS_SEARCH_ACTIVE_CATEGORIES'
    );

    /**
     * @return boolean
     */
    protected function installConfigs()
    {
        $success = array();
        $success[] = parent::installConfigs();
        $old_configuration_keys = array(
            'POS_SEARCH_ACTIVE_PRODUCTS',
            'PS_POS_RECEIPT_MARGIN'
        );
        $new_configuration_keys = array(
            'POS_ORDER_DISABLED_PRODUCTS',
            'POS_RECEIPT_MARGIN'
        );
        $success[] = PosConfiguration::renameMultiple($old_configuration_keys, $new_configuration_keys);
        $success[] = PosConfiguration::updateValue('POS_ORDER_DISABLED_PRODUCTS', !PosConfiguration::get('POS_ORDER_DISABLED_PRODUCTS'));
        return array_sum($success) >= count($success);
    }

    /**
     * @return boolean
     */
    protected function installTables()
    {
        $success = array();
        $success[] = PosObjectModel::renameTable('pospayment', 'pos_payment'); // Check deprecation in PosPayment::resetPositions()
        $success[] = PosObjectModel::renameTable('pospayment_lang', 'pos_payment_lang');
        $success[] = PosObjectModel::renameTable('pospayment_shop', 'pos_payment_shop');
        $success[] = PosObjectModel::renameTable('cart_pospayment', 'pos_cart_payment'); // Check deprecation in HsPointOfSaleInstaller::updateGivenMoney()
        $success[] = PosObjectModel::renameTable('posorders', 'pos_orders'); // Check deprecation in PosOrder::syncOldPosOrders()
        if (array_sum($success) >= count($success)) {
            $success[] = PosObjectModel::renameColumn('pos_payment', 'id_pospayment', 'id_pos_payment');
            $success[] = PosObjectModel::renameColumn('pos_payment_lang', 'id_pospayment', 'id_pos_payment');
            $success[] = PosObjectModel::renameColumn('pos_payment_shop', 'id_pospayment', 'id_pos_payment');
            $success[] = PosObjectModel::renameColumn('pos_cart_payment', 'id_cart_pospayment', 'id_pos_cart_payment');
            $success[] = PosObjectModel::renameColumn('pos_cart_payment', 'id_pospayment', 'id_pos_payment');
        }
        return array_sum($success) >= count($success);
    }

    /**
     * 
     * @return boolean
     */
    protected function installTabs()
    {
        $success = array();
        $success[] = $this->installTab($this->module->pos_tabs['AdminHsPointOfSaleNewSalePayment']);
        if (array_sum($success) >= count($success)) {
            $success[] = PosTab::copyAccesses($this->module->pos_tabs['AdminHsPointOfSaleNewSale']['tab_class'], $this->module->pos_tabs['AdminHsPointOfSaleNewSalePayment']['tab_class']);
        }
        $success[] = $this->installTab($this->module->pos_tabs['AdminHsPointOfSaleReports']);
        if (array_sum($success) >= count($success)) {
            $id_report_tab = Tab::getIdFromClassName($this->module->pos_tabs['AdminHsPointOfSaleReports']['tab_class']);
            $success[] = PosTab::updateTabPosition($id_report_tab, $this->module->pos_tabs['AdminHsPointOfSaleReports']['position']-1);
            $success[] = PosTab::resetPositions($this->module->name);
            $success[] = PosTab::copyAccesses($this->module->pos_tabs['AdminHsPointOfSaleDashboard']['tab_class'], $this->module->pos_tabs['AdminHsPointOfSaleReports']['tab_class']);
        }
        return array_sum($success) >= count($success);
    }

    /**
     * 
     * @return boolean
     */
    protected function installOthers()
    {
        $success = array();
        if (Tools::version_compare($this->module->getInstalledVersion(), '2.4.0', '<')) {
            $success[] = PosPayment::addInstallmentPayment();
        }
        return array_sum($success) >= count($success);
    }

    /**
     * 
     * @return boolean
     */
    protected function cleanUpFiles()
    {
        $files = array(
            'abstract/controllers/admin/AdminHsPointOfSaleNewSaleAbstract.php',
        );
        return PosFile::deleteFiles($this->module->getLocalPath(), $files);
    }
}
