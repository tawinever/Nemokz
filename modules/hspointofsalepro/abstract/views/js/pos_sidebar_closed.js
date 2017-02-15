/**
 * RockPOS - Point of Sale for PrestaShop
 *
 * @author    Hamsa Technologies
 * @copyright Hamsa Technologies
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

$(document).ready(function () {
    if (!$('body').hasClass('page-sidebar-closed') && !$('body').hasClass('page-topbar'))
        $('body').addClass('page-sidebar-closed');
});