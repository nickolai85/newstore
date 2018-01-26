<?php
//namespace liw\libray;
/**
* 
*/

class DB
{
	

	public function select($query)
	{
		$rs = new DBconnect;
		return $rs ->SELECT($query);

	}
	public static function getAll($table)
	{
		$a=new DBconnect;

		return $a->selectAll($table);

	}

	public static function insert($table,$request)
	{
		$a=new DBconnect;

		return $a->insertdb($table,$request);

	}


	public static function getBy($table,$criteries)
	{
		$a=new DBconnect;
	
		return $a->selectBy($table,$criteries);

	}


	
	public static function redirect($url)
	{
		
		return	header("Location:".$url , TRUE, 302);
		exit;

	}



}



