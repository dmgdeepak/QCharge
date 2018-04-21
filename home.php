<?php
session_start();
include('def.php');
include('sqlc.php');
if((isset($_SESSION['email'])) && (isset($_SESSION['sid'])))
{
Header("Location:".site."/home");
exit;
}

?>