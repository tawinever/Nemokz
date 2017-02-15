<?php /* Smarty version Smarty-3.1.19, created on 2016-12-25 17:12:17
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/advancedcheckout/views/templates/front/cart.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1418694109583ed9e170f599-45069341%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ca8adfb9a8e381a8fecb8260519c72a2caa6f683' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/advancedcheckout/views/templates/front/cart.tpl',
      1 => 1482664250,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1418694109583ed9e170f599-45069341',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_583ed9e1986065_12686600',
  'variables' => 
  array (
    'currencySign' => 0,
    'currencyRate' => 0,
    'currencyFormat' => 0,
    'currencyBlank' => 0,
    'cart' => 0,
    'err_isset' => 0,
    'total_discounts' => 0,
    'use_taxes' => 0,
    'show_taxes' => 0,
    'total_wrapping' => 0,
    'PS_STOCK_MANAGEMENT' => 0,
    'priceDisplay' => 0,
    'total_discounts_num' => 0,
    'use_show_taxes' => 0,
    'total_wrapping_taxes_num' => 0,
    'col_span_subtotal' => 0,
    'display_tax_label' => 0,
    'total_products' => 0,
    'total_products_wt' => 0,
    'total_wrapping_tax_exc' => 0,
    'total_shipping_tax_exc' => 0,
    'virtualCart' => 0,
    'carrier' => 0,
    'total_shipping' => 0,
    'total_discounts_tax_exc' => 0,
    'total_discounts_negative' => 0,
    'total_price_without_tax' => 0,
    'total_tax' => 0,
    'COD_FEE' => 0,
    'total_price' => 0,
    'total_price_cod' => 0,
    'products' => 0,
    'product' => 0,
    'odd' => 0,
    'productId' => 0,
    'productAttributeId' => 0,
    'customizedDatas' => 0,
    'gift_products' => 0,
    'id_customization' => 0,
    'customization' => 0,
    'type' => 0,
    'CUSTOMIZE_FILE' => 0,
    'custom_data' => 0,
    'pic_dir' => 0,
    'picture' => 0,
    'CUSTOMIZE_TEXTFIELD' => 0,
    'textField' => 0,
    'cannotModify' => 0,
    'quantityDisplayed' => 0,
    'token_cart' => 0,
    'link' => 0,
    'last_was_odd' => 0,
    'discounts' => 0,
    'discount' => 0,
    'HOOK_SHOPPING_CART' => 0,
    'HOOK_SHOPPING_CART_EXTRA' => 0,
    'adv_show_oc' => 0,
    'comment_field' => 0,
    'oldMessage' => 0,
    'show_option_allow_separate_package' => 0,
    'addresses_style' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_583ed9e1986065_12686600')) {function content_583ed9e1986065_12686600($_smarty_tpl) {?><?php if (!is_callable('smarty_function_math')) include '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/tools/smarty/plugins/function.math.php';
?>

<script type="text/javascript">
	// <![CDATA[
	var currencySign = "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['currencySign']->value, ENT_QUOTES, 'UTF-8', true);?>
";
	var currencyRate = '<?php echo floatval($_smarty_tpl->tpl_vars['currencyRate']->value);?>
';
	var currencyFormat = '<?php echo intval($_smarty_tpl->tpl_vars['currencyFormat']->value);?>
';
	var currencyBlank = '<?php echo intval($_smarty_tpl->tpl_vars['currencyBlank']->value);?>
';
	var txtProduct = "<?php echo smartyTranslate(array('s'=>'product','mod'=>'advancedcheckout'),$_smarty_tpl);?>
";
	var txtProducts = "<?php echo smartyTranslate(array('s'=>'products','mod'=>'advancedcheckout'),$_smarty_tpl);?>
";
	var deliveryAddress = "<?php echo intval($_smarty_tpl->tpl_vars['cart']->value->id_address_delivery);?>
";
	// ]]>
</script>
<script>
	$(document).ready(function(){
		$('.cart_quantity_input').typeWatch({
			highlight: true, wait: 800, captureLength: 0, callback: function(val){
				updateQty(val, true, this);
			}
		});
	});
</script>
<?php $_smarty_tpl->tpl_vars['col_span_subtotal'] = new Smarty_variable(2, null, 0);?>
<div id="cart_errors"></div>
<input type="hidden" class="err_isset" name="err_isset" value="<?php echo intval($_smarty_tpl->tpl_vars['err_isset']->value);?>
">
<?php ob_start();?><?php if ($_smarty_tpl->tpl_vars['total_discounts']->value!=0) {?><?php echo "1";?><?php } else { ?><?php echo "0";?><?php }?><?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['total_discounts_num'] = new Smarty_variable($_tmp1, null, 0);?>
<?php ob_start();?><?php if ($_smarty_tpl->tpl_vars['use_taxes']->value&&$_smarty_tpl->tpl_vars['show_taxes']->value) {?><?php echo "2";?><?php } else { ?><?php echo "0";?><?php }?><?php $_tmp2=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['use_show_taxes'] = new Smarty_variable($_tmp2, null, 0);?>
<?php ob_start();?><?php if ($_smarty_tpl->tpl_vars['total_wrapping']->value!=0) {?><?php echo "1";?><?php } else { ?><?php echo "0";?><?php }?><?php $_tmp3=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['total_wrapping_taxes_num'] = new Smarty_variable($_tmp3, null, 0);?>

<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayBeforeShoppingCartBlock"),$_smarty_tpl);?>

<div id="order-detail-content" class="table_block table-responsive">
	<table id="opc-cart_summary" class="opc-table opc-table-bordered w100 <?php if ($_smarty_tpl->tpl_vars['PS_STOCK_MANAGEMENT']->value) {?>stock-management-on<?php } else { ?>stock-management-off<?php }?>">
		<thead>
			<tr>
				<th class="cart_product"><?php echo smartyTranslate(array('s'=>'Product','mod'=>'advancedcheckout'),$_smarty_tpl);?>
</th>
				<th class="cart_description"><?php echo smartyTranslate(array('s'=>'Description','mod'=>'advancedcheckout'),$_smarty_tpl);?>
</th>
				<th class="cart_unit"><?php echo smartyTranslate(array('s'=>'Unit price','mod'=>'advancedcheckout'),$_smarty_tpl);?>
</th>
				<th class="cart_quantity" style="width: 85px;"><?php echo smartyTranslate(array('s'=>'Qty','mod'=>'advancedcheckout'),$_smarty_tpl);?>
</th>
				<th class="cart_total"><?php echo smartyTranslate(array('s'=>'Total','mod'=>'advancedcheckout'),$_smarty_tpl);?>
</th>
				<th class="cart_delete">&nbsp;</th>
			</tr>
		</thead>
		<tfoot>
			<?php if ($_smarty_tpl->tpl_vars['use_taxes']->value) {?>
				<?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value) {?>
					<tr class="cart_total_price">
						<td rowspan="<?php echo 5+$_smarty_tpl->tpl_vars['total_discounts_num']->value+$_smarty_tpl->tpl_vars['use_show_taxes']->value+intval($_smarty_tpl->tpl_vars['total_wrapping_taxes_num']->value);?>
" colspan="2" id="cart_voucher" class="cart_voucher">
							<?php echo $_smarty_tpl->getSubTemplate ("./voucher.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

						</td>
						<td colspan="<?php echo intval($_smarty_tpl->tpl_vars['col_span_subtotal']->value);?>
" class="text-right"><?php if ($_smarty_tpl->tpl_vars['display_tax_label']->value) {?><?php echo smartyTranslate(array('s'=>'Total products (tax excl.)','mod'=>'advancedcheckout'),$_smarty_tpl);?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Total products','mod'=>'advancedcheckout'),$_smarty_tpl);?>
<?php }?></td>
						<td colspan="2" class="price" id="total_product"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['total_products']->value),$_smarty_tpl);?>
</td>
					</tr>
				<?php } else { ?>
					<tr class="cart_total_price">
						<td rowspan="<?php echo 5+$_smarty_tpl->tpl_vars['total_discounts_num']->value+$_smarty_tpl->tpl_vars['use_show_taxes']->value+intval($_smarty_tpl->tpl_vars['total_wrapping_taxes_num']->value);?>
" colspan="2" id="cart_voucher" class="cart_voucher">
							<?php echo $_smarty_tpl->getSubTemplate ("./voucher.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

						</td>
						<td colspan="<?php echo intval($_smarty_tpl->tpl_vars['col_span_subtotal']->value);?>
" class="text-right"><?php if ($_smarty_tpl->tpl_vars['display_tax_label']->value) {?><?php echo smartyTranslate(array('s'=>'Total products (tax incl.)','mod'=>'advancedcheckout'),$_smarty_tpl);?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Total products','mod'=>'advancedcheckout'),$_smarty_tpl);?>
<?php }?></td>
						<td colspan="2" class="price" id="total_product"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['total_products_wt']->value),$_smarty_tpl);?>
</td>
					</tr>
				<?php }?>
			<?php } else { ?>
				<tr class="cart_total_price">
					<td rowspan="<?php echo 5+$_smarty_tpl->tpl_vars['total_discounts_num']->value+$_smarty_tpl->tpl_vars['use_show_taxes']->value+intval($_smarty_tpl->tpl_vars['total_wrapping_taxes_num']->value);?>
" colspan="2" id="cart_voucher" class="cart_voucher">
							<?php echo $_smarty_tpl->getSubTemplate ("./voucher.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

						</td>
					<td colspan="<?php echo intval($_smarty_tpl->tpl_vars['col_span_subtotal']->value);?>
" class="text-right"><?php echo smartyTranslate(array('s'=>'Total products','mod'=>'advancedcheckout'),$_smarty_tpl);?>
</td>
					<td colspan="2" class="price" id="total_product"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['total_products']->value),$_smarty_tpl);?>
</td>
				</tr>
			<?php }?>
			<tr<?php if ($_smarty_tpl->tpl_vars['total_wrapping']->value==0) {?> style="display: none;"<?php }?>>
				<td colspan="2" class="text-right">
					<?php if ($_smarty_tpl->tpl_vars['use_taxes']->value) {?>
						<?php if ($_smarty_tpl->tpl_vars['display_tax_label']->value) {?><?php echo smartyTranslate(array('s'=>'Total gift wrapping (tax incl.):','mod'=>'advancedcheckout'),$_smarty_tpl);?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Total gift-wrapping cost:','mod'=>'advancedcheckout'),$_smarty_tpl);?>
<?php }?>
					<?php } else { ?>
						<?php echo smartyTranslate(array('s'=>'Total gift-wrapping cost:','mod'=>'advancedcheckout'),$_smarty_tpl);?>

					<?php }?>
				</td>
				<td colspan="2" class="price-discount price" id="total_wrapping">
					<?php if ($_smarty_tpl->tpl_vars['use_taxes']->value) {?>
						<?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value) {?>
							<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['total_wrapping_tax_exc']->value),$_smarty_tpl);?>

						<?php } else { ?>
							<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['total_wrapping']->value),$_smarty_tpl);?>

						<?php }?>
					<?php } else { ?>
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['total_wrapping_tax_exc']->value),$_smarty_tpl);?>

					<?php }?>
				</td>
			</tr>
			<?php if ($_smarty_tpl->tpl_vars['total_shipping_tax_exc']->value<=0&&!isset($_smarty_tpl->tpl_vars['virtualCart']->value)) {?>
				<tr class="cart_total_delivery" style="<?php if (!isset($_smarty_tpl->tpl_vars['carrier']->value->id)||is_null($_smarty_tpl->tpl_vars['carrier']->value->id)) {?>display:none;<?php }?>">
					<td colspan="<?php echo intval($_smarty_tpl->tpl_vars['col_span_subtotal']->value);?>
" class="text-right"><?php echo smartyTranslate(array('s'=>'Shipping','mod'=>'advancedcheckout'),$_smarty_tpl);?>
</td>
					<td colspan="2" class="price" id="total_shipping"><?php echo smartyTranslate(array('s'=>'Free Shipping!','mod'=>'advancedcheckout'),$_smarty_tpl);?>
</td>
				</tr>
			<?php } else { ?>
				<?php if ($_smarty_tpl->tpl_vars['use_taxes']->value&&$_smarty_tpl->tpl_vars['total_shipping_tax_exc']->value!=$_smarty_tpl->tpl_vars['total_shipping']->value) {?>
					<?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value) {?>
						<tr class="cart_total_delivery" <?php if ($_smarty_tpl->tpl_vars['total_shipping_tax_exc']->value<=0) {?> style="display:none;"<?php }?>>
							<td colspan="<?php echo intval($_smarty_tpl->tpl_vars['col_span_subtotal']->value);?>
" class="text-right"><?php if ($_smarty_tpl->tpl_vars['display_tax_label']->value) {?><?php echo smartyTranslate(array('s'=>'Total shipping (tax excl.)','mod'=>'advancedcheckout'),$_smarty_tpl);?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Total shipping','mod'=>'advancedcheckout'),$_smarty_tpl);?>
<?php }?></td>
							<td colspan="2" class="price" id="total_shipping"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['total_shipping_tax_exc']->value),$_smarty_tpl);?>
</td>
						</tr>
					<?php } else { ?>
						<tr class="cart_total_delivery"<?php if ($_smarty_tpl->tpl_vars['total_shipping']->value<=0) {?> style="display:none;"<?php }?>>
							<td colspan="<?php echo intval($_smarty_tpl->tpl_vars['col_span_subtotal']->value);?>
" class="text-right"><?php if ($_smarty_tpl->tpl_vars['display_tax_label']->value) {?><?php echo smartyTranslate(array('s'=>'Total shipping (tax incl.)','mod'=>'advancedcheckout'),$_smarty_tpl);?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Total shipping','mod'=>'advancedcheckout'),$_smarty_tpl);?>
<?php }?></td>
							<td colspan="2" class="price" id="total_shipping" ><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['total_shipping']->value),$_smarty_tpl);?>
</td>
						</tr>
					<?php }?>
				<?php } else { ?>
					<tr class="cart_total_delivery"<?php if ($_smarty_tpl->tpl_vars['total_shipping_tax_exc']->value<=0) {?> style="display:none;"<?php }?>>
						<td colspan="<?php echo intval($_smarty_tpl->tpl_vars['col_span_subtotal']->value);?>
" class="text-right"><?php echo smartyTranslate(array('s'=>'Total shipping','mod'=>'advancedcheckout'),$_smarty_tpl);?>
</td>
						<td colspan="2" class="price" id="total_shipping" ><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['total_shipping_tax_exc']->value),$_smarty_tpl);?>
</td>
					</tr>
				<?php }?>
			<?php }?>
			<tr class="cart_total_voucher" <?php if ($_smarty_tpl->tpl_vars['total_discounts']->value==0) {?>style="display:none"<?php }?>>
				<td colspan="<?php echo intval($_smarty_tpl->tpl_vars['col_span_subtotal']->value);?>
" class="text-right">
					<?php if ($_smarty_tpl->tpl_vars['display_tax_label']->value) {?>
						<?php if ($_smarty_tpl->tpl_vars['use_taxes']->value&&$_smarty_tpl->tpl_vars['priceDisplay']->value==0) {?>
							<?php echo smartyTranslate(array('s'=>'Total vouchers (tax incl.):','mod'=>'advancedcheckout'),$_smarty_tpl);?>

						<?php } else { ?>
							<?php echo smartyTranslate(array('s'=>'Total vouchers (tax excl.)','mod'=>'advancedcheckout'),$_smarty_tpl);?>

						<?php }?>
					<?php } else { ?>
						<?php echo smartyTranslate(array('s'=>'Total vouchers','mod'=>'advancedcheckout'),$_smarty_tpl);?>

					<?php }?>
				</td>
				<td colspan="2" class="price-discount price" id="total_discount">
					<?php if ($_smarty_tpl->tpl_vars['use_taxes']->value&&$_smarty_tpl->tpl_vars['priceDisplay']->value==0) {?>
						<?php $_smarty_tpl->tpl_vars['total_discounts_negative'] = new Smarty_variable($_smarty_tpl->tpl_vars['total_discounts']->value*-1, null, 0);?>
					<?php } else { ?>
						<?php $_smarty_tpl->tpl_vars['total_discounts_negative'] = new Smarty_variable($_smarty_tpl->tpl_vars['total_discounts_tax_exc']->value*-1, null, 0);?>
					<?php }?>
					<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['total_discounts_negative']->value),$_smarty_tpl);?>

				</td>
			</tr>
			<?php if ($_smarty_tpl->tpl_vars['use_taxes']->value&&$_smarty_tpl->tpl_vars['show_taxes']->value) {?>
				<tr class="cart_total_price">
					<td colspan="<?php echo intval($_smarty_tpl->tpl_vars['col_span_subtotal']->value);?>
" class="text-right"><?php if ($_smarty_tpl->tpl_vars['display_tax_label']->value) {?><?php echo smartyTranslate(array('s'=>'Total (tax excl.)','mod'=>'advancedcheckout'),$_smarty_tpl);?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Total','mod'=>'advancedcheckout'),$_smarty_tpl);?>
<?php }?></td>
					<td colspan="2" class="price" id="total_price_without_tax"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['total_price_without_tax']->value),$_smarty_tpl);?>
</td>
				</tr>
				<tr class="cart_total_tax">
					<td colspan="<?php echo intval($_smarty_tpl->tpl_vars['col_span_subtotal']->value);?>
" class="text-right"><?php echo smartyTranslate(array('s'=>'Tax','mod'=>'advancedcheckout'),$_smarty_tpl);?>
</td>
					<td colspan="2" class="price" id="total_tax"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['total_tax']->value),$_smarty_tpl);?>
</td>
				</tr>
			<?php }?>
			<?php if (isset($_smarty_tpl->tpl_vars['COD_FEE']->value)) {?>
				<tr class="cod_fee cart_total_price" style="display: none">
					<td colspan="<?php echo intval($_smarty_tpl->tpl_vars['col_span_subtotal']->value);?>
"><?php echo smartyTranslate(array('s'=>'COD Fee:','mod'=>'advancedcheckout'),$_smarty_tpl);?>
</td>
					<td colspan="2" class="price" id="price_cod_fee"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['COD_FEE']->value),$_smarty_tpl);?>
</td>
				</tr>
			<?php }?>
			<tr class="cart_total_price">
				<td colspan="<?php echo intval($_smarty_tpl->tpl_vars['col_span_subtotal']->value);?>
" class="total_price_container text-right">
					<span><?php echo smartyTranslate(array('s'=>'Total','mod'=>'advancedcheckout'),$_smarty_tpl);?>
</span>
				</td>
				<?php if ($_smarty_tpl->tpl_vars['use_taxes']->value) {?>
					<td colspan="2" class="price" id="total_price_container">
						<span id="total_price"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['total_price']->value),$_smarty_tpl);?>
</span>
					</td>
				<?php } else { ?>
					<td colspan="2" class="price" id="total_price_container">
						<span id="total_price"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['total_price_without_tax']->value),$_smarty_tpl);?>
</span>
					</td>
				<?php }?>
			</tr>
			<?php if (isset($_smarty_tpl->tpl_vars['COD_FEE']->value)) {?>
				<tr class="cart_total_price total_price cod_fee" style="display: none">
					<td colspan="<?php echo intval($_smarty_tpl->tpl_vars['col_span_subtotal']->value);?>
"><?php echo smartyTranslate(array('s'=>'Total + COD Fee:','mod'=>'advancedcheckout'),$_smarty_tpl);?>
</td>
						<?php echo smarty_function_math(array('assign'=>"total_price_cod",'equation'=>'a + b','a'=>$_smarty_tpl->tpl_vars['total_price']->value,'b'=>$_smarty_tpl->tpl_vars['COD_FEE']->value),$_smarty_tpl);?>

					<td colspan="2" class="price ttpcod" id="total_price"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['total_price_cod']->value),$_smarty_tpl);?>
</td>
				</tr>
			<?php }?>
		</tfoot>
		<tbody>
			<?php $_smarty_tpl->tpl_vars['odd'] = new Smarty_variable(0, null, 0);?>
			<?php $_smarty_tpl->tpl_vars['have_non_virtual_products'] = new Smarty_variable(false, null, 0);?>
			<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['product']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['product']->iteration=0;
 $_smarty_tpl->tpl_vars['product']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
 $_smarty_tpl->tpl_vars['product']->iteration++;
 $_smarty_tpl->tpl_vars['product']->index++;
 $_smarty_tpl->tpl_vars['product']->first = $_smarty_tpl->tpl_vars['product']->index === 0;
 $_smarty_tpl->tpl_vars['product']->last = $_smarty_tpl->tpl_vars['product']->iteration === $_smarty_tpl->tpl_vars['product']->total;
?>
				<?php if ($_smarty_tpl->tpl_vars['product']->value['is_virtual']==0) {?>
					<?php $_smarty_tpl->tpl_vars['have_non_virtual_products'] = new Smarty_variable(true, null, 0);?>
				<?php }?>
				<?php $_smarty_tpl->tpl_vars['productId'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value['id_product'], null, 0);?>
				<?php $_smarty_tpl->tpl_vars['productAttributeId'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value['id_product_attribute'], null, 0);?>
				<?php $_smarty_tpl->tpl_vars['quantityDisplayed'] = new Smarty_variable(0, null, 0);?>
				<?php $_smarty_tpl->tpl_vars['odd'] = new Smarty_variable(($_smarty_tpl->tpl_vars['odd']->value+1)%2, null, 0);?>
				<?php $_smarty_tpl->tpl_vars['ignoreProductLast'] = new Smarty_variable(isset($_smarty_tpl->tpl_vars['customizedDatas']->value[$_smarty_tpl->tpl_vars['productId']->value][$_smarty_tpl->tpl_vars['productAttributeId']->value])||count($_smarty_tpl->tpl_vars['gift_products']->value), null, 0);?>
				
				<?php echo $_smarty_tpl->getSubTemplate ("./shopping-cart-product-line.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('productLast'=>$_smarty_tpl->tpl_vars['product']->last,'productFirst'=>$_smarty_tpl->tpl_vars['product']->first), 0);?>

				
				<?php if (isset($_smarty_tpl->tpl_vars['customizedDatas']->value[$_smarty_tpl->tpl_vars['productId']->value][$_smarty_tpl->tpl_vars['productAttributeId']->value])) {?>
					<?php  $_smarty_tpl->tpl_vars['customization'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['customization']->_loop = false;
 $_smarty_tpl->tpl_vars['id_customization'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['customizedDatas']->value[$_smarty_tpl->tpl_vars['productId']->value][$_smarty_tpl->tpl_vars['productAttributeId']->value][$_smarty_tpl->tpl_vars['product']->value['id_address_delivery']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['customization']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['customization']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['customization']->key => $_smarty_tpl->tpl_vars['customization']->value) {
$_smarty_tpl->tpl_vars['customization']->_loop = true;
 $_smarty_tpl->tpl_vars['id_customization']->value = $_smarty_tpl->tpl_vars['customization']->key;
 $_smarty_tpl->tpl_vars['customization']->iteration++;
 $_smarty_tpl->tpl_vars['customization']->last = $_smarty_tpl->tpl_vars['customization']->iteration === $_smarty_tpl->tpl_vars['customization']->total;
?>
						<tr
							id="product_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']);?>
_<?php echo intval($_smarty_tpl->tpl_vars['id_customization']->value);?>
_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_address_delivery']);?>
"
							class="product_customization_for_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']);?>
_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_address_delivery']);?>
<?php if ($_smarty_tpl->tpl_vars['odd']->value) {?> odd<?php } else { ?> even<?php }?> customization alternate_item <?php if ($_smarty_tpl->tpl_vars['product']->last&&$_smarty_tpl->tpl_vars['customization']->last&&!count($_smarty_tpl->tpl_vars['gift_products']->value)) {?>last_item<?php }?>">
							<td></td>
							<td colspan="3">
								<?php  $_smarty_tpl->tpl_vars['custom_data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['custom_data']->_loop = false;
 $_smarty_tpl->tpl_vars['type'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['customization']->value['datas']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['custom_data']->key => $_smarty_tpl->tpl_vars['custom_data']->value) {
$_smarty_tpl->tpl_vars['custom_data']->_loop = true;
 $_smarty_tpl->tpl_vars['type']->value = $_smarty_tpl->tpl_vars['custom_data']->key;
?>
									<?php if ($_smarty_tpl->tpl_vars['type']->value==$_smarty_tpl->tpl_vars['CUSTOMIZE_FILE']->value) {?>
										<div class="customizationUploaded">
											<ul class="customizationUploaded">
												<?php  $_smarty_tpl->tpl_vars['picture'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['picture']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['custom_data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['picture']->key => $_smarty_tpl->tpl_vars['picture']->value) {
$_smarty_tpl->tpl_vars['picture']->_loop = true;
?>
													<li><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pic_dir']->value, ENT_QUOTES, 'UTF-8', true);?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['picture']->value['value'], ENT_QUOTES, 'UTF-8', true);?>
_small" alt="" class="customizationUploaded" /></li>
												<?php } ?>
											</ul>
										</div>
									<?php } elseif ($_smarty_tpl->tpl_vars['type']->value==$_smarty_tpl->tpl_vars['CUSTOMIZE_TEXTFIELD']->value) {?>
										<ul class="typedText">
											<?php  $_smarty_tpl->tpl_vars['textField'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['textField']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['custom_data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['textField']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['textField']->key => $_smarty_tpl->tpl_vars['textField']->value) {
$_smarty_tpl->tpl_vars['textField']->_loop = true;
 $_smarty_tpl->tpl_vars['textField']->index++;
?>
												<li>
													<?php if ($_smarty_tpl->tpl_vars['textField']->value['name']) {?>
														<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['textField']->value['name'], ENT_QUOTES, 'UTF-8', true);?>

													<?php } else { ?>
														<?php echo smartyTranslate(array('s'=>'Text #','mod'=>'advancedcheckout'),$_smarty_tpl);?>
<?php echo $_smarty_tpl->tpl_vars['textField']->index+htmlspecialchars(1, ENT_QUOTES, 'UTF-8', true);?>

													<?php }?>
													: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['textField']->value['value'], ENT_QUOTES, 'UTF-8', true);?>

												</li>
											<?php } ?>
										</ul>
									<?php }?>
								<?php } ?>
							</td>
							<td class="cart_quantity" colspan="2">
								<?php if (isset($_smarty_tpl->tpl_vars['cannotModify']->value)&&$_smarty_tpl->tpl_vars['cannotModify']->value==1) {?>
									<span><?php if ($_smarty_tpl->tpl_vars['quantityDisplayed']->value==0&&isset($_smarty_tpl->tpl_vars['customizedDatas']->value[$_smarty_tpl->tpl_vars['productId']->value][$_smarty_tpl->tpl_vars['productAttributeId']->value])) {?><?php echo count($_smarty_tpl->tpl_vars['customizedDatas']->value[$_smarty_tpl->tpl_vars['productId']->value][$_smarty_tpl->tpl_vars['productAttributeId']->value]);?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['product']->value['cart_quantity']-intval($_smarty_tpl->tpl_vars['quantityDisplayed']->value);?>
<?php }?></span>
								<?php } else { ?>
									<input type="hidden" value="<?php echo intval($_smarty_tpl->tpl_vars['customization']->value['quantity']);?>
" name="quantity_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']);?>
_<?php echo intval($_smarty_tpl->tpl_vars['id_customization']->value);?>
_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_address_delivery']);?>
_hidden"/>
									<input type="text" value="<?php echo intval($_smarty_tpl->tpl_vars['customization']->value['quantity']);?>
" class="cart_quantity_input form-control grey" name="quantity_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']);?>
_<?php echo intval($_smarty_tpl->tpl_vars['id_customization']->value);?>
_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_address_delivery']);?>
"/>
									<div class="cart_quantity_button clearfix">
										<?php if ($_smarty_tpl->tpl_vars['product']->value['minimal_quantity']<($_smarty_tpl->tpl_vars['customization']->value['quantity']-$_smarty_tpl->tpl_vars['quantityDisplayed']->value)||$_smarty_tpl->tpl_vars['product']->value['minimal_quantity']<=1) {?>
											<a
												id="cart_quantity_down_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']);?>
_<?php echo intval($_smarty_tpl->tpl_vars['id_customization']->value);?>
_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_address_delivery']);?>
"
												class="cart_quantity_down btn btn-default button-minus"
												href="<?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
<?php $_tmp4=ob_get_clean();?><?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']);?>
<?php $_tmp5=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('cart',true,null,"add=1&amp;id_product=".$_tmp4."&amp;ipa=".$_tmp5."&amp;id_address_delivery=".((string)$_smarty_tpl->tpl_vars['product']->value['id_address_delivery'])."&amp;id_customization=".((string)$_smarty_tpl->tpl_vars['id_customization']->value)."&amp;op=down&amp;token=".((string)$_smarty_tpl->tpl_vars['token_cart']->value)), ENT_QUOTES, 'UTF-8', true);?>
"
												rel="nofollow"
												title="<?php echo smartyTranslate(array('s'=>'Subtract','mod'=>'advancedcheckout'),$_smarty_tpl);?>
">
												<span><i class="icon-minus"></i></span>
											</a>
										<?php } else { ?>
											<a
												id="cart_quantity_down_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']);?>
_<?php echo intval($_smarty_tpl->tpl_vars['id_customization']->value);?>
"
												class="cart_quantity_down btn btn-default button-minus disabled"
												href="#"
												title="<?php echo smartyTranslate(array('s'=>'Subtract','mod'=>'advancedcheckout'),$_smarty_tpl);?>
">
												<span><i class="icon-minus"></i></span>
											</a>
										<?php }?>
										<a
											id="cart_quantity_up_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']);?>
_<?php echo intval($_smarty_tpl->tpl_vars['id_customization']->value);?>
_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_address_delivery']);?>
"
											class="cart_quantity_up btn btn-default button-plus"
											href="<?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
<?php $_tmp6=ob_get_clean();?><?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']);?>
<?php $_tmp7=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('cart',true,null,"add=1&amp;id_product=".$_tmp6."&amp;ipa=".$_tmp7."&amp;id_address_delivery=".((string)$_smarty_tpl->tpl_vars['product']->value['id_address_delivery'])."&amp;id_customization=".((string)$_smarty_tpl->tpl_vars['id_customization']->value)."&amp;token=".((string)$_smarty_tpl->tpl_vars['token_cart']->value)), ENT_QUOTES, 'UTF-8', true);?>
"
											rel="nofollow"
											title="<?php echo smartyTranslate(array('s'=>'Add','mod'=>'advancedcheckout'),$_smarty_tpl);?>
">
											<span><i class="icon-plus"></i></span>
										</a>
									</div>
								<?php }?>
							</td>
							<td class="cart_delete">
								<?php if (isset($_smarty_tpl->tpl_vars['cannotModify']->value)&&$_smarty_tpl->tpl_vars['cannotModify']->value==1) {?>
								<?php } else { ?>
									<div>
										<a
											id="<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']);?>
_<?php echo intval($_smarty_tpl->tpl_vars['id_customization']->value);?>
_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_address_delivery']);?>
"
											class="cart_quantity_delete"
											href="<?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
<?php $_tmp8=ob_get_clean();?><?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']);?>
<?php $_tmp9=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('cart',true,null,"delete=1&amp;id_product=".$_tmp8."&amp;ipa=".$_tmp9."&amp;id_customization=".((string)$_smarty_tpl->tpl_vars['id_customization']->value)."&amp;id_address_delivery=".((string)$_smarty_tpl->tpl_vars['product']->value['id_address_delivery'])."&amp;token=".((string)$_smarty_tpl->tpl_vars['token_cart']->value)), ENT_QUOTES, 'UTF-8', true);?>
"
											rel="nofollow"
											title="<?php echo smartyTranslate(array('s'=>'Delete','mod'=>'advancedcheckout'),$_smarty_tpl);?>
">
											<i class=" icon-trash"></i>
										</a>
									</div>
								<?php }?>
							</td>
						</tr>
						<?php $_smarty_tpl->tpl_vars['quantityDisplayed'] = new Smarty_variable($_smarty_tpl->tpl_vars['quantityDisplayed']->value+$_smarty_tpl->tpl_vars['customization']->value['quantity'], null, 0);?>
					<?php } ?>

					
					<?php if ($_smarty_tpl->tpl_vars['product']->value['quantity']-$_smarty_tpl->tpl_vars['quantityDisplayed']->value>0) {?><?php echo $_smarty_tpl->getSubTemplate ("./shopping-cart-product-line.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('productLast'=>$_smarty_tpl->tpl_vars['product']->last,'productFirst'=>$_smarty_tpl->tpl_vars['product']->first), 0);?>
<?php }?>
				<?php }?>
			<?php } ?>
			<?php $_smarty_tpl->tpl_vars['last_was_odd'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->iteration%2, null, 0);?>
			<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['gift_products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['product']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['product']->iteration=0;
 $_smarty_tpl->tpl_vars['product']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
 $_smarty_tpl->tpl_vars['product']->iteration++;
 $_smarty_tpl->tpl_vars['product']->index++;
 $_smarty_tpl->tpl_vars['product']->first = $_smarty_tpl->tpl_vars['product']->index === 0;
 $_smarty_tpl->tpl_vars['product']->last = $_smarty_tpl->tpl_vars['product']->iteration === $_smarty_tpl->tpl_vars['product']->total;
?>
				<?php $_smarty_tpl->tpl_vars['productId'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value['id_product'], null, 0);?>
				<?php $_smarty_tpl->tpl_vars['productAttributeId'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value['id_product_attribute'], null, 0);?>
				<?php $_smarty_tpl->tpl_vars['quantityDisplayed'] = new Smarty_variable(0, null, 0);?>
				<?php $_smarty_tpl->tpl_vars['odd'] = new Smarty_variable(($_smarty_tpl->tpl_vars['product']->iteration+$_smarty_tpl->tpl_vars['last_was_odd']->value)%2, null, 0);?>
				<?php $_smarty_tpl->tpl_vars['ignoreProductLast'] = new Smarty_variable(isset($_smarty_tpl->tpl_vars['customizedDatas']->value[$_smarty_tpl->tpl_vars['productId']->value][$_smarty_tpl->tpl_vars['productAttributeId']->value]), null, 0);?>
				<?php $_smarty_tpl->tpl_vars['cannotModify'] = new Smarty_variable(1, null, 0);?>
				
				<?php echo $_smarty_tpl->getSubTemplate ("./shopping-cart-product-line.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('productLast'=>$_smarty_tpl->tpl_vars['product']->last,'productFirst'=>$_smarty_tpl->tpl_vars['product']->first), 0);?>

			<?php } ?>
		</tbody>
		<?php if (sizeof($_smarty_tpl->tpl_vars['discounts']->value)) {?>
			<tbody>
				<?php  $_smarty_tpl->tpl_vars['discount'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['discount']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['discounts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['discount']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['discount']->iteration=0;
 $_smarty_tpl->tpl_vars['discount']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['discount']->key => $_smarty_tpl->tpl_vars['discount']->value) {
$_smarty_tpl->tpl_vars['discount']->_loop = true;
 $_smarty_tpl->tpl_vars['discount']->iteration++;
 $_smarty_tpl->tpl_vars['discount']->index++;
 $_smarty_tpl->tpl_vars['discount']->first = $_smarty_tpl->tpl_vars['discount']->index === 0;
 $_smarty_tpl->tpl_vars['discount']->last = $_smarty_tpl->tpl_vars['discount']->iteration === $_smarty_tpl->tpl_vars['discount']->total;
?>
					<tr class="cart_discount <?php if ($_smarty_tpl->tpl_vars['discount']->last) {?>last_item<?php } elseif ($_smarty_tpl->tpl_vars['discount']->first) {?>first_item<?php } else { ?>item<?php }?>" id="cart_discount_<?php echo intval($_smarty_tpl->tpl_vars['discount']->value['id_discount']);?>
">
						<td class="cart_discount_name" colspan="2"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['discount']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</td>
						<td class="cart_discount_price">
						<div class="mobile_table_title visible-phone"><?php echo smartyTranslate(array('s'=>'Unit price b','mod'=>'advancedcheckout'),$_smarty_tpl);?>
</div>
						<div class="mobile_table_content">
						<span class="price-discount price">
							<?php if (!$_smarty_tpl->tpl_vars['priceDisplay']->value) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['discount']->value['value_real']*-1),$_smarty_tpl);?>
<?php } else { ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['discount']->value['value_tax_exc']*-1),$_smarty_tpl);?>
<?php }?>
						</span>
						</div>
						</td>
						<td class="cart_discount_delete">
						<div class="mobile_table_title visible-phone"><?php echo smartyTranslate(array('s'=>'Qty','mod'=>'advancedcheckout'),$_smarty_tpl);?>
</div>
						<div class="mobile_table_content">1</div>
						</td>
						<td class="cart_discount_price">
						<div class="mobile_table_title visible-phone"><?php echo smartyTranslate(array('s'=>'Total','mod'=>'advancedcheckout'),$_smarty_tpl);?>
</div>
						<div class="mobile_table_content">
							<span class="price-discount price"><?php if (!$_smarty_tpl->tpl_vars['priceDisplay']->value) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['discount']->value['value_real']*-1),$_smarty_tpl);?>
<?php } else { ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['discount']->value['value_tax_exc']*-1),$_smarty_tpl);?>
<?php }?></span>
						</div>
						</td>
						<td class="price_discount_del">
						<div class="mobile_table_title visible-phone"></div>
						<div class="mobile_table_content">
							<?php if (strlen($_smarty_tpl->tpl_vars['discount']->value['code'])) {?><a onclick="deldisc('<?php echo intval($_smarty_tpl->tpl_vars['discount']->value['id_discount']);?>
')" class="price_discount_delete" title="<?php echo smartyTranslate(array('s'=>'Delete','mod'=>'advancedcheckout'),$_smarty_tpl);?>
"><i class="fa-trash  fa"></i></a><?php }?>
						</div>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		<?php }?>
	</table>
	<div class="cart_foot">
		<div id="HOOK_SHOPPING_CART"><?php echo $_smarty_tpl->tpl_vars['HOOK_SHOPPING_CART']->value;?>
</div>
		<?php if (!empty($_smarty_tpl->tpl_vars['HOOK_SHOPPING_CART_EXTRA']->value)) {?>
			<div class="clear"></div>
			<div class="cart_navigation_extra">
				<div id="HOOK_SHOPPING_CART_EXTRA"><?php echo $_smarty_tpl->tpl_vars['HOOK_SHOPPING_CART_EXTRA']->value;?>
</div>
			</div>
		<?php }?>
		<div style="clear:both;"></div>
	</div>
</div> <!-- end order-detail-content -->
<?php if (!$_smarty_tpl->tpl_vars['adv_show_oc']->value&&$_smarty_tpl->tpl_vars['comment_field']->value=='cart') {?>
	<br/><div class="opc-form-group is_customer_param">
		<label for="messagex" class="w100 opc-control-label"><?php echo smartyTranslate(array('s'=>'Leave a message','mod'=>'advancedcheckout'),$_smarty_tpl);?>
</label>
		<div class="w100 opc-input-icon opc-icon-right">
			<textarea class="opc-form-control opc-elastic" name="messagex" placeholder="<?php echo smartyTranslate(array('s'=>'If you would like to add a comment about your order, please write it in the field below.','mod'=>'advancedcheckout'),$_smarty_tpl);?>
" id="messagex" cols="26" rows="3"><?php if (isset($_smarty_tpl->tpl_vars['oldMessage']->value)) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['oldMessage']->value, ENT_QUOTES, 'UTF-8', true);?>
<?php }?></textarea>
			<i class="fa fa-comment"></i>
		</div>
	</div>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['show_option_allow_separate_package']->value) {?>
	<p>
		<input type="checkbox" name="allow_seperated_package" id="allow_seperated_package" <?php if ($_smarty_tpl->tpl_vars['cart']->value->allow_seperated_package) {?>checked="checked"<?php }?> autocomplete="off"/>
		<label for="allow_seperated_package"><?php echo smartyTranslate(array('s'=>'Send available products first','mod'=>'advancedcheckout'),$_smarty_tpl);?>
</label>
	</p>
<?php }?>



<?php if (!isset($_smarty_tpl->tpl_vars['addresses_style']->value)) {?>
	<?php $_smarty_tpl->createLocalArrayVariable('addresses_style', null, 0);
$_smarty_tpl->tpl_vars['addresses_style']->value['company'] = 'address_company';?>
	<?php $_smarty_tpl->createLocalArrayVariable('addresses_style', null, 0);
$_smarty_tpl->tpl_vars['addresses_style']->value['vat_number'] = 'address_company';?>
	<?php $_smarty_tpl->createLocalArrayVariable('addresses_style', null, 0);
$_smarty_tpl->tpl_vars['addresses_style']->value['firstname'] = 'address_name';?>
	<?php $_smarty_tpl->createLocalArrayVariable('addresses_style', null, 0);
$_smarty_tpl->tpl_vars['addresses_style']->value['lastname'] = 'address_name';?>
	<?php $_smarty_tpl->createLocalArrayVariable('addresses_style', null, 0);
$_smarty_tpl->tpl_vars['addresses_style']->value['address1'] = 'address_address1';?>
	<?php $_smarty_tpl->createLocalArrayVariable('addresses_style', null, 0);
$_smarty_tpl->tpl_vars['addresses_style']->value['address2'] = 'address_address2';?>
	<?php $_smarty_tpl->createLocalArrayVariable('addresses_style', null, 0);
$_smarty_tpl->tpl_vars['addresses_style']->value['city'] = 'address_city';?>
	<?php $_smarty_tpl->createLocalArrayVariable('addresses_style', null, 0);
$_smarty_tpl->tpl_vars['addresses_style']->value['country'] = 'address_country';?>
	<?php $_smarty_tpl->createLocalArrayVariable('addresses_style', null, 0);
$_smarty_tpl->tpl_vars['addresses_style']->value['phone'] = 'address_phone';?>
	<?php $_smarty_tpl->createLocalArrayVariable('addresses_style', null, 0);
$_smarty_tpl->tpl_vars['addresses_style']->value['phone_mobile'] = 'address_phone_mobile';?>
	<?php $_smarty_tpl->createLocalArrayVariable('addresses_style', null, 0);
$_smarty_tpl->tpl_vars['addresses_style']->value['alias'] = 'address_title';?>
<?php }?><?php }} ?>
