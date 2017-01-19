<?php
function get_product_id($item_type){
	include 'conf/config.php';
	include 'conf/opendb.php';
	
	$result=mysqli_query($conn, "SELECT MAX(serial_no) FROM inventory WHERE item_type='$item_type'");
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
		$cap=strtoupper($item_type);
		$pre=substr($cap, 0, 3);
		$no=$row['MAX(serial_no)']+1;
		$no = str_pad($no, 5, "0", STR_PAD_LEFT);
		return "$pre-$no";
	}
	include 'conf/closedb.php';
}

function get_serial_no($item_type){
	include 'conf/config.php';
	include 'conf/opendb.php';

	$result=mysqli_query($conn, "SELECT MAX(serial_no) FROM inventory WHERE item_type='$item_type'");
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
		return $row['MAX(serial_no)']+1;
	}

	include 'conf/closedb.php';
}




function save_staff($employee_name, $full_name, $department, $email, $telephone, $mobile, $address, $user_name, $password){
	include 'conf/config.php';
	include 'conf/opendb.php';

	$query =  "INSERT INTO employees (id, employee_name,full_name, department, email, telephone, mobile, address, user_name, password)
	VALUES ('', '$employee_name','$full_name', '$department', '$email', '$telephone', '$mobile', '$address', '$user_name', '$password')";
	mysqli_query($conn, $query) or die(mysqli_error($conn));
	

	include 'conf/closedb.php';
}

function save_multiple_stock($product_id, $qty, $size, $price, $color, $barcode){
	include 'conf/config.php';
	include 'conf/opendb.php';
	
	$query =  "INSERT INTO inventory_has_multiple_stock (id, product_id, qty, size, price, color, barcode)
	VALUES ('', '$product_id', '$qty', '$size', '$price', '$color', '$barcode')";
	mysqli_query($conn, $query) or die(mysqli_error($conn));
	

	include 'conf/closedb.php';
}


function add_item_has_label($product_id, $label){
	include 'conf/config.php';
	include 'conf/opendb.php';

	 
	$query = "INSERT INTO item_has_label (id, product_id, label)
	VALUES ('', '$product_id', '$label')";
	mysqli_query($conn, $query) or die(mysqli_error($conn));

	include 'conf/closedb.php';
}

function add_item_has_special_label($product_id, $special_label){
	include 'conf/config.php';
	include 'conf/opendb.php';

	$query = "INSERT INTO item_has_special_label (id, product_id, label)
	VALUES ('', '$product_id', '$special_label')";
	mysqli_query($conn, $query) or die(mysqli_error($conn));

	include 'conf/closedb.php';
}

function add_item_has_color($product_id, $color){
	include 'conf/config.php';
	include 'conf/opendb.php';

	 
	$query = "INSERT INTO product_in_colors (id, product_id, color)
	VALUES ('', '$product_id', '$color')";
	mysqli_query($conn, $query) or die(mysqli_error($conn));

	include 'conf/closedb.php';
}

function add_item_has_gallery($product_id, $gallery){
	include 'conf/config.php';
	include 'conf/opendb.php';

	 
	$query = "INSERT INTO product_has_gallery (id, product_id, gallery)
	VALUES ('', '$product_id', '$gallery')";
	mysqli_query($conn, $query) or die(mysqli_error($conn));

	include 'conf/closedb.php';
}



function check_label($product_id, $label) {
	include 'conf/config.php';
	include 'conf/opendb.php';

	$result=mysqli_query($conn, "SELECT count(id) FROM item_has_label WHERE product_id='$product_id' AND label='$label'");
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
		if ($row['count(id)'] >=1) {
			return 1;
		}
		else{
			return 0;
		}
	}
	include 'conf/closedb.php';
}

function update_staff($id, $employee_name, $full_name, $department, $email, $telephone, $mobile, $address, $user_name, $password )
{
	include 'conf/config.php';
	include 'conf/opendb.php';
	
	$query = "UPDATE employees SET
	employee_name='$employee_name',
	full_name='$full_name',
	department='$department',
	email='$email',
	telephone='$telephone',
	mobile='$mobile',
	address='$address',
	user_name='$user_name',
	password='$password'
	WHERE id='$id'";

	mysqli_query($conn, $query);

	include 'conf/closedb.php';
}


