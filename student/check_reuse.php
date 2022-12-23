<?php 

include("../include/config.php");

$id_id = strtoupper($_POST['id_id']);

$sql = mysqli_query($conn, "SELECT * FROM idp_img WHERE idm_sn='$id_id'");

$sql1 = mysqli_query($conn, "SELECT * FROM idp_sig WHERE ids_sn='$id_id'");

if(mysqli_num_rows($sql) > 0 && mysqli_num_rows($sql1) > 0) {
	echo "Data Exist";
}
?>