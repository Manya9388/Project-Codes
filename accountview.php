<?php
session_start();
if($_SESSION['email']){
    echo ($_SESSION['email']);
}
else{
    header("location:index.php");
}
?>
<?php 
include('config.php');?>
<div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                
                  <h5 class="card-title">Profile Details</h5>
                  <?php $query=mysqli_query($conn,"select fname,lname,phone,address,city,region,pincode,district from tbl_customerreg where cust_id=17");

while($row=mysqli_fetch_array($query))
{
?> <html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="styleedit.css">

</head>
<body> 
<div class="wrapper">
      <div class="title">
       PROFILE
      </div>
<div class="row mb-3">

                      <div class="col-md-8 col-lg-9">
                        
                        
                      </div>
                    </div>


                    
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">First Name</div>
                    <div class="col-lg-9 col-md-8">&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp<?php echo htmlentities($row['fname']);?></div>
                  </div>


                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Last Name</div>
                    <div class="col-lg-9 col-md-8">&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp<?php echo htmlentities($row['lname']);?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Phone</div>
                    <div class="col-lg-9 col-md-8">&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp<?php echo htmlentities($row['phone']);?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Address</div>
                    <div class="col-lg-9 col-md-8">&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp<?php echo htmlentities($row['address']);?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">City</div>
                    <div class="col-lg-9 col-md-8">&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp<?php echo htmlentities($row['city']);?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Region</div>
                    <div class="col-lg-9 col-md-8">&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp<?php echo htmlentities($row['region']);?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Postal</div>
                    <div class="col-lg-9 col-md-8">&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp<?php echo htmlentities($row['pincode']);?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">District</div>
                    <div class="col-lg-9 col-md-8">&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp<?php echo htmlentities($row['district']);?></div>
                  </div>
                  <center><div><input type="submit" name="submit" value="Cancel" onClick="document.location.href='my_account.php';" />
</div></center>
                  <?php  } ?>
                </div>
                
                </body>
    </html>
