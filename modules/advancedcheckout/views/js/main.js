/**
* Module is prohibited to sales! Violation of this condition leads to the deprivation of the license!
*
* @category  Front Office Features
* @package   Advanced Checkout Module
* @author    Maxim Bespechalnih <2343319@gmail.com>
* @copyright 2013-2015 Max
* @license   license.txt in the module folder.
*/

$(document).ready(function(){
	COD();
	$('#gift_message').live('blur', function(){
		updcarrieraddress(1);
	});
	$('input[name="id_payment_method"]').live('change', function(e){
		COD();
	});
	
	$('#gift, #recyclable').live('change', function(e){
		if ($(this).is(':checked'))
			$('#gift_div').show();
		else
			$('#gift_div').hide();
		updcarrieraddress(1);
	});

	if(!lggd){
		$('.opc-tab-content > div').hide();
		var tab = $('.opc-widget-buttons .tabbtn.opc-active').data('tab');
		if (tab !== undefined)
		{
			tab = tab.replace('#', '');
			$('.opc-tab-content #' + tab).show('slow');

			$('.opc-widget-buttons .tabbtn').live('click', function(e){
				e.preventDefault();
				var th = this;
				$('.opc-tab-content > div').hide();
				var tab_current = $('.opc-widget-buttons .tabbtn.opc-active').data('tab').replace('#', '');
				$('.opc-tab-content #' + tab).slideUp('slow', function(){
					var tab = $(th).data('tab').replace('#', '');
					$('.opc-widget-buttons .tabbtn').removeClass('opc-active');
					$(th).addClass('opc-active');
					$('.opc-tab-content #' + tab).slideDown('slow');
				});
				
			});
		}
	}
	
	$('.opc-alert .opc-close').live('click', function(e){
		$(this).parent().fadeOut('slow');
	});
	
	$('.opc-toast-close-button').live('click', function(e){
		$(this).parents('#opc-toast-container').first().fadeTo(300, 0, function(){
			$(this).remove();
		});
	});
	
});

function setPayment(){
	var id = $.totalStorage('id_payment_a');
	var isset = $('#'+id).val();
	if(id == 'undefined' || id == null || !isset){
		$('#opc_payment_methods input[type="radio"]').each(function(){
			if($(this).data('checked') == 1){
				$(this).attr({checked:true}).trigger('click');
				return false;
			}
		});
	}else{
		$('#'+id).attr({checked:true}).trigger('click');
	}
}

function blinkForm(source, m)
{
	var flag = true;
	var xy = 0;
	setTimeout(function () {
		$(source).show();
		var timerId = setInterval(function () {
			if(flag)
				$(source).fadeTo(600, 0);
			else
				$(source).fadeTo(600, 1);
			flag = !flag;
			if(xy == ((m*2)-1))
				clearInterval(timerId);
			xy++;
		}, 500)
	}, 600);
}

