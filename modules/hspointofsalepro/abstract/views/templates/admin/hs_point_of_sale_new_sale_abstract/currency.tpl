{**
* RockPOS - Point of Sale for PrestaShop
*
* @author    Hamsa Technologies
* @copyright Hamsa Technologies
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*}

{if $currencies|@count > 1}
    <form class="setCurrency bootstrap" action="{$action_form|escape:'html':'UTF-8'}" enctype="multipart/form-data" method="post">
        <input type="hidden" value="0" class="is_reset_payment" name="is_reset_payment">
        <select name ='id_currency' class="changeCurrency fixed-width-xl">
            {foreach from=$currencies item=b_currency}
                <option {if $currency->id == $b_currency.id_currency}selected='selected'{/if} value='{$b_currency.id_currency|escape:'htmlall':'UTF-8'}'>
                    {$b_currency.name|escape:'html':'UTF-8'} - {$b_currency.sign|escape:'html':'UTF-8'}
                </option>
            {/foreach}
        </select>
    </form>
{/if}
