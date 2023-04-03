<?php
session_start();
include('config.php');
$to_id=$_GET['to_id'];

$sql111="UPDATE tbl_torder set status='5' where to_id='$to_id'";
if(mysqli_query($conn,$sql111))
{
    $_SESSION['msg'] = "Confirmed";
}
header("Location: shopping/category.php?cat_id=14");
?>