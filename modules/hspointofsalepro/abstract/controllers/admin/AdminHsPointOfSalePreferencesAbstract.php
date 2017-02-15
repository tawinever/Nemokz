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
class AdminHsPointOfSalePreferencesAbstract extends AbstractAdminHsPointOfSaleCommon
{
    /**
     * @see parent::__construct()
     */
    public function __construct()
    {
        $this->bootstrap = true;
        parent::__construct();
        
        $this->fields_options = array(
            'general' => array(
                'title' => '',
                'icon' => '',
                'class' => 'configuration-tab configuration_fieldset_general',
                'tabTitle' => $this->module->i18n['general'],
                'fields' => $this->generateGeneralConfigFields(),
                'submit' => array(
                    'title' => $this->module->i18n['save'],
                ),
            ),
            'product' => array(
                'title' => '',
                'icon' => '',
                'class' => 'configuration-tab configuration_fieldset_product',
                'tabTitle' => $this->module->i18n['product'],
                'fields' => $this->generateProductConfigFields(),
                'submit' => array(
                    'title' => $this->module->i18n['save'],
                ),
            ),
            'customer' => array(
                'title' => '',
                'icon' => '',
                'class' => 'configuration-tab configuration_fieldset_customer',
                'tabTitle' => $this->module->i18n['customer'],
                'fields' => $this->generateCustomerConfigFields(),
                'submit' => array(
                    'title' => $this->module->i18n['save'],
                ),
            ),
            'invoice' => array(
                'title' => '',
                'icon' => '',
                'class' => 'configuration-tab configuration_fieldset_invoice',
                'tabTitle' => $this->module->i18n['invoice'],
                'fields' => $this->generateInvoiceConfigFields(),
                'submit' => array(
                    'title' => $this->module->i18n['save'],
                ),
            ),
            'receipt' => array(
                'title' => '',
                'icon' => '',
                'class' => 'configuration-tab configuration_fieldset_receipt',
                'tabTitle' => $this->module->i18n['receipt'],
                'fields' => $this->generateReceiptConfigFields(),
                'submit' => array(
                    'title' => $this->module->i18n['save'],
                ),
            ),
            'order' => array(
                'title' => '',
                'icon' => '',
                'class' => 'configuration-tab configuration_fieldset_order',
                'tabTitle' => $this->module->i18n['order'],
                'fields' => $this->generateOrderConfigFields(),
                'submit' => array(
                    'title' => $this->module->i18n['save'],
                ),
            ),

        );
    }
    
    public function init()
    {
        parent::init();
        if ($this->needToRebuildSearchIndex()) {
            $this->displayWarning($this->module->i18n['your_product_settings_have_been_changed']);
        }
    }

    /**
     * @see parent::renderOptions()
     * @return html
     */
    public function renderOptions()
    {
        $pos_search_index_stats = new PosSearchIndexStats();
        $this->fields_options['product']['fields']['indexing']['score_indexed_products'] = $pos_search_index_stats->getTotalIndexedProducts().' / '.$pos_search_index_stats->getTotalProducts();
        return parent::renderOptions();
    }
    
    /**
     * @see parent::initContent()
     */
    public function initContent()
    {
        $iso_code = $this->context->language->iso_code;
        $this->context->smarty->assign(array(
            'tiny_path_js' => file_exists(_PS_ROOT_DIR_.'/js/tiny_mce/langs/'.$iso_code.'.js') ? $iso_code : 'en',
            'admin_base_url' => __PS_BASE_URI__.basename(_PS_ADMIN_DIR_),
            'module_display_name' => $this->module->displayName
        ));
        parent::initContent();
    }
    
    /**
     * 
     * @return boolean
     */
    protected function needToRebuildSearchIndex()
    {
        $need_to_rebuild_search_index = false;
        if (Tools::isSubmit('submitOptionsconfiguration')) {
            $product_visibilities = $this->getProductVisibilities();
            $product_visibility_keys = array();
            foreach ($product_visibilities as $key => $value) {
                if (empty($value['disabled'])) {
                    $product_visibility_keys[] = $key;
                }
            }
            $search_config_keys = array_merge($product_visibility_keys, array_keys(PosConfiguration::getActiveProductSetting()));
            $old_search_config_values = PosConfiguration::getMultiple($search_config_keys);
            $new_search_config_values = array();
            foreach ($search_config_keys as $key) {
                $new_search_config_values[$key] = Tools::getValue($key);
            }
            $difference_values = array_diff_assoc($old_search_config_values, $new_search_config_values);
            $need_to_rebuild_search_index = !empty($difference_values);
        }
        return $need_to_rebuild_search_index;
    }

    /**
     * 
     * @return array
     * <pre>
     * array(
     *  array(
     *  'value' => string,
     *  'name' => string
     *  ),
     *  ...
     * )
     */
    protected function getInvoiceSizes()
    {
        return array(
            array(
                'value' => PosConstants::PAGE_SIZE_LETTER,
                'name' => $this->module->i18n['letter_215_9x279_4_mm_8_5x11_in'],
            ),
            array(
                'value' => PosConstants::PAGE_SIZE_A4,
                'name' => $this->module->i18n['a4_210x297_mm_8_27x11_69_in'],
            ),
            array(
                'value' => PosConstants::PAGE_SIZE_A5,
                'name' => $this->module->i18n['a5_148x210_mm_5_83x8_27_in']
            )
        );
    }

