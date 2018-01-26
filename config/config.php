<?php
/* 
*Config files
*
*/ 
//Constants references to Controllers
define ('PathPrefix','../app/controllers/');
define ('PathPostfix','Controller.php');


//used template
$template='default';

//Templates files  path (#.tpl)

define ('TemplatePrefix','../views/'.$template.'/');
define ('TemplatePostfix','.tpl');

//Website Templates files  path

define ('TemplateWebPath','../templates/'.$template.'/');
//Initialisation of smarty template
//full path to Smarty.class.php
//require_once('../library/DBconnect.php');
/*session_start();
require_once('../library/Sessions.php');
/**/

require_once '../vendor/autoload.php';





require_once('../library/Smarty/libs/Smarty.class.php');
//echo  $config['baseURL'].'library/Smarty/libs/Smarty.class.php';
$smarty = new Smarty ();

$smarty->setTemplateDir(TemplatePrefix);
$smarty->setCompileDir('tmp/smarty/templates_c');
$smarty->setCacheDir('tmp/smarty/cache');
$smarty->setConfigDir('library/Smarty/configs');
$smarty->assign('TemplateWebPath', TemplateWebPath);


