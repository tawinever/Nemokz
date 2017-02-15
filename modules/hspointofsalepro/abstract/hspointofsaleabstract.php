<?php
/**
 * RockPOS - Point of Sale for PrestaShop
 *
 * @author    Hamsa Technologies
 * @copyright Hamsa Technologies
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

if (!defined('_PS_VERSION_')) {
    exit;
}
if (!defined('_ROCKPOS_VERSION_')) {
    define('_ROCKPOS_VERSION_', '2.4.2.3'); // this needs to go ahead of HsAutoload.
}
if (!class_exists('HsAutoload')) {
    require_once dirname(__FILE__) . '/classes/hs/HsAutoload.php';
}
spl_autoload_register(array(HsAutoload::getSingleton(basename(__FILE__, '.php') . '_' . md5(realpath(__FILE__)), _ROCKPOS_VERSION_, _ROCKPOS_DIR_, array('abstract/Adapter/', 'abstract/classes/', 'abstract/pdf/', 'abstract/components/')), 'load'));

/**
 * Class abstract module
 */

abstract class HsPointOfSaleAbstract extends PosPaymentModule
{
    /**
     * available quantiy for cart rule.
     */
    const CART_RULE_QTY = 1000000;

    /**
     * Define contant visibility is catalog only.
     */
    const CATALOG = 'catalog';

    /**
     * Define contant visibility is nowhere.
     */
    const NOWHERE = 'none';

    
    /**
     * Setting remove all tables & settings when uninstall RockPOS
     */
    const POS_REMOVE_TABLES_AND_SETTINGS = false;

    /**
     *
     * @var string // validated against Validate::isTabName()
     */
    public $parent_admin_tab = 'AdminPos';
    /**
     * Object install of HsPointOfSaleInstaller.
     *
     * @var object
     */
    protected $installer;

    /**
     * Object uninstaller of HsPointOfSaleInstaller.
     *
     * @var object
     */
    protected $uninstaller;

    /**
     * Contant path js.
     */
    const PATH_JS = 'abstract/views/js/';

    /**
     * Contant path css.
     */
    const PATH_CSS = 'abstract/views/css/';

    /**
     * Contant path img.
     */
    const PATH_IMG = 'abstract/views/img/';

    /**
     * containt all message lang include to js.
     */
    public $lang = array();

    /**
     * containt url for js.
     */
    public $urls = array();

    /**
     * containt all message lang include to js.
     */
    public $i18n = array();
    
    /**
     * Define all tabs
     * @var array
     */
    public $pos_tabs = array();
    
    /**
     * Defined package of ROCKPOS
     * @var string
     */
    public $package;

    /**
     * Construct.
     */
    public function __construct()
    {
        $this->tab = 'payments_gateways';
        parent::__construct();
        $this->loadLink();
        
        $this->initTranslations();
        $this->_languages = Language::getLanguages(false);
        if (!defined('_ROCKPOS_PDF_DIR_')) {
            define('_ROCKPOS_PDF_DIR_', $this->local_path.'abstract/pdf/models/templates');
        }
        $this->pos_tabs = array(
            'AdminHsPointOfSaleDashboard' => array(
                'active' => true,
                'name' => $this->i18n['dashboard']
            ),
            'AdminHsPointOfSaleNewSale' => array(
                'active' => true,
                'name' => $this->i18n['new_sale']
            ),
            'AdminHsPointOfSaleNewSalePayment' => array(
                'name' => $this->i18n['new_sale_payment']
            ),
            'AdminHsPointOfSaleReports' => array(
                'active' => true,
                'name' => $this->i18n['reports']
            ),
            'AdminHsPointOfSalePartialPayment' => array(
                'active' => true,
                'name' => $this->i18n['incompleted_orders']
            ),
            'AdminHsPointOfSaleCompletedOrders' => array(
                'active' => true,
                'name' => $this->i18n['completed_orders']
            ),
            'AdminHsPointOfSalePreferences' => array(
                'active' => true,
                'name' => $this->i18n['preferences']
            ),
            'AdminHsPointOfSalePayment' => array(
                'active' => true,
                'name' => $this->i18n['payment']
            ),
            'AdminHsPointOfSaleAddons' => array(
                'active' => true,
                'name' => $this->i18n['rockpos_addons']
            ),
            'AdminHsPointOfSaleCustomer' => array(
                'name' => $this->i18n['rockpos_customer']
            ),
            'AdminHsPointOfSaleWelcomePage' => array(
                'name' => $this->i18n['welcome_page']
            ),
            'AdminHsPointOfSaleAddresses' => array(
                'name' => $this->i18n['rockpos_addresses']
            ),
            'AdminHsPointOfSalePdf' => array(
                'name' => $this->i18n['rockpos_pdf']
            ),
            'AdminHsPointOfSaleProduct' => array(
                'name' => $this->i18n['rockpos_product']
            ),
            'AdminHsPointOfSaleSearchCron' => array(
                'name' => $this->i18n['rockpos_search_for_product']
            )
        );

        $i = 0;
        foreach ($this->pos_tabs as $tab_class => &$tab_option) {
            $tab_option['position'] = ++$i;
            $tab_option['tab_class'] = $tab_class.$this->package;
            $tab_option['active'] = isset($tab_option['active']) ? $tab_option['active'] : false;
        }
        if (defined('_PS_ADMIN_DIR_')) {
            $this->assignAdminUrls();
        }
    }

    /**
     * Install module.
     *
     * @return boolean
     */
    public function install()
    {
        $this->installer = new HsPointOfSaleInstaller($this->name, $this->pos_tabs, $this->displayName);
        $success = array();
        $success[] = parent::install();
        $success[] = $this->installer->installTabs();
        $success[] = $this->installer->installTables();
        $success[] = PosPayment::installDefaultPayments();
        $success[] = $this->installer->insertPartialOrderState();
        $success[] = $this->installConfigs();
        $success[] = $this->installer->activateCartRule();
        $success[] = PosCustomer::createDummyCustomer($this->getDefaultCustomerId());
        $success[] = $this->installer->installPosCustomerGroup();
        $success[] = $this->setFreeShippingCartRule();
        $success[] = $this->insertSelectedOrderStates();
        // install hooks
        $success[] = $this->registerHook('displayBackOfficeHeader');
        $success[] = $this->registerHook('actionProductSave');
        $success[] = $this->registerHook('actionProductDelete');
        $success[] = $this->registerHook('actionCarrierUpdate');
        $success[] = $this->registerHook('posAddToCart');
        
        return array_sum($success) >= count($success);
    }

    /**
     * Install all configuration keys of module
     * @return boolean
     */
    protected function installConfigs()
    {
        $settings = PosConfiguration::getDefaultSettings();
        $flag = true;
        foreach ($settings as $key => $value) {
            $flag &= PosConfiguration::updateValue($key, $value);
        }
        $flag &= PosConfiguration::updateValue('POS_ROCKPOS_NAME', $this->name);
        
        return $flag;
    }
    
    public function initContext()
    {
        // Cart
        if (!empty($this->context->cookie->id_cart) && (int) $this->context->cookie->id_cart) {
            $cart = new PosCart((int) $this->context->cookie->id_cart);
            if (!Validate::isLoadedObject($cart) || $cart->OrderExists()) {
                unset($this->context->cookie->id_cart, $this->context->cookie->checkedTOS);
                $this->context->cookie->check_cgv = false;
                $cart = $this->createEmptyCart();
            }
        } else {
            $cart = $this->createEmptyCart();
        }
        $this->context->cart = $cart;

        // Customer
        $this->context->customer = new PosCustomer($cart->id_customer);
        if (Validate::isLoadedObject($this->context->customer)) {
            $this->context->customer->phone = PosCustomer::getPhoneNumber($this->context->customer);
            $this->context->customer->logged = true; // copied from config.inc.php
        }
        PosCustomer::flushCache();
    }

    /**
     * Create default Cart object.
     *
     * @return PosCart an empty object for PosCart
     */
    protected function createEmptyCart()
    {
        $cart = new PosCart();
        $cart->id_lang = (int) $this->context->language->id;
        $cart->id_currency = (int) $this->context->currency->id;
        $cart->id_shop_group = (int) $this->context->shop->id_shop_group;
        $cart->id_shop = (int) $this->context->shop->id;
        $cart->id_customer = (int) $this->getDefaultCustomerId();
        $cart->id_address_delivery = (int) Address::getFirstCustomerAddressId((int) $cart->id_customer);
        $cart->id_address_invoice = (int) $cart->id_address_delivery;
        $cart->id_carrier = PosConfiguration::get('POS_DEFAULT_CARRIER', 0);
        return $cart;
    }

