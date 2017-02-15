<?php
/**
 * RockPOS - Point of Sale for PrestaShop
 *
 * @author    Hamsa Technologies
 * @copyright Hamsa Technologies
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

/**
 * Rendering invoices in PDF
 */
class PosPDFGeneratorInvoice extends PosPDFGenerator
{
    protected function setPdfMargins()
    {
        switch ($this->page_size) {
            case PosConstants::PAGE_SIZE_LETTER:
                $this->SetHeaderMargin(10);
                $this->SetFooterMargin(15);
                $this->setMargins(10, 45, 10);
                break;

            case PosConstants::PAGE_SIZE_A4:
                $this->SetHeaderMargin(10);
                $this->SetFooterMargin(15);
                $this->setMargins(10, 45, 10);
                break;

            case PosConstants::PAGE_SIZE_A5:
            default:
                $this->SetHeaderMargin(5);
                $this->SetFooterMargin(12);
                $this->setMargins(5, 42, 5);
                break;
        }
    }
}
