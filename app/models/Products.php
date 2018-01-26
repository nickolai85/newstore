<?php
namespace liw\app\models;
use liw\library\DB as DB; 
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* 
 * Get the last added products
 * @param integer $limit -> Limit of the products
 * @return array array of products
 */

/**
* 
*/


class Products
{
  
    public static function get($statements='')
    {

        return DB::getBy('products',$statements);
    }

}