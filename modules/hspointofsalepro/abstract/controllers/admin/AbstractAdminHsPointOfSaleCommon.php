<?php
/**
 * RockPOS - Point of Sale for PrestaShop
 *
 * @author    Hamsa Technologies
 * @copyright Hamsa Technologies
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

/**
 * Controller of admin page - Point Of Sale (Abstract)
 */
class AbstractAdminHsPointOfSaleCommon extends ModuleAdminController
{
    /**
     * Show result to view.
     *
     * @var type json
     */
    protected $ajax_json = array(
        'success' => false,
        'message' => null,
        'data' => array(),
    );

    /**
     * @var array
     * <pre>
     * array(
     *  string => string,// uri => media_type. Fx: 'path/to/css/file' => 'all'
     *  string => string,
     *  ...
     * )
     */
    protected $module_media_css = array(
        'pos_override.css' => 'all'
    );
    
    /**
     * @var array
     * <pre>
     * array(
     *  string,// path/to/js/file
     *  string
     *  ...
     * )
     */
    protected $module_media_js = array(
        'pos_override.js',
        'rockpos.js'
    );
    
    /**
     * @var array
     * <pre>
     * array(
     *  string,// jQuery plugin name
     *  string,
     *  ...
     * )
     */
    protected $jquery_plugins = array();
    
    /**
     * @var array
     * <pre>
     * array(
     *  string,// Name of jQuery component
     *  string,
     *  ...
     * )
     */
    protected $jquery_ui_components = array();

    public function init()
    {
        if (!Context::getContext()->cookie->id_employee) {
            if ((int) Tools::getValue('ajax') === 1) {
                die(Tools::jsonEncode(array('success' => false, 'message' => Tools::displayError($this->module->i18n['oops_your_session_just_expired']))));
            }
        }
        parent::init();
        $admin_hs_point_of_sale_wecome_page = $this->module->pos_tabs['AdminHsPointOfSaleWelcomePage']['tab_class'].'Controller';
        // check status visit welcome page, if != 1 go to welcome page
        if ((int) Configuration::get($this->module->getKeyWelcomePage()) !== 1) {
            if (!($this->ajax) && !$this->context->controller instanceof $admin_hs_point_of_sale_wecome_page) {
                Tools::redirectAdmin($this->context->link->getAdminLink($this->module->pos_tabs['AdminHsPointOfSaleWelcomePage']['tab_class']));
            }
        }
        // Conflict with module "watermark". Refer to Link::getImageLink()
        Configuration::set('WATERMARK_LOGGED', 0);
    }

    /**
     * @see AdminControllerCore::initContent()
     */
    public function initContent()
    {
        parent::initContent();
        $this->context->smarty->assign(array(
            'rockpos_version' => $this->module->version
        ));
    }

    /**
     * Overriding translating function, so that we point directly to getModuleTranslation().
     *
     * @see parent::l()
     */
    protected function l($string, $class = null, $addslashes = false, $htmlentities = true)
    {
        return Translate::getModuleTranslation($this->module, $string, $class);
    }

    /**
     * Show content to view.
     */
    public function displayAjax()
    {
        $this->context->cookie->write();// in PrestaShop, it's done in displayAjax() -> display() ->smartyOutputcontent()
        if ($this->ajax_json) {
            echo Tools::jsonEncode($this->ajax_json);
        } elseif ($this->ajax_html) {
            echo $this->ajax_html;
        } elseif ($this->ajax_pdf) {
            $this->ajax_pdf->Output();
        } else {
            echo Tools::jsonEncode(array());
        }
    }
    
    /**
     * @see parent::addCSS()
     * Overrides:<br/>
     * - Allow to override js file under BO theme
     */
    public function addCSS($css_uri, $css_media_type = 'all', $offset = null, $check_path = true)
    {
        $media_type = $css_media_type ? $css_media_type : 'all';// Compatible with PS1.6.0.11, refer to Controller::addJqueryUI(), line 392
        return $this->addMedia($css_uri, $media_type, $offset, false, $check_path);
    }
    
    /**
     * @see parent::addJS()
     * Overrides:<br/>
     * - Allow to override js file under BO theme
     */
    public function addJS($js_uri, $check_path = true)
    {
        $js_files = is_array($js_uri) ? $js_uri : array($js_uri);
        return $this->addMedia($js_files, null, null, false, $check_path);
    }

