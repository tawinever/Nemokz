{**
* RockPOS - Point of Sale for PrestaShop
*
* @author    Hamsa Technologies
* @copyright Hamsa Technologies
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*}

{if $default_customer->id}
    <div class="form-control-static">
        <button name="7" class="delete_default_customer btn button btn-default" type="button" data-id-customer="{$default_customer->id|escape:'html':'UTF-8'}">
            <i class="icon-remove text-danger"></i>
        </button>
        {$default_customer->firstname|escape:'html':'UTF-8'} {$default_customer->lastname|escape:'html':'UTF-8'}
        (<a target="_blank" href="{$link->getAdminLink('AdminCustomers')|escape:'html':'UTF-8'}&amp;id_customer={$default_customer->id|escape:'htmlall':'UTF-8'}&amp;updatecustomer">{$hs_pos_i18n.edit|escape:'htmlall':'UTF-8'}</a>)
    </div>
{/if}