    /**
     * 
     * @return array
     * <pre>
     * array(
     *  array(
     *  'value' => string,
     *  'name' => string
     *  ),
     *  ...
     * )
     */
    protected function getReceiptSizes()
    {
        return array(
            array(
                'value' => PosConstants::PAGE_SIZE_K80,
                'name' => $this->module->i18n['k80_80x114_mm_3_50x4_49_in'],
            ),
            array(
                'value' => PosConstants::PAGE_SIZE_K57,
                'name' => $this->module->i18n['k57_57x80_mm_2_25x3_19_in'],
            )
        );
    }

    /**
     * 
     * @return array
     * <pre>
     * array(
     *  array(
     *  'value' => string,
     *  'name' => string
     *  ),
     *  ...
     * )
     */
    protected function getOrientations()
    {
        return array(
            array(
                'value' => PosConstants::ORIENTATION_PORTRAIT,
                'name' => $this->module->i18n['portrait']
            ),
            array(
                'value' => PosConstants::ORIENTATION_LANDSCAPE,
                'name' => $this->module->i18n['landscape']
            )
        );
    }

    protected function getStoreDetailFields()
    {
        $store_details_fields = array(
            'POS_RECEIPT_SHOW_LOGO' => array(
                'label' => $this->module->i18n['logo'],
                'value' => Configuration::get('POS_RECEIPT_SHOW_LOGO', 0),
            ),
             'POS_RECEIPT_SHOW_SHOP_NAME' => array(
                'label' => $this->module->i18n['shop_name'],
                'value' => PosConfiguration::get('POS_RECEIPT_SHOW_SHOP_NAME', 0),
            ),
            'POS_RECEIPT_SHOW_PHONE' => array(
                'label' => $this->module->i18n['phone'],
                'value' => Configuration::get('POS_RECEIPT_SHOW_PHONE', 0),
            ),
            'POS_RECEIPT_SHOW_FAX' => array(
                'label' => $this->module->i18n['fax'],
                'value' => Configuration::get('POS_RECEIPT_SHOW_FAX', 0),
            ),
            'POS_RECEIPT_SHOW_REG_NUMBER' => array(
                'label' => $this->module->i18n['registration_number'],
                'value' => Configuration::get('POS_RECEIPT_SHOW_REG_NUMBER', 0),
            ),
            'POS_RECEIPT_SHOW_WEBSITE_URL' => array(
                'label' => $this->module->i18n['website_url'],
                'value' => Configuration::get('POS_RECEIPT_SHOW_WEBSITE_URL', 0),
            ),
            'POS_RECEIPT_SHOW_ADDRESS' => array(
                'label' => $this->module->i18n['shop_address_line_1'],
                'value' => Configuration::get('POS_RECEIPT_SHOW_ADDRESS', 0),
            ),
            'POS_RECEIPT_SHOW_CITY' => array(
                'label' => $this->module->i18n['city'],
                'value' => Configuration::get('POS_RECEIPT_SHOW_CITY', 0),
            ),
            'POS_RECEIPT_SHOW_STATE' => array(
                'label' => $this->module->i18n['state'],
                'value' => Configuration::get('POS_RECEIPT_SHOW_STATE', 0),
            ),
            'POS_RECEIPT_SHOW_ZIPCODE' => array(
                'label' => $this->module->i18n['zip_postal_code'],
                'value' => Configuration::get('POS_RECEIPT_SHOW_ZIPCODE', 0),
            ),

        );

        return $this->reformatGroupOptions($store_details_fields);
    }

    protected function getProductInfoFields()
    {
        $product_config_fields = array(
                                    'POS_RECEIPT_SHOW_PRODUCT_NAME' => array(
                                        'label' => $this->module->i18n['name'],
                                        'value' => 1,
                                        'class' => 'disabled_checkbox',
                                        'disabled' => true,
                                    ),
                                    'POS_RECEIPT_SHOW_PRODUCT_REF' => array(
                                        'label' => $this->module->i18n['reference'],
                                        'value' => Configuration::get('POS_RECEIPT_SHOW_PRODUCT_REF', 0),
                                    ),
                                    'POS_RECEIPT_SHOW_EAN_JAN' => array(
                                        'label' => $this->module->i18n['ean_13_or_jan_barcode'],
                                        'value' => Configuration::get('POS_RECEIPT_SHOW_EAN_JAN', 0),
                                    ),
                                    'POS_RECEIPT_SHOW_UPC' => array(
                                        'label' => $this->module->i18n['upc_barcode'],
                                        'value' => Configuration::get('POS_RECEIPT_SHOW_UPC', 0),
                                    ),
                                    'POS_RECEIPT_SHOW_COMBINATION' => array(
                                        'label' => $this->module->i18n['combination'],
                                        'value' => Configuration::get('POS_RECEIPT_SHOW_COMBINATION', 0),
                                    ),
                                    'POS_RECEIPT_SHOW_UNIT_PRICE' => array(
                                        'label' => $this->module->i18n['unit_price'],
                                        'value' => Configuration::get('POS_RECEIPT_SHOW_UNIT_PRICE', 0),
                                    ),
                                    'POS_RECEIPT_SHOW_PROD_DISCOUNT' => array(
                                        'label' => $this->module->i18n['discount'],
                                        'value' => Configuration::get('POS_RECEIPT_SHOW_PROD_DISCOUNT', 0),
                                    ),
                                );

        return $this->reformatGroupOptions($product_config_fields);
    }

