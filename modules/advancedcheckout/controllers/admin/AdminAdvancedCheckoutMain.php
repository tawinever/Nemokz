<?php
/**
* Module is prohibited to sales! Violation of this condition leads to the deprivation of the license!
*
* @category  Front Office Features
* @package   Advanced Checkout Module
* @author    Maxim Bespechalnih <2343319@gmail.com>
* @copyright 2013-2015 Max
* @license   license.txt in the module folder.
*/

class AdminAdvancedCheckoutMainController extends ModuleAdminController
{
    public $toolbar_btn;
    public $form;

    public function __construct()
    {
        $this->bootstrap = true;
        $this->table = 'advcheckout';
        $this->className = 'FieldClass';
        $this->bulk_actions = false;
        parent::__construct();
        require_once(dirname(__FILE__).'/../../classes/PickupClass.php');
        require_once(dirname(__FILE__).'/../../classes/Unpay.php');
        require_once(dirname(__FILE__).'/../../classes/ShipClass.php');
        require_once(dirname(__FILE__).'/../../classes/CustomClass.php');
        require_once(dirname(__FILE__).'/../../classes/FieldClass.php');
        require_once(dirname(__FILE__).'/AdminAdvPickup.php');
        require_once(dirname(__FILE__).'/AdminAdvUPCheckout.php');
        require_once(dirname(__FILE__).'/AdminAdvShipCheckout.php');
        require_once(dirname(__FILE__).'/AdminAdvCheckout.php');
        if (_PS_VERSION_ >= '1.6.0.0') {
            $this->_is_new = true;
        } elseif (_PS_VERSION_ >= '1.5.0.0' && _PS_VERSION_ <= '1.6.0.0') {
            $this->_is_new = false;
        }

        $this->pickup = new AdminAdvPickupController();
        $this->pickup->init();
        $this->up = new AdminAdvUPCheckoutController();
        $this->up->init();
        $this->ship = new AdminAdvShipCheckoutController();
        $this->ship->init();
        $this->fields = new AdminAdvCheckoutController();
        $this->fields->init();
    }

    public function initBreadcrumbs($tab_id = null, $tabs = null)
    {
        $tabs = Tab::recursiveTab($tab_id, $tabs);
        $dummy = array('name' => '', 'href' => '', 'icon' => '');
        $breadcrumbs2 = array(
            'container' => $dummy,
            'tab' => $dummy,
            'action' => $dummy
        );

        $breadcrumbs2['container']['name'] = $this->l('Settings');
        $breadcrumbs2['container']['href'] = __PS_BASE_URI__.basename(_PS_ADMIN_DIR_).
            '/'.$this->getAdminLink('AdminAdvancedCheckoutMain');
        $breadcrumbs2['container']['icon'] = 'icon-AdminParentPreferences';
        $this->context->smarty->assign('breadcrumbs2', $breadcrumbs2);
    }

    public function getAdminLink($controller, $with_token = true)
    {
        $id_lang = Context::getContext()->language->id;
        $params = $with_token ? array('token' => Tools::getAdminTokenLite($controller)) : array();
        return Dispatcher::getInstance()->createUrl($controller, $id_lang, $params, false);
    }

