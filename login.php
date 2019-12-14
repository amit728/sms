<?php
	include('db_config.php'); 

	session_start();
	if( isset($_SESSION['user_id'] )){
		header( 'location: admin/dashboard.php' );
	}

if( isset($_POST['submit']) ){
	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = " SELECT * FROM admin where username = '$username' AND password = '$password' ";
	$run = mysqli_query( $conn, $sql);

	if( mysqli_num_rows( $run ) < 1 ){ ?>
		<script>
			alert('Check Username & Password once');
			window.open('login.php', '_self');
		</script>
	<?php }else{
		$data = mysqli_fetch_assoc( $run );
		$id = $data['id'];	

		$_SESSION['user_id'] = $id;
		header( 'location: admin/dashboard.php' );
	}

}
?>



<!DOCTYPE html>
<html>
<head>
	<title>Student Management System</title>

	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">

</head>

<body>
<div class="container pt-5">
	<div class="row">
		<div class="col-sm-12 pb-5">
			<h2 class="text-center">Welcome to Student Student Management System</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<form class="form" action="login.php" method="post">
			<h3 class="pb-3">Admin Login</h3>
				<div class="form-group row">
					<label for="username" class="col-sm-4">Username:</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="username" placeholder="Username" required>
					</div>
				</div>
				<div class="form-group row">
					<label for="username" class="col-sm-4">Password:</label>
					<div class="col-sm-8">
						<input type="password" name="password" class="form-control" placeholder="Password" required>
					</div>
				</div>
				<input type="submit" name="submit" class="btn btn-primary" value="Login">				
			</form>	
		</div>
	</div>
</div>

<script type="text/javascript" src="assets/js/script.js"></script>
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>