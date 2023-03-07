<?php
include('config.php');

if(isset($_POST["submit"]))
{

    $name=$_POST['name'];
    $house=$_POST['house'];
    $road=$_POST['road'];
    $pincode=$_POST['pincode'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $location=$_POST['location'];
    $phone=$_POST['phone'];
    
    $sql=mysqli_query($conn,"INSERT INTO tbl_order(order_id,name,house,road,pincode,city,state,location,phone,status) VALUES(null,'$name','$house','$road','$pincode','$city','$state','$location','$phone',0)");

    if($sql)
      {
       
    echo "<script>alert('Order Details Registered Successfully!!');window.location='my-cart.php'</script>";
      }
    else
      {
    echo "<script>alert('Error');window.location='my-cart.php'</script>";
      }
    }	
?>
