<?php
session_start();
include ('config.php');
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );

if(isset($_POST['submit']))
{
    $cat_id=$_POST['cat_id'];
    $cat_Name=$_POST['cat_Name'];
    $cat_Des=$_POST['cat_Des'];
    
    
$query="UPDATE tbl_category SET cat_Name='$cat_Name',cat_Des='$cat_Des'  where cat_id='$cat_id'";
$query_run=mysqli_query($conn,$query);
if($query_run)
{
    $_SESSION['status'] = "Category updated successfully";
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
     if(isset($_GET['cat_id']))
     {
$cat_id=$_GET['cat_id'];
$query=mysqli_query($conn,"select * from tbl_category where cat_id='$cat_id'");
while($row=mysqli_fetch_array($query))
{
?>

<div class="wrapper">
    <div class="title">
      UPDATE CATEGORY
    </div>
   
    <div class="form">
    <input type="hidden"name="cat_id"value="<?= $row['cat_id'] ?>">
       <div class="inputfield">
          <label>Category Name</label>
          <input type="text" class="input" name="cat_Name" placeholder="Categoty Name" value="<?= $row['cat_Name'] ?>" required>
       </div>   
       <div class="inputfield">
        <label>Category Description</label>
        <input type="text" class="input" name="cat_Des" placeholder="Category Description" value="<?= $row['cat_Des'] ?>" required>
       </div>
        <div class="inputfield">
        <input type="submit" value="UPDATE" name="submit" class="btn">
      
    </div>
    <?php }} ?> 
</div>
</form>
</body>
</html>








