<?php /* Smarty version Smarty-3.1.19, created on 2016-12-13 19:57:55
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/pdf/models/templates/receipt/tab_summary.tpl" */ ?>
<?php /*%%SmartyHeaderCode:518727574584ffe638d1ca2-74693011%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e0c9593e86443c61088e0c83e340dacedbab026f' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/pdf/models/templates/receipt/tab_summary.tpl',
      1 => 1480187258,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '518727574584ffe638d1ca2-74693011',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'hs_pos_i18n' => 0,
    'include_taxes' => 0,
    'order' => 0,
    'order_details' => 0,
    'total_discounts' => 0,
    'cart_rule' => 0,
    'total_tax' => 0,
    'group_price_display_method' => 0,
    'amount_due' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_584ffe639627f4_62059021',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584ffe639627f4_62059021')) {function content_584ffe639627f4_62059021($_smarty_tpl) {?>
<table class="table" cellspacing="0" cellpadding="0">
    <tr>
        <td style="border-top: 0.5px dashed #000;" class="total_left"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['sub_total'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
        <td style="border-top: 0.5px dashed #000;" class="total_right"><?php if ($_smarty_tpl->tpl_vars['include_taxes']->value) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('currency'=>$_smarty_tpl->tpl_vars['order']->value->id_currency,'price'=>$_smarty_tpl->tpl_vars['order']->value->total_products_wt-$_smarty_tpl->tpl_vars['order_details']->value['gift_total_order_tax_incl']),$_smarty_tpl);?>
<?php } else { ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('currency'=>$_smarty_tpl->tpl_vars['order']->value->id_currency,'price'=>$_smarty_tpl->tpl_vars['order']->value->total_products-$_smarty_tpl->tpl_vars['order_details']->value['gift_total_order_tax_excl']),$_smarty_tpl);?>
<?php }?></td>
    </tr>
    <?php if ($_smarty_tpl->tpl_vars['include_taxes']->value) {?>
        <?php $_smarty_tpl->tpl_vars['total_discounts'] = new Smarty_variable($_smarty_tpl->tpl_vars['order']->value->total_discounts_tax_incl-$_smarty_tpl->tpl_vars['order']->value->total_shipping_tax_incl-$_smarty_tpl->tpl_vars['order_details']->value['gift_total_order_tax_incl'], null, 0);?>
    <?php } else { ?>
        <?php $_smarty_tpl->tpl_vars['total_discounts'] = new Smarty_variable($_smarty_tpl->tpl_vars['order']->value->total_discounts_tax_excl-$_smarty_tpl->tpl_vars['order']->value->total_shipping_tax_excl-$_smarty_tpl->tpl_vars['order_details']->value['gift_total_order_tax_excl'], null, 0);?>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['total_discounts']->value>0) {?>
        <tr>
            <td class="total_left"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['order_discount'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
            <td class="total_right">-<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('currency'=>$_smarty_tpl->tpl_vars['order']->value->id_currency,'price'=>$_smarty_tpl->tpl_vars['total_discounts']->value),$_smarty_tpl);?>
</td>
        </tr>
        <?php if ($_smarty_tpl->tpl_vars['order']->value->getCartRules()) {?>        
            <?php  $_smarty_tpl->tpl_vars['cart_rule'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cart_rule']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['order']->value->getCartRules(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cart_rule']->key => $_smarty_tpl->tpl_vars['cart_rule']->value) {
$_smarty_tpl->tpl_vars['cart_rule']->_loop = true;
?>
                <?php if (!$_smarty_tpl->tpl_vars['cart_rule']->value['free_shipping']) {?>
                    <tr>
                        <td class="total_left">(<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['cart_rule']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
)</td>
                        <td class="total_right">
                            <?php if ($_smarty_tpl->tpl_vars['include_taxes']->value) {?>
                                (<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('currency'=>$_smarty_tpl->tpl_vars['order']->value->id_currency,'price'=>$_smarty_tpl->tpl_vars['cart_rule']->value['value']*-1),$_smarty_tpl);?>
)
                            <?php } else { ?>
                                (<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('currency'=>$_smarty_tpl->tpl_vars['order']->value->id_currency,'price'=>$_smarty_tpl->tpl_vars['cart_rule']->value['value_tax_excl']*-1),$_smarty_tpl);?>
)
                            <?php }?>
                        </td>
                    </tr>
                <?php }?>
            <?php } ?>
        <?php }?>         
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['order']->value->total_shipping_tax_excl>0&&!$_smarty_tpl->tpl_vars['order']->value->isFreeShipping()) {?>
        <tr>
            <td class="total_left"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['shipping_cost'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
            <td class="total_right"><?php if ($_smarty_tpl->tpl_vars['include_taxes']->value) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('currency'=>$_smarty_tpl->tpl_vars['order']->value->id_currency,'price'=>$_smarty_tpl->tpl_vars['order']->value->total_shipping_tax_incl),$_smarty_tpl);?>
<?php } else { ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('currency'=>$_smarty_tpl->tpl_vars['order']->value->id_currency,'price'=>$_smarty_tpl->tpl_vars['order']->value->total_shipping_tax_excl),$_smarty_tpl);?>
<?php }?></td>
        </tr>
    <?php }?>
    <?php $_smarty_tpl->tpl_vars['total_tax'] = new Smarty_variable($_smarty_tpl->tpl_vars['order']->value->total_paid_tax_incl-$_smarty_tpl->tpl_vars['order']->value->total_paid_tax_excl, null, 0);?>
    <?php if ($_smarty_tpl->tpl_vars['total_tax']->value>0) {?>
        <tr>
            <td class="total_left"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['total'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
 (<?php if ($_smarty_tpl->tpl_vars['group_price_display_method']->value) {?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['tax_incl'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php } else { ?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['tax_excl'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php }?>)</td>
            <td class="total_right"><?php if ($_smarty_tpl->tpl_vars['group_price_display_method']->value) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('currency'=>$_smarty_tpl->tpl_vars['order']->value->id_currency,'price'=>$_smarty_tpl->tpl_vars['order']->value->total_paid_tax_incl),$_smarty_tpl);?>
<?php } else { ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('currency'=>$_smarty_tpl->tpl_vars['order']->value->id_currency,'price'=>$_smarty_tpl->tpl_vars['order']->value->total_paid_tax_excl),$_smarty_tpl);?>
<?php }?></td>
        </tr>
        <tr>
            <td class="total_left"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['total_tax'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
            <td class="total_right">
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('currency'=>$_smarty_tpl->tpl_vars['order']->value->id_currency,'price'=>$_smarty_tpl->tpl_vars['total_tax']->value),$_smarty_tpl);?>

            </td>
        </tr>
    <?php }?>

    <tr>
        <td class="total_left"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['total'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
        <td class="total_right"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('currency'=>$_smarty_tpl->tpl_vars['order']->value->id_currency,'price'=>$_smarty_tpl->tpl_vars['order']->value->total_paid_tax_incl),$_smarty_tpl);?>
</td>
    </tr>
    <?php $_smarty_tpl->tpl_vars['amount_due'] = new Smarty_variable($_smarty_tpl->tpl_vars['order']->value->total_paid_tax_incl-$_smarty_tpl->tpl_vars['order']->value->total_paid_real, null, 0);?>
    <?php if ($_smarty_tpl->tpl_vars['amount_due']->value>0) {?>
        <tr>
            <td class="total_left"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['amount_due'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
            <td class="total_right"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('currency'=>$_smarty_tpl->tpl_vars['order']->value->id_currency,'price'=>$_smarty_tpl->tpl_vars['amount_due']->value),$_smarty_tpl);?>
</td>
        </tr>
    <?php }?>
</table><?php }} ?>
