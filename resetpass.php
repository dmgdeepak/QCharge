<?php

session_start();

// include('def.php');

require('sqlc.php'); //connect Db



$email=$_POST['email'];

$code=$_POST['token'];

if($email==''||$code=='')

{

Header('Location:forgotpass.php');

exit;

}

function checkdata($email,$code,$pass,$con)

{

$sql="SELECT * FROM user WHERE email='$email' AND password='$code'";

if(!$row=mysqli_query($con,$sql))

echo mysqli_error($con);
//echo $sql;
$t=mysqli_num_rows($row);

if($t!=1)

{

echo "<h1>Your Link has expired , please generate a new link</h1>";

exit;

}

elseif($t==1)

{

$sql="UPDATE user SET password='$pass' WHERE email='$email'";

if(!mysqli_query($con,$sql))

{

echo mysqli_error($con);

exit;

}

Header("Location:loginform.php");

}

}

$pass=md5($_POST['pass']);

checkdata($email,$code,$pass,$con);
?>
