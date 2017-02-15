/**
* Module is prohibited to sales! Violation of this condition leads to the deprivation of the license!
*
* @category  Front Office Features
* @package   Advanced Checkout Module
* @author    Maxim Bespechalnih <2343319@gmail.com>
* @copyright 2013-2015 Max
* @license   license.txt in the module folder.
*/

$(document).ready(function()
{
	$('.opc-cart_quantity_up').unbind('click').live('click', function(){
		upQuantity($(this).attr('id').replace('cart_quantity_up_', ''));
		return false;
	});
	$('.opc-cart_quantity_down').unbind('click').live('click', function(){
		downQuantity($(this).attr('id').replace('cart_quantity_down_', '')); 
		return false;
	});
	$('.opc-cart_quantity_delete' ).unbind('click').live('click', function(){
		deleteProductFromSummary($(this).attr('id'));
		return false;
	});
});

function updateQty(val, cart, el)
{
	var prefix = ""
	if (typeof(cart) == 'undefined' || cart)
		prefix = '#order-detail-content ';
	else
		prefix = '#fancybox-content ';

	var id = $(el).attr('name');

	var exp = new RegExp("^[0-9]+$");

	if (exp.test(val) == true)
	{
		prefix = '.opc-cart_quantity ';
		var hidden = $(prefix + 'input[name=' + id + '_hidden]').val();
		var input = $(prefix + 'input[name=' + id + ']').val();
		var QtyToUp = parseInt(input) - parseInt(hidden);
		if (parseInt(QtyToUp) > 0){
			upQuantity(id.replace('quantity_', ''), QtyToUp);
		}else if(parseInt(QtyToUp) < 0){
			downQuantity(id.replace('quantity_', ''), QtyToUp);
		}
	}
	else
		$(prefix + 'input[name=' + id + ']').val($(prefix + 'input[name=' + id + '_hidden]').val());
	
	if (typeof(getCarrierListAndUpdate) !== 'undefined')
		getCarrierListAndUpdate();
}

