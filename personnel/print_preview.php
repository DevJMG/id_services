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

$sql = mysqli_query($conn, "SELECT * FROM idp INNER JOIN idp_id on idp.id_id = idp_id.id_id WHERE idp.id_id='$SN'");

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
            <button id="btn_add" class="btn btn-md btn-secondary" onclick="window.location.href='personnel_list.php'"><i class="fa fa-arrow-left"></i> Back</button>
        </div>

		<h2 class="pb-4"><strong id="title_capture">Preview ID Information of <span class="series_no"><?php echo $SN; ?></span> <i class="fa fa-rss-square" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#id_history"></i></strong></h2>

		<div id="msg_alert" class="alert alert-dismissible">
	      <span id="msg"></span>
	    </div>

		<div class="col-lg-9 px-4">
			<div class="row input_group">
				<h3 class="pb-2"><strong>Personal Information</strong></h3>
				<input type="hidden" name="id_id" id="id_id" value="<?php echo $row['id_id']; ?>">
				<input type="hidden" name="userx_id" id="userx_id" value="<?php echo $userx_id; ?>">
				<div class="col-lg-3 form-group pb-3">
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

				<div class="col-lg-5 form-group pb-3">
					<label class="pb-1">
						<strong>ID Number</strong>
					</label>
					<input type="text" class="form-control text_uppercase" name="id_number" id="id_number" placeholder="e.g. GSC-15-1234" value="<?php echo $row['id_number']; ?>">
				</div>

				<div class="col-lg-4 form-group pb-3">
					<label class="pb-1">
						<strong>Position</strong>
					</label>
					<input type="text" class="form-control text_uppercase" name="id_position" id="id_position" placeholder="e.g. Administrative Officer I" value="<?php echo $row['id_position']; ?>">
				</div>

				<div class="col-lg-3 form-group pb-3">
					<label class="pb-1">
						<strong>First Name</strong>
					</label>
					<input type="text" class="form-control text_uppercase" name="id_firstname" id="id_firstname" placeholder="e.g. Juan" value="<?php echo $row['id_firstname']; ?>">
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
						<small>(Brgy./St., Municipality/City, Province)</small>
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

		<div class="col-lg-3 px-4">
			<div class="row input_group">
				<h3 class="pb-2"><strong>Government Issued IDs</strong></h3>
				<div class="col-lg-12 form-group pb-3">
					<label class="pb-1">
						<strong>SSS</strong>
					</label>
					<input type="text" class="form-control text_uppercase" name="idp_sss" id="idp_sss" placeholder="0000000000" value="<?php echo $row['idp_sss']; ?>">
				</div>

				<div class="col-lg-12 form-group pb-3">
					<label class="pb-1">
						<strong>GSIS</strong>
					</label>
					<input type="text" class="form-control text_uppercase" name="idp_gsis" id="idp_gsis" placeholder="0000000000" value="<?php echo $row['idp_gsis']; ?>">
				</div>

				<div class="col-lg-12 form-group pb-3">
					<label class="pb-1">
						<strong>Pagibig</strong>
					</label>
					<input type="text" class="form-control text_uppercase" name="idp_pagibig" id="idp_pagibig" placeholder="000000000000" value="<?php echo $row['idp_pagibig']; ?>">
				</div>

				<div class="col-lg-12 form-group pb-3">
					<label class="pb-1">
						<strong>TIN</strong>
					</label>
					<input type="text" class="form-control text_uppercase" name="idp_tin" id="idp_tin" placeholder="000000000" value="<?php echo $row['idp_tin']; ?>">
				</div>

				<div class="col-lg-12 form-group pb-3">
					<label class="pb-1">
						<strong>PhilHealth</strong>
					</label>
					<input type="text" class="form-control text_uppercase" name="idp_philhealth" id="idp_philhealth" placeholder="00-000000000-0" value="<?php echo $row['idp_philhealth']; ?>">
				</div>
			</div>

			<br>
		</div>

		<div class="modal fade" id="id_history" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog modal-sm">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h1 class="modal-title fs-5" id="exampleModalLabel"><strong>ID History</strong></h1>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      </div>
		      <div class="modal-body">
		       	<div class="form-group">
					<table class="table table-condensed table-striped">
						<thead>
							<th width="15%" class="text-center">#</th>
							<th width="85%" class="text-center">Released Date</th>
						</thead>
						<tbody>
						<?php 
						$sql = mysqli_query($conn2, "SELECT count(sl_key) as count_sl FROM service_log WHERE
							 (sl_id = '$SN' AND sl_status = 'Released') OR 
							 (sl_id = '$SN' AND sl_status = 'Printed')
							");
						$res = mysqli_fetch_assoc($sql);

						$count = $res['count_sl'];
						
						$sql = mysqli_query($conn2, "SELECT * FROM service_log WHERE
							 (sl_id = '$SN' AND sl_status = 'Released') OR 
							 (sl_id = '$SN' AND sl_status = 'Printed')
							 ORDER BY sl_date DESC LIMIT 5");
						
						while($row = mysqli_fetch_assoc($sql)) {
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
		  </div>
		</div>

		<div class="col-lg-12" id="preview_btn_con">
			<div id="preview_btn_wrap">
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
    	var id_position = $("#id_position").val();
    	var id_firstname = $("#id_firstname").val();
    	var id_middlename = $("#id_middlename").val();
    	var id_lastname = $("#id_lastname").val();
    	var id_bloodtype = $("#id_bloodtype").val();
    	var id_sex = $("#id_sex").val();
    	var id_birthdate = $("#id_birthdate").val();
    	var id_address = $("#id_address").val();
    	var id_parent = $("#id_parent").val();
    	var id_contact = $("#id_contact").val();

    	var idp_sss = $("#idp_sss").val();
    	var idp_gsis = $("#idp_gsis").val();
    	var idp_pagibig = $("#idp_pagibig").val();
    	var idp_tin = $("#idp_tin").val();
    	var idp_philhealth = $("#idp_philhealth").val();

    	if( id_id != '' && 
			id_type != '' &&
			id_number != '' &&
			id_position != '' &&
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
				id_position:id_position,
				id_firstname:id_firstname,
				id_middlename:id_middlename,
				id_lastname:id_lastname,
				id_bloodtype:id_bloodtype,
				id_sex:id_sex,
				id_birthdate:id_birthdate,
				id_address:id_address,
				id_parent:id_parent,
				id_contact:id_contact,
				idp_sss:idp_sss,
				idp_gsis:idp_gsis,
				idp_pagibig:idp_pagibig,
				idp_tin:idp_tin,
				idp_philhealth:idp_philhealth
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