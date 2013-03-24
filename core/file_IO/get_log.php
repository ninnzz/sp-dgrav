<?php
defined('AppAUTH') or die;


$dir = "../../app_data/$id/logs/";

if(is_dir($dir)) {
	
	$handle = opendir($dir);

	while (false !== ($entry = readdir($handle))) {
		if ($entry != "." && $entry != "..") {
			$content .= ("\n".trim(file_get_contents($dir.$entry)));
			$content_count++;
		}
	}
	closedir($handle);
	$err = false;
} else{
	$err = true;
}

?>