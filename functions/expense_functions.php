<?php
function save_expense_type ($expense_type) {
	include 'conf/config.php';
	include 'conf/opendb.php';
	
	mysqli_select_db ( $conn, $dbname );
	$query = "INSERT INTO expense_type (id, expense_type)
	VALUES ('', '$expense_type')";
	
	mysqli_query ($conn, $query ) or die ( mysqli_connect_error () );
	
}

function update_expense_type ($id, $expense_type) {
	include 'conf/config.php';
	include 'conf/opendb.php';
	
	mysqli_select_db ($conn, $dbname );
	$query = "UPDATE expense_type SET
	expense_type='$expense_type'
	WHERE id='$id'";
	
	mysqli_query ($conn, $query );
	
	
}

function get_expense_type_by_id ( $id ) {
	include 'conf/config.php';
	include 'conf/opendb.php';
	
	$result = mysqli_query ($conn, "SELECT * FROM expense_type WHERE id='$id'" );
	
	while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) 

	{
		return $row;
	}
	
}

function delete_expense_type($id) {
	include 'conf/config.php';
	include 'conf/opendb.php';

	mysqli_select_db ($conn, $dbname );
	$query = "DELETE FROM expense_type WHERE id='$id'";
	
	mysqli_query ($conn, $query );
}

function list_expense_type() {
	include 'conf/config.php';
	include 'conf/opendb.php';
	
	echo '<div class="box-body">
			<table  style="width: 100%;" class="table-responsive table-bordered table-striped dt-responsive">
                  <thead>
                       <tr>
                           <th>Edit</th>
                           <th>Expense Type</th>
                           <th>Delete</th>
                       </tr>
                  </thead>
                  <tbody valign="top">';
	$i = 1;
	$result = mysqli_query ( $conn, "SELECT * FROM expense_type" );
	while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) {
		
		echo '<td><a href="expense.php?job=edit&id=' . $row [id] . '"  ><i class="fa fa-edit fa-2x"></i></a></td>

		<td>' . $row [expense_type] . '</td>
					
		<td><a href="expense.php?job=delete&id=' . $row [id] . '" onclick="javascript:return confirm(\'Are you sure you want to delete this entry?\')"><i class="fa fa-times fa-2x"></i></a></td>
	
		</tr>';
		
		$i ++;
	}
	
	echo '</tbody>
          </table>
          </div>';
	
	
}

function select_expense_type(){
	include 'conf/config.php';
	include 'conf/opendb.php';
    
    $result = mysqli_query ($conn, "SELECT * FROM expense_type");
	while ($row = mysqli_fetch_array ($result, MYSQLI_ASSOC)) 

	{
		echo'<option value="'.$row[expense_type].'" >'.$row[expense_type].'</option>';
	}
	
    
}

function save_expense_charge($expense_no,$expense_type,$description,$price) {
	include 'conf/config.php';
	include 'conf/opendb.php';
	
    $date=date('Y-m-d');
	mysqli_select_db ( $conn, $dbname );
	$query = "INSERT INTO expense_has_items(id,expense_no,date, expense_type, description, price)
	VALUES ('','$expense_no','$date', '$expense_type','$description','$price')";
	
	mysqli_query ($conn, $query ) or die ( mysqli_connect_error () );
	
}

function list_expense_charge($expense_no) {
	include 'conf/config.php';
	include 'conf/opendb.php';
	
	echo '<div class="box-body">
			<table  style="width: 100%;" class="table-responsive table-bordered table-striped dt-responsive">
                  <thead>
                       <tr>
                           <th>Edit</th>
                           <th>Expense Type</th>
                           <th>Description</th>
                           <th>Price</th>
                           <th>Delete</th>
                       </tr>
                  </thead>
                  <tbody valign="top">';
	$i = 1;
	$result = mysqli_query ( $conn, "SELECT * FROM expense_has_items WHERE expense_no='$expense_no' AND cancel_status='0'" );
	while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) {
		
		echo '<td><a href="expense_charge.php?job=edit&id='.$row [id].'"  ><i class="fa fa-edit fa-2x"></i></a></td>
		<td>' . $row [expense_type] . '</td>
        <td>' . $row [description] . '</td>
        <td>' . $row [price] . '</td>
		<td><a href="expense_charge.php?job=delete&id=' . $row [id] . '" onclick="javascript:return confirm(\'Are you sure you want to delete this entry?\')"><i class="fa fa-times fa-2x"></i></a></td>
	
		</tr>';
		
		$i ++;
	}
	
	echo '</tbody>
          </table>
          </div>';
}

