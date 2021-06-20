<?php
	$title = "PTS - New Request";
	require_once 'inc/header.inc.php';
	include_once 'inc/dbho.inc.php';
	include 'insert.php';
	
	function fill_requester_select_box($conn)
	{ 
		$output = '';
		$query = "SELECT * FROM user_tb ORDER BY username ASC";
		$statement = $conn->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output .= '<option value="'.$row["username "].'">'.$row["username "].'</option>';
		}
		return $output;
	}
	
	function fill_item_select_box($conn)
	{ 
		$output = '';
		$query = "SELECT * FROM item_db ORDER BY itemselect ASC";
		$statement = $conn->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output .= '<option value="'.$row["itemselect"].'">'.$row["itemselect"].'</option>';
		}
		return $output;
	}
	function fill_stores_select_box($conn)
	{ 
		$output = '';
		$query = "SELECT * FROM stores_db ORDER BY stores_select ASC";
		$statement = $conn->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output .= '<option value="'.$row["stores_select"].'">'.$row["stores_select"].'</option>';
		}
		return $output;
	}
	
	
	function fill_station_select_box($conn)
	{ 
		$output = '';
		$query = "SELECT * FROM station_db ORDER BY station ASC";
		$statement = $conn->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output .= '<option value="'.$row["station_select"].'">'.$row["station_select"].'</option>';
		}
		return $output;
	}
?>
<head>	
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
</head>

<?php
	
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$requester = trim($_POST['requester']);
		$divsec =  trim($_POST['divsec']);
		$station = strtolower(trim($_POST['station']));
        $stores = $_POST['stores'];
		
		if(!empty($_POST['requester']) && !empty($_POST['divsec'])&& !empty($_POST['station'])&& !empty($stores))
			{			
				$order_id = uniqid();
				$qry = "INSERT INTO `request_tb`(`requester`, `division_section`, `station`, `stores`) VALUES 
				('$_POST[requester]','$_POST[divsec]','$_POST[station]','$stores')";
				
				$command = mysqli_query($conn, $qry);
				
				if(!$command){
					echo '<div class="alert alert-danger">Select Query Failed: '.mysqli_error($conn) . '</div>';
				}
				else
				{	
					insertItems();
					header("Location: request_new.php");
					echo '<div class="alert alert-danger">New request submitted successfully! </div>';
				}
			}
		}		
	
?>


