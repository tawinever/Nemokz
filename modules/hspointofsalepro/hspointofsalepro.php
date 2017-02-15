<?php
/**
 * RockPOS - Point of Sale for PrestaShop
 *
 * @author    Hamsa Technologies
 * @copyright Hamsa Technologies
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

if (!defined('_PS_VERSION_')) {
    exit;
}

if (!defined('_ROCKPOS_DIR_')) {
    define('_ROCKPOS_DIR_', realpath(dirname(__FILE__)));
}

require_once(dirname(__FILE__) . '/abstract/hspointofsaleabstract.php');

/**
 * Controller general of module Point Of Sale
 */
class HsPointOfSalePro extends HsPointOfSaleAbstract
{

    public $api_key = 'HF9P4VK0TBXPLCFBVS8WF3M6MXWK54LNHSPOSP';

    /**
     * Construct
     */
    public function __construct()
    {
        $this->name = 'hspointofsalepro';
        $this->tab = 'payments_gateways';
        $this->version = _ROCKPOS_VERSION_;
        $this->package = 'Pro';
        $this->displayName = 'RockPOS';
        $this->author = 'Hamsa Technologies';
        parent::__construct();
        $this->description = $this->l('Management tool for Point of sale');
    }
}
