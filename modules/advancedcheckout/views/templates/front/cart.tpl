{**
* Module is prohibited to sales! Violation of this condition leads to the deprivation of the license!
*
* @category  Front Office Features
* @package   Advanced Checkout Module
* @author    Maxim Bespechalnih <2343319@gmail.com>
* @copyright 2013-2015 Max
* @license   license.txt in the module folder.
*}

<script type="text/javascript">
	// <![CDATA[
	var currencySign = "{$currencySign|escape:'html':'UTF-8'}";
	var currencyRate = '{$currencyRate|floatval}';
	var currencyFormat = '{$currencyFormat|intval}';
	var currencyBlank = '{$currencyBlank|intval}';
	var txtProduct = "{l s='product' mod='advancedcheckout'}";
	var txtProducts = "{l s='products' mod='advancedcheckout'}";
	var deliveryAddress = "{$cart->id_address_delivery|intval}";
	// ]]>
</script>
<script>
	$(document).ready(function(){
		$('.cart_quantity_input').typeWatch({
			highlight: true, wait: 800, captureLength: 0, callback: function(val){
				updateQty(val, true, this);
			}
		});
	});
</script>
{assign var='col_span_subtotal' value=2}
<div id="cart_errors"></div>
<input type="hidden" class="err_isset" name="err_isset" value="{$err_isset|intval}">
{assign var='total_discounts_num' value="{if $total_discounts != 0}1{else}0{/if}"}
{assign var='use_show_taxes' value="{if $use_taxes && $show_taxes}2{else}0{/if}"}
{assign var='total_wrapping_taxes_num' value="{if $total_wrapping != 0}1{else}0{/if}"}
{* eu-legal *}
{hook h="displayBeforeShoppingCartBlock"}
<div id="order-detail-content" class="table_block table-responsive">
	<table id="opc-cart_summary" class="opc-table opc-table-bordered w100 {if $PS_STOCK_MANAGEMENT}stock-management-on{else}stock-management-off{/if}">
		<thead>
			<tr>
				<th class="cart_product">{l s='Product' mod='advancedcheckout'}</th>
				<th class="cart_description">{l s='Description' mod='advancedcheckout'}</th>
				<th class="cart_unit">{l s='Unit price' mod='advancedcheckout'}</th>
				<th class="cart_quantity" style="width: 85px;">{l s='Qty' mod='advancedcheckout'}</th>
				<th class="cart_total">{l s='Total' mod='advancedcheckout'}</th>
				<th class="cart_delete">&nbsp;</th>
			</tr>
		</thead>
		<tfoot>
			{if $use_taxes}
				{if $priceDisplay}
					<tr class="cart_total_price">
						<td rowspan="{5+$total_discounts_num+$use_show_taxes+$total_wrapping_taxes_num|intval}" colspan="2" id="cart_voucher" class="cart_voucher">
							{include file="./voucher.tpl"}
						</td>
						<td colspan="{$col_span_subtotal|intval}" class="text-right">{if $display_tax_label}{l s='Total products (tax excl.)' mod='advancedcheckout'}{else}{l s='Total products' mod='advancedcheckout'}{/if}</td>
						<td colspan="2" class="price" id="total_product">{displayPrice price=$total_products}</td>
					</tr>
				{else}
					<tr class="cart_total_price">
						<td rowspan="{5+$total_discounts_num+$use_show_taxes+$total_wrapping_taxes_num|intval}" colspan="2" id="cart_voucher" class="cart_voucher">
							{include file="./voucher.tpl"}
						</td>
						<td colspan="{$col_span_subtotal|intval}" class="text-right">{if $display_tax_label}{l s='Total products (tax incl.)' mod='advancedcheckout'}{else}{l s='Total products' mod='advancedcheckout'}{/if}</td>
						<td colspan="2" class="price" id="total_product">{displayPrice price=$total_products_wt}</td>
					</tr>
				{/if}
			{else}
				<tr class="cart_total_price">
					<td rowspan="{5+$total_discounts_num+$use_show_taxes+$total_wrapping_taxes_num|intval}" colspan="2" id="cart_voucher" class="cart_voucher">
							{include file="./voucher.tpl"}
						</td>
					<td colspan="{$col_span_subtotal|intval}" class="text-right">{l s='Total products' mod='advancedcheckout'}</td>
					<td colspan="2" class="price" id="total_product">{displayPrice price=$total_products}</td>
				</tr>
			{/if}
			<tr{if $total_wrapping == 0} style="display: none;"{/if}>
				<td colspan="2" class="text-right">
					{if $use_taxes}
						{if $display_tax_label}{l s='Total gift wrapping (tax incl.):' mod='advancedcheckout'}{else}{l s='Total gift-wrapping cost:' mod='advancedcheckout'}{/if}
					{else}
						{l s='Total gift-wrapping cost:' mod='advancedcheckout'}
					{/if}
				</td>
				<td colspan="2" class="price-discount price" id="total_wrapping">
					{if $use_taxes}
						{if $priceDisplay}
							{displayPrice price=$total_wrapping_tax_exc}
						{else}
							{displayPrice price=$total_wrapping}
						{/if}
					{else}
						{displayPrice price=$total_wrapping_tax_exc}
					{/if}
				</td>
			</tr>
			{if $total_shipping_tax_exc <= 0 && !isset($virtualCart)}
				<tr class="cart_total_delivery" style="{if !isset($carrier->id) || is_null($carrier->id)}display:none;{/if}">
					<td colspan="{$col_span_subtotal|intval}" class="text-right">{l s='Shipping' mod='advancedcheckout'}</td>
					<td colspan="2" class="price" id="total_shipping">{l s='Free Shipping!' mod='advancedcheckout'}</td>
				</tr>
			{else}
				{if $use_taxes && $total_shipping_tax_exc != $total_shipping}
					{if $priceDisplay}
						<tr class="cart_total_delivery" {if $total_shipping_tax_exc <= 0} style="display:none;"{/if}>
							<td colspan="{$col_span_subtotal|intval}" class="text-right">{if $display_tax_label}{l s='Total shipping (tax excl.)' mod='advancedcheckout'}{else}{l s='Total shipping' mod='advancedcheckout'}{/if}</td>
							<td colspan="2" class="price" id="total_shipping">{displayPrice price=$total_shipping_tax_exc}</td>
						</tr>
					{else}
						<tr class="cart_total_delivery"{if $total_shipping <= 0} style="display:none;"{/if}>
							<td colspan="{$col_span_subtotal|intval}" class="text-right">{if $display_tax_label}{l s='Total shipping (tax incl.)' mod='advancedcheckout'}{else}{l s='Total shipping' mod='advancedcheckout'}{/if}</td>
							<td colspan="2" class="price" id="total_shipping" >{displayPrice price=$total_shipping}</td>
						</tr>
					{/if}
				{else}
					<tr class="cart_total_delivery"{if $total_shipping_tax_exc <= 0} style="display:none;"{/if}>
						<td colspan="{$col_span_subtotal|intval}" class="text-right">{l s='Total shipping' mod='advancedcheckout'}</td>
						<td colspan="2" class="price" id="total_shipping" >{displayPrice price=$total_shipping_tax_exc}</td>
					</tr>
				{/if}
			{/if}
			<tr class="cart_total_voucher" {if $total_discounts == 0}style="display:none"{/if}>
				<td colspan="{$col_span_subtotal|intval}" class="text-right">
					{if $display_tax_label}
						{if $use_taxes && $priceDisplay == 0}
							{l s='Total vouchers (tax incl.):' mod='advancedcheckout'}
						{else}
							{l s='Total vouchers (tax excl.)' mod='advancedcheckout'}
						{/if}
					{else}
						{l s='Total vouchers' mod='advancedcheckout'}
					{/if}
				</td>
				<td colspan="2" class="price-discount price" id="total_discount">
					{if $use_taxes && $priceDisplay == 0}
						{assign var='total_discounts_negative' value=$total_discounts * -1}
					{else}
						{assign var='total_discounts_negative' value=$total_discounts_tax_exc * -1}
					{/if}
					{displayPrice price=$total_discounts_negative}
				</td>
			</tr>
			{if $use_taxes && $show_taxes}
				<tr class="cart_total_price">
					<td colspan="{$col_span_subtotal|intval}" class="text-right">{if $display_tax_label}{l s='Total (tax excl.)' mod='advancedcheckout'}{else}{l s='Total' mod='advancedcheckout'}{/if}</td>
					<td colspan="2" class="price" id="total_price_without_tax">{displayPrice price=$total_price_without_tax}</td>
				</tr>
				<tr class="cart_total_tax">
					<td colspan="{$col_span_subtotal|intval}" class="text-right">{l s='Tax' mod='advancedcheckout'}</td>
					<td colspan="2" class="price" id="total_tax">{displayPrice price=$total_tax}</td>
				</tr>
			{/if}
			{if isset($COD_FEE)}
				<tr class="cod_fee cart_total_price" style="display: none">
					<td colspan="{$col_span_subtotal|intval}">{l s='COD Fee:' mod='advancedcheckout'}</td>
					<td colspan="2" class="price" id="price_cod_fee">{displayPrice price=$COD_FEE}</td>
				</tr>
			{/if}
			<tr class="cart_total_price">
				<td colspan="{$col_span_subtotal|intval}" class="total_price_container text-right">
					<span>{l s='Total' mod='advancedcheckout'}</span>
				</td>
				{if $use_taxes}
					<td colspan="2" class="price" id="total_price_container">
						<span id="total_price">{displayPrice price=$total_price}</span>
					</td>
				{else}
					<td colspan="2" class="price" id="total_price_container">
						<span id="total_price">{displayPrice price=$total_price_without_tax}</span>
					</td>
				{/if}
			</tr>
			{if isset($COD_FEE)}
				<tr class="cart_total_price total_price cod_fee" style="display: none">
					<td colspan="{$col_span_subtotal|intval}">{l s='Total + COD Fee:' mod='advancedcheckout'}</td>
						{math assign="total_price_cod" equation='a + b' a=$total_price b=$COD_FEE}
					<td colspan="2" class="price ttpcod" id="total_price">{displayPrice price=$total_price_cod}</td>
				</tr>
			{/if}
		</tfoot>
		<tbody>
			{assign var='odd' value=0}
			{assign var='have_non_virtual_products' value=false}
			{foreach $products as $product}
				{if $product.is_virtual == 0}
					{assign var='have_non_virtual_products' value=true}
				{/if}
				{assign var='productId' value=$product.id_product}
				{assign var='productAttributeId' value=$product.id_product_attribute}
				{assign var='quantityDisplayed' value=0}
				{assign var='odd' value=($odd+1)%2}
				{assign var='ignoreProductLast' value=isset($customizedDatas.$productId.$productAttributeId) || count($gift_products)}
				{* Display the product line *}
				{include file="./shopping-cart-product-line.tpl" productLast=$product@last productFirst=$product@first}
				{* Then the customized datas ones*}
				{if isset($customizedDatas.$productId.$productAttributeId)}
					{foreach $customizedDatas.$productId.$productAttributeId[$product.id_address_delivery] as $id_customization=>$customization}
						<tr
							id="product_{$product.id_product|intval}_{$product.id_product_attribute|intval}_{$id_customization|intval}_{$product.id_address_delivery|intval}"
							class="product_customization_for_{$product.id_product|intval}_{$product.id_product_attribute|intval}_{$product.id_address_delivery|intval}{if $odd} odd{else} even{/if} customization alternate_item {if $product@last && $customization@last && !count($gift_products)}last_item{/if}">
							<td></td>
							<td colspan="3">
								{foreach $customization.datas as $type => $custom_data}
									{if $type == $CUSTOMIZE_FILE}
										<div class="customizationUploaded">
											<ul class="customizationUploaded">
												{foreach $custom_data as $picture}
													<li><img src="{$pic_dir|escape:'html':'UTF-8'}{$picture.value|escape:'html':'UTF-8'}_small" alt="" class="customizationUploaded" /></li>
												{/foreach}
											</ul>
										</div>
									{elseif $type == $CUSTOMIZE_TEXTFIELD}
										<ul class="typedText">
											{foreach $custom_data as $textField}
												<li>
													{if $textField.name}
														{$textField.name|escape:'html':'UTF-8'}
													{else}
														{l s='Text #' mod='advancedcheckout'}{$textField@index+1|escape:'html':'UTF-8'}
													{/if}
													: {$textField.value|escape:'html':'UTF-8'}
												</li>
											{/foreach}
										</ul>
									{/if}
								{/foreach}
							</td>
							<td class="cart_quantity" colspan="2">
								{if isset($cannotModify) AND $cannotModify == 1}
									<span>{if $quantityDisplayed == 0 AND isset($customizedDatas.$productId.$productAttributeId)}{$customizedDatas.$productId.$productAttributeId|count}{else}{$product.cart_quantity-$quantityDisplayed|intval}{/if}</span>
								{else}
									<input type="hidden" value="{$customization.quantity|intval}" name="quantity_{$product.id_product|intval}_{$product.id_product_attribute|intval}_{$id_customization|intval}_{$product.id_address_delivery|intval}_hidden"/>
									<input type="text" value="{$customization.quantity|intval}" class="cart_quantity_input form-control grey" name="quantity_{$product.id_product|intval}_{$product.id_product_attribute|intval}_{$id_customization|intval}_{$product.id_address_delivery|intval}"/>
									<div class="cart_quantity_button clearfix">
										{if $product.minimal_quantity < ($customization.quantity -$quantityDisplayed) OR $product.minimal_quantity <= 1}
											<a
												id="cart_quantity_down_{$product.id_product|intval}_{$product.id_product_attribute|intval}_{$id_customization|intval}_{$product.id_address_delivery|intval}"
												class="cart_quantity_down btn btn-default button-minus"
												href="{$link->getPageLink('cart', true, NULL, "add=1&amp;id_product={$product.id_product|intval}&amp;ipa={$product.id_product_attribute|intval}&amp;id_address_delivery={$product.id_address_delivery}&amp;id_customization={$id_customization}&amp;op=down&amp;token={$token_cart}")|escape:'html':'UTF-8'}"
												rel="nofollow"
												title="{l s='Subtract' mod='advancedcheckout'}">
												<span><i class="icon-minus"></i></span>
											</a>
										{else}
											<a
												id="cart_quantity_down_{$product.id_product|intval}_{$product.id_product_attribute|intval}_{$id_customization|intval}"
												class="cart_quantity_down btn btn-default button-minus disabled"
												href="#"
												title="{l s='Subtract' mod='advancedcheckout'}">
												<span><i class="icon-minus"></i></span>
											</a>
										{/if}
										<a
											id="cart_quantity_up_{$product.id_product|intval}_{$product.id_product_attribute|intval}_{$id_customization|intval}_{$product.id_address_delivery|intval}"
											class="cart_quantity_up btn btn-default button-plus"
											href="{$link->getPageLink('cart', true, NULL, "add=1&amp;id_product={$product.id_product|intval}&amp;ipa={$product.id_product_attribute|intval}&amp;id_address_delivery={$product.id_address_delivery}&amp;id_customization={$id_customization}&amp;token={$token_cart}")|escape:'html':'UTF-8'}"
											rel="nofollow"
											title="{l s='Add' mod='advancedcheckout'}">
											<span><i class="icon-plus"></i></span>
										</a>
									</div>
								{/if}
							</td>
							<td class="cart_delete">
								{if isset($cannotModify) AND $cannotModify == 1}
								{else}
									<div>
										<a
											id="{$product.id_product|intval}_{$product.id_product_attribute|intval}_{$id_customization|intval}_{$product.id_address_delivery|intval}"
											class="cart_quantity_delete"
											href="{$link->getPageLink('cart', true, NULL, "delete=1&amp;id_product={$product.id_product|intval}&amp;ipa={$product.id_product_attribute|intval}&amp;id_customization={$id_customization}&amp;id_address_delivery={$product.id_address_delivery}&amp;token={$token_cart}")|escape:'html':'UTF-8'}"
											rel="nofollow"
											title="{l s='Delete' mod='advancedcheckout'}">
											<i class=" icon-trash"></i>
										</a>
									</div>
								{/if}
							</td>
						</tr>
						{assign var='quantityDisplayed' value=$quantityDisplayed+$customization.quantity}
					{/foreach}

					{* If it exists also some uncustomized products *}
					{if $product.quantity-$quantityDisplayed > 0}{include file="./shopping-cart-product-line.tpl" productLast=$product@last productFirst=$product@first}{/if}
				{/if}
			{/foreach}
			{assign var='last_was_odd' value=$product@iteration%2}
			{foreach $gift_products as $product}
				{assign var='productId' value=$product.id_product}
				{assign var='productAttributeId' value=$product.id_product_attribute}
				{assign var='quantityDisplayed' value=0}
				{assign var='odd' value=($product@iteration+$last_was_odd)%2}
				{assign var='ignoreProductLast' value=isset($customizedDatas.$productId.$productAttributeId)}
				{assign var='cannotModify' value=1}
				{* Display the gift product line *}
				{include file="./shopping-cart-product-line.tpl" productLast=$product@last productFirst=$product@first}
			{/foreach}
		</tbody>
		{if sizeof($discounts)}
			<tbody>
				{foreach $discounts as $discount}
					<tr class="cart_discount {if $discount@last}last_item{elseif $discount@first}first_item{else}item{/if}" id="cart_discount_{$discount.id_discount|intval}">
						<td class="cart_discount_name" colspan="2">{$discount.name|escape:'html':'UTF-8'}</td>
						<td class="cart_discount_price">
						<div class="mobile_table_title visible-phone">{l s='Unit price b' mod='advancedcheckout'}</div>
						<div class="mobile_table_content">
						<span class="price-discount price">
							{if !$priceDisplay}{displayPrice price=$discount.value_real*-1}{else}{displayPrice price=$discount.value_tax_exc*-1}{/if}
						</span>
						</div>
						</td>
						<td class="cart_discount_delete">
						<div class="mobile_table_title visible-phone">{l s='Qty' mod='advancedcheckout'}</div>
						<div class="mobile_table_content">1</div>
						</td>
						<td class="cart_discount_price">
						<div class="mobile_table_title visible-phone">{l s='Total' mod='advancedcheckout'}</div>
						<div class="mobile_table_content">
							<span class="price-discount price">{if !$priceDisplay}{displayPrice price=$discount.value_real*-1}{else}{displayPrice price=$discount.value_tax_exc*-1}{/if}</span>
						</div>
						</td>
						<td class="price_discount_del">
						<div class="mobile_table_title visible-phone"></div>
						<div class="mobile_table_content">
							{if strlen($discount.code)}<a onclick="deldisc('{$discount.id_discount|intval}')" class="price_discount_delete" title="{l s='Delete' mod='advancedcheckout'}"><i class="fa-trash  fa"></i></a>{/if}
						</div>
						</td>
					</tr>
				{/foreach}
			</tbody>
		{/if}
	</table>
	<div class="cart_foot">
		<div id="HOOK_SHOPPING_CART">{$HOOK_SHOPPING_CART}</div>
		{if !empty($HOOK_SHOPPING_CART_EXTRA)}
			<div class="clear"></div>
			<div class="cart_navigation_extra">
				<div id="HOOK_SHOPPING_CART_EXTRA">{$HOOK_SHOPPING_CART_EXTRA}</div>
			</div>
		{/if}
		<div style="clear:both;"></div>
	</div>
