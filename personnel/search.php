<?php 

include('../include/config.php');

$output = '';
$sr_number = $_POST["sr_number"];

$sql = mysqli_query($conn, "SELECT * FROM idp WHERE id_id = '$sr_number' OR id_lastname LIKE '%$sr_number%' ORDER BY id_appdate ASC");

 $output .= '
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
    <tbody>';

if(mysqli_num_rows($sql) > 0) {
        $count = 1;
        while($row = mysqli_fetch_assoc($sql)) {
        
        $output .= '
        <tr>
            <td>'.$count.'</td>
            <td class="sn">'.$row["id_id"].'</td>
            <td class="text_uppercase">'.$row["id_type"].'</td>
            <td class="text_uppercase"><b>'.$row["id_lastname"].'</b>, '.$row["id_firstname"].' '.$row["id_middlename"].'</td>
            <td>'.$row["id_number"].'</td>
            <td class="text_uppercase">'.$row["id_position"].'</td>
            <td>'.date("F j, Y h:i A", strtotime($row["id_appdate"])).'</td>
            <td class="action">
            	<a href="print_preview.php?SN='.$row['id_id'].'">
                <button class="btn btn-sm btn-primary">
                	<i class="fa fa-search"></i> Preview
                </button>
                </a>
            </td>
        </tr>';

        $count++;
    } 
} else {
  $output .= '
    <tr>
        <td colspan="8" class="text-center text-muted">
            *** No Matching Record for Service Reference Number <strong>'.$sr_number.'</strong> ***
        </td>
    </tr>';
}

$output .= '
    </tbody>
</table>
';

echo $output;

?>

<?php include("../include/script.php"); ?>
<script type="text/javascript">
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>