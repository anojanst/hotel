<?php
function list_purchase($supplier_name,$from_date,$to_date){
    include 'conf/config.php';
    include 'conf/opendb.php';
    
    if($supplier_name){
        $supplier_name_check="AND supplier_name='$supplier_name'";
    }
    else{
        $supplier_name_check="";
    }
   
   
    if ($to_date && $from_date) {
        $date_check = "AND date BETWEEN '$from_date' AND '$to_date'";
    } elseif ($from_date) {
        $date_check = "AND date>='$from_date'";
        $limit = "";
    } elseif ($to_date) {
        $date_check = "AND date<='$to_date'";
        $limit = "";
    } else {
        $date_check = "";
        $limit = "LIMIT 50";
    }

   
    echo '<div class="box-body">
            <table  style="width: 100%;" class="table-responsive table-bordered table-striped dt-responsive">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Purchase No</th>
                        <th>Purchase Date</th>
                        <th>Supplier Name</th>
                        <th>Total Amount</th>
                        <th>Prepared By</th>
                    </tr>
                </thead>
                <tbody>';
$i=1;

    $result=mysqli_query($conn, "SELECT * FROM purchase_order WHERE cancel_status='0' $supplier_name_check $date_check  ORDER BY id DESC");
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
        echo '
        <tr>
        <td>'.$i.'</td>
            <td><a href="reports.php?job=purchased_items&purchase_order_no='.$row[purchase_order_no].'" target="_blank" style="color:black; text-decoration:none;">'.$row[purchase_order_no].'</a></td>
                   
            <td>'.$row[date].'</td>
                   
            <td>'.$row[supplier_name].'</td>
           
            <td align="right">'.$row[total].'</td>
            <td align="right">'.strtoupper($row[prepared_by]).'</td>
            </tr>';
        $i++;
   
   
    $total=$total+$row[total];
   
    }
   
        echo '<tr>
            <td colspan="4" align="right" class="success"><strong>Total</strong></td>
           
            <td align="right" class="success"><strong>
             ' . number_format($total, 2) . '</strong>
            </td>
        </tr>
    </tbody></table></div>';
   
    include 'conf/closedb.php';
}

function list_purchased_items($purchase_order_no){
    include 'conf/config.php';
    include 'conf/opendb.php';
   
        echo '<div class="box-body">
            <table  style="width: 100%;" class="table-responsive table-bordered table-striped dt-responsive">
                <thead>
                    <tr>
						<th>No</th>
                        <th>Purchase Date</th>
                        <th>Items</th>
                        <th>Qty</th>
                        <th>Buying Price</th>
                        <th>Purchase Total</th>
                        <th>Prepared By</th>
                    </tr>
                </thead>
    <tbody valign="top">';

    $i=1;
    $result=mysqli_query($conn, "SELECT * FROM purchase_order_has_items WHERE cancel_status='0' AND purchase_order_no='$purchase_order_no' ORDER BY id DESC");
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
        echo '
        <tr>
			<td>'.$i.'</td>
            <td>'.$row[date].'</td>
            <td>'.$row[purchase_item].'</td>
            <td>'.$row[quantity].'</td>
            <td>'.$row[buying_price].'</td>
            <td align="right">'.$row[total].'</td>
            <td align="right">'.$row[user_name].'</td>
            </tr>';
    $i=$i+1;
    $total=$total+$row[total];
   
    }
   
        echo '<tr>
            <td colspan="5" align="right" class="success"><strong>Total</strong></td>
           
            <td align="right" class="success"><strong>
             ' . number_format ( $total, 2) . '</strong>
            </td>
           
           
        </tr>
       
           
           
    </tbody></table>
    ';
   
   
    include 'conf/closedb.php';
}

