<?php
defined('AppAUTH') or die;

/*----------------------------

Average Request and Average Request Size Module
Author:nino elcarin

Gets the average request and request size of the application to the data server.
This is done by accessing the logs and manipulating some built in queries and function of mysql.
See MySql documentation for GENERAL LOG format. Average request size is the sum of all the queries
recieved by the data server. Each unique Application Host and Database name is associated with the
request to properly map the computation. The average request per second is computed by getting the
latest and the earliest recorded request. Then, the time is averaged.

If you want to use different DBMS, change the query depending on the builtin functions of the DBMS
going to be used.

----------------------------*/

class requestsMod{

	public function index($db_name,$host_ip){
		$size = 0;
		$d1 = '';
		$d2 = '';
		$timeElapsed = 1;
		$db_connector = new Connector();

		$res1 = $db_connector->load("select *, count(*) ,event_time from mysql.general_log where command_type = 'Init DB' and argument ='$db_name' and user_host like '%$host_ip%' group by thread_id");

		if($res1['result_count'] == 0){
			return array('average_request_size'=>0, 'average_request'=>0);
		}
//improve this code later by using sum in mysql..!!
		for($i=0;$i<count($res1)-1;$i++){
	
			$t_id = $res1[$i]['thread_id'];
			$res = $db_connector->load("select argument  from mysql.general_log where command_type = 'Query' and user_host like '%$host_ip%' and thread_id = $t_id");

			for($j=0;$j<count($res)-1;$j++) {
			
				$size += strlen($res[$j]['argument']);
			}
		}
		
		$dTime = $db_connector->load("select thread_id, event_time from mysql.general_log where (command_type = 'Init DB' or command_type = 'Connect') and argument ='$db_name' and user_host like '%$host_ip%' ");

		if(count($dTime) > 2){
			$d1 = new DateTime($dTime[0]['event_time']);
			$d2 = new DateTime($dTime[count($dTime)-2]['event_time']);
		} 

		if($d2 != ''){
			$diff=$d2->diff($d1);
			$ds = $diff->format( '%H:%I:%S' );
			$timeElapsed = $this->time2seconds($ds);
		}

		if((count($res1)-1) == 0){
			$average_request_size = 0;			
		} else if((count($res1)-1) > 0){
			$average_request_size = $size/(count($res1)-1);
		}
		if($timeElapsed == 0){
			$timeElapsed = 1;
		}
		$average_request = (count($res1)-1)/$timeElapsed;
		
		return array('average_request_size'=>$average_request_size, 'average_request'=>$average_request);
	}

	private function time2seconds($time){
    	list($hours, $mins, $secs) = explode(':', $time);
    	return ($hours * 3600 ) + ($mins * 60 ) + $secs;
	}
}


?>