    /**
     * Uninstall module.
     *
     * @return boolean
     */
    public function uninstall()
    {
        $this->uninstaller = new HsPointOfSaleInstaller($this->name, $this->pos_tabs, $this->displayName);
        $success = array();
        $success[] = parent::uninstall();
        $success[] = $this->uninstaller->uninstallModuleTabs($this->name);
        if (self::POS_REMOVE_TABLES_AND_SETTINGS) {
            $success[] = $this->removeFreeShippingCartRule();
            $success[] = PosConfiguration::removeSettings();
            $success[] = $this->uninstaller->uninstallTables();
        }
        return array_sum($success) >= count($success);
    }

    /**
     * hook into Back Office header position.
     *
     * @return assign template
     */
    public function hookDisplayBackOfficeHeader()
    {
        if (method_exists($this->context->controller, 'addCSS')) {
            $this->context->controller->addCSS($this->getCssPath() . 'icon_menu_pos.css');
        }
        if (!empty($this->context->controller->module) && ($this->context->controller->module->name == $this->name)) {
            $st_pos = array(
                'url'  => $this->urls,
                'lang' => $this->i18n,
            );

            $this->context->smarty->assign(array(
                'js_path'                  => $this->getJsPath(),
                'st_pos'                   => $st_pos,
                'is_prestashop_16'         => $this->isPrestashop16(),
                'is_collecting_payment'    => (int)PosConfiguration::get('POS_COLLECTING_PAYMENT'),
                'is_enable_guest_checkout' => (int)$this->isEnableGuestCheckout(),
                'price_display_precision'  => _PS_PRICE_DISPLAY_PRECISION_,
            ));
            return $this->display($this->name . '.php', 'pos_backofficeheader.tpl');
        }
    }

    /**
     * 
     * @param array $params
     * <pre>
     * array(
     *  id_product => int,
     *  id_product_attribute => int,
     *  qty => int, 
     *  shop => Shop,
     *  currency => Currency,
     *  context => Context
     * )
     */
    public function hookPosAddToCart(array $params)
    {
        $this->initContext();
        return $this->addProductToCart($params['id_product'], $params['id_product_attribute'], $params['shop'], $params['qty']);
    }
    
    /**
     * 
     * @param int $id_product
     * @param int $id_product_attribute
     * @param Shop $shop
     * @param int $qty
     * @return boolean
     */
    public function addProductToCart($id_product, $id_product_attribute, $shop = null, $qty = 0)
    {
        $success = true;
        if (!$shop) {
            $shop = $this->context->shop;
        }
        if (!Validate::isLoadedObject($this->context->cart)) {
            if ($this->context->cart->save()) {
                $this->context->cookie->id_cart = $this->context->cart->id;
                $this->context->cookie->write();
            }
        }
        if (Validate::isLoadedObject($this->context->cart)) {
            $product = new PosProduct($id_product);
            if (empty($id_product_attribute) && $product->hasAttributes()) {
                $id_product_attribute = PosProduct::getDefaultAttribute($id_product);
            }
            $quantity = $qty ? $qty : $this->context->cart->getMinimalQuantityToBeAdded($id_product, $id_product_attribute);
            $success = (bool) $this->context->cart->updateQtyPos($quantity, $id_product, $shop, $id_product_attribute);
        }
        return $success;
    }

    /**
     * add cart rule if free shipping is enable.
     */
    public function setFreeShippingByDefault()
    {
        if ((bool) Configuration::get('POS_FREE_SHIPPING')) {
            if (Validate::isLoadedObject($this->context->cart)) {
                if (!$this->context->cart->doesCartRuleExist((int) Configuration::get('POS_ID_CART_RULE'))) {
                    $cart_rule = $this->getCartRule();
                    if (Validate::isLoadedObject($cart_rule)) {
                        return $this->context->cart->addCartRule((int) $cart_rule->id);
                    }
                }
            }
        }
    }

    /**
     * Get current cart rule, otherwise create a new cart rule for current cart. Rename function name to getCurrentCartRule if possible.
     *
     * @return CartRule
     */
    public function getCartRule()
    {
        if (!$this->checkCartRuleExist()) {
            $this->setFreeShippingCartRule();
        }

        $cart_rule = new CartRule(Configuration::get('POS_ID_CART_RULE'), (int) $this->context->language->id);

        if (!Validate::isLoadedObject($cart_rule)) {
            return false;
        }
        if ((int) $cart_rule->quantity === 0) {
            $cart_rule->quantity = self::CART_RULE_QTY;
            $cart_rule->update();
        }

        return $cart_rule;
    }

    /**
     * Set default free shipping cart rule for pos.
     *
     * @return boolean
     */
    protected function setFreeShippingCartRule()
    {
        $cart_rule = new CartRule(PosConfiguration::get('POS_ID_CART_RULE'));
        $success = true;
        if (!Validate::isLoadedObject($cart_rule)) {
            $cart_rule = new CartRule();
            $cart_rule->name = array(Configuration::get('PS_LANG_DEFAULT') => $this->i18n['free_shipping']);
            $cart_rule->code = Tools::passwdGen();
            $cart_rule->free_shipping = true;
            $cart_rule->quantity = self::CART_RULE_QTY;
            $cart_rule->quantity_per_user = self::CART_RULE_QTY;
            $cart_rule->date_from = date('Y-m-d H:i:s', strtotime('now'));
            $cart_rule->date_to = date('Y-m-d H:i:s', strtotime('+ 10 year'));
            $cart_rule->active = 1;
            $success = $cart_rule->add() && PosConfiguration::updateValue('POS_ID_CART_RULE', $cart_rule->id);
        }
        return $success;
    }

    /**
     * Remove free shipping cart rule.
     *
     * @return boolean
     */
    protected function removeFreeShippingCartRule()
    {
        $cart_rule = new CartRule(Configuration::get('POS_ID_CART_RULE'), (int) $this->context->language->id);

        return ($cart_rule->delete() && Configuration::deleteByName('POS_ID_CART_RULE'));
    }

    /**
     * Check cart rule has been existed or not.
     *
     * @return boolean
     */
    protected function checkCartRuleExist()
    {
        $cart_rule = new CartRule((int) Configuration::get('POS_ID_CART_RULE'), (int) $this->context->language->id);

        return Validate::isLoadedObject($cart_rule);
    }

    /**
     * Assign all possible urls to access from javascript, backend only.
     */
    public function assignAdminUrls()
    {
        $this->urls = array(
            'customerSearch' => $this->getTargetUrl($this->pos_tabs['AdminHsPointOfSaleCustomer']['tab_class'], 'search'),
            'productSearch' => $this->getTargetUrl($this->pos_tabs['AdminHsPointOfSaleProduct']['tab_class'], 'search'),
            'addProductFromBarcode' => $this->getTargetUrl($this->pos_tabs['AdminHsPointOfSaleNewSale']['tab_class'], 'addProductFromBarcode'),
            'removeProductFromCart' => $this->getTargetUrl($this->pos_tabs['AdminHsPointOfSaleNewSale']['tab_class'], 'removeProductFromCart'),
            'ajaxUrl' => $this->getTargetUrl($this->pos_tabs['AdminHsPointOfSaleNewSale']['tab_class'], null), //@todo: to be change to 'newSale'
            'newSalePayment' => $this->getTargetUrl($this->pos_tabs['AdminHsPointOfSaleNewSalePayment']['tab_class'], null),
            'updateBlocks' => $this->getTargetUrl($this->pos_tabs['AdminHsPointOfSaleNewSale']['tab_class'], 'updateBlocks'),
            'ajaxConfirmUrl' => $this->getTargetUrl($this->pos_tabs['AdminHsPointOfSaleWelcomePage']['tab_class'], 'keyShareData'),
            'updateDefaultCustomer' => $this->getTargetUrl($this->pos_tabs['AdminHsPointOfSalePreferences']['tab_class'], 'updateDefaultCustomer'),
            'deleteDefaultCustomer' => $this->getTargetUrl($this->pos_tabs['AdminHsPointOfSalePreferences']['tab_class'], 'deleteDefaultCustomer'),
            'addNote' => $this->getTargetUrl($this->pos_tabs['AdminHsPointOfSaleNewSale']['tab_class'], 'addNote'),
            'addPartialPayment' => $this->getTargetUrl($this->pos_tabs['AdminHsPointOfSalePartialPayment']['tab_class'], 'addPartialPayment'),
            'viewSummary' => $this->getTargetUrl($this->pos_tabs['AdminHsPointOfSalePartialPayment']['tab_class'], 'viewSummary'),
            'printReceipt' => $this->getTargetUrl($this->pos_tabs['AdminHsPointOfSalePdf']['tab_class'], 'printReceipt'),
            'getReportData' => $this->getTargetUrl($this->pos_tabs['AdminHsPointOfSaleReports']['tab_class'], 'getReportData'),
        );

        if (PosConfiguration::get('POS_PRESTASHOP_INVOICE')) {
            $this->urls['printInvoice'] = $this->context->link->getAdminLink('AdminPdf') . '&submitAction=generateInvoicePDF';
        } else {
            $this->urls['printInvoice'] = $this->getTargetUrl($this->pos_tabs['AdminHsPointOfSalePdf']['tab_class'], 'printInvoice');
        }
    }

