<?php
	$file2 = "../conf/DBConfig.conf";
	$tmp = explode("\n",file_get_contents($file2));
	$host = explode('=',$tmp[0]);
	$bw = explode('=',$tmp[1]);
	$cr = explode('=',$tmp[2]);
	$username = explode('=',$tmp[3]);
	$password = explode('=',$tmp[4]);
	$db_name = explode('=',$tmp[5]);

	echo "<h4>Data Server Setting</h4><table class='table table-bordered'>";
	echo "<tr><td>Host</td><td><input type='text' id='db-host' placeholder='ex. 127.0.0.1' value='".$host[1]."'/> </td></tr>";
	echo "<tr><td>Bandwidth(within same server)</td><td><input type='text' id='db-sever-bandwidth' placeholder='MBps' value='".$bw[1]."' /></td></tr>";
	echo "<tr><td>Compression Ratio</td><td><input type='text' id='data-compression' placeholder=' (0-1]' value='".$cr[1]."'/></td></tr>";
	echo "<tr><td>Mysql User(for dgrav)</td><td><input type='text' id='mysql-username' value='".$username[1]."'/></td></tr>";
	echo "<tr><td>Mysql password</td><td><input type='password' id='mysql-password' value='".$password[1]."'/></td></tr>";
	echo "<tr><td>Database Name</td><td><input type='text' id='mysql-db' value='".$db_name[1]."'/></td></tr>";
	echo "<tr><td colspan='2'><button class='btn btn-danger' onclick='updateDataServerSettings()'>Update Settigs</button></td></tr></table>";

?>