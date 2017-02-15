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
class AdminHsPointOfSalePaymentAbstract extends AbstractAdminHsPointOfSaleCommon
{
    /**
     * Identifier to use for changing positions in lists (can be omitted if positions cannot be changed)
     * @var string
     */
    protected $position_identifier = 'id_pos_payment';
    
    /**
     * construct.
     */
    public function __construct()
    {
        $this->bootstrap = true;
        $this->table = 'pos_payment';
        $this->className = 'PosPayment';
        $this->lang = true;
        $this->explicitSelect = true;
        parent::__construct();
        // check status visit welcome page, if != 1 go to welcome page
        if ((int) Configuration::get($this->module->getKeyWelcomePage()) !== 1) {
            Tools::redirectAdmin($this->context->link->getAdminLink($this->module->class_controller_admin_welcome_page));
        }
        $this->_defaultOrderBy = 'position';
        $id_shop = Shop::isFeatureActive() && Shop::getContext() == Shop::CONTEXT_SHOP ? (int) $this->context->shop->id : (int) Configuration::get('PS_SHOP_DEFAULT');
        $this->bulk_actions = array('delete' => array('text' => $this->module->i18n['delete_selected'], 'confirm' => $this->module->i18n['delete_selected_items']));
        $this->_join .= 'LEFT JOIN `'._DB_PREFIX_.'pos_payment_shop` ps ON (a.`id_pos_payment` = ps.`id_pos_payment` AND ps.`id_shop` = '.(int) $id_shop.')
						LEFT JOIN `'._DB_PREFIX_.'shop` shop ON (shop.`id_shop` = ps.`id_shop`)';
        $this->_select .= 'a.`active`';
        $this->_where .= 'AND ps.`id_shop` ='.(int) $id_shop;
        $this->fields_list = array(
            'id_pos_payment' => array(
                'title' => $this->module->i18n['id'],
            ),
            'payment_name' => array(
                'title' => $this->module->i18n['name'],
                'filter_key' => 'b!payment_name',
            ),
            'label' => array(
                'title' => $this->module->i18n['label'],
                'filter_key' => 'b!label',
                'width' => 140,
            ),
            'active' => array(
                'title' => $this->module->i18n['active'],
                'active' => 'status',
                'type' => 'bool',
                'class' => 'fixed-width-xs',
                'align' => 'center',
                'orderby' => false,
            ),
            'position' => array(
                'title' => $this->module->i18n['position'],
                'align' => 'center',
                'position' => 'position',
            ),
        );
    }

    /**
     * Render list payment.
     *
     * @return html
     */
    public function renderList()
    {
        $this->addRowAction('edit');
        $this->addRowAction('delete');

        return parent::renderList();
    }

    /**
     * Show form add payment.
     *
     * @return HTML string
     */
    public function renderForm()
    {
        if ($this->display == 'edit') {
            $this->toolbar_title = $this->module->i18n['edit_point_of_sale_payment'];
        } else {
            $this->toolbar_title = $this->module->i18n['add_a_new_point_of_sale_payment'];
        }

        $this->fields_form = array(
            'legend' => array(
                'title' => $this->module->i18n['point_of_sale_payment'],
            ),
            'input' => array(
                array(
                    'type' => 'text',
                    'label' => $this->module->i18n['name'],
                    'name' => 'payment_name',
                    'lang' => true,
                    'size' => 33,
                    'hint' => $this->module->i18n['invalid_characters'].' <>;=#{}',
                    'required' => true,
                ),
                array(
                    'type' => 'text',
                    'label' => $this->module->i18n['label'],
                    'name' => 'label',
                    'lang' => true,
                    'size' => 33,
                    'hint' => $this->module->i18n['invalid_characters'].' <>;=#{}',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->module->i18n['reference'],
                    'name' => 'reference',
                    'size' => 33,
                    'hint' => $this->module->i18n['invalid_characters'].' <>;=#{}',
                ),
                array(
                    'type' => $this->module->isPrestashop16() ? 'switch' : 'radio',
                    'label' => $this->module->i18n['active'],
                    'name' => 'active',
                    'required' => false,
                    'class' => !$this->module->isPrestashop16() ? 't' : '',
                    'is_bool' => true,
                    'default_value' => 1,
                    'values' => array(
                        array(
                            'id' => 'active_on',
                            'value' => 1,
                            'label' => $this->module->i18n['enabled'],
                        ),
                        array(
                            'id' => 'active_off',
                            'value' => 0,
                            'label' => $this->module->i18n['disabled'],
                        ),
                    ),
                ),
            ),
        );
        if (Shop::isFeatureActive()) {
            $this->fields_form['input'][] = array(
                'type' => 'shop',
                'label' => $this->module->i18n['shop_association'],
                'name' => 'checkBoxShopAsso',
            );
        }
        $this->fields_form['submit'] = array(
            'title' => $this->module->i18n['save'],
        );

        return parent::renderForm();
    }