    /**
     * @param array $translations
     *                            array(<pre>
     *                            'string' => string // 'key_translation' => 'text_translation'
     *                            ...
     *                            )</pre>
     */
    public function setTranslations($translations = array())
    {
        $this->i18n = array_merge($this->i18n, $translations);
        $this->context->smarty->assign('hs_pos_i18n', $this->i18n);
    }

    /**
     * Get text transtaltion by key.
     *
     * @param string $key_translation
     *
     * @return string
     */
    public function getTranslation($key_translation)
    {
        return $this->i18n[$key_translation];
    }

    /**
     * All  possible message in this module
     * How to access:
     * - js: st.lang.key
     * - module: $this->lang[key]
     * - module admin controller: $this->lang[key]
     * NOTE: PLEASE CHECK IF THIS KEY ALREADY EXISTS.
     */
    protected function initTranslations()
    {
        $source = basename(__FILE__, '.php');
        $this->i18n = array(
            '_a_read_more_a' => $this->l('[a]Read more.[/a]', $source),
            'a4_210x297_mm_8_27x11_69_in' => $this->l('A4 (210x297 mm ; 8.27x11.69 in)', $source),
            'a5_148x210_mm_5_83x8_27_in' => $this->l('A5 (148x210 mm ; 5.83x8.27 in)', $source),
            'action' => $this->l('Action', $source),
            'active' => $this->l('Active', $source),
            'actual_size' => $this->l('Actual size', $source),
            'add_a_custom_product_or_package_and_sell_immediately_in_rockpos' => $this->l('Add a custom product (or package) and sell immediately in RockPOS', $source),
            'add_a_new_point_of_sale_payment' => $this->l('Add a new Point of Sale payment', $source),
            'add_custom_message_on_invoice_footer' => $this->l('Add custom message on invoice footer. E.g.: Discount offer, holiday greeting, returns policy.', $source),
            'add_custom_message_on_receipt_footer' => $this->l('Add custom message on receipt footer. E.g.: Discount offer, holiday greeting, returns policy.', $source),
            'add_missing_products_to_the_index' => $this->l('Add missing products to the index', $source),
            'add_new' => $this->l('Add new', $source),
            'add_new_address' => $this->l('Add new address', $source),
            'add_note' => $this->l('Add note', $source),
            'add_payment' => $this->l('Add payment', $source),
            'add_your_on_to_help_us_improve_continuously' => $this->l('Add your %s on %s to help us improve %s continuously.', $source),
            'address' => $this->l('Address', $source),
            'address_alias' => $this->l('Address alias', $source),
            'address_invalid' => $this->l('Address invalid.', $source),
            'addresses' => $this->l('Addresses', $source),
            'all_employees' => $this->l('All employees', $source),
            'allow_ordering_of_disabled_products' => $this->l('Allow ordering of disabled products', $source),
            'allow_ordering_of_out_of_stock_products' => $this->l('Allow ordering of out-of-stock products', $source),
            'amount' => $this->l('Amount', $source),
            'amount_due' => $this->l('Amount due', $source),
            'an_awesome_prestashop_solution_provided_by_prestamonster' => $this->l('An awesome PrestaShop solution provided by PrestaMonster.', $source),
            'and_as_a_result_you_will_get_more_values_from_us' => $this->l('And as a result, you will get more values from us.', $source),
            'ape' => $this->l('APE', $source),
            'apply' => $this->l('Apply', $source),
            'auto_indexing' => $this->l('Auto indexing', $source),
            'available_quantity' => $this->l('Available quantity', $source),
            'base_price' => $this->l('Base price', $source),
            'bill_to' => $this->l('Bill to', $source),
            'billing_address' => $this->l('Billing address', $source),
            'building_the_product_index_may_take_a_few_minutes' => $this->l('Building the product index may take a few minutes. If your server stops before the process ends, you can resume the indexing by clicking "Add missing products to the index".', $source),
            'by_confirming_this_action_order_will_be_added_by' => $this->l('By confirming this action, order [order_reference] will be added [order_amount] by [payment_method].', $source),
            'by_default_only_products_whose_visibility_marked_as_everywhere_or_search_only_can_be_available_for_sale' => $this->l('By default, only products whose visibility marked as [Everywhere] or [Search only] can be available for sale. This option enables you selling flexibly.', $source),
            'can_not_change_to_your_option' => $this->l('Can not change to your option', $source),
            'cancel' => $this->l('Cancel', $source),
            'cancel_order' => $this->l('Cancel order', $source),
            'cannot_add_a_new_payment' => $this->l('Cannot add a new payment.', $source),
            'cannot_assign_customer_to_cart' => $this->l('Cannot assign customer to cart.', $source),
            'cannot_associate_this_customer' => $this->l('Cannot associate this customer.', $source),
            'cannot_get_payment_id' => $this->l('Cannot get payment id.', $source),
            'cannot_get_product_id' => $this->l('Cannot get product id.', $source),
            'cannot_remove_product_from_cart' => $this->l('Cannot remove product from cart.', $source),
            'cannot_remove_this_payment' => $this->l('Cannot remove this payment.', $source),
            'carrier' => $this->l('Carrier', $source),
            'cart' => $this->l('Cart', $source),
            'cashier' => $this->l('Cashier', $source),
            'catalog_only' => $this->l('Catalog only', $source),
            'change' => $this->l('Change', $source),
            'change_back' => $this->l('Change back', $source),
            'change_log' => $this->l('Change log', $source),
            'change_store_info' => $this->l('Change store info? Click %s.', $source),
            'check_number_is_invalid' => $this->l('Check number is invalid.', $source),
            'chrome' => $this->l('Chrome', $source),
            'city' => $this->l('City', $source),
            'city_invalid' => $this->l('City invalid.', $source),
            'click_here_to_pick_up_your_own_reports' => $this->l('Click here to pick up your own reports.', $source),
            'click_outside_to_add_items_using_a_barcode_scanner' => $this->l('click outside to add items using a barcode scanner', $source),
            'collect_payment' => $this->l('Collect payment', $source),
            'combination' => $this->l('Combination', $source),
            'company' => $this->l('Company', $source),
            'complete_sale' => $this->l('Complete sale', $source),
            'completed_orders' => $this->l('Completed orders', $source),
            'configure' => $this->l('Configure', $source),
            'country' => $this->l('Country', $source),
            'custom_dates' => $this->l('Custom dates', $source),
            'custom_note_optional' => $this->l('Custom note (optional)', $source),
            'custom_texts_at_footer' => $this->l('Custom texts at footer', $source),
            'customer' => $this->l('Customer', $source),
            'customer_email' => $this->l('Customer email', $source),
            'dashboard' => $this->l('Dashboard', $source),
            'date' => $this->l('Date', $source),
            'day' => $this->l('Day', $source),
            'default_carrier' => $this->l('Default carrier', $source),
            'default_customer' => $this->l('Default customer', $source),
            'default_discount_type_order' => $this->l('Default discount type (order)', $source),
            'default_discount_type_product' => $this->l('Default discount type (product)', $source),
            'default_order_status' => $this->l('Default order status', $source),
            'default_payment' => $this->l('Default payment', $source),
            'delete' => $this->l('Delete', $source),
            'delete_selected' => $this->l('Delete selected', $source),
            'delete_selected_items' => $this->l('Delete selected items?', $source),
            'delivery' => $this->l('Delivery', $source),
            'delivery_address' => $this->l('Delivery address', $source),
            'delivery_option' => $this->l('Delivery option', $source),
            'delivery_to' => $this->l('Delivery to', $source),
            'description' => $this->l('Description', $source),
            'disabled' => $this->l('disabled', $source),
            'discount' => $this->l('Discount', $source),
            'discount_invalid' => $this->l('Discount invalid', $source),
            'display_employee_name' => $this->l('Display employee name', $source),
            'display_shop_name' => $this->l('Display shop name', $source),
            'dni_nif_nie' => $this->l('DNI / NIF / NIE', $source),
            'done' => $this->l('Done', $source),
            'do_you_need_to_generate_the_invoice' => $this->l('Do you need to generate the invoice?', $source),
            'do_you_need_to_generate_the_receipt' => $this->l('Do you need to generate the receipt?', $source),
            'do_you_want_to_cancel_this_order' => $this->l('Do you want to cancel this order?', $source),
            'do_you_want_to_delete_this_item' => $this->l('Do you want to delete this item?', $source),
            'do_you_want_to_reset_all_payments' => $this->l('Do you want to reset all payments', $source),
            'download' => $this->l('Download', $source),
            'download_now' => $this->l('Download now!', $source),
            'ean_13_or_jan_barcode' => $this->l('EAN-13 or JAN barcode', $source),
            'ecotax' => $this->l('Ecotax', $source),
            'edit' => $this->l('edit', $source),
            'edit_point_of_sale_payment' => $this->l('Edit Point of Sale payment', $source),
            'email' => $this->l('Email', $source),
            'email_invalid' => $this->l('Email invalid.', $source),
            'employee' => $this->l('Employee', $source),
            'empty_barcode' => $this->l('Empty barcode', $source),
            'enable_free_shipping_by_default' => $this->l('Enable free shipping by default', $source),
            'enable_if_you_want_to_collect_payment_in' => $this->l('Enable if you want to collect payment in %s.', $source),
            'enable_now' => $this->l('Enable now!', $source),
            'enable_signature' => $this->l('Enable signature', $source),
            'enable_the_automatic_indexing_of_products' => $this->l('Enable the automatic indexing of products.', $source),
            'enabled' => $this->l('enabled', $source),
            'error' => $this->l('error', $source),
            'errors' => $this->l('errors', $source),
            'everywhere' => $this->l('Everywhere', $source),
            'exempt_of_vat_according_to_section_259b_of_the_general_tax_code' => $this->l('Exempt of VAT according to section 259B of the General Tax Code.', $source),
            'fail_to_update_address' => $this->l('Fail to update address.', $source),
            'fail_to_update_extra_carrier' => $this->l('Fail to update extra carrier.', $source),
            'fax' => $this->l('Fax', $source),
            'filter_by_category' => $this->l('Filter by category', $source),
            'filter_products_by_categories' => $this->l('Filter products by categories', $source),
            'firefox' => $this->l('Firefox', $source),
            'first_name' => $this->l('First name', $source),
            'first_name_invalid' => $this->l('First name invalid.', $source),
            'for_example' => $this->l('For example, %s', $source),
            'free_shipping' => $this->l('Free shipping', $source),
            'from' => $this->l('From', $source),
            'general' => $this->l('General', $source),
            'gift' => $this->l('Gift!', $source),
            'given' => $this->l('Given', $source),
            'guest_checkout_pos_only' => $this->l('Guest checkout (POS only)', $source),
            'here' => $this->l('here', $source),
            'home_phone' => $this->l('Home phone', $source),
            'i_confirm' => $this->l('I confirm', $source),
            'id' => $this->l('ID', $source),
            'identification_number' => $this->l('Identification Number', $source),
            'if_the_feature_is_disabled_you_will_have_to_index_products_manually_by_using_the_links_provided_in_the_field_set' => $this->l('If the feature is disabled, you will have to index products manually by using the links provided in the field set.', $source),
            'if_you_enable_this_feature_the_products_will_be_indexed_in_the_search_automatically_when_they_are_saved' => $this->l('If you enable this feature, the products will be indexed in the search automatically when they are saved.', $source),
            'image' => $this->l('Image', $source),
            'including_account_creation_and_order_completion' => $this->l('Including: account creation and order completion', $source),
            'incompleted_orders' => $this->l('Incompleted orders', $source),
            'indexed_products' => $this->l('Indexed products %s', $source),
            'indexing' => $this->l('Indexing', $source),
            'install_now' => $this->l('Install now!', $source),
            'installed' => $this->l('Installed', $source),
            'internal_server_error' => $this->l('Internal server error.', $source),
            'internet_explorer' => $this->l('Internet Explorer', $source),
            'invalid_characters' => $this->l('Invalid characters', $source),
            'invoice' => $this->l('Invoice', $source),
            'invoice_date' => $this->l('Invoice Date', $source),
            'invoice_logo' => $this->l('Invoice logo', $source),
            'invoice_number' => $this->l('Invoice number', $source),
            'invoice_size' => $this->l('Invoice size', $source),
            'invoicing' => $this->l('Invoicing', $source),
            'it_might_not_work_properly_on_internet_explorer' => $this->l('It might not work properly on Internet Explorer.', $source),
            'item' => $this->l('item', $source),
            'items' => $this->l('items', $source),
            'just_log_into_with_your_credentials_then_visit_this_page_and_look_for_the_right_order_number' => $this->l('Just log into %s with your credentials, then visit this page and look for the right order number.', $source),
            'k57_57x80_mm_2_25x3_19_in' => $this->l('K57 (57x80 mm ; 2.25x3.19 in)', $source),
            'k80_80x114_mm_3_50x4_49_in' => $this->l('K80 (80x114 mm ; 3.50x4.49 in)', $source),
            'label' => $this->l('Label', $source),
            'landscape' => $this->l('Landscape', $source),
            'last_12_months' => $this->l('Last 12 months', $source),
            'last_7_days' => $this->l('Last 7 days', $source),
            'last_month' => $this->l('Last month', $source),
            'last_name' => $this->l('Last name', $source),
            'last_name_invalid' => $this->l('Last name invalid.', $source),
            'last_week' => $this->l('Last week', $source),
            'letter_215_9x279_4_mm_8_5x11_in' => $this->l('Letter (215.9x279.4 mm; 8.5x11 in)', $source),
            'logo' => $this->l('Logo', $source),
            'looking_for_even_better_prestashop_modules' => $this->l('Looking for even better PrestaShop modules?', $source),
            'mobile_phone' => $this->l('Mobile phone', $source),
            'month' => $this->l('Month', $source),
            'name' => $this->l('Name', $source),
            'net_profit' => $this->l('Net Profit', $source),
            'net_profit_is_a_measure_of_the_profitability_of_a_venture_after_accounting_for_all_ecommerce_costs' => $this->l('Net profit is a measure of the profitability of a venture after accounting for all Ecommerce costs.', $source),
            'new_customer' => $this->l('New customer', $source),
            'new_order' => $this->l('New order', $source),
            'new_sale' => $this->l('New Sale', $source),
            'new_sale_payment' => $this->l('New Sale / Payment', $source),
            'news' => $this->l('News', $source),
            'news_version' => $this->l('News version', $source),
            'no' => $this->l('No', $source),
            'no_associated_customer_found' => $this->l('No associated customer found.', $source),
            'no_carrier' => $this->l('No carrier', $source),
            'no_html_tags_please' => $this->l('No HTML tags please.', $source),
            'no_payment' => $this->l('No payment', $source),
            'no_products' => $this->l('No products', $source),
            'no_tax' => $this->l('No tax', $source),
            'note' => $this->l('Note', $source),
            'nowhere' => $this->l('Nowhere', $source),
            'once_enabled_please_associate_a_default_customer_profile' => $this->l('Once enabled, please associate a default customer profile. You can create a new one, for example, a customer profile connected with %s.', $source),
            'oops_amount_is_empty' => $this->l('Oops, amount is empty!', $source),
            'oops_no_invoice_associated_with_order' => $this->l('Oops, no invoice associated with order %s!', $source),
            'oops_nothing_to_display' => $this->l('Oops, nothing to display.', $source),
            'oops_something_goes_wrong' => $this->l('Oops! Something goes wrong. Please contact your server administrator.', $source),
            'oops_the_margin_is_too_big' => $this->l('Oops! The margin is too big.', $source),
            'oops_your_session_just_expired' => $this->l('Oops, your session just expired. Please log in again!', $source),
            'order' => $this->l('Order', $source),
            'order_date' => $this->l('Order date', $source),
            'order_discount' => $this->l('Order discount', $source),
            'order_number' => $this->l('Order number', $source),
            'order_placed_on' => $this->l('Order placed on', $source),
            'order_reference' => $this->l('Order Reference', $source),
            'order_status' => $this->l('Order status', $source),
            'order_status_to_be_shown' => $this->l('Order status to be shown', $source),
            'order_summary' => $this->l('Order summary', $source),
            'orders' => $this->l('Orders', $source),
            'orientation' => $this->l('Orientation', $source),
            'other' => $this->l('Other', $source),
            'out_of_stock' => $this->l('Out of stock', $source),
            'paid' => $this->l('Paid', $source),
            'paper_margin_mm' => $this->l('Paper margin (mm)', $source),
            'paper_size' => $this->l('Paper size', $source),
            'pay' => $this->l('Pay', $source),
            'pay_now' => $this->l('Pay now', $source),
            'payment' => $this->l('Payment', $source),
            'payment_amount_should_be_greater_than_zero_and_less_than_or_equal_to_amount_due' => $this->l('Payment amount should be greater than zero and less than or equal to amount due.', $source),
            'payment_method' => $this->l('Payment method', $source),
            'payment_methods' => $this->l('Payment methods', $source),
            'payment_name' => $this->l('Payment name', $source),
            'payment_type' => $this->l('Payment type', $source),
            'percentage' => $this->l('%', $source),
            'phone' => $this->l('Phone', $source),
            'phone_invalid' => $this->l('Phone invalid.', $source),
            'pick_up_one' => $this->l('Pick Up One', $source),
            'please_enter_a_number' => $this->l('Please enter a number.', $source),
            'please_enter_the_payment_reference' => $this->l('Please enter the payment reference.', $source),
            'please_go_to_preferences_product_to_re_build_product_index' => $this->l('Please go to %s > Preferences > Product to re-build product index.', $source),
            'point_of_sale' => $this->l('Point of sale', $source),
            'point_of_sale_payment' => $this->l('Point of Sale payment', $source),
            'popup_blocker_should_be_turned_off_on_your_or' => $this->l('Popup blocker should be turned off on your %s, %s or %s.', $source),
            'portrait' => $this->l('Portrait', $source),
            'pos_filter_products' => $this->l('POS Filter products', $source),
            'pos_loyalty' => $this->l('POS Loyalty', $source),
            'pos_multiple_carts' => $this->l('POS Multiple carts', $source),
            'pos_order_history' => $this->l('POS Order history', $source),
            'pos_pay_with_paypal_via_email' => $this->l('POS pay with Paypal via email', $source),
            'pos_sales_commission' => $this->l('POS Sales commission', $source),
            'pos_sales_summary_report' => $this->l('POS Sales summary (report)', $source),
            'pos_sell_custom_products' => $this->l('POS Sell custom products', $source),
            'position' => $this->l('Position', $source),
            'postcode_invalid' => $this->l('Postcode invalid.', $source),
            'pre_order' => $this->l('Pre-order', $source),
            'preferences' => $this->l('Preferences', $source),
            'prestashop_addons' => $this->l('Prestashop Addons', $source),
            'price' => $this->l('Price', $source),
            'print' => $this->l('Print', $source),
            'print_invoice_automatically' => $this->l('Print invoice automatically', $source),
            'print_preview' => $this->l('Print preview', $source),
            'print_receipt_automatically' => $this->l('Print receipt automatically', $source),
            'process_multiple_carts_at_the_same_time' => $this->l('Process multiple carts at the same time', $source),
            'product' => $this->l('Product', $source),
            'product_discount' => $this->l('Product discount', $source),
            'product_info' => $this->l('Product info', $source),
            'product_name' => $this->l('Product name', $source),
            'product_tax' => $this->l('Product Tax', $source),
            'product_visibility_for_sale' => $this->l('Product visibility for sale', $source),
            'promotion' => $this->l('Promotion', $source),
            'qty' => $this->l('Qty', $source),
            'quantity' => $this->l('Quantity', $source),
            'rating_icon' => $this->l('★★★★★', $source),
            're_build_the_entire_index' => $this->l('Re-build the entire index', $source),
            'read_more' => $this->l('Read more...', $source),
            'receipt' => $this->l('Receipt', $source),
            'receipt_info' => $this->l('Receipt info', $source),
            'receipt_logo' => $this->l('Receipt logo', $source),
            'ref' => $this->l('Ref', $source),
            'reference' => $this->l('Reference', $source),
            'registration_number' => $this->l('Registration number', $source),
            'released' => $this->l('Released', $source),
            'remove' => $this->l('Remove', $source),
            'remove_discount' => $this->l('Remove discount', $source),
            'reports' => $this->l('Reports', $source),
            'request_time_out' => $this->l('Request time out.', $source),
            'requested_page_not_found' => $this->l('Requested page not found.', $source),
            'return' => $this->l('Return', $source),
            'rockpos_addons' => $this->l('RockPOS addons', $source),
            'rockpos_addresses' => $this->l('RockPOS addresses', $source),
            'rockpos_customer' => $this->l('RockPOS customer', $source),
            'rockpos_pdf' => $this->l('RockPOS pdf', $source),
            'rockpos_product' => $this->l('RockPOS Product', $source),
            'rockpos_search_for_product' => $this->l('RockPOS search for product', $source),
            'sale_price' => $this->l('Sale price', $source),
            'sales' => $this->l('Sales', $source),
            'sales_report_on_daily_wekly_monthly_or_custom_date_basis_pdf_export_supported' => $this->l('Sales report on daily, wekly, monthly or custom date basis, PDF export supported', $source),
            'save' => $this->l('Save', $source),
            'search_for_a_customer' => $this->l('Search for a customer...', $source),
            'search_for_catalog_only_products' => $this->l('Search for catalog only products', $source),
            'search_for_guests' => $this->l('Search for guests', $source),
            'search_for_items' => $this->l('Search for items...', $source),
            'search_only' => $this->l('Search only', $source),
            'select_items_to_show_on_receipt' => $this->l('Select items to show on receipt', $source),
            'send_an_email_requesting_payment_via_paypal' => $this->l('Send an email requesting payment via Paypal', $source),
            'send_confirmation_emails' => $this->l('Send confirmation emails', $source),
            'share_your_reviews' => $this->l('Share your reviews', $source),
            'shipping' => $this->l('Shipping', $source),
            'shipping_address' => $this->l('Shipping address', $source),
            'shipping_cost' => $this->l('Shipping cost', $source),
            'shop' => $this->l('Shop', $source),
            'shop_address_line_1' => $this->l('Shop address line 1', $source),
            'shop_association' => $this->l('Shop association', $source),
            'shop_name' => $this->l('Shop name', $source),
            'show_addresses' => $this->l('Show addresses', $source),
            'show_customer_info' => $this->l('Show customer info', $source),
            'show_ean_13_or_jan_barcode_info' => $this->l('Show EAN-13 or JAN barcode info', $source),
            'show_less' => $this->l('Show less', $source),
            'show_loyalty_of_current_customer' => $this->l('Show loyalty of current customer', $source),
            'show_more' => $this->l('Show more', $source),
            'show_on_invoice_receipt' => $this->l('Show on invoice / receipt', $source),
            'show_order_history_of_current_customer' => $this->l('Show order history of current customer', $source),
            'show_orders_under_back_office_orders' => $this->l('Show orders under Back office > Orders', $source),
            'show_these_when_searching_for_products' => $this->l('Show these when searching for products', $source),
            'signature' => $this->l('Signature', $source),
            'siret' => $this->l('SIRET', $source),
            'social_title' => $this->l('Social title', $source),
            'state' => $this->l('State', $source),
            'status' => $this->l('Status', $source),
            'stock' => $this->l('Stock', $source),
            'store_details' => $this->l('Store details', $source),
            'sub_total' => $this->l('Sub total', $source),
            'sum_of_revenue_excl_tax_generated_within_the_date_range_by_orders_considered_validated' => $this->l('Sum of revenue (excl. tax) generated within the date range by orders considered validated.', $source),
            'summary' => $this->l('Summary', $source),
            'take_a_look_at_all_modules_developed_by' => $this->l('Take a look at all modules developed by %s.', $source),
            'tax_code' => $this->l('Tax Code', $source),
            'tax_detail' => $this->l('Tax Detail', $source),
            'tax_excl' => $this->l('Tax excl.', $source),
            'tax_incl' => $this->l('Tax incl.', $source),
            'tax_included' => $this->l('Tax included', $source),
            'tax_number' => $this->l('Tax number', $source),
            'tax_rate' => $this->l('Tax Rate', $source),
            'tel' => $this->l('Tel', $source),
            'thank_you_and_take_me_to' => $this->l('Thank you, and take me to %s', $source),
            'thank_you_for_shopping' => $this->l('Thank you for shopping!', $source),
            'thank_you_for_shopping_with_us' => $this->l('Thank you for shopping with us.', $source),
            'the_indexed_products_have_been_analyzed_by_and_will_appear_in_the_results_of_a_search' => $this->l('The "indexed" products have been analyzed by %1$s and will appear in the results of a %1$s search.', $source),
            'the_item_is_not_available' => $this->l('The item is not available.', $source),
            'the_voucher_code_is_invalid' => $this->l('The voucher code is invalid.', $source),
            'there_are_2_kinds_of_customers_standard_customers_and_guest_customers' => $this->l('There are 2 kinds of customers: standard customers and guest customers. Enabling this will enable salesmen to search and retrieve info of guest customers. This is helpful when the shop is enabled with "Guest checkout" at frontend.', $source),
            'there_is_an_error_on_applying_free_shipping' => $this->l('There is an error on applying free shipping.', $source),
            'there_is_an_error_on_displaying_paid_payment_block' => $this->l('There is an error on displaying paid payment block.', $source),
            'there_is_an_error_on_removing_default_customer' => $this->l('There is an error on removing default customer.', $source),
            'there_is_an_error_on_updating_default_customer' => $this->l('There is an error on updating default customer.', $source),
            'there_was_a_connecting_problem' => $this->l('There was a connecting problem. Please check your internet connection and try again.', $source),
            'this_customer_already_exists' => $this->l('This customer already exists.', $source),
            'this_variant_does_not_exist' => $this->l('This variant does not exist.', $source),
            'this_voucher_does_not_exist' => $this->l('This voucher does not exist.', $source),
            'to' => $this->l('To', $source),
            'to_use_prestashop_invoice_template_instead_of_rockpos_s' => $this->l("To use PrestaShop invoice template instead of RockPOS's", $source),
            'today' => $this->l('Today', $source),
            'total' => $this->l('Total', $source),
            'total_discount_order' => $this->l('Total discount order', $source),
            'total_discount_products' => $this->l('Total discount products', $source),
            'total_number_of_orders_received_within_the_date_range_that_are_considered_validated' => $this->l('Total number of orders received within the date range that are considered validated.', $source),
            'total_paid' => $this->l('Total paid', $source),
            'total_products' => $this->l('Total products', $source),
            'total_tax' => $this->l('Total Tax', $source),
            'total_vouchers' => $this->l('Total vouchers', $source),
            'track_sales_commission_for_orders_created_by_rockpos' => $this->l('Track sales commission for orders created by RockPOS', $source),
            'un_paid' => $this->l('Un-paid', $source),
            'unit_price' => $this->l('Unit Price', $source),
            'unit_price_exclude_tax' => $this->l('Unit price / exclude tax', $source),
            'unit_price_include_tax' => $this->l('Unit price / include tax', $source),
            'upc_barcode' => $this->l('UPC barcode', $source),
            'update_cart_summary_unsuccessfully' => $this->l('Update cart summary unsuccessfully!', $source),
            'use_prestashop_invoice' => $this->l('Use PrestaShop invoice', $source),
            'vat_number' => $this->l('VAT number', $source),
            'verify_barcode_when_searching_scanning' => $this->l('Verify barcode when searching / scanning', $source),
            'version' => $this->l('version', $source),
            'view' => $this->l('View', $source),
            'voucher' => $this->l('Voucher', $source),
            'warning' => $this->l('Warning:', $source),
            'warning_if_no_invoice_logo_is_available_the_main_logo_will_be_used_instead' => $this->l('Warning: if no invoice logo is available, the main logo will be used instead.', $source),
            'warning_if_no_receipt_logo_is_available_the_main_logo_will_be_used_instead' => $this->l('Warning: if no receipt logo is available, the main logo will be used instead.', $source),
            'website' => $this->l('Website', $source),
            'website_url' => $this->l('Website URL', $source),
            'welcome_page' => $this->l('Welcome page', $source),
            'welcome_to' => $this->l('Welcome to %s %s!', $source),
            'when_collecting_payment_is_turned_off_orders_will_be_paid_with_this_payment' => $this->l('When collecting payment is turned off, orders will be paid with this payment.', $source),
            'wrapping' => $this->l('Wrapping', $source),
            'year' => $this->l('Year', $source),
            'yesterday' => $this->l('Yesterday', $source),
            'you_can_edit_and_save_a_product_but_it_takes_too_much_time_to_complete' => $this->l('You can edit and save a product but it takes too much time to complete', $source),
            'you_can_set_a_cron_job_that_will_build_your_index_using_the_following_url' => $this->l('You can set a cron job that will build your index using the following URL', $source),
            'you_cannot_edit_and_save_a_product' => $this->l('You cannot edit and save a product', $source),
            'you_must_enter_a_voucher_code' => $this->l('You must enter a voucher code.', $source),
            'you_must_register_at_least_one_phone_number' => $this->l('You must register at least one phone number.', $source),
            'you_should_disable_this_and_set_up_a_cron_job_instead_if' => $this->l('You should disable this and set up a cron job instead, if:', $source),
            'your_product_settings_have_been_changed' => $this->l('Your product settings have been changed. You should re-build entire index using the link provided below.', $source),
            'your_shopping_cart_is_empty' => $this->l('Your shopping cart is empty.', $source),
            'zip_postal_code' => $this->l('Zip/Postal Code', $source),
        );
        $this->context->smarty->assign('hs_pos_i18n', $this->i18n);
    }

