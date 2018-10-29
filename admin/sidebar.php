<div class="sidebar" data-background-color="white" data-active-color="danger">

    <!--
		Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
		Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
	-->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    Admin
                </a>
            </div>

            <ul class="nav">
		<?php	$title = array("Dashboard", "Contributed Questions", "Add Question","Question Bank","Recharges","Result");
		$icon = array("ti-panel", "ti-user", "ti-plus","ti-server","ti-mobile","ti-medall");
		$link = array("index", "contributed", "addq","qbank","recharge","result");
//echo "I like " . $cars[0] . ", " . $cars[1] . " and " . $cars[2] . ".";
/*foreach ($cars as $value) {
    echo "$value.<br>";
}*/
//$active=isset($_GET['id'])?$_GET['id']:0;
for($x=0;$x<6;++$x)
{
	if($x==$active)
	{
		echo   "<li class=\"active\">";
	}
	else
		echo "<li>";
	echo "<a href=\"".$link[$x].".php\">
                        <i class=\"".$icon[$x]."\"></i>
                        <p>".$title[$x]."</p>
                    </a>
</li>
";}
?>
            <!--    <li>
                    <a href="dashboard.html">
                        <i class="ti-panel"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="active">
                    <a href="user.html">
                        <i class="ti-user"></i>
                        <p>Contributed Questions</p>
                    </a>
                </li>
                <li>
                    <a href="table.html">
                        <i class="ti-view-list-alt"></i>
                        <p>Table List</p>
                    </a>
                </li>
                <li>
                    <a href="typography.html">
                        <i class="ti-text"></i>
                        <p>Typography</p>
                    </a>
                </li>
                <li>
                    <a href="icons.html">
                        <i class="ti-pencil-alt2"></i>
                        <p>Icons</p>
                    </a>
                </li>
                <li>
                    <a href="maps.html">
                        <i class="ti-map"></i>
                        <p>Maps</p>
                    </a>
                </li>
                <li>
                    <a href="notifications.html">
                        <i class="ti-bell"></i>
                        <p>Notifications</p>
                    </a>
                </li>
				<li class="active-pro">
                    <a href="upgrade.html">
                        <i class="ti-export"></i>
                        <p>Upgrade to PRO</p>
                    </a>
                </li> -->
            </ul>
    	</div>
    </div>
