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

class AdminAdvShipCheckoutController extends ModuleAdminController
{
    public $is_new;

    protected function l($string, $class = null, $addslashes = false, $htmlentities = true)
    {
        if ($class === null) {
            $class = get_class($this);
        }
        return parent::l($string, $class, $addslashes, $htmlentities);
    }

    public function __construct()
    {
        $this->bootstrap = true;
        $this->table = 'advcheckout_ship_to_pay';
        $this->className = 'ShipClass';
        $this->identifier = 'id_ship';
        $this->addRowAction('edit');
        $this->addRowAction('delete');
        $this->show_toolbar = true;
        $this->list_no_link = true;
        $context = Context::getContext();
        $this->bulk_actions = false;
        $this->toolbar_scroll = false;

        $this->_join .= 'LEFT JOIN `'._DB_PREFIX_.'carrier_lang`
                cl ON (a.`id_carrier` = cl.`id_carrier` AND cl.`id_lang` = '.$context->language->id.')
                LEFT JOIN `'._DB_PREFIX_.'module` m ON (m.`id_module` = a.`id_payment_module`)
                LEFT JOIN `'._DB_PREFIX_.'carrier` c ON (a.`id_carrier` = c.`id_carrier`)';

        $this->_select .= 'm.name as pymname, c.`name` as carrname';
        $this->fields_list = array(
            'id_ship' => array(
                'title' => $this->l('#'),
                'width' => 10,
                'type' => 'text',
                'filter' => false,
                'search' => false
            ),
            'carrname' => array(
                'title' => $this->l('Delivery'),
                'width' => 200,
                'type' => 'text',
                'filter' => false,
                'search' => false
            ),
            'pymname' => array(
                'title' => $this->l('Payment'),
                'width' => 200,
                'type' => 'text',
                'filter' => false,
                'search' => false
            ),
            'active' => array(
                'title' => $this->l('StatuS.'),
                'active' => 'status',
                'align' => 'text-center',
                'type' => 'bool',
                'class' => 'fixed-width-sm activeajax',
                'orderby' => false,
                'filter' => false,
                'search' => false,
                'ajax' => true
            ),
        );
        if (_PS_VERSION_ >= '1.6.0.0') {
            $this->is_new = true;
        } elseif (_PS_VERSION_ >= '1.5.0.0' && _PS_VERSION_ <= '1.6.0.0') {
            $this->is_new = false;
        }

        parent::__construct();
        $this->no_link = true;
    }

