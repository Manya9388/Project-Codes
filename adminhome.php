<?php
session_start();
if($_SESSION['email']){
    echo "Welcome Admin";
}
else{
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Clothing Management System</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="eCommerce " name="keywords">
        <meta content="eCommerce " name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/slick/slick.css" rel="stylesheet">
        <link href="lib/slick/slick-theme.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
        <!-- Top bar Start -->
        <div class="top-bar">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <i class="fa fa-envelope"></i>
                        estoreclothings@gmail.com
                    </div>
                    <div class="col-sm-6">
                        <i class="fa fa-phone-alt"></i>
                        +91 9048818583
                    </div>
                </div>
            </div>
        </div>
        <!-- Top bar End -->
        
        <!-- Nav Bar Start -->
        <div class="nav">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                    <a href="#" class="navbar-brand">MENU</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto">
                            <a href="adminhome.php" class="nav-item nav-link">Home</a>
                            
                            
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">View Details</a>
                                <div class="dropdown-menu">
                                    <a id="address-nav" data-toggle="pill" href="#categoryview-tab" role="tab" class="dropdown-item">Category</a>
                                    <a id="address-nav" data-toggle="pill" href="#subcategoryview-tab" role="tab" class="dropdown-item">Sub-category</a>
                                    <a id="address-nav" data-toggle="pill" href="#productview-tab" role="tab" class="dropdown-item">Products</a>
                                    <a id="address-nav" data-toggle="pill" href="#tshirtview-tab" role="tab" class="dropdown-item">Tshirts</a>
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="navbar-nav ml-auto">
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Admin</a>
                                <div class="dropdown-menu">
                                    
                                    <a href="logout.php" class="dropdown-item">Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Nav Bar End -->      
        
        <!-- Bottom Bar Start -->
        <div class="bottom-bar">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <div class="logo">
                            <a href="index.html">
                                <img src="img/logo.png" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="search">
                            <input type="text" placeholder="Search">
                            <button><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- Bottom Bar End --> 
        
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Products</a></li>
                    <li class="breadcrumb-item active">Admin</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- My Account Start -->
        <div class="my-account">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="orders-nav" data-toggle="pill" href="#orders-tab" role="tab"><i class="fa fa-shopping-cart"></i>Orders</a>
                            <a class="nav-link " id="dashboard-nav" data-toggle="pill" href="#dashboard-tab" role="tab"><i class="fa fa-shopping-bag"></i>Add Tshirts</a>
                            <a class="nav-link" id="payment-nav" data-toggle="pill" href="#category-tab" role="tab"><i class="fa fa-shopping-bag"></i>Add Category</a>
                            <a class="nav-link" id="address-nav" data-toggle="pill" href="#address-tab" role="tab"><i class="fa fa-shopping-bag"></i>Add Products</a>
                            <a class="nav-link" id="account-nav" data-toggle="pill" href="#subc-tab" role="tab"><i class="fa fa-shopping-bag"></i>Add Subcategory</a>
                            <a class="nav-link" href="logout.php"><i class="fa fa-sign-out-alt"></i>Logout</a>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane fade" id="dashboard-tab" role="tabpanel" aria-labelledby="dashboard-nav">
                            <html>
                                    <form role="form" action="actiontshirt.php" method="post" >
                                        
                                    <div class="panel-body">
                                    
                                    <div class="col-md-3 form-group">
                                    
                                        <label for="measure">Tshirt Category </label>
                                        <select class="form-control m-bot15" name="tcategory">
                                        <option>---Select---</option>
                                    <option>Short sleeve shirts</option>
                                    <option>Long sleeve shirts</option>
                                    <option>Hoodies</option>
                                    <option>Tank tops</option>
                                    
                                    </select>
                                    
                                    
                                    </div>
                                    <div class="col-md-3 form-group">
                                    
                                        <label for="measure">Colour </label>
                                        <select class="form-control m-bot15" name="tcolour">
                                        <option>---Select---</option>
                                    <option>White</option>
                                    <option>Dark Heather</option>
                                    <option>Gray</option>
                                    <option>Charcoal</option>
                                    <option>Black</option>
                                    <option>Heather Orange</option>
                                    <option>Heather Dark Chocolate</option>
                                    <option>Salmon</option>
                                    <option>Chesnut</option>
                                    <option>Dark chocolate</option>
                                    <option>Citrus Yellow</option>
                                    <option>Avacardo</option>
                                    <option>Kiwi</option>
                                    <option>Irish Green</option>
                                    <option>Scrub Green</option>
                                    <option>Teal Ice</option>
                                    <option>Heather Sapphire</option>
                                    <option>Sky</option>
                                    <option>Antique Sapphire</option>
                                    <option>Heather Navy</option>
                                    <option>Cherry Red</option>
                                    </select>
                                </div>
                                    <div class="col-md-3 form-group">
                                    
                                        <label for="measure">Size </label>
                                        <select class="form-control m-bot15" name="tsize">
                                        <option>---Select---</option>
                                    <option>S</option>
                                    <option>M</option>
                                    <option>L</option>
                                    <option>XL</option>
                                    <option>XXL</option>
                                    </select>
                                    
                                    
                                    </div>
                                    <div class="col-md-4 form-group">
                                    <label for="qua"> Quantity</label>
                                    <input type="number" id="tquantity" name="tquantity" min="1" max="50">
                                    
                                  
                                    </div>
                                    <button type="submit" name="btnsubmit8"class="btn btn-info">Submit</button>
                                    
                                    </div>
                                
                                    </form>
                       
                                    
                                    </html> 
                              
                            </div>
                            <div class="tab-pane fade show active" id="orders-tab" role="tabpanel" aria-labelledby="orders-nav">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>No</th>
                                                <th>Product</th>
                                                <th>Date</th>
                                                <th>Price</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                         <!--   <tr>
                                                <td>3</td>
                                                <td>Product Name</td>
                                                <td>01 Jan 2020</td>
                                                <td>$99</td>
                                                <td>Approved</td>
                                                <td><button class="btn">View</button></td>
                                            </tr>-->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="subc-tab" role="tabpanel" aria-labelledby="payment-nav">
                                
                                <div class="panel-body">
                                    <div class="position-center">
                                        <form role="form" action="actionsubcat.php" method="post">
                                        <div class="form-group">
                                    <?php
                                    $con=mysqli_connect("localhost","root","","clothing");
                                    
                                    
                                    $sql=mysqli_query($con,"select * from tbl_category WHERE status=0"); 
                                    ?>
                                    <label>Category Name</label><br>
                                    
                                    
                                    <select   name="cat_id" id="category" onchange="showResult(this.value)" class="form-control m-bot15" required >
                                    <option value=" ">--select--</option>
                                    <?php
                                    while($row=mysqli_fetch_array($sql))
                                    {
                                    
                                    ?>
                                    <option value="<?php echo $row[0] ?>"> <?php echo $row[2] ?></option>
                                    
                                    <?php
                                    
                                    }
                                    ?>
                                    
                                    </select></div>
                                       
                                            <div class="form-group">
                                                <label for="name">Name Of Sub-Category</label>
                                                <input type="text" class="form-control" name="sub_Name" id="sub_Name" placeholder="Enter sub-category Name"  required onchange="Validstr2();"/>
                                                
                                            </div>
                                            <span id="msg1" style="color:red;"></span>
                            <script>
                                function Validstr2() 
                                {
                                var val = document.getElementById('sub_Name').value;
                                if (!val.match(/^[a-zA-Z ]*$/)) 
                                {
                                  document.getElementById('msg1').innerHTML="Start with a Capital letter & Only alphabets are allowed";
                                        document.getElementById('sub_Name').value = "";
                                          return false;
                                }
                                  document.getElementById('msg1').innerHTML=" ";
                                 return true;
                                }
                           </script>
                           
                                        <button type="submit" name="btnsubmit2"class="btn btn-info">Submit</button>
                                    </form>
                                    </div>
        
                                </div>
                            </div>
                            <div class="tab-pane fade" id="category-tab" role="tabpanel" aria-labelledby="payment-nav">
                                
                                <div class="panel-body">
                                    <div class="position-center">
                                        <form role="form" action="actioncat.php" method="post">
                                            <div class="form-group">
                                                <label for="name">Name Of Category</label>
                                                <input type="text" class="form-control" name="cat_Name" id="cat_Name" placeholder="Enter category Name"  required onchange="Validstr3();"/>
                                                <input type="text" class="form-control" name="cat_Des"  id="cat_Des"  placeholder="Enter Description"  />
                                            </div>
                                            <span id="msg1" style="color:red;"></span>
                            <script>
                                function Validstr3() 
                                {
                                var val3 = document.getElementById('cat_Name').value;
                                if (!val3.match(/^[a-zA-Z ]*$/)) 
                                {
                                  document.getElementById('msg1').innerHTML="Start with a Capital letter & Only alphabets are allowed";
                                        document.getElementById('cat_Name').value = "";
                                          return false;
                                }
                                  document.getElementById('msg1').innerHTML=" ";
                                 return true;
                                }
                           </script>
                                       
                                        <button type="submit" name="btnsubmit"class="btn btn-info">Submit</button>
                                    </form>
                                    </div>
        
                                </div>
                            </div>
                            <div class="tab-pane fade" id="categoryview-tab" role="tabpanel" aria-labelledby="payment-nav">
                                
                                <div class="panel-body">
                                    <div class="position-center">
                                    
    
                                    <table style="width:75%"cellpadding="10" cellspacing="4" border="3" align="center">
              
              <tr>
                  <th>SERIAL NO</th>
                  <th>CATEGORY NAME</th>
                  <th>CATEGORY DESCRIPTION</th>
                  <th>STATUS</th>
                  <th>UPDATE</th>
              </tr>
          
              
              <?php
              include 'config.php';
              $query=mysqli_query($conn,"select * from tbl_category");
              
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>                                  
              <tr>
                  <td><?php echo htmlentities($cnt);?></td>
                  <td><?php echo htmlentities($row['cat_Name']);?></td>
                  <td><?php echo htmlentities($row['cat_Des']);?></td>
                  
               <td>
               <?php
                    if($row['status']==1){
                        echo '<p><a href="catinactivate.php?id='.$row['cat_id'].'$status=1">INACTIVE</a></p>';
                    }else{
                        echo '<p><a href="catactivate.php?id='.$row['cat_id'].'$status=0">ACTIVE</a></p>';
                    }
                    ?>
               <td><a href="catedit.php?cat_id=<?php echo $row['cat_id']?>">EDIT</a></td>
              </tr>
              <?php $cnt=$cnt+1; } ?>
              
      </table>
    </div>
