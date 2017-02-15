<?php /* Smarty version Smarty-3.1.19, created on 2016-12-13 19:57:47
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/views/templates/admin/hs_point_of_sale_new_sale_abstract/summary_product_line.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1471563047584ffe5b861e40-41750810%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '11afbeede0facadd85af70fd568d53cbc602613c' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/views/templates/admin/hs_point_of_sale_new_sale_abstract/summary_product_line.tpl',
      1 => 1480187258,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1471563047584ffe5b861e40-41750810',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'product' => 0,
    'hs_pos_i18n' => 0,
    'order' => 0,
    'use_tax' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_584ffe5b8e4336_36616666',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_584ffe5b8e4336_36616666')) {function content_584ffe5b8e4336_36616666($_smarty_tpl) {?>

<tr>
    <td><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['product_id'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
    <td><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['product_name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php if (isset($_smarty_tpl->tpl_vars['product']->value['product_reference'])&&!empty($_smarty_tpl->tpl_vars['product']->value['product_reference'])) {?> (<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['reference'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
 <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['product_reference'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
)<?php }?></td>
    <td>
        <?php if (isset($_smarty_tpl->tpl_vars['product']->value['gift'])) {?>
            <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['gift'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

        <?php } else { ?>
            <?php if ((isset($_smarty_tpl->tpl_vars['product']->value['reduction_amount'])&&$_smarty_tpl->tpl_vars['product']->value['reduction_amount']>0)||(isset($_smarty_tpl->tpl_vars['product']->value['reduction_percent'])&&$_smarty_tpl->tpl_vars['product']->value['reduction_percent']>0)) {?>
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('currency'=>$_smarty_tpl->tpl_vars['order']->value->id_currency,'price'=>$_smarty_tpl->tpl_vars['product']->value['price_without_specific_price']),$_smarty_tpl);?>

            <?php } else { ?>
                <?php if ($_smarty_tpl->tpl_vars['use_tax']->value) {?>
                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('currency'=>$_smarty_tpl->tpl_vars['order']->value->id_currency,'price'=>$_smarty_tpl->tpl_vars['product']->value['unit_price_tax_incl']),$_smarty_tpl);?>

                <?php } else { ?>
                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('currency'=>$_smarty_tpl->tpl_vars['order']->value->id_currency,'price'=>$_smarty_tpl->tpl_vars['product']->value['unit_price_tax_excl']),$_smarty_tpl);?>

                <?php }?>
            <?php }?>
        <?php }?>
    </td>
    <td><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['product_quantity'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</td>
    <td>
        <?php if (isset($_smarty_tpl->tpl_vars['product']->value['gift'])) {?>
            <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['gift'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

        <?php } else { ?>
            <?php if ((isset($_smarty_tpl->tpl_vars['product']->value['reduction_amount'])&&$_smarty_tpl->tpl_vars['product']->value['reduction_amount']>0)) {?>
                -<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('currency'=>$_smarty_tpl->tpl_vars['order']->value->id_currency,'price'=>$_smarty_tpl->tpl_vars['product']->value['reduction_amount']),$_smarty_tpl);?>

                <?php $_smarty_tpl->tpl_vars["is_discount"] = new Smarty_variable(1, null, 0);?>
            <?php } elseif ((isset($_smarty_tpl->tpl_vars['product']->value['reduction_percent'])&&$_smarty_tpl->tpl_vars['product']->value['reduction_percent']>0)) {?>
                -<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['reduction_percent'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
%
                <?php $_smarty_tpl->tpl_vars["is_discount"] = new Smarty_variable(1, null, 0);?>
            <?php } else { ?>
                --
            <?php }?>
        <?php }?>
    </td>
    <td>
        <?php if (isset($_smarty_tpl->tpl_vars['product']->value['gift'])) {?>
            <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['gift'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

        <?php } else { ?>
                <?php if ($_smarty_tpl->tpl_vars['use_tax']->value) {?>
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('currency'=>$_smarty_tpl->tpl_vars['order']->value->id_currency,'price'=>$_smarty_tpl->tpl_vars['product']->value['total_price_tax_incl']),$_smarty_tpl);?>

            <?php } else { ?> 
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayPrice'][0][0]->displayPriceSmarty(array('currency'=>$_smarty_tpl->tpl_vars['order']->value->id_currency,'price'=>$_smarty_tpl->tpl_vars['product']->value['total_price_tax_excl']),$_smarty_tpl);?>

            <?php }?>
        <?php }?>
</tr>
<?php }} ?>
