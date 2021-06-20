<?php
	$title = "PTS - Manage Users";
	include_once 'inc/dbh.inc.php';
	require_once 'inc/header.inc.php';
?>
<head> <link rel="stylesheet" href="css/dataTables.bootstrap.min.css"> </head>
<div class = "container">
	<div class="p-3 mb-2 bg-light text-black">
	<h1>Manage Users</h1>

	<?php 
		$query = "SELECT * from user_tb";
		$command = mysqli_query($conn, $query);
		if(!$command){
			echo '<div class="alert alert-danger">Select Query Failed: '. mysqli_error($conn) . '</div>';
		}
		else
		{
	?>
	
	<table class="table table-condensed table-striped table-responsive">
		<tr>
			<th>UserID</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Username</th>
			<th>User Type</th>
			<th>Manage</th>
		</tr>
		
		<?php
		while($row = mysqli_fetch_array($command)){
			echo '<tr>';
			echo '<td>'.$row['userid'].'</td>';
			echo '<td>'.$row['fname'].'</td>';
			echo '<td>'.$row['lname'].'</td>';
			echo '<td>'.$row['username'].'</td>';
			echo '<td>'.$row['usertype'].'</td>';
			
			
			echo "
			<td>
				<a href='user_view.php?userid=".$row['userid']."'>View</a> | 
				<a href='user_update.php?userid=".$row['userid']."'>Update</a> | 
				<a href='user_delete.php?userid=".$row['userid']."'>Delete</a>
			</td>";
			
			echo '</tr>';
		}
?>
	</table>
	
	<br/><a class="badge badge-dark" href="user_new.php">Add New User</a>
	</div>
	</div>
<?php
		}
?>
	
</div>

<?php
	require_once 'inc/footer.inc.php';
?>