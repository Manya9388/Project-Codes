<?php 
session_start();

?>

<div class="top-bar animate-dropdown">
	<div class="container">
		<div class="header-top-inner">
			<div class="cnt-account">
				<ul class="list-unstyled">

<?php if(strlen($_SESSION['login']))
    {   ?>
				<li><a href="#"><i class="icon fa fa-user"></i>Welcome -<?php echo htmlentities($_SESSION['username']);?></a></li>
				<?php } ?>

					
					<li><a href="viewwish.php"><i class="icon fa fa-heart"></i>Wishlist</a></li>
					<li><a href="shopping-cart.php" class="btn btn-outline-success">My Cart</a></li>
					<?php if(strlen($_SESSION['login'])==0)
    {   ?>

<?php }
else{ ?>
	
				
				<?php } ?>	
				</ul>
			</div><!-- /.cnt-account -->

<div class="cnt-block">
				<ul class="list-unstyled list-inline">
					<li class="dropdown dropdown-small">
						<!--<a href="#" class="dropdown-toggle" ><span class="key">Track Order</b></a>-->
						
					</li>

				
				</ul>
			</div>
			
			<div class="clearfix"></div>
		</div><!-- /.header-top-inner -->
	</div><!-- /.container -->
</div><!-- /.header-top -->