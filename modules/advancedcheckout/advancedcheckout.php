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

class AdvancedCheckout extends Module
{
    public function __construct()
    {
        if (!defined('_PS_VERSION_')) {
            exit;
        }

        $this->name = 'advancedcheckout';
        $this->tab = 'front_office_features';
        $this->version = '3.1.7';
        $this->author = 'presta-blog.com';
        $this->bootstrap = true;
        $this->need_instance = 0;
        $this->module_key = 'c575056d8defbfd5f53605027864e8bb';

        parent::__construct();

        $this->displayName = $this->l('Advanced One Page Checkout');
        $this->description = $this->l('Replaces the standard form One Page Checkout.');
        $this->days = array(
            1 => $this->l('Monday'),
            2 => $this->l('Tuesday'),
            3 => $this->l('Wednesday'),
            4 => $this->l('Thursday'),
            5 => $this->l('Friday'),
            6 => $this->l('Saturday'),
            7 => $this->l('Sunday')
        );

        $this->o_translate = array(
            0 => $this->l('Address:'),
            1 => $this->l('Phone:'),
            2 => $this->l('Fax:'),
            3 => $this->l('Email:'),
            4 => $this->l('Times work:')
        );
		
		require_once(dirname(__FILE__).'/classes/Unpay.php');
    }

    public function inTab()
    {
        $languages = Language::getLanguages();
        $tabs = array(
            'AdminAdvancedCheckoutMain' => array(
                'ru' => 'Настройки Заказа',
                'en' => 'Settings Order'
            ),
            'AdminAdvCheckout' => array(
                'ru' => 'Поля Заказ',
                'en' => 'Fields Order'
            ),
            'AdminAdvUPCheckout' => array(
                'ru' => 'Универс. оплата',
                'en' => 'Universal pay'
            ),
            'AdminAdvPickup' => array(
                'ru' => 'Настройки самовывоза',
                'en' => 'Pickup settings'
            ),
            'AdminAdvShipCheckout' => array(
                'ru' => 'Доставка и оплата',
                'en' => 'Ship 2 Pay'
            )
        );
        foreach ($tabs as $k => $t) {
            $new_tab = new Tab();
            $new_tab->class_name = $k;
            $new_tab->id_parent = Tab::getCurrentParentId();
            $new_tab->module = $this->name;
            if ($k == 'AdminAdvancedCheckoutMain') {
                $new_tab->active = 1;
            } else {
                $new_tab->active = 0;
            }

            foreach ($languages as $language) {
                if (isset($t[$language['iso_code']]) && $t[$language['iso_code']] != '') {
                    $new_tab->name[$language['id_lang']] = $t[$language['iso_code']];
                } else {
                    $new_tab->name[$language['id_lang']] = $t['en'];
                }
            }

            $new_tab->add();
            unset($new_tab);
        }
    }

    public function inCNF()
    {
        Configuration::updateValue('color_pick_1', 'fff');
        Configuration::updateValue('color_pick_2', '11a9cc');
        Configuration::updateValue('color_pick_7', '828282');
        Configuration::updateValue('color_pick_3', 'fbfbfb');
        Configuration::updateValue('color_pick_4', '000');
        Configuration::updateValue('adv_circle', 1);
        Configuration::updateValue('adv_show_zalivka', 1);
        Configuration::updateValue('city_refresh', 0);
        Configuration::updateValue('postcode_refresh', 0);
        Configuration::updateValue('country_refresh', 1);
        Configuration::updateValue('state_refresh', 1);
        Configuration::updateValue('tax_view', 1);
        Configuration::updateValue('columns_checkout', 3);
        Configuration::updateValue('comment_field', 'payment');
        Configuration::updateValue('PS_ORDER_PROCESS_TYPE', 1);
        Configuration::updateValue('PS_GUEST_CHECKOUT_ENABLED', 1);
        Configuration::updateValue('PS_REGISTRATION_PROCESS_TYPE', 1);
        Configuration::updateValue('adv_ainvoice', 0);
        Configuration::updateValue('maps_pickup_on', 0);
        Configuration::updateValue('PS_ONE_PHONE_AT_LEAST', 0);
        Configuration::updateValue('PS_CUSTOMER_CREATION_EMAIL', 1);
        Configuration::updateValue('cm_latitude', 41.902277);
        Configuration::updateValue('cm_longitude', -99.931641);
        Configuration::updateValue('def_registration_group', (int)Configuration::get('PS_CUSTOMER_GROUP'));
        Configuration::updateValue('def_registration_group_guest', (int)Configuration::get('PS_GUEST_GROUP'));
    }

