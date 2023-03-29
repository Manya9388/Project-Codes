<?php
	session_start();
	include('config.php');
	$email=$_SESSION['email'];
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

	</head>
	
		
			<title>cart</title>
			<style>
				#mycart_div{
					display: flex;
				}

				#mycart-table{
					flex: 3;
				}
				
				#mycart-total{
					flex: 1;
					margin-left: 30px;
					background-color: #e5e9e6;
				}

				#prod_name{
					overflow: hidden;
					width:90%;
					display: -webkit-box;
					-webkit-line-clamp: 1;
					-webkit-box-orient: vertical;
				}
				.form-check-label{
					margin-left: -25px;
					font-family: monospace;
					font-size: 20px;
				}
				#cartupdate{
					margin-top: -4px;
				}
				
				

			</style>
			<style type='text/css'>
table {
  width: 95%;
  background:#e5e9e6;
  border: 2px solid #C5B798;
  margin-top: 5px;
  margin-bottom: 25px;
}
td {
	border-bottom: 1px solid #CDC1A7;
  padding: 50px;
}
th {
  font-family: "Trebuchet MS", Arial, Verdana;
  font-size: 25px;
  padding: 5px;
  border-bottom-width: 1px;
  border-bottom-style: solid;
  border-bottom-color: #CDC1A7;
  background-color:#9DC183;
  color: black;
}
tr{
	font-size: 16px;
}
</style>



		</head>
		<body class="cnt-home">
	
			
	
	<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1">
<!-- <php include('includes/top-header.php');?> -->
<?php include('includes/main-header.php');?>

</header>
<!-- ============================================== HEADER : END ============================================== -->



<div class="body-content outer-top-xs">
<div class="container">
	<div class="row inner-bottom-sm">
		<div class="shopping-cart">
			<div class="col-md-12 col-sm-12 shopping-cart-table ">
<div class="table-responsive">

						<body>

							<div class="text-center border rounded bg-light my-5 m-5">
								<h3>MY ORDER</h3>
							</div>

							<div id="mycart_div" class="m-5">
								<table class="table" id="mycart-table">
								<thead class="	text-center">
										<tr>
											<th scope="col">Sr.No.</th>
											<th scope="col">Item Name</th>
											<th scope="col">Image</th>
											<th scope="col">Price</th>
											<th scope="col">Quantity</th>
											<th scope="col">Total</th>
											<th scope="col">Action</th>
										</tr>
									</thead>
									<tfoot>
				<tr>
					<td colspan="7">
						<div class="shopping-cart-btn">
							<span class="">
								<a href="index.php" class="btn btn-upper btn-primary pull-right outer-right-xs">Continue Shopping</a>
								
								
							</span>
						</div><!-- /.shopping-cart-btn -->
					</td>
				</tr>
			</tfoot>
									<tbody class="text-center">
										<?php
											$all_total=0;
											$sr=0;
											$sql3=mysqli_query($conn,"SELECT log_id from tbl_login where email='$email'");
											while($row=mysqli_fetch_array($sql3))
											{
											  $a=$row['log_id'];
											$mycart_record_res= mysqli_query($conn,"SELECT * from tbl_cart where log_id=$a ");
											if(mysqli_num_rows($mycart_record_res) > 0)
											{
												foreach($mycart_record_res as $row){
													$sr++;
													$product_id= $row['product_id'];
													
  $prod_sql= mysqli_query($conn,"SELECT * from tbl_products WHERE product_id=$product_id ");

  
													//$prod_sql= mysqli_query($conn,"SELECT * from tbl_products WHERE product_id=$product_id AND ");
													if(mysqli_num_rows($prod_sql) == 1){
														$pred_details_res= mysqli_fetch_array($prod_sql);
														$each_total= $row["quantity"]*$pred_details_res["price"];
														$all_total+=$each_total;
													
														echo"
															<tr>
																<td>$sr</td>
																
																
																<td><p id='prod_name'>".$pred_details_res["product"]."</p></td>
															
															<td></td>
																<td>".$pred_details_res["price"]."</td>

																
																<td>
																	<form action='manage_cart.php' method = 'POST'>
																		<input class='text-center' type='number'  name='quantity' value='".$row["quantity"]."' min='1' max='10'>
																		<input type='text' name='product_id' value=".$row["product_id"]." hidden>
																		<button name='update_Item'  id='cartupdate' class='btn btn-sm btn-outline-success '>UPDATE</button>
																	</form>
																</td>
																<td class='itotal'>".$each_total."</td>
																
																<td>
																	<form action='manage_cart.php' method='POST'>
																	
																		<input type='text' name='product_id' value=".$row["product_id"]." hidden>
																		<button name='Remove_Item' class='btn btn-sm btn-outline-danger'>REMOVE</button>
																		</form>
																
																</td>
																
																
															</tr>
														";
													}
													else{
														
													}
												}
											
											}
										}
										?>
										
									</tbody>

								</table>
								<!-- <form action="deliveryform.php" method="POST"> -->
									<?php if($all_total>0){ ?>
								<div class="col-lg-4" id="mycart-total">
									<div class="border bg-light rounded p-4">
										<h3>Total:</h3>
										<h5 class="text-right">Rs. <?php echo $all_total; ?></h5>
										<br>
										<form>
										<input type="hidden" id="name1" value="<?php echo $email; ?>">

											<div class="form-check">
												<!-- <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1"> -->
												<center><label class="form-check-label" for="flexRadioDefault1"> Make Order</label></center>
												
											</div>
											<br>
											<?php  $_SESSION['all_total']="$all_total". ".00"; ?>
											<a href="checkout.php"class="btn btn-primary btn-block" >Shipping Details</button></a>
											<!-- <a href="deliveryform.php" button class="btn btn-primary btn-block">Cash On Delivery</button></a> -->
											<br><br>
						
											<input type="button" id="rzp-button1"name="btn"value="pay now"class="btn btn-primary btn-block" onclick="pay_now()"  />
										</form>
									</div>
								</div>
								<!-- </form> -->
							</div>
							<?php } ?>
							<script>
//   console.log("hello");
// var amt ="100";
    function pay_now(){
		var name = jQuery('#name1').val();
		console.log(name);
		
        var amount=<?php echo $all_total ?>;
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
                   url: "payment_process.php",
                   data:"payment_id="+response.razorpay_payment_id+"&amount="+amount,
                   success:function(result){
                       window,location.href="thankyou.php";
                   }
               });
              
      }
        
    
};
var rzp1 = new Razorpay(options);

    rzp1.open();
    
    }
///enable code/////

 
</script>
						</body>
					</html>