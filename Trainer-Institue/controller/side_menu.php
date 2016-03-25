<style>
.carousel-content {
    color:black;
    display:flex;
    align-items:center;
}
a{font-size:16px;}
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

<?php if(isset($_SESSION['UMID']) || isset($_SESSION['s-UMID']))
{
?>
<ul class="resp-tabs-list">
                          <li <?php if(empty($includefile)) { echo "class='resp-tab-active'"; } else { } ?>><a href="<?=$domainname;?>Trainer-Institue/Post/Profile/<?=$getprifilena[0];?>/#Profile">Post / Updates</a></li>
                <li <?php if($includefile=='Basic-Profile') { echo "class='resp-tab-active'"; } else { } ?> ><a href="<?=$domainname;?>Trainer-Institue/Post/Profile/<?=$getprifilena[0];?>/Basic-Profile#Profile">Basic Profile</a></li>
				
				 <li <?php if($includefile=='Course-List') { echo "class='resp-tab-active'"; } else { } ?>><a href="<?=$domainname;?>Trainer-Institue/Post/Profile/<?=$getprifilena[0];?>/Course-List#Profile">Course List</a></li>
				
              
                
<?php $gallerynn  = fetch('cmg_gallery',array('category' => 'images','UMID' => $UMIDSProfile['UMID']));

if(sizeof($gallerynn)>=1)
{ ?>
                <li <?php if($includefile=='Gallery') { echo "class='resp-tab-active'"; } else { } ?>><a href="<?=$domainname;?>Trainer-Institue/Post/Profile/<?=$getprifilena[0];?>/Gallery#Profile">Gallery</a>
                
                <?php }  else { ?>
				    <li <?php if($includefile=='Gallery') { echo "class='resp-tab-active'"; } else { } ?>><a href="#Profile">Gallery</a>
				<?php	
				}
                ?>

<div class="gallery-bg">
                    
                       <div id="main-slide" class="carousel slide" data-ride="carousel">

                           <!-- Carousel inner -->
                <div class="carousel-inner">
                <?php 

$gallery  = fetch('cmg_gallery',array('category' => 'images','UMID' => $UMIDSProfile['UMID']));
$activp=1;
if(sizeof($gallery)>=1)
{
foreach ($gallery as $galleryvalue) {
	if($activp==1) { $activse='active'; } else { $activse=''; }
?>


                
                    <div class="item <?=$activse;?>"><a href="<?=$domainname;?>Trainer-Institue/Post/Profile/<?=$getprifilena[0];?>/Gallery#Profile"><img src="<?=$domainname;?>image/gallery/<?php echo $galleryvalue['imag_video']; ?>" height="156" width="256"  alt="slider"></a></div>
                  <?php  $activp++;}  } else {  ?>
                    <div class="item active"><img src="<?=$domainname;?>image/gallery/demogallery.jpg" height="156" width="256"  alt="slider"></div>
                   <?php } ?>
                </div>
                <!-- Carousel inner end-->

                <!-- Controls -->
                <a class="left carousel-control" href="#main-slide" data-slide="prev">
                    <span><i class="fa fa-angle-left"></i></span>
                </a>
                <a class="right carousel-control" href="#main-slide" data-slide="next">
                    <span><i class="fa fa-angle-right"></i></span>
                </a>
            </div>
                    
                    
                    </div>
 </li>
                 
<li <?php if($includefile=='Placement-Corner' || $includefile=='companies_tied_up' || $includefile=='student_placed') { echo "class='resp-tab-active'"; } else { } ?>><a href="<?=$domainname;?>Trainer-Institue/Post/Profile/<?=$getprifilena[0];?>/Placement-Corner#Profile">Placement Corner</a></li>
                <!-- <li <?php if($includefile=='Review') { echo "class='resp-tab-active'"; } else { } ?>><a href="<?=$domainname;?>Trainer-Institue/Post/Profile/<?=$getprifilena[0];?>/Review#Profile">Review</a></li> -->
                 
               
				<li <?php if($includefile=='Infrastructure') { echo "class='resp-tab-active'"; } else { } ?>><a href="<?=$domainname;?>Trainer-Institue/Post/Profile/<?=$getprifilena[0];?>/Infrastructure#Profile">Infrastructure</a></li>
				
				  <li <?php if($includefile=='More-about-Institute') { echo "class='resp-tab-active'"; } else { } ?>><a href="<?=$domainname;?>Trainer-Institue/Post/Profile/<?=$getprifilena[0];?>/More-about-Institute#Profile">More about Institute</a></li>
				 <li <?php if($includefile=='Branch-List') { echo "class='resp-tab-active'"; } else { } ?>><a href="<?=$domainname;?>Trainer-Institue/Post/Profile/<?=$getprifilena[0];?>/Branch-List#Profile">Branch List</a></li>
				
                  <li <?php if($includefile=='Coupon') { echo "class='resp-tab-active'"; } else { } ?>><a href="<?=$domainname;?>Trainer-Institue/Post/Profile/<?=$getprifilena[0];?>/Coupon#Profile">Coupon</a></li>
                  
                  
                  <div class="review" style="display:block">
                  
                  <?php              
						  $reviewsCOUNT  = num_rows('cmg_reviews',array('UMID' => $UMIDSProfile['UMID'],'status' => 1));
						  $reviewsF  = fetch('cmg_reviews',array('UMID' => $UMIDSProfile['UMID'],'status' => 1)); 
						  
						  ?>
						   <h4><a href="<?=$domainname;?>Trainer-Institue/Post/Profile/<?=$getprifilena[0];?>/Review#Profile"  style="color:#FFFFFF"> Reviews (<?=$reviewsCOUNT;?>)</a></h4>
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
 <h4> <a href="<?=$domainname;?>Trainer-Institue/Post/Profile/<?=$getprifilena[0];?>/Review#Profile"  style="color:#FFFFFF"> <br>View All Review</a> </h4>
 
						  </div>
						  
						          
                  
            </ul>
			<?php }  else { ?>
			
			
			<ul class="resp-tabs-list">
                          <li <?php if(empty($includefile)) { echo "class='resp-tab-active'"; } else { } ?>><a href="<?=$domainname;?>Trainer-Institue/Post/Profile/<?=$getprifilena[0];?>/">Post / Updates</a></li>
                <li <?php if($includefile=='Basic-Profile') { echo "class='resp-tab-active'"; } else { } ?> ><a href="<?=$domainname;?>Trainer-Institue/Post/Profile/<?=$getprifilena[0];?>/Basic-Profile#Profile">Basic Profile</a></li>
              
				
				  <li <?php if($includefile=='Course-List') { echo "class='resp-tab-active'"; } else { } ?>><a href="<?=$domainname;?>Trainer-Institue/Post/Profile/<?=$getprifilena[0];?>/Course-List#Profile">Course List</a></li>
				

                <li <?php if($includefile=='Gallery') { echo "class='resp-tab-active'"; } else { } ?>><a data-toggle="modal" data-target="#myModal_login" class="cursor">Gallery</a>

<div class="gallery-bg">
                    
                       <div id="main-slide" class="carousel slide" data-ride="carousel">

                           <!-- Carousel inner -->
                <div class="carousel-inner">
                <?php 

$gallery  = fetch('cmg_gallery',array('category' => 'images','UMID' => $UMIDSProfile['UMID']));
$activp=1;
if(sizeof($gallery)>=1)
{
foreach ($gallery as $galleryvalue) {
	if($activp==1) { $activse='active'; } else { $activse=''; }
?>


                
                    <div class="item <?=$activse;?>"><a data-toggle="modal" data-target="#myModal_login" class="cursor"><img src="<?=$domainname;?>image/gallery/<?php echo $galleryvalue['imag_video']; ?>" height="156" width="256"  alt="slider"></a></div>
                  <?php  $activp++;}  } else {  ?>
                    <div class="item active"><img src="<?=$domainname;?>image/gallery/demogallery.jpg" height="156" width="256"  alt="slider"></div>
                   <?php } ?>
                </div>
                <!-- Carousel inner end-->

                <!-- Controls -->
                <a class="left carousel-control" href="#main-slide" data-slide="prev">
                    <span><i class="fa fa-angle-left"></i></span>
                </a>
                <a class="right carousel-control" href="#main-slide" data-slide="next">
                    <span><i class="fa fa-angle-right"></i></span>
                </a>
            </div>
                    
                    
                    </div>
 </li>
               
<li <?php if($includefile=='Placement-Corner' || $includefile=='companies_tied_up' || $includefile=='student_placed') { echo "class='resp-tab-active'"; } else { } ?>><a data-toggle="modal" data-target="#myModal_login" class="cursor">Placement Corner</a></li>
              
              
				    <li <?php if($includefile=='Infrastructure') { echo "class='resp-tab-active'"; } else { } ?>><a data-toggle="modal" data-target="#myModal_login" class="cursor">Infrastructure</a></li>
				  
					<li <?php if($includefile=='More-about-Institute') { echo "class='resp-tab-active'"; } else { } ?>><a data-toggle="modal" data-target="#myModal_login" class="cursor">More about Institute</a></li>
				    <li <?php if($includefile=='Branch-List') { echo "class='resp-tab-active'"; } else { } ?>><a data-toggle="modal" data-target="#myModal_login" class="cursor">Branch List</a></li>
					
                  <li <?php if($includefile=='Coupon') { echo "class='resp-tab-active'"; } else { } ?>><a data-toggle="modal" data-target="#myModal_login" class="cursor">Coupon</a></li>
                  
                  
                  <div class="review" style="display:block">
                  
                  <?php              
						  $reviewsCOUNT  = num_rows('cmg_reviews',array('UMID' => $UMIDSProfile['UMID'],'status' => 1));
						  $reviewsF  = fetch('cmg_reviews',array('UMID' => $UMIDSProfile['UMID'],'status' => 1)); 
						  
						  ?>
						   <h4><a href="<?=$domainname;?>Trainer-Institue/Post/Profile/<?=$getprifilena[0];?>/Review#Profile" style="color:#FFFFFF"> Reviews (<?=$reviewsCOUNT;?>)</a></h4>
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
 <h4> <a href="<?=$domainname;?>Trainer-Institue/Post/Profile/<?=$getprifilena[0];?>/Review#Profile" style="color:#FFFFFF"> <br>View All Review</a> </h4>
 
						  </div>
						  
						          
                  
            </ul>
            
           
            <?php } ?>
            
            
            