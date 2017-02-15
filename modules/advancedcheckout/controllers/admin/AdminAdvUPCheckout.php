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

class AdminAdvUPCheckoutController extends ModuleAdminController
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
        $this->table = 'advcheckout_unpay';
        $this->className = 'Unpay';
        $this->identifier = 'id_unpay';
        $this->addRowAction('edit');
        $this->addRowAction('delete');
        $this->show_toolbar = true;
        $this->list_no_link = true;
        $this->toolbar_scroll = false;
        $this->lang = true;

        $this->fields_list = array(
            'id_unpay' => array(
                'title' => $this->l('#'),
                'width' => 10,
                'type' => 'text',
                'filter' => false,
                'search' => false,

            ),
            'name' => array(
                'title' => $this->l('Name.'),
                'width' => 300,
                'type' => 'text',
                'lang' => true,
                'filter' => false,
                'search' => false
            ),
            'description_short' => array(
                'title' => $this->l('Description.'),
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
    }

    public function renderForm()
    {
        $this->display = 'edit';
        $this->initToolbar();

        if (!$this->loadObject(true)) {
            return;
        }

        $this->fields_form = array(
            'tinymce' => true,
            'legend' => array(
                'title' => $this->l('Payment Systems'),
                'image' => '../img/admin/tab-categories.gif'
            ),
            'input' => array(
                array(
                    'type' => 'text',
                    'label' => $this->l('Name:'),
                    'name' => 'name',
                    'required' => true,
                    'lang' => true,
                    'class' => 'copy2friendlyUrl',
                    'hint' => $this->l('Invalid characters:').' <>;=#{}',
                    'class' => 't'
                ),
                array(
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
                ),
                array(
                    'type' => 'textarea',
                    'label' => $this->l('Short description:'),
                    'name' => 'description_short',
                    'lang' => true,
                    'rows' => 5,
                    'cols' => 40,
                    'hint' => $this->l('Invalid characters:').' <>;=#{}',
                    'desc' => $this->l('Displayed in payment selection page.'),
                    'class' => 't'
                ),
                array(
                    'type' => 'textarea',
                    'label' => $this->l('Description:'),
                    'name' => 'description',
                    'autoload_rte' => true,
                    'lang' => true,
                    'rows' => 5,
                    'cols' => 40,
                    'hint' => $this->l('Invalid characters:').' <>;=#{}',
                    'desc' => $this->l('%total% will be replaced with total amount.'),
                'class' => 't'
                ),
                array(
                    'type' => 'textarea',
                    'label' => $this->l('Description success:'),
                    'name' => 'description_success',
                    'autoload_rte' => true,
                    'lang' => true,
                    'rows' => 5,
                    'cols' => 40,
                    'hint' => $this->l('Invalid characters:').' <>;=#{}',
                    'desc' => $this->l('%order_number% will be replaced with invoice number').
                        $this->l(', %total% will be replaced with total amount.'),
                    'class' => 't'
                ),
                array(
                    'type' => 'select',
                    'label' => $this->l('Order state:'),
                    'name' => 'id_order_state',
                    'desc' =>$this->l('Order state after create.'),
                    'options' => array(
                        'query' => OrderState::getOrderStates($this->context->language->id),
                        'name' => 'name',
                        'id' => 'id_order_state'
                    ),
                'class' => 't'
                ),
            ),
            'submit' => array(
                'title' => $this->l('Save'),
                // 'class' => 'button'
            )
        );

        if (!$this->loadObject(true)) {
            return;
        }

        return parent::renderForm();
    }

    public function postProcess()
    {
        $this->tabAccess = Profile::getProfileAccess($this->context->employee->id_profile, $this->id);
        if (Tools::isSubmit('submitAdd'.$this->table)) {
            $this->action = 'save';
            $object = parent::postProcess();
            $pos = unserialize(Configuration::get('ADV_PAYMENT_POS'));
            $pos1 = end($pos);
            $pos['id_'.$object->id] = (int)$pos1 + 1;
            Configuration::UpdateValue('ADV_PAYMENT_POS', serialize($pos));
            if ($object !== false) {
                Tools::redirectAdmin(
                    self::$currentIndex.'&conf=3&id_cms_category='.
                    (int)$object->id.'&token='.Tools::getValue('token')
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
                            $pos = unserialize(Configuration::get('ADV_PAYMENT_POS'));
                            unset($pos['id_'.$object->id]);
                            Configuration::UpdateValue('ADV_PAYMENT_POS', serialize($pos));
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
        } elseif (Tools::isSubmit('statusadvcheckout_unpay') && Tools::getValue($this->identifier)) {
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

    public function renderList()
    {
        $this->initToolbar();
        return parent::renderList();
    }
}
