{**
* RockPOS - Point of Sale for PrestaShop
*
* @author    Hamsa Technologies
* @copyright Hamsa Technologies
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*}


<tr class="product {$bgcolor_class|escape:'htmlall':'UTF-8'}">

    <td class="product center">
        {$product.product_reference|escape:'htmlall':'UTF-8'}
    </td>
    {if Configuration::get('PS_PDF_IMG_INVOICE')}
        <td class="product center">
            {if isset($product.image_tag) && $product.image_tag}
                {$product.image_tag|escape:'quotes':'UTF-8'}
            {/if}
        </td>
    {/if}
    <td class="product left">{'<br />'|implode:$product.meta_data|escape:'quotes':'UTF-8'}</td>
    <td class="product center">{$product.product_quantity|intval}</td>                
    <td class="product center">
        {if isset($product.gift)}
            {$hs_pos_i18n.gift|escape:'htmlall':'UTF-8'}
        {else}
            {if (isset($product.reduction_amount) && $product.reduction_amount > 0) OR (isset($product.reduction_percent) && $product.reduction_percent > 0)}
                {displayPrice currency=$order->id_currency price=$product.price_without_specific_price}
            {else}
                {if $include_taxes}
                    {displayPrice currency=$order->id_currency price=$product.unit_price_tax_incl}
                {else} 
                    {displayPrice currency=$order->id_currency price=$product.unit_price_tax_excl}
                {/if}
            {/if}
        {/if}
    </td>                
    {if $order->isDiscount()}
        <td>
            {if isset($product.gift)}
                {$hs_pos_i18n.gift|escape:'htmlall':'UTF-8'}
            {else}
                {if (isset($product.reduction_amount) && $product.reduction_amount > 0)}
                    -{displayPrice currency=$order->id_currency price=$product.reduction_amount}
                {elseif (isset($product.reduction_percent) && $product.reduction_percent > 0)}
                    -{$product.reduction_percent|floatval}%
                {else}
                    --
                {/if}
            {/if}
        </td>
        <td class="product center">
            {if isset($product.gift)}
                {$hs_pos_i18n.gift|escape:'htmlall':'UTF-8'}
            {else}
                {if $include_taxes}
                    {displayPrice currency=$order->id_currency price=$product.unit_price_tax_incl}
                {else} 
                    {displayPrice currency=$order->id_currency price=$product.unit_price_tax_excl}
                {/if}                     
            {/if}                     
        </td>
    {/if}
    <td  class="product right">
        {if isset($product.gift)}
            {$hs_pos_i18n.gift|escape:'htmlall':'UTF-8'}
        {else}
            {if $include_taxes}
                {displayPrice currency=$order->id_currency price=$product.total_price_tax_incl}
            {else} 
                {displayPrice currency=$order->id_currency price=$product.total_price_tax_excl}
            {/if}			                    
        {/if}			                    
    </td>
</tr>
{foreach $product.customizedDatas as $customizationPerAddress}
    {foreach $customizationPerAddress as $customizationId => $customization}
        <tr class="customization_data {$bgcolor_class|escape:'htmlall':'UTF-8'}">
            <td class="center"> &nbsp;</td>
            <td>
                {if isset($customization.datas[$smarty.const._CUSTOMIZE_TEXTFIELD_]) && count($customization.datas[$smarty.const._CUSTOMIZE_TEXTFIELD_]) > 0}
                    <table style="width: 100%;">
                        {foreach $customization.datas[$smarty.const._CUSTOMIZE_TEXTFIELD_] as $customization_infos}
                            <tr>
                                <td style="width: 30%;">
                                    {$customization_infos.name|escape:'htmlall':'UTF-8'}
                                </td>
                                <td>{$customization_infos.value|escape:'htmlall':'UTF-8'}</td>
                            </tr>
                        {/foreach}
                    </table>
                {/if}
                {if isset($customization.datas[$smarty.const._CUSTOMIZE_FILE_]) && count($customization.datas[$smarty.const._CUSTOMIZE_FILE_]) > 0}
                    <table style="width: 100%;">
                        <tr>
                            <td style="width: 70%;">{$hs_pos_i18n.image|escape:'htmlall':'UTF-8'}</td>
                            <td>{count($customization.datas[$smarty.const._CUSTOMIZE_FILE_])|escape:'htmlall':'UTF-8'}</td>
                        </tr>
                    </table>
                {/if}
            </td>
            <td class="center">
                ({if $customization.quantity == 0}1{else}{$customization.quantity|intval}{/if})
            </td>
            {assign var=end value=($layout._colCount-3)}
            {for $var=0 to $end}
                <td class="center">
                    --
                </td>
            {/for}
        </tr>
    {/foreach}
{/foreach}
