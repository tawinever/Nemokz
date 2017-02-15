<?php
/**
 * RockPOS - Point of Sale for PrestaShop
 *
 * @author    Hamsa Technologies
 * @copyright Hamsa Technologies
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

/**
 * Printing receipts
 */
class PosPDFReceipt extends PosPDF
{
    /**
     *
     * @var string
     */
    protected $page_size;

    /**
     * @see parent::__construct()
     */
    public function __construct($objects, $template, Smarty $smarty, $page_size)
    {
        parent::__construct($objects, $template, $smarty);
        $this->template = $template . Tools::ucfirst($page_size);
        $this->page_size = $page_size;
        $this->pdf_renderer = new PosPDFGeneratorReceipt($page_size, (bool) Configuration::get('PS_PDF_USE_CACHE'));
        $this->pdf_renderer->IncludeJS('print();');
    }

    /**
     * @see parent::getTemplateObject
     */
    public function getTemplateObject($object)
    {
        $template_object = parent::getTemplateObject($object);
        $template_object->margin = (float) PosConfiguration::get('POS_RECEIPT_MARGIN');
        return $template_object;
    }

    /**
     * 
     * @param PosHTMLTemplate $template
     */
    protected function assignHtml(PosHTMLTemplate $template)
    {
        $this->pdf_renderer->createContent($template->getHeader().$template->getContent());
        $this->pdf_renderer->createProductTab($template->getProductTab());
    }
}
