<?php include("../include/config.php"); ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ICTO ID Services - Personnel</title>
    <?php include("../include/style.php"); ?>
</head>

<body class="bg-light">

<section class="container">
    <div class="row py-5">

        <div class="form-group pb-4">
            <button id="btn_add" class="btn btn-md btn-secondary" onclick="window.location.href='../index.php'"><i class="fa fa-arrow-left"></i> Back</button>
        </div>

        <div class="col-lg-12">
            <h2 class="pb-3"><strong>ID Services > Personnel</strong></h2>

            <div class="form-group pb-4 add_con">
                <button id="btn_add" class="btn btn-md btn-primary" onclick="window.location.href='add_personnel_info.php'"><i class="fa fa-plus"></i> Add Personnel Info</button>
            </div>

            <table id="example">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Service Reference</th>
                        <th>ID Type</th>
                        <th>Full Name</th>
                        <th>ID Number</th>
                        <th width="15%">Position</th>
                        <th width="20%">Application Date</th>
                        <th width="10%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $count = 1;
                    $sql = mysqli_query($conn, "SELECT * FROM idp ORDER BY id_appdate ASC");
                    while($row = mysqli_fetch_assoc($sql)) {
                    ?>
                    <tr>
                        <td><?php echo $count; ?></td>
                        <td class="sn"><?php echo $row['id_id']; ?></td>
                        <td class="text_uppercase"><?php echo $row['id_type']; ?></td>
                        <td class="text_uppercase"><b><?php echo $row['id_lastname'].'</b>, '.$row['id_firstname'].' '.$row['id_middlename']; ?></td>
                        <td><?php echo $row['id_number']; ?></td>
                        <td class="text_uppercase"><?php echo $row['id_position']; ?></td>
                        <td><?php echo date("F j, Y h:i A", strtotime($row['id_appdate'])); ?></td>
                        <td class="action">
                            <button onclick="window.location.href='print_preview.php?SN=<?php echo $row['id_id']; ?>'" class="btn btn-sm btn-primary"><i class="fa fa-search"></i> Preview</button>
                        </td>
                    </tr>
                    <?php 
                    $count++;
                    } 
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php include("../include/script.php"); ?>
<script type="text/javascript">
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>
</body>
</html>