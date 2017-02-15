<?php /* Smarty version Smarty-3.1.19, created on 2016-11-30 19:25:07
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/supercheckout/views/templates/admin/supercheckout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1882925983583ed3332be334-14062373%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '476e315f5a2acf4fb938d13befc5b664613b3486' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/supercheckout/views/templates/admin/supercheckout.tpl',
      1 => 1480512296,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1882925983583ed3332be334-14062373',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'action' => 0,
    'velocity_supercheckout' => 0,
    'module_dir' => 0,
    'cancel_action' => 0,
    'ps_version' => 0,
    'submit_action' => 0,
    'IE7' => 0,
    'module_url' => 0,
    'domain' => 0,
    'manual_dir' => 0,
    'k' => 0,
    'highlighted_fields' => 0,
    'payment_methods' => 0,
    'pay_methods' => 0,
    'languages' => 0,
    'lang' => 0,
    'velocity_supercheckout_payment' => 0,
    'img_lang_dir' => 0,
    'root_dir' => 0,
    'carriers' => 0,
    'carrier' => 0,
    'layout' => 0,
    'tab_name' => 0,
    'col_name' => 0,
    'default_selected_language' => 0,
    'root_path' => 0,
    'current_lang_translator_vars' => 0,
    'label' => 0,
    'selected_lang_translator_vars' => 0,
    'main_width' => 0,
    'column_1' => 0,
    'column_2' => 0,
    'column_3' => 0,
    'column_4' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_583ed334aa57c2_25125818',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_583ed334aa57c2_25125818')) {function content_583ed334aa57c2_25125818($_smarty_tpl) {?>
<script type="text/javascript">
    var uncheckAddressFieldMsg = '<?php echo smartyTranslate(array('s'=>'You cannot uncheck this field due to required field','mod'=>'supercheckout','js'=>1),$_smarty_tpl);?>
';
    var scp_ajax_action = '<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
';		//Variable contains url, escape not required
    var loginizer_adv = <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['loginizer_adv'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
;
	var module_path = '<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['module_dir']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
';
	var remove_cnfrm_msg = '<?php echo smartyTranslate(array('s'=>'Are you really want to remove the image?','mod'=>'supercheckout'),$_smarty_tpl);?>
';
</script>

<div id="velsof_supercheckout_container" class="content">
    <div class="box">
        <div class="navbar main hidden-print">
            <!-- Brand & save buttons -->
            <ul class="pull-left">
		<div style="position: inherit;color: white;font-size: 15px;min-width: 700px;padding-left: 50px;padding-top: 5px;">
			Paid Version with full features.
			<a target="_blank" href="http://psdemo.knowband.com/admin1212" style="text-decoration: none;">
				<span style="color: white;background-color: #79BD3C;padding: 6px 20px;border-radius: 3px;font-size: 13px;margin-left: 10px;text-shadow: chartreuse;">
					Check Demo
				</span>
			</a>
			<a target="_blank" href="http://www.knowband.com/prestashop-one-page-supercheckout" style="text-decoration: none;">
				<span style="color: white;background-color: #79BD3C;padding: 6px 20px;border-radius: 3px;font-size: 13px;margin-left: 10px;text-shadow: chartreuse;">
					Buy Now
				</span>
			</a>
		</div>
                <li class="themer_eyedropper" data-toggle="collapse" data-target="#themer"></li>
            </ul>
            <div class="topbuttons">                
                <a href="javascript:void(0)" onclick="validate_data()"><span id="save_post_setting" class="btn btn-block btn-success action-btn"><?php echo smartyTranslate(array('s'=>'Save','mod'=>'supercheckout'),$_smarty_tpl);?>
</span></a>&nbsp;&nbsp;&nbsp;<a href="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['cancel_action']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"><span class="btn btn-block btn-danger action-btn"><?php echo smartyTranslate(array('s'=>'Cancel','mod'=>'supercheckout'),$_smarty_tpl);?>
</span></a>
                <span class="gritter-add-primary btn btn-default btn-block hidden">For notifications on saving</span>
            </div>
        </div>
        <div class="velsof-container">
            <div class="widget velsof-widget-left">
                <div class="widget-body velsof-widget-left">                    
                        <div id="wrapper">
                            <div id="menuVel" class="hidden-print ui-resizable">
                                <div class="slimScrollDiv">
                                    <div class="slim-scroll">
                                        <ul>
                                            <li class="active <?php if ($_smarty_tpl->tpl_vars['ps_version']->value==15) {?>vss-tab-ver15<?php }?>"><a class="glyphicons settings" href="#tab_general_settings" data-toggle="tab"><i></i><span><?php echo smartyTranslate(array('s'=>'General Settings','mod'=>'supercheckout'),$_smarty_tpl);?>
</span></a></li>
                                            <li class="<?php if ($_smarty_tpl->tpl_vars['ps_version']->value==15) {?>vss-tab-ver15<?php }?>"><a class="glyphicons brush" href="#tab_customizer" data-toggle="tab"><i></i><span><?php echo smartyTranslate(array('s'=>'Customizer','mod'=>'supercheckout'),$_smarty_tpl);?>
</span></a></li>
                                            <li class="<?php if ($_smarty_tpl->tpl_vars['ps_version']->value==15) {?>vss-tab-ver15<?php }?>"><a class="glyphicons keys" id="velsof_tab_login" href="#tab_login" onclick="loginizerAdv();"data-toggle="tab"><i></i><span><?php echo smartyTranslate(array('s'=>'Login','mod'=>'supercheckout'),$_smarty_tpl);?>
</span></a></li>                                            
                                            <li class="<?php if ($_smarty_tpl->tpl_vars['ps_version']->value==15) {?>vss-tab-ver15<?php }?>"><a class="glyphicons envelope" id="velsof_tab_mailchimp" href="#tab_mailchimp" data-toggle="tab"><i></i><span><?php echo smartyTranslate(array('s'=>'MailChimp','mod'=>'supercheckout'),$_smarty_tpl);?>
</span></a></li>                                            
                                            <li class="<?php if ($_smarty_tpl->tpl_vars['ps_version']->value==15) {?>vss-tab-ver15<?php }?>"><a class="glyphicons home" href="#tab_Addr" data-toggle="tab"><i></i><span><?php echo smartyTranslate(array('s'=>'Addresses','mod'=>'supercheckout'),$_smarty_tpl);?>
</span></a></li>
                                            <li class="<?php if ($_smarty_tpl->tpl_vars['ps_version']->value==15) {?>vss-tab-ver15<?php }?>"><a class="glyphicons credit_card" href="#tab_payment_method" data-toggle="tab"><i></i><span><?php echo smartyTranslate(array('s'=>'Payment Method','mod'=>'supercheckout'),$_smarty_tpl);?>
</span></a></li>
                                            <li class="<?php if ($_smarty_tpl->tpl_vars['ps_version']->value==15) {?>vss-tab-ver15<?php }?>"><a class="glyphicons cargo" href="#tab_shipping_method" data-toggle="tab"><i></i><span><?php echo smartyTranslate(array('s'=>'Delivery Method','mod'=>'supercheckout'),$_smarty_tpl);?>
</span></a></li>
                                            <li class="<?php if ($_smarty_tpl->tpl_vars['ps_version']->value==15) {?>vss-tab-ver15<?php }?>"><a class="glyphicons boat" href="#tab_ship_to_pay" data-toggle="tab"><i></i><span><?php echo smartyTranslate(array('s'=>'Ship2pay','mod'=>'supercheckout'),$_smarty_tpl);?>
</span></a></li>
					    <li class="<?php if ($_smarty_tpl->tpl_vars['ps_version']->value==15) {?>vss-tab-ver15<?php }?>"><a class="glyphicons shopping_cart" href="#tab_cart" data-toggle="tab"><i></i><span><?php echo smartyTranslate(array('s'=>'Cart','mod'=>'supercheckout'),$_smarty_tpl);?>
</span></a></li>
                                            <li class="<?php if ($_smarty_tpl->tpl_vars['ps_version']->value==15) {?>vss-tab-ver15<?php }?>"><a class="glyphicons podium" id="velsof_tab_design" href="#tab_design" data-toggle="tab"><i></i><span><?php echo smartyTranslate(array('s'=>'Design','mod'=>'supercheckout'),$_smarty_tpl);?>
</span></a></li>
                                            <li class="<?php if ($_smarty_tpl->tpl_vars['ps_version']->value==15) {?>vss-tab-ver15<?php }?>"><a class="glyphicons conversation" href="#tab_lang_translator" data-toggle="tab"><i></i><span><?php echo smartyTranslate(array('s'=>'Language Translator','mod'=>'supercheckout'),$_smarty_tpl);?>
</span></a></li>
                                            <li class="<?php if ($_smarty_tpl->tpl_vars['ps_version']->value==15) {?>vss-tab-ver15<?php }?>"><a class="glyphicons circle_question_mark" href="#tab_faq" data-toggle="tab"><i></i><span><?php echo smartyTranslate(array('s'=>'FAQs','mod'=>'supercheckout'),$_smarty_tpl);?>
</span></a></li>                                            
                                            <li class="<?php if ($_smarty_tpl->tpl_vars['ps_version']->value==15) {?>vss-tab-ver15<?php }?>"><a class="glyphicons pen" href="#tab_suggest" data-toggle="tab"><i></i><span><?php echo smartyTranslate(array('s'=>'Suggestions','mod'=>'supercheckout'),$_smarty_tpl);?>
</span></a></li>
                                            <li class="<?php if ($_smarty_tpl->tpl_vars['ps_version']->value==15) {?>vss-tab-ver15<?php }?>"><a class="glyphicons bookmark" target="_blank" href="http://addons.prestashop.com/en/2_community?contributor=38002" target="_blank"><i></i><span><?php echo smartyTranslate(array('s'=>'Other Plugins','mod'=>'supercheckout'),$_smarty_tpl);?>
</span></a></li>
                                        </ul>
                                        <div class="clearfix"></div>
<!--                                        <div class="separator bottom"></div> -->
                                    </div>
                                </div>
                                <div class="ui-resizable-handle ui-resizable-e" style="z-index: 1000;"></div>
                            </div>
                            
                            <div id="content">
                                <div class="box">
                                    <div class="content tabs">
                                        
                                           
                                            <div class="layout">
                                                <div class="tab-content even-height">
                                                    <!--------------- Start - General Setings -------------------->
                                            <form action="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['action']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" method="post" enctype="multipart/form-data" id="supercheckout_configuration_form">
												 <input type="hidden" name="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['submit_action']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" value="1" >
                                            
                                                    <div id="tab_general_settings" class="tab-pane active tab-form">
                                                            <div class="block">
                                                                <h4 class='velsof-tab-heading'><?php echo smartyTranslate(array('s'=>'General Settings','mod'=>'supercheckout'),$_smarty_tpl);?>
</h4>
                                                                <table class="form">
                                                                    <tr>
                                                                        <td class="name vertical_top_align"><span class="control-label"><?php echo smartyTranslate(array('s'=>'Enable/Disable','mod'=>'supercheckout'),$_smarty_tpl);?>
: </span>                                                                
                                                                            <i class="icon-question-sign supercheckout-tooltip-color" data-toggle="tooltip"  data-placement="top" data-original-title="<?php echo smartyTranslate(array('s'=>'Enable/Disable Tooltip','mod'=>'supercheckout'),$_smarty_tpl);?>
"></i>
                                                                        </td>
                                                                        <td class="settings">
                                                                            <input type="hidden" value="0" name="velocity_supercheckout[enable]" />
                                                                            <?php if ($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['enable']==1) {?>
                                                                                <?php if ($_smarty_tpl->tpl_vars['IE7']->value==true) {?>
                                                                                    <div>
                                                                                        <input class="checkbox" type="checkbox" value="1" name="velocity_supercheckout[enable]" id="supercheckout_enable" checked="checked" />
                                                                                    </div>
                                                                                <?php } else { ?>
                                                                                    <div class="make-switch" data-on="primary" data-off="default">
                                                                                        <input class="make-switch" type="checkbox" value="1" name="velocity_supercheckout[enable]" id="supercheckout_enable" checked="checked" />
                                                                                    </div>
                                                                                <?php }?>                                                                    
                                                                            <?php } else { ?>
                                                                                <?php if ($_smarty_tpl->tpl_vars['IE7']->value==true) {?>
                                                                                    <div>
                                                                                        <input class="checkbox" type="checkbox" value="1" name="velocity_supercheckout[enable]" id="supercheckout_enable" />
                                                                                    </div>
                                                                                <?php } else { ?>
                                                                                    <div class="make-switch" data-on="primary" data-off="default">
                                                                                        <input class="make-switch" type="checkbox" value="1" name="velocity_supercheckout[enable]" id="supercheckout_enable"/>
                                                                                    </div>
                                                                                <?php }?>
                                                                            <?php }?>
                                                                        </td>
                                                                    </tr>

                                                                    <tr class="free-disabled">
                                                                        <td class="name vertical_top_align"><span class="control-label"><?php echo smartyTranslate(array('s'=>'Enable Guest Checkout','mod'=>'supercheckout'),$_smarty_tpl);?>
: </span>                                                                
                                                                            <i class="icon-question-sign supercheckout-tooltip-color" data-toggle="tooltip"  data-placement="top" data-original-title="<?php echo smartyTranslate(array('s'=>'Enable Guest Checkout Tooltip','mod'=>'supercheckout'),$_smarty_tpl);?>
"></i>
                                                                        </td>
                                                                        <td class="settings">
                                                                            <input type="hidden" value="0" name="velocity_supercheckout[enable_guest_checkout]" disabled/>
                                                                            <?php if ($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['enable_guest_checkout']==1) {?>
                                                                                <?php if ($_smarty_tpl->tpl_vars['IE7']->value==true) {?>
                                                                                    <div>
                                                                                        <input class="checkbox" type="checkbox" value="1"  id="supercheckout_enable_newsletter" checked="checked" disabled/>
                                                                                    </div>
                                                                                <?php } else { ?>
                                                                                    <div class="make-switch" data-on="primary" data-off="default">
                                                                                        <input class="make-switch" type="checkbox" value="1"  id="supercheckout_enable_newsletter" checked="checked" disabled/>
                                                                                    </div>
                                                                                <?php }?>                                                                    
                                                                            <?php } else { ?>
                                                                                <?php if ($_smarty_tpl->tpl_vars['IE7']->value==true) {?>
                                                                                    <div>
                                                                                        <input class="checkbox" type="checkbox" value="1"  id="supercheckout_enable_newsletter" disabled/>
                                                                                    </div>
                                                                                <?php } else { ?>
                                                                                    <div class="make-switch" data-on="primary" data-off="default">
                                                                                        <input class="make-switch" type="checkbox" value="1"  id="supercheckout_enable_newsletter" disabled/>
                                                                                    </div>
                                                                                <?php }?>
                                                                            <?php }?>
                                                                            
                                                                            
                                                                        </td>
                                                                    </tr>                                                                    

                                                                    <tr class="free-disabled">
                                                                        <td class="name vertical_top_align"><span class="control-label"><?php echo smartyTranslate(array('s'=>'Register Guest','mod'=>'supercheckout'),$_smarty_tpl);?>
: </span>                                                                
                                                                            <i class="icon-question-sign supercheckout-tooltip-color" data-toggle="tooltip"  data-placement="top" data-original-title="<?php echo smartyTranslate(array('s'=>'Register Guest Tooltip','mod'=>'supercheckout'),$_smarty_tpl);?>
"></i>
                                                                        </td>
                                                                        <td class="settings">
                                                                            <input type="hidden" value="0"  disabled/>
                                                                            <?php if ($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['enable_guest_register']==1) {?>
                                                                                <?php if ($_smarty_tpl->tpl_vars['IE7']->value==true) {?>
                                                                                    <div>
                                                                                        <input class="checkbox" type="checkbox" value="1"  id="supercheckout_enable_guest_register" checked="checked" disabled/>
                                                                                    </div>
                                                                                <?php } else { ?>
                                                                                    <div class="make-switch" data-on="primary" data-off="default">
                                                                                        <input class="make-switch" type="checkbox" value="1"  id="supercheckout_enable_guest_register" checked="checked" disabled/>
                                                                                    </div>
                                                                                <?php }?>                                                                    
                                                                            <?php } else { ?>
                                                                                <?php if ($_smarty_tpl->tpl_vars['IE7']->value==true) {?>
                                                                                    <div>
                                                                                        <input class="checkbox" type="checkbox" value="1"  id="supercheckout_enable_guest_register" disabled/>
                                                                                    </div>
                                                                                <?php } else { ?>
                                                                                    <div class="make-switch" data-on="primary" data-off="default">
                                                                                        <input class="make-switch" type="checkbox" value="1"  id="supercheckout_enable_guest_register" disabled/>
                                                                                    </div>
                                                                                <?php }?>
                                                                            <?php }?>
                                                                        </td>
                                                                    </tr>
								<tr class="free-disabled">
                                    <td class="name vertical_top_align"><span class="control-label"><?php echo smartyTranslate(array('s'=>'Delivery address for virtual cart','mod'=>'supercheckout'),$_smarty_tpl);?>
: </span>
                                                                            <i class="icon-question-sign supercheckout-tooltip-color" data-toggle="tooltip"  data-placement="top" data-original-title="<?php echo smartyTranslate(array('s'=>'If set to OFF, it will hide delivery adress automatically and show invoice address for cart with virual products only','mod'=>'supercheckout'),$_smarty_tpl);?>
"></i>
                                                                        </td>
									<td class="settings">
                                                                            <input type="hidden" value="0"  disabled/>
                                                                            <?php if ($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['hide_delivery_for_virtual']==1) {?>
                                                                                <?php if ($_smarty_tpl->tpl_vars['IE7']->value==true) {?>
                                                                                    <div>
											    <input class="checkbox" type="checkbox" value="1"  id="supercheckout_hide_delivery_for_virtual" checked="checked" disabled/>
                                                                                    </div>
                                                                                <?php } else { ?>
                                                                                    <div class="make-switch" data-on="primary" data-off="default">
                                                                                        <input class="make-switch" type="checkbox" value="1"  id="supercheckout_hide_delivery_for_virtual" checked="checked" disabled/>
                                                                                    </div>
                                                                                <?php }?>                                                                    
                                                                            <?php } else { ?>
                                                                                <?php if ($_smarty_tpl->tpl_vars['IE7']->value==true) {?>
                                                                                    <div>
                                                                                        <input class="checkbox" type="checkbox" value="1"  id="supercheckout_hide_delivery_for_virtual" disabled/>
                                                                                    </div>
                                                                                <?php } else { ?>
                                                                                    <div class="make-switch" data-on="primary" data-off="default">
                                                                                        <input class="make-switch" type="checkbox" value="1"  id="supercheckout_hide_delivery_for_virtual" disabled/>
                                                                                    </div>
                                                                                <?php }?>
                                                                            <?php }?>
                                                                        </td><tr>
                                                                    <tr class="free-disabled">
                                                                        <td class="name vertical_top_align">
                                                                            <span><?php echo smartyTranslate(array('s'=>'Default Option at Checkout','mod'=>'supercheckout'),$_smarty_tpl);?>
: </span><i class="icon-question-sign supercheckout-tooltip-color" data-toggle="tooltip"  data-placement="top" data-original-title="<?php echo smartyTranslate(array('s'=>'Default Option at Checkout Tooltip','mod'=>'supercheckout'),$_smarty_tpl);?>
"></i>
                                                                        </td>
                                                                        <td class="left settings">
                                                                            <div class="widget-body uniformjs" style="padding: 0 !important;">
                                                                                <label class="radio coupon_type_radio">
                                                                                    <input type="radio" class="radio coupon_type_radio"  value="0"  <?php if ($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['checkout_option']==0) {?> checked="checked" <?php }?> disabled/><?php echo smartyTranslate(array('s'=>'Login','mod'=>'supercheckout'),$_smarty_tpl);?>
                                                                        
                                                                                </label>
                                                                                <label class="radio coupon_type_radio">
                                                                                    <input type="radio" class="radio coupon_type_radio"  value="1" <?php if ($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['checkout_option']==1) {?> checked="checked" <?php }?> disabled/><?php echo smartyTranslate(array('s'=>'Guest','mod'=>'supercheckout'),$_smarty_tpl);?>
                                                                        
                                                                                </label>
                                                                                <label class="radio coupon_type_radio">
                                                                                    <input type="radio" class="radio coupon_type_radio"  value="2" <?php if ($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['checkout_option']==2) {?> checked="checked" <?php }?> disabled/><?php echo smartyTranslate(array('s'=>'Register','mod'=>'supercheckout'),$_smarty_tpl);?>
                                                                        
                                                                                </label>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    
                                                                    <tr>
                                                                        <td class="name vertical_top_align"><span class="control-label"><?php echo smartyTranslate(array('s'=>'Testing Mode','mod'=>'supercheckout'),$_smarty_tpl);?>
: </span>                                                                
                                                                            <i class="icon-question-sign supercheckout-tooltip-color" data-toggle="tooltip"  data-placement="top" data-original-title="<?php echo smartyTranslate(array('s'=>'Enable this if you want to test this plugin before making it live.','mod'=>'supercheckout'),$_smarty_tpl);?>
"></i>                                                                            
                                                                        </td>
                                                                        <td class="settings">
                                                                            <input type="hidden" value="0" name="velocity_supercheckout[super_test_mode]" />
                                                                            <?php if (isset($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['super_test_mode'])&&$_smarty_tpl->tpl_vars['velocity_supercheckout']->value['super_test_mode']==1) {?>
                                                                                <?php if ($_smarty_tpl->tpl_vars['IE7']->value==true) {?>
                                                                                    <div>
                                                                                        <input class="checkbox" type="checkbox" value="1" name="velocity_supercheckout[super_test_mode]" id="supercheckout_test_mode" checked="checked" />
                                                                                    </div>
                                                                                <?php } else { ?>
                                                                                    <div class="make-switch" data-on="primary" data-off="default">
                                                                                        <input class="make-switch" type="checkbox" value="1" name="velocity_supercheckout[super_test_mode]" id="supercheckout_test_mode" checked="checked" />
                                                                                    </div>
                                                                                <?php }?>                                                                    
                                                                            <?php } else { ?>
                                                                                <?php if ($_smarty_tpl->tpl_vars['IE7']->value==true) {?>
                                                                                    <div>
                                                                                        <input class="checkbox" type="checkbox" value="1" name="velocity_supercheckout[super_test_mode]" id="supercheckout_test_mode" />
                                                                                    </div>
                                                                                <?php } else { ?>
                                                                                    <div class="make-switch" data-on="primary" data-off="default">
                                                                                        <input class="make-switch" type="checkbox" value="1" name="velocity_supercheckout[super_test_mode]" id="supercheckout_test_mode"/>
                                                                                    </div>
                                                                                <?php }?>
                                                                            <?php }?>                                                                            
                                                                        </td>
                                                                    </tr>
                                                                    <tr id="front_module_url" style="display: none;">
                                                                        <td colspan="2">
                                                                            <div class="span" style="padding:20px;">
                                                                                <p style="margin-bottom: 0;">
                                                                                    <b><?php echo smartyTranslate(array('s'=>'Testing URL','mod'=>'supercheckout'),$_smarty_tpl);?>
:</b>
                                                                                    <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['module_url']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

                                                                                </p> 
                                                                            </div>
                                                                        </td>
                                                                    </tr>

                                                                    
                                                                   
                                                                </table>
									 <div style= "  text-align:center;padding: 25px; height:140px;margin: 40px;margin-bottom:0px; background: aliceblue;<?php if ($_smarty_tpl->tpl_vars['ps_version']->value==15) {?>height: 90px;<?php }?>">
                                                        <div><span style="font-size:18px;" >Buy paid version to access all features.</span>
                                                        <br>
                                                        <br>
                                                         <a target="_blank" href="http://www.knowband.com/prestashop-one-page-supercheckout"><span style="margin-left:40%;max-width:15% !important;font-size:18px;" class='btn btn-block btn-success action-btn'>Buy Now</span></a><div>
                                                            </div>
                                                              
                                                   </div>
                                                  </div>
                                                            </div>
                                                            
                                                    </div>

                                                    <!--------------- End - General Settings -------------------->
                                                     <!--------------- Start - Customize -------------------->
                                                    <div id="tab_customizer" class="tab-pane tab-form">
                                                        <div class="block">
                                                            <h4 class='velsof-tab-heading' style="font-size: 20px;" ><?php echo smartyTranslate(array('s'=>'Customizer','mod'=>'supercheckout'),$_smarty_tpl);?>
</h4>
                                                            <table class="form free-disabled">
                                                              
                                                                <tr>
                                                                        <td class="name vertical_top_align" style="padding: 15px;">
                                                                            <span><?php echo smartyTranslate(array('s'=>'Button Background Color','mod'=>'supercheckout'),$_smarty_tpl);?>
: </span><i class="icon-question-sign supercheckout-tooltip-color" data-toggle="tooltip"  data-placement="top" data-original-title="<?php echo smartyTranslate(array('s'=>'Change the Button Background Color','mod'=>'supercheckout'),$_smarty_tpl);?>
"></i>
                                                                        </td>
                                                                        <td class="settings" style="padding: 15px;">
                                                                            <div class="widget-body uniformjs" style="padding: 0 !important;">

                                                                                   <input type="text" class="color form-control colorizer-input" onchange="bg_changer(this.color);"   value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['customizer']['button_color'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" disabled/>

                                                                               </div>
                                                                        </td>
                                                                               <td>&nbsp;</td>

                                                                    </tr>
                                                                    <tr>
                                                                        <td class="name vertical_top_align" style="padding: 15px;">
                                                                            <span><?php echo smartyTranslate(array('s'=>'Button Border Color','mod'=>'supercheckout'),$_smarty_tpl);?>
: </span><i class="icon-question-sign supercheckout-tooltip-color" data-toggle="tooltip"  data-placement="top" data-original-title="<?php echo smartyTranslate(array('s'=>'Change the Button Border Color','mod'=>'supercheckout'),$_smarty_tpl);?>
"></i>
                                                                        </td>
                                                                        <td class="settings" style="padding: 15px;">
                                                                            <div class="widget-body uniformjs" style="padding: 0 !important;">

                                                                                   <input type="text" class="color form-control colorizer-input"  onchange="border_changer(this.color);"  value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['customizer']['button_border_color'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" disabled/>


                                                                                  
                                                                                   <div id="button_preview" style="background-color:#<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['customizer']['button_color'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
;border: 1px solid #<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['customizer']['button_border_color'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
 !important;color: #<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['customizer']['button_text_color'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
 !important;border-bottom:3px solid #<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['customizer']['border_bottom_color'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
 !important;width: 160px;
                                                                                        
                                                                                        display: inline-block;
                                                                                        text-align: center;
                                                                                        float: left;
                                                                                        margin-left: 65%;
                                                                                        padding: 10px;
                                                                                        font-size: 16px;
                                                                                        border-radius: 5px;
                                                                                        margin-top: -38px;
                                                                                        ">
                                                                                     <span> <?php echo smartyTranslate(array('s'=>'Button Preview','mod'=>'supercheckout'),$_smarty_tpl);?>
</span>
                                                                                   </div>
                                                                                   </div>
                                                                        </td>

                                                                          

                                                                    </tr>
                                                                       <tr>
                                                                        <td class="name vertical_top_align" style="padding: 15px;">
                                                                            <span><?php echo smartyTranslate(array('s'=>'Button Text Color','mod'=>'supercheckout'),$_smarty_tpl);?>
: </span><i class="icon-question-sign supercheckout-tooltip-color" data-toggle="tooltip"  data-placement="top" data-original-title="<?php echo smartyTranslate(array('s'=>'Change the Button Text Color','mod'=>'supercheckout'),$_smarty_tpl);?>
"></i>
                                                                        </td>
                                                                        <td class="settings" style="padding: 15px;">
                                                                            <div class="widget-body uniformjs" style="padding: 0 !important;">

                                                                                   <input type="text" class="color form-control colorizer-input"  onchange="text_changer(this.color);" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['customizer']['button_text_color'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" disabled/>


                                                                            </div>
                                                                        </td>
                                                                      
                                                                    </tr>

                                                                    <tr>
                                                                        <td class="name vertical_top_align" style="padding: 15px;">
                                                                            <span><?php echo smartyTranslate(array('s'=>'Button Border Bottom Color','mod'=>'supercheckout'),$_smarty_tpl);?>
: </span><i class="icon-question-sign supercheckout-tooltip-color" data-toggle="tooltip"  data-placement="top" data-original-title="<?php echo smartyTranslate(array('s'=>'Change the Button Border Bottom Color','mod'=>'supercheckout'),$_smarty_tpl);?>
"></i>
                                                                        </td>
                                                                        <td class="settings" style="padding: 15px;">
                                                                            <div class="widget-body uniformjs" style="padding: 0 !important;">

                                                                                   <input type="text" class="color form-control colorizer-input" onchange="border_bottom_changer(this.color);"  value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['customizer']['border_bottom_color'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" disabled/>


                                                                            </div>
                                                                        </td>
                                                                      
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="name vertical_top_align" style="padding: 15px;">
                                                                            <span><?php echo smartyTranslate(array('s'=>'Custom CSS','mod'=>'supercheckout'),$_smarty_tpl);?>
: </span><i class="icon-question-sign supercheckout-tooltip-color" data-toggle="tooltip"  data-placement="top" data-original-title="<?php echo smartyTranslate(array('s'=>'Provide some CSS code for changes in the front end of SuperCheckout','mod'=>'supercheckout'),$_smarty_tpl);?>
"></i>
                                                                        </td>
                                                                        <td class="settings" style="padding: 15px;">
                                                                            <textarea rows="5" style="resize: both;" class="vss_sc_ver15" disabled><?php if (isset($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['custom_css'])) {?><?php echo $_smarty_tpl->tpl_vars['velocity_supercheckout']->value['custom_css'];?>
<?php }?></textarea>
                                                                        </td>                                                                        
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="name vertical_top_align" style="padding: 15px;">
                                                                            <span><?php echo smartyTranslate(array('s'=>'Custom JS','mod'=>'supercheckout'),$_smarty_tpl);?>
: </span><i class="icon-question-sign supercheckout-tooltip-color" data-toggle="tooltip"  data-placement="top" data-original-title="<?php echo smartyTranslate(array('s'=>'Provide some javascript code for changes in the front end of SuperCheckout','mod'=>'supercheckout'),$_smarty_tpl);?>
"></i>
                                                                        </td>
                                                                        <td class="settings" style="padding: 15px;">
                                                                            <textarea rows="5" style="resize: both;" class="vss_sc_ver15" disabled><?php if (isset($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['custom_js'])) {?><?php echo $_smarty_tpl->tpl_vars['velocity_supercheckout']->value['custom_js'];?>
<?php }?></textarea>
                                                                        </td>                                                                        
                                                                    </tr>


                                                            </table>
                                                                              
                                                        </div>
                                                    </div>
                                                    <!--------------- End - Customize -------------------->

                                                    <!--------------- Start - Login -------------------->

                                                    <div id="tab_login" class="tab-pane tab-form">
                                                        <div class="block">
                                                            <h4 class='velsof-tab-heading'><?php echo smartyTranslate(array('s'=>'Login','mod'=>'supercheckout'),$_smarty_tpl);?>
<span class="mandatory_notify"><?php echo smartyTranslate(array('s'=>'(*) are mandatory fields','mod'=>'supercheckout'),$_smarty_tpl);?>
</span></h4>
                                                            <div class="block">
                                                                <table class="form">
                                                                    <tr class="free-disabled">
                                                                        <td class="name vertical_top_align" ><span class="control-label"><?php echo smartyTranslate(array('s'=>'Show popup','mod'=>'supercheckout'),$_smarty_tpl);?>
: </span>                                                                
                                                                            <i class="icon-question-sign supercheckout-tooltip-color" data-toggle="tooltip"  data-placement="top" data-original-title="<?php echo smartyTranslate(array('s'=>'Show popup rather than redirect when customer clicks on Facebook or Google button','mod'=>'supercheckout'),$_smarty_tpl);?>
"></i>
                                                                        </td>
                                                                        <td class="settings" style="padding-bottom:10px;">
                                                                            <input type="hidden" value="0" disabled/>
                                                                            <?php if ($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['social_login_popup']['enable']==1) {?>
                                                                                <?php if ($_smarty_tpl->tpl_vars['IE7']->value==true) {?>
                                                                                    <div>
                                                                                        <input class="checkbox" type="checkbox" value="1"  id="supercheckout_social_login_popup" checked="checked" disabled/>
                                                                                    </div>
                                                                                <?php } else { ?>
                                                                                    <div class="make-switch" data-on="primary" data-off="default">
                                                                                        <input class="make-switch" type="checkbox" value="1"  id="supercheckout_social_login_popup" checked="checked" disabled/>
                                                                                    </div>
                                                                                <?php }?>                                                                    
                                                                            <?php } else { ?>
                                                                                <?php if ($_smarty_tpl->tpl_vars['IE7']->value==true) {?>
                                                                                    <div>
                                                                                        <input class="checkbox" type="checkbox" value="1"  id="supercheckout_social_login_popup" disabled/>
                                                                                    </div>
                                                                                <?php } else { ?>
                                                                                    <div class="make-switch" data-on="primary" data-off="default">
                                                                                        <input class="make-switch" type="checkbox" value="1"  id="supercheckout_social_login_popup" disabled/>
                                                                                    </div>
                                                                                <?php }?>
                                                                            <?php }?>
                                                                        </td>
									</tr>
                                                                        
                                    <tr class="free-disabled">
                                                                            <td class="name vertical_top_align"><span class="control-label"><?php echo smartyTranslate(array('s'=>'Enable Facebook Login','mod'=>'supercheckout'),$_smarty_tpl);?>
: </span>  
                                                                            <i class="icon-question-sign supercheckout-tooltip-color" data-toggle="tooltip"  data-placement="top" data-original-title="<?php echo smartyTranslate(array('s'=>'Enable Facebook Login Tooltip','mod'=>'supercheckout'),$_smarty_tpl);?>
"></i>
                                                                        </td>
                                                                        <td class="settings">
                                                                            <input type="hidden" value="0" disabled/>
                                                                            <?php if ($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['fb_login']['enable']==1) {?>
                                                                                <?php if ($_smarty_tpl->tpl_vars['IE7']->value==true) {?>
                                                                                    <div>
                                                                                        <input class="checkbox" type="checkbox" value="1"  id="supercheckout_fb_login" checked="checked" disabled/>
                                                                                    </div>
                                                                                <?php } else { ?>
                                                                                    <div class="make-switch" data-on="primary" data-off="default">
                                                                                        <input class="make-switch" type="checkbox" value="1"  id="supercheckout_fb_login" checked="checked" disabled/>
                                                                                    </div>
                                                                                <?php }?>                                                                    
                                                                            <?php } else { ?>
                                                                                <?php if ($_smarty_tpl->tpl_vars['IE7']->value==true) {?>
                                                                                    <div>
                                                                                        <input class="checkbox" type="checkbox" value="1"  id="supercheckout_fb_login" disabled/>
                                                                                    </div>
                                                                                <?php } else { ?>
                                                                                    <div class="make-switch" data-on="primary" data-off="default">
                                                                                        <input class="make-switch" type="checkbox" value="1"  id="supercheckout_fb_login" disabled/>
                                                                                    </div>
                                                                                <?php }?>
                                                                            <?php }?>
                                                                            <span class="pad-right" style="font-size:14px;font-weight:500;float:right; "><a href="javascript:void(0)" onclick="configurationAccordian('facebook');" <?php if ($_smarty_tpl->tpl_vars['ps_version']->value==15) {?>style="color: #428bca;"<?php }?>><?php echo smartyTranslate(array('s'=>'Click here to see Steps to configure Facebook app ','mod'=>'supercheckout'),$_smarty_tpl);?>
</a></span>
                                                                        </td>
                                                                    </tr>

                                                                    <tr class="free-disabled">
                                                                        <td class="name vertical_top_align"><span class="control-label"><span class="asterisk">*</span><?php echo smartyTranslate(array('s'=>'Facebook App Id','mod'=>'supercheckout'),$_smarty_tpl);?>
: </span>                                                                
                                                                            <i class="icon-question-sign supercheckout-tooltip-color" data-toggle="tooltip"  data-placement="top" data-original-title="<?php echo smartyTranslate(array('s'=>'Facebook App Id Tooltip','mod'=>'supercheckout'),$_smarty_tpl);?>
"></i>
                                                                        </td>
                                                                        <td class="settings">
                                                                            <input type="text" class="text-width"  value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['fb_login']['app_id'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" disabled/>
                                                                            <span id="fb_app_id_error" class="supercheckout_error" ></span>
                                                                        </td>
                                                                    </tr>

                                                                    <tr class="free-disabled">
                                                                        <td class="name vertical_top_align" ><span class="control-label"><span class="asterisk">*</span><?php echo smartyTranslate(array('s'=>'Facebook App Secret','mod'=>'supercheckout'),$_smarty_tpl);?>
: </span>                                                                
                                                                            <i class="icon-question-sign supercheckout-tooltip-color" data-toggle="tooltip"  data-placement="top" data-original-title="<?php echo smartyTranslate(array('s'=>'Facebook App Secret Tooltip','mod'=>'supercheckout'),$_smarty_tpl);?>
"></i>
                                                                        </td>
                                                                        <td class="settings" >
                                                                            <input type="text" class="text-width"  value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['fb_login']['app_secret'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" disabled/>
                                                                            <span id="fb_app_secret_error" class="supercheckout_error" ></span>
                                                                        </td>
                                                                    
                                                                    <tr class="free-disabled">
                                                                        <td class="name vertical_top_align"><span class="control-label"><?php echo smartyTranslate(array('s'=>'Enable Google Login','mod'=>'supercheckout'),$_smarty_tpl);?>
: </span>                                                                
                                                                            <i class="icon-question-sign supercheckout-tooltip-color" data-toggle="tooltip"  data-placement="top" data-original-title="<?php echo smartyTranslate(array('s'=>'Enable Google Login Tooltip','mod'=>'supercheckout'),$_smarty_tpl);?>
"></i>
                                                                        </td>
                                                                        <td class="settings">
                                                                            <input type="hidden" value="0"  disabled/>
                                                                            <?php if ($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['google_login']['enable']==1) {?>
                                                                                <?php if ($_smarty_tpl->tpl_vars['IE7']->value==true) {?>
                                                                                    <div>
                                                                                        <input class="checkbox" type="checkbox" value="1"  id="supercheckout_google_login" checked="checked" disabled/>
                                                                                    </div>
                                                                                <?php } else { ?>
                                                                                    <div class="make-switch" data-on="primary" data-off="default">
                                                                                        <input class="make-switch" type="checkbox" value="1"  id="supercheckout_google_login" checked="checked" disabled/>
                                                                                    </div>
                                                                                <?php }?>                                                                    
                                                                            <?php } else { ?>
                                                                                <?php if ($_smarty_tpl->tpl_vars['IE7']->value==true) {?>
                                                                                    <div>
                                                                                        <input class="checkbox" type="checkbox" value="1"  id="supercheckout_google_login" disabled/>
                                                                                    </div>
                                                                                <?php } else { ?>
                                                                                    <div class="make-switch" data-on="primary" data-off="default">
                                                                                        <input class="make-switch" type="checkbox" value="1"  id="supercheckout_google_login" disabled/>
                                                                                    </div>
                                                                                <?php }?>
                                                                            <?php }?>
                                                                            <span class="pad-right" style="font-size:14px;font-weight:500;float:right;"><a href="javascript:void(0)" onclick="configurationAccordian('google');" <?php if ($_smarty_tpl->tpl_vars['ps_version']->value==15) {?>style="color: #428bca;"<?php }?>><?php echo smartyTranslate(array('s'=>'Click here to see Steps to configure Google App ','mod'=>'supercheckout'),$_smarty_tpl);?>
</a></span>
                                                                        </td>
                                                                    </tr>

                                                                   

                                                                    <tr class="free-disabled">
                                                                        <td class="name vertical_top_align"><span class="control-label"><span class="asterisk">*</span><?php echo smartyTranslate(array('s'=>'Google Client Id','mod'=>'supercheckout'),$_smarty_tpl);?>
: </span>                                                                
                                                                            <i class="icon-question-sign supercheckout-tooltip-color" data-toggle="tooltip"  data-placement="top" data-original-title="<?php echo smartyTranslate(array('s'=>'Google Client Id Tooltip','mod'=>'supercheckout'),$_smarty_tpl);?>
"></i>
                                                                        </td>
                                                                        <td class="settings">
                                                                            <input type="text" class="text-width"  value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['google_login']['client_id'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" disabled/>
                                                                            <span id="gl_client_id_error" class="supercheckout_error" ></span>
                                                                        </td>
                                                                    </tr>

                                                                    <tr class="free-disabled">
                                                                        <td class="name vertical_top_align"><span class="control-label"><span class="asterisk">*</span><?php echo smartyTranslate(array('s'=>'Google App Secret','mod'=>'supercheckout'),$_smarty_tpl);?>
: </span>                                                                
                                                                            <i class="icon-question-sign supercheckout-tooltip-color" data-toggle="tooltip"  data-placement="top" data-original-title="<?php echo smartyTranslate(array('s'=>'Google App Secret Tooltip','mod'=>'supercheckout'),$_smarty_tpl);?>
"></i>
                                                                        </td>
                                                                        <td class="settings">
                                                                            <input type="text" class="text-width"  value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['google_login']['app_secret'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" disabled/>
                                                                            <span id="gl_app_secret_error" class="supercheckout_error" ></span>
                                                                        </td>
                                                                    </tr>

                                                                </table>
									    
									    <div style= "  text-align:center;padding: 25px; height:140px;margin: 40px;margin-bottom:0px; background: aliceblue;<?php if ($_smarty_tpl->tpl_vars['ps_version']->value==15) {?>height: 100px;<?php }?>" id="loginizer_link">
                                                        <div><span style="font-size:18px;" >Want to add more social login options for your customers?</span>
                                                        <br>
                                                        <br>
                                                         <a target="_blank" href="http://addons.prestashop.com/en/social-commerce-facebook-prestashop-modules/18220-social-network-for-login-9-in-1-fast-secure.html"><span style="margin-left:30%;max-width:40% !important;font-size:18px;" class='btn btn-block btn-success action-btn'>Add more buttons</span></a><div>
                                                            </div>
                                                         </div>
                                                  </div>
                                                         <div id="facebook_acc" style="display:none;">
                                                             <h4 class='velsof-tab-heading'><?php echo smartyTranslate(array('s'=>'Steps To Configure Facebook App:','mod'=>'supercheckout'),$_smarty_tpl);?>
</h4>
									<div id="facebook_accordian" class="accordian_container">
										<h3><?php echo smartyTranslate(array('s'=>'Step 1','mod'=>'supercheckout'),$_smarty_tpl);?>
 </h3>
										<div class="accdiv">
											<span class="pad-right"><a href="https://developers.facebook.com/apps/" target="_blank" style="color: #00aff0;"><?php echo smartyTranslate(array('s'=>'Click here to get Facebook app id and app secret','mod'=>'supercheckout'),$_smarty_tpl);?>
</a></span>
										</div>
										<h3><?php echo smartyTranslate(array('s'=>'Step 2','mod'=>'supercheckout'),$_smarty_tpl);?>
</h3>
										<div class="accdiv">
											 <img src='<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['module_dir']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
views/img/admin/manual_steps/facebook/facebook2.jpg' />
										</div>
										<h3><?php echo smartyTranslate(array('s'=>'Step 3','mod'=>'supercheckout'),$_smarty_tpl);?>
</h3>
										<div class="accdiv">
											 <img src='<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['module_dir']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
views/img/admin/manual_steps/facebook/facebook3.jpg' />
										</div>
										<h3><?php echo smartyTranslate(array('s'=>'Step 4, 5','mod'=>'supercheckout'),$_smarty_tpl);?>
</h3>
										<div class="accdiv">
											 <img src='<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['module_dir']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
views/img/admin/manual_steps/facebook/facebook4.jpg' />
										</div>
										<h3><?php echo smartyTranslate(array('s'=>'Step 6, 7','mod'=>'supercheckout'),$_smarty_tpl);?>
</h3>
										<div class="accdiv">
											 <img src='<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['module_dir']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
views/img/admin/manual_steps/facebook/facebook5.jpg' />
										</div>
										<h3><?php echo smartyTranslate(array('s'=>'Step 8','mod'=>'supercheckout'),$_smarty_tpl);?>
</h3>
										<div class="accdiv">
											 <img src='<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['module_dir']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
views/img/admin/manual_steps/facebook/facebook6.jpg' />
										</div>
										<h3><?php echo smartyTranslate(array('s'=>'Step 9','mod'=>'supercheckout'),$_smarty_tpl);?>
</h3>
										<div class="accdiv">
											 <img src='<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['module_dir']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
views/img/admin/manual_steps/facebook/facebook7.jpg' />
										</div>
										<h3><?php echo smartyTranslate(array('s'=>'Step 10 , 11, 12','mod'=>'supercheckout'),$_smarty_tpl);?>
</h3>
										<div class="accdiv">
											<pre><b><?php echo smartyTranslate(array('s'=>'For Step #9 use App Domain: ','mod'=>'supercheckout'),$_smarty_tpl);?>
</b><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['domain']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<br><b><?php echo smartyTranslate(array('s'=>'For Step #11 use Site Url: ','mod'=>'supercheckout'),$_smarty_tpl);?>
</b><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['manual_dir']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</pre>
											 <img src='<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['module_dir']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
views/img/admin/manual_steps/facebook/facebook8.jpg' />
										</div>
										<h3><?php echo smartyTranslate(array('s'=>'Step 13','mod'=>'supercheckout'),$_smarty_tpl);?>
</h3>
										<div class="accdiv">
											 <img src='<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['module_dir']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
views/img/admin/manual_steps/facebook/facebook9.jpg' />
										</div>
										<h3><?php echo smartyTranslate(array('s'=>'Step 14, 15','mod'=>'supercheckout'),$_smarty_tpl);?>
</h3>
										<div class="accdiv">
											 <img src='<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['module_dir']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
views/img/admin/manual_steps/facebook/facebook10.jpg' />
										</div>
										<h3><?php echo smartyTranslate(array('s'=>'Step 16','mod'=>'supercheckout'),$_smarty_tpl);?>
</h3>
										<div class="accdiv">
											 <img src='<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['module_dir']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
views/img/admin/manual_steps/facebook/facebook11.jpg' />
										</div>
										
									</div>
                                                         </div>
                                                                                <div id="google_acc" style="display:none;">
                                                                                    <h4 class='velsof-tab-heading'><?php echo smartyTranslate(array('s'=>'Steps To Configure Google App:','mod'=>'supercheckout'),$_smarty_tpl);?>
</h4>
                                                                            <div id="google_accordian" class="accordian_container">
                                                                                    <h3><?php echo smartyTranslate(array('s'=>'Step 1','mod'=>'supercheckout'),$_smarty_tpl);?>
</h3>
                                                                                    <div class="accdiv">
                                                                                             <span class="pad-right"><a href="https://console.developers.google.com/project" target="_blank" style="color: #00aff0;"><?php echo smartyTranslate(array('s'=>'Click here to get Google  client id and client secret','mod'=>'supercheckout'),$_smarty_tpl);?>
</a></span>
                                                                                    </div>
                                                                                    <h3><?php echo smartyTranslate(array('s'=>'Step 2','mod'=>'supercheckout'),$_smarty_tpl);?>
</h3>
                                                                                    <div class="accdiv">
                                                                                             <img src='<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['module_dir']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
views/img/admin/manual_steps/google/google2.jpg' />
                                                                                    </div>
                                                                                    <h3><?php echo smartyTranslate(array('s'=>'Step 3, 4','mod'=>'supercheckout'),$_smarty_tpl);?>
</h3>
                                                                                    <div class="accdiv">
                                                                                             <img src='<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['module_dir']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
views/img/admin/manual_steps/google/google3.jpg' />
                                                                                    </div>
                                                                                    <h3><?php echo smartyTranslate(array('s'=>'Step 5, 6, 7','mod'=>'supercheckout'),$_smarty_tpl);?>
</h3>
                                                                                    <div class="accdiv">
                                                                                             <img src='<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['module_dir']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
views/img/admin/manual_steps/google/google4.jpg' />
                                                                                    </div>
                                                                                    <h3><?php echo smartyTranslate(array('s'=>'Step 8','mod'=>'supercheckout'),$_smarty_tpl);?>
</h3>
                                                                                    <div class="accdiv">
                                                                                             <img src='<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['module_dir']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
views/img/admin/manual_steps/google/google5.jpg' />
                                                                                    </div>
                                                                                    <h3><?php echo smartyTranslate(array('s'=>'Step 9','mod'=>'supercheckout'),$_smarty_tpl);?>
</h3>
                                                                                    <div class="accdiv">
                                                                                             <img src='<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['module_dir']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
views/img/admin/manual_steps/google/google6.jpg' />
                                                                                    </div>
                                                                                    <h3><?php echo smartyTranslate(array('s'=>'Step 10, 11, 12','mod'=>'supercheckout'),$_smarty_tpl);?>
</h3>
                                                                                    <div class="accdiv">
                                                                                             <img src='<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['module_dir']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
views/img/admin/manual_steps/google/google7.jpg' />
                                                                                    </div>
                                                                                    <h3><?php echo smartyTranslate(array('s'=>'Step 13, 14, 15, 16, 17','mod'=>'supercheckout'),$_smarty_tpl);?>
</h3>
                                                                                    <div class="accdiv">
                                                                                            <pre><b><?php echo smartyTranslate(array('s'=>'For Step #15 Use Authorized javascript origins: ','mod'=>'supercheckout'),$_smarty_tpl);?>
</b><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['manual_dir']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</b></br><b><?php echo smartyTranslate(array('s'=>'For Step #16 Use Authorized Redirect Url: ','mod'=>'supercheckout'),$_smarty_tpl);?>
</b><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['manual_dir']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php echo smartyTranslate(array('s'=>'index.php?fc=module&module=supercheckout&controller=supercheckout&login_type=google','mod'=>'supercheckout'),$_smarty_tpl);?>
</pre>
                                                                                             <img src='<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['module_dir']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
views/img/admin/manual_steps/google/google8.jpg' />
                                                                                    </div>
                                                                                    <h3><?php echo smartyTranslate(array('s'=>'Step 18, 19','mod'=>'supercheckout'),$_smarty_tpl);?>
</h3>
                                                                                    <div class="accdiv">
                                                                                             <img src='<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['module_dir']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
views/img/admin/manual_steps/google/google9.jpg' />
                                                                                    </div>
                                                                                    <h3><?php echo smartyTranslate(array('s'=>'Step 20','mod'=>'supercheckout'),$_smarty_tpl);?>
</h3>
                                                                                    <div class="accdiv">
                                                                                             <img src='<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['module_dir']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
views/img/admin/manual_steps/google/google10.jpg' />
                                                                                    </div>
									</div>
                                                                                </div>
                                                         
                                                            </div>    
                                                        </div>
                                                    </div>

                                                    <!--------------- End - Login -------------------->    
						    
						    <!--------------- Start - Mailchimp -------------------->

                                                    <div id="tab_mailchimp" class="tab-pane tab-form">
                                                        <div class="block">
                                                            <h4 class='velsof-tab-heading'><?php echo smartyTranslate(array('s'=>'MailChimp','mod'=>'supercheckout'),$_smarty_tpl);?>
</h4>
                                                            <div class="block">
                                                                <table class="form free-disabled">
                                                                    <tr>
                                                                        <td class="name vertical_top_align"><span class="control-label"><?php echo smartyTranslate(array('s'=>'Enable MailChimp','mod'=>'supercheckout'),$_smarty_tpl);?>
: </span>                                                                
                                                                            <i class="icon-question-sign supercheckout-tooltip-color" data-toggle="tooltip"  data-placement="top" data-original-title="<?php echo smartyTranslate(array('s'=>'Enable/Disable Mailchimp','mod'=>'supercheckout'),$_smarty_tpl);?>
"></i>
                                                                        </td>
                                                                        <td class="settings">
                                                                            <input type="hidden" value="0" disabled/>
                                                                            <?php if ($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['mailchimp']['enable']==1) {?>
                                                                                <?php if ($_smarty_tpl->tpl_vars['IE7']->value==true) {?>
                                                                                    <div>
                                                                                        <input class="checkbox" type="checkbox" value="1" id="supercheckout_mailchimp_enable" checked="checked" disabled/>
                                                                                    </div>
                                                                                <?php } else { ?>
                                                                                    <div class="make-switch" data-on="primary" data-off="default">
                                                                                        <input class="make-switch" type="checkbox" value="1" id="supercheckout_mailchimp_enable" checked="checked" disabled/>
                                                                                    </div>
                                                                                <?php }?>                                                                    
                                                                            <?php } else { ?>
                                                                                <?php if ($_smarty_tpl->tpl_vars['IE7']->value==true) {?>
                                                                                    <div>
                                                                                        <input class="checkbox" type="checkbox" value="1"  id="supercheckout_mailchimp_enable" disabled/>
                                                                                    </div>
                                                                                <?php } else { ?>
                                                                                    <div class="make-switch" data-on="primary" data-off="default">
                                                                                        <input class="make-switch" type="checkbox" value="1"  id="supercheckout_mailchimp_enable" disabled/>
                                                                                    </div>
                                                                                <?php }?>
                                                                            <?php }?>
                                                                            <div class="widget-body uniformjs" style="padding-top: 1%;">
                                                                           
                                                                                    
                                                                                    <label class="checkboxinline no-bold">
                                                                                        <input type="checkbox" class="checkbox input-checkbox-option" value="1" <?php if (isset($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['mailchimp']['default'])&&$_smarty_tpl->tpl_vars['velocity_supercheckout']->value['mailchimp']['default']==1) {?>checked="checked"<?php }?> disabled/><?php echo smartyTranslate(array('s'=>'Subscribe customers as soon as they come out from Email field','mod'=>'supercheckout'),$_smarty_tpl);?>
                                                                        
                                                                                    </label>
                                                                                </div>
                                                                        </td>
                                                                    </tr>
									  <tr>
                                                                        <td class="name vertical_top_align"><span class="control-label"><?php echo smartyTranslate(array('s'=>'MailChimp Api Key','mod'=>'supercheckout'),$_smarty_tpl);?>
: </span>                                                                
                                                                            <i class="icon-question-sign supercheckout-tooltip-color" data-toggle="tooltip"  data-placement="top" data-original-title="<?php echo smartyTranslate(array('s'=>'Enter MailChimp Api Key','mod'=>'supercheckout'),$_smarty_tpl);?>
"></i>
                                                                        </td>
                                                                        <td class="settings">
										<span style="display: inline-block;width:75%;">
                                                                            <input type="text" class="text-width"  value="<?php if (isset($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['mailchimp']['api'])) {?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['mailchimp']['api'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php }?>" id="supercheckout_mailchimp_key" disabled/>
									    <input type="hidden" class="text-width"  value="<?php if (isset($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['mailchimp']['list'])) {?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['mailchimp']['list'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php }?>" id="supercheckout_mailchimp_list" disabled/>
									    </span>
									    <span ><input type="button" style="padding: 7.2px 12px;" value="Get List"  id="mailchimp_listbtn" class="btn" disabled>
										</span>
                                                                        </td>
                                                                    </tr> 
								    
								    <tr>
                                                                        <td class="name vertical_top_align"><span class="control-label"><?php echo smartyTranslate(array('s'=>'MailChimp List','mod'=>'supercheckout'),$_smarty_tpl);?>
: </span>                                                                
                                                                            <i class="icon-question-sign supercheckout-tooltip-color" data-toggle="tooltip"  data-placement="top" data-original-title="<?php echo smartyTranslate(array('s'=>'Select MailChimp List ','mod'=>'supercheckout'),$_smarty_tpl);?>
"></i>
                                                                        </td>
                                                                        <td class="settings">
										
										<div id="supercheckout_list"></div>
                                                                        </td>
                                                                    </tr>  
								    
									</table>
							    </div>
							</div>
						    </div>
									
									
							<!--------------- End - Mailchimp -------------------->    

                                                    <!--------------- Start - Addresses -------------------->

                                                    <div id="tab_Addr" class="tab-pane tab-form">
                                                        <?php $_smarty_tpl->tpl_vars['conditional'] = new Smarty_variable('', null, 0);?>
                                                        <div class="block">
                                                            <hr style="margin-bottom:5px;">
                                                                <div class="row">
                                                                    <div class="span">
                                                                        <p style="margin-bottom: 0; margin-right: 5px">
                                                                            <span style="font-weight: bold; font-size: 15px;">Note:</span>
                                                                            <span style="  color: rgb(217, 83, 79);margin-left: 5px;font-weight: bold;}">Please don't hide fields with * if they are mandatory in following Prestashop settings.</span><br/>1. Localization->Countries->Edit your country.<br/>2. Customers->Addresses->Set required fields for this section.</span>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            <hr style="margin-top:5px;">
							    <table class="form">
								    <tr class="free-disabled">
                                                                    <td class="name vertical_top_align"><span class="control-label"><?php echo smartyTranslate(array('s'=>'Inline Validations','mod'=>'supercheckout'),$_smarty_tpl);?>
: </span>                                                                
                                                                        <i class="icon-question-sign supercheckout-tooltip-color" data-toggle="tooltip"  data-placement="top" data-original-title="<?php echo smartyTranslate(array('s'=>'Enable/Disable Inline Validations','mod'=>'supercheckout'),$_smarty_tpl);?>
"></i>
                                                                    </td>
                                                                    <td class="settings">
                                                                        <input type="hidden" value="0" disabled/>
                                                                        <?php if (isset($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['inline_validation']['enable'])&&$_smarty_tpl->tpl_vars['velocity_supercheckout']->value['inline_validation']['enable']==1) {?>
                                                                            <?php if ($_smarty_tpl->tpl_vars['IE7']->value==true) {?>
                                                                                <div>
                                                                                    <input class="checkbox" type="checkbox" value="1" checked="checked" disabled/>
                                                                                </div>
                                                                            <?php } else { ?>
                                                                                <div class="make-switch" data-on="primary" data-off="default">
                                                                                    <input class="make-switch" type="checkbox" value="1"  checked="checked" disabled/>
                                                                                </div>
                                                                            <?php }?>                                                                    
                                                                        <?php } else { ?>
                                                                            <?php if ($_smarty_tpl->tpl_vars['IE7']->value==true) {?>
                                                                                <div>
                                                                                    <input class="checkbox" type="checkbox" value="1"  disabled/>
                                                                                </div>
                                                                            <?php } else { ?>
                                                                                <div class="make-switch" data-on="primary" data-off="default">
                                                                                    <input class="make-switch" type="checkbox" value="1"  disabled/>
                                                                                </div>
                                                                            <?php }?>
                                                                        <?php }?>
                                                                    </td>
                                                                </tr>
							    </table>
                                                            <h4 class='velsof-tab-heading'><?php echo smartyTranslate(array('s'=>'Customer Personal','mod'=>'supercheckout'),$_smarty_tpl);?>
</h4>
                                                            <table class="form alternate">
                                                                <thead>
                                                                    <tr>
                                                                        <th></th>
                                                                        <th class="left drag-col-2 col-pad-left"><?php echo smartyTranslate(array('s'=>'Guest Customer','mod'=>'supercheckout'),$_smarty_tpl);?>
</th>
                                                                        <th class="left drag-col-2"><?php echo smartyTranslate(array('s'=>'Logged in Customer','mod'=>'supercheckout'),$_smarty_tpl);?>
</th>
                                                                        <th></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="sortable ui-sortable">
                                                                    <?php  $_smarty_tpl->tpl_vars['p_addr'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p_addr']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['velocity_supercheckout']->value['customer_personal']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p_addr']->key => $_smarty_tpl->tpl_vars['p_addr']->value) {
$_smarty_tpl->tpl_vars['p_addr']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['p_addr']->key;
?>
                                                                        <tr id="customer_personal_<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['customer_personal'][$_smarty_tpl->tpl_vars['k']->value]['id'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
_input" class="sort-item free-disabled" sort-data="<?php if (isset($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['customer_personal'][$_smarty_tpl->tpl_vars['k']->value]['sort_order'])) {?><?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['customer_personal'][$_smarty_tpl->tpl_vars['k']->value]['sort_order']);?>
<?php }?>">
                                                                            <input type="hidden" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['customer_personal'][$_smarty_tpl->tpl_vars['k']->value]['id'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"  disabled/>
                                                                            <input type="hidden" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['customer_personal'][$_smarty_tpl->tpl_vars['k']->value]['title'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"  disabled/>
                                                                            <td class="name">
                                                                               <span><?php echo smartyTranslate(array('s'=>mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['customer_personal'][$_smarty_tpl->tpl_vars['k']->value]['title'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8'),'mod'=>'supercheckout'),$_smarty_tpl);?>
:<input class="sort" class="input-sm form-control col-md-12" type="text" value="<?php if (isset($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['customer_personal'][$_smarty_tpl->tpl_vars['k']->value]['sort_order'])) {?><?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['customer_personal'][$_smarty_tpl->tpl_vars['k']->value]['sort_order']);?>
<?php }?>" disabled/></span>
                                                                            </td>
                                                                            <td class="left drag-col-2 col-pad-left">
                                                                                <div class="widget-body uniformjs" style="padding: 0 !important;">
                                                                                    <label class="checkboxinline no-bold">
                                                                                        <input id="cus_personal_guest_<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
_require" type="checkbox" class="checkbox input-checkbox-option require_address_field"  value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['customer_personal'][$_smarty_tpl->tpl_vars['k']->value]['guest']['require']);?>
" <?php if ($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['customer_personal'][$_smarty_tpl->tpl_vars['k']->value]['guest']['require']==1) {?>checked="checked"<?php }?> disabled/><?php echo smartyTranslate(array('s'=>'Require','mod'=>'supercheckout'),$_smarty_tpl);?>
                                                                        
                                                                                    </label>
                                                                                    <label class="checkboxinline no-bold">
                                                                                        <input id="cus_personal_guest_<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
_display" type="checkbox" class="checkbox input-checkbox-option display_address_field"  value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['customer_personal'][$_smarty_tpl->tpl_vars['k']->value]['guest']['display']);?>
" <?php if ($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['customer_personal'][$_smarty_tpl->tpl_vars['k']->value]['guest']['display']==1) {?>checked="checked"<?php }?> disabled/><?php echo smartyTranslate(array('s'=>'Show','mod'=>'supercheckout'),$_smarty_tpl);?>
                                                                        
                                                                                    </label>
                                                                                </div>
                                                                            </td>
                                                                            <td class="left drag-col-2">
                                                                                <div class="widget-body uniformjs" style="padding: 0 !important;">
                                                                                    <label class="checkboxinline no-bold">
                                                                                        <input id="cus_personal_logged_<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
_require" type="checkbox" class="checkbox input-checkbox-option require_address_field"  value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['customer_personal'][$_smarty_tpl->tpl_vars['k']->value]['logged']['require']);?>
" <?php if ($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['customer_personal'][$_smarty_tpl->tpl_vars['k']->value]['logged']['require']==1) {?>checked="checked"<?php }?> disabled/><?php echo smartyTranslate(array('s'=>'Require','mod'=>'supercheckout'),$_smarty_tpl);?>
                                                                        
                                                                                    </label>
                                                                                    <label class="checkboxinline no-bold">
                                                                                        <input id="cus_personal_logged_<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
_display" type="checkbox" class="checkbox input-checkbox-option display_address_field"  value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['customer_personal'][$_smarty_tpl->tpl_vars['k']->value]['logged']['display']);?>
" <?php if ($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['customer_personal'][$_smarty_tpl->tpl_vars['k']->value]['logged']['display']==1) {?>checked="checked"<?php }?> disabled/><?php echo smartyTranslate(array('s'=>'Show','mod'=>'supercheckout'),$_smarty_tpl);?>
                                                                        
                                                                                    </label>
                                                                                </div>
                                                                            </td>
                                                                            <td class="reorder">
                                                                                <i class="icon-reorder"></i>
                                                                                <span style='font-style: italic; margin-left: 5px;'>Drag to Sort</span>
                                                                            </td>
                                                                        </tr>
                                                                    <?php } ?>
                                                                </tbody>
                                                            </table>    
                                                        </div>
                                                                
                                                        <div class="block"><br>
                                                            <h4 class='velsof-tab-heading'><?php echo smartyTranslate(array('s'=>'Customer Subscription','mod'=>'supercheckout'),$_smarty_tpl);?>
</h4>
                                                            <table class="form alternate">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="width:9.5%;"></th>
                                                                        <th class="left drag-col-2 col-pad-left"><?php echo smartyTranslate(array('s'=>'Guest Customer','mod'=>'supercheckout'),$_smarty_tpl);?>
</th>
                                                                        <th></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="sortable ui-sortable">
                                                                    <?php  $_smarty_tpl->tpl_vars['p_addr'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p_addr']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['velocity_supercheckout']->value['customer_subscription']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p_addr']->key => $_smarty_tpl->tpl_vars['p_addr']->value) {
$_smarty_tpl->tpl_vars['p_addr']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['p_addr']->key;
?>
                                                                        <tr id="customer_subsription_<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['customer_subscription'][$_smarty_tpl->tpl_vars['k']->value]['id'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
_input" class="sort-item free-disabled" sort-data="<?php if (isset($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['customer_subscription'][$_smarty_tpl->tpl_vars['k']->value]['sort_order'])) {?><?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['customer_subscription'][$_smarty_tpl->tpl_vars['k']->value]['sort_order']);?>
<?php }?>">
                                                                            <input type="hidden" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['customer_subscription'][$_smarty_tpl->tpl_vars['k']->value]['id'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"  disabled/>
                                                                            <input type="hidden" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['customer_subscription'][$_smarty_tpl->tpl_vars['k']->value]['title'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"  disabled/>
                                                                            <td class="name">
                                                                               <span><?php echo smartyTranslate(array('s'=>mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['customer_subscription'][$_smarty_tpl->tpl_vars['k']->value]['title'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8'),'mod'=>'supercheckout'),$_smarty_tpl);?>
:<input class="sort" class="input-sm form-control col-md-12" type="text" value="<?php if (isset($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['customer_subscription'][$_smarty_tpl->tpl_vars['k']->value]['sort_order'])) {?><?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['customer_subscription'][$_smarty_tpl->tpl_vars['k']->value]['sort_order']);?>
<?php }?>" disabled/></span>
                                                                            </td>
                                                                            <td class="left drag-col-2 col-pad-left">
                                                                                <div class="widget-body uniformjs" style="padding: 0 !important;">
                                                                                    <label class="checkboxinline no-bold">
                                                                                        <input id="cus_subsription_guest_<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
_checked" type="checkbox" class="checkbox input-checkbox-option"  value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['customer_subscription'][$_smarty_tpl->tpl_vars['k']->value]['guest']['checked']);?>
" <?php if ($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['customer_subscription'][$_smarty_tpl->tpl_vars['k']->value]['guest']['checked']==1) {?>checked="checked"<?php }?> disabled/><?php echo smartyTranslate(array('s'=>'Show as Checked','mod'=>'supercheckout'),$_smarty_tpl);?>
                                                                        
                                                                                    </label>
                                                                                    <label class="checkboxinline no-bold">
                                                                                        <input id="cus_subsription_guest_<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
_display" type="checkbox" class="checkbox input-checkbox-option"  value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['customer_subscription'][$_smarty_tpl->tpl_vars['k']->value]['guest']['display']);?>
" <?php if ($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['customer_subscription'][$_smarty_tpl->tpl_vars['k']->value]['guest']['display']==1) {?>checked="checked"<?php }?> disabled/><?php echo smartyTranslate(array('s'=>'Show','mod'=>'supercheckout'),$_smarty_tpl);?>
                                                                        
                                                                                    </label>
                                                                                </div>
                                                                            </td>
                                                                            <td class="reorder">
                                                                                <i class="icon-reorder"></i>
                                                                                <span style='font-style: italic; margin-left: 5px;'>Drag to Sort</span>
                                                                            </td>
                                                                        </tr>
                                                                    <?php } ?>
                                                                </tbody>
                                                            </table>    
                                                        </div>
                                                                
                                                        <div class="block"><br>
                                                            <table class="form alternate">
                                                                <thead>
                                                                    <tr>
                                                                        <th></th>
                                                                        <th class="left drag-col-2 col-pad-left"><?php echo smartyTranslate(array('s'=>'Guest Customer','mod'=>'supercheckout'),$_smarty_tpl);?>
</th>
                                                                        <th class="left drag-col-2"><?php echo smartyTranslate(array('s'=>'Logged in Customer','mod'=>'supercheckout'),$_smarty_tpl);?>
</th>
                                                                        <th></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="">
                                                                    <tr id="use_delivery_for_payment_add" class="free-disabled">
                                                                        <td class="name">
                                                                           <span><b><?php echo smartyTranslate(array('s'=>'Use Delivery Address as Invoice Address','mod'=>'supercheckout'),$_smarty_tpl);?>
</b>:</span>
                                                                        </td>
                                                                        <td class="left drag-col-2 col-pad-left">
                                                                            <div class="widget-body uniformjs" style="padding: 0 !important;">
                                                                                <label class="checkboxinline no-bold">
                                                                                    <input id="use_delivery_for_payment_add_guest" type="checkbox" class="checkbox input-checkbox-option"  value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['use_delivery_for_payment_add']['guest']);?>
" <?php if ($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['use_delivery_for_payment_add']['guest']==1) {?>checked="checked"<?php }?> disabled/><?php echo smartyTranslate(array('s'=>'Show as Checked','mod'=>'supercheckout'),$_smarty_tpl);?>
                                                                        
                                                                                </label>
                                                                                <label class="checkboxinline no-bold">
                                                                                    <input id="show_use_delivery_for_payment_add_guest" type="checkbox" class="checkbox input-checkbox-option"  value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['show_use_delivery_for_payment_add']['guest']);?>
" <?php if ($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['show_use_delivery_for_payment_add']['guest']==1) {?>checked="checked"<?php }?> disabled/><?php echo smartyTranslate(array('s'=>'Show','mod'=>'supercheckout'),$_smarty_tpl);?>
                                                                        
                                                                                </label>
                                                                            </div>
                                                                        </td>
                                                                        <td class="left drag-col-2">
                                                                            <div class="widget-body uniformjs" style="padding: 0 !important;">
                                                                                <label class="checkboxinline no-bold">
                                                                                    <input id="use_delivery_for_payment_add_logged" type="checkbox" class="checkbox input-checkbox-option"  value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['use_delivery_for_payment_add']['logged']);?>
" <?php if ($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['use_delivery_for_payment_add']['logged']==1) {?>checked="checked"<?php }?> disabled/><?php echo smartyTranslate(array('s'=>'Show as Checked','mod'=>'supercheckout'),$_smarty_tpl);?>
                                                                        
                                                                                </label>
                                                                                <label class="checkboxinline no-bold">
                                                                                    <input id="show_use_delivery_for_payment_add_logged" type="checkbox" class="checkbox input-checkbox-option"  value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['show_use_delivery_for_payment_add']['logged']);?>
" <?php if ($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['show_use_delivery_for_payment_add']['logged']==1) {?>checked="checked"<?php }?> disabled/><?php echo smartyTranslate(array('s'=>'Show','mod'=>'supercheckout'),$_smarty_tpl);?>

                                                                                </label>
                                                                            </div>
                                                                        </td>
									
									
                                                                        <td class="reorder"></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>    
                                                        </div>
                                                                
                                                        <div class="block"><br><br>
                                                            <h4 class='velsof-tab-heading'><?php echo smartyTranslate(array('s'=>'Delivery Address','mod'=>'supercheckout'),$_smarty_tpl);?>
</h4>
							    <table class="form alternate">
                                                                <thead>
                                                                    <tr>
                                                                        <th></th>
                                                                        <th class="left drag-col-2 col-pad-left"><?php echo smartyTranslate(array('s'=>'Guest Customer','mod'=>'supercheckout'),$_smarty_tpl);?>
</th>
                                                                        <th class="left drag-col-2"><?php echo smartyTranslate(array('s'=>'Logged in Customer','mod'=>'supercheckout'),$_smarty_tpl);?>
</th>
                                                                        <th></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="sortable ui-sortable">
                                                            	<?php  $_smarty_tpl->tpl_vars['p_addr'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p_addr']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['velocity_supercheckout']->value['shipping_address']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p_addr']->key => $_smarty_tpl->tpl_vars['p_addr']->value) {
$_smarty_tpl->tpl_vars['p_addr']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['p_addr']->key;
?>
                                                                        <tr id="customer_personal_<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['shipping_address'][$_smarty_tpl->tpl_vars['k']->value]['id'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
_input" class="sort-item free-disabled" sort-data="<?php if (isset($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['shipping_address'][$_smarty_tpl->tpl_vars['k']->value]['sort_order'])) {?><?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['shipping_address'][$_smarty_tpl->tpl_vars['k']->value]['sort_order']);?>
<?php }?>">
                                                                            <input type="hidden" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['shipping_address'][$_smarty_tpl->tpl_vars['k']->value]['id'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"  disabled/>
                                                                            <input type="hidden" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['shipping_address'][$_smarty_tpl->tpl_vars['k']->value]['title'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"  disabled/>
                                                                            <input type="hidden" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['shipping_address'][$_smarty_tpl->tpl_vars['k']->value]['conditional'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" disabled/>
                                                                            <td class="name">
                                                                               <span><?php echo smartyTranslate(array('s'=>mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['shipping_address'][$_smarty_tpl->tpl_vars['k']->value]['title'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8'),'mod'=>'supercheckout'),$_smarty_tpl);?>
:<input class="sort" class="input-sm form-control col-md-12" type="text" value="<?php if (intval(isset($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['shipping_address'][$_smarty_tpl->tpl_vars['k']->value]['sort_order']))) {?><?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['shipping_address'][$_smarty_tpl->tpl_vars['k']->value]['sort_order']);?>
<?php }?>" disabled/></span>
                                                                            </td>
                                                                            <?php $_smarty_tpl->tpl_vars['conditional'] = new Smarty_variable($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['shipping_address'][$_smarty_tpl->tpl_vars['k']->value]['conditional'], null, 0);?>
                                                                            <td class="left drag-col-2 col-pad-left">
                                                                                <div class="widget-body uniformjs" style="padding: 0 !important;">
                                                                                    <label class="checkboxinline no-bold">
                                                                                        <?php if ($_smarty_tpl->tpl_vars['k']->value=='vat_number') {?>
												<div style="width: 70px;text-align: center;">
													<i class="icon-question-sign supercheckout-tooltip-color" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo smartyTranslate(array('s'=>'To make this field mandatory please go to Customers->Addresses->Set required fields for this section','mod'=>'supercheckout'),$_smarty_tpl);?>
"></i><?php echo smartyTranslate(array('s'=>'Require','mod'=>'supercheckout'),$_smarty_tpl);?>

												</div>
											<?php } else { ?>
												<input id="shipping_address_guest_<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
_require" type="checkbox" class="checkbox input-checkbox-option require_address_field"  value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['shipping_address'][$_smarty_tpl->tpl_vars['k']->value]['guest']['require']);?>
" <?php if ($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['shipping_address'][$_smarty_tpl->tpl_vars['k']->value]['guest']['require']==1) {?>checked="checked"<?php }?> disabled/><?php echo smartyTranslate(array('s'=>'Require','mod'=>'supercheckout'),$_smarty_tpl);?>
                                                                        
											<?php }?>
                                                                                    </label>
                                                                                    <label class="checkboxinline no-bold">
                                                                                        <input id="shipping_address_guest_<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
_display" type="checkbox" class="checkbox input-checkbox-option display_address_field"  value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['shipping_address'][$_smarty_tpl->tpl_vars['k']->value]['guest']['display']);?>
" <?php if ($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['shipping_address'][$_smarty_tpl->tpl_vars['k']->value]['guest']['display']==1) {?>checked="checked"<?php }?> disabled/><?php echo smartyTranslate(array('s'=>'Show','mod'=>'supercheckout'),$_smarty_tpl);?>
                                                                        
                                                                                    </label>
                                                                                    <?php if (in_array($_smarty_tpl->tpl_vars['k']->value,$_smarty_tpl->tpl_vars['highlighted_fields']->value)) {?>
                                                                                        <span style="color:red; margin-left: 5px;">*</span>
                                                                                    <?php }?>
                                                                                </div>
                                                                            </td>
                                                                            <td class="left drag-col-2">
                                                                                <div class="widget-body uniformjs" style="padding: 0 !important;">
                                                                                    <label class="checkboxinline no-bold">
                                                                                        <?php if ($_smarty_tpl->tpl_vars['k']->value=='vat_number') {?>
												<div style="width: 70px;text-align: center;">
													<i class="icon-question-sign supercheckout-tooltip-color" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo smartyTranslate(array('s'=>'To make this field mandatory please go to Customers->Addresses->Set required fields for this section','mod'=>'supercheckout'),$_smarty_tpl);?>
"></i><?php echo smartyTranslate(array('s'=>'Require','mod'=>'supercheckout'),$_smarty_tpl);?>

												</div>
											<?php } else { ?>
												<input id="shipping_address_logged_<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
_require" type="checkbox" class="checkbox input-checkbox-option require_address_field"  value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['shipping_address'][$_smarty_tpl->tpl_vars['k']->value]['logged']['require']);?>
" <?php if ($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['shipping_address'][$_smarty_tpl->tpl_vars['k']->value]['logged']['require']==1) {?>checked="checked"<?php }?> disabled/><?php echo smartyTranslate(array('s'=>'Require','mod'=>'supercheckout'),$_smarty_tpl);?>
                                                                        
											<?php }?>
                                                                                    </label>
                                                                                    <label class="checkboxinline no-bold">
                                                                                        <input id="shipping_address_logged_<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
_display" type="checkbox" class="checkbox input-checkbox-option display_address_field"  value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['shipping_address'][$_smarty_tpl->tpl_vars['k']->value]['logged']['display']);?>
" <?php if ($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['shipping_address'][$_smarty_tpl->tpl_vars['k']->value]['logged']['display']==1) {?>checked="checked"<?php }?> disabled/><?php echo smartyTranslate(array('s'=>'Show','mod'=>'supercheckout'),$_smarty_tpl);?>
                                                                        
                                                                                    </label>
                                                                                    <?php if (in_array($_smarty_tpl->tpl_vars['k']->value,$_smarty_tpl->tpl_vars['highlighted_fields']->value)) {?>
                                                                                        <span style="color:red; margin-left: 5px;">*</span>
                                                                                    <?php }?>
                                                                                </div>
                                                                            </td>
                                                                            <td class="reorder">
                                                                                <i class="icon-reorder"></i>
                                                                                <span style='font-style: italic; margin-left: 5px;'>Drag to Sort</span>
                                                                            </td>
                                                                        </tr>
                                                                    <?php } ?>
                                                                </tbody>
                                                            </table>    
                                                        </div>
                                                        <div class="block"><br>
                                                            <h4 class='velsof-tab-heading'><?php echo smartyTranslate(array('s'=>'Invoice Address','mod'=>'supercheckout'),$_smarty_tpl);?>
</h4>
                                                            <table class="form alternate">
                                                                <thead>
                                                                    <tr>
                                                                        <th></th>
                                                                        <th class="left drag-col-2 col-pad-left"><?php echo smartyTranslate(array('s'=>'Guest Customer','mod'=>'supercheckout'),$_smarty_tpl);?>
</th>
                                                                        <th class="left drag-col-2"><?php echo smartyTranslate(array('s'=>'Logged in Customer','mod'=>'supercheckout'),$_smarty_tpl);?>
</th>
                                                                        <th></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="sortable ui-sortable">
                                                                    <?php  $_smarty_tpl->tpl_vars['p_addr'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p_addr']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['velocity_supercheckout']->value['payment_address']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p_addr']->key => $_smarty_tpl->tpl_vars['p_addr']->value) {
$_smarty_tpl->tpl_vars['p_addr']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['p_addr']->key;
?>
                                                                        <tr id="customer_personal_<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['payment_address'][$_smarty_tpl->tpl_vars['k']->value]['id'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
_input" class="sort-item free-disabled" sort-data="<?php if (isset($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['payment_address'][$_smarty_tpl->tpl_vars['k']->value]['sort_order'])) {?><?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['payment_address'][$_smarty_tpl->tpl_vars['k']->value]['sort_order']);?>
<?php }?>">
                                                                            <input type="hidden" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['payment_address'][$_smarty_tpl->tpl_vars['k']->value]['id'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" disabled/>
                                                                            <input type="hidden" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['payment_address'][$_smarty_tpl->tpl_vars['k']->value]['title'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" disabled/>
                                                                            <input type="hidden" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['payment_address'][$_smarty_tpl->tpl_vars['k']->value]['conditional'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" disabled/>
                                                                            <td class="name">
                                                                               <span><?php echo smartyTranslate(array('s'=>$_smarty_tpl->tpl_vars['velocity_supercheckout']->value['payment_address'][$_smarty_tpl->tpl_vars['k']->value]['title'],'mod'=>'supercheckout'),$_smarty_tpl);?>
:<input class="sort" class="input-sm form-control col-md-12" type="text" value="<?php if (isset($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['payment_address'][$_smarty_tpl->tpl_vars['k']->value]['sort_order'])) {?><?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['payment_address'][$_smarty_tpl->tpl_vars['k']->value]['sort_order']);?>
<?php }?>"  disabled/></span>
                                                                            </td>
                                                                            <?php $_smarty_tpl->tpl_vars['conditional'] = new Smarty_variable($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['payment_address'][$_smarty_tpl->tpl_vars['k']->value]['conditional'], null, 0);?>
                                                                            <td class="left drag-col-2 col-pad-left">
                                                                                <div class="widget-body uniformjs" style="padding: 0 !important;">
                                                                                    <label class="checkboxinline no-bold">
                                                                                        <?php if ($_smarty_tpl->tpl_vars['k']->value=='vat_number') {?>
												<div style="width: 70px;text-align: center;">
													<i class="icon-question-sign supercheckout-tooltip-color" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo smartyTranslate(array('s'=>'To make this field mandatory please go to Customers->Addresses->Set required fields for this section','mod'=>'supercheckout'),$_smarty_tpl);?>
"></i><?php echo smartyTranslate(array('s'=>'Require','mod'=>'supercheckout'),$_smarty_tpl);?>

												</div>
											<?php } else { ?>
												<input id="payment_address_guest_<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
_require" type="checkbox" class="checkbox input-checkbox-option require_address_field"  value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['payment_address'][$_smarty_tpl->tpl_vars['k']->value]['guest']['require']);?>
" <?php if ($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['payment_address'][$_smarty_tpl->tpl_vars['k']->value]['guest']['require']==1) {?>checked="checked"<?php }?> disabled/><?php echo smartyTranslate(array('s'=>'Require','mod'=>'supercheckout'),$_smarty_tpl);?>

											<?php }?>
                                                                                    </label>
                                                                                    <label class="checkboxinline no-bold">
                                                                                        <input id="payment_address_guest_<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
_display" type="checkbox" class="checkbox input-checkbox-option display_address_field"  value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['payment_address'][$_smarty_tpl->tpl_vars['k']->value]['guest']['display']);?>
" <?php if ($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['payment_address'][$_smarty_tpl->tpl_vars['k']->value]['guest']['display']==1) {?>checked="checked"<?php }?> disabled/><?php echo smartyTranslate(array('s'=>'Show','mod'=>'supercheckout'),$_smarty_tpl);?>
                                                                        
                                                                                    </label>
                                                                                    <?php if (in_array($_smarty_tpl->tpl_vars['k']->value,$_smarty_tpl->tpl_vars['highlighted_fields']->value)) {?>
                                                                                        <span style="color:red; margin-left: 5px;">*</span>
                                                                                    <?php }?>
                                                                                </div>
                                                                            </td>
                                                                            <td class="left drag-col-2">
                                                                                <div class="widget-body uniformjs" style="padding: 0 !important;">
                                                                                    <label class="checkboxinline no-bold">
                                                                                        <?php if ($_smarty_tpl->tpl_vars['k']->value=='vat_number') {?>
												<div style="width: 70px;text-align: center;">
													<i class="icon-question-sign supercheckout-tooltip-color" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo smartyTranslate(array('s'=>'To make this field mandatory please go to Customers->Addresses->Set required fields for this section','mod'=>'supercheckout'),$_smarty_tpl);?>
"></i><?php echo smartyTranslate(array('s'=>'Require','mod'=>'supercheckout'),$_smarty_tpl);?>

												</div>
											<?php } else { ?>
												<input id="payment_address_logged_<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
_require" type="checkbox" class="checkbox input-checkbox-option require_address_field" value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['payment_address'][$_smarty_tpl->tpl_vars['k']->value]['logged']['require']);?>
" <?php if ($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['payment_address'][$_smarty_tpl->tpl_vars['k']->value]['logged']['require']==1) {?>checked="checked"<?php }?> disabled/><?php echo smartyTranslate(array('s'=>'Require','mod'=>'supercheckout'),$_smarty_tpl);?>

											<?php }?>
                                                                                    </label>
                                                                                    <label class="checkboxinline no-bold">
                                                                                        <input id="payment_address_logged_<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
_display" type="checkbox" class="checkbox input-checkbox-option display_address_field"  value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['payment_address'][$_smarty_tpl->tpl_vars['k']->value]['logged']['display']);?>
" <?php if ($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['payment_address'][$_smarty_tpl->tpl_vars['k']->value]['logged']['display']==1) {?>checked="checked"<?php }?> disabled/><?php echo smartyTranslate(array('s'=>'Show','mod'=>'supercheckout'),$_smarty_tpl);?>
                                                                        
                                                                                    </label>
                                                                                    <?php if (in_array($_smarty_tpl->tpl_vars['k']->value,$_smarty_tpl->tpl_vars['highlighted_fields']->value)) {?>
                                                                                        <span style="color:red; margin-left: 5px;">*</span>
                                                                                    <?php }?>
                                                                                </div>
                                                                            </td>
                                                                            <td class="reorder">
                                                                                <i class="icon-reorder"></i>
                                                                                <span style='font-style: italic; margin-left: 5px;'>Drag to Sort</span>
                                                                            </td>
                                                                        </tr>
                                                                    <?php } ?>
                                                                </tbody>
                                                            </table>    
                                                        </div>                                                        
                                                    </div>

                                                    <!--------------- End - Addresses -------------------->

                                                    <!--------------- Start - Payment Method -------------------->

                                                    <div id="tab_payment_method" class="tab-pane tab-form">
                                                        <div class="block">
                                                            <h4 class='velsof-tab-heading'><?php echo smartyTranslate(array('s'=>'Payment Method','mod'=>'supercheckout'),$_smarty_tpl);?>
</h4>
                                                            <table class="form">
                                                                <tr class="free-disabled">
                                                                    <td class="name vertical_top_align"><span class="control-label"><?php echo smartyTranslate(array('s'=>'Display Methods','mod'=>'supercheckout'),$_smarty_tpl);?>
: </span>                                                                
                                                                        <i class="icon-question-sign supercheckout-tooltip-color" data-toggle="tooltip"  data-placement="top" data-original-title="<?php echo smartyTranslate(array('s'=>'Display Methods Tooltip','mod'=>'supercheckout'),$_smarty_tpl);?>
"></i>
                                                                    </td>
                                                                    <td class="settings">
                                                                        <input type="hidden" value="0" disabled/>
                                                                        <?php if ($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['payment_method']['enable']==1) {?>
                                                                            <?php if ($_smarty_tpl->tpl_vars['IE7']->value==true) {?>
                                                                                <div>
                                                                                    <input class="checkbox" type="checkbox" value="1"  checked="checked" disabled/>
                                                                                </div>
                                                                            <?php } else { ?>
                                                                                <div class="make-switch" data-on="primary" data-off="default">
                                                                                    <input class="make-switch" type="checkbox" value="1" checked="checked" disabled/>
                                                                                </div>
                                                                            <?php }?>                                                                    
                                                                        <?php } else { ?>
                                                                            <?php if ($_smarty_tpl->tpl_vars['IE7']->value==true) {?>
                                                                                <div>
                                                                                    <input class="checkbox" type="checkbox" value="1" disabled/>
                                                                                </div>
                                                                            <?php } else { ?>
                                                                                <div class="make-switch" data-on="primary" data-off="default">
                                                                                    <input class="make-switch" type="checkbox" value="1" disabled/>
                                                                                </div>
                                                                            <?php }?>
                                                                        <?php }?>
                                                                    </td>
                                                                </tr>
                                                                <tr class="free-disabled">
                                                                    <td class="name vertical_top_align">
                                                                        <span><?php echo smartyTranslate(array('s'=>'Display Style','mod'=>'supercheckout'),$_smarty_tpl);?>
: </span><i class="icon-question-sign supercheckout-tooltip-color" data-toggle="tooltip"  data-placement="top" data-original-title="<?php echo smartyTranslate(array('s'=>'Method Display Style Tooltip','mod'=>'supercheckout'),$_smarty_tpl);?>
"></i>
                                                                    </td>
                                                                    <td class="left settings">
                                                                        <div class="widget-body uniformjs" style="padding: 0 !important;">
                                                                            <label class="radio coupon_type_radio">
                                                                                <input type="radio" class="radio coupon_type_radio"  value="0"  <?php if ($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['payment_method']['display_style']==0) {?> checked="checked" <?php }?> disabled/><?php echo smartyTranslate(array('s'=>'Text Only','mod'=>'supercheckout'),$_smarty_tpl);?>
                                                                        
                                                                            </label>
                                                                            <label class="radio coupon_type_radio">
                                                                                <input type="radio" class="radio coupon_type_radio"  value="1" <?php if ($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['payment_method']['display_style']==1) {?> checked="checked" <?php }?> disabled/><?php echo smartyTranslate(array('s'=>'Text With Image','mod'=>'supercheckout'),$_smarty_tpl);?>
                                                                        
                                                                            </label>
                                                                            <label class="radio coupon_type_radio">
                                                                                <input type="radio" class="radio coupon_type_radio"  value="2" <?php if ($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['payment_method']['display_style']==2) {?> checked="checked" <?php }?> disabled/><?php echo smartyTranslate(array('s'=>'Image Only','mod'=>'supercheckout'),$_smarty_tpl);?>
                                                                        
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr class="free-disabled">
                                                                    <td class="name vertical_top_align"><span class="control-label"><?php echo smartyTranslate(array('s'=>'Selected Default Method','mod'=>'supercheckout'),$_smarty_tpl);?>
: </span>                                                                
                                                                        <i class="icon-question-sign supercheckout-tooltip-color" data-toggle="tooltip"  data-placement="top" data-original-title="<?php echo smartyTranslate(array('s'=>'Selected Default Payment Method Tooltip','mod'=>'supercheckout'),$_smarty_tpl);?>
"></i>
                                                                    </td>
                                                                    <td class="settings">
                                                                        <div class='span4'>
                                                                            <select <?php if ($_smarty_tpl->tpl_vars['ps_version']->value==15) {?>class="selectpicker vss_sc_ver15"<?php }?>  disabled>
                                                                                <?php  $_smarty_tpl->tpl_vars["pay_methods"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["pay_methods"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['payment_methods']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["pay_methods"]->key => $_smarty_tpl->tpl_vars["pay_methods"]->value) {
$_smarty_tpl->tpl_vars["pay_methods"]->_loop = true;
?>
                                                                                    <?php if ($_smarty_tpl->tpl_vars['pay_methods']->value['id_module']==$_smarty_tpl->tpl_vars['velocity_supercheckout']->value['payment_method']['default']) {?>
                                                                                        <option value="<?php echo intval($_smarty_tpl->tpl_vars['pay_methods']->value['id_module']);?>
" selected='selected'><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['pay_methods']->value['display_name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</option>
                                                                                    <?php } else { ?>
                                                                                        <option value="<?php echo intval($_smarty_tpl->tpl_vars['pay_methods']->value['id_module']);?>
"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['pay_methods']->value['display_name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</option>
                                                                                    <?php }?>
                                                                                <?php } ?>
                                                                            </select>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr class="free-disabled">
                                                                    <td colspan='2'><br>
                                                                        <p>
                                                                            <b><?php echo smartyTranslate(array('s'=>'Note','mod'=>'supercheckout'),$_smarty_tpl);?>
:</b>
                                                                            <?php echo smartyTranslate(array('s'=>'Payment Method Style Note','mod'=>'supercheckout'),$_smarty_tpl);?>

                                                                        </p>
                                                                    </td>
                                                                </tr>
                                                            </table>
																		<h4 class='velsof-tab-heading'><?php echo smartyTranslate(array('s'=>'Change logo and Title of Payment Methods','mod'=>'supercheckout'),$_smarty_tpl);?>
</h4>
																		<div id="payment-accordian" class="accordian_container">
																			<?php  $_smarty_tpl->tpl_vars["pay_methods"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["pay_methods"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['payment_methods']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["pay_methods"]->key => $_smarty_tpl->tpl_vars["pay_methods"]->value) {
$_smarty_tpl->tpl_vars["pay_methods"]->_loop = true;
?>
																			<h3><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['pay_methods']->value['display_name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</h3>
																			<div class="accdiv-logo">
																			<table class="form">
                                                                <tr class="free-disabled">
                                                                    <td class="name vertical_top_align"><span><?php echo smartyTranslate(array('s'=>'Title','mod'=>'supercheckout'),$_smarty_tpl);?>
: </span>                                                                
                                                                        <i class="icon-question-sign supercheckout-tooltip-color" data-toggle="tooltip"  data-placement="top" data-original-title="<?php echo smartyTranslate(array('s'=>'Enter payment method title','mod'=>'supercheckout'),$_smarty_tpl);?>
"></i>
                                                                    </td>
																
																	<td class="settings">
																		<table class="lang-title">
																		<?php  $_smarty_tpl->tpl_vars['lang'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['lang']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['lang']->key => $_smarty_tpl->tpl_vars['lang']->value) {
$_smarty_tpl->tpl_vars['lang']->_loop = true;
?>
                                                                    
                                                                    <tr class="free-disabled">
                                                                        
                                                                        <td><div class="span6">
                                                                            <input type="text" class="text-width" value="<?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['pay_methods']->value['id_module']);?>
<?php $_tmp1=ob_get_clean();?><?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['lang']->value['id_lang']);?>
<?php $_tmp2=ob_get_clean();?><?php if (isset($_smarty_tpl->tpl_vars['velocity_supercheckout_payment']->value['payment_method'][$_tmp1]['title'][$_tmp2])) {?><?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['pay_methods']->value['id_module']);?>
<?php $_tmp3=ob_get_clean();?><?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['lang']->value['id_lang']);?>
<?php $_tmp4=ob_get_clean();?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['velocity_supercheckout_payment']->value['payment_method'][$_tmp3]['title'][$_tmp4], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php } else { ?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['pay_methods']->value['display_name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php }?>" disabled/>                                                                                                                                                
                                                                           
                                                                        </div>
																		</td>
																		<td><div class='span0'><img src="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['img_lang_dir']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['lang']->value['id_lang'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
.jpg" alt="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['lang']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" title="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['lang']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"/></div></td>
                                                                    </tr>
                                                                    
                                                                    <?php } ?>
																		</table>
																	</td>
																</tr>
																<tr class="free-disabled">
																	<td class="name vertical_top_align"><span><?php echo smartyTranslate(array('s'=>'Logo Settings','mod'=>'supercheckout'),$_smarty_tpl);?>
: </span>                                                                
                                                                        <i class="icon-question-sign supercheckout-tooltip-color" data-toggle="tooltip"  data-placement="top" data-original-title="<?php echo smartyTranslate(array('s'=>'Set payment method logo with dimensions ','mod'=>'supercheckout'),$_smarty_tpl);?>
"></i>
                                                                    </td>
																	<td class="settings"><div>
																		<div class="logo-img" style='padding-left: 10px;padding-top:10px;margin-bottom:15px;'>
																			<?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['pay_methods']->value['id_module']);?>
<?php $_tmp5=ob_get_clean();?><?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['pay_methods']->value['id_module']);?>
<?php $_tmp6=ob_get_clean();?><?php if (isset($_smarty_tpl->tpl_vars['velocity_supercheckout_payment']->value['payment_method'][$_tmp5]['logo']['title'])&&$_smarty_tpl->tpl_vars['velocity_supercheckout_payment']->value['payment_method'][$_tmp6]['logo']['title']!='') {?>
																				<?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['pay_methods']->value['id_module']);?>
<?php $_tmp7=ob_get_clean();?><?php ob_start();?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['root_dir']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php $_tmp8=ob_get_clean();?><?php ob_start();?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['velocity_supercheckout_payment']->value['payment_method'][$_tmp7]['logo']['title'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php $_tmp9=ob_get_clean();?><?php if (!file_exists($_tmp8."/modules/supercheckout/views/img/admin/uploads/".$_tmp9)) {?>
																					<input type="hidden" id="payment_image_title_<?php echo intval($_smarty_tpl->tpl_vars['pay_methods']->value['id_module']);?>
" value="" disabled/>
                    <div><img id="payment-img-<?php echo intval($_smarty_tpl->tpl_vars['pay_methods']->value['id_module']);?>
" src="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['module_dir']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
views/img/admin/no-image.jpg"   style="border: 1px solid #ccc; padding:2px; height: 115px;"/></div>
					<?php } else { ?>
																				<input type="hidden"  id="payment_image_title_<?php echo intval($_smarty_tpl->tpl_vars['pay_methods']->value['id_module']);?>
" value="<?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['pay_methods']->value['id_module']);?>
<?php $_tmp10=ob_get_clean();?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['velocity_supercheckout_payment']->value['payment_method'][$_tmp10]['logo']['title'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" disabled/>
																				<div><img id="payment-img-<?php echo intval($_smarty_tpl->tpl_vars['pay_methods']->value['id_module']);?>
" src="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['module_dir']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
views/img/admin/uploads/<?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['pay_methods']->value['id_module']);?>
<?php $_tmp11=ob_get_clean();?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['velocity_supercheckout_payment']->value['payment_method'][$_tmp11]['logo']['title'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"   onerror="this.src='<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['module_dir']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
views/img/admin/no-image.jpg'" style="border: 1px solid #ccc; padding:2px; height: 115px;"/></div>
																				<?php }?>
																			<?php } else { ?>
																			<input type="hidden"  id="payment_image_title_<?php echo intval($_smarty_tpl->tpl_vars['pay_methods']->value['id_module']);?>
" value="" disabled/>
                    <div><img id="payment-img-<?php echo intval($_smarty_tpl->tpl_vars['pay_methods']->value['id_module']);?>
" src="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['module_dir']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
views/img/admin/no-image.jpg"   style="border: 1px solid #ccc; padding:2px; height: 115px;"/></div>
					<?php }?>
                    
																			
																		</div>
																			
																			
                <div style='padding-left: 10px;'>
                    <span style="display: inline-block;"> <input type="file" id="payment-img-<?php echo intval($_smarty_tpl->tpl_vars['pay_methods']->value['id_module']);?>
_file" onchange="readPaymentURL(<?php echo intval($_smarty_tpl->tpl_vars['pay_methods']->value['id_module']);?>
,'payment-img-<?php echo intval($_smarty_tpl->tpl_vars['pay_methods']->value['id_module']);?>
')" value="" disabled></span><span><input type='button' class="btn btn-primary"  value='<?php echo smartyTranslate(array('s'=>'Remove','mod'=>'supercheckout'),$_smarty_tpl);?>
' disabled/></span> <span id="payment-img-<?php echo intval($_smarty_tpl->tpl_vars['pay_methods']->value['id_module']);?>
_msg" style="margin-left:10px; display:none;"><?php echo smartyTranslate(array('s'=>'Only Images allowed','mod'=>'supercheckout'),$_smarty_tpl);?>
</span>
                </div>
																		</div>
				<div style="margin-top: 10px;display:flex;padding-left: 10px;">
					<span style="padding: 5px 10px 0px 0px;"><?php echo smartyTranslate(array('s'=>'Width','mod'=>'supercheckout'),$_smarty_tpl);?>
</span>
					<div class="input-group" style="width: 20%;"><input type="text"  class="form-control" value="<?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['pay_methods']->value['id_module']);?>
<?php $_tmp12=ob_get_clean();?><?php if (isset($_smarty_tpl->tpl_vars['velocity_supercheckout_payment']->value['payment_method'][$_tmp12]['logo']['resolution']['width'])) {?><?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['pay_methods']->value['id_module']);?>
<?php $_tmp13=ob_get_clean();?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['velocity_supercheckout_payment']->value['payment_method'][$_tmp13]['logo']['resolution']['width'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php } else { ?>auto<?php }?>" disabled/><span class="input-group-addon" style="width: 10px;"><?php echo smartyTranslate(array('s'=>'px','mod'=>'supercheckout'),$_smarty_tpl);?>
</span></div>
					<span style="padding: 5px 10px 0px 10px;"><?php echo smartyTranslate(array('s'=>'Height','mod'=>'supercheckout'),$_smarty_tpl);?>
</span>		<div class="input-group" style="width: 20%;"><input type="text" class="form-control"   value="<?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['pay_methods']->value['id_module']);?>
<?php $_tmp14=ob_get_clean();?><?php if (isset($_smarty_tpl->tpl_vars['velocity_supercheckout_payment']->value['payment_method'][$_tmp14]['logo']['resolution']['height'])) {?><?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['pay_methods']->value['id_module']);?>
<?php $_tmp15=ob_get_clean();?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['velocity_supercheckout_payment']->value['payment_method'][$_tmp15]['logo']['resolution']['height'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php } else { ?>auto<?php }?>" disabled/><span class="input-group-addon" style="width: 10px;"><?php echo smartyTranslate(array('s'=>'px','mod'=>'supercheckout'),$_smarty_tpl);?>
</span></div>
				</div><p class="help-block" style='padding-left: 10px;'> <?php echo smartyTranslate(array('s'=>'(To maintain aspect ratio of image, keep either both height and width value as auto or any of them value as auto)','mod'=>'supercheckout'),$_smarty_tpl);?>
</p>
																	</td>
																</tr>
																
																
																			</table>
																			</div>
																	<?php } ?>
																		</div>
																		
                                                        </div>
                                                    </div>

                                                    <!--------------- End - Payment Method -------------------->

                                                    <!--------------- Start - Shipping Method -------------------->

                                                    <div id="tab_shipping_method" class="tab-pane tab-form">
                                                        <div class="block">
                                                            <h4 class='velsof-tab-heading'><?php echo smartyTranslate(array('s'=>'Delivery Method','mod'=>'supercheckout'),$_smarty_tpl);?>
</h4>
                                                            <table class="form">
                                                                <tr class="free-disabled">
                                                                    <td class="name vertical_top_align"><span class="control-label"><?php echo smartyTranslate(array('s'=>'Display Methods','mod'=>'supercheckout'),$_smarty_tpl);?>
: </span>                                                                
                                                                        <i class="icon-question-sign supercheckout-tooltip-color" data-toggle="tooltip"  data-placement="top" data-original-title="<?php echo smartyTranslate(array('s'=>'Display Methods Tooltip','mod'=>'supercheckout'),$_smarty_tpl);?>
"></i>
                                                                    </td>
                                                                    <td class="settings">
                                                                        <input type="hidden" value="0" disabled/>
                                                                        <?php if ($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['shipping_method']['enable']==1) {?>
                                                                            <?php if ($_smarty_tpl->tpl_vars['IE7']->value==true) {?>
                                                                                <div>
                                                                                    <input class="checkbox" type="checkbox" value="1"  checked="checked" disabled/>
                                                                                </div>
                                                                            <?php } else { ?>
                                                                                <div class="make-switch" data-on="primary" data-off="default">
                                                                                    <input class="make-switch" type="checkbox" value="1"  checked="checked" disabled/>
                                                                                </div>
                                                                            <?php }?>                                                                    
                                                                        <?php } else { ?>
                                                                            <?php if ($_smarty_tpl->tpl_vars['IE7']->value==true) {?>
                                                                                <div>
                                                                                    <input class="checkbox" type="checkbox" value="1"  disabled/>
                                                                                </div>
                                                                            <?php } else { ?>
                                                                                <div class="make-switch" data-on="primary" data-off="default">
                                                                                    <input class="make-switch" type="checkbox" value="1" disabled/>
                                                                                </div>
                                                                            <?php }?>
                                                                        <?php }?>
                                                                    </td>
                                                                </tr>
                                                                <tr class="free-disabled">
                                                                    <td class="name vertical_top_align">
                                                                        <span><?php echo smartyTranslate(array('s'=>'Display Style','mod'=>'supercheckout'),$_smarty_tpl);?>
: </span><i class="icon-question-sign supercheckout-tooltip-color" data-toggle="tooltip"  data-placement="top" data-original-title="<?php echo smartyTranslate(array('s'=>'Method Display Style Tooltip','mod'=>'supercheckout'),$_smarty_tpl);?>
"></i>
                                                                    </td>
                                                                    <td class="left settings">
                                                                        <div class="widget-body uniformjs" style="padding: 0 !important;">
                                                                            <label class="radio coupon_type_radio">
                                                                                <input type="radio" class="radio coupon_type_radio"  value="0"  <?php if ($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['shipping_method']['display_style']==0) {?> checked="checked" <?php }?> disabled/><?php echo smartyTranslate(array('s'=>'Text Only','mod'=>'supercheckout'),$_smarty_tpl);?>
                                                                        
                                                                            </label>
                                                                            <label class="radio coupon_type_radio">
                                                                                <input type="radio" class="radio coupon_type_radio"  value="1" <?php if ($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['shipping_method']['display_style']==1) {?> checked="checked" <?php }?> disabled/><?php echo smartyTranslate(array('s'=>'Text With Image','mod'=>'supercheckout'),$_smarty_tpl);?>
                                                                        
                                                                            </label>
                                                                            <label class="radio coupon_type_radio">
                                                                                <input type="radio" class="radio coupon_type_radio"  value="2" <?php if ($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['shipping_method']['display_style']==2) {?> checked="checked" <?php }?> disabled/><?php echo smartyTranslate(array('s'=>'Image Only','mod'=>'supercheckout'),$_smarty_tpl);?>
                                                                        
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                                <tr class="free-disabled">
                                                                    <td class="name vertical_top_align"><span class="control-label"><?php echo smartyTranslate(array('s'=>'Selected Default Method','mod'=>'supercheckout'),$_smarty_tpl);?>
: </span>                                                                
                                                                        <i class="icon-question-sign supercheckout-tooltip-color" data-toggle="tooltip"  data-placement="top" data-original-title="<?php echo smartyTranslate(array('s'=>'Selected Default Shipping Method Tooltip','mod'=>'supercheckout'),$_smarty_tpl);?>
"></i>
                                                                    </td>
                                                                    <td class="settings">
                                                                        <div class='span4'>
                                                                            <select <?php if ($_smarty_tpl->tpl_vars['ps_version']->value==15) {?>class="selectpicker vss_sc_ver15"<?php }?> disabled>
                                                                                <?php  $_smarty_tpl->tpl_vars["carrier"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["carrier"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['carriers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["carrier"]->key => $_smarty_tpl->tpl_vars["carrier"]->value) {
$_smarty_tpl->tpl_vars["carrier"]->_loop = true;
?>
                                                                                    <?php if ($_smarty_tpl->tpl_vars['carrier']->value['id_carrier']==$_smarty_tpl->tpl_vars['velocity_supercheckout']->value['shipping_method']['default']) {?>
                                                                                        <option value="<?php echo intval($_smarty_tpl->tpl_vars['carrier']->value['id_carrier']);?>
" selected='selected'><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['carrier']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</option>
                                                                                    <?php } else { ?>
                                                                                        <option value="<?php echo intval($_smarty_tpl->tpl_vars['carrier']->value['id_carrier']);?>
"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['carrier']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</option>
                                                                                    <?php }?>
                                                                                <?php } ?>
                                                                            </select>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr class="free-disabled">
                                                                    <td colspan='2'><br>
                                                                        <p>
                                                                            <b><?php echo smartyTranslate(array('s'=>'Note','mod'=>'supercheckout'),$_smarty_tpl);?>
:</b>
                                                                            <?php echo smartyTranslate(array('s'=>'Delivery Method Style Note','mod'=>'supercheckout'),$_smarty_tpl);?>

                                                                        </p>
                                                                    </td>
                                                                </tr>

                                                            </table>  
																		<h4 class='velsof-tab-heading'><?php echo smartyTranslate(array('s'=>'Change logo and Title of Delivery Methods','mod'=>'supercheckout'),$_smarty_tpl);?>
</h4>
																		<div id="delivery-accordian" class="accordian_container">
																			<?php  $_smarty_tpl->tpl_vars["carrier"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["carrier"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['carriers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["carrier"]->key => $_smarty_tpl->tpl_vars["carrier"]->value) {
$_smarty_tpl->tpl_vars["carrier"]->_loop = true;
?>
																			<h3><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['carrier']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</h3>
																			<div class="accdiv-logo">
																			<table class="form">
                                                                <tr class="free-disabled">
                                                                    <td class="name vertical_top_align"><span><?php echo smartyTranslate(array('s'=>'Title','mod'=>'supercheckout'),$_smarty_tpl);?>
: </span>                                                                
                                                                        <i class="icon-question-sign supercheckout-tooltip-color" data-toggle="tooltip"  data-placement="top" data-original-title="<?php echo smartyTranslate(array('s'=>'Enter Delivery method title','mod'=>'supercheckout'),$_smarty_tpl);?>
"></i>
                                                                    </td>
																
																	<td class="settings">
																		<table class="lang-title">
																		<?php  $_smarty_tpl->tpl_vars['lang'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['lang']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['lang']->key => $_smarty_tpl->tpl_vars['lang']->value) {
$_smarty_tpl->tpl_vars['lang']->_loop = true;
?>
                                                                    
                                                                    <tr class="free-disabled">
                                                                        
                                                                        <td><div class="span6">
                                                                            <input type="text" class="text-width"  value="<?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['carrier']->value['id_carrier']);?>
<?php $_tmp16=ob_get_clean();?><?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['lang']->value['id_lang']);?>
<?php $_tmp17=ob_get_clean();?><?php if (isset($_smarty_tpl->tpl_vars['velocity_supercheckout_payment']->value['delivery_method'][$_tmp16]['title'][$_tmp17])) {?><?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['carrier']->value['id_carrier']);?>
<?php $_tmp18=ob_get_clean();?><?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['lang']->value['id_lang']);?>
<?php $_tmp19=ob_get_clean();?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['velocity_supercheckout_payment']->value['delivery_method'][$_tmp18]['title'][$_tmp19], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php } else { ?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['carrier']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php }?>" disabled/>                                                                                                                                                
                                                                            
                                                                        </div>
																		</td>
																		<td><div class='span0'><img src="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['img_lang_dir']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['lang']->value['id_lang'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
.jpg" alt="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['lang']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" title="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['lang']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"/></div></td>
                                                                    </tr>
                                                                    
                                                                    <?php } ?>
																		</table>
																	</td>
																</tr>
																<tr class="free-disabled">
																	<td class="name vertical_top_align"><span><?php echo smartyTranslate(array('s'=>'Logo Setting','mod'=>'supercheckout'),$_smarty_tpl);?>
: </span>                                                                
                                                                        <i class="icon-question-sign supercheckout-tooltip-color" data-toggle="tooltip"  data-placement="top" data-original-title="<?php echo smartyTranslate(array('s'=>'Set delivery method logo with dimensions','mod'=>'supercheckout'),$_smarty_tpl);?>
"></i>
                                                                    </td>
																	<td class="settings"><div>
																		<div class="logo-img" style='padding-left: 10px;padding-top:10px;margin-bottom:15px;'>
																			<?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['carrier']->value['id_carrier']);?>
<?php $_tmp20=ob_get_clean();?><?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['carrier']->value['id_carrier']);?>
<?php $_tmp21=ob_get_clean();?><?php if (isset($_smarty_tpl->tpl_vars['velocity_supercheckout_payment']->value['delivery_method'][$_tmp20]['logo']['title'])&&$_smarty_tpl->tpl_vars['velocity_supercheckout_payment']->value['delivery_method'][$_tmp21]['logo']['title']!='') {?>
																				<?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['carrier']->value['id_carrier']);?>
<?php $_tmp22=ob_get_clean();?><?php ob_start();?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['root_dir']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php $_tmp23=ob_get_clean();?><?php ob_start();?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['velocity_supercheckout_payment']->value['delivery_method'][$_tmp22]['logo']['title'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php $_tmp24=ob_get_clean();?><?php if (!file_exists($_tmp23."/modules/supercheckout/views/img/admin/uploads/".$_tmp24)) {?>
																					<input type="hidden" id="delivery_image_title_<?php echo intval($_smarty_tpl->tpl_vars['carrier']->value['id_carrier']);?>
" value="" disabled/>
                    <div><img id="delivery-img-<?php echo intval($_smarty_tpl->tpl_vars['carrier']->value['id_carrier']);?>
" src="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['module_dir']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
views/img/admin/no-image.jpg"   style="border: 1px solid #ccc; padding:2px; height: 115px;"/></div>
					<?php } else { ?>
																				<input type="hidden"  id="delivery_image_title_<?php echo intval($_smarty_tpl->tpl_vars['carrier']->value['id_carrier']);?>
" value="<?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['carrier']->value['id_carrier']);?>
<?php $_tmp25=ob_get_clean();?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['velocity_supercheckout_payment']->value['delivery_method'][$_tmp25]['logo']['title'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" disabled/>
																				<div>

																					<img id="delivery-img-<?php echo intval($_smarty_tpl->tpl_vars['carrier']->value['id_carrier']);?>
" src="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['module_dir']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
views/img/admin/uploads/<?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['carrier']->value['id_carrier']);?>
<?php $_tmp26=ob_get_clean();?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['velocity_supercheckout_payment']->value['delivery_method'][$_tmp26]['logo']['title'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"   onerror="this.src='<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['module_dir']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
views/img/admin/no-image.jpg';" style="border: 1px solid #ccc; padding:2px; height: 115px;"/>

																				</div>
																					<?php }?>
																			<?php } else { ?>
																			<input type="hidden"  id="delivery_image_title_<?php echo intval($_smarty_tpl->tpl_vars['carrier']->value['id_carrier']);?>
" value="" disabled/>
                    <div><img id="delivery-img-<?php echo intval($_smarty_tpl->tpl_vars['carrier']->value['id_carrier']);?>
" src="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['module_dir']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
views/img/admin/no-image.jpg"   style="border: 1px solid #ccc; padding:2px; height: 115px;"/></div>
					<?php }?>
                    
																			
																		</div>
																			
																			
                <div style='padding-left: 10px;'>
                    <span style="display: inline-block;"> <input type="file"  id="delivery-img-<?php echo intval($_smarty_tpl->tpl_vars['carrier']->value['id_carrier']);?>
_file" onchange="readDeliveryURL(<?php echo intval($_smarty_tpl->tpl_vars['carrier']->value['id_carrier']);?>
,'delivery-img-<?php echo intval($_smarty_tpl->tpl_vars['carrier']->value['id_carrier']);?>
')" value="" disabled></span><span><input type='button' class="btn btn-primary"  value='<?php echo smartyTranslate(array('s'=>'Remove','mod'=>'supercheckout'),$_smarty_tpl);?>
' disabled/></span> <span id="delivery-img-<?php echo intval($_smarty_tpl->tpl_vars['carrier']->value['id_carrier']);?>
_msg" style="margin-left:10px; display:none;"><?php echo smartyTranslate(array('s'=>'Only Images allowed','mod'=>'supercheckout'),$_smarty_tpl);?>
</span>
                </div>
																		</div>
				<div style="margin-top: 10px;display:flex;padding-left: 10px;">
					<span style="padding: 5px 10px 0px 0px;"><?php echo smartyTranslate(array('s'=>'Width','mod'=>'supercheckout'),$_smarty_tpl);?>
</span>
					<div class="input-group" style="width: 20%;">
						<input type="text"  class="form-control"  value="<?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['carrier']->value['id_carrier']);?>
<?php $_tmp27=ob_get_clean();?><?php if (isset($_smarty_tpl->tpl_vars['velocity_supercheckout_payment']->value['delivery_method'][$_tmp27]['logo']['resolution']['width'])) {?><?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['carrier']->value['id_carrier']);?>
<?php $_tmp28=ob_get_clean();?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['velocity_supercheckout_payment']->value['delivery_method'][$_tmp28]['logo']['resolution']['width'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php } else { ?>auto<?php }?>" disabled/><span class="input-group-addon" style="width: 10px;"><?php echo smartyTranslate(array('s'=>'px','mod'=>'supercheckout'),$_smarty_tpl);?>
</span></div>
		<span style="padding: 5px 10px 0px 10px;"><?php echo smartyTranslate(array('s'=>'Height','mod'=>'supercheckout'),$_smarty_tpl);?>
</span>		<div class="input-group" style="width: 20%;">		<input type="text" class="form-control"   value="<?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['carrier']->value['id_carrier']);?>
<?php $_tmp29=ob_get_clean();?><?php if (isset($_smarty_tpl->tpl_vars['velocity_supercheckout_payment']->value['delivery_method'][$_tmp29]['logo']['resolution']['height'])) {?><?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['carrier']->value['id_carrier']);?>
<?php $_tmp30=ob_get_clean();?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['velocity_supercheckout_payment']->value['delivery_method'][$_tmp30]['logo']['resolution']['height'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php } else { ?>auto<?php }?>" disabled/><span class="input-group-addon" style="width: 10px;"><?php echo smartyTranslate(array('s'=>'px','mod'=>'supercheckout'),$_smarty_tpl);?>
</span></div>
				</div><p class="help-block" style='padding-left: 10px;'> <?php echo smartyTranslate(array('s'=>'(To maintain aspect ratio of image, keep either both height and width value as auto or any of them value as auto)','mod'=>'supercheckout'),$_smarty_tpl);?>
</p>
																	</td>
																</tr>
																
																
																			</table>
																			</div>
																	<?php } ?>
																		</div>
                                                        </div>
                                                    </div>

                                                    <!--------------- End - Shipping Method -------------------->
						    
													<!--------------- Start - Ship to pay -------------------->

                                                    <div id="tab_ship_to_pay" class="tab-pane tab-form">
							    <div class="block free-disabled">
								    <h4 class='velsof-tab-heading'><?php echo smartyTranslate(array('s'=>'Ship2pay','mod'=>'supercheckout'),$_smarty_tpl);?>
</h4>
										    <div style="text-shadow:none;background: #f8fcfe !important;color: #31b0d5 !important;" class="alert alert-info">
											Hide payment methods for customers based upon their shipping method selection.<br>
											Click on respective payment method to disable it for desired shipping method, don't forget to click above on save button to save all settings.
										    </div>
								    <?php  $_smarty_tpl->tpl_vars["carrier"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["carrier"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['carriers']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["carrier"]->key => $_smarty_tpl->tpl_vars["carrier"]->value) {
$_smarty_tpl->tpl_vars["carrier"]->_loop = true;
?>

							<div style="margin-left: 5%;  margin-top:25px;width: 40%;  float: left;  border: 1px solid rgb(0, 0, 0);"> 

								    <div style="text-align: center;  font-size: 16px;  border-bottom: 1px solid;  padding: 5px;  background-color: aliceblue;">    
									<span><a style="float:left;" class="ship2pay-glyphicons glyphicons cargo"><i></i></a></span><span style="padding-left: 14px;"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['carrier']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</span>
								    </div>

								    <?php  $_smarty_tpl->tpl_vars["pay_methods"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["pay_methods"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['payment_methods']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["pay_methods"]->key => $_smarty_tpl->tpl_vars["pay_methods"]->value) {
$_smarty_tpl->tpl_vars["pay_methods"]->_loop = true;
?>								    
								
								    <?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['carrier']->value['id_carrier']);?>
<?php $_tmp31=ob_get_clean();?><?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['pay_methods']->value['id_module']);?>
<?php $_tmp32=ob_get_clean();?><?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['carrier']->value['id_carrier']);?>
<?php $_tmp33=ob_get_clean();?><?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['pay_methods']->value['id_module']);?>
<?php $_tmp34=ob_get_clean();?><?php if (isset($_smarty_tpl->tpl_vars['velocity_supercheckout']->value[$_tmp31][$_tmp32])&&$_smarty_tpl->tpl_vars['velocity_supercheckout']->value[$_tmp33][$_tmp34]==1) {?>
								    <div style="border: 1px solid #B13131;background-color: rgb(224, 69, 69)" class="ship2pay-div" >
								    <input style="display:none;" type="checkbox"  checked="checked" value="1" disabled>
								    <span class="tickcross-sign">&#10060;</span><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['pay_methods']->value['display_name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

								    </div>
								    <?php } else { ?>
								    <div style="border: 1px solid #257925;background-color: rgb(83, 199, 83);" class="ship2pay-div" >
								    <input style="display:none;" type="checkbox"  value="1" disabled> 
								    <span class="tickcross-sign">&#10004;</span><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['pay_methods']->value['display_name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

								    </div>
								    
								    <?php }?>
								    <?php } ?>
							</div>

								    <?php } ?>
							    </div>
                                                    </div>

                                                    <!--------------- End - Ship to pay -------------------->
						    

                                                    <!--------------- Start - Cart -------------------->

                                                    <div id="tab_cart" class="tab-pane tab-form">
                                                        <div class="block">
                                                            <h4 class='velsof-tab-heading'><?php echo smartyTranslate(array('s'=>'Cart','mod'=>'supercheckout'),$_smarty_tpl);?>
</h4>
                                                            <table class="form">
                                                                <tr class="free-disabled">
                                                                    <td class="name vertical_top_align"><span class="control-label"><?php echo smartyTranslate(array('s'=>'Display Cart','mod'=>'supercheckout'),$_smarty_tpl);?>
: </span>                                                                
                                                                        <i class="icon-question-sign supercheckout-tooltip-color" data-toggle="tooltip"  data-placement="top" data-original-title="<?php echo smartyTranslate(array('s'=>'Display Cart Tooltip','mod'=>'supercheckout'),$_smarty_tpl);?>
"></i>
                                                                    </td>
                                                                    <td class="settings">
                                                                        <input type="hidden" value="0" disabled/>
                                                                        <?php if ($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['display_cart']==1) {?>
                                                                            <?php if ($_smarty_tpl->tpl_vars['IE7']->value==true) {?>
                                                                                <div>
                                                                                    <input class="checkbox" type="checkbox" value="1" checked="checked" disabled/>
                                                                                </div>
                                                                            <?php } else { ?>
                                                                                <div class="make-switch" data-on="primary" data-off="default">
                                                                                    <input class="make-switch" type="checkbox" value="1"  checked="checked" disabled/>
                                                                                </div>
                                                                            <?php }?>                                                                    
                                                                        <?php } else { ?>
                                                                            <?php if ($_smarty_tpl->tpl_vars['IE7']->value==true) {?>
                                                                                <div>
                                                                                    <input class="checkbox" type="checkbox" value="1" disabled/>
                                                                                </div>
                                                                            <?php } else { ?>
                                                                                <div class="make-switch" data-on="primary" data-off="default">
                                                                                    <input class="make-switch" type="checkbox" value="1" disabled/>
                                                                                </div>
                                                                            <?php }?>
                                                                        <?php }?>
                                                                    </td>
                                                                </tr>

                                                            </table>

                                                            <table class="form alternate">
                                                                <thead>
                                                                    <tr class="free-disabled">
                                                                        <th></th>
                                                                        <th class="left drag-col-2 col-pad-left"><?php echo smartyTranslate(array('s'=>'Guest Customer','mod'=>'supercheckout'),$_smarty_tpl);?>
</th>
                                                                        <th class="left drag-col-2"><?php echo smartyTranslate(array('s'=>'Logged in Customer','mod'=>'supercheckout'),$_smarty_tpl);?>
</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="">
                                                                    <?php  $_smarty_tpl->tpl_vars['p_addr'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p_addr']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['velocity_supercheckout']->value['cart_options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p_addr']->key => $_smarty_tpl->tpl_vars['p_addr']->value) {
$_smarty_tpl->tpl_vars['p_addr']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['p_addr']->key;
?>
                                                                        <tr class="free-disabled">
                                                                            <input type="hidden" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['cart_options'][$_smarty_tpl->tpl_vars['k']->value]['id'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" disabled/>
                                                                            <input type="hidden" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['cart_options'][$_smarty_tpl->tpl_vars['k']->value]['title'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" disabled/>
                                                                            <td class="name"><span><?php echo smartyTranslate(array('s'=>$_smarty_tpl->tpl_vars['velocity_supercheckout']->value['cart_options'][$_smarty_tpl->tpl_vars['k']->value]['title'],'mod'=>'supercheckout'),$_smarty_tpl);?>
:<input class="sort" class="input-sm form-control col-md-12" type="text" value="<?php if (isset($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['cart_options'][$_smarty_tpl->tpl_vars['k']->value]['sort_order'])) {?><?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['cart_options'][$_smarty_tpl->tpl_vars['k']->value]['sort_order']);?>
<?php }?>"  disabled/></span></td>
                                                                            <td class="left drag-col-2 col-pad-left">
                                                                                <div class="widget-body uniformjs" style="padding: 0 !important;">
                                                                                    <label class="checkboxinline no-bold">
                                                                                        <input type="checkbox" class="checkbox input-checkbox-option"  value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['cart_options'][$_smarty_tpl->tpl_vars['k']->value]['guest']['display']);?>
" <?php if ($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['cart_options'][$_smarty_tpl->tpl_vars['k']->value]['guest']['display']==1) {?>checked="checked"<?php }?> disabled/><?php echo smartyTranslate(array('s'=>'Show','mod'=>'supercheckout'),$_smarty_tpl);?>
                                                                        
                                                                                    </label>
                                                                                </div>
                                                                            </td>
                                                                            <td class="left drag-col-2">
                                                                                <div class="widget-body uniformjs" style="padding: 0 !important;">
                                                                                    <label class="checkboxinline no-bold">
                                                                                        <input type="checkbox" class="checkbox input-checkbox-option"  value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['cart_options'][$_smarty_tpl->tpl_vars['k']->value]['logged']['display']);?>
" <?php if ($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['cart_options'][$_smarty_tpl->tpl_vars['k']->value]['logged']['display']==1) {?>checked="checked"<?php }?> disabled/><?php echo smartyTranslate(array('s'=>'Show','mod'=>'supercheckout'),$_smarty_tpl);?>
                                                                        
                                                                                    </label>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    <?php } ?>
                                                                    <tr<?php if ($_smarty_tpl->tpl_vars['ps_version']->value==15) {?> class="vss_scparent_ver15 free-disabled"<?php } else { ?>class="free-disabled"<?php }?>>
                                                                        <td class="name"><span><?php echo smartyTranslate(array('s'=>'Product Image Size','mod'=>'supercheckout'),$_smarty_tpl);?>
: </span><i class="icon-question-sign supercheckout-tooltip-color" data-toggle="tooltip"  data-placement="top" data-original-title="<?php echo smartyTranslate(array('s'=>'Product Image Size Tooltip','mod'=>'supercheckout'),$_smarty_tpl);?>
"></i></td>
                                                                        <td class="left drag-col-2 col-pad-left">
                                                                                <div class='span1'><input type='text' <?php if ($_smarty_tpl->tpl_vars['ps_version']->value==15) {?>class="form-control vss-form-control-ver15"<?php }?>  value='<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['cart_image_size']['width']);?>
' disabled/></div>
                                                                                <div class="span0<?php if ($_smarty_tpl->tpl_vars['ps_version']->value==15) {?> vss-resolution-ver15<?php }?>">X</div>
                                                                                <div class='span1'><input type='text' <?php if ($_smarty_tpl->tpl_vars['ps_version']->value==15) {?>class="form-control vss-form-control-ver15"<?php }?>  value='<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['cart_image_size']['height']);?>
' disabled/></div>
                                                                        </td>
                                                                        <td class="left drag-col-2">

                                                                        </td>
                                                                    </tr>
								    <tr<?php if ($_smarty_tpl->tpl_vars['ps_version']->value==15) {?> class="vss_scparent_ver15 free-disabled"<?php } else { ?>class="free-disabled"<?php }?>>
                                                                        <td class="name"><span><?php echo smartyTranslate(array('s'=>'Quantity update option','mod'=>'supercheckout'),$_smarty_tpl);?>
: </span><i class="icon-question-sign supercheckout-tooltip-color" data-toggle="tooltip"  data-placement="top" data-original-title="<?php echo smartyTranslate(array('s'=>'Product Quantity Update option at front end in cart summary.','mod'=>'supercheckout'),$_smarty_tpl);?>
"></i></td>
                                                                        <td class="left drag-col-2 col-pad-left">
                                                                                <div class="widget-body uniformjs" style="padding: 0 !important;">
                                                                            <label class="radio coupon_type_radio">
                                                                                <input type="radio" class="radio coupon_type_radio"  value="0"  <?php if ($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['qty_update_option']==0) {?> checked="checked" <?php }?> disabled/><?php echo smartyTranslate(array('s'=>'+/- Button','mod'=>'supercheckout'),$_smarty_tpl);?>
                                                                        
                                                                            </label>
                                                                            <label class="radio coupon_type_radio">
                                                                                <input type="radio" class="radio coupon_type_radio"  value="1" <?php if ($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['qty_update_option']==1) {?> checked="checked" <?php }?> disabled/><?php echo smartyTranslate(array('s'=>'Update Link','mod'=>'supercheckout'),$_smarty_tpl);?>
                                                                        
                                                                            </label>
                                                                        </div>
                                                                        </td>
                                                                        <td class="left drag-col-2">

                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <br><br>
                                                            <h4 class='velsof-tab-heading'><?php echo smartyTranslate(array('s'=>'Order Total','mod'=>'supercheckout'),$_smarty_tpl);?>
</h4>
                                                            <table class="form alternate">
                                                                <thead>
                                                                    <tr class="free-disabled">
                                                                        <th></th>
                                                                        <th class="left drag-col-2 col-pad-left"><?php echo smartyTranslate(array('s'=>'Guest Customer','mod'=>'supercheckout'),$_smarty_tpl);?>
</th>
                                                                        <th class="left drag-col-2"><?php echo smartyTranslate(array('s'=>'Logged in Customer','mod'=>'supercheckout'),$_smarty_tpl);?>
</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="">
                                                                        <tr class="free-disabled">
                                                                            <td class="name"><span><?php echo smartyTranslate(array('s'=>'Product(s) Sub-Total','mod'=>'supercheckout'),$_smarty_tpl);?>
: </span><i class="icon-question-sign supercheckout-tooltip-color" data-toggle="tooltip"  data-placement="top" data-original-title="<?php echo smartyTranslate(array('s'=>'Display Sub-Total Tooltip','mod'=>'supercheckout'),$_smarty_tpl);?>
"></i></td>
                                                                            <td class="left drag-col-2 col-pad-left">
                                                                                <div class="widget-body uniformjs" style="padding: 0 !important;">
                                                                                    <label class="checkboxinline no-bold">
                                                                                        <input type="checkbox" class="checkbox input-checkbox-option"  value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['order_total_option']['product_sub_total']['guest']['display']);?>
" <?php if ($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['order_total_option']['product_sub_total']['guest']['display']==1) {?>checked="checked"<?php }?> disabled/><?php echo smartyTranslate(array('s'=>'Show','mod'=>'supercheckout'),$_smarty_tpl);?>
                                                                        
                                                                                    </label>
                                                                                </div>
                                                                            </td>
                                                                            <td class="left drag-col-2">
                                                                                <div class="widget-body uniformjs" style="padding: 0 !important;">
                                                                                    <label class="checkboxinline no-bold">
                                                                                        <input type="checkbox" class="checkbox input-checkbox-option"  value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['order_total_option']['product_sub_total']['logged']['display']);?>
" <?php if ($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['order_total_option']['product_sub_total']['logged']['display']==1) {?>checked="checked"<?php }?> disabled/><?php echo smartyTranslate(array('s'=>'Show','mod'=>'supercheckout'),$_smarty_tpl);?>
                                                                        
                                                                                    </label>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr class="free-disabled">
                                                                            <td class="name"><span><?php echo smartyTranslate(array('s'=>'Voucher Input','mod'=>'supercheckout'),$_smarty_tpl);?>
: </span><i class="icon-question-sign supercheckout-tooltip-color" data-toggle="tooltip"  data-placement="top" data-original-title="<?php echo smartyTranslate(array('s'=>'Display Voucher Input Tooltip','mod'=>'supercheckout'),$_smarty_tpl);?>
"></i></td>
                                                                            <td class="left drag-col-2 col-pad-left">
                                                                                <div class="widget-body uniformjs" style="padding: 0 !important;">
                                                                                    <label class="checkboxinline no-bold">
                                                                                        <input type="checkbox" class="checkbox input-checkbox-option" value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['order_total_option']['voucher']['guest']['display']);?>
" <?php if ($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['order_total_option']['voucher']['guest']['display']==1) {?>checked="checked"<?php }?> disabled/><?php echo smartyTranslate(array('s'=>'Show','mod'=>'supercheckout'),$_smarty_tpl);?>
                                                                        
                                                                                    </label>
                                                                                </div>
                                                                            </td>
                                                                            <td class="left drag-col-2">
                                                                                <div class="widget-body uniformjs" style="padding: 0 !important;">
                                                                                    <label class="checkboxinline no-bold">
                                                                                        <input type="checkbox" class="checkbox input-checkbox-option"  value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['order_total_option']['voucher']['logged']['display']);?>
" <?php if ($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['order_total_option']['voucher']['logged']['display']==1) {?>checked="checked"<?php }?> disabled/><?php echo smartyTranslate(array('s'=>'Show','mod'=>'supercheckout'),$_smarty_tpl);?>
                                                                        
                                                                                    </label>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr class="free-disabled">
                                                                            <td class="name"><span><?php echo smartyTranslate(array('s'=>'Shipping Price','mod'=>'supercheckout'),$_smarty_tpl);?>
:</span></td>
                                                                            <td class="left drag-col-2 col-pad-left">
                                                                                <div class="widget-body uniformjs" style="padding: 0 !important;">
                                                                                    <label class="checkboxinline no-bold">
                                                                                        <input type="checkbox" class="checkbox input-checkbox-option"  value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['order_total_option']['shipping_price']['guest']['display']);?>
" <?php if ($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['order_total_option']['shipping_price']['guest']['display']==1) {?>checked="checked"<?php }?> disabled/><?php echo smartyTranslate(array('s'=>'Show','mod'=>'supercheckout'),$_smarty_tpl);?>
                                                                        
                                                                                    </label>
                                                                                </div>
                                                                            </td>
                                                                            <td class="left drag-col-2">
                                                                                <div class="widget-body uniformjs" style="padding: 0 !important;">
                                                                                    <label class="checkboxinline no-bold">
                                                                                        <input type="checkbox" class="checkbox input-checkbox-option"  value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['order_total_option']['shipping_price']['logged']['display']);?>
" <?php if ($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['order_total_option']['shipping_price']['logged']['display']==1) {?>checked="checked"<?php }?> disabled/><?php echo smartyTranslate(array('s'=>'Show','mod'=>'supercheckout'),$_smarty_tpl);?>
                                                                        
                                                                                    </label>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr class="free-disabled">
                                                                            <td class="name"><span><?php echo smartyTranslate(array('s'=>'Order Total','mod'=>'supercheckout'),$_smarty_tpl);?>
:</span></td>
                                                                            <td class="left drag-col-2 col-pad-left">
                                                                                <div class="widget-body uniformjs" style="padding: 0 !important;">
                                                                                    <label class="checkboxinline no-bold">
                                                                                        <input type="checkbox" class="checkbox input-checkbox-option"  value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['order_total_option']['total']['guest']['display']);?>
" <?php if ($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['order_total_option']['total']['guest']['display']==1) {?>checked="checked"<?php }?> disabled/><?php echo smartyTranslate(array('s'=>'Show','mod'=>'supercheckout'),$_smarty_tpl);?>
                                                                        
                                                                                    </label>
                                                                                </div>
                                                                            </td>
                                                                            <td class="left drag-col-2">
                                                                                <div class="widget-body uniformjs" style="padding: 0 !important;">
                                                                                    <label class="checkboxinline no-bold">
                                                                                        <input type="checkbox" class="checkbox input-checkbox-option" value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['order_total_option']['total']['logged']['display']);?>
" <?php if ($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['order_total_option']['total']['logged']['display']==1) {?>checked="checked"<?php }?> disabled/><?php echo smartyTranslate(array('s'=>'Show','mod'=>'supercheckout'),$_smarty_tpl);?>
                                                                        
                                                                                    </label>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                </tbody>
                                                            </table>
                                                            <br><br>
                                                            <h4 class='velsof-tab-heading'><?php echo smartyTranslate(array('s'=>'Confirm','mod'=>'supercheckout'),$_smarty_tpl);?>
</h4>
                                                            <table class="form alternate">
                                                                <thead>
                                                                    <tr class="free-disabled">
                                                                        <th></th>
                                                                        <th class="left drag-col-2 col-pad-left"><?php echo smartyTranslate(array('s'=>'Guest Customer','mod'=>'supercheckout'),$_smarty_tpl);?>
</th>
                                                                        <th class="left drag-col-2"><?php echo smartyTranslate(array('s'=>'Logged in Customer','mod'=>'supercheckout'),$_smarty_tpl);?>
</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="">
                                                                        <tr class="free-disabled">
                                                                            <td class="name"><span><?php echo smartyTranslate(array('s'=>'Term & Condition','mod'=>'supercheckout'),$_smarty_tpl);?>
: </span><i class="icon-question-sign supercheckout-tooltip-color" data-toggle="tooltip"  data-placement="top" data-original-title="<?php echo smartyTranslate(array('s'=>'Display Term & Condition Tooltip','mod'=>'supercheckout'),$_smarty_tpl);?>
"></i></td>
                                                                            <td class="left drag-col-2 col-pad-left">
                                                                                <div class="widget-body uniformjs" style="padding: 0 !important;">
                                                                                    <label class="checkboxinline no-bold">
                                                                                        <input type="checkbox" class="checkbox input-checkbox-option"  value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['confirm']['term_condition']['guest']['display']);?>
" <?php if ($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['confirm']['term_condition']['guest']['display']==1) {?>checked="checked"<?php }?> disabled/><?php echo smartyTranslate(array('s'=>'Show','mod'=>'supercheckout'),$_smarty_tpl);?>
                                                                        
                                                                                    </label>
                                                                                    <label class="checkboxinline no-bold">
                                                                                        <input type="checkbox" class="checkbox input-checkbox-option"  value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['confirm']['term_condition']['guest']['require']);?>
" <?php if ($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['confirm']['term_condition']['guest']['require']==1) {?>checked="checked"<?php }?> disabled/><?php echo smartyTranslate(array('s'=>'Require','mod'=>'supercheckout'),$_smarty_tpl);?>
                                                                        
                                                                                    </label>
                                                                                    <label class="checkboxinline no-bold">
                                                                                        <input type="checkbox" class="checkbox input-checkbox-option"  value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['confirm']['term_condition']['guest']['checked']);?>
" <?php if ($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['confirm']['term_condition']['guest']['checked']==1) {?>checked="checked"<?php }?> disabled/><?php echo smartyTranslate(array('s'=>'Show as Checked','mod'=>'supercheckout'),$_smarty_tpl);?>
                                                                        
                                                                                    </label>
                                                                                    <i class="store_disabled" data-toggle="tooltip"  data-placement="top" data-original-title="<?php echo smartyTranslate(array('s'=>'This option will not display, if disable from default prestashop settings','mod'=>'supercheckout'),$_smarty_tpl);?>
"><span class="store_disabled_msg"><?php echo smartyTranslate(array('s'=>'Warning','mod'=>'supercheckout'),$_smarty_tpl);?>
 !</span></i>
                                                                                </div>
                                                                            </td>
                                                                            <td class="left drag-col-2">
                                                                                <div class="widget-body uniformjs" style="padding: 0 !important;">
                                                                                    <label class="checkboxinline no-bold">
                                                                                        <input type="checkbox" class="checkbox input-checkbox-option"  value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['confirm']['term_condition']['logged']['display']);?>
" <?php if ($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['confirm']['term_condition']['logged']['display']==1) {?>checked="checked"<?php }?> disabled/><?php echo smartyTranslate(array('s'=>'Show','mod'=>'supercheckout'),$_smarty_tpl);?>
                                                                        
                                                                                    </label>
                                                                                    <label class="checkboxinline no-bold">
                                                                                        <input type="checkbox" class="checkbox input-checkbox-option"  value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['confirm']['term_condition']['logged']['require']);?>
" <?php if ($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['confirm']['term_condition']['logged']['require']==1) {?>checked="checked"<?php }?> disabled/><?php echo smartyTranslate(array('s'=>'Require','mod'=>'supercheckout'),$_smarty_tpl);?>
                                                                        
                                                                                    </label>
                                                                                    <label class="checkboxinline no-bold">
                                                                                        <input type="checkbox" class="checkbox input-checkbox-option"  value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['confirm']['term_condition']['logged']['checked']);?>
" <?php if ($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['confirm']['term_condition']['logged']['checked']==1) {?>checked="checked"<?php }?> disabled/><?php echo smartyTranslate(array('s'=>'Show as Checked','mod'=>'supercheckout'),$_smarty_tpl);?>
                                                                        
                                                                                    </label>
                                                                                    <i class="store_disabled" data-toggle="tooltip"  data-placement="top" data-original-title="<?php echo smartyTranslate(array('s'=>'This option will not display, if disable from default prestashop settings','mod'=>'supercheckout'),$_smarty_tpl);?>
"><span class="store_disabled_msg"><?php echo smartyTranslate(array('s'=>'Warning','mod'=>'supercheckout'),$_smarty_tpl);?>
 !</span></i>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr class="free-disabled">
                                                                            <td class="name"><span><?php echo smartyTranslate(array('s'=>'Comment Box for Order','mod'=>'supercheckout'),$_smarty_tpl);?>
:</span></td>
                                                                            <td class="left drag-col-2 col-pad-left">
                                                                                <div class="widget-body uniformjs" style="padding: 0 !important;">
                                                                                    <label class="checkboxinline no-bold">
                                                                                        <input type="checkbox" class="checkbox input-checkbox-option"  value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['confirm']['order_comment_box']['guest']['display']);?>
" <?php if ($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['confirm']['order_comment_box']['guest']['display']==1) {?>checked="checked"<?php }?> disabled/><?php echo smartyTranslate(array('s'=>'Show','mod'=>'supercheckout'),$_smarty_tpl);?>
                                                                        
                                                                                    </label>
                                                                                </div>
                                                                            </td>
                                                                            <td class="left drag-col-2">
                                                                                <div class="widget-body uniformjs" style="padding: 0 !important;">
                                                                                    <label class="checkboxinline no-bold">
                                                                                        <input type="checkbox" class="checkbox input-checkbox-option"  value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['confirm']['order_comment_box']['logged']['display']);?>
" <?php if ($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['confirm']['order_comment_box']['logged']['display']==1) {?>checked="checked"<?php }?> disabled/><?php echo smartyTranslate(array('s'=>'Show','mod'=>'supercheckout'),$_smarty_tpl);?>
                                                                        
                                                                                    </label>
                                                                                </div>
                                                                            </td>
                                                                        </tr>                                                                
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>

                                                    <!--------------- End - Cart -------------------->

                                                    <!--------------- Start - Design -------------------->

                                                    <div id="tab_design" class="tab-pane tab-form free-disabled">
                                                        <div class="block">
                                                            <h4 class='velsof-tab-heading'><?php echo smartyTranslate(array('s'=>'Design','mod'=>'supercheckout'),$_smarty_tpl);?>
</h4>                                                            
                                                                <div class="span3">
                                                                    <select <?php if ($_smarty_tpl->tpl_vars['ps_version']->value==15) {?>class="selectpicker vss_sc_ver15"<?php }?>  disabled>
                                                                        <?php if ($_smarty_tpl->tpl_vars['layout']->value==1) {?>
                                                                            <option value="1" selected="selected">1-<?php echo smartyTranslate(array('s'=>'Columns','mod'=>'supercheckout'),$_smarty_tpl);?>
</option>
                                                                        <?php } else { ?>
                                                                            <option value="1">1-<?php echo smartyTranslate(array('s'=>'Columns','mod'=>'supercheckout'),$_smarty_tpl);?>
</option>
                                                                        <?php }?>
                                                                        <?php if ($_smarty_tpl->tpl_vars['layout']->value==2) {?>
                                                                            <option value="2" selected="selected">2-<?php echo smartyTranslate(array('s'=>'Columns','mod'=>'supercheckout'),$_smarty_tpl);?>
</option>
                                                                        <?php } else { ?>
                                                                            <option value="2">2-<?php echo smartyTranslate(array('s'=>'Columns','mod'=>'supercheckout'),$_smarty_tpl);?>
</option>
                                                                        <?php }?>
                                                                        <?php if ($_smarty_tpl->tpl_vars['layout']->value==3) {?>
                                                                            <option value="3" selected="selected">3-<?php echo smartyTranslate(array('s'=>'Columns','mod'=>'supercheckout'),$_smarty_tpl);?>
</option>
                                                                        <?php } else { ?>
                                                                            <option value="3">3-<?php echo smartyTranslate(array('s'=>'Columns','mod'=>'supercheckout'),$_smarty_tpl);?>
</option>
                                                                        <?php }?>
                                                                    </select>
                                                                </div>
                                                            <table class="form">
                                                                <tbody>
                                                                    <tr>
                                                                        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['velocity_supercheckout']->value['design']['html']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                                                                            <input id="1_col_h_<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"  type="hidden"  class="sort col-data"  value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['design']['html'][$_smarty_tpl->tpl_vars['k']->value]['1_column']['column'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" disabled/>
                                                                            <input id="1_row_h_<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"  type="hidden"  class="sort row-data"  value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['design']['html'][$_smarty_tpl->tpl_vars['k']->value]['1_column']['row'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" disabled/>
                                                                            <input id="1_col_ins_h_<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"  type="hidden"  class="sort col-data-inside" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['design']['html'][$_smarty_tpl->tpl_vars['k']->value]['1_column']['column-inside'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" disabled/>

                                                                            <input id="2_col_h_<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"  type="hidden"  class="sort col-data"  value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['design']['html'][$_smarty_tpl->tpl_vars['k']->value]['2_column']['column'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" disabled/>
                                                                            <input id="2_row_h_<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"  type="hidden"  class="sort row-data"  value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['design']['html'][$_smarty_tpl->tpl_vars['k']->value]['2_column']['row'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" disabled/>
                                                                            <input id="2_col_ins_h_<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"  type="hidden"  class="sort col-data-inside" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['design']['html'][$_smarty_tpl->tpl_vars['k']->value]['2_column']['column-inside'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" disabled/>

                                                                            <input id="3_col_h_<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"  type="hidden"  class="sort col-data" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['design']['html'][$_smarty_tpl->tpl_vars['k']->value]['3_column']['column'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" disabled/>
                                                                            <input id="3_row_h_<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"  type="hidden"  class="sort row-data"  value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['design']['html'][$_smarty_tpl->tpl_vars['k']->value]['3_column']['row'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" disabled/>
                                                                            <input id="3_col_ins_h_<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"  type="hidden"  class="sort col-data-inside"  value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['design']['html'][$_smarty_tpl->tpl_vars['k']->value]['3_column']['column-inside'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" disabled/>
                                                                        <?php } ?>

                                                                        <!-- Start - Reserve previous values for all layouts -->
                                                                        <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['tab_name'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['velocity_supercheckout']->value['design']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['tab_name']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                                                                            <?php if ($_smarty_tpl->tpl_vars['tab_name']->value!='html') {?>
                                                                            <?php  $_smarty_tpl->tpl_vars['v1'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v1']->_loop = false;
 $_smarty_tpl->tpl_vars['col_name'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['velocity_supercheckout']->value['design'][$_smarty_tpl->tpl_vars['tab_name']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v1']->key => $_smarty_tpl->tpl_vars['v1']->value) {
$_smarty_tpl->tpl_vars['v1']->_loop = true;
 $_smarty_tpl->tpl_vars['col_name']->value = $_smarty_tpl->tpl_vars['v1']->key;
?>
                                                                                <input   type="hidden"  class="sort col-data" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['design'][$_smarty_tpl->tpl_vars['tab_name']->value][$_smarty_tpl->tpl_vars['col_name']->value]['column'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" disabled/>
                                                                                <input   type="hidden"  class="sort row-data" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['design'][$_smarty_tpl->tpl_vars['tab_name']->value][$_smarty_tpl->tpl_vars['col_name']->value]['row'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" disabled/>
                                                                                <input   type="hidden"  class="sort col-data-inside" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['design'][$_smarty_tpl->tpl_vars['tab_name']->value][$_smarty_tpl->tpl_vars['col_name']->value]['column-inside'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" disabled/>
                                                                            <?php } ?>
                                                                            <?php }?>
                                                                        <?php } ?>                                                                
                                                                        <!-- End - Reserve previous values for all layouts -->                                                                                                                                

                                                                        <!-- Start - Header and footer Html -->                                                                    
                                                                            <input type="hidden" id="modals_bootbox_prompt_html_header_value" value="<?php if ($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['html_value']['header']!='') {?><?php echo htmlspecialchars(html_entity_decode($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['html_value']['header']), ENT_QUOTES, 'UTF-8', true);?>
<?php }?>" disabled/>
                                                                            <input type="hidden" id="modals_bootbox_prompt_html_footer_value"  value="<?php if ($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['html_value']['footer']!='') {?><?php echo htmlspecialchars(html_entity_decode($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['html_value']['footer']), ENT_QUOTES, 'UTF-8', true);?>
<?php }?>" disabled/>
                                                                        <!-- End - Header and footer html -->

                                                                        <?php if ($_smarty_tpl->tpl_vars['layout']->value==3) {?>
                                                                           
                                                                            <td  colspan="2" style="position:static">
                                                                                <div class="portlet">
                                                                                    <div class="portlet-header"><?php echo smartyTranslate(array('s'=>'HTML Header Content','mod'=>'supercheckout'),$_smarty_tpl);?>
</div>
                                                                                    <div class="portlet-content">
                                                                                        <div class="text" style="overflow:visible !important;" >

                                                                                        <a data-toggle="tooltip"  data-placement="top" data-original-title="<?php echo smartyTranslate(array('s'=>'Edit this HTML content','mod'=>'supercheckout'),$_smarty_tpl);?>
" id="modals_bootbox_prompt_html_header" data-toggle="modal" class="glyphicons edit bootbox-design-edit-html" ><i></i></a>
                                                                                        </div>
                                                                                    </div>  
                                                                                </div>
                                                                                <div class="columns">
                                                                                    <input type="hidden"  class="column-data-1 col"  value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['column_width']['1_column'][1]);?>
" disabled/>
                                                                                    <input type="hidden"  class="column-data-2 col"  value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['column_width']['1_column'][2]);?>
" disabled/>
                                                                                    <input type="hidden"  class="column-data-2 col"  value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['column_width']['1_column'][3]);?>
" disabled/>
                                                                                    <input type="hidden"  class="column-data-3 col"  value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['column_width']['1_column']['inside'][1]);?>
" disabled/>
                                                                                    <input type="hidden"  class="column-data-3 col"  value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['column_width']['1_column']['inside'][2]);?>
" disabled/>

                                                                                    <input type="hidden"  class="column-data-1 col"  value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['column_width']['2_column'][1]);?>
" disabled/>
                                                                                    <input type="hidden"  class="column-data-2 col" value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['column_width']['2_column'][2]);?>
" disabled/>
                                                                                    <input type="hidden"  class="column-data-2 col"  value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['column_width']['2_column'][3]);?>
" disabled/>
                                                                                    <input type="hidden"  class="column-data-3 col"  value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['column_width']['2_column']['inside'][1]);?>
" disabled/>
                                                                                    <input type="hidden"  class="column-data-3 col" value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['column_width']['2_column']['inside'][2]);?>
" disabled/>

                                                                                    <input type="hidden"  class="column-data-3 col"  value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['column_width']['3_column']['inside'][1]);?>
" disabled/>
                                                                                    <input type="hidden"  class="column-data-3 col"  value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['column_width']['3_column']['inside'][2]);?>
" disabled/>
                                                                                    <input type="text" id="three-column-1" readonly="readonly" class="column-data-1 col"  value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['column_width']['3_column'][1]);?>
" disabled/>
                                                                                    <input type="text" id="three-column-2" readonly="readonly" class="column-data-2 col"  value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['column_width']['3_column'][2]);?>
" disabled/>
                                                                                    <input type="text" id="three-column-3" readonly="readonly" class="column-data-3 col"  value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['column_width']['3_column'][3]);?>
" disabled/>
                                                                                </div>
                                                                                <div id="slider" class="ui-editRangeSlider"></div>
                                                                                <ul id="column_1" class="column column-1 layout_list_height" col-data="1">
                                                                                    <li class="portlet" col-data="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['design']['payment_address']['3_column']['column']);?>
" row-data="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['design']['payment_address']['3_column']['row']);?>
">
                                                                                        <div class="portlet-header"><i class="icon-small-payment-address"></i><?php echo smartyTranslate(array('s'=>'Payment Address','mod'=>'supercheckout'),$_smarty_tpl);?>
</div>
                                                                                        <div class="portlet-content">
                                                                                            <div class="text"><?php echo smartyTranslate(array('s'=>'Payment Address Content','mod'=>'supercheckout'),$_smarty_tpl);?>
</div>
                                                                                            <div class="text"><i class="icon-drag"></i><i class="icon-drag"></i></div>
                                                                                            <input   type="text"  class="sort col-data"  value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['design']['payment_address']['3_column']['column']);?>
" disabled/>
                                                                                            <input   type="text"  class="sort row-data" value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['design']['payment_address']['3_column']['row']);?>
" disabled/>
                                                                                        </div>
                                                                                    </li>
                                                                                    <li class="portlet" col-data="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['design']['login']['3_column']['column']);?>
" row-data="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['design']['login']['3_column']['row']);?>
">
                                                                                        <div class="portlet-header"><i class="icon-small-payment-address"></i><?php echo smartyTranslate(array('s'=>'Login','mod'=>'supercheckout'),$_smarty_tpl);?>
</div>
                                                                                        <div class="portlet-content">
                                                                                            <div class="text"><?php echo smartyTranslate(array('s'=>'Login Content','mod'=>'supercheckout'),$_smarty_tpl);?>
</div>
                                                                                            <div class="text"><i class="icon-drag"></i><i class="icon-drag"></i></div>
                                                                                            <input   type="text"  class="sort col-data" value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['design']['login']['3_column']['column']);?>
" disabled/>
                                                                                            <input   type="text"  class="sort row-data"  value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['design']['login']['3_column']['row']);?>
" disabled/>
                                                                                        </div>
                                                                                    </li>
                                                                                    <li class="portlet" col-data="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['design']['shipping_address']['3_column']['column']);?>
" row-data="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['design']['shipping_address']['3_column']['row']);?>
">
                                                                                        <div class="portlet-header"><i class="icon-small-shipping-address"></i><?php echo smartyTranslate(array('s'=>'Shipping Address','mod'=>'supercheckout'),$_smarty_tpl);?>
</div>
                                                                                        <div class="portlet-content">
                                                                                            <div class="text"><?php echo smartyTranslate(array('s'=>'Shipping Address Content','mod'=>'supercheckout'),$_smarty_tpl);?>
</div>
                                                                                            <div class="text"><i class="icon-drag"></i><i class="icon-drag"></i></div>
                                                                                            <input   type="text"  class="sort col-data"  value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['design']['shipping_address']['3_column']['column']);?>
" disabled/>
                                                                                            <input   type="text"  class="sort row-data"  value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['design']['shipping_address']['3_column']['row']);?>
" disabled/>
                                                                                        </div>
                                                                                    </li>
                                                                                    <li class="portlet" col-data="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['design']['shipping_method']['3_column']['column']);?>
" row-data="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['design']['shipping_method']['3_column']['row']);?>
">
                                                                                        <div class="portlet-header"><i class="icon-small-shipping-method"></i><?php echo smartyTranslate(array('s'=>'Shipping Method','mod'=>'supercheckout'),$_smarty_tpl);?>
</div>
                                                                                        <div class="portlet-content">
                                                                                            <div class="text"><?php echo smartyTranslate(array('s'=>'Shipping Method Content','mod'=>'supercheckout'),$_smarty_tpl);?>
</div>
                                                                                            <div class="text"><i class="icon-drag"></i><i class="icon-drag"></i></div>
                                                                                            <input   type="text"  class="sort col-data"  value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['design']['shipping_method']['3_column']['column']);?>
" disabled/>
                                                                                            <input   type="text"  class="sort row-data"  value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['design']['shipping_method']['3_column']['row']);?>
" disabled/>
                                                                                        </div>
                                                                                    </li>
                                                                                    <li class="portlet" col-data="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['design']['payment_method']['3_column']['column']);?>
" row-data="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['design']['payment_method']['3_column']['row']);?>
">
                                                                                        <div class="portlet-header"><i class="icon-small-payment-method"></i><?php echo smartyTranslate(array('s'=>'Payment Method','mod'=>'supercheckout'),$_smarty_tpl);?>
</div>
                                                                                        <div class="portlet-content">
                                                                                            <div class="text"><?php echo smartyTranslate(array('s'=>'Payment Method Content','mod'=>'supercheckout'),$_smarty_tpl);?>
</div>
                                                                                            <div class="text"><i class="icon-drag"></i><i class="icon-drag"></i></div>
                                                                                            <input   type="text"  class="sort col-data"  value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['design']['payment_method']['3_column']['column']);?>
" disabled/>
                                                                                            <input   type="text"  class="sort row-data"  value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['design']['payment_method']['3_column']['row']);?>
" disabled/>
                                                                                        </div>
                                                                                    </li>
                                                                                    <li class="portlet" col-data="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['design']['cart']['3_column']['column']);?>
" row-data="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['design']['cart']['3_column']['row']);?>
">
                                                                                        <div class="portlet-header"><i class="icon-small-confirm"></i><?php echo smartyTranslate(array('s'=>'Cart','mod'=>'supercheckout'),$_smarty_tpl);?>
</div>
                                                                                        <div class="portlet-content">
                                                                                            <div class="text"><?php echo smartyTranslate(array('s'=>'Cart Content','mod'=>'supercheckout'),$_smarty_tpl);?>
</div>
                                                                                            <div class="text"><i class="icon-drag"></i><i class="icon-drag"></i></div>
                                                                                            <input   type="text"  class="sort col-data" value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['design']['cart']['3_column']['column']);?>
" disabled/>
                                                                                            <input   type="text"  class="sort row-data"  value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['design']['cart']['3_column']['row']);?>
" disabled/>
                                                                                        </div>
                                                                                    </li>
                                                                                    <li class="portlet" col-data="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['design']['confirm']['3_column']['column']);?>
" row-data="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['design']['confirm']['3_column']['row']);?>
">
                                                                                        <div class="portlet-header"><i class="icon-small-confirm"></i><?php echo smartyTranslate(array('s'=>'Confirm','mod'=>'supercheckout'),$_smarty_tpl);?>
</div>
                                                                                        <div class="portlet-content">
                                                                                            <div class="text"><?php echo smartyTranslate(array('s'=>'Confirm Content','mod'=>'supercheckout'),$_smarty_tpl);?>
</div>
                                                                                            <div class="text"><i class="icon-drag"></i><i class="icon-drag"></i></div>
                                                                                            <input   type="text"  class="sort col-data"  value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['design']['confirm']['3_column']['column']);?>
" disabled/>
                                                                                            <input   type="text"  class="sort row-data" value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['design']['confirm']['3_column']['row']);?>
" disabled/>
                                                                                        </div>
                                                                                    </li>


                                                                                  <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['velocity_supercheckout']->value['design']['html']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                                                                                    <li class="portlet" id="portlet_<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" col-data="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['design']['html'][$_smarty_tpl->tpl_vars['k']->value]['3_column']['column']);?>
" row-data="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['design']['html'][$_smarty_tpl->tpl_vars['k']->value]['3_column']['row']);?>
">
                                                                                        <div class="portlet-header"><?php echo smartyTranslate(array('s'=>'Extra html content','mod'=>'supercheckout'),$_smarty_tpl);?>
</div>
                                                                                        <div class="portlet-content" id="portlet_content_<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
">
                                                                                            <div class="text" style="overflow:visible !important;" >
                                                                                            <a data-toggle="tooltip"  data-placement="top" data-original-title="<?php echo smartyTranslate(array('s'=>'Add new HTML content','mod'=>'supercheckout'),$_smarty_tpl);?>
" id="duplicate_button_<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" data="0" class="glyphicons more_windows"  onClick="duplicate_html(this);" ><i></i></a>

                                                                                            <a data-toggle="tooltip"  data-placement="top" data-original-title="<?php echo smartyTranslate(array('s'=>'Edit this HTML content','mod'=>'supercheckout'),$_smarty_tpl);?>
" id="modals-bootbox-prompt-<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" data-toggle="modal" class="glyphicons edit bootbox-design-extra-html"  onClick="dialogExtraHtml(this);"><i></i></a>
                                                                                            <?php if ($_smarty_tpl->tpl_vars['k']->value!="0_0") {?>
                                                                                            <a data-toggle="tooltip"  data-placement="top" data-original-title="<?php echo smartyTranslate(array('s'=>'Remove this HTML content','mod'=>'supercheckout'),$_smarty_tpl);?>
" id="delete_button_<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" data="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" data-toggle="modal" class="glyphicons remove"  onClick="remove_html(this);" ><i></i></a>
                                                                                            <?php }?>
                                                                                            </div>

                                                                                            <input id="col_text_<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"   type="text"  class="sort col-data" value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['design']['html'][$_smarty_tpl->tpl_vars['k']->value]['3_column']['column']);?>
" disabled/>
                                                                                            <input id="row_text_<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"  type="text"  class="sort row-data"  value="<?php echo intval($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['design']['html'][$_smarty_tpl->tpl_vars['k']->value]['3_column']['row']);?>
" disabled/>
                                                                                        </div>
                                                                                    </li>                                                    
                                                                                    <?php } ?>
                                                                                </ul>
                                                                                <ul id="column_2" class="column column-2 layout_list_height" col-data="2"></ul>
                                                                                <ul id="column_3" class="column column-3 layout_list_height" col-data="3"></ul>
                                                                                <div class="portlet">
                                                                                    <div class="portlet-header"><?php echo smartyTranslate(array('s'=>'HTML Footer Content','mod'=>'supercheckout'),$_smarty_tpl);?>
</div>
                                                                                    <div class="portlet-content">
                                                                                        <div class="text" style="overflow:visible !important;" >

                                                                                        <a data-toggle="tooltip"  data-placement="top" data-original-title="<?php echo smartyTranslate(array('s'=>'Edit this HTML content','mod'=>'supercheckout'),$_smarty_tpl);?>
" id="modals_bootbox_prompt_html_footer" data-toggle="modal" class="glyphicons edit bootbox-design-edit-html" ><i></i></a>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                        <?php }?>

                                                                    </tr>
                                                                </tbody>
                                                            </table>    
                                                        </div>
                                                    </div>

                                                    <!--------------- End - Design -------------------->
                                                    <input type="hidden" id="modal_value"  value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['modal_value'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" disabled/>
                                                    <div id="extra_html_container">
                                                    <?php  $_smarty_tpl->tpl_vars['v'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['v']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['velocity_supercheckout']->value['design']['html']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['v']->key => $_smarty_tpl->tpl_vars['v']->value) {
$_smarty_tpl->tpl_vars['v']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['v']->key;
?>
                                                        <input type="hidden" id="modals_bootbox_prompt_<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"  value="<?php ob_start();?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['k']->value, ENT_QUOTES, 'utf-8', true), "HTML-ENTITIES", 'utf-8');?>
<?php $_tmp35=ob_get_clean();?><?php echo htmlspecialchars(html_entity_decode($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['design']['html'][$_tmp35]['value']), ENT_QUOTES, 'utf-8', true);?>
" disabled/>
                                                    <?php } ?>
                                                    </div>
</form>
                                                    <!--------------- Start - Language Translator -------------------->

                                                    <div id="tab_lang_translator" class="tab-pane outsideform lang-active">
                                                        <div class="block">
                                                            <h4 class='velsof-tab-heading'><?php echo smartyTranslate(array('s'=>'Language Translator','mod'=>'supercheckout'),$_smarty_tpl);?>
</h4>
                                                            <div class="row">
                                                                <div class="span0">
                                                                    <span><?php echo smartyTranslate(array('s'=>'Select Language','mod'=>'supercheckout'),$_smarty_tpl);?>
: </span><i class="icon-question-sign supercheckout-tooltip-color" data-toggle="tooltip" data-placement="top" data-original-title="<?php echo smartyTranslate(array('s'=>'Select Language Tooltip','mod'=>'supercheckout'),$_smarty_tpl);?>
"></i>
                                                                </div>
                                                                <div class="span2">
                                                                    <select <?php if ($_smarty_tpl->tpl_vars['ps_version']->value==15) {?>class="selectpicker vss_sc_ver15" <?php }?> name="velocity_transalator[selected_language]" onChange="setChangedLanguage('<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['action']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
', this);" >
                                                                        <?php  $_smarty_tpl->tpl_vars['lang'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['lang']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['lang']->key => $_smarty_tpl->tpl_vars['lang']->value) {
$_smarty_tpl->tpl_vars['lang']->_loop = true;
?>
                                                                            <?php if ((($_smarty_tpl->tpl_vars['lang']->value['id_lang']).('_')).($_smarty_tpl->tpl_vars['lang']->value['iso_code'])==(($_smarty_tpl->tpl_vars['default_selected_language']->value).('_')).($_smarty_tpl->tpl_vars['lang']->value['iso_code'])) {?>
                                                                                <option value="<?php echo (($_smarty_tpl->tpl_vars['lang']->value['id_lang']).('_')).($_smarty_tpl->tpl_vars['lang']->value['iso_code']);?>
" selected='selected'><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['lang']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</option>
                                                                            <?php } else { ?>
                                                                                <option value="<?php echo (($_smarty_tpl->tpl_vars['lang']->value['id_lang']).('_')).($_smarty_tpl->tpl_vars['lang']->value['iso_code']);?>
"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['lang']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</option>
                                                                            <?php }?>
                                                                        
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="span1">
                                                                    <a href="javascript:void(0)" <?php if ($_smarty_tpl->tpl_vars['ps_version']->value==15) {?>class="vss-action-btn-ver15"<?php }?> onclick="generate_language('<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['action']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
', 'save')"><span class="btn btn-block btn-success<?php if ($_smarty_tpl->tpl_vars['ps_version']->value==16) {?> action-btn<?php }?>"><?php echo smartyTranslate(array('s'=>'Save','mod'=>'supercheckout'),$_smarty_tpl);?>
</span></a>
                                                                </div>
                                                                <div class="span1">
                                                                    <a href="javascript:void(0)" <?php if ($_smarty_tpl->tpl_vars['ps_version']->value==15) {?>class="vss-action-btn-ver15"<?php }?> onclick="generate_language('<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['action']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
', 'download')"><span class="btn btn-block btn-warning<?php if ($_smarty_tpl->tpl_vars['ps_version']->value==16) {?> action-btn<?php }?>"><?php echo smartyTranslate(array('s'=>'Download','mod'=>'supercheckout'),$_smarty_tpl);?>
</span></a>
                                                                </div>
                                                                <div class="span2">
                                                                    <a href="javascript:void(0)" <?php if ($_smarty_tpl->tpl_vars['ps_version']->value==15) {?>class="vss-action-btn-ver15"<?php }?> onclick="generate_language('<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['action']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
', 'saveDownload')"><span class="btn btn-block btn-danger<?php if ($_smarty_tpl->tpl_vars['ps_version']->value==16) {?> action-btn<?php }?>"<?php if ($_smarty_tpl->tpl_vars['ps_version']->value==16) {?> style="max-width: 120px !important;"<?php }?>><?php echo smartyTranslate(array('s'=>'Save & Download','mod'=>'supercheckout'),$_smarty_tpl);?>
</span></a>
                                                                </div>
                                                            </div>
                                                            <hr style='margin-bottom:5px;'>
                                                            <div class="row">
                                                                <div class="span">
                                                                    <p style="margin-bottom: 0;">
                                                                        <b><?php echo smartyTranslate(array('s'=>'Note','mod'=>'supercheckout'),$_smarty_tpl);?>
:</b>
                                                                        (%s) - <?php echo smartyTranslate(array('s'=>'Do not remove %s symbol','mod'=>'supercheckout'),$_smarty_tpl);?>

                                                                    </p> 
                                                                </div>  
                                                            </div>
                                                            <hr style='margin-top:5px;'>
                                                            <div id="velsof-lang-trans-progress" class="widget"><img src="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['root_path']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
views/img/admin/ajax_loader.gif" /></div>
                                                            <div id="velsof-lang-trans-body" class="widget widget-tabs widget-tabs-double-2">
                                                                <div class="widget-head">
                                                                        <ul>
                                                                            <li class="active <?php if ($_smarty_tpl->tpl_vars['ps_version']->value==15) {?>vss-lang-tab-ver15<?php }?>"><a class="glyphicons asterisk lang-tab" href="#tab_lang_admin_panel" data-toggle="tab"><i></i><span><?php echo smartyTranslate(array('s'=>'Admin Labels','mod'=>'supercheckout'),$_smarty_tpl);?>
</span></a></li>
                                                                            <li class="<?php if ($_smarty_tpl->tpl_vars['ps_version']->value==15) {?>vss-lang-tab-ver15<?php }?>"><a class="glyphicons keys lang-tab" id="velsof_tab_login" href="#tab_lang_front_panel" data-toggle="tab"><i></i><span><?php echo smartyTranslate(array('s'=>'Front Labels','mod'=>'supercheckout'),$_smarty_tpl);?>
</span></a></li>
                                                                            <li class="<?php if ($_smarty_tpl->tpl_vars['ps_version']->value==15) {?>vss-lang-tab-ver15<?php }?>"><a class="glyphicons user_add lang-tab" href="#tab_lang_common" data-toggle="tab"><i></i><span><?php echo smartyTranslate(array('s'=>'Common Labels','mod'=>'supercheckout'),$_smarty_tpl);?>
</span></a></li>
                                                                            <li class="<?php if ($_smarty_tpl->tpl_vars['ps_version']->value==15) {?>vss-lang-tab-ver15<?php }?>"><a class="glyphicons credit_card lang-tab" href="#tab_lang_messages" data-toggle="tab"><i></i><span><?php echo smartyTranslate(array('s'=>'Messages','mod'=>'supercheckout'),$_smarty_tpl);?>
</span></a></li>
                                                                            <li class="<?php if ($_smarty_tpl->tpl_vars['ps_version']->value==15) {?>vss-lang-tab-ver15<?php }?>"><a class="glyphicons podium lang-tab" href="#tab_lang_misc" data-toggle="tab"><i></i><span><?php echo smartyTranslate(array('s'=>'Miscellaneous','mod'=>'supercheckout'),$_smarty_tpl);?>
</span></a></li>
                                                                        </ul>
                                                                </div>
                                                                <div class="widget-body" style="padding:0 !important;">
                                                                    <?php $_smarty_tpl->tpl_vars["label"] = new Smarty_variable("Label", null, 0);?>
                                                                    <div class="tab-content">
                                                                        <div id="tab_lang_admin_panel" class="active tab-pane widget-body-regular <?php if ($_smarty_tpl->tpl_vars['ps_version']->value==15) {?>vss-lang-tab-pane-ver15<?php }?>"> 
                                                                            <h4 class='velsof-tab-heading'><?php echo smartyTranslate(array('s'=>'General Settings','mod'=>'supercheckout'),$_smarty_tpl);?>
</h4>
                                                                            <table class="form alternate">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <th class="name vertical_top_align" style="text-align: right;"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_lang_translate']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</th>
                                                                                        <th class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_lang_from']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</th>
                                                                                        <th class="left" style="font-size:14px;"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_lang_to']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</th>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Enable/Disable <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_enable']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_enable][label][]" value="Enable/Disable" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_enable][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_enable']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Enable/Disable ToolTip <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_enable']['tooltip'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_enable][tooltip][]" value="Enable/Disable Tooltip" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_enable][tooltip][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_enable']['tooltip'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Enable Guest Checkout <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_enable_guest_checkout']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_enable_guest_checkout][label][]" value="Enable Guest Checkout" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_enable_guest_checkout][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_enable_guest_checkout']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Enable Guest Checkout Tooltip <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_enable_guest_checkout']['tooltip'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_enable_guest_checkout][tooltip][]" value="Enable Guest Checkout Tooltip" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_enable_guest_checkout][tooltip][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_enable_guest_checkout']['tooltip'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Enable Guest Checkout Warning <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_enable_guest_checkout_warning']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_enable_guest_checkout_warning][label][]" value="This option will not work, if it is disable from default prestashop settings." />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_enable_guest_checkout_warning][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_enable_guest_checkout_warning']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Register Guest <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_enable_guest_register']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_enable_guest_register][label][]" value="Register Guest" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_enable_guest_register][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_enable_guest_register']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Register Guest Tooltip <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_enable_guest_register']['tooltip'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_enable_guest_register][tooltip][]" value="Register Guest Tooltip" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_enable_guest_register][tooltip][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_enable_guest_register']['tooltip'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Default Option at Checkout <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_checkout_option']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_checkout_option][label][]" value="Default Option at Checkout" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_checkout_option][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_checkout_option']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Default Option at Checkout Tooltip <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_checkout_option']['tooltip'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_checkout_option][tooltip][]" value="Default Option at Checkout Tooltip" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_checkout_option][tooltip][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_checkout_option']['tooltip'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                            <br><br>
                                                                            <h4 class='velsof-tab-heading'><?php echo smartyTranslate(array('s'=>'Login','mod'=>'supercheckout'),$_smarty_tpl);?>
</h4>
                                                                            <table class="form alternate">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <th class="name vertical_top_align" style="text-align: right;"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_lang_translate']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</th>
                                                                                        <th class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_lang_from']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</th>
                                                                                        <th class="left" style="font-size:14px;"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_lang_to']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</th>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Enable Facebook Login <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_fb_enable']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_fb_enable][label][]" value="Enable Facebook Login" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_fb_enable][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_fb_enable']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Enable Facebook Login Tooltip <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_fb_enable']['tooltip'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_fb_enable][tooltip][]" value="Enable Facebook Login Tooltip" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_fb_enable][tooltip][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_fb_enable']['tooltip'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Facebook App Id Tooltip <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_fb_app_id']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_fb_app_id][label][]" value="Facebook App Id" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_fb_app_id][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_fb_app_id']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Facebook App Id <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_fb_app_id']['tooltip'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_fb_app_id][tooltip][]" value="Facebook App Id Tooltip" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_fb_app_id][tooltip][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_fb_app_id']['tooltip'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Facebook App Secret <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_fb_app_secret']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_fb_app_secret][label][]" value="Facebook App Secret" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_fb_app_secret][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_fb_app_secret']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Facebook App Secret Tooltip <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_fb_app_secret']['tooltip'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_fb_app_secret][tooltip][]" value="Facebook App Secret Tooltip" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_fb_app_secret][tooltip][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_fb_app_secret']['tooltip'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Enable Google Login <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_google_enable']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_google_enable][label][]" value="Enable Google Login" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_google_enable][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_google_enable']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Enable Google Login Tooltip <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_google_enable']['tooltip'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_google_enable][tooltip][]" value="Enable Google Login Tooltip" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_google_enable][tooltip][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_google_enable']['tooltip'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Google App Id <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_google_app_id']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_google_app_id][label][]" value="Google App Id" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_google_app_id][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_google_app_id']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Google App Id Tooltip <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_google_app_id']['tooltip'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_google_app_id][tooltip][]" value="Google App Id Tooltip" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_google_app_id][tooltip][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_google_app_id']['tooltip'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Google Client Id <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_google_client_id']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_google_client_id][label][]" value="Google Client Id" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_google_client_id][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_google_client_id']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Google Client Id Tooltip <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_google_client_id']['tooltip'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_google_client_id][tooltip][]" value="Google Client Id Tooltip" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_google_client_id][tooltip][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_google_client_id']['tooltip'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Google App Secret <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_google_app_secret']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_google_app_secret][label][]" value="Google App Secret" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_google_app_secret][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_google_app_secret']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Google App Secret Tooltip <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_google_app_secret']['tooltip'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_google_app_secret][tooltip][]" value="Google App Secret Tooltip" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_google_app_secret][tooltip][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_google_app_secret']['tooltip'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                            <h4 class='velsof-tab-heading'><?php echo smartyTranslate(array('s'=>'Methods','mod'=>'supercheckout'),$_smarty_tpl);?>
</h4>
                                                                            <table class="form alternate">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <th class="name vertical_top_align" style="text-align: right;"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_lang_translate']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</th>
                                                                                        <th class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_lang_from']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</th>
                                                                                        <th class="left" style="font-size:14px;"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_lang_to']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</th>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Display Methods <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_display_method']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_display_method][label][]" value="Display Methods" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_display_method][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_display_method']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Display Methods Tooltip <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_display_method']['tooltip'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_display_method][tooltip][]" value="Display Methods Tooltip" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_display_method][tooltip][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_display_method']['tooltip'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Display Style <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_display_method_style']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
Display Style</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_display_method_style][label][]" value="Display Style" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_display_method_style][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_display_method_style']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Method Display Style Tooltip <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_display_method_style']['tooltip'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_display_method_style][tooltip][]" value="Method Display Style Tooltip" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_display_method_style][tooltip][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_display_method_style']['tooltip'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Select Default Method <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_default_method']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_default_method][label][]" value="Select Default Method" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_default_method][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_default_method']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Select Default Payment Method Tooltip <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_default_pay_method']['tooltip'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_default_pay_method][tooltip][]" value="Selected Default Payment Method Tooltip" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_default_pay_method][tooltip][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_default_pay_method']['tooltip'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Payment Method Style Note <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_paymethod_style_note']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_paymethod_style_note][label][]" value="Payment Method Style Note" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_paymethod_style_note][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_paymethod_style_note']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Select Default Shipping Method Tooltip <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_default_ship_method']['tooltip'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_default_ship_method][tooltip][]" value="Selected Default Shipping Method Tooltip" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_default_ship_method][tooltip][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_default_ship_method']['tooltip'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Delivery Method Style Note <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_deliverymethod_style_note']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_deliverymethod_style_note][label][]" value="Delivery Method Style Note" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_deliverymethod_style_note][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_deliverymethod_style_note']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                            <br><br>
                                                                            <h4 class='velsof-tab-heading'><?php echo smartyTranslate(array('s'=>'Cart','mod'=>'supercheckout'),$_smarty_tpl);?>
</h4>
                                                                            <table class="form alternate">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <th class="name vertical_top_align" style="text-align: right;"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_lang_translate']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</th>
                                                                                        <th class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_lang_from']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</th>
                                                                                        <th class="left" style="font-size:14px;"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_lang_to']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</th>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Display Cart <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_cart_display']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_cart_display][label][]" value="Display Cart" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_cart_display][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_cart_display']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Display Cart Tooltip <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_cart_display']['tooltip'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_cart_display][tooltip][]" value="Display Cart Tooltip" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_cart_display][tooltip][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_cart_display']['tooltip'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Image <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_cart_image']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_cart_image][label][]" value="Image" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_cart_image][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_cart_image']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Quantity <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_cart_quantity']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_cart_quantity][label][]" value="Quantity" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_cart_quantity][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_cart_quantity']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Product Image Size <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_cart_p_image_size']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_cart_p_image_size][label][]" value="Product Image Size" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_cart_p_image_size][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_cart_p_image_size']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Product Image Size Tooltip <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_cart_p_image_size']['tooltip'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_cart_p_image_size][tooltip][]" value="Product Image Size Tooltip" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_cart_p_image_size][tooltip][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_cart_p_image_size']['tooltip'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Product(s) Sub-Total <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_cart_sub_total']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_cart_sub_total][label][]" value="Product(s) Sub-Total" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_cart_sub_total][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_cart_sub_total']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Product(s) Sub-Total Tooltip <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_cart_sub_total']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_cart_sub_total][tooltip][]" value="Display Sub-Total Tooltip" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_cart_sub_total][tooltip][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_cart_sub_total']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />                                                                                            
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Voucher Input <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_cart_voucher_input']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_cart_voucher_input][label][]" value="Voucher Input" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_cart_voucher_input][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_cart_voucher_input']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />                                                                                            
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Voucher Input Tooltip <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_cart_voucher_input']['tooltip'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_cart_voucher_input][tooltip][]" value="Display Voucher Input Tooltip" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_cart_voucher_input][tooltip][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_cart_voucher_input']['tooltip'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Shipping Price <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_cart_shipping_price']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_cart_shipping_price][label][]" value="Shipping Price" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_cart_shipping_price][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_cart_shipping_price']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Order Total <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_cart_order_total']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_cart_order_total][label][]" value="Order Total" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_cart_order_total][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_cart_order_total']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                            <br><br>
                                                                            <h4 class='velsof-tab-heading'><?php echo smartyTranslate(array('s'=>'Confirm','mod'=>'supercheckout'),$_smarty_tpl);?>
</h4>
                                                                            <table class="form alternate">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <th class="name vertical_top_align" style="text-align: right;"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_lang_translate']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</th>
                                                                                        <th class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_lang_from']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</th>
                                                                                        <th class="left" style="font-size:14px;"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_lang_to']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</th>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Term & Condition <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_confirm_term_condition']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_confirm_term_condition][label][]" value="Term & Condition" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_confirm_term_condition][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_confirm_term_condition']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Term & Condition Tooltip <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_confirm_term_condition']['tooltip'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_confirm_term_condition][tooltip][]" value="Display Term & Condition Tooltip" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_confirm_term_condition][tooltip][]" value='<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_confirm_term_condition']['tooltip'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
' />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Term & Condition Warning <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_confirm_tc_warning']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_confirm_tc_warning][label][]" value="This option will not display, if disable from default prestashop settings" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_confirm_tc_warning][label][]" value='<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_confirm_tc_warning']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
' />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Comment Box for Order <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_confirm_comment_box']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_confirm_comment_box][label][]" value="Comment Box for Order" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_confirm_comment_box][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_confirm_comment_box']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>                                                                                    
                                                                                </tbody>
                                                                            </table>
                                                                            <br><br>
                                                                            <h4 class='velsof-tab-heading'><?php echo smartyTranslate(array('s'=>'Language Translator','mod'=>'supercheckout'),$_smarty_tpl);?>
</h4>
                                                                            <table class="form alternate">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <th class="name vertical_top_align" style="text-align: right;"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_lang_translate']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</th>
                                                                                        <th class="velsof-english">From</th>
                                                                                        <th class="left" style="font-size:14px;">To</th>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Select Language <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_lang_sel_lbl']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_lang_sel_lbl][label][]" value="Select Language" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_lang_sel_lbl][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_lang_sel_lbl']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Select Language Tooltip <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_lang_sel_lbl']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_lang_sel_lbl][tooltip][]" value="Select Language Tooltip" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_lang_sel_lbl][tooltip][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_lang_sel_lbl']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Admin Panel and Front End <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_lang_admin_front_heading']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_lang_admin_front_heading][label][]" value="Admin Panel and Front End" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_lang_admin_front_heading][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_lang_admin_front_heading']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Admin Panel <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_lang_admin_panel_heading']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_lang_admin_panel_heading][label][]" value="Admin Panel" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_lang_admin_panel_heading][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_lang_admin_panel_heading']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Translate <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_lang_translate']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_lang_translate][label][]" value="Translate" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_lang_translate][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_lang_translate']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>From <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_lang_from']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_lang_from][label][]" value="From" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_lang_from][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_lang_from']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>To <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_lang_to']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_lang_to][label][]" value="To" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_lang_to][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_lang_to']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>                                                                                    
                                                                                </tbody>
                                                                            </table>
                                                                            <br><br>
                                                                            <h4 class='velsof-tab-heading'><?php echo smartyTranslate(array('s'=>'Design','mod'=>'supercheckout'),$_smarty_tpl);?>
</h4>
                                                                            <table class="form alternate">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <th class="name vertical_top_align" style="text-align: right;"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_lang_translate']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</th>
                                                                                        <th class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_lang_from']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</th>
                                                                                        <th class="left" style="font-size:14px;"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_lang_to']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</th>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Columns <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_design_column']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_design_column][label][]" value="Display Methods" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_design_column][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_design_column']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Login Content <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_design_login_content']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_design_login_content][label][]" value="Login Content" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_design_login_content][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_design_login_content']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Payment Address Content <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_design_p_addr_content']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_design_p_addr_content][label][]" value="Payment Address Content" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_design_p_addr_content][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_design_p_addr_content']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Shipping Address Content <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_design_ship_addr_content']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_design_ship_addr_content][label][]" value="Shipping Address Content" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_design_ship_addr_content][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_design_ship_addr_content']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Payment Method Content <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_design_p_method_content']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_design_p_method_content][label][]" value="Payment Method Content" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_design_p_method_content][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_design_p_method_content']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Shipping Method Content <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_design_ship_method_content']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_design_ship_method_content][label][]" value="Shipping Method Content" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_design_ship_method_content][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_design_ship_method_content']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Cart Content <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_design_cart_content']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_design_cart_content][label][]" value="Cart Content" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_design_cart_content][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_design_cart_content']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Confirm Content <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_design_confirm_content']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_design_confirm_content][label][]" value="Confirm Content" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_design_confirm_content][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_design_confirm_content']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>HTML Header Content <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_design_html_header']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_design_html_header][label][]" value="HTML Header Content" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_design_html_header][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_design_html_header']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />                                                                                            
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>HTML Footer Content <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_design_html_footer']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_design_html_footer][label][]" value="HTML Footer Content" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_design_html_footer][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_design_html_footer']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />                                                                                            
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Edit Your HTML Content Here <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_design_modal_heading']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_design_modal_heading][label][]" value="Edit Your HTML Content Here" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_design_modal_heading][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_design_modal_heading']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />                                                                                            
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Html Content <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_design_html_content']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_design_html_content][label][]" value="Html Content" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_design_html_content][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_design_html_content']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />                                                                                            
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Add new HTML content <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_design_html_new_content']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_design_html_new_content][label][]" value="Add new HTML content" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_design_html_new_content][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_design_html_new_content']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />                                                                                            
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Edit this HTML content <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_design_html_edit_content']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_design_html_edit_content][label][]" value="Edit this HTML content" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_design_html_edit_content][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_design_html_edit_content']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Remove this HTML content <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_design_html_rem_content']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_design_html_rem_content][label][]" value="Remove this HTML content" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_design_html_rem_content][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_design_html_rem_content']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />                                                                                            
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                            <br><br>
                                                                            <h4 class='velsof-tab-heading'><?php echo smartyTranslate(array('s'=>'Themer','mod'=>'supercheckout'),$_smarty_tpl);?>
</h4>
                                                                            <table class="form alternate">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <th class="name vertical_top_align" style="text-align: right;"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_lang_translate']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</th>
                                                                                        <th class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_lang_from']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</th>
                                                                                        <th class="left" style="font-size:14px;"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_lang_to']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</th>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Themer <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_themer_title']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_themer_title][label][]" value="Themer" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_themer_title][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_themer_title']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Theme <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_themer_title1']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_themer_title1][label][]" value="Theme" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_themer_title1][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_themer_title1']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Get LESS <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_themer_less']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_themer_less][label][]" value="Get LESS" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_themer_less][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_themer_less']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Get CSS <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_themer_css']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_themer_css][label][]" value="Get CSS" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_themer_css][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_themer_css']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />                                                                                            
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>close <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_themer_close']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[admin_themer_close][label][]" value="close" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[admin_themer_close][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['admin_themer_close']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />                                                                                            
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>                                                                                                                                                                
                                                                        
                                                                        <div id="tab_lang_front_panel" class="tab-pane widget-body-regular <?php if ($_smarty_tpl->tpl_vars['ps_version']->value==15) {?>vss-lang-tab-pane-ver15<?php }?>">
                                                                            <table class="form alternate">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <th class="name vertical_top_align" style="text-align: right;"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_lang_translate']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</th>
                                                                                        <th class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_lang_from']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</th>
                                                                                        <th class="left" style="font-size:14px;"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_lang_to']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</th>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Login heading <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['front_loginoption_heading']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[front_loginoption_heading][label][]" value="Login Options" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[front_loginoption_heading][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['front_loginoption_heading']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />                                                                                            
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Email <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['front_email_heading']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[front_email_heading][label][]" value="Email" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[front_email_heading][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['front_email_heading']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />                                                                                            
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Password <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['front_password_heading']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[front_password_heading][label][]" value="Password" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[front_password_heading][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['front_password_heading']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />                                                                                            
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Registered Users <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['front_register_user_heading']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[front_register_user_heading][label][]" value="Registered Users" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[front_register_user_heading][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['front_register_user_heading']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />                                                                                            
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Guest Users <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['front_guest_user_heading']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[front_guest_user_heading][label][]" value="Guest Users" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[front_guest_user_heading][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['front_guest_user_heading']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />                                                                                            
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Social Login <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['front_social_login_heading']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[front_social_login_heading][label][]" value="Social Login" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[front_social_login_heading][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['front_social_login_heading']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />                                                                                            
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Sign in with <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['front_signinwith_heading']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[front_signinwith_heading][label][]" value="Sign in with" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[front_signinwith_heading][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['front_signinwith_heading']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />                                                                                            
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Login into shop <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['front_widlogin_checkout_heading']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[front_widlogin_checkout_heading][label][]" value="Login into shop" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[front_widlogin_checkout_heading][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['front_widlogin_checkout_heading']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Guest Checkout <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['front_guest_checkout_heading']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[front_guest_checkout_heading][label][]" value="Guest Checkout" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[front_guest_checkout_heading][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['front_guest_checkout_heading']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>New Account <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['front_newaccount_heading']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[front_newaccount_heading][label][]" value="Create an account for later use" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[front_newaccount_heading][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['front_newaccount_heading']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />                                                                                            
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>OR <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['front_OR_heading']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[front_OR_heading][label][]" value="OR" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[front_OR_heading][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['front_OR_heading']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />                                                                                            
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Welcome <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['front_welcome_heading']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[front_welcome_heading][label][]" value="Welcome" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[front_welcome_heading][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['front_welcome_heading']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />                                                                                            
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>My Account <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['front_myaccount_heading']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[front_myaccount_heading][label][]" value="My Account" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[front_myaccount_heading][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['front_myaccount_heading']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />                                                                                            
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Logout <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['front_logout_heading']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[front_logout_heading][label][]" value="Logout" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[front_logout_heading][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['front_logout_heading']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />                                                                                            
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Forgot Password <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['front_forgot_password']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[front_forgot_password][label][]" value="Forgot Password" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[front_forgot_password][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['front_forgot_password']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />                                                                                            
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Confirm Your Order <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['front_confirmorder_heading']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[front_confirmorder_heading][label][]" value="Confirm Your Order" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[front_confirmorder_heading][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['front_confirmorder_heading']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />                                                                                            
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Same invoice address <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['front_same_invoice']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[front_same_invoice][label][]" value="Same invoice address" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[front_same_invoice][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['front_same_invoice']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />                                                                                            
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Male Title <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['front_male_heading']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[front_male_heading][label][]" value="Mr." />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[front_male_heading][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['front_male_heading']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />                                                                                            
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Female Title<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['front_female_heading']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[front_female_heading][label][]" value="Miss." />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[front_female_heading][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['front_female_heading']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />                                                                                            
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Qty <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['front_qty_heading']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[front_qty_heading][label][]" value="Qty" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[front_qty_heading][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['front_qty_heading']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />                                                                                            
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Apply <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['front_apply_heading']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[front_apply_heading][label][]" value="Apply" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[front_apply_heading][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['front_apply_heading']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />                                                                                            
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Recycle Text <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['misc_front_recycle']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[misc_front_recycle][label][]" value="I would like to receive my order in recycled packaging." />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[misc_front_recycle][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['misc_front_recycle']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[misc_front_recycle][label][]" value="order-shipping-extra" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Gift Text <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['misc_front_gift_heading']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[misc_front_gift_heading][label][]" value="I would like my order to be gift wrapped." />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[misc_front_gift_heading][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['misc_front_gift_heading']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[misc_front_gift_heading][label][]" value="order-shipping-extra" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Gift Additional Cost <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['misc_front_gift_addcost']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[misc_front_gift_addcost][label][]" value="Additional cost of" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[misc_front_gift_addcost][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['misc_front_gift_addcost']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[misc_front_gift_addcost][label][]" value="order-shipping-extra" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Gift Comment Text <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['misc_front_gift_comment']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[misc_front_gift_comment][label][]" value="If you would like, you can add a note to the gift" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[misc_front_gift_comment][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['misc_front_gift_comment']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[misc_front_gift_comment][label][]" value="order-shipping-extra" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Update Text <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['misc_front_update']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[misc_front_update][label][]" value="Update" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[misc_front_update][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['misc_front_update']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />                                                                                            
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Gift <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['misc_front_gift']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[misc_front_gift][label][]" value="Gift" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[misc_front_gift][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['misc_front_gift']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />                                                                                            
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Total products <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['misc_front_total_products']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[misc_front_total_products][label][]" value="Total products" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[misc_front_total_products][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['misc_front_total_products']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />                                                                                            
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Gift Wrapping Cost <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['misc_front_gift_wrappingcost']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[misc_front_gift_wrappingcost][label][]" value="Total gift wrapping cost" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[misc_front_gift_wrappingcost][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['misc_front_gift_wrappingcost']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />                                                                                            
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Shipping <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['misc_front_shipping']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[misc_front_shipping][label][]" value="Shipping" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[misc_front_shipping][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['misc_front_shipping']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />                                                                                            
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Free Shipping <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['misc_front_free_shipping']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[misc_front_free_shipping][label][]" value="Free Shipping" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[misc_front_free_shipping][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['misc_front_free_shipping']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />                                                                                            
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Total Shipping <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['misc_front_total_shipping']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[misc_front_total_shipping][label][]" value="Total Shipping" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[misc_front_total_shipping][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['misc_front_total_shipping']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />                                                                                            
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Total <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['misc_front_total']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[misc_front_total][label][]" value="Total" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[misc_front_total][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['misc_front_total']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />                                                                                            
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Total Tax <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['misc_front_total_tax']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[misc_front_total_tax][label][]" value="Total Tax" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[misc_front_total_tax][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['misc_front_total_tax']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />                                                                                            
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Total Vouchers <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['misc_front_total_vouchers']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[misc_front_total_vouchers][label][]" value="Total Vouchers" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[misc_front_total_vouchers][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['misc_front_total_vouchers']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />                                                                                            
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Vouchers Input <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['misc_front_voucher_input']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[misc_front_voucher_input][label][]" value="Voucher" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[misc_front_voucher_input][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['misc_front_voucher_input']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />                                                                                            
                                                                                        </td>
                                                                                    </tr>                                                                                    
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Tax incl. <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['misc_front_tax_incl']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[misc_front_tax_incl][label][]" value="(Tax incl.)" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[misc_front_tax_incl][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['misc_front_tax_incl']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[misc_front_tax_incl][label][]" value="order-shipping|order-shipping-extra" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Tax excl. <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['misc_front_tax_excl']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[misc_front_tax_excl][label][]" value="(Tax excl.)" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[misc_front_tax_excl][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['misc_front_tax_excl']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[misc_front_tax_excl][label][]" value="order-shipping|order-shipping-extra" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Free <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['misc_front_free']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[misc_front_free][label][]" value="Free" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[misc_front_free][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['misc_front_free']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[misc_front_free][label][]" value="order-shipping" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Comment Box <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['front_comment_heading']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[front_comment_heading][label][]" value="Add Comments About Your Order" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[front_comment_heading][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['front_comment_heading']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />                                                                                            
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Agree T & C <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['front_agree_heading']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[front_agree_heading][label][]" value="I agree to the terms of service and will adhere to them unconditionally. " />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[front_agree_heading][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['front_agree_heading']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[front_agree_heading][label][]" value="order-shipping-extra" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Read T & C <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['front_readtc_heading']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[front_readtc_heading][label][]" value="Read the term of services" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[front_readtc_heading][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['front_readtc_heading']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[front_readtc_heading][label][]" value="order-shipping-extra" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Confirm Order Button <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['front_confirmbtn_heading']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[front_confirmbtn_heading][label][]" value="Place Order" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[front_confirmbtn_heading][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['front_confirmbtn_heading']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />                                                                                            
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Breadcrumb <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['front_breadcrumb_label']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[front_breadcrumb_label][label][]" value="Your shopping cart" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[front_breadcrumb_label][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['front_breadcrumb_label']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />                                                                                            
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Use Existing Address <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['front_useexistaddr_label']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[front_useexistaddr_label][label][]" value="Use Existing Address" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[front_useexistaddr_label][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['front_useexistaddr_label']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />                                                                                            
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Use New Address <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['front_usenewaddr_label']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[front_usenewaddr_label][label][]" value="Use New Address" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[front_usenewaddr_label][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['front_usenewaddr_label']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />                                                                                            
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Payment Information <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['front_payinfo_label']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[front_payinfo_label][label][]" value="Payment Information" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[front_payinfo_label][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['front_payinfo_label']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />                                                                                            
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Back <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['front_back_label']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[front_back_label][label][]" value="Back" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[front_back_label][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['front_back_label']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />                                                                                            
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Proceed <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['front_proceed_label']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[front_proceed_label][label][]" value="Proceed" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[front_proceed_label][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['front_proceed_label']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />                                                                                            
                                                                                        </td>
                                                                                    </tr>
										    <tr>
                                                                                        <td class="name vertical_top_align"><span>January <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['month_january']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[month_january][label][]" value="January" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[month_january][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['month_january']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
										    <tr>
                                                                                        <td class="name vertical_top_align"><span>February <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['month_february']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[month_february][label][]" value="February" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[month_february][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['month_february']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
										    <tr>
                                                                                        <td class="name vertical_top_align"><span>March <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['month_march']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[month_march][label][]" value="March" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[month_march][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['month_march']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
										    <tr>
                                                                                        <td class="name vertical_top_align"><span>April <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['month_april']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[month_april][label][]" value="April" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[month_april][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['month_april']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
										    <tr>
                                                                                        <td class="name vertical_top_align"><span>May <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['month_may']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[month_may][label][]" value="May" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[month_may][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['month_may']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
										    <tr>
                                                                                        <td class="name vertical_top_align"><span>June <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['month_june']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[month_june][label][]" value="June" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[month_june][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['month_june']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
										    <tr>
                                                                                        <td class="name vertical_top_align"><span>July <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['month_july']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[month_july][label][]" value="July" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[month_july][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['month_july']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
										    <tr>
                                                                                        <td class="name vertical_top_align"><span>August <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['month_august']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[month_august][label][]" value="August" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[month_august][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['month_august']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
										    <tr>
                                                                                        <td class="name vertical_top_align"><span>September <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['month_september']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[month_september][label][]" value="September" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[month_september][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['month_september']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
										    <tr>
                                                                                        <td class="name vertical_top_align"><span>October <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['month_october']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[month_october][label][]" value="October" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[month_october][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['month_october']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
										    <tr>
                                                                                        <td class="name vertical_top_align"><span>November <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['month_november']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[month_november][label][]" value="November" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[month_november][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['month_november']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
										    <tr>
                                                                                        <td class="name vertical_top_align"><span>December <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['month_december']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[month_december][label][]" value="December" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[month_december][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['month_december']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                                        
                                                                        <div id="tab_lang_common" class="tab-pane widget-body-regular <?php if ($_smarty_tpl->tpl_vars['ps_version']->value==15) {?>vss-lang-tab-pane-ver15<?php }?>">
                                                                            <h4 class='velsof-tab-heading'><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_lang_admin_front_heading']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</h4>
                                                                            <table class="form alternate">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <th class="name vertical_top_align" style="text-align: right;"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_lang_translate']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</th>
                                                                                        <th class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_lang_from']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</th>
                                                                                        <th class="left" style="font-size:14px;"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_lang_to']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</th>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Customer Personal <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['common_customer_personal']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[common_customer_personal][label][]" value="Customer Personal" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[common_customer_personal][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['common_customer_personal']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />                                                                                            
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Customer Subscription <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['common_customer_subscription']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[common_customer_subscription][label][]" value="Customer Subscription" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[common_customer_subscription][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['common_customer_subscription']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Use Delivery Address as Invoice Address <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['common_use_same_add_opt']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[common_use_same_add_opt][label][]" value="Use Delivery Address as Invoice Address" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[common_use_same_add_opt][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['common_use_same_add_opt']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Invoice Address <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['common_invoice_address']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[common_invoice_address][label][]" value="Invoice Address" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[common_invoice_address][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['common_invoice_address']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Delivery Address <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['common_delivery_address']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[common_delivery_address][label][]" value="Delivery Address" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[common_delivery_address][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['common_delivery_address']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Delivery Method <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['common_delivery_method']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[common_delivery_method][label][]" value="Delivery Method" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[common_delivery_method][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['common_delivery_method']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Payment Method <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['common_payment_method']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[common_payment_method][label][]" value="Payment Method" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[common_payment_method][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['common_payment_method']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Title <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['title']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[title][label][]" value="Title" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[title][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['title']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>First Name <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['firstname']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[firstname][label][]" value="First Name" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[firstname][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['firstname']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Last Name <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['lastname']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[lastname][label][]" value="Last Name" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[lastname][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['lastname']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Date Of Birth <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['dob']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[dob][label][]" value="DOB" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[dob][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['dob']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Sign up for NewsLetter <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['newsletter']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[newsletter][label][]" value="Sign up for NewsLetter" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[newsletter][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['newsletter']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Special Offer <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['optin']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[optin][label][]" value="Special Offer" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[optin][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['optin']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Company <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['company']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[company][label][]" value="Company" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[company][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['company']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Vat Number <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['vat_number']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[vat_number][label][]" value="Vat Number" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[vat_number][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['vat_number']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Address Line 1 <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['address_line_1']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[address_line_1][label][]" value="Address Line 1" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[address_line_1][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['address_line_1']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Address Line 2 <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['address_line_2']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[address_line_2][label][]" value="Address Line 2" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[address_line_2][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['address_line_2']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Zip/Postal Code <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['zip_code']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[zip_code][label][]" value="Zip/Postal Code" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[zip_code][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['zip_code']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>City <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['city']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[city][label][]" value="City" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[city][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['city']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Country <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['country']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[country][label][]" value="Country" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[country][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['country']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>State <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['state']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[state][label][]" value="State" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[state][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['state']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Identification Number <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['dni']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[dni][label][]" value="Identification Number" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[dni][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['dni']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>                                                                                    
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Identification Number Hint <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['dni_hint']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[dni_hint][label][]" value="Identification Hint" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[dni_hint][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['dni_hint']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Home Phone <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['home_phone']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[home_phone][label][]" value="Home Phone" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[home_phone][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['home_phone']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Mobile Phone <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['mobile_phone']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[mobile_phone][label][]" value="Mobile Phone" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[mobile_phone][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['mobile_phone']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Address Title <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['addr_title']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[addr_title][label][]" value="Address Title" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[addr_title][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['addr_title']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Other Information <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['other_information']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[other_information][label][]" value="Other Information" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[other_information][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['other_information']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Description <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['cart_description']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[cart_description][label][]" value="Description" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[cart_description][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['cart_description']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Model <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['cart_model']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[cart_model][label][]" value="Model" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[cart_model][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['cart_model']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Quantity <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['cart_quantity']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[cart_quantity][label][]" value="Quantity" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[cart_quantity][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['cart_quantity']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Price <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['cart_price']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[cart_price][label][]" value="Price" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[cart_price][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['cart_price']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Total <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['cart_total']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[cart_total][label][]" value="Total" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[cart_total][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['cart_total']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                                                                                                                
                                                                                        
                                                                        <div id="tab_lang_messages" class="tab-pane widget-body-regular <?php if ($_smarty_tpl->tpl_vars['ps_version']->value==15) {?>vss-lang-tab-pane-ver15<?php }?>">
                                                                            <h4 class='velsof-tab-heading'><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_lang_admin_front_heading']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</h4>
                                                                            <table class="form alternate">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <th class="name vertical_top_align" style="text-align: right;"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_lang_translate']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</th>
                                                                                        <th class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_lang_from']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</th>
                                                                                        <th class="left" style="font-size:14px;"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_lang_to']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</th>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Notification <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['msg_notification_title']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[msg_notification_title][label][]" value="Notification" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[msg_notification_title][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['msg_notification_title']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Warning <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['msg_warning_title']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[msg_warning_title][label][]" value="Warning" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[msg_warning_title][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['msg_warning_title']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Admin Validation Error <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['msg_admin_validation']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[msg_admin_validation][label][]" value="Please provide required information with valid data." />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[msg_admin_validation][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['msg_admin_validation']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Required Field Error <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['msg_require_field']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[msg_require_field][label][]" value="Required Field" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[msg_require_field][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['msg_require_field']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Parmission Error <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['msg_permission_error']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[msg_permission_error][label][]" value="Permission errorred occur for language file creating" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[msg_permission_error][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['msg_permission_error']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Login Request <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['msg_login_rqust']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[msg_login_rqust][label][]" value="Please login first" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[msg_login_rqust][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['msg_login_rqust']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Invalid Email Error <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['msg_invalid_email_error']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[msg_invalid_email_error][label][]" value="Invalid Email" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[msg_invalid_email_error][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['msg_invalid_email_error']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Invalid DOB Error <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['msg_invalid_dob_error']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[msg_invalid_dob_error][label][]" value="Invalid date of birth" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[msg_invalid_dob_error][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['msg_invalid_dob_error']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Customer Existence Error <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['msg_exist_email_error']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[msg_exist_email_error][label][]" value="This customer is already exist" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[msg_exist_email_error][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['msg_exist_email_error']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Invalid Password Error <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['msg_invalid_pass_error']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[msg_invalid_pass_error][label][]" value="Invalid Password" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[msg_invalid_pass_error][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['msg_invalid_pass_error']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Invalid Phone Error <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['msg_invalid_phone_error']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[msg_invalid_phone_error][label][]" value="Invalid Phone Number" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[msg_invalid_phone_error][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['msg_invalid_phone_error']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Invalid Zip Code Error <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['msg_invalid_zip_error']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[msg_invalid_zip_error][label][]" value="Invalid Zip Code" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[msg_invalid_zip_error][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['msg_invalid_zip_error']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>DNI Error <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['msg_add_dni_error']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[msg_add_dni_error][label][]" value="DNI Error" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[msg_add_dni_error][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['msg_add_dni_error']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Address Title Error <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['msg_add_title_error']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[msg_add_title_error][label][]" value="This title has already taken" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[msg_add_title_error][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['msg_add_title_error']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Zip Code Hint <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['msg_zip_hint']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[msg_zip_hint][label][]" value="Must be typed as follows:" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[msg_zip_hint][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['msg_zip_hint']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Authentication Error <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['msg_authentication_error']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[msg_authentication_error][label][]" value="Authentication failed" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[msg_authentication_error][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['msg_authentication_error']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Connection fail with social site Error <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['msg_connect_social_error']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[msg_connect_social_error][label][]" value="Authentication failed" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[msg_connect_social_error][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['msg_connect_social_error']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Login fail with social site Error <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['msg_login_social_error']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[msg_login_social_error][label][]" value="Not able to login with social site" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[msg_login_social_error][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['msg_login_social_error']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Voucher Required Error <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['msg_voucher_required_error']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[msg_voucher_required_error][label][]" value="You must enter a voucher code" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[msg_voucher_required_error][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['msg_voucher_required_error']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Invalid Voucher invalid Error <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['msg_invalid_voucher_error']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[msg_invalid_voucher_error][label][]" value="The voucher code is invalid" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[msg_invalid_voucher_error][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['msg_invalid_voucher_error']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Voucher Feature not active Error <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['msg_voucher_feature_error']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[msg_voucher_feature_error][label][]" value="This feature is not active for this voucher" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[msg_voucher_feature_error][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['msg_voucher_feature_error']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Voucher Limit Error <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['msg_invalid_voucher_limit_error']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[msg_invalid_voucher_limit_error][label][]" value="Vouhcer has been already used" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[msg_invalid_voucher_limit_error][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['msg_invalid_voucher_limit_error']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Voucher Remove Error <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['msg_voucher_remove_fail']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[msg_voucher_remove_fail][label][]" value="Error occured while removing voucher" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[msg_voucher_remove_fail][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['msg_voucher_remove_fail']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Voucher Success <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['msg_voucher_success']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[msg_voucher_success][label][]" value="Voucher successfully applied" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[msg_voucher_success][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['msg_voucher_success']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Voucher Remove <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['msg_voucher_remove_success']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[msg_voucher_remove_success][label][]" value="Voucher successfully removed" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[msg_voucher_remove_success][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['msg_voucher_remove_success']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Setting Saved Message <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['msg_admin_setting_save']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[msg_admin_setting_save][label][]" value="Settings has been updated successfully" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[msg_admin_setting_save][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['msg_admin_setting_save']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Language Translate Message <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['msg_admin_lang_translate']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[msg_admin_lang_translate][label][]" value="Language successfully translated" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[msg_admin_lang_translate][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['msg_admin_lang_translate']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>The Best Price & Speed <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['msg_best_ps']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[msg_best_ps][label][]" value="The best price and speed" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[msg_best_ps][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['msg_best_ps']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[msg_best_ps][label][]" value="order-shipping" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>The Fastest <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['msg_fastest']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[msg_fastest][label][]" value="The Fastest" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[msg_fastest][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['msg_fastest']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[msg_fastest][label][]" value="order-shipping" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>The Best Price <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['msg_best_p']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[msg_best_p][label][]" value="The Best Price" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[msg_best_p][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['msg_best_p']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[msg_best_p][label][]" value="order-shipping" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>No Delivery Required <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['msg_no_shipping_required']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[msg_no_shipping_required][label][]" value="No Delivery Method Required" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[msg_no_shipping_required][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['msg_no_shipping_required']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[msg_no_shipping_required][label][]" value="order-shipping" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Delivery Method Required <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['msg_shipping_required']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[msg_shipping_required][label][]" value="Delivery Method Required" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[msg_shipping_required][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['msg_shipping_required']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>No Delivery Available <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['msg_no_ship_avail']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[msg_no_ship_avail][label][]" value="No Delivery Method Available" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[msg_no_ship_avail][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['msg_no_ship_avail']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[msg_no_ship_avail][label][]" value="order-shipping" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>No Delivery Available for Address <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['msg_no_ship_avail_addr']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[msg_no_ship_avail_addr][label][]" value="No Delivery Method Available for this Address" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[msg_no_ship_avail_addr][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['msg_no_ship_avail_addr']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[msg_no_ship_avail_addr][label][]" value="order-shipping" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Payment Method Required <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['msg_payment_require']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[msg_payment_require][label][]" value="Payment Method Required" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[msg_payment_require][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['msg_payment_require']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Product Remove Success <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['msg_prod_remove_succes']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[msg_prod_remove_succes][label][]" value="Products successfully removed" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[msg_prod_remove_succes][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['msg_prod_remove_succes']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Product Quantity Update Warning <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['msg_prod_qty_update_warning']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[msg_prod_qty_update_warning][label][]" value="No change found in quantity" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[msg_prod_qty_update_warning][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['msg_prod_qty_update_warning']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Invalid Quantity <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['msg_prod_qty_invalid']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[msg_prod_qty_invalid][label][]" value="Invalid Quantity" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[msg_prod_qty_invalid][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['msg_prod_qty_invalid']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Product Quantity Update Success <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['msg_prod_qty_update_success']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[msg_prod_qty_update_success][label][]" value="Products quantity successfully updated" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[msg_prod_qty_update_success][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['msg_prod_qty_update_success']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Cart Empty <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['msg_cart_empty']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[msg_cart_empty][label][]" value="Your shopping cart is empty." />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[msg_cart_empty][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['msg_cart_empty']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Message Invalid <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['msg_comment_invalid']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[msg_comment_invalid][label][]" value="Message is in invalid format" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[msg_comment_invalid][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['msg_comment_invalid']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Address is not yours <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['msg_add_is_not_your']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[msg_add_is_not_your][label][]" value="This address is not yours" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[msg_add_is_not_your][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['msg_add_is_not_your']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Address invalid area <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['msg_add_invalid_area']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[msg_add_invalid_area][label][]" value="This address is not in a valid area" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[msg_add_invalid_area][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['msg_add_invalid_area']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Address invalid <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['msg_add_invalid']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[msg_add_invalid][label][]" value="This address is invalid" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[msg_add_invalid][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['msg_add_invalid']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Cart Updating Error <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['msg_cart_update_err']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[msg_cart_update_err][label][]" value="An error occurred while updating your cart" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[msg_cart_update_err][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['msg_cart_update_err']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Accept T & C Required <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['msg_tos_require']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[msg_tos_require][label][]" value="Please acccept our terms & conditions before confirming your order" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[msg_tos_require][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['msg_tos_require']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Address Title Default Value: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['msg_addr_alias']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[msg_addr_alias][label][]" value="Title Delivery Alias" />
                                                                                            <input type="text" class="translator_input_width" maxlength='27' name="velocity_transalator[msg_addr_alias][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['msg_addr_alias']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Address create Error <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['msg_addr_create_err']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[msg_addr_create_err][label][]" value="Error occurred while creating new address" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[msg_addr_create_err][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['msg_addr_create_err']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Address Update Error <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['msg_addr_update_err']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[msg_addr_update_err][label][]" value="Error occurred while updating address" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[msg_addr_update_err][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['msg_addr_update_err']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Customer Email Send Error <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['msg_acc_create_send_email_err']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[msg_acc_create_send_email_err][label][]" value="An error ocurred while sending account confirmation email" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[msg_acc_create_send_email_err][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['msg_acc_create_send_email_err']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Information Request Error <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['msg_requst_tech_err']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[msg_requst_tech_err][label][]" value="TECHNICAL ERROR: Request Failed" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[msg_requst_tech_err][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['msg_requst_tech_err']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                                        
                                                                        <div id="tab_lang_misc" class="tab-pane widget-body-regular <?php if ($_smarty_tpl->tpl_vars['ps_version']->value==15) {?>vss-lang-tab-pane-ver15<?php }?>">
                                                                            <h4 class='velsof-tab-heading'><?php echo mb_convert_encoding(htmlspecialchars(mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_lang_admin_panel_heading']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8'), ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</h4>
                                                                            <table class="form alternate">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <th class="name vertical_top_align" style="text-align: right;"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_lang_translate']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</th>
                                                                                        <th class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_lang_from']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</th>
                                                                                        <th class="left" style="font-size:14px;"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['admin_lang_to']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</th>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>General Settings <?php echo mb_convert_encoding(htmlspecialchars(mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8'), ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['misc_tab_general']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[misc_tab_general][label][]" value="General Settings" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[misc_tab_general][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['misc_tab_general']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Login <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['misc_tab_login']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[misc_tab_login][label][]" value="Login" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[misc_tab_login][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['misc_tab_login']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Addresses <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['misc_tab_addresses']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[misc_tab_addresses][label][]" value="Addresses" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[misc_tab_addresses][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['misc_tab_addresses']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Cart <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['misc_tab_cart']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[misc_tab_cart][label][]" value="Cart" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[misc_tab_cart][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['misc_tab_cart']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Design <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['misc_tab_design']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[misc_tab_design][label][]" value="Design" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[misc_tab_design][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['misc_tab_design']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Language Translator <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['misc_tab_lang']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[misc_tab_lang][label][]" value="Language Translator" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[misc_tab_lang][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['misc_tab_lang']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Admin Labels <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['misc_tab_admin_label']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[misc_tab_admin_label][label][]" value="Admin Labels" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[misc_tab_admin_label][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['misc_tab_admin_label']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Front Labels <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['misc_tab_front_label']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[misc_tab_front_label][label][]" value="Front Labels" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[misc_tab_front_label][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['misc_tab_front_label']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Common Labels <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['misc_tab_common_label']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[misc_tab_common_label][label][]" value="Common Labels" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[misc_tab_common_label][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['misc_tab_common_label']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Miscellaneous <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['misc_tab_miscellaneous']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[misc_tab_miscellaneous][label][]" value="Miscellaneous" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[misc_tab_miscellaneous][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['misc_tab_miscellaneous']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Mandatory Label <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['misc_mandatory']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[misc_mandatory][label][]" value="(*) are mandatory fields" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[misc_mandatory][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['misc_mandatory']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Guest Customer <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['misc_gst_customer']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[misc_gst_customer][label][]" value="Guest Customer" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[misc_gst_customer][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['misc_gst_customer']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Logged in Customer <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['misc_logged_customer']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[misc_logged_customer][label][]" value="Logged in Customer" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[misc_logged_customer][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['misc_logged_customer']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Require <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['misc_require']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[misc_require][label][]" value="Require" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[misc_require][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['misc_require']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Show <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['misc_show']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[misc_show][label][]" value="Show" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[misc_show][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['misc_show']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Show as Checked <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['misc_show_as_checked']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[misc_show_as_checked][label][]" value="Show as Checked" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[misc_show_as_checked][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['misc_show_as_checked']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Save Button <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['save_btn']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[save_btn][label][]" value="Save" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[save_btn][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['save_btn']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Cancel Button <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['cancel_btn']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[cancel_btn][label][]" value="Cancel" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[cancel_btn][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['cancel_btn']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Download Button <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['download_btn']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[download_btn][label][]" value="Download" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[download_btn][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['download_btn']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Save & Download Button <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['save_download_btn']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[save_download_btn][label][]" value="Save & Download" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[save_download_btn][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['save_download_btn']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Require <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['req_lbl']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[req_lbl][label][]" value="Require" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[req_lbl][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['req_lbl']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Only Text <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['only_text_lbl']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[only_text_lbl][label][]" value="Only Text" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[only_text_lbl][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['only_text_lbl']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Only Image <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['only_image_lbl']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[only_image_lbl][label][]" value="Only Image" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[only_image_lbl][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['only_image_lbl']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Text with Image <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['txt_wid_image_lbl']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[txt_wid_image_lbl][label][]" value="Text with Image" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[txt_wid_image_lbl][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['txt_wid_image_lbl']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Note <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['note_lbl']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[note_lbl][label][]" value="Note" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[note_lbl][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['note_lbl']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Symbol Replace Note <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['symbol_replace_note']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[symbol_replace_note][label][]" value="Do not remove %s symbol" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[symbol_replace_note][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['symbol_replace_note']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Address field warning <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['add_display_uncheck_msg']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[add_display_uncheck_msg][label][]" value="You cannot uncheck this field due to required field" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[add_display_uncheck_msg][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['add_display_uncheck_msg']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Other Warning <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['other_warning_1']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[other_warning_1][label][]" value="This field will require on the basis of store configuration" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[other_warning_1][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['other_warning_1']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Other Error <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['other_error_1']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[other_error_1][label][]" value="Technical Error Occured. Please contact to support." />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[other_error_1][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['other_error_1']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Please provide required Information <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['other_validate_msg']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[other_validate_msg][label][]" value="Please provide required Information" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[other_validate_msg][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['other_validate_msg']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Email Address Required <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['front_validation_msg1']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[front_validation_msg1][label][]" value="An email address required." />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[front_validation_msg1][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['front_validation_msg1']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Email Address Invalid <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['front_validation_msg2']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[front_validation_msg2][label][]" value="Invalid email address." />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[front_validation_msg2][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['front_validation_msg2']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Password Required <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['front_validation_msg3']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[front_validation_msg3][label][]" value="Password is required." />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[front_validation_msg3][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['front_validation_msg3']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>State Required for Country <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['front_validation_msg4']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[front_validation_msg4][label][]" value="This country requires you to chose a State" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[front_validation_msg4][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['front_validation_msg4']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>                                                                                    
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Country not Active <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['front_validation_msg5']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[front_validation_msg5][label][]" value="This country is not active" />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[front_validation_msg5][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['front_validation_msg5']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>                                                                                    
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Account Creation Error <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['front_validation_msg6']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[front_validation_msg6][label][]" value="An error occurred while creating your account." />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[front_validation_msg6][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['front_validation_msg6']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>                                                                                    
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>Login Authentication Error <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['front_validation_msg7']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[front_validation_msg7][label][]" value="Authentication failed." />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[front_validation_msg7][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['front_validation_msg7']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td class="name vertical_top_align"><span>No Payment Methods Error <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['front_validation_msg8']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[front_validation_msg8][label][]" value="No payment modules have been installed." />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[front_validation_msg8][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['front_validation_msg8']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
										    <tr>
                                                                                        <td class="name vertical_top_align"><span>No Shipping Method Selected Error <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['front_validation_msg9']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[front_validation_msg9][label][]" value="No Shipping Method Selected." />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[front_validation_msg9][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['front_validation_msg9']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
										    <tr>
                                                                                        <td class="name vertical_top_align"><span>Minimum Purchase Error <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['front_validation_msg10']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[front_validation_msg10][label][]" value="A minimum purchase total of %1s (tax excl.) is required in order to validate your order, current purchase is %2s (tax excl.)." />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[front_validation_msg10][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['front_validation_msg10']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />
                                                                                        </td>
                                                                                    </tr>
										    <tr>
                                                                                        <td class="name vertical_top_align"><span>No Payment Method Required Error <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['label']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
: </span></td>
                                                                                        <td class="velsof-english"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['current_lang_translator_vars']->value['front_validation_msg11']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
                                                                                        <td class="left">
                                                                                            <input type="hidden" class="translator_input_width" name="velocity_transalator[front_validation_msg11][label][]" value="No payment method required." />
                                                                                            <input type="text" class="translator_input_width" name="velocity_transalator[front_validation_msg11][label][]" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['selected_lang_translator_vars']->value['front_validation_msg11']['label'][1], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" />

                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                            <br>
                                                                        </div>
                                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>     
                                                        </div>
                                                    </div>

                                                    <!--------------- End - Language Translator -------------------->
                                                    
                                                    
                                                    <!--------------- Start - Frequently Asked Questions -------------------->
                                                                                                        
                                                    <div id="tab_faq" class="tab-pane outsideform">
                                                        <div class="block">
                                                            <h4 class='velsof-tab-heading'><?php echo smartyTranslate(array('s'=>'Frequently Asked Questions (Click to expand)','mod'=>'supercheckout'),$_smarty_tpl);?>
</h4>
                                                            <br>
                                                            
									    <div class="row faq-row" id="1">
                                                                <div class="span faq-span" id="faq-span1">
                                                                    <p style="margin-bottom: 0; margin-right: 5px">
                                                                        <span class="question" style="font-weight: bold; font-size: 15px;">1. Need to change small icons next to "login options, delivery address, delivery method, payment method, confirm your order heading" in front end?</span><br><br>
                                                                        <span class="answer" id="answer1" style="color: black;">
									    To change those icons, replace those imaes in following directory on your server.<br>
									    /modules/supercheckout/views/img/front/
                                                                        </span>
                                                                    </p>
                                                                </div>
                                                            </div>
							    
							    
                                                            <div class="row faq-row" id="2">
                                                                <div class="span faq-span" id="faq-span2">
                                                                    <p style="margin-bottom: 0; margin-right: 5px">
                                                                        <span class="question" style="font-weight: bold; font-size: 15px;">2. Radio buttons for both Mr and Mrs. is always checked?</span><br><br>
                                                                        <div class="answer" id="answer2" style="color:black;"> If both Mr and Mrs. radio buttons are always checked, then add below code in custom css field of our module customizer tab to fix the issue.
									    <br> <br><pre>
#customer_person_information_table div.radio input {
opacity: 99999;
position: relative !important;
margin: 0px !important;
}
</pre></div>
                                                                    </p>
                                                                </div>
                                                            </div>

                                                            

                                                            <div class="row faq-row" id="3">
                                                                <div class="span faq-span" id="faq-span3">
                                                                    <p style="margin-bottom: 0; margin-right: 5px">
                                                                        <span class="question" style="font-weight: bold; font-size: 15px;">3. Third column is not correctly aligned or full width issue in Desktop?</span><br><br>
                                                                        <div class="answer" id="answer3" style="color: black;">
                                                                        Most probably your theme template CSS is conflicting with our module. Fix for this issue is very simple. Kindly add following code in Custom CSS field in Customizer tab of our module admin setting.<br>
                                                                        <br><pre>
#columnleft-3{
width:28% !important;  
}
<br>
OR
<br>
#center_column{
width:100% !important;  
}									
</pre><br>
                                                                        In case your issue is not solved, try changing this percentage to suit your theme otherwise <a target="_blank" href="http://www.knowband.com/helpdesk">contact us</a> with admin and FTP login details.
                                                                        </div>
                                                                    </p>
                                                                </div>
                                                            </div>

                                                            <div class="row faq-row" id="4">
                                                                <div class="span faq-span" id="faq-span4">
                                                                    <p style="margin-bottom: 0; margin-right: 5px">
                                                                        <span class="question" style="font-weight: bold; font-size: 15px;">4. Want to add an extra field in address form?</span><br><br>
                                                                        <span class="answer" id="answer4" style="color: black;">
                                                                        By default it is not possible to add custom field in our module, if you wish we can make this custom change for you for additional cost. Kindly <a target="_blank" href="http://www.knowband.com/helpdesk">contact us </a> with your complete requirements.
                                                                        </span>
                                                                    </p>
                                                                </div>
                                                            </div>

                                                            <div class="row faq-row" id="5">
                                                                <div class="span faq-span" id="faq-span5">
                                                                    <p style="margin-bottom: 0; margin-right: 5px">
                                                                        <span class="question" style="font-weight: bold; font-size: 15px;">5.  Some third party module is not working?</span><br><br>
                                                                        <span class="answer" id="answer5" style="color: black;">
                                                                        Third party modules are only made for default checkout of Prestashop. They may or may not work with our module. In case they are not working with our module, some custom changes need to be made to make them compatible with our module.
                                                                        </span>
                                                                    </p>
                                                                </div>
                                                            </div>

                                                            <div class="row faq-row" id="6">
                                                                <div class="span faq-span" id="faq-span6">
                                                                    <p style="margin-bottom: 0; margin-right: 5px">
                                                                        <span class="question" style="font-weight: bold; font-size: 15px;">6. Want us to implement some specific feature for additional cost?</span><br><br>
                                                                        <span class="answer" id="answer6" style="color: black;">
                                                                        Yes, you can <a target="_blank" href="http://www.knowband.com/helpdesk">contact us</a> with complete requirements. If changes are feasible, we can implement them for additional cost.
                                                                        </span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            
                                                           <div class="row faq-row" id="7">
                                                                <div class="span faq-span" id="faq-span7">
                                                                    <p style="margin-bottom: 0; margin-right: 5px">
                                                                        <span class="question" style="font-size: 15px;font-weight: bold; font-size: 15px;">7. Facing any of these issues ?
									</span>
									    <div class="answer" id="answer7" style="color:black;">
										    <br><pre>TECHNICAL ERROR: Request Failed Details:Error thrown: [object Object]Text status: error</pre>
										<pre>500 Internal Server error</pre>
										<pre>Progress Bar stuck on 80% after click on Place order</pre>
                                                                          Reason for these errors are not specific. If you are facing any of these issues, kindly <a target="_blank" href="http://www.knowband.com/helpdesk">contact us</a> with your admin and FTP details.
                                                                        </div>
                                                                    </p>
                                                                </div>
                                                            </div>
							    
							    <div class="row faq-row" id="8">
                                                                <div class="span faq-span" id="faq-span8">
                                                                    <p style="margin-bottom: 0; margin-right: 5px">
                                                                        <span class="question" style="font-weight: bold; font-size: 15px;">8. Payment method is not displaying additinal cost?</span><br><br>
                                                                        <span class="answer" id="answer8" style="color: black;">
                                                                       It is very rare issue and in case you face it ,kindly <a target="_blank" href="http://www.knowband.com/helpdesk">contact us</a> with your admin and FTP login details so that we can fix this issue for you.
                                                                        </span>
                                                                    </p>
                                                                </div>
                                                            </div>
							    
                                                            <div class="row faq-row" id="9">
                                                                <div class="span faq-span" id="faq-span9">
                                                                    <p style="margin-bottom: 0; margin-right: 5px">
                                                                        <span class="question" style="font-weight: bold; font-size: 15px;">9. Translated text is not reflecting in front-side?</span><br><br>
                                                                        <span class="answer" id="answer9" style="color: black;">
                                                                            Kindly try again after clearing your Prestashop cache using Advance Parameter->Performance->Clear cache button. If your issue persists even after that, make sure that your theme directory don't contain our module translation file.
                                                                            To check this, go to your theme directory 
                                                                            /your_theme_name/modules/ . Inside this modules directory, there should no Supercheckout directory, in case it exist just rename it to anything else.<br><br>
                                                                            When you translate text from our module admin panel, our module save translated text in /modules/supercheckout/translations/ directory.
                                                                            But when there is some translation exist in your theme directory, our module picks text from there and your translated text don't reflect in front side.<br>
                                                                            <br>
                                                                            Now question arise, in which case theme directory can have our module translated text file.<br>
                                                                            When you use default translation feature of Prestashop, then it save translated text in theme directory and our module use text from this themes directory rather than using text from module directory.
                                                                        </span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="row faq-row" id="10">
                                                                <div class="span faq-span" id="faq-span10">
                                                                    <p style="margin-bottom: 0; margin-right: 5px">
                                                                        <span class="question" style="font-size: 15px;font-weight: bold; font-size: 15px;">10. Payment method image is not coming?<br><br></span><span class="answer" id="answer10" style="color: black;">
                                                                          Our module shows payment methods images from their root directory ("/modules/payment_method_name"). If some payment method don't have any image in their root directory then no image will be shown.<br><br>
                                                                          To display that payment method image, kindly upload image to the payment module directory. Image name should be same as payment method directory name. You can use any image format eg. jpg, png etc. 
                                                                          <br><br>For example: To display Iupay payment module image, you need to add its image in "/modules/iupay/" directory and image name must be iupay. Image extension can be anything and recommended image resolution is 95x20.<br><br> Don't hesistate to <a target="_blank" href="http://www.knowband.com/helpdesk">contact us</a> if you need any assistance from our side.
                                                                        </span>
                                                                    </p>
                                                                </div>
                                                            </div>

                                                            <div class="row faq-row" id="11">
                                                                <div class="span faq-span" id="faq-span11">
                                                                    <p style="margin-bottom: 0; margin-right: 5px">
                                                                        <span class="question" style="font-size: 15px;font-weight: bold; font-size: 15px;">11. VAT and DNI fields are not coming in front-end?<br><br></span><span class="answer" id="answer11" style="color: black;">
                                                                VAT field<br>
                                                                To show this field, "European VAT number v1.7.2 - by PrestaShop" module must be installed on your store. It is a free module and by default is available with prestashop installation. You can configure it to show VAT field for any specific country.
                                                                <br><br>
                                                                DNI field<br>
                                                                To show this field, go to Localization->Countries->Edit your country and enable "Identification Number" field from there.          
                                                                        </span>
                                                                    </p>
                                                                </div>
                                                            </div>

                                                            <div class="row faq-row" id="12">
                                                                <div class="span faq-span" id="faq-span12">
                                                                    <p style="margin-bottom: 0; margin-right: 5px">
                                                                        <span class="question" style="font-size: 15px;font-weight: bold; font-size: 15px;">12. In front end when you click login or place order button nothing happens?<br><br></span><span class="answer" id="answer12" style="color: black;">
                                                                         To fix this issue, Under Advance parameters->performance->Turn ON "Move Javascript to the end". Don't forget to clear Prestashop cache using Advance Parameter->Performance->Clear cache button.<br>
                                                                         <br>In case your issue persists, <a target="_blank" href="http://www.knowband.com/helpdesk">contact us</a> with your admin and FTP details.
                                                                        </span>
                                                                    </p>
                                                                </div>
                                                            </div>
							    
                                                            <div class="row faq-row" id="13">
                                                                <div class="span faq-span" id="faq-span13">
                                                                    <p style="margin-bottom: 0; margin-right: 5px">
                                                                        <div class="question" style="font-size: 15px;font-weight: bold; font-size: 15px;">13. How to translate custom HTML header/footer content?<br><br></div><div class="answer" id="answer13" style="color: black;">
										In order to translate custom HTML header/footer you have to add HTML content (in Custom HTML header or footer field in design tab) for all the languages as follows:<br><br>
									 <pre>
&lt;div id="LANGISO1_content" style="display: none;"&gt;Your HTML content for the language&lt;/div&gt;

&lt;div id="LANGISO2_content" style="display: none;"&gt;Your HTML content for the language&lt;/div&gt;
	.
	.
	.
&lt;div id="LANGISOn_content" style="display: none;"&gt;Your HTML content for the language&lt;/div&gt;
									 </pre>
                                                                        </div>
                                                                    </p>
                                                                </div>
                                                            </div>

                                                            

                                                        </div>    
                                                    </div>

                                                    <!--------------- End - Frequently Asked Questions -------------------->
                                                    
                                                    <!--------------- Start - Suggestions Tab -------------------->
                                                                                                        
                                                    <div id="tab_suggest" class="tab-pane outsideform">
                                                        <div class="block">
                                                            <h4 class='velsof-tab-heading'><?php echo smartyTranslate(array('s'=>'Suggestions','mod'=>'supercheckout'),$_smarty_tpl);?>
</h4>
                                                        <div style= "  text-align:center;padding: 25px; height:140px;margin: 40px;margin-bottom:0px; background: aliceblue;<?php if ($_smarty_tpl->tpl_vars['ps_version']->value==15) {?>height: 100px;<?php }?>">
                                                        <div><span style="font-size:18px;" >Want us to include some feature in next version of this module?</span>
                                                        <br>
                                                        <br>
                                                         <a target="_blank" href="http://addons.prestashop.com/ratings.php"><span style="margin-left:30%;max-width:40% !important;font-size:18px;" class='btn btn-block btn-success action-btn'>Share your idea</span></a><div>
                                                            </div>
                                                              
                                                   </div>
                                                  </div>
                                                  <div style="margin: 40px;border: 1px solid;color: rgb(240, 29, 53);padding: 15px;padding-top: 0px;"><br>*** If you like our module, don't forget to give us 5 STAR rating on the above link. This will definitely boost our morale.
						</div>          
						<div style="margin:40px;border:1px solid;">
						<p style="font-size: 18px;font-weight:600;border-bottom: 1px solid #000;padding: 5px;text-align: center;background-color: aliceblue;<?php if ($_smarty_tpl->tpl_vars['ps_version']->value==15) {?>margin:0px;<?php }?>" >Features that we have added till yet based upon our customers suggestions.</p>
						<ol style="font-size:16px;<?php if ($_smarty_tpl->tpl_vars['ps_version']->value==15) {?>padding-left: 35px;padding-top: 10px;<?php }?>" <?php if ($_smarty_tpl->tpl_vars['ps_version']->value==15) {?>class="sug-ol"<?php }?>>
							<li style="padding-bottom:5px;"> Customizable product compatibility <i style="color:rgb(237, 30, 121);">- by Massimiliano, Italy</i></li>
							<li style="padding-bottom:5px;"> Prestashop's Date of delivery module compatibility <i style="color:rgb(237, 30, 121);">- by Massimiliano, Italy</i></li>
							<li style="padding-bottom:5px;"> Popup when customer click on Facebook or Google login buttons <i style="color:rgb(237, 30, 121);">- by Elena Perrone, Ukraine</i></li>
							<li style="padding-bottom:5px;"> Option to add custom CSS in front end <i style="color:rgb(237, 30, 121);">- by Keith, United Kingdom</i></li>
                                                        <li style="padding-bottom:5px;"> Option to change Button colors <i style="color:rgb(237, 30, 121);">- by Guru, Singapore</i></li>
							<li style="padding-bottom:5px;"> Several other Payment methods compatibility <i style="color:rgb(237, 30, 121);">- can't mention 30+ names here ;) </i></li>
						</ol>
						<span style="font-size:16px;padding-left:40px;">Thanks to all, as you helped us improve this module by sharing your ideas and pointing out bugs.</span><br/><br/><span style="font-size:16px;padding-left:40px;">Regards,</span><br/><span style="font-size:16px;padding-left:40px;">Knowband Team<br/><br/></span>
						</div>
						<!--------------- End - Suggestions Tab -------------------->
                                                    
                                                    
                                                </div>
                                            </div>
                                        
                                    </div>
                                </div>

                            </div>
                        </div>                    
                </div>
            </div>          
        </div>
                                                                
        <!-- Start - Variables which will not submit and save -->
        <input type="hidden" id="modals_bootbox_prompt_header_html" value="<?php echo smartyTranslate(array('s'=>'Edit Your HTML Content Here','mod'=>'supercheckout'),$_smarty_tpl);?>
" />
        <!-- Start - Variables which will not submit and save -->
    </div>
</div>

<!-- Themer -->
<div id="themer" class="collapse">
    <div class="wrapper">
        <span class="close2">&times; <?php echo smartyTranslate(array('s'=>'close','mod'=>'supercheckout'),$_smarty_tpl);?>
</span>
        <h4><?php echo smartyTranslate(array('s'=>'Themer','mod'=>'supercheckout'),$_smarty_tpl);?>
</h4>
        <ul>
            <li><?php echo smartyTranslate(array('s'=>'Theme','mod'=>'supercheckout'),$_smarty_tpl);?>
: <select id="themer-theme" class="pull-right"></select><div class="clearfix"></div></li>            
        </ul>
        <div id="themer-getcode" class="hide">
            <hr class="separator" />
            <button class="btn btn-primary btn-small pull-right btn-icon glyphicons download" id="themer-getcode-less"><i></i><?php echo smartyTranslate(array('s'=>'Get LESS','mod'=>'supercheckout'),$_smarty_tpl);?>
</button>
            <button class="btn btn-inverse btn-small pull-right btn-icon glyphicons download" id="themer-getcode-css"><i></i><?php echo smartyTranslate(array('s'=>'Get CSS','mod'=>'supercheckout'),$_smarty_tpl);?>
</button>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

<?php $_smarty_tpl->tpl_vars["column_1"] = new Smarty_variable('', null, 0);?>
<?php $_smarty_tpl->tpl_vars["column_2"] = new Smarty_variable('', null, 0);?>
<?php $_smarty_tpl->tpl_vars["column_3"] = new Smarty_variable('', null, 0);?>
<?php $_smarty_tpl->tpl_vars["column_4"] = new Smarty_variable('', null, 0);?>
<?php $_smarty_tpl->tpl_vars["column_5"] = new Smarty_variable('', null, 0);?>
<?php $_smarty_tpl->tpl_vars["main_width"] = new Smarty_variable(1, null, 0);?>
<?php if ($_smarty_tpl->tpl_vars['layout']->value==2) {?>
    <?php $_smarty_tpl->tpl_vars['column_1'] = new Smarty_variable($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['column_width']['2_column'][1]/$_smarty_tpl->tpl_vars['main_width']->value, null, 0);?>
    <?php $_smarty_tpl->tpl_vars['column_2'] = new Smarty_variable($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['column_width']['2_column'][2]/$_smarty_tpl->tpl_vars['main_width']->value, null, 0);?>
    <?php $_smarty_tpl->tpl_vars['column_4'] = new Smarty_variable($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['column_width']['2_column']['inside'][1]/$_smarty_tpl->tpl_vars['main_width']->value, null, 0);?>
    <?php $_smarty_tpl->tpl_vars['column_5'] = new Smarty_variable($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['column_width']['2_column']['inside'][2]/$_smarty_tpl->tpl_vars['main_width']->value, null, 0);?>
<?php } elseif ($_smarty_tpl->tpl_vars['layout']->value==3) {?>
    <?php $_smarty_tpl->tpl_vars['column_1'] = new Smarty_variable($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['column_width']['3_column'][1]/$_smarty_tpl->tpl_vars['main_width']->value, null, 0);?>
    <?php $_smarty_tpl->tpl_vars['column_2'] = new Smarty_variable($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['column_width']['3_column'][2]/$_smarty_tpl->tpl_vars['main_width']->value, null, 0);?>
    <?php $_smarty_tpl->tpl_vars['column_3'] = new Smarty_variable($_smarty_tpl->tpl_vars['velocity_supercheckout']->value['column_width']['3_column'][3]/$_smarty_tpl->tpl_vars['main_width']->value, null, 0);?>
<?php }?>

<style type="text/css">
    
	.ship2pay-glyphicons i:before{    
	    font-size: 17px;
    padding: 3px;
	}
	.ship2pay-div{
	cursor:pointer;
  padding: 5px;
  margin: 10px;
  text-align: center;
  font-size: 13px;
  color: white;
  width: 60%;
  margin-left: 20%;
	}
	.tickcross-sign{
	padding-right: 10px;
    font-weight: bold;
    font-size: 14px;
	}
	    .faq-span{max-height:10px;}
	    .faq-row{background: rgba(230, 230, 236, 0.37);
  border-radius:3px;
  margin-top:10px;
  padding: 30px;
  cursor: pointer;
  padding-left: 10px;
  padding-top: 15px;}
    .question{font-family:initial;color:rgb(213, 81, 81) !important;font-size:17px !important;}
    .answer{display:none;font-family:initial;font-size:15px;line-height:20px;letter-spacing:1px;}
    tr.even { background-color: #EDEDED; }
    tr.odd { background-color: white;}
    .column-1, .column-data-1{width:<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['column_1']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
% ;}
    .column-2, .column-data-2{width:<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['column_2']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
%;} 
    .column-3, .column-data-3{width:<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['column_3']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
%;}
    #column-1-inside,#column-1-inside-text {width:<?php echo $_smarty_tpl->tpl_vars['column_4']->value-mb_convert_encoding(htmlspecialchars(1, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
%;}
    #column-2-inside,#column-2-inside-text {width:<?php echo $_smarty_tpl->tpl_vars['column_4']->value-mb_convert_encoding(htmlspecialchars(1, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
%;}
    
.lang-title td
{
	padding: 2px 0px;
}
</style>

<script type="text/javascript">
	var ps_ver = '<?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['ps_version']->value);?>
';
    <?php if ($_smarty_tpl->tpl_vars['layout']->value==1) {?>
        
        $( ".column" ).sortable({
            connectWith: ".column",
            scroll: false,
            stop: function( event, ui ) {
                $('.column').find("li").each(function(i, el){

                    $(this).find(".row-data").val($(el).index())                

                });
            }
        });
 
        $( ".column" ).disableSelection();
        $('#column-1 > li').tsort({attr:'row-data'});
        $('#column-1 > li').each(function(){
            $(this).appendTo('#column-1' );    

        })
        
    <?php } elseif ($_smarty_tpl->tpl_vars['layout']->value==2) {?>
        
        var main_width = 100 / 100;

        $( "#slider" ).slider({
            range: false,	  
            min: 0,
            max: 100,
            design: 1.00,
            values: [ <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['column_1']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
],
            slide: function( event, ui ) {

                $('#column-1-text').val(Math.round(main_width*(ui.values[ 0 ])))
                .attr('width-data', ui.values[ 0 ])
                .attr('left-data', 0)
                .css({'width' : parseInt( ui.values[ 0 ] ) + '%'})
                $('#column-2-text').val(Math.round(main_width*(100 - ui.values[ 0 ])))
                .attr('width-data',100 - ui.values[ 0 ]-1)
                .attr('left-data', parseInt(ui.values[ 0 ]))
                .css({'width' : parseInt( 100 - ui.values[ 0 ]-1) + '%'})           
                $('#column-1').css({'width' :  parseInt( ui.values[ 0 ]) +'%' })
                $('#column-2').css({'width' :  parseInt(100 - ui.values[ 0 ]-1) +'%'})
            }
        });
        var main_width_inside = 100 / 100;

        $( "#slider_inside" ).slider({
            range: false,	  
            min: 0,
            max: 100,
            design: 1.00,
            values: [<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['column_4']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
],
            slide: function( event, ui ) {

                $('#column-1-inside-text').val(Math.round(main_width_inside*(ui.values[ 0 ])))
                .attr('width-data', ui.values[ 0 ])
                .attr('left-data', 0)
                .css({'width' : parseInt( ui.values[ 0 ] ) + '%'})
                $('#column-2-inside-text').val(Math.round(main_width_inside*(100 - ui.values[ 0 ])))
                .attr('width-data',100 - ui.values[ 0 ]-1)
                .attr('left-data', parseInt(ui.values[ 0 ]))
                .css({'width' : parseInt( 100 - ui.values[ 0 ]-1) + '%'})           
                $('#column-1-inside').css({'width' :  parseInt( ui.values[ 0 ]) +'%' })
                $('#column-2-inside').css({'width' :  parseInt(100 - ui.values[ 0 ]-1) +'%'})
            }
        });
        $( ".column" ).sortable({
            connectWith: ".column",
            scroll: false,
            stop: function( event, ui ) {
                $('.column').find("li").each(function(i, el){

                    $(this).find(".row-data").val($(el).index())
                    $(this).find(".col-data").val($(this).parent().attr('col-data'))
                    $(this).find(".col-data-inside").val($(this).parent().attr('col-inside-data'))

                });
            }
        });

        $( ".column" ).disableSelection();
        $('.column > li').tsort({attr:'col-inside-data'});
        $('.column > li').each(function(){
        if($(this).attr('col-inside-data')=="4"){    
            $(this).appendTo('#column-2-lower' );
        }
        else if($(this).attr('col-inside-data')=="3"){    
            $(this).appendTo('#column-1-inside' );
        }else if($(this).attr('col-inside-data')=="2"){
            $(this).appendTo('#column-2-upper');
        }else{
            $(this).appendTo('#column-1');
        }

        })
        $('#column-1 > li').tsort({attr:'row-data'});
        $('#column-1 > li').each(function(){
            $(this).appendTo('#column-' + $(this).attr('col-data') );    

        })
        $('#column-2-upper > li').tsort({attr:'row-data'});
        $('#column-2-upper > li').each(function(){
            $(this).appendTo('#column-2-upper' );    

        })
        $('#column-2-lower > li').tsort({attr:'row-data'});
        $('#column-2-lower > li').each(function(){
            $(this).appendTo('#column-2-lower' );    

        })
        $('#column-1-inside > li').tsort({attr:'row-data'});
        $('#column-1-inside > li').each(function(){
            $(this).appendTo('#column-' + $(this).attr('col-data')+'-inside' );    

        })
        
    <?php } elseif ($_smarty_tpl->tpl_vars['layout']->value==3) {?>
        
        var main_width = 100 / 100;

        $( "#slider" ).slider({
            range: true,	  
            min: 0,
            max: 100,
            step: 1.00,
            values: [<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['column_1']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
,  <?php echo mb_convert_encoding(htmlspecialchars(($_smarty_tpl->tpl_vars['column_1']->value+$_smarty_tpl->tpl_vars['column_2']->value), ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
],
            slide: function( event, ui ) {

                $('#three-column-1').val(Math.round(main_width*(ui.values[ 0 ])))
                .attr('width-data', ui.values[ 0 ])
                .attr('left-data', 0)
                .css({'width' : parseInt( ui.values[ 0 ] ) + '%'})
                $('#three-column-2').val(Math.round(main_width*(ui.values[ 1 ] - ui.values[ 0 ])))
                .attr('width-data',ui.values[ 1 ] - ui.values[ 0 ])
                .attr('left-data', parseInt(ui.values[ 0 ]+10))
                .css({'width' : parseInt( ui.values[ 1 ] - ui.values[ 0 ]) + '%'})
                $('#three-column-3').val(Math.round(main_width*(100 - ui.values[ 1 ])))
                .attr('width-data',100 - ui.values[ 1 ]-1)
                .attr('left-data', parseInt(ui.values[ 1 ]))
                .css({'width' : parseInt( 100 - ui.values[ 1 ]-1) + '%'})
                $('.column-1').css({'width' :  parseInt( ui.values[ 0 ]) +'%' })
                $('.column-2').css({'width' : parseInt( ui.values[ 1 ] - ui.values[ 0 ])+'%'})
                $('.column-3').css({'width' :  parseInt(100 - ui.values[ 1 ]) +'%'})


            }
        });
        $( ".column" ).sortable({
            connectWith: ".column",
            scroll: false,
            stop: function( event, ui ) {
                $('.column').find("li").each(function(i, el){

                    $(this).find(".row-data").val($(el).index())
                    $(this).find(".col-data").val($(this).parent().attr('col-data'))

                });
            }
        });

        $( ".column" ).disableSelection();
        $('.column > li').tsort({attr:'row-data'});
        $('.column > li').each(function(){
            $(this).appendTo('.column-' + $(this).attr('col-data'));					
        })  
        
    <?php }?>
        

    
function duplicate_html(e){
    var portlet_id = $(e).parent().parent().attr('id');
    var col_data=$('#'+portlet_id +' .col-data').val();
    var row_data=$('#'+portlet_id +' .row-data').val();
    if("<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['layout']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"== 2){ 
        var col_data_inside=$('#'+portlet_id +' .col-data-inside').val();
    }else{
        var col_data_inside=4;
    }
    var data = parseInt($('#modal_value').val());
    data++;
    $('#modal_value').val(data);                                                            
    string = '<li id="portlet_'+ data +'_'+ data +'" class="portlet" col-data="" row-data="" col-inside-data="">';
    string += '<div class="portlet-header"><?php echo smartyTranslate(array('s'=>'Html Content','mod'=>'supercheckout'),$_smarty_tpl);?>
</div>';
    string += '<div id="portlet_content_'+  data+'_'+ data +'" class="portlet-content">';
    string += '<div class="text" style="overflow:visible !important;" >';
    string += '<a data-toggle="tooltip"  data-placement="top" data-original-title="<?php echo smartyTranslate(array('s'=>'Add new HTML content','mod'=>'supercheckout'),$_smarty_tpl);?>
" id="duplicate_button_'+  data+'_'+ data +'" data="'+ (data) +'" class="glyphicons more_windows" onClick="duplicate_html(this);" ><i></i></a>';
    string += '<a data-toggle="tooltip"  data-placement="top" data-original-title="<?php echo smartyTranslate(array('s'=>'Edit this HTML content','mod'=>'supercheckout'),$_smarty_tpl);?>
" id="modals-bootbox-prompt-'+  data+'_'+ data +'" data-toggle="modal" class="glyphicons edit bootbox-design-extra-html" onClick="dialogExtraHtml(this);"><i></i></a>';
    string += '<a data-toggle="tooltip"  data-placement="top" data-original-title="<?php echo smartyTranslate(array('s'=>'Remove this HTML content','mod'=>'supercheckout'),$_smarty_tpl);?>
" id="delete_button_'+  data+'_'+ data +'" data="'+  data+'_'+ data +'" data-toggle="modal" class="glyphicons remove"  onClick="remove_html(this);" ><i></i></a>';
    string += '</div>';
    
    string += '<input   type="hidden"  class="sort col-data" name="velocity_supercheckout[design][html]['+  data+'_'+ data +'][2_column][column]" value="'+ col_data +'" />';
    string += '<input   type="hidden"  class="sort row-data" name="velocity_supercheckout[design][html]['+  data+'_'+ data +'][2_column][row]" value="'+ row_data +'" />';
    string += '<input   type="hidden"  class="sort col-data-inside" name="velocity_supercheckout[design][html]['+  data+'_'+ data +'][2_column][column-inside]" value="'+ col_data_inside +'" />';
    
    
    string += '<input   type="hidden"  class="sort col-data" name="velocity_supercheckout[design][html]['+  data+'_'+ data +'][1_column][column]" value="'+ col_data +'" />';
    string += '<input   type="hidden"  class="sort row-data" name="velocity_supercheckout[design][html]['+  data+'_'+ data +'][1_column][row]" value="'+ row_data +'" />';
    string += '<input   type="hidden"  class="sort col-data-inside" name="velocity_supercheckout[design][html]['+  data+'_'+ data +'][1_column][column-inside]" value="'+ col_data_inside +'" />';
    
    
    string += '<input   type="hidden"  class="sort col-data" name="velocity_supercheckout[design][html]['+  data+'_'+ data +'][3_column][column]" value="'+ col_data +'" />';
    string += '<input   type="hidden"  class="sort row-data" name="velocity_supercheckout[design][html]['+  data+'_'+ data +'][3_column][row]" value="'+ row_data +'" />';
    string += '<input   type="hidden"  class="sort col-data-inside" name="velocity_supercheckout[design][html]['+  data+'_'+ data +'][3_column][column-inside]" value="'+ col_data_inside +'" />';

    if(<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['layout']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
== 3){ 
        string += '<input id="col_text_'+  data+'_'+ data +'"  type="text"  class="sort col-data" name="velocity_supercheckout[design][html]['+ data+'_'+ data +'][3_column][column]" value="'+ col_data +'" />';
        string += '<input id="row_text_'+  data+'_'+ data +'"  type="text"  class="sort row-data" name="velocity_supercheckout[design][html]['+ data+'_'+ data +'][3_column][row]" value="'+ row_data +'" />';
    }    
    if(<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['layout']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
== 2){ 
        string += '<input id="col_text_'+  data+'_'+ data +'"  type="text"  class="sort col-data" name="velocity_supercheckout[design][html]['+ data+'_'+ data +'][2_column][column]" value="'+ col_data +'" />';
        string += '<input id="row_text_'+  data+'_'+ data +'"  type="text"  class="sort row-data" name="velocity_supercheckout[design][html]['+ data+'_'+ data +'][2_column][row]" value="'+ row_data +'" />';
        string += '<input id="col_inside_text_'+  data+'_'+ data +'"  type="text"  class="sort col-data-inside" name="velocity_supercheckout[design][html]['+ data+'_'+ data +'][2_column][row]" value="'+ col_data_inside +'" />';
    }
    if(<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['layout']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
== 1){ 
        string += '<input id="row_text_'+  data+'_'+ data +'"  type="text"  class="sort row-data" name="velocity_supercheckout[design][html]['+ data+'_'+ data +'][2_column][row]" value="'+ row_data +'" />';
    }
    string += '</div>';
    string += '</li>';
    
    $(e).parent().parent().parent().parent().append(string);
    
    $('#extra_html_container').append('<input type="hidden" id="modals_bootbox_prompt_'+data+'_'+data+'" name="velocity_supercheckout[design][html]['+data+'_'+data+'][value]" value="" />') 

}

if($.cookie('designTab')==1){
    $('#velsof_supercheckout_container').find('li').removeClass('active');
    $("#velsof_tab_design").trigger('click');
    $.cookie('designTab',0);
}

$(document).ready(function() {
	
	
	//added below two lines to show answer of first FAQ
		$('#faq-span1').css('max-height','none');
		$('#answer1').css('display','block')
		
	// Carousal in FAQ
	$('.faq-row').off( 'click' ).on( 'click', function() {
		var element_id=this.id;
		var i=1;
		for(i=1;i<20;i++)
		{
			if(i!=element_id){
				//to hide answer of previously opened FAQ question
			$('#faq-span'+i).css('max-height','10px');
			$('#answer'+i).css('display','none');
			}
		}
		//added below to lines to show answer of question, when admin click on it
		$('#faq-span'+element_id).css('max-height','none');
		$('#answer'+element_id).css('display','block');
		
	});
	
    $('#tab_lang_translator').css('width',$('#tab_general_settings').width()+'px');
    if ($('input#supercheckout_test_mode').is(':checked')) {
        $('#front_module_url').show();
    }
    $('#supercheckout_test_mode').change(function() {
        if($(this).is(":checked")) {
            $('#front_module_url').show();
        }
        else
            $('#front_module_url').hide();
    });
});

        
</script>
<?php }} ?>
