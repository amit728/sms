<?php
session_start();

if( $_SESSION['user_id'] ){
	echo "";
}else{
	echo "Error!...";
}

	include('header.php'); 
	include('../db_config.php');

	$id = $_GET['stdid'];
	$sql = "SELECT * FROM student WHERE id = '$id' ";
	$run = mysqli_query( $conn, $sql );

	$data = mysqli_fetch_assoc( $run );
?>
<div class="container">
	<div class="row">
		<div class="col-sm-12 pb-3">
			<h2 class="text-center">Welcome to Admin Dashboard</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<form class="form" action="update.php" method="post" enctype="multipart/form-data">
				<div class="form-group row">
					<label class="col-sm-4">Name: </label>
					<div class="col-sm-8">
						<input type="hidden" name="id" value="<?php echo $data['id']; ?>">
						<input type="text" class="form-control" name="name" value="<?php echo $data['name']; ?>" placeholder="Name" required="">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-4">Roll No: </label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="rollno" value="<?php echo $data['rollno']; ?>" placeholder="Roll No." required="">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-4">City: </label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="city" value="<?php echo $data['city']; ?>" placeholder="City" required="">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-4">Parent Contact: </label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="parcont" value="<?php echo $data['parcont']; ?>" placeholder="Parent Contact" required="">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-4">Standard: </label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="std" value="<?php echo $data['std']; ?>" placeholder="Standard" required="">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-4">Image: </label>
					<div class="col-sm-8">
						<input type="file" class="form-control" name="image" value="<?php echo $data['image']; ?>">
					</div>
				</div>
				<input type="submit" class="btn btn-success" name="submit" value="Submit">
			</form>
		</div>
	</div>
</div>

<?php include('footer.php'); ?>