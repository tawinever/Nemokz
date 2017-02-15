<?php
/**
* Module is prohibited to sales! Violation of this condition leads to the deprivation of the license!
*
* @category  Front Office Features
* @package   Advanced Checkout Module
* @author    Maxim Bespechalnih <2343319@gmail.com>
* @copyright 2013-2015 Max
* @license   license.txt in the module folder.
*/

class AdvancedcheckoutValidationModuleFrontController extends ModuleFrontController
{
    public $display_column_left = false;
    public function postProcess()
    {
        $cart = $this->context->cart;

        if ($cart->id_customer == 0 || $cart->id_address_delivery == 0 ||
            $cart->id_address_invoice == 0 || !$this->module->active) {
            Tools::redirect('index.php?controller=order&step=1');
        }

        $customer = new Customer($cart->id_customer);
        if (!Validate::isLoadedObject($customer)) {
            Tools::redirect('index.php?controller=order&step=1');
        }

        $currency = $this->context->currency;
        $total = (float)$cart->getOrderTotal(true, Cart::BOTH);

        require_once(dirname(__FILE__).'/fake.php');
        $paysistem = new Unpay((int)Tools::getValue('id_unpay'), $this->context->cookie->id_lang);
        if (!Validate::isLoadedObject($paysistem)) {
            return;
        }

        $mail_vars =    array(
            '{paysistem_name}' => $paysistem->name
        );

        $or = new AdvOrderCreate();
        $or->name = $this->linkrewrite(Tools::str2url($paysistem->name));
        $or->validateOrder(
            (int)$cart->id,
            $paysistem->id_order_state,
            $total,
            $paysistem->name,
            null,
            $mail_vars,
            (int)$currency->id,
            false,
            ($cart->secure_key ? $cart->secure_key : false)
        );

        if ($paysistem->description_success) {
            $order = new Order($or->currentOrder);
            $description_success = str_replace(
                array('%total%', '%order_number%'),
                array(Tools::DisplayPrice($total), sprintf('#%06d', $order->id)),
                $paysistem->description_success
            );

            if ($this->context->customer->is_guest) {
                $this->context->smarty->assign(array(
                    'id_order' => $order->id,
                    'reference_order' => $order->reference,
                    'id_order_formatted' => sprintf('#%06d', $order->id),
                    'email' => $this->context->customer->email
                ));
                $this->context->customer->logout();
            }
            $params = array();
            $currency = new Currency($order->id_currency);
            $params['total_to_pay'] = $order->getOrdersTotalPaid();
            $params['currency'] = $currency->sign;
            $params['objOrder'] = $order;
            $params['currencyObj'] = $currency;

            $this->context->smarty->assign(array(
                'is_guest' => $this->context->customer->is_guest,
                'HOOK_ORDER_CONFIRMATION' => Hook::exec('displayOrderConfirmation', $params),
                'HOOK_PAYMENT_RETURN' => $description_success
            ));

            $this->setTemplate(_PS_THEME_DIR_.'order-confirmation.tpl');
        } else {
            Tools::redirect(
                'index.php?controller=order-confirmation&id_cart='.(int)$cart->id.'&id_module='.
                (int)$this->module->id.'&id_order='.$this->module->currentOrder.'&key='.$customer->secure_key
            );
        }
    }

    public function setTemplate($default_template)
    {
        if ($this->context->getMobileDevice() != false) {
            $this->setMobileTemplate($default_template);
        } else {
            $template = $this->getOverrideTemplate();
            if ($template) {
                $this->template = $template;
            } else {
                $this->template = $default_template;
            }
        }
    }

    public function linkrewrite($insert)
    {
        $insert = mb_strtolower($insert);    // Если работаем с юникодными строками
        $insert = Tools::strtolower($insert);
        $replase = array(
        // Буквы
        'а'=>'a',
        'б'=>'b',
        'в'=>'v',
        'г'=>'g',
        'д'=>'d',
        'е'=>'e',
        'ё'=>'yo',
        'ж'=>'zh',
        'з'=>'z',
        'и'=>'i',
        'й'=>'j',
        'к'=>'k',
        'л'=>'l',
        'м'=>'m',
        'н'=>'n',
        'о'=>'o',
        'п'=>'p',
        'р'=>'r',
        'с'=>'s',
        'т'=>'t',
        'у'=>'u',
        'ф'=>'f',
        'х'=>'h',
        'ц'=>'c',
        'ч'=>'ch',
        'ш'=>'sh',
        'щ'=>'shh',
        'ъ'=>'j',
        'ы'=>'y',
        'ь'=>'',
        'э'=>'e',
        'ю'=>'yu',
        'я'=>'ya',
        ' '=>'_',
        ' - '=>'_',
        '-'=>'_',
        '.'=>'',
        ':'=>'',
        ';'=>'',
        ','=>'',
        '!'=>'',
        '?'=>'',
        '>'=>'',
        '<'=>'',
        '&'=>'',
        '*'=>'',
        '%'=>'',
        '$'=>'',
        '"'=>'',
        '\''=>'',
        '('=>'',
        ')'=>'',
        '`'=>'',
        '+'=>'',
        '/'=>'',
        '\\'=>'',
        );
        $insert = preg_replace('/  +/', ' ', $insert); // Удаляем лишние пробелы
        $insert = strtr($insert, $replase);
        return $insert;
    }
}
