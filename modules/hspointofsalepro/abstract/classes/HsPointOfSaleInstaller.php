<?php
/**
 * RockPOS - Point of Sale for PrestaShop
 *
 * @author    Hamsa Technologies
 * @copyright Hamsa Technologies
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

/**
 * An installer of the module (abstract)
 */
class HsPointOfSaleInstaller
{
    /**
     * Module name.
     *
     * @var string
     */
    protected $module_name;

    /**
     * All controllers of this module.
     *
     * @var string
     */
    protected $pos_tabs;

    /**
     * Name display menu of module.
     *
     * @var string
     */
    protected $display_name;

    /**
     * Array contain queries sql create tables and insert data.
     */
    protected $install_queries = array();

    /**
     * Array contain queries sql drop tables of module.
     */
    protected $uninstall_queries = array();

    /**
     * Configuration keys for show these when searching for products.
     *
     * @array
     * array(<pre>
     * 	'POS_SHOW_ID',
     * 	'POS_SHOW_REFERENCE',
     * 	'POS_SHOW_STOCK',
     * 	'POS_SHOW_NAME',
     * );</pre>
     */
    public static $output_product_search_config_keys = array(
        'POS_SHOW_ID',
        'POS_SHOW_REFERENCE',
        'POS_SHOW_STOCK',
        'POS_SHOW_NAME',
    );
    
    const CLASS_PARENT_TAB_POSITION = 'AdminParentOrders';
    
    /**
     * @deprecated since 2.4.1
     */
    const CLASS_PARENT_TAB = 'AdminPos';

