<?php
include ('includes/config.php');
session_start();
//error_reporting(0);
$cart_id = $_SESSION['cart_id'];
if($_SESSION['cart_id']==""){
  header('location:shopping-cart.php');
}
$cart_id = $_GET['cart_id'];
$price = $_GET['price'];
$quantity=$_GET['quantity'];
$tt=$_GET['bb'];
$order="INSERT INTO `tbl_order`(`order_id`,`cust_id`, `cart_id`, `price`,`status`) VALUES ('$cust_id', '$cart_id', '$price','unpaid')";
$or1=mysqli_query($conn,$order);
$z=mysqli_insert_id($conn);


$query="SELECT quantity FROM tbl_products WHERE product_id='$tt'  ";
$result=mysqli_query($conn,$query);
$data=mysqli_fetch_array($result);
	 $dat=$data['quantity'];
   $total=0;
   $total=$dat-$quantity;
     
			$n=mysqli_query($conn,"UPDATE tbl_products set quantity='$total' where product_id='$tt' ");
		
$sqlls = "UPDATE tbl_cart set status='2' where cart_id=$cart_id";
mysqli_query($conn,$sqlls);
$orid = mysqli_insert_id($conn);
$qq = mysqli_query($conn,"UPDATE `tbl_cart` SET status=1 WHERE status = 0 and cust_id = '$cust_id' ");

$sqlls = "UPDATE tbl_cart SET status='2' WHERE cart_id='$cart_id'";
mysqli_query($conn,$sqlls);
$orid = mysqli_insert_id($conn);
$qq = mysqli_query($con,"UPDATE `tbl_cart` SET status=1 WHERE status = 0 and cust_id = '$cust_id' ");


echo"<script>window.location.href='#?cart_id=$cart_id';</script>";
//header('location:final.php?id=echo $cartid');

?>




