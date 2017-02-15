/**
 * RockPOS - Point of Sale for PrestaShop
 *
 * @author    Hamsa Technologies
 * @copyright Hamsa Technologies
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

/**
 * Pos payment
 * @param {json} selectors
 * @returns {PosPayment}
 */
var PosPayment = function (selectors)
{
    /**
     * Define all selectors default
     */
    this._selectors = {
        blockDefaultPayment: '#conf_id_POS_DEFAULT_PAYMENT_ID', // define block payment
        inputCollectingPayment: 'input[name="POS_COLLECTING_PAYMENT"]', // define class input collecting payment
        showNameProduct: 'input[name="POS_SHOW_NAME"]' // define class input Product visibility for sale search only
    };

    $.extend(this._selectors, selectors);

    /**
     * Status of collecting payment
     */
    this._collectingPayment = 0;

    PosPayment.instance = this;

    /**
     * Define all events
     */
    this.handleEvent = function ()
    {
        // event click button collecting payment
        $(document).on('click', PosPayment.instance._selectors.inputCollectingPayment, function () {
            var isHiden = parseInt($(this).val());
            PosPayment.instance._displayDefaultPayment(isHiden);

        });

        $(document).on('click', PosPayment.instance._selectors.showNameProduct, function (event) {
            event.preventDefault();
        });

        this._displayDefaultPayment(PosPayment.instance.getCollectingPayment());
    };

    /**
     * Set status collecting payment
     * @param {Int} collectingPayment of payment
     */
    this.setCollectingPayment = function (collectingPayment)
    {
        this._collectingPayment = parseInt(collectingPayment);
    };

    /**
     * Get status collecting payment
     * @returns {float}
     */
    this.getCollectingPayment = function ()
    {
        return this._collectingPayment;
    };

    /**
     * Display or hiden block payment
     * @param {int} isHiden
     */
    this._displayDefaultPayment = function (isHiden)
    {
        var blockDefaultPayment = $(this._selectors.blockDefaultPayment);
        if (blockDefaultPayment.parent().hasClass('form-group'))
            blockDefaultPayment = blockDefaultPayment.parent();
        if (isHiden)
            blockDefaultPayment.hide();
        else
            blockDefaultPayment.show();
    };


};