<?php 
require('connect_db.php');
$status='NO';
if($_GET['status']=='NO') $status='YES';
$q = "update trans set status='$status' where id=$_GET[trans_id]";
$r = mysqli_query($dbc,$q);
mysqli_close($dbc);
echo $q;
//include('status.html');
?>

