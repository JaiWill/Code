<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title;?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
	<link rel="stylesheet" href = "css/styles.css">
	<link rel="stylesheet" type="text/css" href="css/slide.css"/>
</head>
<body>
	<?php session_start(); ?>
	
	<nav class="navbar navbar-expand-lg navbar-dark bg-danger ">  
		<a class="navbar-brand" href="index.php">Procurement Tracking System</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="index.php">Home </a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="information.php">Information</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="contact.php">Contact</a>
				</li>
				
				<?php
					if(isset($_SESSION['username']) && $_SESSION['usertype'] == "ReadOnly" && !empty($_SESSION['username']))
					//if($_SESSION['usertype'] = "ReadOnly")
					{
						echo 
						'
							<li class="nav-item">
								<a class="nav-link" href="request_your.php">Your Request</a>
							</li>
							</ul>
							<ul class="navbar-nav ml-auto">
								<li class="nav-item">
									<a class="nav-link" href="#">Welcome ' . $_SESSION['username'] . '</a>
								</li>
								<li>
									<a class="nav-link" href="logout.php">Logout</a>
								</li>
							</ul>
						';
					}
					if(isset($_SESSION['username']) && $_SESSION['usertype'] == "SuperUser" && !empty($_SESSION['username']))
					// if($_SESSION['usertype'] = "SuperUser")
					{
						echo 
						'
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Requests
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								  <a class="dropdown-item" href="request_new.php">New Request</a>
								  <a class="dropdown-item" href="request_manage.php">Manage Requests</a>
								</div>
							</li>
							</ul>
							<ul class="navbar-nav ml-auto">
								<li class="nav-item">
									<a class="nav-link" href="#">Welcome ' . $_SESSION['username'] . '</a>
								</li>
								<li>
									<a class="nav-link" href="logout.php">Logout</a>
								</li>
							</ul>							
						';
					}
					if(isset($_SESSION['username']) && $_SESSION['usertype'] == "Admin" && !empty($_SESSION['username']))
					// if($_SESSION['usertype'] = "Admin")
					{
						echo 
						'
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Requests
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								  <a class="dropdown-item" href="request_new.php">New Request</a>
								  <a class="dropdown-item" href="request_manage.php">Manage Requests</a>
								</div>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									User Management
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								  <a class="dropdown-item" href="user_new.php">New User</a>
								  <a class="dropdown-item" href="user_manage.php">Manage Users</a>
								</div>
							</li>
							</ul>
							<ul class="navbar-nav ml-auto">
								<li class="nav-item">
									<a class="nav-link" href="#">Welcome ' . $_SESSION['username'] . '</a>
								</li>
								<li>
									<a class="nav-link" href="logout.php">Logout</a>
								</li>
							</ul>							
						';
					}
					if (empty($_SESSION['username']) || !isset($_SESSION['username']))
					{
						echo 
						'
						</ul>
						<ul class="navbar-nav ml-auto">
							<li class="nav-item">
								<a class="nav-link" href="login.php">Login</a>
							</li>
						</ul>
						';
					}
				?>	
		</div>
	</nav>