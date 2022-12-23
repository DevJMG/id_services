<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add ID Info</title>
	<?php include("../include/style.php"); ?>
</head>
<body>

<section class="container">
	<div class="row py-5">
		<div class="form-group pb-4 back_con">
            <button id="btn_add" class="btn btn-md btn-secondary" onclick="window.location.href='personnel.php'"><i class="fa fa-arrow-left"></i> Back</button>
        </div>
        
		<h2 class="pb-4"><strong>Add Personnel Information</strong></h2>

		<div id="msg_alert" class="alert alert-dismissible">
	      <span id="msg"></span>
	    </div>

		<div class="col-lg-9 px-4">
			<div class="row input_group">
				<h3 class="pb-2"><strong>Personal Information</strong></h3>

				<div class="col-lg-3 form-group pb-3">
					<label class="pb-1">
						<strong>Series Number</strong>
					</label>
					<input type="text" class="form-control text_uppercase sn_field" name="id_id" id="id_id" placeholder="e.g. IDP1172022_001" value="IDP">
				</div>
				<div class="col-lg-3 form-group pb-3">
					<label class="pb-1">
						<strong>Application Type</strong>
					</label>
					<select class="form-control text_uppercase" name="id_type" id="id_type">
						<option value="new">New</option>
						<option value="lost">Lost</option>
						<option value="replacement">Replacement</option>
					</select>
				</div>

				<div class="col-lg-3 form-group pb-3">
					<label class="pb-1">
						<strong>ID Number</strong>
					</label>
					<input type="text" class="form-control text_uppercase" name="id_number" id="id_number" placeholder="e.g. GSC-15-1234">
				</div>

				<div class="col-lg-3 form-group pb-3">
					<label class="pb-1">
						<strong>Position</strong>
					</label>
					<input type="text" class="form-control text_uppercase" name="id_position" id="id_position" placeholder="e.g. Administrative Officer I">
				</div>

				<div class="col-lg-3 form-group pb-3">
					<label class="pb-1">
						<strong>First Name</strong>
					</label>
					<input type="text" class="form-control text_uppercase" name="id_firstname" id="id_firstname" placeholder="e.g. Juan">
				</div>

				<div class="col-lg-3 form-group pb-3">
					<label class="pb-1">
						<strong>Middle Name</strong>
					</label>
					<input type="text" class="form-control text_uppercase" name="id_middlename" id="id_middlename" placeholder="e.g. Garcia">
				</div>

				<div class="col-lg-3 form-group pb-3">
					<label class="pb-1">
						<strong>Last Name</strong>
					</label>
					<input type="text" class="form-control text_uppercase" name="id_lastname" id="id_lastname" placeholder="e.g. Cruz">
				</div>

				<div class="col-lg-3 form-group pb-3">
					<label class="pb-1">
						<strong>Blood Type</strong>
					</label>
					<select class="form-control text_uppercase" name="id_bloodtype" id="id_bloodtype">
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
						<option value="male">Male</option>
						<option value="female">Female</option>
					</select>
				</div>

				<div class="col-lg-3 form-group pb-3">
					<label class="pb-1">
						<strong>Date of Birth</strong> 
					</label>
					<input type="date" class="form-control text_uppercase" name="id_birthdate" id="id_birthdate" placeholder="e.g. New Poblacion, Buenavista, Guimaras">
				</div>

				<div class="col-lg-6 form-group pb-3">
					<label class="pb-1">
						<strong>Address</strong> 
						<small>(Barangay/Street, Municipality/City, Province)</small>
					</label>
					<input type="text" class="form-control text_uppercase" name="id_address" id="id_address" placeholder="e.g. New Poblacion, Buenavista, Guimaras">
				</div>
			</div>

			<br>

			<div class="row input_group">
				<h3 class="pb-2"><strong>Contact Information</strong></h3>

				<div class="col-lg-6 form-group pb-3">
					<label class="pb-1">
						<strong>Parent/ Guardian</strong>
					</label>
					<input type="text" class="form-control text_uppercase" name="id_parent" id="id_parent" placeholder="e.g. Maria Garcia Cruz">
				</div>

				<div class="col-lg-6 form-group pb-3">
					<label class="pb-1">
						<strong>Contact Number</strong>
					</label>
					<input type="text" class="form-control text_uppercase" name="id_contact" id="id_contact" placeholder="e.g. 09651234567">
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
					<input type="text" class="form-control text_uppercase" name="idp_sss" id="idp_sss" placeholder="0000000000">
				</div>

				<div class="col-lg-12 form-group pb-3">
					<label class="pb-1">
						<strong>GSIS</strong>
					</label>
					<input type="text" class="form-control text_uppercase" name="idp_gsis" id="idp_gsis" placeholder="0000000000">
				</div>

				<div class="col-lg-12 form-group pb-3">
					<label class="pb-1">
						<strong>Pagibig</strong>
					</label>
					<input type="text" class="form-control text_uppercase" name="idp_pagibig" id="idp_pagibig" placeholder="000000000000">
				</div>

				<div class="col-lg-12 form-group pb-3">
					<label class="pb-1">
						<strong>TIN</strong>
					</label>
					<input type="text" class="form-control text_uppercase" name="idp_tin" id="idp_tin" placeholder="000000000">
				</div>

				<div class="col-lg-12 form-group pb-3">
					<label class="pb-1">
						<strong>PhilHealth</strong>
					</label>
					<input type="text" class="form-control text_uppercase" name="idp_philhealth" id="idp_philhealth" placeholder="00-000000000-0">
				</div>
			</div>

			<br>
		</div>

		<div class="col-lg-12">
			<button id="id_save" class="btn btn-lg btn-success"><i class="fa fa-save"></i> Save</button>
			<button id="id_cancel" class="btn btn-lg btn-secondary"><i class="fa fa-times"></i> Cancel</button>
		</div>

	</div>
</section>

<?php include("../include/script.php"); ?>
<script type="text/javascript">
    $(document).ready(function () {

    function id_cancel() {
    	$("#id_id").val('');
    	$("#id_type").val('new');
    	$("#id_number").val('');
    	$("#id_position").val('');
    	$("#id_firstname").val('');
    	$("#id_middlename").val('');
    	$("#id_lastname").val('');
    	$("#id_bloodtype").val('a+');
    	$("#id_sex").val('male');
    	$("#id_birthdate").val('');
    	$("#id_address").val('');
    	$("#id_parent").val('');
    	$("#id_contact").val('');

    	$("#idp_sss").val('');
    	$("#idp_gsis").val('');
    	$("#idp_pagibig").val('');
    	$("#idp_tin").val('');
    	$("#idp_philhealth").val('');
    }

	$("#id_cancel").click(function(){
		id_cancel();
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
	  		url: "add_personnel.php",
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
	  			if(data == 'Service Reference Already Exist.') {
	  				$("#msg_alert").show();
		    		$("#msg_alert").removeClass("bg-success");
					$("#msg_alert").addClass("bg-danger");
					$("#msg").text(data);
					$("#msg_alert").delay(2000).fadeOut();
					id_cancel();
	  			} else {
	  				$(location).attr('href','personnel.php');
	  			}
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

});
</script>
</body>
</html>