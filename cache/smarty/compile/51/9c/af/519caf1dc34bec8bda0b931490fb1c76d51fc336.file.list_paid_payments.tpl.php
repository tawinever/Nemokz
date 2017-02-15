<?php /* Smarty version Smarty-3.1.19, created on 2016-11-27 01:09:53
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/views/templates/admin/hs_point_of_sale_new_sale_abstract/list_paid_payments.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8898655115839de01bd6c96-40119420%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '519caf1dc34bec8bda0b931490fb1c76d51fc336' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/views/templates/admin/hs_point_of_sale_new_sale_abstract/list_paid_payments.tpl',
      1 => 1480187258,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8898655115839de01bd6c96-40119420',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cart' => 0,
    'hs_pos_i18n' => 0,
    'paid_payment' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5839de01bee156_87532407',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5839de01bee156_87532407')) {function content_5839de01bee156_87532407($_smarty_tpl) {?>

<?php if (count($_smarty_tpl->tpl_vars['cart']->value->getPayments())>0) {?>
    <input type="hidden" value="1" class="is_exist_payment" name="is_exist_payment">
	<span class="pos-title"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['total_paid'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
:</span>
    <table class="bordered">
        <tbody>
            <?php  $_smarty_tpl->tpl_vars['paid_payment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['paid_payment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cart']->value->getPayments(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['paid_payment']->key => $_smarty_tpl->tpl_vars['paid_payment']->value) {
$_smarty_tpl->tpl_vars['paid_payment']->_loop = true;
?>
                <tr>
                    <td><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['paid_payment']->value['payment_name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                    <td align="right">
                        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['paid_payment']->value['amount'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8')),$_smarty_tpl);?>

                    </td>
                    <td class="delete-cell">
                        <a class="paid_payment_delete">
                            <img src="../img/admin/delete.gif" rel="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['paid_payment']->value['id_pos_cart_payment'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" class="icon"/>
                        </a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php } else { ?>
    <input type="hidden" value="0" class="is_exist_payment" name="is_exist_payment">
<?php }?>
<?php }} ?>
