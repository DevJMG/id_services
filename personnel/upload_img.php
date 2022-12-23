<?php 
if($_FILES["file"]["name"] != ''){
	$test = $_FILES["file"]["name"];
	$location = '../asset/profile-img/'.$test;
	$target = 'asset/profile-img/'.$test;
	move_uploaded_file($_FILES["file"]["tmp_name"], $location);
	echo $target;
}
?>