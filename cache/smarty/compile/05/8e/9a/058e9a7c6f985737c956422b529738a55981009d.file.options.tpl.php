<?php /* Smarty version Smarty-3.1.19, created on 2016-11-27 01:10:07
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/views/templates/admin/hs_point_of_sale_preferences_abstract/helpers/options/options.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11469201625839de0fb80d47-08864619%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '058e9a7c6f985737c956422b529738a55981009d' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/views/templates/admin/hs_point_of_sale_preferences_abstract/helpers/options/options.tpl',
      1 => 1480187258,
      2 => 'file',
    ),
    'df5a7284f1ab647384b078e668554ff6b86166a3' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/rauan/themes/default/template/helpers/options/options.tpl',
      1 => 1473152712,
      2 => 'file',
    ),
    '599b53f903a2d36c62b83df87b0df5b67b5cbfe7' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/views/templates/admin/hs_point_of_sale_preferences_abstract/display_default_customer.tpl',
      1 => 1480187258,
      2 => 'file',
    ),
    'db15cb3fd8e912a7ebee2f380938d0def2ae5980' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/views/templates/admin/hs_point_of_sale_preferences_abstract/helpers/options/_cron.tpl',
      1 => 1480187258,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11469201625839de0fb80d47-08864619',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'current_id_lang' => 0,
    'tabs' => 0,
    'table' => 0,
    'table_bk' => 0,
    'current' => 0,
    'token' => 0,
    'option_list' => 0,
    'categoryData' => 0,
    'category' => 0,
    'use_multishop' => 0,
    'field' => 0,
    'key' => 0,
    'hint' => 0,
    'option' => 0,
    'input' => 0,
    'k' => 0,
    'v' => 0,
    'currency_left_sign' => 0,
    'currency_right_sign' => 0,
    'id_lang' => 0,
    'value' => 0,
    'languages' => 0,
    'language' => 0,
    'p' => 0,
    'btn' => 0,
    'name_controller' => 0,
    'hookName' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5839de1015ffc5_93597952',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5839de1015ffc5_93597952')) {function content_5839de1015ffc5_93597952($_smarty_tpl) {?><?php if (!is_callable('smarty_function_counter')) include '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/tools/smarty/plugins/function.counter.php';
if (!is_callable('smarty_modifier_escape')) include '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/tools/smarty/plugins/modifier.escape.php';
if (!is_callable('smarty_modifier_replace')) include '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/tools/smarty/plugins/modifier.replace.php';
?>

<div class="leadin">
    <?php if (isset($_POST['currentFormTab'])) {?>
	<?php $_smarty_tpl->tpl_vars["current_form_tab"] = new Smarty_variable(preg_replace("%(?<!\\\\)'%", "\'",$_POST['currentFormTab']), null, 0);?>
    <?php } elseif (isset($_GET['currentFormTab'])) {?>
        <?php $_smarty_tpl->tpl_vars["current_form_tab"] = new Smarty_variable(preg_replace("%(?<!\\\\)'%", "\'",$_GET['currentFormTab']), null, 0);?>
    <?php } else { ?>
        <?php $_smarty_tpl->tpl_vars["current_form_tab"] = new Smarty_variable('general', null, 0);?>
    <?php }?>
    <script>
        var currentFormTab = '<?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['current_form_tab']->value);?>
';
        var iso = '<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['tiny_path_js']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
';
        var pathCSS = '<?php echo mb_convert_encoding(htmlspecialchars(@constant('_THEME_CSS_DIR_'), ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
';
        var ad = '<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['admin_base_url']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
';

        $(document).ready(function(){
            tinySetup({
                    editor_selector :"autoload_rte"
            });
        });
    </script>
    <div class="productTabs">
        <ul class="tab nav nav-tabs">
            <?php  $_smarty_tpl->tpl_vars['categoryData'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['categoryData']->_loop = false;
 $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['option_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['categoryData']->key => $_smarty_tpl->tpl_vars['categoryData']->value) {
$_smarty_tpl->tpl_vars['categoryData']->_loop = true;
 $_smarty_tpl->tpl_vars['category']->value = $_smarty_tpl->tpl_vars['categoryData']->key;
?>                                                                
            <li class="tab-row">				
                <a href="javascript:displayConfigurationTab('<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['category']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
');" id="configuration_link_<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['category']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" class="tab-page"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['categoryData']->value['tabTitle'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</a>
            </li>
            <?php } ?>
        </ul>
    </div>
   
</div>

<script type="text/javascript">
	id_language = Number(<?php echo $_smarty_tpl->tpl_vars['current_id_lang']->value;?>
);
	<?php if (isset($_smarty_tpl->tpl_vars['tabs']->value)&&count($_smarty_tpl->tpl_vars['tabs']->value)) {?>
		var helper_tabs= <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['json_encode'][0][0]->jsonEncode($_smarty_tpl->tpl_vars['tabs']->value);?>
;
		var unique_field_id = '<?php echo $_smarty_tpl->tpl_vars['table']->value;?>
_';
	<?php }?>
</script>

<?php if (isset($_smarty_tpl->tpl_vars['table_bk']->value)&&$_smarty_tpl->tpl_vars['table_bk']->value==$_smarty_tpl->tpl_vars['table']->value) {?><?php $_smarty_tpl->_capture_stack[0][] = array('table_count', null, null); ob_start(); ?><?php echo smarty_function_counter(array('name'=>'table_count'),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?><?php }?>
<?php $_smarty_tpl->tpl_vars['table_bk'] = new Smarty_variable($_smarty_tpl->tpl_vars['table']->value, null, 1);
if ($_smarty_tpl->parent != null) $_smarty_tpl->parent->tpl_vars['table_bk'] = clone $_smarty_tpl->tpl_vars['table_bk'];?>
<form action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['current']->value, ENT_QUOTES, 'UTF-8', true);?>
&amp;token=<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['token']->value, ENT_QUOTES, 'UTF-8', true);?>
" id="<?php if ($_smarty_tpl->tpl_vars['table']->value==null) {?>configuration_form<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['table']->value;?>
_form<?php }?><?php if (isset(Smarty::$_smarty_vars['capture']['table_count'])&&Smarty::$_smarty_vars['capture']['table_count']) {?>_<?php echo intval(Smarty::$_smarty_vars['capture']['table_count']);?>
<?php }?>" method="post" enctype="multipart/form-data" class="form-horizontal">
	<?php  $_smarty_tpl->tpl_vars['categoryData'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['categoryData']->_loop = false;
 $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['option_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['categoryData']->key => $_smarty_tpl->tpl_vars['categoryData']->value) {
$_smarty_tpl->tpl_vars['categoryData']->_loop = true;
 $_smarty_tpl->tpl_vars['category']->value = $_smarty_tpl->tpl_vars['categoryData']->key;
?>
		<?php if (isset($_smarty_tpl->tpl_vars['categoryData']->value['top'])) {?><?php echo $_smarty_tpl->tpl_vars['categoryData']->value['top'];?>
<?php }?>
		<div class="panel <?php if (isset($_smarty_tpl->tpl_vars['categoryData']->value['class'])) {?><?php echo $_smarty_tpl->tpl_vars['categoryData']->value['class'];?>
<?php }?>" id="<?php echo $_smarty_tpl->tpl_vars['table']->value;?>
_fieldset_<?php echo $_smarty_tpl->tpl_vars['category']->value;?>
">
			
			<div class="panel-heading">
				<i class="<?php if (isset($_smarty_tpl->tpl_vars['categoryData']->value['icon'])) {?><?php echo $_smarty_tpl->tpl_vars['categoryData']->value['icon'];?>
<?php } else { ?>icon-cogs<?php }?>"></i>
				<?php if (isset($_smarty_tpl->tpl_vars['categoryData']->value['title'])) {?><?php echo $_smarty_tpl->tpl_vars['categoryData']->value['title'];?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Options'),$_smarty_tpl);?>
<?php }?>
			</div>

			

			<?php if ((isset($_smarty_tpl->tpl_vars['categoryData']->value['description'])&&$_smarty_tpl->tpl_vars['categoryData']->value['description'])) {?>
				<div class="alert alert-info"><?php echo $_smarty_tpl->tpl_vars['categoryData']->value['description'];?>
</div>
			<?php }?>
			
			<?php if ((isset($_smarty_tpl->tpl_vars['categoryData']->value['info'])&&$_smarty_tpl->tpl_vars['categoryData']->value['info'])) {?>
				<div><?php echo $_smarty_tpl->tpl_vars['categoryData']->value['info'];?>
</div>
			<?php }?>

			<?php if (!$_smarty_tpl->tpl_vars['categoryData']->value['hide_multishop_checkbox']&&$_smarty_tpl->tpl_vars['use_multishop']->value) {?>
			<div class="well clearfix">
				<label class="control-label col-lg-3">
					<i class="icon-sitemap"></i> <?php echo smartyTranslate(array('s'=>'Multistore'),$_smarty_tpl);?>

				</label>
				<div class="col-lg-9">
					<span class="switch prestashop-switch fixed-width-lg">
						<input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['table']->value;?>
_multishop_<?php echo $_smarty_tpl->tpl_vars['category']->value;?>
" id="<?php echo $_smarty_tpl->tpl_vars['table']->value;?>
_multishop_<?php echo $_smarty_tpl->tpl_vars['category']->value;?>
_on" value="1" onclick="toggleAllMultishopDefaultValue($('#<?php echo $_smarty_tpl->tpl_vars['table']->value;?>
_fieldset_<?php echo $_smarty_tpl->tpl_vars['category']->value;?>
'), true)"/><label for="<?php echo $_smarty_tpl->tpl_vars['table']->value;?>
_multishop_<?php echo $_smarty_tpl->tpl_vars['category']->value;?>
_on"><?php echo smartyTranslate(array('s'=>'Yes'),$_smarty_tpl);?>
</label><input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['table']->value;?>
_multishop_<?php echo $_smarty_tpl->tpl_vars['category']->value;?>
" id="<?php echo $_smarty_tpl->tpl_vars['table']->value;?>
_multishop_<?php echo $_smarty_tpl->tpl_vars['category']->value;?>
_off" value="0" checked="checked" onclick="toggleAllMultishopDefaultValue($('#<?php echo $_smarty_tpl->tpl_vars['table']->value;?>
_fieldset_<?php echo $_smarty_tpl->tpl_vars['category']->value;?>
'), false)"/><label for="<?php echo $_smarty_tpl->tpl_vars['table']->value;?>
_multishop_<?php echo $_smarty_tpl->tpl_vars['category']->value;?>
_off"><?php echo smartyTranslate(array('s'=>'No'),$_smarty_tpl);?>
</label>
						<a class="slide-button btn"></a>
					</span>
					<div class="row">
						<div class="col-lg-12">
							<p class="help-block">
								<strong><?php echo smartyTranslate(array('s'=>'Check / Uncheck all'),$_smarty_tpl);?>
</strong><br />
								<?php echo smartyTranslate(array('s'=>'You are editing this page for a specific shop or group. Click "Yes" to check all fields, "No" to uncheck all.'),$_smarty_tpl);?>
<br />
 								<?php echo smartyTranslate(array('s'=>'If you check a field, change its value, and save, the multistore behavior will not apply to this shop (or group), for this particular parameter.'),$_smarty_tpl);?>

							</p>
						</div>
					</div>
				</div>
			</div>
			<?php }?>

			<div class="form-wrapper">
			<?php  $_smarty_tpl->tpl_vars['field'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['field']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['categoryData']->value['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['field']->key => $_smarty_tpl->tpl_vars['field']->value) {
$_smarty_tpl->tpl_vars['field']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['field']->key;
?>
					<?php if ($_smarty_tpl->tpl_vars['field']->value['type']=='hidden') {?>
						<input type="hidden" name="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['field']->value['value'];?>
" />
					<?php } else { ?>
						<div class="form-group<?php if (isset($_smarty_tpl->tpl_vars['field']->value['form_group_class'])) {?> <?php echo $_smarty_tpl->tpl_vars['field']->value['form_group_class'];?>
<?php }?>"<?php if (isset($_smarty_tpl->tpl_vars['tabs']->value)&&isset($_smarty_tpl->tpl_vars['field']->value['tab'])) {?> data-tab-id="<?php echo $_smarty_tpl->tpl_vars['field']->value['tab'];?>
"<?php }?>>
							<div id="conf_id_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['field']->value['is_invisible']) {?> class="isInvisible"<?php }?>>
								
    <?php if (isset($_smarty_tpl->tpl_vars['field']->value['type'])&&$_smarty_tpl->tpl_vars['field']->value['type']=='pos_title') {?>

    <?php } else { ?>    
        
									<?php if (isset($_smarty_tpl->tpl_vars['field']->value['title'])&&isset($_smarty_tpl->tpl_vars['field']->value['hint'])) {?>
										<label class="control-label col-lg-3<?php if (isset($_smarty_tpl->tpl_vars['field']->value['required'])&&$_smarty_tpl->tpl_vars['field']->value['required']&&$_smarty_tpl->tpl_vars['field']->value['type']!='radio') {?> required<?php }?>">
											<?php if (!$_smarty_tpl->tpl_vars['categoryData']->value['hide_multishop_checkbox']&&$_smarty_tpl->tpl_vars['field']->value['multishop_default']&&empty($_smarty_tpl->tpl_vars['field']->value['no_multishop_checkbox'])) {?>
											<input type="checkbox" name="multishopOverrideOption[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
]" value="1"<?php if (!$_smarty_tpl->tpl_vars['field']->value['is_disabled']) {?> checked="checked"<?php }?> onclick="toggleMultishopDefaultValue(this, '<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
')"/>
											<?php }?>
											<span title="" data-toggle="tooltip" class="label-tooltip" data-original-title="
												<?php if (is_array($_smarty_tpl->tpl_vars['field']->value['hint'])) {?>
													<?php  $_smarty_tpl->tpl_vars['hint'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['hint']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['field']->value['hint']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['hint']->key => $_smarty_tpl->tpl_vars['hint']->value) {
$_smarty_tpl->tpl_vars['hint']->_loop = true;
?>
														<?php if (is_array($_smarty_tpl->tpl_vars['hint']->value)) {?>
															<?php echo $_smarty_tpl->tpl_vars['hint']->value['text'];?>

														<?php } else { ?>
															<?php echo $_smarty_tpl->tpl_vars['hint']->value;?>

														<?php }?>
													<?php } ?>
												<?php } else { ?>
													<?php echo $_smarty_tpl->tpl_vars['field']->value['hint'];?>

												<?php }?>
											" data-html="true">
												<?php echo $_smarty_tpl->tpl_vars['field']->value['title'];?>

											</span>
										</label>
									<?php } elseif (isset($_smarty_tpl->tpl_vars['field']->value['title'])) {?>
										<label class="control-label col-lg-3">
											<?php if (!$_smarty_tpl->tpl_vars['categoryData']->value['hide_multishop_checkbox']&&$_smarty_tpl->tpl_vars['field']->value['multishop_default']&&empty($_smarty_tpl->tpl_vars['field']->value['no_multishop_checkbox'])) {?>
											<input type="checkbox" name="multishopOverrideOption[<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
]" value="1"<?php if (!$_smarty_tpl->tpl_vars['field']->value['is_disabled']) {?> checked="checked"<?php }?> onclick="checkMultishopDefaultValue(this, '<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
')" />
											<?php }?>
											<?php echo $_smarty_tpl->tpl_vars['field']->value['title'];?>

										</label>
									<?php }?>
								
    <?php }?> 

								
    <?php if ($_smarty_tpl->tpl_vars['field']->value['type']=='pos_checkbox_list') {?>
        <div class="col-lg-9 ">            
            <?php  $_smarty_tpl->tpl_vars['option'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['option']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['field']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['option']->key => $_smarty_tpl->tpl_vars['option']->value) {
$_smarty_tpl->tpl_vars['option']->_loop = true;
?>
                <?php if (isset($_smarty_tpl->tpl_vars['option']->value['type'])&&$_smarty_tpl->tpl_vars['option']->value['type']=='multi_checkbox') {?>
                    <div <?php if (isset($_smarty_tpl->tpl_vars['option']->value['class'])) {?>class='<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['option']->value['class'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
'<?php }?>>
                        <?php if (!empty($_smarty_tpl->tpl_vars['option']->value['label'])) {?><label><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['option']->value['label'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</label><?php }?>
                        <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['option']->value['choices']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
                           <p class="checkbox">
                                <input type="checkbox" name="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['option']->value['key'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" id="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['option']->value['key'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['key']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
_on" value="<?php echo intval($_smarty_tpl->tpl_vars['key']->value);?>
"<?php if ($_smarty_tpl->tpl_vars['key']->value==$_smarty_tpl->tpl_vars['option']->value['value']) {?> checked="checked"<?php }?><?php if (isset($_smarty_tpl->tpl_vars['option']->value['js'][$_smarty_tpl->tpl_vars['key']->value])) {?> <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['option']->value['js'][$_smarty_tpl->tpl_vars['key']->value], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php }?>/><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['value']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

                            </p>
                        <?php } ?>
                    </div>
                <?php } elseif (isset($_smarty_tpl->tpl_vars['option']->value['type'])&&$_smarty_tpl->tpl_vars['option']->value['type']=='radio') {?>   
                     <div <?php if (isset($_smarty_tpl->tpl_vars['option']->value['class'])) {?>class='<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['option']->value['class'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
'<?php }?>>
                        <label><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['option']->value['label'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</label>
                        <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['option']->value['choices']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
                                <input type="radio" name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['option']->value['key'], ENT_QUOTES, 'UTF-8', true);?>
" id="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['option']->value['key'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['key']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
_on" value="<?php echo intval($_smarty_tpl->tpl_vars['key']->value);?>
"<?php if ($_smarty_tpl->tpl_vars['key']->value==$_smarty_tpl->tpl_vars['option']->value['value']) {?> checked="checked"<?php }?><?php if (isset($_smarty_tpl->tpl_vars['option']->value['js'][$_smarty_tpl->tpl_vars['key']->value])) {?> <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['option']->value['js'][$_smarty_tpl->tpl_vars['key']->value], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php }?>/><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['value']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

                        <?php } ?>
                     </div>
                <?php } else { ?>    
                    <p <?php if (isset($_smarty_tpl->tpl_vars['option']->value['class'])) {?>class='<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['option']->value['class'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
'<?php }?> class="checkbox">
                        <label for="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['option']->value['key'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" class="control-label">
                            <input type="checkbox" name="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['option']->value['key'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" value="<?php if (isset($_smarty_tpl->tpl_vars['option']->value['id'])) {?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['option']->value['id'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php } else { ?>1<?php }?>" <?php if (isset($_smarty_tpl->tpl_vars['option']->value['disabled'])&&$_smarty_tpl->tpl_vars['option']->value['disabled']) {?>disabled class="default_receipt"<?php }?> <?php if ($_smarty_tpl->tpl_vars['option']->value['value']) {?>checked="checked"<?php }?> />
                            <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['option']->value['label'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

                        </label>
                    </p>
                <?php }?>
            <?php } ?>	
        </div>
        <div class="col-lg-9 col-lg-offset-3">
            <div class="help-block">
                <?php if (isset($_smarty_tpl->tpl_vars['field']->value['desc'])) {?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['desc'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php }?>
            </div>
        </div>           
    <?php } elseif ($_smarty_tpl->tpl_vars['field']->value['type']=='default_customer_field') {?>
        
        <div class="col-lg-5">
            <div id="ajax_choose_customer">
                <div class="input-group">
                    <input type="text" name="customer_autocomplete_input" value="" id="customer_autocomplete_input" autocomplete="off" class="ac_input" <?php if ($_smarty_tpl->tpl_vars['field']->value['placeholder']) {?>placeholder="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['placeholder'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"<?php }?>>
                    <span class="input-group-addon"><i class="icon-search"></i></span>
                </div>
            </div>
            <div id="pos_default_customer">
                <?php $_smarty_tpl->tpl_vars["default_customer"] = new Smarty_variable($_smarty_tpl->tpl_vars['field']->value['list'], null, 0);?>
                <?php /*  Call merged included template "../../display_default_customer.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("../../display_default_customer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0, '11469201625839de0fb80d47-08864619');
content_5839de0ff27dc4_54527731($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "../../display_default_customer.tpl" */?>
            </div>
        </div>
    <?php } elseif ($_smarty_tpl->tpl_vars['field']->value['type']=='pos_indexing') {?>
        <?php $_smarty_tpl->tpl_vars["score_indexed_products"] = new Smarty_variable((('<strong>').($_smarty_tpl->tpl_vars['field']->value['score_indexed_products'])).('.</strong>'), null, 0);?>
        <div class="col-lg-9">
            <p>
                <?php ob_start();?><?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['module_display_name']->value);?>
