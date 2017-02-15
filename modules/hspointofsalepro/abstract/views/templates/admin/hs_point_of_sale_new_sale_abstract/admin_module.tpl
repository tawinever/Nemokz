{**
* RockPOS - Point of Sale for PrestaShop
* 
* @author    Hamsa Technologies
* @copyright Hamsa Technologies
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*}

{if !empty($new_versions.data)}
    <br/>
    <strong>{$hs_pos_i18n.news_version|escape:'htmlall':'UTF-8'}</strong><br />
    {foreach from=$new_versions.data item=new_version}
        {$new_version.version|escape:'htmlall':'UTF-8'} {$hs_pos_i18n.released|escape:'htmlall':'UTF-8'} {$new_version.release|escape:'htmlall':'UTF-8'} <a target="_blank" href="{$new_version.url|escape:'quotes':'UTF-8'}"><span>{$hs_pos_i18n.download|escape:'htmlall':'UTF-8'}</span></a></br>
            {/foreach}
        {/if} 

{if !empty($news.data.news)}
    <strong>{$hs_pos_i18n.news|escape:'htmlall':'UTF-8'}</strong><br />
    {foreach from=$news.data.news item=new}
        {$new|escape:'htmlall':'UTF-8'}<br/>
    {/foreach}
{/if}

{if !empty($news.data.promotion)}
    <strong>{$hs_pos_i18n.promotion|escape:'htmlall':'UTF-8'}</strong><br/>
    {foreach from=$news.data.promotion item=promotion}
        {$promotion|escape:'htmlall':'UTF-8'}<br/>
    {/foreach}
{/if}
