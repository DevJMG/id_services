<?php 

include("../include/config.php");

$id_id = $_POST['id_id'];
$profile_img = $_POST['profile_img'];
$signature = $_POST['signature'];
$idh_reg_date = date("Y-m-d H:i:s");


if($profile_img != '' && $signature == '') {
	$sql_insert1 = mysqli_query($conn, "INSERT INTO idp_img
		(idm_sn, idm_img, idm_date) VALUES 
		('$id_id','$profile_img', '$idh_reg_date')
	");

	$sql_1 = mysqli_query($conn, "SELECT ids_sn FROM idp_sig");
	if(mysqli_num_rows($sql_1) > 0) {
		echo "ID Information Recorded, Ready for Printing.";
	} else {
		echo "Capture signature first.";
	}

} elseif($profile_img == '' && $signature != '') {
	$image_parts = explode(";base64,", $signature);
	$image_type_aux = explode("image/", $image_parts[0]);

	$image_type = $image_type_aux[1];
	$image_base64 = base64_decode($image_parts[1]);
	$file = 'asset/signature/student/' . uniqid() . '.' . $image_type;
	$folderPath = '../'.$file;

	file_put_contents($folderPath, $image_base64);

	$sql_insert2 = mysqli_query($conn, "INSERT INTO idp_sig
		(ids_sn, ids_sig, ids_date) VALUES 
		('$id_id', '$file', '$idh_reg_date')
	");

	$sql_2 = mysqli_query($conn, "SELECT idm_img FROM idp_img");
	if(mysqli_num_rows($sql_2) > 0) {
		echo "ID Information Recorded, Ready for Printing.";
	} else {
		echo "Capture image first.";
	}

} elseif ($profile_img != '' && $signature != '') {
	$image_parts = explode(";base64,", $signature);
	$image_type_aux = explode("image/", $image_parts[0]);

	$image_type = $image_type_aux[1];
	$image_base64 = base64_decode($image_parts[1]);
	$file = 'asset/signature/student/' . uniqid() . '.' . $image_type;
	$folderPath = '../'.$file;

	file_put_contents($folderPath, $image_base64);

	$sql_insert3 = mysqli_query($conn, "INSERT INTO idp_img
		(idm_sn, idm_img, idm_date) VALUES 
		('$id_id','$profile_img', '$idh_reg_date')
	");

	$sql_insert4 = mysqli_query($conn, "INSERT INTO idp_sig
		(ids_sn, ids_sig, ids_date) VALUES 
		('$id_id', '$file', '$idh_reg_date')
	");

	$sql4= "INSERT INTO `service_log`(`sl_id`, `userx_id`, `sl_action`, `sl_status`) VALUES ('$id','','','Printed')";
	$clients4 = $conn2->query($sql4) or die($conn2->connect_error);

	echo "ID Information Recorded, Ready for Printing.";
}
?>