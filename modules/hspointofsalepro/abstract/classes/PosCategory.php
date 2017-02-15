<?php
/**
 * RockPOS - Point of Sale for PrestaShop
 *
 * @author    Hamsa Technologies
 * @copyright Hamsa Technologies
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

/**
 * Custom Category for Point of Sale
 */
class PosCategory extends Category
{
    /**
     *
     * @param array $id_categories
     * @return array
     *  <pre>array
     *  (
     *      int,
     *      int,
     *      ...
     *  )</pre>
     */
    public static function getIdProducts(array $id_categories = array())
    {
        $query = new DbQuery();
        $query->select('DISTINCT cp.`id_product`');
        $query->from('category_product', 'cp');
        $query->where(!empty($id_categories) ? 'cp.`id_category` IN ('.implode(',', $id_categories).')' : null);
        $products = Db::getInstance()->executeS($query);
        $id_products = array();
        if (!empty($products)) {
            foreach ($products as $product) {
                $id_products[] = $product['id_product'];
            }
        }
        return $id_products;
    }
}
