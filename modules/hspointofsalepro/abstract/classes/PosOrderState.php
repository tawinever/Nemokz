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
class PosOrderState extends OrderState
{
    /**
     * Store list of ids order state completed sale.
     *
     * @var array
     */
    protected static $cache_id_order_states = array();

    /**
     * Get first order state id of point of sale.
     *
     * @return int
     */
    public static function getFistOrderStateId()
    {
        return Db::getInstance(_PS_USE_SQL_SLAVE_)->getValue('
					SELECT 
                                            `id_order_state`
                                        FROM 
                                            `'._DB_PREFIX_.'order_state`
                                        WHERE 
                                            `deleted` = 0
                                            AND `logable` = 1
                                            AND `delivery` = 1	
                                        ORDER BY `id_order_state` DESC');
    }

    /**
     * Get id order states are shipped.
     *
     * @return array
     *               array
     *               ( <pre>
     *               [0] => int
     *               [1] => int
     *               )</pre>
     */
    public static function getShippedIdOrderStates()
    {
        if (empty(self::$cache_id_order_states)) {
            $sql = 'SELECT `id_order_state`
                    FROM `'._DB_PREFIX_.'order_state`
                    WHERE `deleted` = 0
                            AND `logable` = 1
                            AND `shipped` = 1
                    ORDER BY `id_order_state` DESC';
            $results = Db::getInstance(_PS_USE_SQL_SLAVE_)->ExecuteS($sql);
            $id_order_states = array();
            foreach ($results as $result) {
                $id_order_states[] = $result['id_order_state'];
            }
            self::$cache_id_order_states = $id_order_states;
        }

        return self::$cache_id_order_states;
    }

    /**
     * @return array
     *               array ( <pre>
     *               0 => int,
     *               1 => int,
     *               ...
     *               )</pre>
     */
    public static function getSelectedIdOrderStates()
    {
        return explode(',', Configuration::get('POS_SELECTED_ORDER_STATES'));
    }

    /**
     * @param int $id_lang
     *
     * @return array
     *               array<pre>
     *               (
     *               [0] => array
     *               (
     *               [id_order_state] => int
     *               [invoice] => boolean
     *               [send_email] => boolean
     *               [module_name] => string
     *               [color] => string
     *               [merged] => boolean
     *               [unremovable] => boolean
     *               [hidden] => boolean
     *               [logable] => boolean
     *               [delivery] => boolean
     *               [shipped] => boolean
     *               [paid] => boolean
     *               [pdf_invoice] => boolean
     *               [pdf_delivery] => boolean
     *               [deleted] => boolean
     *               [id_lang] => boolean
     *               [name] => string
     *               [template] => string
     *               )
     *               ...
     *               )</pre>
     */
    public static function getSelectedOrderStates($id_lang)
    {
        $order_states = OrderState::getOrderStates((int) $id_lang);
        $selected_id_order_states = self::getSelectedIdOrderStates();
        foreach ($order_states as $index => $order_state) {
            if (!in_array($order_state['id_order_state'], $selected_id_order_states)) {
                unset($order_states[$index]);
            }
        }

        return $order_states;
    }
}
