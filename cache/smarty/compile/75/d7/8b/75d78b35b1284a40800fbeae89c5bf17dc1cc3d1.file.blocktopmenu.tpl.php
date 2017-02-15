<?php /* Smarty version Smarty-3.1.19, created on 2016-11-20 18:44:37
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/nemo/themes/cover/modules/blocktopmenu/blocktopmenu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:85132626958319ab502bb28-44825469%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '75d78b35b1284a40800fbeae89c5bf17dc1cc3d1' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo/themes/cover/modules/blocktopmenu/blocktopmenu.tpl',
      1 => 1479482457,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '85132626958319ab502bb28-44825469',
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
  'unifunc' => 'content_58319ab5046824_46178077',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58319ab5046824_46178077')) {function content_58319ab5046824_46178077($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['MENU']->value!='') {?>
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
