<?php
session_start();
include('config.php');
if(isset($_POST['submit']))
{
$s_id=$_POST['s_id'];
$sqll="UPDATE tbl_sgarments SET status='1' where s_id='$s_id'";
if(mysqli_query($conn,$sqll))
{
    $_SESSION['msg'] = "Order Confirmed";
}
header("Location: shopping/checkout2.php");
}
?>