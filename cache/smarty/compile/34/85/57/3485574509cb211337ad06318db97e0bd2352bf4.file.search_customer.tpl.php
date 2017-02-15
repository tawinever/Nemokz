<?php /* Smarty version Smarty-3.1.19, created on 2016-11-27 01:09:53
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/views/templates/admin/hs_point_of_sale_new_sale_abstract/search_customer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:131156895839de01b057a7-95216713%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3485574509cb211337ad06318db97e0bd2352bf4' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/views/templates/admin/hs_point_of_sale_new_sale_abstract/search_customer.tpl',
      1 => 1480187258,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '131156895839de01b057a7-95216713',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'is_default_customer' => 0,
    'customer' => 0,
    'hs_pos_i18n' => 0,
    'admin_customer_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5839de01b3e680_71797194',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5839de01b3e680_71797194')) {function content_5839de01b3e680_71797194($_smarty_tpl) {?>
<div id="display_pos_customer_top">
    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayPosCustomerTop",'is_default_customer'=>$_smarty_tpl->tpl_vars['is_default_customer']->value),$_smarty_tpl);?>

</div>
<div class="customer_form" <?php if (mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['customer']->value->id, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8')&&!$_smarty_tpl->tpl_vars['is_default_customer']->value) {?>style="display:none" <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['customer']->value->lastname, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php } else { ?> style="display:block" <?php }?>>
    <form name="customer_search" action="#" class="customer_search clearfix" method="post">
        <i class="icon-search"></i>

        <input type="text" name="keyword" class="input" placeholder="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['search_for_a_customer'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
">

        <a class="fancybox add_new" href="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['admin_customer_url']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
&addcustomer&liteDisplaying=1&submitFormAjax=1#" title="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['new_customer'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
">
            <i class="icon-plus-circle"></i>
        </a>
        </a>
    </form>
</div>
<div class="info customer_info clearfix"
     <?php if ($_smarty_tpl->tpl_vars['customer']->value->id&&!$_smarty_tpl->tpl_vars['is_default_customer']->value) {?>style="display:block"<?php } else { ?>style="display:none"<?php }?>>
    <a class="remove pull-right" href="javascript:void(0);" title="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['remove'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
">
        <i class="icon-minus-circle"></i>
    </a>

    <span class="name"><?php if ($_smarty_tpl->tpl_vars['customer']->value->firstname&&$_smarty_tpl->tpl_vars['customer']->value->lastname&&!$_smarty_tpl->tpl_vars['is_default_customer']->value) {?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['customer']->value->firstname, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
 <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['customer']->value->lastname, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
 <?php }?></span>
    <span class="email sub-info"><?php if ($_smarty_tpl->tpl_vars['customer']->value->email&&!$_smarty_tpl->tpl_vars['is_default_customer']->value) {?> <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['customer']->value->email, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
 <?php }?></span>
    <span class="phone sub-info"><?php if (isset($_smarty_tpl->tpl_vars['customer']->value->phone)&&!$_smarty_tpl->tpl_vars['is_default_customer']->value) {?> <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['customer']->value->phone, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
 <?php }?></span>
    
</div>
<div id="display_pos_customer_bottom">
    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayPosCustomerBottom",'is_default_customer'=>$_smarty_tpl->tpl_vars['is_default_customer']->value),$_smarty_tpl);?>

</div>
<?php }} ?>
