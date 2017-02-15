<?php
/**
 * RockPOS - Point of Sale for PrestaShop
 *
 * @author    Hamsa Technologies
 * @copyright Hamsa Technologies
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

/**
 * A dedicated helper for POS elements
 */
class PosHelper
{
    /**
     * Render print buttons.
     *
     * @param string $id_order   id order
     * @param array  $order_data
     *                           <pre>
     *                           array (
     *                           [id_order] => int,
     *                           [reference] => string,
     *                           [total_paid_tax_incl] => float,
     *                           [date_add] => datetime,
     *                           [id_currency] => int,
     *                           [id_pdf] => int,
     *                           [customer] => string,
     *                           [color] => string,
     *                           [badge_success] => 1
     *                           )     
     *
     * @return HTML
     */
    public static function renderPrintButtons($id_order)
    {
        $context = Context::getContext();
        $html = '';
        if (isset($context->controller->module) && $context->controller->module->i18n) {
            $order = new Order($id_order);
            $html .= '<div class="receipt">';
            $html .= '<div class="control">';
            $html .= '<button type="button" rel="' . $id_order . '" class="btn btn-primary pos-button print_receipt"><i class="icon-print"></i> ' . $context->controller->module->i18n['receipt'] . '</button>';
            if ($order->hasInvoice()) {
                $html .= '<button type="button" rel="' . $id_order . '" class="btn btn-primary pos-button print_invoice"><i class="icon-print"></i> ' . $context->controller->module->i18n['invoice'] . '</button>';
            }
            $html .= '</div>';
            $html .= '</div>';
        }
        return $html;
    }

    /**
     * render amount paid.
     *
     * @param int   $paid
     * @param array $order_fields
     *
     * @return html
     */
    public static function renderOrderPaid($paid, $order_fields)
    {
        $order = new Order((int) $order_fields['id_order']);

        return '<span class="paid">'.Tools::displayPrice($paid, (int) $order->id_currency).'</span>';
    }

    /**
     * Render amount unpaid.
     *
     * @param int   $id_order
     * @param array $order_fields
     *
     * @return html
     */
    public static function renderOrderUnpaid($id_order, $order_fields)
    {
        $order = new Order((int) $id_order);
        $un_paid = ($order_fields['total_paid_tax_incl'] - $order_fields['paid']);
        $class_css = $un_paid > 0 ? 'badge-danger' : 'badge-success';

        return '<span class="badge '.$class_css.' unpaid">'.Tools::displayPrice($un_paid, (int) $order->id_currency).'</span>';
    }

    /**
     * render list payment methods.
     *
     * @param string $id_order
     * @param array  $order_fields
     *
     * @return html
     */
    public static function renderPaymentMethods($id_order, $order_fields)
    {
        $currency = new Currency((int)$order_fields['id_currency']);
        $context = Context::getContext();
        $pos_module = Module::getInstanceByName(PosConfiguration::getModuleName());
        $amount_due = ($order_fields['total_paid_tax_incl'] - $order_fields['paid']);
        $payments = PosPayment::getPosPayments((int) $context->language->id, (int) $context->shop->id);
        $html_payment = '<select name="payment_method" class="payment_method">';
        foreach ($payments as $payment) {
            $html_payment .= '<option value="'.$payment['id_pos_payment'].'" >'.$payment['payment_name'].'</option>';
        }
        $html_payment .= '</select>';
        $html_payment .= '<button data-id-order-amount="'.$id_order.'_'.$amount_due.'"  data-order-reference = "'.$order_fields['reference'].'" data-currency-format = "'.$currency->format.'" data-currency-sign = "'.$currency->sign.'" name="amount_due" type="button" class="btn btn-primary pos-button_pay add_amount_due"> <i class="icon-AdminParentOrders"></i> '.$pos_module->i18n['pay'].'</button>';

        return $html_payment;
    }

    /**
     * Display input add amount due.
     *
     * @param int   $id_order
     * @param array $order_fields
     *
     * @return html
     */
    public static function renderAmountDue($id_order, $order_fields)
    {
        $pos_module = Module::getInstanceByName(PosConfiguration::getModuleName());
        $amount_due = $order_fields['total_paid_tax_incl'] - $order_fields['paid'];
        $currency = new Currency($order_fields['id_currency']);
        $amount_due_formated = number_format($amount_due, $pos_module->getDecimal($currency));

        return '<input style="max-width:80px;"  class="amount_due order_'.$id_order.'" name="amount_due" value="'.$amount_due_formated.'" />';
    }

    /**
     * render button add amount due.
     *
     * @param string $id_order
     * @param array  $order_fields
     *
     * @return html
     */
    public static function renderButtonAddAmountDue($id_order, $order_fields)
    {
        $pos_module = Module::getInstanceByName(PosConfiguration::getModuleName());
        $amount_due = ($order_fields['total_paid_tax_incl'] - $order_fields['paid']);
        $disable = $amount_due > 0 ? '' : 'disabled="disabled"';
        $html = '<button rel="'.$id_order.'" name="amount_due" style="margin-left:5px;" type="button" class="btn btn-default view_summary pos_button"><i class="icon-search-plus"></i> '.$pos_module->i18n['view'].'</button>';
        $html .= '<button rel="'.$id_order.'" '.$disable.' name="amount_due" style="margin-left:5px;" type="button" class="btn btn-default print_receipt pos_button"><i class="icon-print"></i> '.$pos_module->i18n['print'].'</button>';

        return $html;
    }
}
