<?php include("../database/config.php");
$emailid=$_SERVER['QUERY_STRING'];

$USERCHEk=$conn->prepare("select * from cmg_registration WHERE `email`='$emailid'");
$USERCHEk->execute();
$USERCHEkF= $USERCHEk->fetch();

if($USERCHEkF>0)
{
	echo 'Someone already has that Email';

	
}


?>
