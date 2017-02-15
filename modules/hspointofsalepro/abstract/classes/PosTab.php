<?php
/**
 * RockPOS - Point of Sale for PrestaShop
 *
 * @author    Hamsa Technologies
 * @copyright Hamsa Technologies
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

/**
 * Extended Tab for RockPOS
 */
class PosTab extends Tab
{
    /**
     * 
     * @param string $from_tab_class
     * @param string $to_tab_class
     * @return boolean
     */
    public static function copyAccesses($from_tab_class, $to_tab_class)
    {
        $from_id_tab = (int)Tab::getIdFromClassName($from_tab_class);
        $to_id_tab   = (int)Tab::getIdFromClassName($to_tab_class);
        $query       = 'REPLACE INTO `' . _DB_PREFIX_ . 'access` (`id_profile`, `id_tab`, `view`, `add`, `edit`, `delete`) '
                . 'SELECT `id_profile`, ' . (int)$to_id_tab . ', `view`, `add`, `edit`, `delete` FROM `' . _DB_PREFIX_ . 'access` WHERE `id_tab` = ' . (int)$from_id_tab;
        return Db::getInstance()->execute($query);
    }

    /**
     * 
     * @param string $parent_tab
     * @param string $suffix
     * @return boolean
     */
    public static function addSuffix($parent_tab, $suffix)
    {
        $success = array();
        $id_parent = (int) Tab::getIdFromClassName($parent_tab);
        $tabs = new PrestaShopCollection('Tab');
        $tabs->where('id_parent', '=', $id_parent);
        foreach ($tabs as $tab) {
            if (strpos($tab->class_name, $suffix) === false) {
                $tab->class_name .= $suffix;
                $success[] = $tab->update();
            }
        }
        return array_sum($success) >= count($success);
    }
    
    /**
     * 
     * @param string $module_name
     * @return boolean
     */
    public static function resetPositions($module_name)
    {
        $success = array();
        if (Db::getInstance()->execute('SET @i = 0', false)) {
            $success[] = Db::getInstance()->execute('UPDATE `'._DB_PREFIX_.'tab` SET `position` = @i:=@i+1 WHERE `module` = "'.pSQL($module_name).'" AND `id_parent` > 0 ORDER BY `position` ASC, `id_tab` DESC');
        }
        return array_sum($success) >= count($success);
    }
    
    /**
     * 
     * @param int $id_tab
     * @param int $position
     * @return boolean
     */
    public static function updateTabPosition($id_tab, $position)
    {
        $flag = true;
        $pos_tab = new self($id_tab);
        if (Validate::isLoadedObject($pos_tab)) {
            $pos_tab->position = (int) $position;
            $flag = $pos_tab->update();
        }
        return $flag;
    }
}
