<?php
    session_start(); 
    include ('config.php');
    $e = $_SESSION['email'];
    $targetDir="simages/";
    if(isset($_POST['submit']))
{
    
            $custom_id= $_GET['custom_id'];
            
            $sprice=$_POST['sprice'];
            $img5=$_FILES["img5"]["name"];
            $targetFilePath = $targetDir. $img5;
            move_uploaded_file($_FILES["img5"]["tmp_name"],$targetFilePath);
            $sql=mysqli_query($conn,"INSERT INTO tbl_sgarments(custom_id,sprice,img5,advpay_status,status) VALUES('$custom_id','$sprice','$img5','Nill',0)");
            $sql5=mysqli_query($conn,"UPDATE `tbl_customize` SET `price`='$sprice' WHERE custom_id=$custom_id");
    if($sql)
      {
       
    echo "<script>alert('Sended Successfully!!');window.location='deshome.php'</script>";
      }
    else
      {
    echo "<script>alert('Error');window.location='deshome.php'</script>";
      }
    }
    
    
  	
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Clothing Management System</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="eCommerce HTML Template Free Download" name="keywords">
        <meta content="eCommerce HTML Template Free Download" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/slick/slick.css" rel="stylesheet">
        <link href="lib/slick/slick-theme.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
        <!-- Top bar Start -->
        <div class="top-bar">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <i class="fa fa-envelope"></i>
                        estoreclothings@gmail.com
                    </div>
                    <div class="col-sm-6">
                        <i class="fa fa-phone-alt"></i>
                        +91 9048818583
                    </div>
                </div>
            </div>
        </div>
        <!-- Top bar End -->
        
        <!-- Nav Bar Start -->
        <div class="nav">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                    <a href="#" class="navbar-brand">MENU</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto">
                            <a href="#" class="nav-item nav-link">Home</a>
                            
                            <a href="#" class="nav-item nav-link active">My Account</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">More Pages</a>
                                <div class="dropdown-menu">
                                   
                                    <a href="#" class="dropdown-item">Contact Us</a>
                                </div>
                            </div>
                        </div>
                        <?php
                                $sql3=mysqli_query($conn,"SELECT log_id from tbl_login where email='$e'");
                                while($row=mysqli_fetch_array($sql3))
                                {
                                  $a=$row['log_id'];
                                }
                                $sql4=mysqli_query($conn,"SELECT r.fname from tbl_designerreg r join tbl_login l on r.log_id= l.log_id where r.log_id='$a' ");
                                while($row=mysqli_fetch_array($sql4))
                                {
                                  $b=$row['fname'];
                                ?>
                        <div class="navbar-nav ml-auto">
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><?php echo $row['fname']; ?></a>
                                <?php
                            }
                            ?>
                                <div class="dropdown-menu">
                                    <a href="#" class="dropdown-item">Account</a>
                                    <a href="#" class="dropdown-item">Update</a>
                                    <a href="changep.html" class="dropdown-item">Change Password</a>
                                </div>
                            </div>
                        </div>&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;
                    </div>
                </nav>
            </div>
        </div>
        <!-- Nav Bar End -->
        <body>
    <form method="POST" action="#" enctype="multipart/form-data">
<div class="wrapper">
    <center><div class="title">
      <b>Updates of stiched items</b>
    </div></center>
    <div class="form">
    <br><center> <div class="inputfield">
          <label>Product Price:</label>
          <input type="number" step="1" min="100" class="input" name="sprice" placeholder="Price" required />
         
       </div> </center>
       <br><center> <div class="inputfield">
          <label>Stitched Image:</label>
          <input type="file" class="form-control" accept="image/gif, image/jpeg, image/png, image/jpg"  name="img5" id="image5">
         
       </div> </center>  
       <br> <center><div class="inputfield">
        <input type="submit" value="Send" name="submit" class="btn">
      </div></center>
      <br> <center><div class="inputfield">
      <div><input type="cancel" name="cancel" value="Cancel" onClick="document.location.href='deshome.php';"class="btn" /></div>
      </div></center>
    </div>
</div>
</form><style>
.inputfield input[type="file"] {
  width: 250px; /* specify a smaller width for the input field */
}</style>
<script type="text/javascript" src="date.js"></script>
</body>
</html>