<?php 
include("../include/config.php");

session_start();

$userx_id = "";

if(!(isset(
    $_SESSION['userx_id']) && 
    $_SESSION['userx_id'] != '')) {
    header("location: ../index.php");
} else {
    $userx_id = $_SESSION['userx_id'];
}

$SN = $_GET['SN'];

$sql1 = mysqli_query($conn, "SELECT * FROM idp INNER JOIN idp_id on idp.id_id = idp_id.id_id WHERE idp.id_id='$SN'");
$row1 = mysqli_fetch_assoc($sql1);

$sql2 = mysqli_query($conn, "SELECT max(idm_id) as max_img FROM idp_img WHERE idm_sn='$SN'");
$row2 = mysqli_fetch_assoc($sql2);
$sql21 = mysqli_query($conn, "SELECT idm_img FROM idp_img WHERE idm_id='".$row2['max_img']."'");
$row21 = mysqli_fetch_assoc($sql21);

$sql3 = mysqli_query($conn, "SELECT max(ids_id) as max_sig FROM idp_sig WHERE ids_sn='$SN'");
$row3 = mysqli_fetch_assoc($sql3);
$sql31 = mysqli_query($conn, "SELECT ids_sig FROM idp_sig WHERE ids_id='".$row3['max_sig']."'");
$row31 = mysqli_fetch_assoc($sql31);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Print ID - <?php echo $SN; ?></title>
    <?php include("../include/style.php"); ?>
</head>
<body id="print_body" onload="window.print()">

<div id="msg_alert" class="alert alert-dismissible">
  <span id="msg"></span>
</div>

<button id="btn_printed" class="btn btn-primary btn-lg">
	<i class="fa fa-refresh"></i><strong> Tag as Printed</strong>
</button>

<input type="hidden" id="sn_id_final" value="<?php echo $SN; ?>">
<input type="hidden" name="userx_id" id="userx_id" value="<?php echo $userx_id; ?>">

<div id="id_cover"></div>

<div id="page_one">

	<div id="profile_picture" style="background-image: url('../<?php echo $row21["idm_img"]; ?>');"></div>

	<div id="signature_img" style="background-image: url('../<?php echo $row31["ids_sig"]; ?>');"></div>

	<div id="_container">
		<?php if(strlen($row1['id_firstname']) <= 12){ ?>
			<div id="fname_text"><?php echo $row1['id_firstname']; ?></div>
		<?php } elseif(strlen($row1['id_firstname']) <= 13) { ?>
			<div id="fname_text1"><?php echo $row1['id_firstname']; ?></div>
		<?php } elseif(strlen($row1['id_firstname']) <=14) { ?>
			<div id="fname_text2"><?php echo $row1['id_firstname']; ?></div>
		<?php } elseif(strlen($row1['id_firstname']) <=15) { ?>
			<div id="fname_text3"><?php echo $row1['id_firstname']; ?></div>
		<?php } elseif(strlen($row1['id_firstname']) <= 16) { ?>
			<div id="fname_text4"><?php echo $row1['id_firstname']; ?></div>
		<?php } ?>

		<div id="mlname_text"><?php echo $row1['id_middlename']." ".$row1['id_lastname']; ?></div>

		<div id="bottom_con">
			<span id="position_text"><?php echo $row1['id_position'] ?></span>
			<span id="id_number_text"><?php echo $row1['id_number'] ?></span>
		</div>

		<div id="dob_con">
			<?php echo date("F j, Y", strtotime($row1['id_birthdate'])); ?>
		</div>

		<div id="address_con">
			<?php if(strlen($row1['id_address']) <= 32){ ?>
			<div id="address_text"><?php echo $row1['id_address']; ?></div>
			<?php } elseif(strlen($row1['id_address']) >= 33 && strlen($row1['id_address']) <= 36) { ?>
			<div id="address_text1"><?php echo $row1['id_address']; ?></div>
		<?php } elseif(strlen($row1['id_address']) > 36) { ?>
			<div id="address_text2"><?php echo $row1['id_address']; ?></div>
			<?php } ?>
		</div>
	</div>

	<img class="id_personnel_front" src="../asset/template/id_personnel_front1.jpg">
</div>

<div id="page_two">
	<div id="bt_sex_con">
		 <div id="bloodtype_text"><?php echo $row1['id_bloodtype']; ?></div>
		 <div id="sex_text"><?php echo $row1['id_sex']; ?></div>

		 <div id="id_con1">
		 	 <div id="tin_text"><?php echo $row1['idp_tin']; ?></div>
			 <div id="philhealth_text"><?php echo $row1['idp_philhealth']; ?></div>
			 <div id="gsis_text"><?php echo $row1['idp_gsis']; ?></div>
		 </div>
		 <div id="id_con2">
		 	 <div id="pagibig_text"><?php echo $row1['idp_pagibig']; ?></div>
			 <div id="sss_text"><?php echo $row1['idp_sss']; ?></div>
		 </div>
	</div>

	<div id="contact_con">
		<div id="parent_text"><?php echo $row1['id_parent']; ?></div>
		<div id="contact_text"><?php echo $row1['id_contact']; ?></div>

		<div id="sn_text"><?php echo $row1['id_type']." ".$row1['id_id']; ?></div>
	</div>

	<img class="id_personnel_back" src="../asset/template/id_personnel_back.jpg">
</div>

<?php include("../include/script.php"); ?>
<script type="text/javascript">
	$("#btn_printed").click(function(){
            var sn_id_final = $('#sn_id_final').val();
            $.ajax({
                url : "printed.php",
                method : "POST",
                data : {
                    sn_id_final:sn_id_final
                },
                success: function(data){
                        if(data == 'ID Printed Successfully!'){
                            $(location).attr('href','print_preview.php?SN='+sn_id_final);
                        } else {
                            $("#msg_alert").show();
                            $("#msg_alert").removeClass("bg-success");
                            $("#msg_alert").addClass("bg-danger");
                            $("#msg").text(data);
                            $("#msg_alert").delay(2000).fadeOut();
                        }
                    }
                });
        });

	$("#btn_released").click(function(){
            var sn_id_final = $('#sn_id_final').val();
            var userx_id = $('#userx_id').val();
            $.ajax({
                url : "released.php",
                method : "POST",
                data : {
                    sn_id_final:sn_id_final,
                    userx_id:userx_id
                },
                success: function(data){
                        if(data == 'ID Released Successfully!'){
                            $(location).attr('href','print_preview.php?SN='+sn_id_final);
                        } else {
                            $("#msg_alert").show();
                            $("#msg_alert").removeClass("bg-success");
                            $("#msg_alert").addClass("bg-danger");
                            $("#msg").text(data);
                            $("#msg_alert").delay(2000).fadeOut();
                        }
                    }
                });
        });
</script>
</body>
</html>