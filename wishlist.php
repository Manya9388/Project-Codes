<?php
session_start();
include ('config.php');

if(isset($_POST['submit']))
{
    
    $product_id=$_POST['product_id'];
   
    
    $booking_res= mysqli_query($conn,"INSERT INTO tbl_wishlist VALUES(null,$product_id,0,1)");
    if($booking_res){
        echo "<script>
        alert(' successfully');
        window.location.href='./shopping/sub-category.php';
        </script>";
    }
    else{
        echo "<script>alert(' failed');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="stylescadd.css">
  </head>
  <body>
    <form method="POST" action="#">
    <?php
     if(isset($_GET['product_id']))
     {
$product_id=$_GET['product_id'];
$query=mysqli_query($conn,"select * from tbl_products where product_id='$product_id'");
while($row=mysqli_fetch_array($query))
{
?>

<div class="wrapper">
    <div class="title">
      Wishlist
    </div>
   
    <div class="form">
    <input type="hidden"name="product_id"value="<?= $row['product_id'] ?>">
       <div class="inputfield">
          <label> </label>
          <?php echo htmlentities($row['product']);?>
</div>
      <div class="inputfield">
        <input type="submit" value="Add to Wishlist" name="submit" class="btn">
      </div>
    </div>
    <?php }} ?> 
</div>
</form>
</body>
</html>

