<?php /* Smarty version Smarty-3.1.19, created on 2016-11-27 01:09:53
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/views/templates/admin/hs_point_of_sale_new_sale_abstract/cart_summary.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18289635065839de01b99330-40659566%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f7691acd4cb24e9bb07e8d2d377d5bd54a4f13b4' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/views/templates/admin/hs_point_of_sale_new_sale_abstract/cart_summary.tpl',
      1 => 1480187258,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18289635065839de01b99330-40659566',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'order_summary' => 0,
    'hs_pos_i18n' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5839de01bce772_33756967',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5839de01bce772_33756967')) {function content_5839de01bce772_33756967($_smarty_tpl) {?>

<form class="order_summary clear">
    <table class="empty" style="<?php if (count($_smarty_tpl->tpl_vars['order_summary']->value['products'])>0) {?>display:none<?php }?>">
        <tr>
            <td>
                <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['no_products'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

            </td>
        </tr>
    </table>
    <table class="has_product bordered" style="<?php if (count($_smarty_tpl->tpl_vars['order_summary']->value['products'])==0) {?>display:none<?php }?>">
        <tr>
            <td>
                <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['total_products'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

            </td>
            <td>
                <span class="total" id="cart_block_products_total"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['order_summary']->value['total_products']),$_smarty_tpl);?>
</span>
                <input type="hidden" class="pos_product_total_price" value="<?php echo floatval($_smarty_tpl->tpl_vars['order_summary']->value['total_products_wt']);?>
" />
            </td>
            <td class="delete-cell">&nbsp;</td>
        </tr>

        <?php if ($_smarty_tpl->tpl_vars['order_summary']->value['total_discounts']>0) {?>
            <tr>
                <td>
                    <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['total_discount_order'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

                </td>
                <td>
                    -<span class="reduction"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['order_summary']->value['total_discounts']),$_smarty_tpl);?>
</span>
                </td>
                <td class="delete-cell">&nbsp;</td>
            </tr>
        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['order_summary']->value['total_discounts_products']>0) {?>
            <tr>
                <td>
                    <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['total_discount_products'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

                </td>
                <td>
                    -<span class="reduction"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['order_summary']->value['total_discounts_products']),$_smarty_tpl);?>
</span>
                </td>
                <td class="delete-cell">&nbsp;</td>
            </tr>
        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['order_summary']->value['total_shipping']>0) {?>
            <tr>
                <td>
                    <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['shipping_cost'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

                </td>
                <td>
                    <span class="shipping_cost"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['order_summary']->value['total_shipping']),$_smarty_tpl);?>
</span>
                </td>
                <td class="delete-cell">&nbsp;</td>
            </tr>
        <?php }?>

        <tr>

            <td>
                <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['hs_pos_i18n']->value['total_tax'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

            </td>
            <td>
                <span class="tax_cost"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['order_summary']->value['total_tax']),$_smarty_tpl);?>
</span>
            </td>
            <td class="delete-cell">&nbsp;</td>
        </tr>

        <input type="hidden" value="<?php echo floatval($_smarty_tpl->tpl_vars['order_summary']->value['total_price']);?>
" name="total_order" class="total_order">
    </table>
</form><?php }} ?>
