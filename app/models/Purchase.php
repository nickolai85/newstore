<?php
namespace liw\app\models;
use liw\library\DB as DB; 


/* 
 * Model of purchase table
 * @param $request array with  order ID and ordered items
 *
 */

/**
* 
*/



class Purchase
{
    public static function get($statements='')
    {
        return DB::getBy('purchase',$statements);
    }

    public static function insert($request)
    {
    	

    	$sql ="INSERT INTO purchase 

    		 (order_id, product_id, price , amount, created_at)

    		 VALUES"; 

        $values=array();
        //creating array of rows for query for eqach product
		$orderId=$request['order_id'];
        foreach ($request['saleCart'] as $item) {

			$values[]="('{$orderId}','{$item['id']}','{$item['price']}','{$item['cnt']}', now())";

			        }
		$sql .=implode($values, ',');
		$rs=DB::execute($sql);
		return $rs;

    }


    public static function products ($orderId)
    {
       
       $sql = "SELECT `pe`.*, `ps`.name 
                FROM purchase as `pe`
                JOIN products as `ps` ON `pe`.product_id=`ps`.id";

                return DB::join($sql, ['where'=>['pe.order_id'=>$orderId]]);
    }

}

