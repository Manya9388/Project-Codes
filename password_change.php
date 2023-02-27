<?php
session_start();
if($_SESSION['email']){
   
}
else{
    header("location:index.php");
}
?>
<?php
session_start();
include('config.php');
if(isset($_POST['submit']))
{
$email = $_POST['email'];
        
        $newpassword = $_POST['newpassword'];
        $confirmnewpassword = $_POST['confirmnewpassword'];
        $sql = "SELECT password FROM tbl_login WHERE email='$email'";
        $res=mysqli_query($conn,$sql);
}      
if(!$res)
{
  
    echo "The email you entered does not exist";
    }
    else{
    
    $sql2="UPDATE tbl_login SET password='$newpassword' where email='$email'";
    header("Location: my_account.php");
    }


  ?>