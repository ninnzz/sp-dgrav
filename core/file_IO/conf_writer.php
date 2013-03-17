<?php
	$file = "../conf/DBConfig.php";
	$file2 = "../conf/DBConfig.conf";
	// $current = file_get_contents($file);

	// echo $current; 
	//host:db_host, bandwidth:bandwidth,compression:compression, username:mysql_username,password:mysql_password,db:db_name
	$host = $_POST['host'];
	$bandwidth = $_POST['bandwidth'];
	$compression = $_POST['compression'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$db_name = $_POST['db'];

	$fh = fopen($file, 'w');
	$str = "<?php\ndefined('AppAUTH') or die;\nfinal class DBConfig{\nconst DB_HOST='$host';\nconst DB_USERNAME='$username';\nconst DB_NAME	='$db_name';\nconst DB_PASSWORD	= '$password';\nconst DB_DRIVER= 'mysqli';\nconst DB_COMPRESSION= '$compression';\nconst DB_BANDWIDTH= '$bandwidth'; } ?>";
	fwrite($fh, $str);
	fclose($fh);

	$fh = fopen($file2, 'w');
	$str = "host=$host\nbandwidth=$bandwidth\ncompression=$compression\nusername=$username\npassword=$password\ndb_name=$db_name";
	fwrite($fh, $str);
	fclose($fh);

	echo "Updated Data Server Config.";












