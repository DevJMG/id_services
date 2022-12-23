<?php 

include("../include/config.php");

$sl_id = $_POST['sn_id_final'];
$userx_id = $_POST['userx_id'];
$sl_status = 'Printed';
$sl_date = date("Y-m-d H:i:s");

$sql_insert = mysqli_query($conn2, "INSERT INTO service_log
	(sl_id, sl_status, sl_date, userx_id) 
	VALUES 
	('$sl_id','$sl_status','$sl_date','$userx_id')
");

echo "ID Printed Successfully!";

?>