function update_product_without_cover($id, $product_name, $sale, $selling_price,  $short_des,  $barcode, $qty, $measure_type, $exp_date, $size, $weight, $servings, $safety, $alergic_info, $howto)
{
	include 'conf/config.php';
	include 'conf/opendb.php';

 
	$query = "UPDATE inventory SET
	product_name='$product_name',
	sale='$sale',
	selling_price='$selling_price',
	short_des='$short_des',
	barcode='$barcode',
	qty='$qty',
	measure_type='$measure_type',
	exp_date='$exp_date',
	size='$size',
	weight='$weight',
	servings='$servings',
	safety='$safety',
	alergic_info='$alergic_info',
	howto='$howto',
	updated_by='$_SESSION[user_name]'
	WHERE id='$id'";

	mysqli_query($conn, $query);

	include 'conf/closedb.php';
}


function cancel_product($id) {
	include 'conf/config.php';
	include 'conf/opendb.php';

	 
	$query = "UPDATE inventory SET
	cancel_status='1',
	canceled_by='$_SESSION[user_name]' 
	WHERE id='$id'";
	mysqli_query($conn, $query);

	include 'conf/closedb.php';
}

function delete_staff($id) {
	include 'conf/config.php';
	include 'conf/opendb.php';


	$query = "UPDATE employees SET
	cancel_status='1',
	canceled_by='$_SESSION[user_name]'
	WHERE id='$id'";
	mysqli_query($conn, $query);

	include 'conf/closedb.php';
}

function get_staff_info($id) {
	include 'conf/config.php';
	include 'conf/opendb.php';

	$result = mysqli_query($conn, "SELECT * FROM employees WHERE id='$id'");
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		return $row;
	}
	include 'conf/closedb.php';
}



function get_item_info_by_name($product_name) {
	include 'conf/config.php';
	include 'conf/opendb.php';

	$result = mysqli_query($conn, "SELECT * FROM inventory WHERE product_name='$product_name'");
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		return $row;
	}
	include 'conf/closedb.php';
}

function check_added_items_inventory($product_id) {
	include 'conf/config.php';
	include 'conf/opendb.php';

	$result = mysqli_query($conn, "SELECT count(id) FROM inventory WHERE product_id='$product_id' AND cancel_status='0'");
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		if ($row['count(id)'] >= 1) {
			return 1;
		} else {
			return 0;
		}
	}

	include 'conf/closedb.php';
}

function get_inventory_info_by_product_id($product_id) {
	include 'conf/config.php';
	include 'conf/opendb.php';

	$result = mysqli_query($conn, "SELECT * FROM inventory WHERE product_id='$product_id'");
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		return $row;
	}
	include 'conf/closedb.php';
}



function list_label($id){
	$info=get_product_info($id);
	
	include 'conf/config.php';
	include 'conf/opendb.php';
	
	$result=mysqli_query($conn, "SELECT * FROM item_has_label WHERE product_id='$info[product_id]' ORDER BY label ASC");
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
		echo'<option value="'.$row[label].'" selected>'.$row[label].'</option>';
	}
	
	$result1=mysqli_query($conn, "SELECT * FROM label WHERE label.cancel_status='0' AND label.label NOT IN (SELECT label FROM item_has_label WHERE product_id='$info[product_id]') AND label.label NOT IN (SELECT label FROM special_label) ORDER BY label ASC");
	while($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC))
	{
		echo'<option value="'.$row1[label].'">'.$row1[label].'</option>';
	}
}

function list_seasonal_label($id){
	$info=get_product_info($id);
	
	include 'conf/config.php';
	include 'conf/opendb.php';
	
	$result=mysqli_query($conn, "SELECT * FROM item_has_label WHERE product_id='$info[product_id]' ORDER BY label ASC");
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
		echo'<option value="'.$row[label].'" selected>'.$row[label].'</option>';
	}
	
	$result1=mysqli_query($conn, "SELECT * FROM label WHERE label.cancel_status='0' AND label.label NOT IN (SELECT label FROM item_has_label WHERE product_id='$info[product_id]') AND label.label NOT IN (SELECT label FROM special_label) ORDER BY label ASC");
	while($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC))
	{
		echo'<option value="'.$row1[seasonal].'">'.$row1[seasonal].'</option>';
	}
}


