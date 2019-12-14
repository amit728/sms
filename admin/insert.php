<?php
session_start();

if( $_SESSION['user_id'] ){
	echo "";
}else{
	echo "Error!...";
}

	include('header.php'); 
	include('../db_config.php');
?>

<?php
	if( isset($_POST['submit']) ){
		$name 	= $_POST['name'];
		$rollno = $_POST['rollno'];
		$city 	= $_POST['city'];
		$parcont= $_POST['parcont'];
		$std 	= $_POST['std'];
		$image 	= $FILES['image']['name'];
		$img_temp = $FILES['image']['tmp_name'];

		move_uploaded_file( '$img_temp', '../uploads/$image');
	
		$sql = " INSERT INTO student( name,  rollno, city, parcont, std, image ) 					VALUES ( '$name', '$rollno', '$city', '$parcont', '$std', '$image' ) ";
		$run = mysqli_query( $conn, $sql );

		if( $run ){ ?>
			<script>
				alert('Recored Inserted Successfully');
				window.open('dashboard.php');
			</script>
		<?php } else{ ?>
			<script>
				alert('Please check it once');
				window.open('insert.php','_self');
			</script>
		<?php }
	}
?>
<div class="container">
	<div class="row">
		<div class="col-sm-12 pb-3">
			<h2 class="text-center">Welcome to Admin Dashboard</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<form class="form" action="" method="post" enctype="multipart/form-data">
				<div class="form-group row">
					<label class="col-sm-4">Name: </label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="name" placeholder="Name" required="">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-4">Roll No: </label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="rollno" placeholder="Roll No." required="">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-4">City: </label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="city" placeholder="City" required="">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-4">Parent Contact: </label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="parcont" placeholder="Parent Contact" required="">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-4">Standard: </label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="std" placeholder="Standard" required="">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-4">Image: </label>
					<div class="col-sm-8">
						<input type="file" class="form-control" name="image">
					</div>
				</div>
				<input type="submit" class="btn btn-success" name="submit" value="Submit">
			</form>
		</div>
	</div>
</div>

<?php include('footer.php'); ?>