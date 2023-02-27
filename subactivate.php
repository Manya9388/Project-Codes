<?php
session_start();
include('config.php');
$id=$_REQUEST['id'];

$sql4="UPDATE tbl_subcategory set status='1' where sub_id='$id'";
if(mysqli_query($conn,$sql4))
{
    $_SESSION['msg2'] = "Subcategory activated successfully";
}
header("Location: adminhome.php");
?>