    public function inSQL()
    {
        if ($sql = Tools::file_get_contents(dirname(__FILE__).'/sql/install.sql')) {
            $sql = str_replace('PREFIX_', _DB_PREFIX_, $sql);
            $sql = str_replace('ID_LANG', 1, $sql);
            $sql = preg_split("/;\s*[\r\n]+/", $sql);
            foreach ($sql as $query) {
                if (!Db::getInstance()->Execute($query)) {
                    return false;
                }
            }
        }

        $languages = Db::getInstance()->ExecuteS('SELECT * FROM `'._DB_PREFIX_.'lang`');
        foreach ($languages as $lang) {
            if (file_exists(dirname(__FILE__).'/sql/'.$lang['iso_code'].'.sql')) {
                if ($sql = Tools::file_get_contents(dirname(__FILE__).'/sql/'.$lang['iso_code'].'.sql')) {
                    $sql = str_replace('PREFIX_', _DB_PREFIX_, $sql);
                    $sql = str_replace('ID_LANG', $lang['id_lang'], $sql);
                    $sql = preg_split("/;\s*[\r\n]+/", $sql);
                    foreach ($sql as $query) {
                        if (!Db::getInstance()->Execute($query)) {
                            return false;
                        }
                    }
                }
            } else {
                if ($sql = Tools::file_get_contents(dirname(__FILE__).'/sql/en.sql')) {
                    $sql = str_replace('PREFIX_', _DB_PREFIX_, $sql);
                    $sql = str_replace('ID_LANG', $lang['id_lang'], $sql);

                    $sql = preg_split("/;\s*[\r\n]+/", $sql);

                    foreach ($sql as $query) {
                        if (!Db::getInstance()->Execute($query)) {
                            return false;
                        }
                    }
                }
            }
        }
    }

    public function install()
    {
        if (!parent::install()
            || !$this->registerHook('displayBackOfficeHeader')
            || !$this->registerHook('actionValidateOrder')
            || !$this->registerHook('displayPayment') || !$this->registerHook('actionCarrierUpdate')
            || !$this->registerHook('displayAdminOrder')
        ) {
            return false;
        }
        //--------------------------------------------
        $this->inSQL();
        $this->inCNF();
        $this->inTab();
        //--------------------------------------------
        $customer = new Customer();
        $customer->firstname = 'OPC Not Delete';
        $customer->lastname = 'OPC Not Delete';
        $customer->email = 'support@presta-blog.com';
        $customer->passwd = Tools::encrypt('OPC123456dmo');
        $customer->newsletter = 1;
        $customer->optin = 1;
        $customer->active = 0;

        if (!$customer->add()) {
            return false;
        } else {
            Configuration::updateValue('OPC_ID_CUSTOMER', $customer->id);
        }
        //--------------------------------------------
        return true;
    }

    public function uninstall()
    {
        if (!parent::uninstall()) {
            return false;
        }

        $id_tabs = array();
        $id_tabs[] = Tab::getIdFromClassName('AdminAdvancedCheckoutMain');
        $id_tabs[] = Tab::getIdFromClassName('AdminAdvPickup');
        $id_tabs[] = Tab::getIdFromClassName('AdminAdvCheckout');
        $id_tabs[] = Tab::getIdFromClassName('AdminAdvUPCheckout');
        $id_tabs[] = Tab::getIdFromClassName('AdminAdvShipCheckout');
        foreach ($id_tabs as $id_tab) {
            if ($id_tab) {
                $tab = new Tab($id_tab);
                $tab->delete();
            }
        }
        Db::getInstance()->Execute('DROP TABLE `'._DB_PREFIX_.'advcheckout`');
        Db::getInstance()->Execute('DROP TABLE `'._DB_PREFIX_.'advcheckout_pickup`');
        Db::getInstance()->Execute('DROP TABLE `'._DB_PREFIX_.'advcheckout_pickup_lang`');
        Db::getInstance()->Execute('DROP TABLE `'._DB_PREFIX_.'advcheckout_unpay`');
        Db::getInstance()->Execute('DROP TABLE `'._DB_PREFIX_.'advcheckout_unpay_lang`');
        Db::getInstance()->Execute('DROP TABLE `'._DB_PREFIX_.'advcheckout_custom`');
        Db::getInstance()->Execute('DROP TABLE `'._DB_PREFIX_.'advcheckout_lang`');
        Db::getInstance()->Execute('DROP TABLE `'._DB_PREFIX_.'advcheckout_ship_to_pay`');
        Db::getInstance()->Execute('ALTER TABLE `'._DB_PREFIX_.'orders` DROP `custom_field`');
        Db::getInstance()->Execute(
            'DELETE FROM `'._DB_PREFIX_.'customer` WHERE id_customer = '.(int)Configuration::get('OPC_ID_CUSTOMER')
        );
        return true;
    }

