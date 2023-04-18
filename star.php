<?php
include('config.php');
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the selected rating
    $rating = $_POST["stars"];
    $custom_id= $_POST['custom_id'];
    $sql55=mysqli_query($conn,"SELECT  `des_id`,`log_id`FROM `tbl_customize` WHERE custom_id=$custom_id");
    while($row=mysqli_fetch_array($sql55))
{
  $a=$row['des_id'];
  $b=$row['log_id'];
    $sql=mysqli_query($conn,"INSERT INTO tbl_rating(log_id,des_id,rating) VALUES($b,'$a','$rating')");
}
    if($sql)
      {
       
    echo "<script>alert('Rating Added!!');window.location='my_account.php'</script>";
      }
    else
      {
    echo "<script>alert('Error');window.location='my_account.php'</script>";
      }
   
}
?>