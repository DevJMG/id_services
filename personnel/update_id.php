<?php 

include("../include/config.php");

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  return $data;
}

$id_id = test_input(strtoupper($_POST['id_id']));
$id_type = test_input(strtoupper($_POST['id_type']));
$id_number = test_input(strtoupper($_POST['id_number']));
$id_position = test_input(strtoupper($_POST['id_position']));
$id_firstname = test_input(strtoupper($_POST['id_firstname']));
$id_middlename = test_input(strtoupper($_POST['id_middlename']));
$id_lastname = test_input(strtoupper($_POST['id_lastname']));
$id_bloodtype = test_input(strtoupper($_POST['id_bloodtype']));
$id_sex = test_input(strtoupper($_POST['id_sex']));
$id_birthdate = test_input(strtoupper($_POST['id_birthdate']));
$id_address = test_input(strtoupper($_POST['id_address']));
$id_parent = test_input(strtoupper($_POST['id_parent']));
$id_contact = test_input(strtoupper($_POST['id_contact']));

$idp_sss = test_input(strtoupper($_POST['idp_sss']));
$idp_gsis = test_input(strtoupper($_POST['idp_gsis']));
$idp_pagibig = test_input(strtoupper($_POST['idp_pagibig']));
$idp_tin = test_input(strtoupper($_POST['idp_tin']));
$idp_philhealth = test_input(strtoupper($_POST['idp_philhealth']));

$sql_update1 = mysqli_query($conn, "UPDATE idp SET 
	id_type='$id_type',
	id_number='$id_number', 
	id_position='$id_position',
	id_firstname='$id_firstname',
	id_middlename='$id_middlename',
	id_lastname='$id_lastname',
	id_bloodtype='$id_bloodtype',
	id_sex='$id_sex',
	id_birthdate='$id_birthdate',
	id_address='$id_address',
	id_parent='$id_parent',
	id_contact='$id_contact'
	WHERE id_id='$id_id'
");

$sql_retrieve = mysqli_query($conn, "SELECT * FROM idp INNER JOIN idp_id on idp.id_id = idp_id.id_id WHERE idp.id_id='$id_id'");
$row = mysqli_fetch_assoc($sql_retrieve);

$sql_update2 = mysqli_query($conn, "UPDATE idp_id SET 
	idp_sss='$idp_sss',
	idp_gsis='$idp_gsis',
	idp_pagibig='$idp_pagibig',
	idp_tin='$idp_tin',
	idp_philhealth='$idp_philhealth'
	WHERE id_id='".$row['id_id']."'
");
?>