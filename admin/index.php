<!doctype html>
<html lang="en">
<head>
	<?php
	require '..\sqlc.php';
	function countU($con,$tbl)
	{
		$sql="SELECT COUNT(*) as total FROM $tbl";
		if ($result=mysqli_query($con,$sql))
	  {
		  $data=mysqli_fetch_object($result);
	return $data->total	;
	  }
	  else
		   die(mysqli_error($con));
	}
	function countMe($con,$bool)
	{
		if($bool==0)
	$sql="SELECT SUM(amount) as total FROM recharge";
	else
	$sql="SELECT COUNT(*) as total FROM user WHERE q_compl!='' || q_compl2!=''";
	if ($result=mysqli_query($con,$sql))
	{
		$data=mysqli_fetch_object($result);
return $data->total	;
	}
	else
		 die(mysqli_error($con));
	 }
	?>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Paper Dashboard by Creative Tim</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="assets/css/paper-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/themify-icons.css" rel="stylesheet">

</head>
<body>

<div class="wrapper">
    <?php
		$active=0;
		 require 'sidebar.php'; ?>
    <div class="main-panel">
        <?php require 'nav.php'; ?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-warning text-center">
                                            <i class="ti-world"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Users</p>
                                            <?php echo countU($con,"user"); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-user"></i> Registered SO far
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-success text-center">
                                            <i class="ti-wallet"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>QuestionBank</p>
                                              <?php echo countU($con,"question_bank"); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-calendar"></i> Set Of QUESTION
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-danger text-center">
                                            <i class="ti-gift"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Recharge</p>
                                          &#8377;  <?php echo countMe($con,0); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-timer"></i> Given So far
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-info text-center">
                                            <i class="ti-plus"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="numbers">
                                            <p>Contributed Question </p>
                                            <?php echo countU($con,"contributed_question"); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-reload"></i> Pending Approval
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div></div><br>
										<br>
										<div class="row">
										<div class="col-lg-3 col-sm-6">
												<div class="card">
														<div class="content">
																<div class="row">
																		<div class="col-xs-5">
																				<div class="icon-big icon-info text-center">
																						<i class="ti-marker"></i>
																				</div>
																		</div>
																		<div class="col-xs-4">
																				<div class="numbers">
																						<p>User Played Quiz</p>
																						<?php echo countMe($con,1); ?>
																				</div>
																		</div>
																</div>
																<div class="footer">
																		<hr />
																		<div class="stats">
																				<i class="ti-reload"></i>From Today So far
																		</div>
																</div>
														</div>
												</div>
										</div>
										<div class="col-lg-3 col-sm-6">
												<div class="card">
														<div class="content">
																<div class="row">
																		<div class="col-xs-5">
																				<div class="icon-big icon-info text-center">
																						<i class="ti-shine"></i>
																				</div>
																		</div>
																		<div class="col-xs-4">
																				<div class="numbers">
																						<p>Questions For Today</p>
																						<?php echo countU($con,"question"); ?>
																				</div>
																		</div>
																</div>
																<div class="footer">
																		<hr />
																		<div class="stats">
																				<i class="ti-reload"></i>Today
																		</div>
																</div>
														</div>
												</div>
										</div>
										<div class="col-lg-3 col-sm-6">
												<div class="card">
														<div class="content">
																<div class="row">
																		<div class="col-xs-5">
																				<div class="icon-big icon-info text-center">
																						<i class="ti-face-smile"></i>
																				</div>
																		</div>
																		<div class="col-xs-4">
																				<div class="numbers">
																						<p>Users Got recharge</p>
																						<?php echo countU($con,"recharge"); ?>
																				</div>
																		</div>
																</div>
																<div class="footer">
																		<hr />
																		<div class="stats">
																				<i class="ti-reload"></i>So far
																		</div>
																</div>
														</div>
												</div>
										</div>
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

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="assets/js/paper-dashboard.js"></script>

	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

	<script type="text/javascript">
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: 'ti-gift',
            	message: "Welcome to <b>Admin Panel</b> - God Mode ON!!"

            },{
                type: 'success',
                timer: 4000
            });

    	});
	</script>

</html>
