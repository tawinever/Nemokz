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

require_once(dirname(__FILE__).'/../../config/config.inc.php');
require_once(dirname(__FILE__).'/../../init.php');
require_once(dirname(__FILE__).'/advancedcheckout.php');
require_once(dirname(__FILE__).'/classes/FieldClass.php');
$advancedcheckout = new advancedcheckout();
$return = array();
if (Tools::GetValue('action')) {
    $action = Tools::GetValue('action');
    $token = Tools::encrypt(
        'AdminAdvancedCheckoutMain'.
        (int)Tab::getIdFromClassName('AdminAdvancedCheckoutMain').(int)Tools::getValue('idm')
    );
    if (strcasecmp($token, Tools::getValue('tkn')) == 0) {
        switch ($action) {
            case 'uploadf':
                $return = $advancedcheckout->uploadImage(Tools::GetValue('name'));
                break;
            case 'deletef':
                $path_img = _PS_MODULE_DIR_.'advancedcheckout/views/img/payments/';
                $file = $path_img.Tools::getValue('name').'.gif';
                if (unlink($file)) {
                    die(Tools::jsonEncode(array('ok' => 1)));
                } else {
                    die(Tools::jsonEncode(array('ok' => 0)));
                }
                break;
        }
    } else {
        $return['errors'] = $advancedcheckout->l('Invalid Security Token !');
        $return['message'] = $advancedcheckout->l('Invalid Security Token !');
    }
    die(Tools::jsonEncode($return));
}
