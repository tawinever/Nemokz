<?php /* Smarty version Smarty-3.1.19, created on 2016-12-13 19:57:55
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/pdf/models/templates/receipt/tab_order_info.tpl" */ ?>
<?php /*%%SmartyHeaderCode:909522962584ffe6383fce1-41327423%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cf615acd39ede9ed66a9170d39da382a8de2ec9b' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/pdf/models/templates/receipt/tab_order_info.tpl',
      1 => 1480187258,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '909522962584ffe6383fce1-41327423',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'hs_pos_i18n' => 0,
    'order' => 0,
    'cashier_info' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_584ffe6385dd67_32072639',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584ffe6385dd67_32072639')) {function content_584ffe6385dd67_32072639($_smarty_tpl) {?>
<table class="table" cellspacing="0" cellpadding="0">
    <tr>
        <td style="width: 50%;text-align: left"><?php if (Configuration::get('POS_RECEIPT_SHOW_ORDER_INFO')) {?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['ref'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['order']->value->reference, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php } else { ?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['no'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: #<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['order']->value->id, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php }?><br />
            <?php if ($_smarty_tpl->tpl_vars['cashier_info']->value) {?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['cashier'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['cashier_info']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php }?>
        </td>
        <td style="width: 50%; text-align: right"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0][0]->dateFormat(array('date'=>$_smarty_tpl->tpl_vars['order']->value->date_add,'full'=>1),$_smarty_tpl);?>
</td>
    </tr>
</table><?php }} ?>
