<?php include("../database/config.php");
$cid=$_SERVER['QUERY_STRING'];
$cidex=explode(',',$cid);

$cid1=$cidex[0];
$cid2=$cidex[1];

$Infra_INfo=$conn->prepare("select * from cmg_like_post WHERE `UMID_S`='".$_SESSION['s-UMID']."' AND `UMID_T`='$cid1' AND `post_ID`= '$cid2'");
$Infra_INfo->execute();
$Infra_INfoC= $Infra_INfo->rowCount();



if($Infra_INfoC==0)
{

$satateDATA_ISQ=$conn->prepare("INSERT INTO `cmg_like_post`(`UMID_S`, `UMID_T`,`post_ID`, `like_status`, `date`, `time`, `status`) VALUES ( '".$_SESSION['s-UMID']."','$cid1','$cid2',1,'$date','$time',1)");

$satateDATA_ISQF=$satateDATA_ISQ->execute();

}


?>
