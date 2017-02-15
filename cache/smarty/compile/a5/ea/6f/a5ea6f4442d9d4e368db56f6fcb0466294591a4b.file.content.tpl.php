<?php /* Smarty version Smarty-3.1.19, created on 2016-11-27 01:10:23
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/views/templates/admin/hs_point_of_sale_reports_abstract/content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21471124445839de1f4d5417-42168186%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a5ea6f4442d9d4e368db56f6fcb0466294591a4b' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/views/templates/admin/hs_point_of_sale_reports_abstract/content.tpl',
      1 => 1480187258,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21471124445839de1f4d5417-42168186',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'modules' => 0,
    'durations' => 0,
    'js_path' => 0,
    'addons_url' => 0,
    'hs_pos_i18n' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5839de1f4f2736_43975484',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5839de1f4f2736_43975484')) {function content_5839de1f4f2736_43975484($_smarty_tpl) {?>

<?php if (isset($_smarty_tpl->tpl_vars['modules']->value)&&!empty($_smarty_tpl->tpl_vars['modules']->value)) {?>
    <div class="pos-reports" id="pos-reports"></div>    
    <script type="text/javascript">        
		moduleList = <?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['json_encode'][0][0]->jsonEncode($_smarty_tpl->tpl_vars['modules']->value));?>
;
		durations = <?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['json_encode'][0][0]->jsonEncode($_smarty_tpl->tpl_vars['durations']->value));?>
;
		
		itemText = 
		{
			apply: stPos.lang.apply,
			cancel: stPos.lang.cancel,
			thereWasAConnectingProblem: stPos.lang.there_was_a_connecting_problem,
			requestedPageNotFound: stPos.lang.requested_page_not_found,
			internalServerError: stPos.lang.internal_server_error,
			requestTimeOut: stPos.lang.request_time_out,
			oopsSomethingGoesWrong: stPos.lang.oops_something_goes_wrong
		};
       
        DateUtilities = {
            pad(value, length) {
                while (value.length < length)
                    value = "0" + value;
                return value;
            },
            clone(date) {       
                return new Date(date.getFullYear(), date.getMonth(), date.getDate(), date.getHours(), date.getMinutes(), date.getSeconds(), date.getMilliseconds());
            },
            toString(date) {
                return date.getFullYear() + "-" + DateUtilities.pad((date.getMonth()+1).toString(), 2) + "-" + DateUtilities.pad(date.getDate().toString(), 2);
            },
            toDayOfMonthString(date) {
                return DateUtilities.pad(date.getDate().toString());
            },
            toMonthAndYearString(date, months) {
                return months[date.getMonth()] + " " + date.getFullYear();
            },
            moveToDayOfWeek(date, dayOfWeek) {
                while (date.getDay() !== dayOfWeek)
                    date.setDate(date.getDate()-1);
                return date;
            },
            isSameDay(first, second) {
                return first.getFullYear() === second.getFullYear() && first.getMonth() === second.getMonth() && first.getDate() === second.getDate();
            },
            isBefore(first, second) {
                return new Date(first).getTime() < new Date(second).getTime();
            },
            isAfter(first, second) {
                return new Date(first).getTime() > new Date(second).getTime();
            }
        };
		
		
</script>
<script>
    
        function handleError() {
            alert('The app stops due to some files are missed.');        
        }
        $(document).ready(function (){
            
            window.addEventListener("error", handleError, true);   
        })
        
    
</script>
<script src="<?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['js_path']->value);?>
reports.js"></script>

<?php } else { ?>
    <p>
        <i class="icon-external-link-sign"></i>
        <a href="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['addons_url']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" target="_blank"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['click_here_to_pick_up_your_own_reports'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</a>
    </p>
<?php }?><?php }} ?>
