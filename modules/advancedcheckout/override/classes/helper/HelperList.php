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

class HelperList extends HelperListCore
{
    public function hasBulkActions($has_value = false)
    {
        if (isset($this->context->controller->module->name) &&
            $this->context->controller->module->name == 'advancedcheckout') {
            return false;
        } else {
            return parent::hasBulkActions($has_value);
        }
    }
}
