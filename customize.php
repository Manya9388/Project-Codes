<?php
include('config.php');
$targetDir="fimages/";
//$targetDir2="mimages/";

if(isset($_POST["submit"]))
{

    $type=$_POST['type'];
    $cust_id=$_POST['cust_id'];
    $des_id=$_POST['des_id'];
    $fabric=$_POST['fabric'];
    $front=$_POST['front'];
    $img1=$_FILES["img1"]["name"];
    //$img2=$_FILES["img2"]["name"];
    $sleeves=$_POST['sleeves'];
    $colour=$_POST['colour'];
    $specify=$_POST['specify'];
    $size=$_POST['size'];
    $price=$_POST['price'];
    $duration=$_POST['duration'];
    $targetFilePath = $targetDir. $img1;
    //$targetFilePath2 = $targetDir2. $img2;

    //move_uploaded_file($img1,$targetFilePath);
    //$targetFilePath = $targetDir2 . $img2;
    move_uploaded_file($_FILES["img1"]["tmp_name"],$targetFilePath);
   // move_uploaded_file($_FILES["img2"]["tmp_name"],$targetFilePath2);

    $sql=mysqli_query($conn,"INSERT INTO tbl_customize(type,cust_id,des_id,fabric,front,sleeves,colour,specify,size,img1,price,duration) VALUES('$type','$cust_id','$des_id','$fabric','$front','$sleeves','$colour','$specify','$size','$img1','$price','$duration')");

    if($sql)
      {
       
    echo "<script>alert('Requested Successfully!!');window.location='my_account.php'</script>";
      }
    else
      {
    echo "<script>alert('Error');window.location='my_account.php'</script>";
      }
    }
    
    
  	
?>

