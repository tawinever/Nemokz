<?php /* Smarty version Smarty-3.1.19, created on 2016-11-27 01:09:53
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/views/templates/admin/hs_point_of_sale_new_sale_abstract/add_note.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3086404535839de01a99d59-00046345%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4e9efac5f423ddaf3139223f8112a8bc0d2c591e' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/views/templates/admin/hs_point_of_sale_new_sale_abstract/add_note.tpl',
      1 => 1480187258,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3086404535839de01a99d59-00046345',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'hs_pos_i18n' => 0,
    'note' => 0,
    'show_note_on_invoice' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5839de01aaed59_72961856',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5839de01aaed59_72961856')) {function content_5839de01aaed59_72961856($_smarty_tpl) {?>

<div class="row bootstrap" style="display: none" id="pos_add_note">
    <div class="col-lg-12">
        <form method="post" action="#" class="defaultForm form-horizontal" id="formAddNote">
            <div id="fieldset_0" class="panel">
                <div class="panel-heading">
                    <i class="icon-file-text"></i><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['add_note'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

                </div>
                <div class="form-wrapper">
                    <div class="form-group">
                        <textarea class="note_content" placeholder='<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['custom_note_optional'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
'><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['note']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</textarea>
                    </div>
                    <div class="form-group checkbox">
                        <label><input type="checkbox" class="show_note_on_invoice" value="1" name="show_note_on_invoice" <?php if ($_smarty_tpl->tpl_vars['show_note_on_invoice']->value==1) {?>checked="checked"<?php }?>> <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['show_on_invoice_receipt'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</label>
                    </div>
                </div>							
            </div>
            <div class="panel-footer clearfix">
                <button class="btn btn-default pull-right add_note_button" value="1" type="button">
                    <i class="process-icon-save"></i><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['save'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

                </button>
            </div>
        </form>
    </div>								
</div><?php }} ?>
