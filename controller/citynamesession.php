<?php ob_start(); session_start(); 

unset($_SESSION['currentcity']);

$_SESSION['currentcity']=$_SERVER['QUERY_STRING'];

header("location:index.php");


 ?>
 
      
           
           
		  
			  