<div class = "container">
	<h1>New Request</h1><hr>
	
	<div class = "container">
	<div class="p-3 mb-2 bg-info text-white">
	<form method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype = "multipart/form-data">
		<div class="form-row">
			<div class= "form-group col-md-6">
				<label for = "requester">Requester:</label>
				<input id = "requester" class="form-control form-control-sm" type = "text" name = "requester" value="<?PHP if($_SERVER['REQUEST_METHOD'] == 'POST') echo htmlspecialchars($_POST['requester']); ?>" placeholder = "Enter Requesting Officer">
				<!--<select id = "requester" name="requester" class="form-control form-control-sm"><option value="">Select a requester</option><?php echo fill_requester_select_box($conn); ?></select>-->
				<?php if (empty($requester) && $_SERVER['REQUEST_METHOD'] == 'POST') echo "<p class='text-danger'>Requester is required!</p>"; ?>
			</div>
			<div class= "form-group col-md-6">
				<label for = "divsec">Division/Section:</label>
				<input id = "divsec" class="form-control form-control-sm" type = "text" name = "divsec" value="<?PHP if($_SERVER['REQUEST_METHOD'] == 'POST') echo htmlspecialchars($_POST['divsec']); ?>" placeholder = "Enter Division/Section name">
				<?php if (empty($divsec) && $_SERVER['REQUEST_METHOD'] == 'POST') echo "<p class='text-danger'>Division or Section is required!</p>"; ?>
			</div>
		</div>
		<div class="form-row">
			<div class= "form-group col-md-6">
				<label for = "station">Station:</label>
				<input id = "station" class="form-control form-control-sm" type = "text" name = "station" value="<?PHP if($_SERVER['REQUEST_METHOD'] == 'POST') echo htmlspecialchars($_POST['station']); ?>" placeholder = "Enter a Station">
				<!--<select id = "station" name="station" class="form-control form-control-sm"><option value="">Select a Station</option><?php echo fill_station_select_box($conn); ?></select>-->
				<?php if (empty($station) && $_SERVER['REQUEST_METHOD'] == 'POST') echo "<p class='text-danger'>station is required!</p>"; ?>
			</div>
			<div class= "form-group col-md-6">
				<label for = "stores">Stores:</label>
				<select id = "stores" name="stores" class="form-control form-control-sm"><option value="">Select Stores</option><?php echo fill_stores_select_box($conn); ?></select>
				<?php if (empty($stores) && $_SERVER['REQUEST_METHOD'] == 'POST') echo "<p class='text-danger'>stores is required!</p>"; ?>
			</div>
		</div>
		
		<div class="form-group">
			<form name="insert_form" id="insert_form">
				<div class="table-responsive">
					<table class="table table-borderless" id="item_table">
						 <tr>
							<th>Item</th>
							<th>Quantity</th>
							<th>Description</th>
						</tr>
						<tr>
							<td><select name="item_name[]" class="form-control form-control-sm"><option value="">Select Item</option><?php echo fill_item_select_box($conn); ?></select></td>
							<td><input type="text" name="item_quantity[]" class="form-control form-control-sm" /></td>
							<td><input type="text" name="item_description[]" class="form-control form-control-sm" /></td>
							<td><button type="button" name="add" id="add" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span></button></td>
						</tr>
					</table>
				</div>
				<div align="center">
					<a href="request_new.php" class="btn btn-large btn-dark">Submit</a>

					<input type="reset" name="clear" id="reset" class="btn btn-large btn-dark" value="Clear Form" />
				</div>
			</form>
		</div>		
	</form>
	</div>
	</div>
	
</div>
<?php
	require_once 'inc/footer.inc.php';
?>

<script>
$(document).ready(function(){
	var i=1;
	$('#add').click(function(){
		i++;
		$('#item_table').append('<tr id="row'+i+'"><td><select name="item_name[]" class="form-control form-control-sm"><option value="">Select Item</option><?php echo fill_item_select_box($conn); ?></select></td></td><td><input type="text" name="item_quantity[]" class="form-control item_quantity" /></td><td><input type="text" name="item_description[]" class="form-control item_description" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
	});
	
	$(document).on('click', '.btn_remove', function(){
		var button_id = $(this).attr("id"); 
		$('#row'+button_id+'').remove();
	});
	
	/*$('#submit').click(function(){		
		$.ajax({
			url:"name.inc.php",
			method:"POST",
			data:$('#add_name').serialize(),
			success:function(data)
			{
				alert(data);
				$('#add_name')[0].reset();
			}
		});
	});*/
	$('#insert_form').on('submit', function(event){
	event.preventDefault();
	var error = '';
	$('.item_name').each(function(){
	var count = 1;
	if($(this).val() == '')
	{
	error += "<p>Select an Item "+count+" Row</p>";
	return false;
	}
	count = count + 1;
	});

	$('.item_quantity').each(function(){
	var count = 1;
	if($(this).val() == '')
	{
	error += "<p>Enter Item Quantity at "+count+" Row</p>";
	return false;
	}
	count = count + 1;
	});

	$('.item_description').each(function(){
	var count = 1;
	if($(this).val() == '')
	{
	error += "<p>Enter an Item Description "+count+" Row</p>";
	return false;
	}
	count = count + 1;
	});
	
	var form_data = $(this).serialize();
	if(error == '')
	{
	$.ajax({
	url:"insert.php",
	method:"POST",
	data:form_data,
	success:function(data)
	{
	 if(data == 'ok')
	 {
	  $('#item_table').find("tr:gt(0)").remove();
	  $('#error').html('<div class="alert alert-success">Item Details Saved</div>');
	 }
	}
	});
	}
	else
	{
	$('#error').html('<div class="alert alert-danger">'+error+'</div>');
	}
	});
});
</script>