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
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Print ID - <?php echo $SN; ?></title>
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
        <div class="col-lg-12">

            <div class="form-group pb-4 back_con">
                <button id="btn_add" class="btn btn-md btn-secondary" onclick="window.location.href='print_preview.php?SN=<?php echo $SN; ?>'"><i class="fa fa-arrow-left"></i> Back</button>
            </div>

            <h2 class="pb-4"><strong id="title_capture">Capture Image and Signature for <span class="series_no"><?php echo $SN; ?></span> </strong></h2>
            <input type="hidden" name="id_id" id="id_id" value="<?php echo $SN; ?>">

            <div id="msg_alert" class="alert alert-dismissible">
              <span id="msg"></span>
            </div>

            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group col-lg-12 frm--adjust">
                            <label class="pb-2"><strong>Profile Picture</strong></label>
                                <div class="col-lg-12">
                                    <div class="row" id="i_image_con">
                                        <div id="i_img_wrapper">
                                            <div id="i_image_item">
                                                <div class="col-sm-12" id="i_image_content"></div>
                                            </div>
                                        </div>
                                        <div class="img-btn">
                                            <button id="b_image" class="btn btn-primary btn-sm"><i class="fa fa-image"></i> Browse</button>
                                            <button id="r_image" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Remove</button>
                                        </div>
                                    </div>
                                </div>
                                <input style="display: none;" id="file" name="file" type="file"/>
                                <input style="display: none;" type="text" name="profile_img" id="profile_img">
                        </div>

                        <div class="col-lg-12">
                            
                            <div class="form-group">
                                <label class="pb-2"><strong>Signature</strong></label>

                                <div class="col-lg-12 text-center">
                                    <div id='js-signature'
                                        data-width="600"
                                        data-height="250"
                                        data-border="2px solid #ced4da"
                                        data-line-width="5"
                                        data-background="#ffffff"
                                        data-line-color="#000"
                                        data-auto-fit="true"
                                    ></div>
                                    <textarea id="signature64"></textarea>
                                </div>
                                <div class="col-lg-12 pt-2">
                                    <button type="button" id="clear" class="btn btn-danger btn-sm" style="margin-right: 5px;">
                                    <i class="fa fa-times"></i>
                                        Clear
                                    </button>

                                    <button type="button" id="encode" class="btn btn-primary btn-sm">
                                    <i class="fa fa-download"></i>
                                        Encode
                                    </button>
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="col-lg-6 pt-3">
                        <div class="row">
                            <h4 class="pb-3"><strong>ID Capture History</strong></h4>
                            <div class="col-lg-6">
                                <div id="id_img_transaction_res"></div>
                            </div>
                            <div class="col-lg-6">
                                <div id="id_sig_transaction_res"></div>
                            </div>
                        </div>
                    </div>

                    <div class="print_con pt-4">
                        <button id="btn_update" class="btn btn-lg btn-primary">
                           <i class="fa fa-save"></i> Update
                        </button>
                        <button id="btn_reuse" class="btn btn-lg btn-success">
                           <i class="fa fa-print"></i> Print ID
                        </button>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

<?php include("../include/script.php"); ?>
<script src="../asset/sig-pad/js/signature_pad.js"></script>

<script type="text/javascript">
    $(document).ready(function(){

        $("#js-signature").jqSignature();

        $("#encode").click(function(){
            var dataUrl = $("#js-signature").jqSignature('getDataURL');
            $("#signature64").val(dataUrl);
        });

        $("#clear").click(function(){
            $("#js-signature").jqSignature('clearCanvas');
            $("#signature64").empty();
        });

        $('#msg_alert').hide();

        $('#r_image').click(function(){
            image_reset();
        });

        function image_reset(){
            $('#file').val('');
            $('#profile_img').val('');
            $('#i_image_content').css("background-image", "url()");
        }

        $('#b_image').click(function(){
            $('#file').click();
        });

        $(document).on('change', '#file', function(){
            var property = document.getElementById("file").files[0];
            var image_name = property.name;
            var image_extension = image_name.split(".").pop().toLowerCase();

            if(jQuery.inArray(image_extension, ['gif','png','jpg','jpeg']) == -1){
                alert("Invalid Image File");
            }
            var image_size = property.size;
            if(image_size > 10000000){
                alert("Image file size is too much");
            }else{
                var form_data = new FormData();
                form_data.append("file", property);
                $.ajax({
                    url : "upload_img.php",
                    method : "POST",
                    data : form_data,
                    contentType : false,
                    cache : false,
                    processData : false,
                    success : function(data) {
                        $('#i_image_content').css("background-image", "url('../"+data+"')");
                        $('#profile_img').val(data);
                    }
                });
            }
        });

        display_image_history();

        function display_image_history(){
          var id_id = $('#id_id').val();
          var action = "";
          $.ajax({
            url : "id_img_transaction_result.php",
            method : "POST",
            data : {id_id:id_id, action:action},
            success : function(data){
              $('#id_img_transaction_res').html(data);
            }
          });
        }

        display_signature_history();

        function display_signature_history(){
          var id_id = $('#id_id').val();
          var action = "";
          $.ajax({
            url : "id_sig_transaction_result.php",
            method : "POST",
            data : {id_id:id_id, action:action},
            success : function(data){
              $('#id_sig_transaction_res').html(data);
            }
          });
        }

        $("#btn_update").click(function(){
            var id_id = $('#id_id').val();
            var profile_img = $('#profile_img').val();
            var signature = $('#signature64').val();

            if(profile_img != '' || signature != '') {
                $.ajax({
                url : "print_id.php",
                method : "POST",
                data : {
                    id_id:id_id, 
                    profile_img:profile_img,
                    signature:signature
                },
                success: function(data){
                  display_image_history();
                  display_signature_history();
                  image_reset();
                  $("#signature64").val('');
                  $("#js-signature").jqSignature('clearCanvas');

                  $("#msg_alert").show();
                  $("#msg_alert").removeClass("bg-danger");
                  $("#msg_alert").addClass("bg-success");
                  $("#msg").text(data);
                  $("#msg_alert").delay(2000).fadeOut();
                  // $(location).attr('href','print_form.php?SN='+id_id);
                }
                });
            } else {
                  $("#msg_alert").show();
                  $("#msg_alert").removeClass("bg-success");
                  $("#msg_alert").addClass("bg-danger");
                  $("#msg").text("Capture image or encode signature first.");
                  $("#msg_alert").delay(2000).fadeOut();
            }
        });

        $("#btn_reuse").click(function(){
            var id_id = $('#id_id').val();
            $.ajax({
                url : "check_reuse.php",
                method : "POST",
                data : {
                    id_id:id_id
                },
                success: function(data){
                        if(data == 'Data Exist'){
                            $(location).attr('href','print_form.php?SN='+id_id);
                        } else {
                            $("#msg_alert").show();
                            $("#msg_alert").removeClass("bg-success");
                            $("#msg_alert").addClass("bg-danger");
                            $("#msg").text("No capture history to reuse, kindly add first.");
                            $("#msg_alert").delay(2000).fadeOut();
                        }
                    }
                });
        });

    });
</script>
</body>
</html>