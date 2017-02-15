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

class AdminAdvPickupController extends ModuleAdminController
{
    public $is_new;

    protected function l($string, $class = null, $addslashes = false, $htmlentities = true)
    {
        if ($class === null) {
            $class = get_class($this);
        }
        return parent::l($string, $class, $addslashes, $htmlentities);
    }

    public function renderList()
    {
        $this->initToolbar();
        return parent::renderList();
    }

    public function __construct()
    {
        $this->bootstrap = true;
        $this->table = 'advcheckout_pickup';
        $this->className = 'PickupClass';
        $this->identifier = 'id_pickup';
        $this->lang = true;
        $this->list_no_link = true;
        $this->toolbar_scroll = false;
        $this->addRowAction('edit');
        $this->addRowAction('delete');
        $this->bulk_actions = false;
        $this->toolbar_scroll = false;
        $this->imageType = 'jpg';

        $this->fields_list = array(
            'id_pickup' => array(
                'title' => $this->l('#'),
                'width' => 10,
                'type' => 'text',
                'filter' => false,
                'search' => false
            ),
            'name' => array(
                'title' => $this->l('Name'),
                'width' => 200,
                'type' => 'text',
                'filter' => false,
                'search' => false
            ),
            'address' => array(
                'title' => $this->l('Address'),
                'width' => 200,
                'type' => 'text',
                'filter' => false,
                'search' => false
            ),
            'active' => array(
                'title' => $this->l('Status.'),
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

    public function renderForm()
    {
        $image_url = '';
        $image_size = '';
        $obj = $this->loadObject(true);
        if ($this->display == 'edit' && $obj->id) {
            $times = Tools::unSerialize($obj->times);
            $image = _PS_MODULE_DIR_.'advancedcheckout/img/pickup/pickup_'.$obj->id.'.'.$this->imageType;
            $image_url = ImageManager::thumbnail(
                $image,
                $this->table.'_'.(int)$obj->id.'.'.$this->imageType,
                200,
                $this->imageType,
                true,
                true
            );
            $image_size = file_exists($image) ? filesize($image) / 1000 : false;
            if (!empty($times)) {
                foreach ($times as $k => $t) {
                    $this->fields_value['hours_'.$k] = $t;
                }
            }
        }

        $this->initToolbar();
        $this->fields_form = array(
            'tinymce' => true,
            'legend' => array(
                'title' => $this->l('Add new rules.'),
                'icon' => 'icon-info-sign'
            ),
            'input' => array(
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
                    'type' => 'text',
                    'label' => $this->l('Display name:'),
                    'name' => 'name',
                    'class' => 't',
                    'lang' => true,
                    'required' => true,
                ),
                array(
                    'type' => 'textarea',
                    'label' => $this->l('Description:'),
                    'name' => 'description',
                    'class' => 't',
                    'lang' => true,
                    'required' => true,
                    'autoload_rte' => true,
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Phone:'),
                    'name' => 'number',
                    'class' => 't',
                    'required' => true,
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Fax:'),
                    'name' => 'fax',
                    'class' => 't',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('City:'),
                    'name' => 'city',
                    'class' => 't',
                    'required' => true,
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Postcode:'),
                    'name' => 'postcode',
                    'class' => 't',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Email:'),
                    'name' => 'email',
                    'class' => 't',
                ),
                array(
                    'type' => 'file',
                    'label' => $this->l('Picture'),
                    'name' => 'image',
                    'delete_url' => self::$currentIndex.'&token='.$this->token.
                        '&delI='.$obj->id.'&id_pickup='.$obj->id.'&updateadvcheckout_pickup',
                    'display_image' => true,
                    'image' => isset($image_url) ? $image_url : false,
                    'size' => isset($image_size) ? $image_size : false,
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Address'),
                    'name' => 'address',
                    'class' => 't',
                    'required' => true,
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Latitude:'),
                    'name' => 'latitude',
                    'class' => 't',
                    'required' => true,
                    'desc' => '<a class="gotomap" style="cursor:pointer;">'.$this->l('Mark on the map.').'</a>'
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Longitude:'),
                    'name' => 'longitude',
                    'class' => 't',
                    'required' => true,
                    'desc' => '<a class="gotomap" style="cursor:pointer;">'.$this->l('Mark on the map.').'</a>'
                ),
            ),
            'submit' => array(
                'title' => $this->l('Save'),
            )
        );

        $days = $this->daysArray();
        foreach ($days as $k => $d) {
            $this->fields_form['input'][] =    array(
                    'type' => 'text',
                    'label' => $this->l('Time work').' '.$d,
                    'name' => 'hours_'.$k,
                    'class' => 't',
                    'required' => true,
                );
        }

        $this->fields_value['id_payment_module'] = 1;

        if (!$this->loadObject(true)) {
            return;
        }

        $html = parent::renderForm();
        $html .= $this->context->smarty->fetch(_PS_MODULE_DIR_.'advancedcheckout/views/templates/admin/map_render.tpl');
        return $html;
    }

    public function daysArray()
    {
        $days = array();
        $days[1] = $this->l('Monday');
        $days[2] = $this->l('Tuesday');
        $days[3] = $this->l('Wednesday');
        $days[4] = $this->l('Thursday');
        $days[5] = $this->l('Friday');
        $days[6] = $this->l('Saturday');
        $days[7] = $this->l('Sunday');

        return $days;
    }

    public function processHours()
    {
        $hours_day = array();
        $days = $this->daysArray();
        foreach (range(1, 7) as $nd) {
            $hours = Tools::getValue('hours_'.$nd);
            if (empty($hours)) {
                $this->errors[] = Tools::displayError('Emty hours for day').' '.$days[$nd];
            } else {
                $hours_day[$nd] = $hours;
            }
        }

        return $hours_day;
    }

    public function postImage($id)
    {
        if (isset($_FILES['image']['name']) && !empty($_FILES['image']['tmp_name']) && $id) {
            $max_size = isset($this->max_image_size) ? $this->max_image_size : 0;
            if ($error = ImageManager::validateUpload($_FILES['image'], Tools::getMaxUploadSize($max_size))) {
                $this->errors[] = $error;
            }
            $tmp_name = tempnam(_PS_TMP_IMG_DIR_, 'PS');
            $image = _PS_MODULE_DIR_.'advancedcheckout/img/pickup/pickup_'.$id;
            if (!$tmp_name) {
                $this->errors[] = Tools::displayError('Error create tmp file.');
            }
            if (!move_uploaded_file($_FILES['image']['tmp_name'], $tmp_name)) {
                $this->errors[] = Tools::displayError('Error file upload!');
            }
            if (empty($this->errors) &&
                !ImageManager::resize($tmp_name, $image.'.'.$this->imageType, null, null, $this->imageType)) {
                $this->errors[] = Tools::displayError('An error occurred while uploading the image.');
            }
        }
    }

    public function processUpdate()
    {
        $id = Tools::getValue('id_pickup');
        if (!empty($id)) {
            $hours_day = $this->processHours();
            if (empty($this->errors)) {
                $hours_day = serialize($hours_day);
                $object = parent::processUpdate();
                if ($object) {
                    $object->times = $hours_day;
                    $object->latitude = number_format((float)$object->latitude, 8);
                    $object->longitude = number_format((float)$object->longitude, 8);
                    $object->save();
                }

                return $object;
            } else {
                $object = parent::processUpdate();
                return $object;
            }
        } else {
            $this->errors[] = Tools::displayError('Empty id');
            $object = parent::processUpdate();
            return $object;
        }
    }

    public function processAdd()
    {
        $hours_day = $this->processHours();
        if (empty($this->errors)) {
            $hours_day = serialize($hours_day);
            $object = parent::processAdd();
            if ($object) {
                $object->times = $hours_day;
                $object->latitude = number_format((float)$object->latitude, 8);
                $object->longitude = number_format((float)$object->longitude, 8);
                $object->save();
            }

            return $object;
        } else {
            $object = parent::processAdd();
            return $object;
        }
    }

    public function postProcess()
    {
        if (Tools::isSubmit('delI')) {
            $id = Tools::getValue('delI');
            $image = _PS_MODULE_DIR_.'advancedcheckout/img/pickup/pickup_'.$id.'.'.$this->imageType;
            if (file_exists($image)) {
                unlink($image);
            }
        }

        if (Tools::isSubmit('submitAdd'.$this->table)) {
            $this->action = 'save';
            $object = parent::postProcess();
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
                        $this->errors[] = Tools::displayError('You need at least one object.').
                            ' <b>'.$this->table.'</b><br />'.Tools::displayError('You cannot delete all of the items.');
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
        } elseif (Tools::isSubmit('statusadvcheckout_pickup') && Tools::getValue($this->identifier)) {
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
