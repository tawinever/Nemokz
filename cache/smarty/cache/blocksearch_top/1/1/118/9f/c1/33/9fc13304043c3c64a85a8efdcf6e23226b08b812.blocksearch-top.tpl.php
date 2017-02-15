<?php /*%%SmartyHeaderCode:59727196258125d730fefb6-00030595%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9fc13304043c3c64a85a8efdcf6e23226b08b812' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo/themes/default-bootstrap/modules/blocksearch/blocksearch-top.tpl',
      1 => 1473152714,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '59727196258125d730fefb6-00030595',
  'variables' => 
  array (
    'link' => 0,
    'search_query' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_58125d73115301_38914791',
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58125d73115301_38914791')) {function content_58125d73115301_38914791($_smarty_tpl) {?><!-- Block search module TOP -->
<div id="search_block_top" class="col-sm-4 clearfix">
	<form id="searchbox" method="get" action="//localhost/nemo/search" >
		<input type="hidden" name="controller" value="search" />
		<input type="hidden" name="orderby" value="position" />
		<input type="hidden" name="orderway" value="desc" />
		<input class="search_query form-control" type="text" id="search_query_top" name="search_query" placeholder="Поиск" value="" />
		<button type="submit" name="submit_search" class="btn btn-default button-search">
			<span>Поиск</span>
		</button>
	</form>
</div>
<!-- /Block search module TOP --><?php }} ?>
