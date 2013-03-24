<?php
defined('AppAUTH') or die;
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
			if($params[2] == 'allapp'){
				$res = $db_connector->load("select * from app");
				return array('meta'=>array('code'=>'200','message'=>'Applications found'),'data'=>$res,'result_count'=>1);
			} else if($params[2] == 'allgrav'){
				$res = $db_connector->load("select id,name from app;");
				if($res['result_count'] < 1) {
					return array('meta'=>array('code'=>'411','message'=>'Failed to get applications'),'data'=>'','result_count'=>0);
				} else {
					$err = false;
					$content = "";
					$content_count = 0;
					for($i=0;$i<$res['result_count'];$i++){
						$id = $res[$i]['id'];
						$content .= $res[$i]['name']."@@\n";
						include('../file_IO/get_log.php');
						if($i != $res['result_count']-1){
							$content .= "\n<!>\n";
						}
						if($err){
							return array('meta'=>array('code'=>'410','message'=>'Cannot find application folder'),'data'=>'','result_count'=>0);
						}
					}
					return array('meta'=>array('code'=>'201','message'=>'Found Data Gravity Logs'),'data'=>$content,'result_count'=>$content_count);
				}
	
			}
		} else if(count($params) > 3){
			if($params[2] == 'app'){
				$id = $params[3];
				$id = $db_connector->escape_string($id);

				$res = $db_connector->load("select * from app where id='".$id."';");
				
				if($res['result_count'] < 1) {
					return array('meta'=>array('code'=>'410','message'=>'Invalid Application Id'),'data'=>'','result_count'=>0);
				} else {
					$err = false;
					$content = "";
					$content_count = 0;
					include('../file_IO/get_log.php');	

					if(!$err){
						return array('meta'=>array('code'=>'201','message'=>'Found Data Gravity Logs'),'data'=>$content,'result_count'=>$content_count);
					} else{
						return array('meta'=>array('code'=>'410','message'=>'Cannot find application folder'),'data'=>'','result_count'=>0);
					}
				}
			}
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