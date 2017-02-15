<?php /* Smarty version Smarty-3.1.19, created on 2016-11-20 19:18:42
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/blockspecials/views/templates/hook/blockspecials-home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6311110525831a2b2da5356-93276675%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9a06abf51b78f776ba2ce44effbd1f32a32da004' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/blockspecials/views/templates/hook/blockspecials-home.tpl',
      1 => 1479160549,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6311110525831a2b2da5356-93276675',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'specials' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5831a2b2db22d7_61600218',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5831a2b2db22d7_61600218')) {function content_5831a2b2db22d7_61600218($_smarty_tpl) {?>
<?php if (isset($_smarty_tpl->tpl_vars['specials']->value)&&$_smarty_tpl->tpl_vars['specials']->value) {?>
	<div class="r-specials-title-container">
		<h4>АКЦИОННЫЕ ТОВАРЫ</h4>
	</div>
	<div class="r-specials-content">
		<div class="container">
		<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./product-list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('products'=>$_smarty_tpl->tpl_vars['specials']->value,'class'=>'blockspecials tab-pane active','id'=>'blockspecials'), 0);?>

		</div>
	</div>

<?php } else { ?>
<ul id="blockspecials" class="blockspecials tab-pane">
	<li class="alert alert-info"><?php echo smartyTranslate(array('s'=>'No special products at this time.','mod'=>'blockspecials'),$_smarty_tpl);?>
</li>
</ul>
<?php }?>
<?php }} ?>
