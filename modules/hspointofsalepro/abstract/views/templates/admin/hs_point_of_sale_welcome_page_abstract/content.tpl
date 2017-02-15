{**
* RockPOS - Point of Sale for PrestaShop
*
* @author    Hamsa Technologies
* @copyright Hamsa Technologies
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*}

<form id="welcome_page" class="form-horizontal" enctype="multipart/form-data" method="post" action="{$link_module_homepage|escape:'htmlall':'UTF-8'}">
    <div  class="panel {if (!$is_prestashop_16)}prestashop_15{/if}">

        <div class="form-group ">
            <p class="title_block">
                {assign value='<span class="module_name">'|cat:$module_display_name var=module_name_text}
                {assign value=$module_version|cat:'</span>' var=module_version_text}
                {$hs_pos_i18n.welcome_to|escape:'quotes':'UTF-8'|sprintf:$module_name_text:$module_version_text}
            </p>
            <p class="description">
                {$hs_pos_i18n.an_awesome_prestashop_solution_provided_by_prestamonster|escape:'htmlall':'UTF-8'}
            </p>

        </div>
        <div class="form-group ">
            <p class="title_block">
                {$hs_pos_i18n.change_log|escape:'htmlall':'UTF-8'}
            </p>
            {foreach from=$change_logs item='change_log' key='version' name='list_change_log'}
                <div class="col-lg-9 {if $smarty.foreach.list_change_log.first}first{else}other{/if}">
                    <span class="under_line">{$version|escape:'htmlall':'UTF-8'}</span>
                    <ul>
                        {foreach from=$change_log item='log'}
                            <li> - {$log|escape:'htmlall':'UTF-8'}</li>
                            {/foreach}
                    </ul>
                    {if $change_logs|@count > 1 && $smarty.foreach.list_change_log.first}
                        <p class='read_more'>{$hs_pos_i18n.read_more|escape:'htmlall':'UTF-8'}</p>
                    {/if}
                </div>
            {/foreach}
        </div>
        <div class="form-group ">
            <p class="title_block">
                {$hs_pos_i18n.share_your_reviews|escape:'htmlall':'UTF-8'}
            </p>
            <p class="sub_title">
                {assign value='<span class="vote_star"><a href="'|cat:PosConstants::LINK_TO_ADDON_PAGE|cat:'" target="_blank">'|cat:$hs_pos_i18n.rating_icon|cat:'</a></span>' var=rating_link}
                {assign value='<a href="'|cat:PosConstants::LINK_TO_ADDON_PAGE|cat:'" target="_blank">'|cat:'addons.prestashop.com'|cat:'</a>' var=addon_link}
                {$hs_pos_i18n.add_your_on_to_help_us_improve_continuously|escape:'quotes':'UTF-8'|sprintf:{$rating_link|escape:'quotes':'UTF-8'}:{$addon_link|escape:'quotes':'UTF-8'}:{$module_display_name|escape:'quotes':'UTF-8'}}
            </p>
            <p class="sub_title">
                {$hs_pos_i18n.and_as_a_result_you_will_get_more_values_from_us|escape:'htmlall':'UTF-8'}
            </p>
            <p class="description">
                {assign value='<a href="'|cat:PosConstants::LINK_TO_ADDON_PAGE|cat:'" target="_blank">'|cat:$hs_pos_i18n.prestashop_addons|cat:'</a>' var=prestashop_addons_link}
                {$hs_pos_i18n.just_log_into_with_your_credentials_then_visit_this_page_and_look_for_the_right_order_number|escape:'quotes':'UTF-8'|sprintf:{$prestashop_addons_link|escape:'quotes':'UTF-8'}}
            </p>
            <a href="{$link_to_addon_page|escape:'htmlall':'UTF-8'}" target="_blank">
                {$link_to_addon_page|escape:'htmlall':'UTF-8'}
            </a>
        </div>
        <div class="form-group ">
            <p class="title_block">
                {$hs_pos_i18n.looking_for_even_better_prestashop_modules|escape:'htmlall':'UTF-8'}
            </p>
            <p class="sub_title">
                {assign value='<a href="'|cat:PosConstants::LINK_TO_PRESTAMONSTER|cat:'" target="_blank">PrestaMonster</a>' var=prestamonster_link}
                {$hs_pos_i18n.take_a_look_at_all_modules_developed_by|escape:'quotes':'UTF-8'|sprintf:{$prestamonster_link|escape:'quotes':'UTF-8'}}
            </p>

        </div>	

        <div class="form-group ">
            <div class="col-lg-9">
                <button class="goto_hompage">{$hs_pos_i18n.thank_you_and_take_me_to|escape:'htmlall':'UTF-8'|sprintf:{$module_display_name|escape:'quotes':'UTF-8'}}</button>
            </div>

        </div>

    </div>
</form>
{*End of content*}
<script>
    $(document).ready(function () {
        $('#welcome_page .other').hide();
        $(document).on('click', '#welcome_page .read_more', function () {
            $(this).hide();
            $('#welcome_page .other').show();
        });
    });
</script>
