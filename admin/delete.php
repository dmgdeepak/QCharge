<?php
	require '..\sqlc.php';
	$cat=$_POST['qid'];
	$sql="DELETE FROM article WHERE id=$cat";
	echo $sql;
if(!$data=mysqli_query($con,$sql))
{
	die(mysqli_error($con));
}
Header("Location:contributed.php?s=1");
?>