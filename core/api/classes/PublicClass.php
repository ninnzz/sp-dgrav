<?php

/*----------------------------

Admin Class
Author:nino elcarin

Manages all the administrator requests and functionalities.
See URL listing in the dGrav documentation for reference.

----------------------------*/

class PublicClass{
	public function GETAction($params){
		$db_connector = new Connector();
		$uid = '';
		$result = array();

		if(count($params) == 3){

			
		}
	}
	public function POSTAction($params){
		$db_connector = new Connector();
		$uid = '';
		$result = array();

		date_default_timezone_set('EST');
		$date = new DateTime();
		$d = $date->format('Y-m-d H:i:s');


		
	}
}

?>