    /**
     * It helps to flush cache at browsers
     * @param array $uris
     * <pre>
     * array(
     *  string,
     *  string
     *  ...
     * )
     * 
     * @return array
     * <pre>
     * array(
     *  string,
     *  string
     *  ...
     * )
     */
    protected function addVersionToStaticFiles(array $uris)
    {
        foreach ($uris as $index => $uri) {
            if (strpos($uri, $this->module->name) === false) {
                // Don't touch to js files which are out side of this module
                continue;
            }
            // Add version as prefix to make sure js files are flushed at browser when upgrading to a newer version
            // Copy from Controller::addJS()
            $file_elements = explode('?', $uri);
            if (!isset($file_elements[1]) || empty($file_elements[1])) {
                $uris[$index] = $file_elements[0] . '?' . $this->module->version;
            }
        }
        return $uris;
    }

    /**
     * @see FrontController::addMedia(): Replace with front theme with BO theme
     */
    public function addMedia($media_uri, $css_media_type = null, $offset = null, $remove = false, $check_path = true)
    {
        if (!is_array($media_uri)) {
            $media_uri = $css_media_type ? array($media_uri => $css_media_type) : array($media_uri);
        }

        $list_uri = array();
        foreach ($media_uri as $file => $media) {
            $index = $file;//if js, $file actually is index
            $type = $css_media_type ? 'css' : 'js';
            $file = $css_media_type ? $file : $media;
            if (!Validate::isAbsoluteUrl($file)) {
                $different = $different_css = 0;
                if (strpos($file, __PS_BASE_URI__ . 'modules/') === 0) {
                    $override_path = str_replace(__PS_BASE_URI__ . 'modules/', _PS_BO_ALL_THEMES_DIR_ . $this->bo_theme . '/' . $type . '/modules/', $file, $different);
                    if (strrpos($override_path, $type . '/' . basename($file)) !== false) {
                        $override_path_css = str_replace($type . '/' . basename($file), basename($file), $override_path, $different_css);
                    }
                    if ($different && @filemtime($override_path)) {
                        $file = str_replace(__PS_BASE_URI__ . 'modules/', __PS_BASE_URI__ . $this->admin_webpath . '/themes/' . $this->bo_theme . '/' . $type . '/modules/', $file, $different);
                    } elseif ($different_css && @filemtime($override_path_css)) {
                        $file = $override_path_css;
                    }
                    $list_uri[$css_media_type ? $file : $index] = ($css_media_type ? $media : $file);
                    continue;
                }
            }
            $list_uri[$file] = $media;// if it's not a module file, just simply copy the input and pass to parent's methods
        }
        // Versioning in JS files is not available in 1.6.1.1 or older
        if (!$css_media_type) {
            if (version_compare(_PS_VERSION_, '1.6.1.2', '>=')) {
                $list_uri = $this->addVersionToStaticFiles($list_uri);
            }
        }
        if ($remove) {
            return $css_media_type ? parent::removeCSS($list_uri, $css_media_type) : parent::removeJS($list_uri);
        }
        return $css_media_type ? parent::addCSS($list_uri, $css_media_type, $offset, $check_path) : parent::addJS($list_uri, $check_path);
    }

    /**
     * @see FrontController::isTokenValid()
     * To be used with hook "actionCartSave". Don't remove it.
     */
    public function isTokenValid()
    {
        if (!Configuration::get('PS_TOKEN_ENABLE')) {
            return true;
        }

        return (strcasecmp(Tools::getToken(false), Tools::getValue('token')) == 0);
    }

    public function setMedia()
    {
        parent::setMedia();
        if (!empty($this->jquery_plugins)) {
            $this->addJqueryPlugin($this->jquery_plugins);
        }
        if (!empty($this->jquery_ui_components)) {
            $this->addJqueryUI($this->jquery_ui_components);
        }
        
        $js_files = $css_files = array();
        // Js files
        if (!empty($this->module_media_js) && is_array($this->module_media_js)) {
            foreach ($this->module_media_js as $js_file) {
                $js_files[] = (Validate::isAbsoluteUrl($js_file) ? '' : $this->module->getJsPath()) . $js_file;
            }
            $this->addJS($js_files);
        }
        // Css files
        if (!empty($this->module_media_css) && is_array($this->module_media_css)) {
            foreach ($this->module_media_css as $css_file => $media_type) {
                $css_files[(Validate::isAbsoluteUrl($css_file) ? '' : $this->module->getCssPath()) . $css_file] = $media_type;
            }
            $this->addCSS($css_files);
        }
    }
     
