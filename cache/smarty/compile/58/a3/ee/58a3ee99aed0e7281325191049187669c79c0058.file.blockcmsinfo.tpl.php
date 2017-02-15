<?php /* Smarty version Smarty-3.1.19, created on 2016-11-20 19:18:42
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/blockcmsinfo/blockcmsinfo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15831770175831a2b2af5de5-07798433%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '58a3ee99aed0e7281325191049187669c79c0058' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/blockcmsinfo/blockcmsinfo.tpl',
      1 => 1477836656,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15831770175831a2b2af5de5-07798433',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'infos' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5831a2b2afed60_03278508',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5831a2b2afed60_03278508')) {function content_5831a2b2afed60_03278508($_smarty_tpl) {?>
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
