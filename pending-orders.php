<?php
session_start();
include('config.php');
$email=$_SESSION['email'];
if(strlen($_SESSION['email'])==0)
	{	
header('login.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );


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
		<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
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
                            <a href="adminhome.php" class="nav-item nav-link">Home</a>
	

<body>
<!--<?php include('include/header.php');?>-->

	<div class="wrapper">
		<div class="container">
			<div class="row">
<!--<?php include('include/sidebar.php');?>	-->			
			<div class="span9">
					<div class="content">

	<div class="module">
							<div class="module-head">
								<h3>Pending Orders</h3>
							</div>
							<div class="module-body table">
	<?php if(isset($_GET['del']))
{?>
									<div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Oh snap!</strong> 	<?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
									</div>
<?php } ?>

									<br />

							
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display table-responsive" >
									<thead>
										<tr>
											<th>#</th>
											<th> Name</th>
											<th width="50">Email /Contact no</th>
											<th>Address</th>
											<th>Product </th>
											<th>Qty </th>
											<th>Amount </th>
											<th>Order Date</th>
											<th>Action</th>
											
										
										</tr>
									</thead>
								
<tbody>
<?php 
$email=$_SESSION['email'];
$sqlq="SELECT log_id from tbl_login where email='$email'";
$resu = mysqli_query($conn, $sqlq);
$roww = mysqli_fetch_assoc($resu);
$log_id= $roww['log_id'];




$cnt = 1;
$sql_query= mysqli_query($conn,"SELECT tbl_payment.pay_id, tbl_payment.log_id, tbl_order.pay_id, tbl_order.order_id, tbl_payment.cart_id, tbl_payment.amount
FROM tbl_payment
LEFT JOIN tbl_order ON tbl_payment.pay_id = tbl_order.pay_id
WHERE tbl_order.order_status = 'in Process' OR tbl_order.order_status IS NULL AND tbl_payment.pay_id=tbl_order.pay_id AND tbl_payment.log_id='$log_id'");


while ($row = mysqli_fetch_assoc($sql_query))  {

$data = array();
$data['col1'] = $row['pay_id'];
$data['col2'] = $row['order_id'];
$data['col3'] = $row['cart_id'];
$data['col5'] = $row['log_id'];

$quant=mysqli_query($conn,"select quantity,product_id from tbl_cart where cart_id='{$data['col3']}' ");
$row = mysqli_fetch_assoc($quant);
//print_r($row); // check the contents of the $row array
$quantity=$row['quantity'];
$product_id=$row['product_id'];

$quan=mysqli_query($conn,"select product,price from tbl_products where product_id='$product_id' ");
$row = mysqli_fetch_assoc($quan);

$product=$row['product'];
$price=$row['price'];

	// Do something with the retrieved data

	$quet=mysqli_query($conn,"select order_date,order_id from tbl_order where pay_id='{$data['col1']}' and order_id='{$data['col2']}' ");
    $row = mysqli_fetch_assoc($quet);
    $date=$row['order_date'];
	$order_id=$row['order_id'];


 
	// ...


    $qus=mysqli_query($conn,"select fname,lname,address,city,region,pincode,phone from tbl_oaddress where log_id='$log_id'");
    while($row=mysqli_fetch_array($qus))
    {
        $fname= $row['fname'];
		$lname= $row['lname'];
        $address=$row['address'];
        $city=$row['city'];
		$region= $row['region'];
        $pincode=$row['pincode'];
        $district=$row['district'];
        $phone= $row['phone'];
    // ...


?>	

<tr>
        <td><?php echo htmlentities($cnt);?></td>
        <td><?php echo htmlentities($fname);?></td><br><?php echo htmlentities($lname);?>
        <td><?php echo htmlentities($phone);?></td>
        <td><?php echo htmlentities($address);?><br><?php echo htmlentities($city);?><br><?php echo htmlentities($region);?><br><?php echo htmlentities($pincode);?><br><?php echo htmlentities($district);?></td>
        <td><?php echo htmlentities($product);?></td>
        <td><?php echo htmlentities($quantity);?></td>
        <td><?php echo htmlentities ($price);?></td>
        <td><?php echo htmlentities($date);?></td>
        <td><a href="updateorder.php?order_id=<?php echo htmlentities($order_id);?>" title="Update order" target="_blank"><i class="icon-edit"></i></a></td>
    </tr>

    <?php  $cnt=$cnt+1;} }

	
?>

</tbody>
								</table>
							</div>
						</div>						

						
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="scripts/datatables/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
	</script>
</body>
<?php }?>