    public function getpayment()
    {
        $context = Context::getContext();
        $sql = new DbQuery();
        $sql->select('h.`name` as hook, m.`id_module`, h.`id_hook`, m.`name` as module, h.`live_edit`');
        $sql->from('module', 'm');
        if ($this->is_new) {
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
                AND id_currency IN ('.(int)$context->currency->id.', -1, -2) LIMIT 1) IN ('
                .(int)$context->currency->id.', -1, -2))'
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

    public function renderList()
    {
        $this->initToolbar();
        if (!($this->fields_list && is_array($this->fields_list))) {
            return false;
        }
        $this->getList($this->context->language->id);

        $helper = new HelperList();
        if (!is_array($this->_list)) {
            $this->displayWarning($this->l('Bad SQL query', 'Helper').'<br />'.htmlspecialchars($this->_list_error));
            return false;
        }

        $this->setHelperDisplay($helper);
        $helper->tpl_vars = $this->tpl_list_vars;
        $helper->tpl_delete_link_vars = $this->tpl_delete_link_vars;
        foreach ($this->_list as $k => &$l) {
            $s = new ShipClass($l['id_ship']);
            $p = explode(',', $s->id_payment_module);
            $name = array();
            foreach ($p as $module) {
                $pos = strpos($module, 'id_');
                if ($pos === false) {
                    if (($module_instance = Module::getInstanceById($module))) {
                        $name[] = $module_instance->displayName;
                    }
                } else {
                    $up = new Unpay(Tools::substr($module, 3), $this->context->cookie->id_lang);
                    $name[] = $up->name.' (unpay)';
                }

                unset($up);
                unset($module_instance);
            }
            $name = implode(', ', $name);
            $this->_list[$k]['pymname'] = $name;
            unset($name);
        }

        foreach ($this->actions_available as $action) {
            if (!in_array($action, $this->actions) && isset($this->$action) && $this->$action) {
                $this->actions[] = $action;
            }
        }

        $list = $helper->generateList($this->_list, $this->fields_list);
        return $list;
    }

    public function renderForm()
    {
        $this->display = 'edit';
        $this->initToolbar();
        $carriers = Carrier::getCarriers($this->context->cookie->id_lang, true, false, false, null, 5);
        $payments = $this->getpayment();
        $cr = array();
        $ob = Tools::getValue('id_ship');
        $p_id = array();
        if ($ob > 0) {
            $sh = new ShipClass($ob);
            $p_id = explode(',', $sh->id_payment_module);
            $this->fields_value['payments[]'] = $p_id;
        }
        foreach ($carriers as $c) {
            $cr[] = array(
                            'id' => 'carrier_'.$c['id_carrier'],
                            'value' => $c['id_carrier'],
                            'label' => $this->l($c['name'].' ('.$c['delay'].')')
                        );
        }
        $this->fields_form = array(
            'tinymce' => true,
            'legend' => array(
                'title' => $this->l('Add new rules.'),
                'icon' => 'icon-info-sign'
            ),
            'submit' => array(
                'title' => $this->l('Save'),
            ));
        $this->fields_value['id_payment_module'] = 1;
        $this->fields_form['input'][] =    array(
                    'type' => 'hidden',
                    'name' => 'id_payment_module'
                );
        $this->fields_form['input'][] = array(
                    'type' => 'radio',
                    'label' => $this->l('Delivery:'),
                    'name' => 'id_carrier',
                    'required' => true,
                    'class' => 't',
                    'is_bool' => false,
                    'values' => $cr,
                );
        $this->fields_form['input'][] = array(
                    'type' => 'radio',
                    'label' => $this->l('Displayed:'),
                    'name' => 'active',
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
                );
        $this->fields_form['input'][] = array(
                    'type' => 'select',
                    'label' => $this->l('Payment:'),
                    'name' => 'payments[]',
                    'class' => 'heightopt t',
                    'required' => true,
                    'desc' => $this->l('Multiple select paymenth methods ctrl + click'),
                    'col' => '5',
                    'multiple' => 1,
                    'options' => array(
                        'query' => $payments,
                        'id' => 'id_module',
                        'name' => 'name_lang'
                    )
                );

        if (!$this->loadObject(true)) {
            return;
        }

        return parent::renderForm();
    }

    public function processUpdate()
    {
        $idc = Tools::getValue('id_carrier');
        $res = array();
        if ($idc != '') {
            if (empty($res)) {
                $payments = Tools::GetValue('payments');
                if (!empty($payments)) {
                    $payments = Tools::GetValue('payments');
                    $object = parent::processUpdate();
                    $i = implode(',', $payments);
                    $object->id_payment_module = $i;
                    $object->save();
                    return $object;
                } else {
                    $this->errors[] = Tools::displayError('Не выбран варианты оплаты!');
                    $object = parent::processUpdate();
                    return $object;
                }
            }
        } else {
            $this->errors[] = Tools::displayError('Не выбран вариант доставки!');
            $object = parent::processUpdate();
            return $object;
        }
    }

    public function processAdd()
    {
        $idc = Tools::getValue('id_carrier');
        $res = array();
        if ($idc != '') {
            $res = Db::getInstance()->getRow('SELECT `id_carrier` FROM `'._DB_PREFIX_.'advcheckout_ship_to_pay` 
                                                WHERE `id_carrier` = '.Tools::getValue('id_carrier'));
            if (!empty($res)) {
                $this->errors[] = Tools::displayError('Carrier allready exist!!');
                $object = parent::processAdd();
                return $object;
            }

            if (empty($res)) {
                $payments = Tools::GetValue('payments');
                if (!empty($payments)) {
                    $payments = Tools::GetValue('payments');
                    $object = parent::processAdd();
                    $i = implode(',', $payments);
                    $object->id_payment_module = $i;
                    $object->save();
                    return $object;
                } else {
                    $this->errors[] = Tools::displayError('Не выбран варианты оплаты!');
                    $object = parent::processAdd();
                    return $object;
                }
            }
        } else {
            $this->errors[] = Tools::displayError('Не выбран вариант доставки!');
            $object = parent::processAdd();
            return $object;
        }
    }

    public function postProcess()
    {
        if (Tools::isSubmit('submitAdd'.$this->table)) {
            $this->action = 'save';
            $object = parent::postProcess();
            if ($object !== false) {
                Tools::redirectAdmin(
                    self::$currentIndex.'&conf=3&id_cms_category='.(int)$object->id.'&token='.Tools::getValue('token')
                );
            }
            return $object;
        } elseif (Tools::isSubmit('delete'.$this->table)) {
            if ($this->tabAccess['delete'] === '1') {
                if (Validate::isLoadedObject($object = $this->loadObject())) {
                    if (isset($object->no_zero_object) &&
                        count(call_user_func(array($this->className, $object->no_zero_object))) <= 1) {
                        $this->errors[] = Tools::displayError('You need at least one object.')
                            .' <b>'.$this->table.'</b><br />'.
                            Tools::displayError('You cannot delete all of the items.');
                    } else {
                        if ($this->deleted) {
                            $object->deleted = 1;
                            if ($object->update()) {
                                Tools::redirectAdmin(self::$currentIndex.'&conf=1&token='.Tools::getValue('token'));
                            }
                        } elseif ($object->delete()) {
                            Tools::redirectAdmin(self::$currentIndex.'&conf=1&token='.Tools::getValue('token'));
                        } else {
                            $this->errors[] = Tools::displayError('An error occurred during deletion.');
                        }
                    }
                } else {
                    $this->errors[] = Tools::displayError('An error occurred while deleting the object.')
                        .' <b>'.$this->table.'</b> '.Tools::displayError('(cannot load object)');
                }
            }
        } elseif (Tools::isSubmit('statusadvcheckout_ship_to_pay') && Tools::getValue($this->identifier)) {
            if ($this->tabAccess['edit'] === '1') {
                if (Validate::isLoadedObject($object = $this->loadObject())) {
                    if ($object->toggleStatus()) {
                        die(Tools::jsonEncode(array('success' => 1,
                            'text' => $this->l('The status has been updated successfully.'))));
                    } else {
                        die(Tools::jsonEncode(array('success' => 0,
                            'text' => $this->l('An error occurred while updating this object.'))));
                    }
                } else {
                    die(Tools::jsonEncode(array('success' => 0,
                        'text' => $this->l('An error occurred while updating this object.'))));
                }
            } else {
                die(Tools::jsonEncode(array('success' => 0,
                    'text' => $this->l('You do not have permission to edit this.'))));
            }
        }
    }
}
