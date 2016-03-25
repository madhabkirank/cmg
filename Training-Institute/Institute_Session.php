<?php 
if(!isset($_SESSION['UMID']) && !isset($_SESSION['email']))
{
	header('location:../index.php');
}
 ob_end_flush();


?>