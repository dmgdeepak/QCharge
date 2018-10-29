<?php
session_start();
session_destroy();
require 'def.php';
Header("Location:".site);
?>