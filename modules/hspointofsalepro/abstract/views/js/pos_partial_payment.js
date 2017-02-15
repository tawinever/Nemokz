/**
 * RockPOS - Point of Sale for PrestaShop
 *
 * @author    Hamsa Technologies
 * @copyright Hamsa Technologies
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

/**
 * Pos PosPartialPayment
 * @param {json} selectors
 * @returns {PosPartialPayment}
 */
var PosPartialPayment = function (selectors)
{
    /**
     * Define all selectors default
     */
    this._selectors = {
        addAmountDue: '.add_amount_due',
        amountDue: '.amount_due',
        paymentMethod: '.payment_method',
        quickViewReceipt: '.quick_view_receipt',
        fancyboxInner: '.fancybox-inner',
        newOrder: '.new_order',
        unPaid: '.unpaid',
        paid: '.paid',
        badge: '.badge',
        actions: '.actions',
        printInvoice: '.print_invoice',
        printReceipt: '.print_receipt',
        viewSummary: '.view_summary'
        
    };

    $.extend(this._selectors, selectors);

    /**
     * Status of collecting payment
     */
    this._collectingPayment = 0;

    PosPartialPayment.instance = this;

    /**
     * Define all events
     */
    this.handleEvent = function ()
    {
        if ($('.table th').hasClass('actions'))
        {
            $('.actions').prev().remove();
            $('.table thead tr:first th:last').remove();
        }
        
        // event click button collecting payment
        $(document).on('click', PosPartialPayment.instance._selectors.addAmountDue, function () {
                PosPartialPayment.instance._confirm(this); 
            
        });
        
        // event click button view
        $(document).on('click', PosPartialPayment.instance._selectors.viewSummary, function () {
            PosPartialPayment.instance._viewSummary(this);

        });
        
        // event click button "Print" invoice
        $(document).on('click', this._selectors.printInvoice, function ()
        {
            (new PosOrder(parseInt($(this).attr('rel')))).printInvoice();
        });
        
        // event click button "Print" receipt
        $(document).on('click', this._selectors.printReceipt, function ()
        {
            (new PosOrder(parseInt($(this).attr('rel')))).printReceipt();
        });
        
        $(document).on('keyup', PosPartialPayment.instance._selectors.amountDue, function () {
            var parent = $(this).closest('tr');
            var newAmount = parent.find(PosPartialPayment.instance._selectors.amountDue).val();
            if (newAmount)
                PosPartialPayment.instance._validateAmount(parent);
        });
        $(PosPartialPayment.instance._selectors.amountDue).bind("keypress", function (e) {
            if (e.keyCode == 13) {
                e.preventDefault();
                PosPartialPayment.instance._confirm(this);
            }
        });
        PosPartialPayment.instance.fancyBox();
    };
    
    /**
     * Get status collecting payment
     * @returns {float}
     */
    this._confirm = function (element)
    {
        var parent = $(element).closest('tr');
        if (PosPartialPayment.instance._validateAmount(parent))
        {
            var amount = parent.find(PosPartialPayment.instance._selectors.amountDue).val();
            var idOrderAmount = parent.find(PosPartialPayment.instance._selectors.addAmountDue).data('id-order-amount').split('_');
            var orderReference = parent.find(PosPartialPayment.instance._selectors.addAmountDue).data('order-reference');
            var currencyFormat = parent.find(PosPartialPayment.instance._selectors.addAmountDue).data('currency-format');
            var currencySign = parent.find(PosPartialPayment.instance._selectors.addAmountDue).data('currency-sign');
            var idPaymentMethod = parent.find(PosPartialPayment.instance._selectors.paymentMethod).val();
            var paymentMethod = parent.find('option:selected').text();
            var idOrder = idOrderAmount[0];
            var cancel = stPos.lang.cancel;
            var iconfirm = stPos.lang.i_confirm;
            var message = stPos.lang.by_confirming_this_action_order_will_be_added_by.replace(/([.*+?^=!:${}()|\[\]\/\\])/g, '');
            var mapObject = {
                order_reference: orderReference,
                order_amount: formatCurrency(parseFloat(amount), parseInt(currencyFormat), currencySign),
                payment_method: paymentMethod,
             };
             message = message.replace(/order_reference|order_amount|payment_method/gi, function(key){
               return mapObject[key];
             });
             
            $.confirm({
                message: message,
                buttons: {
                    [cancel]: {
                        class: 'gray',
                        action: function ()
                        {
                           return;
                }
                    },
                    [iconfirm]: {
                        class: 'blue',
                        action: function ()
                        {
                            PosPartialPayment.instance._addAmountDue(parent, idOrder, amount, idPaymentMethod);
                        }
                    }
                }
            });    
                
        }
    };
    
    /**
     * 
     * @param {Object} element
     * @param {int} idOrder
     * @param {float} amount
     * @param {int} idPaymentMethod
     */
    this._addAmountDue = function(element, idOrder, amount, idPaymentMethod){
        
        $.ajax({
            url: stPos.url.addPartialPayment,
            data: {id_order: idOrder, amount:amount, id_payment_method: idPaymentMethod},
            dataType: "json",
            success: function (jsonData)
            {   
                PosPartialPayment.instance.appendBlockQuickView();
                if (jsonData.success) {
                    $(PosPartialPayment.instance._selectors.quickViewReceipt).html(jsonData.data.viewReceipt);
                    $(PosPartialPayment.instance._selectors.newOrder).hide();
                    if (jsonData.data.amountDue == 0)
                    {
                        element.find(PosPartialPayment.instance._selectors.badge).removeClass('badge-danger');
                        element.find(PosPartialPayment.instance._selectors.badge).addClass('badge-success');
                        element.find(PosPartialPayment.instance._selectors.amountDue).attr('disabled', 'disabled');
                        element.find(PosPartialPayment.instance._selectors.addAmountDue).attr('disabled', 'disabled');
                    }
                    element.find(PosPartialPayment.instance._selectors.amountDue).val(jsonData.data.amountDue);
                    element.find(PosPartialPayment.instance._selectors.paid).html(jsonData.data.paid);
                    element.find(PosPartialPayment.instance._selectors.unPaid).html(jsonData.data.amountDueWitdCurrency);
                } else {
                    alert(jsonData.message);
                }
            },
            error: function (jqXHR, exception)
            {
                PosPartialPayment.instance._showErrorException(jqXHR, exception);
            }
        }).done(function(){
            $(PosPartialPayment.instance._selectors.quickViewReceipt).trigger('click');
            $(PosPartialPayment.instance._selectors.fancyboxInner).find(PosPartialPayment.instance._selectors.quickViewReceipt).removeClass('quick_view_receipt');
            });
    };
    
    /**
     * Get status collecting payment
     * @returns {float}
     */
    this._viewSummary = function (element)
    {
        var parent = $(element).closest('tr');
        var idOrderAmount = parent.find(PosPartialPayment.instance._selectors.addAmountDue).data('id-order-amount').split('_');
        var idOrder = idOrderAmount[0];
        if (idOrder)
        {
            $.ajax({
                url: stPos.url.viewSummary,
                data: {id_order: idOrder},
                dataType: "json",
                success: function (jsonData)
                {
                    PosPartialPayment.instance.appendBlockQuickView();
                    if (jsonData.success) {
                        $(PosPartialPayment.instance._selectors.quickViewReceipt).html(jsonData.data.viewReceipt);
                        $(PosPartialPayment.instance._selectors.newOrder).hide();
                    } else {
                        alert(jsonData.message);
                    }
                },
                error: function (jqXHR, exception)
                {
                    PosPartialPayment.instance._showErrorException(jqXHR, exception);
                }
            }).done(function(){
                $(PosPartialPayment.instance._selectors.quickViewReceipt).trigger('click');
                $(PosPartialPayment.instance._selectors.fancyboxInner).find(PosPartialPayment.instance._selectors.quickViewReceipt).removeClass('quick_view_receipt');
            });
        }
        
    };
    
    this.fancyBox = function ()
    {
        $(PosPartialPayment.instance._selectors.quickViewReceipt).fancybox({
            maxWidth	: 800,
            maxHeight	: 600,
            width : '70%',
            height: '70%',
            autoSize	: false
        });
    },
            
    this.appendBlockQuickView = function()
    {
        $('table.order').parent().append( "<div class=quick_view_receipt></div>" );
    };
    
    /**
     * Validate amount
     * @param {jQuery} element
     * @returns {Boolean}
     */
    this._validateAmount = function(element)
    {
        var newAmount = element.find(PosPartialPayment.instance._selectors.amountDue).val();
        var idOrderAmount = element.find(PosPartialPayment.instance._selectors.addAmountDue).data('id-order-amount').split('_');
        var amountDue = parseFloat(idOrderAmount[1]);
        var flag = true;
        if (!newAmount)
        {
            alert(stPos.lang.oops_amount_is_empty);
            flag = false;
        } else if (isNaN(newAmount))
        {
            alert(stPos.lang.please_enter_a_number);
            flag = false;
        }else if (newAmount <= 0 || amountDue < newAmount)
        {
            alert(stPos.lang.payment_amount_should_be_greater_than_zero_and_less_than_or_equal_to_amount_due);
            flag = false;
        }
        if (!flag) {
            element.find(PosPartialPayment.instance._selectors.amountDue).addClass('error_payment');
        } else {
            element.find(PosPartialPayment.instance._selectors.amountDue).removeClass('error_payment');
        }
        return flag;
    };
    
    /**
     * @param {object} jqXHR
     * @param {string} exception
     */
    this._showErrorException = function (jqXHR, exception)
    {
        if (exception === 'abort') {
            return;
        }
        var message = '';
        if (jqXHR.status == 0 && jqXHR.statusText == 'error' ) {
            message = stPos.lang.there_was_a_connecting_problem;
        } else if (jqXHR.status == 404) {
            message = stPos.lang.requested_page_not_found;
        } else if (jqXHR.status == 500) {
            message = stPos.lang.internal_server_error;
        } else if (exception === 'timeout') {
            message = stPos.lang.request_time_out;
        } else {
            message = jqXHR.responseText;
        }
        alert(message);
    };
};
$(document).ready(function () {
    new PosPartialPayment().handleEvent();
});