<?php /* Smarty version Smarty-3.1.19, created on 2016-12-25 17:12:16
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/advancedcheckout/views/templates/front/css.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2127381989583ed9e03ca288-88206983%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b0cd04e063f539ce049fe156b3e31fa6867d1433' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/advancedcheckout/views/templates/front/css.tpl',
      1 => 1482664250,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2127381989583ed9e03ca288-88206983',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_583ed9e03e1f06_90949228',
  'variables' => 
  array (
    'clr' => 0,
    'adv_circle' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_583ed9e03e1f06_90949228')) {function content_583ed9e03e1f06_90949228($_smarty_tpl) {?>

<style>
.orderform * {
	color: #<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['clr']->value['color_pick_4'], ENT_QUOTES, 'UTF-8', true);?>
 !important;
}

.opc-bg-blueberry {
	background-color: #<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['clr']->value['color_pick_1'], ENT_QUOTES, 'UTF-8', true);?>
 !important;
}

.opc-widget-header[class*="bg-"] .opc-widget-caption, .opc-widget-header[class*="bg-"] i {
	color: #<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['clr']->value['color_pick_7'], ENT_QUOTES, 'UTF-8', true);?>
 !important;
}

.opc-bordered-sky {
	border-color: #<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['clr']->value['color_pick_2'], ENT_QUOTES, 'UTF-8', true);?>
 !important;
}
<?php if ($_smarty_tpl->tpl_vars['adv_circle']->value) {?>
.opc-widget-body {
	border-bottom-right-radius: 10px;
	border-bottom-left-radius: 10px;
	-webkit-border-bottom-right-radius: 10px;
	-webkit-border-bottom-left-radius: 10px;
	-moz-border-bottom-right-radius: 10px;
	-moz-border-bottom-left-radius: 10px;
}
<?php }?>

.opc-widget-body, .opc-tab-content {
	background-color: #<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['clr']->value['color_pick_3'], ENT_QUOTES, 'UTF-8', true);?>
 !important;
}

</style><?php }} ?>
