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

class AdvancedcheckoutPaymentModuleFrontController extends ModuleFrontController
{
    public $display_column_right = false;
    public $ssl = true;
    public function initContent()
    {
        parent::initContent();

        $cart = $this->context->cart;

        require_once(dirname(__FILE__).'/../../classes/Unpay.php');
        $paysistem = new Unpay((int)Tools::getValue('id_unpay'), $this->context->cookie->id_lang);

        if (!Validate::isLoadedObject($paysistem)) {
            return;
        }

        $paysistem->description = str_replace(
            array('%total%'),
            array(Tools::DisplayPrice($cart->getOrderTotal(true, Cart::BOTH))),
            $paysistem->description
        );

        $this->context->smarty->assign(array(
            'nbProducts' => $cart->nbProducts(),
            'paysistem' => $paysistem,
            'this_path' => $this->module->getPathUri(),
            'this_path_ssl' => Tools::getShopDomainSsl(true, true).__PS_BASE_URI__.'modules/'.$this->module->name.'/'
        ));

        $this->setTemplate('payment_execution.tpl');
    }
}
