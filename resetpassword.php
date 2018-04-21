<?php

session_start();

require('sqlc.php'); //connect Db

// Get all Details

$email=$_POST['user_email'];

// Validate Data

if($email=='')

{

echo "<h1>Please go Back annd fill form properly</h1>";

exit;

}

// Database adding

function add_data(&$email,$con)

{

$sql="SELECT * from user where email='$email'";



if(!$row=mysqli_query($con,$sql))

{

echo mysqli_error($con);

exit;

}

$data=mysqli_fetch_object($row);

return $data->password;

}



function checkdata($email,$con)

{

$sql="SELECT * from user where email='$email'";

if($qr=mysqli_query($con,$sql))

$t=mysqli_num_rows($qr);

if($t!=1)

{

	Header('Location:forgotpass.php?d=1');

exit;

}

}

function sendmail($email,$token)

{

$sender="reset@qcharge.com";



$subject="  Password Reset Request ";

$msg="Hi, <br>

There is nothing to worry , follow these simple steps and get your account back<br>

1: Go to the given link<br>

please click here or copy paste url into browser<br>



<a href='reset.php?email=$email&token=$token'>reset.php?email=$email&token=$token</a>

<br>

2: Enter new password<br><br>

Thanks and Regards,<br>

qcharge.com";

$headers = "MIME-Version: 1.0" . "\r\n";

$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";



// More headers

$headers .= 'From: '.$sender . "\r\n";

mail($_POST['user_email'],$subject,$msg,$headers);
echo $msg;
Header("Location:forgotpass.php?d=2");

}



checkdata($email,$con);

$sid=add_data($email,$con);

sendmail($email,$sid);

mysqli_close($con);

?>
