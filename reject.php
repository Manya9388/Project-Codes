<?php
session_start();
include('config.php');
$id=$_REQUEST['id'];

$sqlq="UPDATE tbl_customize SET status='-1' where custom_id='$id'";
if(mysqli_query($conn,$sqlq))
{
    $_SESSION['msg'] = " Rejected";
}
header("Location: deshome.php");
?>