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
$password = $_POST['password'];

 $sql1 = "INSERT INTO tbl_designerreg (fname,lname,phone,address,city) VALUES ('$fname','$lname','$phone','$address','$city')";
 $sql2 = "INSERT INTO tbl_login (email,password,role) VALUES ('$email','$password','designer')";
 if(mysqli_query($conn, $sql1)){
    echo "Records added successfully.";
  } 
else{
    echo "ERROR: Could not able to execute $sql1. " . mysqli_error($conn);
  }
  
  $sql2 = "INSERT INTO tbl_login (email,password) VALUES ('$email','$password')";
if(mysqli_query($conn, $sql2)){
  echo "Records added successfully.";
  header('LOCATION:login.html');
} else{
  echo "ERROR: Could not able to execute $sql2. " . mysqli_error($conn);
}
}


?>