    protected function getReceiptInfoFields()
    {
        $receipt_info_fields = array(
            'POS_RECEIPT_SHOW_ORDER_INFO' => array(
                'label' => $this->module->i18n['order'],
                'class' => 'order_info',
                'type' => 'radio',
                'choices' => array(
                    0 => $this->module->i18n['id'],
                    1 => $this->module->i18n['reference'],
                ),
            ),
            'POS_RECEIPT_SHOW_EMPLOYEE_ID' => array(
                'label' => $this->module->i18n['cashier'],
                'class' => 'cashier_info',
                'type' => 'multi_checkbox',
                'choices' => array(
                    1 => $this->module->i18n['id'],
                ),
            ),
            'POS_RECEIPT_SHOW_EMPLOYEE_NAME' => array(
                'label' => '',
                'class' => 'cashier_info',
                'type' => 'multi_checkbox',
                'choices' => array(
                    1 => $this->module->i18n['name'],
                ),
            ),
        );

        return $this->reformatGroupOptions($receipt_info_fields);
    }

    protected function reformatGroupOptions($group_options)
    {
        foreach ($group_options as $key => &$options) {
            $options['key'] = $key;
            $options['value'] = !empty($options['value']) ? $options['value'] : Configuration::get($key, 0);
        }

        return $group_options;
    }

    protected function generateReceiptConfigFields()
    {
        return array(
            'POS_RECEIPT_PAGE_SIZE' => array(
                'title' => $this->module->i18n['paper_size'],
                'type' => 'select',
                'list' => $this->getReceiptSizes(),
                'identifier' => 'value',
            ),
            'POS_RECEIPT_MARGIN' => array(
                'title' => $this->module->i18n['paper_margin_mm'],
                'type' => 'margin_of_receipt',
                'validation' => 'isFloat',
                'preview_receipt_url' => $this->module->getTargetUrl($this->module->pos_tabs['AdminHsPointOfSalePdf']['tab_class'], 'previewReceipt')
            ),
            'POS_RECEIPT_LOGO' => array(
                'title' => $this->module->i18n['receipt_logo'],
                'desc' => $this->module->i18n['warning_if_no_receipt_logo_is_available_the_main_logo_will_be_used_instead'],
                'type' => 'file',
                'name' => 'POS_RECEIPT_LOGO',
                'thumb' => _PS_IMG_ . PosReceipt::getLogoFileName()
            ),
            'POS_RECEIPT_SHOW_SIGNATURE' => array(
                'title' => $this->module->i18n['enable_signature'],
                'validation' => 'isBool',
                'type' => 'bool',
            ),
            'POS_SHOW_CUS_INFO_ON_RECEIPT' => array(
                'title' => $this->module->i18n['show_customer_info'],
                'validation' => 'isBool',
                'type' => 'bool',
            ),
            'POS_RECEIPT_AUTO_PRINT' => array(
                'title' => $this->module->i18n['print_receipt_automatically'],
                'desc' => $this->module->isPrestashop16() ? $this->getTextTranslationPrintReceipt() : implode('<br />', $this->getTextTranslationPrintReceipt()),
                'validation' => 'isBool',
                'type' => 'bool',
            ),
            'title_receipt_block' => array(
                'title' => $this->module->i18n['select_items_to_show_on_receipt'],
                'type' => 'pos_title',
            ),
            'store_details' => array(
                'title' => $this->module->i18n['store_details'],
                'form_group_class' => 'group_fields',
                'type' => 'pos_checkbox_list',
                'list' => $this->getStoreDetailFields(),
            ),
            'product_info' => array(
                'title' => $this->module->i18n['product_info'],
                'type' => 'pos_checkbox_list',
                'form_group_class' => 'group_fields',
                'list' => $this->getProductInfoFields(),
            ),
            'receipt_info' => array(
                'title' => $this->module->i18n['receipt_info'],
                'type' => 'pos_checkbox_list',
                'form_group_class' => 'group_fields',
                'list' => $this->getReceiptInfoFields(),
            ),
            'change_store_link' => array(
                'type' => 'desc',
                'desc' => sprintf($this->module->i18n['change_store_info'], '<a href="' . $this->context->link->getAdminLink('AdminStores') . '" target="_blank">' . $this->module->i18n['here'] . '</a>'),
            ),
            'POS_RECEIPT_FOOTER_TEXT' => array(
                'type' => 'textarea',
                'title' => '<h2>'.$this->module->i18n['custom_texts_at_footer'].'</h2>'.$this->module->i18n['add_custom_message_on_receipt_footer'],
                'desc' => $this->module->i18n['no_html_tags_please'],
                'form_group_class' => 'clear',
                'rows' => 5,
                'cols' => 15,
                'value' => Configuration::get('POS_RECEIPT_FOOTER_TEXT'),
            ),
        );
    }