function get_expense_charge_by_id($id) {
	include 'conf/config.php';
	include 'conf/opendb.php';
	
	$result = mysqli_query ($conn, "SELECT * FROM expense_has_items WHERE id='$id'" );
	
	while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) 

	{
		return $row;
	}
	
}

function delete_expense_charge($id){
    include 'conf/config.php';
	include 'conf/opendb.php';
    
   
	$query = "UPDATE expense_has_items SET
	cancel_status='1',
	canceled_by='$_SESSION[user_name]'
	WHERE id='$id'";
	mysqli_query($conn, $query);

	include 'conf/closedb.php';
}
function update_expense_charge($id,$expense_no,$expense_type,$description,$price){
    include 'conf/config.php';
	include 'conf/opendb.php';
	
	mysqli_select_db ($conn, $dbname );
	$query = "UPDATE expense_has_items SET
	expense_type='$expense_type',
    description='$description',
    price='$price'
	WHERE id='$id' AND expense_no='$expense_no'";
	
	mysqli_query ($conn, $query );
}	
	
function get_expense_no(){
	include 'conf/config.php';
	include 'conf/opendb.php';

	$result=mysqli_query($conn, "SELECT MAX(expense_no) FROM expense_has_items");
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
		return $row['MAX(expense_no)']+1;
	}

	include 'conf/closedb.php';
}

function get_expense_total($expense_no){
	include 'conf/config.php';
	include 'conf/opendb.php';


	$result=mysqli_query($conn, "SELECT sum(price) as total FROM expense_has_items WHERE expense_no='$expense_no' AND cancel_status='0'");
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
		$total=$row[total];
	}

	return $total;

	include 'conf/closedb.php';
}

function save_expense($expense_no, $supplier_name, $prepared_by, $total){
	include 'conf/config.php';
	include 'conf/opendb.php';

	$date = date("Y-m-d");
	
	
    
	$query = "INSERT INTO expense (id, expense_no, supplier_name, prepared_by, date, total)
	VALUES ('', '$expense_no', '$supplier_name', '$prepared_by', '$date', '$total')";
	mysqli_query($conn, $query) or die (mysqli_error($conn));

	include 'conf/closedb.php';
}

function   update_expense($id, $expense_no, $supplier_name, $prepared_by, $total, $updated_by){
	include 'conf/config.php';
	include 'conf/opendb.php';

	$date = date("Y-m-d");

	$query = "UPDATE expense SET
	expense_no='$expense_no',
	date='$date',
	supplier_name='$supplier_name',
	prepared_by='$prepared_by',
	total='$total',
	due='$total',
	updated_by='$updated_by' 
	WHERE id='$id'";

	mysqli_query($conn, $query);

	include 'conf/closedb.php';
}

function update_expense_saved($expense_no){
	include 'conf/config.php';
	include 'conf/opendb.php';
	
	
	$query = "UPDATE expense_has_items SET
	saved='1'
	WHERE expense_no='$expense_no'";
	mysqli_query($conn, $query);

	include 'conf/closedb.php';
}

function get_info_from_expense_has_items($id, $expense_no){
	include 'conf/config.php';
	include 'conf/opendb.php';

	$result=mysqli_query($conn, "SELECT * FROM expense_has_items WHERE id='$id' AND expense_no='$expense_no'");
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
		return $row;
	}
	include 'conf/closedb.php';
}