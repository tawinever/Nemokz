{**
* Module is prohibited to sales! Violation of this condition leads to the deprivation of the license!
*
* @category  Front Office Features
* @package   Advanced Checkout Module
* @author    Maxim Bespechalnih <2343319@gmail.com>
* @copyright 2013-2015 Max
* @license   license.txt in the module folder.
*}

{if isset($payment_methods)}
	<div class="opc-alert opc-alert-danger payment_error" style="display:none;">
		<i class="fa fa-times-circle opc-sign"></i>
		{l s='No payment selected.' mod='advancedcheckout'}
	</div>
	<table id="table_payment" class="opc-table">
			<tbody>	
		   {foreach from=$payment_methods item=payment_method name=myLoop key=k}
				<tr class="checkfield opc-divider">
				<td>
					<div class="opc-form-group">
						<label class="opc-radio">
							<input type="radio" name="id_payment_method" value="{$payment_method.url_go|escape:'quotes':'UTF-8'}" class="radio"
						   idorig="{$payment_method.id|intval}" id="payment_{$payment_method.id|intval}_{$k|intval}" {if ($payment_methods|@count == 1) OR ($k == 0)}data-checked="1"{/if}/>
							<span class="opc-text"></span>
						</label>
					</div>
				</td>
				<td class="payment_image">
						<label for="payment_{$payment_method.id|intval}_{$k|intval}">{if $payment_method.url_image|escape:'html':'UTF-8'}<img width="65" height="35" src="{$payment_method.url_image|escape:'htmlall':'UTF-8'}"/>{/if}</label>
				</td>
				<td>
					 <p>
					<label for="payment_{$payment_method.id|intval}_{$k|intval}">{$payment_method.desc|escape:'quotes':'UTF-8'}</label>
					</p>
				</td>
				</tr>
			{/foreach}
		</tbody>
	</table>
	{if !$adv_show_oc && $comment_field == 'payment'}
		<div class="opc-form-group is_customer_param">
			<label for="messagex" class="w100 opc-control-label">{l s='Leave a message' mod='advancedcheckout'}</label>
			<div class="w100 opc-input-icon opc-icon-right">
				<textarea class="opc-form-control opc-elastic" name="messagex" placeholder="{l s='If you would like to add a comment about your order, please write it in the field below.' mod='advancedcheckout'}" id="messagex" cols="26" rows="3">{if isset($oldMessage)}{$oldMessage|escape:'html':'UTF-8'}{/if}</textarea>
				<i class="fa fa-comment"></i>
			</div>
		</div>
	{/if}
	<div id="opc_payment_methods-content" style="display:none">
		<div id="HOOK_PAYMENT" style="display:none"></div>
	</div>
{else}
	<div class="opc-alert opc-alert-danger">
		<i class="fa fa-times-circle opc-sign"></i>
		{l s='No payment modules have been installed.' mod='advancedcheckout'}
	</div>
{/if}