/**
 * RockPOS - Point of Sale for PrestaShop
 *
 * @author    Hamsa Technologies
 * @copyright Hamsa Technologies
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */


/**
 * poscart form controller
 * @param {selectors} selectors
 * @returns {PosCusomer}
 */
var PosPreferencesCustomer = function (selectors, params)
{
    /**
     * Target AjaxUrl is all ajax url request
     */
    this._params = {
        ajaxUrls: null,
        error: 'error'
    };
    /**
     * Declare all values selecter
     */
    this._selectors = {
        customerSearch: '#customer_autocomplete_input', // input autocomplete customer search
        blockDefaultCustomer: '#pos_default_customer', // div contain default customer
        guestCheckout: 'input[name="POS_GUEST_CHECKOUT"]', // input get checkout
        blockSearchDefaultCustomer: '#conf_id_default_customer', // Block search default customer
        deleteDefaultCustomer: '.delete_default_customer' // button delete default customer

    };

    $.extend(this._selectors, selectors);
    $.extend(this._params, params);

    /**
     * assign PosPreferencesCustomer to object
     */
    PosPreferencesCustomer.instance = this;

    /**
     * constructor all event
     */
    this.handleEvent = function ()
    {
        isGuest = parseInt($(PosPreferencesCustomer.instance._selectors.guestCheckout + ':checked').val());
        if (isGuest === 0)
            $(PosPreferencesCustomer.instance._selectors.blockSearchDefaultCustomer).addClass('hide');
        $(document).on('click', PosPreferencesCustomer.instance._selectors.deleteDefaultCustomer, PosPreferencesCustomer.instance._deleteDefaultCustomer);
        $(document).on('click', PosPreferencesCustomer.instance._selectors.guestCheckout, PosPreferencesCustomer.instance._toggleDefaultCustomer);
        PosPreferencesCustomer.instance._autoCompleteCustomerSearch(PosPreferencesCustomer.instance._selectors.searchCustomer);
    };

    /**
     * Customer search
     */
    this._autoCompleteCustomerSearch = function ()
    {
        $(PosPreferencesCustomer.instance._selectors.customerSearch).autocomplete({
            minLength: 1,
            source: function (request, response) {
                $.ajax({
                    url: PosPreferencesCustomer.instance._params.ajaxUrls.customerSearch,
                    data: {keyword: request.term},
                    dataType: "json",
                    success: function (jsonData)
                    {
                        if (jsonData.success)
                        {
                            response($.map(jsonData.data, function (item)
                            {
                                return {
                                    label: item.firstname + " - " + item.lastname,
                                    value: item.id_customer
                                };
                            }));
                        } else {
                            alert(jsonData.message);
                        }
                    },
                    error: function (jqXHR, exception)
                    {
                        PosPreferencesCustomer._showErrorException(jqXHR, exception);
                    }

                });
            },
            select: function (event, ui)
            {
                if (typeof (ui) !== undefined)
                {
                    $(PosPreferencesCustomer.instance._selectors.customerSearch).val('');
                    if (parseInt(ui.item.value) > 0)
                        PosPreferencesCustomer.instance._updateDefaultCustomer(parseInt(ui.item.value));// add customer
                }
                return false;
            }
        });
    };

    /**
     * Add default dummy customer
     * @param {int} id_customer
     */
    this._updateDefaultCustomer = function (id_customer)
    {
        $.ajax({
            url: PosPreferencesCustomer.instance._params.ajaxUrls.updateDefaultCustomer,
            data: {id_customer: id_customer},
            dataType: "json",
            success: function (jsonData)
            {
                if (jsonData.success)
                    $(PosPreferencesCustomer.instance._selectors.blockDefaultCustomer).html(jsonData.data);
                else
                    alert(jsonData.message);
            },
            error: function (jqXHR, exception)
            {
                PosPreferencesCustomer._showErrorException(jqXHR, exception);
            }
        });
    };

    this._deleteDefaultCustomer = function (element)
    {
        id_customer = $(element.target).data('id-customer');
        if (!id_customer)
            return;
        $.ajax({
            url: PosPreferencesCustomer.instance._params.ajaxUrls.deleteDefaultCustomer,
            data: {id_customer: id_customer},
            dataType: "json",
            success: function (jsonData)
            {
                if (jsonData.success)
                    $(element.target).parent().remove();
                else
                    alert(jsonData.message);
            },
            error: function (jqXHR, exception)
            {
                PosPreferencesCustomer._showErrorException(jqXHR, exception);
            }
        });
    };

    this._toggleDefaultCustomer = function (element)
    {
        $(PosPreferencesCustomer.instance._selectors.blockSearchDefaultCustomer).toggleClass('hide');
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