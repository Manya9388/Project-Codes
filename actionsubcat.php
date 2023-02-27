<?php 
include('config.php');
if(isset($_POST['btnsubmit2']))
{
  
$sub_Name=$_POST['sub_Name'];
$cat_id=$_POST['cat_id'];
$sql="select * from tbl_subcategory where (sub_Name='$sub_Name');";

    $res=mysqli_query($conn,$sql);

    if (mysqli_num_rows($res) > 0) {
      
        $row = mysqli_fetch_assoc($res);
      if($sub_Name==isset($row['sub_Name']))
      {
		echo "<script>alert('This sub-category name is already exist');window.location='adminhome.php'</script>";	
		}
		
    } 
    else{

    
        $sql=mysqli_query($conn,"insert into tbl_subcategory(cat_id,sub_Name,status) values('$cat_id','$sub_Name','0')");
       echo "<script>alert('Category added successfully');window.location='adminhome.php'</script>";
           }
     }
    ?>