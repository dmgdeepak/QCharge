<?php
require('home.php');
?>
<html>
    <head>
      <title>Member Area- Free Mobile Recharge</title>
      <meta http-equiv="content-type" content="text/html; charset=utf-8" />
      <meta name="description" content="Howfacts.com - Login" />
      <meta name="keywords" content="Login page of howfacts.com,login howfacts,login free mobile recharge" />
        <script type="text/javascript">
function checksignup()
{
var a=document.signupform.mobile.value;
var name=document.signupform.name.value;
     /* alert(a+name);
    return false; */
var city=document.signupform.city.value;
var b=document.signupform.login_email.value;
var pass=document.signupform.login_password.value;
var pass2=document.signupform.login_password2.value;
if(name.length<5 || city.length<4)
{
alert("Name must Be greater Than 5 characters And City Must be greater that 3 characters");
return false;
}
if(pass.length<6)
{
alert("Password Must Be Greater Than 6 Characters");
return false;
}
if(pass!=pass2)
{
alert("Password Doesn't Match");
return false;
}
if(a.length!=10)
{
alert("Mobile no. is not correct");
return false;
}
if(isNaN(a))
{
alert("Enter the valid Mobile Number");
return false;
}
if(b.length<6)
{
alert("Email Id is not correct");
return false;
}
}

function checklogin()
{
var email=login1form.login_email.value;
var atpos=email.indexOf("@");
var dotpos=email.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length)
  {
  alert("Not a valid e-mail address");
  return false;
  }
}

</script>
        <link href="css/login.css" rel="stylesheet"/>
        <script src="js/jquery-1.10.2.min.js"></script>
        <script src="js/JQUERY%20Main.js"></script>
    </head>
    <body>
      <?php
      $error=isset($_REQUEST['d'])?$_REQUEST['d']:0;
  ?>
        <div id="box">
            <div id="main"></div>


            <div id="loginform">
              <?php  if($error==1) { echo' <h1>Email is Incorrect</h1>';} ?>
                <?php if($error==2) { echo'<h1>Recovery details sent to registered email</h1>';}  ?>
                <h1>Recover PASSWORD</h1>
                <form method="post" action="resetpassword.php" name="login1form" onsubmit="return checklogin()">
            <input type="email" class="input" name="user_email" placeholder="Email Id" required/><br>


                    <button style="margin:38px 0px 0px 80px;">Recover</button>
                </form>
            </div>

            <div id="signupform">
                <form method="post" action="signup.php" name="signupform" onsubmit="return checksignup()">
                 <input type="text" name="name" placeholder="Full Name" required/><br>
                    <input type="email" placeholder="Email" name="login_email" required/><br>
                  <input type="password" name="login_password" placeholder="Password" required/ ><br>
            <input type="password" name="login_password2" placeholder="Confirm" required/><br>
                 <input type="text"   name="city" placeholder="city" required/><br>
            <input type="number"  name="mobile" maxlength="10" placeholder="Mobile" required/><br>
                    <input type="text" name="referId" placeholder="Referral Code(Optional)" ><br>

				  <button name="sign_up">SIGN UP</button>
                </form>

            </div>

            <div id="login_msg">Recover Password</div>
            <div id="signup_msg">Don't have an account?</div>

            <button id="login_btn">LOGIN</button>
            <button id="signup_btn">SIGN UP</button>


        </div>
    </body>
</html>
