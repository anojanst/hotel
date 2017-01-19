<?php
function save_room_cat($category, $price) {
	include 'conf/config.php';
	include 'conf/opendb.php';
	
	mysqli_select_db ( $conn, $dbname );
	$query = "INSERT INTO room_cat (id, category, price)
	VALUES ('', '$category', '$price')";
	
	mysqli_query ($conn, $query ) or die ( mysqli_connect_error () );
	
	
}
function list_room_cat() {
	include 'conf/config.php';
	include 'conf/opendb.php';
	
	echo '<div class="box-body">
			<table  style="width: 100%;" class="table-responsive table-bordered table-striped dt-responsive">
                  <thead>
                       <tr>
                           <th>Edit</th>
                           <th>Room Type</th>
                           <th>Price</th>
                           <th>Delete</th>
                       </tr>
                  </thead>
                  <tbody valign="top">';
	$i = 1;
	$result = mysqli_query ( $conn, "SELECT * FROM room_cat" );
	while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) {
		
		echo '<td><a href="rooms_type.php?job=edit&id=' . $row [id] . '"  ><i class="fa fa-edit fa-2x"></i></a></td>

		<td>' . $row [category] . '</td>
					
		<td>' . $row [price] . '</td>
					
		<td><a href="rooms_type.php?job=delete&id=' . $row [id] . '" onclick="javascript:return confirm(\'Are you sure you want to delete this entry?\')"><i class="fa fa-times fa-2x"></i></a></td>
	
		</tr>';
		
		$i ++;
	}
	
	echo '</tbody>
          </table>
          </div>';
	
	
}
function get_rooms_info_by_id($id) {
	include 'conf/config.php';
	include 'conf/opendb.php';
	echo "SELECT * FROM room_cat WHERE id='$id'";
	$result = mysqli_query ($conn, "SELECT * FROM room_cat WHERE id='$id'" );
	
	while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) 

	{
		return $row;
	}
	
}
function update_room_cat($id, $category, $price) {
	include 'conf/config.php';
	include 'conf/opendb.php';
	
	mysqli_select_db ($conn, $dbname );
	$query = "UPDATE room_cat SET
	category='$category',
	price='$price'
	WHERE id='$id'";
	
	mysqli_query ($conn, $query );
	
	
}

function cancel_room_cat($id) {
	include 'conf/config.php';
	include 'conf/opendb.php';
	
	mysqli_select_db ($conn, $dbname );
	$query = "UPDATE room_cat SET
	cancel_status='1'
	WHERE id='$id'";
	
	mysqli_query ($conn, $query );
	
	
}

