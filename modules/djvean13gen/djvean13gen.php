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

class DjvEan13Gen extends Module
{
    protected $config_form = false;

    public function __construct()
    {
        $this->name = 'djvean13gen';
        $this->tab = 'administration';
        $this->version = '1.0.6';
        $this->module_key = 'bd629290f1578da146b6348eede5a813';

        $this->author = 'Dejavu Arts S.L.';
        $this->need_instance = 0;

        $this->dependencies = array();

        /**
         * Set $this->bootstrap to true if your module is compliant with bootstrap (PrestaShop 1.6)
         */
        $this->bootstrap = true;

        parent::__construct();

        $this->displayName = $this->l('EAN 13 codes and labels generation for printing');
        $this->description = $this->l('Generates valid EAN 13 codes and creates beautiful labels for printing.');

        $this->confirmUninstall = $this->l('Are you sure you want to uninstall? This will delete all records');
    }

    public function install()
    {
        if (Shop::isFeatureActive()) {
            // Best practice, validator
            Shop::setContext(Shop::CONTEXT_ALL);
        }

        $this->addTabs();

        return parent::install() &&
            $this->registerHook('backOfficeHeader');
    }
    
    public function hookBackOfficeHeader()
    {
        if (Tools::getValue('module_name') == $this->name) {
            $this->context->controller->addJS($this->_path.'views/js/back.js');
            $this->context->controller->addCSS($this->_path.'views/css/back.css');
        }
    }


    public function addTabs()
    {
        $languages = Language::getLanguages();

        $djvean13gen_tab = new Tab();
        $djvean13gen_tab->id_parent = 0;
        $djvean13gen_tab->class_name = 'AdminFlash';
        $djvean13gen_tab->module = 'djvean13gen';
        $djvean13gen_tab->name = array();
        $djvean13gen_tab->active = 1;
        $djvean13gen_tab->position = 1;

        foreach ($languages as $l) {
            // Best practice, validator
            $djvean13gen_tab->name[$l['id_lang']] = 'Dejavu EAN13 GEN';
        }

        $djvean13gen_tab->save();

        Configuration::updateValue('DJVEAN13GEN_TABID', $djvean13gen_tab->id);

        $djvean13gen_stocks_tab = new Tab();
        $djvean13gen_stocks_tab->id_parent = $djvean13gen_tab->id;
        $djvean13gen_stocks_tab->class_name = 'AdminDjvEan13GenStocks';
        $djvean13gen_stocks_tab->module = 'djvean13gen';
        $djvean13gen_stocks_tab->name = array();
        $djvean13gen_stocks_tab->active = 1;
        $djvean13gen_stocks_tab->position = 1;

        foreach ($languages as $l) {
            // Best practice, validator
            $djvean13gen_stocks_tab->name[$l['id_lang']] = $this->l('Generator and Labels');
        }

        $djvean13gen_stocks_tab->save();

        $djvean13gen_configuration_tab = new Tab();
        $djvean13gen_configuration_tab->id_parent = $djvean13gen_tab->id;
        $djvean13gen_configuration_tab->class_name = 'AdminDjvEan13GenConfiguration';
        $djvean13gen_configuration_tab->module = 'djvean13gen';
        $djvean13gen_configuration_tab->name = array();
        $djvean13gen_configuration_tab->active = 1;
        $djvean13gen_configuration_tab->position = 1;

        foreach ($languages as $l) {
            // Best practice, validator
            $djvean13gen_configuration_tab->name[$l['id_lang']] = $this->l('Configuration');
        }

        $djvean13gen_configuration_tab->save();
    }

