<?php
namespace liw\app\middleware;
use liw\app\models\Users as Users; 

/* 
 *  ProductController.php
 *  Controller of users functions, Page ex.(/product/1) 
 */

/**
* 
*/
class UserMiddleware
{
  


    


      public function checkEmail($request)
      {
       
          if(Users::get(['where'=>['email'=>$request['email']]])){
              
              return 'User with email '.$request['email'].' already exists!';
          

          }

      }

      public function checkPassword($request)
      {
       
          if ($request['password']!=$request['password2']) {
             
           $rs['message'][]='The passwords must to be the same!';
            return $rs;
         
          }


      }


    public function checkEmptyFields($request)
    {
      $res = null;
        foreach ($request as $key => $value) {
           
            if (empty($value)) {
              $res['success'] =false;

              $res['message'][] = ucfirst($key).' is  empty. Please try again!';
              
            }

        }

        return $res;
      }

      /*
      *Check request parameters
      *@param $request data to update tadabase
      *  -Check for empty fields
      *  -Check if new email is not the same fith existing one
      *  -- if not check if new email already exists in database
      *  - if new password check if is  
      */

      public function checkUpdate($request)
      {
        $rs = null;
        //check for empty fields
        $rs=self::checkEmptyFields($request);


          if(!$rs){


                  if ($_SESSION['user']['email']!=$request['email']) {
                      
                       $rs=self::checkEmail($request);
                       $rs['email']='';
                       $rs['success']=false;
                  }

                  if (isset($request['password'])|| isset($request['password2'])) {

                          if ($request['password']!=$request['password2']) {
             
                            $rs['message'][]='The passwords must to be the same!';
                            $rs['success']=false;
                          }
                  
                          if ($rs['message']=='' && ($_SESSION['user']['password']!=$request['cuPwd'])) {         
                            $rs['message'][] = 'The current password doesn`t match !';
                            $rs['success']=false;
                          
                      }


                  } 

          }

          return $rs;

        
      }












      public static function checkRequest($request)
      {
        
        $res = null;

          if(!$request['email']){
              $res['success'] =false;
              $res['message'][] ='enter your email!';
          }
          

          if(!$request['password']){
              $res['success'] =false;
              $res['message'][] ='enter your password!';
          }
              if(!$request['password2']){
              $res['success'] =false;
              $res['message'][] ='enter your second password!';
          }
          
          if($request['password']!=$request['password2']){
              $res['success'] =false;
              $res['message'][] ='The passwords must to be the same!';
          }


      return    $res; 


      }




      public function checkLogin($request)
      {

          if(!$request['email']){
              $res['success'] =false;
              $res['message'][] ='Email address is  empty. Please try again!';
          }
          if(!$request['password']){
              $res['success'] =false;
              $res['message'][] ='Password is  empty. Please try again!';
          }
          return $res;
      }




}