    public function checkQuantitiesAlt()
    {
        if (Configuration::get('PS_CATALOG_MODE')) {
            return false;
        }
        $array = array();
        foreach ($this->context->cart->getProducts() as $product) {
            if (!$product['active'] || !$product['available_for_order'] ||
                (!$product['allow_oosp'] &&
                $product['stock_quantity'] < $product['cart_quantity'])
            ) {
                $array[] = array(
                    'id_product_attribute' => $product['id_product_attribute'],
                    'id_product' => $product['id_product'],
                    'stock_quantity' => $product['stock_quantity'],
                    'name' => $product['name'],
                    'attributes' => isset($product['attributes']) ? $product['attributes'] : array(),
                    'id_customization' => $product['id_customization'],
                );
            }
        }

        return $array;
    }

    public function cartListErrors()
    {
        $err = array();
        $errors = array();
        $arr = array();
        $arr = $this->checkQuantitiesAlt();
        $currency = Currency::getCurrency((int)$this->context->cart->id_currency);
        $minimal_purchase = Tools::convertPrice((float)Configuration::get('PS_PURCHASE_MINIMUM'), $currency);
        if ($this->context->cart->getOrderTotal(true, Cart::ONLY_PRODUCTS) < $minimal_purchase) {
            $err[] = sprintf(
                $this->l(
                    'A minimum purchase total of %1s (tax excl.) is required to validate'.
                    ' your order, current purchase total is %2s (tax excl.).'
                ),
                Tools::displayPrice($minimal_purchase, $currency),
                Tools::displayPrice(
                    $this->context->cart->getOrderTotal(true, Cart::ONLY_PRODUCTS),
                    $currency
                )
            );
        }

        $html = '';
        $html .= '<script type="text/javascript">';
        $html .= 'var del_array = [];';
        $html .= 'var change_qty = [];';
        $i = 0;
        foreach ($this->context->cart->getProducts() as $product) {
            $product_name = $product['name'].(!empty($product['attributes_small']) ?
                ' ('.$product['attributes_small'].')' : '');
            if (!$product['active']) {
                $errors[] = sprintf($this->l('The product %s is no longer active'), $product_name);
                $html .= 'del_array['.$i.'] = "product_'.
                    $product['id_product'].'_'.$product['id_product_attribute'].'";';
            } elseif (!$product['available_for_order']) {
                $errors[] = sprintf($this->l('The product %s is no longer available for order'), $product_name);
                $html .= 'del_array['.$i.'] = "product_'.
                    $product['id_product'].'_'.$product['id_product_attribute'].'";';
            } elseif (!$product['allow_oosp'] && $product['stock_quantity'] < $product['cart_quantity']) {
                if ($product['stock_quantity'] > 0 && $product['stock_quantity'] >= $product['minimal_quantity']) {
                    $errors[] = sprintf(
                        $this->l('The product %s has only %d unit(s) left'),
                        $product_name,
                        $product['stock_quantity']
                    );
                    $html .= 'change_qty['.$i.'] = "product_'.$product['id_product'].'_'.
                        $product['id_product_attribute'].'_'.$product['stock_quantity'].'";';
                } else {
                    $errors[] = sprintf($this->l('The product %s is currently out of stock'), $product_name);
                    $html .= 'del_array['.$i.'] = "product_'.
                        $product['id_product'].'_'.$product['id_product_attribute'].'";';
                }
            }

            $i++;
        }
        $html .= 'function fixerr(){';
        $html .= 'if(del_array.length > 0){
                $.each(del_array, function(){
                    var ida = this;
                    $(".cart_item").each(function(){
                        var id = $(this).attr("id");
                        if (strpos(id, ida) !== false){
                            $(this).find(".opc-cart_quantity_delete").click();
                        }
                    });
                });
            }';

