<?php /* Smarty version Smarty-3.1.19, created on 2016-11-20 18:44:18
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/nemo/rauan/themes/default/template/content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:58012641358319aa2a63a72-83061062%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c02cb6379ebb1e4d6b405690659f1639c3384d60' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo/rauan/themes/default/template/content.tpl',
      1 => 1473152712,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '58012641358319aa2a63a72-83061062',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_58319aa2a6a9d2_37848584',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58319aa2a6a9d2_37848584')) {function content_58319aa2a6a9d2_37848584($_smarty_tpl) {?>
<div id="ajax_confirmation" class="alert alert-success hide"></div>

<div id="ajaxBox" style="display:none"></div>


<div class="row">
	<div class="col-lg-12">
		<?php if (isset($_smarty_tpl->tpl_vars['content']->value)) {?>
			<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

		<?php }?>
	</div>
</div><?php }} ?>
