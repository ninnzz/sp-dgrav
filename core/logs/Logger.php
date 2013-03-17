<?php
defined('AppAUTH') or die;	


class Logger{
	
	public function logGeneral($fileName, $logDate, $logData, $logMessage){


	}
	public function logDataGravity($fileName, $logMessage, $logData, $logDate,$dir){
		
		if(is_dir($dir)){
			$fileName = $dir.$fileName;
		} else{
			if(mkdir($dir,0777,true)){
				$fileName = $dir.$fileName;
			} else{


				
			}
			

			//put error logs here later

		}
		if(file_exists($fileName)){
			$fh = fopen($fileName, 'a');
			$str = "\n$logDate | $logData | $logMessage";
			fwrite($fh, $str);
			fclose($fh);
		}
		else{
			$fh = fopen($fileName, 'w');
			$str = "\n$logDate | $logData | $logMessage";
			fwrite($fh, $str);
			fclose($fh);	
		}
	}
}

?>