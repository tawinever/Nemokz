<?php /* Smarty version Smarty-3.1.19, created on 2016-11-27 01:09:53
         compiled from "/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/views/templates/admin/hs_point_of_sale_new_sale_abstract/currency.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1913271865839de01a802a3-71572760%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '15957810715fb5367529e49f047bad4455ca3815' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/nemo.dev/modules/hspointofsalepro/abstract/views/templates/admin/hs_point_of_sale_new_sale_abstract/currency.tpl',
      1 => 1480187258,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1913271865839de01a802a3-71572760',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'currencies' => 0,
    'action_form' => 0,
    'currency' => 0,
    'b_currency' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5839de01a96640_89562565',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5839de01a96640_89562565')) {function content_5839de01a96640_89562565($_smarty_tpl) {?>

<?php if (count($_smarty_tpl->tpl_vars['currencies']->value)>1) {?>
    <form class="setCurrency bootstrap" action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['action_form']->value, ENT_QUOTES, 'UTF-8', true);?>
" enctype="multipart/form-data" method="post">
        <input type="hidden" value="0" class="is_reset_payment" name="is_reset_payment">
        <select name ='id_currency' class="changeCurrency fixed-width-xl">
            <?php  $_smarty_tpl->tpl_vars['b_currency'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['b_currency']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['currencies']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['b_currency']->key => $_smarty_tpl->tpl_vars['b_currency']->value) {
$_smarty_tpl->tpl_vars['b_currency']->_loop = true;
?>
                <option <?php if ($_smarty_tpl->tpl_vars['currency']->value->id==$_smarty_tpl->tpl_vars['b_currency']->value['id_currency']) {?>selected='selected'<?php }?> value='<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['b_currency']->value['id_currency'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
'>
                    <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['b_currency']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
 - <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['b_currency']->value['sign'], ENT_QUOTES, 'UTF-8', true);?>

                </option>
            <?php } ?>
        </select>
    </form>
<?php }?>
<?php }} ?>