    public function uninstall()
    {
        $tab_id = (int)Configuration::get('DJVEAN13GEN_TABID');

        if ($tab_id) {
            $sql = '
                SELECT
                    id_tab
                FROM
                    `'._DB_PREFIX_.'tabs
                WHERE
                    id_parent = '.$tab_id.'
            ';

            //error_log($sql);

            $result = Db::getInstance()->ExecuteS($sql);

            foreach ($result as $row) {
                $tab = new Tab((int)$row['id_tab']);
                $tab->delete();
            }

            $tab = new Tab($tab_id);
            $tab->delete();
        }

        return parent::uninstall();
    }

    public function getContent()
    {
        $output = null;

        if (Tools::isSubmit('submit'.$this->name)) {
            $insercion_automatica = (int)Tools::getValue('insercion_automatica');
            Configuration::updateValue('DJVEAN13GEN_INSAUTO', $insercion_automatica);
        }

        return $output.$this->displayForm();
    }

    public function displayForm($messages = null)
    {
        ob_start();
        $insercion_automatica = (int)Configuration::get('DJVEAN13GEN_INSAUTO');
        if ($insercion_automatica) {
            $insercion_automatica_checked = 'checked="checked"';
            $insercion_automatica_unchecked = '';
        } else {
            $insercion_automatica_checked = '';
            $insercion_automatica_unchecked = 'checked="checked"';
        }
        ?>
            <?php echo join('', $messages)?>
            <br><br>

            <div class="panel" id="fieldset_1">
                <div class="panel-heading">
                    <i class="icon-magic"></i>
                    <?php echo $this->l('Configuration'); ?>
                </div>

                <form action="<?php echo Tools::safeOutput($_SERVER['REQUEST_URI']);?>" method="post">
                    <label  for="Dependientes">
                        <?php echo $this->l('Product selection mode:')?>
                    </label>
                    <div class="margin-form">
                        <input type="radio" value="1" <?php echo $insercion_automatica_checked?> 
                        id="insercion_automatica_yes" name="insercion_automatica" />
                        <?php echo $this->l('Automatic')?>
                        
                        <input type="radio" value="0" <?php echo $insercion_automatica_unchecked?> 
                        id="insercion_automatica_no" name="insercion_automatica" />
                        <?php echo $this->l('Manual')?>
                        
                        <p class="clear">
                            <?php 
                            echo $this->l('If you are using a barcode gun, select');
                            ?>
                            <em><?php echo $this->l('Automatic')?></em>.
                        </p>
                    </div>

                    <input type="hidden" name="task" value="updateCustomization" id="actionTask" />


                    <div class="panel-footer">
                        <button type="submit" value="1" id="module_form_submit_btn" 
                        name="submitdjvean13gen" class="btn btn-default pull-right">
                        <i class="process-icon-save"></i> <?php echo $this->l('Save')?>
                        </button>
                    </div>
                </form>
            </div>

        <?php
        $old = ob_get_clean();

        // Get default Language
        $default_lang = (int)Configuration::get('PS_LANG_DEFAULT');

        $helper = new HelperForm();

        // Module, token and currentIndex
        $helper->module = $this;
        $helper->name_controller = $this->name;
        $helper->token = Tools::getAdminTokenLite('AdminModules');
        $helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;

        // Language
        $helper->default_form_language = $default_lang;
        $helper->allow_employee_form_lang = $default_lang;

        // Title and toolbar
        $helper->title = $this->displayName;
        $helper->show_toolbar = true;        // false -> remove toolbar
        $helper->toolbar_scroll = true;      // yes - > Toolbar is always visible on the top of the screen.
        $helper->submit_action = 'submit'.$this->name;
        $helper->toolbar_btn = array(
            'help' => array(
                'desc' => $this->l('Help'),
                'js' => 'window.open(\'http://www.dejavu.es/ayuda-modulo-erp-tpv-prestashop/\',\'popupwindow\',
                \'width=500\',\'height=500\',\'scrollbars\',\'resizable\');',
            )
        );

        // Load current value
        $helper->fields_value['MYMODULE_NAME'] = Configuration::get('MYMODULE_NAME');

        return $helper->generateForm().$old;
    }
}