    protected function generateGeneralConfigFields()
    {
        return array(
            'POS_COLLECTING_PAYMENT' => array(
                'title' => $this->module->i18n['collect_payment'],
                'desc' => sprintf($this->module->i18n['enable_if_you_want_to_collect_payment_in'], implode(', ', PosPayment::getPosPaymentNames((int) $this->context->language->id, (int) $this->context->shop->id))),
                'validation' => 'isBool',
                'type' => 'bool',
            ),
            'POS_DEFAULT_PAYMENT_ID' => array(
                'title' => $this->module->i18n['default_payment'],
                'desc' => $this->module->i18n['when_collecting_payment_is_turned_off_orders_will_be_paid_with_this_payment'],
                'type' => 'select',
                'list' => $this->getPosPayments(),
                'identifier' => 'value',
            ),
            'POS_DEF_PRODUCT_DISCOUNT_TYPE' => array(
                'title' => $this->module->i18n['default_discount_type_product'],
                'type' => 'select',
                'list' => $this->module->getProductDiscountTypes(),
                'identifier' => 'value',
            ),
            'POS_DEF_ORDER_DISCOUNT_TYPE' => array(
                'title' => $this->module->i18n['default_discount_type_order'],
                'type' => 'select',
                'list' => $this->module->getOrderDiscountTypes(),
                'identifier' => 'value',
            ),
            'POS_DEFAULT_CARRIER' => array(
                'title' => $this->module->i18n['default_carrier'],
                'type' => 'select',
                'list' => $this->getCarriers(),
                'identifier' => 'value',
            ),
            'POS_FREE_SHIPPING' => array(
                'title' => $this->module->i18n['free_shipping'],
                'desc' => $this->module->i18n['enable_free_shipping_by_default'],
                'validation' => 'isBool',
                'type' => 'bool',
            ),
            'POS_CURRENT_FORM_TAB' => array(
                'type' => 'hidden',
                'value' => 'general',
            ),
        );
    }

    protected function generateProductConfigFields()
    {
        $missing_indexing_url_params = array(
            'token' => Tools::encrypt($this->module->name),
        );
        if (Shop::getContext() == Shop::CONTEXT_SHOP) {
            $missing_indexing_url_params['id_shop'] = $this->context->shop->id;
        }
        $full_indexing_url_params = array_merge($missing_indexing_url_params, array('full' => true));
        $support_cron_url = 'http://support.rockpos.com/article/77-index-your-products?utm_source=preferences';
        return array(
            'POS_ORDER_DISABLED_PRODUCTS' => array(
                'title' => $this->module->i18n['allow_ordering_of_disabled_products'],
                'validation' => 'isBool',
                'type' => 'bool',
            ),
            'POS_ORDER_OUT_OF_STOCK' => array(
                'title' => $this->module->i18n['allow_ordering_of_out_of_stock_products'],
                'validation' => 'isBool',
                'type' => 'bool',
            ),
            'indexing' => array(
                'title' => $this->module->i18n['indexing'],
                'type' => 'pos_indexing',
                'score_indexed_products' => 0,
                'indexing_urls' => array(
                    'add_missing_products' => $this->context->link->getAdminLink($this->module->pos_tabs['AdminHsPointOfSaleSearchCron']['tab_class']) . '&action=index',
                    'add_missing_product_cron_url' => $this->context->link->getModuleLink($this->module->name, 'searchcron', $missing_indexing_url_params),
                    'rebuild_entire_index' => $this->context->link->getAdminLink($this->module->pos_tabs['AdminHsPointOfSaleSearchCron']['tab_class']) . '&action=index&full=1',
                    'rebuild_entire_product_cron_url' => $this->context->link->getModuleLink($this->module->name, 'searchcron', $full_indexing_url_params),
                )
            ),
            'POS_AUTO_INDEXING' => array(
                'title' => $this->module->i18n['auto_indexing'],
                'validation' => 'isBool',
                'type' => 'bool',
                'desc' => implode('<br/>', array(
                    $this->module->i18n['enable_the_automatic_indexing_of_products'],
                    $this->module->i18n['if_you_enable_this_feature_the_products_will_be_indexed_in_the_search_automatically_when_they_are_saved'],
                    $this->module->i18n['if_the_feature_is_disabled_you_will_have_to_index_products_manually_by_using_the_links_provided_in_the_field_set'],
                    '',
                    $this->module->i18n['you_should_disable_this_and_set_up_a_cron_job_instead_if'],
                    '- ' . $this->module->i18n['you_cannot_edit_and_save_a_product'],
                    '- ' . $this->module->i18n['you_can_edit_and_save_a_product_but_it_takes_too_much_time_to_complete'],
                    str_replace(array('[a]', '[/a]'), array('<a href="' . $support_cron_url . '" target="_blank">', '</a>'), $this->module->i18n['_a_read_more_a'])
                ))
            ),
            'product_visibilities' => array(
                'title' => $this->module->i18n['product_visibility_for_sale'],
                'type' => 'pos_checkbox_list',
                'desc' => $this->module->i18n['by_default_only_products_whose_visibility_marked_as_everywhere_or_search_only_can_be_available_for_sale'],
                'list' => $this->getProductVisibilities(),
            ),
            'search_result_labels' => array(
                'title' => $this->module->i18n['show_these_when_searching_for_products'],
                'type' => 'pos_checkbox_list',
                'list' => $this->getSearchResultLabels(),
            ),
        );
    }

