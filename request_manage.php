<?php
	$title = "PTS - Manage Requests";
	include_once 'inc/dbh.inc.php';
	require_once 'inc/header.inc.php';
?>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
</head>
<div class = "container">
	<h1>Manage Requests</h1>

	<?php 
		$query = "SELECT * from request_tb";
		$command = mysqli_query($conn, $query);
		if(!$command){
			echo '<div class="alert alert-danger">Select Query Failed: '. mysqli_error($conn) . '</div>';
		}
		else
		{
	?>
	
	<table class="table table-condensed table-sm table-striped table-responsive">
		<tr>
			<th>Request ID</th>
			<th>Requester</th>
			<th>Division/Section</th>
			<th>Station</th>
			<th>Stores</th>
			<th>Date</th>
			<th>Status</th>
			<th>Manage</th>
		</tr>
		
		<?php
		while($row = mysqli_fetch_array($command)){
			echo '<tr>';
			echo '<td>'.$row['request_id'].'</td>';
			echo '<td>'.$row['requester'].'</td>';
			echo '<td>'.$row['division_section'].'</td>';
			echo '<td>'.$row['station'].'</td>';
			echo '<td>'.$row['stores'].'</td>';
			echo '<td>'.$row['request_date'].'</td>';
			echo '<td>'.$row['status'].'</td>';
			
			echo "
			<td>
				<a href='request_view.php?request_id=".$row['request_id']."'>View</a> | 
				<a href='request_delete.php?request_id=".$row['request_id']."'>Delete</a>
			</td>";
			
			echo '</tr>';
		}
?>
	</table>
	
	<br/><a class="badge badge-dark" href="request_new.php">New Request</a>
<?php
		}
?>
	
</div>
<script
            src="http://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".table").DataTable({
                "ordering": true,
                "searching": true,
                "paging": true,
                "columnDefs": [
                    {
                        "targets": 0,
                        "searchable": false,
                        "visible": true
                    }
                ],
                "order": [[2, "desc"]]
            });
        });
    </script>


<?php
	require_once 'inc/footer.inc.php';
?>