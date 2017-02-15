<?php
/**
 * RockPOS - Point of Sale for PrestaShop
 *
 * @author    Hamsa Technologies
 * @copyright Hamsa Technologies
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

/**
 * @todo: This class should not exist. Instead, let's move to a meaningful model.
 */
class PosReport
{
    /**
     * Get report data.
     *
     * @param datetime $date_from   date from
     * @param datetime $date_to     date to
     * @param array $order_references
     * @param int      $id_employee Id employee
     *
     * @return array
     *               <pre>
     *               array(
     *               'orders' => array(
     *               int => int,
     *               ...........    
     *               ),
     *               'total_paid_tax_excl' => array(
     *               int => float,
     *               ............
     *               ),
     *               'total_purchases' => array(
     *               int => float,
     *               ............    
     *               ),
     *               'total_expenses' => array(
     *               int => float,
     *               )   
     *               )
     */
    public function getGrossData($date_from, $date_to, array $order_references, $id_employee = 0)
    {
        $gross_data = array(
            'orders' => 0,
            'total_paid_tax_excl' => 0,
            'total_purchases' => 0,
            'total_expenses' => 0,
        );
        $gross_data['orders'] = self::getOrders($date_from, $date_to, $order_references, $id_employee);
        $gross_data['total_paid_tax_excl'] = self::getTotalSales($date_from, $date_to, $order_references, $id_employee);
        $gross_data['total_purchases'] = self::getPurchases($date_from, $date_to, $order_references, $id_employee);
        $gross_data['total_expenses'] = self::getExpenses($date_from, $date_to, $order_references, $id_employee);
        return $gross_data;
    }

    /**
     * Refine report data.
     *
     * @param datetime $date_from
     * @param datetime $date_to
     * @param array    $gross_data see at seft::getData()
     *
     * @return array
     *               <pre>
     *               array(
     *               'sales' => array(
     *               int => float,
     *               ...........
     *               ),
     *               'orders' => array(
     *               int => int,
     *               ...........    
     *               ),
     *               'net_profits' => array(
     *               int => float,
     *               ............
     *               )
     *               )
     */
    public function refineData($date_from, $date_to, array $gross_data)
    {
        $refined_data = array(
            'sales' => array(),
            'orders' => array(),
            'net_profits' => array(),
        );
        $from = strtotime($date_from.' 00:00:00');
        $to = min(time(), strtotime($date_to.' 23:59:59'));
        for ($date = $from; $date <= $to; $date = strtotime('+1 day', $date)) {
            $refined_data['sales'][$date] = 0;
            if (isset($gross_data['total_paid_tax_excl'][$date])) {
                $refined_data['sales'][$date] += $gross_data['total_paid_tax_excl'][$date];
            }
            $refined_data['orders'][$date] = isset($gross_data['orders'][$date]) ? $gross_data['orders'][$date] : 0;
            $refined_data['net_profits'][$date] = 0;
            if (isset($gross_data['total_paid_tax_excl'][$date])) {
                $refined_data['net_profits'][$date] += $gross_data['total_paid_tax_excl'][$date];
            }
            if (isset($gross_data['total_purchases'][$date])) {
                $refined_data['net_profits'][$date] -= $gross_data['total_purchases'][$date];
            }
            if (isset($gross_data['total_expenses'][$date]) && $gross_data['total_expenses'][$date] > 0) {
                $refined_data['net_profits'][$date] -= $gross_data['total_expenses'][$date];
            }
        }

        return $refined_data;
    }

    /**
     * @param array $report_data report data after refined
     *
     * @return array
     *               <pre>
     *               array(
     *               'sales' => float,
     *               'orders' => int,
     *               'net_profits' => float
     *               )
     */
    public function getSumarryData($report_data)
    {
        $summing = array(
            'sales' => 0,
            'orders' => 0,
            'net_profits' => 0,
        );
        $summing['sales'] = array_sum($report_data['sales']);
        $summing['orders'] = array_sum($report_data['orders']);
        $summing['net_profits'] = array_sum($report_data['net_profits']);

        return $summing;
    }

