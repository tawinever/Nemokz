<?php

if (!defined('_PS_VERSION_'))
	exit;

class psThemeXtender extends Module
{
	/* @var boolean error */
	protected $_errors = false;
	
	public function __construct()
	{
		$this->name = 'psthemextender';
		$this->tab = 'front_office_features';
		$this->version = '1.0';
		$this->author = 'Nemo';
		$this->need_instance = 0;

		$this->bootstrap = true;

	 	parent::__construct();

		$this->displayName = $this->l('PS Theme Extender');
		$this->description = $this->l('Helps you adding new color schemes to the theme configurator.');
		$this->confirmUninstall = $this->l('Are you sure you want to delete this module?');
	}
	
	public function install()
	{
		if (!parent::install() OR
			!$this->registerHook('displayBackOfficeHeader') OR
			!$this->registerHook('displayHeader'))
			return false;
		return true;
	}
	
	public function uninstall()
	{
		if (!parent::uninstall() OR
			!Configuration::deleteByName('PS_TC_EXTENDED_THEMES'))
			return false;
		return true;
	}

	public function getContent(){
		$this->_html = '<h2>'.$this->displayName.'</h2>';

		$this->_postProcess();

		$this->_displayForm();
		return	$this->_html;
	}
	
	private function _displayForm()
	{

		$this->_html .= '<div class="panel clearfix">';
		$this->_html .= '<div id="fb-root"></div>
					<script>(function(d, s, id) {
					  var js, fjs = d.getElementsByTagName(s)[0];
					  if (d.getElementById(id)) return;
					  js = d.createElement(s); js.id = id;
					  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
					  fjs.parentNode.insertBefore(js, fjs);
					}(document, \'script\', \'facebook-jssdk\'));</script>';
		$this->_html .= '<p>'.$this->l('Provided for FREE by').' <a style="text-decoration:underline" target="_blank" href="http://store.nemops.com#fromthemextender" title="store.nemops.com!">store.nemops.com!</a> '.$this->l('Would you like to support Nemo\'s Post Scriptum to get more free modules?').'</p>';



		$this->_html .= '<div class="fb-like-box" style="float:left" data-href="https://www.facebook.com/pages/Nemos-Post-Scriptum/358370864236645" data-width="250" data-colorscheme="light" data-show-faces="false" data-header="false" data-stream="false" data-show-border="false"></div>';

		$this->_html .= '
			<div  style="float:left">

			<form style="text-align:right" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
			<input type="hidden" name="cmd" value="_s-xclick">
			<input type="hidden" name="hosted_button_id" value="GSG68TUKQC24J">
			<input type="image" src="https://www.paypalobjects.com/en_US/IT/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
			<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
			</form>
			</div>
			
		</div> ';		


		$this->_html .= '<div class="clear">&nbsp;</div>';

		// get current schemes and add color entries!
		$current_extended_schemes = unserialize(Configuration::get('PS_TC_EXTENDED_THEMES'));

		if($current_extended_schemes)
		{
			$this->_html .= '<div class="panel clearfix">';
			$this->_html .= '<div class="panel-heading">'.$this->l('Added Schemes').'</div>';

			foreach ($current_extended_schemes as $scheme) {
				$this->_html .= '<p>' . $scheme['name'] . '<a href="'.AdminController::$currentIndex.'&token='.Tools::getValue('token').'&configure='.$this->name.'&delete_scheme='.$scheme['name'].'" title="'.$this->l('Delete this fee').'"><img src="../img/admin/delete.gif" alt=""></a>' . '</p>';
			}
			$this->_html .= '</div>';
		}
			


		$inputs[] = array(
			'type' => 'text',
			'label' => $this->l('Name'),
			'name' => 'name',
			'desc' => $this->l('All lowercase, no spaces'),
		);

		$inputs[] = array(
			'type' => 'file',
			'label' => $this->l('Theme file'),
			'name' => 'themefile',
			'desc' => $this->l('The .css file containing your rules'),
		);


		$inputs[] = array(
			'type' => 'color',
			'label' => $this->l('Main Color'),
			'name' => 'maincolor',
			'desc' => $this->l('The main color of your theme'),
		);

		$inputs[] = array(
			'type' => 'color',
			'label' => $this->l('Secondary Color'),
			'name' => 'seccolor',
			'desc' => $this->l('The secondary color of your theme'),
		);

		$fields_form = array(
			'form' => array(
				'legend' => array(
					'title' => $this->l('Settings'),
					'icon' => 'icon-cogs'
				),
				'input' => $inputs,
				'submit' => array(
					'title' => $this->l('Add'),
					'class' => 'btn btn-default pull-right'
				)
			),
		);

		$helper = new HelperForm();
		$helper->show_toolbar = false;
		$helper->table = $this->table;
		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->default_form_language = $lang->id;
		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
		$this->fields_form = array();

		$helper->identifier = $this->identifier;
		$helper->submit_action = 'submitModule';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->tpl_vars = array(
			'fields_value' => array('name' => '', 'maincolor' => '', 'seccolor' => '', 'themefile' => ''),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id
		);

		$this->_html .= $helper->generateForm(array($fields_form));

	}

	private function _postProcess()
	{


		if (Tools::isSubmit('submitModule')) // handles the basic config update
		{

			if(!isset($_FILES['themefile']))
				$this->_errors[] = $this->l('Error: no file selected');
			else {
				// check current settings
				$current_schemes = unserialize(Configuration::get('PS_TC_THEMES'));
				$current_extended_schemes = unserialize(Configuration::get('PS_TC_EXTENDED_THEMES'));

				$name = Tools::getValue('name');
				if(!$name)
					$name = str_replace('.css', '', $_FILES['themefile']['name']);

				if(strstr($name, ' '))
					str_replace(' ', '_', $name);
				$name = strtolower($name);

				// check name, if exists, change it
				while ( in_array($name, $current_schemes) ) {
					$name = $name.rand(1,100);
				}
				
				// check type, must be text/css
				if($_FILES['themefile']['type'] !== 'text/css')
					$this->_errors[] = $this->l('Error: unsupported file type, only .css is allowed');
				else {
					// move
					if(!move_uploaded_file($_FILES['themefile']['tmp_name'], _PS_MODULE_DIR_ . 'themeconfigurator/css/'.$name.'.css'))
						$this->_errors[] = $this->l('Error: impossible to copy the file, check your folder permissions');
					else {
						// update db entry if it was moved		
						$current_schemes[] = $name;
						$current_extended_schemes[] = array('name' => $name, 'maincolor' => Tools::getValue('maincolor'), 'seccolor' => Tools::getValue('seccolor'));
						Configuration::updateValue('PS_TC_THEMES', serialize($current_schemes));
						Configuration::updateValue('PS_TC_EXTENDED_THEMES', serialize($current_extended_schemes));
						$this->_html .= $this->displayConfirmation($this->l('Values updated!'));
					}
					
				}
				
					
			}
			if($this->_errors)
				$this->_html .= $this->displayError(implode($this->_errors, '<br />'));
			
		} else if(Tools::isSubmit('delete_scheme'))
		{


			// first, check if you can erase the file
			if(unlink( _PS_MODULE_DIR_ . 'themeconfigurator/css/'.Tools::getValue('delete_scheme').'.css'))
			{

				// grab the current themes
				$current_schemes = unserialize(Configuration::get('PS_TC_THEMES'));
				$current_extended_schemes = unserialize(Configuration::get('PS_TC_EXTENDED_THEMES'));

				// erase the chosen one
				foreach ($current_schemes as $k => $scheme) {
					if($scheme == Tools::getValue('delete_scheme'))
						unset($current_schemes[$k]);
				}

				foreach ($current_extended_schemes as $k => $scheme) {
					if($scheme['name'] == Tools::getValue('delete_scheme'))
						unset($current_extended_schemes[$k]);
				}

				Configuration::updateValue('PS_TC_THEMES', serialize($current_schemes));
				Configuration::updateValue('PS_TC_EXTENDED_THEMES', serialize($current_extended_schemes));

				$this->_html .= $this->displayConfirmation($this->l('Scheme Removed!'));


			} else $this->_html .= $this->displayError($this->l('The .css file cannot be erased, check your folders permissions'));

			

		}
	}

	public function hookDisplayHeader($params)
	{

		
		if(Tools::getValue('live_configurator_token'))
		{

			$current_extended_schemes = unserialize(Configuration::get('PS_TC_EXTENDED_THEMES'));
			if($current_extended_schemes)
			{
				$css = '';
				
				foreach ($current_extended_schemes as $scheme) {
					$css = '
						#tool_customization #color-box .'.$scheme['name'].' .color1{
							border: 13px solid '.$scheme['maincolor'].';
						}
						#tool_customization #color-box .'.$scheme['name'].' .color2{
							background: '.$scheme['seccolor'].';
						}
					';
				}

				return '
				<style>
				'.$css.'
				</style>
				';

			} // end if extended themes

		}

		
	}
	// DH42 support

	public function hookDisplayBackOfficeHeader($params)
	{

		if( isset($this->context->controller->dh_support) )
			return;

		$this->context->controller->dh_support = 1;

		$this->context->controller->addJS($this->_path . '/dh42.js', 'all');



	}
	
}
