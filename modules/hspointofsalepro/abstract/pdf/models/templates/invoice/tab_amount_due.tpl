{**
* RockPOS - Point of Sale for PrestaShop
*
* @author    Hamsa Technologies
* @copyright Hamsa Technologies
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*}

<table id="amount-due-tab" width="100%">
    <tr>
        <td class="payment center small grey bold" width="44%">{$hs_pos_i18n.amount_due|escape:'htmlall':'UTF-8'}</td>
        <td class="payment left white" width="56%">
            <table width="100%" border="0">
                <tr>
                    <td class="right small"></td>
                    <td class="right small">{displayPrice price=$amount_due currency=$order->id_currency}</td>
                </tr>
            </table>    
        </td>
    </tr>
</table>
