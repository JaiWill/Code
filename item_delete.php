<?php
    include_once 'inc/dbh.inc.php';

    $id = $_GET['item_id'];
	//$rid = $_GET['request_id'];
	$query = "DELETE from item_tb where `item_id`= '$id'";

	$command = mysqli_query($conn, $query);

	if(!$command)
		echo '<div class="alert alert-danger">Select Query Failed: '. mysqli_error($conn) . '</div>';

	//header('Location: request_view.php?request_id=$rid');
?>