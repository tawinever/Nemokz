{**
* RockPOS - Point of Sale for PrestaShop
*
* @author    Hamsa Technologies
* @copyright Hamsa Technologies
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*}

{if $delivery}
    <p>{$delivery|escape:'htmlall':'UTF-8'}</p>
{/if}
<p>
    <label> {$hs_pos_i18n['shipping_cost']|escape:'htmlall':'UTF-8'}</label> <span>{convertPrice price=$order_summary.total_shipping}</span>
</p>
<p>
    <label for="free_shipping"> {$hs_pos_i18n.free_shipping|escape:'htmlall':'UTF-8'}</label>
    <input type="checkbox" value="1" name="pos_free_shipping" id="pos_free_shipping" {if $free_shipping}checked="checked"{/if}>
</p>

