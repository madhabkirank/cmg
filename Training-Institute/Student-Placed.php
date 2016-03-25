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
					   
                     
					  
                      
                      <?php include('controller/placmentmenu.php'); ?>
                          
                          <form action="" method="post" enctype="multipart/form-data">
                        <div class="mmformapart">
                      
                        
                           
                        
                             
                        
                         
                           <div class="col-sm-3 padiingmform mycolors">
       Student Name
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
							 
                        <input type="text" class="form-control formw" name="studentname" required />
                        
                        </div>
                        
                                        <div class="col-sm-3 padiingmform mycolors">
       Company Name
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
							 
                        <input type="text" class="form-control formw" name="companyname" required />
                        
                        </div>
						
						
						 
						           
                      
						 
                           <div class="col-sm-3 padiingmform mycolors">
           Student Photo
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
					( height-60px and width-140px )		 
                        <input type="file" class="form-control formw" required name="clogo"  >
                        
                        </div>
						
						
						 
						
					
					                <div class="col-sm-3 padiingmform mycolors">
       Year of Placement
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
							 
                        <select  class="form-control formw" name="YOP" required />
                        
						   <?php for($i=1850;$i<=date('Y');$i++)
						 { ?>
                        <option  value="<?=$i;?>"><?=$i;?></option>
						
                        <?php } ?>
                          
                        
</select>
                        </div>
						
						 
                           
                        
                             
						
						 
						   <div class="col-sm-12 padiingmform" style="text-align:center">

                     
						
						    <input type="submit" class="btn  btn-warning" name="studentplaced" value="Save Profile">
						
                        
                        </div>
                           
                        
                        
						
                        
                         
                        
                        
                        </div>
						</form>
                        
                        
                        <div class="row" style="padding:20px;">
                        <?php 
foreach($StudentPlace_SQLFETCH as $studntplaces)
{
 ?>
 
 
      <div class="col-sm-3 branchesdiv" style="height:167px; width:147px; text-align:center;"  >
                        
                <p> <img src="<?=$UDS;?>image/company_logo/<?=$studntplaces['company_logo']; ?>" height="60" width="137"> </p>   
                 
                   
                   <p title='<?=$studntplaces['studentname']; ?>'>    <?php echo ucfirst(substr($studntplaces['studentname'], 0, 17));  ?></p>
  <p title='<?=$studntplaces['companyname']; ?>' > <?php echo ucfirst(substr($studntplaces['companyname'], 0, 17));  ?></p>  
                   <p >   <?=$studntplaces['YOP']; ?></p> 
                
              <a href="controller/Delete_SQL_All.php?studentplaceDDELETE=<?=$studntplaces['id']?>" onclick="return confirm('Are you sure you want to Remove?')"> <p class="btn  btn-warning delete">Delete It </p></a>
                     
                       
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