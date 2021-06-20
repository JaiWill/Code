<?php
	$title = "PTS - New User";
	require_once 'inc/header.inc.php';
	include_once 'inc/dbh.inc.php';
?>

<?php
	
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$fname = trim($_POST['fname']);
		$lname =  trim($_POST['lname']);
		$username = strtolower(trim($_POST['username']));
        $password = $_POST['password'];
		$usertype = $_POST['usertype'];
		
		$encryp_password = md5($password.$username);
		
		//check the database for the presence of a username and password value match
        $query = "SELECT * from user_tb where `username`= '$username'";

        //regular run and check of query run success.
        $command = mysqli_query($conn, $query);
        if(!$command){
            echo '<div class="alert alert-danger">Select Query Failed: '.mysqli_error($conn) . '</div>';
        }
		
        //get result and store in variable. 
        $result = mysqli_fetch_row($command);
        
        //if result was found, print corresponding error message 
        if($result){
            echo '<div class="alert alert-danger">Username already taken! Please try again. </div>';
            // die();
        }
		else
		{
			if(!empty($_POST['fname']) && !empty($_POST['lname'])&& !empty($_POST['username'])&& !empty($encryp_password) && !empty($_POST['usertype']))
			{			
				$qry = "INSERT INTO `user_tb`(`fname`, `lname`, `username`, `password`,`usertype`) VALUES 
				('$_POST[fname]','$_POST[lname]','$_POST[username]','$encryp_password','$_POST[usertype]')";
				
				$command = mysqli_query($conn, $qry);
				
				if(!$command){
					echo '<div class="alert alert-danger">Select Query Failed: '.mysqli_error($conn) . '</div>';
				}
				else
				{	
					header("Location: user_new.php");
					echo '<div class="alert alert-danger">New User inserted successfully! </div>';
					
					
					
					//Check if admin is already login; in which case the admin is adding a new user
					/*if (isset($_SESSION['username']) && $_SESSION['username'] == "admin")
					{
						header("Location: listing.php");
					}
					else
					{
						$_SESSION['username'] = $username;
						header("Location: user_new.php");
					}*/
				}
			}
		}		
	}
?>


<div class = "container">
	<h1>New User</h1><hr>
	
	<div class = "container">
	<div class="p-3 mb-2 bg-info text-white">
	<form method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype = "multipart/form-data">
		<div class="form-row">
			<div class= "form-group col-md-6">
				<label for = "fname">First Name:</label>
				<input id = "fname" class="form-control form-control-sm" type = "text" name = "fname" value="<?PHP if($_SERVER['REQUEST_METHOD'] == 'POST') echo htmlspecialchars($_POST['fname']); ?>" placeholder = "Enter your first name">
				<?php if (empty($fname) && $_SERVER['REQUEST_METHOD'] == 'POST') echo "<p class='text-danger'>First name is required!</p>"; ?>
			</div>
			<div class= "form-group col-md-6">
				<label for = "lname">Last Name:</label>
				<input id = "lname" class="form-control form-control-sm" type = "text" name = "lname" value="<?PHP if($_SERVER['REQUEST_METHOD'] == 'POST') echo htmlspecialchars($_POST['lname']); ?>" placeholder = "Enter your last name">
				<?php if (empty($lname) && $_SERVER['REQUEST_METHOD'] == 'POST') echo "<p class='text-danger'>Last name is required!</p>"; ?>
			</div>
		</div>
		<div class="form-row">
			<div class= "form-group col-md-6">
				<label for = "username">Username:</label>
				<input id = "username" class="form-control form-control-sm" type = "text" name = "username" value="<?PHP if($_SERVER['REQUEST_METHOD'] == 'POST') echo htmlspecialchars($_POST['username']); ?>" placeholder = "Create your username">
				<?php if (empty($username) && $_SERVER['REQUEST_METHOD'] == 'POST') echo "<p class='text-danger'>Username is required!</p>"; ?>
			</div>
			<div class= "form-group col-md-6">
				<label for = "password">Password:</label>
				<input id = "password" class="form-control form-control-sm" type = "password" name = "password" value="<?PHP if($_SERVER['REQUEST_METHOD'] == 'POST') echo htmlspecialchars($_POST['password']); ?>" placeholder = "Create your password">
				<?php if (empty($password) && $_SERVER['REQUEST_METHOD'] == 'POST') echo "<p class='text-danger'>Password is required!</p>"; ?>
			</div>
		</div>
		<div class="form-row">
			<div class= "form-group col-md-6">
				<label for = "UserType">User Type:</label>
				<select id = "usertype" class="form-control form-control-sm" type = "text" name = "usertype" value="<?PHP if($_SERVER['REQUEST_METHOD'] == 'POST') echo htmlspecialchars($_POST['usertype']); ?>"">
					<option value="">Select a User Type</option><option value="Admin">Admin</option><option value="SuperUser">Super-User</option><option value="ReadOnly">Read-Only</option>
				</select>
				<?php if (empty($usertype) && $_SERVER['REQUEST_METHOD'] == 'POST') echo "<p class='text-danger'>Usertype is required!</p>"; ?>
			</div>
		</div>

		
		<input type = "submit" name = "submit" value = "Insert New User" class="btn btn-large btn-dark"/><br/>
		
	</form>
	</div>
	</div>
	
</div>
<?php
	require_once 'inc/footer.inc.php';
?>