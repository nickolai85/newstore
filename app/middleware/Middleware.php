<?php
namespace liw\app\middleware;
use liw\app\models\Users as Users; 


/**
* 
*/
class Middleware
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

}