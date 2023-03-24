<?php
include('config.php');

session_start();
if($_SESSION['email']){
    $e=$_SESSION['email'];
}
else{
    header("location:index.php");
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
        
        <!-- Bottom Bar Start -->
        <div class="bottom-bar">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <div class="logo">
                            <a href="#">
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
                    <div class="col-md-3">
                        <div class="user">
                            <a href="#" class="btn wishlist">
                                <i class="fa fa-heart"></i>
                                <span>(0)</span>
                            </a>
                            <a href="#" class="btn cart">
                                <i class="fa fa-shopping-cart"></i>
                                <span>(0)</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bottom Bar End --> 
        
        
        
        <!-- My Account Start -->
        <div class="my-account">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="dashboard-nav" data-toggle="pill" href="#dashboard-tab" role="tab"><i class="fa fa-tachometer-alt"></i>Dashboard</a>
                            <a class="nav-link" id="orders-nav" data-toggle="pill" href="#orders-tab" role="tab"><i class="fa fa-shopping-bag"></i>Orders</a>
                            <a class="nav-link" id="payment-nav" data-toggle="pill" href="#payment-tab" role="tab"><i class="fa fa-credit-card"></i>Payment Method</a>
                            <a class="nav-link" id="address-nav" data-toggle="pill" href="#address-tab" role="tab"><i class="fa fa-map-marker-alt"></i>address</a>
                            <a class="nav-link" id="account-nav" data-toggle="pill" href="#customize-tab" role="tab"><i class="fa fa-user"></i>Feedback</a>
                            <a class="nav-link" href="logout.php"><i class="fa fa-sign-out-alt"></i>Logout</a>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="dashboard-tab" role="tabpanel" aria-labelledby="dashboard-nav">
                                <h4>Dashboard</h4>
                                <p>
                                    
                                </p> 
                            </div>
                            <div class="tab-pane fade" id="orders-tab" role="tabpanel" aria-labelledby="orders-nav">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="thead-dark">
                                            <tr>
                                            <th>SERIAL NO</th>
                                            <th>TYPE</th>
                                            <th>FABRIC</th>
                                            <th>FRONT</th>
                                            <th>SLEEVES</th>
                                            <th>COLOUR</th>
                                            <th>SPECIFY</th>
                                            <th>SIZE</th>
                                            <th>DURATION</th>
                                            <th>PRICE</th>
                                            <!--<th>FABRIC</th>-->
                                            <th style="width:15px";>MODEL</th>
                                            <th>APPROVE</th>
                                            <th>REJECT</th>
                                            </tr>
                                        </thead>
                                        <?php
              include('config.php');
              $query=mysqli_query($conn,"select * from tbl_customize");
              
$cnt=1;
while($row=mysqli_fetch_array($query))
{
    $a='fimages/'.$row["img1"];
?>               
                                        <tbody>
                                        <tr>
                  <td><?php echo htmlentities($cnt);?></td>
                  <td><?php echo htmlentities($row['type']);?></td>
                  <td><?php echo htmlentities($row['fabric']);?></td>
                  <td><?php echo htmlentities($row['front']);?></td>
                  <td><?php echo htmlentities($row['sleeves']);?></td>
                  <td><?php echo htmlentities($row['colour']);?></td>
                  <td><?php echo htmlentities($row['specify']);?></td>
                  <td><?php echo htmlentities($row['size']);?></td>
                  <td><?php echo htmlentities($row['duration']);?></td>
                  <td><?php echo htmlentities($row['price']);?></td> 
                 <?php echo  '<td> <img height="150" width="100" src="fimages/'.$row['img1'].'"> </td>'; ?>
                  <!--<td><?php echo htmlentities($row['img2']);?></td>-->
                  <td>
              
              <?php
                        if($row['status']==1){
                          echo '<p><b><a href="pending.php?id='.$row['custom_id'].'$status=0"style="color:Green;font-size:17px;">Approve</a></b></p>';
                        }else{
                          echo '<p><b><a href="pending.php?id='.$row['custom_id'].'$status=0"style="color:Green;font-size:17px;">Approve</a></b></p>';
                        }
                        ?>
             </td>

             <td>
              
              <?php
                        if($row['status']==0){
                          echo '<p><b><a href="reject.php?id='.$row['custom_id'].'$status=1"style="color:red;font-size:17px;">Reject</a></b></p>';
                        }else{
                          echo '<p><b><a href="reject.php?id='.$row['custom_id'].'$status=1"style="color:red;font-size:17px;">Reject</a></b></p>';
                        }
                        ?>
             </td>

               
              </tr>
                                        </tbody>
                                        <?php $cnt=$cnt+1; } ?>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="payment-tab" role="tabpanel" aria-labelledby="payment-nav">
                                <h4>Payment Method</h4>
                                <p>
                                    
                                </p> 
                            </div>
                            <div class="tab-pane fade" id="address-tab" role="tabpanel" aria-labelledby="address-nav">
                                <h4>Address</h4>
                                <div class="row">
                                    <!--<div class="col-md-6">
                                        <h5>Payment Address</h5>
                                        <p>123 Payment Street, Los Angeles, CA</p>
                                        <p>Mobile: 012-345-6789</p>
                                        <button class="btn">Edit Address</button>
                                    </div>
                                    <div class="col-md-6">
                                        <h5>Shipping Address</h5>
                                        <p>123 Shipping Street, Los Angeles, CA</p>
                                        <p>Mobile: 012-345-6789</p>
                                        <button class="btn">Edit Address</button>
                                    </div>-->
                                </div>
                            </div>
                            <div class="tab-pane fade" id="customize-tab" role="tabpanel" aria-labelledby="account-nav">
                               <!-- <h2> Customize </h2>
                                <!DOCTYPE html>
<html lang="en" dir="ltr">
  
  <body>
    <form method="POST" action="customize.php">
    
    <div class="wrapper">
    
   
    <div class="form">
    <div class="form-group">


          <label>Product Type </label>
          <input type="text" class="input" name="type" placeholder="product name" required>
       </div>
       <div class="form-group">
          <label>Fabric Type </label>
          <input type="text" class="input" name="fabric" placeholder="fabric" required>
       </div> 
       <div class="form-group">
          <label>Front Style</label>
          <input type="text" class="input" name="front" placeholder="front style"  required>
       </div> 
       
       <div class="form-group">
          <label>Colour</label>
          <input type="text" class="input" name="colour" placeholder="colour"  required>
       </div>
       <div class="form-group">
          <label>Specify Requirements</label>
          <textarea class="input" name="specify" placeholder="specify" required></textarea>
       </div>
       <div class="inputfield">
          
          <label for="measure">Size </label>
                                        <select class="form-control m-bot15" name="size">
                                        <option>---Select---</option>
                                    <option>S</option>
                                    <option>M</option>
                                    <option>L</option>
                                    <option>XL</option>
                                    <option>XXL</option>
                                    </select>
       </div> 
       <div class="inputfield">
          
          <label for="measure">Sleeves </label>
                                        <select class="form-control m-bot15" name="sleeves">
                                        <option>---Select---</option>
                                    <option>Full Sleeves</option>
                                    <option>No Sleeves</option>
                                    <option>Elbow Sleeves</option>
                                    <option>Half Sleeves</option>
                                    <option>Others</option>
                                    </select>
       </div> 
       <div class="inputfield">
          <label>My Fabric</label>
          <input type="file" class="form-control" accept="image/gif, image/jpeg, image/png, image/jpg"  name="img1" id="image1">
       </div> 
       <div class="inputfield">
          <label>My Model</label>
          <input type="file" class="form-control" accept="image/gif, image/jpeg, image/png, image/jpg"  name="img2" id="image2">
       </div> 
       <div class="inputfield">
                                    <?php
                                    $con=mysqli_connect("localhost","root","","clothing");
                                    
                                    
                                    $sql=mysqli_query($con,"select * from tbl_designerreg"); 
                                    ?>
                                    <label>Designer Name</label><br>
                                    
                                    
                                    <select   name="des_id" id="des" onchange="showResult(this.value)" class="form-control m-bot15" required >
                                    <option value="">--select--</option>
                                    <?php
                                    while($row=mysqli_fetch_array($sql))
                                    {
                                    
                                    ?>
                                    <option value="<?php echo $row[0] ?>" ><?php echo $row[1] ?></option>
                                    <?php
                                    
                                    }
                                    ?>
                                    
                                    </select></div> 
              
      <div class="inputfield">
        <input type="submit" value="submit" name="submit" class="btn">-->
      
    </div>
    
</div>
</form>
</body>
</html>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- My Account End -->
        
        <!-- Footer Start -->
        <div class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Get in Touch</h2>
                            <div class="contact-info">
                                <p><i class="fa fa-map-marker"></i>Estore Kottayam, Kerala</p>
                                <p><i class="fa fa-envelope"></i>estoreclothings@gmail.com</p>
                                <p><i class="fa fa-phone"></i>+91 9048818583</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                
            </div>
        </div>
        <!-- Footer End -->
        
           
        
        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/slick/slick.min.js"></script>
        
        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
</html>
