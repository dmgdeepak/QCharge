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
	$sql="SELECT COUNT(*) as total FROM contributed_question";
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
		$active=1;
	require('sidebar.php'); ?>

    <div class="main-panel">
		<?php require 'nav.php'; ?>

 <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Questions Contributed By Users</h4>
                                <p class="category">Here is a subtitle for this table</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
									<form method="post" action="contributed.php">
                                        <th><div class="form-group">

    <input type="text" placeholder="Question" name="question" class="form-control border-input" />

</div></th>
                                    	<th><div class="form-group">

    <input type="text" placeholder="Category"  name="cat" class="form-control border-input" />

</div></th>
                                    	<th><div class="form-group">

    <input type="text" placeholder="Contributor"  name="contributor" class="form-control border-input" />

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
									if(isset($_POST['contributor'])  && $_POST['contributor']!='')
									{
										if($str=='')
											$str.= "email LIKE '%".$_POST['contributor']."%'";
										else
											$str.="AND email LIKE '%".$_POST['contributor']."%'";
									}
	$low=(isset($_GET['id']) && is_numeric($_GET['id']))?$_GET['id']*10:0;
	$high=$low+10;
									if($str=='')
	$sql="SELECT * FROM contributed_question ORDER BY approval ,id DESC LIMIT $low,$high";
else
		$sql="SELECT * FROM contributed_question WHERE ".$str." ORDER BY approval ,id DESC LIMIT $low,$high";
//echo($sql);
if ($result=mysqli_query($con,$sql))
  {
  while($row=mysqli_fetch_object($result))
	{
	    echo "<tr>
                                        	<td>".$row->descr ."</td>
                                        	<td>".$row->cat ."</td>
                                        	<td>".$row->email ."</td>

                                        	<td>	";
										if($row->approval)
										{
											echo " <i class=\"ti-check\"></i>";
										}
										else
										{
											echo "<i class=\"ti-close\"></i>";
										}
										echo "
											<form action=\"viewQuestion.php\" method=\"post\" >
											<input type=\"hidden\" name=\"id\" value=\"$row->id\">
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
					<button class="btn btn-primary btn-xs" onclick="window.location.assign('contributed.php');"><<</button>
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
		 echo "<button class=\"btn btn-primary btn-xs\" onclick=\"window.location.assign('contributed.php?id=".($c-1)."');\">".$c."</button>
		 ";
   }
	    //echo $k.' ';
   $c=0;
   $n=countQ($con);
   while($k++<=floor($n/10) && ++$c<4)
	    echo $k.' ';

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
		$msg="Question Added";
	echo "<script type=\"text/javascript\">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: 'ti-gift',
            	message: \"".$msg."\"

            },{
                type: 'danger',
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
