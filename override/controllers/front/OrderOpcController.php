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
class OrderOpcController extends OrderOpcControllerCore
{
    /*
    * module: advancedcheckout
    * date: 2016-11-30 19:49:55
    * version: 3.1.7
    */
    public $php_self = 'order-opc';
    /*
    * module: advancedcheckout
    * date: 2016-11-30 19:49:55
    * version: 3.1.7
    */
    public $is_logged;
    /*
    * module: advancedcheckout
    * date: 2016-11-30 19:49:55
    * version: 3.1.7
    */
    public $advancedcheckout;
    /*
    * module: advancedcheckout
    * date: 2016-11-30 19:49:55
    * version: 3.1.7
    */
    protected $ajax_refresh = false;
    /*
    * module: advancedcheckout
    * date: 2016-11-30 19:49:55
    * version: 3.1.7
    */
    public function init()
    {
        require_once(_PS_MODULE_DIR_.'advancedcheckout/advancedcheckout.php');
        require_once(_PS_MODULE_DIR_.'advancedcheckout/classes/CustomClass.php');
        require_once(_PS_MODULE_DIR_.'advancedcheckout/classes/Unpay.php');
        parent::init();
        $this->is_logged = $this->context->customer->isLogged();
    }
    /*
    * module: advancedcheckout
    * date: 2016-11-30 19:49:55
    * version: 3.1.7
    */
    public function postProcess()
    {
        parent::postProcess();
        if ($this->context->cart->nbProducts() &&
            Tools::isSubmit('ajx') &&
            Tools::isSubmit('method')
        ) {
            switch (Tools::getValue('method')) {
                case 'loadcarrier':
                    die(Tools::jsonEncode($this->loadcarrier()));
                case 'loadfield':
                    die(Tools::jsonEncode($this->loadfield(Tools::GetValue('new_addr'))));
                case 'addnewaddr':
                    die(Tools::jsonEncode($this->addnewaddr(Tools::getValue('type'))));
                case 'updateCarrierAndGetPayments':
                    if ((Tools::isSubmit('delivery_option') || Tools::isSubmit('id_carrier')) &&
                        Tools::isSubmit('recyclable') && Tools::isSubmit('gift') &&
                        Tools::isSubmit('gift_message')
                    ) {
                        $this->_assignWrappingAndTOS();
                        if ($this->advProcessCarrier()) {
                            $carriers = $this->context->cart->simulateCarriersOutput();
                            $return = array_merge(
                                array(
                                    'HOOK_TOP_PAYMENT' => Hook::exec('displayPaymentTop'),
                                    'HOOK_PAYMENT' => $this->_getPaymentMethods(),
                                    'carrier_data' => $this->loadcarrier(),
                                    'HOOK_BEFORECARRIER' => Hook::exec(
                                        'displayBeforeCarrier',
                                        array('carriers' => $carriers)
                                    ),
                                    'summary' => $this->context->cart->getSummaryDetails(),
                                    'current_carrier' => $this->context->cart->id_carrier
                                ),
                                $this->getFormatedSummaryDetail()
                            );
                            Cart::addExtraCarriers($return);
                            die(Tools::jsonEncode($return));
                        } else {
                            $this->errors[] = Tools::displayError('An error occurred while updating the cart.');
                        }
                        if (count($this->errors)) {
                            die('{"hasError" : true, "errors" : ["'.implode('\',\'', $this->errors).'"]}');
                        }
                        exit;
                    }
                    break;
                case 'updateMessage':
                    die(Tools::jsonEncode($this->umess()));
                case 'register':
                    die(Tools::jsonEncode($this->prcsregister()));
                case 'forgot':
                    die(Tools::jsonEncode($this->forgot()));
                case 'addvoucher':
                    die(Tools::jsonEncode($this->addvoucher()));
                case 'updateAddressesSelected':
                    if ($this->context->customer->isLogged(true)) {
                        $address_delivery = new Address((int)Tools::getValue('id_address_delivery'));
                        $this->context->smarty->assign('isVirtualCart', $this->context->cart->isVirtualCart());
                        if (Tools::getValue('id_address_delivery') == Tools::getValue('id_address_invoice')) {
                            $address_invoice = $address_delivery;
                        } else {
                            $address_invoice = new Address((int)Tools::getValue('id_address_invoice'));
                        }
                        if ($address_delivery->id_customer != $this->context->customer->id ||
                            $address_invoice->id_customer != $this->context->customer->id
                        ) {
                            $this->errors[] = Tools::displayError('This address is not yours.');
                        } elseif (!Address::isCountryActiveById((int)Tools::getValue('id_address_delivery'))) {
                            $this->errors[] = Tools::displayError('This address is not in a valid area.');
                        } elseif (!Validate::isLoadedObject($address_delivery) ||
                            !Validate::isLoadedObject($address_invoice)
                            || $address_invoice->deleted || $address_delivery->deleted
                        ) {
                            $this->errors[] = Tools::displayError('This address is invalid.');
                        } else {
                            $this->context->cart->id_address_delivery = (int)Tools::getValue('id_address_delivery');
                            $this->context->cart->id_address_invoice = Tools::isSubmit('same') ?
                            $this->context->cart->id_address_delivery : (int)Tools::getValue('id_address_invoice');
                            if (!$this->context->cart->update()) {
                                $this->errors[] = Tools::displayError('An error occurred while updating your cart.');
                            }
                            $infos = Address::getCountryAndState((int)$this->context->cart->id_address_delivery);
                            if (isset($infos['id_country']) && $infos['id_country']) {
                                $country = new Country((int)$infos['id_country']);
                                $this->context->country = $country;
                            }
                            $cart_rules = $this->context->cart->getCartRules();
                            CartRule::autoRemoveFromCart($this->context);
                            CartRule::autoAddToCart($this->context);
                            if ((int)Tools::getValue('allow_refresh')) {
                                $cart_rules2 = $this->context->cart->getCartRules();
                                if (count($cart_rules2) != count($cart_rules)) {
                                    $this->ajax_refresh = true;
                                } else {
                                    $rule_list = array();
                                    foreach ($cart_rules2 as $rule) {
                                        $rule_list[] = $rule['id_cart_rule'];
                                    }
                                    foreach ($cart_rules as $rule) {
                                        if (!in_array($rule['id_cart_rule'], $rule_list)) {
                                            $this->ajax_refresh = true;
                                            break;
                                        }
                                    }
                                }
                            }
                            if (!$this->context->cart->isMultiAddressDelivery()) {
                                $this->context->cart->setNoMultishipping();
                            }
                            if (!count($this->errors)) {
                                $result = $this->loadcarrier();
                                $wrapping_fees = $this->context->cart->getGiftWrappingPrice(false);
                                $wrapping_fees = $this->context->cart->getGiftWrappingPrice();
                                $wrapping_fees_tax_inc = $wrapping_fees;
                                $result = array_merge(
                                    $result,
                                    array(
                                        'HOOK_TOP_PAYMENT' => Hook::exec('displayPaymentTop'),
                                        'HOOK_PAYMENT' => $this->_getPaymentMethods(),
                                        'gift_price' => Tools::displayPrice(
                                            Tools::convertPrice(
                                                Product::getTaxCalculationMethod() == 1 ?
                                                $wrapping_fees : $wrapping_fees_tax_inc,
                                                new Currency((int)$this->context->cookie->id_currency)
                                            )
                                        ),
                                    'carrier_data' => $this->loadcarrier(),
                                    'refresh' => (bool)$this->ajax_refresh),
                                    $this->getFormatedSummaryDetail()
                                );
                                die(Tools::jsonEncode($result));
                            }
                        }
                        if (count($this->errors)) {
                            die(Tools::jsonEncode(array(
                                'hasError' => true,
                                'errors' => $this->errors
                            )));
                        }
                    }
                    die(Tools::displayError());
                case 'updcarrieraddress':
                    $this->_assignWrappingAndTOS();
                    if ($this->advProcessCarrier()) {
                        $cart = $this->context->cart;
                        $total = (float)$cart->getOrderTotal(true, Cart::BOTH);
                        $return = array_merge(
                            array(
                                'total_pr' => Tools::convertPrice($total)
                            ),
                            $this->getFormatedSummaryDetail()
                        );
                        Cart::addExtraCarriers($return);
                        die(Tools::jsonEncode($return));
                    } else {
                        $this->errors[] = Tools::displayError('An error occurred while updating the cart.');
                    }
                    if (count($this->errors)) {
                        die('{"hasError" : true, "errors" : ["'.implode('\',\'', $this->errors).'"]}');
                    }
                    exit;
                case 'loadpayment':
                    die(Tools::jsonEncode($this->loadpayment()));
                case 'clearm':
                    if ($old_message = $this->getMessageByCartId((int)$this->context->cart->id)) {
                        $message = new Message((int)$old_message['id_message']);
                        $message->delete();
                    }
                    die(Tools::jsonEncode(array('status' => true)));
                case 'updcity':
                    $city = Tools::GetValue('city');
                    $address_delivery = new Address(
                        $this->context->cart->id_address_delivery,
                        $this->context->cookie->id_lang,
                        true,
                        true
                    );
                    $address_delivery->city = $city;
                    if ($address_delivery->save()) {
                        $return = array(
                            'hasError' => false,
                            'city' => $address_delivery->city
                        );
                        die(Tools::jsonEncode($return));
                    }
                    break;
                case 'updpost':
                    $postcode = Tools::GetValue('postcode');
                    $address_delivery = new Address(
                        $this->context->cart->id_address_delivery,
                        $this->context->cookie->id_lang,
                        true,
                        true
                    );
                    $address_delivery->postcode = $postcode;
                    if ($address_delivery->save()) {
                        $return = array(
                            'hasError' => false,
                            'postcode' => $address_delivery->postcode
                        );
                        die(Tools::jsonEncode($return));
                    }
                    break;
                case 'updstate':
                    $id = Tools::GetValue('id_state');
                    $address_delivery = new Address(
                        $this->context->cart->id_address_delivery,
                        $this->context->cookie->id_lang,
                        true,
                        true
                    );
                    $address_delivery->id_state = (int)$id;
                    if ($address_delivery->save()) {
                        $return = array(
                            'hasError' => false,
                            'id' => $address_delivery->id_state
                        );
                        die(Tools::jsonEncode($return));
                    }
                    break;
                case 'updcountry':
                    $id = Tools::GetValue('id_country');
                    $address_delivery = new Address(
                        $this->context->cart->id_address_delivery,
                        $this->context->cookie->id_lang,
                        true,
                        true
                    );
                    $address_delivery->id_country = (int)$id;
                    if ($address_delivery->save()) {
                        $return = array(
                            'hasError' => false,
                            'id' => $address_delivery->id_country
                        );
                        die(Tools::jsonEncode($return));
                    }
                    break;
                case 'loadcart':
                    $this->addCOD();
                    $this->_assignSummaryInformations();
                    $this->_assignWrappingAndTOS();
                    $md = new advancedcheckout();
                    $clo = $md->cartListErrors();
                    $this->context->smarty->assign('err_isset', !empty($clo['err']));
                    $this->context->smarty->assign('comment_field', Configuration::get('comment_field'));
                    $this->context->smarty->assign('adv_show_oc', Configuration::get('adv_show_oc'));
                    if ($old_message = $this->getMessageByCartId((int)$this->context->cart->id)) {
                        $this->context->smarty->assign('oldMessage', $old_message['message']);
                    }
                    $return = array(
                            'array' => $clo['arr'],
                            'err' => $clo['html'],
                            'err_isset' => count($clo['err']),
                            'hasError' => false,
                            'cart_bl' => $this->context->smarty->fetch(
                                _PS_MODULE_DIR_.'advancedcheckout/views/templates/front/cart.tpl'
                            )
                        );
                    die(Tools::jsonEncode($return));
            }
        }
    }
    /*
    * module: advancedcheckout
    * date: 2016-11-30 19:49:55
    * version: 3.1.7
    */
    public function addCOD()
    {
        if (Module::isInstalled('cashondeliveryplus')) {
            $module = Module::getInstanceByName('cashondeliveryplus');
            if (Validate::isLoadedObject($module) && $module->active) {
                $fee = Configuration::get('COD_FEE');
                $feefree = Configuration::get('COD_FEEFREE');
                if ($feefree > 0 && $this->context->cart->getOrderTotal(false, Cart::ONLY_PRODUCTS) > $feefree) {
                    $fee = 0;
                }
                $this->context->smarty->assign(array('cod_id' => $module->id, 'COD_FEE' => $fee));
            }
        }
        if (Module::isInstalled('maofree_cashondeliveryfee')) {
            $module = Module::getInstanceByName('maofree_cashondeliveryfee');
            if (Validate::isLoadedObject($module) && $module->active) {
                if (method_exists($module, 'getCostCOD')) {
                    $this->context->smarty->assign(
                        array('cod_id' => $module->id, 'COD_FEE' => $module->getCostCOD($this->context->cart, 2))
                    );
                } elseif (method_exists($module, 'getCost')) {
                    $this->context->smarty->assign(
                        array('cod_id' => $module->id, 'COD_FEE' => $module->getCost($this->context->cart, 2))
                    );
                } elseif (method_exists($module, 'getCostFee')) {
                    $this->context->smarty->assign(
                        array('cod_id' => $module->id, 'COD_FEE' => $module->getCostFee($this->context->cart))
                    );
                }
            }
        }
        if (Module::isInstalled('cashondeliverywithfee')) {
            $module = Module::getInstanceByName('cashondeliverywithfee');
            if (Validate::isLoadedObject($module) && $module->active) {
                if (method_exists($module, 'getCostValidated')) {
                    $this->context->smarty->assign(
                        array('cod_id' => $module->id, 'COD_FEE' => $module->getCostValidated($this->context->cart))
                    );
                }
            }
        }
        if (Module::isInstalled('megareembolso')) {
            $module = Module::getInstanceByName('megareembolso');
            if (Validate::isLoadedObject($module) && $module->active) {
                if (method_exists($module, 'getCost')) {
                    $this->context->smarty->assign(
                        array('cod_id' => $module->id, 'COD_FEE' => $module->getCost($this->context->cart))
                    );
                }
            }
        }
        if (Module::isInstalled('codfee')) {
            $module = Module::getInstanceByName('codfee');
            if (Validate::isLoadedObject($module) && $module->active) {
                if (method_exists($module, 'getCostValidated')) {
                    $this->context->smarty->assign(
                        array('cod_id' => $module->id, 'COD_FEE' => $module->getCostValidated($this->context->cart))
                    );
                } elseif (method_exists($module, 'getFeeCost')) {
                    $this->context->smarty->assign(
                        array('cod_id' => $module->id, 'COD_FEE' => $module->getFeeCost($this->context->cart))
                    );
                }
            }
        }
    }
    /*
    * module: advancedcheckout
    * date: 2016-11-30 19:49:55
    * version: 3.1.7
    */
    public static function isBirthDate($date, $req, $shw)
    {
        if (in_array('birthday', $shw) && in_array('birthday', $req) && (empty($date) || $date == '0000-00-00')) {
            return false;
        }
        if (empty($date) || $date == '0000-00-00') {
            return true;
        }
        if (preg_match(
            '/^([0-9]{4})-((?:0?[1-9])|(?:1[0-2]))-((?:0?[1-9])|(?:[1-2][0-9])'.
            '|(?:3[01]))([0-9]{2}:[0-9]{2}:[0-9]{2})?$/',
            $date,
            $birth_date
        )) {
            if ($birth_date[1] > date('Y') && $birth_date[2] > date('m') && $birth_date[3] > date('d')
                || $birth_date[1] == date('Y') && $birth_date[2] == date('m') && $birth_date[3] > date('d')
                || $birth_date[1] == date('Y') && $birth_date[2] > date('m')) {
                return false;
            }
            return true;
        }
        return false;
    }
    /*
    * module: advancedcheckout
    * date: 2016-11-30 19:49:55
    * version: 3.1.7
    */
    public function prcsregister()
    {
        $errors = array();
        $isset_customer = false;
        $db = Db::getInstance();
        $fields_custom = $db->ExecuteS(
            'SELECT * FROM `'._DB_PREFIX_.'advcheckout` a
            LEFT JOIN `'._DB_PREFIX_.'advcheckout_lang` al ON (a.`id_field` = al.`id_field`)
            WHERE al.`id_lang` = '.(int)$this->context->cookie->id_lang.
            ' AND a.`active` = 1 AND a.`is_custom` = "1"
            ORDER BY a.`position`'
        );
        $fic = array();
        foreach ($fields_custom as $fc) {
            if (Tools::isSubmit($fc['name'])) {
                $fic[] = $fc;
            }
        }
        if (count($fic) && isset($fic)) {
            foreach ($fic as $ic) {
                $nm = Tools::GetValue($ic['name']);
                if ($ic['required'] == '1' && $nm == '') {
                    $errors[$ic['name']] = '<b>Поле '.$ic['description'].'</b> '.
                        Tools::displayError('is required.');
                }
                if (isset($nm) && $nm != '' && !Validate::$ic['validate']($nm)) {
                    $errors[$ic['name']] = '<b>Поле '.$ic['description'].'</b> '.Tools::displayError('is invalid.');
                }
            }
        }
        $fields = $db->ExecuteS('SELECT * FROM `'._DB_PREFIX_.'advcheckout` a
                                    LEFT JOIN `'._DB_PREFIX_.'advcheckout_lang` al ON (a.`id_field` = al.`id_field`)
                                    WHERE al.`id_lang` = 1 AND a.`active` = 1
                                    ORDER BY a.`position`');
        $req = array();
        $shw = array();
        foreach ($fields as $r) {
            if ($r['required'] == 1) {
                $req[] = $r['name'];
            }
            if ($r['active'] == 1) {
                $shw[] = $r['name'];
            }
        }
        $pass = '';
        $firstname = Tools::GetValue('firstname');
        $lastname = Tools::GetValue('lastname');
        $passwd = Tools::GetValue('passwd');
        $email = Tools::GetValue('email');
        $context = Context::getContext();
        $id_address = $context->cart->id_address_delivery;
        $id_address_invoice = $context->cart->id_address_invoice;
        $newsl = Tools::GetValue('newsletter');
        $optin = Tools::GetValue('optin');
        $gst = Tools::GetValue('pssw');
        $ai = Tools::GetValue('invoice_address');
        $id_gender = Tools::GetValue('id_gender');
        $days = Tools::GetValue('days');
        $months = Tools::GetValue('months');
        $years = Tools::GetValue('years');
        if (!isset($this->context->customer->id)) {
            $customer = new Customer('', true);
        } else {
            $customer = new Customer($this->context->customer->id, true);
            $isset_customer = true;
        }
        if (!empty($email) && in_array('email', $shw)) {
            $email = $email;
        } elseif (empty($email) && !in_array('email', $req)) {
            $email = 'guest'.uniqid().'@'.uniqid().'.ru';
        }
        if ($gst) {
            if ($passwd == '') {
                $pass = Tools::encrypt($passwd = Tools::passwdGen());
            } else {
                $pass = Tools::encrypt($passwd);
            }
        } else {
            if ($this->is_logged && isset($this->context->customer->id)) {
                $pass = $customer->passwd;
            } else {
                $pass = Tools::encrypt($passwd = Tools::passwdGen());
            }
        }
        $id_country = Tools::GetValue('id_country') ?
            Tools::GetValue('id_country') : Configuration::get('PS_COUNTRY_DEFAULT');
        $country = new Country($id_country);
        if (!$this->is_logged && $gst == 1) {
            if (Validate::isEmail($email) && !empty($email)) {
                if (Customer::customerExists($email)) {
                    $errors['email'] = Tools::displayError(
                        '<b>email "'.$email.'" уже зарегистрирован</b>'
                    );
                }
            }
        }
        if ((isset($gst) && $gst) || $this->is_logged) {
            $customer->is_guest = 0;
        } else {
            $customer->is_guest = 1;
        }
        $customer->email = $email;
        if (Tools::getValue('newsletter') && $customer->newsletter == 0) {
            $customer->ip_registration_newsletter = pSQL(Tools::getRemoteAddr());
            $customer->newsletter_date_add = pSQL(date('Y-m-d H:i:s'));
            if ($module_newsletter = Module::getInstanceByName('blocknewsletter')) {
                if ($module_newsletter->active) {
                    $module_newsletter->confirmSubscription($customer->email);
                }
            }
        }
        $customer->firstname = $firstname ? $firstname : '.';
        $customer->lastname = $lastname ? $lastname : '.';
        $customer->birthday = date('Y-m-d', strtotime('-18 years'));
        $customer->id_gender = $id_gender;
        $customer->newsletter = $newsl;
        $customer->birthday = (empty($years) ? '' : (int)$years.'-'.(int)$months.'-'.(int)$days);
        if (!$this->isBirthDate($customer->birthday, $req, $shw)) {
            $errors['years'] = Tools::displayError('Invalid date of birth.');
        }
        $customer->optin = $optin;
        $customer->active = 1;
        $customer->passwd = $pass;
        $errors = array_unique(array_merge($errors, $customer->validateController()));
        $addresses_types = array('address');
        $address = '';
        if ($ai) {
            $addresses_types[] = 'address_invoice';
            $address_invoice = '';
        }
        foreach ($addresses_types as $addresses_type) {
            if ($addresses_type == 'address_invoice') {
                $prefix = '_invoice';
                $id_a = $id_address_invoice ? $id_address_invoice : '';
                if ($id_address_invoice == $id_address && $ai) {
                    $id_a = '';
                }
            } else {
                $prefix = '';
                $id_a = $id_address ? $id_address : '';
            }
            $$addresses_type = new Address($id_a, $this->context->cookie->id_lang, false, true);
            $$addresses_type->firstname = Tools::GetValue('firstname'.$prefix) ?
                Tools::GetValue('firstname'.$prefix) : '.';
            $$addresses_type->lastname = Tools::GetValue('lastname'.$prefix) ?
                Tools::GetValue('lastname'.$prefix) : '.';
            $$addresses_type->address1 = Tools::GetValue('address1'.$prefix);
            $$addresses_type->address2 = Tools::GetValue('address2'.$prefix);
            $$addresses_type->vat_number = Tools::GetValue('vat_number'.$prefix);
            $$addresses_type->phone = Tools::GetValue('phone'.$prefix);
            $$addresses_type->phone_mobile = Tools::GetValue('phone_mobile'.$prefix);
            $$addresses_type->id_country = Tools::GetValue('id_country'.$prefix) ?
                Tools::GetValue('id_country'.$prefix) :
            (int)Configuration::get('PS_COUNTRY_DEFAULT');
            if (Validate::isLoadedObject($country) && !$country->contains_states) {
                $$addresses_type->id_state = 0;
            } else {
                $$addresses_type->id_state = Tools::GetValue('id_state'.$prefix) ?
                    Tools::GetValue('id_state'.$prefix) : 0;
            }
            $$addresses_type->alias = Tools::GetValue('alias'.$prefix) ? Tools::GetValue('alias'.$prefix) :
            ($$addresses_type->alias ? $$addresses_type->alias: 'address'.
                $prefix.date('Y-m-d', strtotime('-19 years')));
            $$addresses_type->dni = Tools::GetValue('dni'.$prefix);
            $$addresses_type->city = Tools::GetValue('city'.$prefix);
            $$addresses_type->other = Tools::GetValue('other'.$prefix);
            $$addresses_type->company = Tools::GetValue('company'.$prefix);
            $$addresses_type->postcode = Tools::GetValue('postcode'.$prefix);
            $err = $$addresses_type->validateController(false, true);
            if ($addresses_type == 'address_invoice') {
                $er = array();
                foreach ($err as $k => $error) {
                    $er[$k.'_invoice'] = $error;
                }
                $errors = (array_merge($errors, $er));
                $ai = true;
            } else {
                $errors = (array_merge($errors, $err));
            }
            unset($addresses_type);
        }
        if (!count($errors)) {
            if (!$customer->save()) {
                $errors[] = Tools::displayError('Error while create new customer account');
            } else {
                if (!$customer->is_guest && !$this->is_logged) {
                    $this->sendConfirmationMail($customer, $passwd);
                }
                foreach ($addresses_types as $addresses_type) {
                    $$addresses_type->id_customer = $customer->id;
                }
                $this->context->cart->id_customer = $customer->id;
                $this->context->cart->secure_key = $customer->secure_key;
                if (!$this->context->cart->update()) {
                    $errors[] = Tools::displayError('An error occurred while updating your cart.');
                } else {
                    $asave = true;
                    foreach ($addresses_types as $addresses_type) {
                        if (!$$addresses_type->save()) {
                            $errors[] = Tools::displayError('An error occurred while add address '.$addresses_type);
                            $asave = false;
                        }
                    }
                    if (!$asave) {
                        $errors[] = Tools::displayError('An error occurred while add address');
                    } else {
                        $this->context->cart->id_customer = $customer->id;
                        $this->context->cart->id_address_delivery = (int)$address->id;
                        if ($ai) {
                            $this->context->cart->id_address_invoice = (int)$address_invoice->id;
                        } else {
                            $this->context->cart->id_address_invoice = (int)$address->id;
                        }
                        $this->context->cart->id_customer = (int)$customer->id;
                        $this->context->cart->secure_key = $customer->secure_key;
                        $this->context->cart->update();
                        $this->context->cookie->id_cart = (int)$this->context->cart->id;
                        $this->context->cookie->write();
                        $this->updateContext($customer);
                        $this->context->cart->updateAddressId($id_address, $address->id);
                        if (!$isset_customer) {
                            if (!$customer->is_guest) {
                                $group = Configuration::get('def_registration_group') ?
                                Configuration::get('def_registration_group') : Configuration::get('PS_CUSTOMER_GROUP');
                                $this->context->customer = $customer;
                            } else {
                                $group = Configuration::get('def_registration_group_guest') ?
                                Configuration::get('def_registration_group_guest') :
                                Configuration::get('PS_GUEST_GROUP');
                            }
                            $customer->cleanGroups();
                            $customer->addGroups(array((int)$group));
                        }
                        if ((count($fic) && isset($fic)) ||
                            Tools::getValue('pickup_center', 0) > 0 ||
                            Tools::getValue('messagex')
                        ) {
                            $c = array();
                            if (count($fic) && isset($fic)) {
                                foreach ($fields_custom as $fc2) {
                                    if (Tools::isSubmit($fc2['name'])) {
                                        $c[][$fc2['name']] = Tools::GetValue($fc2['name']);
                                    }
                                }
                            }
                            $query = new DbQuery();
                            $query->select('id_custom');
                            $query->from('advcheckout_custom');
                            $query->where('id_cart = '.(int)$this->context->cart->id);
                            $svp = $db->GetValue($query);
                            $c = serialize($c);
                            $cus = new CustomClass($svp);
                            $cus->id_cart = (int)$this->context->cart->id;
                            $cus->id_order = 0;
                            $cus->id_pickup = Tools::getValue('pickup_center', 0);
                            $cus->message = Tools::getValue('messagex', '');
                            $cus->value = $c;
                            $cus->save();
                        }
                    }// address add
                }// cart update
            }// user add
        }
        $this->advProcessCarrier();
        return array('hasError' => !empty($errors), 'errors' => $errors);
    }
    /*
    * module: advancedcheckout
    * date: 2016-11-30 19:49:55
    * version: 3.1.7
    */
    public function advProcessCarrier()
    {
        return parent::_processCarrier();
    }
    /*
    * module: advancedcheckout
    * date: 2016-11-30 19:49:55
    * version: 3.1.7
    */
    protected function umess()
    {
        $message_content = Tools::getValue('messagex');
        $result = false;
        if ($message_content) {
            if (!Validate::isMessage($message_content)) {
                $this->errors[] = Tools::displayError('Invalid message');
            } else {
                $query = new DbQuery();
                $query->select('id_custom');
                $query->from('advcheckout_custom');
                $query->where('id_cart = '.(int)$this->context->cart->id);
                $svp = Db::getInstance()->GetValue($query);
                $cus = new CustomClass($svp);
                $cus->message = Tools::getValue('messagex', '');
                $cus->id_cart = (int)$this->context->cart->id;
                if ($cus->save()) {
                    $result = true;
                }
            }
        }
        return array('errors' => $this->errors, 'result' => $result);
    }
    /*
    * module: advancedcheckout
    * date: 2016-11-30 19:49:55
    * version: 3.1.7
    */
    public function updateContext(Customer $customer)
    {
        $this->context->customer = $customer;
        $this->context->smarty->assign('confirmation', 1);
        $this->context->cookie->id_customer = (int)$customer->id;
        $this->context->cookie->customer_lastname = $customer->lastname;
        $this->context->cookie->customer_firstname = $customer->firstname;
        $this->context->cookie->passwd = $customer->passwd;
        $this->context->cookie->logged = 1;
        $customer->logged = 1;
        $this->context->cookie->email = $customer->email;
        $this->context->cookie->is_guest = $customer->is_guest;
        $this->context->cart->secure_key = $customer->secure_key;
    }
    /*
    * module: advancedcheckout
    * date: 2016-11-30 19:49:55
    * version: 3.1.7
    */
    public function sendConfirmationMail($customer, $p)
    {
        if (!Configuration::get('PS_CUSTOMER_CREATION_EMAIL')) {
            return true;
        }
        return Mail::Send(
            $this->context->language->id,
            'account',
            Mail::l('Welcome!'),
            array(
                '{firstname}' => $customer->firstname,
                '{lastname}' => $customer->lastname,
                '{email}' => $customer->email,
                '{passwd}' => $p),
            $customer->email,
            $customer->firstname.' '.$customer->lastname
        );
    }
    /*
    * module: advancedcheckout
    * date: 2016-11-30 19:49:55
    * version: 3.1.7
    */
    public function setMedia()
    {
        parent::setMedia();
        if (_PS_VERSION_ >= '1.6.0.0') {
            $this->is_new = true;
        } elseif (_PS_VERSION_ >= '1.5.0.0' && _PS_VERSION_ <= '1.6.0.0') {
            $this->is_new = false;
        }
        foreach ($this->js_files as $key => $js) {
            if (strpos($js, 'cart-summary.js')) {
                unset($this->js_files[$key]);
            }
            if (strpos($js, 'treeManagement.js')) {
                unset($this->js_files[$key]);
            }
            if (strpos($js, 'statesManagement.js')) {
                unset($this->js_files[$key]);
            }
            if (strpos($js, 'order-opc.js')) {
                unset($this->js_files[$key]);
            }
            if (strpos($js, 'order-address.js')) {
                unset($this->js_files[$key]);
            }
            if (strpos($js, 'order-carrier.js')) {
                unset($this->js_files[$key]);
            }
            if (strpos($js, 'easing.js')) {
                unset($this->js_files[$key]);
            }
            if (strpos($js, 'validate.js')) {
                unset($this->js_files[$key]);
            }
            if (strpos($js, 'typewatch.js')) {
                unset($this->js_files[$key]);
            }
            if (strpos($js, 'uniform')) {
                unset($this->js_files[$key]);
            }
        }
        $keys = array_keys($this->css_files);
        foreach ($keys as $k) {
            if (strpos($k, 'order-opc.css')) {
                unset($this->css_files[$k]);
            }
        }
        $this->addCSS(__PS_BASE_URI__.'modules/advancedcheckout/views/css/tt.css');
        $this->addCSS(__PS_BASE_URI__.'modules/advancedcheckout/views/css/opc.css');
        $this->addCSS(
            __PS_BASE_URI__.'modules/advancedcheckout/views/css/style_'.
            Configuration::get('columns_checkout').'col.css'
        );
        $this->addCSS(__PS_BASE_URI__.'modules/advancedcheckout/views/css/font-awesome.css');
        $this->addJS(__PS_BASE_URI__.'modules/advancedcheckout/views/js/jquery.tw.js');
        $this->addJS(__PS_BASE_URI__.'modules/advancedcheckout/views/js/cart-summary.js');
        $this->addJS(__PS_BASE_URI__.'modules/advancedcheckout/views/js/main.js');
        $this->addJS(__PS_BASE_URI__.'modules/advancedcheckout/views/js/states.js');
        $this->addJS(__PS_BASE_URI__.'modules/advancedcheckout/views/js/validate.js');
        $this->addJS(__PS_BASE_URI__.'modules/advancedcheckout/views/js/tools.js');
        $this->addJS(__PS_BASE_URI__.'modules/advancedcheckout/views/js/jquery.total-storage.js');
    }
    /*
    * module: advancedcheckout
    * date: 2016-11-30 19:49:55
    * version: 3.1.7
    */
    protected function assignCountries()
    {
        $selected_country = (int)Configuration::get('PS_COUNTRY_DEFAULT');
        if (Configuration::get('PS_RESTRICT_DELIVERED_COUNTRIES')) {
            $countries = Carrier::getDeliveredCountries($this->context->language->id, true, true);
        } else {
            $countries = Country::getCountries($this->context->language->id, true);
        }
        $list = '';
        foreach ($countries as $country) {
            $selected = ($country['id_country'] == $selected_country) ? 'selected="selected"' : '';
            $list .= '<option value="'.(int)$country['id_country'].'" '.$selected.'>'.
                htmlentities($country['name'], ENT_COMPAT, 'UTF-8').'</option>';
        }
        $address_delivery = new Address(
            $this->context->cart->id_address_delivery,
            $this->context->cookie->id_lang,
            true,
            true
        );
        $selected_country = $address_delivery->id_country;
        $this->context->smarty->assign(array(
            'countries_list' => $list,
            'countries' => $countries,
            'sl_country' => $selected_country
        ));
    }
    /*
    * module: advancedcheckout
    * date: 2016-11-30 19:49:55
    * version: 3.1.7
    */
    protected function advAssignAddress()
    {
        $add = false;
        $id_country = Tools::GetValue('id_country') ?
            Tools::GetValue('id_country') : Configuration::get('PS_COUNTRY_DEFAULT');
        $id_tmp_addr = $this->context->cart->id_address_delivery;
        $country = new Country($id_country);
        if ($this->context->customer->id > 0 &&
            (empty($id_tmp_addr) || $id_tmp_addr == 0) &&
            !$this->context->cart->isVirtualCart()
        ) {
            $add = true;
        }
        if ($id_tmp_addr) {
            $address = new Address($id_tmp_addr);
            if ($address->id_customer != $this->context->cart->id_customer) {
                $add = true;
            }
        }
        if ($add) {
            $id_state = Tools::GetValue('id_state');
            $address_delivery = new Address(
                $this->context->cart->id_address_delivery,
                $this->context->cookie->id_lang,
                true,
                true
            );
            if (Validate::isLoadedObject($country) && !$country->contains_states) {
                $address_delivery->id_state = 0;
            }
            $address_delivery->dni = '12345678X';
            $address_delivery->id_customer = $this->context->customer->id;
            $address_delivery->firstname = 'First name';
            $address_delivery->lastname = 'Last name';
            $address_delivery->address2 = 'Address';
            $address_delivery->address1 = 'Address';
            $address_delivery->city = 'City';
            $address_delivery->postcode = '000000';
            $address_delivery->phone_mobile = '123456789';
            $address_delivery->phone = '123456789';
            $address_delivery->alias = 'Alias Delivery - '.date('Y-m-d s');
            $address_delivery->id_country = (int)Configuration::get('PS_COUNTRY_DEFAULT');
            $address_delivery->id_state = $id_state ? (int)$id_state : 0;
            if (!$address_delivery->save()) {
                $this->errors[] = Tools::displayError('An error occurred while update your delivery address.');
            }
            if (Validate::isLoadedObject($address_delivery) && !count($this->errors)) {
                $this->context->cart->id_address_delivery = $address_delivery->id;
                $this->context->cart->id_address_invoice = $address_delivery->id;
                $this->context->cart->id_customer = $address_delivery->id_customer;
                $this->context->cart->update();
            }
        }
        parent::_assignAddress();
    }
    /*
    * module: advancedcheckout
    * date: 2016-11-30 19:49:55
    * version: 3.1.7
    */
    public function loadfield($new_addr = '')
    {
        $id_tmp_addr = $this->context->cart->id_address_delivery;
        $db = Db::getInstance();
        $fields = $db->ExecuteS('SELECT * FROM `'._DB_PREFIX_.'advcheckout` a
                                        LEFT JOIN `'._DB_PREFIX_.'advcheckout_lang` al ON (a.`id_field` = al.`id_field`)
                                        WHERE al.`id_lang` = '.(int)$this->context->cookie->id_lang.' AND a.`active` = 1
                                        ORDER BY a.`position`');
        $fields_custom = $db->ExecuteS(
            'SELECT * FROM `'._DB_PREFIX_.'advcheckout` a
            LEFT JOIN `'._DB_PREFIX_.'advcheckout_lang` al ON (a.`id_field` = al.`id_field`)
            WHERE al.`id_lang` = '.(int)$this->context->cookie->id_lang.' AND a.`active` = 1 AND a.`is_custom` = "1"
            ORDER BY a.`position`'
        );
        $query = new DbQuery();
        $query->select('MAX(`id_custom`) as max');
        $query->from('advcheckout_custom');
        $query->where('id_cart = '.$this->context->cart->id);
        $o = $db->GetRow($query);
        unset($query);
        $custom = new stdClass();
        if (isset($o['max'])) {
            $query = new DbQuery();
            $query->select('value');
            $query->from('advcheckout_custom');
            $query->where('id_cart = '.$this->context->cart->id);
            $query->where('id_custom = '.$o['max']);
            $ord = $db->GetValue($query);
            $val = unserialize($ord);
            foreach ($fields_custom as &$fc) {
                if (!empty($val)) {
                    foreach ($val as $v) {
                        if (isset($v[$fc['name']])) {
                            $custom->$fc['name'] = $v[$fc['name']];
                        }
                    }
                } else {
                    $custom->$fc['name'] = '';
                }
            }
        } else {
            foreach ($fields_custom as $fc) {
                $custom->$fc['name'] = '';
            }
        }
        $cn = $db->getRow('SELECT active FROM `'._DB_PREFIX_.'advcheckout` WHERE id_field = 10');
        $years = Tools::dateYears();
        $months = Tools::dateMonths();
        $days = Tools::dateDays();
        $this->context->smarty->assign(array(
            'years' => $years,
            'months' => $months,
            'days' => $days,
        ));
        if ($this->is_logged) {
            $this->advAssignAddress();
        }
        $this->assignCountries();
        $s_y = '';
        $s_d = '';
        $s_m = '';
        if ($this->is_logged ||
            (isset($this->context->customer->id) &&
                $this->context->customer->id > 0 &&
                $this->context->customer->is_guest
            )
        ) {
            $customer = $this->context->customer;
            $address_delivery = new Address($id_tmp_addr, $this->context->cookie->id_lang, true, true);
            $address_invoice = new Address(
                $this->context->cart->id_address_invoice,
                $this->context->cookie->id_lang,
                true,
                true
            );
            $list_addr = $this->getListAddressByCustomer($customer->id);
            $list_addr_i = $this->getListAddressByCustomer($customer->id, true);
            $birthday = explode('-', $customer->birthday);
            $s_y = isset($birthday[0]) ? $birthday[0] : 0;
            $s_m = isset($birthday[1]) ? $birthday[1] : 0;
            $s_d = isset($birthday[2]) ? $birthday[2] : 0;
        } else {
            $customer = array();
            $address_delivery = array();
            $address_invoice = array();
            $list_addr = '';
            $list_addr_i = '';
        }
        $ai = Tools::GetValue('invoice_address');
        if (($this->context->cart->id_address_invoice != $this->context->cart->id_address_delivery) || $ai) {
            $open_invoice = true;
        } else {
            $open_invoice = false;
        }
        $this->context->smarty->assign(array(
            'fields' => $fields,
            's_y' => $s_y,
            's_d' => $s_d,
            's_m' => $s_m,
            'custom' => $custom,
            'customer' => $customer,
            'address' => $address_delivery,
            'cn' => $cn['active'],
            'logged' => $this->is_logged,
            'defcountry' => Configuration::get('PS_COUNTRY_DEFAULT'),
            'genders' => Gender::getGenders(),
            'list_addr' => $list_addr,
            'list_addr_i' => $list_addr_i,
            'new_addr' => $new_addr,
            'adv_ainvoice' => Configuration::get('adv_ainvoice'),
            'address_i' => $address_invoice,
            'vcart' => (int)$this->context->cart->isVirtualCart(),
            'open_invoice' => $open_invoice, //$open_invoice
        ));
        $this->context->smarty->assign(array(
            'HOOK_CREATE_ACCOUNT_FORM' => Hook::exec('displayCustomerAccountForm'),
            'HOOK_CREATE_ACCOUNT_TOP' => Hook::exec('displayCustomerAccountFormTop')
        ));
        $res = $this->context->smarty->fetch(_PS_MODULE_DIR_.'advancedcheckout/views/templates/front/pole.tpl');
        $result = array(
                'hasError' => false,
                'block_field' => $res
            );
        return $result;
    }
    /*
    * module: advancedcheckout
    * date: 2016-11-30 19:49:55
    * version: 3.1.7
    */
    public function addnewaddr($type)
    {
        $ai = Tools::GetValue('invoice_address');
        $id_country = Tools::GetValue('id_country') ?
            Tools::GetValue('id_country') : Configuration::get('PS_COUNTRY_DEFAULT');
        $address_delivery = null;
        $country = new Country($id_country);
        $i = $this->context->cart->id_address_delivery;
        $id_state = Tools::GetValue('id_state') ? Tools::GetValue('id_state') : 0;
        $postcode = Tools::GetValue('postcode') ? Tools::GetValue('postcode') : '00000';
        $address_delivery = new Address('', $this->context->cookie->id_lang, true, true);
        $address_delivery->dni = '12345678X';
        $address_delivery->id_customer = $this->context->customer->id;
        $address_delivery->firstname = 'First name';
        $address_delivery->lastname = 'Last name';
        $address_delivery->address1 = 'Address';
        $address_delivery->city = 'City';
        $address_delivery->postcode = '000000';
        $address_delivery->phone = '123456789';
        $address_delivery->phone_mobile = '123456789';
        if ($type == 'i') {
            $address_delivery->alias = 'Alias Invoice - '.date('Y-m-d s');
        } else {
            $address_delivery->alias = 'Alias Delivery - '.date('Y-m-d s');
        }
        $address_delivery->id_country = (int)Configuration::get('PS_COUNTRY_DEFAULT');
        $address_delivery->id_state = (int)$id_state;
        $address_delivery->postcode = $postcode;
        if (!$address_delivery->save()) {
            $this->errors[] = Tools::displayError('An error occurred while update your delivery address.');
        }
        if (Validate::isLoadedObject($address_delivery) && !count($this->errors)) {
            if ($type == 'd') {
                $this->context->cart->updateAddressId($i, $address_delivery->id);
                $this->context->cart->id_address_delivery = $address_delivery->id;
                if (!$ai) {
                    $this->context->cart->id_address_invoice = $address_delivery->id;
                }
            } elseif ($type == 'i') {
                $this->context->cart->id_address_invoice = $address_delivery->id;
            }
            $this->context->cart->id_customer = $address_delivery->id_customer;
            $this->context->cart->update();
            $id_zone = Address::getZoneById((int)$address_delivery->id);
            if (!Address::isCountryActiveById((int)$address_delivery->id)) {
                $this->errors[] = Tools::displayError('This address is not in a valid area.');
            } elseif (!Validate::isLoadedObject($address_delivery) || $address_delivery->deleted) {
                $this->errors[] = Tools::displayError('This address is invalid. Try out session and login again.');
            }
        } else {
            if (!empty($id_state)) {
                $id_zone = State::getIdZone($id_state);
                $country->id_zone = $id_zone;
            }
        }
        if (count($this->errors)) {
            $return = array(
                'hasError' => true,
                'errors' => $this->errors,
            );
        } else {
            $return = array(
                'hasError' => false,
                'address' => $address_delivery,
                'block_field' => $this->loadfield(1),
                'alias' => $address_delivery->alias,
                'id' => $address_delivery->id,
                'list_addr' => $this->getListAddressByCustomer($this->context->customer->id),
                'list_addr_i' => $this->getListAddressByCustomer($this->context->customer->id, true)
            );
        }
        return $return;
    }
    /*
    * module: advancedcheckout
    * date: 2016-11-30 19:49:55
    * version: 3.1.7
    */
    public function initContent()
    {
        if (Tools::getValue('ajax') == 'true') {
            return;
        }
        if ($this->is_logged) {
            $this->advAssignAddress();
        }
        parent::initContent();
        $this->addCOD();
        $this->is_logged = $this->context->customer->isLogged();
        $id_country = Tools::GetValue('id_country') ?
            Tools::GetValue('id_country') : Configuration::get('PS_COUNTRY_DEFAULT');
        $id_tmp_addr = $this->context->cart->id_address_delivery;
        $country = new Country($id_country);
        if (!$this->is_logged && empty($id_tmp_addr) && !$this->context->cart->isVirtualCart()) {
            $id_state = Tools::GetValue('id_state');
            $address_delivery = new Address(
                $this->context->cart->id_address_delivery,
                $this->context->cookie->id_lang,
                true,
                true
            );
            if (Validate::isLoadedObject($country) && !$country->contains_states) {
                $address_delivery->id_state = 0;
            }
            if (empty($this->context->cart->id_address_delivery)) {
                $address_delivery->dni = '12345678X';
                $address_delivery->id_customer = Configuration::get('OPC_ID_CUSTOMER');
                $address_delivery->firstname = 'First name';
                $address_delivery->lastname = 'Last name';
                $address_delivery->address2 = 'Address';
                $address_delivery->address1 = 'Address';
                $address_delivery->city = 'City';
                $address_delivery->postcode = '000000';
                $address_delivery->phone_mobile = '123456789';
                $address_delivery->phone = '123456789';
                $address_delivery->alias = 'Alias Delivery - '.date('Y-m-d s');
                $address_delivery->id_country = (int)Configuration::get('PS_COUNTRY_DEFAULT');
                $address_delivery->id_state = $id_state ? (int)$id_state : 0;
                if (!$address_delivery->save()) {
                    $this->errors[] = Tools::displayError('An error occurred while update your delivery address.');
                }
                if (Validate::isLoadedObject($address_delivery) && !count($this->errors)) {
                    $this->context->cart->id_address_delivery = $address_delivery->id;
                    $this->context->cart->id_address_invoice = $address_delivery->id;
                    $this->context->cart->id_customer = $address_delivery->id_customer;
                    $this->context->cart->update();
                }
            }
        } else {
            $address_delivery = new Address($id_tmp_addr, $this->context->cookie->id_lang, true, true);
        }
        if (empty($this->context->cart->id_carrier)) {
            $checked = $this->context->cart->simulateCarrierSelectedOutput();
            $checked = ((int)Cart::desintifier($checked));
            $this->context->cart->id_carrier = $checked;
            $this->context->cart->update();
            CartRule::autoRemoveFromCart($this->context);
            CartRule::autoAddToCart($this->context);
        }
        $old_message = $this->getMessageByCartId((int)$this->context->cart->id);
        $cms = new CMS(Configuration::get('PS_CONDITIONS_CMS_ID'), $this->context->language->id);
        $link_conditions = $this->context->link->getCMSLink($cms, $cms->link_rewrite, true);
        if (!strpos($link_conditions, '?')) {
            $link_conditions .= '?content_only=1';
        } else {
            $link_conditions .= '&content_only=1';
        }
        $md = new AdvancedCheckout();
        $pp_content = array();
        $pickup_point_keys = array();
        $pickup_point = Db::getInstance()->ExecuteS(
            'SELECT * FROM '._DB_PREFIX_.'advcheckout_pickup a
            LEFT JOIN '._DB_PREFIX_.'advcheckout_pickup_lang al ON (a.id_pickup = al.id_pickup)
            WHERE active = 1 AND id_lang = '.(int)$this->context->language->id
        );
        if (!empty($pickup_point)) {
            foreach ($pickup_point as $pp) {
                $html = '';
                $translate = $md->o_translate;
                $pickup_point_keys[$pp['id_pickup']] = $pp;
                $html = '<div class="opc-pickup-content">';
                $html .= '<h4 class="opc-pickup-name">'.$pp['name'].'</h4>';
                $html .= '<div class="opc-pickup-address"><b>'.$translate[0].'</b> '.
                ((isset($pp['city']) && !empty($pp['city'])) ? $pp['city'].' ' : '').$pp['address'].
                ((isset($pp['postcode']) && !empty($pp['postcode'])) ? ' '.$pp['postcode'] : '').'</div>';
                $html .= '<div class="opc-pickup-number"><b>'.$translate[1].'</b> '.$pp['number'].'</div>';
                (isset($pp['fax']) && !empty($pp['fax'])) ?
                    $html .= '<div class="opc-pickup-fax"><b>'.$translate[2].'</b> '.$pp['fax'].'</div>' : '';
                (isset($pp['email']) && !empty($pp['email'])) ?
                    $html .= '<div class="opc-pickup-email"><b>'.
                    $translate[3].'</b> '.$pp['email'].'</div>' : '';
                $times = Tools::unSerialize($pp['times']);
                if (!empty($times)) {
                    $days = $md->days;
                    $html .= '<div class="opc-pickup-tdesc"><b>'.$translate[4].'</b></div>';
                    foreach ($times as $kk => $t) {
                        $html .= '<div class="opc-pickup-time_'.$kk.'"><b>'.$days[$kk].'</b>: '.$t.'</div>';
                    }
                }
                $html .= '</div>';
                $pp_content[$pp['id_pickup']] = $html;
            }
        }
        $pickup_val = 0;
        if (Configuration::get('maps_pickup_on') && $this->context->cart->id) {
            $query = new DbQuery();
            $query->select('id_pickup');
            $query->from('advcheckout_custom');
            $query->where('id_cart = '.$this->context->cart->id);
            $pickup_val = Db::getInstance()->GetValue($query);
        }
        $this->context->smarty->assign(array(
            'logged' => $this->is_logged,
            'pickup_val' => $pickup_val,
            'country' => new Country(Configuration::get('PS_COUNTRY_DEFAULT')),
            'pickup_point_json' => Tools::jsonEncode($pickup_point_keys),
            'pickup_point' => $pickup_point_keys,
            'pp_content' => $pp_content,
            'cm_latitude' => Configuration::get('cm_latitude'),
            'cm_longitude' => Configuration::get('cm_longitude'),
            'carrier_pickup' => Configuration::get('carrier_pickup'),
            'maps_pickup_on' => Configuration::get('maps_pickup_on'),
            'isGuest' => isset($this->context->cookie->is_guest) ? $this->context->cookie->is_guest : 0,
            'PS_GUEST_CHECKOUT_ENABLED' => Configuration::get('PS_GUEST_CHECKOUT_ENABLED'),
            'one_phone_at_least' => (int)Configuration::get('PS_ONE_PHONE_AT_LEAST'),
            'HOOK_CREATE_ACCOUNT_FORM' => Hook::exec('displayCustomerAccountForm'),
            'HOOK_CREATE_ACCOUNT_TOP' => Hook::exec('displayCustomerAccountFormTop'),
            'clr' => Configuration::getMultiple(
                array(
                    'color_pick_1',
                    'color_pick_2',
                    'color_pick_3',
                    'color_pick_4',
                    'color_pick_7'
                )
            ),
            'adv_show_payment' => Configuration::get('adv_show_payment'),
            'adv_show_carrier' => Configuration::get('adv_show_carrier'),
            'adv_show_cart' => Configuration::get('adv_show_cart'),
            'adv_circle' => Configuration::get('adv_circle'),
            'adv_show_zalivka' => Configuration::get('adv_show_zalivka'),
            'checkedTOS' => (int)$this->context->cookie->checkedTOS,
            'cms_id' => (int)Configuration::get('PS_CONDITIONS_CMS_ID'),
            'conditions' => (int)Configuration::get('PS_CONDITIONS'),
            'link_conditions' => $link_conditions,
            'oldMessage' => isset($old_message['message'])? $old_message['message'] : '',
            'refresh' => Configuration::getMultiple(
                array(
                    'postcode_refresh',
                    'city_refresh',
                    'country_refresh',
                    'state_refresh'
                )
            ),
        ));
        if ($this->is_logged && $this->context->cookie->is_guest) {
            $this->context->smarty->assign('guestInformations', $this->_getGuestInformations());
        }
        Tools::safePostVars();
        $this->setTemplate(_PS_MODULE_DIR_.'advancedcheckout/views/templates/front/order-opc.tpl');
    }
    /*
    * module: advancedcheckout
    * date: 2016-11-30 19:49:55
    * version: 3.1.7
    */
    public function getMessageByCartId($id)
    {
        $query = new DbQuery();
        $query->select('message');
        $query->from('advcheckout_custom');
        $query->where('id_cart = '.(int)$id);
        $svp = Db::getInstance()->GetRow($query);
        return $svp;
    }
    /*
    * module: advancedcheckout
    * date: 2016-11-30 19:49:55
    * version: 3.1.7
    */
    public function loadcarrier()
    {
        if (!$this->is_logged) {
            $address_delivery = new Address(
                $this->context->cart->id_address_delivery,
                $this->context->cookie->id_lang,
                true,
                true
            );
            $address_delivery->id_country = Tools::GetValue('cn') ?
                (int)Tools::GetValue('cn') : Configuration::get('PS_COUNTRY_DEFAULT');
            $address_delivery->id_state = (int)Tools::GetValue('st');
            $address_delivery->save();
        }
        $address_delivery = new Address(
            $this->context->cart->id_address_delivery,
            $this->context->cookie->id_lang,
            true,
            true
        );
        $carriers = $this->context->cart->simulateCarriersOutput();
        $delivery_option = $this->context->cart->getDeliveryOption(null, false, false);
        $wrapping_fees = $this->context->cart->getGiftWrappingPrice(false);
        $wrapping_fees_tax_inc = $wrapping_fees = $this->context->cart->getGiftWrappingPrice();
        $free_shipping = false;
        $delivery_option_list = $this->context->cart->getDeliveryOptionList();
        foreach ($this->context->cart->getCartRules() as $rule) {
            if ($rule['free_shipping'] && !$rule['carrier_restriction']) {
                $free_shipping = true;
                break;
            }
        }
        if ($old_message = $this->getMessageByCartId((int)$this->context->cart->id)) {
            $this->context->smarty->assign('oldMessage', $old_message['message']);
        }
        $vars = array(
            'free_shipping' => $free_shipping,
            'adv_show_oc' => Configuration::get('adv_show_oc'),
            'comment_field' => Configuration::get('comment_field'),
            'pathx' => __PS_BASE_URI__.'modules/advancedcheckout/',
            'recyclablePackAllowed' => (int)Configuration::get('PS_RECYCLABLE_PACK'),
            'giftAllowed' => (int)Configuration::get('PS_GIFT_WRAPPING'),
            'recyclable' => (int)$this->context->cart->recyclable,
            'gift_wrapping_price' => (float)$wrapping_fees,
            'total_wrapping_cost' => Tools::convertPrice($wrapping_fees_tax_inc, $this->context->currency),
            'total_wrapping_tax_exc_cost' => Tools::convertPrice($wrapping_fees, $this->context->currency),
            'delivery_option_list' => $delivery_option_list,
            'carriers' => $carriers,
            'checked' => $this->context->cart->simulateCarrierSelectedOutput(),
            'delivery_option' => $delivery_option,
            'address_collection' => $this->context->cart->getAddressCollection(),
            'opc' => true,
            'vcart' => (int)$this->context->cart->isVirtualCart(),
            'tax_view' => Configuration::get('tax_view'),
            'HOOK_BEFORECARRIER' => Hook::exec('displayBeforeCarrier', array(
                'carriers' => $carriers,
                'delivery_option_list' => $delivery_option_list,
                'delivery_option' => $delivery_option
            ))
        );
        Cart::addExtraCarriers($vars);
        $this->context->smarty->assign($vars);
        $this->context->smarty->assign('isVirtualCart', $this->context->cart->isVirtualCart());
        if (!Address::isCountryActiveById((int)$this->context->cart->id_address_delivery) &&
            $this->context->cart->id_address_delivery != 0
        ) {
            $this->errors[] = Tools::displayError('This address is not in a valid area.');
        } elseif ((!Validate::isLoadedObject($address_delivery) ||
            $address_delivery->deleted) &&
            $this->context->cart->id_address_delivery != 0
        ) {
            $this->errors[] = Tools::displayError('This address is invalid.');
        } else {
            $result = array(
                'summary' => $this->context->cart->getSummaryDetails(),
                'hasError' => false,
                'cnt' => empty($delivery_option_list),
                'vcart' => (int)$this->context->cart->isVirtualCart(),
                'HOOK_BEFORECARRIER' => Hook::exec('displayBeforeCarrier', array(
                    'carriers' => $carriers,
                    'delivery_option_list' => $this->context->cart->getDeliveryOptionList(),
                    'delivery_option' => $this->context->cart->getDeliveryOption(null, true)
                )),
                'carrier_block' => $this->context->smarty->fetch(
                    _PS_MODULE_DIR_.'advancedcheckout/views/templates/front/carrier_tmpl.tpl'
                )
            );
            Cart::addExtraCarriers($result);
            return $result;
        }
        if (count($this->errors)) {
            return array(
                'hasError' => true,
                'errors' => $this->errors,
                'vcart' => (int)$this->context->cart->isVirtualCart(),
                'carrier_block' => $this->context->smarty->fetch(
                    _PS_MODULE_DIR_.'advancedcheckout/views/templates/front/carrier_tmpl.tpl'
                )
            );
        }
    }
    /*
    * module: advancedcheckout
    * date: 2016-11-30 19:49:55
    * version: 3.1.7
    */
    public function forgot()
    {
        if (Tools::isSubmit('email')) {
            if (!($email = trim(Tools::getValue('email'))) || !Validate::isEmail($email)) {
                $this->errors[] = Tools::displayError('Invalid email address.');
            } else {
                $customer = new Customer();
                $customer->getByemail($email);
                if (!Validate::isLoadedObject($customer)) {
                    $this->errors[] = Tools::displayError('There is no account registered for this email address.');
                } elseif (!$customer->active) {
                    $this->errors[] = Tools::displayError('You cannot regenerate the password for this account.');
                } elseif ((strtotime(
                    $customer->last_passwd_gen.'+'.
                    (int)$min_time = Configuration::get('PS_PASSWD_TIME_FRONT').' minutes'
                ) - time()) > 0
                ) {
                    $this->errors[] = sprintf(
                        Tools::displayError('You can regenerate your password only every %d minute(s)'),
                        (int)$min_time
                    );
                } else {
                    $mail_params = array(
                        '{email}' => $customer->email,
                        '{lastname}' => $customer->lastname,
                        '{firstname}' => $customer->firstname,
                        '{url}' => $this->context->link->getPageLink(
                            'password',
                            true,
                            null,
                            'token='.$customer->secure_key.'&id_customer='.(int)$customer->id
                        )
                    );
                    if (Mail::Send(
                        $this->context->language->id,
                        'password_query',
                        Mail::l('Password query confirmation'),
                        $mail_params,
                        $customer->email,
                        $customer->firstname.' '.$customer->lastname
                    )) {
                            $this->context->smarty->assign(
                                array('confirmation' => 2, 'customer_email' => $customer->email)
                            );
                            $ret = array(
                                        'customer_email' => $customer->email,
                                        'confirmation' => 1
                            );
                    } else {
                        $this->errors[] = Tools::displayError('An error occurred while sending the email.');
                    }
                }
            }
            $return = array(
                'hasError' => !empty($this->errors),
                'errors' => $this->errors,
            );
            if (isset($ret) && count($ret)) {
                $ret = array_merge($ret, $return);
                return $ret;
            } else {
                return $return;
            }
        }
    }
    /*
    * module: advancedcheckout
    * date: 2016-11-30 19:49:55
    * version: 3.1.7
    */
    public function loadpayment()
    {
        $dt = array();
        $ids_unpayment_module = '';
        $ids_payment_module = '';
        if (!$this->context->cart->isVirtualCart()) {
            $id_payment = array();
            $id_unpayment = array();
            $rows = Db::getInstance()->GetRow(
                'SELECT id_payment_module FROM '._DB_PREFIX_.'advcheckout_ship_to_pay 
                WHERE active = 1 AND id_carrier = '.(int)$this->context->cart->id_carrier
            );
            if (count($rows) && !empty($rows)) {
                $ids_payment_module = $rows['id_payment_module'];
                $idpm = $rows['id_payment_module'];
                $idss = explode(',', $ids_payment_module);
                foreach ($idss as $m) {
                    $pos = strpos($m, 'id_');
                    if ($pos === false) {
                        $id_payment[] = $m;
                    } else {
                        $id_unpayment[] = Tools::substr($m, 3);
                    }
                }
                if (isset($id_payment) && count($id_payment)) {
                    $ids_payment_module = implode(',', $id_payment);
                } else {
                    $ids_payment_module = '999';
                }
                if (isset($id_unpayment) && count($id_unpayment)) {
                    $ids_unpayment_module = implode(',', $id_unpayment);
                } else {
                    $ids_unpayment_module = '999';
                }
            } else {
                $ids_payment_module = '';
                $ids_unpayment_module = '';
            }
        }
        $context = Context::getContext();
        $use_groups = Group::isFeatureActive();
        if ($use_groups) {
            if (isset($context->customer) && $context->customer->isLogged()) {
                $groups = $context->customer->getGroups();
            } elseif (isset($context->customer) && $context->customer->isLogged(true)) {
                $groups = array((int)Configuration::get('PS_GUEST_GROUP'));
            } else {
                $groups = array((int)Configuration::get('PS_UNIDENTIFIED_GROUP'));
            }
        }
        if (_PS_VERSION_ >= '1.6.0.0') {
            $this->is_new = true;
        } elseif (_PS_VERSION_ >= '1.5.0.0' && _PS_VERSION_ <= '1.6.0.0') {
            $this->is_new = false;
        }
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
        if (!empty($idpm)) {
            $sql->where('m.`id_module` IN ('.$ids_payment_module.')');
        }
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
        if ($use_groups) {
            $sql->leftJoin('module_group', 'mg', 'mg.`id_module` = m.`id_module`');
            if (Validate::isLoadedObject($context->shop)) {
                $sql->where(
                    'mg.id_shop = '.((int)$context->shop->id).' AND  mg.`id_group` IN ('.implode(', ', $groups).')'
                );
            } else {
                $sql->where('mg.`id_group` IN ('.implode(', ', $groups).')');
            }
        }
        $data2 = '';
        $sql->groupBy('hm.id_hook, hm.id_module');
        $sql->orderBy('hm.`position`');
        $result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
        $hook_args = array('cookie' => $this->context->cookie, 'cart' => $this->context->cart);
        $data = array();
        $unpay = Unpay::getUnpay($context->cookie->id_lang, true, $ids_unpayment_module);
        $pos = unserialize(Configuration::get('ADV_PAYMENT_POS'));
        $dt = array();
        if (isset($unpay) && count($unpay)) {
            foreach ($unpay as $paysystem) {
                if (file_exists(
                    _PS_MODULE_DIR_.'advancedcheckout/views/img/payments/unpay_'.
                    $paysystem['id_unpay'].'.gif'
                )) {
                    $url_image = __PS_BASE_URI__.'modules/advancedcheckout/views/img/payments/unpay_'.
                        $paysystem['id_unpay'].'.gif';
                } else {
                    $url_image = __PS_BASE_URI__.'modules/advancedcheckout/views/img/payments/default.png';
                }
                $dt[] = array(
                    'id' => 'unpay_'.$paysystem['id_unpay'],
                    'name' => $paysystem['name'],
                    'url_image' => $url_image,
                    'url_go' => $this->context->link->getModuleLink(
                        'advancedcheckout',
                        'payment',
                        array('id_unpay' => $paysystem['id_unpay']),
                        true
                    ),
                    'desc' => $paysystem['description_short'],
                    'position' => $pos['id_'.$paysystem['id_unpay']]
                );
            }
        }
        if ($result) {
            foreach ($result as $k => $module) {
                if (($module_instance = Module::getInstanceByName($module['module'])) &&
                    (is_callable(array($module_instance, 'hookdisplaypayment'))
                    || is_callable(array($module_instance, 'hookpayment')))
                ) {
                    if (!$module_instance->currencies ||
                        ($module_instance->currencies &&
                            count(Currency::checkPaymentCurrencies($module_instance->id)))
                    ) {
                        $url_image = '';
                        if (file_exists(
                            _PS_MODULE_DIR_.'advancedcheckout/views/img/payments/'.$module['module'].'.gif'
                        )) {
                            $url_image = __PS_BASE_URI__.
                                'modules/advancedcheckout/views/img/payments/'.
                                $module['module'].'.gif';
                        }
                        if (is_callable(array($module_instance, 'hookdisplaypayment'))) {
                            $htm = call_user_func(array($module_instance, 'hookdisplaypayment'), $hook_args);
                        } else {
                            $htm = call_user_func(array($module_instance, 'hookpayment'), $hook_args);
                        }
                        if ($module_instance->name == 'moneybookers') {
                            preg_match_all('/<form.*?action=".*?".*?>(.*?)<\/form>/ms', $htm, $marr, PREG_SET_ORDER);
                        } elseif ($module_instance->name == 'paypal') {
                            preg_match_all(
                                '/<div.*?class="payment_module.*?".*?>(.*?)<\/div>/ms',
                                $htm,
                                $marr,
                                PREG_SET_ORDER
                            );
                            if (empty($marr)) {
                                preg_match_all(
                                    '/<p.*?class="payment_module.*?".*?>(.*?)<\/p>/ms',
                                    $htm,
                                    $marr,
                                    PREG_SET_ORDER
                                );
                            }
                        } elseif ($module_instance->name == 'paypalusa') {
                            preg_match_all('/<form.*?action=".*?".*?>(.*?)<\/form>/ms', $htm, $marr, PREG_SET_ORDER);
                        } elseif ($module_instance->name == 'maksukaista') {
                            preg_match_all(
                                '/<div.*?class="payment_module".*?>(.*?)<\/div>/ms',
                                $htm,
                                $marr,
                                PREG_SET_ORDER
                            );
                        } else {
                            preg_match_all(
                                '/<p.*?class="payment_module.*?".*?>(.*?)<\/p>/ms',
                                $htm,
                                $marr,
                                PREG_SET_ORDER
                            );
                            if (empty($marr)) {
                                preg_match_all(
                                    '/<div.*?class="payment_module.*?".*?>(.*?)<\/div>/ms',
                                    $htm,
                                    $marr,
                                    PREG_SET_ORDER
                                );
                            }
                        }
                        foreach ($marr as $m) {
                            $desc = '';
                            $img = '';
							$m = str_replace('&nbsp;', '', $m);
                            if ($module_instance->name == 'paypalusa') {
                                preg_match_all(
                                    '/<input.*?type="image".*?name="submit".*?src="(.*?)".*?\/>/ms',
                                    $m[1],
                                    $matches_desc,
                                    PREG_SET_ORDER
                                );
                                if (count($matches_desc[0]) > 1) {
                                    $url_image = $matches_desc[0][1];
                                    $desc = $module_instance->name;
                                }
                                preg_match_all(
                                    '/<input.*?id="(.*?)".*?name="submit".*?\/>/ms',
                                    $m[1],
                                    $matches_url,
                                    PREG_SET_ORDER
                                );
                                $url = '$(\'input#'.trim($matches_url[0][1]).'\').click()';
                            } elseif ($module_instance->name == 'moneybookers') {
                                preg_match_all(
                                    '/<input.*?type="image".*?src="(.*?)".*?name="Submit".*?\/>/ms',
                                    $m[1],
                                    $matches_desc,
                                    PREG_SET_ORDER
                                );
                                if (count($matches_desc[0]) > 1) {
                                    $url_image = _PS_BASE_URL_.$matches_desc[0][1];
                                }
                                preg_match_all(
                                    '/<span.*?>(.*?)<\/span>/ms',
                                    $m[1],
                                    $matches_name,
                                    PREG_SET_ORDER
                                );
                                if (count($matches_name[0]) > 1) {
                                    $desc = $matches_name[0][1];
                                }
                                preg_match_all(
                                    '/<input.*?type="image".*?name="Submit".*?value="(.*?)".*?\/>/ms',
                                    $m[1],
                                    $matches_url,
                                    PREG_SET_ORDER
                                );
                                $url = '$(\'input[value='.trim($matches_url[0][1]).']\').click()';
                            } else {
                                preg_match_all(
                                    '/<img.*?src="(.*?)".*?\/>/ms',
                                    $m[1],
                                    $matches_desc,
                                    PREG_SET_ORDER
                                );
                                if (empty($matches_desc)) {
                                    preg_match_all('/<img.*?src="(.*?)".*?>/ms', $m[1], $matches_desc, PREG_SET_ORDER);
                                    preg_match_all(
                                        '/<a.*?>.*?<img.*?>(.*?)<\/a>/ms',
                                        $m[1],
                                        $matches_3,
                                        PREG_SET_ORDER
                                    );
                                    if (!empty($matches_3)) {
                                        $desc = $matches_3[0][1];
                                    }
                                }
                                if (!empty($matches_desc) && count($matches_desc[0]) > 1) {
                                    $img = $matches_desc[0][1];
                                }
                                preg_match_all(
                                    '/<a.*?onclick="(.*?)".*?>.*?<\/a>/ms',
                                    $m[1],
                                    $matches_1,
                                    PREG_SET_ORDER
                                );
                                if (empty($matches_desc) && !$desc) {
                                    preg_match_all('/<a.*?>(.*?)<\/a>/ms', $m[1], $matches_3, PREG_SET_ORDER);
                                    if (isset($matches_3[0][2])) {
                                        $des2 = $matches_3[0][2] ? ' '.$matches_3[0][2] : '';
                                    } else {
                                        $des2 = '';
                                    }
                                    $desc = $matches_3[0][1].$des2;
                                } elseif (!empty($matches_desc) && !$desc) {
                                    preg_match_all(
                                        '/<a.*?>.*?<img.*?\/>(.*?)<\/a>/ms',
                                        $m[1],
                                        $matches_3,
                                        PREG_SET_ORDER
                                    );
                                    $desc = $matches_3[0][1];
                                }
                                if (!count($matches_1)) {
                                    preg_match_all(
                                        '/<a.*?href="(.*?)".*?>.*?<\/a>/ms',
                                        $m[1],
                                        $matches_2,
                                        PREG_SET_ORDER
                                    );
                                    $url = $matches_2[0][1];
                                } else {
                                    $url = $matches_1[0][1];
                                }
                            }
                            $image = __PS_BASE_URI__.'modules/advancedcheckout/views/img/payments/default.png';
                            $data[] = array(
                                'id' => (int)$module_instance->id,
                                'name' => $module['module'],
                                'url_image' => $url_image ? $url_image : ($img ? $img : $image),
                                'url_go' => str_replace('return false;', '', $url),
                                'desc' => trim(strip_tags($desc)),//
                                'position' => isset($pos[(int)$module_instance->id]) ?
                                    $pos[(int)$module_instance->id] : 0
                            );
                            $data2 .= $htm;
                            $url_image = '';
                            unset($desc);
                            unset($image);
                            unset($img);
                        }
                    }
                }
            }
        }
        if (isset($dt) && count($dt)) {
            $data = array_merge($data, $dt);
        }
        $ps = array();
        foreach ($data as $k => $dm) {
            $vhod = strpos($dm['id'], 'unpay');
            if ($vhod === false) {
                $ps[$k] = isset($pos[$dm['id']]) ? $pos[$dm['id']] : 0;
            } else {
                $sl = str_replace('unpay', 'id', $dm['id']);
                $ps[$k] = $pos[$sl];
            }
        }
        array_multisort($ps, SORT_ASC, $data);
        $this->context->smarty->assign(array(
            'comment_field' => Configuration::get('comment_field'),
            'adv_show_oc' => Configuration::get('adv_show_oc'),
            'payment_methods' => $data
        ));
        if ($old_message = $this->getMessageByCartId((int)$this->context->cart->id)) {
            $this->context->smarty->assign('oldMessage', $old_message['message']);
        }
        $parsed_content = $this->context->smarty->fetch(
            _PS_MODULE_DIR_.'advancedcheckout/views/templates/front/payment-methods.tpl'
        );
        $return = array(
            'parsed_content' => $parsed_content,
            'orig_hook' => $data2,
        );
        die(Tools::jsonEncode($return));
    }
    /*
    * module: advancedcheckout
    * date: 2016-11-30 19:49:55
    * version: 3.1.7
    */
    public function addvoucher()
    {
        if (Tools::isSubmit('addajx')) {
            $errors = '';
            if (!($code = trim(Tools::getValue('code')))) {
                $errors[] = Tools::displayError('You must enter a voucher code.');
            } elseif (!Validate::isCleanHtml($code)) {
                $errors[] = Tools::displayError('The voucher code is invalid.');
            } else {
                if (($cart_rule = new CartRule(CartRule::getIdByCode($code))) && Validate::isLoadedObject($cart_rule)) {
                    if ($error = $cart_rule->checkValidity($this->context, false, true)) {
                        $errors[] = $error;
                    } else {
                        $this->context->cart->addCartRule($cart_rule->id);
                        $return = array(
                            'success' => 'Успешно активировано!',
                        );
                    }
                } else {
                    $errors[] = Tools::displayError('This voucher does not exists.');
                }
            }
            $ret = array(
                'hasError' => !empty($errors),
                'errors' => $errors,
                'error' => $errors
            );
            if (isset($return) && count($return)) {
                $ret = array_merge($ret, $return);
                return $ret;
            } else {
                return $ret;
            }
        } elseif (($id_cart_rule = (int)Tools::getValue('ddisc')) && Validate::isUnsignedId($id_cart_rule)) {
            $this->context->cart->removeCartRule($id_cart_rule);
            return array('success' => 1);
        }
    }
    /*
    * module: advancedcheckout
    * date: 2016-11-30 19:49:55
    * version: 3.1.7
    */
    public function getListAddressByCustomer($id_customer, $i = false)
    {
        $customer = new Customer();
        $customer->id = $id_customer;
        $md = new advancedcheckout();
        $result = $customer->getAddresses($this->context->cookie->id_lang);
        $lst = '<option value="0">'.$md->l('New address...').'</option>';
        foreach ($result as &$address) {
            if ($i) {
                $a = $this->context->cart->id_address_invoice;
            } else {
                $a = $this->context->cart->id_address_delivery;
            }
            if ($a == (int)$address['id_address']) {
                $sel = 'selected="selected"';
            } else {
                $sel = '';
            }
            $lst .= '<option '.$sel.' value="'.(int)$address['id_address'].'">'.
                htmlentities($address['alias'], ENT_COMPAT, 'UTF-8').'</option>';
        }
        return $lst;
    }
    /*
    * module: advancedcheckout
    * date: 2016-11-30 19:49:55
    * version: 3.1.7
    */
    protected function getFormatedSummaryDetail()
    {
        $result = array('summary' => $this->context->cart->getSummaryDetails(),
                        'customizedDatas' => Product::getAllCustomizedDatas($this->context->cart->id, null, true));
        foreach ($result['summary']['products'] as &$product) {
            $product['quantity_without_customization'] = $product['quantity'];
            if ($result['customizedDatas']) {
                if (isset($result['customizedDatas'][$product['id_product']][$product['id_product_attribute']])) {
                    $fr = $result['customizedDatas'][$product['id_product']][$product['id_product_attribute']];
                    foreach ($fr as $addresses) {
                        foreach ($addresses as $customization) {
                            $product['quantity_without_customization'] -= (int)$customization['quantity'];
                        }
                    }
                }
            }
            $product['price_without_quantity_discount'] = Product::getPriceStatic(
                $product['id_product'],
                !Product::getTaxCalculationMethod(),
                $product['id_product_attribute'],
                6,
                null,
                false,
                false
            );
        }
        if ($result['customizedDatas']) {
            Product::addCustomizationPrice($result['summary']['products'], $result['customizedDatas']);
        }
        return $result;
    }
}
