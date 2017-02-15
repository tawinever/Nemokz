{**
* Module is prohibited to sales! Violation of this condition leads to the deprivation of the license!
*
* @category  Front Office Features
* @package   Advanced Checkout Module
* @author    Maxim Bespechalnih <2343319@gmail.com>
* @copyright 2013-2015 Max
* @license   license.txt in the module folder.
*}

{if $voucherAllowed}
<div id="cart_voucher" class="cart_voucher fl">
	<div class="v_errors opc-alert opc-alert-danger" style="display:none;">
		<button class="opc-close">x</button>
	</div>
	<fieldset>
		<p class="title_block"><label for="discount_name">{l s='Vouchers' mod='advancedcheckout'}</label></p>
		<div class="opc-form-group">
			<input type="text" class="opc-discount_name opc-form-control opc-input-sm" id="discount_name" name="discount_name" value="{if isset($discount_name) && $discount_name}{$discount_name|escape:'html':'UTF-8'}{/if}" />
	</div>
	
	<input type="hidden" name="submitDiscount" />
	<button id="advopc-voucher-btn" type="button" name="submitAddDiscount" class="opc-button opc-btn opc-btn-custom"><span>{l s='OK' mod='advancedcheckout'}</span></button>
	</fieldset>
	{if $displayVouchers}
		<p id="title" class="title-offers">{l s='Take advantage of our exclusive offers:' mod='advancedcheckout'}</p>
		<div id="display_cart_vouchers">
			{foreach $displayVouchers as $voucher}
				{if $voucher.code != ''}<span class="voucher_name" data-code="{$voucher.code|escape:'html':'UTF-8'}">{$voucher.code|escape:'html':'UTF-8'}</span> - {/if}{$voucher.name|escape:'html':'UTF-8'}<br />
			{/foreach}
		</div>
	{/if}
	{if isset($errors_discount) && $errors_discount}
		<ul class="error">
		{foreach $errors_discount as $k=>$error}
			<li>{$error|escape:'htmlall':'UTF-8'}</li>
		{/foreach}
		</ul>
	{/if}
</div>
{/if}