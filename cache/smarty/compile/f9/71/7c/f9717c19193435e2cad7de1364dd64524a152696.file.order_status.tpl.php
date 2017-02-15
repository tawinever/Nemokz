<?php /* Smarty version Smarty-3.1.19, created on 2016-11-27 01:09:53
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/views/templates/admin/hs_point_of_sale_new_sale_abstract/order_status.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7031322225839de01c23f30-93196236%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f9717c19193435e2cad7de1364dd64524a152696' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/views/templates/admin/hs_point_of_sale_new_sale_abstract/order_status.tpl',
      1 => 1480187258,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7031322225839de01c23f30-93196236',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'hs_pos_i18n' => 0,
    'pos_order_states' => 0,
    'pos_order_state' => 0,
    'default_order_state' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5839de01c34f63_52055459',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5839de01c34f63_52055459')) {function content_5839de01c34f63_52055459($_smarty_tpl) {?>

<fieldset class='fieldset'>
    <legend><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['order_status'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</legend>
    <div class="block">
        <select class="order_state_option" name="orderState">
            <?php  $_smarty_tpl->tpl_vars['pos_order_state'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['pos_order_state']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pos_order_states']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['pos_order_state']->key => $_smarty_tpl->tpl_vars['pos_order_state']->value) {
$_smarty_tpl->tpl_vars['pos_order_state']->_loop = true;
?>
                <option value='<?php echo intVal($_smarty_tpl->tpl_vars['pos_order_state']->value['id_order_state']);?>
' <?php if ($_smarty_tpl->tpl_vars['default_order_state']->value==$_smarty_tpl->tpl_vars['pos_order_state']->value['id_order_state']) {?>selected="selected"<?php }?>><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['pos_order_state']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</option>
            <?php } ?>
        </select>
    </div>
</fieldset>


<?php }} ?>
