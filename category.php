<?php $UDS=''; include("controller/header.php");

include("controller/insert_SQL_Controller.php"); 

 ?>



    <section id="services" class="service-item">
	   <div class="container">
            <div class="row" >
			
              <div class="col-md-3 col-xm-12">
			  
			   <div id="services"><h2>Premium Trainer</h2></div>
				   <?php include('premimutrianr_category.php');?>
					  
					 					   
					  <br>
					   <div id="services"><h2>Advertisement</h2></div>
                       
                       	<?php include('category_adv.php'); ?>	
					  
			  </div><!--/#Left Side-->
			  
			  
			  <div class="col-md-9 col-xm-12">
			     <?php include('top_bannercategory.php'); ?>
				 
				 <br>
				 
				 
				 		
	<input type='hidden' id='current_page' />
	<input type='hidden' id='show_per_page' />

				 
				 
				 <h3 class="category" >
				 
					 <?php  $myvi=0;
				 $myarrayvalue=array();
				 $posttagn=$conn->prepare("SELECT * FROM cmg_basic_inf0_ti a , cmg_create_post b WHERE a.UMID=b.UMID AND a.city='".$_SESSION['currentcity']."' AND b.sharewith='general' AND b.category_post='".$_GET['Post']."' AND a.status=1   ORDER BY b.id DESC "); 
				  $posttagn->execute();
$posttagnFET= $posttagn->fetchAll(); 
foreach($posttagnFET as $posttagnFETV)
{
$posttagnFETVN=explode(',',$posttagnFETV['tags']);
$posttagnFETVNT=strtolower($posttagnFETVN[0]);
if($myvi<=5)
{
if (in_array($posttagnFETVNT, $myarrayvalue)) { } else { if(!empty($posttagnFETVN[0])) {?>


<form  action="" method="post" style="float:left; ">
                    
                     <input type="hidden" name="category"  value="<?=$_GET['Post']?>">
                    <input type="submit" name="tagline"  value="<?=$posttagnFETVN[0];?>" style="float:left; background:none; border:none; font-weight:bold; color:#333333;">,
                    
                    </form>


<?php

}

 }}
 
$myarrayvalue[]=$posttagnFETVNT;
				$myvi++; } ?>
				 
			
				 </h3>
				 
				 
					<form style="float:right" action="" method="post">
                    
                     <input type="hidden" name="category"  value="<?=$_GET['Post']?>">
                    <input type="text" name="tagline" placeholder="Search Post by Tags" class="form_style1">
                    
                    </form>
					<div class="clearfix"></div>
					<div id='content'>
					 <?php
			if(isset($_POST['tagline']))
			{
				$tagline=str_replace('.','',$_POST['tagline']);
				$tagline=trim($tagline);
				$dataFETCH_post_General=$conn->prepare("SELECT * FROM cmg_basic_inf0_ti a , cmg_create_post b WHERE a.UMID=b.UMID AND a.city='".$_SESSION['currentcity']."' AND b.sharewith='general' AND a.status=1 AND b.category_post='".$_GET['Post']."' AND b.tags RLIKE '[[:<:]]" . $tagline . "[[:>:]]'  ORDER BY b.id DESC  "); $dataFETCH_post_General->execute();
$dataFETCH_post_GeneralF= $dataFETCH_post_General->fetchAll(); 
				}
			else {
				
		$dataFETCH_post_General=$conn->prepare("SELECT * FROM cmg_basic_inf0_ti a , cmg_create_post b WHERE a.UMID=b.UMID AND a.city='".$_SESSION['currentcity']."' AND b.sharewith='general' AND a.status=1 AND b.category_post='".$_GET['Post']."'   ORDER BY b.id DESC "); 
					  

$dataFETCH_post_General->execute();
$dataFETCH_post_GeneralF= $dataFETCH_post_General->fetchAll();
	}

