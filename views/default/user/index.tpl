{*User template*}
<h1>User registration data</h1>

<div id="updateUserBox">
<p id="userRS"></p>
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

<h2>Orders</h2>
{if ! $usrOrders}
 No orders
{else}

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
	{foreach $usrOrders as $item name=orders}
	<tr>
		<td>
			{$smarty.foreach.orders.iteration}
		</td>
		<td>
			<a href="#" onClick="showProducts('{$item['id']}'); return false;">Show items</a>
		</td>
		<td>
			{$item['id']}
		</td>
		<td>
			{$item['status']}
		</td>
		<td>
			{$item['created_at']}
		</td>
		<td>
			{$item['paid_at']}
		</td>
		<td>
			{$item['comment']}
		</td>
	</tr>
	<tr class="hideme" id="orderedItems_{$item['id']}">
			<td colspan="7">
			{if $item['children']}
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
					{foreach $item['children'] as $child name=products }
					<tr>
						<td>{$smarty.foreach.products.iteration}</td>
						<td>{$child['id']}</td>
						<td><a href="/product/{$child['id']}/">{$child['name']}</a></td>
						<td>{$child['price']}</td>
						<td>{$child['amount']}</td>
						<td>{$child['amount']}</td>
					</tr>
					{/foreach}
				</table>
			{/if}
			</td>		

	</tr>

	{/foreach}
</table>
{/if}
</div>