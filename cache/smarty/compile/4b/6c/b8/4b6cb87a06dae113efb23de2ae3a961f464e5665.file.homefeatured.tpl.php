<?php /* Smarty version Smarty-3.1.19, created on 2016-11-20 19:18:42
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/themes/cover/modules/homefeatured/homefeatured.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2363474695831a2b2bf3966-29711983%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4b6cb87a06dae113efb23de2ae3a961f464e5665' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/themes/cover/modules/homefeatured/homefeatured.tpl',
      1 => 1477827616,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2363474695831a2b2bf3966-29711983',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'products' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5831a2b2bff923_74110031',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5831a2b2bff923_74110031')) {function content_5831a2b2bff923_74110031($_smarty_tpl) {?>
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
