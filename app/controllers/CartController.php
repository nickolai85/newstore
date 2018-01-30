<?php

/* 
 *
 * 
 */
use liw\app\middleware\CartMiddleware as CartMiddleware;
use liw\app\models\Categories as Categories;
use liw\app\models\Products as Products;
use liw\app\models\Purchase as Purchase;
use liw\app\models\Orders as Orders;  
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

  public function addtocart()
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

 public function removefromcart()
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


      public function index($smarty)
      {
            $itemIds = array();
            $itemIds = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
            $rsCategories = Categories::categoriesWithChildren();


             $rsProducts = Products::get(['whereIn'=>['id'=>$itemIds]]);

 
            $smarty->assign('pageTitle', 'Cart');
            $smarty->assign('rsCategories', $rsCategories);
            $smarty->assign('rsProducts', $rsProducts);       

            Loads::loadTemplate($smarty, 'header'); 
            Loads::loadTemplate($smarty, 'cart/cart'); 
            Loads::loadTemplate($smarty, 'footer');  
      }

      public function order( $smarty)
      {
        //Receive array of products ID from the cart
        $itemIds= isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
        // if cart is empty , redirect to cart page

        if (!$itemIds) {
          Loads::redirect('/'); 
          return;
        }

        $itemsCnt= array();
            
            //Creating key for POST array
          
            //Create array element amount of purchased products
            // Array key - Product Id, Array value -  amount of purchased products
            //$itemsCnt[1]=3; product with ID ==1 , ordered 3 items


        foreach ($itemIds as $key => $value) {
             $postVal='itemCnt_'.$value;

           
            $itemsCnt[$value] = isset($_POST['itemCnt_'.$value]) ? $_POST['itemCnt_'.$value] : null;
        }
          
          //Add to each product the new field
          //realPrice = product amount*on product price
          //"cnt" = Quantity of ordered products


          // Get list of products according to cart array


          $rsProducts = Products::get(['whereIn'=>['id'=>$itemIds]]);
          //&$item - use to chenge element from $rsProducts array when $item is chenging
          $item= array();
          $i=0;
          foreach ($rsProducts as &$item) {

                 $item['cnt']= isset($itemsCnt[$item['id']]) ? $itemsCnt[$item['id']] : 0;

                if($item['cnt']){
                    $item['realPrice'] = $item['cnt'] * $item['price'];
               } else{

                //if cart has an item but amount == 0, delete this item from cart
                unset($rsProducts[$i]);

            }
            
          }
          $i++;
   

      if (!$rsProducts) {

        echo "Cart is empty!";
        return;
      }
      // Create $_SESSION array, from received array
        $_SESSION['saleCart']=$rsProducts;

        $rsCategories = Categories::categoriesWithChildren();

        if (!isset($_SESSION['user'])) {
            $smarty->assign('hideLoginBox', 1);  
        }
  
        $smarty->assign('pageTitle', 'Order');
        $smarty->assign('rsCategories', $rsCategories);
        $smarty->assign('rsProducts', $rsProducts);
        

        Loads::loadTemplate($smarty, 'header'); 
        Loads::loadTemplate($smarty, 'cart/order'); 
        Loads::loadTemplate($smarty, 'footer'); 
   }

/*
* AJAX function save order
*
*@param array $_SESSION['saleCart'] arry of ordered products
*@return json data with action rezult
*/

   public function saveorder()
   {
      //Get array with ordered products.
      $cart=isset($_SESSION['saleCart']) ? $_SESSION['saleCart'] : null;
      //If cart is empty , create answer with error and send in json format, the method is ending

     if (! $cart) {
          $resData['success'] =0 ;
          $resData['message'] = 'The cart is empty';

          echo json_encode($resData);
          return;
      }


      $request['name']=$_POST['name'];
      $request['phone']=$_POST['phone'];
      $request['address']=$_POST['address'];
      //Check empty fields
      $rs=CartMiddleware::emptyFields($request);
      if (!$rs) {
            // Create new order and get his id
            $orderId=Orders::insert($request);
            if (!$orderId) {
              $resData['success']= 0;
              $resData['message']= 'Creation error!';
              echo json_encode($resData);
              return;
              
            }
      }
      else
      {

            echo json_encode($rs);  
      
      }
      // Save products from created order
      
      $products['order_id']=$orderId;
      $products['saleCart']=$cart;

      $res =Purchase::insert($products);

      //if succes, create the answer , delete cart variables

      if ($res) {

        $resData['success']=1;
        $resData['message']='Order Saved!';
        unset($_SESSION['saleCart']);
        unset($_SESSION['cart']);
      }
       else{

        $resData['success']=0;
        $resData['message']=' Error saving data for order Nr '.$orderId;
       }

       echo json_encode($resData);
   
  }
}
