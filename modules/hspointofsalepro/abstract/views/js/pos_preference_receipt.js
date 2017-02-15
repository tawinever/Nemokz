/**
 * RockPOS - Point of Sale for PrestaShop
 *
 * @author    Hamsa Technologies
 * @copyright Hamsa Technologies
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

/**
 * Pos Preferences Receipt
 * @param {json} selectors
 * @returns {PosPreferencesReceipt}
 */
var PosPreferencesReceipt = function (selectors)
{
    /**
     * Define all selectors default
     */
    this._selectors = {
        receiptMargin: 'input[name="POS_RECEIPT_MARGIN"]',
        receipSize: 'select[name="POS_RECEIPT_PAGE_SIZE"]',
        actualSize: '.custom_paper_width strong',
        printPreview: '.pos_print_preview'
    };
    
    /**
     * constants receipt page
     */
    this.constants = {
        pageSizeK80: 'K80',
        pageSizeK57: 'K57',
        withK80: 80,
        withK57: 57,
        pageHeight: '144 mm'
    };
    
    $.extend(this._selectors, selectors);

    PosPreferencesReceipt.instance = this;

    /**
     * Define all events
     */
    this.handleEvents = function ()
    {
        // event change paper margin
        $(document).on('keyup', PosPreferencesReceipt.instance._selectors.receiptMargin, function () {
            var pageMargin = $(this).val();
            if (!pageMargin) {
                pageMargin = 0;
            }
            if (!PosPreferencesReceipt.instance._validatePageMarginRange(pageMargin)) {
                alert(stPos.lang.oops_the_margin_is_too_big);
                return false;
            }
            if (PosPreferencesReceipt.instance._validatePageMargin(pageMargin, this)) {
                PosPreferencesReceipt.instance._displayActualSize(parseFloat(pageMargin));
            }
        });
        
        // event click button "Print" sales receipt
        $(document).on('click', PosPreferencesReceipt.instance._selectors.printPreview, function(event)
        {
            event.preventDefault();
            var url = $(this).attr('href');
            var paperMargin = parseFloat($(PosPreferencesReceipt.instance._selectors.receiptMargin).val());
            window.open(url + '&page_margin='+paperMargin, '_blank');
        });
        
        // display actual size when reload page.
        this._displayActualSize(parseFloat($(PosPreferencesReceipt.instance._selectors.receiptMargin).val()));
    };


    /**
     * 
     * @param {Float} pageMargin
     * @returns {Boolean}
     */
    this._validatePageMarginRange = function(pageMargin){
        var receiptSize = $(PosPreferencesReceipt.instance._selectors.receipSize).val();
        var actualSize = 0;
        var flag = true;
        switch (receiptSize)
        {
            case PosPreferencesReceipt.instance.constants.pageSizeK80:
                actualSize = parseFloat(PosPreferencesReceipt.instance.constants.withK80) - 2 * parseFloat(pageMargin);
                break;
            default:
                actualSize = parseFloat(PosPreferencesReceipt.instance.constants.withK57) - 2 * parseFloat(pageMargin);
                break;
        }
        if (actualSize < 0){
            flag = false;
        }
        return flag;
    };

    /**
     * 
     * @param {Float} pageMargin
     * @param {DomHTML} Element
     * @returns {Boolean}
     */
    this._validatePageMargin = function (pageMargin, element)
    {
        var flag = true;
        if (isNaN(pageMargin)) {
            $(element).val(pageMargin.replace(/[^\d\.]/g, ""));
            flag = false;
        }
        return flag;
    };

    /**
     * @param {Float} pageMargin
     */
    this._displayActualSize = function (pageMargin)
    {
        var receiptSize = $(PosPreferencesReceipt.instance._selectors.receipSize).val();
        var actualSize = 0;
        switch (receiptSize)
        {
            case PosPreferencesReceipt.instance.constants.pageSizeK80:
                actualSize = parseFloat(PosPreferencesReceipt.instance.constants.withK80) - 2 * parseFloat(pageMargin);
                break;
            default:
                actualSize = parseFloat(PosPreferencesReceipt.instance.constants.withK57) - 2 * parseFloat(pageMargin);
                break;
        }
        var stringActualSize = parseFloat(actualSize) + ' x ' + PosPreferencesReceipt.instance.constants.pageHeight;
        $(PosPreferencesReceipt.instance._selectors.actualSize).html(stringActualSize);
    };
};