    protected function generateCustomerConfigFields()
    {
        return array(
            'POS_ALLOW_GUEST_SEARCH' => array(
                'title' => $this->module->i18n['search_for_guests'],
                'validation' => 'isBool',
                'type' => 'bool',
                'hint' => $this->module->i18n['there_are_2_kinds_of_customers_standard_customers_and_guest_customers']
            ),
            'POS_GUEST_CHECKOUT' => array(
                'title' => $this->module->i18n['guest_checkout_pos_only'],
                'validation' => 'isBool',
                'type' => 'bool',
                'hint' => sprintf($this->module->i18n['once_enabled_please_associate_a_default_customer_profile'], Configuration::get('PS_SHOP_EMAIL'))
            ),
            'default_customer' => array(
                'title' => $this->module->i18n['default_customer'],
                'type' => 'default_customer_field',
                'list' => PosCustomer::getDefaultCustomer(),
                'placeholder' => sprintf($this->module->i18n['for_example'], Configuration::get('PS_SHOP_EMAIL'))
            ),
            'POS_SEND_EMAIL_TO_CUSTOMER' => array(
                'title' => $this->module->i18n['send_confirmation_emails'],
                'validation' => 'isBool',
                'type' => 'bool',
                'hint' => $this->module->i18n['including_account_creation_and_order_completion'],
            ),
        );
    }

    protected function generateOrderConfigFields()
    {
        return array(
            'order_states' => array(
                'title' => $this->module->i18n['order_status_to_be_shown'],
                'type' => 'pos_checkbox_list',
                'list' => $this->getSelectedOrderStates(),
            ),
            'POS_DEFAULT_ORDER_STATE' => array(
                'title' => $this->module->i18n['default_order_status'],
                'type' => 'select',
                'list' => $this->getOrderStates(),
                'identifier' => 'value',
            ),
            'POS_SHOW_ORDERS_UNDER_PS_ORDERS' => array(
                'title' => $this->module->i18n['show_orders_under_back_office_orders'],
                'validation' => 'isBool',
                'type' => 'bool',
            ),
        );
    }

    protected function generateInvoiceConfigFields()
    {
        return array(
            'POS_PRESTASHOP_INVOICE' => array(
                'title' => $this->module->i18n['use_prestashop_invoice'],
                'desc' => $this->module->i18n['to_use_prestashop_invoice_template_instead_of_rockpos_s'],
                'validation' => 'isBool',
                'type' => 'bool',
            ),
            'POS_INVOICE_AUTO_PRINT' => array(
                'title' => $this->module->i18n['print_invoice_automatically'],
                'desc' => $this->module->isPrestashop16() ? $this->getTextTranslationPrintInvoice() : implode('<br />', $this->getTextTranslationPrintInvoice()),
                'validation' => 'isBool',
                'type' => 'bool',
            ),
            'POS_INVOICE_PAGE_SIZE' => array(
                'title' => $this->module->i18n['invoice_size'],
                'type' => 'select',
                'list' => $this->getInvoiceSizes(),
                'identifier' => 'value',
            ),
            'POS_INVOICE_ORIENTATION' => array(
                'title' => $this->module->i18n['orientation'],
                'type' => 'select',
                'list' => $this->getOrientations(),
                'identifier' => 'value',
            ),
            'POS_INVOICE_LOGO' => array(
                'title' => $this->module->i18n['invoice_logo'],
                'desc' => $this->module->i18n['warning_if_no_invoice_logo_is_available_the_main_logo_will_be_used_instead'],
                'type' => 'file',
                'name' => 'POS_INVOICE_LOGO',
                'thumb' => _PS_IMG_ . PosInvoice::getLogoFileName()
            ),
            'POS_INVOICE_SHOW_SHOP_NAME' => array(
                'title' => $this->module->i18n['display_shop_name'],
                'validation' => 'isBool',
                'type' => 'bool',
            ),
            'POS_INVOICE_SHOW_EMPLOYEE_NAME' => array(
                'title' => $this->module->i18n['display_employee_name'],
                'validation' => 'isBool',
                'type' => 'bool',
            ),
            'POS_INVOICE_SHOW_EAN_JAN' => array(
                'title' => $this->module->i18n['show_ean_13_or_jan_barcode_info'],
                'validation' => 'isBool',
                'type' => 'bool',
            ),
            'POS_INVOICE_SHOW_SIGNATURE' => array(
                'title' => $this->module->i18n['enable_signature'],
                'validation' => 'isBool',
                'type' => 'bool',
            ),
            'POS_INVOICE_FOOTER_TEXT' => array(
                'type' => 'textareaLang',
                'autoload_rte' => true,
                'lang' => true,
                'title' => '<h2>'.$this->module->i18n['custom_texts_at_footer'].'</h2>'.$this->module->i18n['add_custom_message_on_invoice_footer'],
                'form_group_class' => 'clear',
                'rows' => 5,
                'cols' => 15,
                'value' => Configuration::get('POS_INVOICE_FOOTER_TEXT'),
            ),
        );
    }

    /**
     * Define again array payments.
     *
     * @return array
     *               array(<pre>
     *               [0] => array(
     *               'value' => int,
     *               'name' => string
     *               )
     *               ...
     *               )</pre>
     */
    protected function getPosPayments()
    {
        $payments = PosPayment::getPosPayments((int) $this->context->language->id, (int) $this->context->shop->id);
        $pos_payments = array();
        $i = 0;
        foreach ($payments as $payment) {
            $pos_payments[$i]['value'] = $payment['id_pos_payment'];
            $pos_payments[$i]['name'] = $payment['payment_name'];
            ++$i;
        }

        return $pos_payments;
    }

