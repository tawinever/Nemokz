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
(function($){
	$(function(){
		if(!$('body').hasClass('page-sidebar-closed'))
			$('body').toggleClass('page-sidebar-closed');
		$('.expanded').removeClass('expanded');
	});
})(jQuery);


var openInNewTab = function (url) {
	var win = window.open(url);
	win.focus();
};

var formatAmount = function (nStr) {
	nStr += '';
	x = nStr.split(',');
	x1 = x[0];
	x2 = x.length > 1 ? ',' + x[1] : '';
	var rgx = /(\d+)(\d{3})/;
	while (rgx.test(x1)) {
		x1 = x1.replace(rgx, '$1' + ' ' + '$2');
	}
	
	return x1 + x2;
};

var intToDecimal = function(amount){	
	var s = "" + amount;
	s = s.split('.');
	s = s[0];
	
	var l = s.length;
	if (l == 1)
	{
		s =	"0.0" + s;
	}
	else if (l == 2)
	{
		s =	"0." + s;
	}
	else
	{
		s =	s.substr(0, l-2) + "." + s.substr(l-2, 2);
	}
	
	return s;
};

var convertAmountToNumber = function (amount) {		
	return amount.replace(',', '.').replace(' ', '');
};