/**
 * RockPOS - Point of Sale for PrestaShop
 *
 * @author    Hamsa Technologies
 * @copyright Hamsa Technologies
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

/**
 * Handle addressses
 * @returns {PosAddresses}
 */
var PosAddresses = function () {

    /**
     * Contain object addresses
     */
    this.addresses = {};

    /**
     * Contain id address delivery
     */
    this.idAddressesDelivery = null;

    /**
     * Contain id address invoice
     */
    this.idAddressesInvoice = null;

    /**
     * Contain link add new address
     */
    this.linkAddAddress = null;

    /**
     * Declare all selectors
     */
    this.selectors = {
        addressDeliveryDetail: '#address_delivery_detail', // define id content address delivery
        editInvoiceAddress: '#edit_invoice_address', // define id edit link address delivery

        addressInvoiceDetail: '#address_invoice_detail', // define id content address invoice
        editDeliveryAddress: '#edit_delivery_address', // define id edit link address delivery

        addressInvoiceOption: '#address_invoice_option', // define id select option address invoice
        addressDeliveryOption: '#address_delivery_option', // define id select option address delivery

        deliveryOption: '#delivery_option', // define id select option delivery
        addNewAddress: '#add_new_address', // define id link add new address

        addressDelivery: '#address_delivery', // define id block address delivery
        addressInvoice: '#address_invoice' // define id block address invoice
    };

    PosAddresses.instance = this;

    /**
     * Set object addressess to PosAddress
     * @param {int} addresses
     */
    this.setAddresses = function (addresses)
    {
        if (typeof addresses !== 'undefined' && typeof addresses === 'object')
            this.addresses = addresses;
    };

    /**
     * Set id address delivery to PosAddress
     * @param {int} idAddressesDelivery
     */
    this.setIdAddressDelivery = function (idAddressesDelivery)
    {
        if (typeof idAddressesDelivery !== 'undefined' && parseInt(idAddressesDelivery) > 0)
            this.idAddressesDelivery = idAddressesDelivery;
    };

    /**
     * Set id address invoice to PosAddress
     * @param {int} idAddressesInvoice
     */
    this.setIdAddressInvoice = function (idAddressesInvoice)
    {
        if (typeof idAddressesInvoice !== 'undefined' && parseInt(idAddressesInvoice) > 0)
            this.idAddressesInvoice = idAddressesInvoice;
    };

    /**
     * Set id address invoice to PosAddress
     * @param {string} linkAddAddress
     */
    this.setLinkAddAddress = function (linkAddAddress)
    {
        if (typeof linkAddAddress !== 'undefined')
            this.linkAddAddress = linkAddAddress;
    };

    /**
     * Event onload
     */
    this.onLoad = function ()
    {
        var addressesDeliveryOptions = '';
        var addressesInvoiceOptions = '';
        if ($.isEmptyObject(PosAddresses.instance.addresses))
        {
            $(PosAddresses.instance.selectors.addressInvoice).hide();
            $(PosAddresses.instance.selectors.addressDelivery).hide();
        }
        else
        {
            $.each(PosAddresses.instance.addresses, function () {
                if (parseInt(this.id_address) === parseInt(PosAddresses.instance.idAddressesInvoice))
                {
                    PosAddresses.instance.updateListAddress(this.formated_address, this.edit_link, 'invoice');
                    $(PosAddresses.instance.selectors.addressInvoice).show();
                }


                if (parseInt(this.id_address) === parseInt(PosAddresses.instance.idAddressesDelivery))
                {
                    PosAddresses.instance.updateListAddress(this.formated_address, this.edit_link, 'delivery');
                    $(PosAddresses.instance.selectors.addressDelivery).show();

                }

                addressesDeliveryOptions += '<option value="' + this.id_address + '" ' + (parseInt(this.id_address) === parseInt(PosAddresses.instance.idAddressesDelivery) ? 'selected="selected"' : '') + '>' + this.alias + '</option>';
                addressesInvoiceOptions += '<option value="' + this.id_address + '" ' + (parseInt(this.id_address) === parseInt(PosAddresses.instance.idAddressesInvoice) ? 'selected="selected"' : '') + '>' + this.alias + '</option>';
            });

            this.updateSelecteOption(addressesInvoiceOptions, 'invoice');
            this.updateSelecteOption(addressesDeliveryOptions, 'delivery');
            this.updateLinkAddAddress();
        }

        // Event change address delivery
        $(document).on('change', this.selectors.addressInvoiceOption, function ()
        {
            var idAddressInvoice = $(this).val();
            var idAddressDelivery = $(PosAddresses.instance.selectors.addressDeliveryOption).val();
            var idCarrier = $(PosAddresses.instance.selectors.deliveryOption + ' option:selected').val();
            $.each(PosAddresses.instance.addresses, function () {

                if (parseInt(this.id_address) === parseInt(idAddressInvoice))
                    PosAddresses.instance.updateListAddress(this.formated_address, this.edit_link, 'invoice');
            });

            PosCart.instance.updateAddresses(idAddressDelivery, idAddressInvoice, idCarrier);

        });

        // Event change address invoice
        $(document).on('change', this.selectors.addressDeliveryOption, function ()
        {
            var idAddressDelivery = $(this).val();
            var idAddressInvoice = $(PosAddresses.instance.selectors.addressInvoiceOption).val();
            var idCarrier = $(PosAddresses.instance.selectors.deliveryOption + ' option:selected').val();
            $.each(PosAddresses.instance.addresses, function () {

                if (parseInt(this.id_address) === parseInt(idAddressDelivery))
                    PosAddresses.instance.updateListAddress(this.formated_address, this.edit_link, 'delivery');

            });

            PosCart.instance.updateAddresses(idAddressDelivery, idAddressInvoice, idCarrier);

        });

    };

    /**
     *  Update content Address
     * @param {string} formatedAddress
     * @param {string} editLink
     * @param {string} type
     */
    this.updateListAddress = function (formatedAddress, editLink, type)
    {
        if (type === 'invoice')
        {
            $(PosAddresses.instance.selectors.addressInvoiceDetail).html(formatedAddress);
            $(PosAddresses.instance.selectors.editInvoiceAddress).attr('href', editLink);
        }
        else
        {
            $(PosAddresses.instance.selectors.addressDeliveryDetail).html(formatedAddress);
            $(PosAddresses.instance.selectors.editDeliveryAddress).attr('href', editLink);
        }
    };

    /**
     *  Update link add new address
     */
    this.updateLinkAddAddress = function ()
    {
        if (this.linkAddAddress !== '')
            $(this.selectors.addNewAddress).attr('href', this.linkAddAddress);
    };

    /**
     * Update content select option address
     * @param {string} addressesOption
     * @param {string} type
     */
    this.updateSelecteOption = function (addressesOption, type)
    {
        if (type === 'invoice')
            $(PosAddresses.instance.selectors.addressInvoiceOption).html(addressesOption);
        else
            $(PosAddresses.instance.selectors.addressDeliveryOption).html(addressesOption);
    };

};

$(document).ready(function ()
{
    var posAddresses = new PosAddresses();
    posAddresses.setAddresses(addresses);
    posAddresses.setIdAddressDelivery(idAddressDelivery);
    posAddresses.setIdAddressInvoice(idAddressInvoice);
    posAddresses.setLinkAddAddress(linkAddAddress);
    posAddresses.onLoad();

});

// function call back when update address successfully
function getSummary()
{
    PosCart.instance.updateSummary();
}

