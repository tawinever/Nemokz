{**
* RockPOS - Point of Sale for PrestaShop
*
* @author    Hamsa Technologies
* @copyright Hamsa Technologies
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*}

<table id="payment-tab" width="100%">
    <tr>
        <td class="payment center small grey bold" width="44%">{$hs_pos_i18n.payment_method|escape:'htmlall':'UTF-8'}</td>
        <td class="payment left white" width="56%">
            <table width="100%" border="0">
                {foreach from=$order_invoice->getOrderPaymentCollection() item=payment}
                    <tr>
                        <td class="right small" width="70%">{$payment->payment_method|escape:'htmlall':'UTF-8'} ({dateFormat date=$payment->date_add full=0})</td>
                        <td class="right small" width="30%">{displayPrice price=$payment->amount currency=$order->id_currency}</td>
                    </tr>
                {foreachelse}
                    <tr>
                        <td class="right small">{$hs_pos_i18n.no_payment|escape:'htmlall':'UTF-8'}</td>
                    </tr>
                {/foreach}
            </table>
        </td>
    </tr>
</table>
