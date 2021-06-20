<?php
	$title = "PTS - View Request Detail ";
	require_once 'inc/header.inc.php';
	include_once 'inc/dbh.inc.php';
?>
<div class = "container">

	<?php 
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
				<input id = "requester" class="form-control form-control-sm" type = "text" name = "requester" value="<?PHP echo $rephead[2]?>"readonly>
			</div>
		</div>
		<div class="form-row">
			<div class= "form-group col-md-6">
				<label for = "divsec">Division/Section:</label>
				<input id = "divsec" class="form-control form-control-sm" type = "text" name = "divsec" value="<?PHP echo $rephead[3]?>"readonly>
			</div>
			<div class= "form-group col-md-6">
				<label for = "station">Station:</label>
				<input id = "station" class="form-control form-control-sm" type = "text" name = "station" value="<?PHP echo $rephead[4]?>"readonly>
			</div>
		</div>
		<div class="form-row">
			<div class= "form-group col-md-6">
				<label for = "stores">Stores:</label>
				<input id = "stores" class="form-control form-control-sm" type = "text" name = "stores" value="<?PHP echo $rephead[5]?>"readonly>
				</select>
			</div>
			<div class= "form-group col-md-6">
				<label for = "status">Status:</label>
				<input id = "status" class="form-control form-control-sm" type = "text" name = "status" value="<?PHP echo $rephead[6]?>"readonly>
			</div>
		</div>
	</form>
<hr>
<h2>Requested Items</h2>	
<hr>

	<table class="table table-condensed table-striped table-responsive ">
		<tr>
			<th>Item ID</th>
			<th>Item</th>
			<th>Quantity</th>
			<th>Description</th>
		</tr>
		
		<?php
		while($row = mysqli_fetch_array($command)){
			echo '<tr>';
			echo '<td>'.$row['item_id'].'</td>';
			echo '<td>'.$row['item_name'].'</td>';
			echo '<td>'.$row['item_quantity'].'</td>';
			echo '<td>'.$row['item_description'].'</td>';
			
			
			
			echo '</tr>';
		}
?>
	</table>
	
	<a href="request_your.php?" class="badge badge-dark">Return to List</a>
	</div>
	
	
</div>
<?php
	require_once 'inc/footer.inc.php';
?>