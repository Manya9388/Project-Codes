<?php
session_start();
if($_SESSION['email']){
include('config.php');
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

                
                        </div>
                        
                        <div class="navbar-nav ml-auto">
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Admin</a>
                                <div class="dropdown-menu">
                                    
                                    <a href="logout.php" class="dropdown-item">Logout</a>
                                </div>
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
                    <li class="breadcrumb-item"><a href="adminhome.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Products</a></li>
                    <li class="breadcrumb-item active">Admin</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        <body>

		
			

							
			<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display table-responsive" >
									<thead>
										<tr>
											<th>#</th>
											<th> Name</th>
											<th width="50">Contact no</th>
											<th>Shipping Address</th>
											<th>Product </th>
											<th>Qty </th>
											<th>Amount </th>
											<th>Order Date</th>
                                            <th>Order Status</th>
											<th>Action</th>
											<th>Assign Delivery Agent</th>
										
										</tr>
									</thead>
									<tbody>
									<?php 

$sql_query= mysqli_query($conn,"SELECT fname, lname,log_id, phone, address, city, region, pincode, district
FROM tbl_oaddress
WHERE log_id IN (
  SELECT log_id
  FROM tbl_payment
  WHERE pay_id IN (
    SELECT pay_id
    FROM tbl_order
  )
);");
$cnt=1;
while ($row = mysqli_fetch_assoc($sql_query))  {


$fname= $row['fname'];
$lname = $row['lname'];
$log_id = $row['log_id'];
$phone = $row['phone'];
$address = $row['address'];
$city = $row['city'];
$region = $row['region'];
$pincode = $row['pincode'];
$district = $row['district'];

$quant=mysqli_query($conn,"select amount,pay_id from tbl_payment where pay_id in(select pay_id from tbl_order); ");
$row = mysqli_fetch_assoc($quant);
//print_r($row); // check the contents of the $row array
$amount=$row['amount'];
$pay_id=$row['pay_id'];


$quan=mysqli_query($conn,"select quantity from tbl_cart where cart_id in(SELECT cart_id FROM tbl_payment where pay_id in(SELECT pay_id from tbl_order)); ");
$row = mysqli_fetch_assoc($quan);
//print_r($row); // check the contents of the $row array

$quantity=$row['quantity'];



   
	// Do something with the retrieved data

	$quet=mysqli_query($conn,"SELECT product from tbl_products where product_id in (select product_id from tbl_cart where cart_id in(SELECT cart_id FROM tbl_payment where pay_id in(SELECT pay_id from tbl_order))); ");
    $row = mysqli_fetch_assoc($quet);
    
	$product=$row['product'];



    $qus=mysqli_query($conn,"select order_date,order_id,order_status from tbl_order where pay_id='$pay_id'");
    while($row=mysqli_fetch_array($qus))
    {
		$order_date= $row['order_date'];
        $order_id= $row['order_id'];
        $order_status= $row['order_status'];
    // ...


?>	

<tr>
        <td><?php echo htmlentities($cnt);?></td>
        <td><?php echo htmlentities($fname);?><?php echo htmlentities($lname);?></td><br>
        <td><?php echo htmlentities($phone);?></td>
        <td><?php echo htmlentities($address);?><br><?php echo htmlentities($city);?><br><?php echo htmlentities($region);?><br><?php echo htmlentities($pincode);?><br><?php echo htmlentities($district);?></td>
        <td><?php echo htmlentities($product);?></td>
        <td><?php echo htmlentities($quantity);?></td>
        <td><?php echo htmlentities ($amount);?></td>
      <td> <?php echo htmlentities($order_date);?></td>
      <td><?php echo htmlentities ($order_status);?></td>
        <td><a href="updateorder.php?order_id=<?php echo htmlentities($order_id);?>" >Edit</a></td>
        
        <?php
// query the database to check if the order has been assigned to a delivery boy
$query = "SELECT * FROM tbl_dbassign WHERE order_id = $order_id";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
  // the order has been assigned, display "Assigned"
  echo "<td>Assigned</td>";
} else {
  // the order has not been assigned, display the "Assign" link
  echo "<td><a href='api.php?order_id=".htmlentities($order_id)."&pincode=".htmlentities($pincode)."'>Assign</a></td>";
}
?>
    </tr>



									</tbody>
                                    <?php  $cnt=$cnt+1;} }

	
?>
								</table>
							</div>
						</div>						

						
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->



	
</body>
</html>





