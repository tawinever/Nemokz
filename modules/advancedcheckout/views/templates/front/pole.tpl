{**
* Module is prohibited to sales! Violation of this condition leads to the deprivation of the license!
*
* @category  Front Office Features
* @package   Advanced Checkout Module
* @author    Maxim Bespechalnih <2343319@gmail.com>
* @copyright 2013-2015 Max
* @license   license.txt in the module folder.
*}

<script type="text/javascript">
// <![CDATA[
var new_addr = "{$new_addr|escape:'quotes':'UTF-8'}";
var idSelectedCountry = {if isset($smarty.post.id_state)}{$smarty.post.id_state|intval}{else}{if isset($address->id_state)}{$address->id_state|intval}{else}false{/if}{/if};
var idSelectedCountry_i = {if isset($smarty.post.id_state_invoice)}{$smarty.post.id_state_invoice|intval}{else}{if isset($address_i->id_state)}{$address_i->id_state|intval}{else}false{/if}{/if};
var countries = new Array();
var countriesNeedIDNumber = new Array();
var countriesNeedZipCode = new Array();
{foreach from=$countries item='country'}
	{if isset($country.states) && $country.contains_states}
		countries[{$country.id_country|intval}] = new Array();
		{foreach from=$country.states item='state' name='states'}
			countries[{$country.id_country|intval}].push({ldelim}'id' : '{$state.id_state|intval}', 'name' : '{$state.name|escape:"html":"UTF-8"}'{rdelim});
		{/foreach}
	{/if}
	{if $country.need_identification_number}
		countriesNeedIDNumber.push({$country.id_country|intval});
	{/if}
	{if isset($country.zip_code_format)}
		countriesNeedZipCode[{$country.id_country|intval}] = "{$country.zip_code_format|escape:'html':'UTF-8'}";
	{/if}
{/foreach}
$(document).ready(function(){
	$('.hidepass').hide();
	$('#frsnconnect_form h3').hide();
	if(postcode_refresh){
		$('input[name="postcode"]').typeWatch({
			highlight: true, wait: 1500, captureLength: 0, callback: function(val){
				savepostcode(val, true, this);
			}
		});
	}
	
	if(city_refresh){
		$('input[name="city"]').typeWatch({
			highlight: true, wait: 1500, captureLength: 0, callback: function(val){
				savecity(val, true, this);
			}
		});
	}
});
//]]>
</script>

