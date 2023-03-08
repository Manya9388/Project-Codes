<?php
session_start();
error_reporting(0);
include('includes/config.php');
$cat_id=intval($_GET['cat_id']);
if(isset($_GET['action']) && $_GET['action']=="add"){
	$id=intval($_GET['id']);
	if(isset($_SESSION['cart'][$id])){
		$_SESSION['cart'][$id]['quantity']++;
	}else{
		$sql_p="SELECT * FROM tbl_products WHERE product_id={$id}";
		$query_p=mysqli_query($conn,$sql_p);
		if(mysqli_num_rows($query_p)!=0){
			$row_p=mysqli_fetch_array($query_p);
			$_SESSION['cart'][$row_p['product_id']]=array("quantity" => 1, "price" => $row_p['price']);
				echo "<script>alert('Product has been added to the cart')</script>";
		        echo "<script type='text/javascript'> document.location ='category.php'</script>";
		}else{
			$message="Product ID is invalid";
		}
	}
	
}

// COde for Wishlist
if(isset($_GET['product_id']) && $_GET['action']=="wishlist" ){
	if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}
else
{
mysqli_query($conn,"insert into wishlist(userId,productId) values('".$_SESSION['id']."','".$_GET['product_id']."')");
echo "<script>alert('Product aaded in wishlist');</script>";
header('location:my-wishlist.php');

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

	    <title>Product Category</title>

	    <!-- Bootstrap Core CSS -->
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	    
	    <!-- Customizable CSS -->
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

	</head>
    <body class="cnt-home">
	
<header class="header-style-1">

	<!-- ============================================== TOP MENU ============================================== -->
<?php include('includes/top-header.php');?>
<!-- ============================================== TOP MENU : END ============================================== -->
<?php include('includes/main-header.php');?>
	<!-- ============================================== NAVBAR ============================================== -->
<?php include('includes/menu-bar.php');?>
<!-- ============================================== NAVBAR : END ============================================== -->

</header>
<!-- ============================================== HEADER : END ============================================== -->
</div><!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
	<div class='container'>
		<div class='row outer-bottom-sm'>
			<div class='col-md-3 sidebar'>
	            <!-- ================================== TOP NAVIGATION ================================== -->
<div class="side-menu animate-dropdown outer-bottom-xs">       
<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i>Sub Categories</div>        
    <nav class="yamm megamenu-horizontal" role="navigation">
  
        <ul class="nav">
            <li class="dropdown menu-item">
              <?php $sql=mysqli_query($conn,"select sub_id,sub_Name  from tbl_subcategory where cat_id='$cat_id'");

while($row=mysqli_fetch_array($sql))
{
    ?>
                <a href="sub-category.php?sub_id=<?php echo $row['sub_id'];?>" class="dropdown-toggle"><i class="icon fa fa-desktop fa-fw"></i>
                <?php echo $row['sub_Name'];?></a>
                <?php }?>
                        
</li>
</ul>
    </nav>
</div>
</div><!-- /.side-menu -->
<!-- ================================== TOP NAVIGATION : END ================================== -->	            <div class="sidebar-module-container">
	            	<h3 class="section-title">shop by</h3>
	            	<div class="sidebar-filter">
		            	<!-- ============================================== SIDEBAR CATEGORY ============================================== -->
<div class="sidebar-widget wow fadeInUp outer-bottom-xs ">
	<div class="widget-header m-t-20">
		<h4 class="widget-title">Category</h4>
	</div>
	<div class="sidebar-widget-body m-t-10">
	         <?php $sql=mysqli_query($conn,"select cat_id,cat_Name  from tbl_category");
while($row=mysqli_fetch_array($sql))
{
    ?>
		<div class="accordion">
	    	<div class="accordion-group">
	            <div class="accordion-heading">
	                <a href="category.php?cat_id=<?php echo $row['cat_id'];?>"  class="accordion-toggle collapsed">
	                   <?php echo $row['cat_Name'];?>
	                </a>
	            </div>  
	        </div>
	    </div>
	    <?php } ?>
	</div><!-- /.sidebar-widget-body -->
</div><!-- /.sidebar-widget -->



    
<!-- ============================================== COLOR: END ============================================== -->

	            	</div><!-- /.sidebar-filter -->
	            </div><!-- /.sidebar-module-container -->
            </div><!-- /.sidebar -->
			<div class='col-md-9'>
					<!-- ========================================== SECTION – HERO ========================================= -->

	<div id="category" class="category-carousel hidden-xs">
		<div class="item">	
			<div class="image">
				<img src="assets/images/banners/cat-banner-1.jpg" alt="" class="img-responsive">
			</div>
			<div class="container-fluid">
				<div class="caption vertical-top text-left">
					<div class="big-text">
						<br />
					</div>

					       <?php $sql=mysqli_query($conn,"select cat_Name  from tbl_category where cat_id='$cat_id'");
while($row=mysqli_fetch_array($sql))
{
    ?>

					<div class="excerpt hidden-sm hidden-md">
						<?php echo htmlentities($row['cat_Name']);?>
					</div>
			<?php } ?>
			
				</div><!-- /.caption -->
			</div><!-- /.container-fluid -->
		</div>
</div>

				<div class="search-result-container">
					<div id="myTabContent" class="tab-content">
						<div class="tab-pane active " id="grid-container">
							<div class="category-product  inner-top-vs">
							<form method="POST"action="manage_cart.php">												<div class="row">									
			<?php
$ret=mysqli_query($conn,"select * from tbl_products where cat_id='$cat_id'");
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
			<img src="<?php echo $a ?>" alt="" width="200" height="200"></a>
				
		</div><!-- /.image -->	
		
		</div><!-- /.product-image -->
			
		
		<div class="product-info text-left">
			<h3 class="name"><a href="single.php?product_id=<?php echo htmlentities($row['product_id']);?>"><?php echo htmlentities($row['product']);?></a></h3>
			
			<div class="description"></div>

			<div class="product-price">	
				<span class="price">
					Rs. <?php echo htmlentities($row['price']);?>			</span>
										     <span class="price-before-discount">Rs. <?php echo htmlentities($row['price']);?></span>
											
                            <input class="text-center" type='number'  name='quantity' value="1".$row["quantity"]."' min='1' max='50'hidden >				
			<label for="quantity">Size:</label>
			<?php echo htmlentities($row['size']);?>   
						</div><!-- /.product-price -->
			
		</div><!-- /.product-info -->
					<div class="cart clearfix animate-effect">
				<div class="action">
					<ul class="list-unstyled">
					<li>
                            <input type="text" value="<?php echo $row['product_id']?>" name="product_id" hidden>
                            <input type="text" value="<?php echo $_GET['cat_id']?>" name="cat_id" hidden>
                            
                        </li>
						<li class="add-cart-button btn-group">
						
								<?php if($row['quantity'] > 0){?>
									<button class="btn btn-primary icon" data-toggle="dropdown" type="button"><i class="fa fa-shopping-cart"></i></button>
                                    <input class="btn btn-primary" type="submit" name="add_to_cart" value="Add to cart">
								
						<input class="btn btn-primary" type="submit" name="wishlist" value="Wishlist">
									<?php } else {?>
							<div class="action" style="color:red">Out of Stock</div>
					<?php } ?>
													
						
						
					</ul>
				</div>
			</div>
			</div>
			</div>
		</div>
	  <?php } } } else {?>
	
		<div class="col-sm-6 col-md-4 wow fadeInUp"> <h3>No Product Found</h3>
		</div>
		
<?php } ?>	
		
	  </form>
		
										</div>
							</div>
						
						</div>
						
				

				</div>

			</div>
		</div></div>
		

</div>
</div>
<?php include('includes/footer.php');?>
	<script src="assets/js/jquery-1.11.1.min.js"></script>
	
	<script src="assets/js/bootstrap.min.js"></script>
	
	<script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>
	
	<script src="assets/js/echo.min.js"></script>
	<script src="assets/js/jquery.easing-1.3.min.js"></script>
	<script src="assets/js/bootstrap-slider.min.js"></script>
    <script src="assets/js/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="assets/js/lightbox.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
	<script src="assets/js/scripts.js"></script>

</body>
</html>