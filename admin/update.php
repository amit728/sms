<?php
session_start();

if( $_SESSION['user_id'] ){
	echo "";
}else{
	echo "Error!...";
}

	include('header.php'); 
	include('../db_config.php');

if( isset($_POST['submit']) ){
	$id 	= $_POST['id'];
	$name 	= $_POST['name'];
	$rollno = $_POST['rollno'];
	$city 	= $_POST['city'];
	$parcont= $_POST['parcont'];
	$std 	= $_POST['std'];

	$sql = " UPDATE student SET name= '$name', rollno = '$rollno', city = '$city', parcont = '$parcont', std = '$std' WHERE id = '$id' ";
	$run = mysqli_query( $conn,$sql );

	if( $run ){ ?>
		<script>
			alert("Recoed Updated");
			window.open('dashboard.php');
		</script>
	<?php }else{?>
		<script>
			alert('Please fill correctly');
			window.open('edit.php','_self');
		</script>
	<?php }
}