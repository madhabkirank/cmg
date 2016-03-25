<?php
session_start();
$currentcity=$_SESSION['currentcity'];
session_destroy();
session_start();
$_SESSION['currentcity']=$currentcity;

header("location:http://demo.projectlaunch.in/cmgphp/");


?>