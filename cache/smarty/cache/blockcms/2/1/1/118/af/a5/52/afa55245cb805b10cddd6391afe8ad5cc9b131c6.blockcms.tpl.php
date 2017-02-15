<?php /*%%SmartyHeaderCode:71320838758125d739e9fd0-13721419%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'afa55245cb805b10cddd6391afe8ad5cc9b131c6' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo/themes/default-bootstrap/modules/blockcms/blockcms.tpl',
      1 => 1473152714,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '71320838758125d739e9fd0-13721419',
  'variables' => 
  array (
    'block' => 0,
    'cms_titles' => 0,
    'cms_key' => 0,
    'cms_title' => 0,
    'cms_page' => 0,
    'link' => 0,
    'show_price_drop' => 0,
    'PS_CATALOG_MODE' => 0,
    'show_new_products' => 0,
    'show_best_sales' => 0,
    'display_stores_footer' => 0,
    'show_contact' => 0,
    'contact_url' => 0,
    'cmslinks' => 0,
    'cmslink' => 0,
    'show_sitemap' => 0,
    'footer_text' => 0,
    'display_poweredby' => 0,
  ),
  'has_nocache_code' => true,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_58125d73a72032_85572027',
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58125d73a72032_85572027')) {function content_58125d73a72032_85572027($_smarty_tpl) {?>
	<!-- Block CMS module footer -->
	<section class="footer-block col-xs-12 col-sm-2" id="block_various_links_footer">
		<h4>Информация</h4>
		<ul class="toggle-footer">
							<li class="item">
					<a href="http://localhost/nemo/prices-drop" title="Скидки">
						Скидки
					</a>
				</li>
									<li class="item">
				<a href="http://localhost/nemo/new-products" title="Новые товары">
					Новые товары
				</a>
			</li>
										<li class="item">
					<a href="http://localhost/nemo/best-sales" title="Популярные товары">
						Популярные товары
					</a>
				</li>
										<li class="item">
					<a href="http://localhost/nemo/stores" title="Наш магазин">
						Наш магазин
					</a>
				</li>
									<li class="item">
				<a href="http://localhost/nemo/contact-us" title="Свяжитесь с нами">
					Свяжитесь с нами
				</a>
			</li>
															<li class="item">
						<a href="http://localhost/nemo/content/3-terms-and-conditions-of-use" title="Порядок и условия использования">
							Порядок и условия использования
						</a>
					</li>
																<li class="item">
						<a href="http://localhost/nemo/content/4-about-us" title="О компании">
							О компании
						</a>
					</li>
													<li>
				<a href="http://localhost/nemo/sitemap" title="Карта сайта">
					Карта сайта
				</a>
			</li>
					</ul>
		
	</section>
		<section class="bottom-footer col-xs-12">
		<div>
			<?php echo smartyTranslate(array('s'=>'[1] %3$s %2$s - Ecommerce software by %1$s [/1]','mod'=>'blockcms','sprintf'=>array('PrestaShop™',date('Y'),'©'),'tags'=>array('<a class="_blank" href="http://www.prestashop.com">')),$_smarty_tpl);?>

		</div>
	</section>
		<!-- /Block CMS module footer -->
<?php }} ?>