function deleteProductFromSummary(id)
{
	$('#opc-right-summary-content #opc-page-loader').fadeIn();
	var customizationId = 0;
	var productId = 0;
	var productAttributeId = 0;
	var id_address_delivery = 0;
	var ids = 0;
	ids = id.split('_');
	productId = parseInt(ids[0]);
	if (typeof(ids[1]) !== 'undefined')
		productAttributeId = parseInt(ids[1]);
	if (typeof(ids[2]) !== 'undefined' && ids[2] !== 'nocustom')
		customizationId = parseInt(ids[2]);
	if (typeof(ids[3]) !== 'undefined')
		id_address_delivery = parseInt(ids[3]);
	$.ajax({
		type: 'POST',
		headers: { "cache-control": "no-cache" },
		url: baseUri + '?rand=' + new Date().getTime(),
		async: true,
		cache: false,
		dataType: 'json',
		data: 'controller=cart'
			+ '&ajax=true&delete=true&summary=true'
			+ '&id_product='+productId
			+ '&ipa='+productAttributeId
			+ '&id_address_delivery='+id_address_delivery 
			+ ((customizationId !== 0) ? '&id_customization=' + customizationId : '')
			+ '&token=' + static_token
			+ '&allow_refresh=1',
		success: function(jsonData)
		{			
			if (jsonData.hasError)
			{
				var errors = '';
				for(var error in jsonData.errors)
				//IE6 bug fix
				if (error !== 'indexOf')
					errors += jsonData.errors[error] + "\n";
			}
			else
			{
				redalert(jsonData);
				if (parseInt(jsonData.summary.products.length) == 0)
				{
					if (typeof(orderProcess) == 'undefined' || orderProcess !== 'order-opc')
						document.location.href = document.location.href; // redirection
					else
					{
						$('#orderform').fadeOut().remove();
						$('#center_column').children().each(function() {
							if ($(this).attr('id') !== 'empcart' && $(this).attr('class') !== 'breadcrumb' && $(this).attr('id') !== 'cart_title')
							{
								$(this).fadeOut('slow', function () {
									$(this).remove();
								});
							}
						});
						$('#summary_products_label').remove();
						$('#empcart').fadeIn('slow');
						goToByScroll('.breadcrumb');
						ajaxCart.refresh();
						return false;
					}
				}
				else
				{
					$('#product_' + id).fadeOut('slow', function() {
						$(this).remove();
						// cleanSelectAddressDelivery();
						if (!customizationId)
							refreshOddRow();
					});
					var exist = false;
					for (i=0;i<jsonData.summary.products.length;i++)
					{
						if (jsonData.summary.products[i].id_product == productId
							&& jsonData.summary.products[i].id_product_attribute == productAttributeId
							&& jsonData.summary.products[i].id_address_delivery == id_address_delivery
							&& (parseInt(jsonData.summary.products[i].customization_quantity) > 0))
								exist = true;
					}
					// if all customization removed => delete product line
					if (!exist && customizationId)
						$('#product_' + productId + '_' + productAttributeId + '_0_' + id_address_delivery).fadeOut('slow', function() {
							$(this).remove();
							var line = $('#product_' + productId + '_' + productAttributeId + '_nocustom_' + id_address_delivery);
							if (line.length > 0)
					
					{
								line.find('input[name^=quantity_], .cart_quantity_down, .cart_quantity_up, .cart_quantity_delete').each(function(){
									if (typeof($(this).attr('name')) != 'undefined')
										$(this).attr('name', $(this).attr('name').replace(/nocustom/, '0'));
									if (typeof($(this).attr('id')) != 'undefined')
										$(this).attr('id', $(this).attr('id').replace(/nocustom/, '0'));
								});
								line.find('span[id^=total_product_price_]').each(function(){
									$(this).attr('id', $(this).attr('id').replace(/_nocustom/, ''));
								});
								line.attr('id', line.attr('id').replace(/nocustom/, '0'));
							}
							refreshOddRow();
						});
				}
				updateCartSummary(jsonData.summary);
				if (window.ajaxCart != undefined)
					ajaxCart.updateCart(jsonData);
				updateCustomizedDatas(jsonData.customizedDatas);
				updateHookShoppingCart(jsonData.HOOK_SHOPPING_CART);
				updateHookShoppingCartExtra(jsonData.HOOK_SHOPPING_CART_EXTRA);
				if (typeof(getCarrierListAndUpdate) !== 'undefined' && jsonData.summary.products.length > 0)
					getCarrierListAndUpdate();
				if (typeof(updatePaymentMethodsDisplay) !== 'undefined')
					updatePaymentMethodsDisplay();
			}
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
			if (textStatus !== 'abort')
				alert("TECHNICAL ERROR: unable to save update quantity \n\nDetails:\nError thrown: " + XMLHttpRequest + "\n" + 'Text status: ' + textStatus);
		}
	});
}

function refreshOddRow()
{
	var odd_class = 'odd';
	var even_class = 'even';
	$.each($('.cart_item'), function(i, it)
	{
		if (i == 0) // First item
		{
			if ($(this).hasClass('even'))
			{
				odd_class = 'even';
				even_class = 'odd';
			}
			$(this).addClass('first_item');
		}
		if(i % 2)
			$(this).removeClass(odd_class).addClass(even_class);
		else
			$(this).removeClass(even_class).addClass(odd_class);
	});
	$('.cart_item:last-child, .customization:last-child').addClass('last_item');
}

function redalert(jsonData){
	$('.cart_item td').css('background-color', 'none');
	$('#cart_errors').html('');
	$('.err_isset').val(jsonData.adv.err_isset);
	if(jsonData.adv.err_isset){
		$('#cart_errors').html(jsonData.adv.err);
		$.each(jsonData.adv.arr, function(){
			var elem = this;
			$('.cart_item').each(function(){
				var id = $(this).attr('id');
				if (strpos(id, 'product_' + elem.id_product + '_' + elem.id_product_attribute) !== false){
					$(this).find('td').css('background-color', '#e46f61');
				}
			});
		});
	}
}