    public function postProcess()
    {
        if (Tools::getValue('cki') == 1) {
            $this->context->cookie->this_curr_tab = Tools::GetValue('name');
            $this->context->cookie->write();
            die(1);
        }

        if (Tools::getValue('action') == 'updatePositions' && Tools::isSubmit('module')) {
            $position_array = Tools::getValue('module');
            $i = 0;
            $array2 = array();
            foreach ($position_array as &$p) {
                if ($this->_is_new) {
                    $p = str_replace('tr_position_', '', $p);
                    $vhod = strpos($p, 'id_');
                    $data = explode('_', $p);
                    if ($vhod === false) {
                        $array2[$data[0]] = $i;
                    } else {
                        $array2[$data[0].'_'.$data[1]] = $i;
                    }
                } else {
                    $p = str_replace('tr_', '', $p);
                    $vhod = strpos($p, 'id_');
                    $data = explode('_', $p);
                    if ($vhod === false) {
                        $array2[$data[1]] = $i;
                    } else {
                        $array2[$data[1].'_'.$data[2]] = $i;
                    }
                }
                $i++;
            }

            Configuration::UpdateValue('ADV_PAYMENT_POS', serialize($array2));
            die(1);
        }

        $this->ship->postProcess();
        $this->pickup->postProcess();
        $this->up->postProcess();
        $this->fields->postProcess();
        parent::postProcess();

        if (Tools::isSubmit('submitAddadvcheckout_unpay') || Tools::isSubmit('addadvcheckout_unpay')
        || Tools::isSubmit('updateadvcheckout_unpay') || count($this->up->errors)) {
            $this->display = 'edit_unpay';
        }

        if (Tools::isSubmit('submitAddadvcheckout_pickup') || Tools::isSubmit('addadvcheckout_pickup')
        || Tools::isSubmit('updateadvcheckout_pickup') || count($this->pickup->errors)) {
            $this->display = 'edit_pickup';
        }

        if (Tools::isSubmit('submitAddadvcheckout_ship_to_pay') || Tools::isSubmit('addadvcheckout_ship_to_pay')
        || Tools::isSubmit('updateadvcheckout_ship_to_pay') || count($this->ship->errors)) {
            $this->display = 'edit_ship_to_pay';
        }

        if (Tools::isSubmit('submitAddadvcheckout') || Tools::isSubmit('addadvcheckout') ||
            Tools::isSubmit('updateadvcheckout') || count($this->fields->errors)) {
            $this->display = 'edit_fields';
        }

        if (isset($this->up->errors)) {
            $this->errors = array_merge($this->errors, $this->up->errors);
        }

        if (isset($this->pickup->errors)) {
            $this->errors = array_merge($this->errors, $this->pickup->errors);
        }

        if (isset($this->fields->errors)) {
            $this->errors = array_merge($this->errors, $this->fields->errors);
        }

        if (isset($this->ship->errors)) {
            $this->errors = array_merge($this->errors, $this->ship->errors);
        }
    }

    public function initContent()
    {
        if (!isset($this->context->cookie->this_curr_tab) || $this->context->cookie->this_curr_tab == '') {
            $this->context->cookie->this_curr_tab = 'settings';
            $this->context->cookie->write();
        }

        if ($this->_is_new) {
            $this->initPageHeaderToolbar();
        }

        $this->ship->token = $this->token;
        $this->up->token = $this->token;
        $this->pickup->token = $this->token;
        $this->fields->token = $this->token;
        $controller_name = 'AdminAdvancedCheckoutMain';
        $controller_url = $this->context->link->getAdminLink($controller_name);
        $path_module_http = __PS_BASE_URI__.'modules/advancedcheckout/';
        $html_map = $this->context->smarty->fetch(_PS_MODULE_DIR_.'advancedcheckout/views/templates/admin/map.tpl');

        $this->context->smarty->assign(array(
            'tkn' => Tools::getAdminTokenLite('AdminAdvancedCheckoutMain'),
            'idm' => $this->context->employee->id,
            'nwps' => $this->_is_new,
            'urldir' => $path_module_http,
            'this_path_ssl' => Tools::getShopDomainSsl(true, true).__PS_BASE_URI__.'modules/'.$this->module->name.'/',
            'module_name' => $this->module->name,
            'module_version' => $this->module->version,
            'ps_version' => (bool)version_compare(_PS_VERSION_, '1.6', '>'),
            'controller_url' => $controller_url,
            'cross_link' => '',
            'pickup_html' => $this->pickup->renderList(),
            'up_html' => $this->up->renderList(),
            'dnp_html' => $this->ship->renderList(),
            'pimage_html' => $this->initPimage(),
            'fields_html' => $this->fields->renderList(),
            'main_html' => $this->initMain().$html_map,
            'curr_tab' => $this->context->cookie->this_curr_tab ? $this->context->cookie->this_curr_tab : 'settings',
            'form' => $this->form,
            'title' => $this->l('AdvancedCheckout'),
            'page_header_toolbar_title' => $this->l('AdvancedCheckout'),
        ));

        if ($this->display == 'edit_unpay') {
            $this->content .= $this->up->renderForm();
        } elseif ($this->display == 'edit_ship_to_pay') {
            $this->content .= $this->ship->renderForm();
        } elseif ($this->display == 'edit_pickup') {
            $this->content .= $this->pickup->renderForm();
        } elseif ($this->display == 'edit_fields') {
            $this->content .= $this->fields->renderForm();
        } else {
            if ($this->_is_new) {
                $this->content .= $this->context->smarty->fetch(
                    _PS_MODULE_DIR_.'advancedcheckout/views/templates/admin/configuration.tpl'
                );
            } else {
                $this->content .= $this->context->smarty->fetch(
                    _PS_MODULE_DIR_.'advancedcheckout/views/templates/admin/configuration_old.tpl'
                );
            }
        }

        $this->context->smarty->assign(array(
            'content' => $this->content,
        ));
    }

