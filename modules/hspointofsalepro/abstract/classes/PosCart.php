<?php
/**
 * RockPOS - Point of Sale for PrestaShop
 *
 * @author    Hamsa Technologies
 * @copyright Hamsa Technologies
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

/**
 * Custom Cart for Point of Sale
 * - assignCustomer: assign customer to object cart and object cookie at back end
 */
class PosCart extends Cart
{
    /**
     * Cache payments.
     *
     * @var array
     */
    protected static $cache_payments = array();
    
    /**
     *
     * @var array @see self::getFullProducts()
     */
    protected $_full_products = array();
    
    /**
     *
     * @param int $id_customer
     *
     * @return boolean
     */
    public function assignCustomer($id_customer)
    {
        $flag = false;
        $customer = new PosCustomer((int) $id_customer);

        if (Validate::isLoadedObject($customer)) {
            $this->id_customer = $id_customer;

            if ((int) PosCustomer::getAddressesTotalById($id_customer) === 0) {
                PosAddress::createDummyAddress($customer);
            }

            $this->id_address_delivery = Address::getFirstCustomerAddressId((int) $customer->id);
            $this->id_address_invoice = Address::getFirstCustomerAddressId((int) $customer->id);

            $this->id_customer = (int) $customer->id;
            $this->secure_key = $customer->secure_key;
            $flag = $this->save();
            $this->autosetProductAddress();
        }
        return $flag;
    }

    /**
     * Insert a new payment of current cart.
     *
     * @param int    $id_pos_payment id of pos_payment
     * @param float  $amount        amount of payment
     * @param string $reference     reference of payment
     * @param text   $message       message of payment
     * @param float  $given_money
     * @param float  $change
     *
     * @return boolean
     */
    public function addPayment($id_pos_payment, $amount, $reference, $message = null, $given_money = 0, $change = 0)
    {
        $flag = false;
        if (Db::getInstance()->insert('pos_cart_payment', array(
                    'id_cart' => (int) $this->id,
                    'id_pos_payment' => (int) $id_pos_payment,
                    'amount' => (float) $amount,
                    'given_money' => (float) $given_money,
                    'change' => (float) $change,
                    'reference' => pSQL($reference),
                    'message' => !empty($message) ? pSQL($message) : null,
                ))) {
            $flag = true;
            $this->resetPayments();
        }

        return $flag;
    }

    /**
     * Delete an amount from cart.
     *
     * @param int $id_pos_cart_payment id of cart pos_payment
     *
     * @return boolean
     */
    public function removePayment($id_pos_cart_payment)
    {
        $flag = false;
        if (Db::getInstance()->delete('pos_cart_payment', 'id_pos_cart_payment = '.(int) $id_pos_cart_payment)) {
            $flag = true;
            $this->resetPayments();
        }

        return $flag;
    }

    /**
     * Get all paid amount for cart.
     *
     * @return float
     */
    public function getPaidAmount()
    {
        $paid_amounts = $this->getPayments();
        $amount = 0;
        if (!empty($paid_amounts)) {
            foreach ($paid_amounts as $paid_amount) {
                $amount += (float) $paid_amount['amount'];
            }
        }

        return $amount;
    }

    /**
     * Get pendding amount to be paid.
     *
     * @param int $decimal decimal number
     *
     * @return float
     */
    public function getAmountDue($decimal)
    {
        $order_total = $this->getOrderTotal();
        $paid_amount = $this->getPaidAmount();
        return Tools::ps_round($order_total - $paid_amount, $decimal);
    }

    /**
     * Get paid payments of current cart.
     *
     * @param int $id_lang id of lang
     *
     * @return array
     *               <pre>
     *               array (
     *               <pre>
     *               [0] => Array (
     *               [id_pos_cart_payment] => 2
     *               [id_pos_payment] => 2
     *               [amount] => 300.00
     *               [message] =>
     *               [reference] => 1
     *               [payment_name] => Check
     *               )
     *               [1] => array()
     *               .........
     *               )
     */
    public function getPayments($id_lang = null)
    {
        if (empty($id_lang)) {
            $id_lang = Context::getContext()->language->id;
        }
        $sql = '
                SELECT
                   cp.`id_pos_cart_payment`,
                   cp.`id_pos_payment`,
                   cp.`amount`,
                   cp.`given_money`,
                   cp.`change`,
                   cp.`message`,
                   cp.`reference`,
                   pl.`payment_name`
                FROM
                   `'._DB_PREFIX_.'pos_cart_payment` cp
                LEFT JOIN
                   `'._DB_PREFIX_.'pos_payment_lang` pl
                   ON
                       pl.`id_pos_payment` = cp.`id_pos_payment`
                   AND
                       pl.`id_lang` = '.(int) $id_lang.'
                WHERE
                   cp.`id_cart` = '.(int) $this->id;

        if (empty(self::$cache_payments[$this->id][$id_lang])) {
            self::$cache_payments[$this->id][$id_lang] = Db::getInstance()->ExecuteS($sql, true);
        }

        return self::$cache_payments[$this->id][$id_lang];
    }
    
    /**
     * @return float
     */
    public function getTotalChangeBack()
    {
        $total_change_back = 0;
        $paid_payments = $this->getPayments();
        if (!empty($paid_payments)) {
            foreach ($paid_payments as $paid_payment) {
                $total_change_back += $paid_payment['change'];
            }
        }
        return $total_change_back;
    }
    
    /**
     * combine all payments to string.
     *
     * @return string
     */
    public function getPaymentMethods()
    {
        $payemnts = $this->getPayments();
        $payment_methods = array();
        $temp_payment = array();
        if (!empty($payemnts)) {
            foreach ($payemnts as $payment) {
                if (!in_array($payment['id_pos_payment'], $temp_payment)) {
                    $temp_payment[] = $payment['id_pos_payment'];
                    $payment_methods[] = $payment['payment_name'];
                }
            }
        }

        return implode('_', $payment_methods);
    }

    /**
     * reset cache payment.
     */
    protected function resetPayments()
    {
        self::$cache_payments = null;
    }

    /**
     * Update current cart.
     *
     * @return boolean
     */
    public function update($null_values = false)
    {
        $this->resetPayments();

        return parent::update($null_values);
    }

    /**
     * fix remove customer prestashop vs 1.5.3.0 + 1.5.3.1 + 1.5.4.0 + 1.5.4.1
     * wrong $this->context->cart->id_address_invoice = $id_address_new; line 208
     * Update the address id of the cart     *.
     *
     * @param int $id_address     Current address id to change
     * @param int $id_address_new New address id
     */
    public function updateAddressId($id_address, $id_address_new)
    {
        $to_update = false;
        if (!isset($this->id_address_invoice) || (int) $this->id_address_invoice == (int) $id_address) {
            $to_update = true;
            $this->id_address_invoice = $id_address_new;
        }
        if (!isset($this->id_address_delivery) || (int) $this->id_address_delivery == (int) $id_address) {
            $to_update = true;
            $this->id_address_delivery = (int) $id_address_new;
        }
        if ($to_update) {
            $this->update();
        }

        $sql = 'UPDATE `'._DB_PREFIX_.'cart_product`
		SET `id_address_delivery` = '.(int) $id_address_new.'
		WHERE  `id_cart` = '.(int) $this->id.'
			AND `id_address_delivery` = '.(int) $id_address;
        Db::getInstance()->execute($sql);

        $sql = 'UPDATE `'._DB_PREFIX_.'customization`
			SET `id_address_delivery` = '.(int) $id_address_new.'
			WHERE  `id_cart` = '.(int) $this->id.'
				AND `id_address_delivery` = '.(int) $id_address;
        Db::getInstance()->execute($sql);
    }

