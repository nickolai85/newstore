<?php

/* 
 *
 * 
 */

use liw\app\models\Categories as Categories;
use liw\app\models\Products as Products; 
use liw\library\DB as DB;
/* 
 *Adding products to the cart
 * @param integer id GET paramtr -ID of the added product
 * @return json information about operation (succes, number of elements in the cart)
 * 
 */

/**
* 
*/
class CartController
{

  public function addtocartAction()
  {


        $itemId = isset($_GET['id'])? intval($_GET['id'])  : null;
        if (! $itemId ) return false;
        
        $resData = array();

        //If value not found, then add
            if (isset($_SESSION['cart']) && array_search($itemId, $_SESSION['cart'])===false){
            
            $_SESSION['cart'][]=$itemId;
            $resData['cntItems']= count($_SESSION['cart']);
            $resData['success']=1;
        } else {
            $resData['success']=0;

        }
                
        
        echo json_encode($resData);


  }

 public function removefromcartAction()
  {

       $itemId = isset($_GET['id'])? intval($_GET['id'])  : null;
        if (! $itemId )exit();
        $resData = array();
        // if the value is not found, then add
        $key = array_search($itemId, $_SESSION['cart']);
      //  $resData=$key;
        if ($key !==false){
            unset($_SESSION['cart'][$key]);
            
            $resData['success']=1;

            $resData['cntItems']= count($_SESSION['cart']);
            $rs=$resData['cntItems'];

        } else {
            $resData['success']=0;

        }
        
        echo json_encode($resData);


      }


      public function indexAction($smarty)
      {
            $itemIds = array();
            $itemIds = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
 

             $rsProducts = Products::get(['whereIn'=>['id'=>$itemIds]]);

 
            $smarty->assign('pageTitle', 'Cart');
            $smarty->assign('rsCategories', $rsCategories);
            $smarty->assign('rsProducts', $rsProducts);       

            Loads::loadTemplate($smarty, 'header'); 
            Loads::loadTemplate($smarty, 'cart/cart'); 
            Loads::loadTemplate($smarty, 'footer');  
      }
}
