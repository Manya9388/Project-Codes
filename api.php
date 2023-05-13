<?php
session_start();

include_once 'config.php';
if(strlen($_SESSION['email'])==0)
 { 
header('location:index.php');
}
 else{
$order_id=intval($_GET['order_id']);
if(isset($_POST['submit2'])){
$db_name=$_POST['name'];
echo $db_name;
$query1=mysqli_query($conn,"SELECT db_id from tbl_dbrequest where db_name='$db_name'");
while($row=mysqli_fetch_array($query1))
{
    $db_id= $row['db_id'];
$query=mysqli_query($conn,"INSERT INTO `tbl_dbassign`( `db_id`, `order_id`,  `dba_status`) VALUES ('$db_id','$order_id','Null')");
}
echo "<script>alert('Order updated sucessfully...');</script>";
header("Location: adminhome.php");
//}
}
 

$shippingPincode = $_GET['pincode'];

$postal_code1 = "IN/" . $shippingPincode;
$sql = "SELECT db_id, db_name, db_pincode FROM tbl_dbrequest";
$result = mysqli_query($conn, $sql);

$delivery_boys = array();

if ($result->num_rows > 0) {
    // Loop through the results and store the postal codes in the array
    while($row = $result->fetch_assoc()) {
        $delivery_boys[$row["db_name"]] = $row["db_pincode"];
    }

foreach($delivery_boys as $name => $db_pincode) {
    $file_handle = fopen("Kerala.csv", "r");

    // Initialize variables
    $lat1 = 0;
    $lng1 = 0;
    $lat2 = 0;
    $lng2 = 0;

    // Loop through the file and find the latitude and longitude coordinates of the two postal codes
    while (($line = fgetcsv($file_handle)) !== false) {
        if ($line[0] == $postal_code1) {
            $lat1 = $line[3];
            $lng1 = $line[4];
        } elseif ($line[0] == $db_pincode) {
            $lat2 = $line[3];
            $lng2 = $line[4];
        }
        if ($lat1 && $lng1 && $lat2 && $lng2) {
            break;
        }
    }

if (empty($lat1) || empty($lng1) || empty($lat2) || empty($lng2)) {
    echo "Postal code coordinates not found in database for $name.";
} else {
    // Calculate the distance between the two points using Haversine formula
    $earth_radius = 6371; // in kilometers
    $lat1_rad = deg2rad($lat1);
    $lat2_rad = deg2rad($lat2);
    $dLat = deg2rad($lat2 - $lat1);
    $dLng = deg2rad($lng2 - $lng1);
    $a = sin($dLat/2) * sin($dLat/2) + cos($lat1_rad) * cos($lat2_rad) * sin($dLng/2) * sin($dLng/2);
    $c = 2 * atan2(sqrt($a), sqrt(1-$a));
    $distance = $earth_radius * $c;

    // Assign the distance to the delivery boy
    $delivery_boys[$name] = $distance;

    // Echo the details
   
}
}

// Close the file handle
fclose($file_handle);
}
asort($delivery_boys);

// Output the delivery boys and their distances sorted by distance in ascending order
foreach ($delivery_boys as $name => $distance) {
    echo "$name=$distance kilometers<br>";
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
                    <li class="breadcrumb-item"><a href="adminhome.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Products</a></li>
                    <li class="breadcrumb-item active">Admin</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
<body>
<!--<?php include('include/header.php');?>-->

	<div class="wrapper">
		<div class="container">
			<div class="row">
<!--<?php include('include/sidebar.php');?>-->				
			<div class="span9">
      <div style="margin-left:500px;">
      <form name="updateticket" id="updateticket" method="post"> 
<table width="100%" border="0" cellspacing="0" cellpadding="0">

    <tr height="50">
      <td colspan="2" class="fontkink2" style="padding-left:0px;"><div class="fontpink2"><b>Assign Delivery Agents !</b></div></td>
      
    </tr>
    <tr height="30">
      <td  class="fontkink1"style="font-size:14px" ><b>Order Id:</b></td>
      <td  class="fontkink"><?php echo $order_id;?></td>
    </tr>
   
    
      

   
    
   
    <tr height="50">
      <td class="fontkink1"style="font-size:16px" >Delivery Agents : &nbsp; &nbsp; </td>
      <td  class="fontkink"><span class="fontkink1" >
      <select name="name" class="fontkink" required="required">
   &nbsp; &nbsp; <option value="">&nbsp; &nbsp;Select</option>
    <?php 
        $prev_distance = null; // initialize previous distance as null
        foreach ($delivery_boys as $name => $distance) {
            // check if the current distance is the same as the previous one
            if ($distance == $prev_distance) {
                $class = 'same-distance'; // add a class to mark them in the same color
            } else {
                $class = ''; // empty class otherwise
            }
    ?>
        <option  style="color:#FF6F61"value="<?php echo $name; ?>" class="<?php echo $class; ?>"><?php echo $name; ?></option>
    <?php 
            $prev_distance = $distance; // update previous distance for the next iteration
        } 
    ?>
</select>

        </span></td>
    </tr>

   
    <tr>
      <td class="fontkink1">&nbsp;</td>
      <td  >&nbsp;</td>
    </tr>
    <tr>
      <td class="fontkink">       </td>
      <td  class="fontkink"> <input type="submit" name="submit2"  value="update"   size="40" style="cursor: pointer;" /> &nbsp;&nbsp;   
      
    </tr>
<?php } ?>
</table>
 </form>
</div>

				</div><!--/.span9-->
			
		</div><!--/.container-->
	</div><!--/.wrapper-->

	
	
</body>
</html>