</div>
</div>
<div class="tab-pane fade" id="subcategoryview-tab" role="tabpanel" aria-labelledby="payment-nav">
                                
                                <div class="panel-body">
                                    <div class="position-center">
                                        
                                    <table style="width:75%"cellpadding="10" cellspacing="4" border="3" align="center">
              
              <tr>
                  <th>SERIAL NO</th>
                 
                  <th>SUBCATEGORY NAME</th>
                  <th>CATEGORY NAME</th>
                  <th>STATUS</th>
                  <th>UPDATE</th>
              </tr>
          
              
              <?php
             
              $query=mysqli_query($conn,"SELECT tbl_subcategory.sub_id,tbl_category.cat_Name,tbl_subcategory.sub_Name ,tbl_subcategory.status from tbl_subcategory join tbl_category on tbl_category.cat_id=tbl_subcategory.cat_id");
              
$cnt=1;
while($row=mysqli_fetch_array($query))
{
   
?>                                  
              <tr>
                  <td><?php echo htmlentities($cnt);?></td>
                 
                  <td><?php echo htmlentities($row['sub_Name']);?></td>
                  <td><?php echo htmlentities($row['cat_Name']);?> </td>
               <td>
               <?php
                    if($row['status']==1){
                        echo '<p><a href="subinactivate.php?id='.$row['sub_id'].'$status=1">INACTIVE</a></p>';
                    }else{
                        echo '<p><a href="subactivate.php?id='.$row['sub_id'].'$status=0">ACTIVE</a></p>';
                    }
                    ?>
               <td><a href="subedit.php?sub_id=<?php echo $row['sub_id']?>">EDIT</a></td>
              </tr>
              <?php $cnt=$cnt+1; } ?>
              
      </table>
    </div>
