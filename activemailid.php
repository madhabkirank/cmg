<?php ob_start(); include("database/config.php");

$activeaccount=$_POST['activeaccount'];

$USERCHEk=$conn->prepare("select * from cmg_registration WHERE `email`='$activeaccount' and status=0");
$USERCHEk->execute();
$USERCHEkF= $USERCHEk->fetch();
 $USERCHEkFr= $USERCHEk->rowCount();
if($USERCHEkFr==1)
{


$RegDATA_ISQ=$conn->prepare("UPDATE `cmg_registration` SET `activerequest`=1 WHERE  `email`='$activeaccount' and status=0");

$RegDATA_ISQF=$RegDATA_ISQ->execute();

echo '<script>alert("Active request submitted");window.location="index.php";</script>';
} else {
echo '<script>alert("No registration or activation need, Already activated dude this");window.location="index.php";</script>';

}
 ?>

