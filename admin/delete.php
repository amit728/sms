<?php
session_start();

if( $_SESSION['user_id'] ){
	echo "";
}else{
	echo "Error!...";
}

	include('../db_config.php');
	$id = $_GET['stdid'];
	$sql = " DELETE FROM student WHERE id = '$id'";
	$run = mysqli_query( $conn, $sql);

	$data = mysqli_fetch_assoc( $run ); 
	header( 'Refresh:1; url=dashboard.php' );
	echo "<center>Data Deleted Successfully</center>";
?>
