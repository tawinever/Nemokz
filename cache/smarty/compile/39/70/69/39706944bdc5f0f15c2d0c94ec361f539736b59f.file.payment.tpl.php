<?php /* Smarty version Smarty-3.1.19, created on 2016-11-27 01:09:53
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/views/templates/admin/hs_point_of_sale_new_sale_abstract/payment.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13061816155839de01bf4164-66527722%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '39706944bdc5f0f15c2d0c94ec361f539736b59f' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/views/templates/admin/hs_point_of_sale_new_sale_abstract/payment.tpl',
      1 => 1480187258,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13061816155839de01bf4164-66527722',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'hs_pos_i18n' => 0,
    'amount_due' => 0,
    'pos_payments' => 0,
    'pos_payment' => 0,
    'amount_due_for_view' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5839de01c1ef40_86858716',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5839de01c1ef40_86858716')) {function content_5839de01c1ef40_86858716($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/tools/smarty/plugins/modifier.escape.php';
?>

<div id="total_due" class="clearfix">
    <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['amount_due'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

    <span class="amount_due"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['amount_due']->value),$_smarty_tpl);?>
</span>
</div>
<div class="block">
    <table>
        <tr>
            <td><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['payment_type'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
            <td><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['given'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
            <td><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['return'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
        </tr>
        <tr>
            <td>
                <select class='payment_option'>
                    <?php  $_smarty_tpl->tpl_vars['pos_payment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['pos_payment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pos_payments']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['pos_payment']->key => $_smarty_tpl->tpl_vars['pos_payment']->value) {
$_smarty_tpl->tpl_vars['pos_payment']->_loop = true;
?>
                        <option value='<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['pos_payment']->value['id_pos_payment'], 'intval');?>
' reference='<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['pos_payment']->value['reference'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
' inputlabel='<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['pos_payment']->value['label'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
' rule='<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['pos_payment']->value['rule'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
' ><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['pos_payment']->value['payment_name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</option>
                    <?php } ?>
                </select>
            </td>

            <td>
                <input type='text'  value='<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['amount_due_for_view']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
' class='current_payment_amount given_money' name="given_money" size='7'/>
            </td>

            <td>
                <input type='text' class='return_money' name="return_money" size='7' disabled="disabled"/>
            </td>
        </tr>
        <tr>
            <td colspan="3" align="center">
                <input type='button' class='button btn_add_payment' value='<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['add_payment'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
'/>
            </td>
        </tr>
    </table>
</div><?php }} ?>
