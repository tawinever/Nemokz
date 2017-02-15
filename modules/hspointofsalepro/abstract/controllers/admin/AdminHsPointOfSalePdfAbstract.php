<?php
/**
 * RockPOS - Point of Sale for PrestaShop
 *
 * @author    Hamsa Technologies
 * @copyright Hamsa Technologies
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

require_once dirname(__FILE__) . '/AbstractAdminHsPointOfSaleCommon.php';

/**
 * Handle PDF related requests
 */
class AdminHsPointOfSalePdfAbstract extends AbstractAdminHsPointOfSaleCommon
{
    public function ajaxProcessPrintInvoice()
    {
        $pos_order = new PosOrder((int) Tools::getValue('id_order', 0));
        if (!Validate::isLoadedObject($pos_order)) {
            die(Tools::displayError('The order cannot be found within your database.'));
        }
        $page_size = PosConfiguration::get('POS_INVOICE_PAGE_SIZE', null, (int) $this->context->shop->id_shop_group, (int) $this->context->shop->id);
        $invoices_collection = PosOrder::getInvoicesCollectionByReference($pos_order->reference);
        if (empty($invoices_collection)) {
            die(sprintf($this->module->i18n['oops_no_invoice_associated_with_order'], $pos_order->reference));
        }
        $pdf = new PosPDFInvoice($invoices_collection, PosPDF::TEMPLATE_INVOICE, $this->context->smarty, $page_size);
        $pdf->render('I');
    }

    public function ajaxProcessPrintReceipt()
    {
        $this->printReceipt(Tools::getValue('id_order', 0));
    }

    public function ajaxProcessPreviewReceipt()
    {
        $this->printReceipt(PosOrder::getFirstOrderId());
    }

    /**
     * @param int $id_order
     */
    protected function printReceipt($id_order)
    {
        $order = new PosOrder((int) $id_order, null, true);
        if (!Validate::isLoadedObject($order)) {
            die(Tools::displayError('The order cannot be found within your database.'));
        }
        $page_size = Configuration::get('POS_RECEIPT_PAGE_SIZE', null, (int) $this->context->shop->id_shop_group, (int) $this->context->shop->id);
        $pdf = new PosPDFReceipt($order, PosPDF::TEMPLATE_RECEIPT, $this->context->smarty, $page_size);
        $pdf->render('I');
    }
}
