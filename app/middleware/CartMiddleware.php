<?php
namespace liw\app\middleware;
use liw\app\middleware\Middleware as Middleware; 

/* 
 *  ProductController.php
 *  Controller of users functions, Page ex.(/product/1) 
 */

/**
* 
*/
class CartMiddleware extends Middleware
{


      public  static function emptyFields($request)
      {

          return self::checkEmptyFields($request);
      }
  

}