{**
* RockPOS - Point of Sale for PrestaShop
*
* @author    Hamsa Technologies
* @copyright Hamsa Technologies
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*}
{include file="./tab_style.tpl"}
<div class="ticket_content" style="font-size: 8pt; width: 100%;">
    <!-- ADDRESSES -->
    {if !$customer->isDefaultCustomer() && PosConfiguration::get('POS_SHOW_CUS_INFO_ON_RECEIPT')}
        {include file="./tab_addresses.tpl"}
    {/if}
    <!-- END ADDRESSES -->
    <table class="table" cellspacing="0" cellpadding="0">
        <tr>
            <td class="center title">{$hs_pos_i18n.receipt|escape:'quotes':'UTF-8'}</td>
        </tr>
    </table>
    <!-- ORDER INFO TAB -->
    {include file="./tab_order_info.tpl"}
    <!-- / ORDER INFO TAB -->
    <br />
    <!-- PRODUCTS TAB -->
    {include file="./tab_product.tpl"}
    <!-- / PRODUCTS TAB -->
    {include file="./tab_summary.tpl"}
    <br />
    <!-- PAYMENT TAB -->
    {include file="./tab_payment.tpl"}
    <!-- / PAYMENT TAB -->
    <!-- NOTE TAB -->
    {include file="./tab_note.tpl"}
    <!-- / NOTE TAB -->
    <!-- SIGNATURE TAB -->
    {if Configuration::get('POS_RECEIPT_SHOW_SIGNATURE')}
        {include file="./tab_signature.tpl"}
    {/if}
    <!-- / SIGNATURE TAB -->
    <br />
    <!-- FOOTER TAB -->
    {include file="./tab_footer.tpl"}
    <!-- / FOOTER TAB -->
</div>
