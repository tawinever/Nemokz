<?php /* Smarty version Smarty-3.1.19, created on 2016-12-13 19:57:55
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/pdf/models/templates/receipt/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1232118652584ffe637791e5-50381506%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a324cd9dcd09a8079de38ae9e854e0441bd6b200' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/pdf/models/templates/receipt/header.tpl',
      1 => 1480187258,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1232118652584ffe637791e5-50381506',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'font_size' => 0,
    'show_logo' => 0,
    'logo_path' => 0,
    'height_logo' => 0,
    'show_shop_name' => 0,
    'shop_name' => 0,
    'address' => 0,
    'tel' => 0,
    'fax' => 0,
    'hs_pos_i18n' => 0,
    'tax_code' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_584ffe637ee186_60275339',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584ffe637ee186_60275339')) {function content_584ffe637ee186_60275339($_smarty_tpl) {?>
<style>
    .header_title {
        font-family: "Times New Roman", Times, serif;
        font-weight: bolder;
        font-size: <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['font_size']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
; 
        width: 100%; 
        text-align: center;
        line-height: 150%;
    }
    .header_content {
        font-family: "Times New Roman", Times, serif;
        font-size:<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['font_size']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
; 
        width: 100%; 
        text-align: left;
        line-height: 150%;
    }
</style>

<table style="width: 100%">
    <?php if ($_smarty_tpl->tpl_vars['show_logo']->value&&$_smarty_tpl->tpl_vars['logo_path']->value) {?>
        <tr>
            <td style="text-align: center;">
                <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['logo_path']->value, ENT_QUOTES, 'UTF-8', true);?>
" style="height:<?php echo intval($_smarty_tpl->tpl_vars['height_logo']->value);?>
px;" />
            </td>
        </tr>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['show_shop_name']->value) {?>
        <tr>
            <td class="header_title"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop_name']->value, ENT_QUOTES, 'UTF-8', true);?>
</td>
        </tr>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['address']->value) {?>
        <tr>
            <td class="header_content"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['address']->value, ENT_QUOTES, 'UTF-8', true);?>
</td>
        </tr>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['tel']->value||$_smarty_tpl->tpl_vars['fax']->value) {?>
        <tr>
            <td class="header_content"><?php if ($_smarty_tpl->tpl_vars['tel']->value) {?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['tel'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tel']->value, ENT_QUOTES, 'UTF-8', true);?>
<?php }?><br/><?php if ($_smarty_tpl->tpl_vars['fax']->value) {?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['fax'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['fax']->value, ENT_QUOTES, 'UTF-8', true);?>
<?php }?></td>
        </tr>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['tax_code']->value) {?>
        <tr>
            <td class="header_content"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['tax_code'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tax_code']->value, ENT_QUOTES, 'UTF-8', true);?>
</td>
        </tr>
    <?php }?>
</table>
<?php }} ?>
