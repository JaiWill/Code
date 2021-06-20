<?php
	$title = "PTS - Information";
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

	<div class="col-sm-12 text-left"> 
			<h1>Information</h1><hr>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus mattis condimentum congue. Duis bibendum vulputate elit, et fkln uctus velit vehicula porttitor. Cras vitae erat quis neque vestibulum ullamcorper. Praesent rutrum, sapien a tincidunt porta, erat ipsum finibus eros, in ultricies dui enim sit amet mauris.</p>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus mattis condimentum congue. Duis bibendum vulputate elit, et fkln uctus velit vehicula porttitor. Cras vitae erat quis neque vestibulum ullamcorper. Praesent rutrum, sapien a tincidunt porta, erat ipsum finibus eros, in ultricies dui enim sit amet mauris.</p>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus mattis condimentum congue. Duis bibendum vulputate elit, et fkln uctus velit vehicula porttitor. Cras vitae erat quis neque vestibulum ullamcorper. Praesent rutrum, sapien a tincidunt porta, erat ipsum finibus eros, in ultricies dui enim sit amet mauris.</p>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus mattis condimentum congue. Duis bibendum vulputate elit, et fkln uctus velit vehicula porttitor. Cras vitae erat quis neque vestibulum ullamcorper. Praesent rutrum, sapien a tincidunt porta, erat ipsum finibus eros, in ultricies dui enim sit amet mauris.</p>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus mattis condimentum congue. Duis bibendum vulputate elit, et fkln uctus velit vehicula porttitor. Cras vitae erat quis neque vestibulum ullamcorper. Praesent rutrum, sapien a tincidunt porta, erat ipsum finibus eros, in ultricies dui enim sit amet mauris.</p>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus mattis condimentum congue. Duis bibendum vulputate elit, et fkln uctus velit vehicula porttitor. Cras vitae erat quis neque vestibulum ullamcorper. Praesent rutrum, sapien a tincidunt porta, erat ipsum finibus eros, in ultricies dui enim sit amet mauris.</p>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus mattis condimentum congue. Duis bibendum vulputate elit, et fkln uctus velit vehicula porttitor. Cras vitae erat quis neque vestibulum ullamcorper. Praesent rutrum, sapien a tincidunt porta, erat ipsum finibus eros, in ultricies dui enim sit amet mauris.</p>
			
	</div>
</div>
</div>
</div>
<?php
	require_once 'inc/footer.inc.php';
?>