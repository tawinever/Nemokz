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
	function requestFullScreen(element) {
		// Supports most browsers and their versions.
		var requestMethod = element.requestFullScreen || element.webkitRequestFullScreen || element.mozRequestFullScreen || element.msRequestFullScreen;

		if (requestMethod) 
		{
			// Native full screen.
			//requestMethod.call(element);
			$('body').addClass('fullscreen');
		} 
		else
		{
			alert('Este navegador no soporta el modo de pantalla completa.')
		}
	}
	
	function cancelFullScreen(element) {
		// Supports most browsers and their versions.
		var requestMethod = element.cancelFullScreen || element.webkitCancelFullScreen || element.mozCancelFullScreen || element.msCancelFullScreen;

		if (requestMethod) 
		{
			// Native full screen.
			//requestMethod.call(element);
			$('body').removeClass('fullscreen');
		} 
		else
		{
			alert('Este navegador no soporta el modo de pantalla completa.')
		}
	}
	
	$(function (){	
		$('#djvoc_goFullscreenButton')				
		.button({
			icons: {
				primary: "ui-icon-arrow-4-diag"
			}
		})
		.click(function () {
			//console.log('click');
			var elem = document.body; // Make the body go full screen.					
			if (!$('body.fullscreen').length)
			{
				$.cookie('fullscreen', 'true');
				//console.log('g');
				requestFullScreen(elem);	
			}
			else
			{
				$.cookie('fullscreen', 'false');
				//console.log('e');					
				cancelFullScreen(document);	
			}
			
		});	
		
		if ($.cookie('fullscreen') == 'true')
		{			
			$('#djvoc_goFullscreenButton').click();
		}
		
	});
})(jQuery);