<?php 
include("../include/config.php");

$SN = $_POST["id_id"];
$output = '';

$output .= '
<table class="table table-bordered table-condensed">
    <thead>
        <tr>
            <th width="20%">No.</th>
            <th width="80%">Image</th>
        </tr>
    </thead>
    <tbody>
';  
$sql = mysqli_query($conn, "SELECT count(idm_id) as count_img FROM idp_img WHERE idm_sn='$SN'");
$row = mysqli_fetch_assoc($sql);

$count = $row['count_img'];

$sql1 = mysqli_query($conn, "SELECT * FROM idp_img WHERE idm_sn='$SN' ORDER BY idm_id DESC LIMIT 2");

while($row1 = mysqli_fetch_assoc($sql1)) {

$output .= '
    <tr class="t_table">
        <td>'.$count.'</td>
        <td>
            <img class="t_img" src="../'.$row1['idm_img'].'"></br>
            <b>Captured Date:</b> '.date("F j, Y h:i A", strtotime($row1['idm_date'])).'
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