function list_colors(){
	
	include 'conf/config.php';
	include 'conf/opendb.php';
	
	
	$result1=mysqli_query($conn, "SELECT * FROM color WHERE color.color NOT IN (SELECT color FROM product_in_colors WHERE product_id='$info[product_id]') ORDER BY color ASC");
	while($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC))
	{
		echo'<option value="'.$row1[color].'">'.$row1[color].'</option>';
	}
}




function list_staff_detail_view($id){

	include 'conf/config.php';
	include 'conf/opendb.php';
echo "SELECT * FROM employees WHERE cancel_status='0' AND id='$id'";
	$result=mysqli_query($conn, "SELECT * FROM employees WHERE cancel_status='0' AND id='$id'");
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
		
		echo '
	<div class="row" class="col-lg-12">
		<div class="col-lg-4" >
				 <img src="'.$row[cover].'" width=250px height=250px style="margin-left: 5px;"/> 
		 </div>
		 
		
		 <div class="col-lg-8" style="border-left: solid 2px black;">

		
							<div class="row">
							<div class="col-lg-3"><b>
							Employee Name      :</b> </div><div class="col-lg-9">'.$row[employee_name].'
							</div></div>
							
							<div class="row">
							<div class="col-lg-3"><b>
							Full Name	:</b></div><div class="col-lg-9">'.$row[full_name].'
							</div></div>
							
							<div class="row">
							<div class="col-lg-3"><b>
							Department	:</b></div><div class="col-lg-9">'.$row[department].'
							</div></div>
							
							<div class="row">
							<div class="col-lg-3"><b>
							Email	:</b></div><div class="col-lg-9">'.$row[email].'
							</div></div>
							
							<div class="row">
							<div class="col-lg-3"><b>
							Telephone	:</b></div><div class="col-lg-9">'.$row[telephone].'
							</div></div>
							
							<div class="row">
							<div class="col-lg-3"><b>
							Mobile	:</b></div><div class="col-lg-9">'.$row[mobile].'
							</div></div>
							
							<div class="row">
							<div class="col-lg-3"><b>
							Address       :</b></div><div class="col-lg-9">'.$row[address].'
							</div></div>
														
	
		</div>
		
	</div>
		
					<a href="staff_manage.php?job=edit&id='.$row[id].'" ><div class="btn btn-primary">Edit</div></a>

					<a href="staff_manage.php?job=delete&id='.$row[id].'" onclick="javascript:return confirm(\'Are you sure you want to delete this entry?\')"><div class="btn btn-primary">Delete</div></a>
			
									
		 
										
		';

	}

	

	include 'conf/closedb.php';
}


function list_inventory_detail(){
	include 'conf/config.php';
	include 'conf/opendb.php';
		

	$result=mysqli_query($conn, "SELECT * FROM inventory WHERE cancel_status='0'");
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
		
		echo '
	<div class="row" class="col-lg-12">
		<div class="col-lg-4" >
				 <img src="'.$row[cover].'" width="150" height="150"style="margin-left: 5px;"/> 

						<div>'.$row[product_name].'</div>
						<div>'.$row[parent_category].'</div>
						<div>'.$row[item_type].'</div>
							
				
		</div>		
</div>	';

	}

	include 'conf/closedb.php';
}

function list_staff() {
	include 'conf/config.php';
	include 'conf/opendb.php';

	echo '<div class="table-responsive" >
              <table id="example1" class="table table-bordered table-striped">
	<thead>
    <tr>
	<th>Edit</th>
	<th>Name</th>
	<th>Full Name</th>
	<th>Department</th>
	<th>Email</th>
	<th>Telephone</th>
	<th>Mobile</th>
	<th>Address</th>
	<th>Access</th>
	<th>Delete</th>
	</tr>
	</thead>';

	$result = mysqli_query($conn, "SELECT * FROM employees WHERE cancel_status='0' ORDER BY id DESC LIMIT 100");
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		echo '
				<tr>
					<td><a href="staff_manage.php?job=edit&id=' . $row [id] . '" class="btn"><i class="fa fa-pencil-square-o"></i></a></td>
				
					<td>' . $row[employee_name] . '</td>
					<td>' . $row[full_name] . '</td>					
					<td>' . $row[department] . '</td>					
					<td>' . $row[email] . '</td>
					<td>' . $row[telephone] . '</td>					
					<td>' . $row[mobile] . '</td>
					<td>' . $row[address] . '</td>
					<td><a href="staff_manage.php?job=access&id=' . $row [id] . '"><i class="fa fa-key fa-lg"></i></a></td>
					<td><a href="staff_manage.php?job=delete&id='.$row[id].'" onclick="javascript:return confirm(\'Are you sure you want to delete this entry?\')"><i class="fa fa-times fa-2x"></i></a></td>
					
				</tr>';
	}
	echo '</tbody></table>';

	include 'conf/closedb.php';
}



