<?php 
include('config.php');
if(isset($_POST['btnsubmit']))
{
  
$cat_Name=$_POST['cat_Name'];
$cat_Des=$_POST['cat_Des'];
$sql="select * from tbl_category where (cat_Name='$cat_Name');";

    $res=mysqli_query($conn,$sql);

    if (mysqli_num_rows($res) > 0) {
      
        $row = mysqli_fetch_assoc($res);
      if($cat_Name==isset($row['cat_Name']))
      {
		echo "<script>alert('This category name is already exist');window.location='adminhome.php'</script>";	
		}
		
    } 
    else{

    
        $sql=mysqli_query($conn,"insert into tbl_category(cat_Name,cat_Des,status) values('$cat_Name','$cat_Des','0')");
       echo "<script>alert('Category added successfully');window.location='adminhome.php'</script>";
           }
     }
    ?>