{**
* Module is prohibited to sales! Violation of this condition leads to the deprivation of the license!
*
* @category  Front Office Features
* @package   Advanced Checkout Module
* @author    Maxim Bespechalnih <2343319@gmail.com>
* @copyright 2013-2015 Max
* @license   license.txt in the module folder.
*}

{include file="./css.tpl"}
<script type="text/javascript">
	// <![CDATA[
	var displayPrice = '{$priceDisplay|intval}';
	var logg = '{$logged|escape:'quotes':'UTF-8'}';
	var txtProduct = "{l s='product' mod='advancedcheckout'}";
	var txtProducts = "{l s='products' mod='advancedcheckout'}";
	var errpym = "{l s='Select payment methods!' mod='advancedcheckout'}";
	var deliveryAddress = "{$cart->id_address_delivery|intval}";
	var msg_order_carrier = "{l s='You must agree to the terms of service before continuing.' mod='advancedcheckout'}";
	var trm = "{$conditions|intval}";
	var errorPayment = "{l s='Please select payment method!'  mod='advancedcheckout'}";
	var errc = "{l s='Please select delivery method!'  mod='advancedcheckout'}";
	var isseterr = "{l s='There are errors!'  mod='advancedcheckout'}";
	// ]]>
</script>
<div id="orderform" class="orderform bkg bootstrap">
	<div id="opc-form">
		<div id="opc-top-content">
			<div id="opc-top-login-content">
				<!--  -->
			</div>
		</div>
		<div id="opc-left-content">
			<div id="opc-left-user-content">
				<div class="opc-widget">
					<div style="text-align: center;" class="opc-widget-header opc-bg-blueberry {if $adv_show_zalivka}opc-bordered-bottom opc-bordered-sky{/if}">
						{if !$logged}
						<div class="opc-widget-buttons opc-buttons-bordered">						
							<button data-tab="#new-acc" class="btn_reg opc-active tabbtn opc-btn opc-btn-darkorange opc-btn-xs">{l s='Account' mod='advancedcheckout'}</button>
						</div>
						<div style="border-right: 1px solid #e5e5e5;" class="opc-widget-buttons opc-buttons-bordered">						
							<button data-tab="#log-in" class="tabbtn opc-btn opc-btn-blue opc-btn-xs">{l s='Already registered?' mod='advancedcheckout'}</button>
						</div>
						{else}
							<i class="opc-widget-icon fa fa-user"></i>
						<span class="opc-widget-caption">{l s='Account' mod='advancedcheckout'}</span>
						{/if}
					</div>
					<div class="opc-widget-body">
						{if !$logged}<div class="opc-tab-content opc-tabs-flat">{/if}
							{if !$logged}<div id="log-in">
								<div id="forgot_form_content" style="display:none;">	
									<div id="opc_forgot_errors" class="opc-alert opc-alert-danger" style="display:none;">
										<i class="fa fa-times-circle opc-sign"></i>
										<button class="opc-close">×</button>
										<p class="cnt" style="color:fff;"></p>
									</div>
									<div class="opc-alert opc-alert-success" style="display:none;">
										<button type="button" class="opc-close" >×</button>
										{l s='Your password has been successfully reset and a confirmation has been sent to your email address!' mod='advancedcheckout'}
									</div>
									<p style="margin-bottom:10px;">{l s='Please enter the email address you used to register. We will then send you a new password.' mod='advancedcheckout'}</p>
									<div class="opc-form-group">
										<label class="w100 opc-control-label" for="email">{l s='Email address' mod='advancedcheckout'}</label>
										<div class="w100">
											<input class="opc-form-control opc-input-sm" type="text" id="forgot_email" name="forgot_email" />
										</div>
									</div>
									<p class="submit">
										<button type="submit" class="opc-btn-alt opc-btn opc-btn-custom opc-forgotsend-button">{l s='Retrieve Password' mod='advancedcheckout'}</button>
									</p>
									<a class="btl" title="{l s='Back to Login' mod='advancedcheckout'}" rel="nofollow">{l s='Back to Login' mod='advancedcheckout'}</a>
								</div>
								<div id="login_form_content">
									<div id="opc_login_errors" class="opc-alert opc-alert-danger" style="display:none;">
										<i class="fa fa-times-circle opc-sign"></i>
										<button class="opc-close">×</button>
										<p class="cnt"></p>
									</div>
									<div class="opc-form-group">
										<label class="w100 opc-control-label" for="login_email">{l s='Email address' mod='advancedcheckout'}</label>
										<div class="w100">
											<input class="opc-form-control opc-input-sm" type="text" id="login_email" name="login_email" />
										</div>
									</div>
									<div class="opc-form-group">
										<label class="w100 opc-control-label" for="login_passwd">{l s='Password' mod='advancedcheckout'}</label>
										<div class="w100">
											<input class="opc-form-control opc-input-sm" type="password" id="login_passwd" name="login_passwd" />
										</div>
									</div>
									<a class="lost_password">{l s='Forgot your password?' mod='advancedcheckout'}</a>
									<p class="submit">
										<button type="submit" name="SubmitLogin" class="opc-login-button opc-btn opc-btn-alt opc-btn-custom">{l s='Sign in' mod='advancedcheckout'}</button>
									</p>
								</div>
							</div>
						{/if}
							<div id="new-acc">
								<div id="opc-page-loader" class="on"><span class="opc-spinner"></span></div>
								<div class="opc-user-data"></div>
							</div>
						{if !$logged}</div>{/if}
					</div>
				</div>
			</div>
		</div>
		<div id="opc-right-content">
			<div id="opc-right-carrier-content" {if $adv_show_carrier}style="display:none;"{/if}>
				<div class="opc-widget">
					<div class="opc-widget-header opc-bg-blueberry {if $adv_show_zalivka}opc-bordered-bottom opc-bordered-sky{/if}">
						<i class="opc-widget-icon fa fa-plane"></i>
						<span class="opc-widget-caption">{l s='Delivery methods' mod='advancedcheckout'}</span>
					</div>
					<div class="opc-widget-body clearfix">
						<div id="opc-page-loader" class="on"><span class="opc-spinner"></span></div>
						<div id="opc_delivery_methods" class="opc-main-block"></div>
					</div>
				</div>
			</div>
			<div id="opc-right-payment-content" {if $adv_show_payment}style="display:none;"{/if}>
				<div class="opc-widget">
					<div class="opc-widget-header opc-bg-blueberry {if $adv_show_zalivka}opc-bordered-bottom opc-bordered-sky{/if}">
						<i class="opc-widget-icon fa fa-credit-card"></i>
						<span class="opc-widget-caption">{l s='Payment methods' mod='advancedcheckout'}</span>
					</div>
					<div class="opc-widget-body">
						<div id="oplat" style="display:none;"></div>
						<div id="opc-page-loader" class="on"><span class="opc-spinner"></span></div>
						<div id="opc_payment_methods" class="opc-main-block"></div>
					</div>
				</div>
			</div>
			{if $maps_pickup_on && $cm_latitude && $cm_longitude && $pickup_point|count > 0}
			<div id="opc-right-pickup-content" class="opc-opd" style="display:none;">
				<div class="opc-widget">
					<div class="opc-widget-header opc-bg-blueberry {if $adv_show_zalivka}opc-bordered-bottom opc-bordered-sky{/if}">
						<i class="opc-widget-icon fa fa-credit-card"></i>
						<span class="opc-widget-caption">{l s='Choise pickup point' mod='advancedcheckout'}<sup>*</sup></span>
					</div>
					<div class="opc-widget-body">
						<!-- <div id="opc-page-loader" class="on"><span class="opc-spinner"></span></div> -->
						<div class="opc-form-group">
							<div class="w100 opc-pr">
								<select name="pickup_center" id="pickup_center" class="pickup_center opc-form-control">
									<option value="0">{l s='Select pickup center' mod='advancedcheckout'}</option>
									{foreach $pickup_point as $pickup}
										<option {if $pickup_val == $pickup.id_pickup}selected="selected"{/if} value="{$pickup.id_pickup|intval}">{$pickup.name|escape:'html':'UTF-8'} {$pickup.address|escape:'html':'UTF-8'} {$pickup.number|escape:'html':'UTF-8'}</option>
									{/foreach}
								</select>
							</div>
						</div>
						<div class="opc-pickup-desc" style="display:none;">{l s='Description:' mod='advancedcheckout'}<p></p></div>
						<div id="opc_pickup_maps" class="opc-main-block">
							<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
							<script>
								function initMap(){
									var map;
									var marker = [];
									var infowindow = [];
									var myLatlng = new google.maps.LatLng({$cm_latitude|escape:'quotes':'UTF-8'}, {$cm_longitude|escape:'quotes'});
									var mapOptions = {
										zoom: 8,
										center: myLatlng
									};
									map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
									{foreach $pp_content as $k => $pp}
										var contentString_{$k|intval} = '{$pp|escape:"quotes":"UTF-8"}';
										infowindow[{$k|intval}] = new google.maps.InfoWindow({
										  content: contentString_{$k|intval},
										});

										marker[{$k|intval}] = new google.maps.Marker({
										  position: new google.maps.LatLng(ppj[{$k|intval}]['latitude'], ppj[{$k|intval}]['longitude']),
										  map: map,
										  title: ppj[{$k|intval}]['name']
										});

										google.maps.event.addListener(marker[{$k|intval}], 'click', function() {
											infowindow[{$k|intval}].open(map,marker[{$k|intval}]);
										});
									{/foreach}
									$('#pickup_center').live('change', function(){
										var id = $(this).val();
										for (key in infowindow)
											infowindow[key].close();
										if(id != 0)
										{
											$('.opc-pickup-desc p').html(ppj[id]['description']).parent().show();
											google.maps.event.trigger(marker[id], 'click');
										}
										else
											$('.opc-pickup-desc').hide().find('p').html('');
									});
									{if $pickup_val != 0}
									setTimeout(function(){
										$('.opc-pickup-desc p').html(ppj[{$pickup_val|escape:'quotes':'UTF-8'}]['description']).parent().show();
										google.maps.event.trigger(marker[{$pickup_val|escape:'quotes':'UTF-8'}], 'click');
									}, 1000);
									{/if}
								}
							</script>
							<div id="map-canvas" class="opc_pickup_maps" style="height: 400px;"></div>
						</div>
					</div>
				</div>
			</div>
			{/if}
			<div id="opc-right-summary-content" {if $adv_show_cart}style="display:none;"{/if}>
				<div class="opc-widget">
					<div class="opc-widget-header opc-bg-blueberry {if $adv_show_zalivka}opc-bordered-bottom opc-bordered-sky{/if}">
						<i class="opc-widget-icon fa fa-shopping-cart"></i>
						<span class="opc-widget-caption">
							<span class="heading-counter">{l s='Your shopping cart contains:' mod='advancedcheckout'}
							<span id="summary_products_quantity">{$productNumber|escape:'html':'UTF-8'} {if $productNumber == 1}{l s='product' mod='advancedcheckout'}{else}{l s='products' mod='advancedcheckout'}{/if}</span>
							</span>
						</span>
					</div>
					<div class="opc-widget-body">
						<div id="opc-page-loader" class="on"><span class="opc-spinner"></span></div>
						<div class="cart-container"></div>
					</div>
				</div>
			</div>
			<div id="opc-out-content">
				<div class="opc-flr">
					{if $conditions AND $cms_id}
						<!-- <p class="carrier_title">{l s='Terms of service' mod='advancedcheckout'}</p> -->
						<div class="opc-form-group">
							<div class="w100">
								<div class="opc-checkbox">
									<label for="cgv_accept">
										<input type="checkbox" name="cgv_accept" id="cgv_accept" value="1" {if $checkedTOS}checked="checked"{/if} />
										<span class="opc-text">{l s='I agree to the terms of service and will adhere to them unconditionally.' mod='advancedcheckout'}</span>
									</label></br><a href="{$link_conditions|escape:'html':'UTF-8'}" class="iframe" rel="nofollow">({l s='(Read the Terms of Service)' mod='advancedcheckout'})</a>
								</div>
							</div>
						</div>
					{/if}
					<a data-original = "{l s='Place order!' mod='advancedcheckout'}" data-loading = '<i class="fa fa-spinner fa-spin"></i>' class="flr opc-btn opc-btn-sky place_order">
						{l s='Place order!' mod='advancedcheckout'}
					</a>
				</div>
				<div id="alert_term" style="display:none;">
					<p>{l s='You must agree to the terms of service before continuing.'  mod='advancedcheckout'}</p>
				</div>
			</div>
		</div>
	</div>
</div>