<?php /* Smarty version Smarty-3.1.19, created on 2016-12-25 17:10:58
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/advancedcheckout/views/templates/admin/map.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1073007501583ed9050b3d01-18871607%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2a743a6537dfe567cded70066ab1bff60f0294f0' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/advancedcheckout/views/templates/admin/map.tpl',
      1 => 1482664250,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1073007501583ed9050b3d01-18871607',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_583ed9050e6b67_42445625',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_583ed9050e6b67_42445625')) {function content_583ed9050e6b67_42445625($_smarty_tpl) {?>

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
	$('input[name="cm_latitude"]').val(coords[0]);
	$('input[name="cm_longitude"]').val(coords[1]);
}

function codeAddress() {
	var address = document.getElementById('address').value;
	geocoder.geocode( { 'address': address}, function(results, status) {
	if (status == google.maps.GeocoderStatus.OK)
		map.setCenter(results[0].geometry.location);
	else
		alert('Geocode was not successful for the following reason: ' + status);
	});
}

$(document).ready(function(){
	$('.gotomap').live('click', function(){
		$('.gmaps').show('slow', function(){
			var llng = new google.maps.LatLng(($('input[name="cm_latitude"]').val() ? $('input[name="cm_latitude"]').val() : 0.0), ($('input[name="cm_longitude"]').val() ? $('input[name="cm_longitude"]').val() : 0));
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
			goToByScroll('.gmaps');
		});
	});
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

.gmaps {
	display: none;
}
</style>
<div class="panel gmaps" id="fieldset_0">
	<div class="form-wrapper">
		<div id="ipanel">
			<input id="address" type="textbox" value="USA, Nebraska">
			<input type="button" value="<?php echo smartyTranslate(array('s'=>'Search','mod'=>'advancedcheckout'),$_smarty_tpl);?>
" onclick="codeAddress()">
		</div>
		<div id="gmaps" style="height:400px; width:100%;"></div>
	</div>
</div><?php }} ?>
