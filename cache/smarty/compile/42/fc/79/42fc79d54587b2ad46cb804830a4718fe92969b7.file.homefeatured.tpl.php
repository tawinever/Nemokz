<?php /* Smarty version Smarty-3.1.19, created on 2016-11-20 18:44:36
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/nemo/themes/cover/modules/homefeatured/homefeatured.tpl" */ ?>
<?php /*%%SmartyHeaderCode:76848890758319ab4809059-15446573%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '42fc79d54587b2ad46cb804830a4718fe92969b7' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo/themes/cover/modules/homefeatured/homefeatured.tpl',
      1 => 1477827616,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '76848890758319ab4809059-15446573',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'products' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_58319ab4817a70_85886684',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58319ab4817a70_85886684')) {function content_58319ab4817a70_85886684($_smarty_tpl) {?>
<?php if (isset($_smarty_tpl->tpl_vars['products']->value)&&$_smarty_tpl->tpl_vars['products']->value) {?>
	<div class="r-homefeatured-title-container">
		<h4>ПОПУЛЯРНЫЕ ТОВАРЫ</h4>
	</div>
	<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./product-list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('class'=>'homefeatured tab-pane','id'=>'homefeatured'), 0);?>

<?php } else { ?>
<ul id="homefeatured" class="homefeatured tab-pane">
	<li class="alert alert-info"><?php echo smartyTranslate(array('s'=>'No featured products at this time.','mod'=>'homefeatured'),$_smarty_tpl);?>
</li>
</ul>
<?php }?><?php }} ?>
