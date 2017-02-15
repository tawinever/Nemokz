<?php /* Smarty version Smarty-3.1.19, created on 2016-12-25 17:12:17
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/advancedcheckout/views/templates/front/shopping-cart-product-line.tpl" */ ?>
<?php /*%%SmartyHeaderCode:128849379583ed9e19bbb87-46734614%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9e971b48ff16ae0e45e0b5e58bede2b3ad40f2b3' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/advancedcheckout/views/templates/front/shopping-cart-product-line.tpl',
      1 => 1482664250,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '128849379583ed9e19bbb87-46734614',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_583ed9e1b68826_04656720',
  'variables' => 
  array (
    'product' => 0,
    'quantityDisplayed' => 0,
    'productLast' => 0,
    'ignoreProductLast' => 0,
    'productFirst' => 0,
    'productId' => 0,
    'productAttributeId' => 0,
    'customizedDatas' => 0,
    'odd' => 0,
    'link' => 0,
    'smallSize' => 0,
    'priceDisplay' => 0,
    'currency' => 0,
    'symbol' => 0,
    'priceReduction' => 0,
    'cannotModify' => 0,
    'token_cart' => 0,
    'noDeleteButton' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_583ed9e1b68826_04656720')) {function content_583ed9e1b68826_04656720($_smarty_tpl) {?>

<tr id="product_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']);?>
_<?php if ($_smarty_tpl->tpl_vars['quantityDisplayed']->value>0) {?>nocustom<?php } else { ?>0<?php }?>_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_address_delivery']);?>
<?php if (!empty($_smarty_tpl->tpl_vars['product']->value['gift'])) {?>_gift<?php }?>" class="cart_item<?php if (isset($_smarty_tpl->tpl_vars['productLast']->value)&&$_smarty_tpl->tpl_vars['productLast']->value&&(!isset($_smarty_tpl->tpl_vars['ignoreProductLast']->value)||!$_smarty_tpl->tpl_vars['ignoreProductLast']->value)) {?> last_item<?php }?><?php if (isset($_smarty_tpl->tpl_vars['productFirst']->value)&&$_smarty_tpl->tpl_vars['productFirst']->value) {?> first_item<?php }?><?php if (isset($_smarty_tpl->tpl_vars['customizedDatas']->value[$_smarty_tpl->tpl_vars['productId']->value][$_smarty_tpl->tpl_vars['productAttributeId']->value])&&$_smarty_tpl->tpl_vars['quantityDisplayed']->value==0) {?> alternate_item<?php }?> address_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_address_delivery']);?>
 <?php if ($_smarty_tpl->tpl_vars['odd']->value) {?>odd<?php } else { ?>even<?php }?>">
	<td class="cart_product">
		<div class="mobile_table_title visible-phone"><?php echo smartyTranslate(array('s'=>'Product','mod'=>'advancedcheckout'),$_smarty_tpl);?>
</div>
        <div class="mobile_table_content">
        <a href="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getProductLink($_smarty_tpl->tpl_vars['product']->value['id_product'],$_smarty_tpl->tpl_vars['product']->value['link_rewrite'],$_smarty_tpl->tpl_vars['product']->value['category'],null,null,$_smarty_tpl->tpl_vars['product']->value['id_shop'],$_smarty_tpl->tpl_vars['product']->value['id_product_attribute']), ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"><img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['product']->value['link_rewrite'],$_smarty_tpl->tpl_vars['product']->value['id_image'],'small_default'), ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" <?php if (isset($_smarty_tpl->tpl_vars['smallSize']->value)) {?>width="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['smallSize']->value['width'], ENT_QUOTES, 'UTF-8', true);?>
" height="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['smallSize']->value['height'], ENT_QUOTES, 'UTF-8', true);?>
" <?php }?> /></a>
        </div>
	</td>
	<td class="cart_description">
		<div class="mobile_table_title visible-phone"><?php echo smartyTranslate(array('s'=>'Description','mod'=>'advancedcheckout'),$_smarty_tpl);?>
</div>
        <div class="mobile_table_content">
		<p class="s_title_block"><a href="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getProductLink($_smarty_tpl->tpl_vars['product']->value['id_product'],$_smarty_tpl->tpl_vars['product']->value['link_rewrite'],$_smarty_tpl->tpl_vars['product']->value['category'],null,null,$_smarty_tpl->tpl_vars['product']->value['id_shop'],$_smarty_tpl->tpl_vars['product']->value['id_product_attribute']), ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</a></p>
		<?php if (isset($_smarty_tpl->tpl_vars['product']->value['attributes'])&&$_smarty_tpl->tpl_vars['product']->value['attributes']) {?><a href="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getProductLink($_smarty_tpl->tpl_vars['product']->value['id_product'],$_smarty_tpl->tpl_vars['product']->value['link_rewrite'],$_smarty_tpl->tpl_vars['product']->value['category'],null,null,$_smarty_tpl->tpl_vars['product']->value['id_shop'],$_smarty_tpl->tpl_vars['product']->value['id_product_attribute']), ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" class="color_666"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['attributes'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</a><?php }?>
        </div>
	</td>
	<td class="cart_unit">
		<div class="mobile_table_title visible-phone"><?php echo smartyTranslate(array('s'=>'Unit price','mod'=>'advancedcheckout'),$_smarty_tpl);?>
</div>
        <div class="mobile_table_content">
		<span class="price" id="product_price_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']);?>
<?php if ($_smarty_tpl->tpl_vars['quantityDisplayed']->value>0) {?>_nocustom<?php }?>_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_address_delivery']);?>
<?php if (!empty($_smarty_tpl->tpl_vars['product']->value['gift'])) {?>_gift<?php }?>">
			<?php if (!empty($_smarty_tpl->tpl_vars['product']->value['gift'])) {?>
				<span class="gift-icon"><?php echo smartyTranslate(array('s'=>'Gift!','mod'=>'advancedcheckout'),$_smarty_tpl);?>
</span>
			<?php } else { ?>
            	<?php if (!$_smarty_tpl->tpl_vars['priceDisplay']->value) {?>
					<span class="opc-price<?php if (isset($_smarty_tpl->tpl_vars['product']->value['is_discounted'])&&$_smarty_tpl->tpl_vars['product']->value['is_discounted']) {?> opc-special-price<?php }?>"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value['price_wt']),$_smarty_tpl);?>
</span>
				<?php } else { ?>
               	 	<span class="opc-price<?php if (isset($_smarty_tpl->tpl_vars['product']->value['is_discounted'])&&$_smarty_tpl->tpl_vars['product']->value['is_discounted']) {?> opc-special-price<?php }?>"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value['price']),$_smarty_tpl);?>
</span>
				<?php }?>
				<?php if (isset($_smarty_tpl->tpl_vars['product']->value['is_discounted'])&&$_smarty_tpl->tpl_vars['product']->value['is_discounted']) {?>
                	<br/><span class="opc-price-percent-reduction opc-small">
            			<?php if (!$_smarty_tpl->tpl_vars['priceDisplay']->value) {?>
            				<?php if (isset($_smarty_tpl->tpl_vars['product']->value['reduction_type'])&&$_smarty_tpl->tpl_vars['product']->value['reduction_type']=='amount') {?>
                    			<?php $_smarty_tpl->tpl_vars['priceReduction'] = new Smarty_variable(($_smarty_tpl->tpl_vars['product']->value['price_wt']-$_smarty_tpl->tpl_vars['product']->value['price_without_specific_price']), null, 0);?>
                    			<?php $_smarty_tpl->tpl_vars['symbol'] = new Smarty_variable($_smarty_tpl->tpl_vars['currency']->value->sign, null, 0);?>
                    		<?php } else { ?>
                    			<?php $_smarty_tpl->tpl_vars['priceReduction'] = new Smarty_variable((($_smarty_tpl->tpl_vars['product']->value['price_without_specific_price']-$_smarty_tpl->tpl_vars['product']->value['price_wt'])/$_smarty_tpl->tpl_vars['product']->value['price_without_specific_price'])*100*-1, null, 0);?>
                    			<?php $_smarty_tpl->tpl_vars['symbol'] = new Smarty_variable('%', null, 0);?>
                    		<?php }?>
						<?php } else { ?>
							<?php if (isset($_smarty_tpl->tpl_vars['product']->value['reduction_type'])&&$_smarty_tpl->tpl_vars['product']->value['reduction_type']=='amount') {?>
								<?php $_smarty_tpl->tpl_vars['priceReduction'] = new Smarty_variable(($_smarty_tpl->tpl_vars['product']->value['price']-$_smarty_tpl->tpl_vars['product']->value['price_without_specific_price']), null, 0);?>
								<?php $_smarty_tpl->tpl_vars['symbol'] = new Smarty_variable($_smarty_tpl->tpl_vars['currency']->value->sign, null, 0);?>
                    		<?php } else { ?>
                    			<?php $_smarty_tpl->tpl_vars['priceReduction'] = new Smarty_variable((($_smarty_tpl->tpl_vars['product']->value['price_without_specific_price']-$_smarty_tpl->tpl_vars['product']->value['price'])/$_smarty_tpl->tpl_vars['product']->value['price_without_specific_price'])*100*-1, null, 0);?>
                    			<?php $_smarty_tpl->tpl_vars['symbol'] = new Smarty_variable('%', null, 0);?>
                    		<?php }?>
						<?php }?>
						<?php if ($_smarty_tpl->tpl_vars['symbol']->value=='%') {?>
							&nbsp;<?php echo htmlspecialchars(sprintf("%d",round($_smarty_tpl->tpl_vars['priceReduction']->value)), ENT_QUOTES, 'UTF-8', true);?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['symbol']->value, ENT_QUOTES, 'UTF-8', true);?>
&nbsp;
						<?php } else { ?>
							&nbsp;<?php echo htmlspecialchars(sprintf("%.2f",$_smarty_tpl->tpl_vars['priceReduction']->value), ENT_QUOTES, 'UTF-8', true);?>
<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['symbol']->value, ENT_QUOTES, 'UTF-8', true);?>
&nbsp;
						<?php }?>
                    </span>
					<br/><span class="opc-old-price"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value['price_without_specific_price']),$_smarty_tpl);?>
</span>
				<?php }?>
			<?php }?>
		</span>
        </div>
	</td>
	<td class="opc-cart_quantity"<?php if (isset($_smarty_tpl->tpl_vars['customizedDatas']->value[$_smarty_tpl->tpl_vars['productId']->value][$_smarty_tpl->tpl_vars['productAttributeId']->value])&&$_smarty_tpl->tpl_vars['quantityDisplayed']->value==0) {?> style="text-align: center;"<?php }?>>
		<div class="mobile_table_title visible-phone"><?php echo smartyTranslate(array('s'=>'Qty','mod'=>'advancedcheckout'),$_smarty_tpl);?>
</div>
        <div class="mobile_table_content">
		<?php if (isset($_smarty_tpl->tpl_vars['cannotModify']->value)&&$_smarty_tpl->tpl_vars['cannotModify']->value==1) {?>
			<span style="float:left">
				<?php if ($_smarty_tpl->tpl_vars['quantityDisplayed']->value==0&&isset($_smarty_tpl->tpl_vars['customizedDatas']->value[$_smarty_tpl->tpl_vars['productId']->value][$_smarty_tpl->tpl_vars['productAttributeId']->value])) {?><?php echo count($_smarty_tpl->tpl_vars['customizedDatas']->value[$_smarty_tpl->tpl_vars['productId']->value][$_smarty_tpl->tpl_vars['productAttributeId']->value]);?>

				<?php } else { ?>
					<?php echo $_smarty_tpl->tpl_vars['product']->value['cart_quantity']-intval($_smarty_tpl->tpl_vars['quantityDisplayed']->value);?>

				<?php }?>
			</span>
		<?php } else { ?>
			<?php if (isset($_smarty_tpl->tpl_vars['customizedDatas']->value[$_smarty_tpl->tpl_vars['productId']->value][$_smarty_tpl->tpl_vars['productAttributeId']->value])&&$_smarty_tpl->tpl_vars['quantityDisplayed']->value==0) {?>
				<span id="cart_quantity_custom_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']);?>
_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_address_delivery']);?>
" ><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['customizationQuantityTotal'], ENT_QUOTES, 'UTF-8', true);?>
</span>
			<?php }?>
			<?php if (!isset($_smarty_tpl->tpl_vars['customizedDatas']->value[$_smarty_tpl->tpl_vars['productId']->value][$_smarty_tpl->tpl_vars['productAttributeId']->value])||$_smarty_tpl->tpl_vars['quantityDisplayed']->value>0) {?>

				<input type="hidden" value="<?php if ($_smarty_tpl->tpl_vars['quantityDisplayed']->value==0&&isset($_smarty_tpl->tpl_vars['customizedDatas']->value[$_smarty_tpl->tpl_vars['productId']->value][$_smarty_tpl->tpl_vars['productAttributeId']->value])) {?><?php echo count($_smarty_tpl->tpl_vars['customizedDatas']->value[$_smarty_tpl->tpl_vars['productId']->value][$_smarty_tpl->tpl_vars['productAttributeId']->value]);?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['product']->value['cart_quantity']-intval($_smarty_tpl->tpl_vars['quantityDisplayed']->value);?>
<?php }?>" name="quantity_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']);?>
_<?php if ($_smarty_tpl->tpl_vars['quantityDisplayed']->value>0) {?>nocustom<?php } else { ?>0<?php }?>_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_address_delivery']);?>
_hidden" />
				<input size="2" type="text" autocomplete="off" class="opc-cci cart_quantity_input form-control grey" value="<?php if ($_smarty_tpl->tpl_vars['quantityDisplayed']->value==0&&isset($_smarty_tpl->tpl_vars['customizedDatas']->value[$_smarty_tpl->tpl_vars['productId']->value][$_smarty_tpl->tpl_vars['productAttributeId']->value])) {?><?php echo count($_smarty_tpl->tpl_vars['customizedDatas']->value[$_smarty_tpl->tpl_vars['productId']->value][$_smarty_tpl->tpl_vars['productAttributeId']->value]);?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['product']->value['cart_quantity']-intval($_smarty_tpl->tpl_vars['quantityDisplayed']->value);?>
<?php }?>"  name="quantity_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']);?>
_<?php if ($_smarty_tpl->tpl_vars['quantityDisplayed']->value>0) {?>nocustom<?php } else { ?>0<?php }?>_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_address_delivery']);?>
" />
				<div class="opc-cart_quantity_button clearfix">
				<?php if ($_smarty_tpl->tpl_vars['product']->value['minimal_quantity']<($_smarty_tpl->tpl_vars['product']->value['cart_quantity']-$_smarty_tpl->tpl_vars['quantityDisplayed']->value)||$_smarty_tpl->tpl_vars['product']->value['minimal_quantity']<=1) {?>
					<a rel="nofollow" class="opc-cart_quantity_down opc-btn opc-btn-default opc-button-minus" id="cart_quantity_down_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']);?>
_<?php if ($_smarty_tpl->tpl_vars['quantityDisplayed']->value>0) {?>nocustom<?php } else { ?>0<?php }?>_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_address_delivery']);?>
" href="<?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
<?php $_tmp10=ob_get_clean();?><?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']);?>
<?php $_tmp11=ob_get_clean();?><?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_address_delivery']);?>
<?php $_tmp12=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('cart',true,null,"add=1&amp;id_product=".$_tmp10."&amp;ipa=".$_tmp11."&amp;id_address_delivery=".$_tmp12."&amp;op=down&amp;token=".((string)$_smarty_tpl->tpl_vars['token_cart']->value)), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Subtract','mod'=>'advancedcheckout'),$_smarty_tpl);?>
">
				<span><i class="fa fa-minus"></i></span>
				</a>
				<?php } else { ?>
					<a class="opc-cart_quantity_down opc-btn opc-btn-default opc-button-minus disabled" href="#" id="cart_quantity_down_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']);?>
_<?php if ($_smarty_tpl->tpl_vars['quantityDisplayed']->value>0) {?>nocustom<?php } else { ?>0<?php }?>_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_address_delivery']);?>
" title="<?php echo smartyTranslate(array('s'=>'You must purchase a minimum of %d of this product.','sprintf'=>$_smarty_tpl->tpl_vars['product']->value['minimal_quantity'],'mod'=>'advancedcheckout'),$_smarty_tpl);?>
">
					<span><i class="fa fa-minus"></i></span>
				</a>
				<?php }?>
                	<a rel="nofollow" class="opc-cart_quantity_up opc-btn opc-btn-default opc-button-plus" id="cart_quantity_up_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']);?>
_<?php if ($_smarty_tpl->tpl_vars['quantityDisplayed']->value>0) {?>nocustom<?php } else { ?>0<?php }?>_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_address_delivery']);?>
" href="<?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
<?php $_tmp13=ob_get_clean();?><?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']);?>
<?php $_tmp14=ob_get_clean();?><?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_address_delivery']);?>
<?php $_tmp15=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('cart',true,null,"add=1&amp;id_product=".$_tmp13."&amp;ipa=".$_tmp14."&amp;id_address_delivery=".$_tmp15."&amp;token=".((string)$_smarty_tpl->tpl_vars['token_cart']->value)), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Add','mod'=>'advancedcheckout'),$_smarty_tpl);?>
"><span><i class="fa fa-plus"></i></span></a>
				</div>
			<?php }?>
		<?php }?>
        </div>
	</td>
	<td class="cart_total">
		<div class="mobile_table_title visible-phone"><?php echo smartyTranslate(array('s'=>'Total','mod'=>'advancedcheckout'),$_smarty_tpl);?>
</div>
        <div class="mobile_table_content">
		<span class="price" id="total_product_price_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']);?>
<?php if ($_smarty_tpl->tpl_vars['quantityDisplayed']->value>0) {?>_nocustom<?php }?>_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_address_delivery']);?>
<?php if (!empty($_smarty_tpl->tpl_vars['product']->value['gift'])) {?>_gift<?php }?>">
			<?php if (!empty($_smarty_tpl->tpl_vars['product']->value['gift'])) {?>
				<span class="gift-icon"><?php echo smartyTranslate(array('s'=>'Gift!','mod'=>'advancedcheckout'),$_smarty_tpl);?>
</span>
			<?php } else { ?>
				<?php if ($_smarty_tpl->tpl_vars['quantityDisplayed']->value==0&&isset($_smarty_tpl->tpl_vars['customizedDatas']->value[$_smarty_tpl->tpl_vars['productId']->value][$_smarty_tpl->tpl_vars['productAttributeId']->value])) {?>
					<?php if (!$_smarty_tpl->tpl_vars['priceDisplay']->value) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['product']->value['total_customization_wt']),$_smarty_tpl);?>
<?php } else { ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['product']->value['total_customization']),$_smarty_tpl);?>
<?php }?>
				<?php } else { ?>
					<?php if (!$_smarty_tpl->tpl_vars['priceDisplay']->value) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['product']->value['total_wt']),$_smarty_tpl);?>
<?php } else { ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('price'=>$_smarty_tpl->tpl_vars['product']->value['total']),$_smarty_tpl);?>
<?php }?>
				<?php }?>
			<?php }?>
		</span>
        </div>
	</td>
	<?php if (!isset($_smarty_tpl->tpl_vars['noDeleteButton']->value)||!$_smarty_tpl->tpl_vars['noDeleteButton']->value) {?>
		<td class="cart_delete">
		<div class="mobile_table_title visible-phone"></div>
        <div class="mobile_table_content">
		<?php if ((!isset($_smarty_tpl->tpl_vars['customizedDatas']->value[$_smarty_tpl->tpl_vars['productId']->value][$_smarty_tpl->tpl_vars['productAttributeId']->value])||$_smarty_tpl->tpl_vars['quantityDisplayed']->value>0)&&empty($_smarty_tpl->tpl_vars['product']->value['gift'])) {?>
			<div>
				<a rel="nofollow" class="opc-cart_quantity_delete" id="<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']);?>
_<?php if ($_smarty_tpl->tpl_vars['quantityDisplayed']->value>0) {?>nocustom<?php } else { ?>0<?php }?>_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_address_delivery']);?>
" href="<?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
<?php $_tmp16=ob_get_clean();?><?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']);?>
<?php $_tmp17=ob_get_clean();?><?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_address_delivery']);?>
<?php $_tmp18=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('cart',true,null,"delete=1&amp;id_product=".$_tmp16."&amp;ipa=".$_tmp17."&amp;id_address_delivery=".$_tmp18."&amp;token=".((string)$_smarty_tpl->tpl_vars['token_cart']->value)), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Delete','mod'=>'advancedcheckout'),$_smarty_tpl);?>
"><i class="fa fa-trash"></i></a>
			</div>
		<?php }?>
        </div>
		</td>
	<?php }?>
</tr>
<?php }} ?>
