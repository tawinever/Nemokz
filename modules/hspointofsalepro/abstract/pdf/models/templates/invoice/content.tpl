{**
* RockPOS - Point of Sale for PrestaShop
*
* @author    Hamsa Technologies
* @copyright Hamsa Technologies
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*}

{include file="./tab_style.tpl"}
<table width="100%" id="body" border="0" cellpadding="0" cellspacing="0" style="margin:0;">
    <!-- Invoicing -->
    <tr>
        <td colspan="12">
            {include file="./tab_addresses.tpl"}
        </td>
    </tr>
    <tr>
        <td colspan="12" height="10">&nbsp;</td>
    </tr>
    <!-- TVA Info -->
    <tr>
        <td colspan="12">
            {include file="./tab_summary.tpl"}
        </td>
    </tr>
    <tr>
        <td colspan="12" height="10">&nbsp;</td>
    </tr>
    <!-- Product -->
    <tr>
        <td colspan="12">
            {include file="./tab_product.tpl"}
        </td>
    </tr>
    <tr>
        <td colspan="12" height="10">&nbsp;</td>
    </tr>
    <!-- TVA -->
    <tr>
        <!-- Code TVA -->
        <td colspan="6" class="left">
            {$tax_tab|escape:'quotes':'UTF-8'}
        </td>
        <td colspan="1">&nbsp;</td>
        <!-- Calcule TVA -->
        <td colspan="5" rowspan="5" class="right">
            <table>
                <tr>
                    <td>
                        {include file="./tab_total.tpl"}  
                    </td>
                </tr>
                {if Configuration::get('POS_INVOICE_SHOW_SIGNATURE')}
                    <tr>
                        <td class="left" height="20px">
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td class="left">
                            {include file="./tab_signature.tpl"}
                        </td>
                    </tr>
                {/if}
            </table>

        </td>
    </tr>
    <tr>
        <td colspan="12" height="10">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="6" class="left">
            {include file="./tab_payment.tpl"}
        </td>
        <td colspan="1">&nbsp;</td>
    </tr>
    {if $amount_due > 0}
        <tr>
            <td colspan="6" class="left">
                {include file="./tab_amount_due.tpl"}
            </td>
            <td colspan="1">&nbsp;</td>
        </tr>         
    {/if}    
    <tr>
        <td colspan="12" height="10">&nbsp;</td>
    </tr>
    {if !empty($order->pos_note) && $order->pos_show_note}
        <tr>
            <td colspan="6" class="pos_note">
                <table>
                    <tr>
                        <td>{$hs_pos_i18n.note|escape:'htmlall':'UTF-8'}: {$order->pos_note|escape:'htmlall':'UTF-8'}</td>
                    </tr>
                </table>
            </td>
            <td colspan="1">&nbsp;</td>
        </tr>
    {/if}
    <tr>
        <td colspan="12" height="10">&nbsp;</td>
    </tr>

    <tr>
        <td colspan="12" height="35">&nbsp;</td>
    </tr>
    {if isset($custom_text) && !empty($custom_text)}
        <tr>
            <td colspan="12" class="left small custom_text">
                <table>
                    <tr>
                        <td>{$custom_text|escape:'quotes':'UTF-8'}</td>
                    </tr>
                </table>
            </td>
        </tr>
    {/if}
    <!-- Hook -->
    {if isset($HOOK_DISPLAY_PDF)}
        <tr>
            <td colspan="12" height="30">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
            <td colspan="10">
                {$HOOK_DISPLAY_PDF|escape:'quotes':'UTF-8'}
            </td>
        </tr>
    {/if}
</table>