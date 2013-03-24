<?php

define('AppAUTH', 1);

/*----------------------------

Data Gravity Module
Author:nino elcarin

Gets the total data gravity between an application and the data server.
Initializes all other formula modules and loads the application configuration to get the 
application mass.

Logs the recorded values for further use.
----------------------------*/

include('../../conf/AppConfig.php');
include('../../conf/CommandsConfig.php');
include('../../conf/DBConfig.php');
include('../../logs/Logger.php');
include('../../db_drivers/Connector.php');	
include('db_mod.php');
include('requests_mod.php');
include('latency_mod.php');
include('bw_mod.php');


class dgravMainModule{

	private $appData;

	public function initApp($appId){

		if(is_dir('../../../app_data/'.$appId)){
			if(is_file('../../../app_data/'.$appId.'/app_config.conf')){
				$data = explode("\n",trim(file_get_contents('../../../app_data/'.$appId.'/app_config.conf')));
				
				$this->appData['appId'] = $appId;
				
				foreach ($data as $d) {
					$tmp = explode('=', $d);
					$this->appData[$tmp[0]] = $tmp[1];
				}
				return true;
			} else{
				return false;
			}
		} else{
			return false;
		}
	}


	public function index(){

		$log = new Logger();

		date_default_timezone_set('Asia/Manila');
		$date = new DateTime();
		$d = $date->format('Y-m-d H:i:s');
		$d1 = $date->format('Y-m-d');
		
		$dbM = new dbMod();
		$latency = new latencyMod();
		$request = new requestsMod();
		$bandwidth = new bwMod();

		$data_mass = $dbM->index();
		$requests = $request->index($this->appData['db_name'],$this->appData['host']);
		$bw = $bandwidth->index($this->appData['host']);
		$lat = $latency->index($this->appData['host']);
/*
		print_r($data_mass);
		print_r($requests);
		print_r($lat);
		print_r($bw);
*/
		/*--------------------DGrav Values----------------------------*/
		$data_mass = $data_mass[0]['Size'];
		$app_mass = $this->appData['appMass'];
		$ave_request = $requests['average_request'];
		$ping = $lat['ping'];
		$ave_request_size = $requests['average_request_size'];
		$bndw = $bw['bw'];
		$app_id = $this->appData['appId'];
		/*-----------------------------------------------------------*/
		
		if($bndw == 0 || ($ping+($ave_request_size/$bndw)) == 0){
			$gravity = 0;
			$log_message = 'Error in getting data gravity';
		} else{
			$dir = "../../../app_data/$app_id/logs";
			$fname = "/log[$d1].log";
			$gravity = ($data_mass*$app_mass*$ave_request)/pow(($ping+($ave_request_size/$bndw)),2);
			$log_data = "$gravity,$data_mass,$app_mass,$ave_request,$ping,$ave_request_size,$bndw";
			$log_message = "Data gravity recorded";
			$log->logDataGravity($fname,$log_message,$log_data,$d,$dir);
		}	
	}

}

$dgrav = new dgravMainModule();
if($dgrav->initApp($_GET['appId'])){
	$dgrav->index();

} else{

	//curl http://localhost/dgrav/core/api/formula_modules/get_data_gravity.php?appId=a1e949cfd89f400a636e71b54186ab2b -s -m 1
}


?>