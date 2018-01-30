<?php
/* 
 *  CategoryController.php
 *  Controller of category Page ex.(/category/1) 
 */

// Conecting models
use liw\app\models\Categories as Categories;
use liw\app\models\Products as Products; 
use liw\library\DB as DB;

class CategoryController{


    public function index($smarty)
    {

        $catId = isset($_GET['id'])? $_GET['id'] : null;
        if ($catId == null) exit ();
        $rsChildCats=NULL;
        $rsProducts=NULL;
        $rsCategory=Categories::get(['where'=>['id'=>$catId]]);

        if ($rsCategory[0]['parent_id']==0){
            
            

            $rsChildCats=Categories::get(['where'=>['parent_id'=>$catId]]);

        }
        else {
            
     
        
        }

        $rsProducts =Products::get(['where'=>['category_id'=>$catId]]);   

        $rsCategories = Categories::categoriesWithChildren();

        
        
       

        $smarty->assign('pageTitle', 'Products of '. $rsCategory[0]['name']);
        $smarty->assign('rsCategory', $rsCategory);
        $smarty->assign('rsCategoryName', $rsCategory[0]['name']);
        $smarty->assign('rsProducts', $rsProducts);
        $smarty->assign('rsChildCats', $rsChildCats);
        $smarty->assign('rsCategories', $rsCategories);
    

        Loads::loadTemplate($smarty, 'header'); 
        Loads::loadTemplate($smarty, 'category'); 
        Loads::loadTemplate($smarty, 'footer'); 
    }






}
    






function indexAction($smarty) {
    
    $catId = isset($_GET['id'])? $_GET['id'] : null;
    if ($catId == null) exit ();
    $rsChildCats=NULL;
    $rsProducts=NULL;

    $rsCategory = getCatById($catId);

    //if main category display childCategoies
    //else diplay products
    
    if ($rsCategory[0]['parent_id']==0){
        
        $rsChildCats = getChildrenForCat($catId);
             

    }
    else {
        
         $rsProducts = getProductsByCat($catId);      
    
         
    }
            $rsCategories = getAllMainCatsWithChildren();

            $smarty->assign('pageTitle', 'Products of '. $rsCategory[0]['name']);
	        $smarty->assign('rsCategory', $rsCategory);
            $smarty->assign('rsCategoryName', $rsCategory[0]['name']);

            $smarty->assign('rsProducts', $rsProducts);
             $smarty->assign('rsChildCats', $rsChildCats);
	        $smarty->assign('rsCategories', $rsCategories);
         
         loadTemplate($smarty, 'header'); 
	 loadTemplate($smarty, 'category'); 
         loadTemplate($smarty, 'footer'); 

    
     
}