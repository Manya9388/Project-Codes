<?php
    session_start(); 
    include ('config.php');
    $email = $_SESSION['email'];
    
    
            $product_id= $_GET['to_id'];
            $quantity= 1;
            $sqlq="SELECT log_id from tbl_login where email='$email'";
            $resu = mysqli_query($conn, $sqlq);
            $row = mysqli_fetch_assoc($resu);
            $log_id= $row['log_id'];
            $sql_already_exist = mysqli_query($conn,"SELECT quantity FROM tbl_cart WHERE product_id = $product_id AND log_id= $log_id");
            if($sql_already_exist && mysqli_num_rows($sql_already_exist) > 0){
                $row = mysqli_fetch_array($sql_already_exist);
                $quantity = $quantity + $row["quantity"];
                
                
                $update_cart_item = mysqli_query($conn, "UPDATE `tbl_cart` SET `quantity`= '$quantity' WHERE product_id='$product_id' AND `log_id` = $log_id");
                if($update_cart_item){
                    echo "<script>
                    alert('Product added to cart successfully.');
                        window.href=location='my_account.php';
                    </script>";      
                }
            }else{
           
                $sql3=mysqli_query($conn,"SELECT log_id from tbl_login where email='$email'");
                while($row=mysqli_fetch_array($sql3))
                {
                  $a=$row['log_id'];
                $addtocart_res= mysqli_query($conn,"INSERT INTO tbl_cart VALUES(null,$product_id,$a,$quantity,0)");
            }
                //$addtocart_res= mysqli_query($conn,"INSERT INTO tbl_cart VALUES(null,$product_id,12,$quantity,0)");
                if(mysqli_insert_id($conn) >= 0){
                    echo "<script>
                        alert('Product added to cart successfully.');
                        window.href=location='my_account.php';
                    </script>";
                
            
        
        }
        
    }