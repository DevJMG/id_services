<?php 
if($_FILES["file"]["name"] != ''){
	$test = $_FILES["file"]["name"];
	$location = '../asset/profile-img/student/'.$test;
	$target = 'asset/profile-img/student/'.$test;
	move_uploaded_file($_FILES["file"]["tmp_name"], $location);
	echo $target;
}
?>