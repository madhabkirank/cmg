<option>Select State</option><?php session_start(); include("../database/config.php");
$cid=$_SERVER['QUERY_STRING'];



$USERCHEk=$conn->prepare("select * from cm_state WHERE `country_id`='$cid' ORDER BY state ASC");
$USERCHEk->execute();
$USERCHEkF= $USERCHEk->fetchAll();
foreach($USERCHEkF as $USERCHEkFF)
{
 echo '	<option  value="'.$USERCHEkFF['id'].'">'.$USERCHEkFF['state'].'</option>'; } ?>