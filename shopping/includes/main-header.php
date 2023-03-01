<?php 
?>
	<div class="main-header">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
					<!--======================= LOGO ============================== -->
<div class="logo">
	<a href="../my_account.php">
		
		<h2>Estore</h2>

	</a>
</div>		
</div>
<div class="col-xs-12 col-sm-12 col-md-6 top-search-holder">
<div class="search-area">
    <form name="search" method="post" action="#">
        <div class="control-group">

            <input class="search-field" placeholder="Search here..." name="product" required="required" />

            <button class="search-button" type="submit" name="search"></button>    
            
        </div>
    </form>
</div><!-- /.search-area -->
<!-- ======================== SEARCH AREA : END =============================== -->				</div>

<div class="col-xs-12 col-sm-12 col-md-3 animate-dropdown top-cart-row">
					<!-- ====================== SHOPPING CART DROPDOWN =========================== -->
<?php
if(!empty($_SESSION['cart'])){
	?>
	<div class="dropdown dropdown-cart">
		<a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
			<div class="items-cart-inner">
				<div class="total-price-basket">
					<span class="lbl">cart -</span>
					<span class="total-price">
						<span class="sign">Rs.</span>
						<span class="value"><?php echo $_SESSION['tp']; ?></span>
					</span>
				</div>
				<div class="basket">
					<i class="glyphicon glyphicon-shopping-cart"></i>
				</div>
				<div class="basket-item-count"><span class="count"><?php echo $_SESSION['qnty'];?></span></div>
			
		    </div>
		</a>
		<ul class="dropdown-menu">
		
		
		<?php
    $sql = "SELECT * FROM tbl_products WHERE product_id IN(";
	foreach($_SESSION['cart'] as $id => $value){
	$sql .=$id. ",";
	}
	$sql=substr($sql,0,-1) . ") ORDER BY id ASC";
	$query = mysqli_query($con,$sql);
	$totalprice=0;
	$totalqunty=0;
	if(!empty($query)){
		while($row = mysqli_fetch_array($query)){
			$quantity=$_SESSION['cart'][$row['cart_id']]['quantity'];
			$subtotal= $_SESSION['cart'][$row['cart_id']]['quantity']*$row['productPrice']+$row['shippingCharge'];
			$totalprice += $subtotal;
			$_SESSION['qnty']=$totalqunty+=$quantity;

	?>
		
	<li>
			<?php } }?>
			
	</li>
	</ul>
</div>
<?php } else { ?>
<div class="dropdown dropdown-cart">
	<a href="my_cart.php" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
		<div class="items-cart-inner">
			<div class="total-price-basket">
				<span class="lbl">cart -</span>
				<span class="total-price">
					<span class="sign"></span>
					<span class="value"><?php echo $totalprice; ?></span>
				</span>
			</div>
			<div class="basket">
				<i class="glyphicon glyphicon-shopping-cart"></i>
			</div>
			<div class="basket-item-count"><span class="count">*</span></div>
		
		</div>
	</a>
	<ul class="dropdown-menu">
	

		
		
			<li>
				<div class="cart-item product-summary">
					<div class="row">
						<div class="col-xs-12">
							Your Shopping Cart.
							<a href="shopping-cart.php" class="btn btn-upper btn-primary btn-block m-t-20">View</a>
						</div>	
					</div>
				</div><!-- /.cart-item -->
			
				
			<hr>
		
			<div class="clearfix cart-total">
				
				<div class="clearfix"></div>
					
				<a href="index.php" class="btn btn-upper btn-primary btn-block m-t-20">Continue Shopping</a>	
			</div>
					
				
		</li>
		</ul>
	</div>
	<?php }?>




<!-- ============= SHOPPING CART DROPDOWN : END================== -->				</div><!-- /.top-cart-row -->
			</div>

		</div>

	</div>