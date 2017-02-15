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
class AdminHsPointOfSalePartialPaymentAbstract extends AbstractAdminHsPointOfSaleCommon
{
    /**
     * construct.
     */
    public function __construct()
    {
        $this->bootstrap = true;
        $this->table = 'order';
        $this->className = 'Order';
        $this->lang = false;

        $this->explicitSelect = true;
        $this->allow_export = true;
        $this->deleted = false;
        $this->context = Context::getContext();
        $statuses = OrderState::getOrderStates((int) $this->context->language->id);
        foreach ($statuses as $status) {
            $this->statuses_array[$status['id_order_state']] = $status['name'];
        }

        parent::__construct();
        $this->buildQuery();
        $this->getFieldList();
    }

    protected function getFieldList()
    {
        $this->fields_list = array(
            'id_order' => array(
                'title' => $this->module->i18n['id'],
                'align' => 'text-center',
                'class' => 'fixed-width-xs',
            ),
            'reference' => array(
                'title' => $this->module->i18n['reference'],
                'class' => 'fixed-width-xs',
            ),
            'customer' => array(
                'title' => $this->module->i18n['customer'],
                'havingFilter' => true,
            ),
            'date_add' => array(
                'title' => $this->module->i18n['date'],
                'align' => 'text-right',
                'class' => 'fixed-width-lg',
                'type' => 'datetime',
                'filter_key' => 'a!date_add',
            ),
            'payment' => array(
                'title' => $this->module->i18n['payment'],
                'align' => 'text-right',
                'class' => 'fixed-width-sm',
            ),
            'total_paid_tax_incl' => array(
                'title' => $this->module->i18n['total'],
                'align' => 'text-right',
                'type' => 'price',
                'currency' => true,
                'class' => 'fixed-width-sm',
            ),
            'paid' => array(
                'title' => $this->module->i18n['paid'],
                'align' => 'text-right',
                'type' => 'price',
                'currency' => true,
                'callback_object' => 'PosHelper',
                'callback' => 'renderOrderPaid',
                'class' => 'fixed-width-sm',
            ),
            'un_paid' => array(
                'title' => $this->module->i18n['un_paid'],
                'align' => 'text-right',
                'type' => 'price',
                'currency' => true,
                'callback_object' => 'PosHelper',
                'callback' => 'renderOrderUnpaid',
                'class' => 'fixed-width-sm',
            ),
            'amount' => array(
                'title' => $this->module->i18n['amount'],
                'align' => 'text-right',
                'type' => 'text',
                'callback_object' => 'PosHelper',
                'callback' => 'renderAmountDue',
                'class' => 'fixed-width-sm',
                'remove_onclick' => true,
                'orderby' => false,
                'search' => false,
            ),
            'pm_methods' => array(
                'title' => $this->module->i18n['pay_now'],
                'align' => 'text-center',
                'type' => 'text',
                'callback_object' => 'PosHelper',
                'callback' => 'renderPaymentMethods',
                'class' => 'fixed-width-xxl_custom',
                'orderby' => false,
                'remove_onclick' => true,
                'search' => false,
            ),
            'shop_name' => array(
                'title' => $this->module->i18n['shop'],
                'align' => 'text-center',
                'type' => 'text',
                'search' => false,
                'remove_onclick' => true,
            ),
            'button_add' => array(
                'title' => '',
                'align' => 'text-right',
                'type' => 'text',
                'callback_object' => 'PosHelper',
                'callback' => 'renderButtonAddAmountDue',
                'class' => 'fixed-width-lg',
                'orderby' => false,
                'remove_onclick' => true,
                'search' => false,
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
     * @see parent::setMedia()
     */
    public function setMedia()
    {
        $this->module_media_css['partial_payment.css'] = 'all';
        $this->module_media_css['receipt.css'] = 'all';
        $this->module_media_css['jquery.confirm.css'] = 'all';
        $this->module_media_js = array_merge($this->module_media_js, array(
            'pos_partial_payment.js',
            'jquery.confirm.js',
            'pos_order.js'
        ));
        parent::setMedia();
    }

    protected function buildQuery()
    {
        $this->_select = '
		a.`id_currency`,
		a.`id_order` AS `id_pdf`,
		a.`id_order` AS `un_paid`,
		a.`id_order` AS `pm_methods`,
		a.`id_order` AS `amount`,
		a.`id_order` AS `button_add`,
		a.`total_paid_real` AS `paid`,
		CONCAT(LEFT(c.`firstname`, 1), \'. \', c.`lastname`) AS `customer`,
                s.`name` AS `shop_name`, 
		os.`color`';

        $this->_join = '
		INNER JOIN `'._DB_PREFIX_.'pos_orders` po ON (po.`id_pos_order` = a.`id_order`)
		LEFT JOIN `'._DB_PREFIX_.'customer` c ON (c.`id_customer` = a.`id_customer`)
		LEFT JOIN `'._DB_PREFIX_.'order_state` os ON (os.`id_order_state` = a.`current_state`)
		LEFT JOIN `'._DB_PREFIX_.'shop` s ON (a.`id_shop` = s.`id_shop`)
		LEFT JOIN `'._DB_PREFIX_.'order_state_lang` osl ON (os.`id_order_state` = osl.`id_order_state` AND osl.`id_lang` = '.(int) $this->context->language->id.')';
        $this->_where = 'AND a.`total_paid_tax_incl` <> a.`total_paid_real` AND a.`current_state` = '.Configuration::get('POS_RECEIPT_DEFAULT_ORDER_STATE');
        $this->_where .= Shop::addSqlRestriction(Shop::SHARE_ORDER, 'a');
        $this->_orderBy = 'id_order';
        $this->_orderWay = 'DESC';
        $this->_use_found_rows = true;
    }

    /**
     * Process add amount.
     */
    public function ajaxProcessAddPartialPayment()
    {
        $id_order = (int) Tools::getValue('id_order');
        $id_payment_method = (int) Tools::getValue('id_payment_method');
        $amount = (float) Tools::getValue('amount');
        $order = new PosOrder($id_order);
        if (!Validate::isLoadedObject($order)) {
            $this->ajax_json['message'] = Tools::displayError('The order cannot be found');
            exit;
        }
        $pos_cart = new PosCart((int) $order->id_cart);
        if (!Validate::isLoadedObject($pos_cart)) {
            $this->ajax_json['message'] = Tools::displayError('The cart cannot be found');
            exit;
        }
        $pos_payment = new PosPayment((int) $id_payment_method, (int) $order->id_lang);
        if (!Validate::isLoadedObject($pos_payment)) {
            $this->ajax_json['message'] = Tools::displayError('The payment method cannot be found');
            exit;
        }
        if (!$this->tabAccess['edit'] === '1') {
            $this->ajax_json['message'] = Tools::displayError('You do not have permission to edit this.');
            exit;
        }
        if (!Validate::isNegativePrice($amount) || !(float) $amount) {
            $this->ajax_json['message'] = Tools::displayError('The amount is invalid.');
        } elseif (!Validate::isGenericName(Tools::getValue('payment_method'))) {
            $this->ajax_json['message'] = Tools::displayError('The selected payment method is invalid.');
        }
        if (count($this->ajax_json['message'] == 0)) {
            $currency = new Currency((int) $order->id_currency);

            $order_invoice = $order->hasInvoice() ? $order->getInvoicesCollection()->getFirst() : null;
            if ($order->addOrderPayment($amount, $pos_payment->payment_name, Tools::getValue('payment_transaction_id'), $currency, date('Y-m-d H:i:s'), $order_invoice)) {
                $this->context->cart = $pos_cart;
                $pos_cart->addPayment($id_payment_method, $amount, $order->reference, null, $amount);
                $amount_due = Tools::ps_round($order->total_paid_tax_incl - $pos_cart->getPaidAmount(), $this->module->getDecimal($currency));

                if ($amount_due == 0) {
                    $order->setInvoice(true);
                    // update order states
                    $this->updateOrderState($order);
                }
                $this->ajax_json['success'] = true;
                $this->ajax_json['data']['amountDue'] = number_format($amount_due, $this->module->getDecimal($currency));
                $this->ajax_json['data']['paid'] = Tools::displayPrice($order->total_paid_real, $currency);
                $this->ajax_json['data']['amountDueWitdCurrency'] = Tools::displayPrice($amount_due, $currency);
                $this->ajax_json['data']['viewReceipt'] = $this->renderOrderSummary($id_order);
            } else {
                $this->ajax_json['message'] = Tools::displayError('An error occurred during payment.');
            }
        }
    }
    
    /**
     * Process view summary partial payment.
     */
    public function ajaxProcessViewSummary()
    {
        $id_order = (int) Tools::getValue('id_order');
        $order = new PosOrder($id_order);
        if (!Validate::isLoadedObject($order)) {
            $this->ajax_json['message'] = Tools::displayError('The order cannot be found');
            exit;
        }
        if (count($this->ajax_json['message'] == 0)) {
            $this->ajax_json['success'] = true;
            $this->ajax_json['data']['viewReceipt'] = $this->renderOrderSummary($id_order);
        }
    }

    /**
     * Update order status after completing payment amount due.
     *
     * @param Order $order
     *
     * @return boolean
     */
    protected function updateOrderState($order)
    {
        if (!Validate::isLoadedObject($order)) {
            return;
        }
        $order->current_state = $this->module->getDefaultOrderState();

        return $order->update();
    }
}
