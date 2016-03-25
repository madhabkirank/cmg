<?php include("../database/config.php");
$u_url=$_SERVER['QUERY_STRING'];

if(!empty($u_url))
{
$USERCHEk=$conn->prepare("select * from cmg_registration WHERE `u_url`='$u_url'");
$USERCHEk->execute();
$USERCHEkF= $USERCHEk->fetch();

if($USERCHEkF>0)
{
	echo '<span style="color:red">Someone already has this  URL'.$u_url.'</span><input type="hidden" name="URLTake" class="URLTake" value="1" required >
<br>';

	
} else {

echo '<span style="color:green">Available'.$u_url.'</span><input type="hidden" name="URLTake" class="URLTake" value="0"  required ><br>';
}

}
?>
