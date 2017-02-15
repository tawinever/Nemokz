<?php
/**
 * RockPOS - Point of Sale for PrestaShop
 *
 * @author    Hamsa Technologies
 * @copyright Hamsa Technologies
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

require_once dirname(__FILE__) . '/../AbstractAdminHsPointOfSaleCommon.php';

/**
 * Controller of admin page - Point Of Sale (Abstract)
 */
class AdminHsPointOfSaleNewSaleAbstract extends AbstractAdminHsPointOfSaleCommon
{
    /**
     * set default order state.
     */
    const ID_ORDER_STATE = 2;

    /**
     * Show result to view.
     *
     * @var html
     */
    protected $ajax_html = null;

    /**
     * Show error to view.
     *
     * @var string
     */
    protected $ajax_error = null;

    /**
     * Show content to file pdf.
     *
     * @var html
     */
    protected $ajax_pdf = null;

    /**
     * @var array(
     *             'order_summary'	=> array,
     *             'product_number' => int
     *             'product_permission' => boolean,
     *             )
     */
    protected static $cache_order_summary = array();

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->bootstrap = true;
        parent::__construct();
    }

    public function init()
    {
        // clear session if change current shop
        if (Tools::getValue('setShopContext')) {
            $this->module->clearSession();
        }
        parent::init();

        if (PosConfiguration::get('POS_REBUILD_SEARCH_INDEX')) {
            $this->displayWarning(sprintf($this->module->i18n['please_go_to_preferences_product_to_re_build_product_index'], $this->module->displayName));
            PosConfiguration::updateValue('POS_REBUILD_SEARCH_INDEX', 0);
        }

        $this->changeCurrency();
        $this->module->initContext();

        // Check reset all payments or not
        $is_reset_payment = (bool) Tools::getValue('is_reset_payment');
        if ($is_reset_payment) {
            $this->resetAllPaymentsByIdCart();
        }
        $this->context->smarty->assign(array(
            'currencies' => PosCurrency::getPosCurrencies(),
            'cart' => $this->context->cart,
            'currency' => $this->context->currency,
            'module_name' => $this->module->name,
            'action_form' => $this->context->link->getAdminLink($this->module->pos_tabs['AdminHsPointOfSaleNewSale']['tab_class']),
            'link' => $this->context->link,
            'customer' => $this->context->customer,
            'use_tax' => Configuration::get('PS_TAX') && !Product::getTaxCalculationMethod((int) $this->context->cart->id_customer),
            'this_module_dir' => $this->module->getImgPath(), // full path to module directory
            'output_product_search_configurations' => Tools::jsonEncode(Configuration::getMultiple(array_keys(PosConfiguration::getOutputProductSearchSettings()))),
            'id_address' => (int) $this->context->cart->id_address_delivery,
            'id_customer' => $this->module->isEnableGuestCheckout() ? (int) $this->context->cart->id_customer : 0,
            'addresses' => Tools::jsonEncode($this->getAddresses()),
            'id_address_delivery' => (int) $this->context->cart->id_address_delivery,
            'id_address_invoice' => (int) $this->context->cart->id_address_invoice,
            'link_add_address' => $this->renderLinkAddAddress(),
            'is_prestashop16' => $this->module->isPrestashop16(),
            'is_stock_management' => (int) Configuration::get('PS_STOCK_MANAGEMENT'),
            'customer' => $this->context->customer,
            'is_page_size_a5' => (Configuration::get('POS_INVOICE_PAGE_SIZE') === PosConstants::PAGE_SIZE_A5) ? 1 : 0,
            'is_default_customer' => $this->context->customer->isDefaultCustomer(),
        ));
    }

    /**
     * Change currency.
     */
    protected function changeCurrency()
    {
        if (Tools::getValue('id_currency', false)) {
            $id_currency = Tools::getValue('id_currency');
        } else {
            $id_currency = (int) $this->context->cookie->id_currency;
        }
        $this->setCurrency((int) $id_currency);
    }

    /**
     * Set currency default.
     *
     * @param int $id_currency
     */
    protected function setCurrency($id_currency)
    {
        if ($id_currency) {
            $currency = new Currency((int) $id_currency);
            if (Validate::isLoadedObject($currency) && !$currency->deleted) {
                $this->context->currency = $currency;
                $this->context->cookie->id_currency = (int) $this->context->currency->id;
            }
        }
    }

    /**
     * Delete all payments by id cart.
     *
     * @return boolean
     */
    protected function resetAllPaymentsByIdCart()
    {
        return $this->context->cart->resetAllPaymentsByIdCart();
    }

    /**
     * Set Media file include when controller called.
     */
    public function setMedia()
    {
        $this->module_media_js = array_merge($this->module_media_js, array(
            'pos_cart.js',
            'pos_order.js',
            'pos_hooks.js',
            'pos_handler.js',
            'anysearch.js',
            'pos_address.js',
            'plugin_jquery/jquery.cookie.min.js',
            'pos_category_tree.js',
            'pos_sidebar_closed.js'
        ));
        $this->jquery_plugins[] = 'fancybox';
        $this->jquery_ui_components[] = 'ui.autocomplete';
        // fix error version 1.5.5 not call file ui.menu.js
        if (!array_key_exists('ui.menu', Media::$jquery_ui_dependencies['ui.autocomplete']['dependencies'])) {
            Media::$jquery_ui_dependencies['ui.autocomplete']['dependencies'][] = 'ui.menu';
            Media::$jquery_ui_dependencies['ui.menu'] = array(
                'fileName' => 'jquery.ui.menu.min.js',
                'dependencies' => array(),
                'theme' => false,
            );
        }
        
        if (version_compare(_PS_VERSION_, '1.6') === -1) {
            $this->module_media_css['homepage_15.css'] = 'all';
        }
        if ($this->module->isPrestashop16()) {
            $this->module_media_css['homepage_16.css'] = 'all';
        }
        $this->module_media_css['homepage.css'] = 'all';
        $this->module_media_css['receipt.css'] = 'all';
        $this->module_media_css['pos_popup.css'] = 'all';
        $this->module_media_css['pos_autosuggest.css'] = 'all';
     
        parent::setMedia();
    }

    /**
     * @see AdminControllerCore::initContent()
     */
    public function initContent()
    {
        if (!$this->ajax) {
            if ($this->module->isPrestashop16()) {
                // Generate category selection tree
                $tree = new HelperTreeCategories('categories-tree', $this->module->i18n['filter_by_category']);
                $tree->setAttribute('is_category_filter', true)->setAttribute('base_url', preg_replace('#&id_category=[0-9]*#', '', self::$currentIndex) . '&token=' . $this->token)->setInputName('id-category')->setUseCheckBox(true)->setSelectedCategories(array(0));
                $category_tree = $tree->setRootCategory((int) Category::getRootCategory()->id)->render();
            } else {
                $helper = new Helper();
                $category_tree = $helper->renderCategoryTree(null, array(1), 'id-category', false, false, array(), false, true);
            }

            $this->assignOrderSummary();
            $this->assignCarrier();

            $this->context->smarty->assign(array(
                'use_tax' => !Product::getTaxCalculationMethod((int) $this->context->cart->id_customer),
                'free_shipping' => $this->context->cart->isFreeShipping(),
                'pos_payments' => PosPayment::getPosPayments($this->context->language->id, $this->context->shop->id),
                'this_module_dir' => $this->module->getImgPath(), // dir to module
                'is_in_single_shop' => PosShop::isInSingleShop(),
                'module_name' => $this->module->name,
                'dummy_customer' => $this->module->getDefaultCustomerId(),
                'amount_due' => $this->context->cart->getAmountDue($this->context->currency->decimals * _PS_PRICE_DISPLAY_PRECISION_),
                'amount_due_for_view' => str_replace($this->context->currency->sign, '', Tools::displayPrice($this->context->cart->getAmountDue($this->context->currency->decimals * _PS_PRICE_DISPLAY_PRECISION_))),
                'price_display_precision' => _PS_PRICE_DISPLAY_PRECISION_,
                'currency_format' => $this->getCurrencyFormat(),
                'decimals' => $this->context->currency->decimals,
                'module_logo' => $this->module->getPathUri() . 'logo.gif',
                'version_name' => $this->module->displayName . '&nbsp' . $this->module->version,
                'pos_order_states' => PosOrderState::getSelectedOrderStates((int) $this->context->language->id),
                'default_order_state' => $this->module->getDefaultOrderState(),
                'note' => $this->context->cookie->note ? $this->context->cookie->note : '',
                'show_note_on_invoice' => $this->context->cookie->show_note_on_invoice ? (int) $this->context->cookie->show_note_on_invoice : 0,
                'category_tree' => $category_tree,
                'admin_customer_url' => $this->context->link->getAdminLink($this->module->pos_tabs['AdminHsPointOfSaleCustomer']['tab_class']),
                'is_collecting_payment' => (int) PosConfiguration::get('POS_COLLECTING_PAYMENT')
            ));
            $this->renderBlockOrderDiscounts();
        }
        parent::initContent();
    }
    
    protected function render()
    {
    }

    protected function getCurrencyFormat()
    {
        $format = empty($this->context->currency->format) ? 1 : $this->context->currency->format;
        if (($format == 2) && ($this->context->language->is_rtl == 1)) {
            $format = 4; // Refer to Tools::displayPrice() for further details.
        }

        return $format;
    }

    public function ajaxProcessAddProductFromBarcode()
    {
        $barcode = trim(Tools::getValue('barcode'));
        if (!empty($barcode)) {
            $product = PosSearchAction::searchProductByBarCode($barcode);
            if (!empty($product)) {
                $this->ajax_json['success'] = $this->module->addProductToCart($product['id_product'], $product['id_product_attribute']);
            }
            if ($this->ajax_json['success']) {
                $this->ajax_json['data']['idCart'] = $this->context->cart->id;
                $this->module->setFreeShippingByDefault();
                $this->renderBlocksAfterChangingProduct();
            } else {
                $this->ajax_json['message'] = $this->module->i18n['the_item_is_not_available'];
            }
        } else {
            $this->ajax_json['message'] = $this->module->i18n['empty_barcode'];
        }
    }

    /**
     * Add product to cart.
     */
    public function ajaxProcessAddProduct()
    {
        $id_product = (int) Tools::getValue('id_product', 0);

        $id_product_attribute = (int) Tools::getValue('id_product_attribute', 0);
        if (empty($id_product)) {
            $this->ajax_json['message'] = $this->module->i18n['cannot_get_product_id'];

            return;
        }

        $this->ajax_json['success'] = $this->module->addProductToCart($id_product, $id_product_attribute);
        if ($this->ajax_json['success']) {
            $this->ajax_json['data']['idCart'] = $this->context->cart->id;
            $this->module->setFreeShippingByDefault();
            $this->renderBlocksAfterChangingProduct();
        } else {
            $this->ajax_json['message'] = $this->module->i18n['the_item_is_not_available'];
        }
    }

    public function ajaxProcessAssignCustomer()
    {
        Cache::clean('getContextualValue_*');
        $id_customer = (int) Tools::getValue('id_customer');
        $customer = new PosCustomer((int) $id_customer);
        if (Validate::isLoadedObject($customer) && $this->context->cart->assignCustomer($id_customer)) {
            $customer->addPosCustomerGroup();
            if (empty($this->context->cookie->id_cart) && !empty($this->context->cart->id)) {
                $this->context->cookie->id_cart = (int) $this->context->cart->id;
                $this->context->cookie->write();
            }
            $this->module->initContext();
            $this->executeCustomerDisplayHooks();
            $this->renderBlocksAfterChangingCustomer();

            $this->ajax_json['data']['idCart'] = (int) $this->context->cart->id;
            $this->ajax_json['success'] = true;
        } else {
            $this->ajax_json['message'] = $this->module->i18n['cannot_assign_customer_to_cart'];
        }
    }

    /**
     * Remove current customer from cart.
     */
    public function ajaxProcessRemoveCustomer()
    {
        if (!empty($this->context->cart->id_customer)) {
            $old_id_customer = $this->context->cart->id_customer;
            $new_id_customer = $this->module->getDefaultCustomerId();
            $this->context->cart->id_customer = $new_id_customer;
            $this->context->cart->updateAddressId((int) Address::getFirstCustomerAddressId($old_id_customer), (int) Address::getFirstCustomerAddressId($new_id_customer));
            if ($this->context->cart->save()) {
                Cache::clean('getContextualValue_*');
                $this->module->initContext();
                PosSpecificPrice::deleteByIdCart($old_id_customer);
                $this->renderBlocksAfterChangingCustomer(true);
                $this->executeCustomerDisplayHooks();
                $this->ajax_json['success'] = true;
            }
        }
    }

    /**
     * update cart summary.
     *
     * @return html
     */
    protected function renderCartSummary()
    {
        return $this->context->smarty->fetch(_PS_MODULE_DIR_ . $this->module->name . '/abstract/views/templates/admin/hs_point_of_sale_new_sale_abstract/cart_summary.tpl');
    }

    /**
     * Assgin info cart to view.
     */
    protected function assignOrderSummary()
    {
        if (empty(self::$cache_order_summary)) {
            Cache::clean('getContextualValue_*');
            Cache::clean('Cart::getCartRules_*');
            $summary_cart = $this->context->cart->getSummaryDetails((int) $this->context->language->id);
            $summary_cart['total_discounts_products'] = 0;
            $currency_decimals = (int)$this->context->currency->decimals * _PS_PRICE_DISPLAY_PRECISION_;
            foreach ($summary_cart['products'] as &$product) {
                $use_tax = !Product::getTaxCalculationMethod((int) $this->context->cart->id_customer);
                $product['pos_price'] = $use_tax ?  Tools::ps_round($product['price_wt'], $currency_decimals) :  Tools::ps_round($product['price'], $currency_decimals);

                if (!Validate::isString($product['reduction_type'])) {
                    $product['reduction_type'] = PosConfiguration::get('POS_DEF_PRODUCT_DISCOUNT_TYPE');
                }
                if ($product['price_without_reduction'] != $product['price_with_reduction']) {
                    $summary_cart['total_discounts_products'] += $product['price_without_reduction'] - $product['price_with_reduction'];
                }
            }
            $profile_access = Profile::getProfileAccesses((int) $this->context->employee->id_profile, 'class_name');
            self::$cache_order_summary = array(
                'order_summary' => $summary_cart,
                'product_number' => (int) $this->context->cart->nbProducts(),
                'product_permission' => $profile_access['AdminProducts']['edit'],
            );
        }
        $this->context->smarty->assign(self::$cache_order_summary);
    }

    protected function assignShipping()
    {
        $this->assignCarrier();
        $this->context->smarty->assign(array(
            'free_shipping' => $this->context->cart->isFreeShipping()
        ));
    }

    protected function assignAddresses()
    {
        $this->context->smarty->assign(array(
            'id_address' => (int) $this->context->cart->id_address_delivery,
        ));
    }

    protected function assignCarrier()
    {
        $delivery_option_list = $this->getDeliveryOptionList();

        $this->context->smarty->assign(array(
            'delivery_option_list' => $delivery_option_list,
            'default_id_carrier' => (int) $this->context->cart->id_carrier,
            'delivery' => $this->getDelivery((int) $this->context->cart->id_carrier, $delivery_option_list),
        ));
        $this->assignAddresses();
    }

    protected function assignOrderDiscounts()
    {
        $this->context->smarty->assign(array(
            'order_discount_types' => $this->module->getOrderDiscountTypes(),
            'order_discounts' => $this->context->cart->getCartRules(CartRule::FILTER_ACTION_REDUCTION),
        ));
    }

    /**
     * Get delivery of selected carrier.
     *
     * @param int   $id_carrier
     * @param array $carrier_list
     *                            <pre>
     *                            array
     *                            (
     *                            [0] => array
     *                            (
     *                            [name] => string,
     *                            [delivery] => string,
     *                            [id_carrier] => int,
     *                            )
     *                            [1] => array
     *                            (
     *                            [name] => string,
     *                            [delivery] => string,
     *                            [id_carrier] => int,
     *                            )
     *                            )</pre>
     *
     * @return string
     */
    protected function getDelivery($id_carrier, $carrier_list)
    {
        $delivery = '';
        if (!empty($carrier_list)) {
            foreach ($carrier_list as $carrier) {
                if ($carrier['id_carrier'] === $id_carrier) {
                    $delivery = $carrier['delivery'];
                }
            }
        }

        return $delivery;
    }

    /**
     * render block order discount.
     *
     * @return html
     */
    protected function renderOrderDiscounts()
    {
        return $this->context->smarty->fetch(_PS_MODULE_DIR_ . $this->module->name . '/abstract/views/templates/admin/hs_point_of_sale_new_sale_abstract/cart_discount.tpl');
    }

    /**
     * Remove element product from cart.
     */
    public function ajaxProcessRemoveProductFromCart()
    {
        $id_product = (int) Tools::getValue('id_product', null);
        if (empty($id_product)) {
            $this->ajax_json['message'] = $this->module->i18n['cannot_get_product_id'];

            return;
        }
        $id_product_attribute = (int) Tools::getValue('id_product_attribute', null);

        if ($this->context->cart->deleteProduct($id_product, $id_product_attribute) && PosSpecificPrice::deleteByIdCart($this->context->cart->id, $id_product, $id_product_attribute)) {
            $this->ajax_json['success'] = true;
        }
        $this->validateOrderDiscount();
        if ($this->ajax_json['success']) {
            $this->renderBlocksAfterChangingProduct();
        } else {
            $this->ajax_json['message'] = $this->module->i18n['cannot_remove_product_from_cart'];
        }
    }

    /**
     * Update block show product in cart.
     */
    protected function renderProducts()
    {
        return $this->context->smarty->fetch(_PS_MODULE_DIR_ . $this->module->name . '/abstract/views/templates/admin/hs_point_of_sale_new_sale_abstract/shopping_cart.tpl');
    }

    /**
     * Update block show product in cart.
     *
     * @param boolean $refresh if true get again getSummaryDetails
     */
    protected function shipping()
    {
        return $this->context->smarty->fetch(_PS_MODULE_DIR_ . $this->module->name . '/abstract/views/templates/admin/hs_point_of_sale_new_sale_abstract/shipping.tpl');
    }

    /**
     * Update block show product in cart.
     *
     * @param boolean $refresh if true get again getSummaryDetails
     */
    protected function shippingCost()
    {
        return $this->context->smarty->fetch(_PS_MODULE_DIR_ . $this->module->name . '/abstract/views/templates/admin/hs_point_of_sale_new_sale_abstract/shipping_cost.tpl');
    }

    /**
     * Change quantity of product in cart.
     */
    public function ajaxProcessChangeProductQuantity()
    {
        $id_product = (int) Tools::getValue('id_product', null);
        $id_shop = (int) Tools::getValue('id_shop', null);
        $shop = new Shop($id_shop);

        if (empty($id_product) || !Validate::isLoadedObject($shop)) {
            return;
        }

        $id_product_attribute = (int) Tools::getValue('id_product_attribute', null);
        $operator = trim(Tools::getValue('operator'));
        $quantity = (int) Tools::getValue('quantity');
        $this->ajax_json['success'] = $this->context->cart->updateQtyPos($quantity, $id_product, $shop, $id_product_attribute, $operator);
        if ($operator === 'down') {
            $this->validateOrderDiscount();
        }
        if ($this->ajax_json['success']) {
            $this->renderBlocksAfterChangingProduct();
        }
    }

    public function ajaxProcessCancelOrder()
    {
        if (Validate::isLoadedObject($this->context->cart)) {
            Hook::exec('actionPosCancelOrder', array('cart' => $this->context->cart));
        }
        $this->module->clearSession();
        $this->ajax_json['success'] = true;
    }
    
    public function ajaxProcessAddNewOrder()
    {
        $this->module->clearSession();
        $this->ajax_json['success'] = true;
    }

    /**
     *  Remove cart rule when cancel order.
     */
    protected function removeCartRule()
    {
        if (!CartRule::isFeatureActive() || !Validate::isLoadedObject($this->context->cart)) {
            return;
        }

        foreach ($this->context->cart->getCartRules() as $cart_rule) {
            if ($cart_rule['obj']->checkValidity($this->context, true, false)) {
                $this->context->cart->removeCartRule((int) $cart_rule['obj']->id);
                $this->context->cart->update();
                $cart_rule['obj']->delete();
            }
        }
    }

    /**
     * Complete sale create new a order and show content receipt.
     */
    public function ajaxProcessCompleteSale()
    {
        $note = $this->context->cookie->note;
        $id_order_state = (int) Tools::getValue('id_order_state');

        if ($id_order_state === 0) {
            $id_order_state = $this->module->getDefaultOrderState();
        }

        // check customer has already had address
        if ((int) PosCustomer::getAddressesTotalById((int) $this->context->cart->id_customer) === 0) {
            $customer = new PosCustomer((int) $this->context->cart->id_customer);
            if (Validate::isLoadedObject($customer)) {
                PosAddress::createDummyAddress($customer);
                $this->context->cart->id_address_delivery = PosAddress::getFirstCustomerAddressId((int) $customer->id);
                $this->context->cart->id_address_invoice = PosAddress::getFirstCustomerAddressId((int) $customer->id);
                $this->context->cart->save();
            }
        }

        try {
            if (!Configuration::get('POS_COLLECTING_PAYMENT')) {
                // disable collecting payment
                $default_id_payment = (int) Configuration::get('POS_DEFAULT_PAYMENT_ID');
                $pos_payment = new PosPayment((int) $default_id_payment, (int) $this->context->language->id);

                if (!Validate::isLoadedObject($pos_payment)) {
                    $this->ajax_json['success'] = false;
                    $this->ajax_json['message'] = $this->module->i18n['invalid_payment'];
                } else {
                    $this->ajax_json['success'] = true;
                }

                if ($this->ajax_json['success']) {
                    $amount = $this->context->cart->getOrderTotal(true, Cart::BOTH);
                    $this->context->cart->addPayment((int) $pos_payment->id, $amount, $pos_payment->reference);
                }
            }

            $this->ajax_json['success'] = $this->module->validateOrder((int) $this->context->cart->id, (int) $id_order_state, $this->context->cart->getOrderTotal(true, Cart::BOTH), null, $note, array(), null, false, $this->context->cart->secure_key);
        } catch (PrestaShopException $prestashop_exception) {
            $this->ajax_json['message'] = $prestashop_exception->getMessage();
        }
        if ($this->ajax_json['success']) {
            $this->ajax_json['print_invoice_auto'] = (bool) Configuration::get('POS_INVOICE_AUTO_PRINT');
            $this->ajax_json['print_receipt_auto'] = (bool) Configuration::get('POS_RECEIPT_AUTO_PRINT');
            $this->ajax_json['id_order'] = (int) $this->module->currentOrder;
            $this->ajax_json['data'] = $this->renderOrderSummary();
            $params = array(
                'cart' => $this->context->cart,
                'order_list' => $this->module->order_list
            );
            Hook::exec('actionPosCompletedSaleAfter', $params);
            $this->module->clearSession();
        }
    }

    public function ajaxProcessChangeProductPrice()
    {
        $id_product = (int) Tools::getValue('id_product');
        $id_product_attribute = (int) Tools::getValue('id_product_attribute');
        $id_shop = max((int) Tools::getValue('id_shop'), $this->context->shop->id);
        $value = (float) Tools::getValue('value');
        $type = trim(Tools::getValue('type'));
        if (!$this->isValidDiscount($value, $type, $id_product, $id_product_attribute)) {
            return;
        }

        $id_group = Customer::getDefaultGroupId($this->context->cart->id_customer);
        $id_country = Customer::getCurrentCountry($this->context->cart->id_customer, $this->context->cart);
        $specific_price_value = PosSpecificPrice::getSpecificPrice($id_product, $id_shop, $this->context->cart->id_currency, $id_country, $id_group, 1, $id_product_attribute, $this->context->customer->id, $this->context->cart->id);
        $specific_price = new SpecificPrice();
        $specific_price->id = empty($specific_price_value) ? 0 : $specific_price_value['id_specific_price'];
        $specific_price->from = date('Y-m-d H:i:00', time());
        $specific_price->to = date('Y-m-d H:i:00', time() + PosConstants::DISCOUNT_DURATION_PRODUCT);
        $specific_price->id_customer = 0; // Set to "0" so that it still works when changing customer profile from Guest to a specific Customer
        $specific_price->id_cart = $this->context->cart->id;
        $specific_price->id_shop = $id_shop;
        $specific_price->id_shop_group = $this->context->shop->id_shop_group;
        $specific_price->id_currency = $this->context->cart->id_currency;
        $specific_price->id_country = $id_country;
        $specific_price->id_product = $id_product;
        $specific_price->id_product_attribute = $id_product_attribute;
        $specific_price->from_quantity = 1;
        $specific_price->id_group = $id_group;
        switch ($type) {
            case PosConstants::DISCOUNT_TYPE_AMOUNT:
                $specific_price->reduction_type = PosConstants::DISCOUNT_TYPE_AMOUNT;
                $specific_price->price = -1;
                $specific_price->reduction = $value;
                break;

            case PosConstants::DISCOUNT_TYPE_PERCENTAGE:
                $specific_price->reduction_type = PosConstants::DISCOUNT_TYPE_PERCENTAGE;
                $specific_price->price = -1;
                $specific_price->reduction = $value / 100;
                break;

            case PosConstants::PRODUCT_PRICE_TYPE:
            default:
                $specific_price->reduction_type = PosConstants::DISCOUNT_TYPE_AMOUNT;
                $specific_price->price = $value;
                $specific_price->reduction = 0;
                break;
        }
        if ($specific_price->save()) {
            $this->ajax_json['success'] = true;
            $this->renderBlocksAfterChangingProduct();
        }
    }

    public function ajaxProcessAddOrderDiscount()
    {
        $discount_value = trim(Tools::getValue('discount_value'));
        $discount_type = trim(Tools::getValue('discount_type'));
        if ($discount_type === PosConstants::DISCOUNT_TYPE_VOUCHER) {
            if (!$discount_value) {
                $this->ajax_json['message'] = $this->module->i18n['you_must_enter_a_voucher_code'];
            } elseif (!Validate::isCleanHtml($discount_value)) {
                $this->ajax_json['message'] = $this->module->i18n['the_voucher_code_is_invalid'];
            } else {
                $cart_rule = new CartRule(CartRule::getIdByCode($discount_value));
                if (Validate::isLoadedObject($cart_rule)) {
                    if ($error = $cart_rule->checkValidity($this->context, false, true)) {
                        $this->ajax_json['message'] = $error;
                    } else {
                        $this->ajax_json['success'] = true;
                    }
                } else {
                    $this->ajax_json['message'] = $this->module->i18n['this_voucher_does_not_exist'];
                }
            }
        } else {
            if ($this->isValidDiscount((float) $discount_value, $discount_type)) {
                $languages = Language::getLanguages(false);
                $names = array();
                foreach ($languages as $language) {
                    $names[$language['id_lang']] = $this->module->i18n['point_of_sale'];
                }
                $cart_rule = PosCartRule::addOrderDiscount($this->context, $discount_type, $discount_value, $names, $this->module->i18n['point_of_sale']);
                $this->ajax_json['success'] = Validate::isLoadedObject($cart_rule);
            }
        }
        if ($this->ajax_json['success']) {
            $this->context->cart->addCartRule((int) $cart_rule->id);
            $this->renderBlocksAfterChangingOrderDiscount();
        }
    }

    /**
     * Delete order discount.
     */
    public function ajaxProcessDeleteOrderDiscount()
    {
        $id_cart_rule = (int) trim(Tools::getValue('id_cart_rule'));
        if (!$id_cart_rule || !Validate::isLoadedObject($this->context->cart)) {
            return;
        }

        $this->ajax_json['success'] = $this->context->cart->removeCartRule($id_cart_rule);
        if ($this->ajax_json['success']) {
            $this->renderBlocksAfterChangingOrderDiscount();
        }
    }

    /**
     * Valid discount avaibale.
     *
     * @param float  $discount_value
     * @param string $discount_type
     * @param int    $id_product
     * @param int    $id_product_attribute
     *
     * @return boolean
     */
    protected function isValidDiscount($discount_value, $discount_type, $id_product = 0, $id_product_attribute = 0)
    {
        $is_valid = false;
        if ($discount_type === PosConstants::DISCOUNT_TYPE_PERCENTAGE) {
            if (is_numeric($discount_value) && $discount_value >= 0 && $discount_value <= 100) {
                $is_valid = true;
            } else {
                $this->ajax_json['message'] = $this->module->i18n['discount_between'];
            }
        }

        if ($discount_type === PosConstants::DISCOUNT_TYPE_AMOUNT) {
            if ($id_product) {
                $price = PosProduct::getPriceStatic((int) $id_product, true, (int) $id_product_attribute, 6, null, false, false);
            } else {
                $price = $this->context->cart->getOrderTotal(true, Cart::ONLY_PRODUCTS);
            }
            if ($discount_value <= $price && is_numeric($discount_value) && $discount_value >= 0) {
                $is_valid = true;
            } else {
                $this->ajax_json['message'] = $this->module->i18n['discount_invalid'];
            }
        }
        if ($discount_type === PosConstants::PRODUCT_PRICE_TYPE) {
            if (is_numeric($discount_value) && $discount_value >= 0) {
                $is_valid = true;
            }
        }
        return $is_valid;
    }

    /**
     * Get current cart rule.
     *
     * @return array
     *               <pre/>
     *               Array (
     *               [id_cart] => int
     *               [id_cart_rule] => int
     *               [id_customer] => int
     *               [date_from] => date time
     *               [date_to] => date time
     *               [description] => string
     *               [quantity] => int
     *               [quantity_per_user] => int
     *               [priority] => int
     *               [partial_use] => int
     *               [code] => string
     *               [minimum_amount] => float
     *               [minimum_amount_tax] => int
     *               [minimum_amount_currency] => int
     *               [minimum_amount_shipping] => int
     *               [country_restriction] => int
     *               [carrier_restriction] => int
     *               [group_restriction] => int
     *               [cart_rule_restriction] => int
     *               [product_restriction] => int
     *               [shop_restriction] => int
     *               [free_shipping] => boolean
     *               [reduction_percent] => float
     *               [reduction_amount] => float
     *               [reduction_tax] => int
     *               [reduction_currency] => int
     *               [reduction_product] => int
     *               [gift_product] => boolean
     *               [gift_product_attribute] => boolean
     *               [highlight] => int
     *               [active] => boolean
     *               [date_add] => datetime
     *               [date_upd] => datetime
     *               [id_lang] => int
     *               [name] => string
     *               [obj] => CartRule Object
     *               [value_real] => float
     *               [value_tax_exc] => float
     *               [id_discount] => int
     *
     * )
     */
    protected function getCurrentCartRule()
    {
        $cart_rules = $this->context->cart->getCartRules(CartRule::FILTER_ACTION_REDUCTION);
        $array_cart_rule = array();
        if (!empty($cart_rules) && count($cart_rules) > 0) {
            foreach ($cart_rules as $cart_rule) {
                if ((int) $cart_rule['id_cart'] === (int) $this->context->cart->id) {
                    $array_cart_rule = $cart_rule;
                    break;
                }
            }
        }

        return $array_cart_rule;
    }

    /**
     * Apply free shipping for pos.
     */
    public function ajaxProcessUpdateFreeShipping()
    {
        if (Tools::getValue('free_shipping') && (int) Tools::getValue('free_shipping') === 1) { //Apply free shipping to current order
            $cart_rule = $this->module->getCartRule();
            if (Validate::isLoadedObject($cart_rule)) {
                $this->ajax_json['success'] = $this->context->cart->addCartRule((int) $cart_rule->id);
            }
        } else {
            $id_cart_rule = (int) Configuration::get('POS_ID_CART_RULE');
            if ($id_cart_rule) {
                $this->ajax_json['success'] = $this->context->cart->removeCartRule((int) $id_cart_rule);
            }
        }
        if ($this->ajax_json['success']) {
            $this->renderBlocksAfterChangingShipping();
        } else {
            $this->ajax_json['message'] = $this->module->i18n['there_is_an_error_on_applying_free_shipping'];
        }
    }

    /**
     * Apply changing combination product.
     */
    public function ajaxProcessChangeCombination()
    {
        $id_product = (int) Tools::getValue('id_product');
        $new_id_product_attribute = (int) Tools::getValue('new_id_product_attribute');
        $old_id_product_attribute = (int) Tools::getValue('old_id_product_attribute');
        $qty = (int) Tools::getValue('qty');
        $id_shop = (int) Tools::getValue('id_shop');
        $shop = new Shop($id_shop);
        if ($this->context->cart->containsProduct($id_product, $new_id_product_attribute)) {
            if ($this->context->cart->deleteProduct($id_product, $old_id_product_attribute) && PosSpecificPrice::deleteByIdCart($this->context->cart->id, $id_product, $old_id_product_attribute)) {
                $this->ajax_json['success'] = $this->context->cart->updateQtyPos($qty, $id_product, $shop, $new_id_product_attribute);
            }
        } else {
            if (PosSpecificPrice::doesSpecificPriceExist($this->context->cart->id, $id_product, $old_id_product_attribute)) {
                PosSpecificPrice::updateProductCombination($this->context->cart->id, $id_product, $new_id_product_attribute, $old_id_product_attribute);
            }

            $this->ajax_json['success'] = $this->context->cart->updateProductCombination($id_product, $new_id_product_attribute, $old_id_product_attribute, $id_shop);
        }

        if ($this->ajax_json['success']) {
            $this->renderBlocksAfterChangingProduct();
        } else {
            $this->ajax_json['message'] = $this->module->i18n['can_not_change_to_your_option'];
        }
    }

    /**
     * Make sure is compatible with current cart amount.
     */
    protected function validateOrderDiscount()
    {
        $cart_rule = $this->getCurrentCartRule();
        // only check in case of reduction amount
        if (!empty($cart_rule) && (float) $cart_rule['reduction_amount'] !== 0.0 && (float) $cart_rule['reduction_percent'] === 0.0) {
            if ((float) $cart_rule['reduction_amount'] > (float) $this->context->cart->getOrderTotal(true, Cart::ONLY_PRODUCTS)) {
                $this->context->cart->removeCartRule((int) $cart_rule['id_cart_rule']);
                $this->renderBlockOrderDiscounts();
            }
        }
    }

    /**
     * Checks if all of the characters in the provided string, text, are numerical.
     *
     * @param string $string
     *
     * @return boolean
     */
    protected function isNumber($string)
    {
        return ctype_digit($string);
    }

    /**
     * Get available list carrier.
     *
     * @return array
     *               <pre>
     *               Array
     *               (
     *               [0] => Array
     *               (
     *               [name] => string
     *               [id_carrier] => int,
     *               )
     *               [1] => Array
     *               (
     *               [name] => string
     *               [id_carrier] => int,
     *               )
     *               )
     */
    protected function getDeliveryOptionList()
    {
        $carriers = array();
        $delivery_option_list = $this->context->cart->getDeliveryOptionList();
        if (!count($delivery_option_list)) {
            return array();
        }

        $delivery_options = $delivery_option_list[$this->context->cart->id_address_delivery];
        foreach ($delivery_options as $id_carrier => $delivery_option) {
            $name = '';
            $delivery = '';
            foreach ($delivery_option['carrier_list'] as $carrier) {
                $name = $carrier['instance']->name;
                $delivery = $carrier['instance']->delay[$this->context->employee->id_lang];
                if ($delivery_option['unique_carrier']) {
                    $delivery = $carrier['instance']->delay[$this->context->employee->id_lang];
                }
            }
            $carriers[] = array('name' => $name, 'delivery' => $delivery, 'id_carrier' => (int) $id_carrier);
        }

        return $carriers;
    }

    /**
     * Update selected carrier for cart.
     * @todo: Remove param "id_address"
     */
    public function ajaxProcessUpdateExtraCarrier()
    {
        $this->context->cart->id_carrier = (int) Tools::getValue('id_carrier');
        $this->ajax_json['success'] = $this->context->cart->save();
        if ($this->ajax_json['success']) {
            $this->renderBlocksChangingExtraCarrier();
        } else {
            $this->ajax_json['message'] = $this->module->i18n['fail_to_update_extra_carrier'];
        }
    }

    /**
     * Update addresses for cart.
     */
    public function ajaxProcessUpdateAddresses()
    {
        if ($this->tabAccess['edit'] === '1') {
            $id_address_delivery = (int) Tools::getValue('id_address_delivery');
            $id_address_invoice = (int) Tools::getValue('id_address_invoice');
            if ($id_address_delivery) {
                $address_delivery = new Address((int) $id_address_delivery);
                if ($address_delivery->id_customer == $this->context->cart->id_customer) {
                    $this->context->cart->id_address_delivery = (int) $address_delivery->id;
                }

                $this->context->cart->autosetProductAddress();
                $this->context->cart->delivery_option = null;
            }

            if ($id_address_invoice) {
                $address_invoice = new Address((int) $id_address_invoice);
                if ($address_invoice->id_customer == $this->context->cart->id_customer) {
                    $this->context->cart->id_address_invoice = (int) $address_invoice->id;
                }
            }

            $this->ajax_json['success'] = $this->context->cart->save();

            if ($this->ajax_json['success']) {
                $this->renderBlocksAfterUpdatingAddresses();
            } else {
                $this->ajax_json['message'] = $this->module->i18n['fail_to_update_address'];
            }
        }
    }

    /**
     * Update some blocks after adding a new address successfully.
     */
    public function ajaxProcessUpdateSummary()
    {
        if ($this->tabAccess['edit'] === '1') {
            $this->ajax_json['success'] = true;
            $this->renderBlocksAfterUpdatingSummary();
        }
    }

    /**
     * Get all Addresses of customer.
     *
     * @return array
     */
    protected function getAddresses()
    {
        $addresses = array();
        if (!empty($this->context->customer->id)) {
            $addresses = $this->context->customer->getAddresses((int) $this->context->cart->id_lang);
        }

        if (!empty($addresses)) {
            foreach ($addresses as &$data) {
                $address = new Address((int) $data['id_address']);
                $data['formated_address'] = PosAddressFormat::generateAddress($address, array(), '<br />');
                $data['edit_link'] = $this->context->link->getAdminLink($this->module->pos_tabs['AdminHsPointOfSaleAddresses']['tab_class']) . '&id_address=' . $data['id_address'] . '&updateaddress&realedit=1&liteDisplaying=1&submitFormAjax=1';
            }
        }

        return $addresses;
    }

    /**
     * Render link add new address of customer.
     *
     * @return string
     */
    protected function renderLinkAddAddress()
    {
        $link_add_new_address = '';
        if ($this->context->customer->id) {
            $link_add_new_address = $this->context->link->getAdminLink($this->module->pos_tabs['AdminHsPointOfSaleAddresses']['tab_class']) . '&addaddress&id_customer=' . $this->context->customer->id . '&liteDisplaying=1&submitFormAjax=1';
        }

        return $link_add_new_address;
    }

    protected function renderBlockOrderSummary()
    {
        $this->ajax_json['data']['cart'] = $this->renderCartSummary();
        $this->ajax_json['data']['productNumber'] = (int) $this->context->cart->nbProducts();
        $this->renderBlockAmountDue();
    }

    protected function renderBlockProducts()
    {
        $this->ajax_json['data']['product'] = $this->renderProducts();
    }

    protected function renderShippingCost()
    {
        $this->assignShipping();
        $this->ajax_json['data']['shippingCost'] = $this->shippingCost();
    }

    protected function renderBlockShipping()
    {
        $this->assignShipping();
        $this->ajax_json['data']['shipping'] = $this->shipping();
    }

    protected function renderBlockCustomer()
    {
        $this->ajax_json['data']['customer'] = $this->context->customer;
    }

    protected function renderBlockAddresses()
    {
        $this->assignAddresses();
        $this->ajax_json['data']['idAddressDelivery'] = (int) $this->context->cart->id_address_delivery;
        $this->ajax_json['data']['idAddressInvoice'] = (int) $this->context->cart->id_address_invoice;
        $this->ajax_json['data']['addresses'] = $this->getAddresses();
        $this->ajax_json['data']['linkAddAddress'] = $this->renderLinkAddAddress();
    }

    protected function renderBlockOrderDiscounts()
    {
        $this->assignOrderDiscounts();
        $this->ajax_json['data']['discounts'] = $this->renderOrderDiscounts();
    }

    protected function renderBlockAmountDue()
    {
        $this->ajax_json['data']['amountDue'] = Tools::displayPrice($this->context->cart->getAmountDue($this->context->currency->decimals * _PS_PRICE_DISPLAY_PRECISION_));
        $this->ajax_json['data']['priceAmountDue'] = $this->context->cart->getAmountDue($this->context->currency->decimals * _PS_PRICE_DISPLAY_PRECISION_);
    }

    protected function renderBlocksAfterChangingProduct()
    {
        $this->assignOrderSummary();
        $this->renderBlockOrderSummary();
        $this->renderBlockProducts();
        $this->renderBlockShipping();
        $this->renderBlockOrderDiscounts();
    }

    protected function renderBlocksAfterChangingCustomer($is_remove = false)
    {
        $this->assignCarrier();
        $this->assignOrderSummary();
        $this->renderBlockOrderSummary();
        $this->renderBlockProducts();
        $this->renderBlockShipping();
        $this->renderBlockOrderDiscounts();
        if ($is_remove) {
            $this->ajax_json['data']['idCustomer'] = (int) $this->context->cart->id_customer;
        } else {
            $this->renderBlockCustomer();
            $this->renderBlockAddresses();
        }
    }

    protected function renderBlocksAfterChangingOrderDiscount()
    {
        $this->assignOrderSummary();
        $this->renderBlockProducts();
        $this->renderBlockOrderSummary();
        $this->renderBlockOrderDiscounts();
    }

    protected function renderBlocksAfterChangingShipping()
    {
        $this->assignCarrier();
        $this->assignOrderSummary();
        $this->renderBlockOrderSummary();
        $this->renderShippingCost();
        $this->renderBlockOrderDiscounts();
    }

    protected function renderBlocksChangingExtraCarrier()
    {
        $this->assignOrderSummary();
        $this->renderBlockOrderSummary();
        $this->renderShippingCost();
        $this->renderBlockOrderDiscounts();
    }

    protected function renderBlocksAfterUpdatingAddresses()
    {
        $this->assignCarrier();
        $this->assignOrderSummary();
        $this->renderBlockOrderSummary();
        $this->renderBlockShipping();
        $this->renderBlockOrderDiscounts();
    }

    protected function renderBlocksAfterUpdatingSummary()
    {
        $this->assignCarrier();
        $this->assignOrderSummary();
        $this->renderBlockOrderSummary();
        $this->renderBlockShipping();
        $this->renderBlockAddresses();
    }

    /**
     * Render 2 hooks pos customer top and bottom.
     */
    protected function executeCustomerDisplayHooks()
    {
        $customer_hook_params = array('is_default_customer' => $this->context->customer->isDefaultCustomer());
        $this->ajax_json['data']['hooks']['displayPosCustomerTop'] = Hook::exec('displayPosCustomerTop', $customer_hook_params);
        $this->ajax_json['data']['hooks']['displayPosCustomerBottom'] = Hook::exec('displayPosCustomerBottom', $customer_hook_params);
    }

    /**
     * ajax process add note.
     */
    public function ajaxProcessAddNote()
    {
        $this->context->cookie->note = Tools::getValue('text_note');
        $this->context->cookie->show_note_on_invoice = (int) Tools::getValue('show_note_on_invoice');
        $this->ajax_json['success'] = true;
    }
    
    public function ajaxProcessSearchProducts()
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
                $this->ajax_json['data'] = $products;
            } else {
                $this->ajax_json['message'] = $this->module->i18n['the_item_is_not_available'];
            }
        }
    }

    public function ajaxProcessGetTranslationByKeys()
    {
        $translations = array();
        $keys = Tools::jsonDecode(Tools::getValue('keys'), true);
        foreach ($keys as $key) {
            $translations[$key] = empty($this->module->i18n[$key]) ? '' : $this->module->i18n[$key];
        }
        $this->ajax_json['success'] = true;
        $this->ajax_json['data'] = $translations;
    }
    
    public function ajaxProcessGetCombinations()
    {
        $id_product = (int) Tools::getValue('id_product');
        $id_shop = $this->context->shop->id;
        $this->ajax_json['success'] = true;
        $this->ajax_json['data'] = PosProduct::getCombinations($id_product, $id_shop);
    }
}