<div class="polya">
	<div id="delivery_div">
	{$HOOK_CREATE_ACCOUNT_TOP}
	<input autocomplete="off" type="hidden" value="1" name="ajx" />
	<input autocomplete="off" type="hidden" value="register" name="method" />
	{if $cn == 0}
		<input autocomplete="off" type="hidden" value="{$defcountry|intval}" name="id_country" id="id_country"/>
		<input autocomplete="off" type="hidden" value="{$defcountry|intval}" name="id_country_invoice" id="id_country_invoice"/>
	{/if}
	{if $logged}
		<br/>
		<div class="opc-form-group">
			<label for="id_address_delivery" class="w100 opc-control-label">{l s='Choose a delivery address:' mod='advancedcheckout'}</label>
			<div class="w100 opc-pr">
				<select onchange="updadvopcaddr($(this).val(), 'd');" class="address_select opc-form-control" name="id_address_delivery" id="id_address_delivery">
					{$list_addr|escape:'quotes':'UTF-8'}
				</select>
			</div>
		</div>
	{/if}
	{foreach from=$fields item=field}
		{if $field.type == 'input' and $field.name != 'passwd'}
			<div class="opc-form-group">
				<label class="w100 opc-control-label" for="{$field.name|escape:'html':'UTF-8'}">{$field.description|escape:'html':'UTF-8'}: {if $field.required}<sup>*</sup>{/if}</label>
				<div class="w100">
					<input data-tooltip="{$field.tooltip|escape:'html':'UTF-8'}" data-validate="{$field.validate|escape:'html':'UTF-8'}" autocomplete="off" type="text" class="opc-input-sm opc-form-control {if $field.required}is_required{/if} validate" id="{$field.name|escape:'html':'UTF-8'}" {if $field.group != '' && count(${$field.group})}{if isset({${$field.group}->$field.name|escape:'html':'UTF-8'})}value="{${$field.group}->$field.name|escape:'html':'UTF-8'}"{/if}{/if} name="{$field.name|escape:'html':'UTF-8'}" placeholder="{$field.description|escape:'html':'UTF-8'}" />
				</div>
			</div>
		{elseif $field.type == 'select' and $field.name == 'birthday'}
			<div class="select opc-form-group mb0 date-select">
				<label>{$field.description|escape:'html':'UTF-8'}: {if $field.required}<sup>*</sup>{/if}</label>
				<div class="notinline">
					<div class="opc-form-group opc-inline">
						<div class="w100 opc-pr">
							<select id="days" name="days" class="opc-form-control {if $field.required}is_required{/if} form-control">
								<option value="">-</option>
								{foreach from=$days item=day}
									<option value="{$day|escape:'html':'UTF-8'}" {if count(${$field.group})}{if isset({${$field.group}->$field.name|escape:'html':'UTF-8'}) && $s_d == $day} selected="selected"{/if}{/if}>{$day|escape:'html':'UTF-8'}&nbsp;&nbsp;</option>
								{/foreach}
							</select>
						</div>
					</div>
					<div class="opc-form-group opc-inline">
						<div class="w100 opc-pr">
							<select id="months" name="months" class="opc-form-control {if $field.required}is_required{/if} form-control">
								<option value="">-</option>
								{foreach from=$months key=k item=month}
									<option value="{$k|escape:'html':'UTF-8'}" {if count(${$field.group})}{if isset({${$field.group}->$field.name|escape:'html':'UTF-8'}) && $s_m == $k} selected="selected"{/if}{/if}>{l s=$month mod='advancedcheckout'}&nbsp;</option>
								{/foreach}
							</select>
						</div>
					</div>
					<div class="opc-form-group opc-inline">
						<div class="w100 opc-pr">
							<select id="years" name="years" class="opc-form-control {if $field.required}is_required{/if} form-control">
								<option value="">-</option>
								{foreach from=$years item=year}
									<option value="{$year|escape:'html':'UTF-8'}" {if count(${$field.group})}{if isset({${$field.group}->$field.name|escape:'html':'UTF-8'}) && $s_y == $year} selected="selected"{/if}{/if}>{$year|escape:'html':'UTF-8'}&nbsp;&nbsp;</option>
								{/foreach}
							</select>
						</div>
					</div>
					{*
						{l s='January' mod='advancedcheckout'}
						{l s='February' mod='advancedcheckout'}
						{l s='March' mod='advancedcheckout'}
						{l s='April' mod='advancedcheckout'}
						{l s='May' mod='advancedcheckout'}
						{l s='June' mod='advancedcheckout'}
						{l s='July' mod='advancedcheckout'}
						{l s='August' mod='advancedcheckout'}
						{l s='September' mod='advancedcheckout'}
						{l s='October' mod='advancedcheckout'}
						{l s='November' mod='advancedcheckout'}
						{l s='December' mod='advancedcheckout'}
					*}
				</div>
			</div>
		{elseif $field.type == 'radio' and $field.name == 'gender'}
			<div class="required clearfix gender-line mb0 opc-form-group" data-tooltip="{$field.tooltip|escape:'html':'UTF-8'}">
				<label class="fl">{$field.description|escape:'html':'UTF-8'}: {if $field.required}<sup>*</sup>{/if}</label>
				{foreach from=$genders key=k item=gender}	
					<div class="opc-radio opc-inline">
						<label for="id_gender{$gender->id_gender|intval}">
							<input class="opc-form-control" type="radio" name="id_gender" id="id_gender{$gender->id_gender|intval}" value="{$gender->id_gender|intval}" {if count($customer)}{if isset({$customer->id_gender|intval}) && $customer->id_gender|intval == {$gender->id_gender|intval}} checked="checked"{/if}{/if} />
							<span class="opc-text">{$gender->name|escape:'html':'UTF-8'}</span>
						</label>
					</div>
				{/foreach}
			</div>
		{elseif $field.type == 'input' && $field.name == 'passwd'}
		{if !$logged}
			{if !$field.required}
			<div class="opc-form-group">
				<div class="w100">
					<div class="opc-checkbox">
						<label for="pssw">
							<input data-tooltip="{$field.tooltip|escape:'html':'UTF-8'}" type="checkbox" name="pssw" id="pssw" value="1" autocomplete="off"/>
							<span class="opc-text">{l s='Registration?' mod='advancedcheckout'}</span>
						</label>
					</div>
				</div>
			</div>
			<div class="opc-form-group hidepass" style="display:none;">
				<label class="w100 opc-control-label" for="{$field.name|escape:'html':'UTF-8'}">{$field.description|escape:'html':'UTF-8'}: {if $field.required}<sup>*</sup>{/if}</label>
				<div class="w100">
					<input data-tooltip="{$field.tooltip|escape:'html':'UTF-8'}" data-validate="{$field.validate|escape:'html':'UTF-8'}" autocomplete="off" type="text" class="opc-form-control {if $field.required}is_required{/if} validate" id="{$field.name|escape:'html':'UTF-8'}"  name="{$field.name|escape:'html':'UTF-8'}" placeholder="{$field.description|escape:'html':'UTF-8'}" data-validate="is{$field.name|escape:'html':'UTF-8'}" />
				</div>
			</div>
			{else}
			<div class="opc-form-group">
				<label class="w100 opc-control-label" for="{$field.name|escape:'html':'UTF-8'}">{$field.description|escape:'html':'UTF-8'}: {if $field.required}<sup>*</sup>{/if}</label>
				<input type="hidden" name="pssw" id="pssw" value="1"/>
				<div class="w100">
					<input data-tooltip="{$field.tooltip|escape:'html':'UTF-8'}" data-validate="{$field.validate|escape:'html':'UTF-8'}" autocomplete="off" type="text" class="opc-form-control {if $field.required}is_required{/if} validate" id="{$field.name|escape:'html':'UTF-8'}"  name="{$field.name|escape:'html':'UTF-8'}" placeholder="{$field.description|escape:'html':'UTF-8'}" data-validate="is{$field.name|escape:'html':'UTF-8'}" />
				</div>
			</div>
			{/if}
		{/if}
		{elseif $field.type == 'select' && $field.name == 'id_country'}
			<div class="opc-form-group" data-tooltip="{$field.tooltip|escape:'html':'UTF-8'}">
				<label class="w100 opc-control-label" for="{$field.name|escape:'html':'UTF-8'}">{$field.description|escape:'html':'UTF-8'}: {if $field.required}<sup>*</sup>{/if}</label>
				<div class="w100 opc-pr">
					<select name="{$field.name|escape:'html':'UTF-8'}" id="{$field.name|escape:'html':'UTF-8'}" class="{if $field.required}is_required{/if} opc-form-control">
						{foreach from=$countries item=v}
							<option value="{$v.id_country|intval}" {if ($sl_country|intval == $v.id_country|intval)} selected="selected"{/if}>{$v.name|escape:'htmlall':'UTF-8'}</option>
						{/foreach}
					</select>
				</div>
			</div>
		{elseif $field.type == 'select' && $field.name == 'id_state'}
			<div class="opc-form-group" data-tooltip="{$field.tooltip|escape:'html':'UTF-8'}">
				<label class="w100 opc-control-label" for="{$field.name|escape:'html':'UTF-8'}">{$field.description|escape:'html':'UTF-8'}: {if $field.required}<sup>*</sup>{/if}</label>
				<div class="w100 opc-pr">
					<select name="{$field.name|escape:'html':'UTF-8'}" id="{$field.name|escape:'html':'UTF-8'}" class="{if $field.required}is_required{/if} opc-form-control">
						<option value="">-</option>
					</select>
				</div>
			</div>
		{elseif $field.type == 'textarea'}
			<div class="opc-form-group" data-tooltip="{$field.tooltip|escape:'html':'UTF-8'}">
				<label for="{$field.name|escape:'html':'UTF-8'}" class="w100 opc-control-label">{$field.description|escape:'html':'UTF-8'}: {if $field.required}<sup>*</sup>{/if}</label>
				<div class="w100 opc-input-icon opc-icon-right">
					<textarea data-validate="{$field.validate|escape:'html':'UTF-8'}" class="{if $field.required}is_required{/if} opc-form-control opc-elastic validate" name="{$field.name|escape:'html':'UTF-8'}" placeholder="{$field.description|escape:'html':'UTF-8'}" id="{$field.name|escape:'html':'UTF-8'}" cols="26" rows="3">{if $field.group != '' && count(${$field.group})}{if isset({${$field.group}->$field.name|escape:'html':'UTF-8'})}{${$field.group}->$field.name|escape:'html':'UTF-8'}{/if}{/if}</textarea>
					{if $field.name == 'address1'}
						<i class="fa fa-envelope"></i>
					{elseif $field.name == 'address2'}
						<i class="fa fa-envelope-alt"></i>
					{else}
						<i class="fa fa-comment"></i>
					{/if}
				</div>
			</div>
		{elseif $field.type == 'checkbox'}
			<div class="opc-form-group">
				<div class="w100">
					<div class="opc-checkbox">
						<label for="{$field.name|escape:'html':'UTF-8'}">
							<input data-tooltip="{$field.tooltip|escape:'html':'UTF-8'}" type="checkbox" name="{$field.name|escape:'html':'UTF-8'}" id="{$field.name|escape:'html':'UTF-8'}" value="1" {if count(${$field.group})}{if isset({${$field.group}->$field.name|escape:'html':'UTF-8'}) && ${$field.group}->$field.name == 1}checked="checked"{/if}{/if} autocomplete="off"/>
							<span class="opc-text">{$field.description|escape:'html':'UTF-8'}{if $field.required == '1'}<sup>*</sup>{/if}</span>
						</label>
					</div>
				</div>
			</div>
		{/if}
	{/foreach}
	</div>
	{if !$adv_ainvoice}
	<div class="opc-form-group">
		<div class="w100">
			<div class="opc-checkbox">
				<label for="invoice_address">
					<input type="checkbox" value="1" {if $open_invoice}checked="checked"{/if}name="invoice_address" id="invoice_address" autocomplete="off"/>
					<span class="opc-text">{l s='Please use another address for invoice' mod='advancedcheckout'}</span>
				</label>
			</div>
		</div>
	</div>
	<div id="invoice_div" style="display:none;">
		{if $logged}
			<div class="opc-form-group iaddress_div" >
				<label class="opc-control-label" data-tooltip="" for="iaddres_select">
					{l s='Choose a invoice address:' mod='advancedcheckout'}
				</label>
				<div class="w100 opc-pr">
					<select onchange="updadvopcaddr($(this).val(), 'i');" class="iaddres_select opc-form-control" name="iaddres_select" id="iaddres_select">
						{$list_addr_i|escape:'quotes':'UTF-8'}
					</select>
				</div>
			</div>
		{/if}
		{assign var="adi" value="address_i"}
		{foreach from=$fields item=field}
		{if $field.group == 'customer'}
			{if $field.type == 'input' && ($field.name == 'firstname' || $field.name == 'lastname')}
				<div class="opc-form-group">
					<label class="w100 opc-control-label" for="{$field.name|escape:'html':'UTF-8'}_invoice">{$field.description|escape:'html':'UTF-8'}: {if $field.required}<sup>*</sup>{/if}</label>
					<div class="w100">
						<input data-tooltip="{$field.tooltip|escape:'html':'UTF-8'}" data-validate="{$field.validate|escape:'html':'UTF-8'}" autocomplete="off" type="text" class="opc-input-sm opc-form-control {if $field.required}is_required{/if} validate" id="{$field.name|escape:'html':'UTF-8'}_invoice" {if count(${$adi})}{if isset({${$adi}->$field.name|escape:'html':'UTF-8'})}value="{${$adi}->$field.name|escape:'html':'UTF-8'}"{/if}{/if} name="{$field.name|escape:'html':'UTF-8'}_invoice" placeholder="{$field.description|escape:'html':'UTF-8'}" data-validate="is{$field.name|escape:'html':'UTF-8'}" />
					</div>
				</div>
			{/if}
		{elseif $field.group == 'address'}
			{if $field.type == 'input'}
				<div class="opc-form-group">
					<label class="w100 opc-control-label" for="{$field.name|escape:'html':'UTF-8'}_invoice">{$field.description|escape:'html':'UTF-8'}: {if $field.required}<sup>*</sup>{/if}</label>
					<div class="w100">
						<input data-tooltip="{$field.tooltip|escape:'html':'UTF-8'}" data-validate="{$field.validate|escape:'html':'UTF-8'}" autocomplete="off" type="text" class="opc-input-sm opc-form-control {if $field.required}is_required{/if} validate" id="{$field.name|escape:'html':'UTF-8'}_invoice" {if count(${$adi})}{if isset({${$adi}->$field.name|escape:'html':'UTF-8'})}value="{${$adi}->$field.name|escape:'html':'UTF-8'}"{/if}{/if} name="{$field.name|escape:'html':'UTF-8'}_invoice" placeholder="{$field.description|escape:'html':'UTF-8'}" data-validate="is{$field.name|escape:'html':'UTF-8'}" />
					</div>
				</div>
			{elseif $field.type == 'select' && $field.name == 'id_country'}
				<div class="opc-form-group" data-tooltip="{$field.tooltip|escape:'html':'UTF-8'}">
					<label class="w100 opc-control-label" for="{$field.name|escape:'html':'UTF-8'}_invoice">{$field.description|escape:'html':'UTF-8'}: {if $field.required}<sup>*</sup>{/if}</label>
					<div class="w100 opc-pr">
						<select name="{$field.name|escape:'html':'UTF-8'}_invoice" id="{$field.name|escape:'html':'UTF-8'}_invoice" class="{if $field.required}is_required{/if} opc-form-control">
							<option value="">-</option>
							{foreach from=$countries item=v}
								<option value="{$v.id_country|intval}" {if ($sl_country|intval == $v.id_country|intval)} selected="selected"{/if}>{$v.name|escape:'htmlall':'UTF-8'}</option>
							{/foreach}
						</select>
					</div>
				</div>
			{elseif $field.type == 'select' && $field.name == 'id_state'}
				<div class="opc-form-group" data-tooltip="{$field.tooltip|escape:'html':'UTF-8'}">
					<label class="w100 opc-control-label" for="{$field.name|escape:'html':'UTF-8'}_invoice">{$field.description|escape:'html':'UTF-8'}: {if $field.required}<sup>*</sup>{/if}</label>
					<div class="w100 opc-pr">
						<select name="{$field.name|escape:'html':'UTF-8'}_invoice" id="{$field.name|escape:'html':'UTF-8'}_invoice" class="{if $field.required}is_required{/if} opc-form-control">
							<option value="">-</option>
						</select>
					</div>
				</div>
			{elseif $field.type == 'textarea'}
				<div class="opc-form-group is_customer_param" data-tooltip="{$field.tooltip|escape:'html':'UTF-8'}">
					<label for="{$field.name|escape:'html':'UTF-8'}_invoice" class="w100 opc-control-label">{$field.description|escape:'html':'UTF-8'}: {if $field.required}<sup>*</sup>{/if}</label>
					<div class="w100 opc-input-icon opc-icon-right">
						<textarea data-validate="{$field.validate|escape:'html':'UTF-8'}" class="{if $field.required}is_required{/if} opc-form-control opc-elastic validate" name="{$field.name|escape:'html':'UTF-8'}_invoice" placeholder="{$field.description|escape:'html':'UTF-8'}" id="{$field.name|escape:'html':'UTF-8'}_invoice" cols="26" rows="3">{if count(${$adi})}{if isset({${$adi}->$field.name|escape:'html':'UTF-8'})}{${$adi}->$field.name|escape:'html':'UTF-8'}{/if}{/if}</textarea>
						<i class="fa fa-plus"></i>
					</div>
				</div>
			{/if}
		{/if}
		{/foreach}
	</div>
	{/if}
	{*{$HOOK_CREATE_ACCOUNT_FORM}*}
</div>