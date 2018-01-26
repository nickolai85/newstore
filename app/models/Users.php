<?php
namespace liw\app\models;
use liw\library\DB as DB; 
/* 
 * New user registration
 * 
 * 
email
pwd
name
phone
adress

 */


/**
* 
*/
class Users
{



    public static function get($statements='')
    {

        return DB::getBy('users',$statements);
    }
    
    
    public static function insert($request)

    {
        $rs=DB::insert('users',$request);
        $res = null;
        if ($rs['error']==null) {

            $res=DB::getBy('users',['where'=>['email'=>$request['email'],'password'=>$request['password']]]);

          
        }else
         {

            $res['success'] =false;
            $res['message'] ='Registration Error';
        # code...
        }
        

        return $res;
    }

    public static function auth($statements)
    {
        return DB::getBy('users',$statements);  

    }




}
