/**
 * RockPOS - Point of Sale for PrestaShop
 *
 * @author    Hamsa Technologies
 * @copyright Hamsa Technologies
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

/**
 * Handle global variable for POS module
 * @returns {ROCKPOS}
 */
var ROCKPOS = function(){
    /**
     * idCart of current transaction
     */
    this.idCart = null;
    
    /**
     * current version of RockPOS
     * @string
     */
    this.version = null;
};