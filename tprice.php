            <?php
    session_start(); 
    include ('config.php');
    $email = $_SESSION['email'];
    if(isset($_POST['submit']))
{
    
            $to_id= $_GET['to_id'];
            $price= $_POST['price'];
            $update = mysqli_query($conn, "UPDATE `tbl_torder` SET `price`= '$price' WHERE to_id='$to_id'");
                if($update){
                    echo "<script>
                    alert('Price Added.');
                        window.href=location='adminhome.php';
                    </script>";      
                }}?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Clothing Management System</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="eCommerce " name="keywords">
        <meta content="eCommerce " name="description">

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
                            <a href="adminhome.php" class="nav-item nav-link">Home</a>
                            
                          
                            
                        </div>
                        
                        <div class="navbar-nav ml-auto">
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Admin</a>
                                
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Nav Bar End -->      
        
        <!-- Bottom Bar Start -->
        <div class="bottom-bar">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <div class="logo">
                            <a href="index.html">
                                <img src="img/logo.png" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="search">
                            <input type="text" placeholder="Search">
                            <button><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- Bottom Bar End --> 
        
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Products</a></li>
                    <li class="breadcrumb-item active">Admin</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
       
  
  <body>
    <form method="POST" action="#">
<div class="wrapper">
    <center><div class="title">
      <b>ADD PRICE</b>
    </div></center>
    <div class="form">
    <br><center> <div class="inputfield">
          <label>Product Price:</label>
          <input type="number" step="0.00000001" min="100" class="input" name="price" placeholder="Price" required />
         
       </div> </center>  
       <br> <center><div class="inputfield">
        <input type="submit" value="Apply" name="submit" class="btn">
      </div></center>
      <br> <center><div class="inputfield">
      <div><input type="cancel" name="cancel" value="Cancel" onClick="document.location.href='adminhome.php';"class="btn" /></div>
      </div></center>
    </div>
</div>
</form>
<script type="text/javascript" src="date.js"></script>
</body>
</html>