<?php
use liw\app\models\Categories as Categories;
use liw\app\models\Products as Products; 
use liw\library\DB as DB; 
class IndexController{


	public function indexAction($smarty)
	{

		$rsCategories = Categories::get(['where'=>['parent_id'=>0]]);
        $rsProducts =Products::get(['LIMIT'=>10,'ASC'=>'id']);
  
        $smarty->assign('pageTitle', 'Main page');
	 	$smarty->assign('rsCategories', $rsCategories);
        $smarty->assign('rsProducts', $rsProducts);
        

        Loads::loadTemplate($smarty, 'header'); 
	    Loads::loadTemplate($smarty, 'index'); 
        Loads::loadTemplate($smarty, 'footer'); 
	}


	public function testAction($smarty)
	{

		$rs=DB::select(productModel::getProducts());

	}



}
    
