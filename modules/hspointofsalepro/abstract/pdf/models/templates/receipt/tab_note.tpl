{**
* RockPOS - Point of Sale for PrestaShop
*
* @author    Hamsa Technologies
* @copyright Hamsa Technologies
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*}
{if !empty($order->pos_note) && $order->pos_show_note}
    <br />
    <table class="table" cellspacing="0" cellpadding="0">
        <tr>
            <td class="custom_text">{$hs_pos_i18n.note|escape:'htmlall':'UTF-8'}: {$order->pos_note|escape:'quotes':'UTF-8'}</td>
        </tr>
    </table>
{/if}