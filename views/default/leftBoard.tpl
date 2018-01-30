
        <div id="leftBoard">
                                                
        
                    
                    
                <div id="menuCaption">
                
                    {foreach $rsCategories as $item}
                        <a href="/category/{$item['id']}/">{$item['name']}</a><br />
                            {if isset($item['children'])}
                                {foreach $item['children'] as $itemChild}
                                    --<a href="/category/{$itemChild['id']}/">{$itemChild['name']}</a><br />
                                {/foreach}
                            {/if}
                    {/foreach}
                </div>

                {if isset($userData)}
                <div id="userBox" class="">
                        <a href="/user" id="userLink">{$userName}</a><br />
                        <a href="#" onClick="logout()">Logout</a><br />
                </div>
                {else}
                
                <div id="userBox" class="hideme">
                        <a href="#" id="userLink"></a><br />
                        <a href="#" onClick="logout()">Logout</a><br />
                </div>
                <p id="registerResult"  style="background-color: red"></p> 
               {if  ! isset($hideLoginBox)}
                <div id="loginBox">
                        {include file='user/login.tpl'}

                </div>
                
                <div id="registerBox">

                        
                         {include file='user/register.tpl'}

                </div>
                {/if}
                {/if}
                                
                <div class="menuCaption">Cart</div>
                                <a href="/cart/index/" title="Go to cart">In the cart</a>
                                <span id="cartCntItems" >
                                    {if $cartCntItems > 0}{$cartCntItems}{else}Empty{/if}
                                
                </div>
                                
                                
                            
                                
 
        </div>