function upQuantity(id, qty)
{
	$('#opc-right-summary-content #opc-page-loader').fadeIn();
	if (typeof(qty) == 'undefined' || !qty)
		qty = 1;
	var customizationId = 0;
	var productId = 0;
	var productAttributeId = 0;
	var id_address_delivery = 0;
	var ids = 0;
	ids = id.split('_');
	productId = parseInt(ids[0]);
	if (typeof(ids[1]) !== 'undefined')
		productAttributeId = parseInt(ids[1]);
	if (typeof(ids[2]) !== 'undefined' && ids[2] !== 'nocustom')
		customizationId = parseInt(ids[2]);
	if (typeof(ids[3]) !== 'undefined')
		id_address_delivery = parseInt(ids[3]);

	$.ajax({
		type: 'POST',
		headers: { "cache-control": "no-cache" },
		url: baseUri + '?rand=' + new Date().getTime(),
		async: true,
		cache: false,
		dataType: 'json',
		data: 'controller=cart'
			+ '&ajax=true'
			+ '&add=true'
			+ '&getproductprice=true'
			+ '&summary=true'
			+ '&id_product=' + productId
			+ '&ipa=' + productAttributeId
			+ '&id_address_delivery=' + id_address_delivery
			+ ((customizationId !== 0) ? '&id_customization=' + customizationId : '')
			+ '&qty=' + qty
			+ '&token=' + static_token
			+ '&allow_refresh=1',
		success: function(jsonData)
		{
			if (jsonData.hasError)
			{
				var errors = '';
				for(var error in jsonData.errors)
					//IE6 bug fix
					if(error !== 'indexOf')
						errors += $('<div />').html(jsonData.errors[error]).text() + "\n";
				alert(errors);
				$('input[name=quantity_'+ id +']').val($('input[name=quantity_'+ id +'_hidden]').val());
				$('#opc-right-summary-content').find('#opc-page-loader').fadeOut();
			}
			else
			{
				redalert(jsonData);
				updateCartSummary(jsonData.summary);
				if (window.ajaxCart != undefined)
					ajaxCart.updateCart(jsonData);
				if (customizationId !== 0)
					updateCustomizedDatas(jsonData.customizedDatas);
				updateHookShoppingCart(jsonData.HOOK_SHOPPING_CART);
				updateHookShoppingCartExtra(jsonData.HOOK_SHOPPING_CART_EXTRA);
				if (typeof(getCarrierListAndUpdate) !== 'undefined')
					getCarrierListAndUpdate();
				if (typeof(updatePaymentMethodsDisplay) !== 'undefined')
					updatePaymentMethodsDisplay();					
			}
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
			if (textStatus !== 'abort')
				alert("TECHNICAL ERROR: unable to save update quantity \n\nDetails:\nError thrown: " + XMLHttpRequest + "\n" + 'Text status: ' + textStatus);
		}
	});
}

