{*cart template*}
<h1>Order</h1>
{if !$rsProducts}
The cart is empty
{else}
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
{foreach $rsProducts as $item name=products}
    <tr>
        <td >
           {$smarty.foreach.products.iteration }
        </td>
        <td >
        <a href="/product/{$item['id']}/">{$item['name']}</a>
        </td>
        <td >
        <span id="itemCnt_{$item['id']}"></span>
        <input type="hidden" name="itemCnt_{$item['id']}" value="{$item['cnt']}">
              {$item['cnt']}
        </td>
        <td>
              <span id="itemPrice_{$item['id']}"></span>
              <input type="hidden" name="itemPrice_{$item['id']}" value="{$item['price']}">
                {$item['price']}
              
        </td>
        <td >
          <span id="itemRealPrice_{$item['id']}"></span>
          <input type="hidden" name="itemRealPrice_{$item['id']}" value="{$item['realPrice']}">
          {$item['realPrice']}
        </td>

    </tr>
   {/foreach}
</table>

{if isset($userData)}
{$buttonClass=""}

<h2>Customer Data</h2>

<div class="orderUserInfoBox" {$buttonClass}>

      {$name=$userData['name']}
      {$address=$userData['address']}
      {$phone=$userData['phone']}
    
    <table>

      <tr>
          <td>
            Name:
          </td>
          <td>
            <input type="text" id="name" name="name" value="{$name}">
          </td>
      </tr>
      <tr>
          <td>
           Address:
          </td>
          <td>
            <textarea id="address" name="address" >{$address}</textarea>
          </td>
      </tr>
      <tr>
          <td>
            Phone:
          </td>
      <td>
          <input type="text" id="phone" name="phone" value="{$phone}">
      </td>
      </tr>
    </table>

<input { $buttonClass } type="button" value="Place your order" onClick="saveOrder();" />

</div>

{else}
      <div id="loginBox">

        {include file='user/login.tpl'}
      </div>
      <div id="registerBox">
        
      {include file='user/register.tpl'}
      {include file='user/details.tpl'}
      </div>
<input { $buttonClass } type="button" value="Place your order" onClick="saveOrder();" />


{/if}
</form>
{/if}