<?php /* Smarty version Smarty-3.1.19, created on 2016-12-13 19:57:02
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/views/templates/admin/hs_point_of_sale_new_sale_abstract/shopping_cart_product_line.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1913474089584ffe2e97a392-75261446%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1e37bcbe73fef6ac20cba273135056da0dd961bd' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/views/templates/admin/hs_point_of_sale_new_sale_abstract/shopping_cart_product_line.tpl',
      1 => 1480187258,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1913474089584ffe2e97a392-75261446',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'product' => 0,
    'product_permission' => 0,
    'link' => 0,
    'identifier' => 0,
    'productId' => 0,
    'productAttributeId' => 0,
    'customizedDatas' => 0,
    'quantityDisplayed' => 0,
    'product_link' => 0,
    'currency' => 0,
    'hs_pos_i18n' => 0,
    'use_tax' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_584ffe2ea8c670_20615594',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584ffe2ea8c670_20615594')) {function content_584ffe2ea8c670_20615594($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_escape')) include '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/tools/smarty/plugins/modifier.escape.php';
?>

<?php $_smarty_tpl->tpl_vars["identifier"] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['product']->value['id_product'])."_".((string)$_smarty_tpl->tpl_vars['product']->value['id_product_attribute'])."_".((string)$_smarty_tpl->tpl_vars['product']->value['id_shop']), null, 0);?>
<?php if ($_smarty_tpl->tpl_vars['product_permission']->value) {?>
    <?php ob_start();?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getAdminToken'][0][0]->getAdminTokenLiteSmarty(array('tab'=>'AdminProducts'),$_smarty_tpl);?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars["product_link"] = new Smarty_variable("index.php?controller=adminproducts&amp;id_product=".((string)$_smarty_tpl->tpl_vars['product']->value['id_product'])."&amp;updateproduct&amp;token=".$_tmp1, null, 0);?>
<?php } else { ?>
    <?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getProductLink($_smarty_tpl->tpl_vars['product']->value['id_product'],$_smarty_tpl->tpl_vars['product']->value['link_rewrite'],$_smarty_tpl->tpl_vars['product']->value['category'],null,null,$_smarty_tpl->tpl_vars['product']->value['id_shop']), ENT_QUOTES, 'UTF-8', true);?>
<?php $_tmp2=ob_get_clean();?><?php $_smarty_tpl->tpl_vars["product_link"] = new Smarty_variable($_tmp2, null, 0);?>
<?php }?>
<tr id="product_<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['identifier']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" class="<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['productLoop']['last']) {?>last_item<?php } elseif ($_smarty_tpl->getVariable('smarty')->value['foreach']['productLoop']['first']) {?>first_item<?php }?><?php if (isset($_smarty_tpl->tpl_vars['customizedDatas']->value[$_smarty_tpl->tpl_vars['productId']->value][$_smarty_tpl->tpl_vars['productAttributeId']->value])&&$_smarty_tpl->tpl_vars['quantityDisplayed']->value==0) {?>alternate_item<?php }?> cart_item">
    <td class="cart_product_id">
        <a href="<?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['product_link']->value);?>
" target="_blank">
            <img src="<?php echo $_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['product']->value['link_rewrite'],mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['id_image'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8'),'small_default');?>
" alt="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
        </a>
    </td>
    <td class="cart_product">
        <a href="<?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['product_link']->value);?>
" target="_blank">
            <h5><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</h5>
        </a>
        <?php if (!empty($_smarty_tpl->tpl_vars['product']->value['attributes'])) {?> 
            <?php echo $_smarty_tpl->tpl_vars['product']->value['attributes'];?>

         <?php }?>   
    </td>
    <td class="cart_unit">
        <?php if (empty($_smarty_tpl->tpl_vars['product']->value['gift'])) {?>
        <span class="price">            
            <?php if ($_smarty_tpl->tpl_vars['product']->value['price_without_reduction']!=$_smarty_tpl->tpl_vars['product']->value['price_with_reduction']) {?>
                <span class="old-price"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value['price_without_reduction']),$_smarty_tpl);?>
</span>
            <?php }?>
            <div class="input-group">
                <span class="input-group-addon"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['currency']->value->sign, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</span>
                <input type="text" class="product_price_edit" data-product-price="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['identifier']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['pos_price'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" name="pos_price">
            </div>
        </span>
        <?php } else { ?>
            <span class="badge badge-success">
                <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['gift'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

            </span>
        <?php }?>
    </td>
    <td class="cart_quantity"<?php if (isset($_smarty_tpl->tpl_vars['customizedDatas']->value[$_smarty_tpl->tpl_vars['productId']->value][$_smarty_tpl->tpl_vars['productAttributeId']->value])&&$_smarty_tpl->tpl_vars['quantityDisplayed']->value==0) {?> style="text-align: center;"<?php }?>>
        <?php if (isset($_smarty_tpl->tpl_vars['customizedDatas']->value[$_smarty_tpl->tpl_vars['productId']->value][$_smarty_tpl->tpl_vars['productAttributeId']->value])&&$_smarty_tpl->tpl_vars['quantityDisplayed']->value==0) {?><span id="cart_quantity_custom_<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['identifier']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" ><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['customizationQuantityTotal'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</span><?php }?>
        <?php if (!isset($_smarty_tpl->tpl_vars['customizedDatas']->value[$_smarty_tpl->tpl_vars['productId']->value][$_smarty_tpl->tpl_vars['productAttributeId']->value])||$_smarty_tpl->tpl_vars['quantityDisplayed']->value>0) {?>
            <?php if (empty($_smarty_tpl->tpl_vars['product']->value['gift'])) {?>
            <div id="cart_quantity_button">
                <a href="javascript:void(0);" class="qty_up" title="up" rel='<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['identifier']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
'>+</a>
                <?php if ($_smarty_tpl->tpl_vars['product']->value['minimal_quantity']<($_smarty_tpl->tpl_vars['product']->value['cart_quantity']-$_smarty_tpl->tpl_vars['quantityDisplayed']->value)||$_smarty_tpl->tpl_vars['product']->value['minimal_quantity']<=1) {?>
                    <a href="javascript:void(0);" class="qty_down" title="down" rel='<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['identifier']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
'>-</a>
                <?php } else { ?>
                    <a href="javascript:void(0);" class="qty_down" title="down" rel='<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['identifier']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
'>-</a>
                <?php }?>
            </div>
            <input type="hidden" class="cart_quantity_input_hidden" value="<?php if ($_smarty_tpl->tpl_vars['quantityDisplayed']->value==0&&isset($_smarty_tpl->tpl_vars['customizedDatas']->value[$_smarty_tpl->tpl_vars['productId']->value][$_smarty_tpl->tpl_vars['productAttributeId']->value])) {?><?php echo count(mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['customizedDatas']->value[$_smarty_tpl->tpl_vars['productId']->value][$_smarty_tpl->tpl_vars['productAttributeId']->value], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8'));?>
<?php } else { ?><?php echo mb_convert_encoding(htmlspecialchars(($_smarty_tpl->tpl_vars['product']->value['cart_quantity']-$_smarty_tpl->tpl_vars['quantityDisplayed']->value), ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php }?>"id="quantity_<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['identifier']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
_hidden" name="quantity_<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['identifier']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
_hidden" />
            <input size="2" type="text" class="cart_quantity_input" value="<?php if ($_smarty_tpl->tpl_vars['quantityDisplayed']->value==0&&isset($_smarty_tpl->tpl_vars['customizedDatas']->value[$_smarty_tpl->tpl_vars['productId']->value][$_smarty_tpl->tpl_vars['productAttributeId']->value])) {?><?php echo count(mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['customizedDatas']->value[$_smarty_tpl->tpl_vars['productId']->value][$_smarty_tpl->tpl_vars['productAttributeId']->value], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8'));?>
<?php } else { ?><?php echo mb_convert_encoding(htmlspecialchars(($_smarty_tpl->tpl_vars['product']->value['cart_quantity']-$_smarty_tpl->tpl_vars['quantityDisplayed']->value), ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php }?>"  name="quantity_<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['identifier']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" id="quantity_<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['identifier']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"/>
            <?php } else { ?>
                <p class="center">
                <?php echo intval($_smarty_tpl->tpl_vars['product']->value['cart_quantity']);?>

                </p>
            <?php }?>
        <?php }?>
    </td>
    <td class="hs_td_discount">
        <?php if (empty($_smarty_tpl->tpl_vars['product']->value['gift'])) {?>
        <input type="text" size="3" class="product_discount" value="<?php echo floatval($_smarty_tpl->tpl_vars['product']->value['reduction']);?>
" data-product="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['identifier']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"/>
        <input type="hidden" class="price_without_specific_price" value="<?php echo floatval($_smarty_tpl->tpl_vars['product']->value['price_without_reduction']);?>
"/>
        <select name="pos_reduction_type" class="pos_reduction_type">
            <option value="amount" <?php if ($_smarty_tpl->tpl_vars['product']->value['reduction_type']=='amount') {?>selected="selected"<?php }?>><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['amount'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</option>
            <option value="percentage" <?php if ($_smarty_tpl->tpl_vars['product']->value['reduction_type']=='percentage') {?>selected="selected"<?php }?>><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['percentage'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</option>
        </select>
        <?php } else { ?>
            <span class="badge badge-success">
                <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['gift'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

            </span>
        <?php }?>
    </td>
    <td class="cart_total">
        <?php if (empty($_smarty_tpl->tpl_vars['product']->value['gift'])) {?>
            <span class="price" id="total_product_price_<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['identifier']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
">
                <?php if ($_smarty_tpl->tpl_vars['use_tax']->value) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['product']->value['total_wt']),$_smarty_tpl);?>
<?php } else { ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['product']->value['total']),$_smarty_tpl);?>
<?php }?>
            </span>
        <?php } else { ?>
            <span class="badge badge-success">
                <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['gift'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

            </span>
        <?php }?>
</td>
<td class="cart_action">
    <?php if (empty($_smarty_tpl->tpl_vars['product']->value['gift'])) {?>
        <a href="javascript:void(0);" class="remove_product" rel="<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['product']->value['id_product'], 'intval');?>
_<?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['product']->value['id_product_attribute'], 'intval');?>
"><img src="../img/admin/delete.gif" alt="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['delete'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" class="icons"/></a>
    <?php }?>
</td>
</tr>
<?php }} ?>
