<?php /* Smarty version Smarty-3.1.19, created on 2016-12-25 17:12:17
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/advancedcheckout/views/templates/front/payment-methods.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1797734977583ed9e212dfd2-73599955%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '69c6104d960d78b4a31e3dc677ef9bacbcd9bdee' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/advancedcheckout/views/templates/front/payment-methods.tpl',
      1 => 1482664250,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1797734977583ed9e212dfd2-73599955',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_583ed9e2183be0_88018982',
  'variables' => 
  array (
    'payment_methods' => 0,
    'payment_method' => 0,
    'k' => 0,
    'adv_show_oc' => 0,
    'comment_field' => 0,
    'oldMessage' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_583ed9e2183be0_88018982')) {function content_583ed9e2183be0_88018982($_smarty_tpl) {?>

<?php if (isset($_smarty_tpl->tpl_vars['payment_methods']->value)) {?>
	<div class="opc-alert opc-alert-danger payment_error" style="display:none;">
		<i class="fa fa-times-circle opc-sign"></i>
		<?php echo smartyTranslate(array('s'=>'No payment selected.','mod'=>'advancedcheckout'),$_smarty_tpl);?>

	</div>
	<table id="table_payment" class="opc-table">
			<tbody>	
		   <?php  $_smarty_tpl->tpl_vars['payment_method'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['payment_method']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['payment_methods']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['payment_method']->key => $_smarty_tpl->tpl_vars['payment_method']->value) {
$_smarty_tpl->tpl_vars['payment_method']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['payment_method']->key;
?>
				<tr class="checkfield opc-divider">
				<td>
					<div class="opc-form-group">
						<label class="opc-radio">
							<input type="radio" name="id_payment_method" value="<?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['payment_method']->value['url_go']);?>
" class="radio"
						   idorig="<?php echo intval($_smarty_tpl->tpl_vars['payment_method']->value['id']);?>
" id="payment_<?php echo intval($_smarty_tpl->tpl_vars['payment_method']->value['id']);?>
_<?php echo intval($_smarty_tpl->tpl_vars['k']->value);?>
" <?php if ((count($_smarty_tpl->tpl_vars['payment_methods']->value)==1)||($_smarty_tpl->tpl_vars['k']->value==0)) {?>data-checked="1"<?php }?>/>
							<span class="opc-text"></span>
						</label>
					</div>
				</td>
				<td class="payment_image">
						<label for="payment_<?php echo intval($_smarty_tpl->tpl_vars['payment_method']->value['id']);?>
_<?php echo intval($_smarty_tpl->tpl_vars['k']->value);?>
"><?php if (htmlspecialchars($_smarty_tpl->tpl_vars['payment_method']->value['url_image'], ENT_QUOTES, 'UTF-8', true)) {?><img width="65" height="35" src="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['payment_method']->value['url_image'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"/><?php }?></label>
				</td>
				<td>
					 <p>
					<label for="payment_<?php echo intval($_smarty_tpl->tpl_vars['payment_method']->value['id']);?>
_<?php echo intval($_smarty_tpl->tpl_vars['k']->value);?>
"><?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['payment_method']->value['desc']);?>
</label>
					</p>
				</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
	<?php if (!$_smarty_tpl->tpl_vars['adv_show_oc']->value&&$_smarty_tpl->tpl_vars['comment_field']->value=='payment') {?>
		<div class="opc-form-group is_customer_param">
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
	<div id="opc_payment_methods-content" style="display:none">
		<div id="HOOK_PAYMENT" style="display:none"></div>
	</div>
<?php } else { ?>
	<div class="opc-alert opc-alert-danger">
		<i class="fa fa-times-circle opc-sign"></i>
		<?php echo smartyTranslate(array('s'=>'No payment modules have been installed.','mod'=>'advancedcheckout'),$_smarty_tpl);?>

	</div>
<?php }?><?php }} ?>
