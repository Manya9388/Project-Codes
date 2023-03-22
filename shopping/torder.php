<?php
include('config.php');
$targetDir="timages/";
if(isset($_POST["upload"]))
{

    $size=$_POST['size'];
    $type=$_POST['type'];
    $timg=$_FILES["timg"]["name"];
   
    $targetFilePath = $targetDir . $timg;
    move_uploaded_file($_FILES["timg"]["tmp_name"],$targetFilePath);
    
    $sql=mysqli_query($conn,"INSERT INTO tbl_torder(size,type,timg) VALUES('$size','$type','$timg')");

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