$(document).ready(function() {
	$('#gift_message').on('change', function() {
		updcarrieraddress(1);
	});

	$('#messagex').live('blur', function() {
		$.ajax({
			type: 'POST',
			headers: { "cache-control": "no-cache" },
			url: orderOpcUrl + '?rand=' + new Date().getTime(),
			async: false,
			cache: false,
			dataType : "json",
			data: 'ajx=true&method=updateMessage&messagex=' + encodeURIComponent($('#messagex').val()) + '&token=' + static_token ,
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
				}
			},
			error: function(XMLHttpRequest, textStatus, errorThrown) {
				if (textStatus !== 'abort')
					alert("TECHNICAL ERROR: unable to save message \n\nDetails:\nError thrown: " + XMLHttpRequest + "\n" + 'Text status: ' + textStatus);
			}
		});
	});

	$(document).on('keyup', 'input[name=postcode]', function(e){
		$(this).val($(this).val().toUpperCase());
	});
	
	$('input:radio[name=id_payment_method]').live('click', function(e){
		$.totalStorage('id_payment_a', $(this).attr('id'));
	});
	
	$('.place_order').click(function () {
		$('.payment_error, .carrier_error').slideUp('slow');
		var hasc = $('.btn_reg').hasClass('opc-active');
		$('.opc-close').click();
		if(!hasc)
			$('.btn_reg').click();

		var payment_method = $('input:radio[name=id_payment_method]:checked').val();
		var vcart = $('input[name="vcart"]').val();
		if (vcart == 0)
			vcart = false;
		var term_select = $('input[name="cgv_accept"]').is(':checked');
		$('.opc-form-group').attr({error: ''}).removeClass('opc-has-error').removeClass('opc-has-success');
		var delivery_option_radio = $('.delivery_option_radio');
		var del_val = $('.delivery_option_radio:checked').val();
		if (del_val)
			var sel_carrier = del_val.replace(',', '');
		else
			var sel_carrier = 0;
		var carterr = $('.err_isset').val();
		var error_pickup = false;
		var error_cart = false;
		var error_term = false;
		var error_carrier = true;
		var error_payment = false;
		var error_ajax = false;
		var payment_exec = true;
		if(maps_pickup_on && carrier_pickup == sel_carrier)
		{
			var idpickup = $('#pickup_center').val();
			if(idpickup == 0)
			{
				$('#pickup_center').parents('.opc-form-group').first().addClass('opc-has-error');
				var error_pickup = true;
			}
			else
				$('#pickup_center').parents('.opc-form-group').first().addClass('opc-has-success');
		}

		if(carterr != '' && carterr != 0 && carterr != false)
			var error_cart = true;
		if(trm == 1 && !term_select)
			var error_term = true;
		if(!payment_method)
			var error_payment = true;

		if(!vcart)
			$.each(delivery_option_radio, function (i) {
				if ($(this).prop('checked'))
					error_carrier = false;
			});

		if(payment_exec){
			var dt = $('#orderform')
		.find('#opc-left-content input, #opc-left-content select, #opc-right-pickup-content select, #opc-left-content textarea, #opc-right-carrier-content input, #opc-right-carrier-content select, #opc-right-carrier-content textarea, #opc_payment_methods input, #opc_payment_methods textarea, #opc-right-summary-content textarea')
			.serialize();
			// console.log(dt);
			// return false;
			$.ajax({
				type: 'POST',
				url: orderOpcUrl + '?rand=' + new Date().getTime(),
				async: false,
				cache: false,
				dataType: "json",
				data: dt,
				success: function(json) {
					if (json.hasError)
						error_ajax = true;
					
					if(error_carrier || error_payment || error_term || error_cart || error_pickup || error_ajax)
					{
						var gtbs = '';
						if(error_ajax)
						{
							payment_exec = false;
							var aa = new Array();
							var x = 2;
							aa[0] = 'days';
							aa[1] = 'months';
							var invoice = $('#invoice_address').prop('checked');
							for (var key in json.errors) {
								var val = json.errors[key];
								var err = '<span class="advopc-error">'+ val +'</span>';
								$('#opc-left-user-content input[name="'+ key +'"], #opc-left-user-content select[name="'+ key +'"], #opc-left-user-content textarea[name="'+ key +'"], #opc-left-user-content checkbox[name="'+ key +'"]').parents('.opc-form-group:not(.opc-inline)').first().addClass('opc-has-error').attr({error: val});									
								aa[x] = key;
								x++;
							}

							$('#opc-left-user-content .opc-user-data .opc-form-control, #opc-left-user-content .opc-user-data .opc-form-group input[type="checkbox"]').each(function(){
								if($(this).attr('name') == 'pssw' || $(this).attr('name') == 'invoice_address')
									return true;
									
								if ($.inArray($(this).attr('name'), aa) < 0){
									$(this).parents('.opc-form-group:not(.opc-inline)').addClass('opc-has-success');
								}
							});
							
							$('body').append('<div id="opc-toast-container" class="al_err opc-toast-top-left clearfix"><div class="opc-toast fa-comments opc-toast-danger clearfix" style="opacity: 0.7995559618991;"><button class="opc-toast-close-button">×</button><div class="opc-toast-message">'+ isseterr +'</div></div></div>');
							if(!gtbs)
								gtbs = '#opc-left-user-content .opc-has-error:first';
						}
						
						if(error_carrier || error_payment)
						{
							var txterror = [];
							if(error_carrier && !vcart)
							{
								txterror.push(errc);
								$('.carrier_error').slideDown('slow');
								blinkForm($('.carrier_error'), 2);
							}

							if(error_payment)
							{
								txterror.push(errpym);
								$('.payment_error').slideDown('slow');
								blinkForm($('.payment_error'), 2);
							}

							if(txterror.length)
							{
								payment_exec = false;
								if(!gtbs)
									gtbs = '#opc-right-content';
							}
						}
						
						if(error_pickup)
						{
							payment_exec = false;
							if(!gtbs)
								gtbs = '.opc-opd';
						}
						
						if(error_cart)
						{
							payment_exec = false;
							$('body').append('<div id="opc-toast-container" class="al_err opc-toast-top-left clearfix"><div class="opc-toast fa-comments opc-toast-danger clearfix" style="opacity: 0.7995559618991;"><button class="opc-toast-close-button">×</button><div class="opc-toast-message">'+ isseterr +'</div></div></div>');
							if(!gtbs)
								gtbs = '#carterr:first';
						}
						
						if(error_term)
						{
							payment_exec = false;
							var source_term = $('input[name="cgv_accept"]').parents('.opc-form-group').first();
							$(source_term).addClass('opc-has-error');
							blinkForm(source_term, 2);
						}
						
						if(gtbs)
						{
							goToByScroll(gtbs);
							if(error_cart)
								blinkForm($('.carterr'), 3);
						}
						
						setTimeout(function(){
							$('.al_err').fadeOut(600, function(){
								$(this).remove();
							});
						}, 4000);
					}

					if(!error_ajax){
						loadfield('');
						loadpayment(payment_exec);
					}
				},
				error: function (XMLHttpRequest, textStatus, errorThrown) {
					alert("TECHNICAL ERROR: unable to make order \n\nDetails:\nError thrown: " + XMLHttpRequest + "\n" + 'Text status: ' + textStatus);
				}
			});
		}
	});
});

