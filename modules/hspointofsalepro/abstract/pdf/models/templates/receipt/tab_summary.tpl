{**
* RockPOS - Point of Sale for PrestaShop
*
* @author    Hamsa Technologies
* @copyright Hamsa Technologies
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*}
<table class="table" cellspacing="0" cellpadding="0">
    <tr>
        <td style="border-top: 0.5px dashed #000;" class="total_left">{$hs_pos_i18n.sub_total|escape:'htmlall':'UTF-8'}</td>
        <td style="border-top: 0.5px dashed #000;" class="total_right">{if $include_taxes}{displayPrice currency=$order->id_currency price=$order->total_products_wt - $order_details.gift_total_order_tax_incl}{else}{displayPrice currency=$order->id_currency price=$order->total_products - $order_details.gift_total_order_tax_excl}{/if}</td>
    </tr>
    {if $include_taxes}
        {assign value=$order->total_discounts_tax_incl - $order->total_shipping_tax_incl - $order_details.gift_total_order_tax_incl var=total_discounts}
    {else}
        {assign value=$order->total_discounts_tax_excl - $order->total_shipping_tax_excl - $order_details.gift_total_order_tax_excl var=total_discounts}
    {/if}
    {if $total_discounts > 0}
        <tr>
            <td class="total_left">{$hs_pos_i18n.order_discount|escape:'htmlall':'UTF-8'}</td>
            <td class="total_right">-{displayPrice currency=$order->id_currency price=$total_discounts}</td>
        </tr>
        {if $order->getCartRules()}        
            {foreach from=$order->getCartRules() item=cart_rule}
                {if !$cart_rule.free_shipping}
                    <tr>
                        <td class="total_left">({$cart_rule.name|escape:'htmlall':'UTF-8'})</td>
                        <td class="total_right">
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
    {if $order->total_shipping_tax_excl > 0 && !$order->isFreeShipping()}
        <tr>
            <td class="total_left">{$hs_pos_i18n.shipping_cost|escape:'htmlall':'UTF-8'}</td>
            <td class="total_right">{if $include_taxes}{displayPrice currency=$order->id_currency price=$order->total_shipping_tax_incl}{else}{displayPrice currency=$order->id_currency price=$order->total_shipping_tax_excl}{/if}</td>
        </tr>
    {/if}
    {assign value=$order->total_paid_tax_incl - $order->total_paid_tax_excl var=total_tax}
    {if $total_tax > 0}
        <tr>
            <td class="total_left">{$hs_pos_i18n.total|escape:'htmlall':'UTF-8'} ({if $group_price_display_method}{$hs_pos_i18n.tax_incl|escape:'htmlall':'UTF-8'}{else}{$hs_pos_i18n.tax_excl|escape:'htmlall':'UTF-8'}{/if})</td>
            <td class="total_right">{if $group_price_display_method}{displayPrice currency=$order->id_currency price=$order->total_paid_tax_incl}{else}{displayPrice currency=$order->id_currency price=$order->total_paid_tax_excl}{/if}</td>
        </tr>
        <tr>
            <td class="total_left">{$hs_pos_i18n.total_tax|escape:'htmlall':'UTF-8'}</td>
            <td class="total_right">
                {displayPrice currency=$order->id_currency price=$total_tax}
            </td>
        </tr>
    {/if}

    <tr>
        <td class="total_left">{$hs_pos_i18n.total|escape:'htmlall':'UTF-8'}</td>
        <td class="total_right">{displayPrice currency=$order->id_currency price=$order->total_paid_tax_incl}</td>
    </tr>
    {assign value=$order->total_paid_tax_incl - $order->total_paid_real var=amount_due}
    {if $amount_due > 0}
        <tr>
            <td class="total_left">{$hs_pos_i18n.amount_due|escape:'htmlall':'UTF-8'}</td>
            <td class="total_right">{displayPrice currency=$order->id_currency price=$amount_due}</td>
        </tr>
    {/if}
</table>