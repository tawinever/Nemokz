/**
 * RockPOS - Point of Sale for PrestaShop
 *
 * @author    Hamsa Technologies
 * @copyright Hamsa Technologies
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

/**
 * Pos Print
 * @param {json} selectors
 * @returns {PosPrint}
 */
var PosPrint = function (selectors)
{
    /**
     * Define all selectors default
     */
    this._selectors = {
        printInvoiceAuto: ' #conf_id_POS_INVOICE_AUTO_PRINT', // define block print invoice auto
        pageSizeFormat: '#conf_id_POS_INVOICE_PAGE_SIZE' // define class block div page size format
    };

    $.extend(this._selectors, selectors);

    PosPrint.instance = this;

    /**
     * Define all events
     */
    this.handleEvent = function ()
    {
        // event click button generate invoice
        PosPrint.instance._displayPrintInvocieAuto();
        PosPrint.instance._displayPageSizeFormat();

        this._displayPrintInvocieAuto();
        this._displayPageSizeFormat();
    };

    /**
     * Display or hiden block print invoice auto
     */
    this._displayPrintInvocieAuto = function ()
    {
        var blockPrintInvoiceAuto = $(this._selectors.printInvoiceAuto);
        if (blockPrintInvoiceAuto.parent().hasClass('form-group'))
            blockPrintInvoiceAuto = blockPrintInvoiceAuto.parent();
        blockPrintInvoiceAuto.show();
    };
    /**
     * Display or hiden block page size format
     */
    this._displayPageSizeFormat = function ()
    {
        var blockPageSizeFormat = $(this._selectors.pageSizeFormat);
        if (blockPageSizeFormat.parent().hasClass('form-group'))
            blockPageSizeFormat = blockPageSizeFormat.parent();
        blockPageSizeFormat.show();
    };
};