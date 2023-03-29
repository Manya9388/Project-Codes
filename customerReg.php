<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    
    <link rel="stylesheet" href="css/reg.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
		<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
		<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script defer src="./index.js"></script>
   </head>
   <script>
            function matchPassword(){
              var pw1 = document.getElementById("password");
              var pw2 = document.getElementById("cpassword");
              if(pw1 != pw2)
              {
                alert("Password did not match");
              }
              else{
                alert("Successfull");
              }
            }
            </script>
<body >
  
  <div class="container">
    <div class="title"> Customer Registration</div>
    <div class="content">
        <form id="form" method="post" action="custReg.php" >
        <div class="user-details">
          <div class="input-box">
            <span class="details">First Name</span>
            <input type="text" autocomplete="off" name="fname" id="username" placeholder="Enter your first name" onkeyup="white(this.value)" required onchange="Validstr();"/>
            <div class="error"></div>
          </div>
          <span id="msg1" style="color:red;"></span>
                    <script>
                        function Validstr() 
                        {
                        var val = document.getElementById('username').value;
                        if (!val.match(/^[a-zA-Z ]*$/)) 
                        {
                          document.getElementById('msg1').innerHTML="Start with a Capital letter & Only alphabets are allowed";
                                document.getElementById('username').value = "";
                                  return false;
                        }
                          document.getElementById('msg1').innerHTML=" ";
                         return true;
                        }
                   </script>
          <div class="input-box">
            <span class="details">Last Name</span>
            <input type="text" autocomplete="off" name="lname"id="lname" placeholder="Enter your last name" required> 
            <div class="error"></div>
          </div>
          <div class="input-box">
            <span class="details">Phone No</span>
            <input type="text" autocomplete="off" name="phone"id="phone" placeholder="Enter your phone number" required onchange="Validphone()";/>
            <div class="error"></div>
          </div>
          <span id="msg2" style="color:red;"></span>
                        <script>
                        function Validphone() 
                        {
                        var val = document.getElementById('phone').value;
                          if (!val.match(/^[789][0-9]{9}$/))
                           {
                            document.getElementById('msg2').innerHTML="Only Numbers are allowed and must contain 10 number";
                                  document.getElementById('phone').value = "";
                                    return false;
                           }
                            document.getElementById('msg2').innerHTML=" ";
                          return true;
                        }
                       </script>
          <div class="input-box">
            <span class="details">Address</span>
            <input type="text" autocomplete="off" name="address"id="address" placeholder="Enter your address" required>
            <div class="error"></div>
          </div>
          <div class="input-box">
            <span class="details">City</span>
            <input type="text" autocomplete="off" name="city" id="city" placeholder="Enter your city" required>
            <div class="error"></div>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" autocomplete="off" name="email" id="email" placeholder="Enter your email" required onsubmit="return validateemail();"/>
            <div class="error"></div>
          </div>
          
          <script>  
            function validateemail()  
            {  
            var x=document.myform.email.value;  
            var atposition=x.indexOf("@");  
            var dotposition=x.lastIndexOf(".");  
            if (atposition<1 || dotposition<atposition+2 || dotposition+2>=x.length){  
              alert("Please enter a valid e-mail address \n atpostion:"+atposition+"\n dotposition:"+dotposition);  
              return false;  
              }  
            }  
            </script> 
          <div class="input-box">
            <span class="details">Region</span>
            <input type="text" autocomplete="off" name="region" id="region" placeholder="enter your region" required>
            <div class="error"></div>
          </div>
          <div class="input-box">
            <span class="details">District</span>
            <input type="text" autocomplete="off" name="district" id="district" placeholder="enter your district" required>
            <div class="error"></div>
          </div>
          <div class="input-box">
            <span class="details">Pincode</span>
            <input type="text" autocomplete="off" name="pincode" id="pincode" placeholder="enter your pincode" required>
            <div class="error"></div>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" autocomplete="off" name="password" id="password" placeholder="enter your password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"/>
          </div>
          <div class="input-box">
            <span class="details">Confirm Password</span>
            <input type="password" autocomplete="off" name="cpassword" id="cpassword" placeholder="Confirm your password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Should be same as password"/>
            <div class="error"></div>
          </div>
        </div>
        
        <div class="button">
          <input type="submit" name="submit" value="Register" onclick="matchPassword()">
        </div>
      </form>
    </div>
  </div>
  <script>
    <?php
       /**********************index.php**/
       if(isset($_SESSION['status']))
         { 
      ?>
        alertify.set('notifier','position', 'top-center');
         alertify.success('<?= $_SESSION['status'];?>');
            <?php
        unset($_SESSION['status']);
          //if user refresh index.php after 1st time it will not see the message
          }
          ?>
        </script>
</body>
<script type="text/javascript">
   var pattern = /\s/g;
   var alert = document.getElementById('alert-caps');
   function white(data){
    if(isSpace){
        alert.innerText = "Space is not allow";
    }
    else{
      alert.innerText = "";
    }
   }
   </script>
</html>
