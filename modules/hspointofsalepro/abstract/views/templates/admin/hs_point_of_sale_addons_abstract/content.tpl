{**
* RockPOS - Point of Sale for PrestaShop
*
* @author    Hamsa Technologies
* @copyright Hamsa Technologies
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*}

<div class="panel" id="add-ons">
    {foreach from=$addons item=addon key=module_name name=addon_loop}
        <div class="addon">
            <h3>
                <a href="{$addon['url']|escape:'quotes':'UTF-8'}" target="_blank" title="{$addon['name']|escape:'htmlall':'UTF-8'}">
                    {$addon['name']|escape:'htmlall':'UTF-8'}
                </a>
            </h3>
            <a class="module_image" href="{$addon['url']|escape:'quotes':'UTF-8'}" target="_blank" title="{$addon['name']|escape:'htmlall':'UTF-8'}">
                <img alt="{$addon['name']|escape:'htmlall':'UTF-8'}" title="{$addon['name']|escape:'htmlall':'UTF-8'}" src="{$image_addon_path|escape:'htmlall':'UTF-8'}{$module_name|escape:'htmlall':'UTF-8'}.png" />
            </a>
            <div class="addon_description">
                <p>{$addon['description']|escape:'htmlall':'UTF-8'|truncate:160:'...'}</p>
            </div>
            <div class="addon_action">
                {if $addon['status'] == PosAddon::STATUS_ENABLED && !$addon['cta_link']}
                    <a class="installed" href="javascript:void(0);">
                        {$addon['cta_label']|escape:'quotes':'UTF-8'}
                    </a>
                {else}
                    <a href="{$addon['cta_link']|escape:'quotes':'UTF-8'}" target="_blank">
                        {$addon['cta_label']|escape:'quotes':'UTF-8'}
                    </a>
                {/if}
            </div>
        </div>
    {/foreach}
</div>
