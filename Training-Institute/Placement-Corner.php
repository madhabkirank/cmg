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
					   
                     
					  
                      
                      <?php include('controller/placmentmenu.php'); ?>
                          
                          <form action="" method="post" enctype="multipart/form-data">
                        <div class="mmformapart">
                      
                        
                               <div class="col-sm-3 padiingmform mycolors">
               Placement Support
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 <div class="top-margin">
											<div class="radio" style=" margin-top: -3px;" >
										<?php if ($PlacmentCorner_SQLFETCH['placment_support']=='Yes') { $checkedPS='checked'; }  else  { $checkedPS1='checked'; }?>
											  <label>
<input type="radio" name="placment_support" value="Yes"  <?=$checkedPS;?> >Yes <span class="inner"></span>   </label>
										 </div>
										 	<div class="radio">
										   <label>
<input type="radio" name="placment_support" value="No" <?=$checkedPS1;?>  > No  <span class="inner"></span>    </label>
											
                                          </div>
                                         </div>
						
                        
                        </div>
                        
                             
                        
                         
                           <div class="col-sm-3 padiingmform mycolors">
    Plcement Support Description
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
							 
                   <textarea type="text" class="form-control formw cmfta" name="plcement_description"> <?=$PlacmentCorner_SQLFETCH['plcement_description'];?> </textarea>
                        
                        </div>
						
						
						 
						           
                      
						 
                           <div class="col-sm-3 padiingmform mycolors">
       No. of Student of Placed till date
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
							 
                        <input type="text" pattern="[0-9]*" maxlength="8" min="0" class="form-control formw" name="totalYNS" value="<?=$PlacmentCorner_SQLFETCH['totalYNS'];?>"  >
                        
                        </div>
                        
                         <div style="height:10px; width:100%; float:left;"></div>
                           <div class="col-sm-3 padiingmform mycolors">
       No. of Student of Placed This Years
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
							 
                        <input type="text"   class="form-control formw" pattern="[0-9]*" maxlength="8" min="0" name="thisYNS"  value="<?=$PlacmentCorner_SQLFETCH['thisYNS'];?>"  >
						
						

                        </div>
						
						
						 
						
					
					
						
						 
                           
                        
                             
						
						 
						   <div class="col-sm-12 padiingmform" style="text-align:center">

                     <?php 

if($PlacmentCorner_SQLFC==1) {  ?>
                       	    <input type="submit" class="btn  btn-warning" name="placemnt-corner-EDIT" value="Save Placement">
                        
                        <?php  } else  { ?> 
						
						
								    <input type="submit" class="btn  btn-warning" name="placemnt-corner-submit" value="Save Placement">
						
						<?php  } ?>
						
			
						
                        
                        </div>
                           
                        
                        
						
                        
                         
                        
                        
                        </div>
						</form>
                        
                        
                        
                        
                        
                        
						</div>		
						</div>				
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#services-->

<?php include("../controller/footer.php"); ?>