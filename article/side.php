<!DOCTYPE html>
<html>
<head>
<?php
require('..\def.php');
require('..\sqlc.php');
if(!isset($_GET['id']) || !is_numeric($_GET['id']))
{
	Header('Location:'.site.'/article/index.php');
}
function checkData($n,$con)
{
	$sql="SELECT * FROM article WHERE id=$n";
//echo($sql);
if ($result=mysqli_query($con,$sql))
  {
  $rowcount=mysqli_num_rows($result);
if($rowcount!=1)
{
Header('Location:'.site.'/article/index.php');
exit;
}
else
{
$data=mysqli_fetch_object($result);
return $data;
}
  mysqli_free_result($result);
  }
  else
	  die(mysqli_error($con));
}
function getOptions($con,$n)
{
	$sql="SELECT * FROM question_bank WHERE article_id=$n";
//echo($sql);
if ($result=mysqli_query($con,$sql))
  {
$data=mysqli_fetch_object($result);
return $data;
  }
  else
	  die(mysqli_error($con));
}
// get question data
$qid=$_GET['id'];
$result=checkData($qid,$con);
$option=getOptions($con,$qid);
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $result->title;?></title>
<style>
body {
    font-family: "Lato", sans-serif;
}

.sidenav {
    height: 100%;
    width: 220px;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    padding-top: 35px;
}

.sidenav a {
    padding: 16px 8px 9px 26px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
}

.sidenav a:hover {
    color: #f1f1f1;
}

.main {
    margin-left: 260px; /* Same as the width of the sidenav */
    font-size: 28px; /* Increased text to enable scrolling */
    padding: 0px,6px;
}

@media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>

<div class="sidenav">
  <a href="#about">About</a>
  <a href="#services">Services</a>
  <a href="#clients">Clients</a>
  <a href="#contact">Contact</a>
</div>

<div class="main">
  <h2><?php echo $result->title;?></h2>
   <p><?php echo $option->cat;?></p>
  <br>
  <p><?php echo $option->opt1;?></p>
  <p><?php echo $option->opt2;?></p>
  <p><?php echo $option->opt3;?></p>
  <p><?php echo $option->opt4;?></p>
  <p><?php echo $result->descr;?></p>
  <p>Scroll down the page to see the result.</p>
  <p>Contributed By :<?php echo $result->contributor_email;?></p>
</div>
     
</body>
</html> 
