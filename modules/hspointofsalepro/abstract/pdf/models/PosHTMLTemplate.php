<?php
/**
 * RockPOS - Point of Sale for PrestaShop
 * 
 * @author    Hamsa Technologies
 * @copyright Hamsa Technologies
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

/**
 * Generate ticket template, mostly for receipts and invoices
 */
abstract class PosHTMLTemplate extends HTMLTemplate
{
    /**
     * @var PosOrder
     */
    public $order;

    /**
     *
     * @var Context
     */
    protected $context;

    /**
     *
     * @var Customer
     */
    protected $customer;

    /**
     *
     * @var boolean
     */
    protected $include_taxes;

    /**
     * In points
     * @var float
     */
    protected $logo_height = 0;

    /**
     * @var array
     * @see Order::getProducts or OrderInvoice::getProducts()
     */
    protected $products = array();

    /**
     * @param ObjectModel $object The main object of the current template
     * @param Smarty $smarty
     * @param boolean $bulk_mode
     */
    public function __construct(ObjectModel $object, Smarty $smarty, $bulk_mode = false)
    {
        $this->smarty = $smarty;
        $this->init();
        $this->setProducts();
    }

    /**
     * 
     * @param string $name
     * @return mixed
     */
    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
    }

    /**
     * 
     * @param string $name
     * @param mixed $value
     */
    public function __set($name, $value)
    {
        if (property_exists($this, $name)) {
            $this->$name = $value;
        }
    }

    /**
     * 
     * @return array
     * @see Order::getProducts or OrderInvoice::getProducts() for output
     */
    public function getProducts()
    {
        return $this->products;
    }

    abstract protected function setProducts();

    abstract protected function getTaxTabContent();

    abstract protected function getCashierInfo();

    /**
     * Returns main ticket template associated to the country iso_code.
     *
     * @param string $iso_country
     *
     * @return string
     */
    protected function getTemplateByCountry($iso_country)
    {
        $file = 'content';
        $template = $this->getTemplate($file . '-' . $iso_country);
        if (!$template) {
            $template = $this->getTemplate($file);
        }
        return $template;
    }

    public function init()
    {
        $this->context = Context::getContext();
        $this->customer = new PosCustomer((int) $this->order->id_customer);
        $this->include_taxes = Configuration::get('PS_TAX') && !Product::getTaxCalculationMethod($this->order->id_customer);

        $delivery_address = $invoice_address = new Address((int) $this->order->id_address_invoice);
        $formatted_delivery_address = $formatted_invoice_address = PosAddressFormat::generateAddress($invoice_address, array(), '<br />', ' ');
        if ($this->order->id_address_delivery != (int) $this->order->id_address_invoice) {
            $delivery_address = new Address((int) $this->order->id_address_delivery);
            $formatted_delivery_address = PosAddressFormat::generateAddress($delivery_address, array(), '<br />', ' ');
        }
        $this->smarty->assign(array(
            'order' => $this->order,
            'customer' => $this->customer,
            'include_taxes' => $this->include_taxes,
            'invoice_address' => $formatted_invoice_address,
            'delivery_address' => $formatted_delivery_address,
            'addresses' => array('invoice' => $invoice_address, 'delivery' => $delivery_address),
            'cashier_info' => $this->getCashierInfo(),
            'shop_url' => PosReceipt::getShopUrl($this->order->id_shop),
            'tax_excluded_display' => Group::getPriceDisplayMethod((int) $this->customer->id_default_group),
            'tax_tab' => $this->getTaxTabContent(),
            'group_price_display_method' => Configuration::get('PS_TAX') && PosGroup::getPosPriceDisplayMethod()
        ));
        $this->shop = new Shop((int) $this->order->id_shop);
    }

    /**
     * Logo height in pixels
     * @return float
     */
    public function getLogoHeight()
    {
        // Return "0" if logo is not enabled
        return $this->logo_height * (int) PosConfiguration::get('POS_RECEIPT_SHOW_LOGO');
    }

    /**
     * Returns the template's HTML content.
     *
     * @return string HTML content
     */
    public function getContent()
    {
        $invoice_address = new Address((int) $this->order->id_address_invoice);
        $country = new Country((int) $invoice_address->id_country);
        $this->smarty->assign(array(
            'order_details' => $this->order->formatProducts($this->products),
            'message_on_receipt' => PosReceipt::getMessageOnReceipt(),
            'cart_rules' => $this->order->getCartRules()
        ));

        return $this->smarty->fetch($this->getTemplateByCountry($country->iso_code));
    }

    /**
     * @see parent::getTemplate()
     * Overrides:<br/>
     * - Allow to override PDF templates at fron office
     * - Allow to override PDF templates at back office
     */
    protected function getTemplate($template_name)
    {
        $template = false;

        $overridden_templates = array();
        if (isset($this->context->controller->module)) {
            $module_name = Context::getContext()->controller->module->name;
            $overridden_templates[] = _PS_THEME_DIR_ . "pdf/$module_name/" . $template_name . '.tpl'; // At front-end's theme
            $overridden_templates[] = _PS_BO_ALL_THEMES_DIR_ . $this->context->employee->bo_theme . "/pdf/$module_name/" . $template_name . '.tpl'; // At back-end's theme
        }
        $overridden_templates[] = _ROCKPOS_PDF_DIR_ . '/' . $template_name . '.tpl'; // In RockPOS itself
        foreach ($overridden_templates as $overridden_template) {
            if (file_exists($overridden_template)) {
                $template = $overridden_template;
                break;
            }
        }
        return $template;
    }

    /**
     * Any COMMON data for PDF headers should go here.<br/>
     * This is only for "common" things while generating PDF, so child classes are not allowed to override this.<br/>
     * For template specific data, assign them in getHeader() of each template.
     */
    final public function assignCommonHeaderData()
    {
        if (is_callable('parent::assignCommonHeaderData')) {
            // Compatible with PS 1.6.0.14
            parent::assignCommonHeaderData();
        }
        $this->assignLogoData();
    }

    protected function assignLogoData()
    {
        $path_logo = $this->getLogo();
        $max_height = $this->getLogoHeight();
        $width = 0;
        $height = 0;
        if (!empty($path_logo)) {
            list($width, $height) = getimagesize($path_logo);
        }
        if ($height > $max_height) {
            $ratio = $max_height / $height;
            $height *= $ratio;
            $width *= $ratio;
        }
        $this->smarty->assign(array(
            'logo_path' => $path_logo,
            'height_logo' => $height
        ));
    }
}
