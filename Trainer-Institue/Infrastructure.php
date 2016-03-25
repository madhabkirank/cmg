             <div style="display:block">
            
      <div class="col-md-offset-1 col-md-10">
          </br>
        <h3>Infrastructure Facilities</h3>


 <?php
$value  = fetchsingle('cmg_trainer_moreinfo',array('UMID' => $UMIDSProfile['UMID']));
function avialabe($dataf)
{
if($dataf=='available')
{
echo '<i class="fa fa-check-square mycolorsnn"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
}
else {

echo '<i class="fa fa-times-circle mycolorsnn1"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
}
}
 ?>


<div class="mmformapart tab-txt">
                      
                        
                         
                           <div class="col-sm-3 padiingmform mycolors">
                       Labs
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
							 <?php avialabe($value['labs']); ?>
				
                        
                        </div>
                         
                                     
                           <div class="col-sm-3 padiingmform mycolors">
                    Online Training 
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 	 <?php avialabe($value['online_training']); ?>
					
                        
                        </div>
                        
                                        
                           <div class="col-sm-3 padiingmform mycolors">
                       Ground
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 	 <?php avialabe($value['grounds']); ?>
				
                        
                        </div>

      <div class="col-sm-3 padiingmform mycolors">
                   Sports Room 
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 	 <?php avialabe($value['sports_room']); ?>
			
                        
                        </div>
                         
                         
   <div class="col-sm-3 padiingmform mycolors">
                    Internet
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 	 <?php avialabe($value['wifi']); ?>
				
                        
                        </div>

                                   
   <div class="col-sm-3 padiingmform mycolors">
                       Drinking  Water
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 	 <?php avialabe($value['water']); ?>
					
                        
                        </div>
                         

                           <div class="col-sm-3 padiingmform mycolors">
                    Hostel Availability 
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 	 <?php avialabe($value['hotel_a']); ?>
				
                        
                        </div>
                         
                         
                         
                                    
                        
                         
                         
                         
                        
                         
                         
                         
                         
                                    
                           <div class="col-sm-3 padiingmform mycolors">
                    Canteen
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 	 <?php avialabe($value['canteen']); ?>
		
                        
                        </div>
                         
                         
                         
                                    
                           <div class="col-sm-3 padiingmform mycolors">
                     Parking Place 
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 	 <?php avialabe($value['parking_place']); ?>
				
                        
                        </div>
                         
                         
                         
                                    
                           <div class="col-sm-3 padiingmform mycolors">
                      Sick Rooms 
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 	 <?php avialabe($value['srooms']); ?>
				
                        
                        </div>
                         
                         
                         
                                    
                           <div class="col-sm-3 padiingmform mycolors">
                       Wash Rooms 
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 	 <?php avialabe($value['washrooms']); ?>
				
                        
                        </div>
                         
                         
                         
                                    
                        
                         
                         
                    
                         
                         
                                    
                     
                         
                         
                                    
                           <div class="col-sm-3 padiingmform mycolors">
                    Transport Options for Student 
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform minimumhe">
							 
 <?php if(!empty($value['dtos'])) { echo nl2br($value['dtos']); } else { echo "Sorry no information available from the trainer"; } ?> 	
                        
                        </div>
                         
                         
                         
                                    
                           <div class="col-sm-3 padiingmform mycolors">
                 Classrooms facility 
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform minimumhe">
							 
					 <?php if(!empty($value['dcf'])) { echo nl2br($value['dcf']); } else { echo "Sorry no information available from the trainer"; } ?> 		
                        
                        </div>
                         
                         
                         
                                    
                           <div class="col-sm-3 padiingmform mycolors">
                   Other Facility you offer 
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform minimumhe">
										 <?php if(!empty($value['dofo'])) { echo nl2br($value['dofo']); } else { echo "Sorry no information available from the trainer"; } ?> 			 
						
                        
                        </div>
                         
                         
                        
						
                        
                         
                        
                        
                        </div>


            



        </div>            
            

            
                </div><!--/Tab cointain 4 --> 
				
			