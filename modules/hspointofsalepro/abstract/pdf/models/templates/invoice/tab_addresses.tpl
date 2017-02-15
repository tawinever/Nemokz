{**
* RockPOS - Point of Sale for PrestaShop
*
* @author    Hamsa Technologies
* @copyright Hamsa Technologies
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*}
<table id="addresses-tab" cellspacing="0" cellpadding="0">
    <tr>
        <td width="33%">
            {if $cashier_info}
                {$hs_pos_i18n.cashier|escape:'htmlall':'UTF-8'}: {$cashier_info|escape:'quotes':'UTF-8'}
            {/if}
        </td>
        {if !$customer->isDefaultCustomer() && Configuration::get('POS_SHOW_CUS_INFO_ON_RECEIPT')}
            <td width="33%"><span class="bold">{$hs_pos_i18n.billing_address|escape:'htmlall':'UTF-8'}</span><br/><br/>
                {$invoice_address|escape:'quotes':'UTF-8'}
            </td>
            <td width="33%">{if $delivery_address}<span class="bold">{$hs_pos_i18n.delivery_address|escape:'htmlall':'UTF-8'}</span><br/><br/>
                {$delivery_address|escape:'quotes':'UTF-8'}
            {/if}
        </td>
        {/if}
        </tr>
    </table>
