
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
                
                <div id="userBox" class="hideme">
                        <a href="#" id="userLink"></a><br />
                        <a href="#" onClick="logout()">Logout</a><br />
                </div>

                <div id="loginBox">
                    <div class="menuCaption">Autorisation</div>
                        <input type="text" id="lemail" name="lemail" value=""/><br />
                        <input type="text" id="lpassword" name="lpassword" value=""/><br />
                        <input type="button" onClick="login();" value="Login">

                </div>
                
                <div id="registerBox">
                    <p id="registerResult"  style="background-color: red"></p>  
                        <form action="/user/register/" method="POST">

                            <div class="menuCaption showHidden" onClick="showRegisterBox();">Registration</div>

                                <div id="registerBoxHideen">
                                        email: <br />
                                            <input type="text" id="email" name="email" value=""/><br />
                                        password: <br />
                                            <input type="password" id="password" name="password" value=""/><br />
                                        repeat password: <br />
                                            <input type="password" id="password2" name="password2" value=""/><br />
                                           <input type="button" onClick="registerNewUser()"  value="register"/>
                                          <!--  <input type="submit" value="Register">-->
                                </div>
                        </form>
                </div>
                                
                <div class="menuCaption">Cart</div>
                                <a href="/cart/index/" title="Go to cart">In the cart</a>
                                <span id="cartCntItems" >
                                    {if $cartCntItems > 0}{$cartCntItems}{else}Empty{/if}
                                
                </div>
                                
                                
                            
                                
 
        </div>
