<?php
function save_store($item, $price, $resale) {
	include 'conf/config.php';
	include 'conf/opendb.php';
	
	mysqli_select_db ( $conn, $dbname );
	$query = "INSERT INTO store (id, item, price, resale)
	VALUES ('', '$item', '$price', '$resale')";
	
	mysqli_query ($conn, $query ) or die ( mysqli_connect_error () );
	
	
}

function save_taken_from_store($item, $qty, $date) {
	include 'conf/config.php';
	include 'conf/opendb.php';
	
	mysqli_select_db ( $conn, $dbname );
	$query = "INSERT INTO taken_from_store (id, item, qty, date)
	VALUES ('', '$item', '$qty', '$date')";
	
	mysqli_query ($conn, $query ) or die ( mysqli_connect_error () );
	
	
}

function list_store() {
	include 'conf/config.php';
	include 'conf/opendb.php';
	
	echo '<div class="box-body">
			<table  style="width: 100%;" class="table-responsive table-bordered table-striped dt-responsive">
                  <thead>
                       <tr>
                           <th>Item</th>
						   <th>Price</th>
						   <th>Resale</th>
                           <th>Delete</th>
                       </tr>
                  </thead>
                  <tbody valign="top">';
	$i = 1;
	$result = mysqli_query ( $conn, "SELECT * FROM store" );
	while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) {
		
		echo '
		<td>' . $row [item] . '</td>
		
		<td>' . $row [price] . '</td>
		
		<td>' . $row [resale] . '</td>
		
		<td><a href="store.php?job=delete&id=' . $row [id] . '" onclick="javascript:return confirm(\'Are you sure you want to delete this entry?\')"><i class="fa fa-times fa-2x"></i></a></td>
	
		</tr>';
		
		$i ++;
	}
	
	echo '</tbody>
          </table>
          </div>';
	
	
}

function list_taken_from_store() {
	include 'conf/config.php';
	include 'conf/opendb.php';
	
	echo '<div class="box-body">
			<table  style="width: 100%;" class="table-responsive table-bordered table-striped dt-responsive">
                  <thead>
                       <tr>
                           <th>Item</th>
						   <th>Qty</th>
						   <th>Date</th>
                       </tr>
                  </thead>
                  <tbody valign="top">';
	$i = 1;
	$result = mysqli_query ( $conn, "SELECT * FROM taken_from_store" );
	while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) {
		
		echo '
		<td>' . $row [item] . '</td>
		
		<td>' . $row [qty] . '</td>
		
		<td>' . $row [date] . '</td>
		</tr>';
		
		$i ++;
	}
	
	echo '</tbody>
          </table>
          </div>';
	
	
}

function list_store_for_purchase() {
	include 'conf/config.php';
	include 'conf/opendb.php';
	
	
	$result = mysqli_query ( $conn, "SELECT * FROM store" );
	while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) {
		
		echo '<option value="'.$row['item'].'">'.$row['item'].'</option>';
		
		
	}
	
	
	
}

function get_store_info($item) {
	include 'conf/config.php';
	include 'conf/opendb.php';
	
	
	$result = mysqli_query ( $conn, "SELECT * FROM store WHERE item='$item'" );
	while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) {
		return $row;
		
		
	}
	
	
	
}




function list_store_for_bar() {
	include 'conf/config.php';
	include 'conf/opendb.php';
	
	
	$result = mysqli_query ( $conn, "SELECT * FROM store WHERE resale='Yes'" );
	while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) {
		
		echo '<option value="'.$row['item'].'">'.$row['item'].'</option>';
		
		
	}
	
	
	
}

function list_store_for_sale() {
	include 'conf/config.php';
	include 'conf/opendb.php';
	
	
	$result = mysqli_query ( $conn, "SELECT * FROM store WHERE resale='Yes'" );
	while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) {
		
		echo '<option value="'.$row['item'].'">'.$row['item'].'</option>';
		
		
	}
	
	
	
}

function delete_store($id) {
	include 'conf/config.php';
	include 'conf/opendb.php';
	
	mysqli_select_db ($conn, $dbname );
	$query = "DELETE FROM store
	WHERE id='$id'";
	
	mysqli_query ($conn, $query );
	
	
}


function reduce_stock($item, $qty){
	include 'conf/config.php';
	include 'conf/opendb.php';


	$info=get_store_info($item);
	$new_qty=$info['qty']-$qty;
	
	$query = "UPDATE store SET
	qty='$new_qty'
	WHERE item='$item'";
	mysqli_query($conn, $query);
	

	include 'conf/closedb.php';
}
