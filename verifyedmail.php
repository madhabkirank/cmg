<?php include("database/config.php"); 
if(isset($_GET['ID']) ) 
{
	
	$myID=$_GET['ID'];



$UserCount=$conn->prepare("UPDATE `cmg_registration` SET `email_verification`=1 WHERE  `id`='$myID'");
$UserCount->execute();
echo '<script>alert("Account Activate Successfully");window.location="'.$domainname.'";</script>';	



}


?>