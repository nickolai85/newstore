{*User template*}
<h1>User registration data</h1>

<table border="0">
	<tr>
		<td>
			Login(email)
		</td>
		<td>
			<input type="email" id="newlogin" value="{$userData['email']}">
			
		</td>
	</tr>
	<tr>
		<td>
			Name:
		</td>
		<td>
			<input type="text" id="newName" value="{$userData['name']}">
		</td>
	</tr>
	<tr>
		<td>
			Address:
		</td>
		<td>
			<textarea id="newAddress" >{$userData['address']}</textarea>
		</td>
	</tr>
	<tr>
		<td>
			Phone:
		</td>
		<td>
			<input type="text" id="newPhone" value="{$userData['phone']}">
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
