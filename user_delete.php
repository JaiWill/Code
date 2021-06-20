<?php
    include_once 'inc/dbh.inc.php';

    $id = $_GET['userid'];

	$query = "DELETE from user_tb where `userid`= '$id'";

	$command = mysqli_query($conn, $query);

	if(!$command)
		echo '<div class="alert alert-danger">Select Query Failed: '. mysqli_error($conn) . '</div>';

	header('Location: user_manage.php');
?>