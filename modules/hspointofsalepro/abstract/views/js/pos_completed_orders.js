/**
 * RockPOS - Point of Sale for PrestaShop
 *
 * @author    Hamsa Technologies
 * @copyright Hamsa Technologies
 
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */
$(document).ready(function ()
{
    if (
            typeof stPos !== 'undefined' &&
            typeof stPos.url !== 'undefined'
            )
    {
        // assign PosCart to PosHandler
        if (typeof stPos.url.ajaxUrl !== 'undefined') {
            var posCart = new PosCart({ajaxUrl: stPos.url.ajaxUrl, lang: stPos.lang, ajaxUrls:stPos.url});            
            posCart.init();
        }
    }
    // just try to make the design more beatiful
    if ($('.table th').hasClass('actions'))
    {
        $('.actions').prev().remove();
        $('.table thead tr:first th:last').remove();
    }
});
