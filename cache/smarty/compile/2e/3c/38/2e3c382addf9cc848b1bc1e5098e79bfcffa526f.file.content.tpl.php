<?php /* Smarty version Smarty-3.1.19, created on 2016-11-27 01:09:26
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/views/templates/admin/hs_point_of_sale_welcome_page_abstract/content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18559477145839dde6200f37-12398935%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2e3c382addf9cc848b1bc1e5098e79bfcffa526f' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/views/templates/admin/hs_point_of_sale_welcome_page_abstract/content.tpl',
      1 => 1480187258,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18559477145839dde6200f37-12398935',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link_module_homepage' => 0,
    'is_prestashop_16' => 0,
    'module_display_name' => 0,
    'module_version' => 0,
    'hs_pos_i18n' => 0,
    'module_name_text' => 0,
    'module_version_text' => 0,
    'change_logs' => 0,
    'version' => 0,
    'change_log' => 0,
    'log' => 0,
    'rating_link' => 0,
    'addon_link' => 0,
    'prestashop_addons_link' => 0,
    'link_to_addon_page' => 0,
    'prestamonster_link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5839dde6291e41_93133038',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5839dde6291e41_93133038')) {function content_5839dde6291e41_93133038($_smarty_tpl) {?>

<form id="welcome_page" class="form-horizontal" enctype="multipart/form-data" method="post" action="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['link_module_homepage']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
">
    <div  class="panel <?php if ((!$_smarty_tpl->tpl_vars['is_prestashop_16']->value)) {?>prestashop_15<?php }?>">

        <div class="form-group ">
            <p class="title_block">
                <?php $_smarty_tpl->tpl_vars['module_name_text'] = new Smarty_variable(('<span class="module_name">').($_smarty_tpl->tpl_vars['module_display_name']->value), null, 0);?>
                <?php $_smarty_tpl->tpl_vars['module_version_text'] = new Smarty_variable(($_smarty_tpl->tpl_vars['module_version']->value).('</span>'), null, 0);?>
                <?php echo sprintf(preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['hs_pos_i18n']->value['welcome_to']),$_smarty_tpl->tpl_vars['module_name_text']->value,$_smarty_tpl->tpl_vars['module_version_text']->value);?>

            </p>
            <p class="description">
                <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['an_awesome_prestashop_solution_provided_by_prestamonster'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

            </p>

        </div>
        <div class="form-group ">
            <p class="title_block">
                <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['change_log'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

            </p>
            <?php  $_smarty_tpl->tpl_vars['change_log'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['change_log']->_loop = false;
 $_smarty_tpl->tpl_vars['version'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['change_logs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['change_log']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['change_log']->key => $_smarty_tpl->tpl_vars['change_log']->value) {
$_smarty_tpl->tpl_vars['change_log']->_loop = true;
 $_smarty_tpl->tpl_vars['version']->value = $_smarty_tpl->tpl_vars['change_log']->key;
 $_smarty_tpl->tpl_vars['change_log']->index++;
 $_smarty_tpl->tpl_vars['change_log']->first = $_smarty_tpl->tpl_vars['change_log']->index === 0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['list_change_log']['first'] = $_smarty_tpl->tpl_vars['change_log']->first;
?>
                <div class="col-lg-9 <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['list_change_log']['first']) {?>first<?php } else { ?>other<?php }?>">
                    <span class="under_line"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['version']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</span>
                    <ul>
                        <?php  $_smarty_tpl->tpl_vars['log'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['log']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['change_log']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['log']->key => $_smarty_tpl->tpl_vars['log']->value) {
$_smarty_tpl->tpl_vars['log']->_loop = true;
?>
                            <li> - <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['log']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</li>
                            <?php } ?>
                    </ul>
                    <?php if (count($_smarty_tpl->tpl_vars['change_logs']->value)>1&&$_smarty_tpl->getVariable('smarty')->value['foreach']['list_change_log']['first']) {?>
                        <p class='read_more'><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['read_more'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</p>
                    <?php }?>
                </div>
            <?php } ?>
        </div>
        <div class="form-group ">
            <p class="title_block">
                <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['share_your_reviews'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

            </p>
            <p class="sub_title">
                <?php $_smarty_tpl->tpl_vars['rating_link'] = new Smarty_variable((((('<span class="vote_star"><a href="').(PosConstants::LINK_TO_ADDON_PAGE)).('" target="_blank">')).($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['rating_icon'])).('</a></span>'), null, 0);?>
                <?php $_smarty_tpl->tpl_vars['addon_link'] = new Smarty_variable((((('<a href="').(PosConstants::LINK_TO_ADDON_PAGE)).('" target="_blank">')).('addons.prestashop.com')).('</a>'), null, 0);?>
                <?php ob_start();?><?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['rating_link']->value);?>
<?php $_tmp1=ob_get_clean();?><?php ob_start();?><?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['addon_link']->value);?>
<?php $_tmp2=ob_get_clean();?><?php ob_start();?><?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['module_display_name']->value);?>
<?php $_tmp3=ob_get_clean();?><?php echo sprintf(preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['hs_pos_i18n']->value['add_your_on_to_help_us_improve_continuously']),$_tmp1,$_tmp2,$_tmp3);?>

            </p>
            <p class="sub_title">
                <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['and_as_a_result_you_will_get_more_values_from_us'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

            </p>
            <p class="description">
                <?php $_smarty_tpl->tpl_vars['prestashop_addons_link'] = new Smarty_variable((((('<a href="').(PosConstants::LINK_TO_ADDON_PAGE)).('" target="_blank">')).($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['prestashop_addons'])).('</a>'), null, 0);?>
                <?php ob_start();?><?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['prestashop_addons_link']->value);?>
<?php $_tmp4=ob_get_clean();?><?php echo sprintf(preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['hs_pos_i18n']->value['just_log_into_with_your_credentials_then_visit_this_page_and_look_for_the_right_order_number']),$_tmp4);?>

            </p>
            <a href="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['link_to_addon_page']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" target="_blank">
                <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['link_to_addon_page']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

            </a>
        </div>
        <div class="form-group ">
            <p class="title_block">
                <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['looking_for_even_better_prestashop_modules'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

            </p>
            <p class="sub_title">
                <?php $_smarty_tpl->tpl_vars['prestamonster_link'] = new Smarty_variable((('<a href="').(PosConstants::LINK_TO_PRESTAMONSTER)).('" target="_blank">PrestaMonster</a>'), null, 0);?>
                <?php ob_start();?><?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['prestamonster_link']->value);?>
<?php $_tmp5=ob_get_clean();?><?php echo sprintf(preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['hs_pos_i18n']->value['take_a_look_at_all_modules_developed_by']),$_tmp5);?>

            </p>

        </div>	

        <div class="form-group ">
            <div class="col-lg-9">
                <button class="goto_hompage"><?php ob_start();?><?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['module_display_name']->value);?>
<?php $_tmp6=ob_get_clean();?><?php echo sprintf(mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['thank_you_and_take_me_to'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8'),$_tmp6);?>
</button>
            </div>

        </div>

    </div>
</form>

<script>
    $(document).ready(function () {
        $('#welcome_page .other').hide();
        $(document).on('click', '#welcome_page .read_more', function () {
            $(this).hide();
            $('#welcome_page .other').show();
        });
    });
</script>
<?php }} ?>
