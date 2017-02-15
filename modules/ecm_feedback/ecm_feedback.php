<?php

if(!defined('_CAN_LOAD_FILES_'))
exit;
//private $_html = '';
class ecm_feedback extends Module
{
	function __construct()
	{
		$this->name = 'ecm_feedback';
		$this->tab = 'emailing';
		$this->author = 'Elcommerce';
		$this->version = 0.1;

		parent::__construct();

		$this->displayName = $this->l("Форма обратной связи");
		$this->description = $this->l("Добавляет простую форму обратной связи на сайт");
	}

	function install()
	{
		return (parent::install() AND $this->registerHook('displayHeader'));
	}





	private
	function _settings()
	{
		$this->_html .= '
		<fieldset class="space">
		<legend><img src="../img/admin/cog.gif" alt="" class="middle" />Настройки</legend>
		<label>Email</label>
		<div class="margin-form">
		<input type="text" name="to" placeholder="email..." required value="'.Tools::getValue('to',Configuration::get('_TO_')).'"/>
		<p class="clear">адрес почты для отправки уведомления, несколько ящиков могут перечисляться через запятую</p>
		</div>
		<center><input type="submit" name="submitSETTING" value="Обновить" class="button" /></center>
		</fieldset>
		';
	}

	function hookdisplayHeader($params)
	{
		global $smarty;
		global $cookie;

		$this->context->controller->addJS($this->_path.'js/jquery.validate.min.js');
		$this->context->controller->addJS($this->_path.'js/jquery.contactable.js');
		$this->context->controller->addJS($this->_path.'js/form.js');
		$this->context->controller->addCSS($this->_path.'css/contactable.css');
		return $this->display(__FILE__, 'feedback.tpl');
	}
	private
	function _displayabout()
	{

		$this->_html .= '
		<fieldset class="space">
		<legend><img src="../img/admin/email.gif" /> ' . $this->l('Информация') . '</legend>
		<div id="dev_div">
		<span><b>' . $this->l('Версия') . ':</b> ' . $this->version . '</span><br>
		<span><b>' . $this->l('Разработчик') . ':</b> <a class="link" href="mailto:A_Dovbenko@mail.ru" target="_blank">Savvato</a>

		<span><b>' . $this->l('Описание') . ':</b> <a class="link" href="http://elcommerce.com.ua" target="_blank">http://elcommerce.com.ua</a><br><br>
		<span>Выражаем благодарность за предоставленные исходники ресурсу http://alaev.info	</span></br>
		<p style="text-align:center"><a href="http://elcommerce.com.ua/"><img src="http://elcommerce.com.ua/img/m/logo.png" alt="Электронный учет коммерческой деятельности" /></a>



		</div>
		</fieldset>
		';
	}
	function getContent()
	{

		if(Tools::isSubmit('submitSETTING') )
		{


			if($to = Tools::getValue('to')){
				Configuration::updateValue('_TO_', $to);
			}


			$this->_html .= '
			<div class="bootstrap">
			<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">×</button>
			Настройки успешно обновлены
			</div>
			</div>
			';
		}
		$this->_html .= '<form action="'.$_SERVER['REQUEST_URI'].'" method="post">';
		$this->_settings();
		$this->_displayabout();
		$this->_html .= '</form>';

		return $this->_html;
	}
}

?>
