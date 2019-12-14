<?php  ?>

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
			<p class="text-right"><a href="login.php">Admin Login</a></p>
			<h2 class="text-center">Welcome to Student Student Management System</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<form class="form" action="" method="get">
			<h3 class="pb-3">Search Student</h3>
				<div class="form-group row">
					<label for="username" class="col-sm-4">Choose Standard</label>
					<div class="col-sm-8">
						<select class="custom-select" name="std">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label for="username" class="col-sm-4">Roll No.</label>
					<div class="col-sm-8">
						<input type="text" name="rollno" class="form-control">
					</div>
				</div>
				<input type="submit" name="search" class="btn btn-primary" value="Search">
			</form>	
		</div>
	</div>
	<div class="row pt-5">
		<div class="col-sm-12">
			<table class="table table-bordered">
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Roll No.</th>
					<th>City</th>
					<th>Parent Contact</th>
					<th>Standard</th>
					<th>Image</th>
				</tr>
				<?php 
				include('db_config.php');

				if( isset($_GET['search']) ){
					$std 	= $_GET['std'];
					$rollno = $_GET['rollno'];

					$sql = " SELECT * FROM student where std = '$std' AND rollno = '$rollno' ";
					$run = mysqli_query( $conn, $sql);

					if( mysqli_num_rows( $run ) > 0 ){ 
					while( $data = mysqli_fetch_array( $run ) )  {?>
				<tr>
					<td><?php echo $data['id']; ?></td>
					<td><?php echo $data['name']; ?></td>
					<td><?php echo $data['rollno']; ?></td>
					<td><?php echo $data['city']; ?></td>
					<td><?php echo $data['parcont']; ?></td>
					<td><?php echo $data['std']; ?></td>
					<td><img src="uploads/"<?php echo $data['image']; ?>"></td>
				</tr>
				<?php 
					}}else{ ?>
						<script>alert('No records available');</script>
					<?php }
				}
				?>
			</table>
		</div>
	</div>
</div>

<script type="text/javascript" src="assets/js/script.js"></script>
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>