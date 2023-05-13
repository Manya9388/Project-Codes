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
        <script>
                                function Validstrr() 
                                {
                                var val = document.getElementById('type').value;
                                if (!val.match(/^[a-zA-Z ]*$/)) 
                                {
                                  document.getElementById('msg1').innerHTML="Start with a Capital letter & Only alphabets are allowed";
                                        document.getElementById('type').value = "";
                                          return false;
                                }
                                  document.getElementById('msg1').innerHTML=" ";
                                 return true;
                                }
                           </script>
                           <style>
  .star {
    color: #FF6F61;
  }
</style>
<script src="https://code.jquery.com/jquery-3.6.1.js"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>                   
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
                            <a href="shopping/index.php" class="nav-item nav-link">Products</a>
                            <a href="shopping/my-cart.php" class="nav-item nav-link">Cart</a>
                           
                            <a href="#" class="nav-item nav-link active">My Account</a>
                            <a href="http://192.168.43.130:5000/" class="nav-item nav-link active">Search By Image</a>
                            
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">More Pages</a>
                                <div class="dropdown-menu">
                                    <a href="shopping/viewwish.php" class="dropdown-item">Wishlist</a>
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
                                $sql4=mysqli_query($conn,"SELECT r.fname from tbl_customerreg r join tbl_login l on r.log_id= l.log_id where r.log_id='$a' ");
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
                                    <a href="accountview.php" class="dropdown-item">Account</a>
                                    <a href="#" class="dropdown-item">Update</a>
                                    <a href="changep.html" class="dropdown-item">Change Password</a>  
                                </div>
                            </div>
                        </div>&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
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
                        <form method="POST" action="search.php" > 
                            <input type="text" name="search" placeholder="Search">
                            <button name="submit"><i class="fa fa-search"></i></button></form>
                        </div>
                       
                    </div>
                    <div class="col-md-3">
                        <div class="user">
                            <a href="shopping/viewwish.php" class="btn wishlist">
                                <i class="fa fa-heart"></i>
                                <span></span>
                               <?php
                               $sql35=mysqli_query($conn,"SELECT log_id from tbl_login where email='$e'");
                               while($row=mysqli_fetch_array($sql3))
                               {
                                 $a=$row['log_id'];
                               } $sql67 = "SELECT COUNT(*) AS count FROM tbl_wishlist where status=1 and log_id='$a'";
    $result = mysqli_query($conn, $sql67);
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];

    if ($count > 0) {
        echo '<span class="count">' . $count . '</span>';
    }?>
                            </a>
                            <a href="shopping/my-cart.php" class="btn cart">
                                <i class="fa fa-shopping-cart"></i>
                                <span></span>
                              <?php 
                                $sql35=mysqli_query($conn,"SELECT log_id from tbl_login where email='$e'");
                                while($row=mysqli_fetch_array($sql3))
                                {
                                  $a=$row['log_id'];
                                } $sql66 = "SELECT COUNT(*) AS count FROM tbl_cart where log_id='$a'and status=0";
    $result = mysqli_query($conn, $sql66);
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];

    if ($count > 0) {
        echo '<span class="count">' . $count . '</span>';
    }?>
                            </a>
                           
                            <a onClick='myFunction()' class="btn cart">
                            <i style="font-size:20px" class="fa">&#xf0f3;</i>
                                <span></span>
                               <?php
                               $sql35=mysqli_query($conn,"SELECT log_id from tbl_login where email='$e'");
                               while($row=mysqli_fetch_array($sql3))
                               {
                                 $a=$row['log_id'];
                               }
                                $sql = "SELECT COUNT(*) AS count FROM tbl_torder where status NOT IN (0, 5) and log_id='$a'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];

    if ($count > 0) {
        echo '<span class="count">' . $count . '</span>';
        
    }
        ?>                    </a>
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
                            <a class="nav-link" id="orders-nav" data-toggle="pill" href="#orders-tab" role="tab"><i class="fa fa-shopping-bag"></i>Customized Orders</a>
                            <a class="nav-link" id="payment-nav" data-toggle="pill" href="#payment-tab" role="tab"><i class="fa fa-credit-card"></i>Order History</a>
                            <a class="nav-link" href="old/index.php"><i class="fa fa-sign-out-alt"></i>Customize T-Shirt</a>
                            <a class="nav-link" id="torders-nav" data-toggle="pill" href="#torders-tab" role="tab"><i class="fa fa-shopping-bag"></i>Approved T-Shirt</a>
                            <a class="nav-link" id="account-nav" data-toggle="pill" href="#customize-tab" role="tab"><i class="fa fa-user"></i>Customize Garments</a>
                            <a class="nav-link" href="logout.php"><i class="fa fa-sign-out-alt"></i>Logout</a>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="dashboard-tab" role="tabpanel" aria-labelledby="dashboard-nav">
                                <h4>Dashboard</h4>
                                </p> 
                            </div>
                            <div class="tab-pane fade" id="orders-tab" role="tabpanel" aria-labelledby="orders-nav">
                                <div class="table-responsive">
                                  <form action="star.php" method ="POST">
                                    <table class="table table-bordered">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>No</th>
                                                <th>Product</th>
                                                <th>Designer Number</th>
                                                <th>Price</th>
                                               <!-- <th>Duration</th>-->
                                                <th>Action</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <?php
             // include('config.php');
             $sql35=mysqli_query($conn,"SELECT log_id from tbl_login where email='$e'");
             while($row=mysqli_fetch_array($sql35))
             {
               $a=$row['log_id'];
             }
              $query=mysqli_query($conn,"SELECT tbl_customize.type,tbl_customize.status,tbl_designerreg.phone,tbl_customize.custom_id,tbl_customize.price from tbl_customize join tbl_designerreg on tbl_customize.des_id=tbl_designerreg.des_id AND tbl_customize.log_id='$a'");
              