    /**
     * combine an url for the default controller of module.
     *
     * @param string $controller
     * @param string $action
     * @param boolean $ajax
     *
     * @return string full Ajax Url
     */
    public function getTargetUrl($controller = '', $action = '', $ajax = true)
    {
        $params = array();
        $params['ajax'] = $ajax;
        $params['controller'] = $controller;
        if (!empty($action)) {
            $params['action'] = trim($action);
        }
        $params['token'] = Tools::getAdminTokenLite($controller);
        $query = array();
        foreach ($params as $key => $value) {
            $query[] = $key.'='.$value;
        }

        return '?'.implode('&', $query);
    }

    /**
     * Get relative path to js files of module.
     *
     * @return string
     */
    public function getJsPath()
    {
        return $this->_path.self::PATH_JS;
    }

    /**
     * Get relative path to css files of module.
     *
     * @return string
     */
    public function getCssPath()
    {
        return $this->_path.self::PATH_CSS;
    }

    /**
     * Get relative path to images files of module.
     *
     * @return string
     */
    public function getImgPath()
    {
        return $this->_path.self::PATH_IMG;
    }

    /**
     * Open Preferences page.
     */
    public function getContent()
    {
        Tools::redirectAdmin($this->context->link->getAdminLink($this->pos_tabs['AdminHsPointOfSalePreferences']['tab_class']));
    }