    /**
     * Get text translation of option print invoice.
     *
     * @return array
     *               array(<pre>
     *               'Do you need to generate the invoice?],
     *               'Warning',
     *               'Popup blocker should be turned off on your Internet Explorer, Firefox or Chrome.',
     *               'It might not work properly on Internet Explorer.',
     *               );</pre>
     */
    protected function getTextTranslationPrintInvoice()
    {
        $browser_warning_text = $this->getTextTranslationBrowserWarning();
        array_unshift($browser_warning_text, $this->module->i18n['do_you_need_to_generate_the_invoice']);
        return $browser_warning_text;
    }

    /**
     * Get text translation of option print receipt.
     *
     * @return array
     *               array(<pre>
     *               'Do you need to generate the receipt?],
     *               'Warning',
     *               'Popup blocker should be turned off on your Internet Explorer, Firefox or Chrome.',
     *               'It might not work properly on Internet Explorer.',
     *               );</pre>
     */
    protected function getTextTranslationPrintReceipt()
    {
        $browser_warning_text = $this->getTextTranslationBrowserWarning();
        array_unshift($browser_warning_text, $this->module->i18n['do_you_need_to_generate_the_receipt']);
        return $browser_warning_text;
    }

    /**
     * Get the brower warning
     *
     * @return array
     * array(<pre>
     *      'Warning',
     *      'Popup blocker should be turned off on your Internet Explorer, Firefox or Chrome.',
     *      'It might not work properly on Internet Explorer.',
     * )
     */
    protected function getTextTranslationBrowserWarning()
    {
        $popup_manual_ie = '<a href="http://windows.microsoft.com/en-us/internet-explorer/ie-security-privacy-settings" onclick="window.open(this.href, \'poswindow\', \'left=20,top=20,width=600,height=500,toolbar=1,resizable=1\'); return false;">'.$this->module->i18n['internet_explorer'].'</a>';
        $popup_manual_ff = '<a href="https://support.mozilla.org/en-US/kb/pop-blocker-settings-exceptions-troubleshooting#w_pop-up-blocker-settings" onclick="window.open(this.href, \'poswindow\', \'left=20,top=20,width=600,height=500,toolbar=1,resizable=1\'); return false;">'.$this->module->i18n['firefox'].'</a>';
        $popup_manual_ch = '<a href="https://support.google.com/chrome/answer/95472" onclick="window.open(this.href, \'poswindow\', \'left=20,top=20,width=600,height=500,toolbar=1,resizable=1\'); return false;">'.$this->module->i18n['chrome'].'</a>';
        return array(
            $this->module->i18n['warning'],
            sprintf($this->module->i18n['popup_blocker_should_be_turned_off_on_your_or'], $popup_manual_ie, $popup_manual_ff, $popup_manual_ch),
            $this->module->i18n['it_might_not_work_properly_on_internet_explorer']
        );
    }
    
    /**
     * Define again array order states.
     *
     * @return array
     *               array(<pre>
     *               [0] => array(
     *               'value' => int,
     *               'name' => string
     *               )
     *               ...
     *               )</pre>
     */
    protected function getOrderStates()
    {
        $order_states = PosOrderState::getSelectedOrderStates((int) $this->context->language->id);
        $pos_order_states = array();
        $i = 0;
        foreach ($order_states as $order_state) {
            $pos_order_states[$i]['value'] = $order_state['id_order_state'];
            $pos_order_states[$i]['name'] = $order_state['name'];
            ++$i;
        }

        return $pos_order_states;
    }

    /**
     * Define again array order states.
     *
     * @return array
     *               array(<pre>
     *               [0] => array(
     *               'value' => int,
     *               'name' => string
     *               )
     *               ...
     *               )</pre>
     */
    protected function getCarriers()
    {
        $carriers = Carrier::getCarriers((int) $this->context->language->id, true, false, false, null, Carrier::ALL_CARRIERS);
        $pos_carriers = array();
        $i = 0;
        foreach ($carriers as $carrier) {
            $pos_carriers[$i]['value'] = $carrier['id_carrier'];
            $pos_carriers[$i]['name'] = $carrier['name'];
            ++$i;
        }

        return $pos_carriers;
    }

    /**
     * Get product visibility types.
     *
     * @return array
     *               <pre/>
     *               array(
     *               string => array(// configuration_key
     *               'label' => string,
     *               'disabled' => bool,
     *               'value' => int,
     *               'key' => string// configuration eky
     *               )
     *               )
     */
    protected function getProductVisibilities()
    {
        $product_visbilities = array(
            'POS_VISIBILITY_EVERYWHERE' => array(
                'label' => $this->module->i18n['everywhere'],
                'disabled' => true,
                'value' => 1// always enable by default
            ),
            'POS_VISIBILITY_CATALOG_ONLY' => array(
                'label' => $this->module->i18n['catalog_only']
            ),
            'POS_VISIBILITY_SEARCH_ONLY' => array(
                'label' => $this->module->i18n['search_only']
            ),
            'POS_VISIBILITY_NOWHERE' => array(
                'label' => $this->module->i18n['nowhere']
            ),
        );

        return $this->reformatGroupOptions($product_visbilities);
    }

