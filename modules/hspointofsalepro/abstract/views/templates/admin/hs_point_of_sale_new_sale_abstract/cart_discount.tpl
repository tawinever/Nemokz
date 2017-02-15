{**
* RockPOS - Point of Sale for PrestaShop
*
* @author    Hamsa Technologies
* @copyright Hamsa Technologies
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*}

<fieldset class='fieldset_block hiden_block'>
    <legend class="show_block"><i id="toggle_block_order_discount" class="icon-expand-alt"></i>&nbsp;{$hs_pos_i18n['order_discount']|escape:'htmlall':'UTF-8'}</legend>

    <div class="order_discount content_block clearfix block" style="display:none">
        <div class="list_order_discounts">
            {include file="./list_order_discounts.tpl"}
        </div>
        <div class="clearfix">
            <div class="discount_order_input">
                <select name="pos_order_discount_type" class="pos_order_discount_type">
                    {foreach from=$order_discount_types item=discount_type}
                        <option value="{$discount_type.value|escape:'htmlall':'UTF-8'}" {if PosConfiguration::get('POS_DEF_ORDER_DISCOUNT_TYPE')==$discount_type.value}selected="selected"{/if}>{$discount_type.name|escape:'htmlall':'UTF-8'}</option>
                    {/foreach}
                </select>
                <input type="text" size="4" class="pos_order_discount" id="pos_order_discount" value="" />
            </div>
            <div class="discount_order_button">
                <input class="btn_apply_order_discount button" type="submit" value="{$hs_pos_i18n.apply|escape:'htmlall':'UTF-8'}" />
            </div>
        </div>
        <div class="discount_amount clear">
            <span> ({$hs_pos_i18n.tax_included|escape:'htmlall':'UTF-8'})</span>
        </div>
        <div class="order_discount_error"></div>
    </div>

</fieldset>