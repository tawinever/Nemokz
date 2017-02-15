<?php /* Smarty version Smarty-3.1.19, created on 2016-12-25 17:12:17
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/advancedcheckout/views/templates/front/voucher.tpl" */ ?>
<?php /*%%SmartyHeaderCode:672181186583ed9e1992f65-08554972%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2307b90e4a8e948f4d07bb41ba67ac6f333cd5d6' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/advancedcheckout/views/templates/front/voucher.tpl',
      1 => 1482664250,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '672181186583ed9e1992f65-08554972',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_583ed9e19b7080_44134171',
  'variables' => 
  array (
    'voucherAllowed' => 0,
    'discount_name' => 0,
    'displayVouchers' => 0,
    'voucher' => 0,
    'errors_discount' => 0,
    'error' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_583ed9e19b7080_44134171')) {function content_583ed9e19b7080_44134171($_smarty_tpl) {?>

<?php if ($_smarty_tpl->tpl_vars['voucherAllowed']->value) {?>
<div id="cart_voucher" class="cart_voucher fl">
	<div class="v_errors opc-alert opc-alert-danger" style="display:none;">
		<button class="opc-close">x</button>
	</div>
	<fieldset>
		<p class="title_block"><label for="discount_name"><?php echo smartyTranslate(array('s'=>'Vouchers','mod'=>'advancedcheckout'),$_smarty_tpl);?>
</label></p>
		<div class="opc-form-group">
			<input type="text" class="opc-discount_name opc-form-control opc-input-sm" id="discount_name" name="discount_name" value="<?php if (isset($_smarty_tpl->tpl_vars['discount_name']->value)&&$_smarty_tpl->tpl_vars['discount_name']->value) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['discount_name']->value, ENT_QUOTES, 'UTF-8', true);?>
<?php }?>" />
	</div>
	
	<input type="hidden" name="submitDiscount" />
	<button id="advopc-voucher-btn" type="button" name="submitAddDiscount" class="opc-button opc-btn opc-btn-custom"><span><?php echo smartyTranslate(array('s'=>'OK','mod'=>'advancedcheckout'),$_smarty_tpl);?>
</span></button>
	</fieldset>
	<?php if ($_smarty_tpl->tpl_vars['displayVouchers']->value) {?>
		<p id="title" class="title-offers"><?php echo smartyTranslate(array('s'=>'Take advantage of our exclusive offers:','mod'=>'advancedcheckout'),$_smarty_tpl);?>
</p>
		<div id="display_cart_vouchers">
			<?php  $_smarty_tpl->tpl_vars['voucher'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['voucher']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['displayVouchers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['voucher']->key => $_smarty_tpl->tpl_vars['voucher']->value) {
$_smarty_tpl->tpl_vars['voucher']->_loop = true;
?>
				<?php if ($_smarty_tpl->tpl_vars['voucher']->value['code']!='') {?><span class="voucher_name" data-code="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['voucher']->value['code'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['voucher']->value['code'], ENT_QUOTES, 'UTF-8', true);?>
</span> - <?php }?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['voucher']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
<br />
			<?php } ?>
		</div>
	<?php }?>
	<?php if (isset($_smarty_tpl->tpl_vars['errors_discount']->value)&&$_smarty_tpl->tpl_vars['errors_discount']->value) {?>
		<ul class="error">
		<?php  $_smarty_tpl->tpl_vars['error'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['error']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['errors_discount']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['error']->key => $_smarty_tpl->tpl_vars['error']->value) {
$_smarty_tpl->tpl_vars['error']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['error']->key;
?>
			<li><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['error']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</li>
		<?php } ?>
		</ul>
	<?php }?>
</div>
<?php }?><?php }} ?>
