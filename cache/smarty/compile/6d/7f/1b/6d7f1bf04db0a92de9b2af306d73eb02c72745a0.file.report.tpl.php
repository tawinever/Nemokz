<?php /* Smarty version Smarty-3.1.19, created on 2016-11-27 01:09:46
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/views/templates/admin/hs_point_of_sale_dashboard_abstract/report.tpl" */ ?>
<?php /*%%SmartyHeaderCode:710959835839ddfa691539-50011959%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6d7f1bf04db0a92de9b2af306d73eb02c72745a0' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/views/templates/admin/hs_point_of_sale_dashboard_abstract/report.tpl',
      1 => 1480187258,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '710959835839ddfa691539-50011959',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'currency' => 0,
    'dashboard_data' => 0,
    'hs_pos_i18n' => 0,
    'chart_package' => 0,
    'chart_type' => 0,
    'dashboard_data_summary' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5839ddfa6cbe62_24269050',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5839ddfa6cbe62_24269050')) {function content_5839ddfa6cbe62_24269050($_smarty_tpl) {?>
 
<script>
	var currencyFormat = <?php echo intval($_smarty_tpl->tpl_vars['currency']->value->format);?>
;
	var currencySign = '<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['currency']->value->sign, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
';
	var currencyBlank = <?php echo intval($_smarty_tpl->tpl_vars['currency']->value->blank);?>
;
	var priceDisplayPrecision = 0;
        var dashboardData = <?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['json_encode'][0][0]->jsonEncode($_smarty_tpl->tpl_vars['dashboard_data']->value));?>
;
        var salesLabel = '<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['sales'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
';
        var ordersLabel = '<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['orders'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
';
        var netProfitsLabel = '<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['net_profit'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
';
        var dayLabel = '<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['day'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
';
        var chartPackage = '<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['chart_package']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
';
        var chartType = '<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['chart_type']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
';
        
        google.load('visualization', '1.1', {packages: chartPackage});
        $(document).ready(function () {
            var posReport = new PosReport({
                chartType: chartType
            });
            posReport.handleEvents();
        });
        
</script>
<div class="clearfix"></div>
<section id="report_dashboard" class="panel widget">
	<div class="panel-heading">
		<i class="icon-bar-chart"></i> <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['dashboard'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

	</div>
	<div id="dashtrends_toolbar" class="row">
		<dl class="col-xs-4 col-lg-2 label-tooltip actived" id="sales_report_tab" data-toggle="tooltip" data-original-title="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['sum_of_revenue_excl_tax_generated_within_the_date_range_by_orders_considered_validated'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" data-placement="bottom">
                    <dt>
                        <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['sales'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<br />
                        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>floatval($_smarty_tpl->tpl_vars['dashboard_data_summary']->value['sales'])),$_smarty_tpl);?>

                    </dt>
                    <dd class="data_value size_l"><span id="sales_score"></span></dd>
                    <dd class="dash_trend"><span id="sales_score_trends"></span></dd>
		</dl>
		<dl class="col-xs-4 col-lg-2 label-tooltip" id="orders_report_tab" data-toggle="tooltip" data-original-title="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['total_number_of_orders_received_within_the_date_range_that_are_considered_validated'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" data-placement="bottom">
                    <dt>
                        <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['orders'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<br />
                        <?php echo intval($_smarty_tpl->tpl_vars['dashboard_data_summary']->value['orders']);?>

                    </dt>
                    <dd class="data_value size_l"><span id="orders_score"></span></dd>
                    <dd class="dash_trend"><span id="orders_score_trends"></span></dd>
		</dl>
		<dl class="col-xs-4 col-lg-2 label-tooltip" id="net_profits_report_tab" data-toggle="tooltip" data-original-title="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['net_profit_is_a_measure_of_the_profitability_of_a_venture_after_accounting_for_all_ecommerce_costs'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" data-placement="bottom">
                    <dt>
                        <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['net_profit'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
 <br />
                        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>floatval($_smarty_tpl->tpl_vars['dashboard_data_summary']->value['net_profits'])),$_smarty_tpl);?>

                    </dt>
                    <dd class="data_value size_l"><span id="net_profits_score"></span></dd>
                    <dd class="dash_trend"><span id="net_profits_score_trends"></span></dd>
		</dl>
	</div>
	<div id="report">
	</div>
</section><?php }} ?>
