{**
* RockPOS - Point of Sale for PrestaShop
*
* @author    Hamsa Technologies
* @copyright Hamsa Technologies
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*}

<form name="product_search" class="product_search" method="post" action="#">
    <div class="message_error"></div>
    <div>
        <input type="text" name="keyword" class="input" id="barcode" placeholder="{$hs_pos_i18n.search_for_items|escape:'htmlall':'UTF-8'} ({$hs_pos_i18n.click_outside_to_add_items_using_a_barcode_scanner|escape:'htmlall':'UTF-8'})" autofocus>
    </div>
</form>
