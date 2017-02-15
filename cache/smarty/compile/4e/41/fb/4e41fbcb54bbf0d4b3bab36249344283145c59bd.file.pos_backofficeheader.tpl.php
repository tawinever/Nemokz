<?php /* Smarty version Smarty-3.1.19, created on 2016-11-27 01:09:25
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/views/templates/hook/pos_backofficeheader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11251618775839dde5e2ef40-09729521%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4e41fbcb54bbf0d4b3bab36249344283145c59bd' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/views/templates/hook/pos_backofficeheader.tpl',
      1 => 1480187258,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11251618775839dde5e2ef40-09729521',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'st_pos' => 0,
    'is_prestashop_16' => 0,
    'is_collecting_payment' => 0,
    'price_display_precision' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5839dde5e3f613_47802570',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5839dde5e3f613_47802570')) {function content_5839dde5e3f613_47802570($_smarty_tpl) {?>

<meta name="viewport" content="width=device-width, initial-scale=1" />
<script type="text/javascript">
    var stPos = <?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['json_encode'][0][0]->jsonEncode($_smarty_tpl->tpl_vars['st_pos']->value));?>
;
    var isPrestashop16 = '<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['is_prestashop_16']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
';
    isCollectingPayment = <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['is_collecting_payment']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
;
    priceDisplayPrecision = <?php echo intval($_smarty_tpl->tpl_vars['price_display_precision']->value);?>
;
</script>

<?php }} ?>
