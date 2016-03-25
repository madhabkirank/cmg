<?php ob_start();
 $UDS='../';  $M2='a'; echo '<input type="hidden" value="../" class="UID">';
include("../controller/header.php"); 
include('Institute_Session.php');
include("controller/insert_SQL_Controller.php"); 
?>
<link rel="stylesheet" type="text/css" href="<?=$domainname;?>css/easy-responsive-tabs.css " />
<script src="<?=$domainname;?>js/easyResponsiveTabs.js"></script>
    <section id="services" class="service-item">   
	   <div class="container">   
            <div class="row" > 
                
			<?php include('controller/trainer_leftpart.php'); ?>
				   
				   
				   

		   <div class="col-md-9 col-sm-12">
				      <div class="search-right">
					   
                     
					  
                      
                      <?php include('controller/gallarey_meu.php');
					  
					      $galleryimages  = fetchASC('cmg_gallery',array('UMID' => $_SESSION['UMID'],'category' => 'Video')); 
	  	$galleryimagesC  = num_rows('cmg_gallery',array('UMID' => $_SESSION['UMID'],'category' =>'Video'));
					   ?>
                          
                          <form action="" method="post" enctype="multipart/form-data">
                        <div class="mmformapart">
                      
                        
                               
                        	  <input type="hidden" value="Video" name="category"   > 
                             
                        
                             
                        
                         
                           <div class="col-sm-3 padiingmform mycolors">
   Youtube Video Link
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
						
							 <input type="text" class="form-control formw" name="youtube_link" required  >
                 
                        
                        </div>
						
						
						 
						           
                      
						 
                           <div class="col-sm-3 padiingmform mycolors">
      Description
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
				  <textarea type="text" class="form-control formw cmfta" name="g_description" placeholder="Description should not be more than 150 characters"></textarea>
                        
                        </div>
                        
                      
                             
						
						
						 
						
					
					
						
						 
                           
                        
                             
						
						 
						   <div class="col-sm-12 padiingmform" style="text-align:center">

                 
						
						
								 
						
			
						<?php if($galleryimagesC>=10) { ?>
						
								  You can upload 10 no. of Video 
						
			
						
			<?php } else { ?>
							    <input type="hidden" class="myurl" name="Gallery_Video">
                                <input type="submit" class="btn  btn-warning" name="gallery-submit" value="Upload Video"><?php } ?>
                        
                        </div>
                           
			
						
                        
              
                           
                        
                        
						
                        
                         
                        
                        
                        </div>
						</form>
                        
                        
                        <div class="row" style="padding:20px;">
                      
                        
                    
                    <?php 
 $result  = fetchASC('cmg_gallery',array('UMID' => $_SESSION['UMID'],'category' => 'Video')); 
foreach ($result as $value) {
$explodvID=end(explode('/',$value['imag_video']));
if($value['imag_video']!=1)
{

?>
 <div class="col-sm-3 branchesdiv" style="height:195px;"  >

<a href="<?=$domainname;?>image/gallery/<?php echo $value['imag_video']; ?>" data-toggle="lightbox" data-gallery="youtubevideos" data-title="Gallery Videos" data-footer="<?php echo $value['g_description'];?>" >
<img src="http://img.youtube.com/vi/<?=$explodvID;?>/0.jpg"  style='height: 160px; width: 226px;'>
</a>

                 
                   
              <a href="controller/Delete_SQL_All.php?gallerydelte1=<?=$value['id']?>" onclick="return confirm('Are you sure you want to Remove?')"> <p class="btn  btn-warning delete">Delete It </p></a>
                     
                       
                       </div>

<?php } } ?>    
                         
               
                        
                        </div>
                        
                        
                        
						</div>		
						</div>				
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#services-->

<?php include("../controller/footer.php"); ?>