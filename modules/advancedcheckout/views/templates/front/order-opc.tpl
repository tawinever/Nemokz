{**
* Module is prohibited to sales! Violation of this condition leads to the deprivation of the license!
*
* @category  Front Office Features
* @package   Advanced Checkout Module
* @author    Maxim Bespechalnih <2343319@gmail.com>
* @copyright 2013-2015 Max
* @license   license.txt in the module folder.
*}

{capture name=path}{l s='Your shopping cart' mod='advancedcheckout'}{/capture}
{assign var="back_order_page" value="order-opc.php"}
<script type="text/javascript">
	// <![CDATA[
	{if $refresh['postcode_refresh']} var postcode_refresh = 1; {else} var postcode_refresh = 0; {/if}
	{if $refresh['city_refresh']} var city_refresh = 1; {else} var city_refresh = 0; {/if}
	{if $refresh['country_refresh']} var country_refresh = 1; {else} var country_refresh = 0; {/if}
	{if $refresh['state_refresh']} var state_refresh = 1; {else} var state_refresh = 0; {/if}
	var maps_pickup_on = '{$maps_pickup_on|intval}';
	var ppj = {$pickup_point_json|escape:'quotes':'UTF-8'}
	var carrier_pickup = '{$carrier_pickup|intval}';
	var imgDir = '{$img_dir|escape:'html':'UTF-8'}';
	var cod_id = {if isset($cod_id)}{$cod_id|intval}{else}0{/if};
	var cod_price = {if isset($COD_FEE)}{$COD_FEE|intval}{else}0{/if};
	var orderOpcUrl = '{$link->getPageLink("order-opc", true)|escape:'html':'UTF-8'}';
	var historyUrl = '{$link->getPageLink("history", true)|escape:'html':'UTF-8'}';
	var authenticationUrl = '{$link->getPageLink("authentication", true)|escape:'html':'UTF-8'}';
	var addressUrl = '{$link->getPageLink("address", true, NULL, "back={$back_order_page}")|escape:'html':'UTF-8'}';
	var orderProcess = 'order-opc';
	var lggd = {$logged|intval};
	var currencySign = '{$currencySign|escape:'html':'UTF-8'}';
	var currencyRate = '{$currencyRate|floatval}';
	var currencyFormat = '{$currencyFormat|intval}';
	var currencyBlank = '{$currencyBlank|intval}';
	var taxEnabled = {$use_taxes|escape:'html':'UTF-8'};
	var conditionEnabled = {$conditions|intval};
	var countries = new Array();
	var countriesNeedIDNumber = new Array();
	var countriesNeedZipCode = new Array();
	var vat_management = {$vat_management|intval};
	var displayPrice = {$priceDisplay|intval};
	var priceDisplayPrecision = 2;
	var txtWithTax = "{l s='(tax incl.)' mod='advancedcheckout'}";
	var txtWithoutTax = "{l s='(tax excl.)' mod='advancedcheckout'}";
	var txtHasBeenSelected = "{l s='has been selected' mod='advancedcheckout'}";
	var txtNoCarrierIsSelected = "{l s='No carrier has been selected' mod='advancedcheckout'}";
	var txtNoCarrierIsNeeded = "{l s='No carrier is needed for this order' mod='advancedcheckout'}";
	var txtConditionsIsNotNeeded = "{l s='You do not need to accept the Terms of Service for this order.' mod='advancedcheckout'}";
	var txtTOSIsAccepted = "{l s='The service terms have been accepted' mod='advancedcheckout'}";
	var txtTOSIsNotAccepted = "{l s='The service terms have not been accepted' mod='advancedcheckout'}";
	var txtThereis = "{l s='There is' mod='advancedcheckout'}";
	var txtErrors = "{l s='Error(s)' mod='advancedcheckout'}";
	var txtDeliveryAddress = "{l s='Delivery address' mod='advancedcheckout'}";
	var txtInvoiceAddress = "{l s='Invoice address' mod='advancedcheckout'}";
	var txtModifyMyAddress = "{l s='Modify my address' mod='advancedcheckout'}";
	var txtInstantCheckout = "{l s='Instant checkout' mod='advancedcheckout'}";
	var txtSelectAnAddressFirst = "{l s='Please start by selecting an address.' mod='advancedcheckout'}";
	var errorCarrier = "{$errorCarrier|escape:'html':'UTF-8'}";
	var errorTOS = "{$errorTOS|escape:'htmlall':'UTF-8'}";
	var checkedCarrier = "{if isset($checked)}{$checked|intval}{else}0{/if}";

	var addresses = new Array();
	var isLogged = {$isLogged|intval};
	var isGuest = {$isGuest|intval};
	var isVirtualCart = {$isVirtualCart|intval};
	var isPaymentStep = {$isPaymentStep|intval};
	var prnum = "{$productNumber|intval}";
	//]]>
</script>
	{if $productNumber}
		<!-- Shopping Cart -->
		<!-- End Shopping Cart -->
		<div id="empcart" style="display:none;">
			<h2>{l s='Your shopping cart' mod='advancedcheckout'}</h2>
			<div class="carterr opc-alert opc-alert-danger clearfix">
				<i class="fa fa-times-circle opc-sign"></i>
				<button class="opc-close">x</button>
				{l s='Your shopping cart is empty.' mod='advancedcheckout'}
			</div>
		</div>
		{include file="./order.tpl"}
	{else}
		{capture name=path}{l s='Your shopping cart' mod='advancedcheckout'}{/capture}
		<h2 class="page-heading">{l s='Your shopping cart' mod='advancedcheckout'}</h2>
		{include file="$tpl_dir./errors.tpl"}
		<div class="carterr opc-alert opc-alert-danger clearfix">
			<i class="fa fa-times-circle opc-sign"></i>
			<button class="opc-close">x</button>
			{l s='Your shopping cart is empty.' mod='advancedcheckout'}
		</div>
	{/if}