<?php
    session_start(); 
    include ('config.php');
    $email = $_SESSION['email'];
    
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(isset($_POST['add_to_cart'])){
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
                
                
                $update_cart_item = mysqli_query($conn, "UPDATE `tbl_cart` SET `quantity`= '$quantity' WHERE product_id='$product_id' AND `log_id` = $log_id");
                if($update_cart_item){
                    echo "<script>
                    alert('Product added to cart successfully.');
                        window.href=location='category.php?cat_id=$cat_id';
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
                        window.href=location='category.php?cat_id=$cat_id';
                    </script>";
                
            
        
        }
        }}
        if(isset($_POST['update_Item']))
        {
           $product_id= $_POST['product_id'];
           $quantity= $_POST['quantity'];
           $sqlq="SELECT log_id from tbl_login where email='$email'";
           $resu = mysqli_query($conn, $sqlq);
           $row = mysqli_fetch_assoc($resu);
           $log_id= $row['log_id'];

           
          

           $update_cart_item_res= mysqli_query($conn, "UPDATE `tbl_cart` SET `quantity`='$quantity' WHERE product_id='$product_id '");
           if($update_cart_item_res){
               echo "<script>
                   alert('Item updated successfully.');
                   window.location.href='my-cart.php';
               </script>";
           }
           else{
               echo "<script>
                   alert('Unable to update item !! Please try again');
                   // window.location.href='../cart/mycart.php';
               </script>";
           }
      }

      if(isset($_POST['Remove_Item']))
       {
           $product_id= $_POST['product_id'];
           $sqlq="SELECT log_id from tbl_login where email='$email'";
           $resu = mysqli_query($conn, $sqlq);
           $row = mysqli_fetch_assoc($resu);
           $log_id= $row['log_id'];

           $del_cart_item_res= mysqli_query($conn,"DELETE FROM tbl_cart WHERE product_id=$product_id AND log_id=$log_id");
           if($del_cart_item_res){
               echo "<script>
                   alert('Item deleted from cart successfully.');
                   window.location.href='my-cart.php';
               </script>";
           }
           else{
               echo "<script>
                   alert('Unable to delete item !! Please try again');
                   window.location.href='my-cart.php';
               </script>";
           }
       }
       
    }
        
    
?>