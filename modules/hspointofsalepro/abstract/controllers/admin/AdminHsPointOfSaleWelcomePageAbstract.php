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
class AdminHsPointOfSaleWelcomePageAbstract extends AbstractAdminHsPointOfSaleCommon
{
    protected $change_logs = array(
        'v.2.4.2' => array(
            '[Fixed] Cannot display product images if watermark is enabled for logged -in customers',
            '[Fixed] Prices are not the same in multiple currency circumstance',
            '[Fixed] Wrong discount applied to product whose combinations has impact price',
            '[Fixed] Delete specific prices accidentially',
            '[Fixed] Avoid NULL message when adding a payment',
            '[Changed] Only close side -bar menu in New sale page',
            '[Changed] Display cron URLs in plain text',
            '[Changed] Mark customers as logged',
            '[Changed] Speed up "New sale" page',
            '[Changed] Billing address & invoice address is formatted incorrectly',
            '[Changed] French translation for v2.4.1, thanks to Eric Paul',
            '[Added] Exclude RockPOS orders from Back office > Orders',
            '[Added] Guide to set up indexing cron in crontab and PHP',
            '[Added] An option to use PrestaShop invoice template instead',
            '[Added] Add option: Auto indexing',
            '[Added] Pick up combination upon selecting a product',
            '[Added] Clear cache after installing / upgrading'
        ),
        'v.2.4.1' => array(
            '[Added] Display discounts (if any) in invoice / receipt',
            '[Added] New page of reports',
            '[Added] Introduce hook "actionPosCancelOrder"',
            '[Added] Possibility to change product\'s price',
            '[Changed] Rename MySQL tables to "pos_"',
            '[Changed] Make the text "Show note on receipt / invoice" clickable',
            '[Removed] Do not ask when starting another transaction',
            '[Fixed] Prevent specific prices from being deleted accidentally by PrestaShop;',
            '[Fixed] Cannot add out-of-stock product using barcode scanner',
            '[Fixed] Sold items removed twice from Advanced stock management (PS1.6.0.8 or older)',
            '[Fixed] Receipt margin is not taken into account',
            '[Fixed] DbQuery::type() is undefined in PrestaShop 1.6.0.x',
            '[Fixed] "Search for guests" does not work',
            '[Fixed] Do not search for inactive customers',
            '[Fixed] Can not print invoice in some custom PrestaShop installation',
            '[Fixed] Order discount does not work if a product restricted discount is applied previously',
            '[Fixed] Missing order discount types',
            '[Fixed] Cannot set default carrier',
            '[Fixed] Default carrier is wrong if that carrier is updated via back office'
        ),
        'v.2.4.0' => array(
            '[Added] Ability to override invoice / receipt in BO theme',
            '[Added] Ability to set default type of discount for order',
            '[Added]	New payment method: Installment',
            '[Changed] French translations',
            '[Removed] Remove message "POS - by ..."',
            '[Fixed] Product discount does not work in multistore environment',
            '[Fixed] Cannot add product with barcode if the first combination is out of stock',
            '[Fixed] Cannot search with barcode when product-autocomplete is focused',
            '[Fixed] Only apply free shipping if it\'s enabled by default',
            '[Fixed] Default carrier is not taken in a new transaction',
            '[Fixed] Cannot type a keyword to search for items',
            '[Fixed] Cannot load custom js file'
        ),
        'v.2.3.16' => array(
            '[Changed] Flush JS cache after upgrading to a newer version',
            '[Changed] Display company name and phone along with customer search',
            '[Added] Ability to add address with company + VAT number',
            '[Added] Ability to sort payment methods',
            '[Added] Portuguese-Brazilian translation',
            '[Added] Add customer B2B fields (company, siret, ape, website)',
            '[Fixed] Accept free order'
        ),
        'v.2.3.15' => array(
            '[Fixed] mb_string() is undefined',
            '[Fixed] Can not uncheck / check on Product Visibility > Search only',
            '[Added] Publish addon "Sell custom products"',
            '[Added] Publish addon "Sales commission"',
            '[Changed] Search with mixed barcode (letters and digits)'
        ),
        'v.2.3.14' => array(
            '[Fixed] Can\'t save cart due to NULL values',
            '[Changed] Many changes in architecture',
            '[Changed] Convert tables to CHARSET utf-8',
        ),
        'v.2.3.13' => array(
            '[Changed] Display "incompleted orders" associated with selected shop',
            '[Changed] Capture errors when cookie expires',
            '[Fixed] Apply automatic discount rules on POS cart',
            '[Fixed] Don\'t generate random values for some address fields',
            '[Added] New field: social titles when creating new customer',
        ),
        'v.2.3.12' => array(
            '[Fixed] Can not search if a product\'s visibility is set to "search"',
            '[Fixed] Wrong unit price in Invoice',
            '[Fixed] Always show delivery address on invoice',
            '[Fixed] Wrong amount due after adding new payment for "incompleted" orders',
            '[Fixed] Multi-stores - Option "Product visibility for sale" does not work properly',
            '[Fixed] Remove automatically changed default customer group to POS customer to avoid discounts on customer\'s group issues',
            '[Added] Possibility change invoice orientation (landscape or portrait)',
            '[Added] Option to verify barcode when searching/scanning',
            '[Added] Possibility to override css, js in BE theme',
        ),
        'v.2.3.11' => array(
            '[Added] Show confirmation popup when adding payment in "Incomplete orders" ',
            '[Fixed] Error when searching with reference contains - letter',
            '[Changed] Update translation for Danish (70% completed)',
            '[Changed] Verify UPC and EAN-13 code',
        ),
        'v.2.3.10' => array(
            '[Added] Implement an option to turn on/off searching for guest customers',
            '[Added] New paper size - Letter - for invoice',
            '[Added] Allow uploading custom logos for receipt/invoice',
            '[Fixed] Pdf generator conflicts with module "PrestaShop Invoice Builder"',
            '[Fixed] Fix conflict issue with module "Darique"',
            '[Changed] Improve behavior for alert: The item is not available',
        ),
        'v.2.3.9' => array(
            '[Added] Add Autoload to improve performance',
            '[Fixed] Do not get orders for dashboard based on invoice state',
            '[Fixed] Cannot create an manual order with customer added by RockPOS',
        ),
        'v.2.3.8' => array(
            '[Fixed] Use invoice number instead of order ID in invoice',
            '[Fixed] Receipt is split into 2 pages',
            '[Fixed] Cannot search shared customers in case logging in with non-super-admin-role accounts',
            '[Added] Option to choose whether to display shop name on invoice and receipt or not',
            '[Added] Show payment date on invoice',
            '[Changed] Remove option "Print Invoice"',
            '[Fixed] Show prices with or without tax in invoice/receipt based on PrestaShop configuration',
            '[Fixed] Missing payment info on invoice/receipt when adding a new payment in "Incompleted orders"',
            '[Added] Show guideline for option "Enable guest checkout"'
        ),
        'v.2.3.7' => array(
            '[Changed] Rearrange payment and given amount on receipt',
            '[Added] Option "Print sales receipt automatically"',
            '[Added] Show Change / Returned amount in Summary page',
            '[Added] Show remaining amount (amount due) on invoice',
            '[Added] Allow customer to order out of stock products without depending on PrestaShop setting',
            '[Added] Keep all tables & settings when uninstalling POS',
            '[Added] Option to adjust paper margin for receipt',
        ),
        'v.2.3.6' => array(
            '[Fixed] Don\'t show payment method on invoice',
            '[Fixed] Error when upgrading module from v2.3.2',
            '[Fixed] Show unit price without discount or any specific rule in summary page',
            '[Fixed] Always show product name on search result popup',
            '[Fixed] Change text UBC to UPC on preference page',
            '[Fixed] Order contains products belong to different warehouses doesn\'t show on "completed orders" list',
            '[Fixed] Missing products in receipt when basket contains several products belong to different warehouses',
            '[Fixed] Print invoice/receipt in case order contains products belong to different warehouses (for each warehouse, PrestaShop creates a separated order)',
            '[Changed] Update translation texts for Greek, thanks to Giannis',
            '[Changed] Update translation texts for Dutch, thanks to Michel Bos',
            '[Changed] Migrate old POS orders into POS dashboard',
        ),
        'v.2.3.5' => array(
            '[Fixed] Wrongly display included/excluded tax information',
            '[Fixed] Missing combination info on receipt when product name contains letter',
            '[Fixed] Error on setting up a new customer group for POS when installing the module',
            '[Fixed] Fix Incorrect stock syncing on version PrestaShop 1.6.0.9',
            '[Fixed] Cannot add product to RockPOS when minimum quantity equal to 0',
            '[Fixed] Missing order payment information due to conflict with module modrefchange',
            '[Fixed] Does not show price included tax on product summary table - invoice template',
            '[Fixed] Empty popup when clicking on view button in Incompleted Orders',
            '[Fixed] Show invoice prefix based on shop ID',
            '[Fixed] [Dashboard] total net profit is incorrect',
        ),
        'v.2.3.4' => array(
            '[Fixed] Error message \'No internet connection\' is shown in wrong case',
            '[Changed] Update new translation for Dutch',
            '[Changed] Applying discount for the product which already has default discounts',
            '[Changed] Redesign home page (New sales) for POS',
            '[Changed] Separate print setting for invoice & receipt',
            '[Changed] Update layout for printed invoice',
            '[Added] Dashboard with simple report functions',
        ),
        'v.2.3.3' => array(
            '[Added] A separated printer setting for Receipt',
            '[Fixed] Searching for customer in Multistores - does not work with "share customers" feature',
            '[Fixed] Duplicate Partial order status when reset module',
            '[Fixed] Can\'t add payment shop',
            '[Changed] Clear clarify error message',
            '[Fixed] Print receipt invoice doesn\'t work on PrestaShop version < 1.6.1.1',
            '[Fixed] Doesn\'t show product name on search result for some cases',
            '[Fixed] Remove js to load category tree on Payment setting page',
            '[Fixed] Miss function getFieldsRequired in PrestaShop version < 1.6.1',
            '[Fixed] Update discount doesn\'t work on PrestaShop version 1.6.1.2',
        ),
        'v.2.3.2' => array(
            '[Added] New Print setting to allow select fields to show/hide on receipt/invoice',
            '[Added] New Order setting to decide which order status will be available on \'New sale\' page',
            '[Added] New layout for receipt with a lot of improvements',
            '[Changed] Use module configuration for sending email to customer instead of default PS setting',
            '[Changed] Improve look & feel for partial payment & completed orders',
            '[Changed] Send POS invoice to customers instead of default Prestashop invoice',
            '[Fixed] Stock mismatched on PrestaShop version 1.5.x',
            '[Fixed] Auto print sale receipt in case print invoice option is disabled',
            '[Fixed] Make module fully compatible with js on Prestashop 1.5',
            '[Fixed] Broken invoice layout A4 size when logo is too big',
        ),
        'v.2.3.1' => array(
            '[Fixed] Show error out of stock when adding product with minimal quantity is larger than 1',
            '[Fixed] Cannot edit customer\'s addresses',
            '[Fixed] Uncheck Home category',
        ),
        'v.2.3.0' => array(
            '[FEATURE] Support Partial payment',
            '[FEATURE] Allow to manage completed orders',
            '[FEATURE] Re-print invoice/receipt at anytime',
            '[IMPROVEMENT] Czech translation',
            '[BUG] Disable Complete Sale button when clicking on that to avoid sending multiple requests, then re-enable after finishing ajax request',
        ),
        'v.2.2.3' => array(
            '[Fixed] Can not add address when add a new customer',
            '[Fixed] Search customer based on a shop',
            '[Fixed] Preference page breaks the layout',
            '[Improvement] Display actually stock in product list',
            '[Improvement] Add the first name, last name of employee into invoice',
            '[Improvement] Move block adding custom note to top of page',
            '[Improvement] Remove N/A at address of customer',
        ),
        'v.2.2.2' => array(
            '[Improvement] Add formatting for money given & money return',
            '[Improvement] Change style of invoice ticket',
            '[Fixed] Stock is not synced correctly',
        ),
        'v.2.2.1' => array(
            '[Improvement] Update translations in English, French, Spanish, German, Portuguese, Italian, Dutch',
        ),
        'v.2.2.0' => array(
            '[Feature] Add a custom hook after block Filter by categories where showing Filter products by categories',
            '[Feature] Add a new tab to show add-ons of module POS',
            '[Feature] Support multi-shop for POS payment',
            '[Improvement] Remove duplicate translation',
            '[Improvement] Move hidden tabs to Point of sale pro',
        ),
        'v.2.1.0' => array(
            '[Bug] Do not show customer information when adding customer and refreshing',
            '[Bug] Do not show combination when searching for products in inactive categories',
            '[Bug] Do not show combination when searching for inactive products',
            '[Bug] Searching for products using bar-code does not work',
            '[Improvement] Support multiple shops in Preferences page',
        ),
        'v.2.0.0' => array(
            '[Feature] Add 2 custom hooks on top and bottom of POS page',
            '[Feature] Search product in inactive categories or product',
            '[Feature] Order discount works width voucher code, show list of discount',
            '[Improvement] Remove feature enable selling off-line products',
            '[Improvement] Search product in current shop',
        ),
        'v.1.12.0' => array(
            '[Bug] Fix error duplicate tab welcome page',
            'Support custom hook into block customer information',
            'Change default customer',
            'An option to decide what to show in auto complete product search',
        ),
        'v.1.11.8' => array(
            'Show carrier name and delivery time on different lines',
            'Displaying confirm when click button "Cancel order"',
            'Adding customer don\'t depend on multiple shop',
            'Add option send an email to customer after completing sale',
            'Custom image size when generating pos invoice',
            '[BUG]Broken layout of popup selling offline products',
        ),
        'v.1.11.6' => array(
            '[IMPROVEMENT] Do not show shipping on invoice / ticket if it is free already',
            '[IMPROVEMENT] When searching for products, if an item is out of stock, highlight it',
            '[IMPROVEMENT] An ability to put customer signature on invoice / ticket',
            '[IMPROVEMENT] Show product ID in auto-complete search',
            '[BUG] Order state is not applicable when collecting payment is off',
            '[BUG] Missing Order ID in invoice / ticket',
            '[BUG] Invoice is broken in A5 paper',
        ),
        'v.1.11.0' => array(
            '[FEATURE] Support bill printers',
            '[IMPROVEMENT] Work with product visibility',
            '[IMPROVEMENT] An ability to set a default carrier',
        ),
        'v.1.10.0' => array(
            '[FEATURE] Calculate change back amount',
            '[IMPROVEMENT] Search for customers using their address info',
        ),
        'v.1.9.1' => array(
            '[IMPROVEMENT] A lot of changes regarding tax calculation',
            '[IMPROVEMENT] An ability to manage payment methods',
        ),
        'v.1.9.0' => array(
            '[IMPROVEMENT] An ability to install POS for different shops in a multistore',
            '[IMPROVEMENT] Add a new customer with just his name',
        ),
        'v.1.8.0' => array(
            '[BUG] html tags are not escapted in invoices',
        ),
    );

    /**
     * construct.
     */
    public function __construct()
    {
        $this->bootstrap = true;
        parent::__construct();
        // update status go to page welcome when install or upgrade module
        Configuration::updateValue($this->module->getKeyWelcomePage(), 1);
    }

    /**
     * @see AdminControllerCore::initContent()
     */
    public function initContent()
    {
        parent::initContent();

        $this->context->smarty->assign(array(
            'module_name' => $this->module->name,
            'module_display_name' => $this->module->displayName,
            'module_version' => $this->module->version,
            'change_logs' => $this->change_logs,
            'link_to_addon_page' => PosConstants::LINK_TO_ADDON_PAGE,
            'is_prestashop_16' => $this->module->isPrestashop16(),
            'link_module_homepage' => $this->context->link->getAdminLink($this->module->pos_tabs['AdminHsPointOfSaleDashboard']['tab_class']),
        ));
    }

    /**
     * Set Media file include when controller called.
     */
    public function setMedia()
    {
        $this->module_media_css['welcome_page.css'] = 'all';
        parent::setMedia();
    }
}
