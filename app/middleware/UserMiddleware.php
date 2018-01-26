<?php
namespace liw\app\middleware;
use liw\app\models\Users as Users; 

/* 
 *  ProductController.php
 *  Controller of u
 sers functions, Page ex.(/product/1) 
 */

/**
* 
*/
class UserMiddleware
{
  
      public static function  checkRequest($request)
      {
        
        $res = null;

          if(!$request['email']){
              $res['success'] =false;
              $res['message'][] ='enter your email!';
          }
          
          if(Users::get(['where'=>['email'=>$request['email']]])){
              $res['success'] =false;
              $res['message'][] ='User with email '.$request['email'].' already exists!';
          

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