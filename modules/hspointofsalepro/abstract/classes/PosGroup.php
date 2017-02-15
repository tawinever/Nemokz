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
class PosGroup extends Group
{
    /**
     * Update (or create) restrictions for modules by group
     * @return boolean
     */
    public function updateModulesRestriction()
    {
        $default_group = new self((int) PosConfiguration::get('PS_CUSTOMER_GROUP'));
        $id_modules = $default_group->getAuthorizedModules();
        $shops = Shop::getShops(true, null, true);
        self::truncateModulesRestrictions($this->id);
        return self::addModulesRestrictions($this->id, $id_modules, $shops);
    }

    /**
     * @return array
     *  array(<pre>
     *  int,
     *  int,
     *  ....
     * )</pre>
     */
    protected function getAuthorizedModules()
    {
        $modules = Module::getAuthorizedModules($this->id);
        $id_modules = array();
        if (!empty($modules)) {
            foreach ($modules as $module) {
                $id_modules[] = $module['id_module'];
            }
        }
        return array_unique($id_modules);
    }

    /**
     * A method to display price in POS
     * @return int
     */
    public static function getPosPriceDisplayMethod()
    {
        return parent::getPriceDisplayMethod((int) PosConfiguration::get('POS_CUSTOMER_ID_GROUP', 0));
    }
}
