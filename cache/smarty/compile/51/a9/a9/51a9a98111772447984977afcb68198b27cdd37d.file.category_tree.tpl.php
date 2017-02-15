<?php /* Smarty version Smarty-3.1.19, created on 2016-11-27 01:09:53
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/views/templates/admin/hs_point_of_sale_new_sale_abstract/category_tree.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19831239265839de01ab2c03-32379390%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '51a9a98111772447984977afcb68198b27cdd37d' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/views/templates/admin/hs_point_of_sale_new_sale_abstract/category_tree.tpl',
      1 => 1480187258,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19831239265839de01ab2c03-32379390',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'is_prestashop16' => 0,
    'category_tree' => 0,
    'hs_pos_i18n' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5839de01abf8d3_65686420',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5839de01abf8d3_65686420')) {function content_5839de01abf8d3_65686420($_smarty_tpl) {?>

<div id="container_category_tree">
    <?php if ($_smarty_tpl->tpl_vars['is_prestashop16']->value) {?>
        <?php echo $_smarty_tpl->tpl_vars['category_tree']->value;?>

    <?php } else { ?>
        <div class="tree-panel-label-title">
            <input type="checkbox"  name="filter-by-category" id="filter-by-category">
            <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['filter_by_category'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

        </div>
        <div id="block_category_tree" style="display:none">
            <?php echo $_smarty_tpl->tpl_vars['category_tree']->value;?>

        </div>
    <?php }?>

</div>
<?php }} ?>
