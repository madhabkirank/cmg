	<link rel="stylesheet" href="cropp/style.css" />
<link rel="stylesheet" href="cropp/jquery.Jcrop.min.css" type="text/css" />

 <div id="popup_upload">
        <div class="form_upload">
            <span class="close" onClick="close_popup('popup_upload')">x</span>
            <h2>Upload For Logo/Photo</h2>
<p> (Size should be in between 200x200 & 1000x800)
<br> (Image format should be JPEG)
<p>
            <form action="upload_photo.php" method="post" enctype="multipart/form-data" target="upload_frame" onSubmit="submit_photo()">
<div style="position:relative;">
                                        <a class="btn btn-primary" href="javascript:;">
                                            CHOOSE A FILE
                                            <input type="file" required="" style="position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:&quot;progid:DXImageTransform.Microsoft.Alpha(Opacity=0)&quot;;opacity:0;background-color:transparent;color:transparent;" name="photo" id="photo" class="file_input" size="40" onchange="$(&quot;#upload-file-info&quot;).html($(this).val());">
                                        </a>
                                        &nbsp;
                                        <span id="upload-file-info"></span>
                                </div>

             
                <div id="loading_progress"></div>
                <input type="submit" value="Upload photo" id="upload_btn">
            </form>
            <iframe name="upload_frame" class="upload_frame"></iframe>
        </div>
    </div>

    <!-- The popup for crop the uploaded photo -->
    <div id="popup_crop">
        <div class="form_crop">
            <span class="close" onClick="close_popup('popup_crop')">x</span>
            <h2>Crop photo</h2>
            <!-- This is the image we're attaching the crop to -->
            <img id="cropbox" style="height:auto; width:100%;"/>
            
            <!-- This is the form that our event handler fills -->
            <form>
                <input type="hidden" id="x" name="x" />
                <input type="hidden" id="y" name="y" />
                <input type="hidden" id="w" name="w" />
                <input type="hidden" id="h" name="h" />
                <input type="hidden" id="photo_url" name="photo_url" />
                <input type="button" value="Crop Image" id="crop_btn" onClick="crop_photo()" />
            </form>
        </div>
    </div>


<div class="col-md-3 col-sm-12">
				      <div class="trainer_left">
					      <div class="profilepic" style="margin-left:0px;     width: 100%;">
                          
                          
                          
                           <?php 	 $uploadimgaes  = singlefetch('cmg_registration_s',array('UMID' => $_SESSION['s-UMID']));
										
										if(!empty($uploadimgaes['pr_images']))
										{
										?>
                             
					      <img src="<?=$UDS;?>image/proimages/<?=$uploadimgaes['pr_images'];?>" height="100" width="100"  align="middle" >
                                        <?php } else {  ?>
                                        
                          
					     <img src="<?=$UDS;?>image/profilepic.jpg" height="75" width="160"  align="middle" >
                                          
                                          <?php } ?>
                                          
                       
                         
                          
                          
                          
                          
						  <br>
<a onClick="show_popup('popup_upload')" class="cursor">Change Photo</a>
						   <!-- <a  data-toggle="modal" data-target="#myModal_profileimagesSt" class="cursor" >Change Photo</a> -->
						  </div>
						  
						  <select class="trainer-post1"><option>Basic Profile</option></select>
						  
						 
						<a href="Profile#Sprofile">  <img src="<?=$UDS;?>image/edit_profile.jpg" class="img-responsive edit-profile"></a>
						  <br>
						  
						    <?php 				 
					
					
					$DataFolloW= num_rows('cmg_follow',array('UMID_S' => $_SESSION['s-UMID'],'status'=>1));
					
						  echo '<a href="Trainer_Follows#Sprofile"><h4 class="followers">Trainers Following ['.$DataFolloW.']</h4></a>';
                          
                          
                          	
						
						$DataFolloW= fetchASC('cmg_follow',array('UMID_S' => $_SESSION['s-UMID'],'status'=>1));

foreach ($DataFolloW  as  $DataFolloWF) {
	
	 $Trianerimgaes  = singlefetch('cmg_registration',array('UMID' => $DataFolloWF['UMID_T']));
	
	?>
						       <div class="col-md-3 col-xs-6 followers-img">
                              <a href="<?=$domainname;?>Trainer-Institue/Post/Profile/<?=$Trianerimgaes['u_url'];?>/" target="_blank"> <img src="<?=$UDS;?>image/proimages/<?=$Trianerimgaes['pr_images'];?>" class="img-responsiveformf"></a></div>
							   
                               
                               <?php } ?>
							   
							   <div class="clearfix"></div>
							   
					  <br>
                      
                       <div class="cou-sub">
					    <p class="color1"> Coupons you subscribed to :</p>
                        <?php 				 
					
				                         
                          	$setI=0;
						
						$couponGEt= fetchASC('cmg_get_coupon',array('UMID_S' => $_SESSION['s-UMID']));

foreach ($couponGEt  as  $couponGEtF) {
$mytoday=date('Y-m-d');
if(strtotime($mytoday)<=strtotime($couponGEtF['c_valid']))
{
	
	?>
						       
                              
<p class="cou-sub-txt"><?=$couponGEtF['c_name'];?> :: <span class="mycolor font11"> Expiry on  <?=$couponGEtF['c_valid'];?> </span></p>
					  
						<div class="clearfix"></div>
					 
							   
                               
                               <?php $setI++;} } if($setI==0){ echo '<p>No Coupon Subscribed </p>'; } ?>
					
					  
					     </div>
					     
					  </div><!-- Search Left-->
				   </div><!-- Left Side-->
<script src="cropp/jquery.Jcrop.min.js"></script>
<script type="text/javascript" src="cropp/script.js"></script>