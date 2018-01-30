<?php
/* Smarty version 3.1.29, created on 2018-01-29 04:58:27
  from "C:\OpenServer\domains\newstore.loc\views\default\user\index.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5a6e7fc3aba730_59299698',
  'file_dependency' => 
  array (
    '6369c3183301f95b78b6a75e3260a1c74eb70ac7' => 
    array (
      0 => 'C:\\OpenServer\\domains\\newstore.loc\\views\\default\\user\\index.tpl',
      1 => 1517191102,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a6e7fc3aba730_59299698 ($_smarty_tpl) {
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
</div><?php }
}