    /**
     * Dedicated callback to upgrading process.
     *
     * @param type $version
     *
     * @return boolean
     */
    public function upgrade($version)
    {
        $this->installer = new HsPointOfSaleInstaller($this->name, $this->pos_tabs, $this->displayName);
        $success = array();
        switch ($version) {
            case '1.5':
                $success[] = $this->installer->installConfigs15();
                $success[] = $this->setFreeShippingCartRule();
                $success[] = PosCustomer::createDummyCustomer($this->getDefaultCustomerId());
                break;

            case '1.6.1':
                $success[] = $this->installer->updatePosPaymentName();
                break;

            case '1.7':
                $success[] = $this->installer->installConfigs17();
                break;

            case '1.9':
                $success[] = $this->installer->installTab($this->pos_tabs['AdminHsPointOfSaleCustomer']);
                break;

            case '1.9.4':
                $success[] = $this->installer->installTab($this->pos_tabs['AdminHsPointOfSalePayment']);
                $success[] = $this->installer->installConfigs194();
                break;

            case '1.11':
                $success[] = $this->installer->installConfigs111();
                break;

            case '1.11.2':
                $success[] = $this->installer->installConfigs112();
                break;

            case '1.11.4':
                $success[] = $this->installer->installTab($this->pos_tabs['AdminHsPointOfSaleWelcomePage']);
                break;

            case '1.11.6':
                $success[] = $this->installer->installConfigs116();
                break;

            case '1.11.8':
                $success[] = $this->installer->installConfigs1118();
                break;

            case '1.12':
                $success[] = $this->installer->installConfigs1120();
                break;

            case '2.0.0':
                $success[] = $this->installer->deleteConfigurationKeys200();
                $success[] = $this->installer->installConfigs200();
                break;

            case '2.2.0':
                $success[] = $this->installer->installTab($this->pos_tabs['AdminHsPointOfSaleAddons']);
                $success[] = $this->installer->moveHiddenTabsToPosTab();
                $success[] = $this->installer->installTable220();
                break;

            case '2.2.1':
                $success[] = $this->installer->installTab($this->pos_tabs['AdminHsPointOfSaleAddresses']);
                break;

            case '2.2.3':
                $success[] = $this->removeTemplateFilesOfReferencesPage();
                break;

            case '2.2.2':
                $success[] = $this->removeTemplatesFilterByCatogry();
                $success[] = $this->installer->updatePositionParentTab();
                break;

            case '2.3.0':
                $success[] = $this->installer->upgradeModule224();
                $success[] = $this->installer->installTab($this->pos_tabs['AdminHsPointOfSalePartialPayment']);
                $success[] = $this->installer->installTab($this->pos_tabs['AdminHsPointOfSaleCompletedOrders']);
                break;

            case '2.3.2':
                $success[] = $this->installer->updateTable232();
                $success[] = $this->installer->updateTabsPosition($this->name);
                $success[] = $this->insertSelectedOrderStates();
                $success[] = $this->installer->installConfigs232();
                break;

            case '2.3.3':
                $success[] = $this->installer->installConfigs233();
                $success[] = $this->installer->updateTable233();
                break;
            
            case '2.3.4':
                $success[] = $this->installer->installTab($this->pos_tabs['AdminHsPointOfSaleDashboard']);
                $success[] = $this->installer->updateTabsPosition($this->name);
                $success[] = $this->installer->installPosCustomerGroup();
                $success[] = $this->installer->installConfigs234();
                break;
            
            case '2.3.6':
                $success[] = PosConfiguration::rename('POS_SHOW_PRODUCT_UBC_BARCODE', 'POS_SHOW_PRODUCT_UPC_BARCODE');
                $success[] = $this->installer->updateTable236();
                $success[] = array_sum($success) >= count($success) && PosOrder::syncOldPosOrders($this->name);
                break;
            
            case '2.3.8':
                $success[] = $this->installer->installConfigs238();
                $success[] = $this->installer->updateGivenMoney();
                break;
            
            case '2.3.9':
                $success[] = $this->installer->cleanUpFiles239();
                $pos_group = new PosGroup((int) PosConfiguration::get('POS_CUSTOMER_ID_GROUP'));
                $success[] = $pos_group->updateModulesRestriction();
                break;
            
            case '2.3.12':
                $success[] = $this->installer->cleanUpFiles2312();
                $success[] = $this->installer->cleanUpDirectories2312();
                $success[] = $this->installer->installTab($this->pos_tabs['AdminHsPointOfSalePdf']);
                if (array_sum($success) >= count($success)) {
                    $success[] = PosTab::copyAccesses('AdminHsPointOfSalePro', 'AdminHsPointOfSalePdf');
                }
                break;

            case '2.3.14':
                $success[] = $this->installer->updateTable2314();
                $success[] = $this->installer->cleanUpFiles2314();
                $success[] = $this->installer->cleanUpDirectories2314();
                $pos_tab = new Tab((int) Tab::getIdFromClassName('AdminHsPointOfSalePro'));
                if (Validate::isLoadedObject($pos_tab)) {
                    $pos_tab->class_name = $this->pos_tabs['AdminHsPointOfSaleNewSale']['tab_class'];
                    $success[] = $pos_tab->update();
                }
                $success[] = $this->installer->updateTabs2314($this->package);
                break;
                
            case '2.3.15':
                $success[] = $this->installer->installTab($this->pos_tabs['AdminHsPointOfSaleCustomer']);
                $success[] = $this->installer->cleanUpFiles2315();
                $success[] = $this->installer->cleanUpDirectories2315();
                $success[] = $this->installer->installConfigs2315($this->name);
                if (array_sum($success) >= count($success)) {
                    $success[] = PosTab::copyAccesses('AdminHsCustomer' . $this->package, $this->pos_tabs['AdminHsPointOfSaleCustomer']['tab_class']);
                }
                $success[] = $this->installer->installTab($this->pos_tabs['AdminHsPointOfSaleProduct']);
                if (array_sum($success) >= count($success)) {
                    $success[] = PosTab::copyAccesses($this->pos_tabs['AdminHsPointOfSaleNewSale']['tab_class'], $this->pos_tabs['AdminHsPointOfSaleProduct']['tab_class']);
                }
                break;
                
            case '2.3.16':
                $success[] = $this->installer->cleanUpFiles2316();
                $success[] = $this->installer->updateTable2316();
                $success[] = $this->unregisterHook('actionCartSave');
                break;
            
            case '2.4.0':
                $success[] = $this->installer->installTab($this->pos_tabs['AdminHsPointOfSaleSearchCron']);
                $success[] = $this->installer->updateTable240();
                $success[] = $this->registerHook('actionProductSave');
                $success[] = $this->registerHook('actionProductDelete');
                $success[] = $this->installer->cleanUpFiles240();
                $success[] = PosConfiguration::updateValue('POS_REBUILD_SEARCH_INDEX', 1);
                $cart_rule = new CartRule(PosConfiguration::get('POS_ID_CART_RULE'));
                if (Validate::isLoadedObject($cart_rule)) {
                    $cart_rule->id_customer = 0;
                    $cart_rule->code = Tools::passwdGen();
                    $success[] = $cart_rule->save();
                }
                $success[] = $this->installer->installConfigs240();
                $id_completed_order_tab = (int) Tab::getIdFromClassName('AdminHsPointOfSaleCompletedOrdersPro');
                $completed_order_tab = new PosTab($id_completed_order_tab);
                foreach ($completed_order_tab->name as $key => $tab_nane) {
                    $completed_order_tab->name[$key] = $this->i18n['completed_orders'];
                }
                $success[] = $completed_order_tab->save();
                break;
                
            default:
                $upgrader_class = 'PosUpgrader' . str_replace('.', '', $version);
                if (class_exists($upgrader_class)) {
                    $upgrader = new $upgrader_class($this, $version);
                    $success[] = $upgrader->run();
                }
                break;
        }
        return array_sum($success) >= count($success);
    }

