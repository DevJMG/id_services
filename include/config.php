<?php 
date_default_timezone_set("Asia/Manila");

$db_host = "127.0.0.1";
$db_username = "root";
$db_password = "";
$db_name = "id_services";

$conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

$db_password1 = "cst@gsc";
$db_name1 = "icto";

$conn2 = mysqli_connect($db_host, $db_username, $db_password1, $db_name1);

?>