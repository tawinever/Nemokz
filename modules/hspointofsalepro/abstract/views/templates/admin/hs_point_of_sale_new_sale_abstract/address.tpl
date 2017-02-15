{**
* RockPOS - Point of Sale for PrestaShop
*
* @author    Hamsa Technologies
* @copyright Hamsa Technologies
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*}

<fieldset class='fieldset_block hiden_block'>
    <legend class="show_block"><i class="icon-expand-alt"></i>&nbsp;{$hs_pos_i18n.addresses|escape:'htmlall':'UTF-8'}</legend>
    <div class="addresses content_block clearfix" style="display:none">
        <div id="address_delivery">
            <h4>
                <i class="icon-truck"></i>
                {$hs_pos_i18n.delivery|escape:'htmlall':'UTF-8'}
            </h4>
            <div class="row-margin-bottom">
                <select id="address_delivery_option"></select>
            </div>
            <div class="list_formated_address">
                <div id="address_delivery_detail"></div>
                <a href="" id="edit_delivery_address" class="btn btn-default pull-left fancybox">» {$hs_pos_i18n['edit']|escape:'htmlall':'UTF-8'}</a>
            </div>
        </div>
        <div id="address_invoice">
            <h4>
                <i class="icon-file-text"></i>
                {$hs_pos_i18n['invoice']|escape:'htmlall':'UTF-8'}
            </h4>
            <div class="row-margin-bottom">
                <select id="address_invoice_option"></select>
            </div>
            <div class="list_formated_address">
                <div id="address_invoice_detail"></div>
                <a href="" id="edit_invoice_address" class="btn btn-default pull-left fancybox">» {$hs_pos_i18n['edit']|escape:'htmlall':'UTF-8'}</a>
            </div>
        </div>
        <div class="add_new_address" style="clear: both;"><a href="" id="add_new_address" class="fancybox"><i class="icon-plus-sign-alt"></i>  {$hs_pos_i18n.add_new_address|escape:'htmlall':'UTF-8'}</a></div>
    </div>
</fieldset>
