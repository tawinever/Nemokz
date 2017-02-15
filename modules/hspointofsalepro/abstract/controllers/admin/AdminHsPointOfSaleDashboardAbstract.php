<?php
/**
 * RockPOS - Point of Sale for PrestaShop
 *
 * @author    Hamsa Technologies
 * @copyright Hamsa Technologies
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

require_once dirname(__FILE__).'/AbstractAdminHsPointOfSaleCommon.php';

/**
 * Controller of admin page - Point Of Sale (Abstract)
 */
class AdminHsPointOfSaleDashboardAbstract extends AbstractAdminHsPointOfSaleCommon
{
    public $bootstrap = true;

    /**
     * package chart.
     *
     * @var string
     */
    protected $chart_package = 'corechart';

    /**
     * Chart type: line, column, bar,...
     *
     * @var string
     */
    protected $chart_type = 'line';

    public function initContent()
    {
        $report_employees = Employee::getEmployees();
        $this->initialData();
        $calendar_helper = $this->generateCalendar();
        $pos_report = new PosReport();
        $date_from = $this->context->employee->report_date_from;
        $date_to = $this->context->employee->report_date_to;
        $id_employee = $this->context->employee->report_id_employee;
        $completed_order_references = PosOrder::getCompletedOrderReferences($this->module->name);
        $report_data = $pos_report->getGrossData($date_from, $date_to, $completed_order_references, $id_employee);
        $dashboard_data = $pos_report->refineData($date_from, $date_to, $report_data);
        $dashboard_data_summary = $pos_report->getSumarryData($dashboard_data);
        $this->context->smarty->assign(array(
            'currency' => $this->context->currency,
            'date_from' => $this->context->employee->report_date_from,
            'date_to' => $this->context->employee->report_date_to,
            'current_date' => date('Y-m-d'),
            'id_employee' => $this->context->employee->report_id_employee,
            'report_employees' => $report_employees,
            'dashboard_data' => $dashboard_data,
            'dashboard_data_summary' => $dashboard_data_summary,
            'action' => '#',
            'chart_package' => $this->chart_package,
            'chart_type' => $this->chart_type,
            'calendar' => $calendar_helper,
            'datepickerFrom' => Tools::getValue('datepickerFrom', $this->context->employee->report_date_from),
            'datepickerTo' => Tools::getValue('datepickerTo', $this->context->employee->report_date_to),
            'preselect_date_range' => Tools::getValue('preselectDateRange', $this->context->employee->report_preselect_date_range),
        ));
        parent::initContent();
    }

    protected function initialData()
    {
        $do_update = false;
        if (!isset($this->context->employee->report_preselect_date_range)) {
            $this->context->employee->report_preselect_date_range = 'month';
            $do_update = true;
        }
        if (!isset($this->context->employee->report_id_employee)) {
            $this->context->employee->report_id_employee = 0;
            $do_update = true;
        }
        if (!isset($this->context->employee->report_date_from)) {
            $this->context->employee->report_date_from = date('Y-m-01');
            $do_update = true;
        }
        if (!isset($this->context->employee->report_date_to)) {
            $this->context->employee->report_date_to = date('Y-m-d');
            $do_update = true;
        }
        if (!isset($this->context->employee->report_id_employee)) {
            $this->context->employee->report_id_employee = 0;
            $do_update = true;
        }
        if ($do_update) {
            $this->context->employee->update();
        }
    }

    protected function generateCalendar()
    {
        $calendar_helper = new HelperCalendar();
        $calendar_helper->module = $this->module;
        $calendar_helper->setDateFrom(Tools::getValue('datepickerFrom', $this->context->employee->report_date_from));
        $calendar_helper->setDateTo(Tools::getValue('datepickerTo', $this->context->employee->report_date_to));

        return $calendar_helper->generate();
    }

    public function setMedia()
    {
        $this->module_media_css['admin_dashboard.css'] = 'all';
        $this->module_media_js[] = 'pos_report.js';
        $this->module_media_js[] = 'https://www.google.com/jsapi';
        parent::setMedia();
    }

    public function postProcess()
    {
        $this->processDateRange();
        parent::postProcess();
    }

    public function processDateRange()
    {
        if (Tools::isSubmit('submitDateRange')) {
            if (!Validate::isDate(Tools::getValue('date_from'))
                || !Validate::isDate(Tools::getValue('date_to'))) {
                $this->errors[] = Tools::displayError('The selected date range is not valid.');
            }

            if (!count($this->errors)) {
                $this->context->employee->report_date_from = Tools::getValue('date_from');
                $this->context->employee->report_date_to = Tools::getValue('date_to');
                $this->context->employee->report_id_employee = (int) Tools::getValue('report_id_employee');
                $this->context->employee->report_preselect_date_range = Tools::getValue('preselectDateRange');
                $this->context->employee->update();
            }
        }
    }
}
