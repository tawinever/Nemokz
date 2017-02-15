{**
* RockPOS - Point of Sale for PrestaShop
*
* @author    Hamsa Technologies
* @copyright Hamsa Technologies
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*}
{*
IMPORTANT NOTE:
Header columns of this table needs to go with "width" attribute, so we PosGenerator can parse and read width of column.
*}
{if $order->isDiscount() && Configuration::get('POS_RECEIPT_SHOW_PROD_DISCOUNT')}
    {assign var="is_showing_discount" value="1"}
{else}
    {assign var="is_showing_discount" value="0"}
{/if}
{assign var="truncate_value" value="30"}
{if $is_showing_discount || Configuration::get('POS_RECEIPT_SHOW_UNIT_PRICE')}
    {assign var="width_column_name" value=46}
    {assign var="width_column_price" value="20"}
    {assign var="width_column_qty" value="12"}
    {assign var="width_column_total" value="22"}
{else}
    {assign var="width_column_name" value=58}
    {assign var="width_column_price" value="0"}
    {assign var="width_column_qty" value="12"}
    {assign var="width_column_total" value="30"}
{/if}

<table class="table" cellspacing="0" cellpadding="3">
    <tr>
        <td width="{$width_column_name|intval}%" class="table_header left">{$hs_pos_i18n.product|escape:'htmlall':'UTF-8'}</td>
        {if Configuration::get('POS_RECEIPT_SHOW_UNIT_PRICE') || $is_showing_discount}
            <td class="table_header right" width="{$width_column_price|intval}%">{$hs_pos_i18n.price|escape:'htmlall':'UTF-8'}</td>
        {/if}
        <td class="table_header center" width="{$width_column_qty|intval}%" >{$hs_pos_i18n.qty|escape:'htmlall':'UTF-8'}</td>
        <td class="table_header right" width="{$width_column_total|intval}%">{$hs_pos_i18n.total|escape:'htmlall':'UTF-8'}</td>
    </tr>
    <!-- PRODUCTS -->
    {foreach $order_details.products as $product}
        <tr>
            <td  style="text-align: left; font-family: 'Times New Roman', Times, serif; ">{'<br />'|implode:$product.meta_data|escape:'quotes':'UTF-8'}</td>
            {if (!empty($product.prices_to_show))}
                <td style="text-align: right;" >{'<br/> -'|implode:$product.prices_to_show|escape:'quotes':'UTF-8'}</td>
            {/if}
            <td style="text-align: center;">{$product.product_quantity|intval}</td>
            <td style="text-align: right;">
                {if $include_taxes}
                    {displayPrice currency=$order->id_currency price=$product.total_price_tax_incl}
                {else} 
                    {displayPrice currency=$order->id_currency price=$product.total_price_tax_excl}
                {/if}				                
            </td>
        </tr>
    {/foreach}
    <!-- END PRODUCTS -->
    <!-- Gift product -->
    {foreach $order_details.gift_products as $product}
        <tr>
            <td  style="text-align: left; font-family: 'Times New Roman', Times, serif; ">{'<br />'|implode:$product.meta_data|escape:'quotes':'UTF-8'}</td>
            {if (!empty($product.prices_to_show))}
                <td style="text-align: right;" >{$hs_pos_i18n.gift|escape:'htmlall':'UTF-8'}</td>
            {/if}
            <td style="text-align: center;">{$product.product_quantity|intval}</td>
            <td style="text-align: right;">
                {$hs_pos_i18n.gift|escape:'htmlall':'UTF-8'}				                
            </td>
        </tr>
    {/foreach}
    <!-- End gift product -->
</table>