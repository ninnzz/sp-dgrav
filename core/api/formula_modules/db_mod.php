<?php
defined('AppAUTH') or die;	

/*----------------------------

Data Mass Module
Author:nino elcarin

Gets the total mass of the data server.
Adds the sum off all the databases and returns it to the calling class.
When changing Database Management System, change the query depending on what
DBMS you are going to use

----------------------------*/

class dbMod{
	public function index(){
		$db_connector = new Connector();
		$res = $db_connector->load("select table_schema 'Total', sum(data_length+index_length)/1024/1024 'Size' from information_schema.TABLES;");
		return $res;
	}
}

?>