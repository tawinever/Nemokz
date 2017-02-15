/**
* Module is prohibited to sales! Violation of this condition leads to the deprivation of the license!
*
* @category  Front Office Features
* @package   Advanced Checkout Module
* @author    Maxim Bespechalnih <2343319@gmail.com>
* @copyright 2013-2015 Max
* @license   license.txt in the module folder.
*/

function goToByScroll(id){
	$('html,body').animate({
		scrollTop: $(id).offset().top - 30},
	1500);
}

$(document).ready(function(){
	var curr_tab = $.totalStorage('this_curr_tab');
	if(curr_tab != 'undefined' && curr_tab != null){
		clearActive();
		$('a[href="#'+ curr_tab +'"]').addClass('active').click();
	}else{
		clearActive();
		$.totalStorage('this_curr_tab', 'settings');
		$('a[href="#settings"]').addClass('active').click();
	}
	
	$('.list-group.change a').click(function(){
		clearActive();
		$(this).addClass('active');
		$.totalStorage('this_curr_tab', $(this).attr('href').replace('#', ''));
	});

	$('.dragHandle a').live('click', function(e){
		return false;
		e.PreventDefault();
	})
	var files;
	$('input[type=file]').live('change', function(event){
		var ts = $(this);
		var title = $(ts).attr('nm');
		files = event.target.files;
		var name = $(this).attr('name');
		var data = new FormData();
		$.each(files, function(key, value){
			data.append(key, value);
		});
		
		data.append('tkn', tkn);
		data.append('idm', idm);
		data.append('name', name);
		data.append('action', 'uploadf');
		
		$.ajax({
			url: urldir + 'actions.php',
			type: 'POST',
			data: data,
			cache: false,
			dataType: 'json',
			processData: false, // Don't process the files
			contentType: false, // Set content type to false as jQuery will tell the server its a query string request
			success: function(data, textStatus, jqXHR)
			{
				if(data.message_code == 0){
					$().find('div').html('<p>'+data.message+'</p>');
					var d = new Date();
					var src = urldir +'views/img/payments/'+ name + '.gif?' + d.getTime();
					$('img.' + name).attr('src', src);
					$(ts).parents('td').first().next('td').html('<input type="button" class="button btn btn-default pull-right reseti" id="cheque" value="'+ title +'">');
				}else{
					alert(data.message);
					console.log('ERRORS: ' + data.message);
				}
			},
			error: function(jqXHR, textStatus, errorThrown){
				console.log('ERRORS: ' + textStatus);
			}
		});
	});
	$('.uplimg').click(function(){
		$(this).parent().find('input[type=file]').click();
		return false;
	});
	$('#color_pick_1, #color_pick_2, #color_pick_3, #color_pick_4, #color_pick_7').ColorPicker({
		onSubmit: function(hsb, hex, rgb, el) {
			$(el).val(hex);
			$(el).ColorPickerHide();
		},
		onBeforeShow: function () {
			$(this).ColorPickerSetColor(this.value);
		}
	})
	.bind('keyup', function(){
		$(this).ColorPickerSetColor(this.value);
	});
	
	$('.ajax_table_link').each(function(){
		$(this).removeClass('ajax_table_link').addClass('ajax_table_linkx');
	});
	
	$('.ajax_table_linkx').on('click', function (e) {
		e.preventDefault();
		var link = $(this);
		$.post($(this).attr('href'), function (data) {
			if (data.success == 1) {
				if (link.hasClass('action-disabled')){
					link.removeClass('action-disabled').addClass('action-enabled');
				} else {
					link.removeClass('action-enabled').addClass('action-disabled');
				}
				link.children().each(function () {
					if ($(this).hasClass('hidden')) {
						$(this).removeClass('hidden');
					} else {
						$(this).addClass('hidden');
					}
				});
			} else {
				showErrorMessage(data.text);
			}
		}, 'json');
		return false;
	});
	
	$('input.reseti').live('click', function(){
		var name = $(this).attr('id');
		var ts = $(this);
		$.post(urldir + 'actions.php', {name : name, action : 'deletef', tkn: tkn, idm: idm}, function(data){
			if(data.ok == 1){
				var src = urldir +'views/img/payments/default.png';
				$('img.' + name).attr('src', src);
				var main = $(ts).parent();
				$(main).html('---');
			}else{
				alert(data.errors);
			}
		}, 'json');
		
		return false;
	});
});

function clearActive(){
	$('.list-group.change a').each(function(){
		$(this).removeClass('active');
	});
}