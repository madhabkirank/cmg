<?php  include("../database/config.php"); ?>
<script type="application/javascript" src="<?=$domainname;?>/js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function() {

$('.Coursetake').click(function() {
	$valueoftext=$(this).text();
	
$('.hidden').val(1);
	$('.takevlaueAUTO').val($valueoftext);
	 $('.nsearch').css('display','none');
});

$('.Trainertake').click(function() {
	$valueoftext=$(this).text();
	
$('.hidden').val(2);
	$('.takevlaueAUTO').val($valueoftext);
	 $('.nsearch').css('display','none');
});






});
</script>
<style>
.takitnow{border-bottom:1px dashed #E9E9E9; cursor:pointer; padding:3px;}
.takitnow:hover {background:#DCDCDC; cursor:pointer;}
</style>

<?php
$secrhvalenn=str_replace('%20',' ',$_SERVER['QUERY_STRING']);

$secrhvale12=explode('CMGGG',$secrhvalenn);
$secrhvale=$secrhvale12[1];
$typc=$secrhvale12[0];
if( strlen($secrhvale)>0)
{

$USERCHEk=$conn->prepare("select * from cmg_courses WHERE `coursename` LIKE  '$secrhvale%' GROUP BY `coursename`");
$USERCHEk->execute();
$USERCHEkF= $USERCHEk->fetchAll();
if($USERCHEk->rowCount()>0)
{
 ?>
 
<div class="col-md-4 separate veticalset">
  <h3><i class="fa fa-graduation-cap"></i> Search By Course</h3>
<p>
 <?php 
foreach($USERCHEkF as $row)
{

echo '<p class="takitnow Coursetake">'.$row['coursename']."</p>";
}


 ?>
</div>

<?php 
}
//$USERCHEk=$conn->prepare("select * from cmg_registration WHERE `Are_u_an`='$typc' AND status=1 AND email_verification=1 AND `institute_dname` LIKE  '$secrhvale%'");
$USERCHEk=$conn->prepare("select * from cmg_basic_inf0_ti WHERE `membertype`='$typc' AND status=1 AND city='".$_SESSION['currentcity']."' AND `instituename` LIKE  '$secrhvale%'");

$USERCHEk->execute();
$USERCHEkF= $USERCHEk->fetchAll();
if($USERCHEk->rowCount()>0)
{
?>

 <div class="col-md-4 separate veticalset">
		      <h3><i class="fa fa-male"></i> Search By <?=$typc;?></h3>
<?php
foreach($USERCHEkF as $row)
{

echo '<p class="takitnow Trainertake">'.$row['instituename']."</p>";
}
?>
</div>
<?php

}





}


?>

		    
			 
           
           
           
           
           
           
           
           
		  
			  