    /**
     * Check prestashop current version is 1.6.
     *
     * @return boolean
     */
    public function isPrestashop16()
    {
        return version_compare(_PS_VERSION_, '1.6') === 1;
    }
    
    /**
     * Check gues check out is enable or not.
     *
     * @return boolean
     */
    public function isEnableGuestCheckout()
    {
        return (bool) Configuration::get('POS_GUEST_CHECKOUT');
    }

    /**
     * Get Default order state.
     *
     * @return int
     */
    public function getDefaultOrderState()
    {
        $amountDue = $this->context->cart->getAmountDue($this->context->currency->decimals * _PS_PRICE_DISPLAY_PRECISION_);

        return $amountDue > 0 ? (int) Configuration::get('POS_RECEIPT_DEFAULT_ORDER_STATE') : (int) Configuration::get('POS_DEFAULT_ORDER_STATE');
    }

    /**
     * Get dummy customer.
     *
     * @return int
     */
    public function getDefaultCustomerId()
    {
        return (int) PosCustomer::getDefaultCustomer()->id;
    }

    /**
     * Get key go to welcome page.
     *
     * @return string
     */
    public function getKeyWelcomePage()
    {
        return Tools::strtoupper(md5($this->name.$this->version));
    }

    /**
     * Init a new session based on a cart ID.
     *
     * @param int $id_cart
     *
     * @return boolean
     */
    public function initSession($id_cart)
    {
        $this->clearSession();
        $cart = new PosCart((int) $id_cart);
        if (!Validate::isLoadedObject($cart)) {
            return false;
        }
        $this->context->cookie->id_cart = $cart->id;

        return true;
    }

