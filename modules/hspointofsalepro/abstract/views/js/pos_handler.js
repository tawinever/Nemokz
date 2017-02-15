/**
 * RockPOS - Point of Sale for PrestaShop
 *
 * @author    Hamsa Technologies
 * @copyright Hamsa Technologies
 
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */
PosHandler = {
    /**
     * an instance of PosCart
     * @type {PosCart}
     */
    posCart: null,
    /**
     * Ajax request
     */
    _jqXHR: null,
    /**
     * Store value configurations decide what to show in autocomplete product search
     * @type json
     */
    outputProductSearchConfigs: null,
    /**
     * Declare all values
     */
    selectors: {
        productSearch: 'form.product_search input[name="keyword"]', // input apply auto complete product search
        customerSearch: 'form.customer_search input[name="keyword"]', // input apply auto complete customer search
        fancyBox: '.pos_container .fancybox', // class name use fancybox
        printBill: '.print-bill', // class name use fancybox
        clasFocusing: '.pos_container input[type="text"]', // class name will be selected when custom focusing
        addNoteButton: '.add_note_button',
        noteContent: '.note_content',
        blockAddNote: '.block_add_note',
        showNoteOnInvoice: '.show_note_on_invoice',
        messageError: '.product_search .message_error',
        blockResultSearch: '.ui-autocomplete',
        barcode: '#barcode' // define id input search product
    },
    /**
     * Process auto complete product search
     * @param {string} targetUrl target URL of ajax action
     */
    autoCompleteProductSearch: function (targetUrl)
    {
        if (typeof targetUrl === 'undefined')
        {
            return false;
        }
        $(PosHandler.selectors.productSearch).keypress(function (e) {
            $(PosHandler.selectors.messageError).html('');
            $(PosHandler.selectors.blockResultSearch).css('display', 'none');
            if (e.which === 13) {
                return false;// always return false in order to stop the event, otherwise, it submits the form and reloads the page
            }

        });
        $(PosHandler.selectors.customerSearch).keypress(function (e) {
            if (e.which === 13)
                return false;
        });
    },
    /**
     * Get output product search labels based on configuration
     * @param {json} item
     * @returns {Array|itemLabels}
     * <pre>["5", "demo_5", "(286 items)", "Printed Summer Dress", "Color : Yellow, Size : S"] // ["Id", "Reference", "Stock", "Product name", "Combination"]</pre>
     */
    _getProductSearchLabels: function (item)
    {
        itemLabels = [];

        if (typeof PosHandler.outputProductSearchConfigs.POS_SHOW_ID !== 'undefined' && PosHandler.outputProductSearchConfigs.POS_SHOW_ID)
            itemLabels.push(item.id_product);

        if (typeof item.reference !== 'undefined' &&
                item.reference &&
                typeof PosHandler.outputProductSearchConfigs.POS_SHOW_REFERENCE !== 'undefined' &&
                PosHandler.outputProductSearchConfigs.POS_SHOW_REFERENCE)
            itemLabels.push(item.reference);

        if (typeof PosHandler.outputProductSearchConfigs.POS_SHOW_STOCK !== 'undefined' && PosHandler.outputProductSearchConfigs.POS_SHOW_STOCK)
        {
            stockLabel = item.stock + (item.item ? (' ' + item.item) : '');
            itemLabels.push('(' + stockLabel + ')');
        }
        itemLabels.push(item.pname);
        return itemLabels;
    },
    setOutputProductSearchConfigs: function (outputProductSearchConfigs)
    {
        this.outputProductSearchConfigs = outputProductSearchConfigs;
    },
    
    /**
     * request search product by barcode
     * @param {string} targetUrl
     * @param {number} barcode
     */
    searchBarcodeProduct: function (targetUrl, barcode)
    {
        if (typeof targetUrl === 'undefined' || typeof barcode === 'undefined')
            return;
        $(PosHandler.selectors.messageError).html('');
        $(PosHandler.selectors.blockResultSearch).css('display', 'none');
        PosHandler._jqXHR = $.ajax({
            url: targetUrl,
            data: {barcode: barcode},
            dataType: "json",
            success: function (jsonData)
            {
                if (jsonData.success)
                {
                    // in case multiple ajax call at the same time => we need to remove the error of the previous called
                    $(PosHandler.selectors.messageError).html(''); 
                    PosHandler.posCart._updateBlocks(jsonData.data);
                }
                else {
                    $(PosHandler.selectors.messageError).html(jsonData.message);
                }
                $(PosHandler.selectors.barcode).val('');
            },
            error: function (jqXHR, exception)
            {
                PosHandler.posCart._showErrorException(jqXHR, exception);
            }

        });
    },
    /**
     * Process auto complete customer search
     * @param {string} targetUrl target URL of ajax action
     */
    autoCompleteCustomerSearch: function (targetUrl)
    {
        if (typeof targetUrl === 'undefined')
        {
            return false;
        }
        $(PosHandler.selectors.customerSearch).autocomplete({
            minLength: 1,
            source: function (request, response) {
                $.ajax({
                    url: targetUrl,
                    data: {keyword: request.term},
                    dataType: "json",
                    success: function (jsonData)
                    {
                        if (jsonData.success)
                        {
                            response($.map(jsonData.data, function (item) {
                                item.fullname = item.firstname + " " + item.lastname;
                                return item;
                            }));
                        } else {
                            alert(jsonData.message);
                        }
                        
                    },
                    error: function (jqXHR, exception)
                    {
                        PosHandler.posCart._showErrorException(jqXHR, exception);
                    }

                });
            },
            select: function (event, ui)
            {
                if (typeof (ui) !== undefined)
                {
                    $(PosHandler.selectors.customerSearch).val(ui.item.fullname);
                    if (parseInt(ui.item.id_customer) > 0)
                    {
                        PosHandler.posCart.assignCustomer(parseInt(ui.item.id_customer));// add customer to cart
                    }
                }
                return false;
            }
        }).data("ui-autocomplete")._renderItem = function(ul, item) {
            var liTag = $("<li></li>");
            var labels = new Array();
            labels.push(item.fullname);
            if (item.company !== null && item.company.trim() !== '')
            {
                labels.push(item.company);
            }
            if (item.phone !== null && item.phone.trim() !== '')
            {
                labels.push(item.phone);
            }
            if (item.phone_mobile !== null && item.phone_mobile.trim() !== '')
            {
                labels.push(item.phone_mobile);
            }
            return $(liTag).data("item.autocomplete", item)
                    .append("<a>" + labels.join('<br/>') + "</a>")
                    .appendTo(ul);
        };        
    },
    /**
     * defined class use method fancybox
     *
     */
    fancyBox: function ()
    {
        $(PosHandler.selectors.blockAddNote).fancybox({
            maxWidth	: 600,
            maxHeight	: 400,
            width : '70%',
            height: '70%',
            autoSize	: false
        });
        $(PosHandler.selectors.fancyBox).fancybox({
            type: 'iframe'
        });
    },
    /**
     * Add attribute selected to current input when this input is focusing.
     * @param {string} input
     */
    selectedElemnt: function (input)
    {
        $(input).select();
    },
    
    addNote: function (ajaxUrlAddNote)
    {
        var textNote = $(PosHandler.selectors.noteContent).val();
        var showNoteOnInvoice = ($(PosHandler.selectors.showNoteOnInvoice).is(':checked')) ? 1 : 0;
        $.ajax({
            url: ajaxUrlAddNote,
            data: "text_note=" + textNote + "&show_note_on_invoice=" + showNoteOnInvoice,
            dataType: "json",
            success: function (jsonData)
            {
                if (jsonData.success) {
                    $.fancybox.close();
                }
            },
            error: function (jqXHR, exception)
            {
                PosHandler.posCart._showErrorException(jqXHR, exception);
            }
        });
    }
};
$(document).ready(function ()
{
    if (
            typeof stPos !== 'undefined' &&
            typeof stPos.url !== 'undefined'
            )
    {
        // assign PosCart to PosHandler
        if (typeof stPos.url.ajaxUrl !== 'undefined') {
            PosHandler.posCart = new PosCart({ajaxUrl: stPos.url.ajaxUrl, lang: stPos.lang, ajaxUrls:stPos.url});
            try
            {
                PosHandler.posCart.setIdCustomer(idCustomer);
                PosHandler.posCart.setNbProducts(nbProducts);
                PosHandler.posCart.setAmountDue(amountDue);
                PosHandler.posCart.setPriceDisplayPrecision(priceDisplayPrecision);
                PosHandler.posCart.setFormatCurrency(currencyFormat);
                PosHandler.posCart.setCollectingPayment(collectingPayment);
                PosHandler.posCart.setDecimals(decimals);
                PosHandler.posCart.setDummyCustomer(dummyCustomer);
            }
            catch (e)
            {
                // Keep these for early error detection.
                console.log('An exception found in pos_handler.js');
                console.log(e);
            }
            PosHandler.posCart.init();
        }
        // Product search
        if (typeof stPos.url.productSearch !== 'undefined') {
            PosHandler.autoCompleteProductSearch(stPos.url.productSearch);
        }
        // customer search
        if (typeof stPos.url.customerSearch !== 'undefined') {
            PosHandler.autoCompleteCustomerSearch(stPos.url.customerSearch);
        }

        // selected input
        $(document).on('click', PosHandler.selectors.clasFocusing, function ()
        {
            PosHandler.selectedElemnt(this);
        });
        $(document).on('click', PosHandler.selectors.addNoteButton, function ()
        {
            if (typeof stPos.url.addNote !== 'undefined') {
                PosHandler.addNote(stPos.url.addNote);
            }
        });
    }
    PosHandler.setOutputProductSearchConfigs(outputProductSearchConfigs);
    // create popup form add new customer
    PosHandler.fancyBox();
    // search for barcode scanner
    $(document).anysearch({
        liveField: {selector: PosHandler.selectors.barcode, value: true},
        searchFunc: function (barcode) {
            PosHandler.searchBarcodeProduct(stPos.url.addProductFromBarcode, barcode);
        },
        searchSlider: false,
        excludeFocus:'input[type=text],textarea,select'
    });

});

// callback when created a customer successfully
function setupCustomer(idCustomer)
{
    if (typeof idCustomer !== 'undefined' && typeof PosHandler.posCart === 'object')
    {
        PosHandler.posCart.assignCustomer(idCustomer);
    }

}