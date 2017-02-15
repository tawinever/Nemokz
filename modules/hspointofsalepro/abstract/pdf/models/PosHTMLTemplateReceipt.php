<?php
/**
 * RockPOS - Point of Sale for PrestaShop
 * 
 * @author    Hamsa Technologies
 * @copyright Hamsa Technologies
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

/**
 * Generate sales receipts based on ticket template
 */
abstract class PosHTMLTemplateReceipt extends PosHTMLTemplate
{
    /**
     *
     * @var float
     */
    protected $margin;

    /**
     * @param PosOrder $order
     * @param Smarty $smarty
     *
     * @throws PrestaShopException
     */
    public function __construct(PosOrder $order, Smarty $smarty)
    {
        $this->order = $order;
        $this->date = Tools::displayDate($order->date_add);
        $this->title = $order->reference;
        parent::__construct($order, $smarty);
    }

    public function init()
    {
        parent::init();
        $this->logo_height = PosConstants::RECEIPT_LOGO_MAX_HEIGHT;
        $this->smarty->assign(array(
            'cart' => new PosCart($this->order->id_cart)// @todo: Receipt is for Order. It's better to work with Order than Cart.
        ));
    }

    abstract public function getWidth();

    abstract public function getFontSize();

    abstract public function getLetterHeight();

    abstract public function getProductPaddingRate();

    protected function setProducts()
    {
        $products = PosOrder::getProductsByReference($this->order->reference);
        foreach ($products as &$product) {
            $product['meta_data'] = $this->getProductMetaData($product);
            $product['prices_to_show'] = $this->getProductPricesToShow($product);
        }
        $this->products = $products;
    }

    /**
     * 
     * @return string
     */
    protected function getCashierInfo()
    {
        $cashier_info = array();
        try {
            $configuration = array_filter(PosConfiguration::getMultiple(array(
                        'POS_RECEIPT_SHOW_EMPLOYEE_ID',
                        'POS_RECEIPT_SHOW_EMPLOYEE_NAME'
            )));
            if (empty($configuration)) {
                throw new Exception();
            }
            $employee = new Employee($this->order->pos_id_employee);
            if (!Validate::isLoadedObject($employee)) {
                throw new Exception();
            }
            if (isset($configuration['POS_RECEIPT_SHOW_EMPLOYEE_ID'])) {
                $cashier_info[] = $employee->id;
            }
            if (isset($configuration['POS_RECEIPT_SHOW_EMPLOYEE_NAME'])) {
                $cashier_info[] = implode(' ', array_filter(array($employee->firstname, $employee->lastname)));
            }
        } catch (Exception $exception) {
            // do nothing!
        }
        return implode('/', $cashier_info);
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
        $meta_data[] = $product['name'];
        if (PosConfiguration::get('POS_RECEIPT_SHOW_COMBINATION') && !empty($product['combination'])) {
            $meta_data[] = $product['combination'];
        }
        if ((int) PosConfiguration::get('POS_RECEIPT_SHOW_PRODUCT_REF') && !empty($product['product_reference'])) {
            $meta_data[] = $product['product_reference'];
        }
        if ((int) PosConfiguration::get('POS_RECEIPT_SHOW_EAN_JAN') && !empty($product['product_ean13'])) {
            $meta_data[] = $product['product_ean13']; // product_ean13 => combination's, ean13 => product's
        }
        if ((int) PosConfiguration::get('POS_RECEIPT_SHOW_UPC') && !empty($product['product_upc'])) {
            $meta_data[] = $product['product_upc'];
        }
        return $meta_data;
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
    protected function getProductPricesToShow(array $product)
    {
        $prices = array();
        if (Configuration::get('POS_RECEIPT_SHOW_UNIT_PRICE')) {
            if ($this->include_taxes) {
                $prices[] = Tools::displayPrice($product['product_price_tax_incl'], (int) $this->order->id_currency);
            } else {
                $prices[] = Tools::displayPrice($product['product_price_tax_excl'], (int) $this->order->id_currency);
            }
        }
        if ($this->order->isDiscount() && Configuration::get('POS_RECEIPT_SHOW_PROD_DISCOUNT')) {
            if (!empty($product['reduction_amount']) && $product['reduction_amount'] > 0) {
                $prices[] = Tools::displayPrice((float) $product['reduction_amount'], (int) $this->order->id_currency);
            } elseif (!empty($product['reduction_percent']) && $product['reduction_percent'] > 0) {
                $prices[] = (float) $product['reduction_percent'] . '%';
            }
        }
        return $prices;
    }

    /**
     * Returns the template filename when using bulk rendering.
     *
     * @return string filename
     */
    public function getBulkFilename()
    {
        return 'receipts.pdf';
    }

    /**
     * Returns the template filename.
     *
     * @return string filename
     */
    public function getFilename()
    {
        return PosConstants::RECEIPT_PREFIX . $this->order->reference . '.pdf';
    }

    public function getHeader()
    {
        $this->assignCommonHeaderData();
        $id_shop = (int) $this->order->id_shop;
        $this->smarty->assign(array(
            'address' => PosReceipt::getAddress($id_shop),
            'tel' => PosReceipt::getPhoneNumber($id_shop),
            'fax' => PosReceipt::getFaxNumber($id_shop),
            'tax_code' => PosReceipt::getTaxCodeNumber($id_shop),
            'show_logo' => PosReceipt::showLogo(),
            'show_shop_name' => (bool) PosConfiguration::get('POS_RECEIPT_SHOW_SHOP_NAME'),
            'font_size' => $this->getFontSize()
        ));

        return $this->smarty->fetch($this->getTemplate('header'));
    }

    /**
     * 
     * @see parent::getTaxTabContent()
     */
    public function getTaxTabContent()
    {
        return '';
    }

    /**
     * @see parent::getTemplate()
     * Overrides:<br/>
     * - Use specific folder for receipt
     */
    protected function getTemplate($template_name)
    {
        $template_name = 'receipt/' . $template_name;
        return parent::getTemplate($template_name);
    }

    /**
     * 
     * @param string $iso_country
     * @return string
     */
    public function getProductTemplateByCountry($iso_country)
    {
        $file = 'tab_product';
        $template = $this->getTemplate($file . '-' . $iso_country);
        if (!$template) {
            $template = $this->getTemplate($file);
        }
        return $template;
    }

    /**
     * 
     * @see parent::getContent()
     */
    public function getContent()
    {
        $this->smarty->assign(array(
            'shop_info' => $this->order->id_shop,
            'shop_url' => PosReceipt::getShopUrl($this->order->id_shop),
        ));

        return parent::getContent();
    }

    /**
     * 
     * @return string
     */
    public function getProductTab()
    {
        $invoice_address = new Address((int) $this->order->id_address_invoice);
        $country = new Country((int) $invoice_address->id_country);
        return $this->smarty->fetch($this->getProductTemplateByCountry($country->iso_code));
    }

    /**
     * @return string
     */
    protected function getLogo()
    {
        $logo_file_name = PosReceipt::getLogoFileName();
        $logo_path = '';
        if (!empty($logo_file_name)) {
            $logo_path = _PS_IMG_DIR_ . PosReceipt::getLogoFileName();
        }
        return $logo_path;
    }
}
