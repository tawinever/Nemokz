{**
* RockPOS - Point of Sale for PrestaShop
*
* @author    Hamsa Technologies
* @copyright Hamsa Technologies
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*}
<script type="text/javascript">
    ROCKPOS.idCart ={$cart->id|intval};
    ROCKPOS.version = '{$rockpos_version|escape:'htmlall':'UTF-8'}';
    var nbProducts = {$product_number|escape:'htmlall':'UTF-8'};
    var idCustomer = {$id_customer|escape:'htmlall':'UTF-8'};
    var amountDue = {$amount_due|escape:'htmlall':'UTF-8'};
    var currencyFormat = {$currency_format|escape:'htmlall':'UTF-8'};
    var priceDisplayPrecision = {$price_display_precision|escape:'htmlall':'UTF-8'};
    var decimals = '{$decimals|intval}';
    var collectingPayment = {$is_collecting_payment|escape:'htmlall':'UTF-8'};
    var dummyCustomer = {$dummy_customer|escape:'htmlall':'UTF-8'};
    var addresses = {$addresses|escape:'quotes':'UTF-8'};
    var idAddressDelivery = {$id_address_delivery|escape:'htmlall':'UTF-8'};
    var idAddressInvoice = {$id_address_invoice|escape:'htmlall':'UTF-8'};
    var linkAddAddress = '{$link_add_address|escape:'quotes':'UTF-8'}';
    var outputProductSearchConfigs = {$output_product_search_configurations|escape:'quotes':'UTF-8'};
    var allowOrderingOfOutOfStockProducts = {Configuration::get('POS_ORDER_OUT_OF_STOCK')|intval}
    
</script>

<div class="pos_container clearfix">
    <div id="pos_main_content" class="clearfix">
        <div class="module_info">{include file="./module_info.tpl"}</div>

        <div class="left_block">
            {*Top nav links*}
            <div id="displayPosTop">
                <div class="currency_block">
                    {include file="./currency.tpl"}
                </div>

                {hook h="displayPosTop"}

                <div id="pos_note">
                    <a class="block_add_note" href="#pos_add_note">
                        <i class="icon-file-text"></i>
                        {$hs_pos_i18n.add_note|escape:'htmlall':'UTF-8'}
                    </a>
                    {include file="./add_note.tpl"}
                </div>
            </div>

            {include file="./category_tree.tpl"}

            <div id="product_search" class="product_search">
                
            </div>

            <div id="displayFilterByCategoryBottom">
                {hook h="displayFilterByCategoryBottom"}
            </div>

            <div class="block_cart">
                {include file="./shopping_cart.tpl"}
            </div>
        </div>

        <div id="pos_cart_block" class="right_block">
            <div id="cart_nav" class="clearfix text-center block">
                <a class="btn_cancel_order pull-left" href="javascript:void(0)" title="{$hs_pos_i18n.cancel_order|escape:'htmlall':'UTF-8'}">
                    <i class="icon-trash"></i>
                </a>

                <span>{$hs_pos_i18n.cart|escape:'htmlall':'UTF-8'}(<span id="pos_cart_qty">{$order_summary.products|@count}</span>)</span>

                <a class="btn_add_other_order pull-right" href="javascript:void(0)" title="{$hs_pos_i18n.new_order|escape:'htmlall':'UTF-8'}">
                    <i class="icon-plus"></i>
                </a>

            </div>
            <div id="pos_customer_block" class="block">
                {include file="./search_customer.tpl"}

                <div class="block_addresses clearfix" style="display:none;">
                    {include file="./address.tpl"}
                </div>

                {*{if $customer->id && !$is_default_customer}*}
                    <div class="block_shipping clearfix" style="display:{if empty($delivery_option_list)}none{else}block{/if};">
                        {include file="./shipping.tpl"}
                    </div>
                {*{/if}*}
            </div>

            <div class="block_discount clearfix">
                {include file="./cart_discount.tpl"}
            </div>

            <div id="pos_summary" class="clearfix block">
                <div class="block_summary">
                    {include file="./cart_summary.tpl"}
                </div>

                {if PosConfiguration::get('POS_COLLECTING_PAYMENT')}
                    <div class="block_paid_payment" >
                        {include file="./list_paid_payments.tpl"}
                    </div>
                {/if}
            </div>

            {if PosConfiguration::get('POS_COLLECTING_PAYMENT')}
                <div class="block_payment">
                    {assign var="total_price" value="{$order_summary.total_price}"}
                    {include file="./payment.tpl"}
                </div>
            {/if}

            {hook h="displayPosCompleteSale"}
            
            <div class="order_status" style="display:none;">
                {include file="./order_status.tpl"}
            </div>

            <div class="pre_order">
                <input class="btn_pre_order button" type="button" value="{$hs_pos_i18n.pre_order|escape:'htmlall':'UTF-8'}"/>
            </div>
            <div class="complete_sale">
                <input class="btn_complete button" type="button" value="{$hs_pos_i18n.complete_sale|escape:'htmlall':'UTF-8'}"/>
            </div>
        </div>
    </div>

    {* Temporary disable this hook - Will enable it when re-design the whole module*}
    {*<div id="displayPosBottom" class="panel">
        {hook h="displayPosBottom"}
    </div>*}
</div>
{*End of content*}
<script src="{$js_path|escape:'quotes':'UTF-8'}apps/newsale20.js?v=2.4.2.3"></script>