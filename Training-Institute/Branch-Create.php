<?php ob_start();
 $UDS='../';  $M4='a'; echo '<input type="hidden" value="../" class="UID">';
include("../controller/header.php"); 
include('Institute_Session.php');
include("controller/insert_SQL_Controller.php"); 
?>
<style>
    p { max-height: 42px;
    overflow: hidden;
}
</style>
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
       Branch Name
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
							 
                        <input type="text" class="form-control formw" name="barnchname" required />
                        
                        </div>
						
						
						 
						           
                      
						 
                           <div class="col-sm-3 padiingmform mycolors">
                Phone No.
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
							 
                        <input type="text" class="form-control formw" required pattern="[0-9]*" maxlength="13" minlength="10" name="phone"  >
                        
                        </div>
						
						
						 
						
						 
                           <div class="col-sm-3 padiingmform mycolors">
               Email 
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
							 
                        <input type="email" class="form-control formw" name="email" required  >
                        
                        </div>
						
						
					
						
						
                        
                           
						
					
						
						 
                         						
						
						 
                           <div class="col-sm-3 padiingmform mycolors">
                 Country
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
							 
                        <select  class="form-control formw countryselect" name="country" required>
                        
                          <option>Select Country</option>
                         <?php
					
					$result  = fetchASCORD('cmg_country',array('status' => 1),'country');
foreach ($result as $value) { ?>
                    <option value="<?=$value['id'];?>"><?=$value['country'];?></option>
                    
                    
                    <?php  } ?>
                        
                        
                         <?php if(!empty($BAsic_INFETCH['country'])){ 
						 
						 $result11  = fetchsingle('cmg_country',array('id' => $BAsic_INFETCH['country']));
						 echo '	<option selected style="display:none" value="'.$result11['id'].'">'.$result11['country'].'</option>';
						} ?>
                        </select>
                        
                        </div>
						
						 <div class="col-sm-3 padiingmform mycolors ">
             State
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
							 
                        <select  class="form-control formw  show_state" name="state">
                        
                      
                        <option>Select State</option>
                        
                         
                        </select>
(To change state select country first)
                        
                        </div>
                        
                           <div class="col-sm-3 padiingmform mycolors">
                City

                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
							 
                  <select  class="form-control formw show_city" name="city">
        
         <option value='nocity'>Select City</option>
                  
                
                  </select>
                        (To change city select country first)
                        </div>
						
						 
                            <div class="col-sm-3 padiingmform mycolors">
             Enter City Name

                        
                        </div>

                          <div class="col-sm-9 padiingmform">
							 
			  <strong>( If City not in list ) </strong>
                        <input type="text" class="form-control formw" name="rcity" >
                        </div>

                        	  <div class="col-sm-3 padiingmform mycolors">
                  Location 
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
							 
                        <input type="text" class="form-control formw takevlaueAUTO1" autocomplete="off" name="location"  >
                        <div class="nsearch1 stateshwo"> </div>
(To change location select country first)
                        </div>


 <div class="col-sm-3 padiingmform mycolors">
                  Enter Location 
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
					( If Location not in list )	 
                        <input type="text" class="form-control formw"  name="location"  >
                      
                        </div>


		 
                           <div class="col-sm-3 padiingmform mycolors">
                 Address
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
			    <textarea type="text" class="form-control formw cmfta" name="address" required    ></textarea>
                        
                        </div>
				     
						
						 
                           <div class="col-sm-3 padiingmform mycolors">
                 Enter Pin code
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
							 
                        <input type="text" class="form-control formw" pattern="[0-9]*" maxlength="6" min="5" name="pin" required     >
                        
                        </div>
						
						 
						   <div class="col-sm-12 padiingmform" style="text-align:center">

                     
						
						    <input type="submit" class="btn  btn-warning" name="trainerBranches" value="Save Branch">
						
                        
                        </div>
                           
                        
                        
						
                        
                         
                        
                        
                        </div>
						</form>
                        
                        
                        <div class="row" style="padding:20px;">
                        <?php 
foreach($TBranches_SQLFETCH as $branchesT)
{
 ?>
 
 
     <div class="col-sm-3 branchesdiv"  >
                     <div class="newbranchlist" style="height:280px;">   
                 <p style="font-weight:bold;" title="<?=$branchesT['barnchname'];?>"> <?php echo ucfirst(substr($branchesT['barnchname'], 0, 25));  ?> </p>    
                 
                  <p> <i class="fa fa-map-signs"></i> <?=$branchesT['address']; ?></p>    
                  
                   <p >  <i class="fa fa-map-marker"></i> <?=$branchesT['location']; ?></p> 
                                  
                    
                     <p >  <i class="fa fa-map-marker"></i> <?=$branchesT['city']; ?></p> 
<p > 
 <?php $dataMain  = fetchsingle('cm_state',array('id' => $branchesT['state'])); echo $dataMain['state']; ?></p>
 <p > <?php $dataMain1  = fetchsingle('cmg_country',array('id' => $branchesT['country'])); echo $dataMain1['country']; ?></p>

                     
                      <p >  <i class="fa fa-envelope"></i> <?=$branchesT['email']; ?></p>
                        <p > <i class="fa fa-phone"></i> <?=$branchesT['phone']; ?></p>  
                          <p style="display:none" > <i class="fa fa-map-marker"></i> <?=$branchesT['country']; ?></p> 


 </div>
              <a href="controller/Delete_SQL_All.php?branchesIDDELETE=<?=$branchesT['id']?>" onclick="return confirm('Are you sure you want to Remove?')"> <p class="btn  btn-warning delete">Delete It </p></a>
                     
                       
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