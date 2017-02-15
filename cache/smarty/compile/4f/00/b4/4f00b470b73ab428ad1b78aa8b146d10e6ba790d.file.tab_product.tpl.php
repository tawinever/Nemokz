<?php /* Smarty version Smarty-3.1.19, created on 2016-12-13 19:57:55
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/pdf/models/templates/receipt/tab_product.tpl" */ ?>
<?php /*%%SmartyHeaderCode:948956688584ffe638627e9-18164519%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4f00b470b73ab428ad1b78aa8b146d10e6ba790d' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/pdf/models/templates/receipt/tab_product.tpl',
      1 => 1480187258,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '948956688584ffe638627e9-18164519',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'order' => 0,
    'is_showing_discount' => 0,
    'width_column_name' => 0,
    'hs_pos_i18n' => 0,
    'width_column_price' => 0,
    'width_column_qty' => 0,
    'width_column_total' => 0,
    'order_details' => 0,
    'product' => 0,
    'include_taxes' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_584ffe638cd000_79924750',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584ffe638cd000_79924750')) {function content_584ffe638cd000_79924750($_smarty_tpl) {?>

<?php if ($_smarty_tpl->tpl_vars['order']->value->isDiscount()&&Configuration::get('POS_RECEIPT_SHOW_PROD_DISCOUNT')) {?>
    <?php $_smarty_tpl->tpl_vars["is_showing_discount"] = new Smarty_variable("1", null, 0);?>
<?php } else { ?>
    <?php $_smarty_tpl->tpl_vars["is_showing_discount"] = new Smarty_variable("0", null, 0);?>
<?php }?>
<?php $_smarty_tpl->tpl_vars["truncate_value"] = new Smarty_variable("30", null, 0);?>
<?php if ($_smarty_tpl->tpl_vars['is_showing_discount']->value||Configuration::get('POS_RECEIPT_SHOW_UNIT_PRICE')) {?>
    <?php $_smarty_tpl->tpl_vars["width_column_name"] = new Smarty_variable(46, null, 0);?>
    <?php $_smarty_tpl->tpl_vars["width_column_price"] = new Smarty_variable("20", null, 0);?>
    <?php $_smarty_tpl->tpl_vars["width_column_qty"] = new Smarty_variable("12", null, 0);?>
    <?php $_smarty_tpl->tpl_vars["width_column_total"] = new Smarty_variable("22", null, 0);?>
<?php } else { ?>
    <?php $_smarty_tpl->tpl_vars["width_column_name"] = new Smarty_variable(58, null, 0);?>
    <?php $_smarty_tpl->tpl_vars["width_column_price"] = new Smarty_variable("0", null, 0);?>
    <?php $_smarty_tpl->tpl_vars["width_column_qty"] = new Smarty_variable("12", null, 0);?>
    <?php $_smarty_tpl->tpl_vars["width_column_total"] = new Smarty_variable("30", null, 0);?>
<?php }?>

<table class="table" cellspacing="0" cellpadding="3">
    <tr>
        <td width="<?php echo intval($_smarty_tpl->tpl_vars['width_column_name']->value);?>
%" class="table_header left"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['product'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
        <?php if (Configuration::get('POS_RECEIPT_SHOW_UNIT_PRICE')||$_smarty_tpl->tpl_vars['is_showing_discount']->value) {?>
            <td class="table_header right" width="<?php echo intval($_smarty_tpl->tpl_vars['width_column_price']->value);?>
%"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['price'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
        <?php }?>
        <td class="table_header center" width="<?php echo intval($_smarty_tpl->tpl_vars['width_column_qty']->value);?>
%" ><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['qty'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
        <td class="table_header right" width="<?php echo intval($_smarty_tpl->tpl_vars['width_column_total']->value);?>
%"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['total'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
    </tr>
    <!-- PRODUCTS -->
    <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['order_details']->value['products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
        <tr>
            <td  style="text-align: left; font-family: 'Times New Roman', Times, serif; "><?php echo preg_replace("%(?<!\\\\)'%", "\'",implode('<br />',$_smarty_tpl->tpl_vars['product']->value['meta_data']));?>
</td>
            <?php if ((!empty($_smarty_tpl->tpl_vars['product']->value['prices_to_show']))) {?>
                <td style="text-align: right;" ><?php echo preg_replace("%(?<!\\\\)'%", "\'",implode('<br/> -',$_smarty_tpl->tpl_vars['product']->value['prices_to_show']));?>
</td>
            <?php }?>
            <td style="text-align: center;"><?php echo intval($_smarty_tpl->tpl_vars['product']->value['product_quantity']);?>
</td>
            <td style="text-align: right;">
                <?php if ($_smarty_tpl->tpl_vars['include_taxes']->value) {?>
                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('currency'=>$_smarty_tpl->tpl_vars['order']->value->id_currency,'price'=>$_smarty_tpl->tpl_vars['product']->value['total_price_tax_incl']),$_smarty_tpl);?>

                <?php } else { ?> 
                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('currency'=>$_smarty_tpl->tpl_vars['order']->value->id_currency,'price'=>$_smarty_tpl->tpl_vars['product']->value['total_price_tax_excl']),$_smarty_tpl);?>

                <?php }?>				                
            </td>
        </tr>
    <?php } ?>
    <!-- END PRODUCTS -->
    <!-- Gift product -->
    <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['order_details']->value['gift_products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
        <tr>
            <td  style="text-align: left; font-family: 'Times New Roman', Times, serif; "><?php echo preg_replace("%(?<!\\\\)'%", "\'",implode('<br />',$_smarty_tpl->tpl_vars['product']->value['meta_data']));?>
</td>
            <?php if ((!empty($_smarty_tpl->tpl_vars['product']->value['prices_to_show']))) {?>
                <td style="text-align: right;" ><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['gift'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
            <?php }?>
            <td style="text-align: center;"><?php echo intval($_smarty_tpl->tpl_vars['product']->value['product_quantity']);?>
</td>
            <td style="text-align: right;">
                <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['gift'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
				                
            </td>
        </tr>
    <?php } ?>
    <!-- End gift product -->
</table><?php }} ?>
