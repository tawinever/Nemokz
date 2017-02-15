/**
 * RockPOS - Point of Sale for PrestaShop
 *
 * @author    Hamsa Technologies
 * @copyright Hamsa Technologies
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */


/**
 * poscart form controller
 * @param {data} options
 * @returns {PosCart}
 */
var PosCart = function(options)
{
    /**
     * Target AjaxUrl is all ajax url request
     * @deprecated
     */
    this.ajaxUrl = typeof options.ajaxUrl !== 'undefined' ? options.ajaxUrl : null;
    
    this.ajaxUrls = typeof options.ajaxUrls !== 'undefined' ? options.ajaxUrls : null;    

    /**
     * Contain text translation
     */
    this.lang = typeof options.lang !== 'undefined' ? options.lang : null;

    /**
     * Id customer
     */
    this._idCustomer = null;

    /**
     * id dummy customer
     */
    this._dummyCustomer = 0;

    /**
     * Number of products
     */
    this._nbProducts = null;

    /**
     * Amount due of payment
     */
    this._amountDue = null;

    /**
     * price display precision
     */
    this._priceDisplayPrecision = 0;

    /**
     * Display price with for mat decimal
     */
    this._decimals = 0;

    /**
     * Status of collecting payment
     */
    this._collectingPayment = null;

    /**
     * string format currency
     */
    this._firstFormatCurrency = ',';

    /**
     * string format decimal of currency
     */
    this._secondFormatCurrency = '.';

    /**
     * Current money given
     */
    this._currentMoneyGiven = 0;
    
    /**
     * constants discount type
     */
    this.constants = {
        VOUCHER: 'voucher',
        AMOUNT: 'amount',
        PERCENTAGE: 'percentage'
    };

    /**
     * Declare all actions
     */
    this.actions = {
        assignCustomer: 'assignCustomer', // add customer to cart
        changeCombination: 'changeCombination', // change combination
        removeCustomer: 'removeCustomer', // remove customer from cart
        addProduct: 'addProduct', // add product to cart
        removeProductFromCart: 'removeProductFromCart', // remove product from cart
        updateCartSummary: 'updateCartSummary', // auto update cart summary
        updateProductCart: 'updateProductCart', // auto update block product cart
        changeProductQuantity: 'changeProductQuantity', // change product quantity in cart
        cancelOrder: 'cancelOrder', // delete current order
        addNewOrder:'addNewOrder',
        addPayment: 'add', // add payment to cart payment
        removePayment: 'remove', // remove paymetn from cart payment
        completeSale: 'completeSale', // process complete sale
        updateBlocks: 'updateBlocks', // process reload page when admin add or remove customer
        changeProductPrice: 'changeProductPrice', // change discount product
        addOrderDiscount: 'addOrderDiscount', // process discount for order
        updateFreeShipping: 'updateFreeShipping', // process set free shipping
        updateExtraCarrier: 'updateExtraCarrier', // process update carrier
        updateAddresses: 'updateAddresses', // process update address
        deleteOrderDiscount: 'deleteOrderDiscount', // process delete order discount
        updateSummary: 'updateSummary' // process update summary
    };

    /**
     * Declare all values
     */
    this.selectors = {
        customerForm: '.customer_form', // form search customer
        dropdownCombination: '.combination .dropdownCombination', // define class of drop down combination
        customerInfo: '.info', // class name block customer info
        customerName: '.info .name', //  class name customer name
        customerEmail: '.info .email', //  class name customer email
        customerPhone: '.info .phone', //  class name customer email
        customerRemove: '.info .remove', //  class name customer bottom
        orderSummaryNoProduct: '.order_summary .empty', //  class name order summary no product
        orderSummaryHasProduct: '.order_summary .has_product', //  class name order summary has product
        orderSummary: '.order_summary', // class name order summary summary
        blockCart: '.pos_container .block_cart', //  class name return ajax html product
        totalItemsOnCart: '#pos_cart_block #pos_cart_qty', //ID of span element to show total products on cart
        removeProduct: '.cart_action .remove_product', // class button remove product from cart
        changeProductQty: '#cart_quantity_button a', // class of images change quantity product
        productSearch: 'form.product_search input[name="keyword"]', // name of input search product
        customerSearch: 'form.customer_search input[name="keyword"]', // input apply auto complete customer search
        cartQuantityInput: '.cart_quantity_input', // class name enter quantity product
        amountDue: '.amount_due', // class of amount due
        cancelOrder: '.btn_cancel_order', // class name buttom cancel order
        addOtherOrder: '.btn_add_other_order', // class name buttom add other order
        currentPaymentAmount: '.current_payment_amount', // class of current p amount due
        completeSale: '.complete_sale', // class of complete sale
        preOrder: '.pre_order', // class of complete sale
        totalOrder: '.total_order', // class of complete sale
        addPayment: '.btn_add_payment', // class add payment
        payOptionSelected: '.payment_option option:selected', // selected payment
        selectedOrderState: '.order_state_option', // selected order state
        blockPaidPayment: '.block_paid_payment', // class assgin payment detail
        deletePayment: '.paid_payment_delete img', // icon detele payment
        buttonCompleteSale: '.btn_complete', // class button name complete sale
        buttonPreOrder: '.btn_pre_order', // class button name pre-order
        orderNote: '.order_note .note', // class note of order
        showNoteOnInvoice: '.order_note .show_note_on_invoice', // class checkbox show on invoice
        blockMessage: '.block_message', // class block message
        blockContent: '#content', // id div content
        newOrder: '.new_order', // class button new order
        printInvoice: '.print_invoice', // class button print receipt
        printReceipt: '.print_receipt', // class button print receipt
        changeCurrency: '.changeCurrency', // class select box change currency
        isResetPayment: '.is_reset_payment', // class select box change currency
        isExistPayment: '.is_exist_payment', // class select box change currency
        productDiscount: '.product_discount', // class product discount
        productPrice: '.product_price_edit', // class product price input
        discountType: '.pos_reduction_type', // class reduction type
        classError: 'pos_error', // define class error
        posAjaxRunning: '.pos_ajax_running', // define class ajax running
        priceWithoutSpecificPrice: '.price_without_specific_price', // define class input hidden price without specific price
        blockSummary: '.block_summary', // class block summary,
        orderDiscountType: '.pos_order_discount_type', // Select box discount type,
        discountAmount: '.block_discount .discount_amount', // class discount amount,
        orderDiscountValue: '.pos_order_discount', // Input contain value of discount,
        blockDiscount: '.block_discount', // define class discount
        buttonAppyOrderDiscount: '.btn_apply_order_discount', // define button class apply order discount
        productTotalPrice: '.pos_product_total_price', // define class input hidden product total price
        posFreeShipping: '#pos_free_shipping', // defined id input checkbox free shipping
        blockShipping: '.block_shipping', // defined class of block shipping
        listCarriers: '.block_shipping .list_carriers', // defined class of div shipping
        deliveryOption: '.shipping #delivery_option', // defined class of div shipping
        shippingCost: '.shipping .shipping_cost', // defined class content shipping cost
        showBlock: '.show_block', // defined class input show blocks
        fieldsetBlock: '.fieldset_block', // defined class input show blocks
        fieldset: 'fieldset', // defined class input show addresses
        hidenBlock: 'hiden_block', // defined class input show blocks
        contentBlock: '.content_block', // defined class content blocks
        blockAddresses: '.pos_container .block_addresses ', // defined class block addresses
        orderStatus: '.order_status', // class name of block order status
        classExpand: 'icon-expand-alt',
        classCollapse: 'icon-collapse-alt',
        inputGivenMoney: '.block_payment input[name="given_money"]', // input name given money
        inputReturnMoney: '.block_payment input[name="return_money"]', // input return money
        displayPosCustomerTop: '#display_pos_customer_top', // display hook pos customer top
        displayPosCustomerBottom: '#display_pos_customer_bottom', // display hook pos customer bottom
        orderDiscount: '.order_discount', // div discout order
        deleteOrderDiscount: '.delete_order_discount', // icon detele order discount
        iconToggleDiscount: '#toggle_block_order_discount', // icon expand or collapse
        orderDiscountError: '.order_discount_error' // display discount error
    };

    /**
     * assign PosCart to object
     */
    var object = this;
    PosCart.instance = this;

    /**
     * constructor all event
     */
    this.init = function()
    {
        $(PosCart.instance.selectors.isResetPayment).val($(PosCart.instance.selectors.isExistPayment).val());
        $(object.selectors.isResetPayment).val($(object.selectors.isExistPayment).val());
        // remove customer
        $(document).on('click', this.selectors.customerRemove, function() {
            PosCart.instance.removeCustomer();
        });

        // remove product
        $(document).on('click', this.selectors.removeProduct, function() {
            arrayIds = $(this).attr('rel').split('_');
            if (arrayIds.length <= 0)
            {
                return;
            }
            idProduct = parseInt(arrayIds[0]);
            idProductAttribute = typeof arrayIds[1] !== 'undefined' ? parseInt(arrayIds[1]) : null;
            PosCart.instance.removeProductFromCart(idProduct, idProductAttribute);
        });

        // change quantity product by event click buttom + -
        //$(this.selectors.changeProductQty).die('click');
        $(document).on('click', this.selectors.changeProductQty, function()
        {
            operator = $(this).attr('title').trim();
            arrayIds = $(this).attr('rel').split('_');
            id_quantity_hidden = 'quantity_' + $(this).attr('rel') + '_hidden';
            idInputQuantity = $(this).attr('id');
            currentQuantity = parseInt($('#' + idInputQuantity + '_hidden').val());
            if (arrayIds.length <= 0)
            {
                return;
            }
            idProduct = parseInt(arrayIds[0]);
            idProductAttribute = typeof arrayIds[1] !== 'undefined' ? parseInt(arrayIds[1]) : null;
            idShop = typeof arrayIds[2] !== 'undefined' ? parseInt(arrayIds[2]) : null;
            PosCart.instance.changeProductQuantity(1, idProduct, idShop, idProductAttribute, operator, $('#' + id_quantity_hidden).val());
        });

        // change quantity product by event enter quantity input
        $(document).on('change', this.selectors.cartQuantityInput, function()
        {
            quantity = $(this).val();
            idInputQuantity = $(this).attr('id');
            currentQuantity = parseInt($('#' + idInputQuantity + '_hidden').val());
            if (isNaN(quantity))
            {
                alert(stPos.lang.please_enter_a_number);
                // reset quantity of product
                $(this).val(currentQuantity);
                return;
            }
            if (!PosCart.instance.isValidNumber(quantity))
            {
                alert(stPos.lang.please_enter_a_number);
                // reset quantity of product
                $(this).val(currentQuantity);
                return;
            }
            quantity = parseInt(quantity);
            if (currentQuantity > quantity)
            {
                operator = 'down';
                newQuantity = parseInt(currentQuantity - quantity);
            }
            else if (currentQuantity < quantity)
            {
                operator = 'up';
                newQuantity = parseInt(quantity - currentQuantity);
            }
            else
            {
                return;
            }
            arrayIds = idInputQuantity.split('_');
            if (arrayIds.length <= 0)
            {
                return;
            }
            idProduct = parseInt(arrayIds[1]);
            idProductAttribute = typeof arrayIds[2] !== 'undefined' ? parseInt(arrayIds[2]) : null;
            idShop = typeof arrayIds[3] !== 'undefined' ? parseInt(arrayIds[3]) : null;
            PosCart.instance.changeProductQuantity(newQuantity, idProduct, idShop, idProductAttribute, operator, currentQuantity);
        });

        // change quantity product by event click buttom + -
        $(document).on('click', this.selectors.cancelOrder, function()
        {
            if (confirm(PosCart.instance.lang.do_you_want_to_cancel_this_order) === true)
                PosCart.instance.cancelOrder();
        });

        // show|hidden complete sale
        PosCart.instance.checkCompleteSale();

        // event add payment
        $(document).on('click', this.selectors.addPayment, function()
        {
            var givenMoney = $(PosCart.instance.selectors.currentPaymentAmount).val();
            givenMoney = PosCart.instance._replaceAllString(PosCart.instance._firstFormatCurrency, '', givenMoney);
            givenMoney = givenMoney.replace(PosCart.instance._secondFormatCurrency, '.');
            var amountDue = PosCart.instance.getAmountDue();
            var amount = givenMoney > amountDue ? amountDue : givenMoney;
            if (PosCart.instance.isValidateAmount(amount))
            {
                idPostPayment = parseInt($(PosCart.instance.selectors.payOptionSelected).val());
                PosCart.instance.addPayment(parseFloat(amount), idPostPayment, PosCart.instance.getReference(), givenMoney);
                PosCart.instance.checkCompleteSale();

            }
        });

        // delete payment detail
        $(document).on('click', this.selectors.deletePayment, function()
        {
            idCartPosPayment = parseInt($(this).attr('rel'));
            PosCart.instance.removePayment(idCartPosPayment);
        });

        // even click botton complete sale
        $(document).on('click', this.selectors.buttonCompleteSale, function()
        {
            var note = $(PosCart.instance.selectors.orderNote).val();
            var showNoteOnInvoice = $(PosCart.instance.selectors.showNoteOnInvoice).is(':checked') ? 1 : 0;
            var idOrderState = 0;
            if ($(PosCart.instance.selectors.selectedOrderState).length > 0)
                idOrderState = parseInt($(PosCart.instance.selectors.selectedOrderState).val());

            PosCart.instance.completeSale(note, idOrderState, showNoteOnInvoice);
        });

        // even click button pre order
        $(document).on('click', this.selectors.buttonPreOrder, function()
        {
            var note = $(PosCart.instance.selectors.orderNote).val();
            var showNoteOnInvoice = $(PosCart.instance.selectors.showNoteOnInvoice).is(':checked') ? 1 : 0;
            var idOrderState = 0;
            if ($(PosCart.instance.selectors.selectedOrderState).length > 0)
                idOrderState = parseInt($(PosCart.instance.selectors.selectedOrderState).val());
            PosCart.instance.completeSale(note, idOrderState, showNoteOnInvoice);
        });

        $(this.selectors.currentPaymentAmount).keydown(function(e) {
            if (e.keyCode === 13)
            {
                amount = $(PosCart.instance.selectors.currentPaymentAmount).val();
                if (PosCart.instance.isValidateAmount(amount))
                {
                    idPostPayment = parseInt($(PosCart.instance.selectors.payOptionSelected).val());
                    PosCart.instance.addPayment(parseFloat(amount), idPostPayment, PosCart.instance.getReference());
                    PosCart.instance.checkCompleteSale();
                }
            }
        });

        // enter discount value
        $(document).on('keyup', this.selectors.productDiscount, function()
        {
            var element = $(this).parent();
            var discountValue = $(element).find(PosCart.instance.selectors.productDiscount).val();
            var discountType = $(element).find(PosCart.instance.selectors.discountType).val();
            var priceWithoutSpecificPrice = $(element).find(PosCart.instance.selectors.priceWithoutSpecificPrice).val();            
            if (PosCart.instance._isValidDiscount(discountValue, discountType, priceWithoutSpecificPrice))
                PosCart.instance.removeDiscountErrorClass(element, true);
            else
                PosCart.instance.addDiscountErrorClass(element, true);
        });
        
        // change discount value
        $(document).on('change', this.selectors.productDiscount, function()
        {
            var element = $(this).parent();
            PosCart.instance.onChangeProductDiscount(element);
        });
        
        // event enter product price
        $(document).on('keyup', this.selectors.productPrice, function()
        {
            var productPrice = $(this).val();
            if (PosCart.instance._isValidProductPrice(productPrice)) {
                PosCart.instance.removeProductPriceErrorClass(this);
            } else {
                PosCart.instance.addProductPriceErrorClass(this);
            }
        });
        
        // event change product price
        $(document).on('change', this.selectors.productPrice, function(){
            PosCart.instance.onChangeProductPrice(this);
        });

        // event change combination
        $(document).on('change', this.selectors.dropdownCombination, function()
        {
            var data = $(this).val().split('_');
            var idProduct = parseInt(data[0]);
            var newIdProductAttribute = parseInt(data[1]);
            var qty = parseInt(data[2]);
            var idShop = parseInt(data[3]);
            var oldIdProductAttribute = $(this).find(':selected').data('id_product_attribute');

            PosCart.instance.onChangeCombination(idProduct, newIdProductAttribute, oldIdProductAttribute, qty, idShop);
        });

        // change discount type
        $(document).on('change', this.selectors.discountType, function()
        {
            var element = $(this).parent();
            var discountValue = $(element).find(PosCart.instance.selectors.productDiscount).val();
            if (parseFloat(discountValue) === 0)
                return;
            PosCart.instance.onChangeProductDiscount(element);
        });

        // even click button new order
        $(document).on('click', this.selectors.newOrder, function()
        {
            location.reload(true);
        });

        // event click button "Print" invoice
        $(document).on('click', this.selectors.printInvoice, function()
        {
            (new PosOrder(parseInt($(this).attr('rel')))).printInvoice();
        });

        // event click button "Print" receipt
        $(document).on('click', this.selectors.printReceipt, function ()
        {
            (new PosOrder(parseInt($(this).attr('rel')))).printReceipt();
        });

        // even click button "Print" receipt
        $(document).on('change', this.selectors.changeCurrency, function()
        {
            if (parseInt($(PosCart.instance.selectors.isResetPayment).val()) !== 0)
            {
                if (!confirm(stPos.lang.do_you_want_to_reset_all_payments))
                    return false;
                else
                    $(this).closest('form').submit();

            }
            $(this).closest('form').submit();
        });

        // event click button free shipping
        $(document).on('click', this.selectors.posFreeShipping, function()
        {
            PosCart.instance.updateFreeShipping(this);
        });

        // enter order discount value
        $(document).on('keyup', this.selectors.orderDiscountValue, function()
        {
            var element = $(this).parents(PosCart.instance.selectors.orderDiscount);
            PosCart.instance.onAddOrderDiscount(element);
        });

        PosCart.instance.checkDiscountAmount($(PosCart.instance.selectors.orderDiscountType).val());

        // change order discount type
        $(document).on('change', this.selectors.orderDiscountType, function()
        {
            PosCart.instance.checkDiscountAmount($(this).val());
            var element = $(this).parents(PosCart.instance.selectors.orderDiscount);
            PosCart.instance.onAddOrderDiscount(element);
        });

        // click butrton apply order discount
        $(document).on('click', this.selectors.buttonAppyOrderDiscount, function()
        {
            var element = $(this).parents(PosCart.instance.selectors.orderDiscount);
            PosCart.instance.onSubmitOrderDiscount(element);

        });

        // change delivery option
        $(document).on('change', this.selectors.deliveryOption, function()
        {
            var idCarrier = $(this).val();
            var idAddress = $(this).find(':selected').data("id_address");
            PosCart.instance._updateExtraCarrier(idCarrier, idAddress);

        });

        // show/hiden blocks
        $(document).on('click', this.selectors.showBlock, function()
        {
            var element_parent = $(this).parent();
            var next_element = $(this).next();
            var i_element = $(this).children();
            if ($(next_element).is(':hidden'))
            {
                $(next_element).show();
                $(element_parent).removeClass(PosCart.instance.selectors.hidenBlock);
                $(element_parent).addClass(PosCart.instance.selectors.fieldset);
                $(i_element).removeClass(PosCart.instance.selectors.classExpand);
                $(i_element).addClass(PosCart.instance.selectors.classCollapse);

            }
            else
            {
                $(next_element).hide();
                $(element_parent).removeClass(PosCart.instance.selectors.fieldset);
                $(element_parent).addClass(PosCart.instance.selectors.hidenBlock);
                $(i_element).removeClass(PosCart.instance.selectors.classCollapse);
                $(i_element).addClass(PosCart.instance.selectors.classExpand);
            }


        });

        // Event click on button add other order
        $(document).on('click', this.selectors.addOtherOrder, function()
        {
            PosCart.instance.addNewOrder();
        });

        // change given money
        $(document).on('keyup', this.selectors.inputGivenMoney, function(e)
        {
            if (e.which >= 37 && e.which <= 40) {
                e.preventDefault();
            }
            $(this).val(function(index, value) {
                value = PosCart.instance._replaceAllString(PosCart.instance._firstFormatCurrency, '', value);
                PosCart.instance._currentMoneyGiven = value;
                return PosCart.instance.numberWithCommas(value, PosCart.instance._secondFormatCurrency);
            });
            var defaultReturnMoney = 0;
            var currentAmount = PosCart.instance.getAmountDue();
            var givenMoney = parseFloat((PosCart.instance._currentMoneyGiven).replace(PosCart.instance._secondFormatCurrency, '.'));
            var returnMoney = (givenMoney > currentAmount) ? (givenMoney - currentAmount) : defaultReturnMoney;
            PosCart.instance._setReturnMoney(returnMoney);
        });

        // delete order discount
        $(document).on('click', this.selectors.deleteOrderDiscount, function()
        {
            var idCartRule = parseInt($(this).data('id-cart-rule'));
            if (typeof idCartRule === 'undefined' && !isNaN(idCartRule))
                return;
            PosCart.instance._deleteOrderDiscount(idCartRule);
        });
        this._displayBlockShipping();
        this._displayBlockAddress();
    };

    /**
     * Check display block address
     */
    this._displayBlockAddress = function()
    {
        if (this._idCustomer > 0 && parseInt(this._dummyCustomer) !== parseInt(this._idCustomer))
            $(PosCart.instance.selectors.blockAddresses).show();
    };

    /**
     * Check show label tax exclude in case order disount is amount
     * @param {string} amount_type
     */
    this.checkDiscountAmount = function(amount_type)
    {
        if (amount_type === PosCart.instance.constants.AMOUNT)
            $(PosCart.instance.selectors.discountAmount).show();
        else
            $(PosCart.instance.selectors.discountAmount).hide();
    };

    /**
     * Set id customer
     * @param {int} idCustomer id of current customer
     */
    this.setIdCustomer = function(idCustomer)
    {
        this._idCustomer = typeof idCustomer === 'undefined' ? null : parseInt(idCustomer);
    };
    /**
     * Get id customer
     * @returns {int}
     */
    this.getIdCustomer = function()
    {
        return parseInt(this._idCustomer);
    };

    /**
     * Set number of products
     * @param {int} nbProducts
     */
    this.setNbProducts = function(nbProducts)
    {
        this._nbProducts = typeof nbProducts === 'undefined' ? null : parseInt(nbProducts);
    };

    this.setFormatCurrency = function(format)
    {
        switch (format)
        {
            case 1:
            case 4:
                this._firstFormatCurrency = ',';
                this._secondFormatCurrency = '.';
                break;
            case 2:
                this._firstFormatCurrency = ' ';
                this._secondFormatCurrency = ',';
                break;
            case 3:
                this._firstFormatCurrency = '.';
                this._secondFormatCurrency = ',';
                break;
            case 5:
                this._firstFormatCurrency = "'";
                this._secondFormatCurrency = '.';
                break;
        }
    };
    /**
     * Get number products in cart
     * @returns {int}
     */
    this.getNbProducts = function()
    {
        return parseInt(this._nbProducts);
    };

    /**
     * Set amount of payment
     * @param {float} amountDue amount of payment
     */
    this.setAmountDue = function(amountDue)
    {
        this._amountDue = typeof amountDue === 'undefined' ? null : parseFloat(amountDue);
    };

    /**
     * Set price display precision
     * @param {float} priceDisplayPrecision amount of payment
     */
    this.setPriceDisplayPrecision = function(priceDisplayPrecision)
    {
        this._priceDisplayPrecision = typeof priceDisplayPrecision === 'undefined' ? null : parseInt(priceDisplayPrecision);
    };

    /**
     * Set default decimal
     * @param {boolean} decimals
     */
    this.setDecimals = function(decimals)
    {
        this._decimals = typeof decimals === 'undefined' ? 0 : parseInt(decimals);
    };

    /**
     * Set status collecting payment
     * @param {Int} collectingPayment amount of payment
     */
    this.setCollectingPayment = function(collectingPayment)
    {
        this._collectingPayment = typeof collectingPayment === 'undefined' ? null : parseInt(collectingPayment);
    };

    /**
     * Get status collecting payment
     * @returns {float}
     */
    this.getCollectingPayment = function()
    {
        return parseInt(this._collectingPayment);
    };

    /**
     * Set status dumy customer or not
     * @param {Int} dummyCustomer
     */
    this.setDummyCustomer = function(dummyCustomer)
    {
        this._dummyCustomer = parseInt(dummyCustomer);
    };

    /**
     * Check dumy customer or not
     * @returns {boolean}
     */
    this.isDummyCustomer = function()
    {
        return (parseInt(this._dummyCustomer) === parseInt(this._idCustomer));
    };

    /**
     * Get amount due of payment
     * @returns {float}
     */
    this.getAmountDue = function()
    {
        return parseFloat(this._amountDue);
    };

    /**
     * Assign customer to object cart
     * @param {int} idCustomer id of selected customer
     */
    this.assignCustomer = function(idCustomer)
    {
        $.ajax({
            url: this.ajaxUrl,
            dataType: "json",
            data: {id_customer: idCustomer, action: this.actions.assignCustomer},
            beforeSend: PosCart.instance.resetCustomerHooks,
            success: function(jsonData)
            {
                if (jsonData.success)
                {
                    PosCart.instance._callbackAssignCustomer(jsonData.data.customer);
                    PosCart.instance.setIdCustomer(jsonData.data.customer.id);
                    PosCart.instance._updateBlocks(jsonData.data);
                    PosCart.instance._displayBlockShipping();

                    if (PosCart.instance._idCustomer > 0 && parseInt(PosCart.instance._dummyCustomer) !== parseInt(PosCart.instance._idCustomer))
                    {
                        $(PosCart.instance.selectors.blockAddresses).show();
                        var element_fieldset = $(PosCart.instance.selectors.blockAddresses).children();
                        if ($(element_fieldset).hasClass(PosCart.instance.selectors.fieldset))
                        {
                            $(element_fieldset).removeClass(PosCart.instance.selectors.fieldset);
                            $(element_fieldset).addClass(PosCart.instance.selectors.hidenBlock);
                            $(element_fieldset).find(PosCart.instance.selectors.contentBlock).hide();
                        }
                    }

                    PosAddresses.instance.setAddresses(jsonData.data.addresses);
                    PosAddresses.instance.setIdAddressDelivery(jsonData.data.idAddressDelivery);
                    PosAddresses.instance.setIdAddressInvoice(jsonData.data.idAddressInvoice);
                    PosAddresses.instance.setLinkAddAddress(jsonData.data.linkAddAddress);
                    PosAddresses.instance.onLoad();
                    window.parent.$.fancybox.close();
                }
                else
                {
                    alert(jsonData.message);
                }
            },
            error: function(jqXHR, exception)
            {
                PosCart.instance._showErrorException(jqXHR, exception);
            }
        });
    };

    /**
     * Update block cart summary, block product, block discount
     * @param {json} data
     */
    this._updateBlocks = function(data)
    {
        // update block of product
        if (typeof data.product !== 'undefined')
            this.updateProductCart(data.product);
        
        // keep this function to reuse for another addons in the next time
        if (typeof data.idCart !== 'undefined') {
            if(typeof ROCKPOS !== 'undefined' && typeof ROCKPOS === 'object') {
                ROCKPOS.idCart = data.idCart;
            }
        }    
        // Update total product on cart header
        $(PosCart.instance.selectors.totalItemsOnCart).text(data.productNumber);

        // update cart summary
        this.updateCartSumary(data.cart);
        $(PosCart.instance.selectors.amountDue).text(data.amountDue);
        PosCart.instance._setGivenMoney(data.priceAmountDue);
        PosCart.instance._setReturnMoney(0);
        if (typeof data.discounts !== 'undefined')
            this.updateOrderDiscount(data.discounts);

        if (typeof data.shipping !== 'undefined')
            this.updateBlockShipping(data.shipping);

        if (typeof data.shippingCost !== 'undefined')
            this.updateShippingCost(data.shippingCost);
        if (typeof data.hooks !== 'undefined')
            this.updateCustomerHooks(data.hooks);
        this.setAmountDue(data.priceAmountDue);
        this.setNbProducts(parseInt(data.productNumber));
        this.checkCompleteSale();

    };

    /**
     * Set and format return money
     * @param {float} amount
     */
    this._setReturnMoney = function(amount)
    {
        var amountFormat = PosCart.instance.numberWithCommas(amount, '.');
        if (PosCart.instance._decimals)
            amountFormat = PosCart.instance.numberWithCommas(amount.toFixed(this._priceDisplayPrecision), '.');
        $(PosCart.instance.selectors.inputReturnMoney).val(amountFormat);
    };

    /**
     * Set and format given money
     * @param {float} amountDue
     */
    this._setGivenMoney = function(amountDue)
    {
        var amountDueFormat = PosCart.instance.numberWithCommas(amountDue, '.');
        if (PosCart.instance._decimals)
            amountDueFormat = PosCart.instance.numberWithCommas(amountDue.toFixed(this._priceDisplayPrecision), '.');
        $(PosCart.instance.selectors.currentPaymentAmount).val(amountDueFormat);
    };

    /**
     * assign selected customer to block customer info
     * @param {json} customer object
     *
     */
    this._callbackAssignCustomer = function(customer)
    {
        // assign customer info
        if (typeof customer !== 'undefined')
        {
            try
            {
                $(PosCart.instance.selectors.customerName).html(customer.firstname + ' ' + customer.lastname);
                if (customer.email !== customer.shop_email)
                    $(PosCart.instance.selectors.customerEmail).html(customer.email);
                if (customer.phone)
                    $(PosCart.instance.selectors.customerPhone).html(customer.phone);
                $(PosCart.instance.selectors.customerForm).hide();
                $(PosCart.instance.selectors.customerInfo).show();
                $(PosCart.instance.selectors.customerSearch).val('');

            }
            catch (e) {
                alert(stPos.lang.cannot_associate_this_customer);
            }
        }
    };

    /**
     * Unset customer from cart
     */
    this.removeCustomer = function()
    {
        $.ajax({
            url: this.ajaxUrl,
            dataType: "json",
            data: {action: this.actions.removeCustomer},
            beforeSend: PosCart.instance.resetCustomerHooks,
            success: function(jsonData)
            {
                if (jsonData.success) {
                    $(PosCart.instance.selectors.customerName).html('');
                    $(PosCart.instance.selectors.customerEmail).html('');
                    $(PosCart.instance.selectors.customerPhone).html('');
                    $(PosCart.instance.selectors.customerInfo).hide();
                    $(PosCart.instance.selectors.customerForm).show();
                    PosCart.instance.setIdCustomer(jsonData.data.idCustomer);
                    PosCart.instance._updateBlocks(jsonData.data);
                    PosCart.instance._displayBlockShipping();
                    var addresses = {};
                    PosAddresses.instance.setAddresses(addresses);
                    PosAddresses.instance.onLoad();
                    $(PosCart.instance.selectors.blockAddresses).hide();
                }
                else
                {
                    alert(jsonData.message);
                }
                $(PosCart.instance.selectors.customerSearch).focus();
            },
            error: function(jqXHR, exception)
            {
                PosCart.instance._showErrorException(jqXHR, exception);
            }
        });
    };

    /**
     * Add selected product to cart
     * @param {int} idProduct
     * @param {int} idProductAttribute
     * @param {function} beforeSuccessCallback to be executed on success
     * @param {function} beforeSuccessCallback to be executed after success
     */
    this.addProductToCart = function(idProduct, idProductAttribute, beforeSuccessCallback, afterSuccessCallback)
    {
        if (typeof idProduct === 'undefined')
            return;
        idProduct = parseInt(idProduct);
        if (typeof idProductAttribute === 'undefined')
        {
            idProductAttribute = null;
        }
        $.ajax({
            type: 'POST',
            url: this.ajaxUrl,
            dataType: 'json',
            data: {add: 1, id_product: idProduct, id_product_attribute: idProductAttribute, action: this.actions.addProduct},
            success: function(jsonData)
            {
                if (jsonData.success)
                {
                    if (typeof beforeSuccessCallback === 'function')
                        beforeSuccessCallback();
                    PosCart.instance._updateBlocks(jsonData.data);
                    PosCart.instance._displayBlockShipping();
                    if (typeof afterSuccessCallback === 'function')
                        afterSuccessCallback();
                }
                else
                    alert(jsonData.message);

                //clean text in input product search
                $(PosCart.instance.selectors.productSearch).val('');

            },
            error: function(jqXHR, exception)
            {
                PosCart.instance._showErrorException(jqXHR, exception);
            }
        });
    };

    /**
     * Change product quantity in cart
     * @param {int} quantity quantity of product in cart
     * @param {int} idProduct id of product
     * @param {int} idShop id of shop
     * @param {int} idProductAttribute id attibute of product
     * @param {int} currentQuantity quantity befor change
     * @param {string} operator add or substract quantity product
     */
    this.changeProductQuantity = function(quantity, idProduct, idShop, idProductAttribute, operator, currentQuantity)
    {
        if (typeof idProduct === 'undefined' || typeof idShop === 'undefined')
        {
            return;
        }
        idProduct = parseInt(idProduct);
        if (typeof idProductAttribute === 'undefined')
        {
            idProductAttribute = null;
        }
        $.ajax({
            url: this.ajaxUrl,
            data: {quantity: quantity, id_product: idProduct, id_shop: idShop, id_product_attribute: idProductAttribute, operator: operator, action: this.actions.changeProductQuantity},
            dataType: "json",
            success: function(jsonData)
            {
                if (jsonData.success)
                {
                    PosCart.instance._updateBlocks(jsonData.data);
                    PosCart.instance._displayBlockShipping();
                }
                else
                {
                    $('#quantity_' + idProduct + '_' + idProductAttribute).val(currentQuantity);
                    alert(stPos.lang.out_of_stock);
                }
            },
            error: function(jqXHR, exception)
            {
                PosCart.instance._showErrorException(jqXHR, exception);
            }
        });

    };
    /**
     * remove a product from cart
     * @param {string} idProduct id of product
     * @param {int} idProductAttribute id of product attribute
     */
    this.removeProductFromCart = function(idProduct, idProductAttribute)
    {
        if (!confirm(stPos.lang.do_you_want_to_delete_this_item))
        {
            return false;
        }
        if (typeof idProduct === 'undefined')
        {
            return;
        }
        idProduct = parseInt(idProduct);
        if (typeof idProductAttribute === 'undefined')
        {
            idProductAttribute = null;
        }
        $.ajax({
            url: this.ajaxUrl,
            data: {id_product: idProduct, id_product_attribute: idProductAttribute, action: this.actions.removeProductFromCart},
            dataType: "json",
            success: function(jsonData)
            {
                if (jsonData.success)
                {
                    PosCart.instance._updateBlocks(jsonData.data);
                    PosCart.instance._displayBlockShipping();
                }
                else
                {
                    alert(jsonData.message);
                }
            },
            error: function(jqXHR, exception)
            {
                PosCart.instance._showErrorException(jqXHR, exception);
            }
        });
    };

    /**
     * Auto update block product cart when user remove|add|change quantity product.
     * @param {string} product
     */
    this.updateProductCart = function(product)
    {
        $(PosCart.instance.selectors.blockCart).html(product);
    };

    /**
     * Auto update infomation cart when add|remove product, change quantity product, add|remove customer.
     * @param {json} cart
     */

    this.updateCartSumary = function(cart)
    {
        if (typeof cart !== 'undefined')
        {
            $(this.selectors.blockSummary).html(cart);
            var maxDiscountAmount = $(this.selectors.productTotalPrice).val();
            var element = $(this.selectors.orderDiscountType).parent();
            var discountValue = parseFloat($(element).find(PosCart.instance.selectors.orderDiscountValue).val());
            var discountType = $(element).find(PosCart.instance.selectors.orderDiscountType).val();
            if (this._isValidDiscount(discountValue, discountType, maxDiscountAmount))
            {
                this.removeDiscountErrorClass(element, false);
                this._enableButtonOrderDiscount(element);
            }
            else
            {
                //this.addDiscountErrorClass(element, false);
                this._disableButtonOrderDiscount(element);
            }
        }
        else
            alert(stPos.lang.update_cart_summary_unsuccessfully);
    };

    /**
     * Update block discount
     * @param {html} discount
     */
    this.updateOrderDiscount = function(discounts)
    {
        if (typeof discounts !== 'undefined')
            $(this.selectors.blockDiscount).html(discounts);
    };

    /**
     * Update block shipping
     * @param {html} shipping
     */
    this.updateBlockShipping = function(shipping)
    {
        if (typeof shipping !== 'undefined')
            $(this.selectors.blockShipping).html(shipping);
    };

    /**
     * Update block shipping
     * @param {html} shippingCost
     */
    this.updateShippingCost = function(shippingCost)
    {
        if (typeof shippingCost !== 'undefined')
            $(this.selectors.shippingCost).html(shippingCost);
    };

    this.cancelOrder = function()
    {
        $.ajax({
            type: 'POST',
            url: this.ajaxUrl,
            dataType: 'json',
            data: {action: this.actions.cancelOrder},
            success: function(json)
            {
                if (json.success)
                {
                    location.reload(true);
                }
            },
            error: function(jqXHR, exception)
            {
                PosCart.instance._showErrorException(jqXHR, exception);
            }
        });
    };
    
    this.addNewOrder = function()
    {
        $.ajax({
            type: 'POST',
            url: this.ajaxUrl,
            dataType: 'json',
            data: {action: this.actions.addNewOrder},
            success: function(json)
            {
                if (json.success)
                {
                    location.reload(true);
                }
            },
            error: function(jqXHR, exception)
            {
                PosCart.instance._showErrorException(jqXHR, exception);
            }
        });
    };    

    /**
     * Show | hidden button complete sale
     */
    this.checkCompleteSale = function()
    {
        // check show/hiden complete sale
        if (this.getIdCustomer() > 0 && this.getNbProducts() > 0)
        {
            if (!this.getCollectingPayment() || this.getAmountDue() === 0.0)
            {
                return this.lestGo();
            }
            var totalOrder = parseFloat($(this.selectors.totalOrder).val());
            if (this.getAmountDue() > 0 && parseFloat(this.getAmountDue()) < totalOrder)
            {
                return this.lestGo(true);
            }
        }
        this.letsNotGo();
    };

    /**
     * Show block complete sale
     */
    this.lestGo = function(isPreOrder)
    {
        if (isPreOrder) {
            $(this.selectors.preOrder).show();
            $(this.selectors.completeSale).hide();
        } else {
            $(this.selectors.completeSale).show();
            $(this.selectors.preOrder).hide();
        }
        $(this.selectors.orderStatus).show();
    };

    /**
     * Hiden block complete sale
     */
    this.letsNotGo = function()
    {
        $(this.selectors.preOrder).hide();
        $(this.selectors.completeSale).hide();
        $(this.selectors.orderStatus).hide();
    };

    /**
     * Add a new amount to the current cart
     * @param {float} amount
     * @param {string} reference
     * @param {int} idPosPayment
     */
    this.addPayment = function(amount, idPosPayment, reference, givenMoney)
    {
        amount = typeof amount === 'undefined' ? 0.0 : parseFloat(amount);
        reference = typeof reference === 'undefined' ? '' : reference;
        idPosPayment = typeof idPosPayment === 'undefined' ? 0 : parseInt(idPosPayment);
        if (amount === 0.0 || idPosPayment === 0)
        {
            return;
        }
        currentAmount = PosCart.instance.getAmountDue();
        $.ajax({
            type: 'POST',
            url: this.ajaxUrls.newSalePayment,
            async: true,
            dataType: 'json',
            data: {amount: amount, given_money: givenMoney, reference: reference, id_pos_payment: idPosPayment, action: PosCart.instance.actions.addPayment},
            success: function(jsonData)
            {
                if (jsonData.success)
                {

                    // Update block paid payment detail
                    PosCart.instance.renderPaidPaymentBlock(jsonData.data);
                    $(PosCart.instance.selectors.isResetPayment).val($(PosCart.instance.selectors.isExistPayment).val());
                    $(PosCart.instance.selectors.currentPaymentAmount).select();
                    PosCart.instance._setReturnMoney(0);
                    PosCart.instance.checkCompleteSale();
                }
                else
                {
                    PosCart.instance._setGivenMoney(currentAmount);
                    alert(jsonData.message);
                }
            },
            error: function(jqXHR, exception)
            {
                PosCart.instance._setGivenMoney(currentAmount);
                PosCart.instance._showErrorException(jqXHR, exception);
            }
        });
    };

    /**
     * Remove an amount from the current cart
     * @param {int} idCartPosPayment
     */
    this.removePayment = function(idCartPosPayment)
    {
        // get & validate id_pos_cart_payment remove
        if (typeof idCartPosPayment === 'undefined')
        {
            return;
        }
        idCartPosPayment = parseInt(idCartPosPayment);
        $.ajax({
            type: 'POST',
            url: this.ajaxUrls.newSalePayment,
            data: {id_pos_cart_payment: idCartPosPayment, action: this.actions.removePayment},
            dataType: 'json',
            success: function(jsonData)
            {
                if (jsonData.success)
                {
                    // update paid payment block
                    PosCart.instance.renderPaidPaymentBlock(jsonData.data);
                    $(PosCart.instance.selectors.isResetPayment).val($(PosCart.instance.selectors.isExistPayment).val());
                    PosCart.instance.checkCompleteSale();
                    $(PosCart.instance.selectors.currentPaymentAmount).select();
                    $(PosCart.instance.selectors.inputReturnMoney).val(0);
                }
                else
                {
                    alert(jsonData.message);
                }
            },
            error: function(jqXHR, exception)
            {
                PosCart.instance._showErrorException(jqXHR, exception);
            }
        });

    };

    /**
     * Display paid payments of the current cart
     * @param {data} data
     */
    this.renderPaidPaymentBlock = function(data)
    {
        try
        {
            // Display html paid payment
            $(this.selectors.blockPaidPayment).html(data.payment);
            if (data.orderStatus) {
                $(this.selectors.orderStatus).html(data.orderStatus);
            }
            $(this.selectors.amountDue).text(data.amountDue);
            PosCart.instance._setGivenMoney(data.priceAmountDue);
            this.setAmountDue(data.priceAmountDue);
        }
        catch (e)
        {
            alert(stPos.lang.there_is_an_error_on_displaying_paid_payment_block);
        }
    };

    /**
     * Check if payment comes with a reference or not
     * @returns {Boolean}
     */
    this.isIncludeReference = function()
    {
        return (parseInt($(this.selectors.payOptionSelected).attr('reference')) === 1);
    };

    /**
     * Get rule of a selected payment
     * @returns {string}
     */
    this.getRule = function()
    {
        return $.trim($(this.selectors.payOptionSelected).attr('rule'));
    };

    /**
     * Get reference of selected payment
     * @returns {string}
     */
    this.getReference = function()
    {
        reference = $(this.selectors.payOptionSelected).attr('reference');
        return $.trim(reference);
    };

    /**
     * Validate if a string is number or not
     * @param {string} val
     * @returns {boolean}
     */
    this.isValidNumber = function(val)
    {
        exp = /^[\[\]\)\(a-zA-Z0-9 _\-]+$/;
        return exp.test(val);
    };

    /**
     * @param {sting} note
     * @param {int} idOrderState
     * Create new an order
     */
    this.completeSale = function(note, idOrderState, showNoteOnInvoice)
    {
        if (typeof idOrderState === 'undefined')
            return;

        $.ajax({
            type: 'POST',
            url: this.ajaxUrl,
            data: {
                action: this.actions.completeSale,
                note: note,
                show_note_on_invoice: showNoteOnInvoice,
                id_order_state: idOrderState

            },
            dataType: 'json',
            beforeSend: function() {
                $(PosCart.instance.selectors.buttonCompleteSale).prop('disabled', true);
                $(PosCart.instance.selectors.buttonPreOrder).prop('disabled', true);
            },
            complete: function() {
                $(PosCart.instance.selectors.buttonCompleteSale).prop('disabled', false);
                $(PosCart.instance.selectors.buttonPreOrder).prop('disabled', false);
            },
            success: function(jsonData) {
                if (jsonData.success)
                {
                    $(PosCart.instance.selectors.blockContent).html(jsonData.data);
                    if (jsonData.print_receipt_auto) {
                        (new PosOrder(jsonData.id_order)).printReceipt();
                    }
                    if (jsonData.print_invoice_auto) {
                        (new PosOrder(jsonData.id_order)).printInvoice();
                    }
                } else {
                    alert(jsonData.message);
                }
            },
            error: function(jqXHR, exception)
            {
                PosCart.instance._showErrorException(jqXHR, exception);
            }
        });
    };
    
    /**
     * Validate value enter input add payment
     * @param {float} amount
     * @returns {Boolean}
     */
    this.isValidateAmount = function(amount)
    {
        currentAmountDue = PosCart.instance.getAmountDue();
        flag = true;
        if (PosCart.instance.isIncludeReference() && PosCart.instance.getReference() === '')
        {
            alert(stPos.lang.please_enter_the_payment_reference);
            flag = false;
        }
        if (PosCart.instance.isIncludeReference() && PosCart.instance.getRule() === 'check') {
            if (!PosCart.instance.isValidNumber(PosCart.instance.getReference())) {
                alert(stPos.lang.check_number_is_invalid);
                flag = false;
            }
        }
        if (isNaN(amount))
        {
            alert(stPos.lang.please_enter_a_number);
            PosCart.instance._setGivenMoney(currentAmountDue);
            flag = false;
        }
        if (amount <= 0)
        {
            alert(stPos.lang.payment_amount_should_be_greater_than_zero_and_less_than_or_equal_to_amount_due);
            PosCart.instance._setGivenMoney(currentAmountDue);
            flag = false;
        }
        $(PosCart.instance.selectors.currentPaymentAmount).select();
        return flag;
    };

    /**
     * Event onchange disount product
     * @param {jQuery} element
     */
    this.onChangeProductDiscount = function(element)
    {
        var product = $(element).find(PosCart.instance.selectors.productDiscount).data('product').split('_');
        var idProduct = parseInt(product[0]);
        var idProductAttribute = typeof product[1] !== 'undefined' ? parseInt(product[1]) : null;
        var idShop = typeof product[2] !== 'undefined' ? parseInt(product[2]) : 0;

        var discountValue = $(element).find(PosCart.instance.selectors.productDiscount).val();
        var discountType = $(element).find(PosCart.instance.selectors.discountType).val();
        var priceWithoutSpecificPrice = $(element).find(PosCart.instance.selectors.priceWithoutSpecificPrice).val();
        if (this._isValidDiscount(discountValue, discountType, priceWithoutSpecificPrice))
        {
            this.removeDiscountErrorClass(element, false);
            this._changeProductPrice(idProduct, idProductAttribute, idShop, discountValue, discountType);           
        } else {
            PosCart.instance.addDiscountErrorClass(element, true);
        }
    };
    
    /**
     * 
     * @param {jQuery} element
     */
    this.onChangeProductPrice = function(element){
        var product = $(element).data('product-price').split('_');
        var idProduct = parseInt(product[0]);
        var idProductAttribute = typeof product[1] !== 'undefined' ? parseInt(product[1]) : null;
        var idShop = typeof product[2] !== 'undefined' ? parseInt(product[2]) : 0;
        var productPrice = $(element).val();
        if (this._isValidProductPrice(productPrice)) {            
            this._changeProductPrice(idProduct, idProductAttribute, idShop, productPrice, 'price');
        } 
        if (!PosCart.isSuccess) { 
            PosCart.instance.addProductPriceErrorClass(element);
        } else {
            PosCart.instance.removeProductPriceErrorClass(element);
        }
    };

    /**
     * Event onchange combination product
     * @param {int} idProduct
     * @param {int} newIdProductAttribute
     * @param {int} oldIdProductAttribute
     * @param {int} qty
     * @param {int} idShop
     */
    this.onChangeCombination = function(idProduct, newIdProductAttribute, oldIdProductAttribute, qty, idShop)
    {
        if (typeof idProduct === 'undefined' ||
                parseInt(idProduct) <= 0 ||
                typeof newIdProductAttribute === 'undefined' ||
                parseInt(newIdProductAttribute) <= 0 ||
                typeof oldIdProductAttribute === 'undefined' ||
                parseInt(oldIdProductAttribute) <= 0 ||
                typeof qty === 'undefined' ||
                parseInt(qty) <= 0 ||
                typeof idShop === 'undefined' ||
                parseInt(idShop) <= 0
                )
            return;

        $.ajax({
            type: 'POST',
            url: this.ajaxUrl,
            data: {
                action: this.actions.changeCombination,
                id_product: idProduct,
                new_id_product_attribute: newIdProductAttribute,
                old_id_product_attribute: oldIdProductAttribute,
                qty: qty,
                id_shop: idShop
            },
            dataType: 'json',
            beforeSend: function()
            {
                $(PosCart.instance.selectors.posAjaxRunning).show();
            },
            success: function(jsonData)
            {
                if (jsonData.success)
                    PosCart.instance._updateBlocks(jsonData.data);
                else
                    alert(jsonData.message);

                $(PosCart.instance.selectors.posAjaxRunning).hide();
            },
            error: function(jqXHR, exception)
            {
                $(PosCart.instance.selectors.posAjaxRunning).hide();
                PosCart.instance._showErrorException(jqXHR, exception);
            }
        });

    };


    /**
     * Set free shipping
     * @param {jQuery} element
     */
    this.updateFreeShipping = function(element)
    {
        var freeShipping = $(element).is(':checked') ? 1 : 0;
        $.ajax({
            type: 'POST',
            url: this.ajaxUrl,
            dataType: 'json',
            data: {
                action: this.actions.updateFreeShipping,
                free_shipping: freeShipping
            },
            success: function(jsonData)
            {
                if (jsonData.success)
                {
                    object._updateBlocks(jsonData.data);
                }
                else
                {
                    alert(jsonData.message);
                }
            },
            error: function(jqXHR, exception)
            {
                PosCart.instance._showErrorException(jqXHR, exception);
            }
        });
    };

    /**
     * Change order discount
     * @param {jQuery} element
     */
    this.onAddOrderDiscount = function(element)
    {
        var discountValue = parseFloat($(element).find(PosCart.instance.selectors.orderDiscountValue).val());
        var discountType = $(element).find(PosCart.instance.selectors.orderDiscountType).val();
        var maxDiscountAmount = parseFloat($(PosCart.instance.selectors.productTotalPrice).val());
        this._removeOrderDiscountError(element);
        if (this._isValidDiscount(discountValue, discountType, maxDiscountAmount))
        {
            this.removeDiscountErrorClass(element, false);
            this._enableButtonOrderDiscount(element);
        }
        else
        {
            this.addDiscountErrorClass(element, false);
            this._disableButtonOrderDiscount(element);
        }
    };

    /**
     * submit order discount
     * @param {jQuery} element
     */
    this.onSubmitOrderDiscount = function(element)
    {
        var discountValue = $(element).find(PosCart.instance.selectors.orderDiscountValue).val();
        var discountType = $(element).find(PosCart.instance.selectors.orderDiscountType).val();
        if (discountType !== PosCart.instance.constants.VOUCHER)
            discountValue = parseFloat(discountValue);

        if (!discountValue)
        {
            PosCart.instance.addDiscountErrorClass(element, false);
            return;
        }
        var maxDiscountAmount = parseFloat($(PosCart.instance.selectors.productTotalPrice).val());
        if (!this._isValidDiscount(discountValue, discountType, maxDiscountAmount))
            return;
        else
            this._submitOrderDiscount(element, discountValue, discountType);
    };

    /**
     * Validate discount
     * @param {float} discountValue
     * @param {string} discountType
     * @param {float} maxDiscountAmount
     * @returns {Boolean}
     */
    this._isValidDiscount = function(discountValue, discountType, maxDiscountAmount)
    {
        if (discountType === PosCart.instance.constants.PERCENTAGE && $.isNumeric(discountValue) && parseFloat(discountValue) >= 0 && parseFloat(discountValue) <= 100)
            return true;
        else if (discountType === PosCart.instance.constants.AMOUNT && $.isNumeric(discountValue) && parseFloat(discountValue) >= 0 && parseFloat(discountValue) <= parseFloat(maxDiscountAmount))
            return true;
        else if (discountType === PosCart.instance.constants.VOUCHER)
            return true;
        else
            return false;

    };
    
    /**
     * 
     * @param {flloat} price
     * @returns {Boolean}
     */
    this._isValidProductPrice = function(price){
        return ($.isNumeric(price) && parseFloat(price) >= 0);           
    };

    /**
     * Send request apply product discount
     * @param {jQuery} element
     * @param {int} idProduct
     * @param {int} idProductAttribute
     * @param {int} idShop
     * @param {float} value
     * @param {string} type
     */
    this._changeProductPrice = function(idProduct, idProductAttribute, idShop, value, type)
    {
        if (parseInt(idProduct) <= 0 || typeof idProduct === 'undefined' || typeof idProductAttribute === 'undefined' || typeof value === 'undefined' || typeof type === 'undefined')
            return;

        $.ajax({
            type: 'POST',
            url: this.ajaxUrl,
            data: {
                action: this.actions.changeProductPrice,
                id_product: idProduct,
                id_product_attribute: idProductAttribute,
                id_shop: idShop,
                value: value,
                type: type
            },
            dataType: 'json',
            beforeSend: function()
            {
                $(PosCart.instance.selectors.posAjaxRunning).show();
            },
            success: function(jsonData)
            {
                if (jsonData.success)
                {
                    PosCart.instance._updateBlocks(jsonData.data);
                }
                else
                {
                    var dataProduct = idProduct + '_' + idProductAttribute + '_' + idShop;
                    var element = $("input[data-product='" + dataProduct +"']").parent();
                    PosCart.instance.removeDiscountErrorClass(element, true);          
                    $(PosCart.instance.selectors.posAjaxRunning).hide();
                }
            },
            error: function(jqXHR, exception)
            {
                $(PosCart.instance.selectors.posAjaxRunning).hide();
                PosCart.instance._showErrorException(jqXHR, exception);
            }
        });
    };

    /**
     * Send request apply product discount
     * @param {jQuery} element
     * @param {float} discountValue
     * @param {string} discountType
     */
    this._submitOrderDiscount = function(element, discountValue, discountType)
    {
        if (typeof discountValue === 'undefined' || typeof discountType === 'undefined')
            return;

        $.ajax({
            type: 'POST',
            url: this.ajaxUrl,
            data: {
                action: this.actions.addOrderDiscount,
                discount_value: discountValue,
                discount_type: discountType
            },
            dataType: 'json',
            beforeSend: function()
            {
                $(PosCart.instance.selectors.posAjaxRunning).show();
            },
            success: function(jsonData)
            {
                if (jsonData.success)
                {
                    PosCart.instance._removeOrderDiscountError(element);
                    PosCart.instance._updateBlocks(jsonData.data);
                    $(PosCart.instance.selectors.posAjaxRunning).hide();
                    PosCart.instance._resetOrderDiscountValue(element);
                }
                else
                {
                    if (jsonData.message)
                        PosCart.instance._showDiscountOrderError(element, jsonData.message);
                    PosCart.instance.addDiscountErrorClass(element, false);
                    PosCart.instance._disableButtonOrderDiscount(element);
                    $(PosCart.instance.selectors.posAjaxRunning).hide();
                }
                PosCart.instance._showBlockOrderDiscount();

            },
            error: function(jqXHR, exception)
            {
                PosCart.instance._showErrorException(jqXHR, exception);
                $(PosCart.instance.selectors.posAjaxRunning).hide();
            }
        });
    };

    /**
     * Show block order discount
     */
    this._showBlockOrderDiscount = function()
    {
        var fieldsetOrderDiscount = $(PosCart.instance.selectors.blockDiscount).children();
        if ($(PosCart.instance.selectors.iconToggleDiscount).hasClass(PosCart.instance.selectors.classExpand))
        {
            $(PosCart.instance.selectors.iconToggleDiscount).removeClass(PosCart.instance.selectors.classExpand);
            $(PosCart.instance.selectors.iconToggleDiscount).addClass(PosCart.instance.selectors.classCollapse);
        }
        if ($(fieldsetOrderDiscount).hasClass(PosCart.instance.selectors.hidenBlock))
        {
            $(fieldsetOrderDiscount).removeClass(PosCart.instance.selectors.hidenBlock);
            $(fieldsetOrderDiscount).addClass(PosCart.instance.selectors.fieldset);
            $(fieldsetOrderDiscount).find(PosCart.instance.selectors.contentBlock).show();
        }
    };

    /**
     * Send request apply product discount
     * @param {jQuery} element // Object of icon delete order discount
     * @param {int} idCartRule
     */
    this._deleteOrderDiscount = function(idCartRule)
    {
        $.ajax({
            type: 'POST',
            url: this.ajaxUrl,
            data: {
                action: this.actions.deleteOrderDiscount,
                id_cart_rule: idCartRule
            },
            dataType: 'json',
            beforeSend: function()
            {
                $(PosCart.instance.selectors.posAjaxRunning).show();
            },
            success: function(jsonData)
            {
                if (jsonData.success)
                    PosCart.instance._updateBlocks(jsonData.data);
                $(PosCart.instance.selectors.posAjaxRunning).hide();
                PosCart.instance._showBlockOrderDiscount();

            },
            error: function(jqXHR, exception)
            {
                PosCart.instance._showErrorException(jqXHR, exception);
                $(PosCart.instance.selectors.posAjaxRunning).hide();
            }
        });
    };

    /**
     * Show error
     * @param {jQuery} element
     */
    this.addDiscountErrorClass = function(element, type)
    {
        if (type)
        {
            $(element).find(PosCart.instance.selectors.productDiscount).addClass(PosCart.instance.selectors.classError);
            $(element).find(PosCart.instance.selectors.discountType).addClass(PosCart.instance.selectors.classError);
            $(element).find(PosCart.instance.selectors.productDiscount).select();
        }
        else
        {
            $(element).find(PosCart.instance.selectors.orderDiscountValue).addClass(PosCart.instance.selectors.classError);
            $(element).find(PosCart.instance.selectors.orderDiscountType).addClass(PosCart.instance.selectors.classError);
            $(element).find(PosCart.instance.selectors.orderDiscountValue).select();
        }
    };
    
     /**
     * Show error
     * @param {jQuery} element
     */
    this.addProductPriceErrorClass = function (element){
        $(element).addClass(PosCart.instance.selectors.classError);        
    };

    /**
     * 
     * @param {int} idProduct
     * @param {int} idProductAttribute
     * @param {int} idShop
     * @param {boolean} type
     */
    this.removeDiscountErrorClass = function(element, type)
    {              
        if (type)
        {
            $(element).find(PosCart.instance.selectors.productDiscount).removeClass(PosCart.instance.selectors.classError);
            $(element).find(PosCart.instance.selectors.discountType).removeClass(PosCart.instance.selectors.classError);
        }
        else
        {
            $(element).find(PosCart.instance.selectors.orderDiscountValue).removeClass(PosCart.instance.selectors.classError);
            $(element).find(PosCart.instance.selectors.orderDiscountType).removeClass(PosCart.instance.selectors.classError);
        }
    };
    
    /**
     * Remove error
     * @param {jQuery} element
     */
    this.removeProductPriceErrorClass = function (element) {
        $(element).removeClass(PosCart.instance.selectors.classError);
    };

    /**
     * enable button order discount
     * @param {jQuery} element
     */
    this._enableButtonOrderDiscount = function(element)
    {
        $(element).find(PosCart.instance.selectors.buttonAppyOrderDiscount).attr('disabled', false);
    };

    /**
     * disable button order discount
     * @param {jQuery} element
     */
    this._disableButtonOrderDiscount = function(element)
    {
        $(element).find(PosCart.instance.selectors.buttonAppyOrderDiscount).attr('disabled', true);
    };

    /**
     * Remove error add discount voucher for order
     * @param {jQuery} element Order discount block
     */
    this._removeOrderDiscountError = function(element)
    {
        $(element).find(PosCart.instance.selectors.orderDiscountError).html('');
    };

    /**
     * Reset discount value
     * @param {jQuery} element: element Order discount block
     */
    this._resetOrderDiscountValue = function(element)
    {
        $(element).find(PosCart.instance.selectors.orderDiscountValue).val('');
    };

    /**
     * Show error add discount voucher for order
     * @param {jQuery} element: element Order discount error block
     * @param {string} message
     */
    this._showDiscountOrderError = function(element, message)
    {
        $(element).find(PosCart.instance.selectors.orderDiscountError).html(message);
    };
    /**
     * Check show block shipping or not
     * @returns {Boolean}
     */
    this._isValidShipping = function()
    {
        return (this._idCustomer !== 0 && this._nbProducts > 0);
    };

    /**
     * Show or hiden block shipping
     */
    this._displayBlockShipping = function()
    {
        if (this._isValidShipping())
            $(PosCart.instance.selectors.blockShipping).show();
        else
            $(PosCart.instance.selectors.blockShipping).hide();

    };


    /**
     * Request update carrier
     * @param {string} idCarrier
     * @param {int} idAddress
     */
    this._updateExtraCarrier = function(idCarrier, idAddress)
    {
        if (typeof idCarrier === 'undefined' || typeof idAddress === 'undefined')
            return;

        $.ajax({
            type: 'POST',
            url: this.ajaxUrl,
            data: {
                action: this.actions.updateExtraCarrier,
                id_carrier: idCarrier,
                id_address: idAddress
            },
            dataType: 'json',
            beforeSend: function()
            {
                $(PosCart.instance.selectors.posAjaxRunning).show();
            },
            success: function(jsonData)
            {
                if (jsonData.success) {
                    PosCart.instance._updateBlocks(jsonData.data);
                } else {
                    alert(jsonData.message);
                }
                $(PosCart.instance.selectors.posAjaxRunning).hide();
            },
            error: function(jqXHR, exception)
            {
                PosCart.instance._showErrorException(jqXHR, exception);
                $(PosCart.instance.selectors.posAjaxRunning).hide();
            }
        });

    };

    /**
     * Request update address
     * @param {int} idAddressDelivery
     * @param {int} idAddressInvoice
     * @param {int} idCarrier
     */
    this.updateAddresses = function(idAddressDelivery, idAddressInvoice, idCarrier)
    {
        if (typeof idAddressDelivery === 'undefined' || typeof idAddressInvoice === 'undefined')
            return;

        $.ajax({
            type: 'POST',
            url: this.ajaxUrl,
            data: {
                action: this.actions.updateAddresses,
                id_address_delivery: idAddressDelivery,
                id_address_invoice: idAddressInvoice,
                id_carrier: idCarrier
            },
            dataType: 'json',
            beforeSend: function()
            {
                $(PosCart.instance.selectors.posAjaxRunning).show();
            },
            success: function(jsonData)
            {
                if (jsonData.success) {
                    PosCart.instance._updateBlocks(jsonData.data);
                } else {
                    alert(jsonData.message);
                }
                $(PosCart.instance.selectors.posAjaxRunning).hide();
            },
            error: function(jqXHR, exception)
            {
                PosCart.instance._showErrorException(jqXHR, exception);
                $(PosCart.instance.selectors.posAjaxRunning).hide();
            }
        });

    };

    /**
     * Request update summary
     */
    this.updateSummary = function()
    {
        $.ajax({
            type: 'POST',
            url: this.ajaxUrl,
            data: {
                action: this.actions.updateSummary
            },
            dataType: 'json',
            success: function(jsonData)
            {
                if (jsonData.success) {
                    PosCart.instance._updateBlocks(jsonData.data);
                    PosCart.instance._displayBlockShipping();
                    PosAddresses.instance.setAddresses(jsonData.data.addresses);
                    PosAddresses.instance.setIdAddressDelivery(jsonData.data.idAddressDelivery);
                    PosAddresses.instance.setIdAddressInvoice(jsonData.data.idAddressInvoice);
                    PosAddresses.instance.onLoad();
                } else {
                    var jqXHR = {};
                    jqXHR.responseText = jsonData.message;
                    PosCart.instance._showErrorException(jqXHR,'');
                }
            },
            error: function(jqXHR, exception)
            {
                PosCart.instance._showErrorException(jqXHR, exception);
            }
        });

    };
    this.updateCustomerHooks = function(hooks)
    {
        if (typeof hooks.displayPosCustomerTop !== 'undefined' && hooks.displayPosCustomerTop)
            $(PosCart.instance.selectors.displayPosCustomerTop).html(hooks.displayPosCustomerTop);
        if (typeof hooks.displayPosCustomerBottom !== 'undefined' && hooks.displayPosCustomerBottom)
            $(PosCart.instance.selectors.displayPosCustomerBottom).html(hooks.displayPosCustomerBottom);

    };


    this.resetCustomerHooks = function()
    {
        $(PosCart.instance.selectors.displayPosCustomerTop).empty();
        $(PosCart.instance.selectors.displayPosCustomerBottom).empty();
    };

    /**
     * Add formater for amount
     * @param {float} amount
     * @param {string} secondFormatCurrency
     * @returns {string}
     */
    this.numberWithCommas = function(amount, secondFormatCurrency)
    {
        var parts = amount.toString().split(secondFormatCurrency);
        parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, PosCart.instance._firstFormatCurrency);
        return parts.join(PosCart.instance._secondFormatCurrency);
    };

    /**
     * Replace all string
     * @param {string} keyword
     * @param {string} stringReplace
     * @param {string} stringNeedToReplace
     * @returns {string}
     */
    this._replaceAllString = function(keyword, stringReplace, stringNeedToReplace)
    {
        while (stringNeedToReplace.indexOf(keyword) > -1)
        {
            stringNeedToReplace = stringNeedToReplace.replace(keyword, stringReplace);
        }
        return stringNeedToReplace;
    };

    /**
     * @param {object} jqXHR
     * @param {string} exception
     */
    this._showErrorException = function(jqXHR, exception)
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