$cnt=1;
while($row=mysqli_fetch_array($query))
{
    $custom_id=$row['custom_id'];
    $price2=$row['price'];
    $price=$price2/2;
?>               
                                        <tbody>
                                        <tr>
                  <td><?php echo htmlentities($cnt);?></td>
                  <td><?php echo htmlentities($row['type']);?></td>
                  <td><?php echo htmlentities($row['phone']);?></td>
                  <td>
  <?php 
    $custom_id = $row['custom_id'];
    $sql = "SELECT s_action FROM tbl_sgarments WHERE custom_id='$custom_id' AND advpay_status='paid'";
    $result = mysqli_query($conn, $sql);
    $num_rows = mysqli_num_rows($result);
    if ($num_rows > 0) {
      echo "Advance Paid";
    } else {
      echo htmlentities($row['price']);
      echo "<br>";
      echo '<input type="button" id="rzp-button1" name="btn" value="Advance Pay" class="btn btn-primary" onclick="pay_now('.$price.')"/>';
    }
  ?>
</td>
<!-- <td><?php echo htmlentities($row['duration']);?></td>-->
            
                <?php
               if($row['status'] ==2){
									  echo "<td>Approved</td>";
									}
									else if($row['status'] ==0){
									  echo "<td>Pending</td>";
									}
									else if($row['status'] == -1){
									  echo "<td>Rejected</td>";
									}
               ?>
               <?php
             $sql36=mysqli_query($conn,"SELECT * from tbl_sgarments where custom_id='$custom_id' and status=0");
             while($row=mysqli_fetch_array($sql36))
             {?>
               <td><a href="sgarmentsview.php?s_id=<?php echo $row['s_id'];?>">View Status</a></td>
             <?php }
             ?>
              <?php
             $sql38=mysqli_query($conn,"SELECT * from tbl_sgarments where custom_id='$custom_id' and status=1");
             while($row=mysqli_fetch_array($sql38))
             {?>
               <td>Order Confirmed <br>
               <form class="rating" method="POST" action="star.php">
               <input type="hidden" id="name1" value="<?php echo $e; ?>">
               <input type="text" value="<?php echo $row['custom_id']?>" name="custom_id" hidden>
               
                                    <label>
                                      <input type="radio" name="stars" value="1" />
                                      <span class="star">★</span>
                                    </label>
                                    <label>
                                      <input type="radio" name="stars" value="2" />
                                      <span class="star">★</span>
                                      <span class="star">★</span>
                                    </label>
                                    <label>
                                      <input type="radio" name="stars" value="3" />
                                      <span class="star">★</span>
                                      <span class="star">★</span>
                                      <span class="star">★</span>   
                                    </label>
                                    <label>
                                      <input type="radio" name="stars" value="4" />
                                      <span class="star">★</span>
                                      <span class="star">★</span>
                                      <span class="star">★</span>
                                      <span class="star">★</span>
                                    </label>
                                    <label>
                                      <input type="radio" name="stars" value="5" />
                                      <span class="star">★</span>
                                      <span class="star">★</span>
                                      <span class="star">★</span>
                                      <span class="star">★</span>
                                      <span class="star">★</span>
                                    </label>
            
                                    <button type="submit" name=submit>Submit</button> 
                              </form></td>
             <?php }
             ?>
              </tr>  
                                        </tbody>
                                        <?php $cnt=$cnt+1; } ?>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="torders-tab" role="tabpanel" aria-labelledby="torders-nav">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>No</th>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <?php
             // include('config.php');
             $sql31=mysqli_query($conn,"SELECT log_id from tbl_login where email='$e'");
                                while($row=mysqli_fetch_array($sql31))
                                {
                                  $a=$row['log_id'];
                                }
              $query=mysqli_query($conn,"SELECT * from tbl_torder where log_id='$a' and status != 5");
              
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>               
                                        <tbody>
                                        <tr>
                  <td><?php echo htmlentities($cnt);?></td>
                  <?php echo  '<td> <img height="250" width="250" src="shopping/timages/'.$row['timg'].'"> </td>'; ?>
                  <td><?php echo htmlentities($row['price']);?></td>
                     <?php
               if($row['status'] ==2){
									  echo "<td>Product Available</td>";
									}
									else if($row['status'] ==0){
									  echo "<td>Pending</td>";
									}
									else if($row['status'] == -1){
									  echo "<td>Rejected</td>";
									}
               ?>
             <td> <a href="notificationdel.php?to_id=<?php echo $row['to_id']?>">OK</a></td>
              </tr>  
                                        </tbody>
                                        <?php $cnt=$cnt+1; } ?>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="payment-tab" role="tabpanel" aria-labelledby="payment-nav">
                                <h4>Order History</h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>No</th>
                                                <th>Product Name</th>
                                                <th>Amount</th>
                                                <th>Order Date</th>
                                                <th>Arrival Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                </table>
                                </div>
                            </div>
                            
                            <div class="tab-pane fade" id="customize-tab" role="tabpanel" aria-labelledby="account-nav">
                                <h1> Customize </h1>
                                <h6><i><b>Hello! What can we stitch for you ?</b></i></h6>
                                <!DOCTYPE html>