</div> <!-- end order-detail-content -->
{if !$adv_show_oc && $comment_field == 'cart'}
	<br/><div class="opc-form-group is_customer_param">
		<label for="messagex" class="w100 opc-control-label">{l s='Leave a message' mod='advancedcheckout'}</label>
		<div class="w100 opc-input-icon opc-icon-right">
			<textarea class="opc-form-control opc-elastic" name="messagex" placeholder="{l s='If you would like to add a comment about your order, please write it in the field below.' mod='advancedcheckout'}" id="messagex" cols="26" rows="3">{if isset($oldMessage)}{$oldMessage|escape:'html':'UTF-8'}{/if}</textarea>
			<i class="fa fa-comment"></i>
		</div>
	</div>
{/if}
{if $show_option_allow_separate_package}
	<p>
		<input type="checkbox" name="allow_seperated_package" id="allow_seperated_package" {if $cart->allow_seperated_package}checked="checked"{/if} autocomplete="off"/>
		<label for="allow_seperated_package">{l s='Send available products first' mod='advancedcheckout'}</label>
	</p>
{/if}

{* Define the style if it doesn't exist in the PrestaShop version*}
{* Will be deleted for 1.5 version and more *}
{if !isset($addresses_style)}
	{$addresses_style.company = 'address_company'}
	{$addresses_style.vat_number = 'address_company'}
	{$addresses_style.firstname = 'address_name'}
	{$addresses_style.lastname = 'address_name'}
	{$addresses_style.address1 = 'address_address1'}
	{$addresses_style.address2 = 'address_address2'}
	{$addresses_style.city = 'address_city'}
	{$addresses_style.country = 'address_country'}
	{$addresses_style.phone = 'address_phone'}
	{$addresses_style.phone_mobile = 'address_phone_mobile'}
	{$addresses_style.alias = 'address_title'}
{/if}