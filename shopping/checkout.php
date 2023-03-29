<?php
	
	include('config.php');
	session_start();
 $email=$_SESSION['email'];
 $all_total=$_SESSION['all_total'];
	$sqlq="SELECT log_id from tbl_login where email='$email'";
$resu = mysqli_query($conn, $sqlq);
$row = mysqli_fetch_assoc($resu);
$log_id= $row['log_id'];

//$sql = mysqli_query($conn,"SELECT userid from userreg where logid='$logid'");
//while($row=mysqli_fetch_array($sql)){
  //$userid = $row['userid'];
//}
if(isset($_POST['up'])) 
// code for billing address updation
{
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $address=$_POST['address'];
  $city=isset($_POST['city']) ? $_POST['city'] : null;
  $region=$_POST['region'];
  $district=$_POST['district'];
  $pincode=$_POST['pincode'];
  $phone=$_POST['phone'];
  $query=mysqli_query($conn,"update tbl_oaddress set log_id='$log_id', fname='$fname', lname='$lname',phone='$phone',address='$address',city='$city',region='$region',pincode='$pincode',district='$district' where log_id='$log_id'");
  if($query)
  {
    echo "<script>
    alert('Address is Updated');
        window.href=location='checkout.php';
    </script>";
  
  }
}

if(isset($_POST['insert'])) 
// code for billing address updation
{
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $address=$_POST['address'];
  $city=isset($_POST['city']) ? $_POST['city'] : null;
  $region=$_POST['region'];
  $district=$_POST['district'];
  $pincode=$_POST['pincode'];
  $phone=$_POST['phone'];
 
  $query=mysqli_query($conn,"INSERT INTO `tbl_oaddress`(`log_id`, `fname`,`lname`, `phone`, `address`, `city`, `region`, `pincode`, `district`,`status`) VALUES ('$log_id','$fname','$lname','$phone',' $address','$city','$region','$pincode','$district',0)");
  if($query)
  {
    echo "<script>
    alert('Address is Updated');          
        window.href=location='checkout.php';
    </script>";
  
  }
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
	    <meta name="keywords" content="MediaCenter, Template, eCommerce">
	    <meta name="robots" content="all">

	    <title>My Cart</title>
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	    <link rel="stylesheet" href="assets/css/main.css">
	    <link rel="stylesheet" href="assets/css/green.css">
	    <link rel="stylesheet" href="assets/css/owl.carousel.css">
		<link rel="stylesheet" href="assets/css/owl.transitions.css">
		<!--<link rel="stylesheet" href="assets/css/owl.theme.css">-->
		<link href="assets/css/lightbox.css" rel="stylesheet">
		<link rel="stylesheet" href="assets/css/animate.min.css">
		<link rel="stylesheet" href="assets/css/rateit.css">
		<link rel="stylesheet" href="assets/css/bootstrap-select.min.css">

		<!-- Demo Purpose Only. Should be removed in production -->
		<link rel="stylesheet" href="assets/css/config.css">

		<link href="assets/css/green.css" rel="alternate stylesheet" title="Green color">
		<link href="assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
		<link href="assets/css/red.css" rel="alternate stylesheet" title="Red color">
		<link href="assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
		<link href="assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">
		<!-- Demo Purpose Only. Should be removed in production : END -->

		
		<!-- Icons/Glyphs -->
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">

        <!-- Fonts --> 
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="assets/images/favicon.ico">

		<!-- HTML5 elements and media queries Support for IE8 : HTML5 shim and Respond.js -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
		<script src="https://code.jquery.com/jquery-3.6.1.js"></script>
       <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
	<style>
    .center {
      margin-top: -35px;  
  top:-80px;
}
</style>
</head>
	

		</head>
		<body class="cnt-home">
	
			
	
	<!-- ============================================== HEADER ============================================== -->

<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="index.php"style="font-size:17px">Home</a></li>
				<li class='active'style="font-size:17px">Shopping Cart</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<form method="post" action="">
<div class="body-content outer-top-xs">
<div class="container"">
	<div class="row inner-bottom-sm">
		<div class="shopping-cart">
			<div class="col-md-12 col-sm-12 shopping-cart-table ">
            <div class="table-responsive">			
            <body>
 
  
 <main>

     <!-- DEMO HTML -->
     <div class="container">
  <div class="py-5 text-center">
    
  <h2 class="center"style="text-align:center;">Checkout form</h2><br><br>

  </div>

  <?php
	$email=$_SESSION['email'];
	$sqlq="SELECT log_id from tbl_login where email='$email'";
$resu = mysqli_query($conn, $sqlq);
$row = mysqli_fetch_assoc($resu);
$log_id= $row['log_id'];



$sql = "SELECT product_id from tbl_cart where log_id='$log_id'";
$res = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($res);
$product_id= $row['product_id'];


$query=mysqli_query($conn,"select * from tbl_oaddress where log_id='$log_id'");
if(mysqli_num_rows($query) > 0) {
  while($row=mysqli_fetch_array($query)) {
?>
  <div class="row">
    <div class="col-md-4 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Your Order</span>
        
      </h4>
      <ul class="list-group mb-3">
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
          <h6 class="my-0"style="color:#000080;font-size:14px"><?php echo htmlentities($row['fname']);?>&nbsp;&nbsp;<?php echo htmlentities($row['lname']);?></h6>
            <small class="text-muted">Name</small>
          </div>
  </li>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0"style="color:#000080;font-size:14px"><?php echo htmlentities($row['address']);?></h6>
            <small class="text-muted">Shipping Address</small>
          </div>
        </li>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0"style="color:#000080;font-size:14px"><?php echo htmlentities($row['city']);?></h6>
            <small class="text-muted">Shipping City</small>
          </div>
        </li>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0"style="color:#000080;font-size:14px"><?php echo htmlentities($row['region']);?></h6>
            <small class="text-muted">Region</small>
          </div>
        </li>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0"style="color:#000080;font-size:14px"><?php echo htmlentities($row['district']);?></h6>
            <small class="text-muted">District</small>
          </div>
        </li>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0"style="color:#000080;font-size:14px"><?php echo htmlentities($row['pincode']);?></h6>
            <small class="text-muted">Pincode</small>
          </div>
        </li>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0"style="color:#000080;font-size:14px"><?php echo htmlentities($row['phone']);?></h6>
            <small class="text-muted">Contact no</small>
          </div>
        </li>
       
        <li class="list-group-item d-flex justify-content-between bg-light">
        <div class="text-success">
          <span style="font-size:16px">Total amount (Rs) : </span>
          <strong style="font-size:16px"><?php echo htmlentities($all_total);?></strong>
  </div>
        </li>
      </ul>
      
<?php
}}
else {
  ?>
  <div class="row">
    <div class="col-md-4 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3"><br><br><br><br><br>
        <span class="text-muted">Your Order</span>
        
      </h4>
      <ul class="list-group mb-3">
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
         
            <small class="text-muted">Name</small>
          </div>
  </li>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <small class="text-muted">Shipping Address</small>
          </div>
        </li>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <small class="text-muted">Shipping City</small>
          </div>
        </li>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <small class="text-muted">Pincode</small>
          </div>
        </li>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <small class="text-muted">Contact no</small>
          </div>
        </li>
       
        <li class="list-group-item d-flex justify-content-between bg-light">
        <div class="text-success">
          <span style="font-size:16px">Total amount (Rs) : </span>
          <strong style="font-size:16px"><?php echo htmlentities($all_total);?></strong>
  </div>
        </li>
      </ul>
      <?php
}?>

      <form class="card p-2">
        <div class="input-group">
         
          <div class="input-group-append">
          
  <a href="my-cart.php">
    <button id="continue-btn" type="button" style="width:360px;color:white;background-color:#000080;font-weight:bold" class="btn btn-secondary">CONTINUE</button>
  </a>



          </div>
        </div>
      </form>
    </div>
    <br>
    <div class="col-md-8 order-md-1">
      <h4 class="mb-3"style="font-size:22px;">Billing address</h4><br>
      <?php
$_SESSION['email']=$email;
$sqlq="SELECT log_id from tbl_login where email='$email'";
$resu = mysqli_query($conn, $sqlq);
$row = mysqli_fetch_assoc($resu);
$log_id= $row['log_id'];



$query=mysqli_query($conn,"select * from tbl_oaddress where log_id='$log_id'");
if(mysqli_num_rows($query) > 0) {
  while($row=mysqli_fetch_array($query)) {
?>
    <form method="POST" action="checkout.php">
      <div class="mb-3">
        <label for="firstName">Enter First name</label>
        <input type="text" style="height:50px" class="form-control" id="name" name="fname" placeholder="Name" value="<?php echo $row['fname'];?>" >
      </div>
      <div class="mb-3">
        <label for="firstName">Enter Last name</label>
        <input type="text" style="height:50px" class="form-control" id="name" name="lname" placeholder="Name" value="<?php echo $row['lname'];?>" >
      </div>

      <div class="mb-3">
        <label for="username">Shipping Address</label>
        <input type="text" style="height:50px" class="form-control" id="username" name="address" placeholder="Address" value="<?php echo $row['address'];?>" >
      </div>

      <div class="mb-3">
        <label for="email">Shipping City</span></label>
        <input type="text" class="form-control" id="email" name="city" style="height:50px" placeholder="City" value="<?php echo $row['city'];?>">
      </div>
      <div class="mb-3">
        <label for="firstName">Region</label>
        <input type="text" style="height:50px" class="form-control" id="name" name="region" placeholder="Name" value="<?php echo $row['region'];?>" >
      </div>
      <div class="mb-3">
        <label for="firstName">District</label>
        <input type="text" style="height:50px" class="form-control" id="name" name="district" placeholder="Name" value="<?php echo $row['district'];?>" >
      </div>

      <div class="mb-3">
        <label for="address">Shipping Pincode</label>
        <input type="text" class="form-control" id="address" name="pincode" placeholder="Pincode" value="<?php echo $row['pincode'];?>" >
      </div>

      <div class="mb-3">
        <label for="address2">Contact no</span></label>
        <input type="text" class="form-control" id="address2" style="height:50px" name="phone" placeholder="Contact no" value="<?php echo $row['phone'];?>" >
      </div>

      <hr class="mb-4">
      <button class="btn btn-primary"type="submit" name="up"style="width:752px;background-color: #428bca;font-weight:bold;font-size:17px;">UPDATE THE ADDRESS</button>
    </form>
  <?php
  }
} else {
?>

  <form method="POST" action="checkout.php">
    <div class="mb-3">
      <label for="firstName">Enter name</label>
      <input type="text" style="height:50px; margin: 0 auto; display: block;" class="form-control" id="name" name="name" placeholder="Name"pattern="[a-zA-Z ]{2,}" value=""required title="Please enter a valid name (at least two letters and only letters and spaces)"required >
    </div>

    <div class="mb-3">
      <label for="username">Shipping Address</label>
      <input type="text" style="height:50px" class="form-control" id="username" name="shippingaddress" placeholder="Address" pattern="[a-zA-Z0-9\s]+"value=""required title="Please enter a valid address (letters, numbers, and spaces only)" >
    </div>

    <div class="mb-3">
      <label for="email">Shipping City</span></label>
      <input type="text" class="form-control" id="email" name="shippingcity" style="height:50px" placeholder="City" value=""required>
      </div>

      
      <div class="mb-3">
        <label for="address">Shipping Pincode</label>
        <input type="text" class="form-control" id="address" name="shippingpincode" placeholder="Pincode" value=""required >
      </div>

      <div class="mb-3">
        <label for="address2">Contact no</span></label>
        <input type="text" class="form-control" id="address2" style="height:50px" name="phone" placeholder="Contact no" value=""required >
      </div>

      <hr class="mb-4">
      <button class="btn btn-primary"type="submit" name="insert"style="width:734px;background-color: #428bca;font-weight:bold;font-size:17px;">UPDATE THE ADDRESS</button>
    </form>

  <?php
}?>

    </div>
  </div>

</div>
     <!-- End Demo HTML -->
     
 </main>

 
 
 
<!-- Bootstrap 5 JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
      <br>
		<?php include('includes/footer.php');?>
						</body>
					</html>