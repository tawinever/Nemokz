{**
* RockPOS - Point of Sale for PrestaShop
*
* @author    Hamsa Technologies
* @copyright Hamsa Technologies
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*}
<table class="table" cellspacing="0" cellpadding="0">
    <tr>
        <td class="footer_thankyou">{$hs_pos_i18n.thank_you_for_shopping|escape:'htmlall':'UTF-8'}</td>
    </tr>
    <tr>
        <td></td>
    </tr>
    {if $message_on_receipt}
        <tr>
            <td class="custom_text">{$message_on_receipt|escape:'quotes':'UTF-8'}</td>
        </tr>
        <tr>
            <td></td>
        </tr>
    {/if}
    {if $shop_url}
        <tr>
            <td class="footer_url">{$shop_url|escape:'html':'UTF-8'}</td>
        </tr>
    {/if}
</table>