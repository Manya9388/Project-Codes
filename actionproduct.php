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
    $size1=$_POST['size1'];
    $size2=$_POST['size2'];
    $size3=$_POST['size3'];
    $size4=$_POST['size4'];
    $size5=$_POST['size5'];
    $quantity1=$_POST['quantity1'];
    $quantity2=$_POST['quantity2'];
    $quantity3=$_POST['quantity3'];
    $quantity4=$_POST['quantity4'];
    $quantity5=$_POST['quantity5'];
    $price=$_POST['price'];
    $targetFilePath = $targetDir . $img;
    move_uploaded_file($_FILES["img"]["tmp_name"],$targetFilePath);
    
    $sql="INSERT INTO tbl_products(product,cat_id,sub_id,img,price,colour,occassion) VALUES('$product','$cat_id','$sub_id','$img','$price','$colour','$occassion')";
    $result = $conn->query($sql);
    
    if($result){
        $product_id = $conn->insert_id;
    $sql2="INSERT INTO `tbl_size`(`product_id`, `size1`, `size2`, `size3`, `size4`, `size5`, `quantity1`, `quantity2`, `quantity3`, `quantity4`, `quantity5`) VALUES ('$product_id','$size1','$size2','$size3','$size4','$size5','$quantity1','$quantity2','$quantity3','$quantity4','$quantity5')";
    $result2 = $conn->query($sql2);
  }
    if($result2)
      {
       
    echo "<script>alert('Product Details Registered Successfully!!');window.location='adminhome.php'</script>";
      }
    else
      {
    echo "<script>alert('Error');window.location='adminhome.php'</script>";
      }
    }
    
    
  	
?>
