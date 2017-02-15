{**
* RockPOS - Point of Sale for PrestaShop
*
* @author    Hamsa Technologies
* @copyright Hamsa Technologies
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*}

<table cellspacing="0" cellpadding="0">
    <tr>
        <td class="center">
            <span class="star">---------------------------------</span>
        </td>
    </tr>
</table>
{if $order->id_address_invoice != $order->id_address_delivery}
    <table class="table" cellspacing="0" cellpadding="0">
        <tr>
            <td style="width: 50%;"><strong>{$hs_pos_i18n.delivery_to|escape:'htmlall':'UTF-8'}</strong><br />
                    {$delivery_address|escape:'quotes':'UTF-8'}
            </td>
            <td style="width: 50%"><strong>{$hs_pos_i18n.bill_to|escape:'htmlall':'UTF-8'}</strong><br />
                    {$invoice_address|escape:'quotes':'UTF-8'}
            </td>
        </tr>
    </table>
{else}
    <table class="table">
        <tr>
            <td><strong>{$hs_pos_i18n.delivery_to|escape:'htmlall':'UTF-8'} & {$hs_pos_i18n.bill_to|escape:'htmlall':'UTF-8'}</strong><br />
                {$invoice_address|escape:'quotes':'UTF-8'}
            </td>
        </tr>
    </table>
{/if}