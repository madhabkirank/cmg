<?php 
if(!isset($_SESSION['s-UMID']) && !isset($_SESSION['s-email']))
{
	header('location:../index.php');
}
 ob_end_flush();


?>