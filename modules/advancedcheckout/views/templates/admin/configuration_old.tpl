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
	var tkn = "{/literal}{$tkn|intval}{literal}";
	var idm = "{/literal}{$idm|intval}{literal}";
	var new_ps = "{/literal}{$nwps|intval}{literal}";
	var urldir = "{/literal}{$urldir|escape:'html':'UTF-8'}{literal}";
{/literal}
</script>
<!-- Module content -->
<div id="modulecontent" class="clearfix">
	<!-- Nav tabs -->
	<div class="col-lg-2">
		<div class="productTabs" style="">
			<ul class="tab list-group change">
				<li class="tab-row">
					<a href="#settings" class="list-group-item" data-toggle="tab"><i class="icon-cogs"></i> {l s='Main Settings' mod='advancedcheckout'}</a>
				</li>
				<li class="tab-row">
					<a href="#fields" class="list-group-item" data-toggle="tab"><i class="icon-move"></i> {l s='Fields Settings' mod='advancedcheckout'}</a>
				</li>
				<li class="tab-row">
					<a href="#up" class="list-group-item active" data-toggle="tab"><i class="icon-money"></i> {l s='Universal pay' mod='advancedcheckout'}</a>
				</li>
				<li class="tab-row">
					<a href="#dnp" class="list-group-item" data-toggle="tab"><i class="icon-plane"></i> {l s='Delivery & payments' mod='advancedcheckout'}</a>
				</li>
				<li class="tab-row">
					<a href="#pimage" class="list-group-item" data-toggle="tab"><i class="icon-camera"></i> {l s='Logo for Payments' mod='advancedcheckout'}</a>
				</li>
				<li class="tab-row">
					<a href="#pickup" class="list-group-item" data-toggle="tab"><i class="icon-suitcase"></i> {l s='Pickup settings' mod='advancedcheckout'}</a>
				</li>
			</ul>
		</div>
		<!-- <br/>
		<div class="productTabs" style="">
			<ul class="tab list-group change">
				<li>
					<a class="list-group-item"><i class="icon-info"></i> {l s='Version' mod='advancedcheckout'} {$module_version|escape:'htmlall':'UTF-8'}</a>
				</li>
			</ul>
		</div> -->
	</div>
<!-- <form id="product_form"> -->
<div class="" id="tabPane1">
	<div class="tab-pane panel" id="settings" style="display:none;">
		{$main_html|default:''}
	</div>
	<div class="tab-pane panel" id="fields" style="display:none;">
		<center><div style="display: inline-block;"><p><p style="color:#F31717; font-size:16px; font-weight:900;text-align:center;">{l s=' -- Attention! A disabled field should not be required !!! --' mod='advancedcheckout'}</p></p></div></center>
		{$fields_html|default:''}
	</div>
	<div class="tab-pane panel" id="up" style="display:none;">
		{$up_html|default:''}
	</div>
	<div class="tab-pane panel" id="dnp" style="display:none;">
		{$dnp_html|default:''}
	</div>
	<div class="tab-pane panel" id="pimage" style="display:none;">
		<div id="gif_loaded"></div>
		{$pimage_html|default:''}
	</div>
	<div class="tab-pane panel" id="pickup" style="display:none;">
			<div id="gif_loaded"></div>
			{$pickup_html|default:''}
		</div>
</div>
<!-- </form> -->
</div>
{/if}
<style>
#tabPane1 {
	float: right;
width: 85%;
padding: 20px;
}
</style>