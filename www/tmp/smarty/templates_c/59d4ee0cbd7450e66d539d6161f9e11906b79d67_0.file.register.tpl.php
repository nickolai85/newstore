<?php
/* Smarty version 3.1.29, created on 2018-01-20 02:55:57
  from "C:\OpenServer\domains\newsurvey.loc\views\default\auth\register.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5a62858d112c19_52628604',
  'file_dependency' => 
  array (
    '59d4ee0cbd7450e66d539d6161f9e11906b79d67' => 
    array (
      0 => 'C:\\OpenServer\\domains\\newsurvey.loc\\views\\default\\auth\\register.tpl',
      1 => 1516403692,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
  ),
),false)) {
function content_5a62858d112c19_52628604 ($_smarty_tpl) {
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


                                <div id="registerBox">
                                    <form action="/auth/save/" method="POST">

                                    <div class="">Registration</div>
                                    <div id="registerBoxHideen">
                                        email: <br />
                                            <input type="text" id="email" name="email" value=""/><br />
                                        password: <br />
                                            <input type="password" id="password" name="password" value=""/><br />
                                        repeat password: <br />
                                            <input type="password" id="password2" name="password2" value=""/><br />
                                           <input type="submit" value="register"/>
                                          <!--  <input type="submit" value="Register">-->
                                    </div>
                                    </form>
                                    </div>

                                
                                
                                
 

<?php }
}
