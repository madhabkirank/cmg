<?php include("../database/config.php");
$cidnn=explode('CMGRR',$_SERVER['QUERY_STRING']);
$cid=$cidnn[0];

$Infra_INfo=$conn->prepare("select * from cmg_review_like WHERE `UIMD_S`='".$_SESSION['s-UMID']."' AND `reviw_id`='$cid' ");
$Infra_INfo->execute();
$Infra_INfoC= $Infra_INfo->rowCount();



if($Infra_INfoC==0)
{

$satateDATA_ISQ=$conn->prepare("INSERT INTO `cmg_review_like`(`UIMD_S`, `UMID`,`reviw_id`,`date`, `status`) VALUES ( '".$_SESSION['s-UMID']."','".$cidnn[1]."','$cid','$date',1)");

$satateDATA_ISQF=$satateDATA_ISQ->execute();




}

$Infra_INfo1=$conn->prepare("select * from cmg_review_like WHERE  `reviw_id`='$cid' ");
$Infra_INfo1->execute();
$lastfv=$Infra_INfo1->rowCount();
echo '( '.$lastfv.' Likes )';

$tlike=$conn->prepare("UPDATE `cmg_reviews` SET `like`=$lastfv WHERE id='$cid' ");

$tlikeF=$tlike->execute();

?>
