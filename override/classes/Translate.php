<?php
/**
* Module is prohibited to sales! Violation of this condition leads to the deprivation of the license!
*
* @category  Front Office Features
* @package   Advanced Checkout Module
* @author    Maxim Bespechalnih <2343319@gmail.com>
* @copyright 2013-2015 Max
* @license   license.txt in the module folder.
*/
class Translate extends TranslateCore
{
    /*
    * module: advancedcheckout
    * date: 2016-11-30 19:49:55
    * version: 3.1.7
    */
    public static function getModuleTranslation($module, $string, $source, $sprintf = null, $js = false)
    {
        if (strpos($source, 'AdvancedCheckout') !== false || strpos($source, 'AdminAdv') !== false) {
            $source = str_replace('controller', '', $source);
        }
        return parent::getModuleTranslation($module, $string, $source, $sprintf, $js);
    }
}
