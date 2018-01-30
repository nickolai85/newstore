<?php
use liw\app\models\Categories as Categories;
use liw\app\models\Products as Products; 
use liw\library\DB as DB; 
class IndexController{


	public function index($smarty)
	{
		$rsCategories = Categories::categoriesWithChildren();
        $rsProducts =Products::get(['limit'=>10,'asc'=>'id']);
  
        $smarty->assign('pageTitle', 'Main page');
	 	$smarty->assign('rsCategories', $rsCategories);
        $smarty->assign('rsProducts', $rsProducts);
        

        Loads::loadTemplate($smarty, 'header'); 
	    Loads::loadTemplate($smarty, 'index'); 
        Loads::loadTemplate($smarty, 'footer'); 
	}





}
    
