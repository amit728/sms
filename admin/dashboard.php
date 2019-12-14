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
			<a href="insert.php" class="btn btn-sm btn-success">Add Student</a>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<table class="table table-bordered">
				<tr>
					<th>#</th>
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
					include('../db_config.php');

					$sql = " SELECT * FROM student ";
					$run = mysqli_query( $conn, $sql);

					if( mysqli_num_rows( $run ) > 0 ){
					$count = 1; 
					while( $data = mysqli_fetch_array( $run )){ ?>
				<tr>
					<td><?php echo $count++; ?></td>
					<td><?php echo $data['id']; ?></td>
					<td><?php echo $data['name']; ?></td>
					<td><?php echo $data['rollno']; ?></td>
					<td><?php echo $data['city']; ?></td>
					<td><?php echo $data['parcont']; ?></td>
					<td><?php echo $data['std']; ?></td>
					<td><img src="../uploads/<?php echo $data['image']; ?>"></td>
					<td>
						<a href="view.php?stdid=<?php echo $data['id']; ?>" class="btn btn-sm btn-warning">View</a>
						<a href="edit.php?stdid=<?php echo $data['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
						<a href="delete.php?stdid=<?php echo $data['id']; ?>" class="btn btn-sm btn-danger" onclick="alertFunction();">Delete</a>
					</td>
				<?php }
					}else{ ?>
						<tr>
							<td><?php echo "No records available"; ?></td>
						</tr>
					<?php }
				?>
			</table>
		</div>
	</div>
</div>
<script type="text/javascript">
	function alertFunction(){
		alert('Are you sure');
	}
</script>
<?php include('footer.php'); ?>