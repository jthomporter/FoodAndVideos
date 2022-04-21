

function ValidateSignUp() {

    console.log("Validating Form data");
    var username = document.getElementById("uname").val();
    var password = document.getElementById("pname").val();
    var email = document.getElementById("ename").val();
    var cpassword = document.getElementById("cname").val();

    var credentials = [username, password, cpassword, email];
    var errorMessage = "\n";
    var error = false;

    if (username.length == 0) {
        errorMessage = errorMessage + "\nPlease specify a username.";
        error = true;
    }
    if (password.length == 0) {
        errorMessage = errorMessage + "\nPleace specify a password.";
        error = true;
    }
    if (cpassword.length == 0) {
        errorMessage = errorMessage + "\nPlease confirm your password.";
        error = true;
    }
    if (password != cpassword) {
        errorMessage = errorMessage + "\nPasswords don't match.";
        error = true;
    }
    if (email.length == 0)
    {
        errorMessage = errorMessage + "\nPlease specify an email.";
        error = true;
    }

    if (error) {
        alert(errorMessage);
    } else {
        $.post("SignUpHandler.php",
        {
          uname: username,
          pname: password,
          cname: cpassword,
          ename: email
        });
    }

}