    /**
     * Delete all payments by id cart.
     *
     * @return boolean
     */
    public function resetAllPaymentsByIdCart()
    {
        $sql = 'DELETE `'._DB_PREFIX_.'pos_cart_payment` FROM `'._DB_PREFIX_.'pos_cart_payment` WHERE `id_cart` ='.(int) $this->id;

        return Db::getInstance()->execute($sql);
    }

    /**
     * Add required shop
     * Update product quantity.
     *
     * @param int    $quantity
     * @param int    $id_product
     * @param Shop   $shop
     * @param int    $id_product_attribute
     * @param string $operator
     * @param int    $id_customization
     * @param int    $id_address_delivery
     * @param boolean   $auto_add_cart_rule
     *
     * @return boolean
     */
    public function updateQtyPos($quantity, $id_product, Shop $shop, $id_product_attribute = null, $operator = 'up', $id_customization = false, $id_address_delivery = 0, $auto_add_cart_rule = true)
    {
        if (!Validate::isLoadedObject($shop)) {
            return false;
        }

        if (Context::getContext()->customer->id) {
            if ($id_address_delivery == 0 && (int) $this->id_address_delivery) { // The $id_address_delivery is null, use the cart delivery address
                $id_address_delivery = (int) $this->id_address_delivery;
            } elseif ($id_address_delivery == 0) { // The $id_address_delivery is null, get the default customer address
                $id_address_delivery = (int) Address::getFirstCustomerAddressId((int) Context::getContext()->customer->id);
            } elseif (!Customer::customerHasAddress(Context::getContext()->customer->id, $id_address_delivery)) {
                // The $id_address_delivery must be linked with customer
                $id_address_delivery = 0;
            }
        }

        $quantity = (int) $quantity;
        $id_product = (int) $id_product;
        $id_product_attribute = (int) $id_product_attribute;
        $product = new PosProduct($id_product, false, Configuration::get('PS_LANG_DEFAULT'), $shop->id);

        if ($id_product_attribute) {
            $combination = new Combination((int) $id_product_attribute);
            if ($combination->id_product != $id_product) {
                return false;
            }
        }

        if (!Validate::isLoadedObject($product)) {
            die(Tools::displayError());
        }

        if (isset(self::$_nbProducts[(int) $this->id])) {
            unset(self::$_nbProducts[(int) $this->id]);
        }

        if (isset(self::$_totalWeight[(int) $this->id])) {
            unset(self::$_totalWeight[(int) $this->id]);
        }

        if ((int) $quantity <= 0) {
            return ($this->deleteProduct($id_product, $id_product_attribute, (int) $id_customization) && PosSpecificPrice::deleteByIdCart((int) $this->id, $id_product, $id_product_attribute));
        } else {
            $minimal_quantity = $product->getMinimalQuantity($id_product_attribute);
            /* Check if the product is already in the cart */
            $result = $this->containsProduct($id_product, $id_product_attribute, (int) $id_customization, (int) $id_address_delivery);

            /* Update quantity if product already exist */
            if ($result) {
                if ($operator == 'up') {
                    $sql = 'SELECT stock.out_of_stock, IFNULL(stock.quantity, 0) as quantity
							FROM '._DB_PREFIX_.'product p
							'.Product::sqlStock('p', (int) $id_product_attribute, true, $shop).'
							WHERE p.id_product = '.(int) $id_product;

                    $result2 = Db::getInstance()->getRow($sql);
                    $product_qty = (int) $result2['quantity'];
                    // Quantity for product pack
                    if (Pack::isPack((int) $id_product)) {
                        $product_qty = Pack::getQuantity((int) $id_product, (int) $id_product_attribute);
                    }
                    $new_qty = (int) $result['quantity'] + (int) $quantity;
                    $qty = '+ '.(int) $quantity;
                    
                    if (!PosProduct::isEnabledOrderOutOfStock((int) $result2['out_of_stock'])) {
                        if ($new_qty > $product_qty) {
                            return false;
                        }
                    }
                } elseif ($operator == 'down') {
                    $qty = '- '.(int) $quantity;
                    $new_qty = (int) $result['quantity'] - (int) $quantity;
                    if ($new_qty < $minimal_quantity && $minimal_quantity > 1) {
                        return -1;
                    }
                } else {
                    return false;
                }

                /* Delete product from cart */
                if ($new_qty <= 0) {
                    return ($this->deleteProduct((int) $id_product, (int) $id_product_attribute, (int) $id_customization) && PosSpecificPrice::deleteByIdCart((int) $this->id, (int) $id_product, (int) $id_product_attribute));
                } elseif ($new_qty < $minimal_quantity) {
                    return -1;
                } else {
                    $sql = 'UPDATE `'._DB_PREFIX_.'cart_product`
                        SET `quantity` = `quantity` '.$qty.'
                        WHERE `id_product` = '.(int) $id_product.
                            (!empty($id_product_attribute) ? ' AND `id_product_attribute` = '.(int) $id_product_attribute : '').'
                        AND `id_cart` = '.(int) $this->id.(Configuration::get('PS_ALLOW_MULTISHIPPING') && $this->isMultiAddressDelivery() ? ' AND `id_address_delivery` = '.(int) $id_address_delivery : '').' LIMIT 1';
                    Db::getInstance()->execute($sql);
                }
            } elseif ($operator == 'up') {
                /* Add product to the cart */
                $sql = 'SELECT stock.out_of_stock, IFNULL(stock.quantity, 0) as quantity
                        FROM '._DB_PREFIX_.'product p
                        '.Product::sqlStock('p', (int) $id_product_attribute, true, $shop).'
                        WHERE p.id_product = '.(int) $id_product;

                $result2 = Db::getInstance()->getRow($sql);

                // Quantity for product pack
                if (Pack::isPack((int) $id_product)) {
                    $result2['quantity'] = Pack::getQuantity((int) $id_product, (int) $id_product_attribute);
                }
                
                if (!PosProduct::isEnabledOrderOutOfStock((int) $result2['out_of_stock'])) {
                    if ((int)$quantity > $result2['quantity']) {
                        return false;
                    }
                }

                if ((int) $quantity < $minimal_quantity) {
                    return -1;
                }

                $result_add = Db::getInstance()->insert('cart_product', array(
                    'id_product' => (int) $id_product,
                    'id_product_attribute' => (int) $id_product_attribute,
                    'id_cart' => (int) $this->id,
                    'id_address_delivery' => (int) $id_address_delivery,
                    'id_shop' => (int) $shop->id,
                    'quantity' => (int) $quantity,
                    'date_add' => date('Y-m-d H:i:s'),
                ));

                if (!$result_add) {
                    return false;
                }
            }
        }

        // refresh cache of self::_products
        $this->_products = $this->getProducts(true);
        $this->update();
        $context = Context::getContext()->cloneContext();
        $context->cart = $this;
        Cache::clean('getContextualValue_*');
        if ($auto_add_cart_rule) {
            CartRule::autoAddToCart($context);
        }

        if ($product->customizable) {
            return $this->_updateCustomizationQuantity((int) $quantity, (int) $id_customization, (int) $id_product, (int) $id_product_attribute, (int) $id_address_delivery, $operator);
        } else {
            return true;
        }
    }

    /**
     * Get minimal quantity to be added to basked, based on current context.
     *
     * @param int $id_product
     * @param int $id_product_attribute
     *
     * @return int
     */
    public function getMinimalQuantityToBeAdded($id_product, $id_product_attribute)
    {
        if ($this->containsProduct($id_product, $id_product_attribute)) {
            $minimal_quantity = 1;// if an item already exists, it already passes the minimal quantity, now, just +1
        } else {
            $product = new PosProduct($id_product);
            $minimal_quantity = $product->getMinimalQuantity($id_product_attribute);
        }

        return $minimal_quantity;
    }