function list_gallery($product_id){
	include 'conf/config.php';
	include 'conf/opendb.php';

	echo '<div class="table-responsive">
              <table class="table">
                  <thead>
                       <tr>

                           
							<th>Gallery</th>
							 <th>Delete</th>

                       </tr>
                  </thead>
                  <tbody>';



	$result=mysqli_query($conn, "SELECT * FROM product_has_gallery WHERE  product_id='$product_id'" );
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{

		echo '

		 <td><img src="'.$row[gallery].'" width=50px height=50px style="margin-left: 5px;"/> </td>
	
		<td><a href="inventory.php?job=delete_gallery&id='.$row[id].'" onclick="javascript:return confirm(\'Are you sure you want to delete this entry?\')"><i class="fa fa-times fa-2x"></i></a></td>
					
		</tr>';

		$i++;

	}

	echo '</tbody>
          </table>
          </div>';


}



function cancel_gallery($id) {
	include 'conf/config.php';
	include 'conf/opendb.php';

	mysqli_select_db($conn, $dbname);
	$query = "DELETE FROM product_has_gallery 
	WHERE id='$id'";
	mysqli_query($conn, $query);

}

function get_gallery_info($id) {
	include 'conf/config.php';
	include 'conf/opendb.php';

	$result = mysqli_query($conn, "SELECT * FROM product_has_gallery WHERE id='$id'");
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		return $row;
	}
}

function get_new_cover_name($product_id) {
	include 'conf/config.php';
	include 'conf/opendb.php';

	$result = mysqli_query($conn, "SELECT * FROM product_has_gallery WHERE product_id='$product_id' LIMIT 1");
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		return $row['gallery'];
	}
}




function save_label($product_id, $label_text){
	include 'conf/config.php';
	include 'conf/opendb.php';

	$result=mysqli_query($conn, "SELECT * FROM inventory WHERE product_id='$product_id'");
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
		$label_old=$row['label'];
		$label_new=$label_text.', '.$label_old;

		$query = "UPDATE inventory SET
		label='$label_new'
		WHERE product_id='$product_id'";

		mysqli_query($conn, $query);

	}

	include 'conf/closedb.php';
}


function save_special_label($product_id, $special_label_text){
	include 'conf/config.php';
	include 'conf/opendb.php';

	$result=mysqli_query($conn, "SELECT * FROM inventory WHERE product_id='$product_id'");
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
		$special_label_old=$row['special_label'];
		$special_label_new=$special_label_text.', '.$special_label_old;

		$query = "UPDATE inventory SET
		special_label='$special_label_new'
		WHERE product_id='$product_id'";

		mysqli_query($conn, $query);

	}

	include 'conf/closedb.php';
}


function save_color($product_id, $color_text){
	include 'conf/config.php';
	include 'conf/opendb.php';

	$result=mysqli_query($conn, "SELECT * FROM inventory WHERE product_id='$product_id'");
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
		$color_old=$row['color'];
		$color_new=$color_text.', '.$color_old;

		$query = "UPDATE inventory SET
		color='$color_new'
		WHERE product_id='$product_id'";

		mysqli_query($conn, $query);

	}

	include 'conf/closedb.php';
}


