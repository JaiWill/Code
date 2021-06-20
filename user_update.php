<?php
	$title = "PTS - Update User";
	require_once 'inc/header.inc.php';
	include_once 'inc/dbho.inc.php';
?>
<div class = "container">
	<h1>Update User Info</h1><hr>

	<?php 
	
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$fname = trim($_POST['fname']);
			$lname = trim($_POST['lname']);
			$username = strtolower(trim($_POST['username']));
			$password = $_POST['password'];
			$usertype = $_POST['usertype'];
			$id = $_POST['userid'];
			
			$encryp_password = md5($password.$username);
			
			$qry = "UPDATE `user_tb` SET `username`= '$username', `fname`= '$fname',`lname`='$lname',`password`='$encryp_password',`usertype`='$usertype' WHERE `userid` = '$id'";
			$command = mysqli_query($conn, $qry);

			if (!$command){
				echo '<div class="alert alert-danger">Failed to submit to database: "' . mysqli_error($conn) . '</div>';
			}
			//echo "$qry";
			header("Location: user_manage.php");			
		}
		else
		{
	
			$id = $_GET['userid'];
			var_dump ($id);
			
			$query = "SELECT * from user_tb where `userid`= '$id'";
			 
			$command = mysqli_query($conn, $query);
			
			if(!$command){
				echo '<div class="alert alert-danger">Select Query Failed: '. mysqli_error($conn) . '</div>';
			}

			$result = mysqli_fetch_row($command);
			
			if(!$result){    
				echo '<div class="alert alert-danger">Record Not Found! </div>';
			}
			else
			{
			
	?>
		
	<div class = "container">
	<div class="p-3 mb-2 bg-info text-white">
	<form method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype = "multipart/form-data">
		<div class="form-row">
			<div class= "form-group col-md-6">
				<label for = "userid">User ID:</label>
				<input id = "userid" class="form-control form-control-sm" type = "text" name = "userid" value="<?PHP echo $result[0]; ?>" readonly>
			</div>
			<div class= "form-group col-md-6">
				<label for = "username">Username:</label>
				<input id = "username" class="form-control form-control-sm" type = "text" name = "username" value="<?PHP echo $result[3]; ?>">
				<?php if (empty($username) && $_SERVER['REQUEST_METHOD'] == 'POST') echo "<p class='text-danger'>User name is required!</p>"; ?>
			</div>
		</div>
		<div class="form-row">
			<div class= "form-group col-md-6">
				<label for = "fname">First Name:</label>
				<input id = "fname" class="form-control form-control-sm" type = "text" name = "fname" value="<?PHP echo $result[1]; ?>">
				<?php if (empty($fname) && $_SERVER['REQUEST_METHOD'] == 'POST') echo "<p class='text-danger'>First name is required!</p>"; ?>
			</div>
			<div class= "form-group col-md-6">
				<label for = "LName">Last Name:</label>
				<input id = "LName" class="form-control form-control-sm" type = "text" name = "lname" value="<?PHP echo $result[2]; ?>">
				<?php if (empty($lname) && $_SERVER['REQUEST_METHOD'] == 'POST') echo "<p class='text-danger'>Last name is required!</p>"; ?>
			</div>
		</div>
		<div class="form-row">
			<div class= "form-group col-md-6">
				<label for = "usertype">Usertype:</label>
				<select id = "usertype" class="form-control form-control-sm" type = "text" name = "usertype">
					<option value="<?PHP echo $result[5]; ?>"><strong><?PHP echo $result[5]; ?></strong></option><option value="Admin">Admin</option><option value="SuperUser">Super-User</option><option value="ReadOnly">Read-Only</option>
				</select>
			</div>
			<div class= "form-group col-md-6">
				<label for = "Password">Password:</label>
				<input id = "password" class="form-control form-control-sm" type = "password" name = "password" placeholder="Enter new password">
				<?php if (empty($password) && $_SERVER['REQUEST_METHOD'] == 'POST') echo "<p class='text-danger'>Password is required!</p>"; ?>
			</div>
		</div>

		
		<input type = "submit" name = "submit" value = "Update User Info" class="btn btn-large btn-dark"/>
		<a href="user_manage.php" class="btn btn-large btn-dark">Cancel</a>
	</form>
	</div>
	</div>

	<?php
			}
		}
	?>
	
</div>
<?php
	require_once 'inc/footer.inc.php';
?>