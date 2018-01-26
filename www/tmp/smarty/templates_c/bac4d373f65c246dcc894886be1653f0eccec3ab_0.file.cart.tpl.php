<?php
/* Smarty version 3.1.29, created on 2018-01-23 18:59:34
  from "C:\OpenServer\domains\newstore.loc\views\default\cart\cart.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5a675be65fd751_32327654',
  'file_dependency' => 
  array (
    'bac4d373f65c246dcc894886be1653f0eccec3ab' => 
    array (
      0 => 'C:\\OpenServer\\domains\\newstore.loc\\views\\default\\cart\\cart.tpl',
      1 => 1484856007,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a675be65fd751_32327654 ($_smarty_tpl) {
?>

<h1>Cart</h1>
<?php if (!$_smarty_tpl->tpl_vars['rsProducts']->value) {?>
The cart is empty
<?php } else { ?>
    <h2>Order Data</h2>
<table>
        <tr>
        <td>
            N#
        </td>
        <td>
            Name
        </td>
        <td>
           Quantity
        </td>
        <td>
           Price
        </td>
        <td>
          Total Price
        </td>
        <td>
          Action
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
        <td>
           <?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration'] : null);?>

        </td>
        <td>
        <a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>
        </td>
        <td>
           <input type="text" id="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" name="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="1" onkeyup="conversionPrice(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
);"/>
        </td>
        <td>
           <span id="itemPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
">
               <?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>

           </span>
        </td>
        <td>
         <span id="itemRealPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
">
               <?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>

           </span>
        </td>
        <td>
                <a id="removeCart_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" alt="Remove from cart"  onClick="removeFromCart(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
); return false;"  href="#">REMOVE</a>
                <a id="addCart_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" alt="Add to cart" class="hideme" onClick="addToCart(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
); return false;"  href="#">RETURN</a>
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
<?php }
}
}
