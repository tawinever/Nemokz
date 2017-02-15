<?php
/**
 * RockPOS - Point of Sale for PrestaShop
 *
 * @author    Hamsa Technologies
 * @copyright Hamsa Technologies
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

/**
 * 
 */
class PosOrder extends Order
{
    /**
     * @var int 
     */
    public $pos_id_employee;

    /**
     *
     * @var int
     */
    public $pos_id_pos_order = 0;

    /**
     *
     * @var string
     */
    public $pos_note = '';

    /**
     * @var int
     */
    public $pos_show_note;

    public function __construct($id = null, $id_lang = null, $merge_sibling_orders = false)
    {
        parent::__construct($id, $id_lang);
        $this->assignPosMetaData();
        if ($merge_sibling_orders) {
            $orders_collection = self::getByReference($this->reference);
            if (count($orders_collection) > 1) {
                $this->mergeSiblingOrders();
            }
        }
    }

    /**
     * Add meta data to the order managed by RockPOS
     * @todo Improve in term of data structure
     */
    protected function assignPosMetaData()
    {
        $pos_order = self::getPosOrderById($this->id);
        if (!empty($pos_order)) {
            foreach ($pos_order as $key => $value) {
                $key = 'pos_' . $key;
                $this->$key = $value;
            }
        }
    }

    /**
     * Get distinct payment methods of current order.
     *
     * @return array payment method
     *               array
     *               (
     *               [0] => string
     *               [1] => string
     *               .....
     *               )
     */
    public function getPaymentMethods()
    {
        $payments = $this->getOrderPayments();
        $payment_methods = array();
        $temp_payment = array();
        if (!empty($payments)) {
            foreach ($payments as $payment) {
                if (!in_array($payment->payment_method, $temp_payment)) {
                    $temp_payment[] = $payment->payment_method;
                    $payment_methods[] = $payment->payment_method;
                }
            }
        }

        return $payment_methods;
    }

    /**
     * Get id order invoice.
     *
     * @return int
     */
    public function getIdOrderInvoice()
    {
        $sql = 'SELECT `id_order_invoice`
                FROM `' . _DB_PREFIX_ . 'order_invoice`
                WHERE `id_order` =  ' . (int) $this->id . '
                AND `number` > 0';

        return Db::getInstance()->getvalue($sql);
    }

    /**
     * @see OrderInvoice::displayTaxBasesInProductTaxesBreakdown()
     *
     * @return boolean
     */
    public function displayTaxBasesInProductTaxesBreakdown()
    {
        return !$this->useOneAfterAnotherTaxComputationMethod();
    }

    /**
     * @param int $id_order
     *
     * @return array
     *               array
     *               (
     *               [id_pos_order] => int
     *               [id_employee] => int
     *               [note] => string
     *               [show_note] => boolean
     *               )
     */
    public static function getPosOrderById($id_order)
    {
        $sql = 'SELECT `id_pos_order`, `id_employee`, `note`, `show_note`
                FROM `' . _DB_PREFIX_ . 'pos_orders`
                WHERE `id_pos_order` =  ' . (int) $id_order;

        return Db::getInstance(_PS_USE_SQL_SLAVE_)->getRow($sql);
    }

    /**
     * @see parent::getByReference()
     * Override:
     * - Return a PrestaShopCollection of PosOrder, instead of Order
     */
    public static function getByReference($reference)
    {
        $orders = new PrestaShopCollection('PosOrder');
        $orders->where('reference', '=', $reference);
        return $orders;
    }

    protected function mergeSiblingOrders()
    {
        $fields = array_keys($this->def['fields']);
        $total_fields = array();
        foreach ($fields as $field) {
            if (strpos($field, 'total_') === 0) {
                // Let's sum all "total_xxx" fields from these orders
                $total_fields[] = $field;
            }
        }
        $query = new DbQuery();
        $query->from('orders', 'o');
        $query->where('o.`reference` = "' . pSQL($this->reference) . '"');
        $query->groupBy('reference');
        foreach ($total_fields as $total_field) {
            $query->select('SUM(`' . $total_field . '`) AS `' . $total_field . '`');
        }
        $totals = Db::getInstance()->getRow($query);
        if ($totals) {
            $this->hydrate($totals, $this->id_lang);
        }
    }

