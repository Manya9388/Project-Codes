<?php
require_once("config.php");
session_start();
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Electro Store Ecommerce Category Bootstrap Responsive Web Template | Single Product 1 :: w3layouts</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords" content="Electro Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"
	/>
	
	<!-- //Meta tag Keywords -->

	<!-- Custom-Files -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<!-- Bootstrap css -->
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- Main css -->
	<link rel="stylesheet" href="css2/fontawesome-all.css">
	<!-- Font-Awesome-Icons-CSS -->
	<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
	<!-- pop-up-box -->
	<link href="css/menu.css" rel="stylesheet" type="text/css" media="all" />
	<!-- menu style -->
	<!-- //Custom-Files -->

	<!-- web fonts -->
	<link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
	    rel="stylesheet">
	<!-- //web fonts -->

</head>

<body>
	<!-- top-header -->
	

	<!-- Button trigger modal(select-location) -->
	
	<!-- //shop locator (popup) -->

	<!-- modals -->
	<!-- log in -->
	
	<!-- //modal -->
	<!-- //top-header -->

	<!-- header-bottom-->
	<form action="manage_cart.php" method="POST">
	<div class="header-bot">
		<div class="container">
			<div class="row header-bot_inner_wthreeinfo_header_mid">
				<!-- logo -->
				<!--<div class="col-md-3 logo_agile">
					<center><h1 class="text-center">
						<a href="index.php" class="font-weight-bold font-italic">
							E-Store
						</a>
					</h1></center>
				</div>-->
				<!-- //logo -->
				<!-- header-bot -->
				
			</div>
		</div>
	</div>
	<!-- shop locator (popup) -->
	<!-- //header-bottom -->
	<!-- navigation -->
	<?php  
                          $product_id=$_REQUEST['product_id'];

                         
$ret=mysqli_query($conn,"select * from tbl_products where product_id='$product_id'");
$num=mysqli_num_rows($ret);
if($num>0)
{
while ($row=mysqli_fetch_array($ret)) 
{if($row['status']==0){
	$a='images1/'.$row["img"];?>							
		<div class="col-sm-6 col-md-4 wow fadeInUp">
			<div class="products">				
	<div class="product">		
		<div class="product-image">
			<div class="image">
			<img src="<?php echo $a ?>" alt="" width="100" height="750"></a>
				
		</div><!-- /.image -->	
		
		</div><!-- /.product-image -->
			
	<!-- Single Page -->
	<div class="banner-bootom-w3-agileits py-5">
		<div class="container py-xl-4 py-lg-2">
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span><?php echo $row["product"]; ?></span></h3>
			<!-- //tittle heading -->
	
			<div class="row">
				<div class="col-lg-5 col-md-8 single-right-left ">
					<div class="grid images_3_of_2">
						<div class="flexslider">
							<ul class="slides">
								<li data-thumb="<?php echo $a ?>">
									<div class="thumb-image">
                                    <!-- <img src="<php echo $a ?> " style="width:150px; height:150px;"> -->

										<img src="<?php echo $a ?> " data-imagezoom="true" class="img-fluid" alt=""> </div>
								</li>
								<li data-thumb="images/si2.jpg">
									<div class="thumb-image">
										<img src="images/si2.jpg" data-imagezoom="true" class="img-fluid" alt=""> </div>
								</li>
								<li data-thumb="images/si3.jpg">
									<div class="thumb-image">
										<img src="images/si3.jpg" data-imagezoom="true" class="img-fluid" alt=""> </div>
								</li>
							</ul>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>

				<div class="col-lg-7 single-right-left simpleCart_shelfItem">
					<h3 class="mb-3"></h3>
					<p class="mb-3">
						<span class="item_price">Rs.<?php echo $row["price"]; ?></span>
						<del class="mx-2 font-weight-light">$<?php echo $row["price"]; ?></del>
						
					</p>
					<div class="single-infoagile">
						<ul>
							
							<li class="mb-3">
                            Product Colour : <?php echo $row["colour"]; ?>
							</li>
							
						</ul>
					</div>
					<div class="col-lg-7 single-right-left simpleCart_shelfItem">
					<h3 class="mb-3"></h3>
					<p class="mb-3"><label> Price : </label>
						<span class="item_price">Rs.<?php echo $row["price"]; ?></span><br><br>
						<?php echo "Free Delivery"; ?></del>
						
					</p>
					<div class="single-infoagile">
						<ul>
							<li class="mb-3">
                            <label> Size : </label>
                            <?php echo $row["size"]; ?>
							</li>
							<li class="mb-3">
                            Product Colour : <?php echo $row["colour"]; ?>
							</li>
							
						</ul>
					</div>
					<div class="product-single-w3l">
						<p class="my-3">
							<i class="far fa-hand-point-right mr-2"></i>
							<label>Occassion:</label>
                            <?php echo $row["occassion"]; ?>
							
							<div class="cart clearfix animate-effect">
				<div class="action">
					
					
                            <input type="text" value="<?php echo $row['product_id']?>" name="product_id" hidden>
                            <input type="text" value="<?php echo $row['cat_id']?>" name="cat_id" hidden>
                            
                    
						
						
								<?php if($row['quantity'] > 0){?>
									<input class="text-center" type='number'  name='quantity' value="1".$row["quantity"]."' min='1' max='50'hidden >
									<!--<div><button class="btn btn-primary icon" data-toggle="dropdown" type="button"><i class="fa fa-shopping-cart"></i></button></div>-->
                                    <div><input class="btn btn-primary" type="submit" name="add_to_cart" value="Add to cart"></div>
									
						<input class="btn btn-primary" type="submit" name="wishlist" value="Wishlist">
									<?php } else {?>
							<div class="action" style="color:red">Out of Stock</div>
					<?php } ?>
													
						
						
				
				</div>
			</div>
						
					</div>
					</div>                    
          <div><button type="button" class="btn btn-danger btn-block" onclick="document.location.href='index.php';">Cancel</button>

</div>
</form>
				</div>
			</div>
		</div>
	</div>
    
	<!-- //Single Page -->
<?php }}} ?>
	
		<!-- //footer third section -->

		<!-- footer fourth section -->
		
	<!-- //footer -->
	<!-- copyright -->
	
	<!-- //copyright -->

	<!-- js-files -->
	<!-- jquery -->
	<script src="js/jquery-2.2.3.min.js"></script>
	

	<!-- imagezoom -->
	<script src="js/imagezoom.js"></script>
	<!-- //imagezoom -->

	<!-- flexslider -->
	<link rel="stylesheet" href="css2/flexslider.css" type="text/css" media="screen" />

	<script src="js/jquery.flexslider.js"></script>
	<script>
		// Can also be used with $(document).ready()
		$(window).load(function () {
			$('.flexslider').flexslider({
				animation: "slide",
				controlNav: "thumbnails"
			});
		});
	</script>


</body>

</html>