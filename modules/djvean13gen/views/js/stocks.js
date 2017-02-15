/**
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
*/
; (function ($){
	var submitSend = function () {
		var products = '';
		$('.searchInput').each(function (i){
			var id_product = $(this).data('id_product');
			var id_product_attribute = $(this).data('id_product_attribute');
			
			if (!id_product_attribute)
			{
				id_product_attribute = 0;
			}
			
			var quantity = $(this).parent().next().children('.quantityInput').val();
			
			if (id_product && quantity)
			{
				/*
				console.log(id_product);
				console.log(id_product_attribute);
				console.log(quantity);
				*/
				products += '&productStock[]=' + id_product + '_' + id_product_attribute + '_' + quantity;
			}
		});
		
		if (products)
		{
			var update = $('input[name=update]:checked').val();
			var print = $('input[name=print]:checked').val();
			var delivery_slip = $('input[name=delivery_slip]:checked').val();		
			
			var url = link+'&task=print' + products;
			//console.log(url);
			openInNewTab(url);
		}
	};
	
	var submitGenEan13 = function () {			
		var url = link+'&task=genEan13';	
		window.location = url;
	};
    
    var populateEan13 = function () {			
		var url = link+'&task=populateEan13';	
		window.location = url;
	};
	
	var createNewStockLine = function () {
		var stockLine = $('<div>')
			.addClass('stockLine')
			.css('min-height', '80px')
			.append(
				$('<div>')
					.append(
						$('<div>')
							.css({
								'float': 'left',
								'width': '80%'
							})
							.append(
								$('<label>')
									.addClass('searchLabel input-label')
									.css('text-align', 'left')
									.text('Busca un producto por EAN13:')
							).append(
								$('<input>')
									.attr('autocomplete','off')
									.attr('type','text')
									.addClass('searchInput inputbox')
									.css({
										'width': '92%',
										'font-size': '1.4em',
										'font-weight': 'normal'
									})
							)
					)
					.append(
						$('<div>')
						.css({
							'float': 'left',
							'width': '7%',
							'min-width': '50px'
						})
						.append(
							$('<label>')
								.addClass('input-label quantityLabel')
								.css({
									'text-align': 'left',
									'width': '100%'
								})
								.text('Unidades')
						)
						.append(
							$('<input>')
								.val(1)
								.attr('type','text')
								.addClass('quantityInput inputbox')
								.css({
									'width': '92%',
									'text-align': 'right',
									'font-weight': 'normal',
									'font-size': '1.4em'
								})
						)
					)										
					.append(
						$('<div>')
							.css({
								'float': 'left',
								'width': '10%',
								'min-width': '50px',
								'margin-left': '10px',
								'text-align': 'center'
							})
							.append(
								$('<label>')
									.addClass('input-label')
									.text('Eliminar')
									.css({
										'text-align': 'center',
										'margin-bottom': '15px',
										'width': '100%'
									})
							)
							.append(
								$('<div>')
									.addClass('bluefoose-ui-button-light icon-button')
									.append(
										$('<button>')
											.addClass('djvs_removeLineButton')
											.text('x')
											.button({
												icons: {
													primary: "ui-icon-trash"
												},
												text: false
											})
									)
							)
					)
			);
			
		$('#djvs_stockBlock').append(stockLine);
	};
	

	$(function (){		
		$('.format').buttonset();
		
		$('.djvs_removeLineButton')
			.button({
				icons: {
					primary: "ui-icon-trash"
				},
				text: false
			});
		
		$('#djvs_addLineButton')
			.button({
				icons: {
					primary: "ui-icon-plusthick"
				},		
			})
			.click(function (){ 
				for (var i = 0; i < 3; i++)
				{
					createNewStockLine();
				}
			});
		
		$('#djvs_backButton')
			.button()
			.click(function (){ 
				window.location = link;
			});
	
		$(document).on('click', '.djvs_removeLineButton', function () {			
			$(this).parents('.stockLine').remove();
		});	
		
		$('#djvs_sendButton')
			.button({	
			})
			.click(submitSend);
		
		$('#djvs_genEan13Button')
			.button({	
			})
			.click(submitGenEan13);
            
        $('#djvs_populateEan13Button')
			.button({	
			})
			.click(populateEan13);                
			
		//$('.searchInput').first().focus();
		$(document).on('focus','.searchInput',function(e) {
			if (!$(this).data('autocomplete') ) { // If the autocomplete wasn't called yet:
				$(this)
					.autocomplete({
						delay: 300,
						minLength: 1,
						select: function( event, ui ) {							
							var $el = $(this);
							$el.attr('disabled', 'disabled');
							$el.addClass('valid-product');
							$el.data('id_product', ui.item.id_product);
							$el.data('id_product_attribute', ui.item.id_product_attribute);
							createNewStockLine();
							$('.searchInput').last().focus();		
						},						
						source: function (request, response) {				
							var el = this;
							$.ajax({
								url: link + '&task=getSource&ajax=1',
								dataType: 'json',
								data: {							
									'search': request.term
								},						
								success: function (data) {									
									//console.log(data['products']);
									//console.log(automaticInsertion);
									//console.log('el');
									//console.log(el.element);
									var $el = $(el.element);
									//$el.attr('disabled', 'disabled');
									var val = $el.val();
									
									if (data['products'].length)
									{
										var products = data['products'];
										
										if (automaticInsertion && (products.length == 1))
										{	
											
											$el.val(products[0].name);
											//console.log(products[0]);
											//console.log(this);
											$el.data('id_product', products[0].id_product);
											$el.data('id_product_attribute', products[0].id_product_attribute);
											$el.addClass('valid-product');
											$el.attr('disabled', 'disabled');
											createNewStockLine();
									
											$('.searchInput').last().focus();		
										}
										else if (!automaticInsertion)
										{
											/**/
											return response($.map(data['products'], function(item) {								
												var  name = item.name;
												if (item.id_product_attribute)
												{
													var attr = [];
													for (var i = 0; i < item.attributes.length; i++)
													{
														attr.push(item.attributes[i].group + ': ' + item.attributes[i].name); 
													}
													
													attr = attr.join(';');
													name += ' - ' + attr;
												}
												
												return {
													label: name,
													value: name,
													id_product: item.id_product,
													id_product_attribute: item.id_product_attribute
												}
											}));
											/**/
										}
										else
										{
											if (automaticInsertion)
											{
												$el.val(val + ' (más de 1 resultado).');
												$el.addClass('not-valid-product');

												$el.attr('disabled', 'disabled');
											
												createNewStockLine();
									
												$('.searchInput').last().focus();		
											}
										}
									}
									else
									{										
										
										if (automaticInsertion)
										{
											$el.val(val + ' (no se encuentra).');
											$el.addClass('not-valid-product');
										
											$el.attr('disabled', 'disabled');										
										
											createNewStockLine();	
									
											$('.searchInput').last().focus();		
										}
									}
																
								}
							});
						}
				});
			}
		});
	});
})(jQuery);
