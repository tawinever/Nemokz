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
class CartController extends CartControllerCore
{
    /*
    * module: advancedcheckout
    * date: 2016-11-30 19:49:55
    * version: 3.1.7
    */
    public function displayAjax()
    {
        if ($this->errors) {
            die(Tools::jsonEncode(array('hasError' => true, 'errors' => $this->errors)));
        }
        $this->context->cookie->write();
        if (Tools::getIsset('summary')) {
            $result = array();
            Cart::addExtraCarriers($result);
            $result['summary'] = $this->context->cart->getSummaryDetails(null, true);
            $result['customizedDatas'] = Product::getAllCustomizedDatas($this->context->cart->id, null, true);
            $result['HOOK_SHOPPING_CART'] = Hook::exec('displayShoppingCartFooter', $result['summary']);
            $result['HOOK_SHOPPING_CART_EXTRA'] = Hook::exec('displayShoppingCart', $result['summary']);
            foreach ($result['summary']['products'] as &$product) {
                $product['quantity_without_customization'] = $product['quantity'];
                $test_ = $result['customizedDatas'][(int)$product['id_product']][(int)$product['id_product_attribute']];
                if ($result['customizedDatas'] && isset($test_)) {
                    foreach ($test_ as $addresses) {
                        foreach ($addresses as $customization) {
                            $product['quantity_without_customization'] -= (int)$customization['quantity'];
                        }
                    }
                }
                $product['price_without_quantity_discount'] = Product::getPriceStatic(
                    $product['id_product'],
                    !Product::getTaxCalculationMethod(),
                    $product['id_product_attribute'],
                    6,
                    null,
                    false,
                    false
                );
                if (isset($product['reduction_type']) && $product['reduction_type'] == 'amount') {
                    $reduction = (float)$product['price_wt'] - (float)$product['price_without_quantity_discount'];
                    $product['reduction_formatted'] = Tools::displayPrice($reduction);
                }
            }
            if ($result['customizedDatas']) {
                Product::addCustomizationPrice($result['summary']['products'], $result['customizedDatas']);
            }
            $m = Module::getInstanceByName('advancedcheckout');
            $clo = $m->CartListErrors();
            $result['adv'] = array(
                'err' => $clo['html'],
                'err_isset' => count($clo['err']),
                'arr' => $clo['arr']
            );
            $json = '';
            Hook::exec('actionCartListOverride', array('summary' => $result, 'json' => &$json));
            die(Tools::jsonEncode(array_merge($result, (array)Tools::jsonDecode($json, true))));
        } elseif (file_exists(_PS_MODULE_DIR_.'/blockcart/blockcart-ajax.php')) {
            require_once(_PS_MODULE_DIR_.'/blockcart/blockcart-ajax.php');
        }
    }
}
