<?php /* Smarty version Smarty-3.1.19, created on 2016-11-20 18:44:18
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/nemo/rauan/themes/default/template/helpers/modules_list/modal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:157658234258319aa2b5bb49-23896698%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5668fcc82083fdd4e458cd4ac4af0f9a6f47c6bf' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo/rauan/themes/default/template/helpers/modules_list/modal.tpl',
      1 => 1473152712,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '157658234258319aa2b5bb49-23896698',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_58319aa2b5fd49_52928710',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58319aa2b5fd49_52928710')) {function content_58319aa2b5fd49_52928710($_smarty_tpl) {?><div class="modal fade" id="modules_list_container">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title"><?php echo smartyTranslate(array('s'=>'Recommended Modules and Services'),$_smarty_tpl);?>
</h3>
			</div>
			<div class="modal-body">
				<div id="modules_list_container_tab_modal" style="display:none;"></div>
				<div id="modules_list_loader"><i class="icon-refresh icon-spin"></i></div>
			</div>
		</div>
	</div>
</div>
<?php }} ?>
