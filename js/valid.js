//validation code for inputs

var email = document.forms['form']['email'];
var password = document.forms['form']['password'];

var email_error = document.getElementById('email_error');
var pass_error = document.getElementById('pass_error');

email.addEventListener('textInput',email_Verify);
password.addEventListener('textInput',passw_Verify);
function validated(){
    if(email.value.length < 9){
        email_error.style.display = "block";
        email.focus();
        return false;
        
    }
    if(password.value.length < 4){
        pass_error.style.display = "block";
        password.focus();
        return false;
        
    }
}

function email_Verify(){
    if(email.value.length >= 8){
        email_error.style.display = "none";
        return true;   
    }
}
function passw_Verify(){
        if(password.value.length >= 4){
            pass_error.style.display = "none";
            return true;   
        }
    }

