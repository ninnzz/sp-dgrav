<?php
defined('AppAUTH') or die;
/*----------------------------

Admin Class
Author:nino elcarin

Manages all the administrator requests and functionalities.
See URL listing in the dGrav documentation for reference.

----------------------------*/

class AdminClass{
	public function GETAction($params){
		$db_connector = new Connector();
		$uid = '';
		$result = array();

		if(count($params) == 3){

			if($params[2] == 'allapp'){
				$res = $db_connector->load("select * from app");
				return array('meta'=>array('code'=>'200','message'=>'Applications found'),'data'=>$res,'result_count'=>1);
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


		if(count($params) == 3){
			if($params[2] == 'newapp'){
				$name = $db_connector->escape_string($_POST['name']);
				$id = md5($name.''.$d);
				
				if($_POST['opt'] == 1){
						$db_name 		= trim($_POST['db_name']);
						$path 			= trim($_POST['path']);
						$host 			= trim($_POST['host']);
						$sizeDisk 		= trim($_POST['sizeDisk']);
						$cr_mem			= trim($_POST['cr_mem']);
						$cr_disk		= trim($_POST['cr_disk']);
						$cpu			= trim($_POST['cpu']);
						$mem_con		= trim($_POST['mem_con']);
						$same_server	= trim($_POST['same_server']);
						$use_browser	= trim($_POST['use_browser']);
						$id 			= trim($_POST['id']);
						$volume			= $sizeDisk+$mem_con;
						$density		= $cr_disk+$cr_mem+$cpu;
						$appMass		= $volume*$density;

						$fh = fopen("../../app_data/$id/app_config.conf", 'w');
						$str = "appName=$name\ndb_name=$db_name\npath=$path\nhost=$host\nsize in disk=$sizeDisk\ncompression ratio(memory)=$cr_mem\ncompression ratio(disk)=$cr_disk\ncpu utilization=$cpu\nmemory consumption=$mem_con\nsame server=$same_server\nuses browser=$use_browser\ndensity=$density\nvolume=$volume\nappMass=$appMass";
						fwrite($fh, $str);
						fclose($fh);

					return array('meta'=>array('code'=>'200','message'=>'Updated Application Data'),'data'=>array('app_id'=>$id),'result_count'=>1);
				}

				$res = $db_connector->post_query("insert into app values('$id','$name','$d',true);");
				if(isset($res['error'])){
					return array('meta'=>array('code'=>'510','message'=>'Failed to add Application Data'),'data'=>'','result_count'=>0);
				} else{
					if(mkdir("../../app_data/$id",0777,true)){				
						
						$db_name 		= trim($_POST['db_name']);
						$path 			= trim($_POST['path']);
						$host 			= trim($_POST['host']);
						$sizeDisk 		= trim($_POST['sizeDisk']);
						$cr_mem			= trim($_POST['cr_mem']);
						$cr_disk		= trim($_POST['cr_disk']);
						$cpu			= trim($_POST['cpu']);
						$mem_con		= trim($_POST['mem_con']);
						$same_server	= trim($_POST['same_server']);
						$use_browser	= trim($_POST['use_browser']);
						$volume			= $sizeDisk+$mem_con;
						$density		= $cr_disk+$cr_mem+$cpu;
						$appMass		= $volume*$density;

						$fh = fopen("../../app_data/$id/app_config.conf", 'w');
						$str = "appName=$name\ndb_name=$db_name\npath=$path\nhost=$host\nsize in disk=$sizeDisk\ncompression ratio(memory)=$cr_mem\ncompression ratio(disk)=$cr_disk\ncpu utilization=$cpu\nmemory consumption=$mem_con\nsame server=$same_server\nuses browser=$use_browser\ndensity=$density\nvolume=$volume\nappMass=$appMass";
						fwrite($fh, $str);
						fclose($fh);

					return array('meta'=>array('code'=>'200','message'=>'Added Application Data'),'data'=>array('app_id'=>$id),'result_count'=>1);

					}
				}
				
			} else if($params[2] == 'getapp'){
				$id = $db_connector->escape_string($_POST['appId']);
				$res = $db_connector->load("select * from app where id='$id';");
				
				if($res['result_count'] < 1) {
					return array('meta'=>array('code'=>'410','message'=>'Invalid Application Id'),'data'=>'','result_count'=>0);
				} else {
					$res =	explode("\n",trim(file_get_contents("../../app_data/".trim($res[0]['id'])."/app_config.conf")));

					$name = explode("=",$res[0]);
					$db_name = explode("=",$res[1]);
					$path = explode("=",$res[2]);
					$host = explode("=",$res[3]);
					$sizeDisk = explode("=",$res[4]);
					$cr_mem = explode("=",$res[5]);
					$cr_disk = explode("=",$res[6]);
					$cpu = explode("=",$res[7]);
					$mem_con = explode("=",$res[8]);
					$same_server = explode("=",$res[9]);
					$use_browser = explode("=",$res[10]);
					$same = ($same_server[1] == 'true')?'checked':'';
					$ubrowser = ($use_browser[1] == 'true')?'checked':'';
					include("../templates/application-setting.php");

					return array('meta'=>array('code'=>'200','message'=>'Application data'),'data'=>$template,'result_count'=>1);

				}				


			} else if($params[2] == 'delete'){
				$id = $db_connector->escape_string($_POST['appId']);
				$res = $db_connector->post_query("delete from app where id='$id';");
				
				if(isset($res['error'])) {
					return array('meta'=>array('code'=>'410','message'=>'Invalid Application Id'),'data'=>'','result_count'=>0);
				} else{
					return array('meta'=>array('code'=>'201','message'=>'Application Deleted'),'data'=>'','result_count'=>0);
				}
			} else if($params[2] == 'monitor'){
				if(!isset($_POST['monitoring'])) {
					return array('meta'=>array('code'=>'406','message'=>'Access denied.'),'data'=>'','result_count'=>0);
				} else {
					$opt = $db_connector->escape_string($_POST['monitoring']);
					$id = $db_connector->escape_string($_POST['id']);
					$res = $db_connector->post_query("update app set monitoring=".$opt." where id='".$id."';");
					
					if(isset($res['error'])) {
						return array('meta'=>array('code'=>'410','message'=>'Failed to update application monitoring status'),'data'=>'','result_count'=>0);
					} else{
						return array('meta'=>array('code'=>'201','message'=>'Application monitoring status updated'),'data'=>'','result_count'=>0);
					}
				}
			}
		}
	}
}

?>