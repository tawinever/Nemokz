{**
* RockPOS - Point of Sale for PrestaShop
*
* @author    Hamsa Technologies
* @copyright Hamsa Technologies
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*}

<fieldset class='fieldset'>
    <legend>{$hs_pos_i18n.order_status|escape:'htmlall':'UTF-8'}</legend>
    <div class="block">
        <select class="order_state_option" name="orderState">
            {foreach from=$pos_order_states item=pos_order_state}
                <option value='{$pos_order_state.id_order_state|intVal}' {if $default_order_state == $pos_order_state.id_order_state}selected="selected"{/if}>{$pos_order_state.name|escape:'htmlall':'UTF-8'}</option>
            {/foreach}
        </select>
    </div>
</fieldset>


