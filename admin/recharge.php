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
		$active=4;
	require('sidebar.php'); ?>

    <div class="main-panel">
		<?php require 'nav.php'; ?>

 <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Recharges Taken By Users</h4>
                                <p class="category">Here is a subtitle for this table</p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
								 <thead>
									<form method="post" action="recharge.php">
                                        <th><div class="form-group">

    <input type="text" placeholder="Email" name="Email" class="form-control border-input" />

</div></th>
                                    	<th><div class="form-group">

    <input type="text" placeholder="Mobile"  name="Mobile" class="form-control border-input" />

</div></th>
                                    	<th><div class="form-group">

    <input type="text" placeholder="Operator"  name="Operator" class="form-control border-input" />

</div></th>
										<th><div class="form-group">

    <input type="text" placeholder="Circle" name="Circle" class="form-control border-input" />

</div></th>
                                    	<th><div class="form-group">

    <input type="number" placeholder="Amount"  name="Amount" class="form-control border-input" />

</div></th>
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
                                    	<th>Mobile</th>
                                    	<th>Operator</th>
                                    	<th>Circle</th>
                                    	<th>Amount</th>
                                    	<th>Time</th>
                                    </thead>
                                    <tbody>
									<?php
									$low=isset($_GET['id'])?$_GET['id']*15:0;
									$high=$low+15;
									$str="";
									if(isset($_POST['Email']) && $_POST['Email']!='')
										$str.="email LIKE '%".$_POST['Email']."%'";
									if(isset($_POST['Mobile'])  && $_POST['Mobile']!='')
									{
										if($str=='')
											$str.= "mobile LIKE '%".$_POST['Mobile']."%'";
										else
											$str.="AND mobile LIKE '%".$_POST['Mobile']."%'";
									}
									if(isset($_POST['Operator'])  && $_POST['Operator']!='')
									{
										if($str=='')
											$str.= "operator LIKE '%".$_POST['Operator']."%'";
										else
											$str.="AND operator LIKE '%".$_POST['Operator']."%'";
									}
									if(isset($_POST['Circle'])  && $_POST['Circle']!='')
									{
										if($str=='')
											$str.= "state LIKE '%".$_POST['Circle']."%'";
										else
											$str.="AND state LIKE '%".$_POST['Circle']."%'";
									}
									if(isset($_POST['Amount'])  && $_POST['Amount']!='')
									{
										if($str=='')
											$str.= "amount LIKE '%".$_POST['Amount']."%'";
										else
											$str.="AND amount LIKE '%".$_POST['Amount']."%'";
									}
									if(isset($_POST['Time'])  && $_POST['Time']!='')
									{
										if($str=='')
											$str.= "date LIKE '%".$_POST['Time']."%'";
										else
											$str.="AND date LIKE '%".$_POST['Time']."%'";
									}
									if($str=='')
	$sql="SELECT * FROM recharge ORDER BY DATE DESC LIMIT $low,$high";
else
		$sql="SELECT * FROM recharge WHERE ".$str."ORDER BY DATE DESC LIMIT $low,$high";
//echo($sql);
if ($result=mysqli_query($con,$sql))
  {
  while($row=mysqli_fetch_object($result))
	{
	    echo "<tr>
                                        	<td>".$row->email ."</td>
                                        	<td>".$row->mobile ."</td>
                                        	<td>".$row->operator."</td>
                                        	<td>".$row->state."</td>
                                        	<td>".$row->amount."</td>
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
					<button class="btn btn-primary btn-xs" onclick="window.location.assign('recharge.php');"><<</button>
					<?php
function countQ($con)
{
	$sql="SELECT COUNT(*) as total FROM recharge";
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
		 echo "<button class=\"btn btn-primary btn-xs\" onclick=\"window.location.assign('recharge.php?id=".($c-1)."');\">".$c."</button>
		 ";
   }
	    //echo $k.' ';
   $c=0;
   $n=countQ($con);
   while($k++<=floor($n/15) && ++$c<4)
	     echo "<button class=\"btn btn-primary btn-xs\" onclick=\"window.location.assign('recharge.php?id=".($k-1)."');\">".$k."</button>
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
