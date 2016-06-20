<!-- 
  Author: Ashley Hanes
  Revision Date: 06/17/2016
  File Name: database_connection.php
  Description: Database Connection
-->

<?php

$debug=true;

// if ($_SERVER['HTTP_HOST'] == "localhost" OR $_SERVER['HTTP_HOST'] == "127.0.0.1") {
	$serverName = "";
	$connectionInfo = array( "Database"=>"SA1_Assessment");
	$conn = sqlsrv_connect( $serverName, $connectionInfo);

	if( $conn ) {
     	echo "Connection established.<br />";
	} else{
     	echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
    }

    try {
    	$db = new PDO("sqlsrv:Server=;Database=SA1_Assessment", "", "");
    		if ($debug) {
				echo "Successfully connected to: ";
				echo "<p />";
    		}
    }
    	catch (PDOException $e) {
		$error_message = $e->getMessage();
    		include("..\errors\database_error.php");
		echo $error_message;
		exit();
	}
// }


?>