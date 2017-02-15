<?php /* Smarty version Smarty-3.1.19, created on 2016-11-27 01:09:53
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/views/templates/admin/hs_point_of_sale_new_sale_abstract/content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12963703495839de019da0a9-18508200%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2e29b6784160f1197a096dfc0fcb451b3f049c65' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/views/templates/admin/hs_point_of_sale_new_sale_abstract/content.tpl',
      1 => 1480187258,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12963703495839de019da0a9-18508200',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cart' => 0,
    'rockpos_version' => 0,
    'product_number' => 0,
    'id_customer' => 0,
    'amount_due' => 0,
    'currency_format' => 0,
    'price_display_precision' => 0,
    'decimals' => 0,
    'is_collecting_payment' => 0,
    'dummy_customer' => 0,
    'addresses' => 0,
    'id_address_delivery' => 0,
    'id_address_invoice' => 0,
    'link_add_address' => 0,
    'output_product_search_configurations' => 0,
    'hs_pos_i18n' => 0,
    'order_summary' => 0,
    'delivery_option_list' => 0,
    'js_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5839de01a36fa4_48082349',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5839de01a36fa4_48082349')) {function content_5839de01a36fa4_48082349($_smarty_tpl) {?>
<script type="text/javascript">
    ROCKPOS.idCart =<?php echo intval($_smarty_tpl->tpl_vars['cart']->value->id);?>
;
    ROCKPOS.version = '<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['rockpos_version']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
';
    var nbProducts = <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['product_number']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
;
    var idCustomer = <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['id_customer']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
;
    var amountDue = <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['amount_due']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
;
    var currencyFormat = <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['currency_format']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
;
    var priceDisplayPrecision = <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['price_display_precision']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
;
    var decimals = '<?php echo intval($_smarty_tpl->tpl_vars['decimals']->value);?>
';
    var collectingPayment = <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['is_collecting_payment']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
;
    var dummyCustomer = <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['dummy_customer']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
;
    var addresses = <?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['addresses']->value);?>
;
    var idAddressDelivery = <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['id_address_delivery']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
;
    var idAddressInvoice = <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['id_address_invoice']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
;
    var linkAddAddress = '<?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['link_add_address']->value);?>
';
    var outputProductSearchConfigs = <?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['output_product_search_configurations']->value);?>
;
    var allowOrderingOfOutOfStockProducts = <?php echo intval(Configuration::get('POS_ORDER_OUT_OF_STOCK'));?>

    
</script>

<div class="pos_container clearfix">
    <div id="pos_main_content" class="clearfix">
        <div class="module_info"><?php echo $_smarty_tpl->getSubTemplate ("./module_info.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
</div>

        <div class="left_block">
            
            <div id="displayPosTop">
                <div class="currency_block">
                    <?php echo $_smarty_tpl->getSubTemplate ("./currency.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                </div>

                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayPosTop"),$_smarty_tpl);?>


                <div id="pos_note">
                    <a class="block_add_note" href="#pos_add_note">
                        <i class="icon-file-text"></i>
                        <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['add_note'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

                    </a>
                    <?php echo $_smarty_tpl->getSubTemplate ("./add_note.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                </div>
            </div>

            <?php echo $_smarty_tpl->getSubTemplate ("./category_tree.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


            <div id="product_search" class="product_search">
                
            </div>

            <div id="displayFilterByCategoryBottom">
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayFilterByCategoryBottom"),$_smarty_tpl);?>

            </div>

            <div class="block_cart">
                <?php echo $_smarty_tpl->getSubTemplate ("./shopping_cart.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            </div>
        </div>

        <div id="pos_cart_block" class="right_block">
            <div id="cart_nav" class="clearfix text-center block">
                <a class="btn_cancel_order pull-left" href="javascript:void(0)" title="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['cancel_order'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
">
                    <i class="icon-trash"></i>
                </a>

                <span><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['cart'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
(<span id="pos_cart_qty"><?php echo count($_smarty_tpl->tpl_vars['order_summary']->value['products']);?>
</span>)</span>

                <a class="btn_add_other_order pull-right" href="javascript:void(0)" title="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['new_order'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
">
                    <i class="icon-plus"></i>
                </a>

            </div>
            <div id="pos_customer_block" class="block">
                <?php echo $_smarty_tpl->getSubTemplate ("./search_customer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


                <div class="block_addresses clearfix" style="display:none;">
                    <?php echo $_smarty_tpl->getSubTemplate ("./address.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                </div>

                
                    <div class="block_shipping clearfix" style="display:<?php if (empty($_smarty_tpl->tpl_vars['delivery_option_list']->value)) {?>none<?php } else { ?>block<?php }?>;">
                        <?php echo $_smarty_tpl->getSubTemplate ("./shipping.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                    </div>
                
            </div>

            <div class="block_discount clearfix">
                <?php echo $_smarty_tpl->getSubTemplate ("./cart_discount.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            </div>

            <div id="pos_summary" class="clearfix block">
                <div class="block_summary">
                    <?php echo $_smarty_tpl->getSubTemplate ("./cart_summary.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                </div>

                <?php if (PosConfiguration::get('POS_COLLECTING_PAYMENT')) {?>
                    <div class="block_paid_payment" >
                        <?php echo $_smarty_tpl->getSubTemplate ("./list_paid_payments.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                    </div>
                <?php }?>
            </div>

            <?php if (PosConfiguration::get('POS_COLLECTING_PAYMENT')) {?>
                <div class="block_payment">
                    <?php $_smarty_tpl->tpl_vars["total_price"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['order_summary']->value['total_price']), null, 0);?>
                    <?php echo $_smarty_tpl->getSubTemplate ("./payment.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                </div>
            <?php }?>

            <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayPosCompleteSale"),$_smarty_tpl);?>

            
            <div class="order_status" style="display:none;">
                <?php echo $_smarty_tpl->getSubTemplate ("./order_status.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

            </div>

            <div class="pre_order">
                <input class="btn_pre_order button" type="button" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['pre_order'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"/>
            </div>
            <div class="complete_sale">
                <input class="btn_complete button" type="button" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['complete_sale'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"/>
            </div>
        </div>
    </div>

    
    
</div>

<script src="<?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['js_path']->value);?>
apps/newsale20.js?v=2.4.2.3"></script><?php }} ?>
