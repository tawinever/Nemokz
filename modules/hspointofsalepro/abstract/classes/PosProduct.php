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
class PosProduct extends Product
{
    /**
     * Deny orders = 0, Allow orders = 1, Deny orders as set in the Products Preferences page = 2
     */
    const PRODUCT_OUT_OF_STOCK = 2;

    protected static $pos_combination = array();

    /**
     * Get all combinations of product.
     *
     * @param int  $id_product
     * @param int  $id_shop
     * @param int  $id_lang
     * @param boolean $hiden_attribute_name
     *
     * @return array
     * <pre/>
     *  array ( 
     *    1 => array ( 
     *          string => array (
     *              string => int,
     *              string => string,
     *              string => string
     *          )
     *          string => array (
     *              string => int,
     *              string => string,
     *              string => string
     *          )
     *          ...    
     *    ) 
     *    ...
     * )
     */
    public static function getCombinations($id_product, $id_shop, $id_lang = null)
    {
        $context = Context::getcontext();
        
        if (is_null($id_lang)) {
            $id_lang = (int) $context->language->id;
        }
        $shop = !empty($id_shop) ? new Shop($id_shop) : Context::getcontext()->shop;
        $id_cache = $id_product.'-'.$id_shop.'-'.$id_lang;

        if (isset(self::$pos_combination[$id_cache]) && self::$pos_combination[$id_cache] !== null) {
            return self::$pos_combination[$id_cache];
        }

        $query = new DbQuery();
        $query->select('pa.`id_product_attribute`');
        $query->select('agl.`name` `group_name`');
        $query->select('a.`id_attribute`');
        $query->select('al.`name`');
        $query->select('ag.`position`');
        $query->select('a.`color`');
        $query->select('stock.`quantity`');
        $query->from('product_attribute', 'pa');
        $query->innerJoin('product_attribute_shop', 'pas', '(pas.`id_product_attribute` = pa.`id_product_attribute` AND pas.`id_shop` = '.(int) $id_shop.')');
        $query->leftJoin('product_attribute_combination', 'pac', 'pac.`id_product_attribute` = pa.`id_product_attribute`');
        $query->leftJoin('attribute', 'a', 'a.`id_attribute` = pac.`id_attribute`');
        $query->innerJoin('attribute_shop', 'ats', '(ats.`id_attribute` = a.`id_attribute` AND ats.`id_shop` = '.(int) $id_shop.')');
        $query->leftJoin('attribute_lang', 'al', '(a.`id_attribute` = al.`id_attribute` AND al.`id_lang` = '.(int) $id_lang.')');
        $query->leftJoin('attribute_group', 'ag', 'ag.`id_attribute_group` = a.`id_attribute_group`');
        $query->leftJoin('attribute_group_lang', 'agl', '(ag.`id_attribute_group` = agl.`id_attribute_group` AND agl.`id_lang` = '.(int) $id_lang.')');
        $query->join(Product::sqlStock('pa', 'pa', false, $shop));
        $query->where('pa.`id_product` = ' .(int) $id_product);
        $query->orderBy('ag.`position`');
        $query->orderBy('`group_name`');
        $results = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($query);
        
        $combinations = array();
        foreach ($results as $result) {
            $combinations['combinations'][$result['id_product_attribute']]['attribute_groups'][$result['group_name']] =  array(
                                                                                            'id_attribute' => (int) $result['id_attribute'],
                                                                                            'value' => $result['name'],
                                                                                            'color' => $result['color'],
                                                                                            'image' => @filemtime(_PS_COL_IMG_DIR_.$result['id_attribute'].'.jpg') ? _THEME_COL_DIR_.(int)$result['id_attribute'].'.jpg' : '',
                                                                                            'position' => $result['position']
            );
            $combinations['combinations'][$result['id_product_attribute']]['quantity'] = (int) $result['quantity'];
        }
        self::$pos_combination[$id_cache] = $combinations;
        return self::$pos_combination[$id_cache];
    }
        
    /**
     * @param int $id_product_attribute
     *
     * @return int
     */
    public function getMinimalQuantity($id_product_attribute = 0)
    {
        $minimum_quantity = $this->minimal_quantity;
        if ($id_product_attribute) {
            $shop = Context::getContext()->shop;
            // Don't use Attribute::getAttributeMinimalQty() as it checks "$minimum_quantity>1" while we expect "$minimum_quantity>=1"
            $combination = new Combination($id_product_attribute, null, $shop->id);
            $minimum_quantity = (int) $combination->minimal_quantity;
        }

        return $minimum_quantity ? $minimum_quantity : 1;
    }
    