<?php $_tmp1=ob_get_clean();?><?php echo sprintf(preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['hs_pos_i18n']->value['the_indexed_products_have_been_analyzed_by_and_will_appear_in_the_results_of_a_search']),$_tmp1);?>

                <br />
                <?php echo preg_replace("%(?<!\\\\)'%", "\'",sprintf(mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['indexed_products'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8'),$_smarty_tpl->tpl_vars['score_indexed_products']->value));?>

            </p>
            <p><?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['hs_pos_i18n']->value['building_the_product_index_may_take_a_few_minutes']);?>
</p>
            <a class="btn-link" href="<?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['field']->value['indexing_urls']['add_missing_products']);?>
">
                <i class="icon-external-link-sign"></i>
                <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['add_missing_products_to_the_index'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

            </a>
            <br />
            <a class="btn-link" href="<?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['field']->value['indexing_urls']['rebuild_entire_index']);?>
">
                <i class="icon-external-link-sign"></i>
                <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['re_build_the_entire_index'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

            </a>
            <br />
            <br />
            <p><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['you_can_set_a_cron_job_that_will_build_your_index_using_the_following_url'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
               
                <br />
                <b>- <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['add_missing_products_to_the_index'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
:</b>
                <br />
                <?php /*  Call merged included template "./_cron.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("./_cron.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('url'=>$_smarty_tpl->tpl_vars['field']->value['indexing_urls']['add_missing_product_cron_url']), 0, '11469201625839de0fb80d47-08864619');
content_5839de10034303_79940855($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "./_cron.tpl" */?>
                <br />
                - <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['re_build_the_entire_index'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
:
                <br />
                <?php /*  Call merged included template "./_cron.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate("./_cron.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('url'=>$_smarty_tpl->tpl_vars['field']->value['indexing_urls']['rebuild_entire_product_cron_url']), 0, '11469201625839de0fb80d47-08864619');
content_5839de10034303_79940855($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); 
/*  End of included template "./_cron.tpl" */?>
            </p>
        </div>
    <?php } elseif ($_smarty_tpl->tpl_vars['field']->value['type']=='margin_of_receipt') {?>
        <div class="col-lg-9">
            <div class="pos_receipt_margin">
            <input type="text" name="POS_RECEIPT_MARGIN" value="<?php echo floatval($_smarty_tpl->tpl_vars['field']->value['value']);?>
" size="5" class="form-control receipt_input">
            <a target="_blank" href="<?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['field']->value['preview_receipt_url']);?>
" style="margin-bottom:0" class="btn btn-link bt-icon confirm_leave pos_print_preview">
                <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['print_preview'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
 <i class="icon-external-link-sign"></i>
            </a>
            </div>
            <div class="help-block custom_paper_width">
                <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['actual_size'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
 (<strong>70 x 114 mm</strong>)
            </div>
        </div>
    <?php } elseif ($_smarty_tpl->tpl_vars['field']->value['type']=='textarea') {?>
        <div class="col-lg-5">
                <textarea class="textarea-autosize <?php if (isset($_smarty_tpl->tpl_vars['field']->value['autoload_rte'])&&$_smarty_tpl->tpl_vars['field']->value['autoload_rte']) {?>autoload_rte<?php }?>" name=<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['key']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
 cols="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['cols'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" rows="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['rows'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['value'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</textarea>
                <div class="help-block">
                    <?php if (isset($_smarty_tpl->tpl_vars['field']->value['desc'])) {?>
                        <?php if (is_array($_smarty_tpl->tpl_vars['field']->value['desc'])) {?>
                            <?php  $_smarty_tpl->tpl_vars['desc'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['desc']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['field']->value['desc']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['desc']->key => $_smarty_tpl->tpl_vars['desc']->value) {
$_smarty_tpl->tpl_vars['desc']->_loop = true;
?>
                                <?php if (is_array($_smarty_tpl->tpl_vars['desc']->value)) {?>
                                    <span id="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['desc']->value['id'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['desc']->value['text'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</span><br />
                                <?php } else { ?>
                                    <?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['desc']->value);?>
<br />
                                <?php }?>
                            <?php } ?>
                        <?php } else { ?>
                            <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['desc'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

                        <?php }?>
                    <?php }?>    
                </div>
        </div> 
    <?php } elseif ($_smarty_tpl->tpl_vars['field']->value['type']=='textareaLang') {?>
            <div class="col-lg-9">
                <?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['id_lang'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['field']->value['languages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['id_lang']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
                    <div class="row translatable-field lang-<?php echo intval($_smarty_tpl->tpl_vars['id_lang']->value);?>
" <?php if ($_smarty_tpl->tpl_vars['id_lang']->value!=$_smarty_tpl->tpl_vars['current_id_lang']->value) {?>style="display:none;"<?php }?>>
                        <div id="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['key']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
_<?php echo intval($_smarty_tpl->tpl_vars['id_lang']->value);?>
" class="col-lg-9" >
                            <textarea class="textarea-autosize <?php if (isset($_smarty_tpl->tpl_vars['field']->value['autoload_rte'])&&$_smarty_tpl->tpl_vars['field']->value['autoload_rte']) {?>autoload_rte<?php }?>" name="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['key']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
_<?php echo intval($_smarty_tpl->tpl_vars['id_lang']->value);?>
"><?php echo smarty_modifier_replace(preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['value']->value),'\r\n',"\n");?>
</textarea>
                        </div>
                        <div class="col-lg-2">
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->_loop = true;
?>
                                <?php if ($_smarty_tpl->tpl_vars['language']->value['id_lang']==$_smarty_tpl->tpl_vars['id_lang']->value) {?><?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['language']->value['iso_code']);?>
<?php }?>
                            <?php } ?>
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->_loop = true;
?>
                                <li>
                                    <a href="javascript:hideOtherLanguage(<?php echo intval($_smarty_tpl->tpl_vars['language']->value['id_lang']);?>
);"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['language']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>

                </div>
            <?php } ?>
        </div>    
    <?php } elseif ($_smarty_tpl->tpl_vars['field']->value['type']=='pos_title') {?>    
        <div class="panel-heading">
            <?php if (isset($_smarty_tpl->tpl_vars['field']->value['title'])) {?><?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['field']->value['title']);?>
<?php }?>
        </div>
    <?php } else { ?>    
        

								
									<?php if ($_smarty_tpl->tpl_vars['field']->value['type']=='select') {?>
										<div class="col-lg-9">
											<?php if ($_smarty_tpl->tpl_vars['field']->value['list']) {?>
												<select class="form-control fixed-width-xxl <?php if (isset($_smarty_tpl->tpl_vars['field']->value['class'])) {?><?php echo $_smarty_tpl->tpl_vars['field']->value['class'];?>
<?php }?>" name="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"<?php if (isset($_smarty_tpl->tpl_vars['field']->value['js'])) {?> onchange="<?php echo $_smarty_tpl->tpl_vars['field']->value['js'];?>
"<?php }?> id="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" <?php if (isset($_smarty_tpl->tpl_vars['field']->value['size'])) {?> size="<?php echo $_smarty_tpl->tpl_vars['field']->value['size'];?>
"<?php }?>>
													<?php  $_smarty_tpl->tpl_vars['option'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['option']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['field']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['option']->key => $_smarty_tpl->tpl_vars['option']->value) {
$_smarty_tpl->tpl_vars['option']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['option']->key;
?>
														<option value="<?php echo $_smarty_tpl->tpl_vars['option']->value[$_smarty_tpl->tpl_vars['field']->value['identifier']];?>
"<?php if ($_smarty_tpl->tpl_vars['field']->value['value']==$_smarty_tpl->tpl_vars['option']->value[$_smarty_tpl->tpl_vars['field']->value['identifier']]) {?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['option']->value['name'];?>
</option>
													<?php } ?>
												</select>
											<?php } elseif (isset($_smarty_tpl->tpl_vars['input']->value['empty_message'])) {?>
												<?php echo $_smarty_tpl->tpl_vars['input']->value['empty_message'];?>

											<?php }?>
										</div>
									<?php } elseif ($_smarty_tpl->tpl_vars['field']->value['type']=='bool') {?>
										<div class="col-lg-9">
											<span class="switch prestashop-switch fixed-width-lg">
												<input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" id="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
_on" value="1" <?php if ($_smarty_tpl->tpl_vars['field']->value['value']) {?> checked="checked"<?php }?><?php if (isset($_smarty_tpl->tpl_vars['field']->value['js']['on'])) {?> <?php echo $_smarty_tpl->tpl_vars['field']->value['js']['on'];?>
<?php }?><?php if (isset($_smarty_tpl->tpl_vars['field']->value['disabled'])&&(bool)$_smarty_tpl->tpl_vars['field']->value['disabled']) {?> disabled="disabled"<?php }?>/><label for="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
_on" class="radioCheck"><?php echo smartyTranslate(array('s'=>'Yes'),$_smarty_tpl);?>
</label><input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" id="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
_off" value="0" <?php if (!$_smarty_tpl->tpl_vars['field']->value['value']) {?> checked="checked"<?php }?><?php if (isset($_smarty_tpl->tpl_vars['field']->value['js']['off'])) {?> <?php echo $_smarty_tpl->tpl_vars['field']->value['js']['off'];?>
<?php }?><?php if (isset($_smarty_tpl->tpl_vars['field']->value['disabled'])&&(bool)$_smarty_tpl->tpl_vars['field']->value['disabled']) {?> disabled="disabled"<?php }?>/><label for="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
_off" class="radioCheck"><?php echo smartyTranslate(array('s'=>'No'),$_smarty_tpl);?>
</label>
												<a class="slide-button btn"></a>
											</span>
										</div>
									<?php } elseif ($_smarty_tpl->tpl_vars['field']->value['type']=='radio') {?>
										<div class="col-lg-9">
											<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['field']->value['choices']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
												<p class="radio">
													<label for="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"><input type="radio" name="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" id="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
" value="<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
"<?php if ($_smarty_tpl->tpl_vars['k']->value==$_smarty_tpl->tpl_vars['field']->value['value']) {?> checked="checked"<?php }?><?php if (isset($_smarty_tpl->tpl_vars['field']->value['js'][$_smarty_tpl->tpl_vars['k']->value])) {?> <?php echo $_smarty_tpl->tpl_vars['field']->value['js'][$_smarty_tpl->tpl_vars['k']->value];?>
<?php }?>/><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</label>
												</p>
											<?php } ?>
										</div>
									<?php } elseif ($_smarty_tpl->tpl_vars['field']->value['type']=='checkbox') {?>
										<div class="col-lg-9">
											<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['field']->value['choices']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
												<p class="checkbox">
													<label class="col-lg-3" for="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
_on"><input type="checkbox" name="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" id="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
_on" value="<?php echo intval($_smarty_tpl->tpl_vars['k']->value);?>
"<?php if ($_smarty_tpl->tpl_vars['k']->value==$_smarty_tpl->tpl_vars['field']->value['value']) {?> checked="checked"<?php }?><?php if (isset($_smarty_tpl->tpl_vars['field']->value['js'][$_smarty_tpl->tpl_vars['k']->value])) {?> <?php echo $_smarty_tpl->tpl_vars['field']->value['js'][$_smarty_tpl->tpl_vars['k']->value];?>
<?php }?>/><?php echo $_smarty_tpl->tpl_vars['v']->value;?>
</label>
												</p>
											<?php } ?>
										</div>
									<?php } elseif ($_smarty_tpl->tpl_vars['field']->value['type']=='text') {?>
										<div class="col-lg-9"><?php if (isset($_smarty_tpl->tpl_vars['field']->value['suffix'])) {?><div class="input-group<?php if (isset($_smarty_tpl->tpl_vars['field']->value['class'])) {?> <?php echo $_smarty_tpl->tpl_vars['field']->value['class'];?>
<?php }?>"><?php }?>
											<input class="form-control <?php if (isset($_smarty_tpl->tpl_vars['field']->value['class'])) {?><?php echo $_smarty_tpl->tpl_vars['field']->value['class'];?>
<?php }?>" type="<?php echo $_smarty_tpl->tpl_vars['field']->value['type'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['field']->value['id'])) {?> id="<?php echo $_smarty_tpl->tpl_vars['field']->value['id'];?>
"<?php }?> size="<?php if (isset($_smarty_tpl->tpl_vars['field']->value['size'])) {?><?php echo intval($_smarty_tpl->tpl_vars['field']->value['size']);?>
<?php } else { ?>5<?php }?>" name="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" value="<?php if (isset($_smarty_tpl->tpl_vars['field']->value['no_escape'])&&$_smarty_tpl->tpl_vars['field']->value['no_escape']) {?><?php echo smarty_modifier_escape($_smarty_tpl->tpl_vars['field']->value['value'], 'UTF-8');?>
<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['value'], ENT_QUOTES, 'UTF-8', true);?>
<?php }?>" <?php if (isset($_smarty_tpl->tpl_vars['field']->value['autocomplete'])&&!$_smarty_tpl->tpl_vars['field']->value['autocomplete']) {?>autocomplete="off"<?php }?>/>
											<?php if (isset($_smarty_tpl->tpl_vars['field']->value['suffix'])) {?>
											<span class="input-group-addon">
												<?php echo strval($_smarty_tpl->tpl_vars['field']->value['suffix']);?>

											</span>
											<?php }?>
											<?php if (isset($_smarty_tpl->tpl_vars['field']->value['suffix'])) {?></div><?php }?>
										</div>
									<?php } elseif ($_smarty_tpl->tpl_vars['field']->value['type']=='password') {?>
										<div class="col-lg-9"><?php if (isset($_smarty_tpl->tpl_vars['field']->value['suffix'])) {?><div class="input-group<?php if (isset($_smarty_tpl->tpl_vars['field']->value['class'])) {?> <?php echo $_smarty_tpl->tpl_vars['field']->value['class'];?>
<?php }?>"><?php }?>
											<input type="<?php echo $_smarty_tpl->tpl_vars['field']->value['type'];?>
"<?php if (isset($_smarty_tpl->tpl_vars['field']->value['id'])) {?> id="<?php echo $_smarty_tpl->tpl_vars['field']->value['id'];?>
"<?php }?> size="<?php if (isset($_smarty_tpl->tpl_vars['field']->value['size'])) {?><?php echo intval($_smarty_tpl->tpl_vars['field']->value['size']);?>
<?php } else { ?>5<?php }?>" name="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" value=""<?php if (isset($_smarty_tpl->tpl_vars['field']->value['autocomplete'])&&!$_smarty_tpl->tpl_vars['field']->value['autocomplete']) {?> autocomplete="off"<?php }?> />
											<?php if (isset($_smarty_tpl->tpl_vars['field']->value['suffix'])) {?>
											<span class="input-group-addon">
												<?php echo strval($_smarty_tpl->tpl_vars['field']->value['suffix']);?>

											</span>
											<?php }?>
											<?php if (isset($_smarty_tpl->tpl_vars['field']->value['suffix'])) {?></div><?php }?>
										</div>
									<?php } elseif ($_smarty_tpl->tpl_vars['field']->value['type']=='textarea') {?>
										<div class="col-lg-9">
											<textarea class="textarea-autosize" name=<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
 cols="<?php echo $_smarty_tpl->tpl_vars['field']->value['cols'];?>
" rows="<?php echo $_smarty_tpl->tpl_vars['field']->value['rows'];?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['value'], ENT_QUOTES, 'UTF-8', true);?>
</textarea>
										</div>
									<?php } elseif ($_smarty_tpl->tpl_vars['field']->value['type']=='file') {?>
										<div class="col-lg-9"><?php echo $_smarty_tpl->tpl_vars['field']->value['file'];?>
</div>
									<?php } elseif ($_smarty_tpl->tpl_vars['field']->value['type']=='color') {?>
										<div class="col-lg-2">
											<div class="input-group">
												<input type="color" size="<?php echo $_smarty_tpl->tpl_vars['field']->value['size'];?>
" data-hex="true" <?php if (isset($_smarty_tpl->tpl_vars['input']->value['class'])) {?>class="<?php echo $_smarty_tpl->tpl_vars['field']->value['class'];?>
" <?php } else { ?>class="color mColorPickerInput"<?php }?> name="<?php echo $_smarty_tpl->tpl_vars['field']->value['name'];?>
" class="<?php if (isset($_smarty_tpl->tpl_vars['field']->value['class'])) {?><?php echo $_smarty_tpl->tpl_vars['field']->value['class'];?>
<?php }?>" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['value'], ENT_QUOTES, 'UTF-8', true);?>
" />
											</div>
							            </div>
									<?php } elseif ($_smarty_tpl->tpl_vars['field']->value['type']=='price') {?>
										<div class="col-lg-9">
											<div class="input-group fixed-width-lg">
												<span class="input-group-addon"><?php echo $_smarty_tpl->tpl_vars['currency_left_sign']->value;?>
<?php echo $_smarty_tpl->tpl_vars['currency_right_sign']->value;?>
 <?php echo smartyTranslate(array('s'=>'(tax excl.)'),$_smarty_tpl);?>
</span>
												<input type="text" size="<?php if (isset($_smarty_tpl->tpl_vars['field']->value['size'])) {?><?php echo intval($_smarty_tpl->tpl_vars['field']->value['size']);?>
<?php } else { ?>5<?php }?>" name="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['value'], ENT_QUOTES, 'UTF-8', true);?>
" />
											</div>
										</div>
									<?php } elseif ($_smarty_tpl->tpl_vars['field']->value['type']=='textLang'||$_smarty_tpl->tpl_vars['field']->value['type']=='textareaLang'||$_smarty_tpl->tpl_vars['field']->value['type']=='selectLang') {?>
										<?php if ($_smarty_tpl->tpl_vars['field']->value['type']=='textLang') {?>
											<div class="col-lg-9">
												<div class="row">
												<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['id_lang'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['field']->value['languages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['id_lang']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
													<?php if (count($_smarty_tpl->tpl_vars['field']->value['languages'])>1) {?>
													<div class="translatable-field lang-<?php echo $_smarty_tpl->tpl_vars['id_lang']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['id_lang']->value!=$_smarty_tpl->tpl_vars['current_id_lang']->value) {?>style="display:none;"<?php }?>>
														<div class="col-lg-9">
													<?php } else { ?>
													<div class="col-lg-12">
													<?php }?>
															<input type="text"
																name="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['id_lang']->value;?>
"
																value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['value']->value, ENT_QUOTES, 'UTF-8', true);?>
"
																<?php if (isset($_smarty_tpl->tpl_vars['input']->value['class'])) {?>class="<?php echo $_smarty_tpl->tpl_vars['input']->value['class'];?>
"<?php }?>
															/>
													<?php if (count($_smarty_tpl->tpl_vars['field']->value['languages'])>1) {?>
														</div>
														<div class="col-lg-2">
															<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
																<?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->_loop = true;
?>
																	<?php if ($_smarty_tpl->tpl_vars['language']->value['id_lang']==$_smarty_tpl->tpl_vars['id_lang']->value) {?><?php echo $_smarty_tpl->tpl_vars['language']->value['iso_code'];?>
<?php }?>
																<?php } ?>
																<span class="caret"></span>
															</button>
															<ul class="dropdown-menu">
																<?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->_loop = true;
?>
																<li>
																	<a href="javascript:hideOtherLanguage(<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
);"><?php echo $_smarty_tpl->tpl_vars['language']->value['name'];?>
</a>
																</li>
																<?php } ?>
															</ul>
														</div>
													</div>
													<?php } else { ?>
													</div>
													<?php }?>
												<?php } ?>
												</div>
											</div>
										<?php } elseif ($_smarty_tpl->tpl_vars['field']->value['type']=='textareaLang') {?>
											<div class="col-lg-9">
												<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['id_lang'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['field']->value['languages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['id_lang']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
													<div class="row translatable-field lang-<?php echo $_smarty_tpl->tpl_vars['id_lang']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['id_lang']->value!=$_smarty_tpl->tpl_vars['current_id_lang']->value) {?>style="display:none;"<?php }?>>
														<div id="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['id_lang']->value;?>
" class="col-lg-9" >
															<textarea class="textarea-autosize" name="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['id_lang']->value;?>
"><?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['value']->value,'\r\n',"\n");?>
</textarea>
														</div>
														<div class="col-lg-2">
															<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
																<?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->_loop = true;
?>
																	<?php if ($_smarty_tpl->tpl_vars['language']->value['id_lang']==$_smarty_tpl->tpl_vars['id_lang']->value) {?><?php echo $_smarty_tpl->tpl_vars['language']->value['iso_code'];?>
<?php }?>
																<?php } ?>
																<span class="caret"></span>
															</button>
															<ul class="dropdown-menu">
																<?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->_loop = true;
?>
																<li>
																	<a href="javascript:hideOtherLanguage(<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
);"><?php echo $_smarty_tpl->tpl_vars['language']->value['name'];?>
</a>
																</li>
																<?php } ?>
															</ul>
														</div>

													</div>
												<?php } ?>
												<script type="text/javascript">
													$(document).ready(function() {
														$(".textarea-autosize").autosize();
													});
												</script>
											</div>
										<?php } elseif ($_smarty_tpl->tpl_vars['field']->value['type']=='selectLang') {?>
											<?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->_loop = true;
?>
												<div id="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
" style="display: <?php if ($_smarty_tpl->tpl_vars['language']->value['id_lang']==$_smarty_tpl->tpl_vars['current_id_lang']->value) {?>block<?php } else { ?>none<?php }?>;" class="col-lg-9">
													<select name="<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
_<?php echo mb_strtoupper($_smarty_tpl->tpl_vars['language']->value['iso_code'], 'UTF-8');?>
">
														<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['field']->value['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
															<option value="<?php if (isset($_smarty_tpl->tpl_vars['v']->value['cast'])) {?><?php echo $_smarty_tpl->tpl_vars['v']->value['cast'][$_smarty_tpl->tpl_vars['v']->value[$_smarty_tpl->tpl_vars['field']->value['identifier']]];?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['v']->value[$_smarty_tpl->tpl_vars['field']->value['identifier']];?>
<?php }?>"
																<?php if ($_smarty_tpl->tpl_vars['field']->value['value'][$_smarty_tpl->tpl_vars['language']->value['id_lang']]==$_smarty_tpl->tpl_vars['v']->value['name']) {?> selected="selected"<?php }?>>
																<?php echo $_smarty_tpl->tpl_vars['v']->value['name'];?>

															</option>
														<?php } ?>
													</select>
												</div>
											<?php } ?>
										<?php }?>
									<?php }?>
									<?php if (isset($_smarty_tpl->tpl_vars['field']->value['desc'])&&!empty($_smarty_tpl->tpl_vars['field']->value['desc'])) {?>
									<div class="col-lg-9 col-lg-offset-3">
										<div class="help-block">
											<?php if (is_array($_smarty_tpl->tpl_vars['field']->value['desc'])) {?>
												<?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['field']->value['desc']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->_loop = true;
?>
													<?php if (is_array($_smarty_tpl->tpl_vars['p']->value)) {?>
														<span id="<?php echo $_smarty_tpl->tpl_vars['p']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['p']->value['text'];?>
</span><br />
													<?php } else { ?>
														<?php echo $_smarty_tpl->tpl_vars['p']->value;?>
<br />
													<?php }?>
												<?php } ?>
											<?php } else { ?>
												<?php echo $_smarty_tpl->tpl_vars['field']->value['desc'];?>

											<?php }?>
										</div>
									</div>
									<?php }?>
								
								<?php if ($_smarty_tpl->tpl_vars['field']->value['is_invisible']) {?>
								<div class="col-lg-9 col-lg-offset-3">
									<p class="alert alert-warning row-margin-top">
										<?php echo smartyTranslate(array('s'=>'You can\'t change the value of this configuration field in the context of this shop.'),$_smarty_tpl);?>

									</p>
								</div>
								<?php }?>
								
    <?php }?>

							</div>
						</div>
				<?php }?>
			<?php } ?>
			</div><!-- /.form-wrapper -->

			<?php if (isset($_smarty_tpl->tpl_vars['categoryData']->value['bottom'])) {?><?php echo $_smarty_tpl->tpl_vars['categoryData']->value['bottom'];?>
<?php }?>
			
				<?php if (isset($_smarty_tpl->tpl_vars['categoryData']->value['submit'])||isset($_smarty_tpl->tpl_vars['categoryData']->value['buttons'])) {?>
					<div class="panel-footer">
						<?php if (isset($_smarty_tpl->tpl_vars['categoryData']->value['submit'])&&!empty($_smarty_tpl->tpl_vars['categoryData']->value['submit'])) {?>
						<button type="<?php if (isset($_smarty_tpl->tpl_vars['categoryData']->value['submit']['type'])) {?><?php echo $_smarty_tpl->tpl_vars['categoryData']->value['submit']['type'];?>
<?php } else { ?>submit<?php }?>" <?php if (isset($_smarty_tpl->tpl_vars['categoryData']->value['submit']['id'])) {?>id="<?php echo $_smarty_tpl->tpl_vars['categoryData']->value['submit']['id'];?>
"<?php }?> class="btn btn-default pull-right" name="<?php if (isset($_smarty_tpl->tpl_vars['categoryData']->value['submit']['name'])) {?><?php echo $_smarty_tpl->tpl_vars['categoryData']->value['submit']['name'];?>
<?php } else { ?>submitOptions<?php echo $_smarty_tpl->tpl_vars['table']->value;?>
<?php }?>"><i class="process-icon-<?php if (isset($_smarty_tpl->tpl_vars['categoryData']->value['submit']['imgclass'])) {?><?php echo $_smarty_tpl->tpl_vars['categoryData']->value['submit']['imgclass'];?>
<?php } else { ?>save<?php }?>"></i> <?php echo $_smarty_tpl->tpl_vars['categoryData']->value['submit']['title'];?>
</button>
						<?php }?>
						<?php if (isset($_smarty_tpl->tpl_vars['categoryData']->value['buttons'])) {?>
						<?php  $_smarty_tpl->tpl_vars['btn'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['btn']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['categoryData']->value['buttons']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['btn']->key => $_smarty_tpl->tpl_vars['btn']->value) {
$_smarty_tpl->tpl_vars['btn']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['btn']->key;
?>
						<?php if (isset($_smarty_tpl->tpl_vars['btn']->value['href'])&&trim($_smarty_tpl->tpl_vars['btn']->value['href'])!='') {?>
							<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['btn']->value['href'], ENT_QUOTES, 'UTF-8', true);?>
" <?php if (isset($_smarty_tpl->tpl_vars['btn']->value['id'])) {?>id="<?php echo $_smarty_tpl->tpl_vars['btn']->value['id'];?>
"<?php }?> class="btn btn-default<?php if (isset($_smarty_tpl->tpl_vars['btn']->value['class'])) {?> <?php echo $_smarty_tpl->tpl_vars['btn']->value['class'];?>
<?php }?>" <?php if (isset($_smarty_tpl->tpl_vars['btn']->value['js'])&&$_smarty_tpl->tpl_vars['btn']->value['js']) {?> onclick="<?php echo $_smarty_tpl->tpl_vars['btn']->value['js'];?>
"<?php }?>><?php if (isset($_smarty_tpl->tpl_vars['btn']->value['icon'])) {?><i class="<?php echo $_smarty_tpl->tpl_vars['btn']->value['icon'];?>
" ></i> <?php }?><?php echo $_smarty_tpl->tpl_vars['btn']->value['title'];?>
</a>
						<?php } else { ?>
							<button type="<?php if (isset($_smarty_tpl->tpl_vars['btn']->value['type'])) {?><?php echo $_smarty_tpl->tpl_vars['btn']->value['type'];?>
<?php } else { ?>button<?php }?>" <?php if (isset($_smarty_tpl->tpl_vars['btn']->value['id'])) {?>id="<?php echo $_smarty_tpl->tpl_vars['btn']->value['id'];?>
"<?php }?> class="<?php if (isset($_smarty_tpl->tpl_vars['btn']->value['class'])) {?><?php echo $_smarty_tpl->tpl_vars['btn']->value['class'];?>
<?php } else { ?>btn btn-default<?php }?>" name="<?php if (isset($_smarty_tpl->tpl_vars['btn']->value['name'])) {?><?php echo $_smarty_tpl->tpl_vars['btn']->value['name'];?>
<?php } else { ?>submitOptions<?php echo $_smarty_tpl->tpl_vars['table']->value;?>
<?php }?>"<?php if (isset($_smarty_tpl->tpl_vars['btn']->value['js'])&&$_smarty_tpl->tpl_vars['btn']->value['js']) {?> onclick="<?php echo $_smarty_tpl->tpl_vars['btn']->value['js'];?>
"<?php }?>><?php if (isset($_smarty_tpl->tpl_vars['btn']->value['icon'])) {?><i class="<?php echo $_smarty_tpl->tpl_vars['btn']->value['icon'];?>
" ></i> <?php }?><?php echo $_smarty_tpl->tpl_vars['btn']->value['title'];?>
</button>
						<?php }?>
						<?php } ?>
						<?php }?>
					</div>
				<?php }?>
			
		</div>
	<?php } ?>
	<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayAdminOptions'),$_smarty_tpl);?>

	<?php if (isset($_smarty_tpl->tpl_vars['name_controller']->value)) {?>
		<?php $_smarty_tpl->_capture_stack[0][] = array('hookName', 'hookName', null); ob_start(); ?>display<?php echo ucfirst($_smarty_tpl->tpl_vars['name_controller']->value);?>
Options<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
		<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>$_smarty_tpl->tpl_vars['hookName']->value),$_smarty_tpl);?>

	<?php } elseif (isset($_GET['controller'])) {?>
		<?php $_smarty_tpl->_capture_stack[0][] = array('hookName', 'hookName', null); ob_start(); ?>display<?php echo htmlentities(ucfirst($_GET['controller']));?>
Options<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
		<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>$_smarty_tpl->tpl_vars['hookName']->value),$_smarty_tpl);?>

	<?php }?>
