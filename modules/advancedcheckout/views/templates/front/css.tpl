{**
* Module is prohibited to sales! Violation of this condition leads to the deprivation of the license!
*
* @category  Front Office Features
* @package   Advanced Checkout Module
* @author    Maxim Bespechalnih <2343319@gmail.com>
* @copyright 2013-2015 Max
* @license   license.txt in the module folder.
*}

<style>
.orderform * {
	color: #{$clr['color_pick_4']|escape:'html':'UTF-8'} !important;
}

.opc-bg-blueberry {
	background-color: #{$clr['color_pick_1']|escape:'html':'UTF-8'} !important;
}

.opc-widget-header[class*="bg-"] .opc-widget-caption, .opc-widget-header[class*="bg-"] i {
	color: #{$clr['color_pick_7']|escape:'html':'UTF-8'} !important;
}

.opc-bordered-sky {
	border-color: #{$clr['color_pick_2']|escape:'html':'UTF-8'} !important;
}
{if $adv_circle}
.opc-widget-body {
	border-bottom-right-radius: 10px;
	border-bottom-left-radius: 10px;
	-webkit-border-bottom-right-radius: 10px;
	-webkit-border-bottom-left-radius: 10px;
	-moz-border-bottom-right-radius: 10px;
	-moz-border-bottom-left-radius: 10px;
}
{/if}

.opc-widget-body, .opc-tab-content {
	background-color: #{$clr['color_pick_3']|escape:'html':'UTF-8'} !important;
}

</style>