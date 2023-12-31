
/*function validateEmail()
{
	var email=document.getElementById("txtEmail").value;
}*/
function checkEmail() {

    var email = document.getElementById('email');
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if (!filter.test(email.value)) {
    alert('Please provide a valid email address');
    email.focus;
    return false;
    }
	return true;
}



    function validateAll(event) {
      if (checkEmail()  && validatePassword() && checkPassword()) {
        alert('The registration has been done successfully');
      } else {
        event.preventDefault();
      }

function validatePassword() {
      var password = document.getElementById('password').value;
      var errorDiv = document.getElementById('passwordError');
      var regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[a-zA-Z0-9]{8,}$/;

      if (!regex.test(password)) {
        errorDiv.innerHTML = 'Password must be at least 8 characters long and contain at least one number, one lowercase letter, and one uppercase letter';
        errorDiv.style.color = 'red';
        return false;
      } else {
        errorDiv.innerHTML = '';
        return true;
      }
    }

	

    function validateAll(event) {
      if (checkEmail() && validatePassword() && checkPassword()) {
        alert('The registration has been done successfully');
      } else {
        event.preventDefault();
      }
    }
    
    // Rest of your JavaScript code...
    
    }
