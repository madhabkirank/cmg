<?php ob_start();
 $UDS='../';  $M2='a'; echo '<input type="hidden" value="../" class="UID">';
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
       Company Name
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
							 
                        <input type="text" class="form-control formw" name="company_name" required />
                        
                        </div>
						
						
						 
						           
                      
						 
                           <div class="col-sm-3 padiingmform mycolors">
           Company Logo
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
						( height-60px and width-140px )	 
                        <input type="file" class="form-control formw" required name="clogo" required  >
                        
                        </div>
						
						
						 
						
					
					
						
						 
                           
                        
                             
						
						 
						   <div class="col-sm-12 padiingmform" style="text-align:center">

                     
						
						    <input type="submit" class="btn  btn-warning" name="companymtieup_submit" value="Save Company">
						
                        
                        </div>
                           
                        
                        
						
                        
                         
                        
                        
                        </div>
						</form>
                        
                        
                        <div class="row" style="padding:20px;">
                        <?php 
foreach($Commpanytie_SQLFETCH as $Commpanytie)
{
 ?>
 
 
     <div class="col-sm-3 branchesdiv" style="height:147px; width:147px; text-align:center;"  >
                        
                 <p style="font-weight:bold;" title="<?=$Commpanytie['company_name']?>"> <?php echo ucfirst(substr($Commpanytie['company_name'], 0, 17));  ?></p>    
                 
                  <p> <img src="<?=$UDS;?>image/company_logo/<?=$Commpanytie['company_logo']; ?>" height="60" width="137"> </p>    
                
              <a href="controller/Delete_SQL_All.php?compnayDDELETE=<?=$Commpanytie['id']?>" onclick="return confirm('Are you sure you want to Remove?')"> <p class="btn  btn-warning delete">Delete It </p></a>
                     
                       
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

<?php include("controller/footer.php"); ?>