<?php
	$title = "PTS - View User";
	require_once 'inc/header.inc.php';
	include_once 'inc/dbh.inc.php';
?>
<div class = "container">

	<h1>View User</h1>

	<?php 
		
		$id = $_GET['userid'];
		
		$query = "SELECT * from user_tb where `userid`= '$id'";
		 
		$command = mysqli_query($conn, $query);
		
		if(!$command)
		{
			echo '<div class="alert alert-danger">Select Query Failed: '. mysqli_error($conn) . '</div>';
		}

		$result = mysqli_fetch_row($command);
		
		if(!$result){    
			echo '<div class="alert alert-danger">Record Not Found! </div>';
		}
		else
		{		
	?>
	<div class="p-3 mb-2 bg-info text-white">
	<table class="table table-hover">
		<tr>
			<th scope = "row">User ID:</th>
			<td class="w-50"><?php echo $result[0];?></td>
		</tr>
		<tr>
			<th scope = "row">First Name:</th>
			<td class="w-50"><?php echo $result[1];?></td>
		</tr>
		<tr>
			<th scope = "row">Last Name:</th>
			<td class="w-50"><?php echo $result[2];?></td>
		</tr>
		<tr>
			<th scope = "row">Username:</th>
			<td class="w-50"><?php echo $result[3];?></td>
		</tr>
		<tr>
			<th scope = "row">User Type:</th>
			<td class="w-50"><?php echo $result[5];?></td>
		</tr>
		<tr>
			<th scope = "row">Date Created:</th>
			<td class="w-50"><?php echo $result[6];?></td>
		</tr>
		<tr>
			<th scope = "row">Last Login:</th>
			<td class="w-50"><?php echo $result[7];?></td>
		</tr>
		
	</table>
	
	<a href="user_manage.php" class="badge badge-dark">Return to List</a> 
	
	</div>
	<?php
		
		}
	?>
	
</div>
<?php
	require_once 'inc/footer.inc.php';
?>