function downQuantity(id, qty)
{
	$('#opc-right-summary-content #opc-page-loader').fadeIn();
	var val = $('input[name=quantity_' + id + ']').val();
	var newVal = val;
	if(typeof(qty) == 'undefined' || !qty)
	{
		qty = 1;
		newVal = val - 1;
	}
	else if (qty < 0)
		qty = -qty;
	
	var customizationId = 0;
	var productId = 0;
	var productAttributeId = 0;
	var id_address_delivery = 0;
	var ids = 0;
	
	ids = id.split('_');
	productId = parseInt(ids[0]);
	if (typeof(ids[1]) !== 'undefined')
		productAttributeId = parseInt(ids[1]);
	if (typeof(ids[2]) !== 'undefined' && ids[2] !== 'nocustom')
		customizationId = parseInt(ids[2]);
	if (typeof(ids[3]) !== 'undefined')
		id_address_delivery = parseInt(ids[3]);

	if (newVal > 0 || $('#product_' + id + '_gift').length)
	{
		$.ajax({
			type: 'POST',
			headers: { "cache-control": "no-cache" },
			url: baseUri + '?rand=' + new Date().getTime(),
			async: true,
			cache: false,
			dataType: 'json',
			data: 'controller=cart'
				+ '&ajax=true'
				+ '&add=true'
				+ '&getproductprice=true'
				+ '&summary=true'
				+ '&id_product='+productId
				+ '&ipa='+productAttributeId
				+ '&id_address_delivery='+id_address_delivery
				+ '&op=down'
				+ ((customizationId !== 0) ? '&id_customization='+customizationId : '')
				+ '&qty='+qty
				+ '&token='+static_token
				+ '&allow_refresh=1',
			success: function(jsonData)
			{				
				if (jsonData.hasError)
				{
					var errors = '';
					for(var error in jsonData.errors)
						//IE6 bug fix
						if(error !== 'indexOf')
							errors += $('<div />').html(jsonData.errors[error]).text() + "\n";
					alert(errors);
					$('input[name=quantity_' + id + ']').val($('input[name=quantity_' + id + '_hidden]').val());
					$('#opc-right-summary-content').find('#opc-page-loader').fadeOut();
				}
				else
				{
					redalert(jsonData);
					if (jsonData.refresh)
						location.reload();
					updateCartSummary(jsonData.summary);
					if (window.ajaxCart !== undefined)
						ajaxCart.updateCart(jsonData);
					if (customizationId !== 0)					
						updateCustomizedDatas(jsonData.customizedDatas);
					updateHookShoppingCart(jsonData.HOOK_SHOPPING_CART);
					updateHookShoppingCartExtra(jsonData.HOOK_SHOPPING_CART_EXTRA);
					
					if (newVal == 0)
						$('#product_' + id).hide();
					
					if (typeof(getCarrierListAndUpdate) !== 'undefined')
						getCarrierListAndUpdate();
					if (typeof(updatePaymentMethodsDisplay) !== 'undefined')
						updatePaymentMethodsDisplay();							
				}
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				if (textStatus !== 'abort')
					alert("TECHNICAL ERROR: unable to save update quantity \n\nDetails:\nError thrown: " + XMLHttpRequest + "\n" + 'Text status: ' + textStatus);
			}
		});

	}
	else
	{
		deleteProductFromSummary(id);
	}
}

