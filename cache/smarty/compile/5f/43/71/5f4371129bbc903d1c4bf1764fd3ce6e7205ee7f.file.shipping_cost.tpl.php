<?php /* Smarty version Smarty-3.1.19, created on 2016-11-27 01:09:53
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/views/templates/admin/hs_point_of_sale_new_sale_abstract/shipping_cost.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9258503465839de01b80541-32871805%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5f4371129bbc903d1c4bf1764fd3ce6e7205ee7f' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/views/templates/admin/hs_point_of_sale_new_sale_abstract/shipping_cost.tpl',
      1 => 1480187258,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9258503465839de01b80541-32871805',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'delivery' => 0,
    'hs_pos_i18n' => 0,
    'order_summary' => 0,
    'free_shipping' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5839de01b93ac6_66385985',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5839de01b93ac6_66385985')) {function content_5839de01b93ac6_66385985($_smarty_tpl) {?>

<?php if ($_smarty_tpl->tpl_vars['delivery']->value) {?>
    <p><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['delivery']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</p>
<?php }?>
<p>
    <label> <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['shipping_cost'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</label> <span><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['order_summary']->value['total_shipping']),$_smarty_tpl);?>
</span>
</p>
<p>
    <label for="free_shipping"> <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['free_shipping'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</label>
    <input type="checkbox" value="1" name="pos_free_shipping" id="pos_free_shipping" <?php if ($_smarty_tpl->tpl_vars['free_shipping']->value) {?>checked="checked"<?php }?>>
</p>

<?php }} ?>
