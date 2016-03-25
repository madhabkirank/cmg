<?php  include("../database/config.php");
$cid=$_SERVER['QUERY_STRING'];

$satateDATA_ISQ=$conn->prepare("UPDATE `cmg_reviews` SET `status`=0 WHERE `id`='$cid' ");

$satateDATA_ISQF=$satateDATA_ISQ->execute();



?>
