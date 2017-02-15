<?php /* Smarty version Smarty-3.1.19, created on 2016-11-27 01:09:53
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/views/templates/admin/hs_point_of_sale_new_sale_abstract/shipping.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16985287885839de01b5c9e6-01980439%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd5361a061fa4862f08be4aaa1c242e37c1a5a9dc' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/views/templates/admin/hs_point_of_sale_new_sale_abstract/shipping.tpl',
      1 => 1480187258,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16985287885839de01b5c9e6-01980439',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'hs_pos_i18n' => 0,
    'delivery_option_list' => 0,
    'delivery_option' => 0,
    'id_address' => 0,
    'default_id_carrier' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5839de01b7cab2_47237982',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5839de01b7cab2_47237982')) {function content_5839de01b7cab2_47237982($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/tools/smarty/plugins/modifier.escape.php';
?>


<fieldset class='fieldset_block hiden_block'>
    <legend class="show_block"><i class="icon-expand-alt"></i>&nbsp;<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['shipping'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</legend>
    <div class="shipping content_block" style="display: none;">
        <?php if (!empty($_smarty_tpl->tpl_vars['delivery_option_list']->value)) {?>
            <div class="list_carriers">
                <p>
                    <label class="lable_delivery_option"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['delivery_option'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</label>
                    <select id="delivery_option" name="delivery_option">
                        <?php  $_smarty_tpl->tpl_vars['delivery_option'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['delivery_option']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['delivery_option_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['delivery_option']->key => $_smarty_tpl->tpl_vars['delivery_option']->value) {
$_smarty_tpl->tpl_vars['delivery_option']->_loop = true;
?>
                            <option value='<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['delivery_option']->value['id_carrier'], 'intval');?>
' data-id_address ="<?php echo intVal($_smarty_tpl->tpl_vars['id_address']->value);?>
" <?php if ($_smarty_tpl->tpl_vars['default_id_carrier']->value==$_smarty_tpl->tpl_vars['delivery_option']->value['id_carrier']) {?>selected="selected"<?php }?>><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['delivery_option']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</option>
                        <?php } ?>
                    </select>
                </p>
            </div>
        <?php }?>
        <div class="shipping_cost">
            <?php echo $_smarty_tpl->getSubTemplate ("./shipping_cost.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        </div>

    </div>
</fieldset>
<?php }} ?>
