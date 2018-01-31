<?php
/* Smarty version 3.1.29, created on 2018-01-31 18:15:49
  from "C:\OpenServer\domains\newstore.loc\views\default\user\index.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5a71dda5660f36_73406660',
  'file_dependency' => 
  array (
    '6369c3183301f95b78b6a75e3260a1c74eb70ac7' => 
    array (
      0 => 'C:\\OpenServer\\domains\\newstore.loc\\views\\default\\user\\index.tpl',
      1 => 1517411745,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a71dda5660f36_73406660 ($_smarty_tpl) {
?>

<h1>User registration data</h1>

<div id="updateUserBox">
<p id="userRS"></p>
<table border="0">
	<tr>
		<td>
			Login(email)
		</td>
		<td>
			<input type="email" id="newlogin" value="<?php echo $_smarty_tpl->tpl_vars['userData']->value['email'];?>
">
			
		</td>
	</tr>
	<tr>
		<td>
			Name:
		</td>
		<td>
			<input type="text" id="newName" value="<?php echo $_smarty_tpl->tpl_vars['userData']->value['name'];?>
">
		</td>
	</tr>
	<tr>
		<td>
			Address:
		</td>
		<td>
			<textarea id="newAddress" ><?php echo $_smarty_tpl->tpl_vars['userData']->value['address'];?>
</textarea>
		</td>
	</tr>
	<tr>
		<td>
			Phone:
		</td>
		<td>
			<input type="text" id="newPhone" value="<?php echo $_smarty_tpl->tpl_vars['userData']->value['phone'];?>
">
		</td>
	</tr>	
	<tr>
		<td>
			Password:
		</td>
		<td>
			<input type="password" id="newPassword"  value=""/>

		</td>
	</tr>  
	<tr>
		<td>
			Repeat password:
		</td>
		<td>
			<input type="password" id="newPassword2"  value=""/>

		</td>
	</tr> 
	<tr>
		<td>
			To save data, enter the current password!
		</td>
		<td>
			<input type="password" id="cuPwd"  value=""/>
		</td>
	</tr> 
	<tr>
		<td>
			&nbsp;
		</td>
		<td>
			<input type="button"  value="Save" onClick="updateUserData();" />

		</td>
	</tr> 
</table>

<h2>Orders</h2>
<?php if (!$_smarty_tpl->tpl_vars['usrOrders']->value) {?>
 No orders
<?php } else { ?>

<table width="100%">
	<tr>
		<th>
			Nr
		</th>
		<th>
			Action
		</th>
		<th>
			Order ID
		</th>	
		<th>
			Status
		</th>
		<th>
			Creation Data
		</th>
		<th>
			Payment Data
		</th>	
		<th>
			Additional Information
		</th>

	</tr>
	<?php
$_from = $_smarty_tpl->tpl_vars['usrOrders']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_orders_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_foreach_orders']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_orders'] : false;
$__foreach_orders_0_saved_item = isset($_smarty_tpl->tpl_vars['item']) ? $_smarty_tpl->tpl_vars['item'] : false;
$_smarty_tpl->tpl_vars['item'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['__smarty_foreach_orders'] = new Smarty_Variable(array('iteration' => 0));
$_smarty_tpl->tpl_vars['item']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
$_smarty_tpl->tpl_vars['__smarty_foreach_orders']->value['iteration']++;
$__foreach_orders_0_saved_local_item = $_smarty_tpl->tpl_vars['item'];
?>
	<tr>
		<td>
			<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_orders']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_orders']->value['iteration'] : null);?>

		</td>
		<td>
			<a href="#" onClick="showProducts('<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
'); return false;">Show items</a>
		</td>
		<td>
			<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>

		</td>
		<td>
			<?php echo $_smarty_tpl->tpl_vars['item']->value['status'];?>

		</td>
		<td>
			<?php echo $_smarty_tpl->tpl_vars['item']->value['created_at'];?>

		</td>
		<td>
			<?php echo $_smarty_tpl->tpl_vars['item']->value['paid_at'];?>

		</td>
		<td>
			<?php echo $_smarty_tpl->tpl_vars['item']->value['comment'];?>

		</td>
	</tr>
	<tr class="hideme" id="orderedItems_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
			<td colspan="7">
			<?php if ($_smarty_tpl->tpl_vars['item']->value['children']) {?>
				<table border="1" cellpadding="1" cellspacing="1" width="100%">
					<tr>
						<th>
							Nr
						</th>
						<th>
							ID
						</th>
						<th>
							Name
						</th>
						<th>
							Price
						</th>
						<th>
							Quantity
						</th>
						<th>
							Total Price
						</th>
					</tr>
					<?php
$_from = $_smarty_tpl->tpl_vars['item']->value['children'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_products_1_saved = isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products'] : false;
$__foreach_products_1_saved_item = isset($_smarty_tpl->tpl_vars['child']) ? $_smarty_tpl->tpl_vars['child'] : false;
$_smarty_tpl->tpl_vars['child'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['__smarty_foreach_products'] = new Smarty_Variable(array('iteration' => 0));
$_smarty_tpl->tpl_vars['child']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['child']->value) {
$_smarty_tpl->tpl_vars['child']->_loop = true;
$_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']++;
$__foreach_products_1_saved_local_item = $_smarty_tpl->tpl_vars['child'];
?>
					<tr>
						<td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration'] : null);?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['child']->value['id'];?>
</td>
						<td><a href="/product/<?php echo $_smarty_tpl->tpl_vars['child']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['child']->value['name'];?>
</a></td>
						<td><?php echo $_smarty_tpl->tpl_vars['child']->value['price'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['child']->value['amount'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['child']->value['amount'];?>
</td>
					</tr>
					<?php
$_smarty_tpl->tpl_vars['child'] = $__foreach_products_1_saved_local_item;
}
if ($__foreach_products_1_saved) {
$_smarty_tpl->tpl_vars['__smarty_foreach_products'] = $__foreach_products_1_saved;
}
if ($__foreach_products_1_saved_item) {
$_smarty_tpl->tpl_vars['child'] = $__foreach_products_1_saved_item;
}
?>
				</table>
			<?php }?>
			</td>		

	</tr>

	<?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_orders_0_saved_local_item;
}
if ($__foreach_orders_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_foreach_orders'] = $__foreach_orders_0_saved;
}
if ($__foreach_orders_0_saved_item) {
$_smarty_tpl->tpl_vars['item'] = $__foreach_orders_0_saved_item;
}
?>
</table>
<?php }?>
</div><?php }
}
