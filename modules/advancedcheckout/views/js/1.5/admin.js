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
	$('.table a').live('click', function(){
		var link = this;
		var ia = strpos($(link).attr('href'), 'status');
		var ir = strpos($(link).attr('href'), 'required');
		var img = strpos($(link).find('img').attr('src'), 'enabled');
		if (ia !== false || ir !== false)
		{
			$.post($(link).attr('href'), function (data) {
				if (data.success == 1) {				
					if (img !== false){
						var xx = $(link).find('img').attr('src').replace('enabled', 'disabled');
					} else {
						var xx = $(link).find('img').attr('src').replace('disabled', 'enabled');
					}
					
					$(link).find('img').attr('src', xx);
				} else {
					alert(data.text);
				}
			}, 'json');
			
			return false;
		}
	});
	
	var curr_tab = $.totalStorage('this_curr_tab');
	if(curr_tab != 'undefined' && curr_tab != null){
		clract();
		$('#tabPane1 > div').hide();
		$('#tabPane1 #' + curr_tab).show();
	}else{
		clract();
		$.totalStorage('this_curr_tab', 'settings');
		$('#tabPane1 > div').hide();
		$('#tabPane1 #settings').show();
	}
	
	$('.productTabs li a').live('click', function(){
		clract();
		$(this).addClass('selected');
		var tab = $(this).attr('href').replace('#', '');
		$('#tabPane1 > div').hide();
		$('#tabPane1 #' + tab).show();
		$.totalStorage('this_curr_tab', tab);
	});
});

function clract(){
	$('#tabPane1 > div').hide();
	$('.productTabs li a').each(function(){
		$(this).removeClass('selected');
	});
}

function strpos(haystack, needle, offset){
	var i = (haystack + '').indexOf(needle, (offset || 0));
	return i === -1 ? false : i;
}