<?php /* Smarty version Smarty-3.1.19, created on 2016-11-21 12:29:26
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/djvean13gen/views/templates/admin/djv_ean13_gen_stocks/genean13.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8491704755832944636b773-01672530%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ca2ea0fb6aa46efea65d7797263e223ad9023cb2' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/djvean13gen/views/templates/admin/djv_ean13_gen_stocks/genean13.tpl',
      1 => 1479709686,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8491704755832944636b773-01672530',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'token' => 0,
    'automaticInsertion' => 0,
    'ean13' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_583294463a3d95_39589064',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_583294463a3d95_39589064')) {function content_583294463a3d95_39589064($_smarty_tpl) {?>
<script type="text/javascript">		
; var link = 'index.php?controller=AdminDjvEan13GenStocks&token=<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['token']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
';
; var automaticInsertion = <?php echo $_smarty_tpl->tpl_vars['automaticInsertion']->value>0 ? 1 : intval(0);?>
;
</script> 

<div class="control-body">	
	<?php echo $_smarty_tpl->getSubTemplate ('./header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	
	<fieldset style="min-width: 850px; margin: 0 auto; width: 70%;">  		
		<?php if (($_smarty_tpl->tpl_vars['ean13']->value)) {?>
			<div class="widget-container" style="margin-top: 20px">
				<div id="djvs_stockBlock">
					<div class="stockLine" style="min-height:80px">	
						<div>			
							<div style="float: left; width: 80%">
								<label class="input-label searchLabel" style="text-align: left;width: 100%;">
									<?php echo smartyTranslate(array('s'=>'New EAN13:','mod'=>'djvean13gen'),$_smarty_tpl);?>
 
								</label>	
								<input type="text" style="width: 92%; font-size: 1.4em; font-weight: normal; " class="inputbox" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['ean13']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php }?>
		<h2><?php echo smartyTranslate(array('s'=>'ACTIONS','mod'=>'djvean13gen'),$_smarty_tpl);?>
</h2>
		<div class="widget-container" style="width: 280px;">			
			<div class="bluefoose-ui-button-light blue">
				<button id="djvs_genEan13Button" class="large-button elong-button" style="width: 275px;"><?php echo smartyTranslate(array('s'=>'Generate EAN13 code','mod'=>'djvean13gen'),$_smarty_tpl);?>
</button>
			</div>
			<div style="clear: both"></div>
			
			<div class="bluefoose-ui-button-light"  style="margin-top: 20px;">
				<button id="djvs_backButton" class="large-button elong-button"><?php echo smartyTranslate(array('s'=>'Back','mod'=>'djvean13gen'),$_smarty_tpl);?>
</button>
			</div>			
		</div>		
		
	</fieldset>
</div>	
	<?php }} ?>
