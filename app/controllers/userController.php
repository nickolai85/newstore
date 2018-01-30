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
  

    public function index($smarty)
    {



       if (!isset($_SESSION['user'])) {

                  Loads::redirect('/'); 

              }

        $rsCategories = Categories::categoriesWithChildren();
        $rsProducts =Products::get(['LIMIT'=>10,'ASC'=>'id']);
  
        $smarty->assign('pageTitle', 'User page');
        $smarty->assign('rsCategories', $rsCategories);
        $smarty->assign('rsProducts', $rsProducts);
        

        Loads::loadTemplate($smarty, 'header'); 
        Loads::loadTemplate($smarty, 'user/index'); 
        Loads::loadTemplate($smarty, 'footer');
    }


    public function update()
    {


          $request=array();

          if ($_POST['password']!='') {
              $request['password']= md5($_POST['password']);
         }
          if ($_POST['password2']!='') {
              $request['password2']=md5($_POST['password2']);
         }
          if ($_POST['cuPwd']!='') {
              $request['cuPwd']=md5($_POST['cuPwd']);
         }
            $request['phone']   = isset($_POST['phone'])   ? $_POST['phone'] : null;
            $request['address'] = isset($_POST['address']) ? $_POST['address'] : null;
            $request['name']    = isset($_POST['name'])    ? $_POST['name'] : null;
            $request['phone']   = isset($_POST['phone'])   ? $_POST['phone'] : null;
            $request['email']   = isset($_POST['email'])   ? $_POST['email'] : null;

            $rs=UserMiddleware::checkUpdate($request);

           if (!$rs) {

                    
                  $updData=Users::update($request);

                     if($updData){

                        $userD=Users::get(['where'=>['id'=>$_SESSION['user']['id']]]);
                        $resData['message']='Data was succesefull saved';
                        $resData['success']=1;
                        $resData['userName']= $userD[0]['name'] ? $userD[0]['name'] : $userD[0]['email'];
                        $resData['userEmail'] = $userD[0]['email'];

                        $_SESSION['user']['name'] = $userD[0]['name'] ;
                        $_SESSION['user']['phone'] = $userD[0]['phone'] ;
                        $_SESSION['user']['email'] = $userD[0]['email'] ;
                        $_SESSION['user']['address'] = $userD[0]['address'] ;
                        $_SESSION['user']['password'] = $userD[0]['password'] ;
                        $_SESSION['userName'] = $userD[0]['name'] ? $userD[0]['name'] : $userD[0]['email'];
                        $_SESSION['userId']   = $userD[0]['id'];

                        echo json_encode($resData);
                      }
                  else{

                        $res['success'] =false;
                        $res['message'] ='Conection error!';
                        echo json_encode($res);

                  }

           
           }
           else
           {

             echo json_encode($rs);

           }


           


    }







      public function register($value='')
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
              $rs['userName']=$userData[0]['name'] ? $userData[0]['name'] : $userData[0]['email'];
              $rs['userEmail'] = $email;
               
              $_SESSION['user'] = $userData[0];
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

      public function logout()
      {
          $rs='';
          if (isset($_SESSION['user'])) {

            unset($_SESSION['user']);
            unset($_SESSION['cart']);

            $rs['success']=1;
            echo json_encode($rs);
        }

        


      }
      public function login()
      {

         $rs=UserMiddleware::checkLogin($_POST);
         
         if ($rs==null) {

              $email= isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
              $password = isset($_REQUEST['password']) ? $_REQUEST['password'] : null;
              $userData = Users::auth(['where'=>['email'=>$email,'password'=>md5($password)]]);
            if ($userData) {

               $rs['message']='You are successfully logged';
               $rs['success']=1;
        
              $rs['name']=$userData[0]['name'] ? $userData[0]['name'] : $userData[0]['email'];
              $rs['email'] = $email;
              $rs['address'] = $userData[0]['address'] ? $userData[0]['address'] : null;
              $rs['phone'] = $userData[0]['phone'] ? $userData[0]['phone'] : null;
              $_SESSION['user'] = $userData[0];
              $_SESSION['userName']= $userData[0]['name'] ? $userData[0]['name'] : $userData[0]['email'];
       
              
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