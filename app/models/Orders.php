<?php
namespace liw\app\models;
use liw\library\DB as DB; 

/* 
 * Model of orders Table
 * @param table orders Limit of the products
 */

/**
* 
*/



class Orders
{

	/*
	*	get method 
	*   retrieve data from data base (SELECT)
	*	@param $statements array with criteria for getting data from database
	*/
    public static function get($statements='')
    {
        return DB::getBy('orders',$statements);
    }

    /*
    *  	Create Order
    * 	Save data to database
    * 	@param $request array with data from action 
    *   @return integer ID of created order
    */

    public static function insert($request)
    {
        $data['user_id'] = $_SESSION['user']['id'];
        $data['comment'] = "User id: ".$_SESSION['user']['id'].";Name:".$request['name'].";Phone:".$request['phone']."					;Address:".$request['address'];
        $data['user_ip']= $_SERVER['REMOTE_ADDR'];

        $rs=DB::insert('orders',$data);
        if ($rs) {
        	
        	$sql=self::get(['limit'=>1,'desc'=>'id']);
       		
        	if (isset($sql[0])) {


        		return $sql[0]['id'];
        
       		}

        }
        


    }



    public static function purchaseProducts($userId)
    {
        $sql=self::get(['where'=>['user_id'=>$userId],'desc'=>'id']);

        $rs=array();
        for ($i=0; $i <count($sql) ; $i++) { 
            
                $rs[]=$sql[$i];
                $childs=Purchase::products($sql[$i]['id']); 

                if ($childs) {
                          

                          $rs[$i]['children']=$childs;
                      }      



        }

        return $rs;
    }




}

