<?php 

require 'inc/db.php';
if(isset($_GET['redeem']))
{
	if(isset($_GET['username']))
	{
		$code = $_GET['redeem'];
		$username = $_GET['username'];
		
		$stmt = $con->prepare('SELECT * FROM vouchers WHERE voucher_code = ?');
		$stmt->bind_param('s', $code);
		$stmt->execute();
		$meta = $stmt->result_metadata();
		while ($field = $meta->fetch_field()) {
			$parameters[] = &$row[$field->name];
		}
		call_user_func_array(array($stmt, 'bind_result'), $parameters);
		while ($stmt->fetch()) {
			foreach($row as $key => $val) {
				$x[$key] = $val;
			}
			$results[] = $x;
		}
		
		$check = $row['username'];
		
		if(empty($check))
		{
			$duration = $row['duration'];
		
			$sql = "UPDATE `vouchers` SET username = '".$username."' WHERE voucher_code = '".$code."'";
			
			
			$expirydate = date("d/m/Y", strtotime(" +".$duration." months"));

			$sql2 = "UPDATE `customers` SET expiry = '".$expirydate."', status = 3 WHERE username = '".$username."'";
			if(mysqli_query($con, $sql))
			{
				if(mysqli_query($con, $sql2))
				{
					echo 'true';
				}
			}	
		}
		else {
			
			echo 'false';
		}
	}
}
?>