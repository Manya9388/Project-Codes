<?php
session_start();
include('config.php');
$id=$_REQUEST['id'];

$sql9="UPDATE tbl_customize SET status='2' where custom_id='$id'";
if(mysqli_query($conn,$sql9))
{
    $_SESSION['msg'] = "Approved";
}
header("Location: deshome.php");
?>