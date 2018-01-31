<?php
namespace liw\library;
use  liw\library\DBconnect as DBconnect;
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

	public static function lastId()
	{
		$a=new DBconnect;
	
		return $a->lastId();

	}
	public static function update($table,$request,$atribute)
	{
		$a=new DBconnect;
	
		return $a->updatedb($table,$request,$atribute);

	}

	public static function execute($sql)
	{
		$a=new DBconnect;
	
		return $a->Execute($sql);

	}


	public static function redirect($url)
	{
		
		return	header("Location:".$url , TRUE, 302);
		exit;

	}

	public static function join($sql, $atribute)
	{
		$a=new DBconnect;
		
		return $a->selectJoin($sql, $atribute);
	}

}



