<?php 
include("../include/config.php");

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

<div id="id_cover"></div>

<div id="page_one">

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
				<?php echo $row1['id_firstname']." ".substr($row1['id_middlename'], 0,1)."."; ?>
			</div>
		</div>
	</div>

	<!-- <div id="_container">
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
	</div> -->

	<img class="id_personnel_front" src="../asset/template/student_front_1.jpg">
</div>

<div id="page_two" class="page_two_flip">

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

	<img class="id_personnel_back" src="../asset/template/student_back_1.jpg">
</div>

<?php include("../include/script.php"); ?>
<script type="text/javascript">
	$(document).ready(function () {
		$("#course_s").fitText(0.38);
	});
</script>
</body>
</html>