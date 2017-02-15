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
	if (prnum > 0){
		loadfield('');
		loadcarrier(1);
		loadcart();
	}
});

function updInvoice()
{
	updateState('invoice');
	updateNeedIDNumber('invoice');
	updateZipCode('invoice');
}

function bindStateInputAndUpdate()
{
	$('.id_state, .dni, .postcode').css({'display':'none'});
	updateState();
	updateNeedIDNumber();
	updateZipCode();
	updInvoice();
	
	if ($('select#id_country_invoice').length !== 0)
	{
		$('select#id_country_invoice').change(function(){   
			updInvoice();
		});

		updInvoice();
	}
}

function updateState(suffix)
{
	$('select#id_state'+(suffix !== undefined ? '_'+suffix : '')+' option:not(:first-child)').remove();
	var states = countries[$('#id_country'+(suffix !== undefined ? '_'+suffix : '')).val()];
	if(typeof(states) !== 'undefined')
	{
		$(states).each(function (key, item){
			if ((suffix !== undefined ? idSelectedCountry_i : idSelectedCountry) == item.id && !new_addr){
				var xx = 'selected="selected"';
			}else{
				var xx = '';
			}
			$('select#id_state'+(suffix !== undefined ? '_'+suffix : '')).append('<option value="'+item.id+'"'+ (xx ? xx : "") +'>'+item.name+'</option>');
		});
		
		$('.id_state' + (typeof suffix !== 'undefined' ? '_' + suffix : '') + ':hidden').parents('form-group').first().fadeIn('slow');
	}
	else
		$('.id_state'+(suffix !== undefined ? '_'+suffix : '')).fadeOut('fast');
}

function updateNeedIDNumber(suffix)
{
	var idCountry = parseInt($('#id_country'+(suffix !== undefined ? '_'+suffix : '')).val());
	if ($.inArray(idCountry, countriesNeedIDNumber) >= 0)
		$('.dni'+(suffix !== undefined ? '_'+suffix : '')+':hidden').fadeIn('slow');
	else
		$('.dni'+(suffix !== undefined ? '_'+suffix : '')).fadeOut('fast');
}

function updateZipCode(suffix)
{
	var idCountry = parseInt($('#id_country'+(suffix !== undefined ? '_'+suffix : '')).val());
	if (countriesNeedZipCode[idCountry] !== 0)
		$('.postcode'+(suffix !== undefined ? '_'+suffix : '')+':hidden').fadeIn('slow');
	else
		$('.postcode'+(suffix !== undefined ? '_'+suffix : '')).fadeOut('fast');
}