    public function clearSession()
    {
        unset($this->context->cookie->id_cart);
        unset($this->context->cookie->id_currency);
        unset($this->context->cookie->note);
        unset($this->context->cookie->show_note_on_invoice);
    }

    /**
     * Filter products by categories.
     *
     * @param array $params
     *                      array( <pre>
     *                      [id_categories] => array(),
     *                      [limit] => int
     *                      )</pre>
     *
     * @return array
     *               array(<pre>
     *               [0] => Array
     *               (
     *               [id_product] => int
     *               [reference] => string
     *               [id_shop] => int
     *               [pname] => string
     *               [id_product_attribute] => int
     *               [position] => int
     *               [quantity] => int
     *               [combination] => string
     *               [stock] => int/string
     *               [item] => string (items / item)
     *               )
     *               [1] =>Array()
     *               ...
     *               )</pre>
     */
    public function hookActionSearchProductsByCategories(array $params)
    {
        $id_categories = $params['id_categories'];
        $limit = $params['limit'];
        $products = array();
        if ($id_categories) {
            $products = PosSearchAction::searchProductsByCategories($id_categories, $limit, $this->context);
        }

        return $products;
    }

    /**
     * Get id products from current cart.
     *
     * @return array
     *               array(<pre>
     *               0 => int, // id_product
     *               1 => int,
     *               ...
     *               )</pre>
     */
    protected function getIdProductsFromCurrentCart()
    {
        $id_products = array();
        if (!empty($this->context->cookie->id_cart)) {
            $cart = new Cart((int) $this->context->cookie->id_cart);
            if (Validate::isLoadedObject($cart)) {
                $products = $cart->getProducts();
                if (!empty($products)) {
                    foreach ($products as $product) {
                        $id_products[] = $product['id_product'];
                    }
                }
            }
        }

        return $id_products;
    }

