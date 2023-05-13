<?php
include('config.php');
$targetDir="dboy/";
if(isset($_POST['submit']))
{
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$pincode1 = $_POST['pincode'];
$pincode = "IN/" .$pincode1;
$image=$_FILES['pdf']['name'];
move_uploaded_file($_FILES['pdf']['tmp_name'],"dboy/".$image);
$sql5=mysqli_query($conn,"INSERT INTO tbl_dbrequest(db_name,db_email,db_phone,db_image,db_address,db_pincode,db_password,db_status) VALUES('$name','$email','$phone','$image','$address','$pincode','null',0)");

  
}



?>
<!DOCTYPE html>
<html>
<head>
    <style>
        
.registration-form {
width: 500px;
margin: 50px auto;
padding: 20px;
background-color: #f1f1f1;
border-radius: 10px;
}

h2 {
text-align: center;
margin-bottom: 30px;
}

label {
display: block;
margin-bottom: 10px;
font-weight: bold;
}

input[type="text"],
input[type="email"],
input[type="tel"],
input[type="file"] {
width: 100%;
padding: 10px;
margin-bottom: 20px;
border: none;
border-radius: 5px;
background-color: #fff;
}

input[type="submit"] {
width: 100%;
padding: 10px;
background-color: #4CAF50;
color: #fff;
border: none;
border-radius: 5px;
cursor: pointer;
}

input[type="submit"]:hover {
background-color: #3e8e41;
}

</style>
<script>
function validateForm() {
var name = document.getElementById("name").value.trim();
var email = document.getElementById("email").value.trim();
var password = document.getElementById("password").value;
var confirmPassword = document.getElementById("confirm-password").value;

if (name == "") {
alert("Name must be filled out");
return false;
}

if (email == "") {
alert("Email must be filled out");
return false;
}

if (password == "") {
alert("Password must be filled out");
return false;
}

if (password != confirmPassword) {
alert("Passwords do not match");
return false;
}

return true;
}
        </script>
<title>Delivery Boy Request</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript" src="validation.js"></script>
</head>
<body>
<div class="registration-form">
<h2>REQUEST FORM</h2>
<form action="dbrequest.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
<label for="name">Name:</label>
<input type="text" id="name" name="name">

<label for="email">Email:</label>
<input type="email" id="email" name="email">

<label for="phone">Phone:</label>
<input type="tel" id="phone" name="phone">

<label>Aadhar Number <span class="required-color">*</span></label>
<input type="file" name="pdf" id="pdf-upload" required/>

<label for="address">Address:</label>
<input type="text" id="address" name="address">

<label for="pincode">Pincode:</label>
<input type="text" id="pincode" name="pincode">

<input type="submit" value="Register"name="submit">
</form>
</div>
<script>
    const phoneInput = document.getElementById("phone");
const phoneRegex = /^\d{10}$/;

phoneInput.addEventListener("input", function() {
  if (!phoneRegex.test(phoneInput.value)) {
    phoneInput.setCustomValidity("Please enter a valid 10-digit phone number");
  } else {
    phoneInput.setCustomValidity("");
  }
});
</script>
<script>
// get the file input element
const pdfUpload = document.getElementById('pdf-upload');

// add event listener for file selection
pdfUpload.addEventListener('change', function() {
  // get the selected file
  const file = pdfUpload.files[0];

  // check if file type is PDF
  if (file.type !== 'application/pdf') {
    alert('Please select a PDF file.');
    pdfUpload.value = ''; // clear file input
  }
});
</script>
</body>

</html>