    /**
     * Override remove considion check id_shop "AND `id_shop` = '.(int)$this->id_shop"
     * Set an address to all products on the cart without address delivery.
     */
    public function autosetProductAddress()
    {
        $id_address_delivery = 0;
        // Get the main address of the customer
        if ((int) $this->id_address_delivery > 0) {
            $id_address_delivery = (int) $this->id_address_delivery;
        } else {
            $id_address_delivery = (int) Address::getFirstCustomerAddressId(Context::getContext()->customer->id);
        }

        if (!$id_address_delivery) {
            return;
        }

        // Update
        $sql = 'UPDATE `'._DB_PREFIX_.'cart_product`
			SET `id_address_delivery` = '.(int) $id_address_delivery.'
			WHERE `id_cart` = '.(int) $this->id.'
			';
        Db::getInstance()->execute($sql);

        $sql = 'UPDATE `'._DB_PREFIX_.'customization`
			SET `id_address_delivery` = '.(int) $id_address_delivery.'
			WHERE `id_cart` = '.(int) $this->id.'
			';
        Db::getInstance()->execute($sql);
    }

    /**
     * Override order product.
     *
     * @param boolean $refresh
     * @param int  $id_product
     * @param int  $id_country
     * @result array Products
     * </pre>
     * array (
     *  array (
     *   id_product_attribute => int,
     *   id_product => int,
     *   cart_quantity => int,
     *   id_shop => int,
     *   name => string,
     *   is_virtual => boolean,
     *   ecotax => float,
     *   additional_shipping_cost => float,
     *   available_for_order => boolean,
     *   price => float,
     *   price_with_reduction => float,
     *   price_without_reduction => float,
     *   price_with_reduction_without_tax => float,
     *   active => boolean,
     *   width => float,
     *   height => float,
     *   depth => float,
     *   weight => float,
     *   quantity => int,
     *   link_rewrite => string,
     *   unique_id => string,
     *   id_address_delivery => int,
     *   wholesale_price => float,
     *   advanced_stock_management => boolean,
     *   reduction_type => string,
     *   reduction => float,
     *   price_attribute => float, // optional
     *   ecotax_attr => float, // optional
     *   reference => string,
     *   weight_attribute => float,
     *   pai_id_image => int, // optional
     *   minimal_quantity => int,
     *   price_wt => float,
     *   total_wt => float,
     *   total => float,
     *   id_image => string,
     *   features => array (
     *      array (
     *          id_feature => int,
     *          id_product => int,
     *          id_feature_value => int
     *      ),
     *      ...
     *   ),
     *   attributes => string,
     *   attributes_small => string,
     *   rate => int,
     *   tax_name => string
     * ),
     * ...
     */
    public function getProducts($refresh = false, $id_product = false, $id_country = null)
    {
        if (!$this->id) {
            return array();
        }
        // Product cache must be strictly compared to NULL, or else an empty cart will add dozens of queries
        if ($this->_products !== null && !$refresh) {
            // Return product row with specified ID if it exists
            if (is_int($id_product)) {
                foreach ($this->_products as $product) {
                    if ($product['id_product'] == $id_product) {
                        return array($product);
                    }
                }

                return array();
            }

            return $this->_products;
        }

        $sql = new DbQuery();

        $sql->select('cp.`id_product_attribute`');
        $sql->select('cp.`id_product`');
        $sql->select('cp.`quantity` AS `cart_quantity`');
        $sql->select('cp.`id_shop`');
        $sql->select('cp.`id_address_delivery`');
        
        $sql->select('p.`is_virtual`');
        $sql->select('p.`width`');
        $sql->select('p.`height`');
        $sql->select('p.`depth`');
        $sql->select('p.`weight`');
        
        $sql->select('pl.`name`');
        $sql->select('pl.`link_rewrite`');
        
        $sql->select('product_shop.`ecotax`');
        $sql->select('product_shop.`additional_shipping_cost`');
        $sql->select('product_shop.`available_for_order`');
        $sql->select('product_shop.`price`');
        $sql->select('product_shop.`active`');
        $sql->select('product_shop.`advanced_stock_management`');
        $sql->select('product_shop.`wholesale_price`');
        
        $sql->select('CONCAT(LPAD(cp.`id_product`, 10, 0), LPAD(IFNULL(cp.`id_product_attribute`, 0), 10, 0), IFNULL(cp.`id_address_delivery`, 0)) AS `unique_id`');
        $sql->from('cart_product', 'cp');
        $sql->leftJoin('product', 'p', 'p.`id_product` = cp.`id_product`');

        if (Combination::isFeatureActive()) {
            $sql->select('product_attribute_shop.`price` AS `price_attribute`');
            $sql->select('product_attribute_shop.`ecotax` AS `ecotax_attr`');
            $sql->select('(p.`weight`+ pa.`weight`) `weight_attribute`');
            $sql->select('pai.`id_image` AS `pai_id_image`');
            $sql->select('IFNULL(product_attribute_shop.`minimal_quantity`, product_shop.`minimal_quantity`) as `minimal_quantity`');
        
            $sql->leftJoin('product_attribute', 'pa', 'pa.`id_product_attribute` = cp.`id_product_attribute`');
            $sql->leftJoin('product_attribute_shop', 'product_attribute_shop', '(product_attribute_shop.`id_shop` = cp.`id_shop` AND product_attribute_shop.`id_product_attribute` = pa.`id_product_attribute`)');
            $sql->leftJoin('product_attribute_image', 'pai', 'pai.`id_product_attribute` = pa.`id_product_attribute`');
        } else {
            $sql->select('product_shop.`minimal_quantity` AS `minimal_quantity`');
            $sql->select('NULL AS `weight_attribute`');
        }
        
        $sql->innerJoin('product_shop', 'product_shop', '(product_shop.`id_shop` = cp.`id_shop` AND product_shop.`id_product` = p.`id_product`)');
        $sql->leftJoin('product_lang', 'pl', 'p.`id_product` = pl.`id_product` AND pl.`id_lang` = ' . (int) $this->id_lang . Shop::addSqlRestrictionOnLang('pl', 'cp.`id_shop`'));

        $sql->where('cp.`id_cart` = ' . (int) $this->id);
        if ($id_product) {
            $sql->where('cp.`id_product` = ' . (int) $id_product);
        }
        $sql->where('p.`id_product` IS NOT NULL');
        $sql->groupBy('`unique_id`');
        $sql->orderBy('cp.`date_add` DESC');
        $result = Db::getInstance()->executeS($sql);
     
        $id_group = Customer::getDefaultGroupId($this->id_customer);
        if (is_null($id_country)) {
            $id_country = Context::getContext()->country->id;
        }
        $products_ids = array();
        $pa_ids = array();
        if ($result) {
            foreach ($result as $key => $row) {
                $products_ids[] = $row['id_product'];
                $pa_ids[] = $row['id_product_attribute'];
                $specific_price = PosSpecificPrice::getSpecificPrice($row['id_product'], $this->id_shop, $this->id_currency, $id_country, $id_group, $row['cart_quantity'], $row['id_product_attribute'], $this->id_customer, $this->id);
                if ($specific_price) {
                    if ($specific_price['reduction_type'] == PosConstants::DISCOUNT_TYPE_PERCENTAGE) {
                        $specific_price['reduction'] = $specific_price['reduction'] * 100;
                    }
                    $reduction_type_row = array('reduction_type' => $specific_price['reduction_type'], 'reduction' => $specific_price['reduction']);
                } else {
                    $reduction_type_row = array('reduction_type' => 0, 'reduction' => 0);
                }

                $result[$key] = array_merge($row, $reduction_type_row);
            }
        }
        // Thus you can avoid one query per product, because there will be only one query for all the products of the cart
        Product::cacheProductsFeatures($products_ids);
        Cart::cacheSomeAttributesLists($pa_ids, (int) $this->id_lang);
        $this->_products = array();
        if (empty($result)) {
            return array();
        }

        $cart_shop_context = Context::getContext()->cloneContext();
        foreach ($result as &$row) {
            if (isset($row['ecotax_attr']) && $row['ecotax_attr'] > 0) {
                $row['ecotax'] = (float) $row['ecotax_attr'];
            }

            if (isset($row['id_product_attribute']) && (int) $row['id_product_attribute'] && isset($row['weight_attribute'])) {
                $row['weight'] = (float) $row['weight_attribute'];
            }
            if (Configuration::get('PS_TAX_ADDRESS_TYPE') == 'id_address_invoice') {
                $address_id = (int) $this->id_address_invoice;
            } else {
                $address_id = (int) $row['id_address_delivery'];
            }
            if (!Address::addressExists($address_id)) {
                $address_id = null;
            }

            if ($cart_shop_context->shop->id != $row['id_shop']) {
                $cart_shop_context->shop = new Shop((int) $row['id_shop']);
            }
            $specific_price_output = array();
            $row['price_without_reduction'] = Product::getPriceStatic(
                (int)$row['id_product'],
                true,
                isset($row['id_product_attribute']) ? (int)$row['id_product_attribute'] : null,
                6,
                null,
                false,
                false,
                $row['cart_quantity'],
                false,
                (int)$this->id_customer ? (int)$this->id_customer : null,
                (int)$this->id,
                $address_id,
                $specific_price_output,
                true,
                true,
                $cart_shop_context
            );
            
            $row['price_with_reduction'] = Product::getPriceStatic(
                (int)$row['id_product'],
                true,
                isset($row['id_product_attribute']) ? (int)$row['id_product_attribute'] : null,
                6,
                null,
                false,
                true,
                $row['cart_quantity'],
                false,
                (int)$this->id_customer ? (int)$this->id_customer : null,
                (int)$this->id,
                $address_id,
                $specific_price_output,
                true,
                true,
                $cart_shop_context
            );

            $row['price'] = $row['price_with_reduction_without_tax'] = Product::getPriceStatic(
                (int)$row['id_product'],
                false,
                isset($row['id_product_attribute']) ? (int)$row['id_product_attribute'] : null,
                6,
                null,
                false,
                true,
                $row['cart_quantity'],
                false,
                (int)$this->id_customer ? (int)$this->id_customer : null,
                (int)$this->id,
                $address_id,
                $specific_price_output,
                true,
                true,
                $cart_shop_context
            );
            
            $row['price_wt'] = $row['price_with_reduction'];
            $row['total'] = Tools::ps_round($row['price_with_reduction_without_tax'] * (int) $row['cart_quantity'], 2);
            $row['total_wt'] = Tools::ps_round($row['price_with_reduction'] * (int) $row['cart_quantity'], 2);
           
            
            if (!isset($row['pai_id_image']) || $row['pai_id_image'] == 0) {
                $cache_id = 'Cart::getProducts-pai_id_image-'.(int) $row['id_product'].'-'.(int) $this->id_lang.'-'.(int) $row['id_shop'];
                if (!Cache::isStored($cache_id)) {
                    $sub_query = new DbQuery();
                    $sub_query->select('image_shop.`id_image` AS `id_image`');
                    $sub_query->from('image', 'i');
                    $sub_query->join('JOIN `'._DB_PREFIX_.'image_shop` image_shop ON (i.id_image = image_shop.id_image AND image_shop.cover=1 AND image_shop.id_shop='.(int) $row['id_shop'].')');
                    $sub_query->where('i.`id_product` = '.(int) $row['id_product']);
                    $sub_query->where('image_shop.`cover` = 1');
                    
                    $id_image = Db::getInstance()->getRow($sub_query);
                    Cache::store($cache_id, $id_image);
                }
                $id_image = Cache::retrieve($cache_id);
                if (!$id_image) {
                    $id_image = array('id_image' => false);
                } else {
                    $row = array_merge($row, $id_image);
                }
            } else {
                $row['id_image'] = $row['pai_id_image'];
            }

            $row['id_image'] = Product::defineProductImage($row, (int) $this->id_lang);
            $row['features'] = Product::getFeaturesStatic((int) $row['id_product']);

            if (array_key_exists($row['id_product_attribute'].'-'.(int) $this->id_lang, self::$_attributesLists)) {
                $row = array_merge($row, self::$_attributesLists[$row['id_product_attribute'].'-'.(int) $this->id_lang]);
            }
            $row = Product::getTaxesInformations($row, $cart_shop_context);
            $this->_products[] = $row;
        }
        return $this->_products;
    }
    
    
    /**
     *
     * @param boolean $refresh
     * @result array
     * </pre>
     * array (
     *  array (
     *   id_product_attribute => int,
     *   id_product => int,
     *   cart_quantity => int,
     *   id_shop => int,
     *   name => string,
     *   is_virtual => boolean,
     *   id_supplier => init,
     *   ecotax => float,
     *   additional_shipping_cost => float,
     *   price => float,
     *   price_with_reduction => float,
     *   price_without_reduction => float,
     *   price_with_reduction_without_tax => float,
     *   width => float,
     *   height => float,
     *   depth => float,
     *   out_of_stock => int,
     *   weight => float,
     *   quantity => int,
     *   unique_id => string,
     *   id_address_delivery => int,
     *   wholesale_price => float,
     *   advanced_stock_management => boolean,
     *   price_attribute => float, // optional
     *   ecotax_attr => float, // optional
     *   reference => string,
     *   weight_attribute => float,
     *   ean13 => int, // optional
     *   upc =>  int, // optional
     *   stock_quantity => int,
     *   price_wt => float,
     *   total_wt => float,
     *   total => float,
     *   rate => int,
     *   tax_name => string
     * ),
     * ...
     */
    public function getFullProducts($refresh = false)
    {
        if (!$this->id) {
            return array();
        }
        
        if (!empty($this->_full_products) && !$refresh) {
            return $this->_full_products;
        }
        
        $sql = new DbQuery();

        $sql->select('cp.`id_product_attribute`');
        $sql->select('cp.`id_product`');
        $sql->select('cp.`quantity` AS `cart_quantity`');
        $sql->select('cp.`id_shop`');
        $sql->select('cp.`id_address_delivery`');
        
        $sql->select('p.`is_virtual`');
        $sql->select('p.`width`');
        $sql->select('p.`height`');
        $sql->select('p.`depth`');
        $sql->select('p.`weight`');
        $sql->select('p.`id_supplier`');
        
        $sql->select('pl.`name`');
        
        $sql->select('product_shop.`ecotax`');
        $sql->select('product_shop.`additional_shipping_cost`');
        $sql->select('product_shop.`price`');
        $sql->select('product_shop.`advanced_stock_management`');
        $sql->select('product_shop.`wholesale_price`');
        
        $sql->select('stock.`out_of_stock`');
        $sql->select('IFNULL(stock.`quantity`, 0) AS `quantity`');
        
        $sql->select('CONCAT(LPAD(cp.`id_product`, 10, 0), LPAD(IFNULL(cp.`id_product_attribute`, 0), 10, 0), IFNULL(cp.`id_address_delivery`, 0)) AS `unique_id`');
        
        $sql->from('cart_product', 'cp');
        
        $sql->leftJoin('product', 'p', 'p.`id_product` = cp.`id_product`');

        if (Combination::isFeatureActive()) {
            $sql->select('product_attribute_shop.`price` AS `price_attribute`');
            $sql->select('product_attribute_shop.`ecotax` AS `ecotax_attr`');
            $sql->select('IF (IFNULL(pa.`reference`, \'\') = \'\', p.`reference`, pa.`reference`) AS `reference`');
            $sql->select('(p.`weight`+ pa.`weight`) `weight_attribute`');
            $sql->select('IF (IFNULL(pa.`ean13`, \'\') = \'\', p.`ean13`, pa.`ean13`) AS `ean13`');
            $sql->select('IF (IFNULL(pa.`upc`, \'\') = \'\', p.`upc`, pa.`upc`) AS `upc`');
        
            $sql->leftJoin('product_attribute', 'pa', 'pa.`id_product_attribute` = cp.`id_product_attribute`');
            $sql->leftJoin('product_attribute_shop', 'product_attribute_shop', '(product_attribute_shop.`id_shop` = cp.`id_shop` AND product_attribute_shop.`id_product_attribute` = pa.`id_product_attribute`)');
        } else {
            $sql->select('p.`reference` AS `reference`');
            $sql->select('NULL AS `weight_attribute`');
        }
        
        $sql->innerJoin('product_shop', 'product_shop', '(product_shop.`id_shop` = cp.`id_shop` AND product_shop.`id_product` = p.`id_product`)');
        $sql->leftJoin('product_lang', 'pl', 'p.`id_product` = pl.`id_product` AND pl.`id_lang` = ' . (int) $this->id_lang . Shop::addSqlRestrictionOnLang('pl', 'cp.`id_shop`'));
        $sql->leftJoin('product_supplier', 'ps', 'ps.`id_product` = cp.`id_product` AND ps.`id_product_attribute` = cp.`id_product_attribute` AND ps.`id_supplier` = p.`id_supplier`');
        $sql->join(Product::sqlStock('cp', 'cp'));

        $sql->where('cp.`id_cart` = ' . (int) $this->id);
        $sql->where('p.`id_product` IS NOT NULL');
        $sql->groupBy('`unique_id`');
        $sql->orderBy('cp.`date_add` DESC');
        $result = Db::getInstance()->executeS($sql);
        $products_ids = array();
        $pa_ids = array();
        if ($result) {
            foreach ($result as $row) {
                $products_ids[] = $row['id_product'];
                $pa_ids[] = $row['id_product_attribute'];
            }
        }
        
        if (empty($result)) {
            return array();
        }
        
        $this->_full_products = array();
        $cart_shop_context = Context::getContext()->cloneContext();
        foreach ($result as &$row) {
            if (isset($row['ecotax_attr']) && $row['ecotax_attr'] > 0) {
                $row['ecotax'] = (float) $row['ecotax_attr'];
            }

            $row['stock_quantity'] = (int) $row['quantity'];
            // for compatibility with 1.2 themes
            $row['quantity'] = (int) $row['cart_quantity'];

            if (isset($row['id_product_attribute']) && (int) $row['id_product_attribute'] && isset($row['weight_attribute'])) {
                $row['weight'] = (float) $row['weight_attribute'];
            }
            if (Configuration::get('PS_TAX_ADDRESS_TYPE') == 'id_address_invoice') {
                $address_id = (int) $this->id_address_invoice;
            } else {
                $address_id = (int) $row['id_address_delivery'];
            }
            if (!Address::addressExists($address_id)) {
                $address_id = null;
            }

            if ($cart_shop_context->shop->id != $row['id_shop']) {
                $cart_shop_context->shop = new Shop((int) $row['id_shop']);
            }
            $specific_price_output = array();
            $row['price_without_reduction'] = Product::getPriceStatic(
                (int)$row['id_product'],
                true,
                isset($row['id_product_attribute']) ? (int)$row['id_product_attribute'] : null,
                6,
                null,
                false,
                false,
                $row['cart_quantity'],
                false,
                (int)$this->id_customer ? (int)$this->id_customer : null,
                (int)$this->id,
                $address_id,
                $specific_price_output,
                true,
                true,
                $cart_shop_context
            );
            
            $row['price_with_reduction'] = Product::getPriceStatic(
                (int)$row['id_product'],
                true,
                isset($row['id_product_attribute']) ? (int)$row['id_product_attribute'] : null,
                6,
                null,
                false,
                true,
                $row['cart_quantity'],
                false,
                (int)$this->id_customer ? (int)$this->id_customer : null,
                (int)$this->id,
                $address_id,
                $specific_price_output,
                true,
                true,
                $cart_shop_context
            );

            $row['price'] = $row['price_with_reduction_without_tax'] = Product::getPriceStatic(
                (int)$row['id_product'],
                false,
                isset($row['id_product_attribute']) ? (int)$row['id_product_attribute'] : null,
                6,
                null,
                false,
                true,
                $row['cart_quantity'],
                false,
                (int)$this->id_customer ? (int)$this->id_customer : null,
                (int)$this->id,
                $address_id,
                $specific_price_output,
                true,
                true,
                $cart_shop_context
            );
            
            $row['price_wt'] = $row['price_with_reduction'];
            $row['total'] = Tools::ps_round($row['price_with_reduction_without_tax'] * (int) $row['cart_quantity'], 2);
            $row['total_wt'] = Tools::ps_round($row['price_with_reduction'] * (int) $row['cart_quantity'], 2);

            if (array_key_exists($row['id_product_attribute'].'-'.(int) $this->id_lang, self::$_attributesLists)) {
                $row = array_merge($row, self::$_attributesLists[$row['id_product_attribute'].'-'.(int) $this->id_lang]);
            }
            $row = Product::getTaxesInformations($row, $cart_shop_context);
            $this->_full_products[] = $row;
        }
        return $this->_full_products;
    }
    
