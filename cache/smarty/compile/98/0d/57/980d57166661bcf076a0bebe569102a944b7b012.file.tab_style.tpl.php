<?php /* Smarty version Smarty-3.1.19, created on 2016-12-13 19:57:55
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/pdf/models/templates/receipt/tab_style.tpl" */ ?>
<?php /*%%SmartyHeaderCode:573333151584ffe63821684-84792866%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '980d57166661bcf076a0bebe569102a944b7b012' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/pdf/models/templates/receipt/tab_style.tpl',
      1 => 1480187258,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '573333151584ffe63821684-84792866',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'font_size' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_584ffe6383bea0_94673683',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584ffe6383bea0_94673683')) {function content_584ffe6383bea0_94673683($_smarty_tpl) {?>
<style>
    .content_title{
        font-family: "Times New Roman", Times, serif;
        font-weight: bolder; 
        font-size: <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['font_size']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
;
        text-align: left;
    }
    .title{
        font-family: "Times New Roman", Times, serif;
        font-weight: bolder; 
        font-size: <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['font_size']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
;
        text-align: center;
        text-transform: uppercase;
        line-height: 300% !important;
    }
    .left {
        text-align: left;
    }
    .right{
        text-align: right;
    }
    .center{
        text-align: center;
    }
    .star{
        font-family: "Times New Roman", Times, serif;
        font-size: 6pt;
    }
    .table{
        font-family: "Times New Roman", Times, serif;
        width: 100%;
        font-size: <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['font_size']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
;
        line-height: 150%;
    }
    .table .product_name{
        font-family: "Times New Roman", Times, serif;
        width: 100%;
        font-size: <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['font_size']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
;
        line-height: 150%;
    }
    .table_header{
        font-family: "Times New Roman", Times, serif;
        color: #000;
        font-size: <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['font_size']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
;
        font-weight: bold; 
        border-top: 0.5px solid #000; 
        border-bottom: 0.5px solid #000;
    }
    .total_amount{
        font-weight: bold;
        text-align: right;
    }
    .custom_text{
        font-family: "Times New Roman", Times, serif;
        text-align: left;
        font-size: <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['font_size']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
;
    }
    .footer_thankyou, .footer_url{
        font-family: "Times New Roman", Times, serif;
        font-size: <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['font_size']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
;
        text-align: center;
    }
    .total_left {
        width: 60%;
        text-align: left;
    }
    .total_right{
        width: 40%;
        text-align: right
    }
</style><?php }} ?>
