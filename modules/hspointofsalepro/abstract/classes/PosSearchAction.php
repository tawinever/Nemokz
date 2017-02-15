<?php
/**
 * RockPOS - Point of Sale for PrestaShop
 *
 * @author    Hamsa Technologies
 * @copyright Hamsa Technologies
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

/**
 * Custom Search for Point of Sale
 * - searchProducts(): only search for active products
 */
class PosSearchAction extends Search
{
    /**
     * Search for one or more products.
     *
     * @param int $id_lang
     * @param int $id_shop
     * @param string $keyword
     * @param array $id_categories
     * @param Context $context
     *
     * @return array @see self::getProductProperties()
     */
    public static function searchProducts($id_lang, $id_shop, $keyword, array $id_categories = array(), Context $context = null)
    {
        $id_lang = (int) $id_lang;
        $id_shop = (int) $id_shop;
        $context = empty($context) ? Context::getcontext() : $context;
        $scored_words = array();
        $words = explode(' ', Search::sanitize($keyword, $id_lang, false, $context->language->iso_code));
        if (!count($words)) {
            return array();
        }

        // Overriding starts
        $eligible_id_products_by_id_categories = array();
        if (!empty($id_categories)) {
            $eligible_id_products_by_id_categories = PosCategory::getIdProducts($id_categories);
        }
        // Overriding ends

        foreach ($words as $word) {
            if (self::isKeywordValid($word)) {
                $eligible_id_products_by_keyword = self::findIdProducts($word, $id_lang, $id_shop);
                $eligible_id_products_by_id_categories = !empty($eligible_id_products_by_id_categories) ? array_intersect($eligible_id_products_by_id_categories, $eligible_id_products_by_keyword) : $eligible_id_products_by_keyword;
                if ($word[0] != '-') {
                    $scored_words[] = $word;
                }
            }
        }
        $unique_eligible_id_products = array_unique($eligible_id_products_by_id_categories);

        if (empty($unique_eligible_id_products)) {
            return array();
        }
        return self::getProductProperties($unique_eligible_id_products, $scored_words, $id_lang, $id_shop);
    }
    
    /**
     * 
     * @param string $keyword
     * @return boolean
     */
    public static function isKeywordValid($keyword)
    {
        return !empty($keyword) && Tools::strlen($keyword) >= (int) Configuration::get('PS_SEARCH_MINWORDLEN');
    }
    
    /**
     * 
     * @param string $keyword
     * @param int $id_lang
     * @param int $id_shop
     * @return array
     * <pre>
     * array(
     *  int,
     *  int,
     *  ...
     * )
     */
    public static function findIdProducts($keyword, $id_lang, $id_shop)
    {
        $start_search = Configuration::get('PS_SEARCH_START') ? '%' : '';
        $end_search = Configuration::get('PS_SEARCH_END') ? '' : '%';
        $id_products = array();
        $refined_keyword = str_replace(array('%', '_'), array('\\%', '\\_'), $keyword);
        $searched_word = Tools::substr($refined_keyword, ($refined_keyword[0] == '-' ? 1 : 0), PS_SEARCH_MAX_WORD_LENGTH);
        $query = new DbQuery();
        $query->select('psi.`id_product`');
        $query->from('pos_search_word', 'psw');
        $query->leftJoin('pos_search_index', 'psi', 'psw.`id_word` = psi.`id_word`');
        $query->where('psw.`id_lang` = ' . (int) $id_lang);
        $query->where('psw.`id_shop` = ' . (int) $id_shop);
        $query->where('psw.`word` LIKE \'' . $start_search . pSQL($searched_word) . $end_search . '\'');
        foreach (Db::getInstance()->executeS($query) as $row) {
            if (!empty($row['id_product'])) {
                $id_products[] = (int) $row['id_product'];
            }
        }
        return $id_products;
    }