    /**
     * @param int    $id_order
     * @todo let move it to helper if possible
     * @return html
     */
    protected function renderOrderSummary($id_order = null)
    {
        $id_order = $id_order ? $id_order : $this->module->currentOrder;
        $pos_order = new PosOrder((int) $id_order, null, true);
        $pos_customer = new PosCustomer((int) $pos_order->id_customer);
        if (!Validate::isLoadedObject($pos_order) || !Validate::isLoadedObject($pos_customer)) {
            return;
        }
        $cart = new PosCart((int) $pos_order->id_cart);
        if (!Validate::isLoadedObject($cart)) {
            return;
        }
        $pos_shop = new PosShop((int) $pos_order->id_shop);
        if (!Validate::isLoadedObject($pos_shop)) {
            return;
        }
        $tax_excluded_display = Group::getPriceDisplayMethod((int) $pos_customer->id_default_group);
        $invoice_address = new Address((int) $pos_order->id_address_invoice);
        $formatted_invoice_address = PosAddressFormat::generateAddress($invoice_address, array(), '<br />', ' ');
        $products = PosOrder::getProductsByReference($pos_order->reference);
        $specific_price_output = null;
        $use_tax = !Product::getTaxCalculationMethod((int) $cart->id_customer);
        foreach ($products as &$product) {
            $product['price_without_specific_price'] = PosProduct::getPriceStatic((int) $product['product_id'], $use_tax, (int) $product['product_attribute_id'], 2, null, false, false, 1, false, null, $cart->id, null, $specific_price_output);
        }
        $cart_rules = $pos_order->getCartRules();
        $is_free_shipping = $pos_order->isFreeShipping();
        if (!empty($cart_rules)) {
            foreach ($cart_rules as $key => &$cart_rule) {
                $cart_rule['pos_value'] = $tax_excluded_display ? $cart_rule['value_tax_excl'] : $cart_rule['value'];
                // unset array contain free shipping cost
                if ($cart_rule['free_shipping'] == 1 && $is_free_shipping) {
                    unset($cart_rules[$key]);
                }
                // unset gift product
                if ($cart_rule['gift_product'] != 0) {
                    unset($cart_rules[$key]);
                }
            }
        }
        
        $shop_address = $pos_shop->getAddress();
        $this->context->smarty->assign(array(
            'order' => $pos_order,
            'group_price_display_method' => Configuration::get('PS_TAX') && PosGroup::getPosPriceDisplayMethod(),
            'order_summary' => $this->context->cart->getSummaryDetails(),
            'order_details' => $pos_order->formatProducts($products),
            'show_note_on_invoice' => $pos_order->pos_show_note,
            'formatted_invoice_address' => $formatted_invoice_address,
            'display_employee_name' => (int) Configuration::get('PS_POS_DISPLAY_EMPLOYEE_NAME'),
            'shop_info' => $pos_order->id_shop,
            'message_on_receipt' => PosReceipt::getMessageOnReceipt(),
            'shop_url' => PosReceipt::getShopUrl($pos_order->id_shop),
            'is_free_shipping' => $is_free_shipping,
            'cart_rules' => $cart_rules,
            'use_tax' => Configuration::get('PS_TAX') && !Product::getTaxCalculationMethod((int) $this->context->cart->id_customer),
            'display_employee_name' => (int) Configuration::get('PS_POS_DISPLAY_EMPLOYEE_NAME'),
            'controler_module' => $this->module->pos_tabs['AdminHsPointOfSaleNewSale']['tab_class'],
            'is_guest_checkout' => $pos_customer->isDefaultCustomer(),
            'shop_address' => $shop_address,
            'shop_fax' => Configuration::get('PS_SHOP_FAX', null, null, (int) $this->context->cart->id_shop),
            'shop_phone' => Configuration::get('PS_SHOP_PHONE', null, null, (int) $this->context->cart->id_shop),
            'shop_details' => Configuration::get('PS_SHOP_DETAILS', null, null, (int) $this->context->cart->id_shop),
        ));

        return $this->context->smarty->fetch($this->getOrderSummaryTemplate());
    }
    
    /**
     * @todo let move it to helper if possible
     * @return string
     */
    protected function getOrderSummaryTemplate()
    {
        $template_override = _PS_THEME_DIR_ . 'modules/' . $this->module->name . '/summary.tpl';
        if (file_exists($template_override)) {
            $template = $template_override;
        } else {
            $template = _PS_MODULE_DIR_ . $this->module->name . '/abstract/views/templates/admin/hs_point_of_sale_new_sale_abstract/summary.tpl';
        }

        return $template;
    }
}