foreach ($dataFETCH_post_GeneralF  as  $dataFETCH_Post_G) {
	
	
	if(isset($_SESSION['s-UMID']))
	{
	  $newsetcheckpost= num_rows('cmg_post_chat',array('post_ID' => $dataFETCH_Post_G['id'],'UMID_S' => $_SESSION['s-UMID']));
	 
	 if($newsetcheckpost>0)
	 {
		 $enquierdtext='Enquired';
	 }else {
		 $enquierdtext='Enquiry';
	 }} else {
		 $enquierdtext='Enquiry';
	 }
	

	
	
	
	$trainer_details  = fetchsingle('cmg_registration',array('UMID' => $dataFETCH_Post_G['UMID']));	
	

	
	$follow1  = num_rows('cmg_follow',array('UMID_T' => $dataFETCH_Post_G['UMID'],'UMID_S' => $_SESSION['s-UMID']));
	
	$follownew  = num_rows('cmg_follow',array('UMID_T' => $dataFETCH_Post_G['UMID']));
				
					if($follow1>=1)
					{ $actuveF='#2194d7'; $contain='Followed'; } else {  $actuveF=''; $contain='Follow Trainer';  }
					
	$like1  = num_rows('cmg_like_post',array('UMID_T' => $dataFETCH_Post_G['UMID'],'UMID_S' => $_SESSION['s-UMID'],'post_ID' => $dataFETCH_Post_G['id']));
		$likenew  = num_rows('cmg_like_post',array('UMID_T' => $dataFETCH_Post_G['UMID'],'UMID_S' => $_SESSION['s-UMID'],'post_ID' => $dataFETCH_Post_G['id']));
				
					
					if($like1>=1)
					{$actuveFL='#2194d7'; $contain1='Liked'; } else { $actuveFL=''; $contain1='Like Post'; }
	?>
                    
					
                    
					
				
				<div class="search_post">
				      <div class="col-md-12 col-sm-12 col-xs-12 sptop">
					       <div class=" col-md-2 col-sm-12">
						   
						   
						   
						   
						   
						   
						   


						   
						   <a href="<?=$domainname;?>Trainer-Institue/Post/Profile/<?=$trainer_details['u_url'];?>/" >
                        <?php
                        if(!empty($trainer_details['pr_images']))
										{
											
										?>
                                        <img src="<?=$domainname;?>image/proimages/<?=$trainer_details['pr_images'];?>" class="img-responsive" align="middle" >
                                        <?php } else {  ?>
                                        
                                          <img src="<?=$domainname;?>image/profilepic.jpg" class="img-responsive ser-img" align="middle">
                                          
                                          <?php }?>
						
                            </a>
						   </div>
						   <div class="col-md-5 col-sm-5 col-xs-12">
						   <h4> <a href="<?=$domainname;?>Trainer-Institue/Post/Profile/<?=$trainer_details['u_url'];?>/" style="color:#000000"><?=$trainer_details['institute_dname'];?></a></h4>
						     	   
                          
                          <?php if($trainer_details['Are_u_an']=='Institute')
						  { echo '<i class="fa fa-home" title="Institute"></i> &nbsp;&nbsp;&nbsp;';} elseif($trainer_details['Are_u_an']=='Trainer') { echo '<i class="fa fa-user" title="Trainer"></i> &nbsp;&nbsp;&nbsp;';} 
                          
                        //  if($trainer_details['verify_status']==1){ echo '<i class="fa fa-thumbs-o-up" title="Verified"></i> &nbsp;&nbsp;&nbsp;'; } ?> 
						</div>
						
						<div class="col-md-5 col-sm-5 col-xs-12">
						 <!-- <div class="search_enquiry1"><?=$num_rows_POST;?> New Enquiries</div> -->					  
						  <div class="search_post_time"><?=$dataFETCH_Post_G['time']; ?> -  <?=date("d/m/Y", strtotime($dataFETCH_Post_G['date'])); ?></div>
						</div>
						
					  </div>
					  
					  <div class="col-md-12 col-sm-12" style="font-size:14px;text-align: justify; color: #8A8484;">
  <?php if(!empty($dataFETCH_Post_G['youtube_link']) && $dataFETCH_Post_G['youtube_link']!=1) {  ?>

<div style="text-align:center">
							<iframe width="450" height="315" src="<?=$dataFETCH_Post_G['youtube_link'];?>" frameborder="0" allowfullscreen></iframe></div>
                            
                            <?php } ?>
                            
                             <?php if(!empty($dataFETCH_Post_G['attached_photos'])) { ?>
							<img width="450" height="315" src="<?=$UDS;?>image/postimages/<?=$dataFETCH_Post_G['attached_photos'];?>" />
                            
                            <?php } ?>

<br>
						<?=nl2br(substr($dataFETCH_Post_G['post_text'], 0, 500)); ?>
						
						
						<div class="showpostn<?=$dataFETCH_Post_G['id']?>" style="display:none">
<?=nl2br(substr($dataFETCH_Post_G['post_text'], 500, 500000)); ?> <br>
						  
							
							</div>
						<div class="search_post_txt">
						<br />
						      <?php if(isset($_SESSION['s-UMID']))
						{ ?> 
                        <div class="mylikediv1 post_txt" <?=$dispalyA;?>> 
                         <input type="hidden" class="takefollow1" value="<?=$dataFETCH_Post_G['UMID'];?>">
                            <input type="hidden" class="takefollowID1" value="<?=$dataFETCH_Post_G['id'];?>">
                         <div class="disshow" style="display:none"></div>
                        <a class="cursor follow1" style="color:<?=$actuveF;?>"><?=$contain;?></a> (<?=$follownew;?>) |    <a class="cursor like1" style="color:<?=$actuveFL;?>"><?=$contain1;?></a>  (<?=$likenew;?>) |   <a  class="cursor" href="<?=$domainname;?>Student/User-Post-Chat.php?Post_ID=<?=$dataFETCH_Post_G['id'];?>" >Post <?=$enquierdtext;?></a> </div>
                        
                        	<?php } elseif(isset($_SESSION['UMID'])) { ?>
                        
                        <div class="post_txt"> <a onclick="return alert('Only Student Can Apply This')" class="cursor"> Follow Trainer (<?=$follownew;?>) |  Like Post (<?=$likenew;?>)  |  Post Enquiry</a> </div>

<?php } else { ?>    
<div class="post_txt"> <a data-toggle="modal" data-target="#myModal_login" class="cursor"> Follow Trainer (<?=$follownew;?>) |  Like Post (<?=$likenew;?>)  |  Post Enquiry</a> </div> <?php } ?>
						 </div>
						<img src="<?=$domainname;?>image/upd.png"  class="morevi" title='More' id='<?=$dataFETCH_Post_G['id']?>' style=" font-size: 25px;float: right; margin-right: -34px;color: #3A5F6F;"> &nbsp;&nbsp;
						
						
						</div>
						
					<div class="clearfix"></div>
					
					</div>
					
					
					
                    
					<?php } ?>
					
				
				</div>
				 	<div id='page_navigation'></div>
			  </div>		 						

            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#services-->


   <?php include("controller/footer.php"); ?>