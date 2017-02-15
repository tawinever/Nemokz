{**
* RockPOS - Point of Sale for PrestaShop
*
* @author    Hamsa Technologies
* @copyright Hamsa Technologies
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*}

{extends file="helpers/options/options.tpl"}
{block name="leadin"}
    {if isset($smarty.post.currentFormTab)}
	{assign var="current_form_tab" value=$smarty.post.currentFormTab|escape:'quotes':'UTF-8'}
    {elseif isset($smarty.get.currentFormTab)}
        {assign var="current_form_tab" value=$smarty.get.currentFormTab|escape:'quotes':'UTF-8'}
    {else}
        {assign var="current_form_tab" value=general}
    {/if}
    <script>
        var currentFormTab = '{$current_form_tab|escape:'quotes':'UTF-8'}';
        var iso = '{$tiny_path_js|escape:'htmlall':'UTF-8'}';
        var pathCSS = '{$smarty.const._THEME_CSS_DIR_|escape:'htmlall':'UTF-8'}';
        var ad = '{$admin_base_url|escape:'htmlall':'UTF-8'}';

        $(document).ready(function(){
            tinySetup({
                    editor_selector :"autoload_rte"
            });
        });
    </script>
    <div class="productTabs">
        <ul class="tab nav nav-tabs">
            {foreach $option_list as $category => $categoryData}                                                                
            <li class="tab-row">				
                <a href="javascript:displayConfigurationTab('{$category|escape:'htmlall':'UTF-8'}');" id="configuration_link_{$category|escape:'htmlall':'UTF-8'}" class="tab-page">{$categoryData['tabTitle']|escape:'htmlall':'UTF-8'}</a>
            </li>
            {/foreach}
        </ul>
    </div>
   