    /**
     * @param int $id_object
     *
     * @return boolean
     */
    protected function updateAssoShop($id_object)
    {
        $id_shops = array();

        $selected_id_shops = $this->getSelectedAssoShop($this->table);
        if (empty($selected_id_shops)) {
            $id_shops[] = $this->context->shop->id;
        } else {
            $id_shops = $selected_id_shops;
        }

        // Get list of shop id we want to exclude from asso deletion
        $exclude_ids = $id_shops;
        foreach (Db::getInstance()->executeS('SELECT `id_shop` FROM '._DB_PREFIX_.'shop') as $row) {
            if (!$this->context->employee->hasAuthOnShop($row['id_shop'])) {
                $exclude_ids[] = $row['id_shop'];
            }
        }
        Db::getInstance()->delete($this->table.'_shop', '`'.bqSQL($this->identifier).'` = '.(int) $id_object.($exclude_ids ? ' AND `id_shop` NOT IN ('.implode(', ', array_map('intval', $exclude_ids)).')' : ''));

        $insert = array();
        foreach ($id_shops as $id_shop) {
            $insert[] = array(
                $this->identifier => (int) $id_object,
                'id_shop' => (int) $id_shop,
            );
        }

        return Db::getInstance()->insert($this->table.'_shop', $insert, false, true, Db::INSERT_IGNORE);
    }

    /**
     * @param type $table
     *
     * @return array
     *               array(<pre>
     *               int => int
     *               ...
     *               )</pre>
     */
    protected function getSelectedAssoShop($table)
    {
        if (!Shop::isFeatureActive()) {
            return array();
        }

        $shops = Shop::getShops(true, null, true);
        if (count($shops) == 1 && isset($shops[0])) {
            return array($shops[0], 'shop');
        }

        $assos = array();
        if (Tools::isSubmit('checkBoxShopAsso_'.$table)) {
            foreach (Tools::getValue('checkBoxShopAsso_'.$table) as $id_shop => $value) {
                $assos[] = (int) $id_shop;
            }
        } elseif (Shop::getTotalShops(false) == 1) {
            // if we do not have the checkBox multishop, we can have an admin with only one shop and being in multishop
            $assos[] = (int) Shop::getContextShopID();
        }

        return $assos;
    }
    
    
    public function ajaxProcessUpdatePositions()
    {
        $way = (bool) Tools::getValue('way');
        $id = (int) Tools::getValue('id');
        $pos_payment_rows = Tools::getValue('pos_payment');
        if (is_array($pos_payment_rows)) {
            foreach ($pos_payment_rows as $position => $pos_payment_row) {
                $id_pos_payments = explode('_', $pos_payment_row);
                if ((isset($id_pos_payments[1]) && isset($id_pos_payments[2])) && (int) $id_pos_payments[2] === $id) {
                    $pos_payment = new PosPayment((int) $id_pos_payments[2]);
                    if (Validate::isLoadedObject($pos_payment)) {
                        $this->ajax_json['success'] = $pos_payment->updatePosition($way, $position);
                    }
                    break; // only need to detect the changed Payment Method, other payment method's positions will be updated accordingly in PosPayment::updatePosition()
                }
            }
        }
    }
}
