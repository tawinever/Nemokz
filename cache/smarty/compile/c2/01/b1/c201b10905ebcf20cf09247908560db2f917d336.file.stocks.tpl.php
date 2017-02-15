<?php /* Smarty version Smarty-3.1.19, created on 2016-11-21 12:45:50
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/djvean13gen/views/templates/admin/djv_ean13_gen_stocks/stocks.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11839302875832940d6262a6-62212212%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c201b10905ebcf20cf09247908560db2f917d336' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/djvean13gen/views/templates/admin/djv_ean13_gen_stocks/stocks.tpl',
      1 => 1479710738,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11839302875832940d6262a6-62212212',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5832940d65f210_18181895',
  'variables' => 
  array (
    'token' => 0,
    'automaticInsertion' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5832940d65f210_18181895')) {function content_5832940d65f210_18181895($_smarty_tpl) {?>
<script type="text/javascript">		
; var link = 'index.php?controller=AdminDjvEan13GenStocks&token=<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['token']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
';
; var automaticInsertion = <?php echo $_smarty_tpl->tpl_vars['automaticInsertion']->value>0 ? 1 : intval(0);?>
;
</script> 

<div class="control-body">
	<?php echo $_smarty_tpl->getSubTemplate ('./header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	
	<fieldset style="min-width: 850px; margin: 0 auto; width: 70%;">  
		<h2><?php echo smartyTranslate(array('s'=>'PRODUCTS','mod'=>'djvean13gen'),$_smarty_tpl);?>
</h2>
		<div class="widget-container">
			<div id="djvs_stockBlock">
				<div class="stockLine" style="min-height:80px">	
					<div>			
						<div style="float: left; width: 80%">
							<label class="input-label searchLabel" style="text-align: left;width: 100%;">
								<?php echo smartyTranslate(array('s'=>'Search a product by EAN13:','mod'=>'djvean13gen'),$_smarty_tpl);?>
 
							</label>	
							<input autocomplete="off" type="text" style="width: 92%; font-size: 1.4em; font-weight: normal; " class="inputbox searchInput" />
						</div>
						<div style="float: left; width: 7%; min-width: 50px;">
							<label class="input-label quantityLabel" style="text-align:left;width: 100%;">
							<?php echo smartyTranslate(array('s'=>'Quantity','mod'=>'djvean13gen'),$_smarty_tpl);?>

							</label>	
							<input type="text" value="1" style="width: 92%; text-align: right; font-weight: normal; font-size: 1.4em" class="inputbox quantityInput" />
						</div>						
						<div style="float: left; width: 10%; min-width: 50px; margin-left: 10px; text-align: center;">
							<label class="input-label" style="text-align:center; margin-bottom: 15px;width: 100%;">
								<?php echo smartyTranslate(array('s'=>'Remove','mod'=>'djvean13gen'),$_smarty_tpl);?>

							</label>
							<div class="bluefoose-ui-button-light icon-button">
								<button class="djvs_removeLineButton">x</button>		
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="clear" style="margin-top: 20px">
				<div class="bluefoose-ui-button-light">
					<button id="djvs_addLineButton" class="big-button"><?php echo smartyTranslate(array('s'=>'Show more rows','mod'=>'djvean13gen'),$_smarty_tpl);?>
</button>	
				</div>
			</div>
		</div>		
		<h2><?php echo smartyTranslate(array('s'=>'ACTIONS','mod'=>'djvean13gen'),$_smarty_tpl);?>
</h2>
		<div class="widget-container" style="width: 400px;">						
			<div class="bluefoose-ui-button-light blue" >
				<button id="djvs_sendButton" class="large-button elong-button"><?php echo smartyTranslate(array('s'=>'Generate labels','mod'=>'djvean13gen'),$_smarty_tpl);?>
</button>
			</div>
			<div style="clear: both"></div>
			<div class="bluefoose-ui-button-light blue" style="margin-top: 20px;">
				<button id="djvs_genEan13Button" class="large-button elong-button" style="width: 275px;"><?php echo smartyTranslate(array('s'=>'Generate EAN13 code','mod'=>'djvean13gen'),$_smarty_tpl);?>
</button>
			</div>
            <div style="clear: both"></div>
			<div class="bluefoose-ui-button-light blue" style="margin-top: 20px;">
				<button id="djvs_populateEan13Button" class="large-button elong-button" style="width: 375px;">
                    <?php echo smartyTranslate(array('s'=>'Generate automatically EAN13 codes for every product','mod'=>'djvean13gen'),$_smarty_tpl);?>

                </button>
			</div>
		</div>		
		
	</fieldset>
</div>	
	<?php }} ?>