    /**
     * Get attributes of a list of products
     * @param array $id_products
     * @param array $scored_words list of words to sort result based on weighted scores
     * @param int $id_lang
     * @param int $id_shop
     * @return array
     * <pre>
     * array(
     *  int => array(
     *      'id_product' => int,
     *      'pname' => string,// Product name
     *      'reference' => string,
     *      'quantity' => int,
     *  )
     * )
     */
    public static function getProductProperties(array $id_products, array $scored_words = array(), $id_lang = null, $id_shop = null)
    {
        $product_query = new DbQuery();
        if (count($scored_words)) {
            $id_lang = (int) (!empty($id_lang) ? $id_lang : Context::getcontext()->language->id);
            $shop = !empty($id_shop) ? new Shop($id_shop) : Context::getcontext()->shop;
            $start_search = Configuration::get('PS_SEARCH_START') ? '%' : '';
            $end_search = Configuration::get('PS_SEARCH_END') ? '' : '%';
            $score_query = new DbQuery();
            $score_query->select('SUM(`weight`)');
            $score_query->from('pos_search_word', 'psw');
            $score_query->leftJoin('pos_search_index', 'psi', 'psw.`id_word` = psi.`id_word`');
            $score_query->where('psw.`id_lang` = ' . $id_lang);
            $score_query->where('psw.`id_shop` = ' . (int) $shop->id);
            $score_where = array();
            foreach ($scored_words as $scored_word) {
                $score_where[] = 'psw.`word` LIKE \'' . $start_search . pSQL(Tools::substr($scored_word, 0, PS_SEARCH_MAX_WORD_LENGTH)) . $end_search . '\'';
            }
            $score_query->where(implode(' OR ', $score_where));
            $product_query->select('(' . $score_query->build() . ') `position`');
        }
        $product_query->select('p.`id_product`');
        $product_query->select('IFNULL(pa.`id_product_attribute`,0) `id_product_attribute`');
        $product_query->select('p.`reference` AS `reference`');
        $product_query->select('pl.`name` AS `pname`');
        $product_query->select('stock.`quantity`');
        $product_query->from('product', 'p');
        $product_query->leftJoin('product_attribute', 'pa', 'pa.`id_product` = p.`id_product`');
        $product_query->join(Shop::addSqlAssociation('product', 'p'));
        $product_query->innerJoin('product_lang', 'pl', 'p.`id_product` = pl.`id_product` AND pl.`id_lang` = ' . $id_lang);
        $product_query->join(Product::sqlStock('p', null, false, $shop));
        $product_query->where('p.`id_product` IN ('.implode(',', $id_products).')');
        $product_query->where('ISNULL(pa.`default_on`) OR pa.`default_on` = 1');
        $product_query->where(PosConfiguration::get('POS_ORDER_OUT_OF_STOCK') ? null : 'stock.`quantity` > 0');
        $product_query->groupBy('p.`id_product`');
        $product_query->orderBy('`position` DESC');
        return Db::getInstance()->executeS($product_query);
    }