<html lang="en" dir="ltr">
  
  <body>
    <form method="POST" action="customize.php" enctype="multipart/form-data">
    
    <div class="wrapper">
    <div class="form">
    <div class="form-group">
    <label>Product Type : </label>
   
  <select id="dress-select" name="dress-select" onchange="changeProductOptions();changeImage()">
    <option value="">--Select a Type--</option>
    <option value="croptop">Crop Tops</option>
    <option value="gown">Gown</option>
    <option value="skirt">Skirt</option>
    <option value="frock">Frock</option>
  </select><br>

  <div id="image-container"></div><br> 
<label>Product Name:</label>
<select id="product-select" name="product-select">
  <option value="">--Select a Name--</option>
</select><br>

</div>
       
                                    
       <div class="form-group">
          <label>Fabric Type </label>
          <select id="fabric-select" name="fabric-select" onchange="removeImage()" >
    <option value="">--Select a Type--</option>
    <option value="cotton">Cotton</option>
    <option value="velvet">Velvet</option>
    <option value="jersey">Jersey</option>
    <option value="silk">Silk</option>
    <option value="wool">wool</option>
    <option value="denim">Denim</option>
    <option value="satin">Satin</option>
    <option value="jacquard">Jacquard</option>
    <option value="linen">Linen</option>
    <option value="rayon">Rayon</option>
    <option value="chiffon">Chiffon</option>
    <option value="chenille">Chenille</option>
    <option value="baize">Baize</option>
    <option value="charmeuse">Charmeuse</option>
    <option value="cheviot">Cheviot</option>
    <option value="dinity">Dinity</option>
    <option value="drill">Drill</option>
    <option value="felt">Felt</option>
    <option value="twill">Twill</option>
    <option value="poplin">Poplin</option>
    <option value="georgette">Georgette</option>
  </select><br>

  <img id="fimage" src="cimg/fabric-pattern.png" alt="" width="300" height="250" style="float:right;"><br>
       </div> 
       <div class="form-group">
          <label>Neckline </label>
          <select id="neck-select" name="neck-select" onchange="removeImage2()" >
    <option value="">--Select a Type--</option>
    <option value="round">Round Neck</option>
    <option value="crew">Crew Neck</option>
    <option value="high">High Neck</option>
    <option value="turtle">Turtle Neck</option>
    <option value="u">U-Neck</option>
    <option value="square">Square</option>
    <option value="stapless">Stapless Sweetheart</option>
    <option value="spagetti">Spagetti Strap</option>
    <option value="halter">Halter</option>
    <option value="sweetheart">Sweetheart</option>
    <option value="v">V-Neck</option>
    <option value="plunging">Plunging Neckline</option>
    <option value="cowl">Cowl</option>
    <option value="haltershap">Halter Shap</option>
    <option value="jewel">Jewel Neckline</option>
    <option value="boat">Boat Neckline</option>
    <option value="off">Off-Shoulder</option>
    <option value="one">One-Shoulder</option>
    
  </select><br>

  <img id="nimage" src="cimg/neckline-pattern.jpg" alt="" width="300" height="250" style="float:right;"><br>
       </div>
         
       <div class="form-group">
          <label>Colour</label>
          <input type="color" id="colorPicker" name="colour" value="#ff0000">
       </div><br>
       <div class="form-group">
      
       <label for="bust">Bust:</label>
  <input type="number" id="bust" name="bust" required><br><br>

  <label for="waist">Waist:</label>
  <input type="number" id="waist" name="waist" required><br><br>

  <label for="hips">Hips:</label>
  <input type="number" id="hips" name="hips" required><br><br>
  <img  src="cimg/measures.jpg" alt="" width="350" height="550" style="float:right;"><br>
  <label for="highhips">High Hips:</label>
  <input type="number" id="highhips" name="highhips" required><br><br>
  <label for="arm-length">Arm Length:</label>
  <input type="number" id="arm-length" name="arm-length" required><br><br>
  <label for="frontwaist-length">Front Waist Length:</label>
  <input type="number" id="frontwaist-length" name="frontwaist-length" required><br><br>
  <label for="backwaist-length">Back Waist Length:</label>
  <input type="number" id="backwaist-length" name="backwaist-length" required><br><br>
  <label for="inseam">Inseam:</label>
  <input type="number" id="inseam" name="inseam" required><br><br>

  <label for="neck">Neck:</label>
  <input type="number" id="neck" name="neck" required><br><br>

  <label for="shoulder">Shoulder:</label>
  <input type="number" id="shoulder" name="shoulder" required><br><br>

  <label for="armhole">Armhole:</label>
  <input type="number" id="armhole" name="armhole" required><br><br>

  <label for="thigh">Thigh:</label>
  <input type="number" id="thigh" name="thigh" required><br><br>

  <label for="outseam">Outseam:</label>
  <input type="number" id="outseam" name="outseam" required><br><br>

  <label for="ankle">Ankle:</label>
  <input type="number" id="ankle" name="ankle" required><br><br>

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
       <!--<div class="inputfield">
          <label>My Fabric</label>
          <input type="file" class="form-control" accept="image/gif, image/jpeg, image/png, image/jpg"  name="img1" id="image1">
       </div> -->
       <div class="inputfield">
          <label>My Model</label>
          <input type="file" class="form-control" accept="image/gif, image/jpeg, image/png, image/jpg"  name="img1" id="image1">
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
                                    
                                    </select>
                                  </div> 
                                  <div class="form-group">
  <label>Expected Price</label>
  <select class="form-control m-bot15" name="rprice">
    <option value="">---price range---</option>
    <option value="high">High</option>
    <option value="medium">Medium</option>
    <option value="low">Low</option>
  </select>
