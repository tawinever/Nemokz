<?php
/**
 * RockPOS - Point of Sale for PrestaShop
 *
 * @author    Hamsa Technologies
 * @copyright Hamsa Technologies
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

/**
 * Abstract class for all upgraders
 */
abstract class PosUpgrader extends PosSetup
{
    /**
     *
     * @var string // x.y.z
     */
    protected $version;

    /**
     * 
     * @param Module $module
     * @param string $version // x.y.z
     */
    public function __construct(Module $module, $version)
    {
        parent::__construct($module);
        $this->version = $version;
    }

    public function run()
    {
        $success = array();
        $success[] = !empty($this->version);
        $success[] = array_sum($success) >= count($success) && parent::run();
        $success[] = array_sum($success) >= count($success) && $this->installOthers();
        $success[] = array_sum($success) >= count($success) && $this->cleanUpFiles();
        $success[] = array_sum($success) >= count($success) && $this->cleanUpDirectories();
        return array_sum($success) >= count($success);
    }

    /**
     * 
     * @return boolean
     */
    protected function installTabs()
    {
        return true;
    }

    /**
     * 
     * @return boolean
     */
    protected function installTables()
    {
        return true;
    }

    /**
     * 
     * @return boolean
     */
    protected function cleanUpFiles()
    {
        return true;
    }

    /**
     * 
     * @return boolean
     */
    protected function cleanUpDirectories()
    {
        return true;
    }

    /**
     * 
     * @return boolean
     */
    protected function installOthers()
    {
        return true;
    }
}
