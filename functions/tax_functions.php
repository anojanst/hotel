<?php
function save_tax($tax, $percentage) {
	include 'conf/config.php';
	include 'conf/opendb.php';
	
	mysqli_select_db ( $conn, $dbname );
	$query = "INSERT INTO tax (id, tax_type, percentage)
	VALUES ('', '$tax', '$percentage')";
	
	mysqli_query ($conn, $query ) or die ( mysqli_connect_error () );
	
	
}

function list_tax() {
	include 'conf/config.php';
	include 'conf/opendb.php';
	
	echo '<div class="box-body">
			<table  style="width: 100%;" class="table-responsive table-bordered table-striped dt-responsive">
                  <thead>
                       <tr>
                           <th>Tax</th>
                           <th>Percentage(%)</th>
                           <th>Delete</th>
                       </tr>
                  </thead>
                  <tbody valign="top">';
	$i = 1;
	$result = mysqli_query ( $conn, "SELECT * FROM tax" );
	while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) {
		
		echo '
		<td>' . $row [tax_type] . '</td>
		<td>' . $row [percentage] . '</td>
		<td><a href="tax.php?job=delete&id=' . $row [id] . '" onclick="javascript:return confirm(\'Are you sure you want to delete this entry?\')"><i class="fa fa-times fa-2x"></i></a></td>
	
		</tr>';
		
		$i ++;
	}
	
	echo '</tbody>
          </table>
          </div>';
	
	
}

function delete_tax($id) {
	include 'conf/config.php';
	include 'conf/opendb.php';
	
	mysqli_select_db ($conn, $dbname );
	$query = "DELETE FROM tax
	WHERE id='$id'";
	
	mysqli_query ($conn, $query );
	
	
}



