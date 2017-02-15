<?php /* Smarty version Smarty-3.1.19, created on 2016-12-13 19:57:55
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/pdf/models/templates/receipt/content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:887862729584ffe63800434-84187366%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '439284b45b8cabc7460bac088ba6c4d04ec5c220' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/pdf/models/templates/receipt/content.tpl',
      1 => 1480187258,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '887862729584ffe63800434-84187366',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'customer' => 0,
    'hs_pos_i18n' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_584ffe6381cb17_05113028',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584ffe6381cb17_05113028')) {function content_584ffe6381cb17_05113028($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate ("./tab_style.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="ticket_content" style="font-size: 8pt; width: 100%;">
    <!-- ADDRESSES -->
    <?php if (!$_smarty_tpl->tpl_vars['customer']->value->isDefaultCustomer()&&PosConfiguration::get('POS_SHOW_CUS_INFO_ON_RECEIPT')) {?>
        <?php echo $_smarty_tpl->getSubTemplate ("./tab_addresses.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php }?>
    <!-- END ADDRESSES -->
    <table class="table" cellspacing="0" cellpadding="0">
        <tr>
            <td class="center title"><?php echo preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['hs_pos_i18n']->value['receipt']);?>
</td>
        </tr>
    </table>
    <!-- ORDER INFO TAB -->
    <?php echo $_smarty_tpl->getSubTemplate ("./tab_order_info.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <!-- / ORDER INFO TAB -->
    <br />
    <!-- PRODUCTS TAB -->
    <?php echo $_smarty_tpl->getSubTemplate ("./tab_product.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <!-- / PRODUCTS TAB -->
    <?php echo $_smarty_tpl->getSubTemplate ("./tab_summary.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <br />
    <!-- PAYMENT TAB -->
    <?php echo $_smarty_tpl->getSubTemplate ("./tab_payment.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <!-- / PAYMENT TAB -->
    <!-- NOTE TAB -->
    <?php echo $_smarty_tpl->getSubTemplate ("./tab_note.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <!-- / NOTE TAB -->
    <!-- SIGNATURE TAB -->
    <?php if (Configuration::get('POS_RECEIPT_SHOW_SIGNATURE')) {?>
        <?php echo $_smarty_tpl->getSubTemplate ("./tab_signature.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php }?>
    <!-- / SIGNATURE TAB -->
    <br />
    <!-- FOOTER TAB -->
    <?php echo $_smarty_tpl->getSubTemplate ("./tab_footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <!-- / FOOTER TAB -->
</div>
<?php }} ?>
