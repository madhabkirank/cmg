<?php ob_start(); session_start(); 

unset($_SESSION['currentcity']);

if(isset($_POST['currentcitysel']))
{
$_SESSION['currentcity']=$_POST['currentcitysel'];
} else {
$_SESSION['currentcity']=$_GET['currentcitysel'];

}
header("location:".$_SESSION['URLSET']);


 ?>
 
      
           
           
		  
			  