{**
* RockPOS - Point of Sale for PrestaShop
*
* @author    Hamsa Technologies
* @copyright Hamsa Technologies
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*}
{if isset($order_discounts) && count($order_discounts) > 0}
    <table class="std table">
        <tbody>
            {foreach from=$order_discounts item=order_discount name=order_discount}
                <tr>
                    <td class="discount_name">
                        <span title="{if $order_discount.code}{$order_discount.code|escape:'htmlall':'UTF-8'} - {/if}{$order_discount.name|escape:'htmlall':'UTF-8'}{if $order_discount.reduction_percent > 0} - {$order_discount.reduction_percent|escape:'htmlall':'UTF-8'}%{else} - {convertPrice price=$order_discount.reduction_amount|escape:'htmlall':'UTF-8'}{/if}">
                            {$order_discount.name|escape:'htmlall':'UTF-8'|truncate:30:'...'}
                        </span>
                    </td>
                    <td>
                        <span title="{if $order_discount.code}{$order_discount.code|escape:'htmlall':'UTF-8'} - {/if}{$order_discount.name|escape:'htmlall':'UTF-8'}{if $order_discount.reduction_percent > 0} - {$order_discount.reduction_percent|escape:'htmlall':'UTF-8'}%{else} - {convertPrice price=$order_discount.reduction_amount|escape:'htmlall':'UTF-8'}{/if}">
                            {convertPrice price=$order_discount.value_real|escape:'htmlall':'UTF-8'}
                        </span>
                    </td>
                    <td>
                        <span class="delete_order_discount" data-id-cart-rule="{$order_discount.id_cart_rule|escape:'htmlall':'UTF-8'}">
                            <img src="../img/admin/delete.gif" class="icon"/>
                        </span>
                    </td>
                </tr>
            {/foreach}
        </tbody>
    </table>
{/if}
