<?php
include('config.php');
$targetDir="timages/";
session_start();
$email=$_SESSION['email'];
if(isset($_POST["upload"]))
{

  $sqlq="SELECT log_id from tbl_login where email='$email'";
  $resu = mysqli_query($conn, $sqlq);
  $row = mysqli_fetch_assoc($resu);
  $log_id= $row['log_id'];
    $size=$_POST['size'];
    $type=$_POST['type'];
    $timg=$_FILES["timg"]["name"];
   
    $targetFilePath = $targetDir . $timg;
    move_uploaded_file($_FILES["timg"]["tmp_name"],$targetFilePath);
    
    $sql=mysqli_query($conn,"INSERT INTO tbl_torder(size,type,timg,log_id) VALUES('$size','$type','$timg','$log_id')");

    if($sql)
      {
       
    echo "<script>alert('Requested Successfully!!');window.location='../old/index.php'</script>";
      }
    else
      {
    echo "<script>alert('Error');window.location='../old/index.php'</script>";
      }
    }
    
    
  	
?>