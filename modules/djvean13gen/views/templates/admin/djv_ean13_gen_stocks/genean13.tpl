{*
* 2014 Dejavu Arts S.L.
*
* NOTICE OF LICENSE
*
* This source file is subject to the copyright.
*
* DISCLAIMER
*
* Do not edit or add to this file.
*
* @author    Dejavu Arts S.L. <desarrollo@dejavu.es>
* @site www.dejavu.es
* @copyright Copyright (c) 2014 Dejavu Arts S.L.
*   @license   Copyright. All Rights Reserved
*}
<script type="text/javascript">		
; var link = 'index.php?controller=AdminDjvEan13GenStocks&token={$token|escape:'htmlall':'UTF-8'}';
; var automaticInsertion = {($automaticInsertion>0)?1:0|intval};
</script> 

<div class="control-body">	
	{include './header.tpl'}
	
	<fieldset style="min-width: 850px; margin: 0 auto; width: 70%;">  		
		{if ($ean13)}
			<div class="widget-container" style="margin-top: 20px">
				<div id="djvs_stockBlock">
					<div class="stockLine" style="min-height:80px">	
						<div>			
							<div style="float: left; width: 80%">
								<label class="input-label searchLabel" style="text-align: left;width: 100%;">
									{l s='New EAN13:' mod='djvean13gen'} 
								</label>	
								<input type="text" style="width: 92%; font-size: 1.4em; font-weight: normal; " class="inputbox" value="{$ean13|escape:'htmlall':'UTF-8'}" />
							</div>
						</div>
					</div>
				</div>
			</div>
		{/if}
		<h2>{l s='ACTIONS' mod='djvean13gen'}</h2>
		<div class="widget-container" style="width: 280px;">			
			<div class="bluefoose-ui-button-light blue">
				<button id="djvs_genEan13Button" class="large-button elong-button" style="width: 275px;">{l s='Generate EAN13 code' mod='djvean13gen'}</button>
			</div>
			<div style="clear: both"></div>
			
			<div class="bluefoose-ui-button-light"  style="margin-top: 20px;">
				<button id="djvs_backButton" class="large-button elong-button">{l s='Back' mod='djvean13gen'}</button>
			</div>			
		</div>		
		
	</fieldset>
</div>	
	