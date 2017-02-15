<?php /* Smarty version Smarty-3.1.19, created on 2016-11-27 01:09:53
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/views/templates/admin/hs_point_of_sale_new_sale_abstract/module_info.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7337964575839de01a3b1d6-96790809%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd0a499809e11336444f82764ea26efbf937d9978' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/views/templates/admin/hs_point_of_sale_new_sale_abstract/module_info.tpl',
      1 => 1480187258,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7337964575839de01a3b1d6-96790809',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'new_versions' => 0,
    'new' => 0,
    'news' => 0,
    'validate_licence' => 0,
    'module_logo' => 0,
    'version_name' => 0,
    'module_name' => 0,
    'hs_pos_i18n' => 0,
    'new_version' => 0,
    'promotion' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5839de01a7bca7_80874473',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5839de01a7bca7_80874473')) {function content_5839de01a7bca7_80874473($_smarty_tpl) {?>

<?php if (!empty($_smarty_tpl->tpl_vars['new_versions']->value)&&$_smarty_tpl->tpl_vars['new_versions']->value['success']&&!empty($_smarty_tpl->tpl_vars['new']->value)&&$_smarty_tpl->tpl_vars['news']->value['success']&&!empty($_smarty_tpl->tpl_vars['validate_licence']->value)) {?>
    <fieldset>
        <legend><img src="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['module_logo']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" alt="" /><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['version_name']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</legend>
            <?php if ($_smarty_tpl->tpl_vars['new_versions']->value['success']) {?>
            <div class="new_version">
                <ul>
                    <?php  $_smarty_tpl->tpl_vars['new_version'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['new_version']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['new_versions']->value['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['new_version']->key => $_smarty_tpl->tpl_vars['new_version']->value) {
$_smarty_tpl->tpl_vars['new_version']->_loop = true;
?>
                        <li><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['module_name']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
 <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['version'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
 <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['new_version']->value['version'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
 <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['released'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
 <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['new_version']->value['release'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
 <a target="_blank" href="<?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['new_version']->value['url']);?>
"><span><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['download'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</span></a></li>
                    <?php } ?>
                </ul>
            </div>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['news']->value['success']) {?>
            <?php if ($_smarty_tpl->tpl_vars['news']->value['data']['news']) {?>
                <div class="news">    
                    <label><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['news_version'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</label><br />
                    <ul class="content">
                        <?php  $_smarty_tpl->tpl_vars['new'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['new']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['news']->value['data']['news']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['new']->key => $_smarty_tpl->tpl_vars['new']->value) {
$_smarty_tpl->tpl_vars['new']->_loop = true;
?>
                            <li><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['new']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</li>
                        <?php } ?>
                    </ul>
                </div>  
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['news']->value['data']['promotion']) {?>
                <div class="promotion">
                    <label><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['promotion'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</label><br />
                    <ul class="content">
                        <?php  $_smarty_tpl->tpl_vars['promotion'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['promotion']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['news']->value['data']['promotion']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['promotion']->key => $_smarty_tpl->tpl_vars['promotion']->value) {
$_smarty_tpl->tpl_vars['promotion']->_loop = true;
?>
                            <li><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['promotion']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</li>
                        <?php } ?>
                    </ul>
                </div>
            <?php }?>
            <div class="clear"></div>
        <?php }?>
    </fieldset>
<?php }?><?php }} ?>
