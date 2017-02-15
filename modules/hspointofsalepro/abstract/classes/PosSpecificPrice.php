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
class PosSpecificPrice extends SpecificPrice
{

    /**
     * Override empty cache specific price after delete
     *
     * @param int $id_cart
     * @param int $id_product Default = false
     * @param int $id_product_attribute Default = false
     *
     * @return boolean
     */
    public static function deleteByIdCart($id_cart, $id_product = false, $id_product_attribute = false)
    {
        $result = false;
        if ((int) $id_cart) {
            SpecificPrice::$_specificPriceCache = array();
            Product::flushPriceCache();
            $result = parent::deleteByIdCart((int) $id_cart, (int) $id_product, (int) $id_product_attribute);
        }
        return $result;
    }

    /**
     * Check existing specific price of product.
     *
     * @param int $id_cart
     * @param int $id_product
     * @param int $id_product_attribute
     *
     * @return booelen
     */
    public static function doesSpecificPriceExist($id_cart, $id_product, $id_product_attribute)
    {
        $query = ' 
                SELECT  
                    count(*)
                FROM	
                    `' . _DB_PREFIX_ . 'specific_price`
                WHERE  
                    `id_cart` = ' . (int) $id_cart . '
                    AND `id_product` = ' . (int) $id_product . ' 
                    AND `id_product_attribute` = ' . (int) $id_product_attribute;

        return (bool) Db::getInstance(_PS_USE_SQL_SLAVE_)->getValue($query);
    }

    /**
     * Update new combination of product in cart.
     *
     * @param int $id_cart
     * @param int $id_product
     * @param int $new_id_product_attribute
     * @param int $old_id_product_attribute
     *
     * @return boolean
     */
    public static function updateProductCombination($id_cart, $id_product, $new_id_product_attribute, $old_id_product_attribute)
    {
        $query = ' 
                UPDATE 
                    `' . _DB_PREFIX_ . 'specific_price`
                SET 
                    `id_product_attribute` = ' . (int) $new_id_product_attribute . '

                WHERE  
                    `id_cart` = ' . (int) $id_cart . '
                    AND `id_product` = ' . (int) $id_product . ' 
                    AND `id_product_attribute` = ' . (int) $old_id_product_attribute;

        return Db::getInstance()->execute($query);
    }

    /**
     * @see parent::getSpecificPrice()
     * @override: only return what's clearly set to the current cart
     * @return array
     * <pre>
     * array(
     * 'id_specific_price' => int
     * 'id_specific_price_rule' => int,
     * 'id_cart' => int,
     * 'id_product' => int,
     * 'id_shop' => int,
     * 'id_shop_group' => int,
     * 'id_currency' => int,
     * 'id_country' => int,
     * 'id_group' => int,
     * 'id_customer' => int,
     * 'id_product_attribute' => int,
     * 'price' => float,
     * 'from_quantity' => int,
     * 'reduction' => float,
     * 'reduction_tax' => int,
     * 'reduction_type' => string,//percentage, amount
     * 'from' => datetime,
     * 'to' => datetime,
     * 'score' => int
     * )
     */
    public static function getSpecificPrice($id_product, $id_shop, $id_currency, $id_country, $id_group, $quantity, $id_product_attribute = null, $id_customer = 0, $id_cart = 0, $real_quantity = 0)
    {
        $specific_price = parent::getSpecificPrice($id_product, $id_shop, $id_currency, $id_country, $id_group, $quantity, $id_product_attribute, $id_customer, $id_cart, $real_quantity);
        if (!empty($specific_price) && $specific_price['id_cart'] == $id_cart) {
            return $specific_price;
        }
        return array();
    }
}