function list_purchase_item_vice($purchased_item,$from_date,$to_date){
    include 'conf/config.php';
    include 'conf/opendb.php';
    
    if($purchased_item){
        $purchased_item_check="AND purchase_item='$purchased_item'";
    }
    else{
        $purchased_item_check="";
    }
   
   
    if ($to_date && $from_date) {
        $date_check = "AND date BETWEEN '$from_date' AND '$to_date'";
    } elseif ($from_date) {
        $date_check = "AND date>='$from_date'";
        $limit = "";
    } elseif ($to_date) {
        $date_check = "AND date<='$to_date'";
        $limit = "";
    } else {
        $date_check = "";
        $limit = "LIMIT 50";
    }

   
    echo '<div class="box-body">
            <table  style="width: 100%;" class="table-responsive table-bordered table-striped dt-responsive">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Purchase No</th>
                        <th>Purchase Date</th>
                        <th>Purchased Item</th>
                        <th>Supplier</th>
                        <th>Qty</th>
                        <th>Buying Price</th>
                        <th>Total Amount</th>
                        <th>Prepared By</th>
                    </tr>
                </thead>
                <tbody>';
$i=1;

    $result=mysqli_query($conn, "SELECT * FROM purchase_order_has_items WHERE cancel_status='0' $purchased_item_check $date_check  ORDER BY id DESC");
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
        echo '
        <tr>
        <td>'.$i.'</td>
            <td><a href="reports.php?job=purchased_items&purchase_order_no='.$row[purchase_order_no].'" target="_blank" style="color:black; text-decoration:none;">'.$row[purchase_order_no].'</a></td>
                   
            <td>'.$row[date].'</td>
                   
            <td>'.$row[purchase_item].'</td>';
        $result1=mysqli_query($conn, "SELECT * FROM purchase_order WHERE cancel_status='0' AND purchase_order_no= ".$row[purchase_order_no]."  ORDER BY id DESC");
        while($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC))
        {
        echo'<td>'.$row1[supplier_name].'</td>';    
            
        }
           echo' <td>'.$row[quantity].''.$row[measure_type].'</td>
            <td align="right">'.$row[buying_price].'</td>
            <td align="right">'.$row[total].'</td>
            <td align="right">'.strtoupper($row[user_name]).'</td>
            </tr>';
        $i++;
    if ($row[measure_type]=='g'){
        $gqty=0;
        $gqty+=$row[quantity];
    }
    else{
        $qty +=$row[quantity];
    }
    $total=$total+$row[total];
   
    }
   
        echo '<tr>
            <td colspan="5" align="left" class="success"><strong>Total</strong></td>
           
            <td  class="success"><strong>
             ' .number_format($qty,0). 'kg' .number_format($gqty,0).'g</strong>
           <td></td>
            <td align="right" class="success"><strong>
             ' . number_format($total, 2) . '</strong>
            </td>
        </tr>
    </tbody></table></div>';
   
    include 'conf/closedb.php';
}

function list_suppliers(){
    include 'conf/config.php';
    include 'conf/opendb.php';
    
    $result=mysqli_query($conn, "SELECT * FROM purchase_order");
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
        echo'  <datalist id="exampleList">
                    <option value="'.$row[supplier_name].'">
                </datalist>';
        
    }
}

function list_customers(){
    include 'conf/config.php';
    include 'conf/opendb.php';
    
    $result=mysqli_query($conn, "SELECT * FROM sales");
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
        echo'  <datalist id="exampleList">
                    <option value="'.$row[customer_name].'">
                </datalist>';
        
    }
}


function list_items(){
    include 'conf/config.php';
    include 'conf/opendb.php';
    
    $result=mysqli_query($conn, "SELECT * FROM purchase_order_has_items");
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
        echo'  <datalist id="exampleList">
                    <option value="'.$row[purchase_item].'">
                </datalist>';
        
    }
}

