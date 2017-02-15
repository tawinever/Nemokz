{**
* Module is prohibited to sales! Violation of this condition leads to the deprivation of the license!
*
* @category  Front Office Features
* @package   Advanced Checkout Module
* @author    Maxim Bespechalnih <2343319@gmail.com>
* @copyright 2013-2015 Max
* @license   license.txt in the module folder.
*}

{if $form != ''}
	{$form|default:''}
{else}
{literal}
<script>
	ps_version = '{/literal}{$ps_version|intval}{literal}';
	admin_module_ajax_url = '{/literal}{$controller_url|escape:'html':'UTF-8'}{literal}';
	admin_module_controller = "{/literal}{$controller_name|escape:'htmlall':'UTF-8'}{literal}";
	var tkn = "{/literal}{$tkn|escape:'html':'UTF-8'}{literal}";
	var idm = "{/literal}{$idm|intval}{literal}";
	var new_ps = "{/literal}{$nwps|intval}{literal}";
	var urldir = "{/literal}{$urldir|escape:'html':'UTF-8'}{literal}";
{/literal}
</script>
<!-- Module content -->
<div id="modulecontent" class="clearfix">
	<!-- Nav tabs -->
	<div class="col-lg-2">
		<div class="list-group change">
			<a href="#settings" class="list-group-item" data-toggle="tab"><i class="icon-cogs"></i> {l s='Main Settings' mod='advancedcheckout'}</a>
			<a href="#fields" class="list-group-item" data-toggle="tab"><i class="icon-move"></i> {l s='Fields Settings' mod='advancedcheckout'}</a>
			<a href="#up" class="list-group-item active" data-toggle="tab"><i class="icon-money"></i> {l s='Universal pay' mod='advancedcheckout'}</a>
			<a href="#dnp" class="list-group-item" data-toggle="tab"><i class="icon-plane"></i> {l s='Delivery & payments' mod='advancedcheckout'}</a>
			<a href="#pimage" class="list-group-item" data-toggle="tab"><i class="icon-camera"></i> {l s='Logo for Payments' mod='advancedcheckout'}</a>
			<a href="#pickup" class="list-group-item" data-toggle="tab"><i class="icon-suitcase"></i> {l s='Pickup settings' mod='advancedcheckout'}</a>
		</div>
		<div class="list-group">
			<a class="list-group-item"><i class="icon-info"></i> {l s='Version' mod='advancedcheckout'} {$module_version|escape:'htmlall':'UTF-8'}</a>
		</div>
	</div>
	<!-- Tab panes -->
	<div class="tab-content col-lg-10">
		<div class="tab-pane panel" id="settings">
			{$main_html|default:''}
		</div>
		<div class="tab-pane panel" id="fields">
			<center><div style="display: inline-block;"><p><p style="color:#F31717; font-size:16px; font-weight:900;text-align:center;">{l s=' -- Attention! A disabled field should not be required !!! --' mod='advancedcheckout'}</p></p></div></center>
			{$fields_html|default:''}
		</div>
		<div class="tab-pane panel" id="up">
			{$up_html|default:''}
		</div>
		<div class="tab-pane panel" id="dnp">
			{$dnp_html|default:''}
		</div>
		<div class="tab-pane panel" id="pimage">
			<div id="gif_loaded"></div>
			{$pimage_html|default:''}
		</div>
		<div class="tab-pane panel" id="pickup">
			<div id="gif_loaded"></div>
			{$pickup_html|default:''}
		</div>
	</div>
</div>
{/if}