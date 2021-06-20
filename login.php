<?php
	$title = "Login";
	require_once 'inc/header.inc.php';
	include_once 'inc/dbh.inc.php';
?>
<?php
	//If data was submitted via a form POST request, then...
    if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		//session_start();
		$username = strtolower(trim($_POST['username']));
        $password = $_POST['password'];
		
		//generate hashed version of entered password in accordance with how the original registration hash was created
        $encryp_password = md5($password.$username);
		
		//check the database for the presence of a username and password value match
        $query = "SELECT * from user_tb where `username`= '$username' and `password` = '$encryp_password'";

        //regular run and check of query run success.
        $command = mysqli_query($conn, $query);
        if(!$command){
            echo 'Select Query Failed: '.mysqli_error($conn);
            // die();
        }
		
        //get result and store in variable. 
        $result = mysqli_fetch_row($command);
        
        //if no result was found, print corresponding error message 
        if(!$result){
            echo '<div class="alert alert-danger">Username or Password is incorrect! Please try again. </div>';
            // die();
        }
		else
		{
			//This session value will persist on every page and only stop when session_destroy() is called...which is found in the logout.php page.
			$_SESSION['username'] = $username;
			$_SESSION['usertype']= $result[5];
			//echo $_SESSION['usertype'];
			header("Location: index.php");
		}
	}

?>
<div class = "container">
	<h1>Login</h1>

<div class="card text-white bg-info mb-3">
  <div class="card-body">
	
	<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
        <div class="form-group">			
            <label for="username">Username: </label>
			<input type="text" name="username" class="form-control" id="username" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['username']; ?>">
			<?php if (empty($username) && $_SERVER['REQUEST_METHOD'] == 'POST') echo "<p class='text-danger'>Username is required!</p>"; ?>
		</div>
		<div class="form-group">			
			<label for="password">Password:</label>	
			<input type="password" name="password" class="form-control" id="password">			
            <?php if (empty($password) && $_SERVER['REQUEST_METHOD'] == 'POST') echo "<p class='text-danger'>Password is required!</p>"; ?>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<input type="submit" value="Login" class="btn btn-dark">
				<input type="reset" value="Clear" class="btn btn-dark">
			</div>
        </div>
        
        <!-- <a href="#"> Forgot Password </a>-->
            
    </form>
	
	</div>
	</div>
	
</div>
<?php
	require_once 'inc/footer.inc.php';
?>