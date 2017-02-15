{**
* RockPOS - Point of Sale for PrestaShop
*
* @author    Hamsa Technologies
* @copyright Hamsa Technologies
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*}
<style>
    .fancybox-skin
    {
        padding: 15px 5px !important;
    }

    #ticketPrintGuardar {
        right: -58px;
        top: 172px;
    }
    .label_total{
        padding-right: 10px;
        font-weight: bold;
        text-align: right;
    }
    .printWrapperDer {
        background: none repeat scroll 0 0 #bdbdbd;
        border-bottom-right-radius: 5px;
        border-top-right-radius: 5px;
        cursor: pointer;
        padding: 6px;
        position: static;
    }
    #ticketPrintGuardar .print {
        background: url("../form-ok.png") no-repeat scroll -35px -13px rgba(0, 0, 0, 0);
        height: 35px;
        width: 32px;
    }
    .table tr td, .table tr th{
        font-family: helvetica;
        font-size: 12px;
    }
    .table tr th{
        border-top: 1px #000 solid;
        border-bottom: 1px #000 solid;
    }
    .table tr td
    {
        border-bottom: #000 dotted 1px;
    }
    .table tr
    {
        line-height: 206% !important;
    }
    .center
    {
        text-align: center;
        font-size: 12px;
    }
    .receipt .change_back_block {
        clear: both;
        width: 100%;
    }
    .receipt .change_back_title {
        padding-top:10px;
        padding-bottom:10px;
        font-weight: bold;
    }
    .receipt .change_back_payment {
        color: red;
        margin-left: 25px;
        font-weight: bold;
        font-size: x-large;
    }
