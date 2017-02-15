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
	$(document).ready(function(){
		if ($('#gift').is(':checked'))
			$('#gift_div').show();
		else
			$('#gift_div').hide();
	});
</script>
<div class="opc-alert opc-alert-danger carrier_error" style="display:none;">
	<i class="fa fa-times-circle opc-sign"></i>
	{l s='No carrier selected.' mod='advancedcheckout'}
</div>
<div id="HOOK_BEFORECARRIER">
	{if isset($carriers) && isset($HOOK_BEFORECARRIER)}
		{$HOOK_BEFORECARRIER}
	{/if}
</div>
<input type="hidden" name="vcart" value="{$isVirtualCart|intval}">
{if isset($isVirtualCart) && $isVirtualCart}
	<p class="opc-alert opc-alert-warning">
		<i class="fa fa-warning opc-sign"></i>
		{l s='No carrier is needed for this order. This product is virtual.' mod='advancedcheckout'}
	</p>
{else}
	{if $recyclablePackAllowed}
		<div class="opc-form-group">
			<div class="w100">
				<div class="opc-checkbox">
					<label for="recyclable">
						<input type="checkbox" name="recyclable" id="recyclable" value="1" {if $recyclable == 1}checked="checked"{/if} />
						<span class="opc-text">{l s='I would like to receive my order in recycled packaging.' mod='advancedcheckout'}.</span>
					</label>
				</div>
			</div>
		</div>
	{/if}
	<div class="delivery_options_address">
		{if isset($delivery_option_list)}
			{foreach $delivery_option_list as $id_address => $option_list}					
				<div class="opc-delivery_options">
					{foreach $option_list as $key => $option}
						<div class="delivery_option {if ($option@index % 2)}alternate_{/if}item">
							<div>
								<table class="resume opc-table {if !$option.unique_carrier} not-displayable{/if}">
									<tr>
										<td class="delivery_option_radio" width="5%">
											<div class="opc-form-group">
												<div class="opc-radio">
													<label>
														<input onchange="updcarrieraddress(1);" id="delivery_option_{$id_address|intval}_{$option|escape:'html':'UTF-8'}" class="delivery_option_radio" type="radio" name="delivery_option[{$id_address|intval}]" data-key="{$key|escape:'html':'UTF-8'}" data-id_address="{$id_address|intval}" value="{$key|escape:'html':'UTF-8'}"{if isset($delivery_option[$id_address]) && $delivery_option[$id_address] == $key} checked="checked"{/if} />
														<span class="opc-text"></span>
													</label>
												</div>
											</div>
										</td>
										<td class="delivery_option_logo" width="25%">
											{foreach $option.carrier_list as $carrier}
													{if $carrier.logo}                                                            
														<label for="delivery_option_{$id_address|intval}_{$option@index|intval}"><img width="" height="" src="{$carrier.logo|escape:'html':'UTF-8'}" alt="{$carrier.instance->name|escape:'html':'UTF-8'}"/></label>
													{else}
													   <label for="delivery_option_{$id_address|intval}_{$option@index|intval}"><img height="35" width="65" src="{$pathx|escape:'html':'UTF-8'}views/img/shipping.png" /></label>                                                           
													{/if}
											  
											{/foreach}
										</td>
										<td width="45%">
											{if $option.unique_carrier}
												{foreach $option.carrier_list as $carrier}
													<strong>{$carrier.instance->name|escape:'htmlall':'UTF-8'}</strong>
												{/foreach}
												{if isset($carrier.instance->delay[$cookie->id_lang])}
													{$carrier.instance->delay[$cookie->id_lang]|escape:'htmlall':'UTF-8'}
												{/if}
											{/if}
											{if count($option_list) > 1}
												{if $option.is_best_grade}
													{if $option.is_best_price}
														{l s='The best price and speed' mod='advancedcheckout'}
													{else}
														{l s='The fastest' mod='advancedcheckout'}
													{/if}
												{else}
													{if $option.is_best_price}
														{l s='The best price' mod='advancedcheckout'}
													{/if}
												{/if}
											{/if}
										</td>
										<td class="delivery_option_price" width="25%">
											<div class="delivery_option_price">
												{if $option.total_price_with_tax && (!isset($free_shipping) || (isset($free_shipping) && !$free_shipping))}
													{if $use_taxes == 1}
														{if $priceDisplay == 1}
															{convertPrice price=$option.total_price_without_tax}{if !$tax_view} {l s='(tax excl.)' mod='advancedcheckout'}{/if}
														{else}
															{convertPrice price=$option.total_price_with_tax}{if !$tax_view} {l s='(tax incl.)' mod='advancedcheckout'}{/if}
														{/if}
													{else}
														{convertPrice price=$option.total_price_without_tax}
													{/if}
												{else}
													{l s='Free' mod='advancedcheckout'}
												{/if}
											</div>
										</td>
									</tr>
								</table>
								{if !$option.unique_carrier}
									<table class="delivery_option_carrier{if isset($delivery_option[$id_address]) && $delivery_option[$id_address] == $key} selected{/if} resume table table-bordered{if $option.unique_carrier} not-displayable{/if}">
										<tr>
											{if !$option.unique_carrier}
												<td rowspan="{$option.carrier_list|count}" class="delivery_option_radio first_item">
													<input id="delivery_option_{$id_address|intval}_{$option|escape:'html':'UTF-8'}" class="delivery_option_radio" type="radio" name="delivery_option[{$id_address|intval}]" data-key="{$key|escape:'html':'UTF-8'}" data-id_address="{$id_address|intval}" value="{$key|escape:'html':'UTF-8'}"{if isset($delivery_option[$id_address]) && $delivery_option[$id_address] == $key} checked="checked"{/if} />
													<!-- <div class="opc-form-group">
														<label class="w100 control-label">Inline Radios</label>
														<label class="opc-radio-inline">
															<div class="opc-radio-container" style="position: relative;">
																<input type="radio" name="radio1" value="option1" style="position: absolute; opacity: 0;">
															</div>unchecked
														</label>
													</div> -->
												</td>
											{/if}
											{assign var="first" value=current($option.carrier_list)}
											<td class="delivery_option_logo{if $first.product_list[0].carrier_list[0] eq 0} not-displayable{/if}">
												{if $first.logo}
													<img src="{$first.logo|escape:'htmlall':'UTF-8'}" alt="{$first.instance->name|escape:'htmlall':'UTF-8'}"/>
												{else if !$option.unique_carrier}
													{$first.instance->name|escape:'htmlall':'UTF-8'}
												{/if}
											</td>
											<td class="{if $option.unique_carrier}first_item{/if}{if $first.product_list[0].carrier_list[0] eq 0} not-displayable{/if}">
												<input type="hidden" value="{$first.instance->id|intval}" name="id_carrier" />
												{if isset($first.instance->delay[$cookie->id_lang])}
													<i class="icon-info-sign"></i>{$first.instance->delay[$cookie->id_lang]|escape:'htmlall':'UTF-8'}
													{if count($first.product_list) <= 1}
														({l s='Product concerned:' mod='advancedcheckout'}
													{else}
														({l s='Products concerned:' mod='advancedcheckout'}
													{/if}
													{foreach $first.product_list as $product}
														{if $product@index == 4}
															<acronym title="
														{/if}
														{strip}
															{if $product@index >= 4}
																{$product.name|escape:'htmlall':'UTF-8'}
																{if isset($product.attributes) && $product.attributes}
																	{$product.attributes|escape:'htmlall':'UTF-8'}
																{/if}
																{if !$product@last}
																	,&nbsp;
																{else}
																	">&hellip;</acronym>)
																{/if}
															{else}
																{$product.name|escape:'htmlall':'UTF-8'}
																{if isset($product.attributes) && $product.attributes}
																	{$product.attributes|escape:'htmlall':'UTF-8'}
																{/if}
																{if !$product@last}
																	,&nbsp;
																{else}
																	)
																{/if}
															{/if}
														{strip}
													{/foreach}
												{/if}
											</td>
											<td rowspan="{$option.carrier_list|count}" class="delivery_option_price">
												<div class="delivery_option_price">
													{if $option.total_price_with_tax && (!isset($free_shipping) || (isset($free_shipping) && !$free_shipping))}
														{if $use_taxes == 1}
															{if $priceDisplay == 1}
																{convertPrice price=$option.total_price_without_tax}{if $display_tax_label} {l s='(tax excl.)' mod='advancedcheckout'}{/if}
															{else}
																{convertPrice price=$option.total_price_with_tax}{if $display_tax_label} {l s='(tax incl.)' mod='advancedcheckout'}{/if}
															{/if}
														{else}
															{convertPrice price=$option.total_price_without_tax}
														{/if}
													{else}
														{l s='Free'  mod='advancedcheckout'}
													{/if}
												</div>
											</td>
										</tr>
										<tr>
											<td class="delivery_option_logo{if $carrier.product_list[0].carrier_list[0] eq 0} not-displayable{/if}">
												{foreach $option.carrier_list as $carrier}
													{if $carrier@iteration != 1}
														{if $carrier.logo}
															<img src="{$carrier.logo|escape:'htmlall':'UTF-8'}" alt="{$carrier.instance->name|escape:'htmlall':'UTF-8'}"/>
														{else if !$option.unique_carrier}
															{$carrier.instance->name|escape:'htmlall':'UTF-8'}
														{/if}
													{/if}
												{/foreach}
											</td>
											<td class="{if $option.unique_carrier} first_item{/if}{if $carrier.product_list[0].carrier_list[0] eq 0} not-displayable{/if}">
												<input type="hidden" value="{$first.instance->id|intval}" name="id_carrier" />
												{if isset($carrier.instance->delay[$cookie->id_lang])}
													<i class="icon-info-sign"></i>
													{$first.instance->delay[$cookie->id_lang]|escape:'htmlall':'UTF-8'}
													{if count($carrier.product_list) <= 1}
														({l s='Product concerned:' mod='advancedcheckout'}
													{else}
														({l s='Products concerned:' mod='advancedcheckout'}
													{/if}
													{foreach $carrier.product_list as $product}
														{if $product@index == 4}
															<acronym title="
														{/if}
														{strip}
															{if $product@index >= 4}
																{$product.name|escape:'htmlall':'UTF-8'}
																{if isset($product.attributes) && $product.attributes}
																	{$product.attributes|escape:'htmlall':'UTF-8'}
																{/if}
																{if !$product@last}
																	,&nbsp;
																{else}
																	">&hellip;</acronym>)
																{/if}
															{else}
																{$product.name|escape:'htmlall':'UTF-8'}
																{if isset($product.attributes) && $product.attributes}
																	{$product.attributes|escape:'htmlall':'UTF-8'}
																{/if}
																{if !$product@last}
																	,&nbsp;
																{else}
																	)
																{/if}
															{/if}
														{strip}
													{/foreach}
												{/if}
											</td>
										</tr>
									</table>
								{/if}
							</div>
						</div> <!-- end delivery_option -->
					{/foreach}
				</div> <!-- end delivery_options -->
				{foreachelse}
					<div class="opc-bs-callout opc-bs-callout-danger">
						{foreach $cart->getDeliveryAddressesWithoutCarriers(true) as $address}
							{if empty($address->alias)}
								<div class="opc-alert opc-alert-danger">
									<i class="fa fa-times-circle opc-sign"></i>
									{l s='No carriers available.' mod='advancedcheckout'}
								</div>
							{else}
								<div class="opc-alert opc-alert-danger">
									<i class="fa fa-times-circle opc-sign"></i>
									{l s='No carriers available for the address "%s".' sprintf=$address->alias  mod='advancedcheckout'}
								</div>
							{/if}
							{if !$address@last}
								<br />
							{/if}
						{foreachelse}
							<div class="opc-alert opc-alert-danger">
								<i class="fa fa-times-circle opc-sign"></i>
								{l s='No carriers available.' mod='advancedcheckout'}
							</div>
						{/foreach}							
					</div>
				{/foreach}
				<div class="hook_extracarrier" id="HOOK_EXTRACARRIER_{$id_address|intval}">
					{if isset($HOOK_EXTRACARRIER_ADDR) &&  isset($HOOK_EXTRACARRIER_ADDR.$id_address)}{$HOOK_EXTRACARRIER_ADDR.$id_address}{/if}
				</div>
			{/if}
		</div> <!-- end delivery_options_address -->
		{if !$adv_show_oc && $comment_field == 'carrier'}
			<div class="opc-form-group is_customer_param">
				<label for="messagex" class="w100 opc-control-label">{l s='Leave a message' mod='advancedcheckout'}</label>
				<div class="w100 opc-input-icon opc-icon-right">
					<textarea class="opc-form-control opc-elastic" name="messagex" placeholder="{l s='If you would like to add a comment about your order, please write it in the field below.' mod='advancedcheckout'}" id="messagex" cols="26" rows="3">{if isset($oldMessage)}{$oldMessage|escape:'html':'UTF-8'}{/if}</textarea>
					<i class="fa fa-comment"></i>
				</div>
			</div>
		{/if}
		<div id="extra_carrier" style="display: none;"></div>
		{if $giftAllowed}
			<hr style="" />
			<p class="carrier_title">{l s='Gift' mod='advancedcheckout'}</p>
			<div class="opc-form-group">
				<div class="w100">
					<div class="opc-checkbox">
						<label for="gift">
							<input type="checkbox" name="gift" id="gift" value="1" {if $cart->gift == 1}checked="checked"{/if} />
							<span class="opc-text">
								{l s='I would like my order to be gift wrapped.' mod='advancedcheckout'}
								{if $gift_wrapping_price > 0}
									&nbsp;<i>({l s='Additional cost of' mod='advancedcheckout'}
									<span class="price" id="gift-price">
										{if $priceDisplay == 1}
											{convertPrice price=$total_wrapping_tax_exc_cost}
										{else}
											{convertPrice price=$total_wrapping_cost}
										{/if}
									</span>
									{if $use_taxes && $display_tax_label}
										{if $priceDisplay == 1}
											{l s='(tax excl.)' mod='advancedcheckout'}
										{else}
											{l s='(tax incl.)' mod='advancedcheckout'}
										{/if}
									{/if})
									</i>
								{/if}
							</span>
						</label>
					</div>
				</div>
			</div>
			<div id="gift_div">
				<div class="opc-form-group">
					<label for="gift_message" class="w100 opc-control-label">{l s='Leave a message' mod='advancedcheckout'}</label>
					<div class="w100">
						<textarea class="opc-form-control opc-elastic" name="gift_message" placeholder="{l s='If you\'d like, you can add a note to the gift:' mod='advancedcheckout'}" id="gift_message" cols="26" rows="3">{$cart->gift_message|escape:'html':'UTF-8'}</textarea>
					</div>
				</div>
			</div>
		{/if}
	{/if}