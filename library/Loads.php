<?php

/* 

* Main function

 */
 
 
 /* 

* Buidling of requested page
* @param string  $controllerName- name of controller
* @param string  $actionName- processing page function


 */




/**
* 
*/
class Loads {
	public static  function loadPage($smarty,$controllerName, $actionName = 'index')
	{
		
	require_once '../app/controllers/'.$controllerName.'.php';

		$Controller= new $controllerName; 

		$function=$Controller->$actionName($smarty);
	
		

	}


	public static function loadTemplate($smarty, $templateName)
	{
		$smarty->display($templateName . TemplatePostfix);
	}
}
