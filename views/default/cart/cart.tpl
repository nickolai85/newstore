{*cart template*}
<h1>Cart</h1>
{if !$rsProducts}
The cart is empty
{else}
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
{foreach $rsProducts as $item name=products}
    <tr>
        <td>
           {$smarty.foreach.products.iteration }
        </td>
        <td>
        <a href="/product/{$item['id']}/">{$item['name']}</a>
        </td>
        <td>
           <input type="text" id="itemCnt_{$item['id']}" name="itemCnt_{$item['id']}" value="1" onkeyup="conversionPrice({$item['id']});"/>
        </td>
        <td>
           <span id="itemPrice_{$item['id']}" value="{$item['price']}">
               {$item['price']}
           </span>
        </td>
        <td>
         <span id="itemRealPrice_{$item['id']}" value="{$item['price']}">
               {$item['price']}
           </span>
        </td>
        <td>
                <a id="removeCart_{$item['id']}" alt="Remove from cart"  onClick="removeFromCart({$item['id']}); return false;"  href="#">REMOVE</a>
                <a id="addCart_{$item['id']}" alt="Add to cart" class="hideme" onClick="addToCart({$item['id']}); return false;"  href="#">RETURN</a>
        </td>
    </tr>
   {/foreach}
</table>
{/if}