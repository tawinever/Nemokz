<?php
/**
 * RockPOS - Point of Sale for PrestaShop
 *
 * @author    Hamsa Technologies
 * @copyright Hamsa Technologies
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

/**
 * Printing invoices
 */
class PosPDFInvoice extends PosPDF
{
    /**
     * @see parent::__construct()
     */
    public function __construct($objects, $template, Smarty $smarty, $page_size)
    {
        parent::__construct($objects, $template, $smarty);
        $this->pdf_renderer = new PosPDFGeneratorInvoice($page_size, (bool) Configuration::get('PS_PDF_USE_CACHE'), PosConfiguration::get('POS_INVOICE_ORIENTATION'));
        $this->pdf_renderer->IncludeJS('print();');
    }
}