    private function initform($controller, $id)
    {
        $helper = new HelperForm();
        $helper->module = $this->module;
        $helper->name_controller = $controller;
        $helper->identifier = $id;
        $helper->token = Tools::getAdminTokenLite('AdminAdvancedCheckoutMain');
        $helper->languages = $this->context->controller->_languages;
        $helper->currentIndex = AdminController::$currentIndex;
        $helper->default_form_language = $this->context->controller->default_form_language;
        $helper->allow_employee_form_lang = $this->context->controller->allow_employee_form_lang;
        $helper->toolbar_scroll = false;
        $helper->show_toolbar = false;
        $helper->toolbar_btn = $this->initToolbar($id);
        return $helper;
    }

    private function initlist($sh, $controller, $id, $title, $action, $pos = '')
    {
        $helper = new HelperList();
        $helper->shopLinkType = '';
        $helper->simple_header = $sh;
        $helper->identifier = $id;
        $helper->position_identifier = $pos;
        $helper->position_group_identifier = 'position';
        $helper->table = $controller;
        $helper->actions = $action;
        $helper->show_toolbar = false;
        $helper->module = $this->module;
        $helper->list_no_link = true;
        $helper->title = $title;
        $helper->token = Tools::getAdminTokenLite('AdminAdvancedCheckoutMain');
        $helper->currentIndex = AdminController::$currentIndex;
        $helper->orderBy = 'position';
        $helper->orderWay = 'ASC';
        $helper->toolbar_btn = $this->initToolbar($id);
        return $helper;
    }

    public function initToolbar($id = '')
    {
        $current_index = AdminController::$currentIndex;
        $token = Tools::getAdminTokenLite('AdminAdvancedCheckoutMain');
        $back = Tools::safeOutput(Tools::getValue('back', ''));
        if (!isset($back) || empty($back)) {
            $back = $current_index.'&token='.$token;
        }

        $this->toolbar_btn['new'] = array(
            'href' => $current_index.'&add_'.$id.'&token='.$token,
            'desc' => $this->l('Add new')
        );

        return $this->toolbar_btn;
    }

