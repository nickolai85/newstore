<?php
/* Smarty version 3.1.29, created on 2018-01-30 01:24:43
  from "C:\OpenServer\domains\newstore.loc\views\default\user\register.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5a6f9f2b8b6196_78015575',
  'file_dependency' => 
  array (
    'de5847dfaf51cfe3d529c0165df2d5262ed36f53' => 
    array (
      0 => 'C:\\OpenServer\\domains\\newstore.loc\\views\\default\\user\\register.tpl',
      1 => 1517264645,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a6f9f2b8b6196_78015575 ($_smarty_tpl) {
?>
                        <form action="/user/register/" method="POST">

                            <div class="menuCaption showHidden">Registration</div>

                                <div id="registerBoxHideen">
                                        email: <br />
                                            <input type="text" id="email" name="email" value=""/><br />
                                        password: <br />
                                            <input type="password" id="password" name="password" value=""/><br />
                                        repeat password: <br />
                                            <input type="password" id="password2" name="password2" value=""/><br />
                                           <input type="button" onClick="registerNewUser()"  value="register"/>
                                          
                                </div>
                        </form><?php }
}
