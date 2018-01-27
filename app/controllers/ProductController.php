<?php
/* 
 *  ProductController.php
 *  Controller of product, Page ex.(/product/1) 
 */

use liw\app\models\Categories as Categories;
use liw\app\models\Products as Products; 
use liw\library\DB as DB;

class ProductController{


    public function indexAction($smarty)
    {

        $id = isset($_GET['id'])? $_GET['id'] : null;
        if ($id == null) exit ();
        $rsCategories = Categories::categoriesWithChildren();

        $rsProducts =Products::get(['where'=>['id'=>$id]]);
        
        $smarty->assign('itemInCart', 0);
        if(in_array($id, $_SESSION['cart'])){

            $smarty->assign('itemInCart', 1);
        }
  
        $smarty->assign('pageTitle', 'Product page');
        $smarty->assign('rsCategories', $rsCategories);
        $smarty->assign('rsProduct', $rsProducts);
    

        Loads::loadTemplate($smarty, 'header'); 
        Loads::loadTemplate($smarty, 'product'); 
        Loads::loadTemplate($smarty, 'footer'); 
    }


    public function testAction($smarty)
    {

        $rs=DB::select(productModel::getProducts());
    

    }



}
    













/*require_once ('../models/CategoriesModel.php');
require_once ('../models/productsModel.php');



 function indexAction($smarty){
     
    $id = isset($_GET['id'])? $_GET['id'] : null;
    if ($id == null) exit ();
    
    
         $rsCategories = getAllMainCatsWithChildren();
         $rsProduct = getProductsById($id);
    //d($rsProducts);
         $smarty->assign('pageTitle', 'Main page');
	 $smarty->assign('rsCategories', $rsCategories);
         $smarty->assign('rsProduct', $rsProduct);

         loadTemplate($smarty, 'header'); 
	 loadTemplate($smarty, 'product'); 
        loadTemplate($smarty, 'footer'); 
	/*  echo 'Hello'; 
 }
*/