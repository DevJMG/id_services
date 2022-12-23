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
$id_campus = test_input(strtoupper($_POST['id_campus']));
$id_college = test_input(strtoupper($_POST['id_college']));
$id_course = test_input(strtoupper($_POST['id_course']));
$id_firstname = test_input(strtoupper($_POST['id_firstname']));
$id_middlename = test_input(strtoupper($_POST['id_middlename']));
$id_lastname = test_input(strtoupper($_POST['id_lastname']));
$id_bloodtype = test_input(strtoupper($_POST['id_bloodtype']));
$id_sex = test_input(strtoupper($_POST['id_sex']));
$id_birthdate = test_input(strtoupper($_POST['id_birthdate']));
$id_address = test_input(strtoupper($_POST['id_address']));
$id_parent = test_input(strtoupper($_POST['id_parent']));
$id_contact = test_input(strtoupper($_POST['id_contact']));

$sql_update1 = mysqli_query($conn2, "UPDATE id SET 
	id_type='$id_type',
	id_number='$id_number', 
	id_campus='$id_campus',
	id_college='$id_college',
	id_course='$id_course',
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
?>