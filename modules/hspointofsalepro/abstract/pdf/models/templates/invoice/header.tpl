{**
* RockPOS - Point of Sale for PrestaShop
*
* @author    Hamsa Technologies
* @copyright Hamsa Technologies
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*}
<style>
    .header_title {
        font-weight: bold;
        font-size: 9pt; 
        width: 100%; 
        text-align: right;
        line-height: 150%;
        text-transform: uppercase;
    }
    .header_content {
        font-family: sans-serif;
        font-size: 8pt; 
        width: 100%; 
        text-align: right;
        line-height: 150%;
    }
    .shop_name{
        font-weight: bold;
        font-size: 11pt;
        color: #444;
        width: 100%;
        text-align: center;
    }
</style>
<table style="width: 100%">
    <tr>
        <td style="width: 50%; text-align: center;">
            <table style="width: 100%;">
                <tr>
                    <td>{if $logo_path}<img src="{$logo_path|escape:'quotes':'UTF-8'}" style="height:{$height_logo|intval}px;" />{/if}
                    </td>
                </tr>
                {if $display_shop_name}
                    <tr>
                        <td class="shop_name">{$shop_name|escape:'html':'UTF-8'}</td>
                    </tr>
                {/if}
            </table>
        </td>
        <td style="width: 50%; text-align: right;">
            <table style="width: 100%">
                <tr>
                    <td class="header_title">{$hs_pos_i18n.invoice|escape:'quotes':'UTF-8'}</td>
                </tr>
                <tr>
                    <td class="header_content">{$date|escape:'html':'UTF-8'}</td>
                </tr>
                <tr>
                    <td class="header_content">{$invoice_number|escape:'html':'UTF-8'}</td>
                </tr>
            </table>
        </td>
    </tr>
</table>