{/block}
{block name="label"}
    {if isset($field['type']) && $field['type']=='pos_title'}

    {else}    
        {$smarty.block.parent}
    {/if} 
{/block}
{block name="field"}
    {if $field['type'] == 'pos_checkbox_list'}
        <div class="col-lg-9 ">            
            {foreach $field['list'] as $option}
                {if isset($option['type']) && $option['type'] == 'multi_checkbox'}
                    <div {if isset($option['class'])}class='{$option['class']|escape:'htmlall':'UTF-8'}'{/if}>
                        {if !empty($option['label'])}<label>{$option['label']|escape:'htmlall':'UTF-8'}</label>{/if}
                        {foreach $option['choices'] as $key => $value}
                           <p class="checkbox">
                                {strip}
                                        <input type="checkbox" name="{$option.key|escape:'htmlall':'UTF-8'}" id="{$option.key|escape:'htmlall':'UTF-8'}{$key|escape:'htmlall':'UTF-8'}_on" value="{$key|intval}"{if $key == $option['value']} checked="checked"{/if}{if isset($option['js'][$key])} {$option['js'][$key]|escape:'htmlall':'UTF-8'}{/if}/>
                                        {$value|escape:'htmlall':'UTF-8'}
                                {/strip}
                            </p>
                        {/foreach}
                    </div>
                {else if isset($option['type']) && $option['type'] == 'radio'}   
                     <div {if isset($option['class'])}class='{$option['class']|escape:'htmlall':'UTF-8'}'{/if}>
                        <label>{$option['label']|escape:'htmlall':'UTF-8'}</label>
                        {foreach $option['choices'] as $key => $value}
                                {strip}
                                        <input type="radio" name="{$option.key|escape:'html':'UTF-8'}" id="{$option.key|escape:'htmlall':'UTF-8'}{$key|escape:'htmlall':'UTF-8'}_on" value="{$key|intval}"{if $key == $option['value']} checked="checked"{/if}{if isset($option['js'][$key])} {$option['js'][$key]|escape:'htmlall':'UTF-8'}{/if}/>
                                        {$value|escape:'htmlall':'UTF-8'}
                                {/strip}
                        {/foreach}
                     </div>
                {else}    
                    <p {if isset($option.class)}class='{$option.class|escape:'htmlall':'UTF-8'}'{/if} class="checkbox">
                        <label for="{$option.key|escape:'htmlall':'UTF-8'}" class="control-label">
                            <input type="checkbox" name="{$option.key|escape:'htmlall':'UTF-8'}" value="{if isset($option.id)}{$option.id|escape:'htmlall':'UTF-8'}{else}1{/if}" {if isset($option.disabled) && $option.disabled}disabled class="default_receipt"{/if} {if $option.value}checked="checked"{/if} />
                            {$option.label|escape:'htmlall':'UTF-8'}
                        </label>
                    </p>
                {/if}
            {/foreach}	
        </div>
        <div class="col-lg-9 col-lg-offset-3">
            <div class="help-block">
                {if isset($field['desc'])}{$field['desc']|escape:'htmlall':'UTF-8'}{/if}
            </div>
        </div>           
    {else if $field['type'] == 'default_customer_field'}
        
        <div class="col-lg-5">
            <div id="ajax_choose_customer">
                <div class="input-group">
                    <input type="text" name="customer_autocomplete_input" value="" id="customer_autocomplete_input" autocomplete="off" class="ac_input" {if $field['placeholder']}placeholder="{$field['placeholder']|escape:'htmlall':'UTF-8'}"{/if}>
                    <span class="input-group-addon"><i class="icon-search"></i></span>
                </div>
            </div>
            <div id="pos_default_customer">
                {assign var="default_customer" value=$field['list']}
                {include file="../../display_default_customer.tpl"}
            </div>
        </div>
    {else if $field['type'] == 'pos_indexing'}
        {assign var="score_indexed_products" value='<strong>'|cat:$field['score_indexed_products']|cat:'.</strong>'}
        <div class="col-lg-9">
            <p>
                {$hs_pos_i18n.the_indexed_products_have_been_analyzed_by_and_will_appear_in_the_results_of_a_search|escape:'quotes':'UTF-8'|sprintf:{$module_display_name|escape:'quotes':'UTF-8'}}
                <br />
                {$hs_pos_i18n.indexed_products|escape:'htmlall':'UTF-8'|sprintf:$score_indexed_products|escape:'quotes':'UTF-8'}
            </p>
            <p>{$hs_pos_i18n.building_the_product_index_may_take_a_few_minutes|escape:'quotes':'UTF-8'}</p>
            <a class="btn-link" href="{$field['indexing_urls']['add_missing_products']|escape:'quotes':'UTF-8'}">
                <i class="icon-external-link-sign"></i>
                {$hs_pos_i18n.add_missing_products_to_the_index|escape:'htmlall':'UTF-8'}
            </a>
            <br />
            <a class="btn-link" href="{$field['indexing_urls']['rebuild_entire_index']|escape:'quotes':'UTF-8'}">
                <i class="icon-external-link-sign"></i>
                {$hs_pos_i18n.re_build_the_entire_index|escape:'htmlall':'UTF-8'}
            </a>
            <br />
            <br />
            <p>{$hs_pos_i18n.you_can_set_a_cron_job_that_will_build_your_index_using_the_following_url|escape:'htmlall':'UTF-8'}               
                <br />
                <b>- {$hs_pos_i18n.add_missing_products_to_the_index|escape:'htmlall':'UTF-8'}:</b>
                <br />
                {include "./_cron.tpl" url=$field['indexing_urls']['add_missing_product_cron_url']}
                <br />
                - {$hs_pos_i18n.re_build_the_entire_index|escape:'htmlall':'UTF-8'}:
                <br />
                {include "./_cron.tpl" url=$field['indexing_urls']['rebuild_entire_product_cron_url']}
            </p>
        </div>
    {else if $field['type'] == 'margin_of_receipt'}
        <div class="col-lg-9">
            <div class="pos_receipt_margin">
            <input type="text" name="POS_RECEIPT_MARGIN" value="{$field['value']|floatval}" size="5" class="form-control receipt_input">
            <a target="_blank" href="{$field['preview_receipt_url']|escape:'quotes':'UTF-8'}" style="margin-bottom:0" class="btn btn-link bt-icon confirm_leave pos_print_preview">
                {$hs_pos_i18n.print_preview|escape:'htmlall':'UTF-8'} <i class="icon-external-link-sign"></i>
            </a>
            </div>
            <div class="help-block custom_paper_width">
                {$hs_pos_i18n.actual_size|escape:'htmlall':'UTF-8'} (<strong>70 x 114 mm</strong>)
            </div>
        </div>
    {elseif $field['type'] == 'textarea'}
        <div class="col-lg-5">
                <textarea class="textarea-autosize {if isset($field['autoload_rte']) && $field['autoload_rte']}autoload_rte{/if}" name={$key|escape:'htmlall':'UTF-8'} cols="{$field['cols']|escape:'htmlall':'UTF-8'}" rows="{$field['rows']|escape:'htmlall':'UTF-8'}">{$field['value']|escape:'htmlall':'UTF-8'}</textarea>
                <div class="help-block">
                    {if isset($field['desc'])}
                        {if is_array($field['desc'])}
                            {foreach $field['desc'] as $desc}
                                {if is_array($desc)}
                                    <span id="{$desc.id|escape:'htmlall':'UTF-8'}">{$desc.text|escape:'htmlall':'UTF-8'}</span><br />
                                {else}
                                    {$desc|escape:'quotes':'UTF-8'}<br />
                                {/if}
                            {/foreach}
                        {else}
                            {$field['desc']|escape:'htmlall':'UTF-8'}
                        {/if}
                    {/if}    
                </div>
        </div> 
    {elseif $field['type'] == 'textareaLang'}
            <div class="col-lg-9">
                {foreach $field['languages'] AS $id_lang => $value}
                    <div class="row translatable-field lang-{$id_lang|intval}" {if $id_lang != $current_id_lang}style="display:none;"{/if}>
                        <div id="{$key|escape:'htmlall':'UTF-8'}_{$id_lang|intval}" class="col-lg-9" >
                            <textarea class="textarea-autosize {if isset($field['autoload_rte']) && $field['autoload_rte']}autoload_rte{/if}" name="{$key|escape:'htmlall':'UTF-8'}_{$id_lang|intval}">{$value|escape:'quotes':'UTF-8'|replace:'\r\n':"\n"}</textarea>
                        </div>
                        <div class="col-lg-2">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                {foreach $languages as $language}
                                {if $language.id_lang == $id_lang}{$language.iso_code|escape:'quotes':'UTF-8'}{/if}
                            {/foreach}
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            {foreach $languages as $language}
                                <li>
                                    <a href="javascript:hideOtherLanguage({$language.id_lang|intval});">{$language.name|escape:'htmlall':'UTF-8'}</a>
                                </li>
                            {/foreach}
                        </ul>
                    </div>

                </div>
            {/foreach}
        </div>    
    {elseif $field['type'] == 'pos_title'}    
        <div class="panel-heading">
            {if isset($field['title'])}{$field['title']|escape:'quotes':'UTF-8'}{/if}
        </div>
    {else}    
        {$smarty.block.parent}
    {/if}
{/block}