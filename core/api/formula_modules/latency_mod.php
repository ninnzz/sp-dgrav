<?php
defined('AppAUTH') or die;

/*----------------------------

Latency Module
Author:nino elcarin

Uses the ping command to get the latency between the data server
and the application server. Returns an error message or the ping in milli seconds
to the calling class.

----------------------------*/

class latencyMod{

	public function index($ip){

		$os = 'windows';
		if($os == 'windows'){
			$commands = new WindowsCommands();
		} else if ($os == 'linux'){
			$commands = new LinuxCommands();
		}
		
		$res = $this->getPing($commands::ping.$ip);
		return $res;
	}

	private function getPing($command){
		$res = array();

		exec($command,$res);

		if(count($res) <= 1){
			return array('error'=>true, 'error_message'=>'host unreachable','ping'=>'0');
		} else {
			$data = explode(',', $res[count($res)-1]);
			$ping = explode('=', $data[2]);
			return array('error'=>false, 'ping'=>($ping[1]/1000));
		}
	}



}



?>