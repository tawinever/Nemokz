<?php /* Smarty version Smarty-3.1.19, created on 2016-11-27 01:09:53
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/views/templates/admin/hs_point_of_sale_new_sale_abstract/cart_discount.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1964438235839de0193a4c1-01459655%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bf4c2e0c072f6a712b92a18042cc0a73e79e5294' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/views/templates/admin/hs_point_of_sale_new_sale_abstract/cart_discount.tpl',
      1 => 1480187258,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1964438235839de0193a4c1-01459655',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'hs_pos_i18n' => 0,
    'order_discount_types' => 0,
    'discount_type' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5839de01954e64_69412985',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5839de01954e64_69412985')) {function content_5839de01954e64_69412985($_smarty_tpl) {?>

<fieldset class='fieldset_block hiden_block'>
    <legend class="show_block"><i id="toggle_block_order_discount" class="icon-expand-alt"></i>&nbsp;<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['order_discount'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</legend>

    <div class="order_discount content_block clearfix block" style="display:none">
        <div class="list_order_discounts">
            <?php echo $_smarty_tpl->getSubTemplate ("./list_order_discounts.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        </div>
        <div class="clearfix">
            <div class="discount_order_input">
                <select name="pos_order_discount_type" class="pos_order_discount_type">
                    <?php  $_smarty_tpl->tpl_vars['discount_type'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['discount_type']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['order_discount_types']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['discount_type']->key => $_smarty_tpl->tpl_vars['discount_type']->value) {
$_smarty_tpl->tpl_vars['discount_type']->_loop = true;
?>
                        <option value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['discount_type']->value['value'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" <?php if (PosConfiguration::get('POS_DEF_ORDER_DISCOUNT_TYPE')==$_smarty_tpl->tpl_vars['discount_type']->value['value']) {?>selected="selected"<?php }?>><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['discount_type']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</option>
                    <?php } ?>
                </select>
                <input type="text" size="4" class="pos_order_discount" id="pos_order_discount" value="" />
            </div>
            <div class="discount_order_button">
                <input class="btn_apply_order_discount button" type="submit" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['apply'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
            </div>
        </div>
        <div class="discount_amount clear">
            <span> (<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['tax_included'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
)</span>
        </div>
        <div class="order_discount_error"></div>
    </div>

</fieldset><?php }} ?>
