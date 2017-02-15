<?php
/**
 * RockPOS - Point of Sale for PrestaShop
 *
 * @author    Hamsa Technologies
 * @copyright Hamsa Technologies
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

require_once dirname(__FILE__) . '/AbstractAdminHsPointOfSaleCommon.php';

/**
 * Controller of admin page - Point Of Sale (Abstract)
 */
class AdminHsPointOfSaleReportsAbstract extends AbstractAdminHsPointOfSaleCommon
{
    /**
     *
     * @var string 
     */
    protected $date_format = 'YYYY-MM-DD';

    /**
     * construct.
     */
    public function __construct()
    {
        $this->bootstrap = true;
        parent::__construct();
    }

    /**
     * @see parent::init()
     */
    public function init()
    {
        parent::init();
    }

    public function setMedia()
    {
        $this->module_media_css['admin_reports.css'] = 'all';
        $this->module_media_css['pos_date_picker.css'] = 'all';
        $this->module_media_js = array_merge($this->module_media_js, array(
            'react_reactdom.js'
        ));
        parent::setMedia();
        Hook::exec('actionAdminPosReportsControllerSetMedia');
    }

    /**
     * @see parent::initContent()
     */
    public function initContent()
    {
        parent::initContent();
        $modules = Hook::getHookModuleExecList('displayPosReport');
        if (!empty($modules)) {
            foreach ($modules as $key => &$module) {
                $instance_module = Module::getInstanceByName($module['module']);
                if ($instance_module) {
                    $module['display_name'] = str_replace('Rockpos', 'RockPOS', $instance_module->displayName);
                } else {
                    unset($modules[$key]);
                }
            }
            $this->context->smarty->assign(array(
                'modules' => $modules,
                'durations' => $this->getDurations(),
            ));
        } else {
            $this->context->smarty->assign(array(
                'addons_url' => $this->context->link->getAdminLink($this->module->pos_tabs['AdminHsPointOfSaleAddons']['tab_class'])
            ));
            $this->displayWarning($this->module->i18n['oops_nothing_to_display']);
        }
    }

    /**
     * 
     * @return array
     * <pre>
     * array (
     *  string => array (
     *         'label'	=> string,
     *  ),
     * ...
     * ) </pre>
     */
    protected function getDurations()
    {
        return array(
            PosConstants::DURATION_TODAY => array(
                'label' => $this->module->i18n['today'],
            ),
            PosConstants::DURATION_YESTERDAY => array(
                'label' => $this->module->i18n['yesterday'],
            ),
            PosConstants::DURATION_LAST_7_DAYS => array(
                'label' => $this->module->i18n['last_7_days'],
            ),
            PosConstants::DURATION_LAST_WEEK => array(
                'label' => $this->module->i18n['last_week'],
            ),
            PosConstants::DURATION_LAST_MONTH => array(
                'label' => $this->module->i18n['last_month'],
            ),
            PosConstants::DURATION_LAST_12_MONTHS => array(
                'label' => $this->module->i18n['last_12_months'],
            ),
            PosConstants::DURATION_CUSTOM_DATES => array(
                'label' => $this->module->i18n['custom_dates'],
            )
        );
    }
    
    public function ajaxProcessGetReportData()
    {
        $module_name = Tools::getValue('module_name');
        $this->ajax_json['message'] = $this->module->i18n['oops_nothing_to_display'];
        if (Module::isEnabled($module_name)) {
            $instance_module = Module::getInstanceByName($module_name);
            if ($instance_module instanceof Module) {
                $params = array(
                    'date_to' => Tools::getValue('date_to'),
                    'date_from' => Tools::getValue('date_from'),
                    'module_name' => $this->module->name
                );
                try {
                    $this->ajax_json['data'] = Hook::exec('displayPosReport', $params, $instance_module->id);
                    $this->ajax_json['success'] = true;
                } catch (Exception $exc) {
                    $this->ajax_json['message'] = $this->module->i18n['oops_nothing_to_display'];
                }
            }
        }
    }
}
