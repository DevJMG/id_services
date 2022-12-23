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

$sql1 = mysqli_query($conn2, "SELECT * FROM id WHERE id_id='$SN'");
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
	<i class="fa fa-print"></i><strong> Tag as Printed</strong>
</button>

<input type="hidden" id="sn_id_final" value="<?php echo $SN; ?>">
<input type="hidden" name="userx_id" id="userx_id" value="<?php echo $userx_id; ?>">

<div id="id_cover"></div>

<div id="page_one" class="page_one_flip1">
	<div id="page_fixed" style="background-image: url('../asset/template/student_front_10_54x86_final.jpg')">
		<div id="content_fixed">
			<div id="profile_picture_s" style="background-image: url('../<?php echo $row21["idm_img"]; ?>');"></div>

			<div id="signature_img_s" style="background-image: url('../<?php echo $row31["ids_sig"]; ?>');"></div>

			<div id="top_side">
				<div id="campus_s">
					<?php 
					if($row1['id_campus'] == 'SAL') {
						echo "SALVADOR (MAIN) CAMPUS";
					} elseif($row1['id_campus'] == 'MOS') {
						echo "MOSQUEDA CAMPUS";
					} elseif($row1['id_campus'] == 'BAT') {
						echo "BATERNA CAMPUS";
					} 
					?>
				</div>
			</div>
			<div id="id_s">
				<?php echo $row1['id_number']; ?>
			</div>
			<div id="course_s">
				<?php 
				if(strlen($row1['id_course']) <= 5) {
					echo "<div id='course_1'>".$row1['id_course']."</div>";
				} elseif(strlen($row1['id_course']) > 5) {
					echo "<div id='course_2'>".$row1['id_course']."</div>";
				}
				?>
			</div>

			<div id="college_name">
				<div id="college_s">
					<?php 
					if($row1['id_college'] == 'CAGS') {
						echo "College of Agricultural Sciences";
					} elseif($row1['id_college'] == 'CAS') {
						echo "College of Arts and Sciences";
					} elseif($row1['id_college'] == 'CBM') {
						echo "College of Business Management";
					} elseif($row1['id_college'] == 'CCJE') {
						echo "College of Criminal Justice Education";
					} elseif($row1['id_college'] == 'CEIT') {
						echo "College of Engineering and Industrial Technology";
					} elseif($row1['id_college'] == 'CST') {
						echo "College of Science and Technology";
					} elseif($row1['id_college'] == 'CTE') {
						echo "College of Teacher Education";
					}
					?>
				</div>
				<div id="lastname_con">
					<span id="lastname_s">
						<?php echo $row1['id_lastname']; ?>
					</span>
					<div id="first_middle">
						<?php echo $row1['id_firstname']." ";
						if($row1['id_middlename'] == '' || $row1['id_middlename'] == '-') {
							echo "";
						} else {
							echo substr($row1['id_middlename'], 0,1).".";
						}
						?>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>

<div id="page_two" class="page_two_flip2">
	<div id="page_fixed" style="background-image: url('../asset/template/student_back_2.jpg')">
		<div id="content_fixed2">
			<div id="contact_s">
				<div id="parent_s">
					<?php echo $row1['id_parent']; ?>
				</div>
				<div id="contact_num_s">
					<?php echo $row1['id_contact'] ?>
				</div>
				<div id="address_s">
					<?php echo $row1['id_address'] ?>
				</div>
			</div>

			<div id="bd_s">
				<?php echo strtoupper((date("F j, Y", strtotime($row1['id_birthdate'])))); ?>
			</div>

			<div id="sex_s">
				<?php echo $row1['id_sex'] ?>
			</div>

			<div id="bloodtype_s">
				<?php echo $row1['id_bloodtype'] ?>
			</div>

			<div id="sn_s">
				<?php echo "<b>".$row1['id_type']."</b> ".$row1['id_id']; ?>
			</div>
		</div>
	</div>
</div>

<?php include("../include/script.php"); ?>
<script type="text/javascript">
	$(document).ready(function () {		

		$("#btn_printed").click(function(){
            var sn_id_final = $('#sn_id_final').val();
            var userx_id = $('#userx_id').val();
            $.ajax({
                url : "printed.php",
                method : "POST",
                data : {
                    sn_id_final:sn_id_final,
                    userx_id:userx_id
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

	});
</script>
</body>
</html>