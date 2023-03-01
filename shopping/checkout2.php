<?php
include('config.php');

if(isset($_POST["submit"]))
{

    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $pmode=$_POST['pmode'];
    
    
    $sql=mysqli_query($conn,"INSERT INTO tbl_order(order_id,cust_id,cart_id,price,name,email,phone,address,pmode,status) VALUES(null,17,5,2000,'$name','$email','$phone','$address','$pmode',0)");

    if($sql)
      {
       
    echo "<script>alert('Order Details Registered Successfully!!');window.location='adminhome.php'</script>";
      }
    else
      {
    echo "<script>alert('Error');window.location='checkout.php'</script>";
      }
    }
    
    
  	
?>
