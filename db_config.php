<?php
$host = "localhost";
$user = "root";
$pass = "root";
$dbname = "sms";

$conn = mysqli_connect( $host, $user, $pass, $dbname);
error_reporting(E_ALL);
if( !$conn ){
	echo "Connection Failed ".mysqli_connect_error();
}

?>