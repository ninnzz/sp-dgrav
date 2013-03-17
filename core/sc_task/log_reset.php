<?php

if(!isset($_GET['opt'])){
	exit();
}

define('AppAUTH', 1);
include('../conf/DBConfig.php');
include('../db_drivers/Connector.php');	

class LogReset{

	public function index(){

		$db_connector = new Connector();
		$res = $db_connector->post_query("set global log_output='TABLE'; ");
		$res = $db_connector->post_query("set global general_log=ON; ");
		$res = $db_connector->post_query("truncate mysql.general_log; ");
	}
	public function initApp(){
		$db_connector = new Connector();
		$res = $db_connector->load("select id from app where monitoring=true;");
		$crls = '';
		for($i=0;$i<count($res)-1;$i++) {
			$crls.="curl http://localhost/dgrav/core/api/formula_modules/get_data_gravity.php?appId=".$res[$i]['id']." -s -m 1\n";
		}
		var_dump($crls);
		$fh = fopen("appCurlListing.bat", 'w');
		fwrite($fh, $crls);
		fclose($fh);
	}
}

$lr = new LogReset();

if($_GET['opt'] == '0'){
	$lr->initApp();
	echo "Loaded all active application.";
} else if($_GET['opt'] == '1'){
	$lr->index();
}

?>