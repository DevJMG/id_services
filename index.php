<?php 
include("include/config.php");

session_start();

if(isset(
    $_SESSION['userx_id']) && 
    $_SESSION['userx_id'] != ''){
    header("location: select_service.php");
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ICTO ID Services</title>
    <?php include("include/style.php"); ?>
</head>

<body class="bg-light">

<section class="container">

    <div id="msg_alert" class="alert alert-dismissible">
        <span id="msg"></span>
    </div>

    <div class="row login_center">

        <div class="px-2 pb-2 col-lg-4">
            <div class="card pt-2 rounded-4">
              
              <div class="col-lg-12 d-flex justify-content-center px-2 py-3">
                  <img src="asset/graphic/icto_logo.png" id="icto_logo">
              </div>

              <div class="card-body px-3 pt-0">
                <div class="col-lg-12 ">

                    <div class="form-group mb-1 pt-0">
                      <small><strong>Username:</strong></small>
                      <input 
                      type="text" 
                      id="userx_username" 
                      class="form-control" 
                      placeholder=""
                      autocomplete="off">
                    </div>

                    <div class="form-group mb-3 pt-1">
                      <small><strong>Password:</strong></small>
                      <input 
                      type="text" 
                      id="userx_password" 
                      class="form-control" 
                      placeholder=""
                      autocomplete="off">
                    </div>

                </div>
                <div class="col-lg-12 text-center">
                    <button class="btn btn-primary col-lg-12" id="btn_save">
                        <i class="fa fa-sign-in"></i> Login
                    </button>
                </div>
              </div>
              <div class="col-lg-12 px-2 pb-2 text-center">
                  <small><strong>ID Services</strong> version 1.1</small>
              </div>
            </div>
        </div>

    </div>

</section>

<?php include("include/script.php"); ?>
<script type="text/javascript">
    $(document).ready(function(){

        $('#msg_alert').hide();

        $('#btn_save').click(function(){
        var userx_username = $('#userx_username').val();
        var userx_password = $('#userx_password').val();
        var action = 'signin';
        var email_pattern = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        if(userx_username == '' || userx_password == ''){
            $("#msg_alert").show();
            $("#msg_alert").removeClass("bg-success");
            $("#msg_alert").addClass("bg-danger");
            $("#msg").text('All fields are required.');
            $("#msg_alert").delay(3000).fadeOut();
        } else if(userx_username != '' && userx_password != ''){

                $.ajax({
                url : "sign-in/signin_verification.php",
                method : "POST",
                data : {
                    userx_username:userx_username, 
                    userx_password:userx_password, 
                    action:action
                },
                success: function(data){
                    if (data == "User doesn't exist.") {
                        $("#msg_alert").show();
                        $("#msg_alert").removeClass("bg-success");
                        $("#msg_alert").addClass("bg-danger");
                        $("#msg").text(data);
                        $("#msg_alert").delay(3000).fadeOut();
                    } else {
                        $('#userx_username').val('');
                        $('#userx_password').val('');
                        
                        if (data == 'admin') {
                            $(location).attr('href','select_service.php');
                        }
                    }
                }
                });
        }
        });
    });
</script>
</body>
</html>