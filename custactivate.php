<?php
session_start();
include('config.php');
$id=$_REQUEST['id'];

$sql8="UPDATE tbl_customize set status='1' where custom_id='$id'";
if(mysqli_query($conn,$sql8))
{
    $_SESSION['msg2'] = "Accepted";
    
}
header("Location: deshome.php");
?>