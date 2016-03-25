<?php include("../database/config.php"); ?>
<script type="application/javascript" src="<?=$domainname;?>/js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function() {

$('.takitnow').click(function() {
	$valueoftext=$(this).text();
	

	$('.takevlaueAUTOnewm').val($valueoftext);
	 $('.nsearch1').css('display','none');
});
});
</script>
<style>
.takitnow,.takitnowf{border-bottom:1px dashed #E9E9E9; cursor:pointer; padding:3px; background:#FFFFFF; text-align:left; padding:5px; margin:0px;}
.takitnow:hover {background:#DCDCDC; cursor:pointer;}
</style>

<?php 
$secrhvale=str_replace('%20',' ',$_SERVER['QUERY_STRING']);


$CITYC=$conn->prepare("select * from cmg_city WHERE  `city`='".$_SESSION['currentcity']."'");
$CITYC->execute();
$CITYCn= $CITYC->fetch();

if( strlen($secrhvale)>0)
{

$USERCHEk=$conn->prepare("select * from cmg_location WHERE `location` LIKE  '$secrhvale%' AND `status`=1 AND satate_code='".$CITYCn['id']."' GROUP BY `location`");
$USERCHEk->execute();
$USERCHEkF= $USERCHEk->fetchAll();
if($USERCHEk->rowCount()>0)
{
 ?>
 

 <?php 
foreach($USERCHEkF as $row)
{

echo '<p class="takitnow">'.$row['location']."</p>";
}



}

else {

echo '<p class="takitnowf">Not Available</p>';
}

}


?>

		    
			 
           
           
           
           
           
           
           
           
		  
			  