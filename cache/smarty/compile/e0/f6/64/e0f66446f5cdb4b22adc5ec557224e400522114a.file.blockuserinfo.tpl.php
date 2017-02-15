<?php /* Smarty version Smarty-3.1.19, created on 2016-11-20 19:18:42
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/themes/cover/modules/blockuserinfo/blockuserinfo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3489296525831a2b28d2c91-24726463%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e0f66446f5cdb4b22adc5ec557224e400522114a' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/themes/cover/modules/blockuserinfo/blockuserinfo.tpl',
      1 => 1478286278,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3489296525831a2b28d2c91-24726463',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'is_logged' => 0,
    'link' => 0,
    'cookie' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5831a2b28f0af6_75672037',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5831a2b28f0af6_75672037')) {function content_5831a2b28f0af6_75672037($_smarty_tpl) {?><!-- Block user information module TOP  -->
<?php if ($_smarty_tpl->tpl_vars['is_logged']->value) {?>
    <div class="header_user_info">
        <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account',true), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'View my customer account','mod'=>'blockuserinfo'),$_smarty_tpl);?>
" class="account" rel="nofollow"><span><?php echo $_smarty_tpl->tpl_vars['cookie']->value->customer_firstname;?>
 <?php echo $_smarty_tpl->tpl_vars['cookie']->value->customer_lastname;?>
</span></a>
    </div>
<?php }?>
<div class="header_user_info col-sm-3">
    <?php if ($_smarty_tpl->tpl_vars['is_logged']->value) {?>
        <a class="logout" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('index',true,null,"mylogout"), ENT_QUOTES, 'UTF-8', true);?>
" rel="nofollow" title="<?php echo smartyTranslate(array('s'=>'Log me out','mod'=>'blockuserinfo'),$_smarty_tpl);?>
">
            <?php echo smartyTranslate(array('s'=>'Sign out','mod'=>'blockuserinfo'),$_smarty_tpl);?>

        </a>
    <?php } else { ?>
        <a class="login cherry-bg" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account',true), ENT_QUOTES, 'UTF-8', true);?>
" rel="nofollow" title="<?php echo smartyTranslate(array('s'=>'Log in to your customer account','mod'=>'blockuserinfo'),$_smarty_tpl);?>
">
            Регистрация / Вход
        </a>
    <?php }?>
</div>
<!-- /Block usmodule TOP -->
<?php }} ?>
