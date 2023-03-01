<?php
    session_start(); 
    include ('config.php');
   
    if(isset($_POST['update_Item']))
         {
            $cart_id= $_POST['cart_id'];
            $quantity= $_POST['quantity'];
            #$sqlq="SELECT logid from login where email='$email'";
           # $resu = mysqli_query($conn, $sqlq);
            #$row = mysqli_fetch_assoc($resu);
            #$logid= $row['logid'];

            
           

            $update_cart_item_res= mysqli_query($conn, "UPDATE `tbl_cart` SET `quantity`='$quantity' WHERE cart_id='$cart_id '");
            if($update_cart_item_res){
                echo "<script>
                    alert('Item updated successfully.');
                    window.location.href='shopping-cart.php';
                </script>";
            }
            else{
                echo "<script>
                    alert('Unable to update item !! Please try again');
                    // window.location.href='shopping-cart.php';
                </script>";
            }
       }
       ?>