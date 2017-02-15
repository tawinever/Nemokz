{**
* Module is prohibited to sales! Violation of this condition leads to the deprivation of the license!
*
* @category  Front Office Features
* @package   Advanced Checkout Module
* @author    Maxim Bespechalnih <2343319@gmail.com>
* @copyright 2013-2015 Max
* @license   license.txt in the module folder.
*}

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
<script type="text/javascript">
var clickMarker;
var loadMarker;
function onClickCallback(event){
	if (clickMarker != null) {
		clickMarker.setMap(null);
		clickMarker = null;
	}

	if (loadMarker != null) {
		loadMarker.setMap(null);
		loadMarker = null;
	}

	var coords = event.latLng.toUrlValue(6).split(',');
	clickMarker = new google.maps.Marker({
		'position': event.latLng,
		'map': map,
		'title': event.latLng.toString(),
		'clickable': false,
	});
	$('input[name="latitude"]').val(coords[0]);
	$('input[name="longitude"]').val(coords[1]);
}

function codeAddress() {
	var address = document.getElementById('address_x').value;
	geocoder.geocode( { 'address': address}, function(results, status) {
	if (status == google.maps.GeocoderStatus.OK)
		map.setCenter(results[0].geometry.location);
	else
		alert('Geocode was not successful for the following reason: ' + status);
	});
}

$(document).ready(function(){
	$('.gotomap').live('click', function(){
		goToByScroll('.gmaps');
	});
	var llng = new google.maps.LatLng(($('input[name="latitude"]').val() ? $('input[name="latitude"]').val() : 41.902277), ($('input[name="longitude"]').val() ? $('input[name="longitude"]').val() : -99.931641));
	var mapOptions = {
		'zoom': 5,
		'center': llng,
		'scaleControl': true
	}
	map = new google.maps.Map(document.getElementById('gmaps'), mapOptions);
	geocoder = new google.maps.Geocoder();
	loadMarker = new google.maps.Marker({
		'position': llng,
		'map': map,
		'clickable': false,
	});
	google.maps.event.addListener(map, 'click', onClickCallback);
});
</script>
<style>
#ipanel {
	top: 5px;
	z-index: 5;
	background-color: #fff;
	padding: 5px;
	border: 1px solid #999;
}
</style>
<div class="panel gmaps" id="fieldset_0">
	<div class="form-wrapper">
		<div id="ipanel">
			<input id="address_x" type="textbox" value="USA, Nebraska">
			<input type="button" value="{l s='Search' mod='advancedcheckout'}" onclick="codeAddress()">
		</div>
		<div id="gmaps" style="height:400px; width:100%;"></div>
	</div>
</div>