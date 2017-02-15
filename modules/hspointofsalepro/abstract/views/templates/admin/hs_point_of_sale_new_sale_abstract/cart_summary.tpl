{**
* RockPOS - Point of Sale for PrestaShop
*
* @author    Hamsa Technologies
* @copyright Hamsa Technologies
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*}

<form class="order_summary clear">
    <table class="empty" style="{if $order_summary.products|@count gt 0}display:none{/if}">
        <tr>
            <td>
                {$hs_pos_i18n.no_products|escape:'htmlall':'UTF-8'}
            </td>
        </tr>
    </table>
    <table class="has_product bordered" style="{if $order_summary.products|@count eq 0}display:none{/if}">
        <tr>
            <td>
                {$hs_pos_i18n['total_products']|escape:'htmlall':'UTF-8'}
            </td>
            <td>
                <span class="total" id="cart_block_products_total">{convertPrice price=$order_summary.total_products}</span>
                <input type="hidden" class="pos_product_total_price" value="{$order_summary.total_products_wt|floatval}" />
            </td>
            <td class="delete-cell">&nbsp;</td>
        </tr>

        {if $order_summary.total_discounts > 0}
            <tr>
                <td>
                    {$hs_pos_i18n.total_discount_order|escape:'htmlall':'UTF-8'}
                </td>
                <td>
                    -<span class="reduction">{convertPrice price=$order_summary.total_discounts}</span>
                </td>
                <td class="delete-cell">&nbsp;</td>
            </tr>
        {/if}

        {if $order_summary.total_discounts_products > 0}
            <tr>
                <td>
                    {$hs_pos_i18n.total_discount_products|escape:'htmlall':'UTF-8'}
                </td>
                <td>
                    -<span class="reduction">{convertPrice price=$order_summary.total_discounts_products}</span>
                </td>
                <td class="delete-cell">&nbsp;</td>
            </tr>
        {/if}

        {if $order_summary.total_shipping > 0}
            <tr>
                <td>
                    {$hs_pos_i18n['shipping_cost']|escape:'htmlall':'UTF-8'}
                </td>
                <td>
                    <span class="shipping_cost">{convertPrice price=$order_summary.total_shipping}</span>
                </td>
                <td class="delete-cell">&nbsp;</td>
            </tr>
        {/if}

        <tr>

            <td>
                {$hs_pos_i18n['total_tax']|escape:'htmlall':'UTF-8'}
            </td>
            <td>
                <span class="tax_cost">{convertPrice price=$order_summary.total_tax}</span>
            </td>
            <td class="delete-cell">&nbsp;</td>
        </tr>

        <input type="hidden" value="{$order_summary.total_price|floatval}" name="total_order" class="total_order">
    </table>
</form>