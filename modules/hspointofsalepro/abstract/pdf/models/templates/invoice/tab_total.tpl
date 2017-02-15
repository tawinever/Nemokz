{**
* RockPOS - Point of Sale for PrestaShop
*
* @author    Hamsa Technologies
* @copyright Hamsa Technologies
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*}

<table id="total-tab" width="100%">

    <tr>
        <td class="grey" width="60%">
            {$hs_pos_i18n.sub_total|escape:'htmlall':'UTF-8'}
        </td>
        <td class="white" width="40%">
            {if $include_taxes}
                {displayPrice currency=$order->id_currency price=$order_invoice->total_products_wt - $order_details.gift_total_order_tax_incl}
            {else} 
                {displayPrice currency=$order->id_currency price=$order_invoice->total_products - $order_details.gift_total_order_tax_excl}
            {/if}
        </td>
    </tr>
    {if $include_taxes}
        {assign value=($order_invoice->total_discount_tax_incl - $order_invoice->total_shipping_tax_incl - $order_details.gift_total_order_tax_incl) var=total_discounts}
    {else}
        {assign value=($order_invoice->total_discount_tax_excl - $order_invoice->total_shipping_tax_excl - $order_details.gift_total_order_tax_excl) var=total_discounts}
    {/if}
    {if $total_discounts > 0}
        <tr>
            <td class="grey" width="60%">
                {$hs_pos_i18n.order_discount|escape:'htmlall':'UTF-8'}
            </td>
            <td class="white" width="40%">
                - {displayPrice currency=$order->id_currency price=$total_discounts}
            </td>
        </tr>
        
        {if $order->getCartRules()}        
            {foreach from=$order->getCartRules() item=cart_rule}
                {if !$cart_rule.free_shipping}
                    <tr>
                        <td class="grey">({$cart_rule.name|escape:'htmlall':'UTF-8'})</td>
                        <td class="white">
                            {if $include_taxes}
                                ({displayPrice currency=$order->id_currency price=$cart_rule.value*-1})
                            {else}
                                ({displayPrice currency=$order->id_currency price=$cart_rule.value_tax_excl*-1})
                            {/if}
                        </td>
                    </tr>
                {/if}
            {/foreach}
        {/if}       

    {/if}
    {if $order_invoice->total_shipping_tax_excl > 0 && !$order->isFreeShipping()}
        <tr>
            <td class="grey" width="60%">
                {$hs_pos_i18n.shipping_cost|escape:'htmlall':'UTF-8'}
            </td>
            <td class="white" width="40%">{if $include_taxes}{displayPrice currency=$order->id_currency price=$order_invoice->total_shipping_tax_incl}{else}{displayPrice currency=$order->id_currency price=$order_invoice->total_shipping_tax_excl}{/if}</td>
        </tr>
    {/if}
    {assign value=$order_invoice->total_paid_tax_incl - $order_invoice->total_paid_tax_excl var=total_tax}
    {if $total_tax > 0}
        <tr>
            <td class="grey">
            {$hs_pos_i18n.total|escape:'htmlall':'UTF-8'} ({if $group_price_display_method}{$hs_pos_i18n.tax_incl|escape:'htmlall':'UTF-8'}{else}{$hs_pos_i18n.tax_excl|escape:'htmlall':'UTF-8'}{/if})
        </td>
        <td class="white">
            {if $group_price_display_method}
                {displayPrice currency=$order->id_currency price=$order_invoice->total_paid_tax_incl}
            {else}    
                {displayPrice currency=$order->id_currency price=$order_invoice->total_paid_tax_excl}
            {/if}
        </td>
    </tr>
    <tr>
        <td class="grey">
            {$hs_pos_i18n.total_tax|escape:'htmlall':'UTF-8'}
        </td>
        <td class="white">{displayPrice currency=$order->id_currency price=$total_tax}</td>
    </tr>
{/if}
<tr class="bold big">
    <td class="grey">
        {$hs_pos_i18n.total|escape:'htmlall':'UTF-8'}
    </td>
    <td class="white">
        {displayPrice currency=$order->id_currency price=$order_invoice->total_paid_tax_incl}
    </td>
</tr>
</table>
