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
					  
                      
                      <?php include('controller/editmenu.php'); ?>
                          
                          
                          <form action="" method="post" enctype="multipart/form-data">
                        <div class="mmformapart">
                      
                        
                           
                        
                             
                        
                         
                           <div class="col-sm-3 padiingmform mycolors">
     No Of Trainer Available
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
							 
                        <input type="text" class="form-control formw" name="no_of_trainer" pattern="[0-9]*" maxlength="8" min="0" required value="<?=$Infra_INfoFETCH['no_of_trainer'];?>")>
                        
                        </div>
						
						
						 
						  
                           
                        
                             
						
						 
                           <div class="col-sm-3 padiingmform mycolors">
            Accommodation if any
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
							 
                        <input type="text" class="form-control formw" required name="accommodation" value='<?=$Infra_INfoFETCH['accommodation'];?>' >
                        
                        </div>
						
						
						 
                           <div class="col-sm-3 padiingmform mycolors">
             Total Students Trained
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
							 
                        <input type="text" class="form-control formw" name="student_trained" pattern="[0-9]*" maxlength="8" min="0" value='<?=$Infra_INfoFETCH['student_trained'];?>'>
                        
                        </div>
						
						
						 
                           <div class="col-sm-3 padiingmform mycolors">
           Youtube Link
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
							 
                        <input type="text" class="form-control formw" name="tubelink" placeholder="eg: https://www.youtube.com/watch?v=Uvj827SqHak" value='<?=$Infra_INfoFETCH['tubelink'];?>' >
                        
                        </div>
						
						 
                           <div class="col-sm-3 padiingmform mycolors">
          Describe (vision, mission, about founder etc) 
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
			    <textarea type="text" class="form-control formw cmfta height100" name="description" placeholder="Mission, Visssion, About Institute/Trainer" required  > <?=$Infra_INfoFETCH['description'];?>
</textarea>
                        
                        </div>
						
						
					
						
						
						
						   <div class="col-sm-12 padiingmform" style="text-align:center">
							 
							 
<?php 

if($Infra_INfoC==1) {  ?>
                        <input type="submit" class="btn  btn-warning" name="trainerinfmracEDIT" value="Save Profile">
                        
                        <?php  } else  { ?> 
						
						
						    <input type="submit" class="btn  btn-warning" name="trainerinfra" value="Save Profile">
						
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