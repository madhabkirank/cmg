<?php ob_start();
 $UDS='../';  $M1='a'; echo '<input type="hidden" value="../" class="UID">';
include("../controller/header.php"); 
include('Institute_Session.php');
include("controller/insert_SQL_Controller.php"); 
?>

    <section id="services" class="service-item">   
	   <div class="container">   
            <div class="row" > 
                
			<?php include('controller/trainer_leftpart.php'); ?>
				   
				   
				   

		   <div class="col-md-9 col-sm-12">
				      <div class="search-right">
					   
                 
					  
                      
                      <?php include('controller/gallarey_meu.php');
					  
					    $galleryimages  = fetchASC('cmg_gallery',array('UMID' => $_SESSION['UMID'],'category' => 'Images')); 
	  	$galleryimagesC  = num_rows('cmg_gallery',array('UMID' => $_SESSION['UMID'],'category' =>'Images'));
					   ?>
                          
                          <form action="" method="post" enctype="multipart/form-data">
                        <div class="mmformapart">
                      
                        
                               
                        	  <input type="hidden" value="Images" name="category"   > 
                             
                        
                             
                        
                         
                           <div class="col-sm-3 padiingmform mycolors">
   Images Upload 
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
						<div style="position:relative;">
                                        <a class='btn btn-primary' href='javascript:;'>
                                            CHOOSE A FILE
                                            <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="galleryimages" size="40" required  onchange='$("#upload-file-info").html($(this).val());'>
                                        </a>
                                        &nbsp;
                                        <span  id="upload-file-info"></span>
                                </div>
							 
                 
                        
                        </div>
						
						
						 
						           
                      
						 
                           <div class="col-sm-3 padiingmform mycolors">
      Description
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
				  <textarea type="text" class="form-control formw cmfta" name="g_description" placeholder="Description should not be more than 150 characters"></textarea>
                        
                        </div>
                        
                      
                             
						
						
						 
						
					
					
						
						 
                           
                        
                             
						
						 
						   <div class="col-sm-12 padiingmform" style="text-align:center">

                 
						<?php if($galleryimagesC>=10) { ?>
						
								  You can upload 10 no. of Images 
						
			
						
			<?php } else { ?>
								    <input type="hidden" class="myurl" name="Gallery">
    <input type="submit" class="btn  btn-warning" name="gallery-submit" value="Upload Images"><?php } ?>
                        
                        </div>
                           
                        
                        
						
                        
                         
                        
                        
                        </div>
						</form>
                        
                        
                        
                        <div class="row" style="padding:20px;">
                        <?php 
	
	    foreach ($galleryimages  as  $galleryimagesF) {
 ?>
 
 
     <div class="col-sm-3 branchesdiv" style="height:195px;"  >
                        
                 <p style="font-weight:bold;"> <img src="<?=$domainname;?>image/gallery/<?=$galleryimagesF['imag_video']; ?>" height="150" width="230"  ></p>    
                 
                   
              <a href="controller/Delete_SQL_All.php?gallerydelte=<?=$galleryimagesF['id']?>" onclick="return confirm('Are you sure you want to Remove?')"> <p class="btn  btn-warning delete">Delete It </p></a>
                     
                       
                       </div>
 <?php

}


 ?>
                        
                    
                        
                         
               
                        
                        </div>
                        
                        
						</div>		
						</div>				
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#services-->

<?php include("../controller/footer.php"); ?>