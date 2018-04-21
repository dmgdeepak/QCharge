<?php
session_start();
include('def.php'); 
if((isset($_SESSION['email'])) && (isset($_SESSION['sid'])))
{
echo 'already Logged in';
Header('Location:'.site.'/home');
exit;
}

 
require 'sqlc.php'; //connect Db
$email=$_POST['login_email'];
$pass=$_POST['password'];
if($email==''||$pass=='')
{
Header('Location:'.site);
exit;
}
$pass=md5($pass);
//check wheather entered data is correct
function checkdata($email,$pass,$con)
{
$sql="SELECT sess_id FROM user WHERE email='$email' AND password='$pass'";
//echo($sql);
if ($result=mysqli_query($con,$sql))
  {
  $rowcount=mysqli_num_rows($result);
if($rowcount!=1)
{
Header("Location:".site."/loginform.php?error=1");
exit;
}
else
{
$data=mysqli_fetch_object($result);
return $data->sess_id;
}
  mysqli_free_result($result);
  }
  else
	  die(mysqli_error($con));
}

function setsess($email,$sessionid)
{
$_SESSION['email']=$email;
$_SESSION['sid']=$sessionid;
//echo 'Logged In';
Header("Location:".site."/home");
}

$sessionid=checkdata($email,$pass,$con);
setsess($email,$sessionid);
?>