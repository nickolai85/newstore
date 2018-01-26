<?php
/* Smarty version 3.1.29, created on 2018-01-23 18:43:55
  from "C:\OpenServer\domains\newstore.loc\views\default\product.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5a67583b8b1116_02240880',
  'file_dependency' => 
  array (
    'f0d06bc7bf7261ac9cc0007fe009fca2c0b56144' => 
    array (
      0 => 'C:\\OpenServer\\domains\\newstore.loc\\views\\default\\product.tpl',
      1 => 1516722231,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a67583b8b1116_02240880 ($_smarty_tpl) {
?>

<h3>  <?php echo $_smarty_tpl->tpl_vars['rsProduct']->value[0]['name'];?>
</h3>

      <img width="575" src="/www/images/products/<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value[0]['image'];?>
.jpg"witdh="100"/>
       <p>Pice: <?php echo $_smarty_tpl->tpl_vars['rsProduct']->value[0]['price'];?>
 MDL   
           <a id="removeCart_<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value[0]['id'];?>
"  href="#" onClick="removeFromCart(<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value[0]['id'];?>
); return false;" alt="Remove from cart" <?php if (!$_smarty_tpl->tpl_vars['itemInCart']->value) {?>style="display:none;"<?php }?>  >REMOVE_FROM_CART</a></p>
           
           <a id="addCart_<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value[0]['id'];?>
" href="#" onClick="addToCart(<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value[0]['id'];?>
); return false;" alt="Add to cart" <?php if ($_smarty_tpl->tpl_vars['itemInCart']->value) {?>style="display:none;"<?php }?>   >ADD_TO_CART</a></p>
       <p> Products Name <?php echo $_smarty_tpl->tpl_vars['rsProduct']->value[0]['description'];?>
</p>





    
<?php }
}
