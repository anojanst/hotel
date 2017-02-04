<?php

function print_bill_item(){
	include 'conf/config.php';
	include 'conf/opendb.php';
	
	echo'<table style="width: 65%;" class="table-responsive table-bordered table-striped dt-responsive">
		<tr>
			<th>Item</th>
			<th>Qty</th>
			<th>Amount</th>
		</tr>';
	
	$result=mysqli_query($conn, "SELECT * FROM sales_has_items WHERE sales_no='$sales_no' AND cancel_status='0' ORDER BY id ASC");
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
		$result1=mysqli_query($conn, "SELECT * FROM sales WHERE sales_no='$sales_no'");
		while($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC))
		{
			$discount = $row1['discount'];
			$discount_type=$row1['discount_type'];
			if($row1['discount_type']=="%"){
				$discount_amount = $row1['total']-($row1['total']*($row1['discount']/100)) ;
				$dis=$row1['total']*($row1['discount']/100);
			}
			else{
				$discount_amount = $row1['total']-$row1['discount'];
				$dis=$row1['discount'];
			}
			
		}	
		$total=($row[quantity]*$row[price]);
		echo'<tr>
		<td>'.$row[meal_name].'</td>
		<td>'.$row[quantity].' * '.$row[price].'</td>
		<td align="right">'.number_format($total,2).'</td>
		</tr>';
		$grand_total+=$total;			
	}
	echo'<tr  style="line-height: 30px;">
            <td></td>
            <td>Total</td>
            <td align="right">'.number_format($grand_total,2).'</td>
        </tr>
		<tr  style="line-height: 30px;">
            <td></td>
            <td>Discount('.$discount.''.$discount_type.')</td>
            <td align="right">('.number_format($dis,2).')</td>
        </tr>
		<tr  style="line-height: 30px;">
            <td></td>
            <td>Amount after Discount</td>
            <td align="right">'.number_format($discount_amount,2).'</td>
        </tr>';
		$result2=mysqli_query($conn, "SELECT * FROM tax WHERE percentage!='0'");
		while($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC))
		{
			$tax_total = $discount_amount*($row2[percentage]/100);
			
			echo'<tr  style="line-height: 30px;">
					<td></td>
					<td>'.$row2[tax_type].'('.$row2[percentage].'%)</td>
					<td align="right">'.number_format($tax_total,2).'</td>
				</tr>';
			$full_total += $tax_total;
			$net_total = $full_total + $discount_amount;
		}
		echo'<tr  style="line-height: 30px;">
            <td></td>
            <td>Net Amount</td>
            <td align="right">'.number_format($net_total,2).'</td>
        </tr>';

			
			$query = "UPDATE sales SET
			amount_after_discount = '$discount_amount',
			net_total ='$net_total'
			WHERE sales_no='$sales_no'";
			mysqli_query($conn, $query);
			

	echo'</table>';
	include 'conf/closedb.php';


}
