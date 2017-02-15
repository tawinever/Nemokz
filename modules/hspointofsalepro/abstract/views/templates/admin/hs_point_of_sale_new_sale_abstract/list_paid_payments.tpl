{**
* RockPOS - Point of Sale for PrestaShop
*
* @author    Hamsa Technologies
* @copyright Hamsa Technologies
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*}

{if count($cart->getPayments()) > 0}
    <input type="hidden" value="1" class="is_exist_payment" name="is_exist_payment">
	<span class="pos-title">{$hs_pos_i18n.total_paid|escape:'htmlall':'UTF-8'}:</span>
    <table class="bordered">
        <tbody>
            {foreach from=$cart->getPayments() item=paid_payment name=paid_payment}
                <tr>
                    <td>{$paid_payment.payment_name|escape:'htmlall':'UTF-8'}</td>
                    <td align="right">
                        {convertPrice price=$paid_payment.amount|escape:'htmlall':'UTF-8'}
                    </td>
                    <td class="delete-cell">
                        <a class="paid_payment_delete">
                            <img src="../img/admin/delete.gif" rel="{$paid_payment.id_pos_cart_payment|escape:'htmlall':'UTF-8'}" class="icon"/>
                        </a>
                    </td>
                </tr>
            {/foreach}
        </tbody>
    </table>
{else}
    <input type="hidden" value="0" class="is_exist_payment" name="is_exist_payment">
{/if}
