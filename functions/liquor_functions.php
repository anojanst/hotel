<?php
function save_liquors($liquor) {
	include 'conf/config.php';
	include 'conf/opendb.php';
	
	mysqli_select_db ( $conn, $dbname );
	$query = "INSERT INTO liquor_type (id, liquor_type)
	VALUES ('', '$liquor')";
	
	mysqli_query ($conn, $query ) or die ( mysqli_connect_error () );
	
	
}
function list_liquors() {
	include 'conf/config.php';
	include 'conf/opendb.php';
	
	echo '<div class="box-body">
			<table  style="width: 100%;" class="table-responsive table-bordered table-striped dt-responsive">
                  <thead>
                       <tr>
                           <th>Edit</th>
						   <th>Liquor Type</th>
                           <th>Delete</th>
                       </tr>
                  </thead>
                  <tbody valign="top">';
	$i = 1;
	$result = mysqli_query ( $conn, "SELECT * FROM liquor_type" );
	while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) {
		
		echo '<td><a href="liquor.php?job=edit&id=' . $row [id] . '"  ><i class="fa fa-edit fa-2x"></i></a></td>
					
		<td>' . $row [liquor_type] . '</td>	
		<td><a href="liquor.php?job=delete&id=' . $row [id] . '" onclick="javascript:return confirm(\'Are you sure you want to delete this entry?\')"><i class="fa fa-times fa-2x"></i></a></td>
	
		</tr>';
		
		$i ++;
	}
	
	echo '</tbody>
          </table>
          </div>';
	
	
}
function get_liquors_info($id) {
	include 'conf/config.php';
	include 'conf/opendb.php';
	
	$result = mysqli_query ($conn, "SELECT * FROM liquor_type WHERE id='$id'" );
	
	while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) 

	{
		return $row;
	}
	
	
}



function update_liquors($id, $liquor) {
	include 'conf/config.php';
	include 'conf/opendb.php';

	mysqli_select_db ($conn, $dbname );
	$query = "UPDATE liquor_type SET
	liquor_type='$liquor'
	WHERE id='$id'";
	
	mysqli_query ($conn, $query );
	
	
}



function delete_liquor($id) {
	include 'conf/config.php';
	include 'conf/opendb.php';
	
	mysqli_select_db ($conn, $dbname );
	$query = "DELETE FROM liquor_type 
	WHERE id='$id'";
	
	mysqli_query ($conn, $query );
	
	
}


function list_liquor() {
	include 'conf/config.php';
	include 'conf/opendb.php';

	$result = mysqli_query ( $conn, "SELECT * FROM liquor_type " );
	$i = 0;
	while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) {
		$liquor_names [$i] = $row [liquor_type];
		$i ++;
	}
	
	//var_dump($liquor_names);
	return $liquor_names;

}


function save_liquor_details( $liquor_no, $liquor_name, $price_25, $price_50, $price) {
	include 'conf/config.php';
	include 'conf/opendb.php';
	
	mysqli_select_db ( $conn, $dbname );
	$query = "INSERT INTO liquor(id, liquor_no, liquor, price_25, price_50, price)
	VALUES ('', '$liquor_no', '$liquor_name', '$price_25', '$price_50', '$price')";
	echo $query;
	mysqli_query ($conn, $query ) or die ( mysqli_connect_error () );
	
	
}
function list_liquor_details() {
	include 'conf/config.php';
	include 'conf/opendb.php';
	
	echo '<div class="box-body">
			<table  style="width: 100%;" class="table-responsive table-bordered table-striped dt-responsive">
                  <thead>
                       <tr>
                           <th>Edit</th>
						   <th>Liquor No</th>
                           <th>Liquor Name</th>
                           <th>Price 25</th>
                           <th>Price 50</th>
                           <th>Price Full</th>
                           <th>Delete</th>
                       </tr>
                  </thead>
                  <tbody valign="top">';
	$i = 1;
	$result = mysqli_query ( $conn, "SELECT * FROM liquor" );
	while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) {
		
		echo '<td><a href="liquor_detail.php?job=edit&id=' . $row [id] . '"  ><i class="fa fa-edit fa-2x"></i></a></td>
					
		<td>' . $row [liquor_no] . '</td>
        <td>' . $row [liquor] . '</td>
        <td>' . $row [price_25] . '</td>
        <td>' . $row [price_50] . '</td>
        <td>' . $row [price] . '</td>
		<td><a href="liquor_detail.php?job=delete&id=' . $row [id] . '" onclick="javascript:return confirm(\'Are you sure you want to delete this entry?\')"><i class="fa fa-times fa-2x"></i></a></td>
	
		</tr>';
		
		$i ++;
	}
	
	echo '</tbody>
          </table>
          </div>';
	
	
}
function get_liquor_details_info($id) {
	include 'conf/config.php';
	include 'conf/opendb.php';
	
	$result = mysqli_query ($conn, "SELECT * FROM liquor WHERE id='$id'" );
	
	while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) 

	{
		return $row;
	}
	
	
}



function update_liquor_details ($id, $liquor_no, $liquor_name, $price_25, $price_50, $price) {
	include 'conf/config.php';
	include 'conf/opendb.php';

	mysqli_select_db ($conn, $dbname );
	$query = "UPDATE liquor SET
	liquor_no='$liquor_no',
    liquor='$liquor_name',
    price_25='$price_25',
    price_50='$price_50',
    price='$price'
	WHERE id='$id'";
	
	mysqli_query ($conn, $query );
	
	
}



function delete_liquor_detail($id) {
	include 'conf/config.php';
	include 'conf/opendb.php';
	
	mysqli_select_db ($conn, $dbname );
	$query = "DELETE FROM liquor 
	WHERE id='$id'";
	
	mysqli_query ($conn, $query );
	
}


function list_liquor_for_sale(){
	include 'conf/config.php';
	include 'conf/opendb.php';
	
	$result=mysqli_query($conn, "SELECT * FROM liquor ORDER BY id DESC");
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
    echo'   <option value="'.$row[id].'">'.$row[liquor].'</option>';
    }
    include 'conf/closedb.php';
    
}


function get_liquor_info_by_id($liquor_no) {
	include 'conf/config.php';
	include 'conf/opendb.php';
	
	$result = mysqli_query($conn, "SELECT * FROM liquor WHERE liquor_no='$liquor_no'");
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		return $row;
	}
	include 'conf/closedb.php';

}
function list_liquor_type_for_bar_sale(){
	include 'conf/config.php';
	include 'conf/opendb.php';

	$result=mysqli_query($conn, "SELECT * FROM liquor_type ORDER BY id DESC");
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
		echo'<option value="'.$row[liquor_type].'">'.$row[liquor_type].'</option>';
	}
	include 'conf/closedb.php';


}