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
class AdminHsPointOfSaleCustomerAbstract extends AbstractAdminHsPointOfSaleCommon
{
    /**
     * Construct.
     *
     * @see parent::__construct
     */
    public function __construct()
    {
        $this->bootstrap = true;
        $this->table = 'customer';
        $this->className = 'Customer';
        $this->lang = false;
        $this->explicitSelect = true;
        parent::__construct();
    }

    /**
     * @see parent::initContent()
     */
    public function initContent()
    {
        $this->context->smarty->assign(array(
            'groups' => Group::getGroups((int) $this->context->language->id, true),
            'genders' => Gender::getGenders($this->context->language->id),
            'countries' => Country::getCountries((int) $this->context->language->id, true),
            'id_country_default' => (int) $this->context->country->id,
            'ajax_url' => $this->module->getTargetUrl($this->module->pos_tabs['AdminHsPointOfSaleCustomer']['tab_class']),
        ));
        parent::initContent();
    }

    /**
     * Set Media file include when controller called.
     */
    public function setMedia()
    {
        $this->module_media_js[] = 'pos_customer.js';
        $this->module_media_css['customer.css'] = 'all';
        parent::setMedia();
        $this->addJS(array(
            _PS_JS_DIR_ . 'admin.js',
            _PS_JS_DIR_ . 'validate.js',
        ));
    }

    /**
     * @todo: Optimize the way we validate a customer at front-end
     */
    public function ajaxProcessAddCustomer()
    {
        $email = Tools::getValue('customer_email');
        if (!empty($email)) {
            if (PosCustomer::getCustomersByEmail($email)) {
                $this->ajax_json['message'][] = $this->module->i18n['this_customer_already_exists'];
            }
        } else {
            $email = Configuration::get('PS_SHOP_EMAIL');
        }
        $customer = new PosCustomer();
        $password = Tools::passwdGen();
        $customer->email = $email;
        $customer->passwd = Tools::encrypt($password);
        $customer->active = 1;
        $customer->id_default_group = (int) PosConfiguration::get('POS_CUSTOMER_ID_GROUP');
        foreach (array('firstname', 'lastname', 'id_gender', 'company', 'siret', 'ape', 'website') as $field) {
            $customer->$field = Tools::getValue("customer_$field");
        }
        $errors = $customer->validate();
        if (!empty($errors)) {
            $this->ajax_json['message'] = $errors;
        } else {
            try {
                $customer->save();
                $customer->addGroups(array((int) Configuration::get('PS_CUSTOMER_GROUP')));
                $this->addAddress($customer);
                $this->sendConfirmationMail($customer, $password);
                $this->ajax_json['data']['idCustomer'] = (int) $customer->id;
                $this->ajax_json['success'] = true;
            } catch (Exception $exception) {
                $this->ajax_json['message'][] = $exception->getMessage();
            }
        }
    }

    /**
     * Add address of customer.
     *
     * @param Customer $customer
     */
    protected function addAddress(Customer $customer)
    {
        $address = new PosAddress();
        $this->copyFromPost($address, 'address');
        $address->id_customer = $customer->id;
        $address->firstname = $customer->firstname;
        $address->lastname = $customer->lastname;
        $address->alias = Tools::substr($this->module->displayName, 0, 8) . '_' . Tools::passwdGen();
        $address->save();
    }

    /**
     * sendConfirmationMail.
     *
     * @param Customer $customer
     * @param string   $password
     *
     * @return boolean
     */
    protected function sendConfirmationMail(Customer $customer, $password)
    {
        if (!Configuration::get('POS_SEND_EMAIL_TO_CUSTOMER')) {
            return true;
        }

        return Mail::Send($this->context->language->id, 'account', Mail::l('Welcome!'), array(
                    '{firstname}' => $customer->firstname,
                    '{lastname}' => $customer->lastname,
                    '{email}' => $customer->email,
                    '{passwd}' => $password, ), $customer->email, $customer->firstname . ' ' . $customer->lastname);
    }

    /**
     * Search customer follow keyword.
     */
    public function ajaxProcessSearch()
    {
        $keyword = urldecode(Tools::getValue('keyword'));
        $customers = PosCustomer::search(trim($keyword));
        if ($customers) {
            $this->ajax_json['success'] = true;
            $this->ajax_json['data'] = $customers;
        } else {
            $this->ajax_json['success'] = false;
            $this->ajax_json['message'] = $this->module->i18n['no_associated_customer_found'];
        }
    }
}