    /**
     * Get products grouped by package and by addresses to be sent individualy (one package = one shipping cost).
     *
     * @param boolean $flush
     * @param boolean $is_full_products
     * @return array
     * <pre>
     *  array(
     *      array(
     *          product_list => array(),
     *          carrier_list => array(),
     *          id_warehouse => array(),
     *         )
     *      ),
     *      ...    
     *  );
     */
    public function getPackageList($flush = false, $is_full_products = false)
    {
        // Internal data structure is different between 1.6.0.14 and newer
        if (version_compare(_PS_VERSION_, '1.6.0.14') <= 0) {
            return parent::getPackageList($flush);
        }
        static $cache = array();
        $cache_key = (int) $this->id . '_' . (int) $this->id_address_delivery;
        if (isset($cache[$cache_key]) && $cache[$cache_key] !== false && !$flush) {
            return $cache[$cache_key];
        }
        if ($is_full_products) {
            $product_list = $this->getFullProducts();
        } else {
            $product_list = $this->getProducts($flush);
        }
        // Step 1 : Get product informations (warehouse_list and carrier_list), count warehouse
        // Determine the best warehouse to determine the packages
        // For that we count the number of time we can use a warehouse for a specific delivery address
        $warehouse_count_by_address = array();

        $stock_management_active = Configuration::get('PS_ADVANCED_STOCK_MANAGEMENT');

        foreach ($product_list as &$product) {
            if ((int) $product['id_address_delivery'] == 0) {
                $product['id_address_delivery'] = (int) $this->id_address_delivery;
            }

            if (!isset($warehouse_count_by_address[$product['id_address_delivery']])) {
                $warehouse_count_by_address[$product['id_address_delivery']] = array();
            }

            $product['warehouse_list'] = array();

            if ($stock_management_active &&
                    (int) $product['advanced_stock_management'] == 1) {
                $warehouse_list = Warehouse::getProductWarehouseList($product['id_product'], $product['id_product_attribute'], $this->id_shop);
                if (count($warehouse_list) == 0) {
                    $warehouse_list = Warehouse::getProductWarehouseList($product['id_product'], $product['id_product_attribute']);
                }
                // Does the product is in stock ?
                // If yes, get only warehouse where the product is in stock

                $warehouse_in_stock = array();
                $manager = StockManagerFactory::getManager();

                foreach ($warehouse_list as $key => $warehouse) {
                    $product_real_quantities = $manager->getProductRealQuantities($product['id_product'], $product['id_product_attribute'], array($warehouse['id_warehouse']), true);

                    if ($product_real_quantities > 0 || Pack::isPack((int) $product['id_product'])) {
                        $warehouse_in_stock[] = $warehouse;
                    }
                }

                if (!empty($warehouse_in_stock)) {
                    $warehouse_list = $warehouse_in_stock;
                    $product['in_stock'] = true;
                } else {
                    $product['in_stock'] = false;
                }
            } else {
                //simulate default warehouse
                $warehouse_list = array(0 => array('id_warehouse' => 0));
                $product['in_stock'] = StockAvailable::getQuantityAvailableByProduct($product['id_product'], $product['id_product_attribute']) > 0;
            }

            foreach ($warehouse_list as $warehouse) {
                $product['warehouse_list'][$warehouse['id_warehouse']] = $warehouse['id_warehouse'];
                if (!isset($warehouse_count_by_address[$product['id_address_delivery']][$warehouse['id_warehouse']])) {
                    $warehouse_count_by_address[$product['id_address_delivery']][$warehouse['id_warehouse']] = 0;
                }

                $warehouse_count_by_address[$product['id_address_delivery']][$warehouse['id_warehouse']] ++;
            }
        }
        unset($product);

        arsort($warehouse_count_by_address);

        // Step 2 : Group product by warehouse
        $grouped_by_warehouse = array();

        foreach ($product_list as &$product) {
            if (!isset($grouped_by_warehouse[$product['id_address_delivery']])) {
                $grouped_by_warehouse[$product['id_address_delivery']] = array(
                    'in_stock' => array(),
                    'out_of_stock' => array(),
                );
            }

            $product['carrier_list'] = array();
            $id_warehouse = 0;
            foreach ($warehouse_count_by_address[$product['id_address_delivery']] as $id_war => $val) {
                if (array_key_exists((int) $id_war, $product['warehouse_list'])) {
                    $product['carrier_list'] = PosTools::array_replace($product['carrier_list'], Carrier::getAvailableCarrierList(new Product($product['id_product']), $id_war, $product['id_address_delivery'], null, $this));
                    if (!$id_warehouse) {
                        $id_warehouse = (int) $id_war;
                    }
                }
            }

            if (!isset($grouped_by_warehouse[$product['id_address_delivery']]['in_stock'][$id_warehouse])) {
                $grouped_by_warehouse[$product['id_address_delivery']]['in_stock'][$id_warehouse] = array();
                $grouped_by_warehouse[$product['id_address_delivery']]['out_of_stock'][$id_warehouse] = array();
            }

            if (!$this->allow_seperated_package) {
                $key = 'in_stock';
            } else {
                $key = $product['in_stock'] ? 'in_stock' : 'out_of_stock';
                $product_quantity_in_stock = StockAvailable::getQuantityAvailableByProduct($product['id_product'], $product['id_product_attribute']);
                if ($product['in_stock'] && $product['cart_quantity'] > $product_quantity_in_stock) {
                    $out_stock_part = $product['cart_quantity'] - $product_quantity_in_stock;
                    $product_bis = $product;
                    $product_bis['cart_quantity'] = $out_stock_part;
                    $product_bis['in_stock'] = 0;
                    $product['cart_quantity'] -= $out_stock_part;
                    $grouped_by_warehouse[$product['id_address_delivery']]['out_of_stock'][$id_warehouse][] = $product_bis;
                }
            }

            if (empty($product['carrier_list'])) {
                $product['carrier_list'] = array(0 => 0);
            }

            $grouped_by_warehouse[$product['id_address_delivery']][$key][$id_warehouse][] = $product;
        }
        unset($product);

        // Step 3 : grouped product from grouped_by_warehouse by available carriers
        $grouped_by_carriers = array();
        foreach ($grouped_by_warehouse as $id_address_delivery => $products_in_stock_list) {
            if (!isset($grouped_by_carriers[$id_address_delivery])) {
                $grouped_by_carriers[$id_address_delivery] = array(
                    'in_stock' => array(),
                    'out_of_stock' => array(),
                );
            }
            foreach ($products_in_stock_list as $key => $warehouse_list) {
                if (!isset($grouped_by_carriers[$id_address_delivery][$key])) {
                    $grouped_by_carriers[$id_address_delivery][$key] = array();
                }
                foreach ($warehouse_list as $id_warehouse => $product_list) {
                    if (!isset($grouped_by_carriers[$id_address_delivery][$key][$id_warehouse])) {
                        $grouped_by_carriers[$id_address_delivery][$key][$id_warehouse] = array();
                    }
                    foreach ($product_list as $product) {
                        $package_carriers_key = implode(',', $product['carrier_list']);

                        if (!isset($grouped_by_carriers[$id_address_delivery][$key][$id_warehouse][$package_carriers_key])) {
                            $grouped_by_carriers[$id_address_delivery][$key][$id_warehouse][$package_carriers_key] = array(
                                'product_list' => array(),
                                'carrier_list' => $product['carrier_list'],
                                'warehouse_list' => $product['warehouse_list']
                            );
                        }

                        $grouped_by_carriers[$id_address_delivery][$key][$id_warehouse][$package_carriers_key]['product_list'][] = $product;
                    }
                }
            }
        }

        $package_list = array();
        // Step 4 : merge product from grouped_by_carriers into $package to minimize the number of package
        foreach ($grouped_by_carriers as $id_address_delivery => $products_in_stock_list) {
            if (!isset($package_list[$id_address_delivery])) {
                $package_list[$id_address_delivery] = array(
                    'in_stock' => array(),
                    'out_of_stock' => array(),
                );
            }

            foreach ($products_in_stock_list as $key => $warehouse_list) {
                if (!isset($package_list[$id_address_delivery][$key])) {
                    $package_list[$id_address_delivery][$key] = array();
                }
                // Count occurance of each carriers to minimize the number of packages
                $carrier_count = array();
                foreach ($warehouse_list as $id_warehouse => $products_grouped_by_carriers) {
                    foreach ($products_grouped_by_carriers as $data) {
                        foreach ($data['carrier_list'] as $id_carrier) {
                            if (!isset($carrier_count[$id_carrier])) {
                                $carrier_count[$id_carrier] = 0;
                            }
                            $carrier_count[$id_carrier] ++;
                        }
                    }
                }
                arsort($carrier_count);
                foreach ($warehouse_list as $id_warehouse => $products_grouped_by_carriers) {
                    if (!isset($package_list[$id_address_delivery][$key][$id_warehouse])) {
                        $package_list[$id_address_delivery][$key][$id_warehouse] = array();
                    }
                    foreach ($products_grouped_by_carriers as $data) {
                        foreach ($carrier_count as $id_carrier => $rate) {
                            if (array_key_exists($id_carrier, $data['carrier_list'])) {
                                if (!isset($package_list[$id_address_delivery][$key][$id_warehouse][$id_carrier])) {
                                    $package_list[$id_address_delivery][$key][$id_warehouse][$id_carrier] = array(
                                        'carrier_list' => $data['carrier_list'],
                                        'warehouse_list' => $data['warehouse_list'],
                                        'product_list' => array(),
                                    );
                                }
                                $package_list[$id_address_delivery][$key][$id_warehouse][$id_carrier]['carrier_list'] = array_intersect($package_list[$id_address_delivery][$key][$id_warehouse][$id_carrier]['carrier_list'], $data['carrier_list']);
                                $package_list[$id_address_delivery][$key][$id_warehouse][$id_carrier]['product_list'] = array_merge($package_list[$id_address_delivery][$key][$id_warehouse][$id_carrier]['product_list'], $data['product_list']);

                                break;
                            }
                        }
                    }
                }
            }
        }

        // Step 5 : Reduce depth of $package_list
        $final_package_list = array();
        foreach ($package_list as $id_address_delivery => $products_in_stock_list) {
            if (!isset($final_package_list[$id_address_delivery])) {
                $final_package_list[$id_address_delivery] = array();
            }

            foreach ($products_in_stock_list as $key => $warehouse_list) {
                foreach ($warehouse_list as $id_warehouse => $products_grouped_by_carriers) {
                    foreach ($products_grouped_by_carriers as $data) {
                        $final_package_list[$id_address_delivery][] = array(
                            'product_list' => $data['product_list'],
                            'carrier_list' => $data['carrier_list'],
                            'warehouse_list' => $data['warehouse_list'],
                            'id_warehouse' => $id_warehouse,
                        );
                    }
                }
            }
        }
        $cache[$cache_key] = $final_package_list;
        return $final_package_list;
    }

