<?php /* Smarty version Smarty-3.1.19, created on 2016-11-27 01:09:46
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/views/templates/admin/hs_point_of_sale_dashboard_abstract/calendar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15241342175839ddfa64e5f5-02870891%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '018a257a8c772b45ae935559123847a314843e19' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/views/templates/admin/hs_point_of_sale_dashboard_abstract/calendar.tpl',
      1 => 1480187258,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15241342175839ddfa64e5f5-02870891',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'action' => 0,
    'preselect_date_range' => 0,
    'hs_pos_i18n' => 0,
    'report_employees' => 0,
    'item' => 0,
    'id_employee' => 0,
    'date_from' => 0,
    'date_to' => 0,
    'current_date' => 0,
    'calendar' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5839ddfa68d597_02282275',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5839ddfa68d597_02282275')) {function content_5839ddfa68d597_02282275($_smarty_tpl) {?>
                     
<div id="dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div id="calendar" class="panel">
                <form action="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['action']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" method="post" id="calendar_form" name="calendar_form" class="form-inline clearfix">
                    <div class="btn-group pull-left">
                        <button type="button" name="submitDateDay" class="btn btn-default submitDateDay<?php if (isset($_smarty_tpl->tpl_vars['preselect_date_range']->value)&&$_smarty_tpl->tpl_vars['preselect_date_range']->value=='day') {?> active<?php }?>">
                            <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['day'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

                        </button>
                        <button type="button" name="submitDateMonth" class="btn btn-default submitDateMonth<?php if ((!isset($_smarty_tpl->tpl_vars['preselect_date_range']->value)||!$_smarty_tpl->tpl_vars['preselect_date_range']->value)||(isset($_smarty_tpl->tpl_vars['preselect_date_range']->value)&&$_smarty_tpl->tpl_vars['preselect_date_range']->value=='month')) {?> active<?php }?>">
                            <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['month'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

                        </button>
                        <button type="button" name="submitDateYear" class="btn btn-default submitDateYear<?php if (isset($_smarty_tpl->tpl_vars['preselect_date_range']->value)&&$_smarty_tpl->tpl_vars['preselect_date_range']->value=='year') {?> active<?php }?>">
                            <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['year'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

                        </button>                        
                    </div>
                    <div class="form-group list-employees">
                        <select name="report_id_employee" id="report_id_employee">
                            <option value="0"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['all_employees'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</option>
                            <?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['report_employees']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
                                <option value="<?php echo intval($_smarty_tpl->tpl_vars['item']->value['id_employee']);?>
" <?php if ($_smarty_tpl->tpl_vars['item']->value['id_employee']==$_smarty_tpl->tpl_vars['id_employee']->value) {?>selected="selected"<?php }?>><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['firstname'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
 <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['item']->value['lastname'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</option>
                            <?php } ?>
                        </select>
                    </div>
                    <input type="hidden" name="datepickerFrom" id="datepickerFrom" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['date_from']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" class="form-control">
                    <input type="hidden" name="datepickerTo" id="datepickerTo" value="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['date_to']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" class="form-control">
                    <input type="hidden" name="preselectDateRange" id="preselectDateRange" value="<?php if (isset($_smarty_tpl->tpl_vars['preselect_date_range']->value)) {?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['preselect_date_range']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php }?>" class="form-control">
                    <input type="hidden" name="current_date" id="current_date" value="<?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['current_date']->value);?>
" />
                    <div class="form-group pull-right">
                        <button id="datepickerExpand" class="btn btn-default" type="button">
                            <i class="icon-calendar-empty"></i>
                            <span class="hidden-xs">
                                <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['from'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

                                <strong class="text-info" id="datepicker-from-info"><?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['date_from']->value);?>
</strong>
                                <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['to'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

                                <strong class="text-info" id="datepicker-to-info"><?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['date_to']->value);?>
</strong>
                                <strong class="text-info" id="datepicker-diff-info"></strong>
                            </span>
                            <i class="icon-caret-down"></i>
                        </button>
                    </div>
                    <?php echo $_smarty_tpl->tpl_vars['calendar']->value;?>

                </form>
            </div>
        </div>
    </div>
</div><?php }} ?>
