<?php
/* Smarty version 3.1.29, created on 2018-01-30 19:48:14
  from "C:\OpenServer\domains\newstore.loc\views\default\cart\order.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5a70a1ced32114_13365977',
  'file_dependency' => 
  array (
    'ddc051b764db47f028a66ccd594612e85d8f9b00' => 
    array (
      0 => 'C:\\OpenServer\\domains\\newstore.loc\\views\\default\\cart\\order.tpl',
      1 => 1517330878,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:user/login.tpl' => 1,
    'file:user/register.tpl' => 1,
    'file:user/details.tpl' => 1,
  ),
),false)) {
function content_5a70a1ced32114_13365977 ($_smarty_tpl) {
?>

<h1>Order</h1>
<?php if (!$_smarty_tpl->tpl_vars['rsProducts']->value) {?>
The cart is empty
<?php } else { ?>
    <h2>Order Data</h2>
<form id="frmOrder" method="POST" action="/cart/saveorder/">
<table border="0">
      <tr>
        <td width="5%" >
            N#
        </td>
        <td width="30%">
            Name
        </td>
        <td width="15%">
           Quantity
        </td>
        <td width="15%">
           Price
        </td>
        <td width="15%">
          Total Price
        </td>

    </tr>
<?php
$_from = $_smarty_tpl->tpl_vars['rsProducts']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_products_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products'] : false;
$__foreach_products_0_saved_item = isset($_smarty_tpl->tpl_vars['item']) ? $_smarty_tpl->tpl_vars['item'] : false;
$_smarty_tpl->tpl_vars['item'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['__smarty_foreach_products'] = new Smarty_Variable(array('iteration' => 0));
$_smarty_tpl->tpl_vars['item']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
$_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']++;
$__foreach_products_0_saved_local_item = $_smarty_tpl->tpl_vars['item'];
?>
    <tr>
        <td >
           <?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration'] : null);?>

        </td>
        <td >
        <a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>
        </td>
        <td >
        <span id="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"></span>
        <input type="hidden" name="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['cnt'];?>
">
              <?php echo $_smarty_tpl->tpl_vars['item']->value['cnt'];?>

        </td>
        <td>
              <span id="itemPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"></span>
              <input type="hidden" name="itemPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
">
                <?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>

              
        </td>
        <td >
          <span id="itemRealPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"></span>
          <input type="hidden" name="itemRealPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['realPrice'];?>
">
          <?php echo $_smarty_tpl->tpl_vars['item']->value['realPrice'];?>

        </td>

    </tr>
   <?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_products_0_saved_local_item;
}
if ($__foreach_products_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_foreach_products'] = $__foreach_products_0_saved;
}
if ($__foreach_products_0_saved_item) {
$_smarty_tpl->tpl_vars['item'] = $__foreach_products_0_saved_item;
}
?>
</table>

<?php if (isset($_smarty_tpl->tpl_vars['userData']->value)) {
$_smarty_tpl->tpl_vars['buttonClass'] = new Smarty_Variable('', null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'buttonClass', 0);?>

<h2>Customer Data</h2>

<div class="orderUserInfoBox" <?php echo $_smarty_tpl->tpl_vars['buttonClass']->value;?>
>

      <?php $_smarty_tpl->tpl_vars['name'] = new Smarty_Variable($_smarty_tpl->tpl_vars['userData']->value['name'], null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'name', 0);?>
      <?php $_smarty_tpl->tpl_vars['address'] = new Smarty_Variable($_smarty_tpl->tpl_vars['userData']->value['address'], null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'address', 0);?>
      <?php $_smarty_tpl->tpl_vars['phone'] = new Smarty_Variable($_smarty_tpl->tpl_vars['userData']->value['phone'], null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, 'phone', 0);?>
    
    <table>

      <tr>
          <td>
            Name:
          </td>
          <td>
            <input type="text" id="name" name="name" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
">
          </td>
      </tr>
      <tr>
          <td>
           Address:
          </td>
          <td>
            <textarea id="address" name="address" ><?php echo $_smarty_tpl->tpl_vars['address']->value;?>
</textarea>
          </td>
      </tr>
      <tr>
          <td>
            Phone:
          </td>
      <td>
          <input type="text" id="phone" name="phone" value="<?php echo $_smarty_tpl->tpl_vars['phone']->value;?>
">
      </td>
      </tr>
    </table>

<input { $buttonClass } type="button" value="Place your order" onClick="saveOrder();" />

</div>

<?php } else { ?>
      <div id="loginBox">

        <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:user/login.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

      </div>
      <div id="registerBox">
        
      <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:user/register.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

      <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:user/details.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

      </div>
<input { $buttonClass } type="button" value="Place your order" onClick="saveOrder();" />


<?php }?>
</form>
<?php }
}
}
