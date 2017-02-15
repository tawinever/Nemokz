{**
* RockPOS - Point of Sale for PrestaShop
*
* @author    Hamsa Technologies
* @copyright Hamsa Technologies
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*}

<div id="total_due" class="clearfix">
    {$hs_pos_i18n.amount_due|escape:'htmlall':'UTF-8'}
    <span class="amount_due">{convertPrice price=$amount_due}</span>
</div>
<div class="block">
    <table>
        <tr>
            <td>{$hs_pos_i18n.payment_type|escape:'htmlall':'UTF-8'}</td>
            <td>{$hs_pos_i18n.given|escape:'htmlall':'UTF-8'}</td>
            <td>{$hs_pos_i18n.return|escape:'htmlall':'UTF-8'}</td>
        </tr>
        <tr>
            <td>
                <select class='payment_option'>
                    {foreach from=$pos_payments item=pos_payment name=pospayments}
                        <option value='{$pos_payment.id_pos_payment|escape:'intval'}' reference='{$pos_payment.reference|escape:'htmlall':'UTF-8'}' inputlabel='{$pos_payment.label|escape:'htmlall':'UTF-8'}' rule='{$pos_payment.rule|escape:'htmlall':'UTF-8'}' >{$pos_payment.payment_name|escape:'htmlall':'UTF-8'}</option>
                    {/foreach}
                </select>
            </td>

            <td>
                <input type='text'  value='{$amount_due_for_view|escape:'htmlall':'UTF-8'}' class='current_payment_amount given_money' name="given_money" size='7'/>
            </td>

            <td>
                <input type='text' class='return_money' name="return_money" size='7' disabled="disabled"/>
            </td>
        </tr>
        <tr>
            <td colspan="3" align="center">
                <input type='button' class='button btn_add_payment' value='{$hs_pos_i18n.add_payment|escape:'htmlall':'UTF-8'}'/>
            </td>
        </tr>
    </table>
</div>