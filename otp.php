<?php
session_start();
error_reporting(0);
include('config.php');
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
$log_id=$_GET['log_id'];
$order_id = $_GET['order_id'];

// generate OTP
$otp=rand(1000,9999);
$_SESSION['otp'] = $otp;

// get email address
$query3 = mysqli_query($conn,"SELECT email from tbl_login where log_id=$log_id ");
while($row=mysqli_fetch_array($query3))
{
    $email=$row['email'];
    
    if($query3)
    {
        require 'vendor/autoload.php';
        include 'config.php';
        $mail = new PHPMailer(true);

        try {
            // SMTP settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'manyamadhu2023b@mca';
            $mail->Password = '####';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Email properties
            $mail->setFrom('manyamadhu2023b@mca.ajce.in', 'Admin');
            $mail->addAddress($email, 'Estore Customer');
            $mail->Subject = 'Otp Verification';
            $mail->Body = 'Hello,
                            Please verify your product delivery with this OTP : ' . $otp .'
                             Best regards,
                             Admin 
                             Estore';

            // Send email
            $mail->send();
            echo "<script>
                alert('Email sent successfully!');
                
            </script>";
        } catch (Exception $e) {
            echo "Email sending failed. Error: " . $mail->ErrorInfo;
        }
    }  
}

// display OTP form

?>
<html>
    <head>
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
        <style>
		body {
			background-color: #f2f2f2;
			font-family: Arial, sans-serif;
		}
		h1 {
			text-align: center;
			margin-top: 50px;
		}
		form {
			background-color: #fff;
			border-radius: 5px;
			box-shadow: 0 0 10px rgba(0,0,0,0.1);
			padding: 20px;
			max-width: 400px;
			margin: 0 auto;
			margin-top: 50px;
		}
		label {
			display: block;
			font-weight: bold;
			margin-bottom: 10px;
		}
		input[type="text"],
		 {
			width: 100%;
			padding: 10px;
			border-radius: 5px;
			border: none;
			box-shadow: 0 0 5px rgba(0,0,0,0.1);
			margin-bottom: 20px;
		}
        input[type="submit"] {
	background-color: #4CAF50;
	color: #fff;
	border: none;
	border-radius: 5px;
	padding: 10px;
	cursor: pointer;
	font-weight: bold;
	display: block;
	margin: 0 auto;
	transition: all 0.2s ease-in-out;
}

		
		input[type="submit"]:hover {
			background-color: #3e8e41;
		}
		.error {
			color: #ff0000;
			font-weight: bold;
			margin-bottom: 20px;
		}
	</style>
    </head>
    <body>
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
       
                    <h1>OTP Verify</h1>
	
                    <form method="POST" action="verify_otp.php">
  <input type="hidden" name="order_id" value="<?php echo htmlentities($order_id); ?>">
  <label>OTP:</label>
  <input type="text" name="otp">
  <button type="submit">Confirm</button>
</form>


        
    </body>  
    <script>
        $(document).ready(function(){
            $('#myTable').dataTable();
        });
    </script>
</html>