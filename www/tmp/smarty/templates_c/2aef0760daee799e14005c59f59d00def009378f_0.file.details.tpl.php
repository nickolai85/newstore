<?php
/* Smarty version 3.1.29, created on 2018-01-30 17:52:05
  from "C:\OpenServer\domains\newstore.loc\views\default\user\details.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5a708695669740_55543161',
  'file_dependency' => 
  array (
    '2aef0760daee799e14005c59f59d00def009378f' => 
    array (
      0 => 'C:\\OpenServer\\domains\\newstore.loc\\views\\default\\user\\details.tpl',
      1 => 1517323833,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a708695669740_55543161 ($_smarty_tpl) {
?>
<input type="text" id="name" value="name"> <br>
<input type="text" id="phone" value="phone"> <br>
<textarea id="address" name="address"></textarea><br>
<input type="button" value="Register" onClick="registerNewUser()"><?php }
}
