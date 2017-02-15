<?php
/**
 * RockPOS - Point of Sale for PrestaShop
 *
 * @author    Hamsa Technologies
 * @copyright Hamsa Technologies
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

/**
 * An "interface" for installer and upgraders
 */
abstract class PosSetup
{

    /**
     *
     * @var Module
     */
    protected $module;

    /**
     *
     * @var array
     * <pre>
     * array(
     *  string, // hook name, validated against Validate::isHookName()
     *  string
     *  ...
     * )
     */
    protected $hooks_to_register = array();

    /**
     *
     * @var array
     * <pre>
     * array(
     *  string, // hook name
     *  string
     *  ...
     * )
     */
    protected $hooks_to_unregister = array();

    /**
     *
     * @var array
     * <pre>
     * array(
     *  string => mixed,// configuration key => value
     *  string => mixed,
     *  ...
     * )
     */
    protected $configurations_to_install = array();

    /**
     *
     * @var array
     * <pre>
     * array(
     *  string, // configuration key
     *  string
     *  ...
     * )
     */
    protected $configuration_keys_to_uninstall = array();

    /**
     * 
     * @param Module $module
     */
    public function __construct(Module $module)
    {
        $this->module = $module;
    }

    /**
     * 
     * @return boolean
     */
    public function run()
    {
        $success = array();
        $success[] = $this->installConfigs();
        $success[] = array_sum($success) >= count($success) && $this->uninstallConfigs();
        $success[] = array_sum($success) >= count($success) && $this->installTabs();
        $success[] = array_sum($success) >= count($success) && $this->installTables();
        $success[] = array_sum($success) >= count($success) && $this->registerHooks();
        $success[] = array_sum($success) >= count($success) && $this->unregisterHooks();
        $success[] = array_sum($success) >= count($success) && $this->clearCache();
        return array_sum($success) >= count($success);
    }

    /**
     * 
     * @return boolean
     */
    protected function clearCache()
    {
        // Copied from AdminPerformanceController::postProcess()
        Tools::clearSmartyCache();
        Media::clearCache();
        return true;
    }

    /**
     * 
     * @return boolean
     */
    protected function registerHooks()
    {
        $success = array();
        if (!empty($this->hooks_to_register)) {
            foreach ($this->hooks_to_register as $hook_name) {
                if (Validate::isHookName($hook_name)) {
                    $success[] = array_sum($success) >= count($success) && $this->module->registerHook($hook_name);
                } else {
                    $success[] = false;
                }
            }
        }
        return array_sum($success) >= count($success);
    }

    /**
     * 
     * @return boolean
     */
    protected function unregisterHooks()
    {
        $success = array();
        if (!empty($this->hooks_to_unregister)) {
            foreach ($this->hooks_to_unregister as $hook_name) {
                if (Validate::isHookName($hook_name)) {
                    $success[] = array_sum($success) >= count($success) && $this->module->unregisterHook($hook_name);
                } else {
                    $success[] = false;
                }
            }
        }
        return array_sum($success) >= count($success);
    }

    /**
     * 
     * @param array $admin_tab
     * <pre>
     * array(
     *  'active' => boolean,
     *  'name' => string,
     *  'position' => int,
     *  'tab_class' => string
     * )
     * @return boolean
     */
    protected function installTab(array $admin_tab)
    {
        $parent_tab_id = (int) Tab::getIdFromClassName($this->module->parent_admin_tab);
        $tab = new Tab();
        $names = array();
        foreach (Language::getLanguages(false) as $language) {
            $names[$language['id_lang']] = $admin_tab['name'];
        }
        $tab->name = $names;
        $tab->class_name = $admin_tab['tab_class'];
        $tab->module = $this->module->name;
        $tab->active = (int) $admin_tab['active'];
        $tab->position = (int) $admin_tab['position'];
        if ($parent_tab_id != null) {
            $tab->id_parent = $parent_tab_id;
        }
        return $tab->add(true);
    }

    /**
     * 
     * @return boolean
     */
    protected function installConfigs()
    {
        $success = array();
        if (!empty($this->configurations_to_install)) {
            foreach ($this->configurations_to_install as $key => $value) {
                $success[] = PosConfiguration::updateValue($key, $value);
            }
        }
        return array_sum($success) >= count($success);
    }

    /**
     * 
     * @return boolean
     */
    protected function uninstallConfigs()
    {
        $success = array();
        if (!empty($this->configuration_keys_to_uninstall)) {
            foreach ($this->configuration_keys_to_uninstall as $key) {
                $success[] = PosConfiguration::deleteByName($key);
            }
        }
        return array_sum($success) >= count($success);
    }

    abstract protected function installTabs();

    abstract protected function installTables();
}
