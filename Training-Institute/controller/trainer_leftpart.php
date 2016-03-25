	<link rel="stylesheet" href="cropp/style.css" />
<link rel="stylesheet" href="cropp/jquery.Jcrop.min.css" type="text/css" />
<style>
.carousel-content {
    color:black;
    display:flex;
    align-items:center;
}
.search-right {     min-height: 701px; }
</style>
<script>
   setCarouselHeight('#carousel-example');

    function setCarouselHeight(id)
    {
        var slideHeight = [];
        $(id+' .item').each(function()
        {
            // add all slide heights to an array
            slideHeight.push($(this).height());
        });

        // find the tallest item
        max = Math.max.apply(null, slideHeight);

        // set the slide's height
        $(id+' .carousel-content').each(function()
        {
            $(this).css('height',max+'px');
        });
    }
</script>
	 
          
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
                      
                      
                       <?php 	 $uploadimgaes  = fetchsingle('cmg_registration',array('UMID' => $_SESSION['UMID']));
										
										if(!empty($uploadimgaes['pr_images']))
										{
										?>
                             
					      <div class="profilepic" id="photo_container"><img src="<?=$UDS;?>image/proimages/<?=$uploadimgaes['pr_images'];?>" class="img-responsive" align="middle">
                                        <?php } else {  ?>
                                        
                          
					      <div class="profilepic" id="photo_container"><img src="<?=$UDS;?>image/profilepic.jpg" class="img-responsive" align="middle">
                                          
                                          <?php } ?>

                          
                          
                          
                          
						  <br>
<a onClick="show_popup('popup_upload')" class="cursor">Change Photo</a>
						 <!--  <a  data-toggle="modal" data-target="#myModal_profileimages" class="cursor" >Change Photo</a> -->
						  </div>
						  
						  <select class="trainer-post1 chnagsoitmprof" style="font-size: 14px;">
<option value='Basic-Profile'>Select Profile Edit</option>
<option value='Basic-Profile'>Basic Profile Info</option>
<option value='Infrastucture' >Infrastructure</option>
<option value='More-About-Institute'>More About Institute</option>
<option value='Branch-Create'>Branches</option>
</select>
						  
						 
						  <a href="Basic-Profile#Profile"><img src="<?=$UDS;?>image/edit_profile.jpg" class="img-responsive edit-profile"></a>
                       
                          
						  <br>
						  <div  style="text-align:center; height: 50px;"><a href="<?=$domainname;?>Trainer-Institue/Post/Profile/<?=$uploadimgaes['u_url'];?>/" target="_blank" style="color:#e06c05;">View profile as a Visible User</a><br></div>
						    				 
						  <a href="Courses#Profile">  <h3>Course</h3></a>
						     <a href="Create-A-Courses#Profile">Create</a> |
							 <a href="Courses#Profile">Edit</a> |
							 <a href="Courses#Profile">Delete</a>
							  <div class='followheight'>
						   <?php 				 
					
					
					$DataFolloW= num_rows('cmg_follow',array('UMID_T' => $_SESSION['UMID'],'status'=>1));
					if($DataFolloW>0)
					{
						  echo '<a href="Followers#Profile"><h4 class="followers">Your Followers ['.$DataFolloW.']</h4></a>';
						  } else {    echo '<a ><h4 class="followers">No Followers </h4></a>'; } 
                          
                          
                          	
						
						$DataFolloW= fetchASC('cmg_follow',array('UMID_T' => $_SESSION['UMID'],'status'=>1));

foreach ($DataFolloW  as  $DataFolloWF) {
	
	 $Trianerimgaes  = fetchsingle('cmg_registration_s',array('UMID' => $DataFolloWF['UMID_S']));
	
	?>
						 
						       <div class="col-md-3 col-xs-6 followers-img"><img src="<?=$UDS;?>image/proimages/<?=$Trianerimgaes['pr_images'];?>" class="img-responsiveformf"></div>


							  <?php } ?>

