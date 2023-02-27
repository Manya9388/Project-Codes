<?php
session_start();
include ('config.php');
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );

if(isset($_POST['submit']))
{
    $sub_id=$_POST['sub_id'];
    $sub_Name=$_POST['sub_Name'];
    
    
    
$query="UPDATE tbl_subcategory SET sub_Name='$sub_Name' where sub_id='$sub_id'";
$query_run=mysqli_query($conn,$query);
if($query_run)
{
    $_SESSION['status'] = "Subcategory updated successfully";
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
     if(isset($_GET['sub_id']))
     {
$sub_id=$_GET['sub_id'];
$query=mysqli_query($conn,"select * from tbl_subcategory where sub_id='$sub_id'");
while($row=mysqli_fetch_array($query))
{
?>

<div class="wrapper">
    <div class="title">
      UPDATE SUBCATEGORY
    </div>
   
    <div class="form">
    <input type="hidden"name="sub_id"value="<?= $row['sub_id'] ?>">
       <div class="inputfield">
          <label>Subcategory Name</label>
          <input type="text" class="input" name="sub_Name" placeholder="Subcategoty Name" value="<?= $row['sub_Name'] ?>" required>
       </div>   
      <div class="inputfield">
        <input type="submit" value="UPDATE" name="submit" class="btn">
      
    </div>
    <?php }} ?> 
</div>
</form>
</body>
</html>
