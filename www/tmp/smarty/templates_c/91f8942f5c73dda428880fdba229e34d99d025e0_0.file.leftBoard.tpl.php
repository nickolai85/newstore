<?php
/* Smarty version 3.1.29, created on 2018-01-12 01:38:16
  from "C:\OpenServer\domains\newsurvey.loc\views\default\leftBoard.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5a57e7580f9ac8_32549053',
  'file_dependency' => 
  array (
    '91f8942f5c73dda428880fdba229e34d99d025e0' => 
    array (
      0 => 'C:\\OpenServer\\domains\\newsurvey.loc\\views\\default\\leftBoard.tpl',
      1 => 1485371455,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a57e7580f9ac8_32549053 ($_smarty_tpl) {
?>

		<div id="leftBoard">
                                                
		
                    
                    
				<div id="menuCaption">
				
				<?php
$_from = $_smarty_tpl->tpl_vars['rsCategories']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_item_0_saved_item = isset($_smarty_tpl->tpl_vars['item']) ? $_smarty_tpl->tpl_vars['item'] : false;
$_smarty_tpl->tpl_vars['item'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['item']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
$__foreach_item_0_saved_local_item = $_smarty_tpl->tpl_vars['item'];
?>
                                    <a href="/category/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a><br />
                                        <?php if (isset($_smarty_tpl->tpl_vars['item']->value['children'])) {?>
                                            <?php
$_from = $_smarty_tpl->tpl_vars['item']->value['children'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_itemChild_1_saved_item = isset($_smarty_tpl->tpl_vars['itemChild']) ? $_smarty_tpl->tpl_vars['itemChild'] : false;
$_smarty_tpl->tpl_vars['itemChild'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['itemChild']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['itemChild']->value) {
$_smarty_tpl->tpl_vars['itemChild']->_loop = true;
$__foreach_itemChild_1_saved_local_item = $_smarty_tpl->tpl_vars['itemChild'];
?>
                                                   --<a href="/category/<?php echo $_smarty_tpl->tpl_vars['itemChild']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['name'];?>
</a><br />
                                            <?php
$_smarty_tpl->tpl_vars['itemChild'] = $__foreach_itemChild_1_saved_local_item;
}
if ($__foreach_itemChild_1_saved_item) {
$_smarty_tpl->tpl_vars['itemChild'] = $__foreach_itemChild_1_saved_item;
}
?>
                                        <?php }?>
                                <?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved_local_item;
}
if ($__foreach_item_0_saved_item) {
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved_item;
}
?>
				</div>
                                <div id="userBox" class="hideme">
                                    <a href="#" id="userlink"></a><br />
                                    <a href="/user/logout/" onclick="logout()">Logout</a><br />
                                </div>
                                <div id="registerBox">
                                    <form action="/user/register/" method="POST">

                                    <div class="menuCaption showHidden" onclick="showRegisterBox();">Registration</div>
                                    <div id="registerBoxHideen">
                                        email: <br />
                                            <input type="text" id="email" name="email" value=""/><br />
                                        password: <br />
                                            <input type="password" id="pwd1" name="pwd1" value=""/><br />
                                        repeat password: <br />
                                            <input type="password" id="pwd2" name="pwd2" value=""/><br />
                                           <input type="button" onclick="registerNewUser()"  value="register"/>
                                          <!--  <input type="submit" value="Register">-->
                                    </div>
                                    </form>
                                    </div>
                                
                                    <div class="menuCaption">Cart</div>
                                <a href="/cart/" title="Go to cart">In the cart</a>
                                <span id="cartCntItems" >
                                    <?php if ($_smarty_tpl->tpl_vars['cartCntItems']->value > 0) {
echo $_smarty_tpl->tpl_vars['cartCntItems']->value;
} else { ?>Empty<?php }?>
                                
                                </div>
                                
                                
                                
                                
 
		</div>
<?php }
}