function list_multiple_stock($product_id){
	include 'conf/config.php';
	include 'conf/opendb.php';

	echo '
              <table class="table">
                  <thead>
                       <tr>

                         
                       
                           <th>Product Id</th>
                           <th>Size</th>
                           <th>Color</th>
                           <th>Qty</th>
						   <th>Price</th>						   
						   <th>Barcode</th>

                       </tr>
                  </thead>
                  <tbody>';

	$i=1;
	$result=mysqli_query($conn, "SELECT * FROM inventory_has_multiple_stock WHERE product_id='$product_id' " );
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{

		echo '
		
		<td>'.$row[product_id].'</td>
        <td>'.$row[size].'</td>
        <td>'.$row[color].'</td>
        <td>'.$row[qty].'</td>
		<td>'.$row[price].'</td>
		<td>'.$row[barcode].'</td>
		
		</tr>';

		$i++;

	}

	echo '</tbody>
          </table>';


}


function inventory_qty_update($product_id, $qty) {

	include 'conf/config.php';
	include 'conf/opendb.php';

	$result = mysqli_query($conn, "SELECT * FROM inventory WHERE product_id='$_SESSION[product_id]'");

	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

		$info= get_stock_info_by_product_id($product_id);
		$qty=$info['qty'];

		
		$product_id = $row['product_id'];

		$old_quantity = $row['qty'];
		$new_quantity = $old_quantity + $qty;
		
		echo "UPDATE inventory SET
		qty='$new_quantity'
	
		WHERE product_id='$_SESSION[product_id]'";
		mysqli_select_db($conn,$dbname);
		$query = "UPDATE inventory SET
		qty='$new_quantity'
	
		WHERE product_id='$_SESSION[product_id]'";
		

		mysqli_query($conn,$query);
	}
}


function get_stock_info_by_product_id($product_id) {
	include 'conf/config.php';
	include 'conf/opendb.php';
	
	$result = mysqli_query($conn, "SELECT * FROM inventory_has_multiple_stock WHERE product_id='$_SESSION[product_id]'");
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		return $row;
	

	}
	include 'conf/closedb.php';
}

function sum_total_qty($product_id){
	
	include 'conf/config.php';
	include 'conf/opendb.php';

	$result=mysqli_query($conn, "SELECT SUM(qty) FROM inventory_has_multiple_stock WHERE product_id='$_SESSION[product_id]' ");
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
		$total_qty=$row['SUM(qty)'];

		mysqli_select_db($conn,$dbname);
		$query = "UPDATE inventory SET
		qty='$total_qty'	
		WHERE product_id='$_SESSION[product_id]'";		
		mysqli_query($conn,$query);
		
	}

	include 'conf/closedb.php';
}

function change_min_max_price($product_id){
	
	include 'conf/config.php';
	include 'conf/opendb.php';

	$result=mysqli_query($conn, "SELECT * FROM inventory_has_multiple_stock WHERE product_id='$_SESSION[product_id]' ");
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
		$info=get_inventory_info_by_product_id($product_id);
		$selling_price=$info['selling_price'];
		$price=$row['price'];
		
		if($selling_price>$price){
		mysqli_select_db($conn,$dbname);
		$query = "UPDATE inventory SET
		min_price='$price'	
		WHERE product_id='$_SESSION[product_id]'";		
		mysqli_query($conn,$query);
		}
		elseif($selling_price<$price){
		mysqli_select_db($conn,$dbname);
		$query = "UPDATE inventory SET
		max_price='$price'	
		WHERE product_id='$_SESSION[product_id]'";		
		mysqli_query($conn,$query);
		}
		else{
			
		}
		
	}

	include 'conf/closedb.php';
}

function list_special_label_detail() {
	include 'conf/config.php';
	include 'conf/opendb.php';

	$result = mysqli_query ( $conn, "SELECT * FROM special_label WHERE parent_category='$_SESSION[parent_category]' " );

	$i = 0;
	while ( $row = mysqli_fetch_array ( $result, MYSQLI_ASSOC ) ) {
		$special_label_names [$i] = $row ['label'];

		$i ++;
	}


	return $special_label_names;

}

function get_special_label_info_by_product_id($parent_category) {
	include 'conf/config.php';
	include 'conf/opendb.php';

	$result = mysqli_query($conn, "SELECT * FROM special_label WHERE parent_category='$parent_category'");
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		return $row;
	

	}
	include 'conf/closedb.php';
}