</div>
</div>

<div class="tab-pane fade" id="tshirtview-tab" role="tabpanel" aria-labelledby="payment-nav">
                                
                                <div class="panel-body">
                                    <div class="position-center">
                                        
                                    <table style="width:75%"cellpadding="10" cellspacing="4" border="3" align="center">
              
              <tr>
                  <th>SERIAL NO</th>
                  <th>TSHIRT CATEGORY</th>
                  <th>COLOUR</th>
                  <th>SIZE</th>
                  <th>QUANTITY</th>
                  <th>ACTION</th>
                  <th>UPDATE</th>
              </tr>
          
              
              <?php
             
              $query=mysqli_query($conn,"SELECT * from tbl_tshirt");
              
$cnt=1;
while($row=mysqli_fetch_array($query))
{
   
?>                                  
              <tr>
                  <td><?php echo htmlentities($cnt);?></td>
                  <td><?php echo htmlentities($row['tcategory']);?></td>
                  <td><?php echo htmlentities($row['tcolour']);?> </td>
                  <td><?php echo htmlentities($row['tsize']);?> </td>
                  <td><?php echo htmlentities($row['tquantity']);?> </td>
               <td>
               <?php
                    if($row['status']==1){
                        echo '<p><a href="tinactivate.php?id='.$row['t_id'].'$status=1">INACTIVE</a></p>';
                    }else{
                        echo '<p><a href="tactivate.php?id='.$row['t_id'].'$status=0">ACTIVE</a></p>';
                    }
                    ?>
               <td><a href="tedit.php?t_id=<?php echo $row['t_id']?>">EDIT</a></td>
              </tr>
              <?php $cnt=$cnt+1; } ?>
              
      </table>
    </div>
