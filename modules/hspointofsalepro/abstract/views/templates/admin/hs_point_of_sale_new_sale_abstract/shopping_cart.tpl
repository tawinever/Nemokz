{**
* RockPOS - Point of Sale for PrestaShop
*
* @author    Hamsa Technologies
* @copyright Hamsa Technologies
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*}

<span class="pos_ajax_running"><img class="image_loader" src="../img/loader.gif"></span>
<p style="{if $order_summary.products|@count gt 0}display:none{/if}" id="emptyCartWarning" class="warning">{$hs_pos_i18n.your_shopping_cart_is_empty|escape:'htmlall':'UTF-8'}</p>
<div id="order_detail_content" class="table_block">
    <table class="std table" style="{if $order_summary.products|@count eq 0}display:none{/if}">
        <thead>
            <tr>
                <th class="cart_product first_item" width="5%">{$hs_pos_i18n['product']|escape:'htmlall':'UTF-8'}</th>
                <th class="cart_product">{$hs_pos_i18n.description|escape:'htmlall':'UTF-8'}</th>
                <th class="cart_unit item" width="15%">{if $use_tax}{$hs_pos_i18n.unit_price_include_tax|escape:'htmlall':'UTF-8'}{else}{$hs_pos_i18n.unit_price_exclude_tax|escape:'htmlall':'UTF-8'}{/if}</th>
                <th class="cart_quantity item" width="9%">{$hs_pos_i18n.quantity|escape:'htmlall':'UTF-8'}</th>
                <th class="cart_discount item" width="18%">{$hs_pos_i18n['discount']|escape:'htmlall':'UTF-8'}</th>
                <th class="cart_total" width="7%">{$hs_pos_i18n['total']|escape:'htmlall':'UTF-8'}</th>
                <th class="cart_action last_item" width="7%">{$hs_pos_i18n.action|escape:'htmlall':'UTF-8'}</th>
            </tr>
        </thead>

        <tbody>
            {foreach from=$order_summary.products item=product name=productLoop}
                {assign var='productId' value=$product.id_product}
                {assign var='productAttributeId' value=$product.id_product_attribute}
                {assign var='quantityDisplayed' value=0}
                {include file="./shopping_cart_product_line.tpl"}
            {/foreach}
            {foreach from=$order_summary.gift_products item=product name=productLoop}
                {assign var='productId' value=$product.id_product}
                {assign var='productAttributeId' value=$product.id_product_attribute}
                {assign var='quantityDisplayed' value=0}
                {include file="./shopping_cart_product_line.tpl"}
            {/foreach}
        </tbody>
    </table>
</div>
