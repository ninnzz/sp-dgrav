<?php
defined('AppAUTH') or die;
/*	
	Author: nino eclarin
	Description: 
		Class that connets to Mysql server using mysqli. Use function load() for get requests
		and post_query function for create, update and deletion. Make sure to sanitize the input 
		by calling the escape_string() function.


*/
	class Connector{
	
		function load($query_message){
			$message = '';
			$row_count = 0;
			$res = array();

			$link = mysqli_connect(DBConfig::DB_HOST, DBConfig::DB_USERNAME, DBConfig::DB_PASSWORD, DBConfig::DB_NAME) or die('Database Connection Error');
			if($link->connect_errno > 0){
				$err = $link->connect_error;
				$link->close() or die('no links to close');
				$res['error'] = true;
				$res['error_message'] = 'Database Connection Error [' . $err . ']' ;
    			return $res;
			}
			$link->autocommit(FALSE);
			if(!$result = $link->query($query_message)){
				$err = $link->error;
				$link->close();
				$res['error'] = true;
				$res['error_message'] = 'There was an error running the query [' .$err. ']' ;
				return $res;
			}

			while($row = $result->fetch_assoc()){
  		 		array_push($res, $row);
			}
			$res['result_count'] = $result->num_rows;

			$result->free();
			$link->commit();
			$link->close() or die('no links to close');
			return($res);
		}

		function post_query($query_message){
			$message = '';
			$row_count = 0;
			$res = array();

			$link = mysqli_connect(DBConfig::DB_HOST, DBConfig::DB_USERNAME, DBConfig::DB_PASSWORD, DBConfig::DB_NAME) or die('Database Connection Error');
			if($link->connect_errno > 0){
    			$err = $link->connect_error;
				$link->close() or die('no links to close');
    			die('Database Connection Error [' . $err . ']');
			}
			$link->autocommit(FALSE);
			if(!$result = $link->query($query_message)){
				$err = $link->error;
				$errNo = $link->errno;
				$affected = $link->affected_rows;
				$link->close();
				#echo $err;
 				return array('errcode'=>$errNo ,'error'=>$err,'affected_rows'=>$affected);
			}
			$res['affected_rows'] = $link->affected_rows;
			
			$link->commit();
			$link->close() or die('no links to close');
			return($res);

		}

		function escape_string($str){
			$link = mysqli_connect(DBConfig::DB_HOST, DBConfig::DB_USERNAME, DBConfig::DB_PASSWORD, DBConfig::DB_NAME) or die('Database Connection Error');
			if($link->connect_errno > 0){
    			$err = $link->connect_error;
				$link->close() or die('no links to close');
    			die('Database Connection Error [' . $err . ']');
			}
			$ret = $link->real_escape_string($str);
			$link->close() or die('no links to close');
			

			return $ret;
		}
	}
?>