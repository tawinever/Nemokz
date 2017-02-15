<?php /* Smarty version Smarty-3.1.19, created on 2016-11-27 01:09:53
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/views/templates/admin/hs_point_of_sale_new_sale_abstract/list_order_discounts.tpl" */ ?>
<?php /*%%SmartyHeaderCode:707719635839de01959844-24134480%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '20d5174410c95b14370bfed4e92c3c11d2da3f6c' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/views/templates/admin/hs_point_of_sale_new_sale_abstract/list_order_discounts.tpl',
      1 => 1480187258,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '707719635839de01959844-24134480',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'order_discounts' => 0,
    'order_discount' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5839de0198c870_94928600',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5839de0198c870_94928600')) {function content_5839de0198c870_94928600($_smarty_tpl) {?>
<?php if (isset($_smarty_tpl->tpl_vars['order_discounts']->value)&&count($_smarty_tpl->tpl_vars['order_discounts']->value)>0) {?>
    <table class="std table">
        <tbody>
            <?php  $_smarty_tpl->tpl_vars['order_discount'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['order_discount']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['order_discounts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['order_discount']->key => $_smarty_tpl->tpl_vars['order_discount']->value) {
$_smarty_tpl->tpl_vars['order_discount']->_loop = true;
?>
                <tr>
                    <td class="discount_name">
                        <span title="<?php if ($_smarty_tpl->tpl_vars['order_discount']->value['code']) {?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['order_discount']->value['code'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
 - <?php }?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['order_discount']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php if ($_smarty_tpl->tpl_vars['order_discount']->value['reduction_percent']>0) {?> - <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['order_discount']->value['reduction_percent'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
%<?php } else { ?> - <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['order_discount']->value['reduction_amount'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8')),$_smarty_tpl);?>
<?php }?>">
                            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate(mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['order_discount']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8'),30,'...');?>

                        </span>
                    </td>
                    <td>
                        <span title="<?php if ($_smarty_tpl->tpl_vars['order_discount']->value['code']) {?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['order_discount']->value['code'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
 - <?php }?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['order_discount']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php if ($_smarty_tpl->tpl_vars['order_discount']->value['reduction_percent']>0) {?> - <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['order_discount']->value['reduction_percent'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
%<?php } else { ?> - <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['order_discount']->value['reduction_amount'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8')),$_smarty_tpl);?>
<?php }?>">
                            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['order_discount']->value['value_real'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8')),$_smarty_tpl);?>

                        </span>
                    </td>
                    <td>
                        <span class="delete_order_discount" data-id-cart-rule="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['order_discount']->value['id_cart_rule'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
">
                            <img src="../img/admin/delete.gif" class="icon"/>
                        </span>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php }?>
<?php }} ?>
