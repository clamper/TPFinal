<?php
 
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	
	require "Config/Autoload.php";
	require "Config/Config.php";

	use Config\Autoload as Autoload;
	use Config\Router 	as Router;
	use Config\Request 	as Request;
		
	Autoload::start(); 

	session_start();

	$request = new Request();
	$method = $request->getMethod();

	if ($method != "logout" && $method != "login" && $method != "addToCart" && $method != "myCart" && $method != "ConfirmTransaction" && $method != "removeToCart" )
		require_once(VIEWS_PATH."header.php");

	Router::Route($request);

	require_once(VIEWS_PATH."footer.php");
?>