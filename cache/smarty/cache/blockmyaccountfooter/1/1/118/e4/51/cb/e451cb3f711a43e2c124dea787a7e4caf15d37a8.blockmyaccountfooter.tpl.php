<?php /*%%SmartyHeaderCode:147143402258125d73a80ad7-39437957%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e451cb3f711a43e2c124dea787a7e4caf15d37a8' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo/themes/default-bootstrap/modules/blockmyaccountfooter/blockmyaccountfooter.tpl',
      1 => 1473152714,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '147143402258125d73a80ad7-39437957',
  'variables' => 
  array (
    'link' => 0,
    'returnAllowed' => 0,
    'voucherAllowed' => 0,
    'HOOK_BLOCK_MY_ACCOUNT' => 0,
    'is_logged' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_58125d73ac2018_62746306',
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58125d73ac2018_62746306')) {function content_58125d73ac2018_62746306($_smarty_tpl) {?>
<!-- Block myaccount module -->
<section class="footer-block col-xs-12 col-sm-4">
	<h4><a href="http://localhost/nemo/my-account" title="Управление моей учетной записью" rel="nofollow">Моя учетная запись</a></h4>
	<div class="block_content toggle-footer">
		<ul class="bullet">
			<li><a href="http://localhost/nemo/order-history" title="Мои заказы" rel="nofollow">Мои заказы</a></li>
						<li><a href="http://localhost/nemo/order-slip" title="Мои платёжные квитанции" rel="nofollow">Мои платёжные квитанции</a></li>
			<li><a href="http://localhost/nemo/addresses" title="Мои адреса" rel="nofollow">Мои адреса</a></li>
			<li><a href="http://localhost/nemo/identity" title="Управление моими персональными данными" rel="nofollow">Моя личная информация</a></li>
						
            		</ul>
	</div>
</section>
<!-- /Block myaccount module -->
<?php }} ?>
