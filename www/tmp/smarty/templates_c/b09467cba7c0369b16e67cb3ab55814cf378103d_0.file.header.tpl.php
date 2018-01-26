<?php
/* Smarty version 3.1.29, created on 2018-01-22 22:43:57
  from "C:\OpenServer\domains\newstore.loc\views\default\header.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_5a663efd88fb12_52554295',
  'file_dependency' => 
  array (
    'b09467cba7c0369b16e67cb3ab55814cf378103d' => 
    array (
      0 => 'C:\\OpenServer\\domains\\newstore.loc\\views\\default\\header.tpl',
      1 => 1516650234,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:leftBoard.tpl' => 1,
  ),
),false)) {
function content_5a663efd88fb12_52554295 ($_smarty_tpl) {
?>
<html>
	<head>
		<title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
                <link rel="stylesheet" href="/templates/css/main.css"  type="text/css" >
            	<?php echo '<script'; ?>
 type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"> <?php echo '</script'; ?>
>
            	<?php echo '<script'; ?>
 type="text/javascript" src="/js/main.js"> <?php echo '</script'; ?>
>
  


	</head>	

<body>

		<div id="header">
				<h1> Net store - Internet magazin</h1>
		</div>
    
        <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:leftBoard.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


		<div id="centerBoard">
                        
<?php }
}