</style>
{assign var="is_discount" value=0}
<div class="receipt">
    <fieldset class='fieldset'>
        <legend>{$hs_pos_i18n.summary|escape:'htmlall':'UTF-8'}</legend>
        <div class="control">
            {if $order->hasInvoice()}
            <input type="button" value="{$hs_pos_i18n.invoice|escape:'htmlall':'UTF-8'}" class="print_invoice button" rel="{$order->id|escape:'htmlall':'UTF-8'}">
            {/if}
            <input type="button" value="{$hs_pos_i18n.receipt|escape:'htmlall':'UTF-8'}" class="print_receipt button" rel="{$order->id|escape:'htmlall':'UTF-8'}">
            <input type="button" value="{$hs_pos_i18n.new_order|escape:'htmlall':'UTF-8'}" class="new_order button">
        </div>

        <p>&nbsp;</p>
        <p class="order_date">{$hs_pos_i18n.order_placed_on|escape:'htmlall':'UTF-8'} {dateFormat date=$order->date_add full=0}</p>
        <div class="clearfix">
            <div class="order_payment_method">
                <div class="order_id">
                    <p><strong>{$hs_pos_i18n.order_reference|escape:'htmlall':'UTF-8'}</strong>&nbsp;{$order->reference|escape:'htmlall':'UTF-8'}</p>
                </div>
                <div class="payment_method">
                    <p><strong>{$hs_pos_i18n.payment_methods|escape:'htmlall':'UTF-8'}:</strong></p>
                    <ul>
                        {foreach from=$cart->getPayments() item=paid_payment name=paid_payment}
                            <li>{$paid_payment.payment_name|escape:'htmlall':'UTF-8'}:
                                {displayPrice currency=$order->id_currency price=$paid_payment.amount}
                            </li>
                        {/foreach}
                    </ul>
                </div>
                {if $cart->getTotalChangeBack() > 0}
                    <div class="change_back_block">
                        <div class="change_back_title">{$hs_pos_i18n.change_back|escape:'htmlall':'UTF-8'}:</div>
                        <ul class="change_back_payment">
                            {foreach from=$cart->getPayments() item=paid_payment}
                                <li><strong>{$paid_payment.payment_name|escape:'htmlall':'UTF-8'}: {displayPrice price=$paid_payment.change currency=$order->id_currency}</strong></li>
                            {/foreach}
                        </ul>
                    </div>
                {/if}
            </div>
           
            {if !$is_guest_checkout}
                <div class="invoicing">
                    <p><strong>{$hs_pos_i18n.invoicing|escape:'htmlall':'UTF-8'}:</strong></p>
                    {$formatted_invoice_address|escape:'quotes':'UTF-8'}
                </div>
            {/if}
        </div>

        <div class="clear">&nbsp;</div>

        <div class="list_products">
            <table class="std table">
                <thead>
                    <tr>
                        <th>{$hs_pos_i18n['id']|escape:'htmlall':'UTF-8'}</th>
                        <th>{$hs_pos_i18n.product_name|escape:'htmlall':'UTF-8'}</th>
                        <th>{$hs_pos_i18n['price']|escape:'htmlall':'UTF-8'}</th>
                        <th>{$hs_pos_i18n.quantity|escape:'htmlall':'UTF-8'}</th>
                        <th>{$hs_pos_i18n['discount']|escape:'htmlall':'UTF-8'}</th>
                        <th>{$hs_pos_i18n['total']|escape:'htmlall':'UTF-8'}</th>
                    </tr>
                </thead>
                <tbody>
                    {foreach from=$order_details.products item=product }
                        {include file="./summary_product_line.tpl"}
                    {/foreach}
                    {foreach from=$order_details.gift_products item=product }
                        {include file="./summary_product_line.tpl"}
                    {/foreach}
                    {foreach $cart_rules as $cart_rule}
                        <tr>
                            <td>&nbsp;</td>
                            <td colspan="3">{$cart_rule.name|escape:'htmlall':'UTF-8'}</td>
                            <td>
                                - {displayPrice currency=$order->id_currency price=$cart_rule.pos_value}
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                    {/foreach}
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5" class="label_total">{$hs_pos_i18n.sub_total|escape:'htmlall':'UTF-8'}</td>
                        <td class="total">{if $use_tax}{displayPrice currency=$order->id_currency price=($order->total_products_wt - $order_details.gift_total_order_tax_incl)}{else}{displayPrice currency=$order->id_currency price=($order->total_products - $order_details.gift_total_order_tax_excl)}{/if}</td>
                    </tr>
                    {if $use_tax}
                        {assign value=$order->total_discounts_tax_excl - $order->total_shipping_tax_incl - $order_details.gift_total_order_tax_incl var=total_discounts}
                    {else}    
                        {assign value=$order->total_discounts_tax_excl - $order->total_shipping_tax_excl - $order_details.gift_total_order_tax_excl var=total_discounts}
                    {/if}
                    {if $total_discounts > 0}
                        <tr>
                            <td colspan="5" class="label_total">{$hs_pos_i18n.order_discount|escape:'htmlall':'UTF-8'}</td>
                            <td class="total" >-{displayPrice currency=$order->id_currency price=$total_discounts}</td>
                        </tr>
                    {/if}
                    {if $order->total_shipping_tax_excl > 0 && !$is_free_shipping}
                        <tr>
                            <td colspan="5" class="label_total">{$hs_pos_i18n['shipping_cost']|escape:'htmlall':'UTF-8'}</td>
                            <td class="total">
                                {if $use_tax}
                                    {displayPrice currency=$order->id_currency price=$order->total_shipping_tax_incl}
                                {else}
                                    {displayPrice currency=$order->id_currency price=$order->total_shipping_tax_excl}
                                {/if}    
                            </td>
                        </tr>
                    {/if}
                    {assign value=$order->total_paid_tax_incl - $order->total_paid_tax_excl var=total_tax}
                    {if $total_tax > 0}
                        <tr>
                            <td colspan="5" class="label_total">{$hs_pos_i18n.total|escape:'htmlall':'UTF-8'} ({if $group_price_display_method}{$hs_pos_i18n.tax_incl|escape:'htmlall':'UTF-8'}{else}{$hs_pos_i18n.tax_excl|escape:'htmlall':'UTF-8'}{/if})</td>
                            <td class="total">
                                {if $group_price_display_method}
                                    {displayPrice currency=$order->id_currency price=$order->total_paid_tax_incl}
                                {else}    
                                    {displayPrice currency=$order->id_currency price=$order->total_paid_tax_excl}
                                {/if}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5" class="label_total">{$hs_pos_i18n.total_tax|escape:'htmlall':'UTF-8'}</td>
                            <td class="total">
                                {displayPrice currency=$order->id_currency price=$total_tax}
                            </td>
                        </tr>
                    {/if}
                    <tr>
                        <td colspan="5" class="label_total">{$hs_pos_i18n['total']|escape:'htmlall':'UTF-8'}</td>
                        <td class="total">{displayPrice currency=$order->id_currency price=$order->total_paid_tax_incl}</td>
                    </tr>
                    {assign value=$order->total_paid_tax_incl - $order->total_paid_real var=amount_due}
                    {if $amount_due > 0}
                         <tr>
                            <td colspan="5" class="label_total amount_due">{$hs_pos_i18n['amount_due']|escape:'htmlall':'UTF-8'}</td>
                            <td class="total amount_due">{displayPrice currency=$order->id_currency price=$amount_due}</td>
                        </tr>
                    {/if}
                </tfoot>
            </table>
        </div>
    </fieldset>
</div>