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
$sql="INSERT INTO question_bank(date,article_id,opt1,opt2,opt3,opt4,descr,cat) VALUES(CURDATE(),$aid,'$opt1','$opt2','$opt3','$opt4','$question','$cat')";
$sql2="UPDATE article SET cat='$cat',descr='$sol',title='$question' WHERE id=$aid";
$sql3="DELETE FROM contributed_question WHERE id=$qid";

echo $sql.'<br>';
echo $sql2.'<br>';
echo $sql3.'<br>';
$data=mysqli_query($con,$sql);
$data=mysqli_query($con,$sql2);
$data=mysqli_query($con,$sql3);

Header("Location:contributed.php?s=2");
?>