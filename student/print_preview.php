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

$sql = mysqli_query($conn2, "SELECT * FROM id WHERE id_id='$SN'");

$row = mysqli_fetch_assoc($sql);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Print ID - <?php echo $SN; ?></title>
	<?php include("../include/style.php"); ?>
</head>
<body>

<section class="container">
	<div class="row sign_out pt-3 pr-3">
        <span style="cursor: pointer;" onclick="window.location.href='../include/signout.php'"><?php 

        $sql5 = mysqli_query($conn2, "SELECT * FROM userx WHERE userx_id='$userx_id'");
        $row5 = mysqli_fetch_assoc($sql5);
        echo strtoupper($row5['userx_username']);
        ?> <i class="fa fa-times"></i></span>
    </div>
	<div class="row py-5">
		<div class="form-group pb-4 back_con">
            <button id="btn_add" class="btn btn-md btn-secondary" onclick="window.location.href='student_list.php'"><i class="fa fa-arrow-left"></i> Back</button>
        </div>

		<h2 class="pb-4"><strong id="title_capture">Preview ID Information of <span class="series_no"><?php echo $SN; ?></span></strong></h2>

		<div id="msg_alert" class="alert alert-dismissible">
	      <span id="msg"></span>
	    </div>

		<div class="col-lg-9 px-4">
			<div class="row input_group">
				<h3 class="pb-2"><strong>Personal Information</strong></h3>
				<input type="hidden" name="id_id" id="id_id" value="<?php echo $row['id_id']; ?>">
				<input type="hidden" name="userx_id" id="userx_id" value="<?php echo $userx_id; ?>">
				<div class="col-lg-4 form-group pb-3">
					<label class="pb-1">
						<strong>Application Type</strong>
					</label>
					<select class="form-control text_uppercase" name="id_type" id="id_type">
						<option class="apptype" value="<?php echo $row['id_type'] ?>">Current ( <?php echo $row['id_type']; ?> )</option>
						<option value="new">New</option>
						<option value="lost">Lost</option>
						<option value="replacement">Replacement</option>
					</select>
				</div>

				<div class="col-lg-4 form-group pb-3">
					<label class="pb-1">
						<strong>ID Number</strong>
					</label>
					<input type="text" class="form-control text_uppercase" name="id_number" id="id_number" placeholder="e.g. GSC-15-1234" value="<?php echo $row['id_number']; ?>">
				</div>

				<div class="col-lg-4 form-group pb-3">
					<label class="pb-1">
						<strong>Campus</strong>
					</label>
					<select class="form-control text_uppercase" name="id_campus" id="id_campus">
						<option class="apptype" value="<?php echo $row['id_campus']; ?>">Current ( <?php echo $row['id_campus']; ?> )</option>
						<option value="Sal">Salvador Campus</option>
						<option value="Mos">Mosqueda Campus</option>
						<option value="Bat">Baterna Campus</option>
					</select>
				</div>

				<div class="col-lg-6 form-group pb-3">
					<label class="pb-1">
						<strong>College</strong>
					</label>
					<select class="form-control text_uppercase" name="id_college" id="id_college">
						<option class="apptype" value="<?php echo $row['id_college']; ?>">Current ( <?php echo $row['id_college']; ?> )</option>
						<option value="CAGS">(CAGS) College of Agricultural Sciences</option>
						<option value="CAS">(CAS) College of Arts and Sciences</option>
						<option value="CBM">(CBM) College of Business Management</option>
						<option value="CCJE">(CCJE) College of Criminal Justice Education</option>
						<option value="CEIT">(CEIT) College of Engineering and Industrial Technology</option>
						<option value="CST">(CST) College of Science and Technology</option>
						<option value="CTE">(CTE) College of Teacher Education</option>
						<option value="GS">(GS) Graduate School</option>
					</select>
				</div>

				<div class="col-lg-6 form-group pb-3">
					<label class="pb-1">
						<strong>Course</strong>
					</label>
					<select class="form-control text_uppercase" name="id_course" id="id_course">
						<option class="apptype" value="<?php echo $row['id_course']; ?>">Current ( <?php echo $row['id_course']; ?> )</option>
						<optgroup label="Agricultural Sciences">
						    <option value="BSA">(BSA) BS in Agriculture</option>
						    <option value="BSF">(BSF) BS in Fisheries</option>
						</optgroup>

						<optgroup label="Arts and Sciences">
						    <option value="BAEL">(BAEL) Bachelor of Arts in English Language</option>
						    <option value="BPA">(BPA) Bachelor of Public Administration</option>
						</optgroup>

						<optgroup label="Business and Management">
						    <option value="BSBA-MM">(BSBA-MM) BS in Business Administration major in Marketing Management</option>
						    <option value="BSBA-FM">(BSBA-FM) BS in Business Administration major in Financial Management</option>
						    <option value="BSBA-HRM">(BSBA-HRM) BS in Business Administration major in Human Resource Management</option>
						    <option value="BSHM">(BSHM) BS in Hospitality Management</option>
						    <option value="BSREM">(BSREM) BS in Real Estate Management</option>
						    <option value="BSE">(BSE) BS in Entrepreneurship</option>
						    <option value="BSTM">(BSTM) BS in Tourism Management</option>
						</optgroup>

						<optgroup label="Criminal Justice Education">
						    <option value="BSCRIM">(BSCRIM) BS in Criminology</option>
						</optgroup>

						<optgroup label="Engineering and Industrial Technology">
						    <option value="BSEE">(BSEE) BS in Electrical Engineering</option>
						    <option value="BSME">(BSME) BS in Mechanical Engineering</option>
						    <option value="BIT-AT">(BIT-AT) Bachelor Industrial Technology major in Automative Technology</option>
						    <option value="BIT-ELT">(BIT-ELT) Bachelor Industrial Technology major in Electrical Technology</option>
						    <option value="BIT-EXT">(BIT-EXT) Bachelor Industrial Technology major in Electronics Technology</option>
						    <option value="BIT-MT">(BIT-MT) Bachelor Industrial Technology major in Mechanical Technology</option>
						</optgroup>

						<optgroup label="Science and Technology">
						    <option value="BSIT">(BSIT) BS in Information Technology major in Web and Mobile Applications Development</option>
						    <option value="BSCS">(BSCS) BS in Computer Science</option>
						    <option value="BSIS">(BSIS) BS in Information Systems</option>
						    <option value="BSFT">(BSFT) BS in Food Technology</option>
						</optgroup>
						
						<optgroup label="Teacher Education">
						    <option value="BSED-ENG">(BSED-ENG) Bachelor of Secondary Education major in English</option>
						    <option value="BSED-MTH">(BSED-MTH) Bachelor of Secondary Education major in Mathematics</option>
						    <option value="BSED-FIL">(BSED-FIL) Bachelor of Secondary Education major in Filipino</option> 
						    <option value="BSED-SCI">(BSED-SCI) Bachelor of Secondary Education major in Science</option>
						    <option value="BSED-SOCSCI">(BSED-SOCSCI) Bachelor of Secondary Education major in Social Science</option>
						    <option value="BEED-GE">(BEED-GE) Bachelor of Elementary Education major in General Education</option>
						    <option value="BTLED-HE">(BTLED-HE) Bachelor of Teachnology and Livelihood Education major in Home Economics and Livelihood Education</option>
						</optgroup>

						<optgroup label="Post Baccalaureate Program">
						  	<option value="DIT">(DIT) Diploma in Teaching</option>
						</optgroup>

						<optgroup label="Master Programs">
						  	<option value="MPA">(MPA) Master in Public Administration</option>
						    <option value="MED-EM">(MED-EM) Master of Education Major in Educational Management</option>
							<option value="MED-ENG">(MED-ENG) Master of Education Major in English</option>
							<option value="MED-GENSCI">(MED-GENSCI) Master of Education Major in General Science</option>
							<option value="MED-SOCSCI">(MED-SOCSCI) Master of Education Major in Social Science</option>
							<option value="MED-TLE">(MED-TLE) Master of Education Major in Technology and Livelihood Education</option>
							<option value="MED-FIL">(MED-FIL) Master of Education Major in Filipino</option>
						    <option value="MATM">(MATM) Master of Arts in Teaching Mathematics</option>
						    <option value="MBA">(MBA) Master in Business Administration</option>
						</optgroup>

						<optgroup label="Doctorate Programs">
						    <option value="PhD-EM">(PhD-EM) Doctor of Philosophy in Educational Management</option>
						    <option value="DM-BA"> (DM-BA) Doctor of Management major in Business Admnistration</option>
 						    <option value="DM-HRM"> (DM-HRM) Doctor of Management major in Human Resource Management</option>
						    <option value="EDD"> (EDD) Doctor of Education in Curriculum and Instruction</option>
						</optgroup>

					</select>
				</div>

				<div class="col-lg-3 form-group pb-3">
					<label class="pb-1">
						<strong>First Name</strong>
					</label>
					<input type="text" class="form-control text_uppercase" name="id_firstname" id="id_firstname" placeholder="e.g. Garcia" value="<?php echo $row['id_firstname']; ?>">
				</div>

				<div class="col-lg-3 form-group pb-3">
					<label class="pb-1">
						<strong>Middle Name</strong>
					</label>
					<input type="text" class="form-control text_uppercase" name="id_middlename" id="id_middlename" placeholder="e.g. Garcia" value="<?php echo $row['id_middlename']; ?>">
				</div>

				<div class="col-lg-3 form-group pb-3">
					<label class="pb-1">
						<strong>Last Name</strong>
					</label>
					<input type="text" class="form-control text_uppercase" name="id_lastname" id="id_lastname" placeholder="e.g. Cruz" value="<?php echo $row['id_lastname']; ?>">
				</div>

				<div class="col-lg-3 form-group pb-3">
					<label class="pb-1">
						<strong>Blood Type</strong>
					</label>
					<select class="form-control text_uppercase" name="id_bloodtype" id="id_bloodtype">
						<option class="apptype" value="<?php echo $row['id_bloodtype']; ?>">Current ( <?php echo $row['id_bloodtype']; ?> )</option>
						<option value="a+">A+</option>
						<option value="a-">A-</option>
						<option value="b+">B+</option>
						<option value="b-">B-</option>
						<option value="ab+">AB+</option>
						<option value="ab-">AB-</option>
						<option value="o+">O+</option>
						<option value="o-">O-</option>
					</select>
				</div>

				<div class="col-lg-3 form-group pb-3">
					<label class="pb-1">
						<strong>Sex</strong>
					</label>
					<select class="form-control text_uppercase" name="id_sex" id="id_sex">
						<?php if($row['id_sex'] != ''){ ?>
						<option class="apptype" value="<?php echo $row['id_sex'] ?>">Current ( <?php echo $row['id_sex']; ?> )</option>
						<?php } else {} ?>
						<option value="male">Male</option>
						<option value="female">Female</option>
					</select>
				</div>

				<div class="col-lg-3 form-group pb-3">
					<label class="pb-1">
						<strong>Date of Birth</strong> 
					</label>
					<input type="date" class="form-control text_uppercase" name="id_birthdate" id="id_birthdate" placeholder="e.g. New Poblacion, Buenavista, Guimaras" value="<?php echo $row['id_birthdate']; ?>">
				</div>

				<div class="col-lg-6 form-group pb-3">
					<label class="pb-1">
						<strong>Address</strong> 
						<small>(Barangay/Street, Municipality/City, Province)</small>
					</label>
					<input type="text" class="form-control text_uppercase" name="id_address" id="id_address" placeholder="e.g. New Poblacion, Buenavista, Guimaras" value="<?php echo $row['id_address'] ?>">
				</div>
			</div>

			<br>

			<div class="row input_group">
				<h3 class="pb-2"><strong>Contact Information</strong></h3>

				<div class="col-lg-6 form-group pb-3">
					<label class="pb-1">
						<strong>Parent/ Guardian</strong>
					</label>
					<input type="text" class="form-control text_uppercase" name="id_parent" id="id_parent" placeholder="e.g. Maria Garcia Cruz" value="<?php echo $row['id_parent'] ?>">
				</div>

				<div class="col-lg-6 form-group pb-3">
					<label class="pb-1">
						<strong>Contact Number</strong>
					</label>
					<input type="text" class="form-control text_uppercase" name="id_contact" id="id_contact" placeholder="e.g. 09651234567" value="<?php echo $row['id_contact'] ?>">
				</div>
			</div>

			<br>
		</div>

		<div class="col-lg-3 px-4 mb-4">
			<div class="row input_group">
				<h3 class="pb-2 text-center"><strong>ID History</strong></h3>

				<div class="form-group">
					<table class="table table-condensed table-striped">
						<thead>
							<tr>
								<th width="15%" class="text-center">#</th>
								<th width="85%" class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>
						<?php 
						$sql = mysqli_query($conn2, "SELECT count(sl_key) as count_sl FROM service_log WHERE
							 (sl_id = '$SN' AND sl_status = 'Released') OR 
							 (sl_id = '$SN' AND sl_status = 'Printed')
							");
						$res = mysqli_fetch_assoc($sql);

						$count = $res['count_sl'];

						$sql1 = mysqli_query($conn2, "SELECT * FROM service_log WHERE 
							(sl_id = '$SN' AND sl_status = 'Released') OR 
						 	(sl_id = '$SN' AND sl_status = 'Printed') 
							ORDER BY sl_date DESC LIMIT 5");
						
						while($row = mysqli_fetch_assoc($sql1)) {
						?>
							<tr>
								<td style="font-size: 15px;" class="text-center"><strong><?php echo $count; ?></strong></td>
								<td style="font-size: 15px;" class="text-left">
									<h6 style="margin-bottom: -3px;"><strong><?php echo $row['sl_status']; ?></strong></h6>
									<p style="margin-bottom: -5px; font-size: 10px; text-transform: capitalize; font-weight: 700;"><i>by <?php 

									$userx_id_new = '';
									if($row['userx_id'] == '') {
										$userx_id_new = 1;
									} else {
										$userx_id_new = $row['userx_id'];
									}

									$sql2 = mysqli_query($conn2, "SELECT * FROM userx WHERE userx_id='$userx_id_new'");
									$res1 = mysqli_fetch_assoc($sql2);

									echo $res1['userx_name'];
									 ?></i></p>
									<label><?php echo date("M j, Y h:i A", strtotime($row['sl_date'])); ?></label>
								</td>
							</tr>
						<?php 
							$count--;
						} ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div class="col-lg-12" id="preview_btn_con">
			<div  id="preview_btn_wrap">
				<button id="id_edit" class="btn btn-lg btn-primary btn_mr"><i class="fa fa-edit"></i> Edit</button>
				<button id="id_cancel" class="btn btn-lg btn-secondary btn_mr"><i class="fa fa-times"></i> Cancel</button>
				<button id="id_save" class="btn btn-lg btn-success"><i class="fa fa-save"></i> Save</button>
				<button id="id_capture" class="btn btn-lg btn-success"><i class="fa fa-photo"></i> Capture</button>
			</div>
			<div id="preview_btn_wrap1">
				<div><strong>Note:</strong> Click this button if the <strong>ID Card</strong> is already <strong>RELEASED</strong>.</div>
				<button id="btn_released" class="btn btn-lg btn-danger">
				<i class="fa fa-check"></i> Tag as Released
				</button>
			</div>
		</div>

	</div>
</section>

<?php include("../include/script.php"); ?>
<script type="text/javascript">
    $(document).ready(function () {

    $("input").attr('disabled', true);
    $("select").attr('disabled', true);

    $("#id_cancel").hide();
    $("#id_save").hide();

    function data_capture() {
    	$("input").attr('disabled', false);
    	$("select").attr('disabled', false);
    }

    $("#id_edit").click(function(){
    	$("input").attr('disabled', false);
    	$("select").attr('disabled', false);

    	$("#id_cancel").show();
    	$("#id_save").show();

    	$("#id_edit").hide();
    	$("#id_capture").hide();
	});

	$("#id_cancel").click(function(){
    	$("input").attr('disabled', true);
    	$("select").attr('disabled', true);

    	$("#id_cancel").hide();
    	$("#id_save").hide();

    	$("#id_edit").show();
    	$("#id_capture").show();
	});
        
    });

    $("#id_save").click(function(){
    	var id_id = $("#id_id").val();
    	var id_type = $("#id_type").val();
    	var id_number = $("#id_number").val();
    	var id_campus = $("#id_campus").val();
    	var id_college = $("#id_college").val();
    	var id_course = $("#id_course").val();
    	var id_firstname = $("#id_firstname").val();
    	var id_middlename = $("#id_middlename").val();
    	var id_lastname = $("#id_lastname").val();
    	var id_bloodtype = $("#id_bloodtype").val();
    	var id_sex = $("#id_sex").val();
    	var id_birthdate = $("#id_birthdate").val();
    	var id_address = $("#id_address").val();
    	var id_parent = $("#id_parent").val();
    	var id_contact = $("#id_contact").val();

    	if( id_id != '' && 
			id_type != '' &&
			id_number != '' &&
			id_campus != '' &&
			id_college != '' &&
			id_course != '' &&
			id_firstname != '' &&
			id_lastname != '' &&
			id_bloodtype != '' &&
			id_sex != '' &&
			id_birthdate != '' &&
			id_address != '' &&
			id_parent != '' &&
			id_contact != ''
			) {
	  	$.ajax({
	  		url: "update_id.php",
	  		method: "post",
	  		data: {
	  			id_id:id_id,
	  			id_type:id_type,
				id_number:id_number,
				id_campus:id_campus,
				id_college:id_college,
				id_course:id_course,
				id_firstname:id_firstname,
				id_middlename:id_middlename,
				id_lastname:id_lastname,
				id_bloodtype:id_bloodtype,
				id_sex:id_sex,
				id_birthdate:id_birthdate,
				id_address:id_address,
				id_parent:id_parent,
				id_contact:id_contact
	  		},
	  		success: function(data){
	    		$("#msg_alert").show();
				$("#msg_alert").addClass("bg-success");
				$("#msg").text("ID Information Updated Successfully.");
				$("#msg_alert").delay(2000).fadeOut();

	    		$("input").attr('disabled', true);
    			$("select").attr('disabled', true);

	    		$("#id_cancel").hide();
		    	$("#id_save").hide();

		    	$("#id_edit").show();
		    	$("#id_capture").show();
	  		}
	  	})
	  	} else {
            $("#msg_alert").show();
            $("#msg_alert").removeClass("bg-success");
            $("#msg_alert").addClass("bg-danger");
            $("#msg").text("All fields are required.");
            $("#msg_alert").delay(2000).fadeOut();
        }
	});

	$("#id_capture").click(function(){
		var id_id = $("#id_id").val();
		$(location).attr('href','capture.php?SN='+id_id);
	});

	$("#btn_released").click(function(){
            var sn_id_final = $('#id_id').val();
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
                           	$("#msg_alert").show();
                            $("#msg_alert").removeClass("bg-danger");
                            $("#msg_alert").addClass("bg-success");
                            $("#msg").text(data);
                            $("#msg_alert").delay(1000).fadeOut(function(){
								location.reload(true);
							});
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