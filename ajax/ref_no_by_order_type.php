<?php
include '../conf/config.php';
include '../conf/opendb.php';
//Include The Database Connection File 

	$choice = $_GET['choice'];

	
	if($choice=="Dine In"){
		echo '<option disabled selected>Select Table</option>
			  <option value="1">Table 1</option>
			  <option value="2">Table 2</option>
			  <option value="3">Table 3</option>
			  <option value="4">Table 4</option>
			  <option value="5">Table 5</option>
			  <option value="6">Table 6</option>
			  <option value="7">Table 7</option>
			  <option value="8">Table 8</option>
			  <option value="9">Table 9</option>
			  <option value="10">Table 10</option
			  <option value="11">Table 11</option>
			  <option value="12">Table 12</option>
			  <option value="13">Table 13</option>
			  <option value="14">Table 14</option>
			  <option value="15">Table 15</option>
			  <option value="16">Table 16</option>
			  <option value="17">Table 17</option>
			  <option value="18">Table 18</option>
			  <option value="19">Table 19</option>
			  <option value="20">Table 20</option>';
	}
	
		
	elseif($choice=="Order From Room"){
   		echo '<option disabled selected>Select Room</option>';

		$date=date('Y-m-d');
		$query = "SELECT * FROM room_has_status WHERE status='Occupied' AND date='$date'";
		$result = mysqli_query($conn, $query);
		while ($row = mysqli_fetch_array($result)) {
			echo '<option value="'.$row[room_no].'">Room No ' . $row[room_no] . '</option>';
		}
		
	}
	
	else{
   		echo '<option selected>Take Away</option>';
		
	}
?>
