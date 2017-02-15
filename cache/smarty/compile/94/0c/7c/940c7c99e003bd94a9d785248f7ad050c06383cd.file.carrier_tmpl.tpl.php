<?php /* Smarty version Smarty-3.1.19, created on 2016-12-25 17:12:17
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/advancedcheckout/views/templates/front/carrier_tmpl.tpl" */ ?>
<?php /*%%SmartyHeaderCode:735134652583ed9e1169867-00514801%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '940c7c99e003bd94a9d785248f7ad050c06383cd' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/advancedcheckout/views/templates/front/carrier_tmpl.tpl',
      1 => 1482664250,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '735134652583ed9e1169867-00514801',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_583ed9e134ce37_34726438',
  'variables' => 
  array (
    'carriers' => 0,
    'HOOK_BEFORECARRIER' => 0,
    'isVirtualCart' => 0,
    'recyclablePackAllowed' => 0,
    'recyclable' => 0,
    'delivery_option_list' => 0,
    'option_list' => 0,
    'option' => 0,
    'id_address' => 0,
    'key' => 0,
    'delivery_option' => 0,
    'carrier' => 0,
    'pathx' => 0,
    'cookie' => 0,
    'free_shipping' => 0,
    'use_taxes' => 0,
    'priceDisplay' => 0,
    'tax_view' => 0,
    'first' => 0,
    'product' => 0,
    'display_tax_label' => 0,
    'cart' => 0,
    'address' => 0,
    'HOOK_EXTRACARRIER_ADDR' => 0,
    'adv_show_oc' => 0,
    'comment_field' => 0,
    'oldMessage' => 0,
    'giftAllowed' => 0,
    'gift_wrapping_price' => 0,
    'total_wrapping_tax_exc_cost' => 0,
    'total_wrapping_cost' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_583ed9e134ce37_34726438')) {function content_583ed9e134ce37_34726438($_smarty_tpl) {?>

<script type="text/javascript">
	$(document).ready(function(){
		if ($('#gift').is(':checked'))
			$('#gift_div').show();
		else
			$('#gift_div').hide();
	});
</script>
<div class="opc-alert opc-alert-danger carrier_error" style="display:none;">
	<i class="fa fa-times-circle opc-sign"></i>
	<?php echo smartyTranslate(array('s'=>'No carrier selected.','mod'=>'advancedcheckout'),$_smarty_tpl);?>

</div>
<div id="HOOK_BEFORECARRIER">
	<?php if (isset($_smarty_tpl->tpl_vars['carriers']->value)&&isset($_smarty_tpl->tpl_vars['HOOK_BEFORECARRIER']->value)) {?>
		<?php echo $_smarty_tpl->tpl_vars['HOOK_BEFORECARRIER']->value;?>

	<?php }?>
</div>
<input type="hidden" name="vcart" value="<?php echo intval($_smarty_tpl->tpl_vars['isVirtualCart']->value);?>
">
<?php if (isset($_smarty_tpl->tpl_vars['isVirtualCart']->value)&&$_smarty_tpl->tpl_vars['isVirtualCart']->value) {?>
	<p class="opc-alert opc-alert-warning">
		<i class="fa fa-warning opc-sign"></i>
		<?php echo smartyTranslate(array('s'=>'No carrier is needed for this order. This product is virtual.','mod'=>'advancedcheckout'),$_smarty_tpl);?>

	</p>
<?php } else { ?>
	<?php if ($_smarty_tpl->tpl_vars['recyclablePackAllowed']->value) {?>
		<div class="opc-form-group">
			<div class="w100">
				<div class="opc-checkbox">
					<label for="recyclable">
						<input type="checkbox" name="recyclable" id="recyclable" value="1" <?php if ($_smarty_tpl->tpl_vars['recyclable']->value==1) {?>checked="checked"<?php }?> />
						<span class="opc-text"><?php echo smartyTranslate(array('s'=>'I would like to receive my order in recycled packaging.','mod'=>'advancedcheckout'),$_smarty_tpl);?>
.</span>
					</label>
				</div>
			</div>
		</div>
	<?php }?>
	<div class="delivery_options_address">
		<?php if (isset($_smarty_tpl->tpl_vars['delivery_option_list']->value)) {?>
			<?php  $_smarty_tpl->tpl_vars['option_list'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['option_list']->_loop = false;
 $_smarty_tpl->tpl_vars['id_address'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['delivery_option_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['option_list']->key => $_smarty_tpl->tpl_vars['option_list']->value) {
$_smarty_tpl->tpl_vars['option_list']->_loop = true;
 $_smarty_tpl->tpl_vars['id_address']->value = $_smarty_tpl->tpl_vars['option_list']->key;
?>					
				<div class="opc-delivery_options">
					<?php  $_smarty_tpl->tpl_vars['option'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['option']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['option_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['option']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['option']->key => $_smarty_tpl->tpl_vars['option']->value) {
$_smarty_tpl->tpl_vars['option']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['option']->key;
 $_smarty_tpl->tpl_vars['option']->index++;
?>
						<div class="delivery_option <?php if (($_smarty_tpl->tpl_vars['option']->index%2)) {?>alternate_<?php }?>item">
							<div>
								<table class="resume opc-table <?php if (!$_smarty_tpl->tpl_vars['option']->value['unique_carrier']) {?> not-displayable<?php }?>">
									<tr>
										<td class="delivery_option_radio" width="5%">
											<div class="opc-form-group">
												<div class="opc-radio">
													<label>
														<input onchange="updcarrieraddress(1);" id="delivery_option_<?php echo intval($_smarty_tpl->tpl_vars['id_address']->value);?>
_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['option']->value, ENT_QUOTES, 'UTF-8', true);?>
" class="delivery_option_radio" type="radio" name="delivery_option[<?php echo intval($_smarty_tpl->tpl_vars['id_address']->value);?>
]" data-key="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['key']->value, ENT_QUOTES, 'UTF-8', true);?>
" data-id_address="<?php echo intval($_smarty_tpl->tpl_vars['id_address']->value);?>
" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['key']->value, ENT_QUOTES, 'UTF-8', true);?>
"<?php if (isset($_smarty_tpl->tpl_vars['delivery_option']->value[$_smarty_tpl->tpl_vars['id_address']->value])&&$_smarty_tpl->tpl_vars['delivery_option']->value[$_smarty_tpl->tpl_vars['id_address']->value]==$_smarty_tpl->tpl_vars['key']->value) {?> checked="checked"<?php }?> />
														<span class="opc-text"></span>
													</label>
												</div>
											</div>
										</td>
										<td class="delivery_option_logo" width="25%">
											<?php  $_smarty_tpl->tpl_vars['carrier'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['carrier']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['option']->value['carrier_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['carrier']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['carrier']->key => $_smarty_tpl->tpl_vars['carrier']->value) {
$_smarty_tpl->tpl_vars['carrier']->_loop = true;
 $_smarty_tpl->tpl_vars['carrier']->iteration++;
?>
													<?php if ($_smarty_tpl->tpl_vars['carrier']->value['logo']) {?>                                                            
														<label for="delivery_option_<?php echo intval($_smarty_tpl->tpl_vars['id_address']->value);?>
_<?php echo intval($_smarty_tpl->tpl_vars['option']->index);?>
"><img width="" height="" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['carrier']->value['logo'], ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['carrier']->value['instance']->name, ENT_QUOTES, 'UTF-8', true);?>
"/></label>
													<?php } else { ?>
													   <label for="delivery_option_<?php echo intval($_smarty_tpl->tpl_vars['id_address']->value);?>
_<?php echo intval($_smarty_tpl->tpl_vars['option']->index);?>
"><img height="35" width="65" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pathx']->value, ENT_QUOTES, 'UTF-8', true);?>
views/img/shipping.png" /></label>                                                           
													<?php }?>
											  
											<?php } ?>
										</td>
										<td width="45%">
											<?php if ($_smarty_tpl->tpl_vars['option']->value['unique_carrier']) {?>
												<?php  $_smarty_tpl->tpl_vars['carrier'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['carrier']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['option']->value['carrier_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['carrier']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['carrier']->key => $_smarty_tpl->tpl_vars['carrier']->value) {
$_smarty_tpl->tpl_vars['carrier']->_loop = true;
 $_smarty_tpl->tpl_vars['carrier']->iteration++;
?>
													<strong><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['carrier']->value['instance']->name, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</strong>
												<?php } ?>
												<?php if (isset($_smarty_tpl->tpl_vars['carrier']->value['instance']->delay[$_smarty_tpl->tpl_vars['cookie']->value->id_lang])) {?>
													<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['carrier']->value['instance']->delay[$_smarty_tpl->tpl_vars['cookie']->value->id_lang], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

												<?php }?>
											<?php }?>
											<?php if (count($_smarty_tpl->tpl_vars['option_list']->value)>1) {?>
												<?php if ($_smarty_tpl->tpl_vars['option']->value['is_best_grade']) {?>
													<?php if ($_smarty_tpl->tpl_vars['option']->value['is_best_price']) {?>
														<?php echo smartyTranslate(array('s'=>'The best price and speed','mod'=>'advancedcheckout'),$_smarty_tpl);?>

													<?php } else { ?>
														<?php echo smartyTranslate(array('s'=>'The fastest','mod'=>'advancedcheckout'),$_smarty_tpl);?>

													<?php }?>
												<?php } else { ?>
													<?php if ($_smarty_tpl->tpl_vars['option']->value['is_best_price']) {?>
														<?php echo smartyTranslate(array('s'=>'The best price','mod'=>'advancedcheckout'),$_smarty_tpl);?>

													<?php }?>
												<?php }?>
											<?php }?>
										</td>
										<td class="delivery_option_price" width="25%">
											<div class="delivery_option_price">
												<?php if ($_smarty_tpl->tpl_vars['option']->value['total_price_with_tax']&&(!isset($_smarty_tpl->tpl_vars['free_shipping']->value)||(isset($_smarty_tpl->tpl_vars['free_shipping']->value)&&!$_smarty_tpl->tpl_vars['free_shipping']->value))) {?>
													<?php if ($_smarty_tpl->tpl_vars['use_taxes']->value==1) {?>
														<?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value==1) {?>
															<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['option']->value['total_price_without_tax']),$_smarty_tpl);?>
<?php if (!$_smarty_tpl->tpl_vars['tax_view']->value) {?> <?php echo smartyTranslate(array('s'=>'(tax excl.)','mod'=>'advancedcheckout'),$_smarty_tpl);?>
<?php }?>
														<?php } else { ?>
															<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['option']->value['total_price_with_tax']),$_smarty_tpl);?>
<?php if (!$_smarty_tpl->tpl_vars['tax_view']->value) {?> <?php echo smartyTranslate(array('s'=>'(tax incl.)','mod'=>'advancedcheckout'),$_smarty_tpl);?>
<?php }?>
														<?php }?>
													<?php } else { ?>
														<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['option']->value['total_price_without_tax']),$_smarty_tpl);?>

													<?php }?>
												<?php } else { ?>
													<?php echo smartyTranslate(array('s'=>'Free','mod'=>'advancedcheckout'),$_smarty_tpl);?>

												<?php }?>
											</div>
										</td>
									</tr>
								</table>
								<?php if (!$_smarty_tpl->tpl_vars['option']->value['unique_carrier']) {?>
									<table class="delivery_option_carrier<?php if (isset($_smarty_tpl->tpl_vars['delivery_option']->value[$_smarty_tpl->tpl_vars['id_address']->value])&&$_smarty_tpl->tpl_vars['delivery_option']->value[$_smarty_tpl->tpl_vars['id_address']->value]==$_smarty_tpl->tpl_vars['key']->value) {?> selected<?php }?> resume table table-bordered<?php if ($_smarty_tpl->tpl_vars['option']->value['unique_carrier']) {?> not-displayable<?php }?>">
										<tr>
											<?php if (!$_smarty_tpl->tpl_vars['option']->value['unique_carrier']) {?>
												<td rowspan="<?php echo count($_smarty_tpl->tpl_vars['option']->value['carrier_list']);?>
" class="delivery_option_radio first_item">
													<input id="delivery_option_<?php echo intval($_smarty_tpl->tpl_vars['id_address']->value);?>
_<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['option']->value, ENT_QUOTES, 'UTF-8', true);?>
" class="delivery_option_radio" type="radio" name="delivery_option[<?php echo intval($_smarty_tpl->tpl_vars['id_address']->value);?>
]" data-key="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['key']->value, ENT_QUOTES, 'UTF-8', true);?>
" data-id_address="<?php echo intval($_smarty_tpl->tpl_vars['id_address']->value);?>
" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['key']->value, ENT_QUOTES, 'UTF-8', true);?>
"<?php if (isset($_smarty_tpl->tpl_vars['delivery_option']->value[$_smarty_tpl->tpl_vars['id_address']->value])&&$_smarty_tpl->tpl_vars['delivery_option']->value[$_smarty_tpl->tpl_vars['id_address']->value]==$_smarty_tpl->tpl_vars['key']->value) {?> checked="checked"<?php }?> />
													<!-- <div class="opc-form-group">
														<label class="w100 control-label">Inline Radios</label>
														<label class="opc-radio-inline">
															<div class="opc-radio-container" style="position: relative;">
																<input type="radio" name="radio1" value="option1" style="position: absolute; opacity: 0;">
															</div>unchecked
														</label>
													</div> -->
												</td>
											<?php }?>
											<?php $_smarty_tpl->tpl_vars["first"] = new Smarty_variable(current($_smarty_tpl->tpl_vars['option']->value['carrier_list']), null, 0);?>
											<td class="delivery_option_logo<?php if ($_smarty_tpl->tpl_vars['first']->value['product_list'][0]['carrier_list'][0]==0) {?> not-displayable<?php }?>">
												<?php if ($_smarty_tpl->tpl_vars['first']->value['logo']) {?>
													<img src="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['first']->value['logo'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" alt="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['first']->value['instance']->name, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"/>
												<?php } elseif (!$_smarty_tpl->tpl_vars['option']->value['unique_carrier']) {?>
													<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['first']->value['instance']->name, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

												<?php }?>
											</td>
											<td class="<?php if ($_smarty_tpl->tpl_vars['option']->value['unique_carrier']) {?>first_item<?php }?><?php if ($_smarty_tpl->tpl_vars['first']->value['product_list'][0]['carrier_list'][0]==0) {?> not-displayable<?php }?>">
												<input type="hidden" value="<?php echo intval($_smarty_tpl->tpl_vars['first']->value['instance']->id);?>
" name="id_carrier" />
												<?php if (isset($_smarty_tpl->tpl_vars['first']->value['instance']->delay[$_smarty_tpl->tpl_vars['cookie']->value->id_lang])) {?>
													<i class="icon-info-sign"></i><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['first']->value['instance']->delay[$_smarty_tpl->tpl_vars['cookie']->value->id_lang], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

													<?php if (count($_smarty_tpl->tpl_vars['first']->value['product_list'])<=1) {?>
														(<?php echo smartyTranslate(array('s'=>'Product concerned:','mod'=>'advancedcheckout'),$_smarty_tpl);?>

													<?php } else { ?>
														(<?php echo smartyTranslate(array('s'=>'Products concerned:','mod'=>'advancedcheckout'),$_smarty_tpl);?>

													<?php }?>
													<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['first']->value['product_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['product']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['product']->iteration=0;
 $_smarty_tpl->tpl_vars['product']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
 $_smarty_tpl->tpl_vars['product']->iteration++;
 $_smarty_tpl->tpl_vars['product']->index++;
 $_smarty_tpl->tpl_vars['product']->last = $_smarty_tpl->tpl_vars['product']->iteration === $_smarty_tpl->tpl_vars['product']->total;
?>
														<?php if ($_smarty_tpl->tpl_vars['product']->index==4) {?>
															<acronym title="
														<?php }?>
														<?php if ($_smarty_tpl->tpl_vars['product']->index>=4) {?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php if (isset($_smarty_tpl->tpl_vars['product']->value['attributes'])&&$_smarty_tpl->tpl_vars['product']->value['attributes']) {?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['attributes'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php }?><?php if (!$_smarty_tpl->tpl_vars['product']->last) {?>,&nbsp;<?php } else { ?>">&hellip;</acronym>)<?php }?><?php } else { ?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php if (isset($_smarty_tpl->tpl_vars['product']->value['attributes'])&&$_smarty_tpl->tpl_vars['product']->value['attributes']) {?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['attributes'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php }?><?php if (!$_smarty_tpl->tpl_vars['product']->last) {?>,&nbsp;<?php } else { ?>)<?php }?><?php }?><?php } ?><?php }?></td><td rowspan="<?php echo count($_smarty_tpl->tpl_vars['option']->value['carrier_list']);?>
" class="delivery_option_price"><div class="delivery_option_price"><?php if ($_smarty_tpl->tpl_vars['option']->value['total_price_with_tax']&&(!isset($_smarty_tpl->tpl_vars['free_shipping']->value)||(isset($_smarty_tpl->tpl_vars['free_shipping']->value)&&!$_smarty_tpl->tpl_vars['free_shipping']->value))) {?><?php if ($_smarty_tpl->tpl_vars['use_taxes']->value==1) {?><?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value==1) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['option']->value['total_price_without_tax']),$_smarty_tpl);?>
<?php if ($_smarty_tpl->tpl_vars['display_tax_label']->value) {?> <?php echo smartyTranslate(array('s'=>'(tax excl.)','mod'=>'advancedcheckout'),$_smarty_tpl);?>
<?php }?><?php } else { ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['option']->value['total_price_with_tax']),$_smarty_tpl);?>
<?php if ($_smarty_tpl->tpl_vars['display_tax_label']->value) {?> <?php echo smartyTranslate(array('s'=>'(tax incl.)','mod'=>'advancedcheckout'),$_smarty_tpl);?>
<?php }?><?php }?><?php } else { ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['option']->value['total_price_without_tax']),$_smarty_tpl);?>
<?php }?><?php } else { ?><?php echo smartyTranslate(array('s'=>'Free','mod'=>'advancedcheckout'),$_smarty_tpl);?>
<?php }?></div></td></tr><tr><td class="delivery_option_logo<?php if ($_smarty_tpl->tpl_vars['carrier']->value['product_list'][0]['carrier_list'][0]==0) {?> not-displayable<?php }?>"><?php  $_smarty_tpl->tpl_vars['carrier'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['carrier']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['option']->value['carrier_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['carrier']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['carrier']->key => $_smarty_tpl->tpl_vars['carrier']->value) {
$_smarty_tpl->tpl_vars['carrier']->_loop = true;
 $_smarty_tpl->tpl_vars['carrier']->iteration++;
?><?php if ($_smarty_tpl->tpl_vars['carrier']->iteration!=1) {?><?php if ($_smarty_tpl->tpl_vars['carrier']->value['logo']) {?><img src="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['carrier']->value['logo'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" alt="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['carrier']->value['instance']->name, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"/><?php } elseif (!$_smarty_tpl->tpl_vars['option']->value['unique_carrier']) {?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['carrier']->value['instance']->name, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php }?><?php }?><?php } ?></td><td class="<?php if ($_smarty_tpl->tpl_vars['option']->value['unique_carrier']) {?> first_item<?php }?><?php if ($_smarty_tpl->tpl_vars['carrier']->value['product_list'][0]['carrier_list'][0]==0) {?> not-displayable<?php }?>"><input type="hidden" value="<?php echo intval($_smarty_tpl->tpl_vars['first']->value['instance']->id);?>
" name="id_carrier" /><?php if (isset($_smarty_tpl->tpl_vars['carrier']->value['instance']->delay[$_smarty_tpl->tpl_vars['cookie']->value->id_lang])) {?><i class="icon-info-sign"></i><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['first']->value['instance']->delay[$_smarty_tpl->tpl_vars['cookie']->value->id_lang], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php if (count($_smarty_tpl->tpl_vars['carrier']->value['product_list'])<=1) {?>(<?php echo smartyTranslate(array('s'=>'Product concerned:','mod'=>'advancedcheckout'),$_smarty_tpl);?>
<?php } else { ?>(<?php echo smartyTranslate(array('s'=>'Products concerned:','mod'=>'advancedcheckout'),$_smarty_tpl);?>
<?php }?><?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['carrier']->value['product_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['product']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['product']->iteration=0;
 $_smarty_tpl->tpl_vars['product']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
 $_smarty_tpl->tpl_vars['product']->iteration++;
 $_smarty_tpl->tpl_vars['product']->index++;
 $_smarty_tpl->tpl_vars['product']->last = $_smarty_tpl->tpl_vars['product']->iteration === $_smarty_tpl->tpl_vars['product']->total;
?><?php if ($_smarty_tpl->tpl_vars['product']->index==4) {?><acronym title="<?php }?><?php if ($_smarty_tpl->tpl_vars['product']->index>=4) {?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php if (isset($_smarty_tpl->tpl_vars['product']->value['attributes'])&&$_smarty_tpl->tpl_vars['product']->value['attributes']) {?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['attributes'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php }?><?php if (!$_smarty_tpl->tpl_vars['product']->last) {?>,&nbsp;<?php } else { ?>">&hellip;</acronym>)<?php }?><?php } else { ?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php if (isset($_smarty_tpl->tpl_vars['product']->value['attributes'])&&$_smarty_tpl->tpl_vars['product']->value['attributes']) {?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['attributes'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php }?><?php if (!$_smarty_tpl->tpl_vars['product']->last) {?>,&nbsp;<?php } else { ?>)<?php }?><?php }?><?php } ?><?php }?></td></tr></table><?php }?></div></div> <!-- end delivery_option --><?php } ?></div> <!-- end delivery_options --><?php }
if (!$_smarty_tpl->tpl_vars['option_list']->_loop) {
?><div class="opc-bs-callout opc-bs-callout-danger"><?php  $_smarty_tpl->tpl_vars['address'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['address']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cart']->value->getDeliveryAddressesWithoutCarriers(true); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['address']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['address']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['address']->key => $_smarty_tpl->tpl_vars['address']->value) {
$_smarty_tpl->tpl_vars['address']->_loop = true;
 $_smarty_tpl->tpl_vars['address']->iteration++;
 $_smarty_tpl->tpl_vars['address']->last = $_smarty_tpl->tpl_vars['address']->iteration === $_smarty_tpl->tpl_vars['address']->total;
?><?php if (empty($_smarty_tpl->tpl_vars['address']->value->alias)) {?><div class="opc-alert opc-alert-danger"><i class="fa fa-times-circle opc-sign"></i><?php echo smartyTranslate(array('s'=>'No carriers available.','mod'=>'advancedcheckout'),$_smarty_tpl);?>
</div><?php } else { ?><div class="opc-alert opc-alert-danger"><i class="fa fa-times-circle opc-sign"></i><?php echo smartyTranslate(array('s'=>'No carriers available for the address "%s".','sprintf'=>$_smarty_tpl->tpl_vars['address']->value->alias,'mod'=>'advancedcheckout'),$_smarty_tpl);?>
</div><?php }?><?php if (!$_smarty_tpl->tpl_vars['address']->last) {?><br /><?php }?><?php }
if (!$_smarty_tpl->tpl_vars['address']->_loop) {
?><div class="opc-alert opc-alert-danger"><i class="fa fa-times-circle opc-sign"></i><?php echo smartyTranslate(array('s'=>'No carriers available.','mod'=>'advancedcheckout'),$_smarty_tpl);?>
</div><?php } ?></div><?php } ?><div class="hook_extracarrier" id="HOOK_EXTRACARRIER_<?php echo intval($_smarty_tpl->tpl_vars['id_address']->value);?>
"><?php if (isset($_smarty_tpl->tpl_vars['HOOK_EXTRACARRIER_ADDR']->value)&&isset($_smarty_tpl->tpl_vars['HOOK_EXTRACARRIER_ADDR']->value[$_smarty_tpl->tpl_vars['id_address']->value])) {?><?php echo $_smarty_tpl->tpl_vars['HOOK_EXTRACARRIER_ADDR']->value[$_smarty_tpl->tpl_vars['id_address']->value];?>
<?php }?></div><?php }?></div> <!-- end delivery_options_address --><?php if (!$_smarty_tpl->tpl_vars['adv_show_oc']->value&&$_smarty_tpl->tpl_vars['comment_field']->value=='carrier') {?><div class="opc-form-group is_customer_param"><label for="messagex" class="w100 opc-control-label"><?php echo smartyTranslate(array('s'=>'Leave a message','mod'=>'advancedcheckout'),$_smarty_tpl);?>
</label><div class="w100 opc-input-icon opc-icon-right"><textarea class="opc-form-control opc-elastic" name="messagex" placeholder="<?php echo smartyTranslate(array('s'=>'If you would like to add a comment about your order, please write it in the field below.','mod'=>'advancedcheckout'),$_smarty_tpl);?>
" id="messagex" cols="26" rows="3"><?php if (isset($_smarty_tpl->tpl_vars['oldMessage']->value)) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['oldMessage']->value, ENT_QUOTES, 'UTF-8', true);?>
<?php }?></textarea><i class="fa fa-comment"></i></div></div><?php }?><div id="extra_carrier" style="display: none;"></div><?php if ($_smarty_tpl->tpl_vars['giftAllowed']->value) {?><hr style="" /><p class="carrier_title"><?php echo smartyTranslate(array('s'=>'Gift','mod'=>'advancedcheckout'),$_smarty_tpl);?>
</p><div class="opc-form-group"><div class="w100"><div class="opc-checkbox"><label for="gift"><input type="checkbox" name="gift" id="gift" value="1" <?php if ($_smarty_tpl->tpl_vars['cart']->value->gift==1) {?>checked="checked"<?php }?> /><span class="opc-text"><?php echo smartyTranslate(array('s'=>'I would like my order to be gift wrapped.','mod'=>'advancedcheckout'),$_smarty_tpl);?>
<?php if ($_smarty_tpl->tpl_vars['gift_wrapping_price']->value>0) {?>&nbsp;<i>(<?php echo smartyTranslate(array('s'=>'Additional cost of','mod'=>'advancedcheckout'),$_smarty_tpl);?>
<span class="price" id="gift-price"><?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value==1) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['total_wrapping_tax_exc_cost']->value),$_smarty_tpl);?>
<?php } else { ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['total_wrapping_cost']->value),$_smarty_tpl);?>
<?php }?></span><?php if ($_smarty_tpl->tpl_vars['use_taxes']->value&&$_smarty_tpl->tpl_vars['display_tax_label']->value) {?><?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value==1) {?><?php echo smartyTranslate(array('s'=>'(tax excl.)','mod'=>'advancedcheckout'),$_smarty_tpl);?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'(tax incl.)','mod'=>'advancedcheckout'),$_smarty_tpl);?>
<?php }?><?php }?>)</i><?php }?></span></label></div></div></div><div id="gift_div"><div class="opc-form-group"><label for="gift_message" class="w100 opc-control-label"><?php echo smartyTranslate(array('s'=>'Leave a message','mod'=>'advancedcheckout'),$_smarty_tpl);?>
</label><div class="w100"><textarea class="opc-form-control opc-elastic" name="gift_message" placeholder="<?php echo smartyTranslate(array('s'=>'If you\'d like, you can add a note to the gift:','mod'=>'advancedcheckout'),$_smarty_tpl);?>
" id="gift_message" cols="26" rows="3"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['cart']->value->gift_message, ENT_QUOTES, 'UTF-8', true);?>
</textarea></div></div></div><?php }?><?php }?><?php }} ?>