function updateCartSummary(json, carr)
{
	var i;
	var nbrProducts = 0;
	var product_list = new Array();
	if (typeof json == 'undefined')
		return;
		
	$('div.error').fadeOut();		

	for (i=0;i<json.products.length;i++)
		product_list[json.products[i].id_product + '_' + json.products[i].id_product_attribute + '_' + json.products[i].id_address_delivery] = json.products[i];

	if (!$('.multishipping-cart:visible').length)
	{
		for (i=0;i<json.gift_products.length;i++)
			if (typeof(product_list[json.gift_products[i].id_product + '_' + json.gift_products[i].id_product_attribute + '_' + json.gift_products[i].id_address_delivery]) !== 'undefined')
				product_list[json.gift_products[i].id_product + '_' + json.gift_products[i].id_product_attribute + '_' + json.gift_products[i].id_address_delivery].quantity -= json.gift_products[i].cart_quantity;
	}
	else
		for (i=0;i<json.gift_products.length;i++)
			if (typeof(product_list[json.gift_products[i].id_product + '_' + json.gift_products[i].id_product_attribute + '_' + json.gift_products[i].id_address_delivery]) == 'undefined')
				product_list[json.gift_products[i].id_product + '_' + json.gift_products[i].id_product_attribute + '_' + json.gift_products[i].id_address_delivery] = json.gift_products[i];

	for (i in product_list)
	{
		// if reduction, we need to show it in the cart by showing the initial price above the current one
		var reduction = product_list[i].reduction_applies;
		var initial_price_text = '';
		initial_price = '';
		if (typeof(product_list[i].price_without_quantity_discount) !== 'undefined')
			initial_price = formatCurrency(product_list[i].price_without_quantity_discount, currencyFormat, currencySign, currencyBlank);
			priceReductionPercent = ps_round((ps_round(product_list[i].price_without_quantity_discount) - ps_round(product_list[i].price_wt))/ps_round(product_list[i].price_without_quantity_discount) * -100);
		var current_price = '';
		if (priceDisplayMethod !== 0)
			current_price = formatCurrency(product_list[i].price, currencyFormat, currencySign, currencyBlank);
		else
			current_price = formatCurrency(product_list[i].price_wt, currencyFormat, currencySign, currencyBlank);

		if (reduction && typeof(initial_price) !== 'undefined')
			if (initial_price !== '' && product_list[i].price_without_quantity_discount > product_list[i].price)
				initial_price_text = '<br/><span class="opc-price-percent-reduction opc-small">'+priceReductionPercent+'%</span><br/><span class="opc-old-price">' + initial_price + '</span>';

		var key_for_blockcart = product_list[i].id_product + '_' + product_list[i].id_product_attribute + '_' + product_list[i].id_address_delivery;
		var key_for_blockcart_nocustom = product_list[i].id_product + '_' + product_list[i].id_product_attribute + '_' + ((product_list[i].id_customization && product_list[i].quantity_without_customization != product_list[i].quantity)? 'nocustom' : '0') + '_' + product_list[i].id_address_delivery;

		if (priceDisplayMethod !== 0)
		{
			$('#product_price_' + key_for_blockcart).html('<span class="opc-price">' + current_price + '</span>' + initial_price_text);
			if (typeof(product_list[i].customizationQuantityTotal) !== 'undefined' && product_list[i].customizationQuantityTotal > 0)			
				$('#total_product_price_' + key_for_blockcart).html(formatCurrency(product_list[i].total_customization, currencyFormat, currencySign, currencyBlank));
			else
				$('#total_product_price_' + key_for_blockcart).html(formatCurrency(product_list[i].total, currencyFormat, currencySign, currencyBlank));
			if (product_list[i].quantity_without_customization != product_list[i].quantity)
				$('#total_product_price_' + key_for_blockcart_nocustom).html(formatCurrency(product_list[i].total, currencyFormat, currencySign, currencyBlank));				
		}
		else
		{	
			$('#product_price_' + key_for_blockcart).html('<span class="opc-price">' + current_price + '</span>' + initial_price_text);
			if (typeof(product_list[i].customizationQuantityTotal) !== 'undefined' && product_list[i].customizationQuantityTotal > 0)
				$('#total_product_price_' + key_for_blockcart).html(formatCurrency(product_list[i].total_customization_wt, currencyFormat, currencySign, currencyBlank));
			else
				$('#total_product_price_' + key_for_blockcart).html(formatCurrency(product_list[i].total_wt, currencyFormat, currencySign, currencyBlank));
			if (product_list[i].quantity_without_customization != product_list[i].quantity)
				$('#total_product_price_' + key_for_blockcart_nocustom).html(formatCurrency(product_list[i].total_wt, currencyFormat, currencySign, currencyBlank));									
		}
		$('input[name=quantity_' + key_for_blockcart_nocustom + ']').val(product_list[i].id_customization? product_list[i].quantity_without_customization : product_list[i].cart_quantity);
		$('input[name=quantity_' + key_for_blockcart_nocustom + '_hidden]').val(product_list[i].id_customization? product_list[i].quantity_without_customization : product_list[i].cart_quantity);
		if (typeof(product_list[i].customizationQuantityTotal) !== 'undefined' && product_list[i].customizationQuantityTotal > 0)
			$('#cart_quantity_custom_' + key_for_blockcart).html(product_list[i].customizationQuantityTotal);
		nbrProducts += parseInt(product_list[i].quantity);			
	}

	// Update discounts
	if (json.discounts.length == 0)
	{
		$('.cart_discount').each(function(){$(this).remove();});
		$('.cart_total_voucher').remove();
	}
	else
	{
		if ($('.cart_discount').length == 0)
			loadcart();

		if (priceDisplayMethod !== 0)
			$('#total_discount').html('-' + formatCurrency(json.total_discounts_tax_exc, currencyFormat, currencySign, currencyBlank));
		else
			$('#total_discount').html('-' + formatCurrency(json.total_discounts, currencyFormat, currencySign, currencyBlank));

		$('.cart_discount').each(function(){
			var idElmt = $(this).attr('id').replace('cart_discount_','');
			var toDelete = true;

			for (i=0;i<json.discounts.length;i++)
				if (json.discounts[i].id_discount == idElmt)
				{
					if (json.discounts[i].value_real !== '!')
					{
						if (priceDisplayMethod !== 0)
							$('#cart_discount_' + idElmt + ' td.cart_discount_price span.price-discount').html(formatCurrency(json.discounts[i].value_tax_exc * -1, currencyFormat, currencySign, currencyBlank));
						else
							$('#cart_discount_' + idElmt + ' td.cart_discount_price span.price-discount').html(formatCurrency(json.discounts[i].value_real * -1, currencyFormat, currencySign, currencyBlank));
					}
					toDelete = false;
				}
			if (toDelete)
				$('#cart_discount_' + idElmt + ', #cart_total_voucher').fadeTo('fast', 0, function(){ $(this).remove(); });
		});
	}

	// Block cart
	$('#cart_block_shipping_cost').show();
	$('#cart_block_shipping_cost').next().show();
	if (json.total_shipping > 0)
	{
		if (priceDisplayMethod !== 0)
		{
			$('#cart_block_shipping_cost').html(formatCurrency(json.total_shipping_tax_exc, currencyFormat, currencySign, currencyBlank));
			$('#cart_block_wrapping_cost').html(formatCurrency(json.total_wrapping_tax_exc, currencyFormat, currencySign, currencyBlank));
			$('#cart_block_total').html(formatCurrency(json.total_price_without_tax, currencyFormat, currencySign, currencyBlank));
		}
		else
		{
			$('#cart_block_shipping_cost').html(formatCurrency(json.total_shipping, currencyFormat, currencySign, currencyBlank));
			$('#cart_block_wrapping_cost').html(formatCurrency(json.total_wrapping, currencyFormat, currencySign, currencyBlank));
			$('#cart_block_total').html(formatCurrency(json.total_price, currencyFormat, currencySign, currencyBlank));
		}
	}
	else
	{
		if (json.carrier.id == null)
		{
			$('#cart_block_shipping_cost').hide();
			$('#cart_block_shipping_cost').next().hide();
		}
	}

	$('#cart_block_tax_cost').html(formatCurrency(json.total_tax, currencyFormat, currencySign, currencyBlank));
	$('.ajax_cart_quantity').html(nbrProducts);

	// Cart summary
	$('#summary_products_quantity').html(nbrProducts + ' ' + (nbrProducts > 1 ? txtProducts : txtProduct));
	if (priceDisplayMethod !== 0)
		$('#total_product').html(formatCurrency(json.total_products, currencyFormat, currencySign, currencyBlank));
	else
		$('#total_product').html(formatCurrency(json.total_products_wt, currencyFormat, currencySign, currencyBlank));
	if(cod_id > 0)
		$('.ttpcod').html(formatCurrency(json.total_price+cod_price, currencyFormat, currencySign, currencyBlank));
	$('#total_price_container').html(formatCurrency(json.total_price, currencyFormat, currencySign, currencyBlank));
	$('#total_price_without_tax').html(formatCurrency(json.total_price_without_tax, currencyFormat, currencySign, currencyBlank));
	$('#total_tax').html(formatCurrency(json.total_tax, currencyFormat, currencySign, currencyBlank));
	
	$('.cart_total_delivery').show();
	if (json.total_shipping > 0)
	{
		if (priceDisplayMethod !== 0)
			$('#total_shipping').html(formatCurrency(json.total_shipping_tax_exc, currencyFormat, currencySign, currencyBlank));
		else
			$('#total_shipping').html(formatCurrency(json.total_shipping, currencyFormat, currencySign, currencyBlank));
	}
	else
	{
		if (json.carrier.id != null)
			$('#total_shipping').html(formatCurrency(0, currencyFormat, currencySign, currencyBlank));
		else
			$('.cart_total_delivery').hide();
	}

	if (json.free_ship > 0 && !json.is_virtual_cart)
	{
		$('.cart_free_shipping').fadeIn();
		$('#free_shipping').html(formatCurrency(json.free_ship, currencyFormat, currencySign, currencyBlank));
	}
	else
		$('.cart_free_shipping').hide();

	if (json.total_wrapping > 0)
	{
		$('#total_wrapping').html(formatCurrency(json.total_wrapping, currencyFormat, currencySign, currencyBlank));
		$('#total_wrapping').parent().show();
	}
	else
	{
		$('#total_wrapping').html(formatCurrency(json.total_wrapping, currencyFormat, currencySign, currencyBlank));
		$('#total_wrapping').parent().hide();
	}
	if (!carr)
		loadcarrier(carr);
	
	$('#opc-right-summary-content').find('#opc-page-loader').fadeOut();
	COD();
}

