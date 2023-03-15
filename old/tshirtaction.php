<?php
    session_start(); 
    include ('config.php');
    $email = $_SESSION['email'];
    
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(isset($_POST['addBag'])){
            $product_id= $_POST['product_id'];
            $cat_id= $_POST['cat_id'];
            $quantity=$_POST['quantity'];
            $sqlq="SELECT log_id from tbl_login where email='$email'";
            $resu = mysqli_query($conn, $sqlq);
            $row = mysqli_fetch_assoc($resu);
            $log_id= $row['log_id'];
            $sql_already_exist = mysqli_query($conn,"SELECT quantity FROM tbl_cart WHERE product_id = $product_id AND log_id= $log_id");
            if($sql_already_exist && mysqli_num_rows($sql_already_exist) > 0){
                $row = mysqli_fetch_array($sql_already_exist);
                $quantity = $quantity + $row["quantity"];