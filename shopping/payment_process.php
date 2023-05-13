<?php 
include('config.php');
session_start();
$email=$_SESSION['email'];

if(isset($_POST['payment_id']) && isset($_POST['amount'])){
    $sqlq="SELECT log_id from tbl_login where email='$email'";
$resu = mysqli_query($conn, $sqlq);
$row = mysqli_fetch_assoc($resu);
$log_id= $row['log_id'];

$sql = mysqli_query($conn, "SELECT * from tbl_cart where log_id='$log_id'");
while($row = mysqli_fetch_array($sql)){
    $cart_id = $row['cart_id'];
    $product_id= $row['product_id'];
    $quantity = $row['quantity'];
    $amt = $_POST['amount'];
    $payment_status = "completed";
    
    $sql3 = "INSERT INTO `tbl_payment`(`amount`, `payment_status`, `log_id`, `cart_id`) VALUES ('$amt', '$payment_status', '$log_id', '$cart_id')";
    $result = $conn->query($sql3);
    
    if($result){
        $pay_id = $conn->insert_id;
        $sql4 = "INSERT INTO tbl_order (pay_id,status) VALUES ( '$pay_id',0)";
        $result = $conn->query($sql4);
        
        if($result){
            // Delete cart items that were added to the order
            $sql5 = "UPDATE tbl_cart SET status='1' WHERE cart_id = '$cart_id'";
            $result2 = $conn->query($sql5);
        } 
    }
}
}
?>
