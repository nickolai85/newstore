<?php
use liw\app\middleware\CartMiddleware as CartMiddleware;
use liw\app\models\Categories as Categories;
use liw\app\models\Products as Products;
use liw\app\models\Purchase as Purchase;
use liw\app\models\Orders as Orders;  
use liw\library\DB as DB;


/**
* 
*/
class AdminController
{
	
	$smarty->setTemplateDir(TemplateAdminPrefix);
	$smarty->assign('TemplateWebPath', TemplateAdminWebPath);

	public function index($smarty)
	{
		
            Loads::loadTemplate($smarty, 'adminHeader'); 
            Loads::loadTemplate($smarty, 'cart/cart'); 
            Loads::loadTemplate($smarty, 'adminFooter');  
	}
}