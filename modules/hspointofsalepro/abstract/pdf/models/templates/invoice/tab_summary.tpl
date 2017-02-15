{**
* RockPOS - Point of Sale for PrestaShop
*
* @author    Hamsa Technologies
* @copyright Hamsa Technologies
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*}

<table id="summary-tab" border="0" width="100%" cellpadding="0" cellspacing="0" style="margin:0;">
    <tr>
        <th class="header small" valign="middle">{$hs_pos_i18n.invoice_number|escape:'htmlall':'UTF-8'}</th>
        <th class="header small" valign="middle">{$hs_pos_i18n.invoice_date|escape:'htmlall':'UTF-8'}</th>
        <th class="header small" valign="middle">{$hs_pos_i18n.order_reference|escape:'htmlall':'UTF-8'}</th>
        <th class="header small" valign="middle">{$hs_pos_i18n.order_date|escape:'htmlall':'UTF-8'}</th>
            {if $addresses.invoice->vat_number}
            <th class="header small" valign="middle">{$hs_pos_i18n.vat_number|escape:'htmlall':'UTF-8'}</th>
            {/if}
    </tr>
    <tr>
        <td class="center small white">{$invoice_number|escape:'html':'UTF-8'}</td>
        <td class="center small white">{dateFormat date=$order->invoice_date full=0}</td>
        <td class="center small white">{$order->getUniqReference()|escape:'htmlall':'UTF-8'}</td>
        <td class="center small white">{dateFormat date=$order->date_add full=0}</td>
        {if $addresses.invoice->vat_number}
            <td class="center small white">
                {$addresses.invoice->vat_number|escape:'htmlall':'UTF-8'}
            </td>
        {/if}
    </tr>
</table>
