<?
require 'sqlc.php';
$sql="UPDATE user SET q_compl='',q_compl2=''";
$sql2="INSERT INTO question( descr, opt1, opt2, opt3, opt4, cat, article_id) SELECT descr,opt1,opt2,opt3,opt4,cat,article_id from question_bank WHERE date>=CURDATE()-1";
mysqli_query($com,$sql);
mysqli_query($com,$sql2);
?>
