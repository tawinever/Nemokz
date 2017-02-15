{**
 * RockPOS - Point of Sale for PrestaShop
 * 
 * @author    Hamsa Technologies
 * @copyright Hamsa Technologies
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 *}
 
<script>
	var currencyFormat = {$currency->format|intval};
	var currencySign = '{$currency->sign|escape:'htmlall':'UTF-8'}';
	var currencyBlank = {$currency->blank|intval};
	var priceDisplayPrecision = 0;
        var dashboardData = {$dashboard_data|@json_encode|escape:'quotes':'UTF-8'};
        var salesLabel = '{$hs_pos_i18n['sales']|escape:'htmlall':'UTF-8'}';
        var ordersLabel = '{$hs_pos_i18n['orders']|escape:'htmlall':'UTF-8'}';
        var netProfitsLabel = '{$hs_pos_i18n['net_profit']|escape:'htmlall':'UTF-8'}';
        var dayLabel = '{$hs_pos_i18n['day']|escape:'htmlall':'UTF-8'}';
        var chartPackage = '{$chart_package|escape:'htmlall':'UTF-8'}';
        var chartType = '{$chart_type|escape:'htmlall':'UTF-8'}';
        {literal}
        google.load('visualization', '1.1', {packages: chartPackage});
        $(document).ready(function () {
            var posReport = new PosReport({
                chartType: chartType
            });
            posReport.handleEvents();
        });
        {/literal}
</script>
<div class="clearfix"></div>
<section id="report_dashboard" class="panel widget">
	<div class="panel-heading">
		<i class="icon-bar-chart"></i> {$hs_pos_i18n['dashboard']|escape:'htmlall':'UTF-8'}
	</div>
	<div id="dashtrends_toolbar" class="row">
		<dl class="col-xs-4 col-lg-2 label-tooltip actived" id="sales_report_tab" data-toggle="tooltip" data-original-title="{$hs_pos_i18n['sum_of_revenue_excl_tax_generated_within_the_date_range_by_orders_considered_validated']|escape:'htmlall':'UTF-8'}" data-placement="bottom">
                    <dt>
                        {$hs_pos_i18n['sales']|escape:'htmlall':'UTF-8'}<br />
                        {convertPrice price=$dashboard_data_summary.sales|floatval}
                    </dt>
                    <dd class="data_value size_l"><span id="sales_score"></span></dd>
                    <dd class="dash_trend"><span id="sales_score_trends"></span></dd>
		</dl>
		<dl class="col-xs-4 col-lg-2 label-tooltip" id="orders_report_tab" data-toggle="tooltip" data-original-title="{$hs_pos_i18n['total_number_of_orders_received_within_the_date_range_that_are_considered_validated']|escape:'htmlall':'UTF-8'}" data-placement="bottom">
                    <dt>
                        {$hs_pos_i18n['orders']|escape:'htmlall':'UTF-8'}<br />
                        {$dashboard_data_summary.orders|intval}
                    </dt>
                    <dd class="data_value size_l"><span id="orders_score"></span></dd>
                    <dd class="dash_trend"><span id="orders_score_trends"></span></dd>
		</dl>
		<dl class="col-xs-4 col-lg-2 label-tooltip" id="net_profits_report_tab" data-toggle="tooltip" data-original-title="{$hs_pos_i18n['net_profit_is_a_measure_of_the_profitability_of_a_venture_after_accounting_for_all_ecommerce_costs']|escape:'htmlall':'UTF-8'}" data-placement="bottom">
                    <dt>
                        {$hs_pos_i18n['net_profit']|escape:'htmlall':'UTF-8'} <br />
                        {convertPrice price=$dashboard_data_summary.net_profits|floatval}
                    </dt>
                    <dd class="data_value size_l"><span id="net_profits_score"></span></dd>
                    <dd class="dash_trend"><span id="net_profits_score_trends"></span></dd>
		</dl>
	</div>
	<div id="report">
	</div>
</section>