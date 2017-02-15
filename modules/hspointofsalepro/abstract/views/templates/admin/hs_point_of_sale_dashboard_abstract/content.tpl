{**
* RockPOS - Point of Sale for PrestaShop
* 
* @author    Hamsa Technologies
* @copyright Hamsa Technologies
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*}
<div id="pos_dashboard">
    {include file="./calendar.tpl"}
    {include file="./report.tpl"}
    {hook h="displayPosDashboardContent" from=$datepickerFrom to=$datepickerTo}
</div>