    /**
     * construct.
     */
    public function __construct($module_name, array $pos_tabs, $display_name)
    {
        $this->module_name = $module_name;
        $this->pos_tabs = $pos_tabs;
        $this->display_name = $display_name;

        // create table pos_payment
        $this->install_queries[] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'pos_payment` (
					`id_pos_payment` int(10) unsigned NOT NULL AUTO_INCREMENT,
					`id_module` int(10) unsigned NULL,
					`reference` int(2) DEFAULT 0,
					`rule` varchar(255) NULL,
					`active` tinyint(1) NOT NULL,
                                        `position` int(10) NULL,
				     PRIMARY KEY (`id_pos_payment`)
				     )ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8';
        // create table pos_payment_lang
        $this->install_queries[] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'pos_payment_lang` (
				      `id_pos_payment` int(10) unsigned NOT NULL,
				      `id_lang` int(10) unsigned NOT NULL,
				      `payment_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
				      `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
				      PRIMARY KEY (`id_pos_payment`,`id_lang`)
				    )ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8';
        // create table cart_postpayment
        $this->install_queries[] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'pos_cart_payment` (
                                        `id_pos_cart_payment` int(10) unsigned NOT NULL AUTO_INCREMENT,
                                        `id_cart` int(10) unsigned NOT NULL,
                                        `id_pos_payment` int(10) unsigned NOT NULL,
                                        `amount` decimal(20,6) NOT NULL,
                                        `reference` varchar(255) NULL,
                                        `message` text NULL,
                                        `given_money` decimal(20,6) DEFAULT 0,
                                        `change` decimal(20,6) DEFAULT 0,
                                        PRIMARY KEY (`id_pos_cart_payment`)
                                        )ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8';

        $this->install_queries[] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'pos_payment_shop` (
					`id_pos_payment` int(10) unsigned NOT NULL,
					`id_shop` int(10) unsigned NOT NULL,
					PRIMARY KEY (`id_pos_payment`,`id_shop`)
				    )ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8';

        $this->install_queries[] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'pos_orders` (
					`id_pos_order` int(11) unsigned NOT NULL,
					`status` tinyint(1) NOT NULL DEFAULT 0,
					`id_employee` int(11) NULL,
					`note` text,
					`show_note` tinyint(1) DEFAULT 0,
					PRIMARY KEY (`id_pos_order`)
				    )ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8';
        
        $this->install_queries[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'pos_search_word` (
                                        `id_word` int(10) unsigned NOT NULL AUTO_INCREMENT,
					`id_shop` int(10) NOT NULL DEFAULT 1,
					`id_lang` int(10) NULL,
					`word` varchar(15) NOT NULL,
					PRIMARY KEY (`id_word`),
                                        UNIQUE KEY `id_lang` (`id_lang`,`id_shop`,`word`)
				    )ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8';

        $this->install_queries[] = 'CREATE TABLE IF NOT EXISTS `' . _DB_PREFIX_ . 'pos_search_index` (
                                        `id_product` int(10) UNSIGNED NOT NULL,
                                        `id_word` int(10) UNSIGNED NOT NULL,
                                        `weight` smallint(4) UNSIGNED NOT NULL DEFAULT 1,
					PRIMARY KEY (`id_product`, `id_word`),
                                        KEY `id_product` (`id_product`)
				    )ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8';


        // drop all table
        $this->uninstall_queries[] = 'DROP TABLE IF EXISTS `'._DB_PREFIX_.'pos_payment`';
        $this->uninstall_queries[] = 'DROP TABLE IF EXISTS `'._DB_PREFIX_.'pos_payment_lang`';
        $this->uninstall_queries[] = 'DROP TABLE IF EXISTS `'._DB_PREFIX_.'pos_payment_shop`';
        $this->uninstall_queries[] = 'DROP TABLE IF EXISTS `'._DB_PREFIX_.'pos_orders`';
        $this->uninstall_queries[] = 'DROP TABLE IF EXISTS `'._DB_PREFIX_.'pos_cart_payment`';
        $this->uninstall_queries[] = 'DROP TABLE IF EXISTS `'._DB_PREFIX_.'pos_search_word`';
        $this->uninstall_queries[] = 'DROP TABLE IF EXISTS `'._DB_PREFIX_.'pos_search_index`';
    }

    /**
     * Install admin tab.
     *
     * @return boolean
     */
    public function installTabs()
    {
        $flag = true;
        if (self::CLASS_PARENT_TAB) {
            $id_parent = (int) Tab::getIdFromClassName(self::CLASS_PARENT_TAB); // get id parent tab
            if (!$id_parent) {
                // install parent tab
                $this->installModuleTab(self::CLASS_PARENT_TAB, $this->display_name, 0);
                $id_parent = (int) Tab::getIdFromClassName(self::CLASS_PARENT_TAB); // get id parent exit tab
                $this->updatePositionParentTab($id_parent);
            }
            if (isset($id_parent)) {
                foreach ($this->pos_tabs as $tab_class => $combination) {
                    $flag = $flag && (int) $this->installModuleTab($combination['tab_class'], $combination['name'], $id_parent, $combination['position'], $combination['active']);
                }
            }
        }

        return $flag;
    }

    /**
     * Install an Admin Tab (menu).
     *
     * @param string $tab_class
     * @param string $tab_name
     * @param int    $id_tab_parent
     * @param int    $position
     *
     * @return boolean
     * @deprecated since 2.4.1
     */
    public function installModuleTab($tab_class, $tab_name, $id_tab_parent = -1, $position = 0, $active = 1)
    {
        $tab = new Tab();
        $name = array();
        foreach (Language::getLanguages(false) as $language) {
            $name[$language['id_lang']] = $tab_name;
        }
        $tab->name = $name;
        $tab->class_name = (string) $tab_class;
        $tab->module = $this->module_name;
        $tab->active = (int) $active;
        if ($id_tab_parent != null) {
            $tab->id_parent = (int) $id_tab_parent;
        }
        if ((int) $position > 0) {
            $tab->position = (int) $position;
        }

        return $tab->add(true);
    }

    /**
     * Uninstall all Admin Tabs (menu).
     *
     * @param string $module_name
     *
     * @return boolean
     */
    public function uninstallModuleTabs($module_name)
    {
        $flag = true;
        $tabs = Tab::getCollectionFromModule($module_name);
        if (!empty($tabs)) {
            foreach ($tabs as $tab) {
                $flag = $flag && $tab->delete();
            }
        }

        return $flag;
    }

    /**
     * 
     * @return boolean
     */
    public function installTables()
    {
        $flag = true;
        foreach ($this->install_queries as $install_query) {
            $flag = $flag && Db::getInstance()->execute($install_query);
        }
        return $flag;
    }

    /**
     * Uninstall tables of module.
     *
     * @return boolean
     */
    public function uninstallTables()
    {
        foreach ($this->uninstall_queries as $uninstall_query) {
            if (!Db::getInstance()->execute($uninstall_query)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Install config setting for version 1.5.
     *
     * @return boolean
     */
    public function installConfigs15()
    {
        return (PosConfiguration::updateValue('PS_POS_GUEST_CHECKOUT', 1) && PosConfiguration::updateValue('POS_FREE_SHIPPING', 1));
    }

    /**
     * Install config setting collecting payment.
     *
     * @return boolean
     */
    public function installConfigs17()
    {
        return (PosConfiguration::updateValue('PS_POS_COLLECTING_PAYMENT', 1) && PosConfiguration::updateValue('PS_POS_DEFAULT_ORDER_STATE', PosOrderState::getFistOrderStateId()) && PosConfiguration::updateValue('PS_POS_DEFAULT_PAYMENT_ID', PosPayment::getFirstPaymentId()));
    }

    /**
     * Install config setting invoice.
     *
     * @return boolean
     */
    public function installConfigs194()
    {
        return (PosConfiguration::updateValue('PS_POS_PRINT_INVOICE_AU', 0));
    }

    /**
     * Install config version 111.
     *
     * @return boolean
     */
    public function installConfigs111()
    {
        return (PosConfiguration::updateValue('PS_POS_DEFAULT_CARRIER', (int) Configuration::get('PS_CARRIER_DEFAULT')) && PosConfiguration::updateValue('PS_POS_INVOICE_PAGE_SIZE_FORMAT', PosConstants::PAGE_SIZE_A4) && PosConfiguration::updateValue('POS_VISIBILITY_CATALOG_ONLY', 0) && PosConfiguration::updateValue('POS_VISIBILITY_NOWHERE', 0));
    }

    /**
     * Install config version 111.
     *
     * @return boolean
     */
    public function installConfigs112()
    {
        return PosConfiguration::updateValue('POS_DEFAULT_PRODUCT_DISCOUNT_TYPE', PosConstants::DISCOUNT_TYPE_AMOUNT);
    }

    /**
     * Install config version 116.
     *
     * @return boolean
     */
    public function installConfigs116()
    {
        return PosConfiguration::updateValue('PS_POS_SIGNATURE_ON_INVOICE', 0);
    }

    /**
     * Activate cart rule for current cart.
     *
     * @return boolean
     */
    public function activateCartRule()
    {
        $activate = true;
        if (!CartRule::isFeatureActive()) {
            $activate = PosConfiguration::updateValue('PS_CART_RULE_FEATURE_ACTIVE', 1);
        }

        return $activate;
    }

    /**
     * Update name "check" => "cheque".
     *
     * @return boolean
     */
    public function updatePosPaymentName()
    {
        $sql_update = 'UPDATE  `'._DB_PREFIX_.'pos_payment_lang` SET `label` = \'Cheque number\', `payment_name` = \'Cheque\' WHERE `payment_name` = \'Check\'';

        return Db::getInstance()->execute($sql_update);
    }

    /**
     * Install single new tab for new version.
     *
     * @param array $admin_tab
     *
     * @return boolean
     * @deprecated since 2.4.1
     */
    public function installTab(array $admin_tab)
    {
        $id_parent = (int) Tab::getIdFromClassName(self::CLASS_PARENT_TAB);

        return $this->installModuleTab($admin_tab['tab_class'], $admin_tab['name'], $id_parent, $admin_tab['position'], $admin_tab['active']);
    }

    /**
     * Install config version 1.11.8.
     *
     * @return boolean
     */
    public function installConfigs1118()
    {
        return (PosConfiguration::updateValue('PS_POS_SEND_EMAIL_TO_CUSTOMER', 1));
    }

    /**
     * Install config version 1.12.0.
     *
     * @return boolean
     */
    public function installConfigs1120()
    {
        $flag = true;
        $output_product_search_config_keys = PosConfiguration::getOutputProductSearchSettings();
        foreach ($output_product_search_config_keys as $key => $value) {
            $flag = $flag && PosConfiguration::updateValue($key, $value);
        }

        return $flag;
    }

    public function deleteConfigurationKeys200()
    {
        return (Configuration::deleteByName('POS_SHOP_ID') && Configuration::deleteByName('POS_SELECTED_SHOPS'));
    }

    /**
     * Install config version 1.12.0.
     *
     * @return boolean
     */
    public function installConfigs200()
    {
        return PosConfiguration::updateValue('POS_SEARCH_ACTIVE_CATEGORIES', 1) && PosConfiguration::updateValue('POS_SEARCH_ACTIVE_PRODUCTS', 1);
    }

    /**
     * Install config version 2.3.3.
     *
     * @return boolean
     */
    public function installConfigs233()
    {
        $success = array();
        $success[] = PosConfiguration::updateValue('PS_POS_RECEIPT_PAGE_SIZE_FORMAT', PosConstants::PAGE_SIZE_K80);
        $success[] = PosConfiguration::rename('PS_POS_PAGE_SIZE_FORMAT', 'PS_POS_INVOICE_PAGE_SIZE_FORMAT');

        return array_sum($success) >= count($success);
    }

    /**
     * Install config version 2.3.4.
     *
     * @return boolean
     */
    public function installConfigs234()
    {
        $success = array();
        $success[] = PosConfiguration::updateValue('PS_POS_INVOICE_SHOW_EAN_OR_JAN', 0);
        $old_signature = (int) Configuration::get('PS_POS_SIGNATURE_ON_INVOICE');
        $success[] = PosConfiguration::updateValue('PS_POS_SIGNATURE_ON_RECEIPT', $old_signature);

        return array_sum($success) >= count($success);
    }
    
    /**
     * Support multiple shop for pos payment.
     *
     * @return boolean
     */
    public function installTable220()
    {
        return Db::getInstance()->execute($this->queryCreateTable220());
    }

    /**
     * Query create new table pos_payment_shop.
     *
     * @return string
     */
    protected function queryCreateTable220()
    {
        return 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'pos_payment_shop` (
                `id_pos_payment` int(10) unsigned NOT NULL,
                `id_shop` int(10) unsigned NOT NULL,
                PRIMARY KEY (`id_pos_payment`,`id_shop`)
            )';
    }

    /**
     * Insert default data into table pos_payment_shop.
     *
     * @return boolean
     */
    protected function insertDataIntoTablePaymentShop()
    {
        $flag = true;
        $shops = Shop::getShops();
        foreach ($shops as $shop) {
            $sql = 'INSERT INTO `'._DB_PREFIX_.'pos_payment_shop` (id_pos_payment, id_shop)
                    SELECT `id_pos_payment`, '.(int) $shop['id_shop'].' AS `id_shop` FROM `'._DB_PREFIX_.'pos_payment`';
            $flag = $flag && Db::getInstance()->execute($sql);
        }

        return $flag;
    }

    /**
     * @return boolean
     */
    public function moveHiddenTabsToPosTab()
    {
        $id_parent = (int) Tab::getIdFromClassName(self::CLASS_PARENT_TAB);
        $sql = 'UPDATE `'._DB_PREFIX_.'tab` SET `id_parent` = '.(int) $id_parent.', `active` = 0
                    WHERE `module` = "'.$this->module_name.'" AND `id_parent` = -1';

        return Db::getInstance()->execute($sql);
    }

    /**
     * Update position of module POS.
     *
     * @param int $id_parent
     */
    public function updatePositionParentTab($id_parent = null)
    {
        $flag = true;
        if (empty($id_parent)) {
            $id_parent = (int) Tab::getIdFromClassName(self::CLASS_PARENT_TAB);
        }
        $tab = new Tab((int) $id_parent);
        if (Validate::isLoadedObject($tab)) {
            $flag = $flag && $tab->updatePosition(true, $this->getPosition());
        }

        return $flag;
    }

    /**
     * Get position of tab AdminParentOrders.
     *
     * @return int
     */
    protected function getPosition()
    {
        $position = 0;
        $id_tab = (int) Tab::getIdFromClassName(self::CLASS_PARENT_TAB_POSITION);
        $tab = new Tab($id_tab);
        if (Validate::isLoadedObject($tab)) {
            $position = $tab->position;
        }

        return (int) $position;
    }

    /**
     * @return boolean
     */
    public function upgradeModule224()
    {
        return $this->updateTable224() && $this->insertPartialOrderState();
    }

    /**
     * Add table pos_orders.
     *
     * @return boolean
     */
    public function updateTable224()
    {
        $sql = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'pos_orders` (
                    `id_pos_order` int(11) unsigned NOT NULL,
                    `status` tinyint(1) NOT NULL,
                    PRIMARY KEY (`id_pos_order`)
                )';

        return Db::getInstance()->execute($sql);
    }
    
    /**
     * 
     * @param string $package
     * @return boolean
     */
    public function updateTabs2314($package)
    {
        return PosTab::addSuffix(self::CLASS_PARENT_TAB, $package);
    }

    /**
     * Insert a new order status partial payment.
     *
     * @return boolean
     */
    public function insertPartialOrderState()
    {
        $flag = true;
        $id_receipt_order_state = (int) Configuration::get('POS_RECEIPT_DEFAULT_ORDER_STATE');
        $order_state = new OrderState($id_receipt_order_state);
        if (!Validate::isLoadedObject($order_state)) {
            $languages = Language::getLanguages(false);
            $order_state = new OrderState();
            foreach ($languages as $language) {
                $order_state->name[$language['id_lang']] = 'Partial payment';
                $order_state->template[$language['id_lang']] = 'payment';
            }

            $order_state->send_email = 1;
            $order_state->module_name = $this->module_name;
            $order_state->color = '#FF8C00';
            $order_state->unremovable = 1;
            $order_state->logable = 1;
            if ($order_state->add()) {
                $flag = PosConfiguration::updateValue('POS_RECEIPT_DEFAULT_ORDER_STATE', (int) $order_state->id);
            }
        }

        return $flag;
    }

    /**
     * @return boolean
     */
    public function updateTable232()
    {
        $employee = Employee::getEmployees(true);
        $id_employee = $employee[0]['id_employee'];
        $add_column_pos_orders = 'ALTER TABLE `'._DB_PREFIX_.'pos_orders`
                            ADD `id_employee` int(11) DEFAULT '.$id_employee.' AFTER `status`,
                            ADD `note` text AFTER `id_employee`,
                            ADD `show_note` tinyint(1) DEFAULT 0 AFTER `note`';
        $add_column_pos_cart_payment = 'ALTER TABLE `'._DB_PREFIX_.'cart_pospayment`
                            ADD `visa` decimal(20,6) DEFAULT 0 AFTER `message`,
                            ADD `change` decimal(20,6) DEFAULT 0 AFTER `visa`';

        return Db::getInstance()->execute($add_column_pos_orders) && Db::getInstance()->execute($add_column_pos_cart_payment);
    }

    /**
     * Update position & name of tabs in version 2.3.2.
     * @deprecated
     * @param string $module_name
     *
     * @return boolean
     */
    public function updateTabsPosition($module_name)
    {
        $flag = true;
        $tabs = Tab::getCollectionFromModule($module_name);
        if (!empty($tabs)) {
            foreach ($tabs as $tab) {
                foreach ($this->pos_tabs as $class_name => $combination) {
                    if ($tab->class_name == $class_name) {
                        $tab_name = array();
                        foreach (Language::getLanguages(false) as $language) {
                            $tab_name[$language['id_lang']] = $combination['name'];
                        }
                        $tab->name = $tab_name;
                        $tab->position = $combination['position'];
                        $flag = $flag && $tab->update();
                    }
                }
            }
        }

        return $flag;
    }

    /**
     * @return boolean
     */
    public function updateTable233()
    {
        $flag = true;
        $column_exits = 'SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA = \''._DB_NAME_.'\' AND TABLE_NAME = \''._DB_PREFIX_.'cart_pospayment\' AND COLUMN_NAME = \'visa\'';
        $result = Db::getInstance()->getValue($column_exits);
        if ($result) {
            $sql = 'ALTER TABLE `'._DB_PREFIX_.'cart_pospayment` CHANGE `visa` `given_money` decimal(20,6) DEFAULT 0';
            $flag = $flag && Db::getInstance()->execute($sql);
        }

        return $flag;
    }

    /**
     * @return boolean
     */
    public function installConfigs232()
    {
        $success = array();
        $receipt_tab_configs = PosConfiguration::getReceiptSettings();
        foreach ($receipt_tab_configs as $key => $value) {
            $success[] = PosConfiguration::updateValue($key, $value);
        }
        $success[] = PosConfiguration::rename('POS_DEFAULT_ORDER_STATE_RECEPT', 'POS_RECEIPT_DEFAULT_ORDER_STATE');
        return array_sum($success) >= count($success);
    }

    /**
     * Insert a new POS customer group.
     *
     * @return boolean
     */
    public function installPosCustomerGroup()
    {
        $flag = true;
        $pos_customer_id_group = (int) Configuration::get('POS_CUSTOMER_ID_GROUP');
        $pos_group = new PosGroup($pos_customer_id_group);
        
        if (!Validate::isLoadedObject($pos_group)) {
            $languages = Language::getLanguages(false);
            foreach ($languages as $language) {
                $pos_group->name[$language['id_lang']] = 'POS Customer';
            }
            $pos_group->price_display_method = PS_TAX_EXC;
            if ($pos_group->add()) {
                $pos_customer_id_group = (int) $pos_group->id;
                $flag = $flag && PosConfiguration::updateValue('POS_CUSTOMER_ID_GROUP', $pos_customer_id_group);
            }
            
            $default_id_customer = (int) Configuration::get('POS_DEFAULT_GUEST_ACCOUNT');
            $customer = new PosCustomer($default_id_customer);
            if (Validate::isLoadedObject($customer)) {
                $customer->id_default_group = $pos_customer_id_group;
                $flag &= $customer->save() && $pos_group->updateModulesRestriction();
            }
        }
        
        return $flag;
    }
    
    /**
     * Rename table pos_orders to posorders
     * @return boolean
     */
    public function updateTable236()
    {
        $sql = 'SHOW TABLES LIKE "' . _DB_PREFIX_ . 'pos_orders"';
        $does_pos_order_exist = Db::getInstance()->executeS($sql);
        $result = true;
        if (!empty($does_pos_order_exist)) {
            $sql = 'RENAME TABLE `' . _DB_PREFIX_ . 'pos_orders` TO `' . _DB_PREFIX_ . 'posorders`';
            $result &= Db::getInstance()->execute($sql);
        }
        return $result;
    }
    
    /**
     * @deprecated since version 2.4.1 cart_pospayment change to cart_pos_payment
     * @return boolean
     */
    public function updateGivenMoney()
    {
        return Db::getInstance()->execute('UPDATE `' . _DB_PREFIX_ . 'cart_pospayment` cp
                                                SET cp.`given_money` = cp.`amount`
                                            WHERE cp.`given_money` = 0');
    }
    
    /**
     * 
     * @return boolean
     */
    public function cleanUpFiles239()
    {
        $module = Module::getInstanceByName($this->module_name);// Don't need to validate module here.
        $files = array(
            'abstract/classes/HTMLTemplatePosInvoice.php',
            'abstract/classes/PosPDF.php',
            'abstract/classes/PosPDFGenerator.php',
            'abstract/classes/PosVisibilityProduct.php'
        );
        return PosFile::deleteFiles($module->getLocalPath(), $files);
    }
    
    /**
     * 
     * @return boolean
     */
    public function cleanUpFiles2312()
    {
        $module = Module::getInstanceByName($this->module_name);// Don't need to validate module here.
        $files = array(
            'abstract/pdf/footer.tpl',
            'abstract/pdf/header.tpl',
            'abstract/pdf/header_receipt.tpl',
            'abstract/pdf/pos-invoice.tpl',
            'abstract/pdf/sales_receipt_small.tpl',
        );
        return PosFile::deleteFiles($module->getLocalPath(), $files);
    }
    
    /**
     * 
     * @return boolean
     */
    public function cleanUpDirectories2312()
    {
        $module = Module::getInstanceByName($this->module_name);// Don't need to validate module here.
        $files = array(
            'abstract/classes/pdf',
            'abstract/views/templates/admin/hs_point_of_sale_abstract/preview_recept',
            'abstract/pdf/sale_receipt_tabs',
            'abstract/pdf/invoice_tabs',
        );
        return PosFile::deleteDirectories($module->getLocalPath(), $files);
    }
    
    /**
     * 
     * @return boolean
     */
    public function updateTable2314()
    {
        $success         = array();
        $existing_tables = array(
            'pospayment',
            'pospayment_lang',
            'pospayment_shop',
            'posorders',
            'cart_pospayment'
        );
        foreach ($existing_tables as $table) {
            $success[] = Db::getInstance()->execute('ALTER TABLE `'._DB_PREFIX_.$table.'` CONVERT TO CHARACTER SET utf8;');
        }
        $success[] = Db::getInstance()->execute('ALTER TABLE `' . _DB_PREFIX_ . 'posorders` ALTER COLUMN `status` SET DEFAULT 0');
        return array_sum($success) >= count($success);
    }
    

    /**
     * 
     * @return boolean
     */
    public function cleanUpDirectories2314()
    {
        $module = Module::getInstanceByName($this->module_name);// Don't need to validate module here.
        $directories = array(
            'views/templates/admin/hs_point_of_sale_addresses',
            'views/templates/admin/hs_point_of_sale_completed_orders',
            'views/templates/admin/hs_point_of_sale_dashboard',
            'views/templates/admin/hs_point_of_sale_partial_payment',
            'views/templates/admin/hs_point_of_sale_pro',
            'abstract/views/templates/admin/hs_point_of_sale_abstract',
            'classes',
        );
        return PosFile::deleteDirectories($module->getLocalPath(), $directories);
    }
    
    /**
     * 
     * @return boolean
     */
    public function cleanUpFiles2314()
    {
        $module = Module::getInstanceByName($this->module_name);// Don't need to validate module here.
        $files = array(
            'controllers/admin/AdminHsPointOfSaleAddresses.php',
            'controllers/admin/AdminHsPointOfSaleCompletedOrders.php',
            'controllers/admin/AdminHsPointOfSaleDashboard.php',
            'controllers/admin/AdminHsPointOfSalePartialPayment.php',
            'controllers/admin/AdminHsPointOfSalePayment.php',
            'controllers/admin/AdminHsPointOfSalePdf.php',
            'controllers/admin/AdminHsPointOfSalePro.php',
            'abstract/controllers/admin/AdminHsPointOfSaleAbstract.php',
            'abstract/classes/HsPointOfSaleInstallerAbstract.php',
        );
        return PosFile::deleteFiles($module->getLocalPath(), $files);
    }
    
    /**
     * @return boolean
     */
    public function cleanUpFiles2315()
    {
        $module = Module::getInstanceByName($this->module_name);// Don't need to validate module here.
        $files = array(
            'controllers/admin/AdminHsCustomerPro.php',
            'abstract/controllers/admin/AdminHsCustomerAbstract.php',
        );
        return PosFile::deleteFiles($module->getLocalPath(), $files);
    }
    
    /**
     * 
     * @return boolean
     */
    public function cleanUpDirectories2315()
    {
        $module = Module::getInstanceByName($this->module_name);
        $directories = array(
            'views/templates/admin/hs_customer_pro',
            'abstract/views/templates/admin/hs_customer_abstract',
        );
        return PosFile::deleteDirectories($module->getLocalPath(), $directories);
    }
    
    /**
     * @return boolean
     */
    public function installConfigs238()
    {
        $success = array();
        $success[] = PosConfiguration::updateValue('PS_POS_INVOICE_DISPLAY_SHOP_NAME', 1);
        $success[] = PosConfiguration::updateValue('PS_POS_RECEIPT_SHOW_SHOP_NAME', 1);
        $success[] = PosConfiguration::deleteByName('PS_POS_GENERATE_INVOICE');
        return array_sum($success) >= count($success);
    }
    
    /**
     * @param string $module_name 
     * @return boolean
     */
    public function installConfigs2315($module_name)
    {
        $success = array();
        $success[] = PosConfiguration::updateValue('POS_ROCKPOS_NAME', $module_name);
        $success[] = PosConfiguration::deleteByName('POS_CHECK_DIGIT_ON_BARCODE');
        return array_sum($success) >= count($success);
    }
    
    /**
     * @return boolean
     */
    public function installConfigs240()
    {
        $success   = array();
        $success[] = PosConfiguration::rename('PS_POS_COLLECTING_PAYMENT', 'POS_COLLECTING_PAYMENT');
        $success[] = PosConfiguration::rename('PS_POS_DEFAULT_DISCOUNT_TYPE', 'POS_DEFAULT_PRODUCT_DISCOUNT_TYPE');
        $success[] = PosConfiguration::updateValue('POS_DEFAULT_ORDER_DISCOUNT_TYPE', PosConstants::DISCOUNT_TYPE_PERCENTAGE);
        return array_sum($success) >= count($success);
    }

    /**
     * 
     * @return boolean
     */
    public function updateTable2316()
    {
        $success = array();
        if (Db::getInstance()->execute('ALTER TABLE `' . _DB_PREFIX_ . 'pospayment` ADD `position` int(10) NULL DEFAULT 0 AFTER `active`')) {
            $success[] = PosPayment::resetPositions();
        }
        return array_sum($success) >= count($success);
    }
    
    public function cleanUpFiles2316()
    {
        $module = Module::getInstanceByName($this->module_name);// Don't need to validate module here.
        $files = array(
            'abstract/classes/PosAutoload.php',
            'abstract/autoload.php',
        );
        return PosFile::deleteFiles($module->getLocalPath(), $files);
    }
    
    /**
     * @return boolean
     */
    public function updateTable240()
    {
        $queries = array();
        $queries[] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'pos_search_word` (
                        `id_word` int(10) unsigned NOT NULL AUTO_INCREMENT,
                        `id_shop` int(10) NOT NULL DEFAULT 1,
                        `id_lang` int(10) NULL,
                        `word` varchar(15) NOT NULL,
                        PRIMARY KEY (`id_word`),
                        UNIQUE KEY `id_lang` (`id_lang`,`id_shop`,`word`)
                    )ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8';
        
        $queries[] = 'CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'pos_search_index` (
                        `id_product` int(10) UNSIGNED NOT NULL,
                        `id_word` int(10) UNSIGNED NOT NULL,
                        `weight` smallint(4) UNSIGNED NOT NULL DEFAULT 1,
                        PRIMARY KEY (`id_product`, `id_word`),
                        KEY `id_product` (`id_product`)
                    )ENGINE=' . _MYSQL_ENGINE_ . ' DEFAULT CHARSET=utf8';
        $flag = true;
        foreach ($queries as $query) {
            $flag &= Db::getInstance()->execute($query);
        }
        return $flag;
    }
    
    /**
     * 
     * @return boolean
     */
    public function cleanUpFiles240()
    {
        $module = Module::getInstanceByName($this->module_name);// Don't need to validate module here.
        $files = array(
            'abstract/classes/PosSearch.php'
        );
        return PosFile::deleteFiles($module->getLocalPath(), $files);
    }
}