</div>
       <div class="form-group">
          <label>Duration</label>
          <input type="date" class="input" name="duration" placeholder="Duration" required min="<?php echo date('Y-m-d', strtotime('+1 week')); ?>">
       </div>
              
      <div class="inputfield">
        <input type="submit" value="submit" name="submit" class="btn">
      
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
                            
                                <br>
                                <h2>Available Designers</h2>
                                <?php



// SQL query to get designer info and average rating
$sql = "SELECT d.fname, d.lname, d.phone, d.city, AVG(r.rating) AS avg_rating
        FROM tbl_designerreg d
        INNER JOIN tbl_rating r ON d.des_id = r.des_id
        GROUP BY d.des_id";

// Execute query
$result = mysqli_query($conn, $sql);

// Check if there are any results
if (mysqli_num_rows($result) > 0) {

  // Print table header
  echo "<table><tr><th> Name</th><th> </th><th>Phone</th><th>City</th><th> Rating</th></tr>";

  // Loop through results and print each row
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>" . $row["fname"] . "</td><td>" . $row["lname"] . "</td><td>" . $row["phone"] . "</td><td>" . $row["city"] . "</td><td>";
   
    // Generate star rating based on average rating value
    for ($i = 1; $i <= round($row["avg_rating"]); $i++) {
      echo '<span class="star">&#9733;</span>'; // Unicode star symbol inside a span element with the class "star"
    }
    echo "</td></tr>";
  }

  // Print table footer
  echo "</table>";

} else {
  echo "No results found";
}


