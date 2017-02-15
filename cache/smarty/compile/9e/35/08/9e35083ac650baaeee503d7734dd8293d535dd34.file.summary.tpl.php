<?php /* Smarty version Smarty-3.1.19, created on 2016-12-13 19:57:47
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/views/templates/admin/hs_point_of_sale_new_sale_abstract/summary.tpl" */ ?>
<?php /*%%SmartyHeaderCode:157946807584ffe5b71f4b5-95500478%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9e35083ac650baaeee503d7734dd8293d535dd34' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/views/templates/admin/hs_point_of_sale_new_sale_abstract/summary.tpl',
      1 => 1480187258,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '157946807584ffe5b71f4b5-95500478',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'hs_pos_i18n' => 0,
    'order' => 0,
    'cart' => 0,
    'paid_payment' => 0,
    'is_guest_checkout' => 0,
    'formatted_invoice_address' => 0,
    'order_details' => 0,
    'cart_rules' => 0,
    'cart_rule' => 0,
    'use_tax' => 0,
    'total_discounts' => 0,
    'is_free_shipping' => 0,
    'total_tax' => 0,
    'group_price_display_method' => 0,
    'amount_due' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_584ffe5b859be7_97173606',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584ffe5b859be7_97173606')) {function content_584ffe5b859be7_97173606($_smarty_tpl) {?>
<style>
    .fancybox-skin
    {
        padding: 15px 5px !important;
    }

    #ticketPrintGuardar {
        right: -58px;
        top: 172px;
    }
    .label_total{
        padding-right: 10px;
        font-weight: bold;
        text-align: right;
    }
    .printWrapperDer {
        background: none repeat scroll 0 0 #bdbdbd;
        border-bottom-right-radius: 5px;
        border-top-right-radius: 5px;
        cursor: pointer;
        padding: 6px;
        position: static;
    }
    #ticketPrintGuardar .print {
        background: url("../form-ok.png") no-repeat scroll -35px -13px rgba(0, 0, 0, 0);
        height: 35px;
        width: 32px;
    }
    .table tr td, .table tr th{
        font-family: helvetica;
        font-size: 12px;
    }
    .table tr th{
        border-top: 1px #000 solid;
        border-bottom: 1px #000 solid;
    }
    .table tr td
    {
        border-bottom: #000 dotted 1px;
    }
    .table tr
    {
        line-height: 206% !important;
    }
    .center
    {
        text-align: center;
        font-size: 12px;
    }
    .receipt .change_back_block {
        clear: both;
        width: 100%;
    }
    .receipt .change_back_title {
        padding-top:10px;
        padding-bottom:10px;
        font-weight: bold;
    }
    .receipt .change_back_payment {
        color: red;
        margin-left: 25px;
        font-weight: bold;
        font-size: x-large;
    }
</style>
<?php $_smarty_tpl->tpl_vars["is_discount"] = new Smarty_variable(0, null, 0);?>
<div class="receipt">
    <fieldset class='fieldset'>
        <legend><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['summary'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</legend>
        <div class="control">
            <?php if ($_smarty_tpl->tpl_vars['order']->value->hasInvoice()) {?>
            <input type="button" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['invoice'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" class="print_invoice button" rel="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['order']->value->id, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
">
            <?php }?>
            <input type="button" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['receipt'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" class="print_receipt button" rel="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['order']->value->id, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
">
            <input type="button" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['new_order'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" class="new_order button">
        </div>

        <p>&nbsp;</p>
        <p class="order_date"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['order_placed_on'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0][0]->dateFormat(array('date'=>$_smarty_tpl->tpl_vars['order']->value->date_add,'full'=>0),$_smarty_tpl);?>
</p>
        <div class="clearfix">
            <div class="order_payment_method">
                <div class="order_id">
                    <p><strong><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['order_reference'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</strong>&nbsp;<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['order']->value->reference, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</p>
                </div>
                <div class="payment_method">
                    <p><strong><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['payment_methods'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
:</strong></p>
                    <ul>
                        <?php  $_smarty_tpl->tpl_vars['paid_payment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['paid_payment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cart']->value->getPayments(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['paid_payment']->key => $_smarty_tpl->tpl_vars['paid_payment']->value) {
$_smarty_tpl->tpl_vars['paid_payment']->_loop = true;
?>
                            <li><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['paid_payment']->value['payment_name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
:
                                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('currency'=>$_smarty_tpl->tpl_vars['order']->value->id_currency,'price'=>$_smarty_tpl->tpl_vars['paid_payment']->value['amount']),$_smarty_tpl);?>

                            </li>
                        <?php } ?>
                    </ul>
                </div>
                <?php if ($_smarty_tpl->tpl_vars['cart']->value->getTotalChangeBack()>0) {?>
                    <div class="change_back_block">
                        <div class="change_back_title"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['change_back'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
:</div>
                        <ul class="change_back_payment">
                            <?php  $_smarty_tpl->tpl_vars['paid_payment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['paid_payment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cart']->value->getPayments(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['paid_payment']->key => $_smarty_tpl->tpl_vars['paid_payment']->value) {
$_smarty_tpl->tpl_vars['paid_payment']->_loop = true;
?>
                                <li><strong><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['paid_payment']->value['payment_name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['paid_payment']->value['change'],'currency'=>$_smarty_tpl->tpl_vars['order']->value->id_currency),$_smarty_tpl);?>
</strong></li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php }?>
            </div>
           
            <?php if (!$_smarty_tpl->tpl_vars['is_guest_checkout']->value) {?>
                <div class="invoicing">
                    <p><strong><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['invoicing'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
:</strong></p>
                    <?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['formatted_invoice_address']->value);?>

                </div>
            <?php }?>
        </div>

        <div class="clear">&nbsp;</div>

        <div class="list_products">
            <table class="std table">
                <thead>
                    <tr>
                        <th><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['id'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</th>
                        <th><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['product_name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</th>
                        <th><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['price'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</th>
                        <th><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['quantity'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</th>
                        <th><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['discount'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</th>
                        <th><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['total'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['order_details']->value['products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
                        <?php echo $_smarty_tpl->getSubTemplate ("./summary_product_line.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                    <?php } ?>
                    <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['order_details']->value['gift_products']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
                        <?php echo $_smarty_tpl->getSubTemplate ("./summary_product_line.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                    <?php } ?>
                    <?php  $_smarty_tpl->tpl_vars['cart_rule'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cart_rule']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cart_rules']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cart_rule']->key => $_smarty_tpl->tpl_vars['cart_rule']->value) {
$_smarty_tpl->tpl_vars['cart_rule']->_loop = true;
?>
                        <tr>
                            <td>&nbsp;</td>
                            <td colspan="3"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['cart_rule']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                            <td>
                                - <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('currency'=>$_smarty_tpl->tpl_vars['order']->value->id_currency,'price'=>$_smarty_tpl->tpl_vars['cart_rule']->value['pos_value']),$_smarty_tpl);?>

                            </td>
                            <td>&nbsp;</td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="5" class="label_total"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['sub_total'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                        <td class="total"><?php if ($_smarty_tpl->tpl_vars['use_tax']->value) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('currency'=>$_smarty_tpl->tpl_vars['order']->value->id_currency,'price'=>($_smarty_tpl->tpl_vars['order']->value->total_products_wt-$_smarty_tpl->tpl_vars['order_details']->value['gift_total_order_tax_incl'])),$_smarty_tpl);?>
<?php } else { ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('currency'=>$_smarty_tpl->tpl_vars['order']->value->id_currency,'price'=>($_smarty_tpl->tpl_vars['order']->value->total_products-$_smarty_tpl->tpl_vars['order_details']->value['gift_total_order_tax_excl'])),$_smarty_tpl);?>
<?php }?></td>
                    </tr>
                    <?php if ($_smarty_tpl->tpl_vars['use_tax']->value) {?>
                        <?php $_smarty_tpl->tpl_vars['total_discounts'] = new Smarty_variable($_smarty_tpl->tpl_vars['order']->value->total_discounts_tax_excl-$_smarty_tpl->tpl_vars['order']->value->total_shipping_tax_incl-$_smarty_tpl->tpl_vars['order_details']->value['gift_total_order_tax_incl'], null, 0);?>
                    <?php } else { ?>    
                        <?php $_smarty_tpl->tpl_vars['total_discounts'] = new Smarty_variable($_smarty_tpl->tpl_vars['order']->value->total_discounts_tax_excl-$_smarty_tpl->tpl_vars['order']->value->total_shipping_tax_excl-$_smarty_tpl->tpl_vars['order_details']->value['gift_total_order_tax_excl'], null, 0);?>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['total_discounts']->value>0) {?>
                        <tr>
                            <td colspan="5" class="label_total"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['order_discount'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                            <td class="total" >-<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('currency'=>$_smarty_tpl->tpl_vars['order']->value->id_currency,'price'=>$_smarty_tpl->tpl_vars['total_discounts']->value),$_smarty_tpl);?>
</td>
                        </tr>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['order']->value->total_shipping_tax_excl>0&&!$_smarty_tpl->tpl_vars['is_free_shipping']->value) {?>
                        <tr>
                            <td colspan="5" class="label_total"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['shipping_cost'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                            <td class="total">
                                <?php if ($_smarty_tpl->tpl_vars['use_tax']->value) {?>
                                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('currency'=>$_smarty_tpl->tpl_vars['order']->value->id_currency,'price'=>$_smarty_tpl->tpl_vars['order']->value->total_shipping_tax_incl),$_smarty_tpl);?>

                                <?php } else { ?>
                                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('currency'=>$_smarty_tpl->tpl_vars['order']->value->id_currency,'price'=>$_smarty_tpl->tpl_vars['order']->value->total_shipping_tax_excl),$_smarty_tpl);?>

                                <?php }?>    
                            </td>
                        </tr>
                    <?php }?>
                    <?php $_smarty_tpl->tpl_vars['total_tax'] = new Smarty_variable($_smarty_tpl->tpl_vars['order']->value->total_paid_tax_incl-$_smarty_tpl->tpl_vars['order']->value->total_paid_tax_excl, null, 0);?>
                    <?php if ($_smarty_tpl->tpl_vars['total_tax']->value>0) {?>
                        <tr>
                            <td colspan="5" class="label_total"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['total'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
 (<?php if ($_smarty_tpl->tpl_vars['group_price_display_method']->value) {?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['tax_incl'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php } else { ?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['tax_excl'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php }?>)</td>
                            <td class="total">
                                <?php if ($_smarty_tpl->tpl_vars['group_price_display_method']->value) {?>
                                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('currency'=>$_smarty_tpl->tpl_vars['order']->value->id_currency,'price'=>$_smarty_tpl->tpl_vars['order']->value->total_paid_tax_incl),$_smarty_tpl);?>

                                <?php } else { ?>    
                                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('currency'=>$_smarty_tpl->tpl_vars['order']->value->id_currency,'price'=>$_smarty_tpl->tpl_vars['order']->value->total_paid_tax_excl),$_smarty_tpl);?>

                                <?php }?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5" class="label_total"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['total_tax'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                            <td class="total">
                                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('currency'=>$_smarty_tpl->tpl_vars['order']->value->id_currency,'price'=>$_smarty_tpl->tpl_vars['total_tax']->value),$_smarty_tpl);?>

                            </td>
                        </tr>
                    <?php }?>
                    <tr>
                        <td colspan="5" class="label_total"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['total'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                        <td class="total"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('currency'=>$_smarty_tpl->tpl_vars['order']->value->id_currency,'price'=>$_smarty_tpl->tpl_vars['order']->value->total_paid_tax_incl),$_smarty_tpl);?>
</td>
                    </tr>
                    <?php $_smarty_tpl->tpl_vars['amount_due'] = new Smarty_variable($_smarty_tpl->tpl_vars['order']->value->total_paid_tax_incl-$_smarty_tpl->tpl_vars['order']->value->total_paid_real, null, 0);?>
                    <?php if ($_smarty_tpl->tpl_vars['amount_due']->value>0) {?>
                         <tr>
                            <td colspan="5" class="label_total amount_due"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['amount_due'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                            <td class="total amount_due"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('currency'=>$_smarty_tpl->tpl_vars['order']->value->id_currency,'price'=>$_smarty_tpl->tpl_vars['amount_due']->value),$_smarty_tpl);?>
</td>
                        </tr>
                    <?php }?>
                </tfoot>
            </table>
        </div>
    </fieldset>
</div><?php }} ?>
