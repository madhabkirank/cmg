<?php  include("../database/config.php");
$cid=$_SERVER['QUERY_STRING'];


$Infra_INfo=$conn->prepare("select * from cmg_like WHERE `UMID_S`='".$_SESSION['s-UMID']."' AND `UMID_T`='$cid'");
$Infra_INfo->execute();
$Infra_INfoC= $Infra_INfo->rowCount();


$Infra_INfo1=$conn->prepare("select * from cmg_like WHERE  `UMID_T`='$cid'");
$Infra_INfo1->execute();
$Infra_INfoC1= $Infra_INfo1->rowCount();

if($Infra_INfoC==0)
{

$satateDATA_ISQ=$conn->prepare("INSERT INTO `cmg_like`(`UMID_S`, `UMID_T`, `like_status`, `date`, `time`, `status`) VALUES ( '".$_SESSION['s-UMID']."','$cid',1,'$date','$time',1)");

$satateDATA_ISQF=$satateDATA_ISQ->execute();
echo $Infra_INfoC1+1;
}
else 
{

$DELETES=$conn->prepare("DELETE FROM `cmg_like` WHERE `UMID_S`='".$_SESSION['s-UMID']."'  AND `UMID_T`='$cid'");

$DELETED=$DELETES->execute();
	echo $Infra_INfoC1-1;
}

?>