    /**
     * @see parent::getInvoicesCollection()
     * Override:<br/>
     * - Return PrestaShopCollection of PosOrderInvoice (instead of OrderInvoice)
     */
    public function getInvoicesCollection()
    {
        $order_invoices = new PrestaShopCollection('PosOrderInvoice');
        $order_invoices->where('id_order', '=', $this->id);
        return $order_invoices;
    }

    /**
     * @param string $order_reference
     * @return array
     * <pre/>
     * Array(
     *  [0] => PosOrderInvoice,
     *  [1] => PosOrderInvoice
     * )
     */
    public static function getInvoicesCollectionByReference($order_reference)
    {
        $order_invoices = Db::getInstance()->executeS('
            SELECT oi.*
            FROM `' . _DB_PREFIX_ . 'order_invoice` oi
            LEFT JOIN `' . _DB_PREFIX_ . 'orders` o ON (o.`id_order` = oi.`id_order`)
            WHERE o.`reference` = \'' . pSQL($order_reference) . '\'
            AND oi.`number` > 0
            ORDER BY oi.`date_add` ASC');
        return self::hydrateCollection('PosOrderInvoice', $order_invoices);
    }

    /**
     * @param string $order_reference
     * @return float
     */
    public static function getAmountDueByReference($order_reference)
    {
        $sql = new DbQuery();
        $sql->select('SUM((o.`total_paid_tax_incl` - o.`total_paid_real`)) AS `amount_due`');
        $sql->from('orders', 'o');
        $sql->where('o.`reference` = "' . pSQL($order_reference) . '"');
        $sql->groupBy('reference');
        return (float) Db::getInstance()->getValue($sql);
    }

    /**
     * Sync all old POS Orders to new pos_orders table
     * @deprecated since version 2.4.1 posorders change to pos_orders
     * @param string $module_name
     * @return boolean
     */
    public static function syncOldPosOrders($module_name)
    {
        $sql = 'INSERT INTO `' . _DB_PREFIX_ . 'posorders` (`id_pos_order`, `id_employee`)
                SELECT oh.`id_order`, oh.`id_employee`
                FROM (SELECT `id_order`, `id_employee`  
                    FROM `' . _DB_PREFIX_ . 'order_history` 
                    ORDER BY `date_add`) oh 
                INNER JOIN `' . _DB_PREFIX_ . 'orders` o ON o.`id_order` = oh.`id_order`
                WHERE o.`module` = "' . pSQL($module_name) . '"
                    AND o.`id_order` NOT IN (SELECT `id_pos_order` FROM `' . _DB_PREFIX_ . 'posorders`)
                GROUP BY oh.`id_order`';
        return Db::getInstance()->execute($sql);
    }

    /**
     * @param string $order_reference
     * @return array
     * <pre>
     * Array ( 
     *   [0] => Array ( 
     *       [id_order_detail] => int
     *       [id_order] => int
     *       [id_order_invoice] => int 
     *       [id_warehouse] => int
     *       [id_shop] => int
     *       [product_id] => int 
     *       [product_attribute_id] => int
     *       [product_name] => string
     *       [product_quantity] => int
     *       [product_quantity_in_stock] => int
     *       [product_quantity_refunded] => int
     *       [product_quantity_return] => int
     *       [product_quantity_reinjected] => int 
     *       [product_price] => float
     *       [reduction_percent] => float
     *       [reduction_amount] => float
     *       [reduction_amount_tax_incl] => float
     *       [reduction_amount_tax_excl] => float
     *       [group_reduction] =>float
     *       [product_quantity_discount] => float
     *       [product_ean13] => string
     *       [product_upc] => string
     *       [product_reference] => string
     *       [product_supplier_reference] => string
     *       [product_weight] => float
     *       [id_tax_rules_group] => int
     *       [tax_computation_method] => int 
     *       [tax_name] => string
     *       [tax_rate] => float 
     *       [ecotax] => float 
     *       [ecotax_tax_rate] => float
     *       [discount_quantity_applied] => int
     *       [download_hash] => [download_nb] => int
     *       [download_deadline] => date time
     *       [total_price_tax_incl] => float
     *       [total_price_tax_excl] => float 
     *       [unit_price_tax_incl] => float
     *       [unit_price_tax_excl] => float
     *       [total_shipping_price_tax_incl] => float
     *       [total_shipping_price_tax_excl] => float
     *       [purchase_supplier_price] => float
     *       [original_product_price] => float
     *       [original_wholesale_price] => float
     *       [reference] => string 
     *       [id_shop_group] => int
     *       [id_carrier] => int
     *       [id_lang] => int
     *       [id_customer] => int 
     *       [id_cart] => int 
     *       [id_currency] => int 
     *       [id_address_delivery] => int 
     *       [id_address_invoice] => int 
     *       [current_state] => int 
     *       [secure_key] => string 
     *       [payment] => string 
     *       [conversion_rate] => float
     *       [module] => string 
     *       [recyclable] => int
     *       [gift] => int
     *       [gift_message] => string 
     *       [mobile_theme] => int 
     *       [shipping_number] => int
     *       [total_discounts] => float
     *       [total_discounts_tax_incl] => float
     *       [total_discounts_tax_excl] => float
     *       [total_paid] => float
     *       [total_paid_tax_incl] => float
     *       [total_paid_tax_excl] => float
     *       [total_paid_real] => float
     *       [total_products] => float
     *       [total_products_wt] => float
     *       [total_shipping] => float 
     *       [total_shipping_tax_incl] => float
     *       [total_shipping_tax_excl] => float
     *       [carrier_tax_rate] => float
     *       [total_wrapping] => float
     *       [total_wrapping_tax_incl] => float 
     *       [total_wrapping_tax_excl] => float 
     *       [round_mode] => int 
     *       [round_type] => int
     *       [invoice_number] => int
     *       [delivery_number] => int 
     *       [invoice_date] => date time
     *       [delivery_date] => date time
     *       [valid] => bolean
     *       [date_add] => date time
     *       [date_upd] => date time
     *       [id_product] => int
     *       [id_supplier] => int
     *       [id_manufacturer] => int 
     *       [id_category_default] => int 
     *       [id_shop_default] => int
     *       [on_sale] => int
     *       [online_only] => int
     *       [ean13] => string
     *       [upc] => string
     *       [quantity] => int 
     *       [minimal_quantity] => int 
     *       [price] => float 
     *       [wholesale_price] =>float 
     *       [unity] => string
     *       [unit_price_ratio] => float
     *       [additional_shipping_cost] => float
     *       [supplier_reference] => string 
     *       [location] => string
     *       [width] => float
     *       [height] => float
     *       [depth] => float 
     *       [weight] => float
     *       [out_of_stock] => int 
     *       [quantity_discount] => int 
     *       [customizable] => int
     *       [uploadable_files] => int 
     *       [text_fields] => int
     *       [active] => bolean
     *       [redirect_type] => int 
     *       [id_product_redirected] => int 
     *       [available_for_order] => int
     *       [available_date] => date time
     *       [condition] => string
     *       [show_price] => bolean
     *       [indexed] => int
     *       [visibility] => string
     *       [cache_is_pack] => int 
     *       [cache_has_attachments] => int 
     *       [is_virtual] => int 
     *       [cache_default_attribute] => int
     *       [advanced_stock_management] => int 
     *       [pack_stock_type] => int ) 
     * [1] => Array()
     */
    public static function getProductsByReference($order_reference)
    {
        $collection_orders = self::getByReference($order_reference);
        $products = array();
        if (count($collection_orders) >= 1) {
            foreach ($collection_orders as $order) {
                $products = array_merge($products, $order->getProducts());
            }
        }
        return $products;
    }

    /**
     * @param string $module_name
     * @return array
     * <pre>
     * Array ( 
     *  [0] => string 
     *  [1] => string
     *  [2] => string
     * )
     */
    public static function getCompletedOrderReferences($module_name = null)
    {
        $sql = new DbQuery();
        $sql->select('reference');
        $sql->from('orders', 'o');
        if ($module_name) {
            $sql->where('o.`module` = "' . pSQL($module_name) . '"');
        }
        $sql->groupBy('o.`reference`');
        $sql->having('SUM(o.`total_paid`) = SUM(o.`total_paid_real`)');
        $references = Db::getInstance()->executeS($sql);
        $completed_order_references = array();
        if (!empty($references)) {
            foreach ($references as $reference) {
                $completed_order_references[] = $reference['reference'];
            }
        }
        return $completed_order_references;
    }

    /**
     * @return int
     */
    public static function getFirstOrderId()
    {
        $sql = new DbQuery();
        $sql->select('id_order');
        $sql->from('orders');
        return Db::getInstance()->getValue($sql);
    }

    /**
     * Check if free shipping is applied to this order or not
     *
     * @return boolean
     */
    public function isFreeShipping()
    {
        $cart_rules = $this->getCartRules();
        $free_shipping = false;
        if (count($cart_rules)) {
            foreach ($cart_rules as $cart_rule) {
                if ((int) $cart_rule['id_cart_rule'] === (int) PosConfiguration::get('POS_ID_CART_RULE')) {
                    $free_shipping = true;
                    break;
                }
            }
        }

        return $free_shipping;
    }

    /**
     * Check if there is any disccount applied to this order or not
     * 
     * @return boolean
     */
    public function isDiscount()
    {
        $cache_id = __CLASS__ . __FUNCTION__ . $this->id;
        if (!Cache::isStored($cache_id)) {
            $is_discount = false;
            $products = $this->getProductsDetail();
            foreach ($products as $product) {
                if ($product['reduction_amount'] > 0 || $product['reduction_percent'] > 0) {
                    $is_discount = true;
                    break;
                }
            }
            Cache::store($cache_id, $is_discount);
        }

        return Cache::retrieve($cache_id);
    }

    /**
     * @see parent::getProducts()
     * Overrides:<br/>
     * - Add extra info for each product<br/>
     *      + name<br/>
     *      + combination<br/>
     */
    public function getProducts($products = false, $selected_products = false, $selected_qty = false)
    {
        if (!$products) {
            $products = parent::getProducts($products, $selected_products, $selected_qty);
        }
        foreach ($products as &$product) {
            // Most likely, both "product.id_product" and "order_detail.product_id" are returned from self::getProducts()
            // But sometimes, people make customization and might get rid of "product.id_product".
            // This fix is to make sure, we always can be able to get product id
            $id_product = isset($product['id_product']) ? $product['id_product'] : $product['product_id'];
            $product['name'] = $this->getProductName($product);
            $product['combination'] = $this->getProductCombination($product);
            $product['product_price_tax_excl'] = $product['product_price']; // @see OrderDetail::setDetailProductPrice()
            $product['product_price_tax_incl'] = PosProduct::getPriceStatic($id_product, true, $product['product_attribute_id'], 2, null, false, false, 1, false, null, $this->id_cart);
            $product['price_without_specific_price'] = $product['product_price_tax_incl']; //@todo To remove this
        }
        return $products;
    }

    /**
     * Get product name only, without combination
     * @param array $order_detail an element of parent::getProducts()
     * @return string
     */
    protected function getProductName(array $order_detail)
    {
        $product_name = explode('-', $order_detail['product_name']);
        $combination = array_pop($product_name);
        if (strpos($combination, ':') !== false) {
            // product name contains combinations
            $product_name = implode('-', $product_name);
        } else {
            $product_name = $order_detail['product_name'];
        }
        return $product_name;
    }

    /**
     * @param array $order_detail an element of parent::getProducts()
     * @return string
     */
    protected function getProductCombination(array $order_detail)
    {
        $product_name = explode('-', $order_detail['product_name']);
        $combination = array_pop($product_name);
        if (strpos($combination, ':') !== false) {
            $combination = $combination;
        } else {
            $combination = '';
        }
        return $combination;
    }
    
    /**
     * Override function getCartRules of order: Get more gift_product, gift_product_attribute, name
     * @return array
     * array
     * ( <pre>
     *     [0] => array
     *         (
     *             [gift_product] => int
     *             [gift_product_attribute] => int
     *             [id_lang] => int
     *             [name] => string
     *             [id_order_cart_rule] => int
     *             [id_order] => int
     *             [id_cart_rule] => int
     *             [id_order_invoice] => int
     *             [value] => float
     *             [value_tax_excl] => float
     *             [free_shipping] => int
     *         )
     * 		...
     * 
     * )</pre>
     */
    public function getCartRules()
    {
        if (!CartRule::isFeatureActive() || !$this->id) {
            return array();
        }
        $cache_key = __CLASS__ . __FUNCTION__ . $this->id;
        if (!Cache::isStored($cache_key)) {
            $sql = new DbQuery();
            $sql->select('cr.`gift_product`, cr.`gift_product_attribute`, ocr.*');
            $sql->from('order_cart_rule', 'ocr');
            $sql->leftJoin('cart_rule', 'cr', 'ocr.`id_cart_rule` = cr.`id_cart_rule`');
            $sql->leftJoin('orders', 'o', 'o.`id_order` = ocr.`id_order`');
            $sql->where('o.`reference` = "' . pSQL($this->reference) . '"');
            $sql->orderBy('cr.`priority` ASC');
            $result = Db::getInstance()->executeS($sql);
            Cache::store($cache_key, $result);
        } else {
            $result = Cache::retrieve($cache_key);
        }
        return $result;
    }
    
    /**
     * @param array $products
     * @return array
     * array(<pre>
     *  'products' => array(),@see PosOrder::getProductsByReference
     *  'gift_products' => array(),@see PosOrder::getProductsByReference
     *  'gift_total_order_tax_excl' => float,
     *  'gift_total_order_tax_incl' => float,
     * )</pre>
     */
    public function formatProducts(array $products)
    {
        $gift_products = array();
        $gift_total_order_tax_excl = 0;
        $gift_total_order_tax_incl = 0;
        $cart_rules = $this->getCartRules();
        if (!empty($cart_rules)) {
            foreach ($cart_rules as $cart_rule) {
                if ($cart_rule['gift_product']) {
                    foreach ($products as $key => &$product) {
                        if (empty($product['gift']) && $cart_rule['gift_product'] == $product['product_id'] && $cart_rule['gift_product_attribute'] == $product['product_attribute_id']) {
                            $gift_total_order_tax_excl += $product['unit_price_tax_excl'];
                            $gift_total_order_tax_incl += $product['unit_price_tax_incl'];
                            $product['total_price_tax_incl'] = $product['total_price_tax_incl'] - $product['unit_price_tax_incl'];
                            $product['total_price_tax_excl'] = $product['total_price_tax_excl'] - $product['unit_price_tax_excl'];
                            $product['product_quantity']--;
                            if (!$product['product_quantity']) {
                                unset($products[$key]);
                            }
                            $gift_product = $product;
                            $gift_product['product_quantity'] = 1;
                            $gift_product['gift'] = true;
                            $gift_products[] = $gift_product;
                            break;
                        }
                    }
                }
            }
        }
        return array(
                'products' => $products,
                'gift_products' => $gift_products,
                'gift_total_order_tax_excl' => $gift_total_order_tax_excl,
                'gift_total_order_tax_incl' => $gift_total_order_tax_incl,
                );
    }
}
