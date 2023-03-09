<?php
include('config.php');
if(isset($_POST["btnsubmit8"]))
{

    $tcategory=$_POST['tcategory'];
    $tcolour=$_POST['tcolour'];
    $tsize=$_POST['tsize'];
    $tquantity=$_POST['tquantity'];
   
     $sql=mysqli_query($conn,"INSERT INTO tbl_tshirt(tcategory,tcolour,tsize,tquantity,status) VALUES('$tcategory','$tcolour','$tsize','$tquantity',0)");

    if($sql)
      {
       
    echo "<script>alert('Tshirt added Successfully!!');window.location='adminhome.php'</script>";
      }
    else
      {
    echo "<script>alert('Error');window.location='adminhome.php'</script>";
      }
    }
    
    
  	
?>
