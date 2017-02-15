<?php /* Smarty version Smarty-3.1.19, created on 2016-12-13 19:57:55
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/pdf/models/templates/receipt/tab_payment.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1474705847584ffe63967ad7-04433858%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bcd0f78b9c43e080622098aa21b63bd78e6027c7' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/pdf/models/templates/receipt/tab_payment.tpl',
      1 => 1480187258,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1474705847584ffe63967ad7-04433858',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cart' => 0,
    'paid_payment' => 0,
    'order' => 0,
    'hs_pos_i18n' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_584ffe639821d1_56412809',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584ffe639821d1_56412809')) {function content_584ffe639821d1_56412809($_smarty_tpl) {?>

<table class="table" cellspacing="0" cellpadding="0">
    <?php  $_smarty_tpl->tpl_vars['paid_payment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['paid_payment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cart']->value->getPayments(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['paid_payment']->key => $_smarty_tpl->tpl_vars['paid_payment']->value) {
$_smarty_tpl->tpl_vars['paid_payment']->_loop = true;
?>
        <tr>
            <td class="total_left"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['paid_payment']->value['payment_name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
            <td class="total_right"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['paid_payment']->value['given_money'],'currency'=>$_smarty_tpl->tpl_vars['order']->value->id_currency),$_smarty_tpl);?>
</td>
        </tr>
        <?php if ($_smarty_tpl->tpl_vars['paid_payment']->value['change']>0) {?>
            <tr>
                <td class="total_left"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['change'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                <td class="total_right"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['paid_payment']->value['change'],'currency'=>$_smarty_tpl->tpl_vars['order']->value->id_currency),$_smarty_tpl);?>
</td>
            </tr>
        <?php }?>
    <?php }
if (!$_smarty_tpl->tpl_vars['paid_payment']->_loop) {
?>
        <tr>
            <td><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['no_payment'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
        </tr>
    <?php } ?>
</table><?php }} ?>
