<?php 

include("../include/config.php");

$sl_id = $_POST['sn_id_final'];
$sl_status = 'Printed';
$sl_date = date("Y-m-d H:i:s");

// $sql_select = mysqli_query($conn2, "SELECT * FROM service_log WHERE sl_id = '$sl_id' AND sl_status = '$sl_status'");

// if(mysqli_num_rows($sql_select) > 0) {
// 	echo "ID Already Printed.";
// } else {
	$sql_insert = mysqli_query($conn2, "INSERT INTO service_log
		(sl_id, sl_status, sl_date) 
		VALUES 
		('$sl_id','$sl_status','$sl_date')
	");

	echo "ID Printed Successfully!";
// }

?>