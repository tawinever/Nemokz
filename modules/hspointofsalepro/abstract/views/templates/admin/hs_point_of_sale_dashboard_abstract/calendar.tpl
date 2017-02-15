{**
 * RockPOS - Point of Sale for PrestaShop
 * 
 * @author    Hamsa Technologies
 * @copyright Hamsa Technologies
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 *}
                     
<div id="dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div id="calendar" class="panel">
                <form action="{$action|escape:'htmlall':'UTF-8'}" method="post" id="calendar_form" name="calendar_form" class="form-inline clearfix">
                    <div class="btn-group pull-left">
                        <button type="button" name="submitDateDay" class="btn btn-default submitDateDay{if isset($preselect_date_range) && $preselect_date_range == 'day'} active{/if}">
                            {$hs_pos_i18n['day']|escape:'htmlall':'UTF-8'}
                        </button>
                        <button type="button" name="submitDateMonth" class="btn btn-default submitDateMonth{if (!isset($preselect_date_range) || !$preselect_date_range) || (isset($preselect_date_range) && $preselect_date_range == 'month')} active{/if}">
                            {$hs_pos_i18n['month']|escape:'htmlall':'UTF-8'}
                        </button>
                        <button type="button" name="submitDateYear" class="btn btn-default submitDateYear{if isset($preselect_date_range) && $preselect_date_range == 'year'} active{/if}">
                            {$hs_pos_i18n['year']|escape:'htmlall':'UTF-8'}
                        </button>                        
                    </div>
                    <div class="form-group list-employees">
                        <select name="report_id_employee" id="report_id_employee">
                            <option value="0">{$hs_pos_i18n['all_employees']|escape:'htmlall':'UTF-8'}</option>
                            {foreach from=$report_employees item=item}
                                <option value="{$item.id_employee|intval}" {if $item.id_employee == $id_employee}selected="selected"{/if}>{$item.firstname|escape:'htmlall':'UTF-8'} {$item.lastname|escape:'htmlall':'UTF-8'}</option>
                            {/foreach}
                        </select>
                    </div>
                    <input type="hidden" name="datepickerFrom" id="datepickerFrom" value="{$date_from|escape:'htmlall':'UTF-8'}" class="form-control">
                    <input type="hidden" name="datepickerTo" id="datepickerTo" value="{$date_to|escape:'htmlall':'UTF-8'}" class="form-control">
                    <input type="hidden" name="preselectDateRange" id="preselectDateRange" value="{if isset($preselect_date_range)}{$preselect_date_range|escape:'htmlall':'UTF-8'}{/if}" class="form-control">
                    <input type="hidden" name="current_date" id="current_date" value="{$current_date|escape:'quotes':'UTF-8'}" />
                    <div class="form-group pull-right">
                        <button id="datepickerExpand" class="btn btn-default" type="button">
                            <i class="icon-calendar-empty"></i>
                            <span class="hidden-xs">
                                {$hs_pos_i18n['from']|escape:'htmlall':'UTF-8'}
                                <strong class="text-info" id="datepicker-from-info">{$date_from|escape:'quotes':'UTF-8'}</strong>
                                {$hs_pos_i18n['to']|escape:'htmlall':'UTF-8'}
                                <strong class="text-info" id="datepicker-to-info">{$date_to|escape:'quotes':'UTF-8'}</strong>
                                <strong class="text-info" id="datepicker-diff-info"></strong>
                            </span>
                            <i class="icon-caret-down"></i>
                        </button>
                    </div>
                    {$calendar}
                </form>
            </div>
        </div>
    </div>
</div>