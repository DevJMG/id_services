<?php 
include("../include/config.php");

$SN = $_POST["id_id"];
$output = '';

$output .= '
<table class="table table-bordered table-condensed">
    <thead>
        <tr>
            <th width="20%">No.</th>
            <th width="20%">Signature</th>
        </tr>
    </thead>
    <tbody>
';  
$sql = mysqli_query($conn, "SELECT count(ids_id) as count_sig FROM idp_sig WHERE ids_sn='$SN'");
$row = mysqli_fetch_assoc($sql);

$count = $row['count_sig'];

$sql1 = mysqli_query($conn, "SELECT * FROM idp_sig WHERE ids_sn='$SN' ORDER BY ids_id DESC LIMIT 2");

while($row1 = mysqli_fetch_assoc($sql1)) {

$output .= '
    <tr class="t_table">
        <td>'.$count.'</td>
        <td>
            <img class="t_img" src="../'.$row1['ids_sig'].'"></br>
            <b>Captured Date:</b> '.date("F j, Y h:i A", strtotime($row1['ids_date'])).'
        </td>
    </tr>';
    $count--;
    }
$output .= '
</tbody>
</table>
';

echo $output;

?>