    public function initPimage()
    {
        $html = '';
        $path_img_module = __PS_BASE_URI__.'modules/advancedcheckout/views/img/payments/';
        $path_module_http = __PS_BASE_URI__.'modules/advancedcheckout/';
        $path_img = _PS_MODULE_DIR_.'advancedcheckout/views/img/payments/';
        $result = $this->getpayment();
        $this->context->smarty->assign(array(
            'tkn' => Tools::getAdminTokenLite('AdminAdvancedCheckoutMain'),
            'idm' => $this->context->employee->id,
            'nwps' => $this->_is_new,
            'urldir' => $path_module_http
        ));

        $pos = unserialize(Configuration::get('ADV_PAYMENT_POS'));
        $i = 0;
        $psort = array();
        foreach ($result as $k => &$r) {
            $file = $path_img.$r['module'].'.gif';
            $img = '';
            if (file_exists($file)) {
                $img = '<img width="86" class="'.$r['module'].'" id="img_'.$r['module'].
                    '" height="49" src="'.$path_img_module.$r['module'].'.gif" />';
                $r['button_del'] = '<input type="button" class="button btn btn-default pull-right reseti" 
                id="'.$r['module'].'" value="'.$this->l('Reset').'" />';
            } else {
                $img = '<img width="86" class="'.$r['module'].'" id="img_'.$r['module'].
                    '" height="49" src="'.$path_img_module.'default.png" />';
                $r['button_del'] = '---';
            }

            if (count($pos) && isset($pos[$r['id_module']])) {
                $position = $pos[$r['id_module']] ? $pos[$r['id_module']] : 0;
            } else {
                $position = $i;
            }

            $r['button'] = ' <div class="file_upload">
                                <input type="button" class="button btn btn-default pull-right uplimg" id="uploadImage_'.
                                $r['module'].'" value="'.$this->l('Upload').'" />
                                <div>Файл не выбран</div>
                                <input type="file" name="'.$r['module'].'" id="'.
                                $r['module'].'" nm="'.$this->l('Reset').'">
                            </div>';
            $r['logo'] = $img;
            $r['position'] = $position;
            $i++;
            $psort[$k] = $position;
        }

        array_multisort($psort, SORT_ASC, $result);

        $fields_list = array(
            'id_module' => array(
                'title' => $this->l('Module ID'),
                'type' => 'text',
            ),
            'logo' => array(
                'title' => $this->l('Logo payment method'),
                'type' => 'date',
            ),
            'name_lang' => array(
                'title' => $this->l('Name payment method'),
                'type' => 'text',
            ),
            'position' => array(
                'title' => $this->l('Position'),
                'position' => 'position',
                'align' => 'center',
                'class' => 'fixed-width-xs',
                'ajax' => true
            ),
            'button' => array(
                'title' => $this->l('Change image'),
                'type' => 'date',
                'align' => 'center',
                'remove_onclick' => true
            ),
            'button_del' => array(
                'title' => $this->l('Reset image'),
                'type' => 'date',
                'align' => 'center',
                'remove_onclick' => true
            ),
        );

        $html .= $this->initlist(
            true,
            's',
            'id_module',
            $this->l('UPLOAD IMAGE FOR EACH METHOD OF PAYMENT Only').
            $this->l('gif images. Recommended size: 86x49 pixels'),
            array(),
            'position'
        )->generateList($result, $fields_list);
        $html .= '<div style="display: inline-block;"><p><img style="float:left; width:10%;" width="86" height="49" 
        src="'.$path_img_module.'default.png" /><p style="width:85%; float:right;">'.
        $this->l(' -- The standard picture for the module.').
        $this->l('Caution If the module contains several types of payments, you can only use standard images').
        $this->l('(change will have no effect).').'</p></p></div>';
        return $html;
    }

    public function updateD()
    {
        if (Tools::isSubmit('submitColor')) {
            Configuration::updateValue('color_pick_1', Tools::getValue('color_pick_1'));
            Configuration::updateValue('color_pick_2', Tools::getValue('color_pick_2'));
            Configuration::updateValue('color_pick_3', Tools::getValue('color_pick_3'));
            Configuration::updateValue('color_pick_4', Tools::getValue('color_pick_4'));
            Configuration::updateValue('color_pick_7', Tools::getValue('color_pick_7'));
            Configuration::updateValue('city_refresh', Tools::getValue('all_refresh_1'));
            Configuration::updateValue('postcode_refresh', Tools::getValue('all_refresh_2'));
            Configuration::updateValue('country_refresh', Tools::getValue('all_refresh_3'));
            Configuration::updateValue('state_refresh', Tools::getValue('all_refresh_4'));
            Configuration::updateValue('tax_view', Tools::getValue('hide_1'));
            Configuration::updateValue('columns_checkout', Tools::getValue('columns_checkout'));
            Configuration::updateValue('comment_field', Tools::getValue('comment_field'));
            Configuration::updateValue('adv_show_carrier', Tools::getValue('hide_2'));
            Configuration::updateValue('adv_show_payment', Tools::getValue('hide_3'));
            Configuration::updateValue('adv_show_cart', Tools::getValue('hide_4'));
            Configuration::updateValue('adv_show_zalivka', Tools::getValue('hide_5'));
            Configuration::updateValue('adv_show_oc', Tools::getValue('hide_6'));
            Configuration::updateValue('adv_circle', Tools::getValue('hide_7'));
            Configuration::updateValue('adv_ainvoice', Tools::getValue('hide_8'));
            Configuration::updateValue('cm_longitude', Tools::getValue('cm_longitude'));
            Configuration::updateValue('cm_latitude', Tools::getValue('cm_latitude'));
            Configuration::updateValue('carrier_pickup', Tools::getValue('carrier_pickup'));
            Configuration::updateValue('maps_pickup_on', Tools::getValue('maps_pickup_on'));
            Configuration::updateValue('def_registration_group', Tools::getValue('def_registration_group'));
            Configuration::updateValue('def_registration_group_guest', Tools::getValue('def_registration_group_guest'));
        }
    }

