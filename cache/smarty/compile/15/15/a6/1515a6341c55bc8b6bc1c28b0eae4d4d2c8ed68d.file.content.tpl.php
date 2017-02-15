<?php /* Smarty version Smarty-3.1.19, created on 2016-11-21 12:26:38
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/rauan/themes/default/template/content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13658278525832939e8fc7f1-43011743%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1515a6341c55bc8b6bc1c28b0eae4d4d2c8ed68d' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/rauan/themes/default/template/content.tpl',
      1 => 1473152712,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13658278525832939e8fc7f1-43011743',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5832939e9039e7_27660552',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5832939e9039e7_27660552')) {function content_5832939e9039e7_27660552($_smarty_tpl) {?>
<div id="ajax_confirmation" class="alert alert-success hide"></div>

<div id="ajaxBox" style="display:none"></div>


<div class="row">
	<div class="col-lg-12">
		<?php if (isset($_smarty_tpl->tpl_vars['content']->value)) {?>
			<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

		<?php }?>
	</div>
</div><?php }} ?>
