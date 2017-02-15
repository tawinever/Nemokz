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
		<h2>{l s='PRODUCTS' mod='djvean13gen'}</h2>
		<div class="widget-container">
			<div id="djvs_stockBlock">
				<div class="stockLine" style="min-height:80px">	
					<div>			
						<div style="float: left; width: 80%">
							<label class="input-label searchLabel" style="text-align: left;width: 100%;">
								{l s='Search a product by EAN13:' mod='djvean13gen'} 
							</label>	
							<input autocomplete="off" type="text" style="width: 92%; font-size: 1.4em; font-weight: normal; " class="inputbox searchInput" />
						</div>
						<div style="float: left; width: 7%; min-width: 50px;">
							<label class="input-label quantityLabel" style="text-align:left;width: 100%;">
							{l s='Quantity' mod='djvean13gen'}
							</label>	
							<input type="text" value="1" style="width: 92%; text-align: right; font-weight: normal; font-size: 1.4em" class="inputbox quantityInput" />
						</div>						
						<div style="float: left; width: 10%; min-width: 50px; margin-left: 10px; text-align: center;">
							<label class="input-label" style="text-align:center; margin-bottom: 15px;width: 100%;">
								{l s='Remove' mod='djvean13gen'}
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
					<button id="djvs_addLineButton" class="big-button">{l s='Show more rows' mod='djvean13gen'}</button>	
				</div>
			</div>
		</div>		
		<h2>{l s='ACTIONS' mod='djvean13gen'}</h2>
		<div class="widget-container" style="width: 400px;">						
			<div class="bluefoose-ui-button-light blue" >
				<button id="djvs_sendButton" class="large-button elong-button">{l s='Generate labels' mod='djvean13gen'}</button>
			</div>
			<div style="clear: both"></div>
			<div class="bluefoose-ui-button-light blue" style="margin-top: 20px;">
				<button id="djvs_genEan13Button" class="large-button elong-button" style="width: 275px;">{l s='Generate EAN13 code' mod='djvean13gen'}</button>
			</div>
            <div style="clear: both"></div>
			<div class="bluefoose-ui-button-light blue" style="margin-top: 20px;">
				<button id="djvs_populateEan13Button" class="large-button elong-button" style="width: 375px;">
                    {l s='Generate automatically EAN13 codes for every product' mod='djvean13gen'}
                </button>
			</div>
		</div>		
		
	</fieldset>
</div>	
	