</form>


<?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2016-11-27 01:10:07
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/views/templates/admin/hs_point_of_sale_preferences_abstract/display_default_customer.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5839de0ff27dc4_54527731')) {function content_5839de0ff27dc4_54527731($_smarty_tpl) {?>

<?php if ($_smarty_tpl->tpl_vars['default_customer']->value->id) {?>
    <div class="form-control-static">
        <button name="7" class="delete_default_customer btn button btn-default" type="button" data-id-customer="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['default_customer']->value->id, ENT_QUOTES, 'UTF-8', true);?>
">
            <i class="icon-remove text-danger"></i>
        </button>
        <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['default_customer']->value->firstname, ENT_QUOTES, 'UTF-8', true);?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['default_customer']->value->lastname, ENT_QUOTES, 'UTF-8', true);?>

        (<a target="_blank" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminCustomers'), ENT_QUOTES, 'UTF-8', true);?>
&amp;id_customer=<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['default_customer']->value->id, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
&amp;updatecustomer"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['edit'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</a>)
    </div>
<?php }?><?php }} ?>
<?php /* Smarty version Smarty-3.1.19, created on 2016-11-27 01:10:08
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/views/templates/admin/hs_point_of_sale_preferences_abstract/helpers/options/_cron.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5839de10034303_79940855')) {function content_5839de10034303_79940855($_smarty_tpl) {?>

Crontab: 
<pre>wget <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['url']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</pre>
PHP:
<pre>
$url = '<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['url']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
';
$ch = curl_init(<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['url']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_exec($ch);
curl_close($ch);
</pre><?php }} ?>
