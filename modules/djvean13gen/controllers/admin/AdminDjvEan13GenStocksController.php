<?php
/**
* 2014 Dejavu Arts S.L.
*
* NOTICE OF LICENSE
*
* This source file is subject to the copyright.
*
* DISCLAIMER
*
* Do not edit or add to this file.
*
* @author    Dejavu Arts S.L. <desarrollo@dejavu.es>
* @site www.dejavu.es
* @copyright Copyright (c) 2014 Dejavu Arts S.L.
*   @license   Copyright. All Rights Reserved
*/

class AdminDjvEan13GenStocksController extends ModuleAdminController
{
    public function __construct()
    {
        $this->context = Context::getContext();

        parent::__construct();
    }

    public function setMedia()
    {
        parent::setMedia();

        $js_path = __PS_BASE_URI__.'modules/'.$this->module->name.'/views/js/';
        $css_path = __PS_BASE_URI__.'modules/'.$this->module->name.'/views/css/';

        $this->addJqueryPlugin('cooki-plugin');

        $this->addJqueryUI(array(
            'ui.button',
            'ui.menu',
            'ui.tooltip',
            'ui.autocomplete'
        ));

        $this->addJS(array(
            $js_path.'fullscreen.js',
            $js_path.'common.js',
            $js_path.'stocks.js',
            $js_path.'jquery.easing.1.3.js',
            $js_path.'engage.itoggle.1.7.min.js',
            $js_path.'jquery.uniform.min.js'
        ));

        $this->addCSS(array(
            $css_path.'genean13.css',
            $css_path.'jquery.qtip.css',
            $css_path.'font-awesome.css',
            $css_path.'uniform.light.css',
            $css_path.'custom.css'
        ));
    }

    public function initContent()
    {
        parent::initContent();

        $task = Tools::getValue('task');

        switch ($task) {
            case 'genEan13':
                $this->setTemplate('genean13.tpl');
                break;

            default:
                $this->setTemplate('stocks.tpl');
        }
    }

