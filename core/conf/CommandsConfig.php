<?php
	defined('AppAUTH') or die;
	
/*----------------------------

Commands list
Author:nino elcarin

Class that contains all the constat command and arguments that are used in the application

----------------------------*/
	class WindowsCommands{
		const ping = "ping -n 5 ";
		const bw = "iperf -c";
		const bw_options = " -f Mbytes";
	}
	class LinuxCommands{
		const ping = "ping /n 5 ";
		const bw = "iperf /c";
	}

?>