</div>
</div>


<div class="tab-pane fade" id="productview-tab" role="tabpanel" aria-labelledby="payment-nav">
                                
                                <div class="panel-body">
                                    <div class="position-center">
                                    <table style="width:75%"cellpadding="10" cellspacing="4" border="3" align="center">
              
              <tr>
                  <th>SERIAL NO</th>
                  <th>PRODUCT</th>
                  <th>PRICE</th>
                  <th>SIZE</th>
                  <th>COLOUR</th>
                  <th>OCCASSION</th>
                  <th>QUANTITY</th>
                  <th>STATUS</th>
                  <th>UPDATE</th>
              </tr>
          
              
              <?php
              
              $query=mysqli_query($conn,"select * from tbl_products");
              
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>                                  
              <tr>
                  <td><?php echo htmlentities($cnt);?></td>
                  <td><?php echo htmlentities($row['product']);?></td>
                  <td><?php echo htmlentities($row['price']);?></td>
                  <td><?php echo htmlentities($row['size']);?></td>
                  <td><?php echo htmlentities($row['colour']);?></td>
                  <td><?php echo htmlentities($row['occassion']);?></td>
                  <td><?php echo htmlentities($row['quantity']);?></td>
                  
               <td>
               <?php
                    if($row['status']==1){
                        echo '<p><a href="proinactivate.php?id='.$row['product_id'].'$status=1">INACTIVE</a></p>';
                    }else{
                        echo '<p><a href="proactivate.php?id='.$row['product_id'].'$status=0">ACTIVE</a></p>';
                    }
                    ?>
               <td><a href="proedit.php?product_id=<?php echo $row['product_id']?>">EDIT</a></td>
              </tr>
              <?php $cnt=$cnt+1; } ?>
              
      </table>
    </div>
