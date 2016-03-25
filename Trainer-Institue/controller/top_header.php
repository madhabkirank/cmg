             <style>
			 .fa-envelope {color:#D45610}</style>
			  <?php
			  $cmg_follow  = num_rows('cmg_follow',array('UMID_T' => $UMIDSProfile['UMID']));
			  $cmg_like  = num_rows('cmg_like',array('UMID_T' => $UMIDSProfile['UMID']));
			  	
			  $imagesdataNEW  = fetchsingle('cmg_basic_inf0_ti',array('UMID' => $UMIDSProfile['UMID']));
			   $cmg_gallery  = fetchsingle('cmg_gallery',array('UMID' => $UMIDSProfile['UMID'],'category' =>'Broucher'));
			  $trainer_detailsnew  = fetchsingle('cmg_registration',array('UMID' =>$UMIDSProfile['UMID']));	
			  
			  	if(!empty($cmg_gallery['imag_video']))
					{
						
						$dnimg="download"; $linkb=$domainname.'image/gallery/'.$cmg_gallery['imag_video'];
					} else { $dnimg="nodownload"; $linkb="#"; }
			   ?>
              
                <div class="profile_bnr" id="View">
				
				<?php if(!empty($trainer_detailsnew['cr_images']))
				{ ?>
				
				<img src="<?=$domainname;?>image/proimages/<?=$trainer_detailsnew['cr_images'];?>" style="width:100%; height: 253px;"></div>
				
				 <?php } else { ?>  <img src="<?=$domainname;?>image/proimages/132720947.jpg" style="width:100%; "></div> <?php } ?>
							   
							   
<div class="trainerbarset">
				 <?=ucfirst($trainer_detailsnew['institute_dname']);?> &nbsp; - &nbsp; <?=ucfirst($trainer_detailsnew['Are_u_an']);?>
				<div class="rightnew">
				<?php if(isset($_SESSION['s-UMID']))
				{ 
				
					$followerSn  = num_rows('cmg_follow',array('UMID_T' => $UMIDSProfile['UMID'],'UMID_S' => $_SESSION['s-UMID']));
			if($followerSn>=1)
					{  $FollowCn='#Followers'; } else {   $FollowCn='#General';  }
				
				?>
				<a data-toggle="modal" data-target="#myModalmessage" class="cursor sendamessage"><input type="hidden" value="<?=$UMIDSProfile['UMID'].$FollowCn;?>" class="toid">Message <i class="fa fa-envelope font16"></i></a>
					<?php } elseif(isset($_SESSION['UMID'])) { ?>
				<a onclick="return alert('Only Student Can Apply This')" class="cursor" >Message <i class="fa fa-envelope font16"></i></a>
				<?php  } else { ?>
				<a data-toggle="modal" data-target="#myModal_login" class="cursor" >Message <i class="fa fa-envelope font16"></i></a>
				<?php }?>
				</div>
				</div>
				
				<div class="profile_bar">
					<?php if(!empty($trainer_detailsnew['pr_images']))
				{ ?>
				
	<img src="<?=$domainname;?>image/proimages/<?=$trainer_detailsnew['pr_images'];?>" class="profile_main_imgnew">
				
				 <?php } else { ?>  	<img src="<?=$domainname;?>image/proimages/default.jpg" class="profile_main_img"> <?php } ?>
				
				
				   
				   
				   
			
				   
				   <?php if(isset($_SESSION['s-UMID']))
				{ 
				
				
				
	$followerS  = num_rows('cmg_follow',array('UMID_T' => $UMIDSProfile['UMID'],'UMID_S' => $_SESSION['s-UMID']));
			if($followerS>=1)
					{  $FollowC='Unfollow'; } else {   $FollowC='Follow';  }
	
	$likenS  = num_rows('cmg_like',array('UMID_T' => $UMIDSProfile['UMID'],'UMID_S' => $_SESSION['s-UMID']));
				
					if($likenS>=1)
					{  $likenSC='Unlike'; } else {   $likenSC='Like';  }
					
				
				?>
                
                <div class="profile_bar_icon">
				   <a href="<?=$linkb;?>" <?=$dnimg;?>><img src="<?=$domainname;?>image/<?=$dnimg;?>.png"></a>
				   </div>
				      <div class="profile_bar_icon" <?=$dispalyA;?> >
					   <input type="hidden" class="takefollowa" value="<?=$UMIDSProfile['UMID'];?>">
				   
				     <span class="cursor newspan follow" ><?=$FollowC;?></span>
				   <div class="ptxt"><span class="flollowshowa"><?=$cmg_follow;?></span> Following</div>
				   </div>
				   
				   <div class="profile_bar_icon" <?=$dispalyA;?> >
				
				   <span class="cursor newspan like" ><?=$likenSC;?></span>
				   <div class="ptxt"><span class="likeshowa"><?=$cmg_like;?></span> Likes</div>
				   </div>
				                                
                       <?php } elseif(isset($_SESSION['UMID'])) { ?>         
                                
                                
                                
                             <div class="profile_bar_icon">
				   <a href="<?=$linkb;?>" <?=$dnimg;?>><img src="<?=$domainname;?>image/<?=$dnimg;?>.png"></a>
				   </div>

                   
                      
                            <div class="profile_bar_icon"  >
				   <a onclick="return alert('Only Student Can Apply This')" class="cursor" style="text-decoration:none"><img src="<?=$domainname;?>image/follow.png"></a>
				   <div class="ptxt"><?=$cmg_follow;?> Following</div>
				   </div>
				   
				   <div class="profile_bar_icon"  >
				   <a onclick="return alert('Only Student Can Apply This')" class="cursor" style="text-decoration:none"><img src="<?=$domainname;?>image/like.png"></a>
				   <div class="ptxt"><?=$cmg_like;?> Likes</div>
				   </div>
				       
				   
			<?php  } else { ?>
            
            
                <div class="profile_bar_icon">
				   <a data-toggle="modal" data-target="#myModal_login" class="cursor" style="text-decoration:none"><img src="<?=$domainname;?>image/<?=$dnimg;?>.png"></a>
				   </div>
                   
                   
			          <div class="profile_bar_icon" <?=$dispaly;?> >
				   <a data-toggle="modal" data-target="#myModal_login" class="cursor" style="text-decoration:none"><img src="<?=$domainname;?>image/follow.png"></a>
				   <div class="ptxt"><?=$cmg_follow;?> Following</div>
				   </div>
				   
				   <div class="profile_bar_icon" <?=$dispaly;?> >
				   <a data-toggle="modal" data-target="#myModal_login" class="cursor" style="text-decoration:none"><img src="<?=$domainname;?>image/like.png"></a>
				   <div class="ptxt"><?=$cmg_like;?> Likes</div>
				   </div>
				<?php }?>
				   
				   
				  <div class="profile_bar_icon" style="display:none">
                  <?php if($trainer_detailsnew['premium']==1) { ?> <img src="<?=$domainname;?>image/verified.png"> <?php } else { ?> <img src="<?=$domainname;?>image/verified1.png"> <?php } ?>
			   </div> 
				   
				   <div class="clearfix"></div>
				</div>  
				
				 <!--/.Profile Image--> 
				
				 <div class="coupon" id='Profile'>
				      <div class="coup_left">
					     <h3 style="font-size:13px;">COUPONS</h3>
						 <p><a href="http://demo.projectlaunch.in/cmgphp/coupon_FAQ" target="_blank">How to use Coupons FAQ</a></p>
					  </div>
					  <div class="coup_right">
                      
   	<?php 
 $CouponTotal  = num_rows('cmg_create_coupon', array('UMID' => $UMIDSProfile['UMID'],'status' =>1));
 if( $CouponTotal>0)
 {
$result = fetch('cmg_create_coupon', array('UMID' => $UMIDSProfile['UMID'],'status' =>1));

?>	
            
			             
                         
                         
						 
						 <div id="carousel-example" class="carousel slide" data-ride="carousel" >
    <!-- Wrapper for slides -->
    <div class="row">
       <div>
            <div class="carousel-inner">
              
                  
   <div class="carousel-inner">
                
              
                
                <?php $activp1=1;			
				
				foreach ($result as  $dataFETCH_Coupon) {

 $expdaynew= fetchsingle('cmg_coupon_purchse',array('id' => $dataFETCH_Coupon['packages']));
  $startdate=$dataFETCH_Coupon['date'];
					$todaydane=date('Y-m-d');
					  
					  $enddatenew = strtotime(date("Y-m-d", strtotime($startdate)) . " +".$expdaynew['exp_date']." day");
					 
					 if(strtotime($todaydane)<$enddatenew && strtotime($todaydane)<strtotime($dataFETCH_Coupon['dov']))
					 { 
				
				
							  if($activp1==1) { $activse1='active'; } else { $activse1=''; }
							  

						  ?>
                          
						   <div class="item <?=$activse1;?>">
                    <div class="carousel-content" style="display:block; height:auto;">

				 <h3><?=ucfirst(substr($dataFETCH_Coupon['coupon_titel'], 0, 47));?> -  Offer Details - <?=$dataFETCH_Coupon['discount_value'];?><?=$dataFETCH_Coupon['discount_type'];?> Off!</h3>




						  <p class='disacrptionc'><?=$dataFETCH_Coupon['c_description'];?></p>
						 <p> <a href="Coupon" class='mycolors'>View All Coupon</a> </p>
                                                   
                                                        
                                                      
                                  </div></div>                      
                                                        <?php $activp1++; }  }  ?>
                
            </div>
                                                        
                                                        
                                                          
                
                
                
            </div>
        </div>
    </div>
 <a class="left carousel-control" href="#carousel-example" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left fa fa-angle-left"></span>
  </a>
 <a class="right carousel-control" href="#carousel-example" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right fa fa-angle-right"></span>
  </a>

</div>
						 
						 <?php } else { ?>
						 <h3 style=" line-height: 58px;"> Currently No coupon Available<h3>
						 
						 <?php } if($activp1==1) { echo '<h3 style=" line-height: 58px;"> Currently No coupon Available<h3>';} ?>
                 
                         
			          </div>
					  
					  <div class="clearfix"></div>
				   </div>
				      
     
							