function list_occupied_dates($from_date,$to_date){
    include 'conf/config.php';
    include 'conf/opendb.php';
    
    echo '<div class="box-body">
            <table  style="width: 100%;" class="table-responsive table-bordered table-striped dt-responsive">
                <thead>
                    <tr>
                        <th>Room No</th>
                        <th>Occupied Date</th>
                        <th>Customer</th>
                        <th>Booked By</th>                      
                    </tr>
                </thead>
                <tbody>';
    
        $result1=mysqli_query($conn, "SELECT * FROM room ORDER BY room_no ASC");
        while($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC))
        {         

        $result=mysqli_query($conn, "SELECT * FROM room_has_status WHERE status='Occupied' AND room_no='$row1[room_no]' AND date BETWEEN '$from_date' AND '$to_date' ORDER BY date ASC");
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
            echo '
            <tr>
            
            <td>'.$row[room_no].'</td>
            
            <td>'.$row[date].'</a></td>';
             $caller_info=get_caller_name_by_booking_ref($row[booking_ref]);
             $guest_info=get_guest_name_by_booking_ref($row[booking_ref]);
        
             if($caller_info['caller_name']){
              echo '<td>'.$caller_info['caller_name'].'</a></td>';  
             }
             else{
                echo '<td>'.$guest_info['guest_name'].'</a></td>';  
                
             }
                
            echo'<td>'.$row[updated_by].'</a></td>';   
        }
        $i++;
    }
    include 'conf/closedb.php';
}

function get_caller_name_by_booking_ref($booking_ref){
    include 'conf/config.php';
    include 'conf/opendb.php';
    
    $result=mysqli_query($conn, "SELECT * FROM booking_has_caller WHERE booking_ref='$booking_ref'");
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
        return $row;
    }
    
}

function get_guest_name_by_booking_ref($booking_ref){
    include 'conf/config.php';
    include 'conf/opendb.php';
    
    $result=mysqli_query($conn, "SELECT * FROM room_has_guest WHERE booking_ref='$booking_ref'");
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
        return $row;
    }
    
}

function list_occupied_rooms($date){
    include 'conf/config.php';
    include 'conf/opendb.php';
 
   
    echo '<div class="box-body">
            <table  style="width: 100%;" class="table-responsive table-bordered table-striped dt-responsive">
                <thead>
                    <tr>
                        <th>Occupied Room</th>
                        <th>Customer</th>
                        <th>Booked By</th>                      
                    </tr>
                </thead>
                <tbody>';
       

    $result=mysqli_query($conn, "SELECT * FROM room_has_status WHERE status='Occupied' AND date='$date' ORDER BY room_no ASC");
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
        echo '
        <tr>
        <td>'.$row[room_no].'</a></td>';
         $caller_info=get_caller_name_by_booking_ref($row[booking_ref]);
         $guest_info=get_guest_name_by_booking_ref($row[booking_ref]);

         if($caller_info['caller_name']){
          echo '<td>'.$caller_info['caller_name'].'</a></td>';  
         }
         else{
            echo '<td>'.$guest_info['guest_name'].'</a></td>';  
            
         }
            
        echo'<td>'.$row[updated_by].'</a></td>';   
            
   }
    include 'conf/closedb.php';
}

function list_booked_dates($from_date,$to_date){
    include 'conf/config.php';
    include 'conf/opendb.php';
  
   
    echo '<div class="box-body">
            <table  style="width: 100%;" class="table-responsive table-bordered table-striped dt-responsive">
                <thead>
                    <tr>
                        <th>Room No</th>
                        <th>Booked Date</th>
                        <th>Customer</th>
                        <th>Booked By</th>                      
                    </tr>
                </thead>
                <tbody>';
        
        $result1=mysqli_query($conn, "SELECT * FROM room ORDER BY room_no ASC");
        while($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC))
        {  
               

        $result=mysqli_query($conn, "SELECT * FROM room_has_status WHERE status='Booked' AND room_no='$row1[room_no]' AND date BETWEEN '$from_date' AND '$to_date' ORDER BY date ASC");
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
            echo '
            <tr>
            <td>'.$row[room_no].'</td>
            <td>'.$row[date].'</a></td>';
             $caller_info=get_caller_name_by_booking_ref($row[booking_ref]);
             $guest_info=get_guest_name_by_booking_ref($row[booking_ref]);
    
             if($caller_info['caller_name']){
              echo '<td>'.$caller_info['caller_name'].'</a></td>';  
             }
             else{
                echo '<td>'.$guest_info['guest_name'].'</a></td>';  
                
             }
                
            echo'<td>'.$row[updated_by].'</a></td>';   
                
        }
  
    }
    include 'conf/closedb.php';
}


