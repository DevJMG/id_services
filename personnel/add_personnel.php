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
$id_appdate = date("Y-m-d H:i:s");

$idp_sss = test_input(strtoupper($_POST['idp_sss']));
$idp_gsis = test_input(strtoupper($_POST['idp_gsis']));
$idp_pagibig = test_input(strtoupper($_POST['idp_pagibig']));
$idp_tin = test_input(strtoupper($_POST['idp_tin']));
$idp_philhealth = test_input(strtoupper($_POST['idp_philhealth']));

$select = mysqli_query($conn, "SELECT * FROM idp WHERE id_id='$id_id'");

if(mysqli_num_rows($select) > 0) {
  echo "Service Reference Already Exist.";
} else {
  $sql_insert = mysqli_query($conn, "INSERT INTO idp (
  id_id,
  id_type,
  id_number,
  id_position,
  id_firstname,
  id_middlename,
  id_lastname,
  id_bloodtype,
  id_sex,
  id_birthdate,
  id_address,
  id_parent,
  id_contact,
  id_appdate
  ) VALUES (
  '$id_id',
  '$id_type',
  '$id_number',
  '$id_position',
  '$id_firstname',
  '$id_middlename',
  '$id_lastname',
  '$id_bloodtype',
  '$id_sex',
  '$id_birthdate',
  '$id_address',
  '$id_parent',
  '$id_contact',
  '$id_appdate'
  )
  ");

  $sql_insert2 = mysqli_query($conn, "INSERT INTO idp_id (
  id_id,
  idp_sss,
  idp_gsis,
  idp_pagibig,
  idp_tin,
  idp_philhealth
  ) VALUES (
  '$id_id',
  '$idp_sss',
  '$idp_gsis',
  '$idp_pagibig',
  '$idp_tin',
  '$idp_philhealth'
  )
  ");
}



?>