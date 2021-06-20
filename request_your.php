<?php
	$title = "PTS - Your Requests";
	include_once 'inc/dbh.inc.php';
	require_once 'inc/header.inc.php';
?>
<div class = "container">
	<h1>Your Requests</h1>

	<?php 
		//$username = $_SESSION['username'];
		$query = "SELECT * from request_tb where requester = '$_SESSION[username]' ";
		$command = mysqli_query($conn, $query);
		if(!$command){
			echo '<div class="alert alert-danger">Select Query Failed: '. mysqli_error($conn) . '</div>';
		}
		else
		{
	?>
	
	<table class="table table-condensed table-sm table-striped table-responsive">
		<tr>
			<th>Request ID</th>
			<th>Requester</th>
			<th>Division/Section</th>
			<th>Station</th>
			<th>Stores</th>
			<th>Date</th>
			<th>Status</th>
			<th>Manage</th>
		</tr>
		
		<?php
		while($row = mysqli_fetch_array($command)){
			echo '<tr>';
			echo '<td>'.$row['request_id'].'</td>';
			echo '<td>'.$row['requester'].'</td>';
			echo '<td>'.$row['division_section'].'</td>';
			echo '<td>'.$row['station'].'</td>';
			echo '<td>'.$row['stores'].'</td>';
			echo '<td>'.$row['request_date'].'</td>';
			echo '<td>'.$row['status'].'</td>';
			
			echo "
			<td>
				<a href='request_yourdetail.php?request_id=".$row['request_id']."'>View</a>  
			</td>";
			
			echo '</tr>';
		}
?>
	</table>
	
<?php
		}
?>
	
</div>

<?php
	require_once 'inc/footer.inc.php';
?>