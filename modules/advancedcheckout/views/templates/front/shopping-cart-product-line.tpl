{**
* Module is prohibited to sales! Violation of this condition leads to the deprivation of the license!
*
* @category  Front Office Features
* @package   Advanced Checkout Module
* @author    Maxim Bespechalnih <2343319@gmail.com>
* @copyright 2013-2015 Max
* @license   license.txt in the module folder.
*}

<tr id="product_{$product.id_product|intval}_{$product.id_product_attribute|intval}_{if $quantityDisplayed > 0}nocustom{else}0{/if}_{$product.id_address_delivery|intval}{if !empty($product.gift)}_gift{/if}" class="cart_item{if isset($productLast) && $productLast && (!isset($ignoreProductLast) || !$ignoreProductLast)} last_item{/if}{if isset($productFirst) && $productFirst} first_item{/if}{if isset($customizedDatas.$productId.$productAttributeId) AND $quantityDisplayed == 0} alternate_item{/if} address_{$product.id_address_delivery|intval} {if $odd}odd{else}even{/if}">
	<td class="cart_product">
		<div class="mobile_table_title visible-phone">{l s='Product' mod='advancedcheckout'}</div>
        <div class="mobile_table_content">
        <a href="{$link->getProductLink($product.id_product, $product.link_rewrite, $product.category, null, null, $product.id_shop, $product.id_product_attribute)|escape:'htmlall':'UTF-8'}"><img src="{$link->getImageLink($product.link_rewrite, $product.id_image, 'small_default')|escape:'html'}" alt="{$product.name|escape:'htmlall':'UTF-8'}" {if isset($smallSize)}width="{$smallSize.width|escape:'html':'UTF-8'}" height="{$smallSize.height|escape:'html':'UTF-8'}" {/if} /></a>
        </div>
	</td>
	<td class="cart_description">
		<div class="mobile_table_title visible-phone">{l s='Description' mod='advancedcheckout'}</div>
        <div class="mobile_table_content">
		<p class="s_title_block"><a href="{$link->getProductLink($product.id_product, $product.link_rewrite, $product.category, null, null, $product.id_shop, $product.id_product_attribute)|escape:'htmlall':'UTF-8'}">{$product.name|escape:'htmlall':'UTF-8'}</a></p>
		{if isset($product.attributes) && $product.attributes}<a href="{$link->getProductLink($product.id_product, $product.link_rewrite, $product.category, null, null, $product.id_shop, $product.id_product_attribute)|escape:'htmlall':'UTF-8'}" class="color_666">{$product.attributes|escape:'htmlall':'UTF-8'}</a>{/if}
        </div>
	</td>
	<td class="cart_unit">
		<div class="mobile_table_title visible-phone">{l s='Unit price' mod='advancedcheckout'}</div>
        <div class="mobile_table_content">
		<span class="price" id="product_price_{$product.id_product|intval}_{$product.id_product_attribute|intval}{if $quantityDisplayed > 0}_nocustom{/if}_{$product.id_address_delivery|intval}{if !empty($product.gift)}_gift{/if}">
			{if !empty($product.gift)}
				<span class="gift-icon">{l s='Gift!' mod='advancedcheckout'}</span>
			{else}
            	{if !$priceDisplay}
					<span class="opc-price{if isset($product.is_discounted) && $product.is_discounted} opc-special-price{/if}">{convertPrice price=$product.price_wt}</span>
				{else}
               	 	<span class="opc-price{if isset($product.is_discounted) && $product.is_discounted} opc-special-price{/if}">{convertPrice price=$product.price}</span>
				{/if}
				{if isset($product.is_discounted) && $product.is_discounted}
                	<br/><span class="opc-price-percent-reduction opc-small">
            			{if !$priceDisplay}
            				{if isset($product.reduction_type) && $product.reduction_type == 'amount'}
                    			{assign var='priceReduction' value=($product.price_wt - $product.price_without_specific_price)}
                    			{assign var='symbol' value=$currency->sign}
                    		{else}
                    			{assign var='priceReduction' value=(($product.price_without_specific_price - $product.price_wt)/$product.price_without_specific_price) * 100 * -1}
                    			{assign var='symbol' value='%'}
                    		{/if}
						{else}
							{if isset($product.reduction_type) && $product.reduction_type == 'amount'}
								{assign var='priceReduction' value=($product.price - $product.price_without_specific_price)}
								{assign var='symbol' value=$currency->sign}
                    		{else}
                    			{assign var='priceReduction' value=(($product.price_without_specific_price - $product.price)/$product.price_without_specific_price) * 100 * -1}
                    			{assign var='symbol' value='%'}
                    		{/if}
						{/if}
						{if $symbol == '%'}
							&nbsp;{$priceReduction|round|string_format:"%d"|escape:'html':'UTF-8'}{$symbol|escape:'html':'UTF-8'}&nbsp;
						{else}
							&nbsp;{$priceReduction|string_format:"%.2f"|escape:'html':'UTF-8'}{$symbol|escape:'html':'UTF-8'}&nbsp;
						{/if}
                    </span>
					<br/><span class="opc-old-price">{convertPrice price=$product.price_without_specific_price}</span>
				{/if}
			{/if}
		</span>
        </div>
	</td>
	<td class="opc-cart_quantity"{if isset($customizedDatas.$productId.$productAttributeId) AND $quantityDisplayed == 0} style="text-align: center;"{/if}>
		<div class="mobile_table_title visible-phone">{l s='Qty' mod='advancedcheckout'}</div>
        <div class="mobile_table_content">
		{if isset($cannotModify) AND $cannotModify == 1}
			<span style="float:left">
				{if $quantityDisplayed == 0 AND isset($customizedDatas.$productId.$productAttributeId)}{$customizedDatas.$productId.$productAttributeId|@count}
				{else}
					{$product.cart_quantity-$quantityDisplayed|intval}
				{/if}
			</span>
		{else}
			{if isset($customizedDatas.$productId.$productAttributeId) AND $quantityDisplayed == 0}
				<span id="cart_quantity_custom_{$product.id_product|intval}_{$product.id_product_attribute|intval}_{$product.id_address_delivery|intval}" >{$product.customizationQuantityTotal|escape:'html':'UTF-8'}</span>
			{/if}
			{if !isset($customizedDatas.$productId.$productAttributeId) OR $quantityDisplayed > 0}

				<input type="hidden" value="{if $quantityDisplayed == 0 AND isset($customizedDatas.$productId.$productAttributeId)}{$customizedDatas.$productId.$productAttributeId|@count}{else}{$product.cart_quantity-$quantityDisplayed|intval}{/if}" name="quantity_{$product.id_product|intval}_{$product.id_product_attribute|intval}_{if $quantityDisplayed > 0}nocustom{else}0{/if}_{$product.id_address_delivery|intval}_hidden" />
				<input size="2" type="text" autocomplete="off" class="opc-cci cart_quantity_input form-control grey" value="{if $quantityDisplayed == 0 AND isset($customizedDatas.$productId.$productAttributeId)}{$customizedDatas.$productId.$productAttributeId|count}{else}{$product.cart_quantity-$quantityDisplayed|intval}{/if}"  name="quantity_{$product.id_product|intval}_{$product.id_product_attribute|intval}_{if $quantityDisplayed > 0}nocustom{else}0{/if}_{$product.id_address_delivery|intval}" />
				<div class="opc-cart_quantity_button clearfix">
				{if $product.minimal_quantity < ($product.cart_quantity-$quantityDisplayed) OR $product.minimal_quantity <= 1}
					<a rel="nofollow" class="opc-cart_quantity_down opc-btn opc-btn-default opc-button-minus" id="cart_quantity_down_{$product.id_product|intval}_{$product.id_product_attribute|intval}_{if $quantityDisplayed > 0}nocustom{else}0{/if}_{$product.id_address_delivery|intval}" href="{$link->getPageLink('cart', true, NULL, "add=1&amp;id_product={$product.id_product|intval}&amp;ipa={$product.id_product_attribute|intval}&amp;id_address_delivery={$product.id_address_delivery|intval}&amp;op=down&amp;token={$token_cart}")|escape:'html':'UTF-8'}" title="{l s='Subtract' mod='advancedcheckout'}">
				<span><i class="fa fa-minus"></i></span>
				</a>
				{else}
					<a class="opc-cart_quantity_down opc-btn opc-btn-default opc-button-minus disabled" href="#" id="cart_quantity_down_{$product.id_product|intval}_{$product.id_product_attribute|intval}_{if $quantityDisplayed > 0}nocustom{else}0{/if}_{$product.id_address_delivery|intval}" title="{l s='You must purchase a minimum of %d of this product.' sprintf=$product.minimal_quantity mod='advancedcheckout'}">
					<span><i class="fa fa-minus"></i></span>
				</a>
				{/if}
                	<a rel="nofollow" class="opc-cart_quantity_up opc-btn opc-btn-default opc-button-plus" id="cart_quantity_up_{$product.id_product|intval}_{$product.id_product_attribute|intval}_{if $quantityDisplayed > 0}nocustom{else}0{/if}_{$product.id_address_delivery|intval}" href="{$link->getPageLink('cart', true, NULL, "add=1&amp;id_product={$product.id_product|intval}&amp;ipa={$product.id_product_attribute|intval}&amp;id_address_delivery={$product.id_address_delivery|intval}&amp;token={$token_cart}")|escape:'html':'UTF-8'}" title="{l s='Add' mod='advancedcheckout'}"><span><i class="fa fa-plus"></i></span></a>
				</div>
			{/if}
		{/if}
        </div>
	</td>
	<td class="cart_total">
		<div class="mobile_table_title visible-phone">{l s='Total' mod='advancedcheckout'}</div>
        <div class="mobile_table_content">
		<span class="price" id="total_product_price_{$product.id_product|intval}_{$product.id_product_attribute|intval}{if $quantityDisplayed > 0}_nocustom{/if}_{$product.id_address_delivery|intval}{if !empty($product.gift)}_gift{/if}">
			{if !empty($product.gift)}
				<span class="gift-icon">{l s='Gift!' mod='advancedcheckout'}</span>
			{else}
				{if $quantityDisplayed == 0 AND isset($customizedDatas.$productId.$productAttributeId)}
					{if !$priceDisplay}{displayPrice price=$product.total_customization_wt}{else}{displayPrice price=$product.total_customization}{/if}
				{else}
					{if !$priceDisplay}{displayPrice price=$product.total_wt}{else}{displayPrice price=$product.total}{/if}
				{/if}
			{/if}
		</span>
        </div>
	</td>
	{if !isset($noDeleteButton) || !$noDeleteButton}
		<td class="cart_delete">
		<div class="mobile_table_title visible-phone"></div>
        <div class="mobile_table_content">
		{if (!isset($customizedDatas.$productId.$productAttributeId) OR $quantityDisplayed > 0) && empty($product.gift)}
			<div>
				<a rel="nofollow" class="opc-cart_quantity_delete" id="{$product.id_product|intval}_{$product.id_product_attribute|intval}_{if $quantityDisplayed > 0}nocustom{else}0{/if}_{$product.id_address_delivery|intval}" href="{$link->getPageLink('cart', true, NULL, "delete=1&amp;id_product={$product.id_product|intval}&amp;ipa={$product.id_product_attribute|intval}&amp;id_address_delivery={$product.id_address_delivery|intval}&amp;token={$token_cart}")|escape:'html':'UTF-8'}" title="{l s='Delete' mod='advancedcheckout'}"><i class="fa fa-trash"></i></a>
			</div>
		{/if}
        </div>
		</td>
	{/if}
</tr>
