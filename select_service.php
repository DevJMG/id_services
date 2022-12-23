<?php 
include("include/config.php");

session_start();

$userx_id = "";

if(!(isset(
    $_SESSION['userx_id']) && 
    $_SESSION['userx_id'] != '')) {
    header("location: index.php");
} else {
    $userx_id = $_SESSION['userx_id'];
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
    <div class="row sign_out pt-3 pr-3">
        <span style="cursor: pointer;" onclick="window.location.href='include/signout.php'"><?php 

        $sql = mysqli_query($conn2, "SELECT * FROM userx WHERE userx_id='$userx_id'");
        $row = mysqli_fetch_assoc($sql);
        echo strtoupper($row['userx_username']);
        ?> <i class="fa fa-times"></i></span>
    </div>
    <div class="row py-5">
        <div class="col-lg-12">
            <h3 class="px-3 pt-3 pb-0 text-center"><strong>Information and Communications Technology Office</strong></h3>
            <h1 class="px-3 pt-0 text-center mb-5"><strong><span class="id_service_text">[ ID Services ]</span></strong></h1>

            <!-- <div class="form-group pb-4 add_con">
                <button id="btn_add" class="btn btn-md btn-primary" onclick="window.location.href='add_personnel_info.php'"><i class="fa fa-plus"></i> Add Personnel Info</button>
            </div> -->

            <div class="row d-flex justify-content-center">

                <div class="px-2 pb-2" style="width: 18rem;">
                    <div class="card pt-2 rounded-4">
                      <img src="asset/graphic/student.jpg" class="card-img-top" alt="...">
                      <div class="card-body">
                        <div class="col-lg-12">
                            <div class="row btn_adjust">
                                <div class="col-lg-6 text-center">
                                    <label><strong>Pending</strong></label>
                                    <?php 
                                    $sql = mysqli_query($conn2, "SELECT * FROM v_request_update WHERE sl_status = 'Claim Stab' AND sl_id LIKE '%IDS%' ");
                                    ?>
                                    <h2 class="text-danger">
                                        <strong><?php echo mysqli_num_rows($sql); ?></strong>
                                    </h2>
                                    
                                </div>

                                <div class="col-lg-6 text-center">
                                    <label><strong>Released</strong></label>
                                    <?php 
                                    $sql = mysqli_query($conn2, "SELECT * FROM v_request_update WHERE sl_status = 'Released' AND sl_date>='2022-11-28' AND sl_id LIKE '%IDS%'");
                                    ?>
                                    <h2 class="text-success">
                                        <strong><?php echo mysqli_num_rows($sql); ?></strong>
                                    </h2>
                                    <div style="display: flex; flex-direction: row;
                                    justify-content: center; align-items: center;">
                                        <?php 
                                        $sql = mysqli_query($conn2, "SELECT * FROM id INNER JOIN v_request_update ON id.id_id = v_request_update.sl_id WHERE 
                                            id.id_sex = 'MALE' AND 
                                            v_request_update.sl_status = 'Released' AND
                                            v_request_update.sl_date>='2022-11-28' AND
                                            v_request_update.sl_id LIKE '%IDS%'
                                            ");
                                        ?>
                                        <span style="font-size: 12px; border: 1px solid #ccc; border-radius: 50px; padding: 1px 5px; margin-right: 8px; display: flex; flex-direction: row; justify-content: center;"><strong>M: <span class="text-primary"><?php echo mysqli_num_rows($sql); ?></span></strong></span>

                                        <?php 
                                        $sql = mysqli_query($conn2, "SELECT * FROM id INNER JOIN v_request_update ON id.id_id = v_request_update.sl_id WHERE 
                                            id.id_sex = 'FEMALE' AND 
                                            v_request_update.sl_status = 'Released' AND
                                            v_request_update.sl_date>='2022-11-28' AND
                                            v_request_update.sl_id LIKE '%IDS%'
                                            ");
                                        ?>
                                        <span style="font-size: 12px; border: 1px solid #ccc; border-radius: 50px; padding: 1px 5px; display: flex; flex-direction: row; justify-content: center;"><strong>F: <span class="text-danger"><?php echo mysqli_num_rows($sql); ?></span></strong></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 text-center">
                            <button onclick="window.location.href='student/student_list.php'" class="btn btn-primary col-lg-12 btn_view"><i class="fa fa-sign-in"></i> View</button>
                        </div>
                      </div>
                    </div>
                </div>

                <div class="px-2 pb-2" style="width: 18rem;">
                    <div class="card pt-2 rounded-4">
                      <img src="asset/graphic/personnel.jpg" class="card-img-top" alt="...">
                      <div class="card-body">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6 text-center">
                                    <label><strong>Pending</strong></label>
                                    <?php 
                                    $sql = mysqli_query($conn2, "SELECT * FROM v_request_update WHERE sl_status = 'Application Received' AND sl_id LIKE '%IDP%' ");
                                    ?>
                                    <h2 class="text-danger">
                                        <strong><?php echo mysqli_num_rows($sql); ?></strong>
                                    </h2>
                                </div>

                                <div class="col-lg-6 text-center">
                                    <label><strong>Released</strong></label>
                                    <?php 
                                    $sql = mysqli_query($conn2, "SELECT * FROM v_request_update WHERE sl_status = 'Released' AND sl_date>='2022-10-1' AND sl_id LIKE '%IDP%'");
                                    ?>
                                    <h2 class="text-success">
                                        <strong><?php echo mysqli_num_rows($sql); ?></strong>
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 text-center">
                            <button onclick="window.location.href='personnel/personnel_list.php'" class="btn btn-danger col-lg-12 btn_view"><i class="fa fa-sign-in"></i> View</button>
                        </div>
                      </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>

<?php include("include/script.php"); ?>
</body>
</html>