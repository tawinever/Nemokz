<?php /* Smarty version Smarty-3.1.19, created on 2016-11-20 19:18:43
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/themes/cover/modules/blocktopmenu/blocktopmenu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5119968785831a2b3399905-59222776%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fc9fb6c29635603d28a9ae37306ee239fa8ce6fb' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/themes/cover/modules/blocktopmenu/blocktopmenu.tpl',
      1 => 1479482457,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5119968785831a2b3399905-59222776',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MENU' => 0,
    'MENU_SEARCH' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5831a2b33b2197_80932606',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5831a2b33b2197_80932606')) {function content_5831a2b33b2197_80932606($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['MENU']->value!='') {?>
	<!-- Menu -->
	<div id="block_top_menu" class="top-menu <?php if ($_GET['controller']=='product') {?>shrinked<?php }?>">

		<div class="cat-title">КАТАЛОГ ТОВАРОВ </div>
		<ul class="sf-menu clearfix menu-content">
			<?php echo $_smarty_tpl->tpl_vars['MENU']->value;?>

			<?php if ($_smarty_tpl->tpl_vars['MENU_SEARCH']->value) {?>
				<li class="sf-search noBack" style="float:right">
					<form id="searchbox" action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('search'), ENT_QUOTES, 'UTF-8', true);?>
" method="get">
						<p>
							<input type="hidden" name="controller" value="search" />
							<input type="hidden" value="position" name="orderby"/>
							<input type="hidden" value="desc" name="orderway"/>
							<input type="text" name="search_query" value="<?php if (isset($_GET['search_query'])) {?><?php echo htmlspecialchars($_GET['search_query'], ENT_QUOTES, 'UTF-8', true);?>
<?php }?>" />
						</p>
					</form>
				</li>
			<?php }?>
		</ul>
	</div>
	<!--/ Menu -->
<?php }?><?php }} ?>
