<?php
include('config.php');
session_start();
$email=$_SESSION['email'];
$sqlq="SELECT log_id from tbl_login where email='$email'";
  $resu = mysqli_query($conn, $sqlq);
  $row = mysqli_fetch_assoc($resu);
  $log_id= $row['log_id'];
  echo $log_id;

  
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    $region=$_POST['region'];
    $pincode=$_POST['pincode'];
    $district=$_POST['district'];
  
    $sql=mysqli_query($conn,"INSERT INTO tbl_oaddress(oadd_id,log_id,fname,lname,phone,address,city,region,pincode,district,status) VALUES(null,'$log_id','$fname','$lname','$phone','$address','$city','$region','$pincode','$district',0)");

    if($sql)
      {
       
    echo "<script>alert('Order Details Registered Successfully!!');window.location='my-cart.php'</script>";
      }
    else
      {
    echo "<script>alert('Error');window.location='my-cart.php'</script>";
      }
    

    
?>
