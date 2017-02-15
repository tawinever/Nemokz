<!-- Block user information module TOP  -->
{if $is_logged}
    <div class="header_user_info">
        <a href="{$link->getPageLink('my-account', true)|escape:'html':'UTF-8'}" title="{l s='View my customer account' mod='blockuserinfo'}" class="account" rel="nofollow"><span>{$cookie->customer_firstname} {$cookie->customer_lastname}</span></a>
    </div>
{/if}
<div class="header_user_info col-sm-3">
    {if $is_logged}
        <a class="logout" href="{$link->getPageLink('index', true, NULL, "mylogout")|escape:'html':'UTF-8'}" rel="nofollow" title="{l s='Log me out' mod='blockuserinfo'}">
            {l s='Sign out' mod='blockuserinfo'}
        </a>
    {else}
        <a class="login cherry-bg" href="{$link->getPageLink('my-account', true)|escape:'html':'UTF-8'}" rel="nofollow" title="{l s='Log in to your customer account' mod='blockuserinfo'}">
            Регистрация / Вход
        </a>
    {/if}
</div>
<!-- /Block usmodule TOP -->