?>

<br>
<br>
<h2>Get in Touch</h2>
                            <div class="contact-info">
                                <p><i class="fa fa-map-marker"></i>Estore Kottayam, Kerala</p>
                                <p><i class="fa fa-envelope"></i>estoreclothings@gmail.com</p>
                                <p><i class="fa fa-phone"></i>+91 9048818583</p>
                                <br>

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
        <script>
function myFunction() {
  alert("The Customized T-shirt is Now Available!! You can purchase it.");
  window.location.href = "shopping/category.php?cat_id=14";
}
</script>
<script>
function changeImage() {
  var select = document.getElementById("dress-select");
  var container = document.getElementById("image-container");
  var image= document.createElement("img");
  image.alt="";

  if (select.value === "croptop") {
    image.src = "cimg/ctpattern.jpg";
    image.alt = "croptop";
    image.width= 450;
    image.height=400;
  } else if (select.value === "skirt") {
    image.src = "cimg/skirtpattern.png";
    image.alt = "skirt";
    image.width= 450;
    image.height=400;
  } else if (select.value === "frock") {
    image.src = "cimg/frock-pattern.jpg";
    image.alt = "frock";
    image.width= 450;
    image.height=400;
  } 
  else if (select.value === "gown") {
    image.src = "cimg/gown-pattern.jpg";
    image.alt = "gown";
    image.width= 450;
    image.height=400;
  }else {
    container.innerHTML="";
    return;
  }
 
  container.innerHTML="";
  container.appendChild(image);
}
</script>
<script>
    function removeImage() {
  var fSelect = document.getElementById("fabric-select");
  var fImage = document.getElementById("fimage");
 
  if (fSelect.value == "cotton") {
    fImage.style.display = "none";
  }
  else if (fSelect.value == "velvet") {
    fImage.style.display = "none";
  }
  else if (fSelect.value == "jersey") {
    fImage.style.display = "none";
  }
  else if (fSelect.value == "silk") {
    fImage.style.display = "none";
  } 
  else if (fSelect.value == "wool") {
    fImage.style.display = "none";
  } 
  else if (fSelect.value == "denim") {
    fImage.style.display = "none";
  } 
  else if (fSelect.value == "satin") {
    fImage.style.display = "none";
  } 
  else if (fSelect.value == "jacquard") {
    fImage.style.display = "none";
  } 
  else if (fSelect.value == "linen") {
    fImage.style.display = "none";
  } 
  else if (fSelect.value == "rayon") {
    fImage.style.display = "none";
  } 
  else if (fSelect.value == "chiffon") {
    fImage.style.display = "none";
  } 
  else if (fSelect.value == "chenille") {
    fImage.style.display = "none";
  } 
  else if (fSelect.value == "baize") {
    fImage.style.display = "none";
  } 
  else if (fSelect.value == "charmeuse") {
    fImage.style.display = "none";
  } 
  else if (fSelect.value == "cheviot") {
    fImage.style.display = "none";
  } 
  else if (fSelect.value == "dimity") {
    fImage.style.display = "none";
  } 
  else if (fSelect.value == "drill") {
    fImage.style.display = "none";
  } 
  else if (fSelect.value == "felt") {
    fImage.style.display = "none";
  } 
  else if (fSelect.value == "twill") {
    fImage.style.display = "none";
  } 
  else if (fSelect.value == "poplin") {
    fImage.style.display = "none";
  } 
  else if (fSelect.value == "georgette") {
    fImage.style.display = "none";
  } 
  else {
    fImage.style.display = "inline-block";
  }
}
    </script>

