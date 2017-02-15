{**
* RockPOS - Point of Sale for PrestaShop
*
* @author    Hamsa Technologies
* @copyright Hamsa Technologies
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*}

{if $order->isDiscount() && Configuration::get('PS_PDF_IMG_INVOICE')}
    {assign value='16%' var=width_product_name}
{elseif (!$order->isDiscount() && Configuration::get('PS_PDF_IMG_INVOICE'))} 
    {assign value='36%' var=width_product_name}
{elseif ($order->isDiscount() && !Configuration::get('PS_PDF_IMG_INVOICE'))} 
    {assign value='26%' var=width_product_name}
{else}
    {assign value='46%' var=width_product_name}
{/if}
<table class="product" width="100%" cellpadding="4" cellspacing="0">
    <thead>
        <tr>
            <th class="product header small" width="14%">{$hs_pos_i18n.reference|escape:'htmlall':'UTF-8'}</th>
                {if Configuration::get('PS_PDF_IMG_INVOICE')}
                <th class="product header small" width="10%">{$hs_pos_i18n.image|escape:'htmlall':'UTF-8'}</th>
                {/if}
            <th class="product header small" width="{$width_product_name|escape:'htmlall':'UTF-8'}">{$hs_pos_i18n.product|escape:'htmlall':'UTF-8'}</th>            
            <th class="product header small" width="10%">{$hs_pos_i18n.qty|escape:'htmlall':'UTF-8'}</th>            
            <th class="product header small" width="15%">{$hs_pos_i18n.unit_price|escape:'htmlall':'UTF-8'}</th>
                {if $order->isDiscount()}
                <th class="product header small" width="10%">{$hs_pos_i18n.discount|escape:'htmlall':'UTF-8'}</th>
                <th class="product header small" width="10%">{$hs_pos_i18n.sale_price|escape:'htmlall':'UTF-8'}</th>
                {/if}
            <th class="product header-right small" width="15%">{$hs_pos_i18n.total|escape:'htmlall':'UTF-8'}</th>
        </tr>
    </thead>

    <tbody>
        <!-- PRODUCTS -->
        {foreach $order_details.products as $product}
            {cycle values=["color_line_even", "color_line_odd"] assign=bgcolor_class}
            {include file="./tab_product_line.tpl"}
        {/foreach}
        <!-- END PRODUCTS -->
        <!-- GIFT PRODUCTS -->
        {foreach $order_details.gift_products as $product}
            {cycle values=["color_line_even", "color_line_odd"] assign=bgcolor_class}
            {include file="./tab_product_line.tpl"}
        {/foreach}
        <!-- END GIFT PRODUCTS -->
    </tbody>
</table>
