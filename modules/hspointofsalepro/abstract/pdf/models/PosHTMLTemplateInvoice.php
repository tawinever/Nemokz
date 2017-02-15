<?php
/**
 * RockPOS - Point of Sale for PrestaShop
 * 
 * @author    Hamsa Technologies
 * @copyright Hamsa Technologies
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

/**
 * Generate receipts (or invoice in PrestaShop) based on ticket template
 */
class PosHTMLTemplateInvoice extends PosHTMLTemplate
{
    /**
     * @var OrderInvoice
     */
    public $order_invoice;

    /**
     * @param OrderInvoice $order_invoice
     * @param Smarty $smarty
     *
     * @throws PrestaShopException
     */
    public function __construct(OrderInvoice $order_invoice, Smarty $smarty, $bulk_mode = false)
    {
        $this->order_invoice = $order_invoice;
        $this->order = new PosOrder((int) $this->order_invoice->id_order);
        $this->date = Tools::displayDate($order_invoice->date_add);
        parent::__construct($order_invoice, $smarty, $bulk_mode);
    }

    public function init()
    {
        parent::init();
        $this->logo_height = PosConstants::INVOICE_LOGO_MAX_HEIGHT;
        $this->smarty->assign(array(
            'invoice_number' => $this->order_invoice->getInvoiceNumberFormatted($this->context->language->id, $this->order->id_shop),
            'order_invoice' => $this->order_invoice
        ));
    }

    protected function setProducts()
    {
        $products = $this->order_invoice->getProducts();
        foreach ($products as &$product) {
            $product['meta_data'] = $this->getProductMetaData($product);
            if (Configuration::get('PS_PDF_IMG_INVOICE')) {
                $product['image_tag'] = $this->getProductImageTag($product);
            }
        }
        $this->products = $products;
    }

    /**
     * 
     * @return string
     */
    protected function getCashierInfo()
    {
        $cashier_info = '';
        if (PosConfiguration::get('POS_INVOICE_SHOW_EMPLOYEE_NAME')) {
            $employee = new Employee((int) $this->order->pos_id_employee);
            if (Validate::isLoadedObject($employee)) {
                $cashier_info = $employee->firstname . ' ' . $employee->lastname;
            }
        }
        return $cashier_info;
    }

    /**
     * 
     * @param array $product An element of PosOrder::getProducts()
     * @return array
     * <pre>
     * array(
     *  string,
     *  string,
     *  ...
     * )
     */
    protected function getProductMetaData(array $product)
    {
        $meta_data = array();
        $meta_data[] = $product['product_name'];
        if ((int) PosConfiguration::get('POS_INVOICE_SHOW_EAN_JAN') && !empty($product['product_ean13'])) {
            $meta_data[] = $product['product_ean13']; // product_ean13 => combination's, ean13 => product's
        }
        return $meta_data;
    }

    /**
     * Get <img> tag of a product
     * @param array $product An element of PosOrder::getProducts()
     * @return string
     */
    protected function getProductImageTag(array $product)
    {
        $image_tag = '';
        // Copied from HTMLTemplateInvoice with slight change
        if ($product['image'] != null) {
            $name = 'product_mini_' . (int) $product['product_id'] . (isset($product['product_attribute_id']) ? '_' . (int) $product['product_attribute_id'] : '') . '.jpg';
            $path = _PS_PROD_IMG_DIR_ . $product['image']->getExistingImgPath() . '.jpg';
            $image_tag = preg_replace('/\.*' . preg_quote(__PS_BASE_URI__, '/') . '/', _PS_ROOT_DIR_ . DIRECTORY_SEPARATOR, ImageManager::thumbnail($path, $name, 45, 'jpg', false), 1);
            if (!file_exists(_PS_TMP_IMG_DIR_ . $name)) {
                $image_tag = '';
            }
        }
        return $image_tag;
    }

    /**
     * Returns the template filename when using bulk rendering.
     *
     * @return string filename
     */
    public function getBulkFilename()
    {
        return 'invoices.pdf';
    }

    /**
     * Returns the template filename.
     *
     * @return string
     */
    public function getFilename()
    {
        return Configuration::get('PS_INVOICE_PREFIX', $this->context->language->id, null, $this->order->id_shop) . sprintf('%06d', $this->order_invoice->number) . '.pdf';
    }

