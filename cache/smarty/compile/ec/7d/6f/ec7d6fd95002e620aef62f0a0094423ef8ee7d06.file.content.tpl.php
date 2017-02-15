<?php /* Smarty version Smarty-3.1.19, created on 2016-11-27 01:09:46
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/views/templates/admin/hs_point_of_sale_dashboard_abstract/content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16388081045839ddfa6421b0-95543181%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ec7d6fd95002e620aef62f0a0094423ef8ee7d06' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/views/templates/admin/hs_point_of_sale_dashboard_abstract/content.tpl',
      1 => 1480187258,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16388081045839ddfa6421b0-95543181',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'datepickerFrom' => 0,
    'datepickerTo' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5839ddfa64b448_38090943',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5839ddfa64b448_38090943')) {function content_5839ddfa64b448_38090943($_smarty_tpl) {?>
<div id="pos_dashboard">
    <?php echo $_smarty_tpl->getSubTemplate ("./calendar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php echo $_smarty_tpl->getSubTemplate ("./report.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayPosDashboardContent",'from'=>$_smarty_tpl->tpl_vars['datepickerFrom']->value,'to'=>$_smarty_tpl->tpl_vars['datepickerTo']->value),$_smarty_tpl);?>

</div><?php }} ?>
