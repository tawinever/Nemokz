{**
* RockPOS - Point of Sale for PrestaShop
*
* @author    Hamsa Technologies
* @copyright Hamsa Technologies
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*}
<style>
    .header_title {
        font-family: "Times New Roman", Times, serif;
        font-weight: bolder;
        font-size: {$font_size|escape:'htmlall':'UTF-8'}; 
        width: 100%; 
        text-align: center;
        line-height: 150%;
    }
    .header_content {
        font-family: "Times New Roman", Times, serif;
        font-size:{$font_size|escape:'htmlall':'UTF-8'}; 
        width: 100%; 
        text-align: left;
        line-height: 150%;
    }
</style>

<table style="width: 100%">
    {if $show_logo && $logo_path}
        <tr>
            <td style="text-align: center;">
                <img src="{$logo_path|escape:'html':'UTF-8'}" style="height:{$height_logo|intval}px;" />
            </td>
        </tr>
    {/if}
    {if $show_shop_name}
        <tr>
            <td class="header_title">{$shop_name|escape:'html':'UTF-8'}</td>
        </tr>
    {/if}
    {if $address}
        <tr>
            <td class="header_content">{$address|escape:'html':'UTF-8'}</td>
        </tr>
    {/if}
    {if $tel || $fax}
        <tr>
            <td class="header_content">{if $tel}{$hs_pos_i18n.tel|escape:'htmlall':'UTF-8'}: {$tel|escape:'html':'UTF-8'}{/if}<br/>{if $fax}{$hs_pos_i18n.fax|escape:'htmlall':'UTF-8'}: {$fax|escape:'html':'UTF-8'}{/if}</td>
        </tr>
    {/if}
    {if $tax_code}
        <tr>
            <td class="header_content">{$hs_pos_i18n.tax_code|escape:'htmlall':'UTF-8'}: {$tax_code|escape:'html':'UTF-8'}</td>
        </tr>
    {/if}
</table>
