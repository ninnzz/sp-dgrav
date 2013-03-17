<?php
	defined('AppAUTH') or die;

	final class AppConfig{
		//title
		const app_name		= "dGrav";
		//footer copyright
		const app_copyright	= "Copyright © 2012 dGrav. All Rights Reserved";

		//redirect
		const app_url 		= "http://localhost/dGrav/";
		//for ajax forms that returns large data
		const ajax_url 		= "http://localhost/SmartGroceries/ajax/?action=";
		//for ajax forms that returns a simple message
		const processor_url	= "http://localhost/SmartGroceries/ajax/processor.php?";
		
		//set app status
		const site_status 	= true;
		//if you want to log
		const log 			= true;
		const logs_path 	= "../../logs/";
		const logs_app_path 	= "../../app_data/";
		//auto generate CSS / JS?
		const replaceCSS 	= true;
		const replaceJS 	= true;
		//render modules?
		const renderModules	= true;
		
		//if you have different css templates
		const pages			= "";
		//user roles
		const roles			= "Administrator,Client,Store Owner";
		//all possible position of modules
		const positions		= "center,header,footer,left";

		//pagination
		const page_limit = 3;
		const aKey = 'e1394a46813319ae4e791e481f6dc53c';		
	}
?>
