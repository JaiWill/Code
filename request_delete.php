<?php
    include_once 'inc/dbh.inc.php';

    $id = $_GET['request_id'];

	$query = "DELETE from request_tb where `request_id`= '$id'";

	$command = mysqli_query($conn, $query);

	if(!$command)
		echo '<div class="alert alert-danger">Select Query Failed: '. mysqli_error($conn) . '</div>';

	header('Location: request_manage.php');
?>