<script>
    function removeImage2() {
  var nSelect = document.getElementById("neck-select");
  var nImage = document.getElementById("nimage");
 
  if (nSelect.value == "round") {
    nImage.style.display = "none";
  }
  else if (nSelect.value == "crew") {
    nImage.style.display = "none";
  }
  else if (nSelect.value == "high") {
    nImage.style.display = "none";
  }
  else if (nSelect.value == "turtle") {
    nImage.style.display = "none";
  }
  else if (nSelect.value == "u") {
    nImage.style.display = "none";
  }
  else if (nSelect.value == "square") {
    nImage.style.display = "none";
  } 
  else if (nSelect.value == "stapless") {
    nImage.style.display = "none";
  }
  else if (nSelect.value == "spagetti") {
    nImage.style.display = "none";
  }
  else if (nSelect.value == "halter") {
    nImage.style.display = "none";
  }
  else if (nSelect.value == "sweetheart") {
    nImage.style.display = "none";
  }
  else if (nSelect.value == "v") {
    nImage.style.display = "none";
  }
  else if (nSelect.value == "plunging") {
    nImage.style.display = "none";
  }
  else if (nSelect.value == "cowl") {
    nImage.style.display = "none";
  }
  else if (nSelect.value == "halter") {
    nImage.style.display = "none";
  }
  else if (nSelect.value == "jewel") {
    nImage.style.display = "none";
  }
  else if (nSelect.value == "boat") {
    nImage.style.display = "none";
  }
  else if (nSelect.value == "off") {
    nImage.style.display = "none";
  }
  else if (nSelect.value == "one") {
    nImage.style.display = "none";
  }
  
   else {
    nImage.style.display = "inline-block";
  }
}
    </script>
    <script>
//   console.log("hello");
// var amt ="100";
    function pay_now(){
		var name = jQuery('#name1').val();
		console.log(name);
		
        var amount=<?php echo $price ?>;
        console.log(amount);
        var options =  {
            "key": "rzp_test_LTTLupnsoN3Mu7", // Enter the Key ID generated from the Dashboard
            "amount": amount*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
            "currency": "INR",
            "name": "Clothing Management System",
            "description": "Test Transaction",
            "image": "https://example.com/your_logo",
            "handler":function(response){
              
               jQuery.ajax({
                   type:"POST",
                   url: "advpayment_process.php",
                   data:"payment_id="+response.razorpay_payment_id+"&amount="+amount,
                   success:function(result){
                       window,location.href="shopping/thankyou.php";
                   }
               });
              
      }
        
    
};
var rzp1 = new Razorpay(options);

    rzp1.open();
    
    }
