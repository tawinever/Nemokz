{**
* RockPOS - Point of Sale for PrestaShop
*
* @author    Hamsa Technologies
* @copyright Hamsa Technologies
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*}
<table class="table" cellspacing="0" cellpadding="0">
    <tr>
        <td style="width: 50%;text-align: left">{if Configuration::get('POS_RECEIPT_SHOW_ORDER_INFO')}{$hs_pos_i18n.ref|escape:'htmlall':'UTF-8'}: {$order->reference|escape:'htmlall':'UTF-8'}{else}{$hs_pos_i18n.no|escape:'htmlall':'UTF-8'}: #{$order->id|escape:'htmlall':'UTF-8'}{/if}<br />
            {if $cashier_info}{$hs_pos_i18n.cashier|escape:'htmlall':'UTF-8'}: {$cashier_info|escape:'htmlall':'UTF-8'}{/if}
        </td>
        <td style="width: 50%; text-align: right">{dateFormat date=$order->date_add full=1}</td>
    </tr>
</table>