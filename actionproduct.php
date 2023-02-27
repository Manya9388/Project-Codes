<?php
include('config.php');
$targetDir="shopping/images1/";
if(isset($_POST["btnsubmit3"]))
{

    $product=$_POST['product'];
    $cat_id=$_POST['cat_id'];
    $sub_id=$_POST['sub_id'];
    $colour=$_POST['colour'];
    $occassion=$_POST['occassion'];
    $img=$_FILES["img"]["name"];
    $size=$_POST['size'];
    $quantity=$_POST['quantity'];
    $price=$_POST['price'];
    $targetFilePath = $targetDir . $img;
    move_uploaded_file($_FILES["img"]["tmp_name"],$targetFilePath);
    
    $sql=mysqli_query($conn,"INSERT INTO tbl_products(product,cat_id,sub_id,img,price,size,colour,occassion,quantity) VALUES('$product','$cat_id','$sub_id','$img','$price','$size','$colour','$occassion','$quantity')");

    if($sql)
      {
       
    echo "<script>alert('Product Details Registered Successfully!!');window.location='adminhome.php'</script>";
      }
    else
      {
    echo "<script>alert('Error');window.location='adminhome.php'</script>";
      }
    }
    
    
  	
?>
