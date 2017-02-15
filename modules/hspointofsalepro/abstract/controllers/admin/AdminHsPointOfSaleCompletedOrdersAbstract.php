<?php
/**
 * RockPOS - Point of Sale for PrestaShop
 *
 * @author    Hamsa Technologies
 * @copyright Hamsa Technologies
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

require_once dirname(__FILE__).'/AbstractAdminHsPointOfSaleCommon.php';

/**
 * Controller of admin page - Point Of Sale (Abstract)
 */
class AdminHsPointOfSaleCompletedOrdersAbstract extends AbstractAdminHsPointOfSaleCommon
{
    /**
     * Construct.
     *
     * @see parent::__construct
     */
    public function __construct()
    {
        $this->bootstrap = true;
        $this->table = 'order';
        $this->className = 'Order';
        $this->lang = false;
        $this->explicitSelect = true;
        $this->allow_export = false;
        $this->deleted = false;
        $this->context = Context::getContext();

        $this->shopLinkType = 'shop';
        $this->shopShareDatas = Shop::SHARE_ORDER;

        if (Tools::isSubmit('id_order')) {
            // Save context (in order to apply cart rule)
            $pos_order = new PosOrder((int) Tools::getValue('id_order'));
            $this->context->cart = new PosCart($pos_order->id_cart);
            $this->context->customer = new PosCustomer($pos_order->id_customer);
        }
        parent::__construct();
        $this->buildQuery();
        $this->getFieldList();
    }

    protected function buildQuery()
    {
        $completed_order_references = PosOrder::getCompletedOrderReferences($this->module->name);
        $id_lang = (int) $this->context->language->id;
        $this->_select = '
		a.`id_currency`,
		a.`id_order` AS `id_pdf`,
		CONCAT(LEFT(c.`firstname`, 1), \'. \', c.`lastname`) AS `customer`,		
		os.`color`,		
		IF(a.valid, 1, 0) badge_success';
        $this->_join = '
		LEFT JOIN `'._DB_PREFIX_.'customer` c ON (c.`id_customer` = a.`id_customer`)
		LEFT JOIN `'._DB_PREFIX_.'order_state` os ON (os.`id_order_state` = a.`current_state`)
		LEFT JOIN `'._DB_PREFIX_.'order_state_lang` osl ON (os.`id_order_state` = osl.`id_order_state` AND osl.`id_lang` = '.(int) $id_lang.')';
        $this->_where = 'AND a.`reference` IN ("'.implode('","', $completed_order_references).'")';
        $this->_orderBy = 'id_order';
        $this->_orderWay = 'DESC';
        $this->_use_found_rows = true;
    }

    protected function getFieldList()
    {
        $this->fields_list = array(
            'id_order' => array(
                'title' => $this->module->i18n['id'],
                'align' => 'text-center',
                'class' => 'fixed-width-xs green-text',
            ),
            'reference' => array(
                'title' => $this->module->i18n['reference'],
                'class' => 'green-text',
            ),
            'customer' => array(
                'title' => $this->module->i18n['customer'],
                'havingFilter' => true,
            ),
            'total_paid_tax_incl' => array(
                'title' => $this->module->i18n['total'],
                'align' => 'text-right',
                'type' => 'price',
                'currency' => true,
                'badge_success' => true,
                'remove_onclick' => true,
            ),
            'date_add' => array(
                'title' => $this->module->i18n['date'],
                'align' => 'text-right',
                'type' => 'datetime',
                'filter_key' => 'a!date_add',
                'remove_onclick' => true,
            ),
            'id_pdf' => array(
                'title' => '',
                'align' => 'text-right',
                'callback_object' => 'PosHelper',
                'callback' => 'renderPrintButtons',
                'orderby' => false,
                'search' => false,
                'remove_onclick' => true,
            ),
        );
    }

    /**
     * Disalble add new, export,... on heading button panel.
     *
     * @return type
     */
    public function initToolbar()
    {
    }

    /**
     * Set Media file include when controller called.
     */
    public function setMedia()
    {
        $this->module_media_js = array_merge($this->module_media_js, array(
            'pos_cart.js',
            'pos_order.js',
            'pos_completed_orders.js',
        ));
        $this->module_media_css['receipt.css'] = 'all';
        parent::setMedia();
    }
}
