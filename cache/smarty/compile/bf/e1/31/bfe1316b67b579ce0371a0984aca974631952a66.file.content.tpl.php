<?php /* Smarty version Smarty-3.1.19, created on 2016-12-13 19:55:19
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/views/templates/admin/hs_point_of_sale_addons_abstract/content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:772724839584ffdc7a24a45-41562596%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bfe1316b67b579ce0371a0984aca974631952a66' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/views/templates/admin/hs_point_of_sale_addons_abstract/content.tpl',
      1 => 1480187258,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '772724839584ffdc7a24a45-41562596',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'addons' => 0,
    'addon' => 0,
    'image_addon_path' => 0,
    'module_name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_584ffdc7a6fa58_21891555',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584ffdc7a6fa58_21891555')) {function content_584ffdc7a6fa58_21891555($_smarty_tpl) {?>

<div class="panel" id="add-ons">
    <?php  $_smarty_tpl->tpl_vars['addon'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['addon']->_loop = false;
 $_smarty_tpl->tpl_vars['module_name'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['addons']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['addon']->key => $_smarty_tpl->tpl_vars['addon']->value) {
$_smarty_tpl->tpl_vars['addon']->_loop = true;
 $_smarty_tpl->tpl_vars['module_name']->value = $_smarty_tpl->tpl_vars['addon']->key;
?>
        <div class="addon">
            <h3>
                <a href="<?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['addon']->value['url']);?>
" target="_blank" title="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['addon']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
">
                    <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['addon']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

                </a>
            </h3>
            <a class="module_image" href="<?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['addon']->value['url']);?>
" target="_blank" title="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['addon']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
">
                <img alt="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['addon']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" title="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['addon']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" src="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['image_addon_path']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['module_name']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
.png" />
            </a>
            <div class="addon_description">
                <p><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate(mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['addon']->value['description'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8'),160,'...');?>
</p>
            </div>
            <div class="addon_action">
                <?php if ($_smarty_tpl->tpl_vars['addon']->value['status']==PosAddon::STATUS_ENABLED&&!$_smarty_tpl->tpl_vars['addon']->value['cta_link']) {?>
                    <a class="installed" href="javascript:void(0);">
                        <?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['addon']->value['cta_label']);?>

                    </a>
                <?php } else { ?>
                    <a href="<?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['addon']->value['cta_link']);?>
" target="_blank">
                        <?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['addon']->value['cta_label']);?>

                    </a>
                <?php }?>
            </div>
        </div>
    <?php } ?>
</div>
<?php }} ?>
