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

class PosObjectModel extends ObjectModel
{
    /**
     * 
     * @param string $old_name
     * @param string $new_name
     * @return boolean
     */
    public static function renameTable($old_name, $new_name)
    {
        $success = array();
        $list_tables = Db::getInstance()->executeS('SHOW TABLES LIKE "' . _DB_PREFIX_ . pSQL($old_name) . '"');
        if (!empty($list_tables)) {
            $query = 'RENAME TABLE `' . _DB_PREFIX_ . pSQL($old_name) . '` TO `' . _DB_PREFIX_ . pSQL($new_name) . '`';
            $success[] = Db::getInstance()->execute($query);
        }
        return array_sum($success) >= count($success);
    }

    /**
     * 
     * @param string $table
     * @param string $old_name
     * @param string $new_name
     * @return boolean
     */
    public static function renameColumn($table, $old_name, $new_name)
    {
        $success = array();
        try {
            $information_field = Db::getInstance()->executeS('SHOW FIELDS FROM  `' . _DB_PREFIX_ . pSQL($table) . '` WHERE Field = \'' . pSQL($old_name) . '\' ');
            if (!empty($information_field)) {
                $information_field = array_shift($information_field);
                $query = 'ALTER TABLE `' . _DB_PREFIX_ . pSQL($table) . '` CHANGE `' . pSQL($old_name) . '` `' . pSQL($new_name) . '` ' . $information_field['Type'];
                $query .= $information_field['Null'] == 'NO' ? ' NOT NULL ' : ' NULL ';
                $query .= $information_field['Extra'] ? $information_field['Extra'] : ' ';
                $success[] = Db::getInstance()->execute($query);
            }
        } catch (Exception $exception) {
            $success[] = false;
        }
        return array_sum($success) >= count($success);
    }
}