    public function initMain()
    {
        $this->updateD();
        $carriers = Carrier::getCarriers(Context::getContext()->language->id, true, false, false, null, 5);
        $groups = Group::getGroups(Context::getContext()->language->id, true);
        $this->fields_form[0]['form'] = array(
            'legend' => array(
                'title' => $this->l('Settings color and columns'),
                'icon' => 'icon-list-alt'
            ),
            'input' => array(
                array(
                    'type' => 'text',
                    'label' => $this->l('Main color'),
                    'name' => 'color_pick_1',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Border color'),
                    'name' => 'color_pick_2',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Text color Panel'),
                    'name' => 'color_pick_7',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Body color'),
                    'name' => 'color_pick_3',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Text color'),
                    'name' => 'color_pick_4',
                ),
                array(
                    'type' => 'checkbox',
                    'label' => $this->l('Refresh on change fields:'),
                    'name' => 'all_refresh',
                    'values' => array(
                        'query' => array(
                            array(
                                'id' => 1,
                                'name' => $this->l('City')
                            ),
                            array(
                                'id' => 2,
                                'name' => $this->l('Postcode')
                            ),
                            array(
                                'id' => 3,
                                'name' => $this->l('Country')
                            ),
                            array(
                                'id' => 4,
                                'name' => $this->l('State')
                            ),
                        ),
                        'id' => 'id',
                        'name' => 'name'
                    ),
                ),
                array(
                    'type' => 'checkbox',
                    'label' => $this->l('Hide'),
                    'name' => 'hide',
                    'values' => array(
                        'query' => array(
                            array(
                                'id' => 1,
                                'name' => $this->l('Tax incl.\exl. shipping list')
                            ),
                            array(
                                'id' => 2,
                                'name' => $this->l('Carriers (Before turning this option,').
                                $this->l('make sure that included At least one method delivery)')
                            ),
                            array(
                                'id' => 3,
                                'name' => $this->l('Payments (Before turning this option,').
                                $this->l(' make sure that included At least one method payment)')
                            ),
                            array(
                                'id' => 4,
                                'name' => $this->l('Shoping Cart')
                            ),
                            array(
                                'id' => 5,
                                'name' => $this->l('Block color fill')
                            ),
                            array(
                                'id' => 6,
                                'name' => $this->l('Block comment order')
                            ),
                            array(
                                'id' => 7,
                                'name' => $this->l('Border radius')
                            ),
                            array(
                                'id' => 8,
                                'name' => $this->l('Address invoice')
                            ),
                        ),
                        'id' => 'id',
                        'name' => 'name'
                    ),
                ),
                array(
                    'type' => 'select',
                    'label' => $this->l('Columns qty'),
                    'name' => 'columns_checkout',
                    'required' => false,
                    'col' => '4',
                    'default_value' => 2,
                    'options' => array(
                        'query' => array(
                            array('id' => 1, 'name' => 1),
                            array('id' => 2, 'name' => 2),
                            array('id' => 3, 'name' => 3),
                        ),
                        'id' => 'id',
                        'name' => 'name'
                    )
                ),
                array(
                    'type' => 'select',
                    'label' => $this->l('Default registration group'),
                    'name' => 'def_registration_group',
                    'required' => false,
                    'col' => '4',
                    'default_value' => 2,
                    'options' => array(
                        'query' => $groups,
                        'id' => 'id_group',
                        'name' => 'name'
                    )
                ),
                array(
                    'type' => 'select',
                    'label' => $this->l('Default registration group guest'),
                    'name' => 'def_registration_group_guest',
                    'required' => false,
                    'col' => '4',
                    'default_value' => 2,
                    'options' => array(
                        'query' => $groups,
                        'id' => 'id_group',
                        'name' => 'name'
                    )
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->l('Enable pickup center'),
                    'name' => 'maps_pickup_on',
                    'required' => false,
                    'class' => 't',
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'active_on',
                            'value' => 1,
                            'label' => $this->l('Enabled')
                        ),
                        array(
                            'id' => 'active_off',
                            'value' => 0,
                            'label' => $this->l('Disabled')
                        )
                    ),
                ),
                array(
                    'type' => 'select',
                    'label' => $this->l('Comment field'),
                    'name' => 'comment_field',
                    'required' => false,
                    'col' => '4',
                    'default_value' => 2,
                    'options' => array(
                        'query' => array(
                            array('id' => 'carrier', 'name' => $this->l('Carrier')),
                            array('id' => 'payment', 'name' => $this->l('Payment')),
                            array('id' => 'cart', 'name' => $this->l('Cart')),
                        ),
                        'id' => 'id',
                        'name' => 'name'
                    )
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Center maps latitude'),
                    'name' => 'cm_latitude',
                    'desc' => '<a class="gotomap" style="cursor:pointer;">'.$this->l('Mark on the map.').'</a>'
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Center maps longitude'),
                    'name' => 'cm_longitude',
                    'desc' => '<a class="gotomap" style="cursor:pointer;">'.$this->l('Mark on the map.').'</a>'
                ),
                array(
                    'type' => 'select',
                    'label' => $this->l('Carrier pickup'),
                    'name' => 'carrier_pickup',
                    'required' => false,
                    'col' => '4',
                    'default_value' => 2,
                    'options' => array(
                        'query' => $carriers,
                        'id' => 'id_carrier',
                        'name' => 'name'
                    )
                )
            ),
            'submit' => array(
                'name' => 'submitColor',
                'title' => $this->l('Save'),
            )
        );

        $this->context->controller->getLanguages();
        $this->fields_value['color_pick_1'] = Configuration::get('color_pick_1');
        $this->fields_value['color_pick_2'] = Configuration::get('color_pick_2');
        $this->fields_value['color_pick_3'] = Configuration::get('color_pick_3');
        $this->fields_value['color_pick_4'] = Configuration::get('color_pick_4');
        $this->fields_value['color_pick_7'] = Configuration::get('color_pick_7');
        $this->fields_value['all_refresh_1'] = Configuration::get('city_refresh');
        $this->fields_value['all_refresh_2'] = Configuration::get('postcode_refresh');
        $this->fields_value['all_refresh_3'] = Configuration::get('country_refresh');
        $this->fields_value['all_refresh_4'] = Configuration::get('state_refresh');
        $this->fields_value['columns_checkout'] = Configuration::get('columns_checkout');
        $this->fields_value['comment_field'] = Configuration::get('comment_field');
        $this->fields_value['hide_1'] = Configuration::get('tax_view');
        $this->fields_value['hide_3'] = Configuration::get('adv_show_payment');
        $this->fields_value['hide_2'] = Configuration::get('adv_show_carrier');
        $this->fields_value['hide_4'] = Configuration::get('adv_show_cart');
        $this->fields_value['hide_5'] = Configuration::get('adv_show_zalivka');
        $this->fields_value['hide_6'] = Configuration::get('adv_show_oc');
        $this->fields_value['hide_7'] = Configuration::get('adv_circle');
        $this->fields_value['hide_8'] = Configuration::get('adv_ainvoice');
        $this->fields_value['def_registration_group'] = Configuration::get('def_registration_group');
        $this->fields_value['def_registration_group_guest'] = Configuration::get('def_registration_group_guest');
        $this->fields_value['maps_pickup_on'] = Configuration::get('maps_pickup_on');
        $this->fields_value['carrier_pickup'] = Configuration::get('carrier_pickup');
        $this->fields_value['cm_latitude'] = Configuration::get('cm_latitude');
        $this->fields_value['cm_longitude'] = Configuration::get('cm_longitude');
        $helper = $this->initform('mainsettings', '');
        $helper->submit_action = '';
        $helper->title = $this->l('Main Settings');
        $helper->fields_value = $this->fields_value;
        return $helper->generateForm($this->fields_form);
    }

    public function getpayment()
    {
        $context = Context::getContext();
        $sql = new DbQuery();
        $sql->select('h.`name` as hook, m.`id_module`, h.`id_hook`, m.`name` as module, h.`live_edit`');
        $sql->from('module', 'm');
        if ($this->_is_new) {
            $sql->join(Shop::addSqlAssociation(
                'module',
                'm',
                true,
                'module_shop.enable_device & '.(int)Context::getContext()->getDevice()
            ));
        }

        $sql->innerJoin('module_shop', 'ms', 'ms.`id_module` = m.`id_module`');
        $sql->innerJoin('hook_module', 'hm', 'hm.`id_module` = m.`id_module`');
        $sql->innerJoin('hook', 'h', 'hm.`id_hook` = h.`id_hook`');
        $sql->where('h.name = "displayPayment"');
        if (Validate::isLoadedObject($context->country)) {
            $sql->where('(h.name = "displayPayment" AND (SELECT id_country FROM '._DB_PREFIX_.'module_country mc 
                        WHERE mc.id_module = m.id_module AND id_country = '.(int)$context->country->id.' 
                        AND id_shop = '.(int)$context->shop->id.' LIMIT 1) = '.(int)$context->country->id.')');
        }
        if (Validate::isLoadedObject($context->currency)) {
            $sql->where(
                '(h.name = "displayPayment" AND (SELECT id_currency FROM '._DB_PREFIX_.'module_currency mcr 
                WHERE mcr.id_module = m.id_module 
                AND id_currency IN ('.(int)$context->currency->id.
                ', -1, -2) LIMIT 1) IN ('.(int)$context->currency->id.', -1, -2))'
            );
        }

        if (Validate::isLoadedObject($context->shop)) {
            $sql->where('hm.id_shop = '.(int)$context->shop->id);
        }
        $sql->groupBy('hm.id_hook, hm.id_module');
        $sql->orderBy('hm.`position`');
        $result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
        if ($result) {
            foreach ($result as $k => &$module) {
                if (($module_instance = Module::getInstanceByName($module['module']))) {
                    $result[$k]['name_lang'] = $module_instance->displayName;
                }
            }
        }

        $unpay = Unpay::getUnpay($context->cookie->id_lang);
        $up = array();
        if (isset($unpay) && count($unpay)) {
            foreach ($unpay as $k => $u) {
                $up[$k]['name_lang'] = $u['name'].' (unpay)';
                $up[$k]['id_module'] = 'id_'.$u['id_unpay'];
                $up[$k]['module'] = 'unpay_'.$u['id_unpay'];
            }
            $result = array_merge($result, $up);
        }

        return $result;
    }

    public function setMedia()
    {
        parent::setMedia();
        $this->addCSS(__PS_BASE_URI__.'modules/advancedcheckout/views/css/adm.css');
        $this->addjQueryPlugin('tablednd');
        $this->addCss(__PS_BASE_URI__.'modules/advancedcheckout/views/css/colorpicker.css');
        $this->addJS(array(
            _PS_JS_DIR_.'tiny_mce/tiny_mce.js',
            _PS_JS_DIR_.'tinymce.inc.js',
            __PS_BASE_URI__.'js/admin-dnd.js',
            __PS_BASE_URI__.'modules/advancedcheckout/views/js/ajax_upload_2.0.min.js',
            __PS_BASE_URI__.'modules/advancedcheckout/views/js/colorpicker.js',
            __PS_BASE_URI__.'modules/advancedcheckout/views/js/admin.js',
            __PS_BASE_URI__.'modules/advancedcheckout/views/js/tools.js',
            __PS_BASE_URI__.'modules/advancedcheckout/views/js/jquery.total-storage.js',
        ));
        if (!$this->_is_new) {
            $this->AddJS(__PS_BASE_URI__.'modules/advancedcheckout/views/js/1.5/admin.js');
        }
    }
}