    protected function getSelectedOrderStates()
    {
        $order_states = OrderState::getOrderStates((int) $this->context->language->id);
        $pos_order_states = array();
        $i = 0;
        $selected_order_status = PosOrderState::getSelectedIdOrderStates();
        foreach ($order_states as $order_state) {
            $pos_order_states[$i]['key'] = 'POS_SELECTED_ORDER_STATES[]';
            $pos_order_states[$i]['label'] = $order_state['name'];
            $pos_order_states[$i]['type'] = '';
            $pos_order_states[$i]['id'] = $order_state['id_order_state'];
            $pos_order_states[$i]['value'] = in_array($order_state['id_order_state'], $selected_order_status) ? true : false;
            $pos_order_states[$i]['disabled'] = ($order_state['id_order_state'] == (int) Configuration::get('POS_RECEIPT_DEFAULT_ORDER_STATE')) ? true : false;
            ++$i;
        }

        return $pos_order_states;
    }

    /**
     * Show these when searching for products.
     *
     * @return array
     *               <pre/>
     *               array(
     *               string => array(// configuration_key
     *               'label' => string,
     *               'disabled' => bool,
     *               'value' => int,
     *               'key' => string// configuration eky
     *               )
     *               )
     */
    protected function getSearchResultLabels()
    {
        $search_result_labels = array(
            'POS_SHOW_ID' => array(
                'label' => $this->module->i18n['id'],
                'disabled' => false,
            ),
            'POS_SHOW_REFERENCE' => array(
                'label' => $this->module->i18n['reference'],
                'disabled' => false,
            ),
            'POS_SHOW_STOCK' => array(
                'label' => $this->module->i18n['stock'],
                'disabled' => false,
            ),
            'POS_SHOW_NAME' => array(
                'label' => $this->module->i18n['name'],
                'disabled' => true,
                'value' => 1,// always enabled by default
            )
        );

        return $this->reformatGroupOptions($search_result_labels);
    }

    /**
     * Set Media file include when controller called.
     */
    public function setMedia()
    {
        $this->module_media_js = array_merge($this->module_media_js, array(
            'pos_preferences.js',
            'pos_payment.js',
            'pos_print.js',
            'pos_preferences_customer.js',
            'pos_preference_receipt.js',
            'jquery.confirm.js',
        ));
        $this->jquery_ui_components[] = 'ui.autocomplete';
        $this->module_media_css['jquery.confirm.css'] = 'all';
        if ($this->module->isPrestashop16()) {
            $this->module_media_css['preferencespage_16.css'] = 'all';
        } else {
            $this->module_media_css['preferencespage_15.css'] = 'all';
        }
        parent::setMedia();
        $this->addJS(array(
            _PS_JS_DIR_.'tiny_mce/tiny_mce.js',
            _PS_JS_DIR_.'admin/tinymce.inc.js',
            _PS_JS_DIR_.'tinymce.inc.js',
        ));
    }

    public function updateOptionProductInfo()
    {
        $array_product_info_files = $this->getProductInfoFields();
        unset($array_product_info_files['POS_RECEIPT_SHOW_PRODUCT_NAME']);
        $product_info_files = array_keys($array_product_info_files);
        foreach ($product_info_files as $key) {
            Configuration::updateValue($key, Tools::getValue($key));
        }
        // refresh values
        $this->fields_options['receipt']['fields']['product_info']['list'] = $this->getProductInfoFields();
    }

    public function updateOptionOrderStates()
    {
        $selected_order_states = Tools::getValue('POS_SELECTED_ORDER_STATES');
        $default_order_state_receipt = (int) Configuration::get('POS_RECEIPT_DEFAULT_ORDER_STATE');
        if (!in_array($default_order_state_receipt, $selected_order_states)) {
            $selected_order_states[] = $default_order_state_receipt;
        }
        $order_status = $selected_order_states ? implode(',', $selected_order_states) : array();
        Configuration::updateValue('POS_SELECTED_ORDER_STATES', $order_status);
        $this->fields_options['order']['fields']['order_states']['list'] = $this->getSelectedOrderStates();
        $this->fields_options['order']['fields']['POS_DEFAULT_ORDER_STATE']['list'] = $this->getOrderStates();
    }

    public function updateOptionStoreDetails()
    {
        $store_detail_fields = array_keys($this->getStoreDetailFields());
        foreach ($store_detail_fields as $key) {
            Configuration::updateValue($key, (int) Tools::getValue($key));
        }
        // refresh values
        $this->fields_options['receipt']['fields']['store_details']['list'] = $this->getStoreDetailFields();
    }

    public function updateOptionReceiptInfo()
    {
        $receipt_info_fields = array_keys($this->getReceiptInfoFields());
        foreach ($receipt_info_fields as $key) {
            Configuration::updateValue($key, Tools::getValue($key));
        }
        // refresh values
        $this->fields_options['receipt']['fields']['receipt_info']['list'] = $this->getReceiptInfoFields();
    }

    public function updateOptionProductVisibilities()
    {
        foreach ($this->getProductVisibilities() as $key => $options) {
            if (!empty($options['disabled'])) {
                if (!empty($options['value'])) {
                    Configuration::updateValue($key, $options['value']);
                }
            } else {
                Configuration::updateValue($key, Tools::getValue($key));
            }
        }
        // refresh values
        $this->fields_options['product']['fields']['product_visibilities']['list'] = $this->getProductVisibilities();
    }

    /**
     * Specific function to update option Search result labels.
     */
    public function updateOptionSearchResultLabels()
    {
        $array_search_result_labels = $this->getSearchResultLabels();
        unset($array_search_result_labels['POS_SHOW_NAME']);
        $search_result_labels = array_keys($array_search_result_labels);

        foreach ($search_result_labels as $key) {
            Configuration::updateValue($key, Tools::getValue($key));
        }
        // refresh values
        $this->fields_options['product']['fields']['search_result_labels']['list'] = $this->getSearchResultLabels();
    }

