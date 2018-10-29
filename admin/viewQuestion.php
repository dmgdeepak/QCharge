<!doctype html>
<html lang="en">
<head>
<?php
require '../sqlc.php'; ?>
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
		$active=1;
	require('sidebar.php'); ?>
    <div class="main-panel">
	<?php require 'nav.php'; ?>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                   <div>
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Edit Question</h4>
										<?php $id=$_POST['id'];

	$sql="SELECT * FROM contributed_question WHERE id=$id";
//echo($sql);
if ($result=mysqli_query($con,$sql))
  {
	  $data=mysqli_fetch_object($result);
  }
  else
	  die(mysqli_error($con));
?>
                            </div>

                            <div class="content">
                                <form action="approve.php" name="approvefrm" method="post">
								<input type="hidden" name="qid" value="<?php echo $id; ?>">
								<div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Question</label>
                                                <textarea rows="5"  name="question"  class="form-control border-input" placeholder="Here can be your description"><?php echo $data->descr; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Contributor Email</label>
                                                <input type="text" class="form-control border-input" disabled value="<?php echo $data->email; ?>">
                                            </div>
                                            </div>
											<div class="col-md-6">
                                            <div class="form-group">
                                                <label>Category</label>
      <select name="cat" class="selectpicker  form-control">
        <option value="English"
		<?php if($data->cat=='English')
						echo "selected"; ?>
		>English</option>
        <option value="Language" <?php if($data->cat=='language')
						echo "selected"; ?>>Language</option>
      </select>
        </div>
										</div></div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Option 1</label>
                                                <input type="text" name="opt1" class="form-control border-input" value="<?php echo $data->opt1; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Option 2</label>
                                                <input type="text" name="opt2" class="form-control border-input" value="<?php echo $data->opt2; ?>">
                                            </div>
                                        </div>
                                    </div>
 <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Option 3</label>
                                                <input type="text" name="opt3" class="form-control border-input" value="<?php echo $data->opt3; ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Option 4</label>
                                                <input type="text" name="opt4" class="form-control border-input" value="<?php echo $data->opt4; ?>">
                                            </div>
                                        </div>
                                    </div>
								<?php
								$sql2="SELECT descr FROM article WHERE id=$data->article_id";
//echo($sql);
if ($result2=mysqli_query($con,$sql2))
  {
	  $sol=mysqli_fetch_object($result2);
  }
  else
	  die(mysqli_error($con)); ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Solution</label>
                                                <textarea rows="5" class="form-control border-input" placeholder="Here can be your description" name="sol"><?php echo $sol->descr; ?></textarea>
                                            </div>
                                        </div>
                                    </div>

								<input type="hidden" name="aid" value="<?php echo $data->article_id; ?>">
									</form>
                                    <div class="text-center">
                                        <button onclick="document.approvefrm.submit();" class="btn btn-info btn-fill btn-wd">Update </button> &nbsp;&nbsp;&nbsp;&nbsp;
										<button onclick="deletefr()" class="btn btn-info btn-fill btn-wd">Delete</button>
                                    </div>
                                    <div class="clearfix"></div>

                            </div>
                        </div>
                    </div>
<form action="delete.php" name="deletefrm" method="post">
								<input type="hidden" name="qid" value="<?php echo $data->article_id; ?>">
								</form>

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
<script>
function deletefr()
{
	document.deletefrm.submit();
}
</script>
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

</html>
