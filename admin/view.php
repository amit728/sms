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

<div class="container">
	<div class="row">
		<div class="col-sm-12 pb-3">
			<h2 class="text-center">Welcome to Admin Dashboard</h2>
		</div>
	</div>
	<div class="row pb-3">
		<div class="col-sm-12">
			<a href="dashboard.php" class="">back</a>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<table class="table table-bordered">
				<tr class="bg-default">
					<th>ID</th>
					<th>Name</th>
					<th>Roll No.</th>
					<th>City</th>
					<th>Parent Contact</th>
					<th>Standard</th>
					<th>Image</th>
					<th>Action</th>
				</tr>
				<?php 
					
					$id = $_GET['stdid'];
					
					$sql = " SELECT * FROM student WHERE id = '$id' ";
					$run = mysqli_query( $conn, $sql);
					$data = mysqli_fetch_assoc( $run ) ?>
				<tr>
					<td><?php echo $data['id']; ?></td>
					<td><?php echo $data['name']; ?></td>
					<td><?php echo $data['rollno']; ?></td>
					<td><?php echo $data['city']; ?></td>
					<td><?php echo $data['parcont']; ?></td>
					<td><?php echo $data['std']; ?></td>
					<td><img src="../uploads/<?php echo $data['image']; ?>"></td>
				</tr>
			</table>
		</div>
	</div>
</div>

<?php include('footer.php'); ?>