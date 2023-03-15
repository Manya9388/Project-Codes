<?php
session_start();
include('config.php');
$id=$_REQUEST['id'];

$sql11="UPDATE tbl_tshirt set status='0' where t_id='$id'";
if(mysqli_query($conn,$sql11))
{
    $_SESSION['msg'] = "Tshirt deactivated successfully";
}
header("Location: adminhome.php");
?>