<?php /* Smarty version Smarty-3.1.19, created on 2016-12-25 17:12:16
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/advancedcheckout/views/templates/front/order.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1335759988583ed9e030fc48-69783900%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3340a77bd1e88c1d42dc4f4f1b327a0f3546ecbe' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/advancedcheckout/views/templates/front/order.tpl',
      1 => 1482664250,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1335759988583ed9e030fc48-69783900',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_583ed9e03c28f5_62171434',
  'variables' => 
  array (
    'priceDisplay' => 0,
    'logged' => 0,
    'cart' => 0,
    'conditions' => 0,
    'adv_show_zalivka' => 0,
    'adv_show_carrier' => 0,
    'adv_show_payment' => 0,
    'maps_pickup_on' => 0,
    'cm_latitude' => 0,
    'cm_longitude' => 0,
    'pickup_point' => 0,
    'pickup_val' => 0,
    'pickup' => 0,
    'pp_content' => 0,
    'k' => 0,
    'pp' => 0,
    'adv_show_cart' => 0,
    'productNumber' => 0,
    'cms_id' => 0,
    'checkedTOS' => 0,
    'link_conditions' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_583ed9e03c28f5_62171434')) {function content_583ed9e03c28f5_62171434($_smarty_tpl) {?>

<?php echo $_smarty_tpl->getSubTemplate ("./css.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<script type="text/javascript">
	// <![CDATA[
	var displayPrice = '<?php echo intval($_smarty_tpl->tpl_vars['priceDisplay']->value);?>
';
	var logg = '<?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['logged']->value);?>
';
	var txtProduct = "<?php echo smartyTranslate(array('s'=>'product','mod'=>'advancedcheckout'),$_smarty_tpl);?>
";
	var txtProducts = "<?php echo smartyTranslate(array('s'=>'products','mod'=>'advancedcheckout'),$_smarty_tpl);?>
";
	var errpym = "<?php echo smartyTranslate(array('s'=>'Select payment methods!','mod'=>'advancedcheckout'),$_smarty_tpl);?>
";
	var deliveryAddress = "<?php echo intval($_smarty_tpl->tpl_vars['cart']->value->id_address_delivery);?>
";
	var msg_order_carrier = "<?php echo smartyTranslate(array('s'=>'You must agree to the terms of service before continuing.','mod'=>'advancedcheckout'),$_smarty_tpl);?>
";
	var trm = "<?php echo intval($_smarty_tpl->tpl_vars['conditions']->value);?>
";
	var errorPayment = "<?php echo smartyTranslate(array('s'=>'Please select payment method!','mod'=>'advancedcheckout'),$_smarty_tpl);?>
";
	var errc = "<?php echo smartyTranslate(array('s'=>'Please select delivery method!','mod'=>'advancedcheckout'),$_smarty_tpl);?>
";
	var isseterr = "<?php echo smartyTranslate(array('s'=>'There are errors!','mod'=>'advancedcheckout'),$_smarty_tpl);?>
";
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
					<div style="text-align: center;" class="opc-widget-header opc-bg-blueberry <?php if ($_smarty_tpl->tpl_vars['adv_show_zalivka']->value) {?>opc-bordered-bottom opc-bordered-sky<?php }?>">
						<?php if (!$_smarty_tpl->tpl_vars['logged']->value) {?>
						<div class="opc-widget-buttons opc-buttons-bordered">						
							<button data-tab="#new-acc" class="btn_reg opc-active tabbtn opc-btn opc-btn-darkorange opc-btn-xs"><?php echo smartyTranslate(array('s'=>'Account','mod'=>'advancedcheckout'),$_smarty_tpl);?>
</button>
						</div>
						<div style="border-right: 1px solid #e5e5e5;" class="opc-widget-buttons opc-buttons-bordered">						
							<button data-tab="#log-in" class="tabbtn opc-btn opc-btn-blue opc-btn-xs"><?php echo smartyTranslate(array('s'=>'Already registered?','mod'=>'advancedcheckout'),$_smarty_tpl);?>
</button>
						</div>
						<?php } else { ?>
							<i class="opc-widget-icon fa fa-user"></i>
						<span class="opc-widget-caption"><?php echo smartyTranslate(array('s'=>'Account','mod'=>'advancedcheckout'),$_smarty_tpl);?>
</span>
						<?php }?>
					</div>
					<div class="opc-widget-body">
						<?php if (!$_smarty_tpl->tpl_vars['logged']->value) {?><div class="opc-tab-content opc-tabs-flat"><?php }?>
							<?php if (!$_smarty_tpl->tpl_vars['logged']->value) {?><div id="log-in">
								<div id="forgot_form_content" style="display:none;">	
									<div id="opc_forgot_errors" class="opc-alert opc-alert-danger" style="display:none;">
										<i class="fa fa-times-circle opc-sign"></i>
										<button class="opc-close">×</button>
										<p class="cnt" style="color:fff;"></p>
									</div>
									<div class="opc-alert opc-alert-success" style="display:none;">
										<button type="button" class="opc-close" >×</button>
										<?php echo smartyTranslate(array('s'=>'Your password has been successfully reset and a confirmation has been sent to your email address!','mod'=>'advancedcheckout'),$_smarty_tpl);?>

									</div>
									<p style="margin-bottom:10px;"><?php echo smartyTranslate(array('s'=>'Please enter the email address you used to register. We will then send you a new password.','mod'=>'advancedcheckout'),$_smarty_tpl);?>
</p>
									<div class="opc-form-group">
										<label class="w100 opc-control-label" for="email"><?php echo smartyTranslate(array('s'=>'Email address','mod'=>'advancedcheckout'),$_smarty_tpl);?>
</label>
										<div class="w100">
											<input class="opc-form-control opc-input-sm" type="text" id="forgot_email" name="forgot_email" />
										</div>
									</div>
									<p class="submit">
										<button type="submit" class="opc-btn-alt opc-btn opc-btn-custom opc-forgotsend-button"><?php echo smartyTranslate(array('s'=>'Retrieve Password','mod'=>'advancedcheckout'),$_smarty_tpl);?>
</button>
									</p>
									<a class="btl" title="<?php echo smartyTranslate(array('s'=>'Back to Login','mod'=>'advancedcheckout'),$_smarty_tpl);?>
" rel="nofollow"><?php echo smartyTranslate(array('s'=>'Back to Login','mod'=>'advancedcheckout'),$_smarty_tpl);?>
</a>
								</div>
								<div id="login_form_content">
									<div id="opc_login_errors" class="opc-alert opc-alert-danger" style="display:none;">
										<i class="fa fa-times-circle opc-sign"></i>
										<button class="opc-close">×</button>
										<p class="cnt"></p>
									</div>
									<div class="opc-form-group">
										<label class="w100 opc-control-label" for="login_email"><?php echo smartyTranslate(array('s'=>'Email address','mod'=>'advancedcheckout'),$_smarty_tpl);?>
</label>
										<div class="w100">
											<input class="opc-form-control opc-input-sm" type="text" id="login_email" name="login_email" />
										</div>
									</div>
									<div class="opc-form-group">
										<label class="w100 opc-control-label" for="login_passwd"><?php echo smartyTranslate(array('s'=>'Password','mod'=>'advancedcheckout'),$_smarty_tpl);?>
</label>
										<div class="w100">
											<input class="opc-form-control opc-input-sm" type="password" id="login_passwd" name="login_passwd" />
										</div>
									</div>
									<a class="lost_password"><?php echo smartyTranslate(array('s'=>'Forgot your password?','mod'=>'advancedcheckout'),$_smarty_tpl);?>
</a>
									<p class="submit">
										<button type="submit" name="SubmitLogin" class="opc-login-button opc-btn opc-btn-alt opc-btn-custom"><?php echo smartyTranslate(array('s'=>'Sign in','mod'=>'advancedcheckout'),$_smarty_tpl);?>
</button>
									</p>
								</div>
							</div>
						<?php }?>
							<div id="new-acc">
								<div id="opc-page-loader" class="on"><span class="opc-spinner"></span></div>
								<div class="opc-user-data"></div>
							</div>
						<?php if (!$_smarty_tpl->tpl_vars['logged']->value) {?></div><?php }?>
					</div>
				</div>
			</div>
		</div>
		<div id="opc-right-content">
			<div id="opc-right-carrier-content" <?php if ($_smarty_tpl->tpl_vars['adv_show_carrier']->value) {?>style="display:none;"<?php }?>>
				<div class="opc-widget">
					<div class="opc-widget-header opc-bg-blueberry <?php if ($_smarty_tpl->tpl_vars['adv_show_zalivka']->value) {?>opc-bordered-bottom opc-bordered-sky<?php }?>">
						<i class="opc-widget-icon fa fa-plane"></i>
						<span class="opc-widget-caption"><?php echo smartyTranslate(array('s'=>'Delivery methods','mod'=>'advancedcheckout'),$_smarty_tpl);?>
</span>
					</div>
					<div class="opc-widget-body clearfix">
						<div id="opc-page-loader" class="on"><span class="opc-spinner"></span></div>
						<div id="opc_delivery_methods" class="opc-main-block"></div>
					</div>
				</div>
			</div>
			<div id="opc-right-payment-content" <?php if ($_smarty_tpl->tpl_vars['adv_show_payment']->value) {?>style="display:none;"<?php }?>>
				<div class="opc-widget">
					<div class="opc-widget-header opc-bg-blueberry <?php if ($_smarty_tpl->tpl_vars['adv_show_zalivka']->value) {?>opc-bordered-bottom opc-bordered-sky<?php }?>">
						<i class="opc-widget-icon fa fa-credit-card"></i>
						<span class="opc-widget-caption"><?php echo smartyTranslate(array('s'=>'Payment methods','mod'=>'advancedcheckout'),$_smarty_tpl);?>
</span>
					</div>
					<div class="opc-widget-body">
						<div id="oplat" style="display:none;"></div>
						<div id="opc-page-loader" class="on"><span class="opc-spinner"></span></div>
						<div id="opc_payment_methods" class="opc-main-block"></div>
					</div>
				</div>
			</div>
			<?php if ($_smarty_tpl->tpl_vars['maps_pickup_on']->value&&$_smarty_tpl->tpl_vars['cm_latitude']->value&&$_smarty_tpl->tpl_vars['cm_longitude']->value&&count($_smarty_tpl->tpl_vars['pickup_point']->value)>0) {?>
			<div id="opc-right-pickup-content" class="opc-opd" style="display:none;">
				<div class="opc-widget">
					<div class="opc-widget-header opc-bg-blueberry <?php if ($_smarty_tpl->tpl_vars['adv_show_zalivka']->value) {?>opc-bordered-bottom opc-bordered-sky<?php }?>">
						<i class="opc-widget-icon fa fa-credit-card"></i>
						<span class="opc-widget-caption"><?php echo smartyTranslate(array('s'=>'Choise pickup point','mod'=>'advancedcheckout'),$_smarty_tpl);?>
<sup>*</sup></span>
					</div>
					<div class="opc-widget-body">
						<!-- <div id="opc-page-loader" class="on"><span class="opc-spinner"></span></div> -->
						<div class="opc-form-group">
							<div class="w100 opc-pr">
								<select name="pickup_center" id="pickup_center" class="pickup_center opc-form-control">
									<option value="0"><?php echo smartyTranslate(array('s'=>'Select pickup center','mod'=>'advancedcheckout'),$_smarty_tpl);?>
</option>
									<?php  $_smarty_tpl->tpl_vars['pickup'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['pickup']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pickup_point']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['pickup']->key => $_smarty_tpl->tpl_vars['pickup']->value) {
$_smarty_tpl->tpl_vars['pickup']->_loop = true;
?>
										<option <?php if ($_smarty_tpl->tpl_vars['pickup_val']->value==$_smarty_tpl->tpl_vars['pickup']->value['id_pickup']) {?>selected="selected"<?php }?> value="<?php echo intval($_smarty_tpl->tpl_vars['pickup']->value['id_pickup']);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pickup']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pickup']->value['address'], ENT_QUOTES, 'UTF-8', true);?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pickup']->value['number'], ENT_QUOTES, 'UTF-8', true);?>
</option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="opc-pickup-desc" style="display:none;"><?php echo smartyTranslate(array('s'=>'Description:','mod'=>'advancedcheckout'),$_smarty_tpl);?>
<p></p></div>
						<div id="opc_pickup_maps" class="opc-main-block">
							<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
							<script>
								function initMap(){
									var map;
									var marker = [];
									var infowindow = [];
									var myLatlng = new google.maps.LatLng(<?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['cm_latitude']->value);?>
, <?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['cm_longitude']->value);?>
);
									var mapOptions = {
										zoom: 8,
										center: myLatlng
									};
									map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
									<?php  $_smarty_tpl->tpl_vars['pp'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['pp']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['pp_content']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['pp']->key => $_smarty_tpl->tpl_vars['pp']->value) {
$_smarty_tpl->tpl_vars['pp']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['pp']->key;
?>
										var contentString_<?php echo intval($_smarty_tpl->tpl_vars['k']->value);?>
 = '<?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['pp']->value);?>
';
										infowindow[<?php echo intval($_smarty_tpl->tpl_vars['k']->value);?>
] = new google.maps.InfoWindow({
										  content: contentString_<?php echo intval($_smarty_tpl->tpl_vars['k']->value);?>
,
										});

										marker[<?php echo intval($_smarty_tpl->tpl_vars['k']->value);?>
] = new google.maps.Marker({
										  position: new google.maps.LatLng(ppj[<?php echo intval($_smarty_tpl->tpl_vars['k']->value);?>
]['latitude'], ppj[<?php echo intval($_smarty_tpl->tpl_vars['k']->value);?>
]['longitude']),
										  map: map,
										  title: ppj[<?php echo intval($_smarty_tpl->tpl_vars['k']->value);?>
]['name']
										});

										google.maps.event.addListener(marker[<?php echo intval($_smarty_tpl->tpl_vars['k']->value);?>
], 'click', function() {
											infowindow[<?php echo intval($_smarty_tpl->tpl_vars['k']->value);?>
].open(map,marker[<?php echo intval($_smarty_tpl->tpl_vars['k']->value);?>
]);
										});
									<?php } ?>
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
									<?php if ($_smarty_tpl->tpl_vars['pickup_val']->value!=0) {?>
									setTimeout(function(){
										$('.opc-pickup-desc p').html(ppj[<?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['pickup_val']->value);?>
]['description']).parent().show();
										google.maps.event.trigger(marker[<?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['pickup_val']->value);?>
], 'click');
									}, 1000);
									<?php }?>
								}
							</script>
							<div id="map-canvas" class="opc_pickup_maps" style="height: 400px;"></div>
						</div>
					</div>
				</div>
			</div>
			<?php }?>
			<div id="opc-right-summary-content" <?php if ($_smarty_tpl->tpl_vars['adv_show_cart']->value) {?>style="display:none;"<?php }?>>
				<div class="opc-widget">
					<div class="opc-widget-header opc-bg-blueberry <?php if ($_smarty_tpl->tpl_vars['adv_show_zalivka']->value) {?>opc-bordered-bottom opc-bordered-sky<?php }?>">
						<i class="opc-widget-icon fa fa-shopping-cart"></i>
						<span class="opc-widget-caption">
							<span class="heading-counter"><?php echo smartyTranslate(array('s'=>'Your shopping cart contains:','mod'=>'advancedcheckout'),$_smarty_tpl);?>

							<span id="summary_products_quantity"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['productNumber']->value, ENT_QUOTES, 'UTF-8', true);?>
 <?php if ($_smarty_tpl->tpl_vars['productNumber']->value==1) {?><?php echo smartyTranslate(array('s'=>'product','mod'=>'advancedcheckout'),$_smarty_tpl);?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'products','mod'=>'advancedcheckout'),$_smarty_tpl);?>
<?php }?></span>
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
					<?php if ($_smarty_tpl->tpl_vars['conditions']->value&&$_smarty_tpl->tpl_vars['cms_id']->value) {?>
						<!-- <p class="carrier_title"><?php echo smartyTranslate(array('s'=>'Terms of service','mod'=>'advancedcheckout'),$_smarty_tpl);?>
</p> -->
						<div class="opc-form-group">
							<div class="w100">
								<div class="opc-checkbox">
									<label for="cgv_accept">
										<input type="checkbox" name="cgv_accept" id="cgv_accept" value="1" <?php if ($_smarty_tpl->tpl_vars['checkedTOS']->value) {?>checked="checked"<?php }?> />
										<span class="opc-text"><?php echo smartyTranslate(array('s'=>'I agree to the terms of service and will adhere to them unconditionally.','mod'=>'advancedcheckout'),$_smarty_tpl);?>
</span>
									</label></br><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link_conditions']->value, ENT_QUOTES, 'UTF-8', true);?>
" class="iframe" rel="nofollow">(<?php echo smartyTranslate(array('s'=>'(Read the Terms of Service)','mod'=>'advancedcheckout'),$_smarty_tpl);?>
)</a>
								</div>
							</div>
						</div>
					<?php }?>
					<a data-original = "<?php echo smartyTranslate(array('s'=>'Place order!','mod'=>'advancedcheckout'),$_smarty_tpl);?>
" data-loading = '<i class="fa fa-spinner fa-spin"></i>' class="flr opc-btn opc-btn-sky place_order">
						<?php echo smartyTranslate(array('s'=>'Place order!','mod'=>'advancedcheckout'),$_smarty_tpl);?>

					</a>
				</div>
				<div id="alert_term" style="display:none;">
					<p><?php echo smartyTranslate(array('s'=>'You must agree to the terms of service before continuing.','mod'=>'advancedcheckout'),$_smarty_tpl);?>
</p>
				</div>
			</div>
		</div>
	</div>
</div><?php }} ?>
