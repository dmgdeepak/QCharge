<?php
session_start();
include('def.php');
require 'sqlc.php'; //connect Db
// Check If person is already Logged in
if((isset($_SESSION['email'])) && (isset($_SESSION['sid'])))
{
echo 'already Logged in';
Header("Location:".site."/home/");
exit;
}

//Validation start
$email=$_POST['login_email'];
$ph=$_POST['mobile'];
if($email==''||$ph=='')
{
die("Error Tracking Details.....");
}

if($_POST['login_password']!=$_POST['login_password2'])
{
die("Passwords Are not same");
}

if(!is_numeric($ph))
{
echo "<h1>Phone No. is not Correct</h1>";
exit;
}
//Validation ends
function add_data(&$pass,&$email,&$city,&$ph,&$name,&$sessionid,$con)
{
  $ref=(isset($_POST['referId']))?$_POST['referId']:"";
$sql="INSERT INTO user(password,email,city,mobile,name,sess_id,refer) VALUES ('$pass','$email','$city','$ph','$name','$sessionid','$ref')";
if(!mysqli_query($con,$sql))
die(mysqli_error($con));
if(isset($_POST['referId']))
{
  $sql="UPDATE user SET balance=balance+2 WHERE email='$ref'";
  if(!mysqli_query($con,$sql))
  die(mysqli_error($con));
}
}

function checkdata($ph,$email,$con)
{
$sql="SELECT * from user where mobile=$ph OR email='$email'";
if ($result=mysqli_query($con,$sql))
  {
  $rowcount=mysqli_num_rows($result);
if($rowcount>=1)
{
Header("Location:".site."/loginform.php?error=2");
}
  mysqli_free_result($result);
  }
  else
	  mysqli_error($con);
//$qr=mysqli_query($con,$sql);
/*$t=mysqli_num_rows($qr);
if($qr)
{
//Header("Location:".site."/signupform.php?error=1");
echo 'duplicate';
exit;
} */
}

function setsess($email,$sessionid)
{
$_SESSION['email']=$email;
$_SESSION['sid']=$sessionid;
echo 'Signed Up';
Header("Location:".site."/home");
}


$name=$_POST['name'];
$city=$_POST['city'];
$pass=$_POST['login_password'];
$sessionid=sha1(md5($email.$ph.rand()));
$pass=md5($pass);
checkdata($ph,$email,$con);
add_data($pass,$email,$city,$ph,$name,$sessionid,$con);
setsess($email,$sessionid);
?>
