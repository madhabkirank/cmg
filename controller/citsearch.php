<option>Select City</option><?php include("../database/config.php");
$cid=$_SERVER['QUERY_STRING'];



$USERCHEk=$conn->prepare("select * from cmg_city WHERE `satate_code`='$cid' AND `status`=1 ORDER BY city ASC");
$USERCHEk->execute();
$USERCHEkF= $USERCHEk->fetchAll();
foreach($USERCHEkF as $USERCHEkFF)
{
 echo '	<option  value="'.$USERCHEkFF['city'].'">'.$USERCHEkFF['city'].'</option>'; } ?>