    /**
     * Update new combination of product in cart.
     *
     * @param int $id_product
     * @param int $new_id_product_attribute
     * @param int $old_id_product_attribute
     * @param int $id_shop
     *
     * @return boolean
     */
    public function updateProductCombination($id_product, $new_id_product_attribute, $old_id_product_attribute, $id_shop)
    {
        $sql = 'UPDATE `'._DB_PREFIX_.'cart_product`
                SET
                    `id_product_attribute` = '.(int) $new_id_product_attribute.'
                WHERE  `id_cart` = '.(int) $this->id.'
                    AND `id_product` = '.(int) $id_product.'
                    AND `id_product_attribute` = '.(int) $old_id_product_attribute.'
                    AND `id_shop` = '.(int) $id_shop;

        return Db::getInstance()->execute($sql);
    }

    /**
     * Check cart rule has already apllied for cart.
     *
     * @param int $id_cart_rule
     *
     * @return boolean
     */
    public function doesCartRuleExist($id_cart_rule)
    {
        return (bool) Db::getInstance()->getValue('SELECT `id_cart_rule` FROM `'._DB_PREFIX_.'cart_cart_rule` WHERE `id_cart_rule` = '.(int) $id_cart_rule.' AND `id_cart` = '.(int) $this->id);
    }
    
