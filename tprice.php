            <?php
    session_start(); 
    include ('config.php');
    $email = $_SESSION['email'];
    if(isset($_POST['submit']))
{
    
            $to_id= $_GET['to_id'];
            $price= $_POST['price'];
            $update = mysqli_query($conn, "UPDATE `tbl_torder` SET `price`= '$price' WHERE to_id='$to_id'");
                if($update){
                    echo "<script>
                    alert('Price Added.');
                        window.href=location='adminhome.php';
                    </script>";      
                }}?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="stylescadd.css">
  </head>
  
  <body>
    <form method="POST" action="#">
<div class="wrapper">
    <div class="title">
      ADD PRICE
    </div>
    <div class="form">
       <div class="inputfield">
          <label>Product Price:</label>
          <input type="text" class="input" name="price" placeholder="Price" required>
       </div>   
      <div class="inputfield">
        <input type="submit" value="Apply" name="submit" class="btn">
      </div>
    </div>
</div>
</form>
<script type="text/javascript" src="date.js"></script>
</body>
</html>