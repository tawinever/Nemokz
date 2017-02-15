{**
* RockPOS - Point of Sale for PrestaShop
*
* @author    Hamsa Technologies
* @copyright Hamsa Technologies
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*}


<fieldset class='fieldset_block hiden_block'>
    <legend class="show_block"><i class="icon-expand-alt"></i>&nbsp;{$hs_pos_i18n.shipping|escape:'htmlall':'UTF-8'}</legend>
    <div class="shipping content_block" style="display: none;">
        {if !empty($delivery_option_list)}
            <div class="list_carriers">
                <p>
                    <label class="lable_delivery_option">{$hs_pos_i18n.delivery_option|escape:'htmlall':'UTF-8'}</label>
                    <select id="delivery_option" name="delivery_option">
                        {foreach from=$delivery_option_list item=delivery_option }
                            <option value='{$delivery_option.id_carrier|escape:'intval'}' data-id_address ="{$id_address|intVal}" {if $default_id_carrier == $delivery_option.id_carrier}selected="selected"{/if}>{$delivery_option.name|escape:'htmlall':'UTF-8'}</option>
                        {/foreach}
                    </select>
                </p>
            </div>
        {/if}
        <div class="shipping_cost">
            {include file="./shipping_cost.tpl"}
        </div>

    </div>
</fieldset>
