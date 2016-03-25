<?php session_start(); include("../database/config.php");

//include('class-phpass.php');
$email=$_POST['email'];

$password=$_POST['password'];

//$PassHASH=password_hash($password, PASSWORD_DEFAULT);
$PassHASH=$password;


// Cross check for user Exsit

if($_POST['membertype']=='Student')
{
	$tblename='cmg_registration_s';

	
}

else {  
$tblename='cmg_registration';


 } 


$USERCHEk=$conn->prepare("select * from $tblename WHERE `email`='$email' and password='$PassHASH' and `status`=1");
$USERCHEk->execute();
$USERCHEkF= $USERCHEk->rowCount();
$USERCHEkFF= $USERCHEk->fetch();

if($USERCHEkF==1)
{
if($_POST['membertype']=='Student')
{
$_SESSION['s-email']=$USERCHEkFF['email'];
$_SESSION['s-UMID']=$USERCHEkFF['UMID'];
$_SESSION['s-username']=$USERCHEkFF['username'];
/*
$BASICINF=$conn->prepare("select * from cmg_basic_info_s WHERE `UMID`='".$USERCHEkFF['UMID']."'");
$BASICINF->execute();
$BASICINF= $BASICINF->fetch();

if(empty($BASICINF['name']) &&  empty($BASICINF['gender'])) 
{
echo '<script>window.location.href="'.$domainname.'Student/Profile";</script>';	
*/

if($_SESSION['URLSET']=='/cmgphp/')
{
echo '<script>window.location.href="'.$domainname.'Student/Dashboard";</script>';
} else {

echo '<script>window.location.href="'.$_SESSION['URLSET'].'";</script>';
}





} else { 

$_SESSION['email']=$USERCHEkFF['email'];
$_SESSION['UMID']=$USERCHEkFF['UMID'];
$_SESSION['username']=$USERCHEkFF['username'];
echo '<script>window.location.href="'.$domainname.'Training-Institute/Dashboard";</script>';
}

$_SESSION['myclassA']='style="display:none;"';
$_SESSION['myclassAI']='style="display:block;"';

	
	} 
	


 else { 
 
 echo "<span>Please check :<br>a) The email ID and Password entered are correct. <br> b) You have selected the correct user type - Trainer / Student.</span>";
 }




 ?>