    /**
     * 
     * @param int $out_of_stock it depend on setting in product page (Deny orders = 0, Allow orders = 1, Deny orders as set in the Products Preferences page = 2)
     * @return int
     */
    public static function isEnabledOrderOutOfStock($out_of_stock)
    {
        $is_enabled_order_out_of_stock = 1;
        if ((int)Configuration::get('PS_STOCK_MANAGEMENT')) {
            $is_enabled_order_out_of_stock = (int)$out_of_stock == self::PRODUCT_OUT_OF_STOCK ? (int)Configuration::get('POS_ORDER_OUT_OF_STOCK') : (int)$out_of_stock;
        }
        return $is_enabled_order_out_of_stock;
    }
    
    /**
     * Returns product price
     *
     * @param int      $id_product            Product id
     * @param bool     $usetax                With taxes or not (optional)
     * @param int|null $id_product_attribute  Product attribute id (optional).
     *                                        If set to false, do not apply the combination price impact.
     *                                        NULL does apply the default combination price impact.
     * @param int      $decimals              Number of decimals (optional)
     * @param int|null $divisor               Useful when paying many time without fees (optional)
     * @param bool     $only_reduc            Returns only the reduction amount
     * @param bool     $usereduc              Set if the returned amount will include reduction
     * @param int      $quantity              Required for quantity discount application (default value: 1)
     * @param bool     $force_associated_tax  DEPRECATED - NOT USED Force to apply the associated tax.
     *                                        Only works when the parameter $usetax is true
     * @param int|null $id_customer           Customer ID (for customer group reduction)
     * @param int|null $id_cart               Cart ID. Required when the cookie is not accessible
     *                                        (e.g., inside a payment module, a cron task...)
     * @param int|null $id_address            Customer address ID. Required for price (tax included)
     *                                        calculation regarding the guest localization
     * @param null     $specific_price_output If a specific price applies regarding the previous parameters,
     *                                        this variable is filled with the corresponding SpecificPrice object
     * @param bool     $with_ecotax           Insert ecotax in price output.
     * @param bool     $use_group_reduction
     * @param Context  $context
     * @param bool     $use_customer_price
     * @return float                          Product price
     */
    public static function getPriceStatic($id_product, $usetax = true, $id_product_attribute = null, $decimals = 6, $divisor = null, $only_reduc = false, $usereduc = true, $quantity = 1, $force_associated_tax = false, $id_customer = null, $id_cart = null, $id_address = null, &$specific_price_output = null, $with_ecotax = true, $use_group_reduction = true, Context $context = null, $use_customer_price = true)
    {
        if (!$context) {
            $context = Context::getContext();
        }

        $cur_cart = $context->cart;

        if ($divisor !== null) {
            Tools::displayParameterAsDeprecated('divisor');
        }

        if (!Validate::isBool($usetax) || !Validate::isUnsignedId($id_product)) {
            die(Tools::displayError());
        }

        // Initializations
        $id_group = null;
        if ($id_customer) {
            $id_group = Customer::getDefaultGroupId((int) $id_customer);
        }
        if (!$id_group) {
            $id_group = (int) Group::getCurrent()->id;
        }

        // If there is cart in context or if the specified id_cart is different from the context cart id
        if (!is_object($cur_cart) || (Validate::isUnsignedInt($id_cart) && $id_cart && $cur_cart->id != $id_cart)) {
            /*
             * When a user (e.g., guest, customer, Google...) is on PrestaShop, he has already its cart as the global (see /init.php)
             * When a non-user calls directly this method (e.g., payment module...) is on PrestaShop, he does not have already it BUT knows the cart ID
             * When called from the back office, cart ID can be inexistant
             */
            if (!$id_cart && !isset($context->employee)) {
                die(Tools::displayError());
            }
            $cur_cart = new Cart($id_cart);
            // Store cart in context to avoid multiple instantiations in BO
            if (!Validate::isLoadedObject($context->cart)) {
                $context->cart = $cur_cart;
            }
        }

        $cart_quantity = 0;
        if ((int) $id_cart) {
            $cache_id = 'PosProduct::getPriceStatic_' . (int) $id_product . '-' . (int) $id_cart;
            if (!Cache::isStored($cache_id) || ($cart_quantity = Cache::retrieve($cache_id) != (int) $quantity)) {
                $sql = 'SELECT SUM(`quantity`)
				FROM `' . _DB_PREFIX_ . 'cart_product`
				WHERE `id_product` = ' . (int) $id_product . '
				AND `id_cart` = ' . (int) $id_cart;
                $cart_quantity = (int) Db::getInstance(_PS_USE_SQL_SLAVE_)->getValue($sql);
                Cache::store($cache_id, $cart_quantity);
            } else {
                $cart_quantity = Cache::retrieve($cache_id);
            }
        }

        $id_currency = Validate::isLoadedObject($context->currency) ? (int) $context->currency->id : (int) Configuration::get('PS_CURRENCY_DEFAULT');

        // retrieve address informations
        $id_country = (int) $context->country->id;
        $id_state = 0;
        $zipcode = 0;

        if (!$id_address && Validate::isLoadedObject($cur_cart)) {
            $id_address = $cur_cart->{Configuration::get('PS_TAX_ADDRESS_TYPE')};
        }

        if ($id_address) {
            $address_infos = Address::getCountryAndState($id_address);
            if ($address_infos['id_country']) {
                $id_country = (int) $address_infos['id_country'];
                $id_state = (int) $address_infos['id_state'];
                $zipcode = $address_infos['postcode'];
            }
        } elseif (isset($context->customer->geoloc_id_country)) {
            $id_country = (int) $context->customer->geoloc_id_country;
            $id_state = (int) $context->customer->id_state;
            $zipcode = $context->customer->postcode;
        }

        if (Tax::excludeTaxeOption()) {
            $usetax = false;
        }

        if ($usetax != false && !empty($address_infos['vat_number']) && $address_infos['id_country'] != Configuration::get('VATNUMBER_COUNTRY') && Configuration::get('VATNUMBER_MANAGEMENT')) {
            $usetax = false;
        }

        if (is_null($id_customer) && Validate::isLoadedObject($context->customer)) {
            $id_customer = $context->customer->id;
        }

        $return = PosProduct::priceCalculation($context->shop->id, $id_product, $id_product_attribute, $id_country, $id_state, $zipcode, $id_currency, $id_group, $quantity, $usetax, $decimals, $only_reduc, $usereduc, $with_ecotax, $specific_price_output, $use_group_reduction, $id_customer, $use_customer_price, $id_cart, $cart_quantity);
        return $return;
    }

