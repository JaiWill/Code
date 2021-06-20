<?php
	$title = "PTS - Contact Us";
	require_once 'inc/header.inc.php';
?>
<div class = "container">
	
<hr>
	
	<?php
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$name = $_POST['name'];
			$email = $_POST['email'];
			$subject = $_POST['subject'];
			$message = $_POST['message'];
		}
	?>
<div class="card text-white bg-primary mb-3">
  <div class="card-body">

	<div class="col-sm-10 text-left"> 
			<h1>Contact Us</h1><hr>
		<p>Fill out the form below with as much detail as possible 
		and we’ll respond to you as soon as possible.</p>

		<form method = "POST" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<div class= "form-group">
				<label>Name:</label>
				<input type = "text" name = "name" placeholder = "Your Name" class="form-control" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['name']; ?>">
				<?php if (empty($name) && $_SERVER['REQUEST_METHOD'] == 'POST') echo "<p class='text-danger'>Name is required!</p>"; ?>
			</div>
			<div class= "form-group">
				<label>Email:</label>
				<input type = "text" name = "email" placeholder = "Your Email" class="form-control" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['email']; ?>">
				<small id = "emailHelp" class = "form-text text-white">We'll never share your email with anyone else.</small>
				<?php if (empty($email) && $_SERVER['REQUEST_METHOD'] == 'POST') echo "<p class='text-danger'>Email is required!</p>"; ?>
			</div>
			<div class= "form-group">
				<label>Subject:</label>
				<input type = "text" name = "subject" placeholder = "Subject" class="form-control" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['subject']; ?>">
				<?php if (empty($subject) && $_SERVER['REQUEST_METHOD'] == 'POST') echo "<p class='text-danger'>Subject is required!</p>"; ?>
			</div>
			<div class= "form-group">
				<label>Message:</label>
				<textarea name = "message"  placeholder = "Your Message" class="form-control" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['message']; ?>"></textarea>
				<?php if (empty($message) && $_SERVER['REQUEST_METHOD'] == 'POST') echo "<p class='text-danger'>Message is required!</p>"; ?>
			</div>
			<div class= "form-group">
				<input type = "submit" name = "submit" value = "Send Message" class="btn btn-dark">
				<input type = "reset" name = "reset" value = "Clear Message" class="btn btn-dark">
			</div>
		</form>
	</div>
	
	
	</div>
	</div>
	
	
</div>
<?php
	require_once 'inc/footer.inc.php';
?>