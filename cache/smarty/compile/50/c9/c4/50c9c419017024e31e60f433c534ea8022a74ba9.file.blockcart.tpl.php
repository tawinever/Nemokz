<?php /* Smarty version Smarty-3.1.19, created on 2016-11-20 19:18:42
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/themes/cover/modules/blockcart/blockcart.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5595361365831a2b2916f40-46855979%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '50c9c419017024e31e60f433c534ea8022a74ba9' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/themes/cover/modules/blockcart/blockcart.tpl',
      1 => 1478381946,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5595361365831a2b2916f40-46855979',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'blockcart_top' => 0,
    'PS_CATALOG_MODE' => 0,
    'order_process' => 0,
    'link' => 0,
    'cart_qties' => 0,
    'total' => 0,
    'priceDisplay' => 0,
    'blockcart_cart_flag' => 0,
    'cart' => 0,
    'ajax_allowed' => 0,
    'colapseExpandStatus' => 0,
    'active_overlay' => 0,
    'use_taxes' => 0,
    'display_tax_label' => 0,
    'show_tax' => 0,
    'show_wrapping' => 0,
    'shipping_cost_float' => 0,
    'shipping_cost' => 0,
    'tax_cost' => 0,
    'CUSTOMIZE_TEXTFIELD' => 0,
    'img_dir' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5831a2b2a91d93_55484015',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5831a2b2a91d93_55484015')) {function content_5831a2b2a91d93_55484015($_smarty_tpl) {?><?php if (!is_callable('smarty_function_counter')) include '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/tools/smarty/plugins/function.counter.php';
?>
<!-- MODULE Block cart -->
<?php if (isset($_smarty_tpl->tpl_vars['blockcart_top']->value)&&$_smarty_tpl->tpl_vars['blockcart_top']->value) {?>
<div class="col-sm-3 clearfix<?php if ($_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value) {?> header_user_catalog<?php }?>">
<?php }?>
	<div class="shopping_cart">
		<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink($_smarty_tpl->tpl_vars['order_process']->value,true), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'View my shopping cart','mod'=>'blockcart'),$_smarty_tpl);?>
" rel="nofollow">
			<span class="ajax_cart_quantity<?php if ($_smarty_tpl->tpl_vars['cart_qties']->value==0) {?> unvisible<?php }?>"><?php echo $_smarty_tpl->tpl_vars['cart_qties']->value;?>
</span>
			<span class="ajax_cart_product_txt<?php if ($_smarty_tpl->tpl_vars['cart_qties']->value!=1) {?> unvisible<?php }?>"><?php echo smartyTranslate(array('s'=>'Product','mod'=>'blockcart'),$_smarty_tpl);?>
 (<span class="ajax_block_cart_total"><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</span>) </span>
			<span class="ajax_cart_product_txt_s<?php if ($_smarty_tpl->tpl_vars['cart_qties']->value<2) {?> unvisible<?php }?>">товара  (<span class="ajax_block_cart_total"><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</span>)</span>
			<span class="ajax_cart_total<?php if ($_smarty_tpl->tpl_vars['cart_qties']->value==0) {?> unvisible<?php }?>">
				<?php if ($_smarty_tpl->tpl_vars['cart_qties']->value>0) {?>
					<?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value==1) {?>
						<?php $_smarty_tpl->tpl_vars['blockcart_cart_flag'] = new Smarty_variable(constant('Cart::BOTH_WITHOUT_SHIPPING'), null, 0);?>
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['cart']->value->getOrderTotal(false,$_smarty_tpl->tpl_vars['blockcart_cart_flag']->value)),$_smarty_tpl);?>

					<?php } else { ?>
						<?php $_smarty_tpl->tpl_vars['blockcart_cart_flag'] = new Smarty_variable(constant('Cart::BOTH_WITHOUT_SHIPPING'), null, 0);?>
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['cart']->value->getOrderTotal(true,$_smarty_tpl->tpl_vars['blockcart_cart_flag']->value)),$_smarty_tpl);?>

					<?php }?>
				<?php }?>
			</span>
			<span class="ajax_cart_no_product<?php if ($_smarty_tpl->tpl_vars['cart_qties']->value>0) {?> unvisible<?php }?>">КОРЗИНА ПУСТА</span>
			<?php if ($_smarty_tpl->tpl_vars['ajax_allowed']->value&&isset($_smarty_tpl->tpl_vars['blockcart_top']->value)&&!$_smarty_tpl->tpl_vars['blockcart_top']->value) {?>
				<span class="block_cart_expand<?php if (!isset($_smarty_tpl->tpl_vars['colapseExpandStatus']->value)||(isset($_smarty_tpl->tpl_vars['colapseExpandStatus']->value)&&$_smarty_tpl->tpl_vars['colapseExpandStatus']->value=='expanded')) {?> unvisible<?php }?>">&nbsp;</span>
				<span class="block_cart_collapse<?php if (isset($_smarty_tpl->tpl_vars['colapseExpandStatus']->value)&&$_smarty_tpl->tpl_vars['colapseExpandStatus']->value=='collapsed') {?> unvisible<?php }?>">&nbsp;</span>
			<?php }?>
		</a>

	</div>
<?php if (isset($_smarty_tpl->tpl_vars['blockcart_top']->value)&&$_smarty_tpl->tpl_vars['blockcart_top']->value) {?>
</div>
<?php }?>
<?php echo smarty_function_counter(array('name'=>'active_overlay','assign'=>'active_overlay'),$_smarty_tpl);?>

<?php if (!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value&&$_smarty_tpl->tpl_vars['active_overlay']->value==1) {?>
	<div id="layer_cart">
		<div class="clearfix">
			<div class="layer_cart_product col-xs-12 col-md-6">
				<span class="cross" title="<?php echo smartyTranslate(array('s'=>'Close window','mod'=>'blockcart'),$_smarty_tpl);?>
"></span>
				<span class="title">
					<i class="icon-check"></i><?php echo smartyTranslate(array('s'=>'Product successfully added to your shopping cart','mod'=>'blockcart'),$_smarty_tpl);?>

				</span>
				<div class="product-image-container layer_cart_img">
				</div>
				<div class="layer_cart_product_info">
					<span id="layer_cart_product_title" class="product-name"></span>
					<span id="layer_cart_product_attributes"></span>
					<div>
						<strong class="dark"><?php echo smartyTranslate(array('s'=>'Quantity','mod'=>'blockcart'),$_smarty_tpl);?>
</strong>
						<span id="layer_cart_product_quantity"></span>
					</div>
					<div>
						<strong class="dark"><?php echo smartyTranslate(array('s'=>'Total','mod'=>'blockcart'),$_smarty_tpl);?>
</strong>
						<span id="layer_cart_product_price"></span>
					</div>
				</div>
			</div>
			<div class="layer_cart_cart col-xs-12 col-md-6">
				<span class="title">
					<!-- Plural Case [both cases are needed because page may be updated in Javascript] -->
					<span class="ajax_cart_product_txt_s <?php if ($_smarty_tpl->tpl_vars['cart_qties']->value<2) {?> unvisible<?php }?>">
						<?php echo smartyTranslate(array('s'=>'There are [1]%d[/1] items in your cart.','mod'=>'blockcart','sprintf'=>array($_smarty_tpl->tpl_vars['cart_qties']->value),'tags'=>array('<span class="ajax_cart_quantity">')),$_smarty_tpl);?>

					</span>
					<!-- Singular Case [both cases are needed because page may be updated in Javascript] -->
					<span class="ajax_cart_product_txt <?php if ($_smarty_tpl->tpl_vars['cart_qties']->value>1) {?> unvisible<?php }?>">
						<?php echo smartyTranslate(array('s'=>'There is 1 item in your cart.','mod'=>'blockcart'),$_smarty_tpl);?>

					</span>
				</span>
				<div class="layer_cart_row">
					<strong class="dark">
						<?php echo smartyTranslate(array('s'=>'Total products','mod'=>'blockcart'),$_smarty_tpl);?>

						<?php if ($_smarty_tpl->tpl_vars['use_taxes']->value&&$_smarty_tpl->tpl_vars['display_tax_label']->value&&$_smarty_tpl->tpl_vars['show_tax']->value) {?>
							<?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value==1) {?>
								<?php echo smartyTranslate(array('s'=>'(tax excl.)','mod'=>'blockcart'),$_smarty_tpl);?>

							<?php } else { ?>
								<?php echo smartyTranslate(array('s'=>'(tax incl.)','mod'=>'blockcart'),$_smarty_tpl);?>

							<?php }?>
						<?php }?>
					</strong>
					<span class="ajax_block_products_total">
						<?php if ($_smarty_tpl->tpl_vars['cart_qties']->value>0) {?>
							<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['cart']->value->getOrderTotal(false,Cart::ONLY_PRODUCTS)),$_smarty_tpl);?>

						<?php }?>
					</span>
				</div>

				<?php if ($_smarty_tpl->tpl_vars['show_wrapping']->value) {?>
					<div class="layer_cart_row">
						<strong class="dark">
							<?php echo smartyTranslate(array('s'=>'Wrapping','mod'=>'blockcart'),$_smarty_tpl);?>

							<?php if ($_smarty_tpl->tpl_vars['use_taxes']->value&&$_smarty_tpl->tpl_vars['display_tax_label']->value&&$_smarty_tpl->tpl_vars['show_tax']->value) {?>
								<?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value==1) {?>
									<?php echo smartyTranslate(array('s'=>'(tax excl.)','mod'=>'blockcart'),$_smarty_tpl);?>

								<?php } else { ?>
									<?php echo smartyTranslate(array('s'=>'(tax incl.)','mod'=>'blockcart'),$_smarty_tpl);?>

								<?php }?>
							<?php }?>
						</strong>
						<span class="price cart_block_wrapping_cost">
							<?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value==1) {?>
								<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['cart']->value->getOrderTotal(false,Cart::ONLY_WRAPPING)),$_smarty_tpl);?>

							<?php } else { ?>
								<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['cart']->value->getOrderTotal(true,Cart::ONLY_WRAPPING)),$_smarty_tpl);?>

							<?php }?>
						</span>
					</div>
				<?php }?>
				<div class="layer_cart_row">
					<strong class="dark<?php if ($_smarty_tpl->tpl_vars['shipping_cost_float']->value==0&&(!$_smarty_tpl->tpl_vars['cart_qties']->value||$_smarty_tpl->tpl_vars['cart']->value->isVirtualCart()||!isset($_smarty_tpl->tpl_vars['cart']->value->id_address_delivery)||!$_smarty_tpl->tpl_vars['cart']->value->id_address_delivery)) {?> unvisible<?php }?>">
						<?php echo smartyTranslate(array('s'=>'Total shipping','mod'=>'blockcart'),$_smarty_tpl);?>
&nbsp;<?php if ($_smarty_tpl->tpl_vars['use_taxes']->value&&$_smarty_tpl->tpl_vars['display_tax_label']->value&&$_smarty_tpl->tpl_vars['show_tax']->value) {?><?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value==1) {?><?php echo smartyTranslate(array('s'=>'(tax excl.)','mod'=>'blockcart'),$_smarty_tpl);?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'(tax incl.)','mod'=>'blockcart'),$_smarty_tpl);?>
<?php }?><?php }?>
					</strong>
					<span class="ajax_cart_shipping_cost<?php if ($_smarty_tpl->tpl_vars['shipping_cost_float']->value==0&&(!$_smarty_tpl->tpl_vars['cart_qties']->value||$_smarty_tpl->tpl_vars['cart']->value->isVirtualCart()||!isset($_smarty_tpl->tpl_vars['cart']->value->id_address_delivery)||!$_smarty_tpl->tpl_vars['cart']->value->id_address_delivery)) {?> unvisible<?php }?>">
						<?php if ($_smarty_tpl->tpl_vars['shipping_cost_float']->value==0) {?>
							 <?php if ((!isset($_smarty_tpl->tpl_vars['cart']->value->id_address_delivery)||!$_smarty_tpl->tpl_vars['cart']->value->id_address_delivery)) {?><?php echo smartyTranslate(array('s'=>'To be determined','mod'=>'blockcart'),$_smarty_tpl);?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Free shipping!','mod'=>'blockcart'),$_smarty_tpl);?>
<?php }?>
						<?php } else { ?>
							<?php echo $_smarty_tpl->tpl_vars['shipping_cost']->value;?>

						<?php }?>
					</span>
				</div>
				<?php if ($_smarty_tpl->tpl_vars['show_tax']->value&&isset($_smarty_tpl->tpl_vars['tax_cost']->value)) {?>
					<div class="layer_cart_row">
						<strong class="dark"><?php echo smartyTranslate(array('s'=>'Tax','mod'=>'blockcart'),$_smarty_tpl);?>
</strong>
						<span class="price cart_block_tax_cost ajax_cart_tax_cost"><?php echo $_smarty_tpl->tpl_vars['tax_cost']->value;?>
</span>
					</div>
				<?php }?>
				<div class="layer_cart_row">
					<strong class="dark">
						<?php echo smartyTranslate(array('s'=>'Total','mod'=>'blockcart'),$_smarty_tpl);?>

						<?php if ($_smarty_tpl->tpl_vars['use_taxes']->value&&$_smarty_tpl->tpl_vars['display_tax_label']->value&&$_smarty_tpl->tpl_vars['show_tax']->value) {?>
							<?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value==1) {?>
								<?php echo smartyTranslate(array('s'=>'(tax excl.)','mod'=>'blockcart'),$_smarty_tpl);?>

							<?php } else { ?>
								<?php echo smartyTranslate(array('s'=>'(tax incl.)','mod'=>'blockcart'),$_smarty_tpl);?>

							<?php }?>
						<?php }?>
					</strong>
					<span class="ajax_block_cart_total">
						<?php if ($_smarty_tpl->tpl_vars['cart_qties']->value>0) {?>
							<?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value==1) {?>
								<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['cart']->value->getOrderTotal(false)),$_smarty_tpl);?>

							<?php } else { ?>
								<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['cart']->value->getOrderTotal(true)),$_smarty_tpl);?>

							<?php }?>
						<?php }?>
					</span>
				</div>
				<div class="button-container">
					<span class="continue btn btn-default button exclusive-medium" title="<?php echo smartyTranslate(array('s'=>'Continue shopping','mod'=>'blockcart'),$_smarty_tpl);?>
">
						<span>
							<i class="icon-chevron-left left"></i><?php echo smartyTranslate(array('s'=>'Continue shopping','mod'=>'blockcart'),$_smarty_tpl);?>

						</span>
					</span>
					<a class="btn btn-default button button-medium"	href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink(((string)$_smarty_tpl->tpl_vars['order_process']->value),true), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Proceed to checkout','mod'=>'blockcart'),$_smarty_tpl);?>
" rel="nofollow">
						<span>
							<?php echo smartyTranslate(array('s'=>'Proceed to checkout','mod'=>'blockcart'),$_smarty_tpl);?>
<i class="icon-chevron-right right"></i>
						</span>
					</a>
				</div>
			</div>
		</div>
		<div class="crossseling"></div>
	</div> <!-- #layer_cart -->
	<div class="layer_cart_overlay"></div>
<?php }?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('CUSTOMIZE_TEXTFIELD'=>$_smarty_tpl->tpl_vars['CUSTOMIZE_TEXTFIELD']->value),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('img_dir'=>preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['img_dir']->value)),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('generated_date'=>intval(time())),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('ajax_allowed'=>$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['boolval'][0][0]->boolval($_smarty_tpl->tpl_vars['ajax_allowed']->value)),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('hasDeliveryAddress'=>(isset($_smarty_tpl->tpl_vars['cart']->value->id_address_delivery)&&$_smarty_tpl->tpl_vars['cart']->value->id_address_delivery)),$_smarty_tpl);?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'customizationIdMessage')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'customizationIdMessage'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'Customization #','mod'=>'blockcart','js'=>1),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'customizationIdMessage'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'removingLinkText')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'removingLinkText'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'remove this product from my cart','mod'=>'blockcart','js'=>1),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'removingLinkText'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'freeShippingTranslation')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'freeShippingTranslation'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'Free shipping!','mod'=>'blockcart','js'=>1),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'freeShippingTranslation'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'freeProductTranslation')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'freeProductTranslation'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'Free!','mod'=>'blockcart','js'=>1),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'freeProductTranslation'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'delete_txt')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'delete_txt'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'Delete','mod'=>'blockcart','js'=>1),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'delete_txt'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'toBeDetermined')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'toBeDetermined'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'To be determined','mod'=>'blockcart','js'=>1),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'toBeDetermined'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<!-- /MODULE Block cart -->
<?php }} ?>
