<?php
/**
 * RockPOS - Point of Sale for PrestaShop
 *
 * @author    Hamsa Technologies
 * @copyright Hamsa Technologies
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

require_once dirname(__FILE__) . '/AdminHsPointOfSaleNewSaleAbstract.php';

/**
 * 
 */
class AdminHsPointOfSaleNewSalePaymentAbstract extends AdminHsPointOfSaleNewSaleAbstract
{

    public function ajaxProcessAdd()
    {
        $id_pos_payment = (int) Tools::getValue('id_pos_payment', null);
        if (empty($id_pos_payment)) {
            $this->ajax_json['message'] = $this->module->i18n['cannot_get_payment_id'];
            return;
        }
        $amount = Tools::ps_round((float) Tools::getValue('amount', null), $this->context->currency->decimals * _PS_PRICE_DISPLAY_PRECISION_);
        $reference = Tools::getValue('reference');
        $amount_due = $this->context->cart->getAmountDue($this->context->currency->decimals * _PS_PRICE_DISPLAY_PRECISION_);
        $given_money = Tools::getValue('given_money');
        $change = ((float) $given_money - (float) $amount_due) > 0 ? ((float) $given_money - (float) $amount_due) : 0;
        if ($amount > 0 && $amount <= $amount_due) {
            if ($this->context->cart->addPayment($id_pos_payment, $amount, $reference, null, $given_money, $change)) {
                $this->ajax_json['success'] = true;
                $this->render();
                return;
            }
        }
        $this->ajax_json['message'] = $this->module->i18n['cannot_add_a_new_payment'];
    }

    public function ajaxProcessRemove()
    {
        $id_pos_cart_payment = (int) Tools::getValue('id_pos_cart_payment', null);
        if (empty($id_pos_cart_payment)) {
            $this->ajax_json['message'] = $this->module->i18n['cannot_get_payment_id'];
            return;
        }
        if ($this->context->cart->removePayment($id_pos_cart_payment)) {
            $this->ajax_json['success'] = true;
            $this->render();
        } else {
            $this->ajax_json['message'] = $this->module->i18n['cannot_remove_this_payment'];
        }
    }

    protected function render()
    {
        parent::render();
        $this->renderBlockAmountDue();
        $this->context->smarty->assign(array(
            'pos_order_states' => PosOrderState::getSelectedOrderStates((int) $this->context->language->id),
            'default_order_state' => $this->module->getDefaultOrderState()
        ));
        $this->ajax_json['data']['payment'] = $this->context->smarty->fetch(_PS_MODULE_DIR_ . $this->module->name . '/abstract/views/templates/admin/hs_point_of_sale_new_sale_abstract/list_paid_payments.tpl');
        $this->ajax_json['data']['orderStatus'] = $this->context->smarty->fetch(_PS_MODULE_DIR_ . $this->module->name . '/abstract/views/templates/admin/hs_point_of_sale_new_sale_abstract/order_status.tpl');
    }
}
