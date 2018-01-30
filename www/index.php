<?php
	session_start();//Starting Session
// if doesn`t exist cart array in the Session, then create it
if(! isset($_SESSION['cart'])){
    
    $_SESSION['cart']= array();
    
}

//Set Controller name	
	$controllerUrl = isset ($_GET['controller']) ? ucfirst($_GET['controller']) : 'Index';
	

	$controllerName=$controllerUrl.'Controller';
//Set Index Name

	$actionUrl = isset ($_GET['action']) ? $_GET['action'] : 'index';
	
	$actionName = $actionUrl;

	require_once ('../config/config.php');
//Conecting Controller
	require_once '../library/Loads.php';

//If Session has user data, send data to template

	if (isset($_SESSION['user'])) {

		$smarty->assign('userData', $_SESSION['user']);
		$smarty->assign('userName', $_SESSION['userName']);

	}
//Define template variable of number of items in the cart
	$smarty->assign('cartCntItems',count($_SESSION['cart']));
	
//loading page

	Loads::loadPage($smarty, $controllerName, $actionName);
