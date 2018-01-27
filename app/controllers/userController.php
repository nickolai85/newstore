<?php
use liw\app\models\Categories as Categories;
use liw\app\models\Products as Products; 
use liw\app\models\Users as Users;
use liw\app\middleware\UserMiddleware as UserMiddleware;
use liw\library\DB as DB;

/* 
 *  ProductController.php
 *  Controller of users functions, Page ex.(/product/1) 
 */



/*
* 
*/
class UserController 
{
  

    public function indexAction($smarty)
    {



/*      if (!isset($_SESSION['user']) {

                  Loads::redirect('/'); 

              }*/

        $rsCategories = Categories::categoriesWithChildren();
        $rsProducts =Products::get(['LIMIT'=>10,'ASC'=>'id']);
  
        $smarty->assign('pageTitle', 'User page');
        $smarty->assign('rsCategories', $rsCategories);
        $smarty->assign('rsProducts', $rsProducts);
        

        Loads::loadTemplate($smarty, 'header'); 
        Loads::loadTemplate($smarty, 'user/index'); 
        Loads::loadTemplate($smarty, 'footer');
    }


    public function updateAction()
    {
      # code...
    }







      public function registerAction($value='')
      {

       $rs=UserMiddleware::checkRequest($_POST);
       

       if ($rs==null) {

          $request=$_POST;
          $request['password']=md5($_POST['password']);
          $userData=Users::insert($request);


             if($userData){



               $resData['message']='User is succesefull Registred';
               $resData['success']=1;
              
              // $userData=$userData[0];
               $resData['userName']=$userData[0]['name'] ? $userData[0]['name'] : $userData[0]['email'];
               $resData['userEmail'] = $email;
            
             //   
                $_SESSION['user'] = $userData;
                $_SESSION['userName']= $userData[0]['name'] ? $userData[0]['name'] : $userData[0]['email'];
                $_SESSION['userId']=$userData[0]['id'];
              
          } else {
              $resData['success']=0;
              $resData['message']='Registration Error';
              
          }
      
        


       echo json_encode($resData);
         
       } else {
          echo json_encode($rs);

       }

        
      }

      public function logoutAction()
      {
          $rs='';
          if (isset($_SESSION['user'])) {

            unset($_SESSION['user']);
            unset($_SESSION['cart']);

            $rs['success']=1;
            echo json_encode($rs);
        }

        


      }
      public function loginAction()
      {

         $rs=UserMiddleware::checkLogin($_POST);
         
         if ($rs==null) {

              $email= isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
              $password = isset($_REQUEST['password']) ? $_REQUEST['password'] : null;
              $userData = Users::auth(['where'=>['email'=>$email,'password'=>md5($password)]]);
            if ($userData) {

               $rs['message']='You are successfully logged';
               $rs['success']=1;
              
        
              $resData['userName']=$userData[0]['name'] ? $userData[0]['name'] : $userData[0]['email'];
              $resData['userEmail'] = $email;
               
              $_SESSION['user'] = $userData[0];
              $_SESSION['userName']= $userData[0]['name'] ? $userData[0]['name'] : $userData[0]['email'];
              $_SESSION['userId']=$userData[0]['id'];
              
              echo json_encode($rs);

          }
          else{
                $res['success'] =false;
                $res['message'] ='The email or password are not valid. Please try again!';
            
            echo json_encode($res);


          }
         }


         else {
          echo json_encode($rs);

         }
          


        

      }










}