<?php include("../database/config.php");
$CITYC=$conn->prepare("select * from cmg_country  ");
$CITYC->execute();
$CITYCn= $CITYC->fetchAll();

foreach($CITYCn as $CITYCnv)
{

$CITYCnn=$conn->prepare("UPDATE `cmg_country` SET `country`='".trim($CITYCnv['country'])."' WHERE id='".$CITYCnv['id']."' ");
$CITYCnn->execute();



}
 ?>

