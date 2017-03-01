<?php 
	//Front Controller
/*Главная страница. С этой страницы перенаправляются дальше все запросы*/
	
	ini_set('display_errors', 1);
	error_reporting(E_ALL);

	//подключение файлов 
	define('ROOT', dirname(__FILE__));
	require_once(ROOT.'/components/Autoload.php');
	//require_once(ROOT.'/components/Router.php');
	//require_once(ROOT.'/config/connectdb.php');
	$router=new Router();
	$router->run();

	
 ?>