    public function updateOptionPosInvoiceCustomTextsAtFooter()
    {
        $languages = Language::getLanguages(false);
        $custom_text = array();
        foreach ($languages as $lang) {
            $custom_text[$lang['id_lang']] = Tools::getValue('POS_INVOICE_FOOTER_TEXT_'.(int) $lang['id_lang']);
        }
        Configuration::updateValue('POS_INVOICE_FOOTER_TEXT', $custom_text, true);
    }

    /**
     * Proccess add default customer.
     */
    public function ajaxProcessUpdateDefaultCustomer()
    {
        $id_customer = (int) Tools::getValue('id_customer', null);
        if ($id_customer) {
            $customer = new PosCustomer($id_customer);
            if (Validate::isLoadedObject($customer)) {
                $customer->addPosCustomerGroup();
                if (Configuration::updateValue('POS_DEFAULT_GUEST_ACCOUNT', $id_customer)) {
                    $this->context->smarty->assign(array(
                        'default_customer' => $customer,
                        'link' => $this->context->link,
                    ));
                    $this->ajax_json['success'] = true;
                    $this->ajax_json['data'] = $this->context->smarty->fetch(_PS_MODULE_DIR_.$this->module->name.'/abstract/views/templates/admin/hs_point_of_sale_preferences_abstract/display_default_customer.tpl');
                } else {
                    $this->ajax_json['success'] = false;
                    $this->ajax_json['message'] = $this->module->i18n['there_is_an_error_on_updating_default_customer'];
                }
            }
        }
    }

    /**
     * Proccess delete default customer.
     */
    public function ajaxProcessDeleteDefaultCustomer()
    {
        if (Configuration::updateValue('POS_DEFAULT_GUEST_ACCOUNT', 0)) {
            $this->ajax_json['success'] = true;
        } else {
            $this->ajax_json['success'] = false;
            $this->ajax_json['message'] = $this->module->i18n['there_is_an_error_on_removing_default_customer'];
        }
    }
    
    /**
     * Update invoice logo
     */
    public function updateOptionPsPosInvoiceLogo()
    {
        if (!$_FILES['POS_INVOICE_LOGO']['name']) {
            return;
        }
        $image_uploader = new PosHelperImageUploader('POS_INVOICE_LOGO');
        $image_uploader->setAcceptTypes(PosFile::getImageExtensions());
        $image_uploader->setSavePath(_PS_IMG_DIR_);
        $image_uploader->setResizedHeight(PosConstants::INVOICE_LOGO_MAX_HEIGHT);
        $extension = PosFile::getFileExtension($_FILES['POS_INVOICE_LOGO']);
        $logo_name = $this->getLogoName(PosConstants::INVOICE_LOGO_PREFIX, $extension);
        $files = $image_uploader->process($logo_name);
        if (count($files) && $files[0]['error']) {
            $this->errors[] = $files[0]['error'];
        } else {
            if ($image_uploader->resize($files[0]['save_path'], _PS_IMG_DIR_ . $logo_name)) {
                PosConfiguration::updateValue('POS_INVOICE_LOGO', $logo_name);
                $this->fields_options['invoice']['fields']['POS_INVOICE_LOGO']['thumb'] = _PS_IMG_ . PosInvoice::getLogoFileName();
            }
        }
    }
    
    /**
     * Update receipt logo
     */
    public function updateOptionPsPosReceiptLogo()
    {
        if (!$_FILES['POS_RECEIPT_LOGO']['name']) {
            return;
        }
        $image_uploader = new PosHelperImageUploader('POS_RECEIPT_LOGO');
        $image_uploader->setAcceptTypes(PosFile::getImageExtensions());
        $image_uploader->setSavePath(_PS_IMG_DIR_);
        $image_uploader->setResizedHeight(PosConstants::RECEIPT_LOGO_MAX_HEIGHT);
        $extension = PosFile::getFileExtension($_FILES['POS_RECEIPT_LOGO']);
        $logo_name = $this->getLogoName(PosConstants::RECEIPT_LOGO_PREFIX, $extension);
        $files = $image_uploader->process($logo_name);
        if (count($files) && $files[0]['error']) {
            $this->errors[] = $files[0]['error'];
        } else {
            if ($image_uploader->resize($files[0]['save_path'], _PS_IMG_DIR_ . $logo_name)) {
                PosConfiguration::updateValue('POS_RECEIPT_LOGO', $logo_name);
                $this->fields_options['receipt']['fields']['POS_RECEIPT_LOGO']['thumb'] = _PS_IMG_ . PosReceipt::getLogoFileName();
            }
        }
    }

    /**
     * @param string $prefix
     * @param string $extension
     * @return string
     */
    protected function getLogoName($prefix, $extension)
    {
        $id_shop = (int) Context::getContext()->shop->id;
        if (Context::getContext()->shop->getContext() == Shop::CONTEXT_ALL || $id_shop == 0 || Shop::isFeatureActive() == false) {
            $id_shop = '';
        }
        return Tools::link_rewrite(Context::getContext()->shop->name) . '-' . $prefix . '-' . (int) PosConfiguration::get('PS_IMG_UPDATE_TIME') . $id_shop . '.' . $extension;
    }
}