</div>
</div>
                                    
                            <div class="tab-pane fade" id="address-tab" role="tabpanel" aria-labelledby="address-nav">
                                <html>
                                    <form role="form" action="actionproduct.php" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="name">Product Name</label>
                                            <input type="text" class="form-control" name="product" id="name" placeholder="Enter Name">
                                        </div>
                                        <div class="form-group">
                                    <?php
                                    $con=mysqli_connect("localhost","root","","clothing");
                                    
                                    
                                    $sql=mysqli_query($con,"select * from tbl_category WHERE status=0"); 
                                    ?>
                                    <label>Category Name</label><br>
                                    
                                    
                                    <select   name="cat_id" id="category" onchange="showResult(this.value)" class="form-control m-bot15" required >
                                    <option value=" ">--select--</option>
                                    <?php
                                    while($row=mysqli_fetch_array($sql))
                                    {
                                    
                                    ?>
                                    <option value="<?php echo $row[0] ?>"> <?php echo $row[2] ?></option>
                                    
                                    <?php
                                    
                                    }
                                    ?>
                                    
                                    </select></div>
                                    <div class="form-group">
                                    <?php
                                    $con=mysqli_connect("localhost","root","","clothing");
                                    
                                    
                                    $sql=mysqli_query($con,"select * from tbl_subCategory WHERE status=0"); 
                                    ?>
                                    <label>Subcategory Name</label><br>
                                    
                                    
                                    <select   name="sub_id" id="sub_category" onchange="showResult(this.value)" class="form-control m-bot15" required >
                                    <option value="">--select--</option>
                                    <?php
                                    while($row=mysqli_fetch_array($sql))
                                    {
                                    
                                    ?>
                                    <option value="<?php echo $row[0] ?>" ><?php echo $row[2] ?></option>
                                    <?php
                                    
                                    }
                                    ?>
                                    
                                    </select></div>                       
                                        <div class="form-group">
                                            <label for="des">Colour</label>
                                            <input type="text" class="form-control" name="colour" id="des">
                                        </div>
                                        <div class="form-group">
                                            <label for="des">Occasion</label>
                                            <input type="text" class="form-control" name="occassion" id="des">
                                        </div>
                                          <div class="form-group">           
                                            <label for="image">Product image</label>
                                            <input type="file" class="form-control" accept="image/gif, image/jpeg, image/png, image/jpg"  name="img" id="image">
                                        </div>
                                       
                                        <div class="panel-body">
                                    
                                       <div class="row">
                                         
                                        <div class="col-md-4 form-group">
                                        <label for="qua">Product Quantity</label>
                                    <input type="number"  class="form-control" name="quantity" min=0 max=10>
                                    
                                    </div>
                                    
                                    <div class="col-md-3 form-group">
                                    
                                        <label for="measure">Size </label>
                                        <select class="form-control m-bot15" name="size">
                                        <option>---Select---</option>
                                    <option>S</option>
                                    <option>M</option>
                                    <option>L</option>
                                    <option>XL</option>
                                    <option>XXL</option>
                                    </select>
                                    
                                    
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="price">Price</label>
                                    <input type="text"  class="form-control" name="price">
                                    
                                    </div>
                                    
                                    </div>
                                    </div>
                                    <button type="submit" name="btnsubmit3"class="btn btn-info">Submit</button>
                                    </form>
                                    </div>
                                </div>
                                    </div>
            
                            <div class="tab-pane fade" id="account-tab" role="tabpanel" aria-labelledby="account-nav">
                                <h4>Account Details</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" placeholder="First Name">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" placeholder="Last Name">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" placeholder="Mobile">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" placeholder="Email">
                                    </div>
                                    <div class="col-md-12">
                                        <input class="form-control" type="text" placeholder="Address">
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn">Update Account</button>
                                        <br><br>
                                    </div>
                                </div>
                                <h4>Password change</h4>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input class="form-control" type="password" placeholder="Current Password">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" placeholder="New Password">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" placeholder="Confirm Password">
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn">Save Changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- My Account End -->
        
        <!-- Footer Start -->
        <div class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Get in Touch</h2>
                            <div class="contact-info">
                                <p><i class="fa fa-map-marker"></i>123 Estore Kottayam,Kerala</p>
                                <p><i class="fa fa-envelope"></i>estoreclothings@example.com</p>
                                <p><i class="fa fa-phone"></i>+91 9048818583</p>
                            </div>
                        </div>
                    </div>
                
                </div>
            
            </div>
        </div>
        <!-- Footer End -->
        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/slick/slick.min.js"></script>
        
        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
</html>
