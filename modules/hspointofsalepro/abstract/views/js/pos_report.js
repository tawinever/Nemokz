/**
 * RockPOS - Point of Sale for PrestaShop
 *
 * @author    Hamsa Technologies
 * @copyright Hamsa Technologies
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

/**
 * Pos Report
 * @param {json} selectors
 * @returns {PosReport}
 */
var PosReport = function (selectors)
{
     /**
     * Define all selectors default
     */
    this._selectors = {
       refineData: '#refineData',
       idEmployee: '#report_id_employee',
       submitDateRange: 'button[name="submitDateRange"]',
       idSalesReportTab: '#sales_report_tab',
       idOrdersReportTab: '#orders_report_tab',
       idNetProfitsReportTab: '#net_profits_report_tab',
       dashtrendsToolbar: '#dashtrends_toolbar',      
       activedClass: 'actived',
       chartType: 'line',
       googleChartDiv: 'report',
       salesChartColor: '#1777b6',
       ordersChartColor: '#2ca121',
       netProfitsChartColor: '#43459d',
       barWidth: '20',
       currentDate: '#current_date'
    };

    $.extend(this._selectors, selectors);
    
    PosReport.instance = this;
    
    this.handleEvents = function(){
        // make sure chart is reponsive design
        $(window).resize(function(){
            google.setOnLoadCallback(PosReport.instance.drawSalesReport());
        });
        // default show sales report
        google.setOnLoadCallback(PosReport.instance.drawSalesReport());
        $(PosReport.instance._selectors.idNetProfitsReportTab).on('click', function(e){
            e.preventDefault;
            google.setOnLoadCallback(PosReport.instance.drawNetProfitsReport());
            PosReport.instance.removeActivedClass();
            $(this).addClass(PosReport.instance._selectors.activedClass);
        });
        
        $(PosReport.instance._selectors.idOrdersReportTab).on('click', function(e){
            e.preventDefault;
            google.setOnLoadCallback(PosReport.instance.drawOrdersReport());
            PosReport.instance.removeActivedClass();
            $(this).addClass(PosReport.instance._selectors.activedClass);
        });
        
         $(PosReport.instance._selectors.idSalesReportTab).on('click', function(e){
            e.preventDefault;
            google.setOnLoadCallback(PosReport.instance.drawSalesReport());
            PosReport.instance.removeActivedClass();
            $(this).addClass(PosReport.instance._selectors.activedClass);
        });
        
        $(PosReport.instance._selectors.idEmployee).on('change', function(e){
            e.preventDefault;
            PosReport.instance.changeEmployee();
        });
        
        $(PosReport.instance._selectors.idEmployee).on('change', function (e) {
            e.preventDefault;
            PosReport.instance.changeEmployee();
        });
       
    };
    
    this.removeActivedClass = function(){
        $(PosReport.instance._selectors.dashtrendsToolbar).find('dl').removeClass(PosReport.instance._selectors.activedClass);
    };
    
    this.changeEmployee = function(){
        $(PosReport.instance._selectors.submitDateRange).click();
    };
    
    this.drawSalesReport = function () {
        var result = PosReport.instance.reformatedData(dashboardData.sales, salesLabel);
        var data = new google.visualization.DataTable();
        var numberDataPoint = Object.size(dashboardData.sales);
        if (numberDataPoint === 1) {
            data.addColumn('string', dayLabel);
        } else {
            data.addColumn('date', dayLabel);
        }
        data.addColumn('number', salesLabel);
        data.addColumn({type: 'string', role: 'tooltip', p: {'html': true}});
        data.addRows(result);
        var options = {
            height: '400',
            legend: 'none',
            vAxis: {format: 'currency', viewWindowMode: "explicit", viewWindow: {min: 0}},
            tooltip: {isHtml: true},
            series: {
                0: {color: PosReport.instance._selectors.salesChartColor}
            },
            bar: {groupWidth: PosReport.instance._selectors.barWidth}
        };
        PosReport.instance.drawChart(data, options, numberDataPoint);
    };
    
    this.drawOrdersReport = function() {
        var result = [];
        for (var i in dashboardData.orders) {
            var orderDate = new Date(i * 1000);
            if (Object.size(dashboardData.orders) === 1) {
                result.push([orderDate.format('dd/mm/yyyy'), dashboardData.orders[i]]);
            } else {
                result.push([orderDate, dashboardData.orders[i]]);
            }            
        }
        var data = new google.visualization.DataTable();
        var numberDataPoint = Object.size(dashboardData.orders);
        if (numberDataPoint === 1) {
            data.addColumn('string', dayLabel);
        } else {
            data.addColumn('date', dayLabel);
        }
        data.addColumn('number', ordersLabel);
        data.addRows(result);
        var options = {
            height: '400',
            legend: 'none',
            vAxis: {viewWindowMode: "explicit", viewWindow: {min: 0}},
            series: {
                0: {color: PosReport.instance._selectors.ordersChartColor}
            },
            bar: {groupWidth: PosReport.instance._selectors.barWidth}
        };
        PosReport.instance.drawChart(data, options, numberDataPoint);
    };
    
    this.drawNetProfitsReport = function(){
        var result = PosReport.instance.reformatedData(dashboardData.net_profits, netProfitsLabel);
        var data = new google.visualization.DataTable();
        var numberDataPoint = Object.size(dashboardData.net_profits);
        if (numberDataPoint === 1) {
            data.addColumn('string', dayLabel);
        } else {
            data.addColumn('date', dayLabel);
        }
        data.addColumn('number', netProfitsLabel);
        data.addColumn({type: 'string', role: 'tooltip', p: {'html': true}});
        data.addRows(result);
        var options = {
            height: '400',
            legend: 'none',
            vAxis: {format: 'currency', viewWindowMode: "explicit", viewWindow: {min: 0}},
            tooltip: {isHtml: true},
            series: {
                0: {color: PosReport.instance._selectors.netProfitsChartColor}
            },
            bar: {groupWidth: PosReport.instance._selectors.barWidth}
        };
        PosReport.instance.drawChart(data, options, numberDataPoint);
    };
    
    this.drawChart = function(data, options, numberDataPoint){
        if (PosReport.instance._selectors.chartType == 'line' && numberDataPoint > 1) {
            var chart = new google.visualization.LineChart(document.getElementById(PosReport.instance._selectors.googleChartDiv));
        } else if (numberDataPoint <= 1 || PosReport.instance._selectors.chartType == 'column'){
            var chart = new google.visualization.ColumnChart(document.getElementById(PosReport.instance._selectors.googleChartDiv));
        } 
        chart.draw(data, options);
    };
    
    this.reformatedData = function(reportData, label){
        var result = [];
        for (var i in reportData) {
            var saleDate = new Date(i * 1000);
            var toolTipFormated = '<div class="report-tool-tip">'
                    + saleDate.format('dd/mm/yyyy')
                    + '<br />'
                    + label + ' : ' + formatCurrency(reportData[i], currencyFormat, currencySign, currencyBlank)
                    + '</div>';
            if (Object.size(dashboardData.net_profits) === 1) {
                result.push([saleDate.format('dd/mm/yyyy'), reportData[i], toolTipFormated]);
            } else {
                result.push([saleDate, reportData[i], toolTipFormated]);
            }
        }
        return result;
    };
};
Object.size = function(obj) {
    var size = 0, key;
    for (key in obj) {
        if (obj.hasOwnProperty(key)) size++;
    }
    return size;
};
