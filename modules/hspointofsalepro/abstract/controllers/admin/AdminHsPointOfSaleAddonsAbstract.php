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
 * Controller of admin page - Point Of Sale (Abstract)
 */
class AdminHsPointOfSaleAddonsAbstract extends AbstractAdminHsPointOfSaleCommon
{
    /**
     * construct.
     */
    public function __construct()
    {
        $this->bootstrap = true;
        parent::__construct();
    }

    public function initContent()
    {
        parent::initContent();
        $this->context->smarty->assign(array(
            'addons' => $this->formatAddons($this->getAddons()),
            'image_addon_path' => $this->module->getImgPath() . 'modules/',
        ));
    }

    /**
     * Get add addons of module point of sale.
     *
     * @return array
     *               array(<pre>
     *               string => array(), // addon name =>array()
     *               ...
     *               )</pre>
     */
    public function getAddons()
    {
        $addons = array(
            'hsposloyalty' => array(
                'name' => $this->module->i18n['pos_loyalty'],
                'description' => $this->module->i18n['show_loyalty_of_current_customer'],
                'url' => 'http://rockpos.com/addons/2-pos-loyalty.html',
            ),
            'hsposmultiplecarts' => array(
                'name' => $this->module->i18n['pos_multiple_carts'],
                'description' => $this->module->i18n['process_multiple_carts_at_the_same_time'],
                'url' => 'http://rockpos.com/addons/10-pos-multiple-sessions.html',
            ),
            'hsposorderhistory' => array(
                'name' => $this->module->i18n['pos_order_history'],
                'description' => $this->module->i18n['show_order_history_of_current_customer'],
                'url' => 'http://rockpos.com/addons/12-pos-order-history.html',
            ),
            'hsposfilterbycategory' => array(
                'name' => $this->module->i18n['pos_filter_products'],
                'description' => $this->module->i18n['filter_products_by_categories'],
                'url' => 'http://rockpos.com/addons/14-pos-filter-by-categories.html'
            ),
            'hspospaypal' => array(
                'name' => $this->module->i18n['pos_pay_with_paypal_via_email'],
                'description' => $this->module->i18n['send_an_email_requesting_payment_via_paypal'],
                'url' => 'http://rockpos.com/addons/15-pay-with-paypal-via-email.html'
            ),
            'hsposcustomproduct' => array(
                'name' => $this->module->i18n['pos_sell_custom_products'],
                'description' => $this->module->i18n['add_a_custom_product_or_package_and_sell_immediately_in_rockpos'],
                'url' => 'http://rockpos.com/addons/16-rockpos-sell-custom-products.html'
            ),
            'hspossalescommission' => array(
                'name' => $this->module->i18n['pos_sales_commission'],
                'description' => $this->module->i18n['track_sales_commission_for_orders_created_by_rockpos'],
                'url' => 'http://rockpos.com/addons/17-rockpos-sales-commission.html'
            ),
            'hspossalessummary' => array(
                'name' => $this->module->i18n['pos_sales_summary_report'],
                'description' => $this->module->i18n['sales_report_on_daily_wekly_monthly_or_custom_date_basis_pdf_export_supported'],
                'url' => 'http://rockpos.com/addons/18-rockpos-sales-summary-report.html'
            )
        );

        return $addons;
    }

    /**
     * @param array $addons a list of all addons
     *
     * @return array
     * <pre>
     * array(
     *    'addon_name' => array (
     *    'name' => varchar,
     *    'description' => varchar,
     *    'url' => varchar
     *   ),
     *   ...................
     * )
     */
    protected function formatAddons($addons)
    {
        foreach ($addons as $name => &$addon) {
            $addon['status'] = $this->getAddonStatus($name);
            $addon['cta_link'] = $this->getCtaLink($name, $addon);
            $addon['cta_label'] = $this->getCtaLabel($name, $addon['status']);
        }

        return $addons;
    }

    /**
     * Set Media file include when controller called.
     */
    public function setMedia()
    {
        $this->module_media_css['addons.css'] = 'all';
        parent::setMedia();
    }

    /**
     * Get status of an addon.
     *
     * @param string $name
     *
     * @return string
     */
    protected function getAddonStatus($name)
    {
        $module = Module::getInstanceByName($name);
        $status = PosAddon::STATUS_NOT_AVAILABLE;
        if ($module) {
            if (!Module::isInstalled($name)) {
                $status = PosAddon::STATUS_UNINSTALLED;
            } elseif (Module::isEnabled($name)) {
                $status = PosAddon::STATUS_ENABLED;
            } else {
                $status = PosAddon::STATUS_DISABLED;
            }
        }

        return $status;
    }

    /**
     * Get status of an addon.
     *
     * @param string $status
     *
     * @return string
     */
    protected function getCtaLabel($name, $status)
    {
        $module = Module::getInstanceByName($name);
        $label = $this->module->i18n['download_now'];
        if ($module) {
            switch ($status) {
                case PosAddon::STATUS_ENABLED:
                    if (method_exists($module, 'getContent')) {
                        $label = $this->module->i18n['configure'];
                    } else {
                        $label = $this->module->i18n['installed'];
                    }
                    break;

                case PosAddon::STATUS_DISABLED:
                    $label = $this->module->i18n['enable_now'];
                    break;

                case PosAddon::STATUS_UNINSTALLED:
                    $label = $this->module->i18n['install_now'];
                    break;

                default:
                    break;
            }
        }

        return $label;
    }

    /**
     * @param string $name
     * @param array $addon
     *
     * @return string
     */
    protected function getCtaLink($name, array $addon = array())
    {
        $cta_link = $addon['url'];
        $link_admin_modules = $this->context->link->getAdminLink('AdminModules', true);
        $module = Module::getInstanceByName($name);
        if ($module) {
            switch ($addon['status']) {
                case PosAddon::STATUS_ENABLED:
                    if (method_exists($module, 'getContent')) {
                        $cta_link = $link_admin_modules . '&configure=' . urlencode($module->name) . '&tab_module=' . $module->tab . '&module_name=' . urlencode($module->name);
                    } else {
                        $cta_link = '';
                    }
                    break;

                case PosAddon::STATUS_DISABLED:
                    $cta_link = $link_admin_modules . '&module_name=' . urlencode($module->name) . '&enable=1&tab_module=' . $module->tab;
                    break;

                case PosAddon::STATUS_UNINSTALLED:
                    $cta_link = $link_admin_modules . '&install=' . urlencode($module->name) . '&tab_module=' . $module->tab . '&module_name=' . $module->name . '&anchor=' . Tools::ucfirst($module->name);
                    break;

                default:
                    break;
            }
        }

        return $cta_link;
    }
}
