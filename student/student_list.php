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
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ICTO ID Services - Student</title>
    <?php include("../include/style.php"); ?>
</head>

<body class="bg-light">

<section class="container">
    <div class="row sign_out pt-3 pr-3">
        <span style="cursor: pointer;" onclick="window.location.href='../include/signout.php'"><?php 

        $sql5 = mysqli_query($conn2, "SELECT * FROM userx WHERE userx_id='$userx_id'");
        $row5 = mysqli_fetch_assoc($sql5);
        echo strtoupper($row5['userx_username']);
        ?> <i class="fa fa-times"></i></span>
    </div>
    <div class="row py-5">

        <div id="msg_alert" class="alert alert-dismissible">
          <span id="msg"></span>
        </div>

        <div class="form-group pb-4">
            <button id="btn_add" class="btn btn-md btn-secondary" onclick="window.location.href='../index.php'"><i class="fa fa-arrow-left"></i> Back</button>
        </div>

        <div class="col-lg-12">
            <h2 class="pb-3"><strong>ID Services > <span class="text-danger">Student</span></strong></h2>

            <div class="col-lg-12">
                <label class="pb-1"><strong>Service Reference Number (SRN) or Last Name:</strong></label>
                <div class="input-group input-group-lg mb-3">
                  <input type="text" id="sr_number" class="form-control" placeholder="e.g. IDS11282022_001 or Garcia" aria-label="" aria-describedby="sr_btn">
                  <button class="btn btn-primary" type="button" id="sr_btn">
                    <i class="fa fa-search"></i>
                    <strong>Search</strong>
                  </button>
                </div>

                <div class="pt-4" id="srn_result">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Service Reference</th>
                                <th>ID Type</th>
                                <th>Full Name</th>
                                <th>ID Number</th>
                                <th>Status</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="7" class="text-center text-muted">
                                    *** No Record(s) Yet ***
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include("../include/script.php"); ?>
<script type="text/javascript">
    $(document).ready(function () {
        $('#example').DataTable();

        $("#sr_btn").click(function(){
            var sr_number = $('#sr_number').val();

            if(sr_number == '') {
                $("#msg_alert").show();
                $("#msg_alert").removeClass("bg-success");
                $("#msg_alert").addClass("bg-danger");
                $("#msg").text("Please enter Service Reference Number");
                $("#msg_alert").delay(2000).fadeOut();
            } else {
                $.ajax({
                url : "search.php",
                method : "POST",
                data : {
                    sr_number:sr_number
                },
                success: function(data){
                        $("#srn_result").html(data);
                    }
                });
            }
        });
    });
</script>
</body>
</html>