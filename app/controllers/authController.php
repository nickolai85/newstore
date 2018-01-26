<?php
/**
* 
*/
class userController
{
	public function registerAction($smarty)
	{

		$smarty->assign('pageTitle', 'Main pageasas');
	    Loads::loadTemplate($smarty, 'auth/register'); 

	}
	public function saveAction()
	{
/*		$request=$_POST;
		$request['password']=md5($_POST['password']);
		
		DB::insert('users',$request);
		DB::redirect('/index/index/');*/

	}
}




?>