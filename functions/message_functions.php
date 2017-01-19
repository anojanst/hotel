<?php
function change_message_type($id) {
	include 'conf/config.php';
	include 'conf/opendb.php';

	mysqli_select_db($conn, $dbname);
	$query = "UPDATE contact_us_messages SET
	status='1'
	WHERE id='$id'";
	mysqli_query($conn, $query);



}



function list_read_message(){
	include 'conf/config.php';
	include 'conf/opendb.php';

	
	echo '<div class="table-responsive">
              <table class="table">
                  <thead>
                       <tr>

                           <th>name</th>
                           <th>email</th>
                           <th>subject</th>
						   <th>message</th>
                           <th>Created Time</th>

                       </tr>
                  </thead>
                  <tbody>';



	$result=mysqli_query($conn, "SELECT * FROM contact_us_messages WHERE status='1'" );
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{

		echo '
		
					<td>'.$row[name].'</td>
					<td>'.$row[email].'</td>
					<td>'.$row[subject].'</td>
					<td>'.$row[message].'</td>
					<td>'.$row[created_time].'</td>


		</tr>';

		$i++;

	}

	echo '</tbody>
          </table>
          </div>';


}



function list_unread_message(){
	include 'conf/config.php';
	include 'conf/opendb.php';

	echo '<div class="table-responsive">
              <table class="table">
                  <thead>
                       <tr>

                           <th>name</th>
                           <th>email</th>
                           <th>subject</th>
						   <th>message</th>
                           <th>Created Time</th>

                       </tr>
                  </thead>
                  <tbody>';



	$i=1;
	$result=mysqli_query($conn, "SELECT * FROM contact_us_messages WHERE status='0'" );
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{

		echo '
		
					<td>'.$row[name].'</td>
					<td>'.$row[email].'</td>
					<td>'.$row[subject].'</td>
					<td>'.$row[message].'</td>
					<td>'.$row[created_time].'</td>
					
		<td><a href="message.php?job=change_message&id='.$row[id].'" ><i class="fa fa-check-circle"></i></a></td>



		</tr>';

		$i++;

	}

	echo '</tbody>
          </table>
          </div>';


}
