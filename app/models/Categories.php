<?php
namespace liw\app\models;
use liw\library\DB as DB; 

/* 
 * Get the last added products
 * @param integer $limit -> Limit of the products
 * @return array array of products
 */



class Categories
{
    public static function get($statements='')
    {


        return DB::getBy('categories',$statements);
    }

    public function categoriesWithChildren($statements='')
    {
    		$categories=DB::getBy('categories', ['where'=>['parent_id'=>'0']]);
    		
    		$rs = array();

    		for ($i=0; $i <count($categories); $i++) {

    			

    			$rs[]=$categories[$i];
				$childs=DB::getBy('categories', ['where'=>['parent_id'=>$categories[$i]['id']]]);		

				if ($childs) {
				    				# code...
				    			$rs[$i]['children']=$childs;
				    			}    			

    			}	
   

    			return $rs;
    }



}

