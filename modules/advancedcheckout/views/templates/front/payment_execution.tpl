{**
* Module is prohibited to sales! Violation of this condition leads to the deprivation of the license!
*
* @category  Front Office Features
* @package   Advanced Checkout Module
* @author    Maxim Bespechalnih <2343319@gmail.com>
* @copyright 2013-2015 Max
* @license   license.txt in the module folder.
*}

<style>
	#right_column {
		display:none !important;
	}
</style>
{capture name=path}{$paysistem->name|escape:'html':'UTF-8'}{/capture}
<h2>{l s='Order summary' mod='advancedcheckout'}</h2>
{if isset($nbProducts) && $nbProducts <= 0}
	<p class="warning">{l s='Your shopping cart is empty.' mod='advancedcheckout'}</p>
{else}
<form action="{$link->getModuleLink('advancedcheckout', 'validation', [], true)|escape:'html':'UTF-8'}" method="post">
	<div class="box">
		<h3>{$paysistem->name|escape:'html':'UTF-8'}</h3>
		{$paysistem->description|escape:'quotes':'UTF-8'}
		<p>
			<b>{l s='Please confirm your order by clicking \'I confirm my order\'' mod='advancedcheckout'}.</b>
		</p>
	</div>
	<p class="cart_navigation clearfix" id="cart_navigation">
			<input type="hidden" name="id_unpay" value="{$paysistem->id|intval}" />
        	<a class="button-exclusive button_large btn btn-default" href="{$link->getPageLink('order', true, NULL, "step=3")|escape:'quotes':'UTF-8'}">
                <i class="icon-chevron-left"></i>{l s='Other payment methods' mod='advancedcheckout'}
            </a>
            <button class="button exclusive_large btn btn-default button-medium" type="submit">
                <span>{l s='I confirm my order' mod='advancedcheckout'}<i class="icon-chevron-right right"></i></span>
            </button>
        </p>
</form>
{/if}
