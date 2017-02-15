<?php /* Smarty version Smarty-3.1.19, created on 2016-11-27 01:09:53
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/views/templates/admin/hs_point_of_sale_new_sale_abstract/address.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12482165715839de01b43e11-30887342%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '28e0ea303595993e3e26dbd6f3b6f572b1f72c6a' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/views/templates/admin/hs_point_of_sale_new_sale_abstract/address.tpl',
      1 => 1480187258,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12482165715839de01b43e11-30887342',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'hs_pos_i18n' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5839de01b57aa1_31779455',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5839de01b57aa1_31779455')) {function content_5839de01b57aa1_31779455($_smarty_tpl) {?>

<fieldset class='fieldset_block hiden_block'>
    <legend class="show_block"><i class="icon-expand-alt"></i>&nbsp;<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['addresses'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</legend>
    <div class="addresses content_block clearfix" style="display:none">
        <div id="address_delivery">
            <h4>
                <i class="icon-truck"></i>
                <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['delivery'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

            </h4>
            <div class="row-margin-bottom">
                <select id="address_delivery_option"></select>
            </div>
            <div class="list_formated_address">
                <div id="address_delivery_detail"></div>
                <a href="" id="edit_delivery_address" class="btn btn-default pull-left fancybox">» <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['edit'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</a>
            </div>
        </div>
        <div id="address_invoice">
            <h4>
                <i class="icon-file-text"></i>
                <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['invoice'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

            </h4>
            <div class="row-margin-bottom">
                <select id="address_invoice_option"></select>
            </div>
            <div class="list_formated_address">
                <div id="address_invoice_detail"></div>
                <a href="" id="edit_invoice_address" class="btn btn-default pull-left fancybox">» <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['edit'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</a>
            </div>
        </div>
        <div class="add_new_address" style="clear: both;"><a href="" id="add_new_address" class="fancybox"><i class="icon-plus-sign-alt"></i>  <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['add_new_address'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</a></div>
    </div>
</fieldset>
<?php }} ?>