    /**
     * Returns the tax tab content in html
     * @return string
     */
    public function getTaxTabContent()
    {
        $address = new Address((int) $this->order->{Configuration::get('PS_TAX_ADDRESS_TYPE')});
        $tax_exempt = Configuration::get('VATNUMBER_MANAGEMENT') && !empty($address->vat_number) && $address->id_country != Configuration::get('VATNUMBER_COUNTRY');
        $this->smarty->assign(array(
            'order' => $this->order,
            'tax_exempt' => $tax_exempt,
            'use_one_after_another_method' => $this->order_invoice->useOneAfterAnotherTaxComputationMethod(),
            'display_tax_bases_in_breakdowns' => (method_exists($this->order_invoice, 'displayTaxBasesInProductTaxesBreakdown')) ? $this->order_invoice->displayTaxBasesInProductTaxesBreakdown() : false,
            'tax_breakdowns' => $this->getTaxBreakdown()
        ));
        return $this->smarty->fetch($this->getTemplate('tab_tax'));
    }

    /**
     * Returns different tax breakdown elements.
     *
     * @return Array Different tax breakdown elements
     */
    protected function getTaxBreakdown()
    {
        $tax_breakdowns = array(
            'product_tax_breakdown' => $this->order_invoice->getProductTaxesBreakdown($this->order),
            'shipping_tax_breakdown' => $this->order_invoice->getShippingTaxesBreakdown($this->order),
            'ecotax_tax_breakdown' => $this->order_invoice->getEcoTaxTaxesBreakdown(),
            'wrapping_tax_breakdown' => $this->order_invoice->getWrappingTaxesBreakdown(),
        );

        foreach ($tax_breakdowns as $type => $bd) {
            if (empty($bd)) {
                unset($tax_breakdowns[$type]);
            }
        }

        if (empty($tax_breakdowns)) {
            $tax_breakdowns = array();
        }

        if (isset($tax_breakdowns['product_tax_breakdown'])) {
            foreach ($tax_breakdowns['product_tax_breakdown'] as &$bd) {
                $bd['total_tax_excl'] = $bd['total_price_tax_excl'];
            }
        }

        if (isset($tax_breakdowns['ecotax_tax_breakdown'])) {
            foreach ($tax_breakdowns['ecotax_tax_breakdown'] as &$bd) {
                $bd['total_tax_excl'] = $bd['ecotax_tax_excl'];
                $bd['total_amount'] = $bd['ecotax_tax_incl'] - $bd['ecotax_tax_excl'];
            }
        }

        return $tax_breakdowns;
    }

    /**
     * 
     * @see parent::getContent()
     */
    public function getContent()
    {
        // When working with OrdeInvoice, please use "total_discount_tax_incl" (without "s" after "discount")
        $this->smarty->assign(array(
            'amount_due' => PosOrder::getAmountDueByReference($this->order->reference),
            'custom_text' => Configuration::get('POS_INVOICE_FOOTER_TEXT', $this->context->language->id),
        ));

        return parent::getContent();
    }

    /**
     * @see parent::getTemplate()
     * Overrides:<br/>
     * - Use specific folder for invoice
     */
    protected function getTemplate($template_name)
    {
        $template_name = 'invoice/' . $template_name;
        return parent::getTemplate($template_name);
    }

    /**
     * 
     * @see parent::getHeader()
     */
    public function getHeader()
    {
        $this->assignCommonHeaderData();
        $this->smarty->assign(array(
            'display_shop_name' => (bool) PosConfiguration::get('POS_INVOICE_SHOW_SHOP_NAME'),
        ));
        return $this->smarty->fetch($this->getTemplate('header'));
    }

    /**
     * @return string
     */
    protected function getLogo()
    {
        $id_shop = (int) $this->shop->id;
        if (PosConfiguration::get('POS_INVOICE_LOGO', null, null, $id_shop) && file_exists(_PS_IMG_DIR_ . PosConfiguration::get('POS_INVOICE_LOGO', null, null, $id_shop))) {
            $logo = _PS_IMG_DIR_ . PosConfiguration::get('POS_INVOICE_LOGO', null, null, $id_shop);
        } else {
            $logo = parent::getLogo();
        }
        return $logo;
    }
}