///enable code/////

 
</script>
<script>
  function changeProductOptions() {
  const dressSelect = document.getElementById("dress-select");
  const productSelect = document.getElementById("product-select");

  // Clear existing options in product select dropdown
  productSelect.innerHTML = "<option value=''>--Select a Name--</option>";

  // Check selected dress type and update product select dropdown accordingly
  if (dressSelect.value === "croptop") {
    productSelect.innerHTML += `
      <option value="belted">Belted</option>
      <option value="blouson">Blouson</option>
      <option value="blouse">Blouse</option>
      <option value="camisole">Camisole</option>
      <option value="cardigan">Cardigan</option>
      <option value="bustiere">Bustiere</option>
      <option value="cropped">Cropped</option>
      <option value="cross-over">Cross-Over</option>
      <option value="hoodie">Hoodie</option>
      <option value="oversize">Oversize</option>
      <option value="peasant">Peasant</option>
      <option value="peplum">Peplum</option>
      <option value="polo">Polo</option>
      <option value="poncho">Poncho</option>
      <option value="ruffle">Ruffle</option>
      <option value="shell">Shell</option>
      <option value="shirt">Shirt</option>
      <option value="singlet">Singlet</option>
      <option value="tiered">Tiered</option>
      <option value="tiefront">Tie Front</option>
      <option value="tubetop">Tube Top</option>
      <option value="tunic">Tunic</option>
      <option value="twistfront">Twist Front</option>
      <option value="waterfall">Waterfall</option>
    `;
  } else if (dressSelect.value === "gown") {
    productSelect.innerHTML += `
      <option value="kaleigh">Kaleigh</option>
      <option value="arden">Arden</option>
      <option value="leanna">Leanna</option>
      <option value="melinda">Melinda</option>
      <option value="pierrette">Pierrette</option>
      <option value="veronica">Veronica</option>
      <option value="iman">Iman</option>
      <option value="ginger">Ginger</option>
      <option value="bonnie">Bonnie</option>
      <option value="carolina">Carolina</option>
      <option value="demi">Demi</option>
      <option value="molly">Molly</option>
      <option value="kaitlynn">Kaitlynn</option>
      <option value="cora">Cora</option>
      <option value="misha">Misha</option>
    `;
  }else if (dressSelect.value === "skirt") {
    productSelect.innerHTML += `
      <option value="a-line skirt">A-Line Skirt</option>
      <option value="bodycon">Bodycon</option>
      <option value="boxpleated">Box Pleated</option>
      <option value="wraparound">Wrap Around</option>
      <option value="asymmetrical">Asymmetrical</option>
      <option value="pencil">Pencil</option>
      <option value="ethnic maxi">Ethnic Maxi</option>
      <option value="tulle">Tulle</option>
      <option value="lace">Lace</option>
      <option value="flared">Flared</option>
   >
    `;
  }else if (dressSelect.value === "frock") {
    productSelect.innerHTML += `
      <option value="fullskirt dress">Full Skirt Dress</option>
      <option value="alineskirt dress">A-line Skirt Dress</option>
      <option value="wrap dress">Wrap Dress</option>
      <option value="empire waist dress">Empire Waist Dress</option>
      <option value="sheath dress">Sheath Dress</option>
      <option value="bodycon dress">Bodycon Dress</option>
      <option value="baby doll dress">Baby Doll Dress</option>
      <option value="shift dress">Shift Dress</option>
      <option value="spaguetti straps">Spaguetti Straps</option>
      <option value="halter">Halter</option>
  
    `;
  }
}

  </script>

    </body>
</html>