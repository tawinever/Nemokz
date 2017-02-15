/**
 * RockPOS - Point of Sale for PrestaShop
 *
 * @author    Hamsa Technologies
 * @copyright Hamsa Technologies
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

$(document).ready(function () {
    var posPayment = new PosPayment();
    posPayment.setCollectingPayment(isCollectingPayment);
    posPayment.handleEvent();
    var posPrint = new PosPrint();
    posPrint.handleEvent();
    new PosPreferencesCustomer(
            {
                searchCustomer: '#customer_autocomplete_input', // input autocomplete customer search
                blockDefaultCustomer: '#pos_default_customer', // div contain default customer
                deleteDefaultCustomer: '.delete_default_customer' // button delete default customer
            },
    {
        ajaxUrls: stPos.url,
        error: stPos.lang.error
    }
    ).handleEvent();
    
    new PosPreferencesReceipt().handleEvents();
    displayConfigurationTab(currentFormTab);
    $(document).on('click', 'input[name="multishopOverrideOption[order_states]"]', function ()
    {
        $('.default_receipt').attr('disabled', 'disabled');
    });
    
});

/**
 * 
 * @param {string} currentTab current active tab
 */
function displayConfigurationTab(currentTab)
{        
	$('.configuration-tab').hide();
	$('.tab-row.active').removeClass('active');
	$('.configuration_fieldset_' + currentTab).show();        
	$('#configuration_link_' + currentTab).parent().addClass('active');
	$('#currentFormTab').val(currentTab);
        $('#currentFormTab').remove();
        $("<input id='currentFormTab' name='currentFormTab' type='hidden' value='"+currentTab+"' />").appendTo('#configuration_form');
}