function updateAddressSelection()
{
	var idAddress_delivery = $('select[name="id_address_delivery"]').val();
	var idAddress_invoice = $('select[name="iaddres_select"]').val();
	if(!$('input#invoice_address').prop('checked'))
		idAddress_invoice = idAddress_delivery;
	$.ajax({
		type: 'POST',
		headers: { "cache-control": "no-cache" },
		url: orderOpcUrl + '?rand=' + new Date().getTime(),
		async: true,
		cache: false,
		dataType : "json",
		data: 'allow_refresh=1&same&ajx=true&method=updateAddressesSelected&id_address_delivery=' + idAddress_delivery + '&id_address_invoice=' + idAddress_invoice + '&token=' + static_token,
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
			}
			else
			{
				loadfield('');
				loadcarrier(1);
			}
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
			if (textStatus !== 'abort')
				alert("TECHNICAL ERROR: unable to save adresses \n\nDetails:\nError thrown: " + XMLHttpRequest + "\n" + 'Text status: ' + textStatus);
		}
	});
}

function updcarrieraddress(carr) {
	$('#opc-right-carrier-content #opc-page-loader').fadeIn();
    var recyclablePackage = 0;
    var gift = 0;
    var giftMessage = '';

    var delivery_option_radio = $('.delivery_option_radio');
    var delivery_option_params = '&';
    $.each(delivery_option_radio, function (i) {
        if ($(this).prop('checked'))
            delivery_option_params += $(delivery_option_radio[i]).attr('name') + '=' + $(delivery_option_radio[i]).val() + '&';
    });
    if (delivery_option_params == '&')
        delivery_option_params = '&delivery_option=&';

    if ($('input#recyclable:checked').length)
        recyclablePackage = 1;
    if ($('input#gift:checked').length) {
        gift = 1;
        giftMessage = encodeURIComponent($('#gift_message').val());
    }
	
	var ts = false;
	var heid = $('.hook_extracarrier').attr('id');

	if (heid) {
		ts = heid.substr(18);
	}

	$('#opc-right-carrier-content .hook_extracarrier').html(' ');
	var messagex = $('textarea[name="messagex"]').val();
	var country = $('#id_country').val() ? $('#id_country').val() : 177;
	var state = $('#id_state').val() ? $('#id_state').val() : '';
	if(messagex == undefined)
		messagex = '';
    $.ajax({
        type: 'POST',
        headers: {
            "cache-control": "no-cache"
        },
        url: orderOpcUrl + '?rand=' + new Date().getTime(),
        async: true,
        cache: false,
        dataType: "json",
        data: 'ajx=true&cn='+ country +'&st='+ state +'&method=updateCarrierAndGetPayments' + delivery_option_params + 'recyclable=' + recyclablePackage + '&gift=' + gift + '&gift_message=' + giftMessage + '&token=' + static_token + '&messagex='+messagex,
        success: function (jsonData) {
            if (jsonData.hasError) {
                var errors = '';
                for (var error in jsonData.errors)
                //IE6 bug fix
                    if (error !== 'indexOf')
                        errors += $('<div />').html(jsonData.errors[error]).text() + "\n";
                alert(errors);
            } else {
				if (ts) {
					$('.hook_extracarrier#HOOK_EXTRACARRIER_'+ts).html('');
					// $('.hook_extracarrier#HOOK_EXTRACARRIER_'+ts).append(jsonData.HOOK_EXTRACARRIER_ADDR[ts]);
				}
				
				$('#opc_delivery_methods').html(jsonData.carrier_data.carrier_block);
				$('#opc-right-carrier-content #opc-page-loader').fadeOut();
				loadpayment();
				if (carr)//if 1 not load carr and paym
					updateCartSummary(jsonData.summary, true);

				if(maps_pickup_on)
					if(jsonData.current_carrier == carrier_pickup)
					{
						$('#map-canvas').html('');
						$('#opc-right-pickup-content.opc-opd').slideDown('slow', function(){
							initMap();
						});
					}
					else
						$('#opc-right-pickup-content.opc-opd').slideUp('slow');
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            if (textStatus !== 'abort')
                alert("TECHNICAL ERROR: unable to save carrier \n\nDetails:\nError thrown: " + XMLHttpRequest + "\n" + 'Text status: ' + textStatus);
        }
    });
}
function updateCarrierSelectionAndGift() {
    updcarrieraddress(1);
}

function loadcarrier(carr) {
    $('#opc-right-carrier-content #opc-page-loader').fadeIn();
	var country = $('#id_country').val() ? $('#id_country').val() : 177;
	var state = $('#id_state').val() ? $('#id_state').val() : '';
    $.ajax({
        type: 'POST',
        url: orderOpcUrl,
        async: false,
        cache: false,
        dataType: "json",
        data: 'ajx=true&method=loadcarrier&cn='+ country +'&st='+ state +'&token=' + static_token,
        success: function (jsonData) {
            if (jsonData.hasError) {
                var errors = '';
                for (error in jsonData.errors)
                //IE6 bug fix
                    if (error != 'indexOf')
                        errors += jsonData.errors[error] + "\n";
                alert(errors);
            } else {
				if(jsonData.vcart == 1)
				{
					$('#opc_delivery_methods').html(jsonData.carrier_block);
					loadpayment();
					$('#opc-right-carrier-content #opc-page-loader').fadeOut();
				}
				else
				{
					$('#opc_delivery_methods').html(jsonData.carrier_block);
					if (!jsonData.cnt){
						updcarrieraddress(carr);
					}else{
						loadpayment();
						$('#opc-right-carrier-content #opc-page-loader').fadeOut();
					}
				}
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert("TECHNICAL ERROR: unable to loal carrier \n\nDetails:\nError thrown: " + XMLHttpRequest + "\n" + 'Text status: ' + textStatus);
        }
    });

}

function addnewaddr(type) {
    $.ajax({
        type: 'POST',
        url: orderOpcUrl,
        async: false,
        cache: false,
        dataType: "json",
        data: 'type='+type+'&ajx=true&method=addnewaddr&token=' + static_token,
        success: function (jsonData) {
            if (jsonData.hasError) {
                var errors = '';
                for (error in jsonData.errors)
                //IE6 bug fix
                    if (error != 'indexOf')
                        errors += jsonData.errors[error] + "\n";
                alert(errors);
            } else {
                loadfield('');
				loadcarrier(1);
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert("TECHNICAL ERROR: unable to loal new adrress \n\nDetails:\nError thrown: " + XMLHttpRequest + "\n" + 'Text status: ' + textStatus);
        }
    });

}

function loadfield(new_a, id_add) {
    $('#opc-left-user-content #opc-page-loader').fadeIn();
	$('#opc-left-user-content').find('.opc-user-data').html('');
    $.ajax({
        type: 'POST',
        url: orderOpcUrl,
        async: false,
        cache: false,
        dataType: "json",
        data: 'ajx=true&id_add='+ id_add +'&new_addr='+ new_a +'&method=loadfield&token=' + static_token,
        success: function (jsonData) {
            if (jsonData.hasError) {
                var errors = '';
                for (error in jsonData.errors)
                //IE6 bug fix
                    if (error != 'indexOf')
                        errors += jsonData.errors[error] + "\n";
                alert(errors);
            } else {
                $('#opc-left-user-content').find('.opc-user-data').append(jsonData.block_field);
                $('#opc-left-user-content #opc-page-loader').fadeOut();
				show_iaddress();
				bindStateInputAndUpdate();
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert("TECHNICAL ERROR: unable to loal fields \n\nDetails:\nError thrown: " + XMLHttpRequest + "\n" + 'Text status: ' + textStatus);
        }
    });

}

function loadpayment(place) {
    $('#opc-right-payment-content #opc-page-loader').fadeIn();
    $('#opc-right-payment-content #oplat').html('');
    $.ajax({
        type: 'POST',
        url: orderOpcUrl,
        async: false,
        cache: false,
        dataType: "json",
        data: 'ajx=true&method=loadpayment&token=' + static_token,
        success: function (jsonData) {
            if (jsonData.hasError) {
                var errors = '';
                for (error in jsonData.errors)
                //IE6 bug fix
                    if (error != 'indexOf')
                        errors += jsonData.errors[error] + "\n";
                alert(errors);
            } else {
                $('#opc-right-payment-content #oplat').append(jsonData.orig_hook);
                $('#opc_payment_methods').html(jsonData.parsed_content);
                $('#opc-right-payment-content #opc-page-loader').fadeOut();
				$('#opc-right-payment-content #oplat form').each(function(){
					var name = $(this).attr('name');
					var current = this;
					if (/^yamoney_form/.test(name))
						$(current).attr({target:''});
				});
				setPayment();
				if(place)
					paymentModuleConfirm();
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert("TECHNICAL ERROR: unable to loal оплата \n\nDetails:\nError thrown: " + XMLHttpRequest + "\n" + 'Text status: ' + textStatus);
        }
    });
}

function loadcart() {
	$('#opc-right-summary-content #opc-page-loader').fadeIn();
    $.ajax({
        type: 'POST',
        url: orderOpcUrl,
        async: false,
        cache: false,
        dataType: "json",
        data: 'ajx=true&method=loadcart&token=' + static_token,
        success: function (jsonData) {
            if (jsonData.hasError) {
                var errors = '';
                for (error in jsonData.errors)
                //IE6 bug fix
                    if (error != 'indexOf')
                        errors += jsonData.errors[error] + "\n";
                alert(errors);
            } else {
                $('.cart-container').html(jsonData.cart_bl);
				COD();
				if (typeof decodeEntities === 'function')
				{
					$('.opc-widget-body td.cart_description > div > a').each(function(){
						var decoded = decodeEntities($(this).html());
						$(this).html(decoded);
					});
				}
				if(jsonData.err_isset){
					$('#cart_errors').html('');
					$('#cart_errors').html(jsonData.err);
					$.each(jsonData.array, function(){
						var elem = this;
						$('.cart_item').each(function(){
							var id = $(this).attr('id');
							if (strpos(id, 'product_' + elem.id_product + '_' + elem.id_product_attribute) !== false){
								$(this).find('td').css('background-color', '#e46f61');
							}
						});
					});
				}
				$('#opc-right-summary-content #opc-page-loader').fadeOut();
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert("TECHNICAL ERROR: unable to loal оплата \n\nDetails:\nError thrown: " + XMLHttpRequest + "\n" + 'Text status: ' + textStatus);
        }
    });
}

function state_refresh_f(val){
	$.ajax({
	   type: 'POST',
	   url: orderOpcUrl,
	   async: false,
	   cache: false,
	   dataType : "json",
	   data: 'ajx=true&method=updstate&id_state=' + val + '&token=' + static_token ,
	   success: function(jsonData)
	   {
			if (jsonData.hasError){
				var errors = '';
				for(error in jsonData.errors)
					//IE6 bug fix
					if(error != 'indexOf')
						errors += jsonData.errors[error] + "\n";
				alert(errors);
			}
			else{			
				loadcarrier(1);
			}
		},
	   error: function(XMLHttpRequest, textStatus, errorThrown) {alert("TECHNICAL ERROR: unable to update id_state \n\nDetails:\nError thrown: " + XMLHttpRequest + "\n" + 'Text status: ' + textStatus);}
   });
}

function country_refresh_f(val){
	$.ajax({
	   type: 'POST',
	   url: orderOpcUrl,
	   async: false,
	   cache: false,
	   dataType : "json",
	   data: 'ajx=true&method=updcountry&id_country=' + val + '&token=' + static_token ,
	   success: function(jsonData)
	   {
			if (jsonData.hasError)
			{
				var errors = '';
				for(error in jsonData.errors)
					//IE6 bug fix
					if(error != 'indexOf')
						errors += jsonData.errors[error] + "\n";
				alert(errors);
			}
			else
			{
				updateState();
				updateNeedIDNumber();
				updateZipCode();
				loadcarrier(1);
			}
		},
	   error: function(XMLHttpRequest, textStatus, errorThrown) {alert("TECHNICAL ERROR: unable to update id_country \n\nDetails:\nError thrown: " + XMLHttpRequest + "\n" + 'Text status: ' + textStatus);}
	});
}

$(document).ready(function () {	
	
	if(country_refresh){
		$('select#id_country').live('change', function(){
			var val = $(this).val();
			country_refresh_f(val);
		});
	}
	
	if(state_refresh){
		$('select#id_state').live('change', function(){
			var val = $(this).val();
			state_refresh_f(val);
		});
	}
	
	$("a.iframe").fancybox({
		type : 'iframe',
		width:800,
		hideOnContentClick: true,
		transitionIn	: 'elastic',
		transitionOut	: 'elastic',
		autoSize: true,
		autoDimensions : true,
	});
	
	$('#invoice_address').live('change', function(e){
		show_iaddress();
	});
	
	$(document).on('click', '.opc-togle', function(e){
		$('#login_form_content').slideUp('slow');
		$('#forgot_form_content').slideUp('slow');
		$('.opc-togle').fadeOut('slow');
		$('#openLoginFormBlock').fadeIn('slow');
	});
	
	$(document).on('click', '.lost_password', function(e){
		e.preventDefault();
		$('#login_form_content').slideUp('slow', function(){
			$('#forgot_form_content').slideDown('slow');
			$('#forgot_form_content .alert-success').hide();
			$('#opc_forgot_errors').hide();
			$('#opc_login_errors').hide();
		});
	});
	
	$(document).on('click', '.btl', function(e){
		e.preventDefault();
		$('#forgot_form_content').slideUp('slow', function(){
			$('#login_form_content').slideDown('slow');
			$('#forgot_form_content .alert-success').hide();
			$('#opc_forgot_errors').hide();
			$('#opc_login_errors').hide();
		});
	});
	
	$('#pssw').live('change', function(){
		if ($(this).attr('checked') == 'checked'){
			$('.hidepass').show();
		}else{
			$('.hidepass').hide();
		}
	});
	
	$('.opc-forgotsend-button').on('click', function() {
		$.ajax({
			type: 'POST',
			url: orderOpcUrl,
			async: false,
			cache: false,
			dataType: "json",
			data: 'email='+ $('input[name="forgot_email"]').val() +'&ajx=true&method=forgot&token=' + static_token,
			beforeSend: function() {
				$('span.spin').show();
				$('#opc_forgot_errors').slideUp('slow');
				$('#forgot_form_content .opc-alert-success').slideUp('slow');
			},
			complete: function() {
				
			},
			success: function(json) {
				var static_token = json.token;
				if (json.hasError) {
					var errors = '';
					for(var error in json.errors)
						//IE6 bug fix
						if(error !== 'indexOf')
							errors += '<li style="list-style:none;">'+json.errors[error]+'</li>';
					errors += '';					
					$('#opc_forgot_errors .cnt').html('<ol>' + errors + '</ol>').slideDown('slow');
					$('#opc_forgot_errors').slideDown('slow');
					$('span.spin').hide();
				   }
				   if(json.confirmation == 1){
						$('#opc_forgot_errors').slideUp('slow');
						$('span.spin').hide();
						$('#forgot_form_content .opc-alert-success').slideDown('slow');
				   }
				
				
			},
			error: function (XMLHttpRequest, textStatus, errorThrown) {
				alert("TECHNICAL ERROR: unable to loal forgot \n\nDetails:\nError thrown: " + XMLHttpRequest + "\n" + 'Text status: ' + textStatus);
			}
		});
    });
	
	$('.opc-login-button').on('click', function() {
		var log = $('input[name="login_email"]').val();
		var pass = $('input[name="login_passwd"]').val();
		$.ajax({
			url: authenticationUrl + '?rand=' + new Date().getTime(),
			type: 'post',
			data: '&SubmitLogin=true&ajax=true&email='+  log +'&passwd='+ pass,
			dataType: 'json',
			beforeSend: function() {
				$('#opc_login_errors').slideUp('slow');
			},
			complete: function() {
				
			},
			success: function(json) {
				var static_token = json.token;
				if (json.hasError) {
					var errors = '';
					for(var error in json.errors)
						//IE6 bug fix
						if(error !== 'indexOf')
							errors += '<li>'+json.errors[error]+'</li>';
					errors += '';
					$('#opc_login_errors .cnt').html('<ol>' + errors + '</ol>').slideDown('slow');
					$('#opc_login_errors').slideDown('slow');
					$('span.spin').hide();
				}else{
					setTimeout(function(){
						$('#opc_login_errors').slideUp(700, function(){
							$('span.spin').hide();
							location.reload();
						});
					}, 500);
				}
				
			},
			error: function(xhr, ajaxOptions, thrownError) {
				alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			}
		});
	});

    $('body#order-opc').attr('id', 'adv_order');
	$('input[name="advopc-use-comment"]').click(function(){
		if(this.checked){
			$(this).val("1");
			$('div.advopc-comment').show();
		}
		else{
			$(this).val("0");
			$('div.advopc-comment').hide();
		}
	});
	
	$('.voucher_name').live('click', function(){
		var code = $(this).data('code');
		$(this).parents('#cart_voucher').first().find('input#discount_name').val(code);
	});
	
	$('#advopc-voucher-btn').live('click', function(){
		  $.ajax({
			url: orderOpcUrl,
			type: 'post',
			data: 'code='+ $('#discount_name').val() +'&addajx=1&ajx=1&method=addvoucher',
			dataType: 'json',
			beforeSend: function() {
				$('.v_errors').slideUp().html('<i class="fa fa-times-circle opc-sign"></i><button class="opc-close">x</button>');
			},
			complete: function() {
				$('.advopc-voucher .advopc-wait').remove();
			},
			success: function(json) {
				if(json.hasError){
					$('.v_errors').append(json.error);
					$('.v_errors').slideDown('slow');
				}else{
					updcarrieraddress();
					loadcart();
				}
			},
			error: function(xhr, ajaxOptions, thrownError) {
				alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			}
		});
	});
});

function strpos(haystack, needle, offset){
	var i = (haystack + '').indexOf(needle, (offset || 0));
	return i === -1 ? false : i;
}

function isUrl(val){        
	var regExp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;    
	return regExp.exec(val);           
}
	
function updadvopcaddr(value, type){
	if (value != 0){
		updateAddressSelection();
	}else{
		addnewaddr(type);
	}
}

function show_iaddress(){
	var act = $('#invoice_address').attr('checked');
	if(act){
		$('#invoice_div').show();
	}else{
		$('#invoice_div').hide();
	}
}

function goToByScroll(id){
	$('html,body').animate({
		scrollTop: $(id).offset().top - 30},
	1500);
}

function deldisc(id){
	$.ajax({
		type: 'POST',
		url: orderOpcUrl,
		async: false,
		cache: false,
		dataType: "json",
		data: 'ddisc='+ id +'&ajx=1&method=addvoucher',
		success: function(json) {
				if (json.success == 1){
						loadcart();
						updcarrieraddress(1);
						$('#cart_discount_'+ id).fadeOut('slow');
						$('#cart_discount_'+ id).remove();
				}
		},
		error: function (XMLHttpRequest, textStatus, errorThrown) {
			alert("TECHNICAL ERROR: unable to delete discount (voucher code) \n\nDetails:\nError thrown: " + XMLHttpRequest + "\n" + 'Text status: ' + textStatus);
		}
	});
}

function paymentModuleConfirm() {
	var errors;
    var link_id = $('input[name=id_payment_method]:checked').val();
    if (link_id === undefined) {
        errors = '<b>' + errorPayment + '</b>';
        $('#opc_payment_errors').html(errors).slideUp('fast').slideDown('slow');
    } else {
        if (!isUrl(link_id)){
			eval(link_id);
			return false;
		}else{
			window.location = link_id;
            return false;
		}
    }
}

function savepostcode(val){
	$.ajax({
	   type: 'POST',
	   url: orderOpcUrl,
	   async: false,
	   cache: false,
	   dataType : "json",
	   data: 'ajx=true&method=updpost&postcode=' + val + '&token=' + static_token ,
	   success: function(jsonData)
	   {
			if (jsonData.hasError)
			{
				var errors = '';
				for(error in jsonData.errors)
					//IE6 bug fix
					if(error != 'indexOf')
						errors += jsonData.errors[error] + "\n";
				alert(errors);
			}
			else
			{
				loadcarrier(1);
			}
		},
	   error: function(XMLHttpRequest, textStatus, errorThrown) {alert("TECHNICAL ERROR: unable to update postcode \n\nDetails:\nError thrown: " + XMLHttpRequest + "\n" + 'Text status: ' + textStatus);}
   });
	
}

function savecity(val){
	$.ajax({
	   type: 'POST',
	   url: orderOpcUrl,
	   async: false,
	   cache: false,
	   dataType : "json",
	   data: 'ajx=true&method=updcity&city=' + val + '&token=' + static_token ,
	   success: function(jsonData)
	   {
			if (jsonData.hasError)
			{
				var errors = '';
				for(error in jsonData.errors)
					//IE6 bug fix
					if(error != 'indexOf')
						errors += jsonData.errors[error] + "\n";
				alert(errors);
			}
			else
			{
				loadcarrier(1);
			}
		},
	   error: function(XMLHttpRequest, textStatus, errorThrown) {alert("TECHNICAL ERROR: unable to update city \n\nDetails:\nError thrown: " + XMLHttpRequest + "\n" + 'Text status: ' + textStatus);}
   });
	
}

function COD()
{
	if ($('input[name="id_payment_method"]:checked').attr('idorig') == cod_id){
		$('.cod_fee').show();
	}else{
		$('.cod_fee').hide();
	}
}