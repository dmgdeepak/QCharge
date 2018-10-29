<!doctype html>
<html lang="en">
	<?php
	require '..\sqlc.php';
	?>
<head>
	<meta charset="utf-8" />

	<title>Paper Dashboard by Creative Tim</title>
	<?php include 'headcss.php' ?>
</head>
<body>

<div class="wrapper">
	<?php
		$active=5;
	require('sidebar.php'); ?>

    <div class="main-panel">
	<?php require 'nav.php'; ?>

 <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Results Of Users</h4>
                                <p class="category">Here is a subtitle for this table</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
								 <thead>
									<form method="GET" action="result.php">
                                        <th><div class="form-group">

    <input type="text" placeholder="Email" name="Email" class="form-control border-input" />

</div></th>
                                    	<th></th>
                                    	<th></th>
										<th></th>
                                   <th>
										<div class="row">
                                        <div class="col-md-6">
                                           <div class="form-group">

    <input type="text" placeholder="Time"  name="Time" class="form-control border-input" />

</div>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-info">Search</button>
                                        </div>
                                    </div>
										</th>
										</form>
                                    </thead>
                                    <thead>
                                        <th>Email</th>
                                    	<th>Total Attempt</th>
                                    	<th>Correct</th>
                                    	<th>Incorrect</th>
                                    	<th>Time</th>
                                    </thead>
                                    <tbody>
									<?php
									$low=isset($_GET['id'])?$_GET['id']*15:0;
									$high=$low+15;
									$str="";
									if(isset($_GET['Email']) && $_GET['Email']!='')
										$str.="email LIKE '%".$_GET['Email']."%'";
									if(isset($_GET['Time'])  && $_GET['Time']!='')
									{
										if($str=='')
											$str.= "date LIKE '%".$_GET['Time']."%'";
										else
											$str.="AND date LIKE '%".$_GET['Time']."%'";
									}
									if($str=='')
	$sql="SELECT * FROM result ORDER BY DATE DESC LIMIT $low,$high";
else
		$sql="SELECT * FROM result WHERE ".$str."ORDER BY DATE DESC LIMIT $low,$high";
if ($result=mysqli_query($con,$sql))
  {
  while($row=mysqli_fetch_object($result))
	{
	    echo "<tr>
                                        	<td>".$row->email ."</td>
                                        	<td>".$row->attempt ."</td>
                                        	<td>".$row->correct."</td>
                                        	<td>".$row->wrong."</td>
                                        	<td>".$row->date."</td>
											</tr>";
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
					<button class="btn btn-primary btn-xs" onclick="window.location.assign('result.php');"><<</button>
					<?php
function countQ($con,$str)
{
	if($str=='')
$sql="SELECT COUNT(*) as total FROM result";
else
$sql="SELECT COUNT(*) as total FROM result WHERE ".$str."";
	if ($result=mysqli_query($con,$sql))
  {
	  $data=mysqli_fetch_object($result);
return $data->total	;
  }
  else
	   die(mysqli_error($con));
}

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
		 echo "<button class=\"btn btn-primary btn-xs\" onclick=\"window.location.assign('result.php?id=".($c-1)."');\">".$c."</button>
		 ";
   }
	    //echo $k.' ';
   $c=0;
   $n=countQ($con,$str);
   while($k++<=floor($n/15) && ++$c<4)
	     echo "<button class=\"btn btn-primary btn-xs\" onclick=\"window.location.assign('result.php?id=".($k-1)."');\">".$k."</button>
		 ";
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

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio.js"></script>


    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="assets/js/paper-dashboard.js"></script>

	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

</html>
