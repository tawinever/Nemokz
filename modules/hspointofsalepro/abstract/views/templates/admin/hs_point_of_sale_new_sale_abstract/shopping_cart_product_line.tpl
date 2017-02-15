{**
* RockPOS - Point of Sale for PrestaShop
*
* @author    Hamsa Technologies
* @copyright Hamsa Technologies
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*}

{assign var="identifier" value="{$product.id_product}_{$product.id_product_attribute}_{$product.id_shop}"}
{if $product_permission}
    {assign var="product_link" value="index.php?controller=adminproducts&amp;id_product={$product.id_product}&amp;updateproduct&amp;token={getAdminToken tab='AdminProducts'}"}
{else}
    {assign var="product_link" value="{$link->getProductLink($product.id_product, $product.link_rewrite, $product.category, null, null, $product.id_shop)|escape:'html':'UTF-8'}"}
{/if}
<tr id="product_{$identifier|escape:'htmlall':'UTF-8'}" class="{if $smarty.foreach.productLoop.last}last_item{elseif $smarty.foreach.productLoop.first}first_item{/if}{if isset($customizedDatas.$productId.$productAttributeId) AND $quantityDisplayed == 0}alternate_item{/if} cart_item">
    <td class="cart_product_id">
        <a href="{$product_link|escape:'quotes':'UTF-8'}" target="_blank">
            <img src="{$link->getImageLink($product.link_rewrite, $product.id_image|escape:'htmlall':'UTF-8', 'small_default')}" alt="{$product.name|escape:'htmlall':'UTF-8'}" />
        </a>
    </td>
    <td class="cart_product">
        <a href="{$product_link|escape:'quotes':'UTF-8'}" target="_blank">
            <h5>{$product.name|escape:'htmlall':'UTF-8'}</h5>
        </a>
        {if !empty($product.attributes)} 
            {$product.attributes}
         {/if}   
    </td>
    <td class="cart_unit">
        {if empty($product.gift)}
        <span class="price">            
            {if $product.price_without_reduction != $product.price_with_reduction}
                <span class="old-price">{convertPrice price=$product.price_without_reduction}</span>
            {/if}
            <div class="input-group">
                <span class="input-group-addon">{$currency->sign|escape:'htmlall':'UTF-8'}</span>
                <input type="text" class="product_price_edit" data-product-price="{$identifier|escape:'htmlall':'UTF-8'}" value="{$product.pos_price|escape:'htmlall':'UTF-8'}" name="pos_price">
            </div>
        </span>
        {else}
            <span class="badge badge-success">
                {$hs_pos_i18n['gift']|escape:'htmlall':'UTF-8'}
            </span>
        {/if}
    </td>
    <td class="cart_quantity"{if isset($customizedDatas.$productId.$productAttributeId) AND $quantityDisplayed == 0} style="text-align: center;"{/if}>
        {if isset($customizedDatas.$productId.$productAttributeId) AND $quantityDisplayed == 0}<span id="cart_quantity_custom_{$identifier|escape:'htmlall':'UTF-8'}" >{$product.customizationQuantityTotal|escape:'htmlall':'UTF-8'}</span>{/if}
        {if !isset($customizedDatas.$productId.$productAttributeId) OR $quantityDisplayed > 0}
            {if empty($product.gift)}
            <div id="cart_quantity_button">
                <a href="javascript:void(0);" class="qty_up" title="up" rel='{$identifier|escape:'htmlall':'UTF-8'}'>+</a>
                {if $product.minimal_quantity < ($product.cart_quantity-$quantityDisplayed) OR $product.minimal_quantity <= 1}
                    <a href="javascript:void(0);" class="qty_down" title="down" rel='{$identifier|escape:'htmlall':'UTF-8'}'>-</a>
                {else}
                    <a href="javascript:void(0);" class="qty_down" title="down" rel='{$identifier|escape:'htmlall':'UTF-8'}'>-</a>
                {/if}
            </div>
            <input type="hidden" class="cart_quantity_input_hidden" value="{if $quantityDisplayed == 0 AND isset($customizedDatas.$productId.$productAttributeId)}{$customizedDatas.$productId.$productAttributeId|escape:'htmlall':'UTF-8'|@count}{else}{($product.cart_quantity-$quantityDisplayed)|escape:'htmlall':'UTF-8'}{/if}"id="quantity_{$identifier|escape:'htmlall':'UTF-8'}_hidden" name="quantity_{$identifier|escape:'htmlall':'UTF-8'}_hidden" />
            <input size="2" type="text" class="cart_quantity_input" value="{if $quantityDisplayed == 0 AND isset($customizedDatas.$productId.$productAttributeId)}{$customizedDatas.$productId.$productAttributeId|escape:'htmlall':'UTF-8'|@count}{else}{($product.cart_quantity-$quantityDisplayed)|escape:'htmlall':'UTF-8'}{/if}"  name="quantity_{$identifier|escape:'htmlall':'UTF-8'}" id="quantity_{$identifier|escape:'htmlall':'UTF-8'}"/>
            {else}
                <p class="center">
                {$product.cart_quantity|intval}
                </p>
            {/if}
        {/if}
    </td>
    <td class="hs_td_discount">
        {if empty($product.gift)}
        <input type="text" size="3" class="product_discount" value="{$product.reduction|floatval}" data-product="{$identifier|escape:'htmlall':'UTF-8'}"/>
        <input type="hidden" class="price_without_specific_price" value="{$product.price_without_reduction|floatval}"/>
        <select name="pos_reduction_type" class="pos_reduction_type">
            <option value="amount" {if $product.reduction_type == 'amount'}selected="selected"{/if}>{$hs_pos_i18n['amount']|escape:'htmlall':'UTF-8'}</option>
            <option value="percentage" {if $product.reduction_type == 'percentage'}selected="selected"{/if}>{$hs_pos_i18n.percentage|escape:'htmlall':'UTF-8'}</option>
        </select>
        {else}
            <span class="badge badge-success">
                {$hs_pos_i18n['gift']|escape:'htmlall':'UTF-8'}
            </span>
        {/if}
    </td>
    <td class="cart_total">
        {if empty($product.gift)}
            <span class="price" id="total_product_price_{$identifier|escape:'htmlall':'UTF-8'}">
                {if $use_tax}{displayPrice price=$product.total_wt}{else}{displayPrice price=$product.total}{/if}
            </span>
        {else}
            <span class="badge badge-success">
                {$hs_pos_i18n['gift']|escape:'htmlall':'UTF-8'}
            </span>
        {/if}
</td>
<td class="cart_action">
    {if empty($product.gift)}
        <a href="javascript:void(0);" class="remove_product" rel="{$product.id_product|escape:'intval'}_{$product.id_product_attribute|escape:'intval'}"><img src="../img/admin/delete.gif" alt="{$hs_pos_i18n.delete|escape:'htmlall':'UTF-8'}" class="icons"/></a>
    {/if}
</td>
</tr>
