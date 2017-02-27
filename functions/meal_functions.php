<?php
function save_bill_of_material($meal_no,$meal_name,$size,$item,$qty,$price) {
	include 'conf/config.php';
	include 'conf/opendb.php';
	
	mysqli_select_db ( $conn, $dbname );
	$query = "INSERT INTO bill_of_material (id,meal_no,meal_name, size,item,qty,price)
	VALUES ('','$meal_no','$meal_name', '$size','$item','$qty','$price')";
	
	mysqli_query ($conn, $query ) or die ( mysqli_connect_error () );
	
	
}
function list_bill_of_material() {
	include 'conf/config.php';
	include 'conf/opendb.php';
	
	echo '<div class="box-body">
			<table  style="width: 100%;" class="table-responsive table-bordered table-striped dt-responsive">
                  <thead>
                       <tr>
                           <th>Edit</th>
                           <th>Meal No</th>
                           <th>Meal Name</th>
                           <th>Item</th>
                           <th>Qty</th>
                           <th>Price</th>
                           <th>Delete</th>
                       </tr>
                  </thead>
                  <tbody valign="top">';
	$i = 1;
	$result = mysqli_query ( $conn, "SELECT * FROM bill_of_material" );
	while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) {
		
		echo '<td><a href="meal.php?job=edit&id='.$row [id].'&meal_no='. $row [meal_no].'"  ><i class="fa fa-edit fa-2x"></i></a></td>
		<td>' . $row [meal_no] . '</td>
        <td>' . $row [meal_name] . '</td>
        <td>' . $row [item] . '</td>
        <td>' . $row [qty] . '</td>	
		<td>' . $row [price] . '</td>	
		<td><a href="meal.php?job=delete&id='.$row [id].'" onclick="javascript:return confirm(\'Are you sure you want to delete this entry?\')"><i class="fa fa-times fa-2x"></i></a></td>	
		</tr>';
		$i ++;
	}
	
	echo '</tbody>
          </table>
          </div>';
	
	
}
function get_bill_of_material_info($id) {
	include 'conf/config.php';
	include 'conf/opendb.php';
	
	$result = mysqli_query ($conn, "SELECT * FROM bill_of_material WHERE id='$id'" );
	
	while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) 

	{
		return $row;
	}
	
	
}



function update_bill_of_material ( $id,$meal_no,$meal_name,$size,$item,$qty,$price) {
	include 'conf/config.php';
	include 'conf/opendb.php';

	mysqli_select_db ($conn, $dbname );
	$query = "UPDATE bill_of_material SET
	meal_name='$meal_name',
    size='$size',
    item='$item',
    qty='$qty',
    price='$price'
	WHERE id='$id' & meal_no='$meal_no'";
	
	mysqli_query ($conn, $query );
	
	
}



function delete_bill_of_material($id) {
	include 'conf/config.php';
	include 'conf/opendb.php';
	
	mysqli_select_db ($conn, $dbname );
	$query = "DELETE FROM bill_of_material 
	WHERE id='$id'";
	
	mysqli_query ($conn, $query );
	
	
}




function save_meal_details( $meal_no, $meal_name, $price) {
	include 'conf/config.php';
	include 'conf/opendb.php';
	
	mysqli_select_db ( $conn, $dbname );
	$query = "INSERT INTO meal(id, meal_no, meal_name, price)
	VALUES ('', '$meal_no', '$meal_name', '$price')";
	
	mysqli_query ($conn, $query ) or die ( mysqli_connect_error () );
	
	
}
function list_meal_details() {
	include 'conf/config.php';
	include 'conf/opendb.php';
	
	echo '<div class="box-body">
			<table  style="width: 100%;" class="table-responsive table-bordered table-striped dt-responsive">
                  <thead>
                       <tr>
                           <th>Edit</th>
						   <th>Meal No</th>
                           <th>Meal Name</th>
                           <th>Price</th>
                           <th>Delete</th>
                       </tr>
                  </thead>
                  <tbody valign="top">';
	$i = 1;
	$result = mysqli_query ( $conn, "SELECT * FROM meal" );
	while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) {
		
		echo '<td><a href="meal_detail.php?job=edit&id=' . $row [id] . '"  ><i class="fa fa-edit fa-2x"></i></a></td>
					
		<td>' . $row [meal_no] . '</td>
        <td>' . $row [meal_name] . '</td>
        <td>' . $row [price] . '</td>
		<td><a href="meal_detail.php?job=delete&id=' . $row [id] . '" onclick="javascript:return confirm(\'Are you sure you want to delete this entry?\')"><i class="fa fa-times fa-2x"></i></a></td>
	
		</tr>';
		
		$i ++;
	}
	
	echo '</tbody>
          </table>
          </div>';
	
	
}
function get_meal_details_info($id) {
	include 'conf/config.php';
	include 'conf/opendb.php';
	
	$result = mysqli_query ($conn, "SELECT * FROM meal WHERE id='$id'" );
	
	while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) 

	{
		return $row;
	}
	
	
}



function update_meal_details ( $id, $meal_no, $meal_name, $price ) {
	include 'conf/config.php';
	include 'conf/opendb.php';

	mysqli_select_db ($conn, $dbname );
	$query = "UPDATE meal SET
	meal_no='$meal_no',
    meal_name='$meal_name',
    price='$price'
	WHERE id='$id'";
	
	mysqli_query ($conn, $query );
	
	
}



function delete_meal_detail($id) {
	include 'conf/config.php';
	include 'conf/opendb.php';
	
	mysqli_select_db ($conn, $dbname );
	$query = "DELETE FROM meal 
	WHERE id='$id'";
	
	mysqli_query ($conn, $query );
	
}

function list_meal_type_for_sale(){
	include 'conf/config.php';
	include 'conf/opendb.php';

	$result=mysqli_query($conn, "SELECT * FROM meal_type ORDER BY id DESC");
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
		echo'   <option value="'.$row[meal].'">'.$row[meal].'</option>';
	}
	include 'conf/closedb.php';

}

function list_meal_for_sale(){
	include 'conf/config.php';
	include 'conf/opendb.php';
	
	$result=mysqli_query($conn, "SELECT * FROM meal ORDER BY id DESC");
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
    echo'   <option value="'.$row[id].'">'.$row[meal_name].'</option>';
    }
    include 'conf/closedb.php';
    
}


function get_meal_info_by_id($meal_no) {
	include 'conf/config.php';
	include 'conf/opendb.php';
	
	$result = mysqli_query($conn, "SELECT * FROM meal WHERE meal_no='$meal_no'");
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		return $row;
	}
	include 'conf/closedb.php';

}

function list_meal_menu(){
    include 'conf/config.php';
	include 'conf/opendb.php';
    
    $result = mysqli_query($conn, "SELECT * FROM meal");
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
         
		echo'<option value="'.$row[meal_name].'">'.$row[meal_name].'</option>';
	}
	include 'conf/closedb.php';

    
}

function get_meal_info_by_name($meal_name){
    include 'conf/config.php';
	include 'conf/opendb.php';
	
	$result = mysqli_query($conn, "SELECT * FROM meal WHERE meal_name='$meal_name'");
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		return $row;
	}
	include 'conf/closedb.php';
}



function get_item_info_by_item_name($item){
    include 'conf/config.php';
	include 'conf/opendb.php';
	
	
	$result = mysqli_query ( $conn, "SELECT * FROM bill_of_material WHERE item='$item'" );
	while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) {
		return $row;
	}
}
