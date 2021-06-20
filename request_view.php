<?php
	$title = "PTS - View Request Detail ";
	require_once 'inc/header.inc.php';
	include_once 'inc/dbh.inc.php';
?>
<div class = "container">

	<?php 
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$requester = trim($_POST['requester']);
			$divsec = $_POST['divsec'];
			$station = $_POST['station'];
			$stores = $_POST['stores'];
			$status = $_POST['status'];
			$id = $_POST['request_id'];
			
			$qry = "UPDATE `request_tb` SET`requester`='$requester', `division_section`='$divsec', `station`='$station', `stores`='$stores', status='$status' WHERE `request_id` = '$id'";
			
			
			$command = mysqli_query($conn, $qry);

			if (!$command){
				echo '<div class="alert alert-danger">Failed to submit to database: "' . mysqli_error($conn) . '</div>';
			}
			echo "$qry";
			header("Location: request_view.php?request_id=$id");			
			}
			
			else
			{
			$id = $_GET['request_id'];
			$query = "SELECT * from request_tb where `request_id`= $id";
			$command = mysqli_query($conn, $query);
			
			if(!$command){
				echo '<div class="alert alert-danger">Select Query Failed: '. mysqli_error($conn) . '</div>';
			}

			$rephead = mysqli_fetch_row($command);
			//else
			//{
				$query = "SELECT * from item_tb where `request_id`= '$id'";
				$command = mysqli_query($conn, $query);
				if(!$command){
					echo '<div class="alert alert-danger">Select Query Failed: '. mysqli_error($conn) . '</div>';
				}
			// function fill_status_select_box($conn)
			// { 
				// $output = '';
				// $query = "SELECT * FROM state_tb";
				// $statement = $conn->prepare($query);
				// $statement->execute();
				// $result = $statement->fetchAll();
				// foreach($result as $row)
				// {
					// $output .= '<option value="'.$row["	state_status"].'">'.$row["	state_status"].'</option>';
				// }
				// return $output;
			// }
				
	?>
	
	<div class=" mb-2 bg-light text-black">
		<h1>View Request Detail</h1>
	<form method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype = "multipart/form-data">
		<div class="form-row">
			<div class= "form-group col-md-6">
				<label for = "request_id">Request ID:</label>
				<input id = "request_id" class="form-control form-control-sm" type = "text" name = "request_id" value="<?PHP echo $id; ?>" readonly>
			</div>
			<div class= "form-group col-md-6">
				<label for = "requester">Requester:</label>
				<input id = "requester" class="form-control form-control-sm" type = "text" name = "requester" value="<?PHP echo $rephead[2]?>">
				<?php if (empty($requester) && $_SERVER['REQUEST_METHOD'] == 'POST') echo "<p class='text-danger'>Requester is required!</p>"; ?>
			</div>
		</div>
		<div class="form-row">
			<div class= "form-group col-md-6">
				<label for = "divsec">Division/Section:</label>
				<input id = "divsec" class="form-control form-control-sm" type = "text" name = "divsec" value="<?PHP echo $rephead[3]?>">
				<?php if (empty($divsec) && $_SERVER['REQUEST_METHOD'] == 'POST') echo "<p class='text-danger'>Division/Section is required!</p>"; ?>
			</div>
			<div class= "form-group col-md-6">
				<label for = "station">Station:</label>
				<input id = "station" class="form-control form-control-sm" type = "text" name = "station" value="<?PHP echo $rephead[4]?>">
				<?php if (empty($station) && $_SERVER['REQUEST_METHOD'] == 'POST') echo "<p class='text-danger'>Station is required!</p>"; ?>
			</div>
		</div>
		<div class="form-row">
			<div class= "form-group col-md-6">
				<label for = "stores">Stores:</label>
				<select id = "Stores" class="form-control form-control-sm" type = "text" name = "stores">
					<option value="<?PHP echo $rephead[5]; ?>"><strong><?PHP echo $rephead[5]; ?></strong></option><option value="HQ">HQ</option><option value="Armoury">Armoury</option><option value="ITCD">ITCD</option><option value="Establishment">Establishment</option>
				</select>
			</div>
			<div class= "form-group col-md-6">
				<label for = "status">Status:</label>
				<!--<input id = "status" class="form-control form-control-sm" type = "text" name = "status" value="<?PHP echo $rephead[6]?>">-->
				<select id = "status" class="form-control form-control-sm" type = "text" name = "status">
					<option value="<?PHP echo $rephead[6]; ?>"><strong><?PHP echo $rephead[6]; ?></strong></option><option value="Logged">Logged</option><option value="Procurement Process">Procurement Process</option><option value="Sent to Finance">Sent to Finance</option><option value="Sent to Commitment">Sent to Commitment</option><option value="Sent for Purchase Order">Sent for Purchase Order</option><option value="Purchase Order Complete">Purchase Order Complete</option>
					
				</select>
			</div>
		</div>

	<input type = "submit" name = "submit" value = "Update Request Header" class="btn btn-large btn-dark"/>
	</form><hr>
	
	<table class="table table-condensed table-striped table-responsive ">
		<tr>
			<th>Item ID</th>
			<th>Item</th>
			<th>Quantity</th>
			<th>Description</th>
			<th>Manage</th>
		</tr>
		
		<?php
		while($row = mysqli_fetch_array($command)){
			echo '<tr>';
			echo '<td>'.$row['item_id'].'</td>';
			echo '<td>'.$row['item_name'].'</td>';
			echo '<td>'.$row['item_quantity'].'</td>';
			echo '<td>'.$row['item_description'].'</td>';
			
			$request_id = "request_id";
			echo "
			<td>
				<a href='user_update.php?item_id=".$row['item_id']."'>Edit</a> | 
				<a href='item_delete.php?item_id=".$row['item_id']."'>Delete</a>
			</td>";
			
			echo '</tr>';
		}
?>
	</table>
	
	<a href="request_manage.php" class="badge badge-dark">Return to List</a> 
	
	</div>
	<?php
		
		}
	?>
	
</div>
<?php
	require_once 'inc/footer.inc.php';
?>