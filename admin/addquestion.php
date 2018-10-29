<?php
	require '..\sqlc.php';
$question=htmlspecialchars($_POST['question']);
$sol=htmlspecialchars($_POST['sol']);
$cat=$_POST['cat'];
$opt1=$_POST['opt1'];
$opt2=$_POST['opt2'];
$opt3=$_POST['opt3'];
$opt4=$_POST['opt4'];
	$contributor="admin";

function addbalance($question,$sol,$cat,$opt1,$opt2,$opt3,$opt4,$contributor,$con)
{
$sql="INSERT INTO article(cat,descr,title,contributor_email) VALUES('$cat','$sol','$question','$contributor')";
if($data=mysqli_query($con,$sql))
{
	 $last_id = mysqli_insert_id($con);
	 echo $last_id;
}
else
	die(mysqli_error($con));
$sql="INSERT INTO question_bank(date,article_id,opt1,opt2,opt3,opt4,descr,cat) VALUES(CURDATE(),$last_id,'$opt1','$opt2','$opt3','$opt4','$question','$cat')";
if($data=mysqli_query($con,$sql))
{
	 $last_id = mysqli_insert_id($con);
	 echo $last_id;
}
else
	die(mysqli_error($con));
Header("Location:addQ.php?s=1");

echo $sql;
exit;
}

addbalance($question,$sol,$cat,$opt1,$opt2,$opt3,$opt4,$contributor,$con);
?>