/**
 * RockPOS - Point of Sale for PrestaShop
 *
 * @author    Hamsa Technologies
 * @copyright Hamsa Technologies
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */
var PosHooks = function ()
{
    /**
     * Listen event add product to cart
     * @param {int} idProduct
     * @param {int} idProductAttribute
     * @param {function} beforeSuccessCallback to be executed on success
     * @param {function} beforeSuccessCallback to be executed after success
     */
    this.hookPosAddToCart = function (idProduct, idProductAttribute, beforeSuccessCallback, afterSuccessCallback)
    {
        PosHandler.posCart.addProductToCart(idProduct, idProductAttribute, beforeSuccessCallback, afterSuccessCallback);
    };
};