function updateCustomizedDatas(json)
{
	for(var i in json)
		for(var j in json[i])
			for(var k in json[i][j])
				for(var l in json[i][j][k])
				{
					var quantity = json[i][j][k][l]['quantity'];
					$('input[name=quantity_' + i + '_' + j + '_' + l + '_' + k + '_hidden]').val(quantity);
					$('input[name=quantity_' + i + '_' + j + '_' + l + '_' + k + ']').val(quantity);
				}
}

function updateHookShoppingCart(html)
{
	$('#HOOK_SHOPPING_CART').html(html);
}

function updateHookShoppingCartExtra(html)
{
	$('#HOOK_SHOPPING_CART_EXTRA').html(html);
}
function refreshDeliveryOptions()
{
	$.each($('.delivery_option_radio'), function() {
		if ($(this).prop('checked'))
		{
			if ($(this).parent().find('.delivery_option_carrier.not-displayable').length == 0)
				$(this).parent().find('.delivery_option_carrier').show();
			var carrier_id_list = $(this).val().split(',');
			carrier_id_list.pop();
			var it = this;
			$(carrier_id_list).each(function() {
				$(it).parent().find('input[value="' + this.toString() + '"]').change();
			});
		}
		else
			$(this).parent().find('.delivery_option_carrier').hide();
	});
}
$(document).ready(function() {
	
	refreshDeliveryOptions();
	
	$('.delivery_option_radio').live('change', function() {
		refreshDeliveryOptions();
	});
	
	$('#allow_seperated_package').live('click', function() {
		$.ajax({
			type: 'POST',
			headers: { "cache-control": "no-cache" },
			url: baseUri + '?rand=' + new Date().getTime(),
			async: true,
			cache: false,
			data: 'controller=cart&ajax=true&allowSeperatedPackage=true&value='
				+ ($(this).prop('checked') ? '1' : '0')
				+ '&token='+static_token
				+ '&allow_refresh=1',
			success: function(jsonData)
			{
				if (typeof(getCarrierListAndUpdate) !== 'undefined')
					getCarrierListAndUpdate();
			}
		});
	});
	
});

function updateExtraCarrier(id_delivery_option, id_address)
{
	var url = "";

	if(typeof(orderOpcUrl) !== 'undefined')
		url = orderOpcUrl;
	else
		url = orderUrl;
	
	$.ajax({
		type: 'POST',
		headers: { "cache-control": "no-cache" },
		url: url + '?rand=' + new Date().getTime(),
		async: true,
		cache: false,
		dataType : "json",
		data: 'ajax=true'
			+ '&method=updateExtraCarrier'
			+ '&id_address='+id_address
			+ '&id_delivery_option='+id_delivery_option
			+ '&token='+static_token
			+ '&allow_refresh=1',
		success: function(jsonData)
		{
			$('#HOOK_EXTRACARRIER_' + id_address).html(jsonData['content']);
		}
	});
}
