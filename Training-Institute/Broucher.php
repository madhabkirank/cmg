<?php ob_start();
 $UDS='../';  $M3='a'; echo '<input type="hidden" value="../" class="UID">';
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
			  	      $galleryimages  = fetchASC('cmg_gallery',array('UMID' => $_SESSION['UMID'],'category' => 'Broucher')); 
	  	$galleryimagesC  = num_rows('cmg_gallery',array('UMID' => $_SESSION['UMID'],'category' =>'Broucher'));
			   ?>
                          
                          <form action="" method="post" enctype="multipart/form-data">
                        <div class="mmformapart">
                      
                        
                               
                        	  <input type="hidden" value="Broucher" name="category"   > 
                             
                        
                             
                        
                         
                           <div class="col-sm-3 padiingmform mycolors">
   Broucher Upload
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
						<div style="position:relative;">
                                        <a class='btn btn-primary' href='javascript:;'>
                                            CHOOSE PDF FILE
                                            <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="galleryimages" size="40" required   onchange='$("#upload-file-info").html($(this).val());'>
                                        </a>
                                        &nbsp;
                                        <span  id="upload-file-info"></span>
                                </div>
							 
                 
                        
                        </div>
						
						
						 
						           
                      
						 
                           <div class="col-sm-3 padiingmform mycolors">
      Description
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
				  <textarea type="text" class="form-control formw cmfta" name="g_description"> </textarea>
                        
                        </div>
                        
                      
                             
						
						
						 
						
					
					
						
						 
                           
                        
                             
						
						 
						   <div class="col-sm-12 padiingmform" style="text-align:center">

                 
						
						
					
						<?php if($galleryimagesC>=1) { ?>
						
								  You can upload 1 no. of Broucher 
						
			
						
			<?php } else { ?>
							    <input type="hidden" class="myurl" name="Broucher">
                                <input type="submit" class="btn  btn-warning" name="broucher-submit" value="Upload Broucher"><?php } ?>
						
			
						
			
						
                        
                        </div>
                           
                        
                        
						
                        
                         
                        
                        
                        </div>
						</form>
                        
                        <div class="row" style="padding:20px;">
                        <?php 
	
	    foreach ($galleryimages  as  $galleryimagesF) {
 ?>
 
 
     <div class="col-sm-3 branchesdiv" style="height:80px;"  >
                        
                 <p style="font-weight:bold;" class="btn  btn-warning" style="margin:auto;"> <a href="<?=$domainname;?>image/gallery/<?=$galleryimagesF['imag_video']; ?>" style="color:#000000" download>Click to Check </a></p> <p></p>   
                 
                   
              <a href="controller/Delete_SQL_All.php?gallerydelte2=<?=$galleryimagesF['id']?>" onclick="return confirm('Are you sure you want to Remove?')"> <p class="btn  btn-warning delete">Delete It </p></a>
                     
                       
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