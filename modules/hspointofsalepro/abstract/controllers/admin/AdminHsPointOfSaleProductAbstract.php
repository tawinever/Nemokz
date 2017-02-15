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

class AdminHsPointOfSaleProductAbstract extends AbstractAdminHsPointOfSaleCommon
{
    /**
     * Search for product(s).
     */
    public function ajaxProcessSearch()
    {
        $id_shop = $this->context->shop->id;
        if (!empty($id_shop)) {
            $this->ajax_json['success'] = true;
        }

        if ($this->ajax_json['success']) {
            $id_categories = Tools::getValue('id_categories', array());

            $product_keyword = Tools::replaceAccentedChars(urldecode(Tools::getValue('keyword')));
            $products = PosSearchAction::searchProducts((int) $this->context->language->id, $id_shop, $product_keyword, $id_categories);
            if (!empty($products)) {
                foreach ($products as &$product) {
                    if ((int) $product['quantity'] === 0) {
                        $product['stock'] = $this->module->i18n['out_of_stock'];
                        $product['item'] = '';
                    } elseif ((int) $product['quantity'] === 1) {
                        $product['stock'] = $product['quantity'];
                        $product['item'] = $this->module->i18n['item'];
                    } else {
                        $product['stock'] = $product['quantity'];
                        $product['item'] = $this->module->i18n['items'];
                    }
                }
                $this->ajax_json['success'] = true;
                $this->ajax_json['data'] = $products;
            } else {
                $this->ajax_json['success'] = false;
                $this->ajax_json['message'] = $this->module->i18n['the_item_is_not_available'];
            }
        }
    }
}
