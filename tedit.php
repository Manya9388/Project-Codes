<?php
session_start();
include ('config.php');
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );

if(isset($_POST['submit']))
{
    $t_id=$_POST['t_id'];
    $tcategory=$_POST['tcategory'];
    $tcolour=$_POST['tcolour'];
    $tsize=$_POST['tsize'];
    $tquantity=$_POST['tquantity'];
    
    
$query="UPDATE tbl_tshirt SET tcategory='$tcategory',tcolour='$tcolour',tsize='$tsize',tquantity='$tquantity' where t_id='$t_id'";
$query_run=mysqli_query($conn,$query);
if($query_run)
{
    $_SESSION['status'] = "Tshirts updated successfully";
    header('location:adminhome.php');
}
else
{
    echo "no";
}
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styleedit.css">
  </head>
  <body>
    <form method="POST" action="#">
    <?php
     if(isset($_GET['t_id']))
     {
$t_id=$_GET['t_id'];
$query=mysqli_query($conn,"select * from tbl_tshirt where t_id='$t_id'");
while($row=mysqli_fetch_array($query))
{
?>

<div class="wrapper">
    <div class="title">
      UPDATE TSHIRT
    </div>
   
    <div class="form">
    <input type="hidden"name="t_id"value="<?= $row['t_id'] ?>">
       <div class="inputfield">
          <label>Tshirt Category</label>
          <input type="text" class="input" name="tcategory" placeholder="Tshirt category " value="<?= $row['tcategory'] ?>" required>
       </div> 
       <div class="inputfield">
          <label>Tshirt Colour</label>
          <input type="text" class="input" name="tcolour" placeholder="Tshirt colour " value="<?= $row['tcolour'] ?>" required>
       </div>
       <div class="inputfield">
          <label>Tshirt Size</label>
          <input type="text" class="input" name="tsize" placeholder="Tshirt size " value="<?= $row['tsize'] ?>" required>
       </div>
       <div class="inputfield">
          <label>Tshirt Quantity</label>
          <input type="text" class="input" name="tquantity" placeholder="Tshirt quantity" value="<?= $row['tquantity'] ?>" required>
       </div>  
      <div class="inputfield">
        <input type="submit" value="UPDATE" name="submit" class="btn">
      
    </div>
    <?php }} ?> 
</div>
</form>
</body>
</html>