    /**
    * Admin panel product search
    *
    * @param integer $id_lang Language id
    * @param string $query Search query
    * @return array Matching products
    */
    private static function searchByName($id_lang, $query, Context $context = null)
    {
        if (!$context) {
            // Best practice,  validator
            $context = Context::getContext();
        }

        $select_values = '
            min(`id_category`),
            p.`id_product`,
            pa.`id_product_attribute`,
            pl.`name`,
            p.`active`,
            p.`reference`,
            m.`name` AS manufacturer_name,
            stock.`quantity`,
            product_shop.`advanced_stock_management`,
            p.`customizable`
        ';

        $sql = new DbQuery();

        $sql->select($select_values);
        $sql->from('category_product', 'cp');
        $sql->leftJoin('product', 'p', 'p.`id_product` = cp.`id_product`');
        $sql->join(Shop::addSqlAssociation('product', 'p'));
        $sql->leftJoin(
            'product_lang',
            'pl',
            'p.`id_product` = pl.`id_product` AND pl.`id_lang` = '.(int)$id_lang.Shop::addSqlRestrictionOnLang('pl')
        );
        $sql->leftJoin('manufacturer', 'm', 'm.`id_manufacturer` = p.`id_manufacturer`');

        $where = 'pl.`name` LIKE \'%'.pSQL($query).'%\'
        OR p.`reference` LIKE \'%'.pSQL($query).'%\'
        OR p.`upc` = \'%'.pSQL($query).'%\'
        OR p.`ean13` LIKE \'%'.pSQL($query).'%\'
        OR p.`supplier_reference` LIKE \'%'.pSQL($query).'%\'
        OR  p.`id_product` IN (SELECT id_product FROM '.
        _DB_PREFIX_.'product_supplier sp
        WHERE `product_supplier_reference` LIKE \'%'.pSQL($query).'%\')';
        $sql->orderBy('pl.`name` ASC, pa.`id_product_attribute` ASC');

        if (Combination::isFeatureActive()) {
            $sql->leftJoin('product_attribute', 'pa', 'pa.`id_product` = p.`id_product`');
            $sql->join(Shop::addSqlAssociation('product_attribute', 'pa', false));
            $where .= ' OR pa.`reference` LIKE \'%'.pSQL($query).'%\'';
            $where .= ' OR pa.`ean13` LIKE \'%'.pSQL($query).'%\'';
        }

        $sql->where($where);
        $sql->join(Product::sqlStock('p', 'pa', false, $context->shop));

        $sql->groupBy('id_product, id_product_attribute');

        $result = Db::getInstance()->executeS($sql);

        if (!$result) {
            // Best practice,  validator
            return false;
        }

        $results_array = array();

        foreach ($result as &$row) {
            //$row['price_tax_incl'] = Product::getPriceStatic($row['id_product'], true, null, 2);
            //$row['price_tax_excl'] = Product::getPriceStatic($row['id_product'], false, null, 2);
            $product = new Product($row['id_product'], $row['id_product_attribute']);

            $attributes_resume = $product->getAttributesResume(1);

            foreach ($attributes_resume as $resume) {
                if ($resume['id_product_attribute'] == $row['id_product_attribute']) {
                    // Best practice, validator
                    $row['name'] .= ' - '.$resume['attribute_designation'];
                }
            }

            $results_array[] = $row;
        }

        return $results_array;
    }

    private function addProductEan13Label($pdf, $style, $p)
    {
        $resolution = array(40, 24);
        $pdf->AddPage('L', $resolution);
        $name = $p['name'];

        if (mb_strlen($name, 'utf-8') > 30) {

            $name1 = mb_substr($name, 0, 30);
            $name2 = str_pad(mb_substr($name, 30, 60), 30, ' ');
            $pdf->Cell(35, 0, $name1, 0, 1, 'L', 0, '', 1);
            $pdf->Cell(35, 0, $name2, 0, 1, 'L', 0, '', 1);
            $pdf->write1DBarcode($p['ean13'], 'EAN13', '', '', '', 9, 0.35, $style, 'N');

        } else {
            $pdf->Cell(35, 0, $name, 0, 1, 'C', 0, '', 1);
            $pdf->write1DBarcode($p['ean13'], 'EAN13', '', '', '', 12, 0.35, $style, 'N');
        }

        $pdf->Cell(
            35,
            0,
            ''.$p['reference'].'         Цена: '.number_format($p['price'], 2, ',', ' ').$this->context->currency->sign,
            0,
            1,
            'C',
            0,
            '',
            1
        );

        /*
        // Start Transformation
        $pdf->StartTransform();
        // Rotate 20 degrees counter-clockwise centered by (0,100) which is the lower left corner of the rectangle
        $pdf->Rotate(270, 15, 19);
        $pdf->Text(15, 19, 'LEOPARD');
        // Stop Transformation
        $pdf->StopTransform();
        */
    }

    private function getProductData($id_product, $id_product_attribute)
    {
        if (!$id_product_attribute) {
            $product = new Product($id_product);
            return $p = array(
                'ean13' => $product->ean13,
                'name' => $product->name[$this->context->language->id],
                'reference' => $product->reference,
                'special' => $product->getPrice(true),
                'price' => Product::getPriceStatic($id_product, true, null, 6, null, false, false)
            );
        } else {
            $product_attribute = new Combination($id_product_attribute);

            $product = new Product($product_attribute->id_product, $id_product_attribute);

            $p = array(
                'ean13' => $product_attribute->ean13,
                'name' => $product->name[$this->context->language->id],
                'reference' => $product_attribute->reference,
                'special' => Product::getPriceStatic($product_attribute->id_product, true, $id_product_attribute),
                'price' => Product::getPriceStatic(
                    $product_attribute->id_product,
                    true,
                    $id_product_attribute,
                    6,
                    null,
                    false,
                    false
                )
            );

            $attributes_resume = $product->getAttributesResume($this->context->language->id);

            foreach ($attributes_resume as $resume) {
                if ($resume['id_product_attribute'] == $id_product_attribute) {
                    $p['name'] .= ' - '.$resume['attribute_designation'];
                    break;
                }
            }

            return $p;
        }
    }

    private function genDeliverySlip($product_quantities)
    {
        require_once(_PS_TOOL_DIR_.'tcpdf/config/lang/eng.php');
        require_once(_PS_TOOL_DIR_.'tcpdf/tcpdf.php');
        // create new PDF document
        $pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        $pdf->SetHeaderMargin(0);
        $pdf->SetFooterMargin(0);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        $pdf->SetFontSize(12);
        $pdf->setMargins(12, 12, 12, 12);

        // set auto page breaks
        $pdf->SetAutoPageBreak(true, 0);
        $pdf->AddPage('L');

        foreach ($product_quantities as &$product_quantity) {
            // Best practice, validator
            $product_quantity['data'] = $this->getProductData(
                $product_quantity['id_product'],
                $product_quantity['id_product_attribute']
            );
        }

        $this->context->smarty->assign(array('product_quantities' => $product_quantities));
        $html = $this->context->smarty->fetch('label.tpl');

        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->Output('delivery_slip.pdf', 'I');
        die;
    }

    private function genEan13Pdf($product_quantities)
    {
        require_once(_PS_TOOL_DIR_.'tcpdf/config/lang/eng.php');
        require_once(_PS_TOOL_DIR_.'tcpdf/tcpdf.php');
        // create new PDF document
        $pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        $pdf->SetHeaderMargin(0);
        $pdf->SetFooterMargin(0);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        $pdf->SetFont('dejavusans', 'BI', 20, '', 'false');

        $pdf->SetFontSize(8);
        $pdf->setMargins(3, 2, 2);

        $style = array(
            'position' => 'C',
            'align' => 'C',
            'stretch' => true,
            'fitwidth' => true,
            'cellfitalign' => '',
            'border' => false, //true,
            'hpadding' => 0,//'auto',
            'vpadding' => 0,//'auto',
            'fgcolor' => array(0,0,0),
            'bgcolor' => false, //array(255,255,255),
            'text' => true,
            'font' => 'helvetica',
            'fontsize' => 7,
            'stretchtext' => 4
        );
        // set auto page breaks
        $pdf->SetAutoPageBreak(false, 0);

        foreach ($product_quantities as $product_quantity) {
            $p = $this->getProductData($product_quantity['id_product'], $product_quantity['id_product_attribute']);
            //print_r($p);

            for ($i = 0; $i < $product_quantity['quantity']; $i++) {
                // Best practice, validator
                $this->addProductEan13Label($pdf, $style, $p);
            }
        }

        $pdf->Output('labels.pdf', 'I');
        die;
    }

    /*
    * From wikipedia
    */
    private function ean13Checksum($message)
    {
        $checksum = 0;

        foreach (str_split(strrev($message)) as $pos => $val) {
            // Best practice, validator
            $checksum += $val * (3 - 2 * ($pos % 2));
        }

        return ((10 - ($checksum % 10)) % 10);
    }

    private function genEan13()
    {
        $sql = '
            SELECT
                MAX(SUBSTR(ean13, 1, 12)) + 1
            FROM
                `'._DB_PREFIX_.'product`
            WHERE
                ean13 LIKE \'24%\'
        ';

        $max_product_ean13 = Db::getInstance()->getValue($sql);

        $sql = '
            SELECT
                MAX(SUBSTR(ean13, 1, 12)) + 1
            FROM
                `'._DB_PREFIX_.'product_attribute`
            WHERE
                ean13 LIKE \'24%\'
        ';
        $max_product_attribute_ean13 = Db::getInstance()->getValue($sql);

        $ean13 = max($max_product_ean13, $max_product_attribute_ean13);

        if (!$ean13) {
            // Best practice, validator
            $ean13 = '240000000001';
        }

        $ean13 .= $this->ean13Checksum($ean13);

        return $ean13;
    }

    public function postProcess()
    {
        $task = Tools::getValue('task');

        if ($this->ajax) {
            $this->context = Context::getContext();

            switch ($task) {
                default:
                    $this->query = trim(Tools::getValue('search'));

                    $products = $this->searchByName($this->context->language->id, $this->query);

                    if (!$products) {
                        // Best practice, validator
                        $products = array();
                    }

                    $products = array_slice($products, 0, 12);

                    foreach ($products as &$product) {

                        if ($product['id_product_attribute']) {
                            $attributes = Product::getAttributesParams(
                                $product['id_product'],
                                $product['id_product_attribute']
                            );
                            $product['attributes'] = $attributes;
                        }
                    }

                    echo Tools::jsonEncode(array('products' => $products));
                    die;
            }
        } else {
            switch ($task) {
                case 'genEan13':
                    $this->context->smarty->assign(
                        array(
                        'ean13' => $this->genEan13(),
                        'automaticInsertion' => (int)Configuration::get('DJVGENEAN13_INSAUTO'),
                        )
                    );
                    break;
                    
                case 'populateEan13':
                    $sql = '
                        SELECT 
                            `id_product`
                        FROM 
                            `'._DB_PREFIX_.'product` p
                        WHERE 
                            `id_product` NOT IN 
                            (
                                SELECT 
                                    `id_product`
                                FROM 
                                `'._DB_PREFIX_.'product_attribute` pa
                            )
                                AND
                            (
                                `ean13` = \'\'
                                    OR
                                `ean13` = \'0\'
                            )
                    ';
                    
                    $rows = Db::getInstance()->executeS($sql);
                    
                    foreach ($rows as $row) {
                        $ean13 = $this->genEan13();
                        
                        $sql = '
                            UPDATE
                            `'._DB_PREFIX_.'product`
                            SET
                                `ean13` = \''.pSql($ean13).'\'
                            WHERE 
                                `id_product` = '.(int)$row['id_product'].'
                        ';
                        
                        
                        Db::getInstance()->execute($sql);
                        
                        echo 'Product #'.(int)$row['id_product'].': '.pSql($ean13)."<br>\n";
                    }
                    
                    $sql = '
                        SELECT 
                            `id_product_attribute`
                        FROM 
                            `'._DB_PREFIX_.'product_attribute` pa     
                        WHERE                            
                            (
                                `ean13` = \'\'
                                    OR
                                `ean13` = \'0\'
                            )
                    ';
                    
                    $rows = Db::getInstance()->executeS($sql);
                    
                    foreach ($rows as $row) {
                        $ean13 = $this->genEan13();
                        
                        $sql = '
                            UPDATE
                            `'._DB_PREFIX_.'product_attribute`
                            SET
                                `ean13` = \''.pSql($ean13).'\'
                            WHERE 
                                `id_product_attribute` = '.(int)$row['id_product_attribute'].'
                        ';
                        
                        Db::getInstance()->execute($sql);
                        
                        echo 'Product Attribute #'.(int)$row['id_product_attribute']
                        .': '.pSql($ean13)."<br>\n";
                    }
                    
                    echo "OK";
                    die;

                case 'print':
                    $product_stock_data = Tools::getValue('productStock');

                    $product_quantities = array();

                    foreach ($product_stock_data as $product_stock_line) {
                        $parts = explode('_', $product_stock_line);
                        $id_product = (int)$parts[0];
                        $id_product_attribute = (int)$parts[1];
                        $quantity = (int)$parts[2];

                        $product_quantities[] = array(
                            'id_product' => $id_product,
                            'id_product_attribute' => $id_product_attribute,
                            'quantity' => $quantity
                        );
                    }

                    $this->genEan13Pdf($product_quantities);
                    die;
            }
            $this->context->smarty->assign(array(
                'automaticInsertion' => (int)Configuration::get('DJVGENEAN13_INSAUTO'),
            ));
            return;
        }
    }
}