    /**
     * get a product by barcode.
     *
     * @param string $barcode
     * @return array
     * <pre>
     * array(
     *  'id_product' => int,
     *  'id_product_attribute' => int
     * )
     */
    public static function searchProductByBarcode($barcode)
    {
        $query = new DbQuery();
        $query->select('p.`id_product`, pa.`id_product_attribute`');
        $query->from('product', 'p');
        $query->join(Shop::addSqlAssociation('product', 'p'));
        $query->leftJoin('product_attribute', 'pa', 'pa.`id_product` = p.`id_product`');
        $query->join(Shop::addSqlAssociation('product_attribute', 'pa', false));
        // If a product has combination, join on "sa.`id_product_attribute` = pa.`id_product_attribute`".
        // If a product does not have any combination, join on "sa.`id_product_attribute` = 0".
        //
        // Here are the technical details:
        // Let's say:
        // Product (ID = 1) has 2 combinations and 5 quantities each.
        // Product (ID = 2) does not have any combination and quantity is 10.
        //
        // [product] (table)
        // id_product
        // 1
        // 2
        // [product_attribute](table)
        // id_product | id_product_attribute
        // 1 | 1
        // 1 | 2
        // [stock_available] (table)
        // id_product | id_product_attribute | quantity
        // 1 | 0 | 10
        // 1 | 1 | 5
        // 1 | 2 | 5
        // 2 | 0 | 10
        //
        // NOTICE 1: If a product does not have any combination,
        // there will be NO related record in [product_attribute].
        // It leads to NULL value (product_attribute.id_product_attribute) in a LEFT JOIN query.
        // But if a product has at least 1 combination, everything goes fine without any exception.
        //
        // NOTICE 2: Even with or without a combination,
        // there will be ALWAYS at least 1 record (whose "id_product_attribute" is 0)
        // which presents total of stock of that product (including combination's stock if any)
        $query->leftJoin('stock_available', 'sa', 'sa.`id_product` = p.`id_product` AND (sa.`id_product_attribute` = pa.`id_product_attribute` OR (ISNULL(pa.`id_product_attribute`) AND sa.`id_product_attribute` = 0))');
        $query->where(!PosConfiguration::get('POS_ORDER_DISABLED_PRODUCTS') ? 'p.`active` = 1' : null);
        $query->where(PosConfiguration::get('POS_ORDER_OUT_OF_STOCK') ? null : 'sa.`quantity` > 0');
        $sanitized_barcode = pSQL($barcode);
        $where = array();
        // If barcode contains letters (non-digits), this is not a standard barcode (EAN, UPC).
        // In this case, barcode is usually stored in reference fields.
        // Some shop owners also store valid barcodes (EAN, UPC) in reference fields even though, it's not highly recommended.
        $where_fields = array('upc', 'ean13', 'reference');
        foreach ($where_fields as $where_field) {
            $where[] = "p.`$where_field` = '$sanitized_barcode'"; // Product's field
            $where[] = "pa.`$where_field` = '$sanitized_barcode'"; // Combination's field
        }
        $query->where(implode(' OR ', $where));
        $query->groupBy('pa.`id_product_attribute`')->orderBy('pa.`default_on` DESC');
        return Db::getInstance()->getRow($query);
    }

    /**
     * Search products by categories.
     *
     * @param array   $id_categories
     * @param int     $limit
     * @param Context $context
     *
     * @return array
     *               array = (<pre>
     *               [0] => Array
     *               (
     *               [id_product] => int
     *               [reference] => string
     *               [id_shop] => int
     *               [pname] => string
     *               [id_product_attribute] => int
     *               [position] => int
     *               [quantity] => int
     *               [combination] => string
     *               [stock] => int/string
     *               [item] => string (items / item)
     *               )
     *               [1] =>Array()
     *               ...
     *               )</pre>
     */
    public static function searchProductsByCategories(array $id_categories = array(), $limit = 12, Context $context = null)
    {
        if (!$context) {
            $context = Context::getcontext();
        }
        $id_lang = (int) $context->language->id;
        $id_shop = (int) $context->shop->id;
        $eligible_products = PosCategory::getIdProducts($id_categories);
        if (empty($eligible_products)) {
            return array();
        }
        $sql = 'SELECT p.`id_product`,
                        p.`reference`,
                        pl.`link_rewrite`,
                        product_shop.`id_shop`,
                        pl.`name` AS `pname`,
                        i.`id_image`
                FROM `'._DB_PREFIX_.'product` p
                '.Shop::addSqlAssociation('product', 'p').'
                INNER JOIN `'._DB_PREFIX_.'product_lang` pl
                ON p.`id_product` = pl.`id_product`
                    AND pl.`id_lang` = '.(int) $id_lang.'
                LEFT JOIN `'._DB_PREFIX_.'image` i
                        ON i.`id_product` = p.`id_product`
                LEFT JOIN `'._DB_PREFIX_.'image_shop` image_shop
                    ON (image_shop.`id_image` = i.`id_image`
                        AND image_shop.cover=1 AND image_shop.id_shop='.(int) $id_shop.')
                LEFT JOIN `'._DB_PREFIX_.'image_lang` il
                    ON (image_shop.`id_image` = il.`id_image`
                        AND il.`id_lang` = '.(int) $id_lang.')
                WHERE p.`id_product` IN ('.implode(',', $eligible_products).')
                GROUP BY p.`id_product`
                ORDER BY `pname` ASC
                LIMIT '.(int) $limit;
        $products = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
        $use_tax = Configuration::get('PS_TAX') && !Product::getTaxCalculationMethod((int) $context->cookie->id_customer);
        foreach ($products as &$product) {
            $product['price'] = PosProduct::getPriceStatic($product['id_product'], $use_tax, null, 2);
        }

        return $products;
    }
}
