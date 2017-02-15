/**
 * RockPOS - Point of Sale for PrestaShop
 *
 * @author    Hamsa Technologies
 * @copyright Hamsa Technologies
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 * 
 * Depends:
 * - stPos.url
 */
var PosOrder = function (idOrder)
{
    this.idOrder = idOrder;
    this.printInvoice = function () {
        if (typeof stPos.url.printInvoice !== 'undefined')
        {
            url = stPos.url.printInvoice + '&id_order=' + this.idOrder;
            window.open(url, '_blank');
        }
    };
    this.printReceipt = function () {
        if (typeof stPos.url.printReceipt !== 'undefined')
        {
            url = stPos.url.printReceipt + '&id_order=' + this.idOrder;
            window.open(url, '_blank');
        }
    };
    return this;
}