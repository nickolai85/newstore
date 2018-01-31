<?php
namespace liw\app\models;
use liw\app\models\Orders as Orders;
use liw\library\DB as DB; 
/* 
 * New user registration
 * 
 *
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


    public static function update($request='')
    {
        
        
    return DB::update('users',$request,['where'=>['email'=>$_SESSION['user']['email'], 'password'=>$_SESSION['user']['password']]]);
        
    }

    /*
    * Get data of current users
    *
    *@return array of orders linked to users
    */
    public static function Orders()
    {
        $user_Id= isset($_SESSION['user']['id']) ? $_SESSION['user']['id']: 0;
        $userId= intval($user_Id );
        $rs=Orders::purchaseProducts($userId);
        return $rs;
    }


}
