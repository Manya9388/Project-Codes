<?php
include('config.php');
session_start();
$email=$_SESSION['email'];
$targetDir="fimages/";
//$targetDir2="mimages/";

if(isset($_POST["submit"]))
{
  $sql3=mysqli_query($conn,"SELECT log_id from tbl_login where email='$email'");
  while($row=mysqli_fetch_array($sql3))
  {
    $log_id=$row['log_id'];
  }
  $dress_select=$_POST['dress-select']; 
  $product_select=$_POST['product-select'];
  $fabric_select=$_POST['fabric-select'];
  $front=$_POST['neck-select'];
  $bust=$_POST['bust'];
  $waist=$_POST['waist'];
  $hips=$_POST['hips'];
  $highhips=$_POST['highhips'];
  $arm_length=$_POST['arm-length'];
  $frontwaist_length=$_POST['frontwaist-length'];
  $backwaist_length=$_POST['backwaist-length'];
  $inseam=$_POST['inseam'];
  $neck=$_POST['neck'];
  $shoulder=$_POST['shoulder'];
  $armhole=$_POST['armhole'];
  $thigh=$_POST['thigh'];
  $outseam=$_POST['outseam'];
  $ankle=$_POST['ankle'];
  $rprice=$_POST['rprice'];
    $type=$dress_select;
    $cust_id=0;
    $des_id=$_POST['des_id'];
    $fabric="null";
   
    $img1=$_FILES["img1"]["name"];
    //$img2=$_FILES["img2"]["name"];
    $sleeves=$_POST['sleeves'];
    $colour=$_POST['colour'];
    $specify="null";
    $size=$_POST['size'];
    $price=0;
    $duration=$_POST['duration'];
    $targetFilePath = $targetDir. $img1;
    //$targetFilePath2 = $targetDir2. $img2;

    //move_uploaded_file($img1,$targetFilePath);
    //$targetFilePath = $targetDir2 . $img2;
    move_uploaded_file($_FILES["img1"]["tmp_name"],$targetFilePath);
   // move_uploaded_file($_FILES["img2"]["tmp_name"],$targetFilePath2);

    $sql="INSERT INTO tbl_customize(type,log_id,des_id,fabric,front,sleeves,colour,specify,size,img1,price,duration) VALUES('$type','$log_id','$des_id','$fabric','$front','$sleeves','$colour','$specify','$size','$img1','$price','$duration')";
    $result = $conn->query($sql);
    
    if($result){
        $custom_id = $conn->insert_id;
        
        $sql4 = "INSERT INTO `tbl_cspecify`( `custom_id`, `dress_select`, `product_select`, `fabric_select`, `bust`, `waist`, `hips`, `highhips`, `arm_length`, `frontwaist_length`, `backwaist_length`, `inseam`, `neck`, `shoulder`, `armhole`, `thigh`, `outseam`, `ankle`, `rprice`, `status`)
                                    VALUES ('$custom_id','$dress_select','$product_select','$fabric_select','$bust','$waist','$hips','$highhips','$arm_length','$frontwaist_length','$backwaist_length','$inseam','$neck','$shoulder','$armhole','$thigh','$outseam','$ankle','$rprice',0)";
   $result2 = $conn->query($sql4);
  }
    if($sql4)
      {
       
    echo "<script>alert('Requested Successfully!!');window.location='my_account.php'</script>";
      }
    else
      {
    echo "<script>alert('Error');window.location='my_account.php'</script>";
      }
    }
    
    
  	
?>
























