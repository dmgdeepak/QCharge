<?php
	require '..\sqlc.php';
$question=htmlspecialchars($_POST['question']);
$sol=htmlspecialchars($_POST['sol']);
$cat=$_POST['cat'];
$opt1=$_POST['opt1'];
$opt2=$_POST['opt2'];
$opt3=$_POST['opt3'];
$opt4=$_POST['opt4'];
$aid=$_POST['aid'];
$qid=$_POST['qid'];
$sql="UPDATE article SET cat='$cat',descr='$sol',title='$question' WHERE id=$aid";
$sql2="UPDATE question_bank SET cat='$cat',descr='$question',opt1='$opt1',opt2='$opt2',opt3='$opt3',opt4='$opt4' WHERE q_id=$qid";
echo $sql.'<br>';
echo $sql2.'<br>';
$data=mysqli_query($con,$sql);
$data=mysqli_query($con,$sql2);

Header("Location:qbank.php?s=2");
?>
