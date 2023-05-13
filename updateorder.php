<?php
session_start();

include_once 'config.php';
if(strlen($_SESSION['email'])==0)
 { 
header('location:login.php');
}
 else{
$order_id=intval($_GET['order_id']);
if(isset($_POST['submit2'])){
$order_status=$_POST['order_status'];
//space char

$sql=mysqli_query($conn,"update tbl_order set order_status='$order_status' where order_id='$order_id'");
echo "<script>alert('Order updated sucessfully...');</script>";
header("Location: adminhome.php");
//}
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
<!--<?php include('include/header.php');?>-->

	<div class="wrapper">
		<div class="container">
			<div class="row">
<!--<?php include('include/sidebar.php');?>-->				
			<div class="span9">
      <div style="margin-left:500px;">
      <form name="updateticket" id="updateticket" method="post">
  <table  width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr height="50">
      <td colspan="2" class="fontkink2" style="padding-left:0px;">
        <div class="fontpink2"><b>Update Order!</b></div>
      </td>
    </tr>
    <tr height="30">
      <td class="fontkink1" style="font-size:14px"><b>Order ID:</b></td>
      <td class="fontkink"><?php echo $order_id;?></td>
    </tr>
    <?php 
      $ret = mysqli_query($conn,"SELECT * FROM tbl_order WHERE order_id='$order_id'");
      while($row=mysqli_fetch_array($ret))
      {
    ?>
    <tr height="20">
      <td class="fontkink1"><b>At Date:</b></td>
      <td class="fontkink"><?php echo $row['order_date'];?></td>
    </tr>
    <tr height="20">
      <td class="fontkink1"><b>Status:</b></td>
      <td class="fontkink"><?php echo $row['order_status'];?></td>
    </tr>
    <tr>
      <td colspan="2"><hr /></td>
    </tr>
    <?php } ?>
    <?php 
      $st='Delivered';
      $currentSt = '';
      $rt = mysqli_query($conn,"SELECT * FROM  tbl_order WHERE order_id='$order_id'");
      while($num=mysqli_fetch_array($rt))
      {
        $currentSt=$num['order_status'];
      }
      if($st==$currentSt)
      { 
    ?>
    <tr>
      <td colspan="2"><b>Product Delivered</b></td>
    </tr>
    <?php } else { ?>
    <tr height="50">
      <td class="fontkink1" style="font-size:16px">Status:</td>
      <td class="fontkink">
        <span class="fontkink1">
          <select name="order_status" class="fontkink" required="required">
            <option value="">Select Status</option>
            <option value="in Process">In Process</option>
            <option value="Delivered">Delivered</option>
          </select>
        </span>
      </td>
    </tr>
    <tr>
      <td class="fontkink1">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td class="fontkink"></td>
      <td class="fontkink">
        <input type="submit" name="submit2" value="Update" size="40" style="cursor:pointer;" />&nbsp;&nbsp;
      </td>
    </tr>
    <?php } ?>
  </table>
</form>

</div>

				</div><!--/.span9-->
			
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
<?php } ?>