    /**
     * Price calculation / Get product price
     *
     * @param int    $id_shop Shop id
     * @param int    $id_product Product id
     * @param int    $id_product_attribute Product attribute id
     * @param int    $id_country Country id
     * @param int    $id_state State id
     * @param string $zipcode
     * @param int    $id_currency Currency id
     * @param int    $id_group Group id
     * @param int    $quantity Quantity Required for Specific prices : quantity discount application
     * @param bool   $use_tax with (1) or without (0) tax
     * @param int    $decimals Number of decimals returned
     * @param bool   $only_reduc Returns only the reduction amount
     * @param bool   $use_reduc Set if the returned amount will include reduction
     * @param bool   $with_ecotax insert ecotax in price output.
     * @param null   $specific_price If a specific price applies regarding the previous parameters,
     *                               this variable is filled with the corresponding SpecificPrice object
     * @param bool   $use_group_reduction
     * @param int    $id_customer
     * @param bool   $use_customer_price
     * @param int    $id_cart
     * @param int    $real_quantity
     * @return float Product price
     * */
    public static function priceCalculation($id_shop, $id_product, $id_product_attribute, $id_country, $id_state, $zipcode, $id_currency, $id_group, $quantity, $use_tax, $decimals, $only_reduc, $use_reduc, $with_ecotax, &$specific_price, $use_group_reduction, $id_customer = 0, $use_customer_price = true, $id_cart = 0, $real_quantity = 0)
    {
        if (!class_exists('Adapter_ServiceLocator')) {
            return parent::priceCalculation(
                $id_shop,
                $id_product,
                $id_product_attribute,
                $id_country,
                $id_state,
                $zipcode,
                $id_currency,
                $id_group,
                $quantity,
                $use_tax,
                $decimals,
                $only_reduc,
                $use_reduc,
                $with_ecotax,
                $specific_price,
                $use_group_reduction,
                $id_customer,
                $use_customer_price,
                $id_cart,
                $real_quantity
            );
        }
        static $address = null;
        static $context = null;

        if ($address === null) {
            $address = new Address();
        }

        if ($context == null) {
            $context = Context::getContext()->cloneContext();
        }

        if ($id_shop !== null && $context->shop->id != (int) $id_shop) {
            $context->shop = new Shop((int) $id_shop);
        }

        if (!$use_customer_price) {
            $id_customer = 0;
        }

        if ($id_product_attribute === null) {
            $id_product_attribute = Product::getDefaultAttribute($id_product);
        }

        $cache_id = (int) $id_product . '-' . (int) $id_shop . '-' . (int) $id_currency . '-' . (int) $id_country . '-' . $id_state . '-' . $zipcode . '-' . (int) $id_group .
                '-' . (int) $quantity . '-' . (int) $id_product_attribute .
                '-' . (int) $with_ecotax . '-' . (int) $id_customer . '-' . (int) $use_group_reduction . '-' . (int) $id_cart . '-' . (int) $real_quantity .
                '-' . ($only_reduc ? '1' : '0') . '-' . ($use_reduc ? '1' : '0') . '-' . ($use_tax ? '1' : '0') . '-' . (int) $decimals;

        // reference parameter is filled before any returns
        $specific_price = SpecificPrice::getSpecificPrice((int) $id_product, $id_shop, $id_currency, $id_country, $id_group, $quantity, $id_product_attribute, $id_customer, $id_cart, $real_quantity);
        if (isset(self::$_prices[$cache_id])) {
            /* Affect reference before returning cache */
            if (isset($specific_price['price']) && $specific_price['price'] > 0) {
                $specific_price['price'] = self::$_prices[$cache_id];
            }
            return self::$_prices[$cache_id];
        }
        // fetch price & attribute price
        $cache_id_2 = $id_product . '-' . $id_shop;
        if (!isset(self::$_pricesLevel2[$cache_id_2])) {
            $sql = new DbQuery();
            $sql->select('product_shop.`price`, product_shop.`ecotax`');
            $sql->from('product', 'p');
            $sql->innerJoin('product_shop', 'product_shop', '(product_shop.id_product=p.id_product AND product_shop.id_shop = ' . (int) $id_shop . ')');
            $sql->where('p.`id_product` = ' . (int) $id_product);
            if (Combination::isFeatureActive()) {
                $sql->select('IFNULL(product_attribute_shop.id_product_attribute,0) id_product_attribute, product_attribute_shop.`price` AS attribute_price, product_attribute_shop.default_on');
                $sql->leftJoin('product_attribute_shop', 'product_attribute_shop', '(product_attribute_shop.id_product = p.id_product AND product_attribute_shop.id_shop = ' . (int) $id_shop . ')');
            } else {
                $sql->select('0 as id_product_attribute');
            }

            $res = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
            if (is_array($res) && count($res)) {
                foreach ($res as $row) {
                    $array_tmp = array(
                        'price' => $row['price'],
                        'ecotax' => $row['ecotax'],
                        'attribute_price' => (isset($row['attribute_price']) ? $row['attribute_price'] : null)
                    );
                    self::$_pricesLevel2[$cache_id_2][(int) $row['id_product_attribute']] = $array_tmp;

                    if (isset($row['default_on']) && $row['default_on'] == 1) {
                        self::$_pricesLevel2[$cache_id_2][0] = $array_tmp;
                    }
                }
            }
        }

        if (!isset(self::$_pricesLevel2[$cache_id_2][(int) $id_product_attribute])) {
            return;
        }

        $result = self::$_pricesLevel2[$cache_id_2][(int) $id_product_attribute];
        if (!$specific_price || $specific_price['price'] < 0) {
            $price = (float) $result['price'];
        } else {
            $price = (float) $specific_price['price'];
        }
        // convert only if the specific price is in the default currency (id_currency = 0)
        if (!$specific_price || !($specific_price['price'] >= 0 && $specific_price['id_currency'])) {
            $price = Tools::convertPrice($price, $id_currency);
            if (isset($specific_price['price'])) {
                $specific_price['price'] = $price;
            }
        }
        // In fact the old code from PS like this:
        // if (is_array($result) && (!$specific_price || !$specific_price['id_product_attribute']
        //      || $specific_price['price'] < 0))
        // There are two problems here:
        //  + Problem 1: If the id_product_attribute = 0, then !$specific_price['id_product_attribute'] = true
        //      => And it will always go into this if, it's wrong logic here. Because in this case we don't need
        // to count for the attribute price. It always = 0.
        //  + Problem 2: If the id_product_attribute !=0, then !$specific_price['id_product_attribute'] = false
        //      => Nothing happen in here, then we will not count attribute price in our sale price.
        //      => So the sale price was wrong.
        //
        // But why we have to care about exist specific price or not? In my understanding the attribute price
        // should always be added to base price
        // So the solution is that: just check it the attribute price is exist or not.
        // If "YES" => Added to sale price of course, nothing wrong here, then "NO" => keep as now.
        // So everything work well as expected.
        // Attribute price
        if (is_array($result) && $result['attribute_price'] != null) {
            // If you want the default combination, please use NULL value instead
            if ($id_product_attribute !== false) {
                $price += Tools::convertPrice((float) $result['attribute_price'], $id_currency);
            }
        }
        // Tax
        $address->id_country = $id_country;
        $address->id_state = $id_state;
        $address->postcode = $zipcode;

        $tax_manager = TaxManagerFactory::getManager($address, Product::getIdTaxRulesGroupByIdProduct((int) $id_product, $context));
        $product_tax_calculator = $tax_manager->getTaxCalculator();

        // Add Tax
        if ($use_tax) {
            $price = $product_tax_calculator->addTaxes($price);
        }

        // Eco Tax
        if (($result['ecotax'] || isset($result['attribute_ecotax'])) && $with_ecotax) {
            $ecotax = $result['ecotax'];
            if (isset($result['attribute_ecotax']) && $result['attribute_ecotax'] > 0) {
                $ecotax = $result['attribute_ecotax'];
            }

            if ($id_currency) {
                $ecotax = Tools::convertPrice($ecotax, $id_currency);
            }
            if ($use_tax) {
                // reinit the tax manager for ecotax handling
                $tax_manager = TaxManagerFactory::getManager($address, (int) Configuration::get('PS_ECOTAX_TAX_RULES_GROUP_ID'));
                $ecotax_tax_calculator = $tax_manager->getTaxCalculator();
                $price += $ecotax_tax_calculator->addTaxes($ecotax);
            } else {
                $price += $ecotax;
            }
        }

        // Reduction
        $specific_price_reduction = 0;
        if (($only_reduc || $use_reduc) && $specific_price) {
            if ($specific_price['reduction_type'] == 'amount') {
                $reduction_amount = $specific_price['reduction'];

                if (!$specific_price['id_currency']) {
                    $reduction_amount = Tools::convertPrice($reduction_amount, $id_currency);
                }

                $specific_price_reduction = $reduction_amount;

                // Adjust taxes if required

                if (!$use_tax && $specific_price['reduction_tax']) {
                    $specific_price_reduction = $product_tax_calculator->removeTaxes($specific_price_reduction);
                }
                if ($use_tax && !$specific_price['reduction_tax']) {
                    $specific_price_reduction = $product_tax_calculator->addTaxes($specific_price_reduction);
                }
            } else {
                $specific_price_reduction = $price * $specific_price['reduction'];
            }
        }

        if ($use_reduc) {
            $price -= $specific_price_reduction;
        }

        // Group reduction
        if ($use_group_reduction) {
            $reduction_from_category = GroupReduction::getValueForProduct($id_product, $id_group);
            if ($reduction_from_category !== false) {
                $group_reduction = $price * (float) $reduction_from_category;
            } else { // apply group reduction if there is no group reduction for this category
                $group_reduction = (($reduc = Group::getReductionByIdGroup($id_group)) != 0) ? ($price * $reduc / 100) : 0;
            }

            $price -= $group_reduction;
        }

        if ($only_reduc) {
            return Tools::ps_round($specific_price_reduction, $decimals);
        }

        $price = Tools::ps_round($price, $decimals);

        if ($price < 0) {
            $price = 0;
        }
        self::$_prices[$cache_id] = $price;
        return self::$_prices[$cache_id];
    }
}
