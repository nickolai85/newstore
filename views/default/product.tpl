{*Category page*}
<h3>  {$rsProduct[0]['name']}</h3>

      <img width="575" src="/www/images/products/{$rsProduct[0]['image']}.jpg"witdh="100"/>
       <p>Pice: {$rsProduct[0]['price']} MDL   
           <a id="removeCart_{$rsProduct[0]['id']}"  href="#" onClick="removeFromCart({$rsProduct[0]['id']}); return false;" alt="Remove from cart" {if !$itemInCart }style="display:none;"{/if}  >REMOVE_FROM_CART</a></p>
           
           <a id="addCart_{$rsProduct[0]['id']}" href="#" onClick="addToCart({$rsProduct[0]['id']}); return false;" alt="Add to cart" {if $itemInCart }style="display:none;"{/if}   >ADD_TO_CART</a></p>
       <p> Products Name {$rsProduct[0]['description']}</p>





    
