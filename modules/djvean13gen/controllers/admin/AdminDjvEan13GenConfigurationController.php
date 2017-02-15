<?php
/**
* 2014 Dejavu Arts S.L.
*
* NOTICE OF LICENSE
*
* This source file is subject to the copyright.
*
* DISCLAIMER
*
* Do not edit or add to this file.
*
* @author    Dejavu Arts S.L. <desarrollo@dejavu.es>
* @site www.dejavu.es
* @copyright Copyright (c) 2014 Dejavu Arts S.L.
*   @license   Copyright. All Rights Reserved
*/

class AdminDjvEan13GenConfigurationController extends ModuleAdminController
{
    public function __construct()
    {
        $this->context = Context::getContext();

        parent::__construct();

        $link = $this->context->link->getAdminLink('AdminModules');
        $params = '&configure=djvean13gen&tab_module=administration&module_name=djvean13gen';

        Tools::redirectAdmin($link.$params);
    }
}
