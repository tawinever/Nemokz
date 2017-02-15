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
var PosCusomer = function (selectors)
{
    /**
     * Target AjaxUrl is all ajax url request
     */
    this.ajaxUrl = null;

    /**
     * Declare all actions
     */
    this.actions = {
        addCustomer: 'addCustomer'
    };

    /**
     * Declare all values
     */
    this.selectors = {
        displayBlockAddress: '.display_block_address', // define class a click show block address
        blockAddress: '.block_address', // define class block address
        formAddCustomer: '#formAddCustomer', // define id form add new customer
        buttonSubmitAddCustomer: '#submitAddCustomer', // define id button submit form
        errors: '#file-errors', // define id block error
        ajaxRunning: '.ajax_running_image' // define class ajax runing
    };

    $.extend(this.selectors, selectors);

    /**
     * assign PosCusomer to object
     */
    PosCusomer.instance = this;

    /**
     * constructor all event
     */
    this.init = function ()
    {
        // add more information of customer
        $(document).on('click', this.selectors.displayBlockAddress, function () {

            var next_element = $(this).next();
            if ($(next_element).is(':hidden'))
            {
                $(next_element).show();
                $(this).text(showLess);
            }
            else
            {
                $(next_element).hide();
                $(this).text(showMore);
            }


        });

        // add more information of customer
        $(document).on('click', this.selectors.buttonSubmitAddCustomer, function () {
            $(PosCusomer.instance.selectors.errors).css('display','none');
            PosCusomer.instance.addCustomer();
        });

        // envent enter keyboard auto add customer
        $(this.selectors.formAddCustomer).keydown(function (e) {
            var key = e.which;
            if (key === 13) {
                PosCusomer.instance.addCustomer();
            }
        });
    };

    /**
     * Set ajax url
     * @param {string} ajaxUrl
     */
    this.setAjaxUrl = function (ajaxUrl)
    {
        if (typeof ajaxUrl !== 'undefined')
            this.ajaxUrl = ajaxUrl;
    };

    /**
     * Get data in form and request add new customer
     */
    this.addCustomer = function ()
    {
        var params = 'action=' + this.actions.addCustomer + '&';
        $(this.selectors.formAddCustomer + ' input:visible').each(function () {
            if ($(this).is('input[type=checkbox]'))
            {
                if ($(this).is(':checked'))
                    params += encodeURIComponent($(this).attr('name')) + '=1&';
            }
            else if ($(this).is('input[type=radio]'))
            {
                if ($(this).is(':checked'))
                    params += encodeURIComponent($(this).attr('name')) + '=' + encodeURIComponent($(this).val()) + '&';
            }
            else
                params += encodeURIComponent($(this).attr('name')) + '=' + encodeURIComponent($(this).val()) + '&';

        });

        $(this.selectors.formAddCustomer + ' select:visible').each(function () {
            params += encodeURIComponent($(this).attr('name')) + '=' + encodeURIComponent($(this).val()) + '&';
        });

        params = params.substr(0, params.length - 1);

        $.ajax({
            type: 'POST',
            url: this.ajaxUrl,
            dataType: "json",
            data: params,
            beforeSend: function ()
            {
                $(PosCusomer.instance.selectors.ajaxRunning).show();
            },
            success: function (jsonData)
            {
                if (jsonData.success)
                    window.parent.PosCart.instance.assignCustomer(jsonData.data.idCustomer);
                else
                    PosCusomer.instance._showError(jsonData.message, PosCusomer.instance.selectors.errors);

                $(PosCusomer.instance.selectors.ajaxRunning).hide();
            },
            error: function (jqXHR, exception)
            {
                window.parent.PosCart.instance._showErrorException(jqXHR, exception);
            }
        });

    };

    /**
     * Show error
     * @param {array} errors
     * @param {jQuery} targetDom
     */
    this._showError = function (errors, targetDom)
    {
        var tmp = '';
        var i = 0;
        for (var error in errors)
        {
            //IE6 bug fix
            if (error !== 'indexOf')
            {
                i = i + 1;
                tmp += '<li>' + errors[error] + '</li>';
            }
        }
        tmp += '</ol>';
        if (errors.length === 1)
            var error = '<b>' + i + ' ' + msgError + ': </b><ol>' + tmp;
        else
            var error = '<b>' + i + ' ' + msgErrors + ': </b><ol>' + tmp;

        $(targetDom).slideUp('fast', function () {
            $(this).html(error).slideDown('slow', function () {
                $.scrollTo(targetDom, 800);
            });
        });

    };
};