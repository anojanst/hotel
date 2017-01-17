<?php
function save_facility($facility) {
	include 'conf/config.php';
	include 'conf/opendb.php';
	
	mysqli_select_db ( $conn, $dbname );
	$query = "INSERT INTO facility (id, facility)
	VALUES ('', '$facility')";
	
	mysqli_query ($conn, $query ) or die ( mysqli_connect_error () );
	
	
}
function list_facility() {
	include 'conf/config.php';
	include 'conf/opendb.php';
	
	echo '<div class="box-body">
			<table  style="width: 100%;" class="table-responsive table-bordered table-striped dt-responsive">
                  <thead>
                       <tr>
                           <th>Edit</th>
                           <th>Facility Name</th>
                           <th>Facility Id</th>
                           <th>Delete</th>
                       </tr>
                  </thead>
                  <tbody valign="top">';
	$i = 1;
	$result = mysqli_query ( $conn, "SELECT * FROM facility" );
	while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) {
		
		echo '<td><a href="facility.php?job=edit&id=' . $row [id] . '"  ><i class="fa fa-edit fa-2x"></i></a></td>

		<td>' . $row [facility] . '</td>
					
		<td>' . $row [facility_id] . '</td>
					
		<td><a href="facility.php?job=delete&id=' . $row [id] . '" onclick="javascript:return confirm(\'Are you sure you want to delete this entry?\')"><i class="fa fa-times fa-2x"></i></a></td>
	
		</tr>';
		
		$i ++;
	}
	
	echo '</tbody>
          </table>
          </div>';
	
	
}
function get_facility_info($id) {
	include 'conf/config.php';
	include 'conf/opendb.php';
	
	$result = mysqli_query ($conn, "SELECT * FROM facility WHERE id='$id'" );
	
	while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) 

	{
		return $row;
	}
	
	
}


function update_facility($id, $facility) {
	include 'conf/config.php';
	include 'conf/opendb.php';
	
	mysqli_select_db ($conn, $dbname );
	$query = "UPDATE facility SET
	facility='$facility'
	WHERE id='$id'";
	
	mysqli_query ($conn, $query );
	
	
}
function delete_facility($id) {
	include 'conf/config.php';
	include 'conf/opendb.php';
	
	mysqli_select_db ($conn, $dbname );
	$query = "DELETE FROM facility WHERE id='$id'";
	
	mysqli_query ($conn, $query );
	
	
}

function get_facility_id(){
	include 'conf/config.php';
	include 'conf/opendb.php';

	$result=mysqli_query($conn, "SELECT MAX(id) AS id FROM facility");
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
		$max_id=$row['id']+1;
		$max_id = str_pad($max_id, 5, "0", STR_PAD_LEFT);
		$facility_id="F-".$max_id;
		return $facility_id;
	}
}
