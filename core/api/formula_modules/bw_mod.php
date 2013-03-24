<?php
defined('AppAUTH') or die;

/*----------------------------

Bandwidth Module
Author:nino elcarin

Gets the current bandwidth between the application and the data server.
This uses the IPERF tool. Running iperf client command will enable this module
to record the bandwidth.

Note: Iperf server deamon must be running on each application server to be able to get
the bandwidth. Iperf client tool must be installed in the data server as well.
See Iperf Documentation for details.
----------------------------*/

class bwMod{

	public function index($ip){

		$os = 'windows';
		if($os == 'windows'){
			$commands = new WindowsCommands();
		} else if ($os == 'linux'){
			$commands = new LinuxCommands();
		}
		
		$res = $this->getBW($commands::bw.' '.$ip.$commands::bw_options);
		return $res;
	}

	private function getBW($command){
		$res = array();

		print_r($command);
		exec($command,$res);

		if(count($res) <= 1){
		 	return array('error'=>true, 'error_message'=>'host unreachable','bw'=>'0');
		} else {


			$data = explode(' ', $res[count($res)-1]);
		 	return array('error'=>false,'bw'=>$data[count($data)-2]);

		}
	}



}


?>