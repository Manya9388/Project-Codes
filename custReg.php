<?php
include('config.php');

if(isset($_POST['submit']))
{
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$city = $_POST['city'];
$email = $_POST['email'];
$region = $_POST['region'];
$district = $_POST['district'];
$pincode = $_POST['pincode'];
$password = $_POST['password'];
$sql="select * from tbl_login where (email='$email' or password='$password');";

      $res=mysqli_query($conn,$sql);

      if (mysqli_num_rows($res) > 0) {
        
        $row = mysqli_fetch_assoc($res);
        if($password==isset($row['password']) || ($email==isset($row['email'])))
        {
            $_SESSION['status'] = "You already have an account.Login to continue";
            echo "Already Registered";
            
        }
	
		}
    else{
 
 $sql2 = "INSERT INTO tbl_login (email,password,role,status) VALUES ('$email','$password','user',0)";
 $sql1 = "INSERT INTO tbl_customerreg (fname,lname,phone,address,city,region,pincode,district,log_id) VALUES ('$fname','$lname','$phone','$address','$city','$region','$pincode','$district','$log_id')";
 if(mysqli_query($conn, $sql1)){
  echo "Records added successfully.";
} 
else{
  echo "ERROR: Could not able to execute $sql1. " . mysqli_error($conn);
}

$sql2 = "INSERT INTO tbl_login (email,password,role,status) VALUES ('$email','$password','user',0)";
if(mysqli_query($conn, $sql2)){
echo "Records added successfully.";
header('LOCATION:login.html');
} else{
echo "ERROR: Could not able to execute $sql2. " . mysqli_error($conn);
}
}
}



?>