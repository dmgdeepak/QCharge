<!doctype html>
<html lang="en">
	<?php
	require '..\sqlc.php';
	?>
<head>

	<title>Paper Dashboard by Creative Tim</title>
	<?php include 'headcss.php' ?>
</head>
<body>
<?php
function countQ($con)
{
	$sql="SELECT COUNT(*) as total FROM question_bank";
	if ($result=mysqli_query($con,$sql))
  {
	  $data=mysqli_fetch_object($result);
return $data->total	;
  }
  else
	   die(mysqli_error($con));
}
?>
<div class="wrapper">
	<?php
		$active=3;
	require('sidebar.php'); ?>

    <div class="main-panel">
	<?php require 'nav.php'; ?>

 <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">All Questions</h4>
                                <p class="category">Here is a subtitle for this table</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
									<form method="post" action="qbank.php">
                                        <th><div class="form-group">

    <input type="text" placeholder="Question" name="question" class="form-control border-input" />

</div></th>
                                    	<th></th>
                                    	<th><div class="form-group">

    <input type="text" placeholder="Category"  name="cat" class="form-control border-input" />

</div></th>
                                    	<th><button type="submit" class="btn btn-info">Search</button></th>
										</form>
                                    </thead>
									<thead>
                                        <th>Question</th>
                                    	<th>Category</th>
                                    	<th>Contributor</th>
                                    	<th></th>
                                    </thead>
                                    <tbody>
									<?php
									$str="";
									if(isset($_POST['question']) && $_POST['question']!='')
										$str.="descr LIKE '%".$_POST['question']."%'";
									if(isset($_POST['cat'])  && $_POST['cat']!='')
									{
										if($str=='')
											$str.= "cat LIKE '%".$_POST['cat']."%'";
										else
											$str.="AND cat LIKE '%".$_POST['cat']."%'";
									}
	$low=(isset($_GET['id']) && is_numeric($_GET['id']))?$_GET['id']*10:0;
	$high=$low+10;
									if($str=='')
	$sql="SELECT * FROM question_bank ORDER BY q_id DESC LIMIT $low,$high";
else
		$sql="SELECT * FROM question_bank WHERE ".$str." ORDER BY q_id DESC LIMIT $low,$high";
if ($result=mysqli_query($con,$sql))
  {
  while($row=mysqli_fetch_object($result))
	{
		$sql2="SELECT contributor_email FROM article WHERE id=$row->article_id";
		$result2=mysqli_query($con,$sql2);
		$row2=mysqli_fetch_object($result2);
	    echo "<tr>
                                        	<td>".$row->descr ."</td>
                                        	<td>".$row->cat ."</td>
                                        	<td>".$row2->contributor_email ."</td>

                                        	<td>	";
										echo "
											<form action=\"viewQuestionBank.php\" method=\"post\" >
											<input type=\"hidden\" name=\"id\" value=\"$row->q_id\">
											<input type=\"submit\" class=\"btn btn-primary btn-fill\" value=\"View\">
                                        </form></td></tr>";
	}
	}
  else
	  die(mysqli_error($con));


  ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    </div>
					<div align="center">
					<button class="btn btn-primary btn-xs" onclick="window.location.assign('qbank.php');"><<</button>
					<?php
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
		 echo "<button class=\"btn btn-primary btn-xs\" onclick=\"window.location.assign('qbank.php?id=".($c-1)."');\">".$c."</button>
		 ";
   }
	    //echo $k.' ';
   $c=0;
   $n=countQ($con);
   while($k++<=floor($n/10) && ++$c<4)
	     echo "<button class=\"btn btn-primary btn-xs\" onclick=\"window.location.assign('qbank.php?id=".($k-1)."');\">".$k."</button>
		 ";

	//add >>
   ?>
					</div>
                    </div>
                    </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>

                        <li>
                            <a href="http://www.creative-tim.com">
                                Creative Tim
                            </a>
                        </li>
                        <li>
                            <a href="http://blog.creative-tim.com">
                               Blog
                            </a>
                        </li>
                        <li>
                            <a href="http://www.creative-tim.com/license">
                                Licenses
                            </a>
                        </li>
                    </ul>
                </nav>
				<div class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by <a href="http://www.creative-tim.com">Creative Tim</a>
                </div>
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

<?php if(isset($_GET['s']))
{
	if($_GET['s']==1)
		$msg="Question deleted";
	else
		$msg="Question Modified";
	echo "<script type=\"text/javascript\">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: 'ti-gift',
            	message: \"".$msg."\"

            },{
                type: 'success',
                timer: 4000
            });

    	});
</script>";} ?>
<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="assets/js/paper-dashboard.js"></script>

	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

</html>
