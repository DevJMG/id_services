<?php 

include("../include/config.php");

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if(isset($_POST['action'])){
	$output = "";
	if($_POST['action'] == 'signin'){
		$userx_username = test_input($_POST['userx_username']);
		$userx_password = test_input($_POST['userx_password']);

		$sql = mysqli_query($conn2, 
			"SELECT * FROM userx WHERE 
				userx_username = '$userx_username' 
				AND 
				userx_password = '$userx_password'
				");

		if(mysqli_num_rows($sql) > 0){
		  	while($result = mysqli_fetch_assoc($sql)){
					$userx_id = $result['userx_id']; 
			    $userx_username = $result['userx_username'];
			    
			    session_start();
			    $_SESSION['userx_id'] = $userx_id;
			    $_SESSION['userx_username'] = $userx_username;

		  	}
		  	echo $output = 'admin';
	  	}else{
	  		echo $output = "User doesn't exist.";
	  	}

	}
}

?>