    /**
     * @param datetime $date_from
     * @param datetime $date_to
     * @param array $order_references
     * @param int      $id_employee Id employee
     *
     * @return array
     *               <pre>
     *               array(
     *               int => float,
     *               ............
     *               )
     */
    public static function getTotalSales($date_from, $date_to, array $order_references, $id_employee = 0)
    {
        $sales = array();
        $result = Db::getInstance(_PS_USE_SQL_SLAVE_)->ExecuteS('
			SELECT LEFT(o.`date_add`, 10) AS `date`, SUM(o.`total_paid_tax_excl` / o.`conversion_rate`) AS `sales`
			FROM `'._DB_PREFIX_.'pos_orders` po 
                        LEFT JOIN `'._DB_PREFIX_.'orders` o ON o.`id_order` = po.`id_pos_order`
			LEFT JOIN `'._DB_PREFIX_.'order_state` os ON o.`current_state` = os.`id_order_state`
			WHERE o.`date_add` BETWEEN "'.pSQL($date_from).' 00:00:00" AND "'.pSQL($date_to).' 23:59:59" AND os.`logable` = 1
			'.Shop::addSqlRestriction(false, 'o').(((int) $id_employee > 0) ? ' AND po.`id_employee`='.(int) $id_employee : '').'
                            AND o.`reference` IN ("'.implode('","', $order_references).'")
			GROUP BY LEFT(o.`date_add`, 10)');
        foreach ($result as $row) {
            $sales[strtotime($row['date'])] = $row['sales'];
        }

        return $sales;
    }

    /**
     * @param datetime $date_from
     * @param datetime $date_to
     * @param array $order_references
     * @param int      $id_employee Id employee
     *
     * @return array
     *               <pre>
     *               array(
     *               int => float,
     *               ............
     *               )
     */
    public static function getOrders($date_from, $date_to, array $order_references, $id_employee = 0)
    {
        $orders = array();
        $result = Db::getInstance(_PS_USE_SQL_SLAVE_)->ExecuteS('
                    SELECT LEFT(o.`date_add`, 10) AS `date`, COUNT(*) AS `orders`
                    FROM `'._DB_PREFIX_.'pos_orders` po 
                    LEFT JOIN `'._DB_PREFIX_.'orders` o ON o.`id_order` = po.`id_pos_order`
                    LEFT JOIN `'._DB_PREFIX_.'order_state` os ON o.`current_state` = os.`id_order_state`
                    WHERE o.`date_add` BETWEEN "'.pSQL($date_from).' 00:00:00" AND "'.pSQL($date_to).' 23:59:59" AND os.`logable` = 1
                    '.Shop::addSqlRestriction(false, 'o').(((int) $id_employee > 0) ? ' AND po.`id_employee`='.(int) $id_employee : '').'
                        AND o.`reference` IN ("'.implode('","', $order_references).'")    
                    GROUP BY LEFT(o.`date_add`, 10)');
      
        foreach ($result as $row) {
            $orders[strtotime($row['date'])] = (int) $row['orders'];
        }
        return $orders;
    }

    /**
     * @param datetime $date_from
     * @param datetime $date_to
     * @param array $order_references
     * @param int      $id_employee Id employee
     *
     * @return array
     *               <pre>
     *               array(
     *               int => float,
     *               ............
     *               )
     */
    public static function getPurchases($date_from, $date_to, array $order_references, $id_employee = 0)
    {
        $purchases = array();
        $result = Db::getInstance(_PS_USE_SQL_SLAVE_)->ExecuteS('
                    SELECT
                            LEFT(o.`date_add`, 10) AS `date`,
                            SUM(od.`product_quantity` * IF(
                                    od.`purchase_supplier_price` > 0,
                                    od.`purchase_supplier_price` / o.`conversion_rate`,
                                    od.`original_product_price` * '.(int) Configuration::get('CONF_AVERAGE_PRODUCT_MARGIN').' / 100
                            )) AS `total_purchase_price`
                    FROM `'._DB_PREFIX_.'pos_orders` po 
                    LEFT JOIN `'._DB_PREFIX_.'orders` o ON o.`id_order` = po.`id_pos_order`
                    LEFT JOIN `'._DB_PREFIX_.'order_detail` od ON o.`id_order` = od.`id_order`
                    LEFT JOIN `'._DB_PREFIX_.'order_state` os ON o.`current_state` = os.`id_order_state`
                    WHERE o.`date_add` BETWEEN "'.pSQL($date_from).' 00:00:00" AND "'.pSQL($date_to).' 23:59:59" AND os.`logable` = 1
                    '.Shop::addSqlRestriction(false, 'o').(((int) $id_employee > 0) ? ' AND po.`id_employee`='.(int) $id_employee : '').'
                        AND o.`reference` IN ("'.implode('","', $order_references).'")
                    GROUP BY LEFT(o.`date_add`, 10)');
        foreach ($result as $row) {
            $purchases[strtotime($row['date'])] = $row['total_purchase_price'];
        }
        return $purchases;
    }

    /**
     * @param datetime $date_from
     * @param datetime $date_to
     * @param array $order_references
     * @param int   $id_employee
     *
     * @return array
     *               <pre>
     *               array(
     *               int => float,
     *               ............
     *               )
     */
    public static function getExpenses($date_from, $date_to, array $order_references, $id_employee = 0)
    {
        $expenses = array();
        $orders = Db::getInstance()->ExecuteS('
		SELECT
			LEFT(o.`date_add`, 10) AS `date`,
			o.`total_paid_tax_incl` / o.`conversion_rate` AS `total_paid_tax_incl`,
			o.`total_shipping_tax_excl` / o.`conversion_rate` AS `total_shipping_tax_excl`,
			o.`module`,
			a.`id_country`,
			o.`id_currency`,
			c.`id_reference` AS `carrier_reference`
                FROM `'._DB_PREFIX_.'pos_orders` po
		LEFT JOIN `'._DB_PREFIX_.'orders` o ON o.`id_order` = po.`id_pos_order`
		LEFT JOIN `'._DB_PREFIX_.'address` a ON o.`id_address_delivery` = a.`id_address`
		LEFT JOIN `'._DB_PREFIX_.'carrier` c ON o.`id_carrier` = c.`id_carrier`
		LEFT JOIN `'._DB_PREFIX_.'order_state` os ON o.`current_state` = os.`id_order_state`
		WHERE o.`date_add` BETWEEN "'.pSQL($date_from).' 00:00:00" AND "'.pSQL($date_to).' 23:59:59" AND os.`logable` = 1
                    AND o.`reference` IN ("'.implode('","', $order_references).'")
		'.Shop::addSqlRestriction(false, 'o').(((int) $id_employee > 0) ? ' AND po.`id_employee`='.(int) $id_employee : ''));
        foreach ($orders as $order) {
            // Add flat fees for this order
            $flat_fees = Configuration::get('CONF_ORDER_FIXED') + (
                    $order['id_currency'] == Configuration::get('PS_CURRENCY_DEFAULT') ? Configuration::get('CONF_'.Tools::strtoupper($order['module']).'_FIXED') : Configuration::get('CONF_'.Tools::strtoupper($order['module']).'_FIXED_FOREIGN')
                    );

            // Add variable fees for this order
            $var_fees = $order['total_paid_tax_incl'] * (
                    $order['id_currency'] == Configuration::get('PS_CURRENCY_DEFAULT') ? Configuration::get('CONF_'.Tools::strtoupper($order['module']).'_VAR') : Configuration::get('CONF_'.Tools::strtoupper($order['module']).'_VAR_FOREIGN')
                    ) / 100;

            // Add shipping fees for this order
            $shipping_fees = $order['total_shipping_tax_excl'] * (
                    $order['id_country'] == Configuration::get('PS_COUNTRY_DEFAULT') ? Configuration::get('CONF_'.Tools::strtoupper($order['carrier_reference']).'_SHIP') : Configuration::get('CONF_'.Tools::strtoupper($order['carrier_reference']).'_SHIP_OVERSEAS')
                    ) / 100;
            if (!isset($expenses[strtotime($order['date'])])) {
                $expenses[strtotime($order['date'])] = 0;
            }
            // Tally up these fees
            $expenses[strtotime($order['date'])] += $flat_fees + $var_fees + $shipping_fees;
        }

        return $expenses;
    }
}
