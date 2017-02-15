{**
* RockPOS - Point of Sale for PrestaShop
*
* @author    Hamsa Technologies
* @copyright Hamsa Technologies
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*}
<div id="display_pos_customer_top">
    {hook h="displayPosCustomerTop" is_default_customer=$is_default_customer}
</div>
<div class="customer_form" {if $customer->id|escape:'htmlall':'UTF-8' && !$is_default_customer}style="display:none" {$customer->lastname|escape:'htmlall':'UTF-8'}{else} style="display:block" {/if}>
    <form name="customer_search" action="#" class="customer_search clearfix" method="post">
        <i class="icon-search"></i>

        <input type="text" name="keyword" class="input" placeholder="{$hs_pos_i18n.search_for_a_customer|escape:'htmlall':'UTF-8'}">

        <a class="fancybox add_new" href="{$admin_customer_url|escape:'htmlall':'UTF-8'}&addcustomer&liteDisplaying=1&submitFormAjax=1#" title="{$hs_pos_i18n.new_customer|escape:'htmlall':'UTF-8'}">
            <i class="icon-plus-circle"></i>
        </a>
        </a>
    </form>
</div>
<div class="info customer_info clearfix"
     {if $customer->id && !$is_default_customer}style="display:block"{else}style="display:none"{/if}>
    <a class="remove pull-right" href="javascript:void(0);" title="{$hs_pos_i18n.remove|escape:'htmlall':'UTF-8'}">
        <i class="icon-minus-circle"></i>
    </a>

    <span class="name">{if $customer->firstname && $customer->lastname && !$is_default_customer}{$customer->firstname|escape:'htmlall':'UTF-8'} {$customer->lastname|escape:'htmlall':'UTF-8'} {/if}</span>
    <span class="email sub-info">{if $customer->email && !$is_default_customer} {$customer->email|escape:'htmlall':'UTF-8'} {/if}</span>
    <span class="phone sub-info">{if isset($customer->phone) && !$is_default_customer} {$customer->phone|escape:'htmlall':'UTF-8'} {/if}</span>
    
</div>
<div id="display_pos_customer_bottom">
    {hook h="displayPosCustomerBottom" is_default_customer=$is_default_customer}
</div>
