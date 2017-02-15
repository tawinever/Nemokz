<?php /* Smarty version Smarty-3.1.19, created on 2016-12-13 19:57:55
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/pdf/models/templates/receipt/tab_footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1275178584ffe639a5d94-18982776%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c9b051fad092d642d5955d42c89185c37bb7c43' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/pdf/models/templates/receipt/tab_footer.tpl',
      1 => 1480187258,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1275178584ffe639a5d94-18982776',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'hs_pos_i18n' => 0,
    'message_on_receipt' => 0,
    'shop_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_584ffe639b9df0_33365613',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584ffe639b9df0_33365613')) {function content_584ffe639b9df0_33365613($_smarty_tpl) {?>
<table class="table" cellspacing="0" cellpadding="0">
    <tr>
        <td class="footer_thankyou"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['thank_you_for_shopping'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
    </tr>
    <tr>
        <td></td>
    </tr>
    <?php if ($_smarty_tpl->tpl_vars['message_on_receipt']->value) {?>
        <tr>
            <td class="custom_text"><?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['message_on_receipt']->value);?>
</td>
        </tr>
        <tr>
            <td></td>
        </tr>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['shop_url']->value) {?>
        <tr>
            <td class="footer_url"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop_url']->value, ENT_QUOTES, 'UTF-8', true);?>
</td>
        </tr>
    <?php }?>
</table><?php }} ?>
