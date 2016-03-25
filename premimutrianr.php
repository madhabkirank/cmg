<?php $cmg_registration=$conn->prepare("SELECT * FROM cmg_registration a , cmg_basic_inf0_ti  b WHERE a.status=1 AND a.email_verification=1 AND  a.UMID=b.UMID  AND b.primum_city='".$_SESSION['currentcity']."'  LIMIT 0,5  ");
$cmg_registration->execute();

$PrimumuTrainerF= $cmg_registration->fetchAll();

foreach ($PrimumuTrainerF as $PrimumuTrainer) {  
?>

<div class="trainer">
                          <div class="col-sm-3 trainerimg" style="text-align:center;"><a href="<?=$domainname;?>Trainer-Institue/Post/Profile/<?=$PrimumuTrainer['u_url'];?>/" target="_blank" ><img src="<?=$domainname;?>image/proimages/<?=$PrimumuTrainer['pr_images'];?>" height="55" width="60"></a>
						  <div style="color:#FFFFFF; background:#3a5f6f; text-align:center; font-size:11px" >
                          
                         <?php  if($PrimumuTrainer['Are_u_an']=='Institute')
						  { //echo ' <i class="fa fa-home" title="Institute"></i> &nbsp;&nbsp;&nbsp;';
						  echo 'Institute';
						  } elseif($PrimumuTrainer['Are_u_an']=='Trainer') {// echo '<i class="fa fa-user" title="Trainer"></i> &nbsp;&nbsp;&nbsp;';
						  
						    echo 'Trainer';
						  } 
                          
                          //if($PrimumuTrainer['verify_status']==1){ echo '<i class="fa fa-thumbs-o-up" title="Verified"></i> &nbsp;&nbsp;&nbsp;'; } ?>
						   </div>
						  </div>
                          <div class="col-sm-8">

                          <a href="<?=$domainname;?>Trainer-Institue/Post/Profile/<?=$PrimumuTrainer['u_url'];?>/" title="<?=ucfirst($PrimumuTrainer['institute_dname']);?>" target="_blank" >
						  <h3><?=ucfirst($PrimumuTrainer['institute_dname']);?></h3></a>
                          <p><?=ucfirst($PrimumuTrainer['location']);?></p>
                          <p><?=ucfirst($PrimumuTrainer['premium_course']);?></p>
                          <div class="blue"><a href="<?=$domainname;?>Trainer-Institue/Post/Profile/<?=$PrimumuTrainer['u_url'];?>/#View" target="_blank">View Details</a></div>
                          </div>
                          <div class="clearfix"></div>
                      </div>
                      
                      <?php } ?>
					