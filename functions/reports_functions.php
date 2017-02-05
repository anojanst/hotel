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
    
