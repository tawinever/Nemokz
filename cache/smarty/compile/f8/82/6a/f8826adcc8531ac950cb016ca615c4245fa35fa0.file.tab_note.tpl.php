<?php /* Smarty version Smarty-3.1.19, created on 2016-12-13 19:57:55
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/pdf/models/templates/receipt/tab_note.tpl" */ ?>
<?php /*%%SmartyHeaderCode:273090118584ffe63989192-14505339%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f8826adcc8531ac950cb016ca615c4245fa35fa0' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/pdf/models/templates/receipt/tab_note.tpl',
      1 => 1480187258,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '273090118584ffe63989192-14505339',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'order' => 0,
    'hs_pos_i18n' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_584ffe6399f254_17341838',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584ffe6399f254_17341838')) {function content_584ffe6399f254_17341838($_smarty_tpl) {?>
<?php if (!empty($_smarty_tpl->tpl_vars['order']->value->pos_note)&&$_smarty_tpl->tpl_vars['order']->value->pos_show_note) {?>
    <br />
    <table class="table" cellspacing="0" cellpadding="0">
        <tr>
            <td class="custom_text"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['note'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: <?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['order']->value->pos_note);?>
</td>
        </tr>
    </table>
<?php }?><?php }} ?>
