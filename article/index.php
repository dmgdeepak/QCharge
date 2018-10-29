<!DOCTYPE html>
<html>
<head>
<?php
require('..\def.php');
require('..\sqlc.php');
//Get Options of question
function getOptions($qno,$con)
{
	$sql="SELECT * FROM question_bank WHERE article_id=$qno";
//echo($sql);
if ($result=mysqli_query($con,$sql))
  {
	  $data=mysqli_fetch_object($result);
  return $data;
  }
  else
	  die(mysqli_error($con));
}
//Count no. of Questions
function countQ($con)
{
	$sql="SELECT COUNT(*) as total FROM article";
	if ($result=mysqli_query($con,$sql))
  {
	  $data=mysqli_fetch_object($result);
return $data->total	;
  }
  else
	   die(mysqli_error($con));
}
// Loop Questions
function getQuesions($con,$start)
{
	$end=$start+6;
	$sql="SELECT * FROM article LIMIT $start,$end";
//echo($sql);
if ($result=mysqli_query($con,$sql))
  {
  return $result;
  }
  else
	  die(mysqli_error($con));
}
// get question data
//$qid=$_GET['id'];
//$result=getQuesions($qid,$con);
$n=countQ($con);
$start=0;
if(isset($_GET['id']) && is_numeric($_GET['id']))
{
	$start=$_GET['id']*6;
}
$result=getQuesions($con,$start);
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Articles</title>
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
<?php
	while($row=mysqli_fetch_object($result))
	{
		$options=getOptions($row->id,$con);
		
		echo '<h2>'.$row->title.'</h2>';
		if(isset($options->opt1))
		{echo '<h2>'.$options->opt1.'</h2>';
		echo '<h2>'.$options->opt2.'</h2>';
		echo '<h2>'.$options->opt3.'</h2>';
		echo '<h2>'.$options->opt4.'</h2>';}
	}
  ?>
 <!-- paginator!--> 
</div>
   <p> <?php 
   $k=1;
   if(isset($_GET['id']) && is_numeric($_GET['id']))
{
	$k=$_GET['id']+1;
}
   $c=$k-3;
   // add<<
   while(++$c<=$k)
   { if($c<=0)
		   continue;
		 echo $c.' ';
   }   
	    //echo $k.' ';
   $c=0;
   
   while(++$k<=floor($n/6) && ++$c<4)
	    echo $k.' ';
	
	//add >> 
   ?></p>
</body>
</html> 
