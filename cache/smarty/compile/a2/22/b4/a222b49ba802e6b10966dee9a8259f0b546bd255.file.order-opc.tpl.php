<?php /* Smarty version Smarty-3.1.19, created on 2016-12-25 17:12:16
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/advancedcheckout/views/templates/front/order-opc.tpl" */ ?>
<?php /*%%SmartyHeaderCode:333688298583ed9e0237ce2-78896256%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a222b49ba802e6b10966dee9a8259f0b546bd255' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/advancedcheckout/views/templates/front/order-opc.tpl',
      1 => 1482664250,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '333688298583ed9e0237ce2-78896256',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_583ed9e0307b97_59492737',
  'variables' => 
  array (
    'refresh' => 0,
    'maps_pickup_on' => 0,
    'pickup_point_json' => 0,
    'carrier_pickup' => 0,
    'img_dir' => 0,
    'cod_id' => 0,
    'COD_FEE' => 0,
    'link' => 0,
    'back_order_page' => 0,
    'logged' => 0,
    'currencySign' => 0,
    'currencyRate' => 0,
    'currencyFormat' => 0,
    'currencyBlank' => 0,
    'use_taxes' => 0,
    'conditions' => 0,
    'vat_management' => 0,
    'priceDisplay' => 0,
    'errorCarrier' => 0,
    'errorTOS' => 0,
    'checked' => 0,
    'isLogged' => 0,
    'isGuest' => 0,
    'isVirtualCart' => 0,
    'isPaymentStep' => 0,
    'productNumber' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_583ed9e0307b97_59492737')) {function content_583ed9e0307b97_59492737($_smarty_tpl) {?>

<?php $_smarty_tpl->_capture_stack[0][] = array('path', null, null); ob_start(); ?><?php echo smartyTranslate(array('s'=>'Your shopping cart','mod'=>'advancedcheckout'),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php $_smarty_tpl->tpl_vars["back_order_page"] = new Smarty_variable("order-opc.php", null, 0);?>
<script type="text/javascript">
	// <![CDATA[
	<?php if ($_smarty_tpl->tpl_vars['refresh']->value['postcode_refresh']) {?> var postcode_refresh = 1; <?php } else { ?> var postcode_refresh = 0; <?php }?>
	<?php if ($_smarty_tpl->tpl_vars['refresh']->value['city_refresh']) {?> var city_refresh = 1; <?php } else { ?> var city_refresh = 0; <?php }?>
	<?php if ($_smarty_tpl->tpl_vars['refresh']->value['country_refresh']) {?> var country_refresh = 1; <?php } else { ?> var country_refresh = 0; <?php }?>
	<?php if ($_smarty_tpl->tpl_vars['refresh']->value['state_refresh']) {?> var state_refresh = 1; <?php } else { ?> var state_refresh = 0; <?php }?>
	var maps_pickup_on = '<?php echo intval($_smarty_tpl->tpl_vars['maps_pickup_on']->value);?>
';
	var ppj = <?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['pickup_point_json']->value);?>

	var carrier_pickup = '<?php echo intval($_smarty_tpl->tpl_vars['carrier_pickup']->value);?>
';
	var imgDir = '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['img_dir']->value, ENT_QUOTES, 'UTF-8', true);?>
';
	var cod_id = <?php if (isset($_smarty_tpl->tpl_vars['cod_id']->value)) {?><?php echo intval($_smarty_tpl->tpl_vars['cod_id']->value);?>
<?php } else { ?>0<?php }?>;
	var cod_price = <?php if (isset($_smarty_tpl->tpl_vars['COD_FEE']->value)) {?><?php echo intval($_smarty_tpl->tpl_vars['COD_FEE']->value);?>
<?php } else { ?>0<?php }?>;
	var orderOpcUrl = '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink("order-opc",true), ENT_QUOTES, 'UTF-8', true);?>
';
	var historyUrl = '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink("history",true), ENT_QUOTES, 'UTF-8', true);?>
';
	var authenticationUrl = '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink("authentication",true), ENT_QUOTES, 'UTF-8', true);?>
';
	var addressUrl = '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink("address",true,null,"back=".((string)$_smarty_tpl->tpl_vars['back_order_page']->value)), ENT_QUOTES, 'UTF-8', true);?>
';
	var orderProcess = 'order-opc';
	var lggd = <?php echo intval($_smarty_tpl->tpl_vars['logged']->value);?>
;
	var currencySign = '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['currencySign']->value, ENT_QUOTES, 'UTF-8', true);?>
';
	var currencyRate = '<?php echo floatval($_smarty_tpl->tpl_vars['currencyRate']->value);?>
';
	var currencyFormat = '<?php echo intval($_smarty_tpl->tpl_vars['currencyFormat']->value);?>
';
	var currencyBlank = '<?php echo intval($_smarty_tpl->tpl_vars['currencyBlank']->value);?>
';
	var taxEnabled = <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['use_taxes']->value, ENT_QUOTES, 'UTF-8', true);?>
;
	var conditionEnabled = <?php echo intval($_smarty_tpl->tpl_vars['conditions']->value);?>
;
	var countries = new Array();
	var countriesNeedIDNumber = new Array();
	var countriesNeedZipCode = new Array();
	var vat_management = <?php echo intval($_smarty_tpl->tpl_vars['vat_management']->value);?>
;
	var displayPrice = <?php echo intval($_smarty_tpl->tpl_vars['priceDisplay']->value);?>
;
	var priceDisplayPrecision = 2;
	var txtWithTax = "<?php echo smartyTranslate(array('s'=>'(tax incl.)','mod'=>'advancedcheckout'),$_smarty_tpl);?>
";
	var txtWithoutTax = "<?php echo smartyTranslate(array('s'=>'(tax excl.)','mod'=>'advancedcheckout'),$_smarty_tpl);?>
";
	var txtHasBeenSelected = "<?php echo smartyTranslate(array('s'=>'has been selected','mod'=>'advancedcheckout'),$_smarty_tpl);?>
";
	var txtNoCarrierIsSelected = "<?php echo smartyTranslate(array('s'=>'No carrier has been selected','mod'=>'advancedcheckout'),$_smarty_tpl);?>
";
	var txtNoCarrierIsNeeded = "<?php echo smartyTranslate(array('s'=>'No carrier is needed for this order','mod'=>'advancedcheckout'),$_smarty_tpl);?>
";
	var txtConditionsIsNotNeeded = "<?php echo smartyTranslate(array('s'=>'You do not need to accept the Terms of Service for this order.','mod'=>'advancedcheckout'),$_smarty_tpl);?>
";
	var txtTOSIsAccepted = "<?php echo smartyTranslate(array('s'=>'The service terms have been accepted','mod'=>'advancedcheckout'),$_smarty_tpl);?>
";
	var txtTOSIsNotAccepted = "<?php echo smartyTranslate(array('s'=>'The service terms have not been accepted','mod'=>'advancedcheckout'),$_smarty_tpl);?>
";
	var txtThereis = "<?php echo smartyTranslate(array('s'=>'There is','mod'=>'advancedcheckout'),$_smarty_tpl);?>
";
	var txtErrors = "<?php echo smartyTranslate(array('s'=>'Error(s)','mod'=>'advancedcheckout'),$_smarty_tpl);?>
";
	var txtDeliveryAddress = "<?php echo smartyTranslate(array('s'=>'Delivery address','mod'=>'advancedcheckout'),$_smarty_tpl);?>
";
	var txtInvoiceAddress = "<?php echo smartyTranslate(array('s'=>'Invoice address','mod'=>'advancedcheckout'),$_smarty_tpl);?>
";
	var txtModifyMyAddress = "<?php echo smartyTranslate(array('s'=>'Modify my address','mod'=>'advancedcheckout'),$_smarty_tpl);?>
";
	var txtInstantCheckout = "<?php echo smartyTranslate(array('s'=>'Instant checkout','mod'=>'advancedcheckout'),$_smarty_tpl);?>
";
	var txtSelectAnAddressFirst = "<?php echo smartyTranslate(array('s'=>'Please start by selecting an address.','mod'=>'advancedcheckout'),$_smarty_tpl);?>
";
	var errorCarrier = "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['errorCarrier']->value, ENT_QUOTES, 'UTF-8', true);?>
";
	var errorTOS = "<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['errorTOS']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
";
	var checkedCarrier = "<?php if (isset($_smarty_tpl->tpl_vars['checked']->value)) {?><?php echo intval($_smarty_tpl->tpl_vars['checked']->value);?>
<?php } else { ?>0<?php }?>";

	var addresses = new Array();
	var isLogged = <?php echo intval($_smarty_tpl->tpl_vars['isLogged']->value);?>
;
	var isGuest = <?php echo intval($_smarty_tpl->tpl_vars['isGuest']->value);?>
;
	var isVirtualCart = <?php echo intval($_smarty_tpl->tpl_vars['isVirtualCart']->value);?>
;
	var isPaymentStep = <?php echo intval($_smarty_tpl->tpl_vars['isPaymentStep']->value);?>
;
	var prnum = "<?php echo intval($_smarty_tpl->tpl_vars['productNumber']->value);?>
";
	//]]>
</script>
	<?php if ($_smarty_tpl->tpl_vars['productNumber']->value) {?>
		<!-- Shopping Cart -->
		<!-- End Shopping Cart -->
		<div id="empcart" style="display:none;">
			<h2><?php echo smartyTranslate(array('s'=>'Your shopping cart','mod'=>'advancedcheckout'),$_smarty_tpl);?>
</h2>
			<div class="carterr opc-alert opc-alert-danger clearfix">
				<i class="fa fa-times-circle opc-sign"></i>
				<button class="opc-close">x</button>
				<?php echo smartyTranslate(array('s'=>'Your shopping cart is empty.','mod'=>'advancedcheckout'),$_smarty_tpl);?>

			</div>
		</div>
		<?php echo $_smarty_tpl->getSubTemplate ("./order.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<?php } else { ?>
		<?php $_smarty_tpl->_capture_stack[0][] = array('path', null, null); ob_start(); ?><?php echo smartyTranslate(array('s'=>'Your shopping cart','mod'=>'advancedcheckout'),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
		<h2 class="page-heading"><?php echo smartyTranslate(array('s'=>'Your shopping cart','mod'=>'advancedcheckout'),$_smarty_tpl);?>
</h2>
		<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./errors.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

		<div class="carterr opc-alert opc-alert-danger clearfix">
			<i class="fa fa-times-circle opc-sign"></i>
			<button class="opc-close">x</button>
			<?php echo smartyTranslate(array('s'=>'Your shopping cart is empty.','mod'=>'advancedcheckout'),$_smarty_tpl);?>

		</div>
	<?php }?><?php }} ?>
