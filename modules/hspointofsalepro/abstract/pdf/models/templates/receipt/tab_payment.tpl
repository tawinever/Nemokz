{**
* RockPOS - Point of Sale for PrestaShop
*
* @author    Hamsa Technologies
* @copyright Hamsa Technologies
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*}

<table class="table" cellspacing="0" cellpadding="0">
    {foreach from=$cart->getPayments() item=paid_payment}
        <tr>
            <td class="total_left">{$paid_payment.payment_name|escape:'htmlall':'UTF-8'}</td>
            <td class="total_right">{displayPrice price=$paid_payment.given_money currency=$order->id_currency}</td>
        </tr>
        {if $paid_payment.change > 0}
            <tr>
                <td class="total_left">{$hs_pos_i18n.change|escape:'htmlall':'UTF-8'}</td>
                <td class="total_right">{displayPrice price=$paid_payment.change currency=$order->id_currency}</td>
            </tr>
        {/if}
    {foreachelse}
        <tr>
            <td>{$hs_pos_i18n.no_payment|escape:'htmlall':'UTF-8'}</td>
        </tr>
    {/foreach}
</table>