
<?php
session_start();
include('config.php');
$id=$_REQUEST['id'];

$sqlq="UPDATE tbl_torder SET status='-1' where to_id='$id'";
if(mysqli_query($conn,$sqlq))
{
    $_SESSION['msg'] = " Rejected";
}
header("Location: adminhome.php");
?>