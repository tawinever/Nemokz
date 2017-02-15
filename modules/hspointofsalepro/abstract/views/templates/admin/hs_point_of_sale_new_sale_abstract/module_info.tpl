{**
* RockPOS - Point of Sale for PrestaShop
* 
* @author    Hamsa Technologies
* @copyright Hamsa Technologies
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*}

{if !empty($new_versions) && $new_versions.success && !empty($new) &&  $news.success && !empty($validate_licence)}
    <fieldset>
        <legend><img src="{$module_logo|escape:'htmlall':'UTF-8'}" alt="" />{$version_name|escape:'htmlall':'UTF-8'}</legend>
            {if $new_versions.success}
            <div class="new_version">
                <ul>
                    {foreach from=$new_versions.data item=new_version}
                        <li>{$module_name|escape:'htmlall':'UTF-8'} {$hs_pos_i18n.version|escape:'htmlall':'UTF-8'} {$new_version.version|escape:'htmlall':'UTF-8'} {$hs_pos_i18n.released|escape:'htmlall':'UTF-8'} {$new_version.release|escape:'htmlall':'UTF-8'} <a target="_blank" href="{$new_version.url|escape:'quotes':'UTF-8'}"><span>{$hs_pos_i18n.download|escape:'htmlall':'UTF-8'}</span></a></li>
                    {/foreach}
                </ul>
            </div>
        {/if}
        {if $news.success }
            {if $news.data.news}
                <div class="news">    
                    <label>{$hs_pos_i18n.news_version|escape:'htmlall':'UTF-8'}</label><br />
                    <ul class="content">
                        {foreach from=$news.data.news item=new}
                            <li>{$new|escape:'htmlall':'UTF-8'}</li>
                        {/foreach}
                    </ul>
                </div>  
            {/if}
            {if $news.data.promotion}
                <div class="promotion">
                    <label>{$hs_pos_i18n.promotion|escape:'htmlall':'UTF-8'}</label><br />
                    <ul class="content">
                        {foreach from=$news.data.promotion item=promotion}
                            <li>{$promotion|escape:'htmlall':'UTF-8'}</li>
                        {/foreach}
                    </ul>
                </div>
            {/if}
            <div class="clear"></div>
        {/if}
    </fieldset>
{/if}