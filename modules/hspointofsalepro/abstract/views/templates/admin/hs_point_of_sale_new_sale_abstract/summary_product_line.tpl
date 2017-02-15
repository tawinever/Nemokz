{**
* RockPOS - Point of Sale for PrestaShop
*
* @author    Hamsa Technologies
* @copyright Hamsa Technologies
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*}

<tr>
    <td>{$product.product_id|escape:'htmlall':'UTF-8'}</td>
    <td>{$product.product_name|escape:'htmlall':'UTF-8'}{if isset($product.product_reference) && !empty($product.product_reference)} ({$hs_pos_i18n['reference']|escape:'htmlall':'UTF-8'} {$product.product_reference|escape:'htmlall':'UTF-8'}){/if}</td>
    <td>
        {if isset($product.gift)}
            {$hs_pos_i18n['gift']|escape:'htmlall':'UTF-8'}
        {else}
            {if (isset($product.reduction_amount) && $product.reduction_amount > 0) OR (isset($product.reduction_percent) && $product.reduction_percent > 0)}
                {displayPrice currency=$order->id_currency price=$product.price_without_specific_price}
            {else}
                {if $use_tax}
                    {displayPrice currency=$order->id_currency price=$product.unit_price_tax_incl}
                {else}
                    {displayPrice currency=$order->id_currency price=$product.unit_price_tax_excl}
                {/if}
            {/if}
        {/if}
    </td>
    <td>{$product.product_quantity|escape:'htmlall':'UTF-8'}</td>
    <td>
        {if isset($product.gift)}
            {$hs_pos_i18n['gift']|escape:'htmlall':'UTF-8'}
        {else}
            {if (isset($product.reduction_amount) && $product.reduction_amount > 0)}
                -{displayPrice currency=$order->id_currency price=$product.reduction_amount}
                {assign var="is_discount" value=1}
            {elseif (isset($product.reduction_percent) && $product.reduction_percent > 0)}
                -{$product.reduction_percent|escape:'htmlall':'UTF-8'}%
                {assign var="is_discount" value=1}
            {else}
                --
            {/if}
        {/if}
    </td>
    <td>
        {if isset($product.gift)}
            {$hs_pos_i18n['gift']|escape:'htmlall':'UTF-8'}
        {else}
                {if $use_tax}
                {displayPrice currency=$order->id_currency price=$product.total_price_tax_incl}
            {else} 
                {displayPrice currency=$order->id_currency price=$product.total_price_tax_excl}
            {/if}
        {/if}
</tr>
