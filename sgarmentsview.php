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

        <?php 
		$s_id=$_GET['s_id'];
$ret=mysqli_query($conn,"select * from tbl_sgarments where s_id='$s_id'");
while($row=mysqli_fetch_array($ret))
{
	$custom_id=$row['custom_id'];
	$sprice=$row['sprice'];
	 $_SESSION['s_id'] = "s_id=" . $row['s_id']; 
?>
<form method="POST"action="sgconfirm.php">	
			<div class='col-md-9'>
				<div class="row  wow fadeInUp">
					     <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
                        <div class="product-item-holder size-big single-product-gallery small-gallery">

        <div id="owl-single-product">

		<div class="single-product-gallery-item" id="slide1">
 
 <img src="simages/<?php  echo $row['img5'];?>" width="300" height="320" />
                </a>
            </div>
			&nbsp;&nbsp;&nbsp;&nbsp;<h4 class="name">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Price :&nbsp;&nbsp; Rs. <?php  echo htmlentities($row['sprice']/2);?></h4>
        
            
        </div><!-- /.single-product-slider -->
</div>
    </div>
    			

<?php

	$resu=mysqli_query($conn,"select * from tbl_customize where custom_id='$custom_id'");
	while($row=mysqli_fetch_array($resu))
{
?>
					<div class='col-sm-6 col-md-7 product-info-block'>
						<div class="product-info">
							<h4 class="name">Product Name : <?php echo htmlentities($row['type']);?></h4>
							<h4 class="name">Fabric : <?php echo htmlentities($row['fabric']);?></h4>
							<h4 class="name">Colour : <?php echo htmlentities($row['colour']);?></h4>
							<h4 class="name">Size : <?php echo htmlentities($row['size']);?></h4>
							<br><h6><i> Balance payment through Cash on Delivery</i> </h6>
                            <h6><i> Product will be delivered with in one week</i> </h6><br>
</div>
<?php } }  ?></form>

<form method="post" action="sgconfirm.php">
  <input type="hidden" name="s_id" value="<?php echo $s_id ;?>">
  <input type="submit" name="submit" value="Confirm" class="btn btn-danger btn-block">
</form>
							<br><div><input type="cancel" name="cancel" value="Cancel" onClick="document.location.href='my_account.php';"class="btn btn-danger btn-block" /></div>

	

<style> 

</style> 
</html>