        $html .= 'if(change_qty.length > 0){
                $.each(change_qty, function(){
                    var data = this.split("_");
                    var str = data[0]+"_"+data[1]+"_"+data[2];
                    var qty_c = data[3];
                    $(".cart_item").each(function(){
                        var id = $(this).attr("id");
                        if (strpos(id, str) !== false){
                            $(this).find(".opc-cci").val(qty_c).keydown();
                        }
                    });
                });
            }';
        $html .= '}';
        $html .= '</script>';
        if (!empty($arr)) {
            $text = '';
            foreach ($errors as $a) {
                $text .= '</br>'.$a.'';
            }

            $err[] = $this->l('An item in your cart is no longer available. You cannot proceed with your order.').
            $text.'</br></br><button onclick="fixerr();" class="opc-btn opc-btn-default fix_error">'.
                $this->l('Correct errors').'</button>';
        }

        if (!empty($err)) {
            foreach ($err as $e) {
                $html .= '<div id="carterr" class="carterr opc-alert opc-alert-danger">
                            <i class="fa fa-times-circle opc-sign"></i>
                                '.$e.'
                            </div>';
            }
        }

        return array('html' => $html, 'arr' => $arr, 'err' => $err);
    }

    public function hookdisplayPayment($params)
    {
        require_once(dirname(__FILE__).'/classes/Unpay.php');
        $paysystems = Unpay::Unpay($this->context->cookie->id_lang);
        foreach ($paysystems as &$paysystem) {
            $paysystem['description'] = str_replace(
                array('%total%'),
                array(Tools::DisplayPrice($params['cart']->getOrderTotal(true, Cart::BOTH))),
                $paysystem['description']
            );
        }
        unset($paysystem);
        $this->smarty->assign(array(
            'this_path' => $this->_path,
            'this_path_ssl' => Tools::getShopDomainSsl(true, true).__PS_BASE_URI__.'modules/'.$this->name.'/',
            'universalpay' => $paysystems,
            'universalpay_onepage' => Configuration::get('universalpay_onepage'),
        ));
        return $this->display(__FILE__, 'payment.tpl');
    }

    public function uploadImage($name)
    {
        $errors = '';
        $name2 = '';
        if (isset($_FILES['0']['name']) && $_FILES['0']['name'] != null) {
            if (!isset($_FILES['0']['tmp_name']) || $_FILES['0']['tmp_name'] == null) {
                $errors = $this->l('Cannot add file because not is sent');
            }
        }
        if ($errors == '') {
            $tmp_name = $_FILES['0']['tmp_name'];
            $name2 .= '.'.pathinfo($_FILES['0']['name'], PATHINFO_EXTENSION);
            $vhod = strpos($name2, '.gif');
            if ($vhod === false) {
                $errors = $this->l('Only gif format!');
            } else {
                $path = dirname(__FILE__).'/views/img/payments/'.$name.'.gif';
                if (file_exists($path)) {
                    unlink($path);
                }

                if (!move_uploaded_file($tmp_name, $path)) {
                    $errors = $this->l('Cannot copy the file');
                }
            }
        }

        if ($errors != '') {
            return array('message_code' => -1, 'message' => $errors);
        } else {
            return array('message_code' => 0, 'message' => $this->l('Image uploaded successfuly.'));
        }
    }

    public function hookdisplayAdminOrder($params)
    {
        $db = Db::getInstance();
        $id = $params['id_order'];
        $cart = $params['cart'];
        $query = new DbQuery();
        $query->select('*');
        $query->from('advcheckout_custom');
        $query->where('id_cart = '.$cart->id);
        $query->where('id_order = '.$id);
        $ord = $db->GetRow($query);
        $data = unserialize($ord['value']);
        if ((!empty($data) && count($data)) || $ord['id_pickup'] > 0) {
            $fields_custom = $db->ExecuteS(
                'SELECT * FROM `'._DB_PREFIX_.'advcheckout` a
                LEFT JOIN `'._DB_PREFIX_.'advcheckout_lang` al ON (a.`id_field` = al.`id_field`)
                WHERE al.`id_lang` = '.(int)$this->context->cookie->id_lang.' AND a.`active` = 1 AND a.`is_custom` = "1"
                ORDER BY a.`position`'
            );
            if (count($fields_custom)) {
                foreach ($fields_custom as $x => &$fc) {
                    if (!empty($data)) {
                        foreach ($data as $v) {
                            if (isset($v[$fc['name']])) {
                                $fields_custom[$x]['val'] = $v[$fc['name']];
                            }
                        }
                    } else {
                        $fields_custom[$x]['val'] = '';
                    }
                }
            }

            $dp = array();
            if ($ord['id_pickup'] > 0) {
                require_once(dirname(__FILE__).'/classes/PickupClass.php');
                $pp = new PickupClass($ord['id_pickup']);
                $dp[$ord['id_pickup'] + 900]['id_field'] = $ord['id_pickup'] + 900;
                $dp[$ord['id_pickup'] + 900]['val'] = $pp->name[$this->context->language->id];
                $dp[$ord['id_pickup'] + 900]['description'] = $this->l('Pickup point');
                $fields_custom = array_merge($fields_custom, $dp);
            }

            $this->fields_list = array(
                'id_field' => array(
                    'title' => $this->l('ID'),
                    'width' => 50,
                    'type' => 'text',
                ),
                'description' => array(
                    'title' => $this->l('Field'),
                    'width' => 50,
                    'type' => 'text',
                ),
                'val' => array(
                    'title' => $this->l('Value'),
                    'width' => 140,
                    'type' => 'text',
                ),
            );

            if (Shop::isFeatureActive()) {
                $this->fields_list['id_shop'] = array(
                    'title' => $this->l('ID Shop'),
                    'align' => 'center',
                    'width' => 25,
                    'type' => 'int'
                );
            }

            $helper = new HelperList();
            $helper->shopLinkType = '';
            $helper->simple_header = true;
            $helper->identifier = 'id_field';
            $helper->show_toolbar = true;
            $helper->imagetype = 'jpg';
            $helper->title = $this->displayName.' '.$this->l('Additional fields.');
            $helper->table = $this->name;
            $helper->no_link = true;
            $helper->token = Tools::getAdminTokenLite('AdminOrders');
            $helper->currentIndex = AdminController::$currentIndex;
            return $helper->generateList($fields_custom, $this->fields_list);
        }
        return false;
    }

    public function hookActionValidateOrder($params)
    {
        require_once(dirname(__FILE__).'/classes/CustomClass.php');
        $cart = $params['cart'];
        $order = $params['order'];
        $query = new DbQuery();
        $query->select('id_custom');
        $query->from('advcheckout_custom');
        $query->where('id_cart = '.(int)$cart->id);
        $svp = Db::getInstance()->GetValue($query);
        if ($svp) {
            $cus = new CustomClass($svp);
            $cus->id_order = (int)$order->id;
            $cus->save();
            if (!empty($cus->message)) {
                $old_message = Message::getMessageByCartId((int)$this->context->cart->id);
                if ($old_message) {
                    $update_message = new Message((int)$old_message['id_message']);
                    $update_message->message = $update_message->message."\r\n".$cus->message;
                    $update_message->update();
                } else {
                    $update_message = new Message();
                    $message = strip_tags($cus->message, '<br>');
                    $update_message->message = $message;
                    $update_message->id_order = (int)$order->id;
                    $update_message->private = 1;
                    $update_message->add();
                }

                $id_customer_thread = CustomerThread::getIdCustomerThreadByEmailAndIdOrder(
                    $params['customer']->email,
                    $order->id
                );
                if (!$id_customer_thread) {
                    $customer_thread = new CustomerThread();
                    $customer_thread->id_contact = 0;
                    $customer_thread->id_customer = (int)$order->id_customer;
                    $customer_thread->id_shop = (int)$this->context->shop->id;
                    $customer_thread->id_order = (int)$order->id;
                    $customer_thread->id_lang = (int)$this->context->language->id;
                    $customer_thread->email = $params['customer']->email;
                    $customer_thread->status = 'open';
                    $customer_thread->token = Tools::passwdGen(12);
                    $customer_thread->add();
                } else {
                    $customer_thread = new CustomerThread((int)$id_customer_thread);
                }

                $customer_message = new CustomerMessage();
                $customer_message->id_customer_thread = $customer_thread->id;
                $customer_message->message = $update_message->message;
                $customer_message->private = 0;
                $customer_message->id_employee = 0;
                $customer_message->add();
            }
        }
    }

    public function hookactionCarrierUpdate($params)
    {
        require_once(dirname(__FILE__).'/classes/Unpay.php');
        $un = new Unpay();
        $un->updateCarrier($params['id_carrier'], $params['carrier']->id);
    }

    public function getContent()
    {
        Tools::redirectAdmin($this->getAdminLink('AdminAdvancedCheckoutMain'));
    }

    public function getAdminLink($controller, $with_token = true)
    {
        $id_lang = Context::getContext()->language->id;
        $params = $with_token ? array('token' => Tools::getAdminTokenLite($controller)) : array();
        return Dispatcher::getInstance()->createUrl($controller, $id_lang, $params, false);
    }
}