</div>

					  <div style="height:28px; width:100%; float:left"></div>
					  <a href="Coupon_Management#Profile"><h3> Coupon</h3><a/>
<?php 	$ccPackagesRE=$conn->prepare("select * from cmg_coupon_purchse WHERE `remaining_coupon`>=1 AND `UMID`='".$_SESSION['UMID']."'  ORDER BY `id` DESC ");
 $ccPackagesRE->execute();
$ccPackagesREN= $ccPackagesRE->rowCount();
							 if($ccPackagesREN>=1) { 
							  ?>
						     <a href="Coupon-Create#Profile">Create</a> |
                             
                              <?php } else {   ?>
                                   <a href="Premium_Coupon_Package#Profile">Create</a> |
                                   
                                   <?php } ?> 
                                   
							 <a href="Coupon_Management#Profile">Edit</a> |
							 <a href="Premium_Coupon_Package#Profile">Request Coupon</a>	
							 
							 <div class="trainer-box">
                             
                             <?php 		$gpurchase= num_rows('cmg_gallery_purchse',array('UMID' => $_SESSION['UMID'],'buyingstatus' =>1));
							 if($gpurchase>=1) { 
							  ?>
							   <a href="Gallery#Profile">Gallery</a> |
							   <a href="Broucher#Profile">Broucher</a>
							    <br><a href="Placement-Corner#Profile">Placement Corner</a>
                               <?php } else {   ?>
                               	   <a href="Premium_Package#Profile">Gallery</a> |
							   <a href="Premium_Package#Profile">Broucher</a>
							    <br><a href="Premium_Package#Profile">Placement Corner</a>
<div class="buy"><br><a href="<?=$domainname;?>Training-Institute/Premium_Package#Profile" >Buy</a></div>

                               <?php } ?>
                               
							  
							   
							  							 </div>
							 
							 
							 
							 <div class="review" style="display:block">
                  
                  <?php              
			$reviewsCOUNT  = num_rows('cmg_reviews',array('UMID' => $_SESSION['UMID'],'status' => 1));
						  $reviewsF  = fetchASC('cmg_reviews',array('UMID' => $_SESSION['UMID'],'status' => 1)); 
						  
						  ?>
						   <h4><a href="<?=$domainname;?>Training-Institute/Reviews#Profile"  style="color:#FFFFFF"> Reviews (<?=$reviewsCOUNT;?>)</a></h4>
						  <?php
						  
						  $activp1=1;
if(sizeof($reviewsF)>=1)
{
			 ?>
                  <div id="carousel-example" class="carousel slide" data-ride="carousel" >
    <!-- Wrapper for slides -->
    <div class="row">
       <div class="col-xs-offset-6" style="margin-left: 0px; padding: 10px 10px;text-align: center; height:200px; overflow:auto">
            <div class="carousel-inner">
              
                  
   <div class="carousel-inner">
                
              
                
                <?php 			  foreach ($reviewsF  as  $reviews) {
							  if($activp1==1) { $activse1='active'; } else { $activse1=''; }
							  
						  $studentname  = fetchsingle('cmg_registration_s',array('UMID' => $reviews['UIMD_s']));
						  ?>
                          
						   
							<div class="item <?=$activse1;?>">
                    <div class="carousel-content">
                <div class="viewtextdiv ">
                   <p class="ptextview"><?=$reviews['message'];?></p>
							
                    <p class="stud-name mycolor">- <?=$studentname['username'];?></p>
                        </div>
                    </div>
                </div>
                                                   
                                                        
                                                      
                                                        
                                                        <?php $activp1++; } ?>
                
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

<?php } ?>
 <h4> <a href="<?=$domainname;?>Training-Institute/Reviews#Profile"  style="color:#FFFFFF"> <br>View All Review</a> </h4>
						  </div>
						  
						  
						  
					  </div><!-- Search Left-->
				   </div><!-- Left Side-->

<script src="cropp/jquery.Jcrop.min.js"></script>
<script type="text/javascript" src="cropp/script.js"></script>
<script type="text/javascript" src="cropp/scriptC.js"></script>