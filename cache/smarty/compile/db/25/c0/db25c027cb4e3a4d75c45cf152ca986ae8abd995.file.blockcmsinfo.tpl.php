<?php /* Smarty version Smarty-3.1.19, created on 2016-11-20 18:44:36
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/nemo/modules/blockcmsinfo/blockcmsinfo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:139079254058319ab4742308-06114377%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'db25c027cb4e3a4d75c45cf152ca986ae8abd995' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo/modules/blockcmsinfo/blockcmsinfo.tpl',
      1 => 1477836656,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '139079254058319ab4742308-06114377',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'infos' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_58319ab4759ba0_37856478',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58319ab4759ba0_37856478')) {function content_58319ab4759ba0_37856478($_smarty_tpl) {?>
<?php if (count($_smarty_tpl->tpl_vars['infos']->value)>0) {?>
<!-- MODULE Block cmsinfo -->
	<div id="cmsinfo_block">
		<div class="col-xs-12"><?php echo $_smarty_tpl->tpl_vars['infos']->value[0]['text'];?>
</div>
	</div>
	<div class="store-map">
		<script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?sid=7v9UZy6l9KKbqDWJQzxjYGX6UMntklE4&amp;width=100%&amp;height=400&amp;lang=ru_RU&amp;sourceType=constructor&amp;scroll=false"></script>
	</div>

<!-- /MODULE Block cmsinfo -->
<?php }?><?php }} ?>
