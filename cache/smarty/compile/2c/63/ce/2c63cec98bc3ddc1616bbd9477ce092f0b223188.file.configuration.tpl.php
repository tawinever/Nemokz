<?php /* Smarty version Smarty-3.1.19, created on 2016-12-25 17:10:58
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/advancedcheckout/views/templates/admin/configuration.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1871032203583ed90528b150-27273166%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2c63cec98bc3ddc1616bbd9477ce092f0b223188' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/advancedcheckout/views/templates/admin/configuration.tpl',
      1 => 1482664250,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1871032203583ed90528b150-27273166',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_583ed9052cd094_15001586',
  'variables' => 
  array (
    'form' => 0,
    'ps_version' => 0,
    'controller_url' => 0,
    'controller_name' => 0,
    'tkn' => 0,
    'idm' => 0,
    'nwps' => 0,
    'urldir' => 0,
    'module_version' => 0,
    'main_html' => 0,
    'fields_html' => 0,
    'up_html' => 0,
    'dnp_html' => 0,
    'pimage_html' => 0,
    'pickup_html' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_583ed9052cd094_15001586')) {function content_583ed9052cd094_15001586($_smarty_tpl) {?>

<?php if ($_smarty_tpl->tpl_vars['form']->value!='') {?>
	<?php echo (($tmp = @$_smarty_tpl->tpl_vars['form']->value)===null||$tmp==='' ? '' : $tmp);?>

<?php } else { ?>

<script>
	ps_version = '<?php echo intval($_smarty_tpl->tpl_vars['ps_version']->value);?>
';
	admin_module_ajax_url = '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['controller_url']->value, ENT_QUOTES, 'UTF-8', true);?>
';
	admin_module_controller = "<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['controller_name']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
";
	var tkn = "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tkn']->value, ENT_QUOTES, 'UTF-8', true);?>
";
	var idm = "<?php echo intval($_smarty_tpl->tpl_vars['idm']->value);?>
";
	var new_ps = "<?php echo intval($_smarty_tpl->tpl_vars['nwps']->value);?>
";
	var urldir = "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['urldir']->value, ENT_QUOTES, 'UTF-8', true);?>
";

</script>
<!-- Module content -->
<div id="modulecontent" class="clearfix">
	<!-- Nav tabs -->
	<div class="col-lg-2">
		<div class="list-group change">
			<a href="#settings" class="list-group-item" data-toggle="tab"><i class="icon-cogs"></i> <?php echo smartyTranslate(array('s'=>'Main Settings','mod'=>'advancedcheckout'),$_smarty_tpl);?>
</a>
			<a href="#fields" class="list-group-item" data-toggle="tab"><i class="icon-move"></i> <?php echo smartyTranslate(array('s'=>'Fields Settings','mod'=>'advancedcheckout'),$_smarty_tpl);?>
</a>
			<a href="#up" class="list-group-item active" data-toggle="tab"><i class="icon-money"></i> <?php echo smartyTranslate(array('s'=>'Universal pay','mod'=>'advancedcheckout'),$_smarty_tpl);?>
</a>
			<a href="#dnp" class="list-group-item" data-toggle="tab"><i class="icon-plane"></i> <?php echo smartyTranslate(array('s'=>'Delivery & payments','mod'=>'advancedcheckout'),$_smarty_tpl);?>
</a>
			<a href="#pimage" class="list-group-item" data-toggle="tab"><i class="icon-camera"></i> <?php echo smartyTranslate(array('s'=>'Logo for Payments','mod'=>'advancedcheckout'),$_smarty_tpl);?>
</a>
			<a href="#pickup" class="list-group-item" data-toggle="tab"><i class="icon-suitcase"></i> <?php echo smartyTranslate(array('s'=>'Pickup settings','mod'=>'advancedcheckout'),$_smarty_tpl);?>
</a>
		</div>
		<div class="list-group">
			<a class="list-group-item"><i class="icon-info"></i> <?php echo smartyTranslate(array('s'=>'Version','mod'=>'advancedcheckout'),$_smarty_tpl);?>
 <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['module_version']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</a>
		</div>
	</div>
	<!-- Tab panes -->
	<div class="tab-content col-lg-10">
		<div class="tab-pane panel" id="settings">
			<?php echo (($tmp = @$_smarty_tpl->tpl_vars['main_html']->value)===null||$tmp==='' ? '' : $tmp);?>

		</div>
		<div class="tab-pane panel" id="fields">
			<center><div style="display: inline-block;"><p><p style="color:#F31717; font-size:16px; font-weight:900;text-align:center;"><?php echo smartyTranslate(array('s'=>' -- Attention! A disabled field should not be required !!! --','mod'=>'advancedcheckout'),$_smarty_tpl);?>
</p></p></div></center>
			<?php echo (($tmp = @$_smarty_tpl->tpl_vars['fields_html']->value)===null||$tmp==='' ? '' : $tmp);?>

		</div>
		<div class="tab-pane panel" id="up">
			<?php echo (($tmp = @$_smarty_tpl->tpl_vars['up_html']->value)===null||$tmp==='' ? '' : $tmp);?>

		</div>
		<div class="tab-pane panel" id="dnp">
			<?php echo (($tmp = @$_smarty_tpl->tpl_vars['dnp_html']->value)===null||$tmp==='' ? '' : $tmp);?>

		</div>
		<div class="tab-pane panel" id="pimage">
			<div id="gif_loaded"></div>
			<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pimage_html']->value)===null||$tmp==='' ? '' : $tmp);?>

		</div>
		<div class="tab-pane panel" id="pickup">
			<div id="gif_loaded"></div>
			<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pickup_html']->value)===null||$tmp==='' ? '' : $tmp);?>

		</div>
	</div>
</div>
<?php }?><?php }} ?>