    /**
     * Check if free shipping is already applied to this cart or not
     *
     * @return boolean
     */
    public function isFreeShipping()
    {
        $cart_rules = $this->getCartRules(CartRule::FILTER_ACTION_SHIPPING);
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
     * @see ObjectModel::save()
     * @param boolean $null_values
     * @param boolean $auto_date
     */
    public function save($null_values = false, $auto_date = true)
    {
        if (!empty($this->id_address_delivery) && !empty($this->id_carrier)) {
            $delivery_option = array();
            $delivery_option[$this->id_address_delivery] = $this->id_carrier . ',';
            $this->delivery_option = serialize($delivery_option);// Copied from Cart::setDeliveryOption()
        }
        $result = parent::save($null_values, $auto_date);
        PosContext::resetContext();
        return $result;
    }
    
    /**
     * 
     * This function returns the total cart amount
     *
     * Possible values for $type:
     * Cart::ONLY_PRODUCTS
     * Cart::ONLY_DISCOUNTS
     * Cart::BOTH
     * Cart::BOTH_WITHOUT_SHIPPING
     * Cart::ONLY_SHIPPING
     * Cart::ONLY_WRAPPING
     * Cart::ONLY_PRODUCTS_WITHOUT_SHIPPING
     * Cart::ONLY_PHYSICAL_PRODUCTS_WITHOUT_SHIPPING
     *
     * @todo This change doesn't work with Prestashop version <= 1.6.0.9 
     * @param bool $withTaxes With or without taxes
     * @param int $type Total type
     * @param bool $use_cache Allow using cache of the method CartRule::getContextualValue
     * @return float Order total
     */
    public function getOrderTotal($with_taxes = true, $type = Cart::BOTH, $products = null, $id_carrier = null, $use_cache = true)
    {
        if (!class_exists('Adapter_ServiceLocator')) {
            return parent::getOrderTotal($with_taxes, $type, $products, $id_carrier, $use_cache);
        }
        // Dependencies
        $address_factory = Adapter_ServiceLocator::get('Adapter_AddressFactory');
        $price_calculator = Adapter_ServiceLocator::get('PosAdapter_ProductPriceCalculator');
        $configuration = Adapter_ServiceLocator::get('Core_Business_ConfigurationInterface');

        $ps_tax_address_type = $configuration->get('PS_TAX_ADDRESS_TYPE');
        $ps_use_ecotax = $configuration->get('PS_USE_ECOTAX');
        $ps_round_type = $configuration->get('PS_ROUND_TYPE');
        $ps_ecotax_tax_rules_group_id = $configuration->get('PS_ECOTAX_TAX_RULES_GROUP_ID');
        $compute_precision = $configuration->get('_PS_PRICE_COMPUTE_PRECISION_');

        if (!$this->id) {
            return 0;
        }

        $type = (int) $type;
        $array_type = array(
            Cart::ONLY_PRODUCTS,
            Cart::ONLY_DISCOUNTS,
            Cart::BOTH,
            Cart::BOTH_WITHOUT_SHIPPING,
            Cart::ONLY_SHIPPING,
            Cart::ONLY_WRAPPING,
            Cart::ONLY_PRODUCTS_WITHOUT_SHIPPING,
            Cart::ONLY_PHYSICAL_PRODUCTS_WITHOUT_SHIPPING,
        );

        // Define virtual context to prevent case where the cart is not the in the global context
        $virtual_context = Context::getContext()->cloneContext();
        $virtual_context->cart = $this;

        if (!in_array($type, $array_type)) {
            die(Tools::displayError());
        }

        $with_shipping = in_array($type, array(Cart::BOTH, Cart::ONLY_SHIPPING));

        // if cart rules are not used
        if ($type == Cart::ONLY_DISCOUNTS && !CartRule::isFeatureActive()) {
            return 0;
        }

        // no shipping cost if is a cart with only virtuals products
        $virtual = $this->isVirtualCart();
        if ($virtual && $type == Cart::ONLY_SHIPPING) {
            return 0;
        }

        if ($virtual && $type == Cart::BOTH) {
            $type = Cart::BOTH_WITHOUT_SHIPPING;
        }

        if ($with_shipping || $type == Cart::ONLY_DISCOUNTS) {
            if (is_null($products) && is_null($id_carrier)) {
                $shipping_fees = $this->getTotalShippingCost(null, (bool) $with_taxes);
            } else {
                $shipping_fees = $this->getPackageShippingCost((int) $id_carrier, (bool) $with_taxes, null, $products);
            }
        } else {
            $shipping_fees = 0;
        }

        if ($type == Cart::ONLY_SHIPPING) {
            return $shipping_fees;
        }

        if ($type == Cart::ONLY_PRODUCTS_WITHOUT_SHIPPING) {
            $type = Cart::ONLY_PRODUCTS;
        }

        $param_product = true;
        if (is_null($products)) {
            $param_product = false;
            $products = $this->getProducts();
        }

        if ($type == Cart::ONLY_PHYSICAL_PRODUCTS_WITHOUT_SHIPPING) {
            foreach ($products as $key => $product) {
                if ($product['is_virtual']) {
                    unset($products[$key]);
                }
            }
            $type = Cart::ONLY_PRODUCTS;
        }

        $order_total = 0;
        if (Tax::excludeTaxeOption()) {
            $with_taxes = false;
        }

        $products_total = array();
        $ecotax_total = 0;

        foreach ($products as $product) {
            // products refer to the cart details

            if ($virtual_context->shop->id != $product['id_shop']) {
                $virtual_context->shop = new Shop((int) $product['id_shop']);
            }

            if ($ps_tax_address_type == 'id_address_invoice') {
                $id_address = (int) $this->id_address_invoice;
            } else {
                $id_address = (int) $product['id_address_delivery'];
            } // Get delivery address of the product from the cart
            if (!$address_factory->addressExists($id_address)) {
                $id_address = null;
            }

            // The $null variable below is not used,
            // but it is necessary to pass it to getProductPrice because
            // it expects a reference.
            $null = null;
            $price = $price_calculator->getProductPrice((int) $product['id_product'], $with_taxes, (int) $product['id_product_attribute'], 6, null, false, true, $product['cart_quantity'], false, (int) $this->id_customer ? (int) $this->id_customer : null, (int) $this->id, $id_address, $null, $ps_use_ecotax, true, $virtual_context);

            $address = $address_factory->findOrCreate($id_address, true);

            if ($with_taxes) {
                $id_tax_rules_group = Product::getIdTaxRulesGroupByIdProduct((int) $product['id_product'], $virtual_context);
                $tax_calculator = TaxManagerFactory::getManager($address, $id_tax_rules_group)->getTaxCalculator();
            } else {
                $id_tax_rules_group = 0;
            }

            if (in_array($ps_round_type, array(Order::ROUND_ITEM, Order::ROUND_LINE))) {
                if (!isset($products_total[$id_tax_rules_group])) {
                    $products_total[$id_tax_rules_group] = 0;
                }
            } elseif (!isset($products_total[$id_tax_rules_group . '_' . $id_address])) {
                $products_total[$id_tax_rules_group . '_' . $id_address] = 0;
            }

            switch ($ps_round_type) {
                case Order::ROUND_TOTAL:
                    $products_total[$id_tax_rules_group . '_' . $id_address] += $price * (int) $product['cart_quantity'];
                    break;

                case Order::ROUND_LINE:
                    $product_price = $price * $product['cart_quantity'];
                    $products_total[$id_tax_rules_group] += Tools::ps_round($product_price, $compute_precision);
                    break;

                case Order::ROUND_ITEM:
                default:
                    $product_price = /* $with_taxes ? $tax_calculator->addTaxes($price) : */$price;
                    $products_total[$id_tax_rules_group] += Tools::ps_round($product_price, $compute_precision) * (int) $product['cart_quantity'];
                    break;
            }
        }

        foreach ($products_total as $key => $price) {
            $order_total += $price;
        }

        $order_total_products = $order_total;

        if ($type == Cart::ONLY_DISCOUNTS) {
            $order_total = 0;
        }

        // Wrapping Fees
        $wrapping_fees = 0;

        // With PS_ATCP_SHIPWRAP on the gift wrapping cost computation calls getOrderTotal with $type === Cart::ONLY_PRODUCTS, so the flag below prevents an infinite recursion.
        $include_gift_wrapping = (!$configuration->get('PS_ATCP_SHIPWRAP') || $type !== Cart::ONLY_PRODUCTS);

        if ($this->gift && $include_gift_wrapping) {
            $wrapping_fees = Tools::convertPrice(Tools::ps_round($this->getGiftWrappingPrice($with_taxes), $compute_precision), Currency::getCurrencyInstance((int) $this->id_currency));
        }
        if ($type == Cart::ONLY_WRAPPING) {
            return $wrapping_fees;
        }

        $order_total_discount = 0;
        $order_shipping_discount = 0;
        if (!in_array($type, array(Cart::ONLY_SHIPPING, Cart::ONLY_PRODUCTS)) && CartRule::isFeatureActive()) {
            // First, retrieve the cart rules associated to this "getOrderTotal"
            if ($with_shipping || $type == Cart::ONLY_DISCOUNTS) {
                $cart_rules = $this->getCartRules(CartRule::FILTER_ACTION_ALL);
            } else {
                $cart_rules = $this->getCartRules(CartRule::FILTER_ACTION_REDUCTION);
                // Cart Rules array are merged manually in order to avoid doubles
                foreach ($this->getCartRules(CartRule::FILTER_ACTION_GIFT) as $tmp_cart_rule) {
                    $flag = false;
                    foreach ($cart_rules as $cart_rule) {
                        if ($tmp_cart_rule['id_cart_rule'] == $cart_rule['id_cart_rule']) {
                            $flag = true;
                        }
                    }
                    if (!$flag) {
                        $cart_rules[] = $tmp_cart_rule;
                    }
                }
            }

            $id_address_delivery = 0;
            if (isset($products[0])) {
                $id_address_delivery = (is_null($products) ? $this->id_address_delivery : $products[0]['id_address_delivery']);
            }
            $package = array('id_carrier' => $id_carrier, 'id_address' => $id_address_delivery, 'products' => $products);

            // Then, calculate the contextual value for each one
            $flag = false;
            foreach ($cart_rules as $cart_rule) {
                // If the cart rule offers free shipping, add the shipping cost
                if (($with_shipping || $type == Cart::ONLY_DISCOUNTS) && $cart_rule['obj']->free_shipping && !$flag) {
                    $order_shipping_discount = (float) Tools::ps_round($cart_rule['obj']->getContextualValue($with_taxes, $virtual_context, CartRule::FILTER_ACTION_SHIPPING, ($param_product ? $package : null), $use_cache), $compute_precision);
                    $flag = true;
                }

                // If the cart rule is a free gift, then add the free gift value only if the gift is in this package
                if ((int) $cart_rule['obj']->gift_product) {
                    $in_order = false;
                    if (is_null($products)) {
                        $in_order = true;
                    } else {
                        foreach ($products as $product) {
                            if ($cart_rule['obj']->gift_product == $product['id_product'] && $cart_rule['obj']->gift_product_attribute == $product['id_product_attribute']) {
                                $in_order = true;
                            }
                        }
                    }

                    if ($in_order) {
                        $order_total_discount += $cart_rule['obj']->getContextualValue($with_taxes, $virtual_context, CartRule::FILTER_ACTION_GIFT, $package, $use_cache);
                    }
                }

                // If the cart rule offers a reduction, the amount is prorated (with the products in the package)
                if ($cart_rule['obj']->reduction_percent > 0 || $cart_rule['obj']->reduction_amount > 0) {
                    $order_total_discount += Tools::ps_round($cart_rule['obj']->getContextualValue($with_taxes, $virtual_context, CartRule::FILTER_ACTION_REDUCTION, $package, $use_cache), $compute_precision);
                }
            }
            $order_total_discount = min(Tools::ps_round($order_total_discount, 2), (float) $order_total_products) + (float) $order_shipping_discount;
            $order_total -= $order_total_discount;
        }

        if ($type == Cart::BOTH) {
            $order_total += $shipping_fees + $wrapping_fees;
        }

        if ($order_total < 0 && $type != Cart::ONLY_DISCOUNTS) {
            return 0;
        }

        if ($type == Cart::ONLY_DISCOUNTS) {
            return $order_total_discount;
        }
        return Tools::ps_round((float) $order_total, $compute_precision);
    }
}