    /**
     * @return boolean
     */
    protected function removeTemplateFilesOfReferencesPage()
    {
        $our_module_dir = _PS_MODULE_DIR_.$this->name.'/';
        $view_path = 'views/templates/admin/';
        $template_path = $our_module_dir.$view_path.'hs_point_of_sale_preferences_pro/';
        $template_path_abstract = $our_module_dir.'abstract/'.$view_path.'hs_point_of_sale_preferences_abstract/';
        $template_files = array(
            $template_path.'content.tpl',
            $template_path_abstract.'content_1.6.tpl',
            $template_path_abstract.'content_1.5.tpl',
        );
        $flag = true;
        foreach ($template_files as $file) {
            if (file_exists($file)) {
                $flag = $flag && unlink($file);
            }
        }

        return $flag;
    }

    /**
     * @return boolean
     */
    protected function removeTemplatesFilterByCatogry()
    {
        $our_module_dir = _PS_MODULE_DIR_.$this->name.'/';
        $view_path = 'views/templates/admin/helpers/';
        $path_tree = 'tree/';
        $template_path = $our_module_dir.$view_path;
        $template_path_abstract = $our_module_dir.'abstract/'.$view_path;
        $template_dirs = array(
            $template_path.$path_tree,
            $template_path_abstract.$path_tree,
            $template_path,
            $template_path_abstract,
        );
        $flag = true;
        foreach ($template_dirs as $dir) {
            if (file_exists($dir)) {
                $flag = $this->deleteFolderTree($dir);
            }
        }

        return $flag;
    }

    /**
     * Delete file & folder of tree.
     *
     * @param string $dir
     *
     * @return boolean
     */
    protected function deleteFolderTree($dir)
    {
        $flag = true;
        $files = glob($dir.'*', GLOB_MARK);
        foreach ($files as $file) {
            if (file_exists($file)) {
                if (Tools::substr($file, -1) == '/') {
                    $flag = $flag && $this->deleteFolderTree($file);
                } else {
                    $flag = $flag && unlink($file);
                }
            }
        }

        return $flag && rmdir($dir);
    }

    /**
     * @param Currency $currency
     *
     * @return int
     */
    public function getDecimal($currency)
    {
        return (int) $currency->decimals * _PS_PRICE_DISPLAY_PRECISION_;
    }

    /**
     * Insert default selected order states when upgrade module version 2.3.2 or install module.
     *
     * @return boolean
     */
    protected function insertSelectedOrderStates()
    {
        $order_states = OrderState::getOrderStates((int) $this->context->language->id);
        $id_order_states = array();
        foreach ($order_states as $order_state) {
            $id_order_states[] = $order_state['id_order_state'];
        }

        return Configuration::updateValue('POS_SELECTED_ORDER_STATES', implode(',', $id_order_states));
    }
    
    /**
     * 
     * @return string
     */
    public function getParentAdminTabClass()
    {
        return HsPointOfSaleInstaller::CLASS_PARENT_TAB;
    }
    
    /**
     * @return array
     * <pre>
     * array(
     *  array(
     *      'value' => string, //amount, percentage, etc...
     *      'name' => string
     *  )
     * )
     */
    public function getProductDiscountTypes()
    {
        return array(
            array(
                'value' => PosConstants::DISCOUNT_TYPE_PERCENTAGE,
                'name' => '%',
            ),
            array(
                'value' => PosConstants::DISCOUNT_TYPE_AMOUNT,
                'name' => $this->i18n['amount'],
            ),
        );
    }

    /**
     * 
     * @return array
     * <pre>
     * array(
     *  array(
     *      'value' => string, //amount, percentage, etc...
     *      'name' => string
     *  )
     * )
     */
    public function getOrderDiscountTypes()
    {
        return array(
            array(
                'value' => PosConstants::DISCOUNT_TYPE_PERCENTAGE,
                'name' => '%',
            ),
            array(
                'value' => PosConstants::DISCOUNT_TYPE_AMOUNT,
                'name' => $this->i18n['amount'],
            ),
            array(
                'value' => PosConstants::DISCOUNT_TYPE_VOUCHER,
                'name' => $this->i18n['voucher'],
            ),
        );
    }
    
    /**
     * @param array $params
     * array(<pre>
     *  'id_product' => int, 
     *  'product' => Product
     * )</pre>
     */
    public function hookActionProductSave(array $params)
    {
        if (PosConfiguration::get('POS_AUTO_INDEXING')) {
            if (Validate::isLoadedObject($params['product'])) {
                $pos_search_index = new PosSearchIndex(false, false, (int) $params['product']->id);
                $pos_search_index->run();
            }
        }
    }
    
    /**
     * 
     * @param array $params
     * <pre>
     * array(
     * 'select' => string,// optional, passed by reference
     * 'join' => string,// optional, passed by reference
     * 'where' => string,// optional, passed by reference
     * 'group_by' => string,// optional, passed by reference
     * 'order_by' => string,// optional, passed by reference
     * 'order_way' => string,// optional, passed by reference
     * 'fields' => array // @see AdminController::fields_list, passed by reference
     * 'cookie' => Cookie,
     * 'cart' => Cart// optional
     * )
     */
    public function hookActionAdminOrdersListingFieldsModifier(array $params)
    {
        if (!PosConfiguration::get('POS_SHOW_ORDERS_UNDER_PS_ORDERS')) {
            if (in_array('where', array_keys($params))) {
                $params['where'] .= " AND a.`module` <> '$this->name'";
            }
        }
    }

    /**
     * 
     * @param array $params
     * array(<pre>
     *  'id_product' => int, 
     *  'product' => Product
     * )</pre>
     */
    public function hookActionProductDelete(array $params)
    {
        if (PosConfiguration::get('POS_AUTO_INDEXING')) {
            if (Validate::isLoadedObject($params['product'])) {
                $pos_search_index = new PosSearchIndex(false, true, (int) $params['product']->id);
                $pos_search_index->run();
            }
        }
    }

    /**
     * @param array $params
     * array(
     * 	    'id_carrier' => int // old carrier id
     * 	    'carrier' => Carrier // new carrier
     * )
     * @return boolean
     */
    public function hookActionCarrierUpdate($params)
    {
        if ((int) PosConfiguration::get('POS_DEFAULT_CARRIER') == $params['id_carrier']) {
            PosConfiguration::updateValue('POS_DEFAULT_CARRIER', $params['carrier']->id);
        }
    }
    
    /**
     * @return string
     */
    public function getInstalledVersion()
    {
        $query = new DbQuery();
        $query->select('`version`');
        $query->from('module');
        $query->where('`id_module` = ' . (int) $this->id);
        return Db::getInstance()->getValue($query);
    }
    
    /**
     * Retro-compatible with PrestaShop 1.5.3.1 and older where Context->link is not intialized ahead of Dispatcher (in config.inc.php)
     */
    protected function loadLink()
    {
        if (empty($this->context->link)) {
            $protocol_link = (Tools::usingSecureMode() && Configuration::get('PS_SSL_ENABLED')) ? 'https://' : 'http://';
            $protocol_content = (Tools::usingSecureMode() && Configuration::get('PS_SSL_ENABLED')) ? 'https://' : 'http://';
            $this->context->link = new Link($protocol_link, $protocol_content);
        }
    }
}
