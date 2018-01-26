<?php
/* Smarty version 3.1.29, created on 2017-01-18 22:18:47
  from "C:\OpenServer\domains\netstore.loc\views\default\product.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_587fbf97b112f8_14555317',
  'file_dependency' => 
  array (
    'e666af4654353ffbf83e56399e19b5a996424e1b' => 
    array (
      0 => 'C:\\OpenServer\\domains\\netstore.loc\\views\\default\\product.tpl',
      1 => 1484767041,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_587fbf97b112f8_14555317 ($_smarty_tpl) {
?>

<h3>  <?php echo $_smarty_tpl->tpl_vars['rsProduct']->value[0]['name'];?>
</h3>

    
      <img width="575" src="/www/images/products/<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value[0]['image'];?>
.jpg"witdh="100"/>
       <p>Pice: <?php echo $_smarty_tpl->tpl_vars['rsProduct']->value[0]['price'];?>
 MDL   
           <a id="removeCart_<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value[0]['id'];?>
" alt="Remove from cart" <?php if (!$_smarty_tpl->tpl_vars['itemInCart']->value) {?>style="display:none;"<?php }?> onClick="removeFromCart(<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value[0]['id'];?>
); return false;"  href="#">REMOVE_FROM_CART</a></p>
           <a id="addCart_<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value[0]['id'];?>
" alt="Add to cart" <?php if ($_smarty_tpl->tpl_vars['itemInCart']->value) {?>style="display:none;"<?php }?> onClick="addToCart(<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value[0]['id'];?>
); return false;"  href="#">ADD_TO_CART</a></p>
       <p> Products Name <?php echo $_smarty_tpl->tpl_vars['rsProduct']->value[0]['description'];?>
</p>
<?php }
}
