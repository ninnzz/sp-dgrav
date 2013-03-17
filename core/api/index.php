<?php
	define('AppAUTH', 1);
	include('../conf/StatusCodes.php');
	include('../conf/AppConfig.php');
	include('../conf/DBConfig.php');
	include('../db_drivers/Connector.php');	
	foreach(glob("classes/*.php") as $file) include $file;


#gets the request URL and parses it format [ api/index.php/classname/paramter1/parametr2../parameterN ]

	#checks the method
	$method = strtoupper($_SERVER['REQUEST_METHOD']).'Action';
	if(trim($method) == 'Action'){
		$errorMessage = 'Undefined Request Method';
		echo $errorMessage;
		exit();
	}
	#checks if a path exists
	if(!isset($_SERVER['PATH_INFO'])){
		print_r(json_encode(array('meta'=>array('code'=>StatusCodes::c404,'message'=>StatusCodes::m404),'result_count'=>0)));
		exit();
	}
	#checks if path is valid
	$params = explode('/',$_SERVER['PATH_INFO']);
	if(isset($params[1]) && trim($params[1]) == ''){
		print_r(json_encode(array('meta'=>array('code'=>StatusCodes::c404,'message'=>StatusCodes::m404),'result_count'=>0)));
		exit();
	}
	$class = ucfirst(strtolower($params[1])).'Class';
	#checks if the class exists
	
	if(class_exists($class)){
		$activeClass = new $class();
	#checks if there is a valid method in the class
		if(method_exists($activeClass,$method))
			$result = $activeClass->$method($params);
		else{
			print_r(json_encode(array('meta'=>array('code'=>StatusCodes::c452,'message'=>StatusCodes::m452),'result_count'=>0)));
			exit();
		}
	}
	else{
		print_r(json_encode(array('meta'=>array('code'=>StatusCodes::c451,'message'=>StatusCodes::m451),'result_count'=>0)));
		exit();
	}


	print_r(json_encode($result));

?>