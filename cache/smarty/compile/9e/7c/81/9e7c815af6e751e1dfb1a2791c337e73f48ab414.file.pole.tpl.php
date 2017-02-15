<?php /* Smarty version Smarty-3.1.19, created on 2016-12-25 17:12:16
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/advancedcheckout/views/templates/front/pole.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1808669466583ed9e0a2dd26-42773893%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9e7c815af6e751e1dfb1a2791c337e73f48ab414' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/advancedcheckout/views/templates/front/pole.tpl',
      1 => 1482664250,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1808669466583ed9e0a2dd26-42773893',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_583ed9e0d4cb16_44780901',
  'variables' => 
  array (
    'new_addr' => 0,
    'address' => 0,
    'address_i' => 0,
    'countries' => 0,
    'country' => 0,
    'state' => 0,
    'HOOK_CREATE_ACCOUNT_TOP' => 0,
    'cn' => 0,
    'defcountry' => 0,
    'logged' => 0,
    'list_addr' => 0,
    'fields' => 0,
    'field' => 0,
    '($_smarty_tpl->tpl_vars[\'field\']->value[\'group\'])' => 0,
    'days' => 0,
    'day' => 0,
    's_d' => 0,
    'months' => 0,
    'k' => 0,
    's_m' => 0,
    'month' => 0,
    'years' => 0,
    'year' => 0,
    's_y' => 0,
    'genders' => 0,
    'gender' => 0,
    'customer' => 0,
    'v' => 0,
    'sl_country' => 0,
    'adv_ainvoice' => 0,
    'open_invoice' => 0,
    'list_addr_i' => 0,
    'adi' => 0,
    '($_smarty_tpl->tpl_vars[\'adi\']->value)' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_583ed9e0d4cb16_44780901')) {function content_583ed9e0d4cb16_44780901($_smarty_tpl) {?>

<script type="text/javascript">
// <![CDATA[
var new_addr = "<?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['new_addr']->value);?>
";
var idSelectedCountry = <?php if (isset($_POST['id_state'])) {?><?php echo intval($_POST['id_state']);?>
<?php } else { ?><?php if (isset($_smarty_tpl->tpl_vars['address']->value->id_state)) {?><?php echo intval($_smarty_tpl->tpl_vars['address']->value->id_state);?>
<?php } else { ?>false<?php }?><?php }?>;
var idSelectedCountry_i = <?php if (isset($_POST['id_state_invoice'])) {?><?php echo intval($_POST['id_state_invoice']);?>
<?php } else { ?><?php if (isset($_smarty_tpl->tpl_vars['address_i']->value->id_state)) {?><?php echo intval($_smarty_tpl->tpl_vars['address_i']->value->id_state);?>
<?php } else { ?>false<?php }?><?php }?>;
var countries = new Array();
var countriesNeedIDNumber = new Array();
var countriesNeedZipCode = new Array();
<?php  $_smarty_tpl->tpl_vars['country'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['country']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['countries']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['country']->key => $_smarty_tpl->tpl_vars['country']->value) {
$_smarty_tpl->tpl_vars['country']->_loop = true;
?>
	<?php if (isset($_smarty_tpl->tpl_vars['country']->value['states'])&&$_smarty_tpl->tpl_vars['country']->value['contains_states']) {?>
		countries[<?php echo intval($_smarty_tpl->tpl_vars['country']->value['id_country']);?>
] = new Array();
		<?php  $_smarty_tpl->tpl_vars['state'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['state']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['country']->value['states']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['state']->key => $_smarty_tpl->tpl_vars['state']->value) {
$_smarty_tpl->tpl_vars['state']->_loop = true;
?>
			countries[<?php echo intval($_smarty_tpl->tpl_vars['country']->value['id_country']);?>
].push({'id' : '<?php echo intval($_smarty_tpl->tpl_vars['state']->value['id_state']);?>
', 'name' : '<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['state']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
'});
		<?php } ?>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['country']->value['need_identification_number']) {?>
		countriesNeedIDNumber.push(<?php echo intval($_smarty_tpl->tpl_vars['country']->value['id_country']);?>
);
	<?php }?>
	<?php if (isset($_smarty_tpl->tpl_vars['country']->value['zip_code_format'])) {?>
		countriesNeedZipCode[<?php echo intval($_smarty_tpl->tpl_vars['country']->value['id_country']);?>
] = "<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['country']->value['zip_code_format'], ENT_QUOTES, 'UTF-8', true);?>
";
	<?php }?>
<?php } ?>
$(document).ready(function(){
	$('.hidepass').hide();
	$('#frsnconnect_form h3').hide();
	if(postcode_refresh){
		$('input[name="postcode"]').typeWatch({
			highlight: true, wait: 1500, captureLength: 0, callback: function(val){
				savepostcode(val, true, this);
			}
		});
	}
	
	if(city_refresh){
		$('input[name="city"]').typeWatch({
			highlight: true, wait: 1500, captureLength: 0, callback: function(val){
				savecity(val, true, this);
			}
		});
	}
});
//]]>
</script>

<div class="polya">
	<div id="delivery_div">
	<?php echo $_smarty_tpl->tpl_vars['HOOK_CREATE_ACCOUNT_TOP']->value;?>

	<input autocomplete="off" type="hidden" value="1" name="ajx" />
	<input autocomplete="off" type="hidden" value="register" name="method" />
	<?php if ($_smarty_tpl->tpl_vars['cn']->value==0) {?>
		<input autocomplete="off" type="hidden" value="<?php echo intval($_smarty_tpl->tpl_vars['defcountry']->value);?>
" name="id_country" id="id_country"/>
		<input autocomplete="off" type="hidden" value="<?php echo intval($_smarty_tpl->tpl_vars['defcountry']->value);?>
" name="id_country_invoice" id="id_country_invoice"/>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['logged']->value) {?>
		<br/>
		<div class="opc-form-group">
			<label for="id_address_delivery" class="w100 opc-control-label"><?php echo smartyTranslate(array('s'=>'Choose a delivery address:','mod'=>'advancedcheckout'),$_smarty_tpl);?>
</label>
			<div class="w100 opc-pr">
				<select onchange="updadvopcaddr($(this).val(), 'd');" class="address_select opc-form-control" name="id_address_delivery" id="id_address_delivery">
					<?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['list_addr']->value);?>

				</select>
			</div>
		</div>
	<?php }?>
	<?php  $_smarty_tpl->tpl_vars['field'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['field']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['fields']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['field']->key => $_smarty_tpl->tpl_vars['field']->value) {
$_smarty_tpl->tpl_vars['field']->_loop = true;
?>
		<?php if ($_smarty_tpl->tpl_vars['field']->value['type']=='input'&&$_smarty_tpl->tpl_vars['field']->value['name']!='passwd') {?>
			<div class="opc-form-group">
				<label class="w100 opc-control-label" for="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['description'], ENT_QUOTES, 'UTF-8', true);?>
: <?php if ($_smarty_tpl->tpl_vars['field']->value['required']) {?><sup>*</sup><?php }?></label>
				<div class="w100">
					<input data-tooltip="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['tooltip'], ENT_QUOTES, 'UTF-8', true);?>
" data-validate="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['validate'], ENT_QUOTES, 'UTF-8', true);?>
" autocomplete="off" type="text" class="opc-input-sm opc-form-control <?php if ($_smarty_tpl->tpl_vars['field']->value['required']) {?>is_required<?php }?> validate" id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" <?php if ($_smarty_tpl->tpl_vars['field']->value['group']!=''&&count($_smarty_tpl->tpl_vars[($_smarty_tpl->tpl_vars['field']->value['group'])]->value)) {?><?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars[($_smarty_tpl->tpl_vars['field']->value['group'])]->value->{$_smarty_tpl->tpl_vars['field']->value['name']}, ENT_QUOTES, 'UTF-8', true);?>
<?php $_tmp1=ob_get_clean();?><?php if (isset($_tmp1)) {?>value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars[($_smarty_tpl->tpl_vars['field']->value['group'])]->value->{$_smarty_tpl->tpl_vars['field']->value['name']}, ENT_QUOTES, 'UTF-8', true);?>
"<?php }?><?php }?> name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" placeholder="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['description'], ENT_QUOTES, 'UTF-8', true);?>
" />
				</div>
			</div>
		<?php } elseif ($_smarty_tpl->tpl_vars['field']->value['type']=='select'&&$_smarty_tpl->tpl_vars['field']->value['name']=='birthday') {?>
			<div class="select opc-form-group mb0 date-select">
				<label><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['description'], ENT_QUOTES, 'UTF-8', true);?>
: <?php if ($_smarty_tpl->tpl_vars['field']->value['required']) {?><sup>*</sup><?php }?></label>
				<div class="notinline">
					<div class="opc-form-group opc-inline">
						<div class="w100 opc-pr">
							<select id="days" name="days" class="opc-form-control <?php if ($_smarty_tpl->tpl_vars['field']->value['required']) {?>is_required<?php }?> form-control">
								<option value="">-</option>
								<?php  $_smarty_tpl->tpl_vars['day'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['day']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['days']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['day']->key => $_smarty_tpl->tpl_vars['day']->value) {
$_smarty_tpl->tpl_vars['day']->_loop = true;
?>
									<option value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['day']->value, ENT_QUOTES, 'UTF-8', true);?>
" <?php if (count($_smarty_tpl->tpl_vars[($_smarty_tpl->tpl_vars['field']->value['group'])]->value)) {?><?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars[($_smarty_tpl->tpl_vars['field']->value['group'])]->value->{$_smarty_tpl->tpl_vars['field']->value['name']}, ENT_QUOTES, 'UTF-8', true);?>
<?php $_tmp2=ob_get_clean();?><?php if (isset($_tmp2)&&$_smarty_tpl->tpl_vars['s_d']->value==$_smarty_tpl->tpl_vars['day']->value) {?> selected="selected"<?php }?><?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['day']->value, ENT_QUOTES, 'UTF-8', true);?>
&nbsp;&nbsp;</option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="opc-form-group opc-inline">
						<div class="w100 opc-pr">
							<select id="months" name="months" class="opc-form-control <?php if ($_smarty_tpl->tpl_vars['field']->value['required']) {?>is_required<?php }?> form-control">
								<option value="">-</option>
								<?php  $_smarty_tpl->tpl_vars['month'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['month']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['months']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['month']->key => $_smarty_tpl->tpl_vars['month']->value) {
$_smarty_tpl->tpl_vars['month']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['month']->key;
?>
									<option value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8', true);?>
" <?php if (count($_smarty_tpl->tpl_vars[($_smarty_tpl->tpl_vars['field']->value['group'])]->value)) {?><?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars[($_smarty_tpl->tpl_vars['field']->value['group'])]->value->{$_smarty_tpl->tpl_vars['field']->value['name']}, ENT_QUOTES, 'UTF-8', true);?>
<?php $_tmp3=ob_get_clean();?><?php if (isset($_tmp3)&&$_smarty_tpl->tpl_vars['s_m']->value==$_smarty_tpl->tpl_vars['k']->value) {?> selected="selected"<?php }?><?php }?>><?php echo smartyTranslate(array('s'=>$_smarty_tpl->tpl_vars['month']->value,'mod'=>'advancedcheckout'),$_smarty_tpl);?>
&nbsp;</option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="opc-form-group opc-inline">
						<div class="w100 opc-pr">
							<select id="years" name="years" class="opc-form-control <?php if ($_smarty_tpl->tpl_vars['field']->value['required']) {?>is_required<?php }?> form-control">
								<option value="">-</option>
								<?php  $_smarty_tpl->tpl_vars['year'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['year']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['years']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['year']->key => $_smarty_tpl->tpl_vars['year']->value) {
$_smarty_tpl->tpl_vars['year']->_loop = true;
?>
									<option value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['year']->value, ENT_QUOTES, 'UTF-8', true);?>
" <?php if (count($_smarty_tpl->tpl_vars[($_smarty_tpl->tpl_vars['field']->value['group'])]->value)) {?><?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars[($_smarty_tpl->tpl_vars['field']->value['group'])]->value->{$_smarty_tpl->tpl_vars['field']->value['name']}, ENT_QUOTES, 'UTF-8', true);?>
<?php $_tmp4=ob_get_clean();?><?php if (isset($_tmp4)&&$_smarty_tpl->tpl_vars['s_y']->value==$_smarty_tpl->tpl_vars['year']->value) {?> selected="selected"<?php }?><?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['year']->value, ENT_QUOTES, 'UTF-8', true);?>
&nbsp;&nbsp;</option>
								<?php } ?>
							</select>
						</div>
					</div>
					
				</div>
			</div>
		<?php } elseif ($_smarty_tpl->tpl_vars['field']->value['type']=='radio'&&$_smarty_tpl->tpl_vars['field']->value['name']=='gender') {?>
			<div class="required clearfix gender-line mb0 opc-form-group" data-tooltip="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['tooltip'], ENT_QUOTES, 'UTF-8', true);?>
">
				<label class="fl"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['description'], ENT_QUOTES, 'UTF-8', true);?>
: <?php if ($_smarty_tpl->tpl_vars['field']->value['required']) {?><sup>*</sup><?php }?></label>
				<?php  $_smarty_tpl->tpl_vars['gender'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['gender']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['genders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['gender']->key => $_smarty_tpl->tpl_vars['gender']->value) {
$_smarty_tpl->tpl_vars['gender']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['gender']->key;
?>	
					<div class="opc-radio opc-inline">
						<label for="id_gender<?php echo intval($_smarty_tpl->tpl_vars['gender']->value->id_gender);?>
">
							<input class="opc-form-control" type="radio" name="id_gender" id="id_gender<?php echo intval($_smarty_tpl->tpl_vars['gender']->value->id_gender);?>
" value="<?php echo intval($_smarty_tpl->tpl_vars['gender']->value->id_gender);?>
" <?php if (count($_smarty_tpl->tpl_vars['customer']->value)) {?><?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['customer']->value->id_gender);?>
<?php $_tmp5=ob_get_clean();?><?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['gender']->value->id_gender);?>
<?php $_tmp6=ob_get_clean();?><?php if (isset($_tmp5)&&intval($_smarty_tpl->tpl_vars['customer']->value->id_gender)==$_tmp6) {?> checked="checked"<?php }?><?php }?> />
							<span class="opc-text"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['gender']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</span>
						</label>
					</div>
				<?php } ?>
			</div>
		<?php } elseif ($_smarty_tpl->tpl_vars['field']->value['type']=='input'&&$_smarty_tpl->tpl_vars['field']->value['name']=='passwd') {?>
		<?php if (!$_smarty_tpl->tpl_vars['logged']->value) {?>
			<?php if (!$_smarty_tpl->tpl_vars['field']->value['required']) {?>
			<div class="opc-form-group">
				<div class="w100">
					<div class="opc-checkbox">
						<label for="pssw">
							<input data-tooltip="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['tooltip'], ENT_QUOTES, 'UTF-8', true);?>
" type="checkbox" name="pssw" id="pssw" value="1" autocomplete="off"/>
							<span class="opc-text"><?php echo smartyTranslate(array('s'=>'Registration?','mod'=>'advancedcheckout'),$_smarty_tpl);?>
</span>
						</label>
					</div>
				</div>
			</div>
			<div class="opc-form-group hidepass" style="display:none;">
				<label class="w100 opc-control-label" for="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['description'], ENT_QUOTES, 'UTF-8', true);?>
: <?php if ($_smarty_tpl->tpl_vars['field']->value['required']) {?><sup>*</sup><?php }?></label>
				<div class="w100">
					<input data-tooltip="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['tooltip'], ENT_QUOTES, 'UTF-8', true);?>
" data-validate="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['validate'], ENT_QUOTES, 'UTF-8', true);?>
" autocomplete="off" type="text" class="opc-form-control <?php if ($_smarty_tpl->tpl_vars['field']->value['required']) {?>is_required<?php }?> validate" id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
"  name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" placeholder="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['description'], ENT_QUOTES, 'UTF-8', true);?>
" data-validate="is<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" />
				</div>
			</div>
			<?php } else { ?>
			<div class="opc-form-group">
				<label class="w100 opc-control-label" for="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['description'], ENT_QUOTES, 'UTF-8', true);?>
: <?php if ($_smarty_tpl->tpl_vars['field']->value['required']) {?><sup>*</sup><?php }?></label>
				<input type="hidden" name="pssw" id="pssw" value="1"/>
				<div class="w100">
					<input data-tooltip="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['tooltip'], ENT_QUOTES, 'UTF-8', true);?>
" data-validate="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['validate'], ENT_QUOTES, 'UTF-8', true);?>
" autocomplete="off" type="text" class="opc-form-control <?php if ($_smarty_tpl->tpl_vars['field']->value['required']) {?>is_required<?php }?> validate" id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
"  name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" placeholder="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['description'], ENT_QUOTES, 'UTF-8', true);?>
" data-validate="is<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" />
				</div>
			</div>
			<?php }?>
		<?php }?>
		<?php } elseif ($_smarty_tpl->tpl_vars['field']->value['type']=='select'&&$_smarty_tpl->tpl_vars['field']->value['name']=='id_country') {?>
			<div class="opc-form-group" data-tooltip="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['tooltip'], ENT_QUOTES, 'UTF-8', true);?>
">
				<label class="w100 opc-control-label" for="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['description'], ENT_QUOTES, 'UTF-8', true);?>
: <?php if ($_smarty_tpl->tpl_vars['field']->value['required']) {?><sup>*</sup><?php }?></label>
				<div class="w100 opc-pr">
					<select name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" class="<?php if ($_smarty_tpl->tpl_vars['field']->value['required']) {?>is_required<?php }?> opc-form-control">
						<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['countries']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
							<option value="<?php echo intval($_smarty_tpl->tpl_vars['v']->value['id_country']);?>
" <?php if ((intval($_smarty_tpl->tpl_vars['sl_country']->value)==intval($_smarty_tpl->tpl_vars['v']->value['id_country']))) {?> selected="selected"<?php }?>><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['v']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</option>
						<?php } ?>
					</select>
				</div>
			</div>
		<?php } elseif ($_smarty_tpl->tpl_vars['field']->value['type']=='select'&&$_smarty_tpl->tpl_vars['field']->value['name']=='id_state') {?>
			<div class="opc-form-group" data-tooltip="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['tooltip'], ENT_QUOTES, 'UTF-8', true);?>
">
				<label class="w100 opc-control-label" for="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['description'], ENT_QUOTES, 'UTF-8', true);?>
: <?php if ($_smarty_tpl->tpl_vars['field']->value['required']) {?><sup>*</sup><?php }?></label>
				<div class="w100 opc-pr">
					<select name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" class="<?php if ($_smarty_tpl->tpl_vars['field']->value['required']) {?>is_required<?php }?> opc-form-control">
						<option value="">-</option>
					</select>
				</div>
			</div>
		<?php } elseif ($_smarty_tpl->tpl_vars['field']->value['type']=='textarea') {?>
			<div class="opc-form-group" data-tooltip="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['tooltip'], ENT_QUOTES, 'UTF-8', true);?>
">
				<label for="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" class="w100 opc-control-label"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['description'], ENT_QUOTES, 'UTF-8', true);?>
: <?php if ($_smarty_tpl->tpl_vars['field']->value['required']) {?><sup>*</sup><?php }?></label>
				<div class="w100 opc-input-icon opc-icon-right">
					<textarea data-validate="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['validate'], ENT_QUOTES, 'UTF-8', true);?>
" class="<?php if ($_smarty_tpl->tpl_vars['field']->value['required']) {?>is_required<?php }?> opc-form-control opc-elastic validate" name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" placeholder="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['description'], ENT_QUOTES, 'UTF-8', true);?>
" id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" cols="26" rows="3"><?php if ($_smarty_tpl->tpl_vars['field']->value['group']!=''&&count($_smarty_tpl->tpl_vars[($_smarty_tpl->tpl_vars['field']->value['group'])]->value)) {?><?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars[($_smarty_tpl->tpl_vars['field']->value['group'])]->value->{$_smarty_tpl->tpl_vars['field']->value['name']}, ENT_QUOTES, 'UTF-8', true);?>
<?php $_tmp7=ob_get_clean();?><?php if (isset($_tmp7)) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars[($_smarty_tpl->tpl_vars['field']->value['group'])]->value->{$_smarty_tpl->tpl_vars['field']->value['name']}, ENT_QUOTES, 'UTF-8', true);?>
<?php }?><?php }?></textarea>
					<?php if ($_smarty_tpl->tpl_vars['field']->value['name']=='address1') {?>
						<i class="fa fa-envelope"></i>
					<?php } elseif ($_smarty_tpl->tpl_vars['field']->value['name']=='address2') {?>
						<i class="fa fa-envelope-alt"></i>
					<?php } else { ?>
						<i class="fa fa-comment"></i>
					<?php }?>
				</div>
			</div>
		<?php } elseif ($_smarty_tpl->tpl_vars['field']->value['type']=='checkbox') {?>
			<div class="opc-form-group">
				<div class="w100">
					<div class="opc-checkbox">
						<label for="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
">
							<input data-tooltip="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['tooltip'], ENT_QUOTES, 'UTF-8', true);?>
" type="checkbox" name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" value="1" <?php if (count($_smarty_tpl->tpl_vars[($_smarty_tpl->tpl_vars['field']->value['group'])]->value)) {?><?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars[($_smarty_tpl->tpl_vars['field']->value['group'])]->value->{$_smarty_tpl->tpl_vars['field']->value['name']}, ENT_QUOTES, 'UTF-8', true);?>
<?php $_tmp8=ob_get_clean();?><?php if (isset($_tmp8)&&$_smarty_tpl->tpl_vars[($_smarty_tpl->tpl_vars['field']->value['group'])]->value->{$_smarty_tpl->tpl_vars['field']->value['name']}==1) {?>checked="checked"<?php }?><?php }?> autocomplete="off"/>
							<span class="opc-text"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['description'], ENT_QUOTES, 'UTF-8', true);?>
<?php if ($_smarty_tpl->tpl_vars['field']->value['required']=='1') {?><sup>*</sup><?php }?></span>
						</label>
					</div>
				</div>
			</div>
		<?php }?>
	<?php } ?>
	</div>
	<?php if (!$_smarty_tpl->tpl_vars['adv_ainvoice']->value) {?>
	<div class="opc-form-group">
		<div class="w100">
			<div class="opc-checkbox">
				<label for="invoice_address">
					<input type="checkbox" value="1" <?php if ($_smarty_tpl->tpl_vars['open_invoice']->value) {?>checked="checked"<?php }?>name="invoice_address" id="invoice_address" autocomplete="off"/>
					<span class="opc-text"><?php echo smartyTranslate(array('s'=>'Please use another address for invoice','mod'=>'advancedcheckout'),$_smarty_tpl);?>
</span>
				</label>
			</div>
		</div>
	</div>
	<div id="invoice_div" style="display:none;">
		<?php if ($_smarty_tpl->tpl_vars['logged']->value) {?>
			<div class="opc-form-group iaddress_div" >
				<label class="opc-control-label" data-tooltip="" for="iaddres_select">
					<?php echo smartyTranslate(array('s'=>'Choose a invoice address:','mod'=>'advancedcheckout'),$_smarty_tpl);?>

				</label>
				<div class="w100 opc-pr">
					<select onchange="updadvopcaddr($(this).val(), 'i');" class="iaddres_select opc-form-control" name="iaddres_select" id="iaddres_select">
						<?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['list_addr_i']->value);?>

					</select>
				</div>
			</div>
		<?php }?>
		<?php $_smarty_tpl->tpl_vars["adi"] = new Smarty_variable("address_i", null, 0);?>
		<?php  $_smarty_tpl->tpl_vars['field'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['field']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['fields']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['field']->key => $_smarty_tpl->tpl_vars['field']->value) {
$_smarty_tpl->tpl_vars['field']->_loop = true;
?>
		<?php if ($_smarty_tpl->tpl_vars['field']->value['group']=='customer') {?>
			<?php if ($_smarty_tpl->tpl_vars['field']->value['type']=='input'&&($_smarty_tpl->tpl_vars['field']->value['name']=='firstname'||$_smarty_tpl->tpl_vars['field']->value['name']=='lastname')) {?>
				<div class="opc-form-group">
					<label class="w100 opc-control-label" for="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
_invoice"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['description'], ENT_QUOTES, 'UTF-8', true);?>
: <?php if ($_smarty_tpl->tpl_vars['field']->value['required']) {?><sup>*</sup><?php }?></label>
					<div class="w100">
						<input data-tooltip="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['tooltip'], ENT_QUOTES, 'UTF-8', true);?>
" data-validate="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['validate'], ENT_QUOTES, 'UTF-8', true);?>
" autocomplete="off" type="text" class="opc-input-sm opc-form-control <?php if ($_smarty_tpl->tpl_vars['field']->value['required']) {?>is_required<?php }?> validate" id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
_invoice" <?php if (count($_smarty_tpl->tpl_vars[($_smarty_tpl->tpl_vars['adi']->value)]->value)) {?><?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars[($_smarty_tpl->tpl_vars['adi']->value)]->value->{$_smarty_tpl->tpl_vars['field']->value['name']}, ENT_QUOTES, 'UTF-8', true);?>
<?php $_tmp9=ob_get_clean();?><?php if (isset($_tmp9)) {?>value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars[($_smarty_tpl->tpl_vars['adi']->value)]->value->{$_smarty_tpl->tpl_vars['field']->value['name']}, ENT_QUOTES, 'UTF-8', true);?>
"<?php }?><?php }?> name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
_invoice" placeholder="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['description'], ENT_QUOTES, 'UTF-8', true);?>
" data-validate="is<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" />
					</div>
				</div>
			<?php }?>
		<?php } elseif ($_smarty_tpl->tpl_vars['field']->value['group']=='address') {?>
			<?php if ($_smarty_tpl->tpl_vars['field']->value['type']=='input') {?>
				<div class="opc-form-group">
					<label class="w100 opc-control-label" for="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
_invoice"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['description'], ENT_QUOTES, 'UTF-8', true);?>
: <?php if ($_smarty_tpl->tpl_vars['field']->value['required']) {?><sup>*</sup><?php }?></label>
					<div class="w100">
						<input data-tooltip="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['tooltip'], ENT_QUOTES, 'UTF-8', true);?>
" data-validate="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['validate'], ENT_QUOTES, 'UTF-8', true);?>
" autocomplete="off" type="text" class="opc-input-sm opc-form-control <?php if ($_smarty_tpl->tpl_vars['field']->value['required']) {?>is_required<?php }?> validate" id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
_invoice" <?php if (count($_smarty_tpl->tpl_vars[($_smarty_tpl->tpl_vars['adi']->value)]->value)) {?><?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars[($_smarty_tpl->tpl_vars['adi']->value)]->value->{$_smarty_tpl->tpl_vars['field']->value['name']}, ENT_QUOTES, 'UTF-8', true);?>
<?php $_tmp10=ob_get_clean();?><?php if (isset($_tmp10)) {?>value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars[($_smarty_tpl->tpl_vars['adi']->value)]->value->{$_smarty_tpl->tpl_vars['field']->value['name']}, ENT_QUOTES, 'UTF-8', true);?>
"<?php }?><?php }?> name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
_invoice" placeholder="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['description'], ENT_QUOTES, 'UTF-8', true);?>
" data-validate="is<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" />
					</div>
				</div>
			<?php } elseif ($_smarty_tpl->tpl_vars['field']->value['type']=='select'&&$_smarty_tpl->tpl_vars['field']->value['name']=='id_country') {?>
				<div class="opc-form-group" data-tooltip="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['tooltip'], ENT_QUOTES, 'UTF-8', true);?>
">
					<label class="w100 opc-control-label" for="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
_invoice"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['description'], ENT_QUOTES, 'UTF-8', true);?>
: <?php if ($_smarty_tpl->tpl_vars['field']->value['required']) {?><sup>*</sup><?php }?></label>
					<div class="w100 opc-pr">
						<select name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
_invoice" id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
_invoice" class="<?php if ($_smarty_tpl->tpl_vars['field']->value['required']) {?>is_required<?php }?> opc-form-control">
							<option value="">-</option>
							<?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['countries']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
?>
								<option value="<?php echo intval($_smarty_tpl->tpl_vars['v']->value['id_country']);?>
" <?php if ((intval($_smarty_tpl->tpl_vars['sl_country']->value)==intval($_smarty_tpl->tpl_vars['v']->value['id_country']))) {?> selected="selected"<?php }?>><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['v']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</option>
							<?php } ?>
						</select>
					</div>
				</div>
			<?php } elseif ($_smarty_tpl->tpl_vars['field']->value['type']=='select'&&$_smarty_tpl->tpl_vars['field']->value['name']=='id_state') {?>
				<div class="opc-form-group" data-tooltip="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['tooltip'], ENT_QUOTES, 'UTF-8', true);?>
">
					<label class="w100 opc-control-label" for="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
_invoice"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['description'], ENT_QUOTES, 'UTF-8', true);?>
: <?php if ($_smarty_tpl->tpl_vars['field']->value['required']) {?><sup>*</sup><?php }?></label>
					<div class="w100 opc-pr">
						<select name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
_invoice" id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
_invoice" class="<?php if ($_smarty_tpl->tpl_vars['field']->value['required']) {?>is_required<?php }?> opc-form-control">
							<option value="">-</option>
						</select>
					</div>
				</div>
			<?php } elseif ($_smarty_tpl->tpl_vars['field']->value['type']=='textarea') {?>
				<div class="opc-form-group is_customer_param" data-tooltip="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['tooltip'], ENT_QUOTES, 'UTF-8', true);?>
">
					<label for="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
_invoice" class="w100 opc-control-label"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['description'], ENT_QUOTES, 'UTF-8', true);?>
: <?php if ($_smarty_tpl->tpl_vars['field']->value['required']) {?><sup>*</sup><?php }?></label>
					<div class="w100 opc-input-icon opc-icon-right">
						<textarea data-validate="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['validate'], ENT_QUOTES, 'UTF-8', true);?>
" class="<?php if ($_smarty_tpl->tpl_vars['field']->value['required']) {?>is_required<?php }?> opc-form-control opc-elastic validate" name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
_invoice" placeholder="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['description'], ENT_QUOTES, 'UTF-8', true);?>
" id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['field']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
_invoice" cols="26" rows="3"><?php if (count($_smarty_tpl->tpl_vars[($_smarty_tpl->tpl_vars['adi']->value)]->value)) {?><?php ob_start();?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars[($_smarty_tpl->tpl_vars['adi']->value)]->value->{$_smarty_tpl->tpl_vars['field']->value['name']}, ENT_QUOTES, 'UTF-8', true);?>
<?php $_tmp11=ob_get_clean();?><?php if (isset($_tmp11)) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars[($_smarty_tpl->tpl_vars['adi']->value)]->value->{$_smarty_tpl->tpl_vars['field']->value['name']}, ENT_QUOTES, 'UTF-8', true);?>
<?php }?><?php }?></textarea>
						<i class="fa fa-plus"></i>
					</div>
				</div>
			<?php }?>
		<?php }?>
		<?php } ?>
	</div>
	<?php }?>
	
</div><?php }} ?>