function list_booked_rooms($date){
    include 'conf/config.php';
    include 'conf/opendb.php';
 
   
    echo '<div class="box-body">
            <table  style="width: 100%;" class="table-responsive table-bordered table-striped dt-responsive">
                <thead>
                    <tr>
                        <th>Booked Room</th>
                        <th>Customer</th>
                        <th>Booked By</th>                      
                    </tr>
                </thead>
                <tbody>';
       
               
$i=1;
    $result=mysqli_query($conn, "SELECT * FROM room_has_status WHERE status='Booked' AND date='$date' ORDER BY room_no ASC");
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
        echo '
        <tr>
        <td>'.$row[room_no].'</a></td>';
         $caller_info=get_caller_name_by_booking_ref($row[booking_ref]);
         $guest_info=get_guest_name_by_booking_ref($row[booking_ref]);

         if($caller_info['caller_name']){
          echo '<td>'.$caller_info['caller_name'].'</a></td>';  
         }
         else{
            echo '<td>'.$guest_info['guest_name'].'</a></td>';  
            
         }
            
        echo'<td>'.$row[updated_by].'</a></td>';   
            
   }
    include 'conf/closedb.php';
}

function list_sales_report($customer_name,$from_date,$to_date){
    include 'conf/config.php';
    include 'conf/opendb.php';
    
    if($customer_name){
        $customer_name_check="AND customer_name='$customer_name'";
    }
    else{
        $customer_name_check="";
    }
   
   
    if ($to_date && $from_date) {
        $date_check = "AND date BETWEEN '$from_date' AND '$to_date'";
    } elseif ($from_date) {
        $date_check = "AND date>='$from_date'";
        $limit = "";
    } elseif ($to_date) {
        $date_check = "AND date<='$to_date'";
        $limit = "";
    } else {
        $date_check = "";
        $limit = "LIMIT 50";
    }

   
    echo '<div class="box-body">
            <table  style="width: 100%;" class="table-responsive table-bordered table-striped dt-responsive">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Sales No</th>
                        <th>Sales Date</th>
                        <th>Customer Name</th>
                        <th>Total Amount</th>
                        <th>Prepared By</th>
                    </tr>
                </thead>
                <tbody>';
$i=1;

    $result=mysqli_query($conn, "SELECT * FROM sales WHERE cancel_status='0' $customer_name_check $date_check  ORDER BY id DESC");
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
    {
        echo '
        <tr>
        <td>'.$i.'</td>
            <td><a href="reports.php?job=sales_items&sales_no='.$row[sales_no].'" target="_blank" style="color:black; text-decoration:none;">'.$row[sales_no].'</a></td>
                   
            <td>'.$row[date].'</td>
                   
            <td>'.$row[customer_name].'</td>
           
            <td align="right">'.$row[net_total].'</td>
            <td align="right">'.strtoupper($row[prepared_by]).'</td>
            </tr>';
        $i++;
   
   
    $total=$total+$row[total];
   
    }
   
        echo '<tr>
            <td colspan="4" align="right" class="success"><strong>Total</strong></td>
           
            <td align="right" class="success"><strong>
             ' . number_format($total, 2) . '</strong>
            </td>
        </tr>
    </tbody></table></div>';
   
    include 'conf/closedb.php';
}