<?php ob_start();
 $UDS='../';  $M2='a'; echo '<input type="hidden" value="../" class="UID">';
include("../controller/header.php"); 
include('Institute_Session.php');
include("controller/insert_SQL_Controller.php"); 
?>
<style>
.radio {  width: 115px;}</style>
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
                       Placement
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 <div class="top-margin">
											<div class="radio" style=" margin-top: -3px;" >
											<?php if ($MoreInfo_INFETCH['placement']=='available') { $checkedlab='checked'; }  else  { $checkedlab1='checked'; }?>
											  <label>
<input type="radio" name="placement" value="available"  <?=$checkedlab?> >Available <span class="inner"></span>   </label>
										 </div>
										 	<div class="radio">
										   <label>
<input type="radio" name="placement" value="notavailable" <?=$checkedlab1?> > Not Available  <span class="inner"></span>    </label>
											
                                          </div>
                                         </div>
						
                        
                        </div>
                        
                        
                           <div class="col-sm-3 padiingmform mycolors">
                       Labs
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 <div class="top-margin">
											<div class="radio" style=" margin-top: -3px;" >
											<?php if ($MoreInfo_INFETCH['labs']=='available') { $checkedlab='checked'; }  else  { $checkedlab1='checked'; }?>
											  <label>
<input type="radio" name="labs" value="available"  <?=$checkedlab?> >Available <span class="inner"></span>   </label>
										 </div>
										 	<div class="radio">
										   <label>
<input type="radio" name="labs" class="selectclientAPI" value="notavailable" <?=$checkedlab1?> > Not Available  <span class="inner"></span>    </label>
											
                                          </div>
                                         </div>
						
                        
                        </div>
                        
                         
                         
                         
                            <div class="col-sm-3 padiingmform mycolors">
                     Hostel Availability
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 <div class="top-margin">
											<div class="radio" style=" margin-top: -3px;" >
											<?php if ($MoreInfo_INFETCH['hotel_a']=='available') { $checkedha='checked'; }  else  { $checkedha1='checked'; }?>
											  <label>
<input type="radio" name="hotel_a" value="available"  <?=$checkedha?> >Available <span class="inner"></span>   </label>
										 </div>
										 	<div class="radio">
										   <label>
<input type="radio" name="hotel_a" class="selectclientAPI" value="notavailable" <?=$checkedha1?> > Not Available  <span class="inner"></span>    </label>
											
                                          </div>
                                         </div>
						
                        
                        </div>
                        
                        
                           <div class="col-sm-3 padiingmform mycolors">
                       Internet
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 <div class="top-margin">
											<div class="radio" style=" margin-top: -3px;" >
											<?php if ($MoreInfo_INFETCH['wifi']=='available') { $checkedwifi='checked'; }  else  { $checkedwifi1='checked'; }?>
											  <label>
<input type="radio" name="wifi" value="available"  <?=$checkedwifi?> >Available <span class="inner"></span>   </label>
										 </div>
										 	<div class="radio">
										   <label>
<input type="radio" name="wifi"  value="notavailable" <?=$checkedwifi1?> > Not Available  <span class="inner"></span>    </label>
											
                                          </div>
                                         </div>
						
                        
                        </div>
                        
                        
                        
                           <div class="col-sm-3 padiingmform mycolors">
                   Online Training
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 <div class="top-margin">
											<div class="radio" style=" margin-top: -3px;" >
											<?php if ($MoreInfo_INFETCH['online_training']=='available') { $checkedit='checked'; }  else  { $checkedit1='checked'; }?>
											  <label>
<input type="radio" name="online_training" value="available"  <?=$checkedit?> >Available <span class="inner"></span>   </label>
										 </div>
										 	<div class="radio">
										   <label>
<input type="radio" name="online_training" value="notavailable" <?=$checkedit1?> > Not Available  <span class="inner"></span>    </label>
											
                                          </div>
                                         </div>
						
                        
                        </div>
                        
                        
                        
                        
                           <div class="col-sm-3 padiingmform mycolors">
                      Canteen
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 <div class="top-margin">
											<div class="radio" style=" margin-top: -3px;" >
											<?php if ($MoreInfo_INFETCH['canteen']=='available') { $checkedca='checked'; }  else  { $checkedca1='checked'; }?>
											  <label>
<input type="radio" name="canteen" value="available"  <?=$checkedca?> >Available <span class="inner"></span>   </label>
										 </div>
										 	<div class="radio">
										   <label>
<input type="radio" name="canteen"  value="notavailable" <?=$checkedca1?> > Not Available  <span class="inner"></span>    </label>
											
                                          </div>
                                         </div>
						
                        
                        </div>
                        
                        
                        
                        
                        
                        
                           
                        
                        
                           <div class="col-sm-3 padiingmform mycolors">
                       Parking Place
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 <div class="top-margin">
											<div class="radio" style=" margin-top: -3px;" >
											<?php if ($MoreInfo_INFETCH['parking_place']=='available') { $checkedpp='checked'; }  else  { $checkedpp1='checked'; }?>
											  <label>
<input type="radio" name="parking_place" value="available"  <?=$checkedpp?> >Available <span class="inner"></span>   </label>
										 </div>
										 	<div class="radio">
										   <label>
<input type="radio" name="parking_place" class="selectclientAPI" value="notavailable" <?=$checkedpp1?> > Not Available  <span class="inner"></span>    </label>
											
                                          </div>
                                         </div>
						
                        
                        </div>
                        
                        
                        
                        
                        
                        
                           <div class="col-sm-3 padiingmform mycolors">
                       Sick Rooms
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 <div class="top-margin">
											<div class="radio" style=" margin-top: -3px;" >
											<?php if ($MoreInfo_INFETCH['srooms']=='available') { $checkedsr='checked'; }  else  { $checkedsr1='checked'; }?>
											  <label>
<input type="radio" name="srooms" value="available"  <?=$checkedsr?> >Available <span class="inner"></span>   </label>
										 </div>
										 	<div class="radio">
										   <label>
<input type="radio" name="srooms" value="notavailable" <?=$checkedsr1?> > Not Available  <span class="inner"></span>    </label>
											
                                          </div>
                                         </div>
						
                        
                        </div>
                        
                        
                        
                        
                        
                           <div class="col-sm-3 padiingmform mycolors">
                       Wash Rooms
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 <div class="top-margin">
											<div class="radio" style=" margin-top: -3px;" >
											<?php if ($MoreInfo_INFETCH['washrooms']=='available') { $checkedwr='checked'; }  else  { $checkedwr1='checked'; }?>
											  <label>
<input type="radio" name="washrooms" value="available"  <?=$checkedwr?> >Available <span class="inner"></span>   </label>
										 </div>
										 	<div class="radio">
										   <label>
<input type="radio" name="washrooms"  value="notavailable" <?=$checkedwr1?> > Not Available  <span class="inner"></span>    </label>
											
                                          </div>
                                         </div>
						
                        
                        </div>
                        
                        
                        
                        
                        
                           <div class="col-sm-3 padiingmform mycolors">
                      Drinking  Water
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 <div class="top-margin">
											<div class="radio" style=" margin-top: -3px;" >
											<?php if ($MoreInfo_INFETCH['water']=='available') { $checkedW='checked'; }  else  { $checkedW1='checked'; }?>
											  <label>
<input type="radio" name="water" value="available"  <?=$checkedW?> >Available <span class="inner"></span>   </label>
										 </div>
										 	<div class="radio">
										   <label>
<input type="radio" name="water" value="notavailable" <?=$checkedW1?> > Not Available  <span class="inner"></span>    </label>
											
                                          </div>
                                         </div>
						
                        
                        </div>
                        
                        
                        
                        
                        
                        
                           <div class="col-sm-3 padiingmform mycolors">
                       Ground
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 <div class="top-margin">
											<div class="radio" style=" margin-top: -3px;" >
											<?php if ($MoreInfo_INFETCH['grounds']=='available') { $checkedgr='checked'; }  else  { $checkedgr1='checked'; }?>
											  <label>
<input type="radio" name="grounds" value="available"  <?=$checkedgr?> >Available <span class="inner"></span>   </label>
										 </div>
										 	<div class="radio">
										   <label>
<input type="radio" name="grounds"  value="notavailable" <?=$checkedgr1?> > Not Available  <span class="inner"></span>    </label>
											
                                          </div>
                                         </div>
						
                        
                        </div>
                        
                        
                        
                           <div class="col-sm-3 padiingmform mycolors">
                      Sports Room
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 <div class="top-margin">
											<div class="radio" style=" margin-top: -3px;" >
											<?php if ($MoreInfo_INFETCH['sports_room']=='available') { $checkedsr='checked'; }  else  { $checkedsr1='checked'; }?>
											  <label>
<input type="radio" name="sports_room" value="available"  <?=$checkedsr?> >Available <span class="inner"></span>   </label>
										 </div>
										 	<div class="radio">
										   <label>
<input type="radio" name="sports_room" value="notavailable" <?=$checkedsr1?> > Not Available  <span class="inner"></span>    </label>
											
                                          </div>
                                         </div>
						
                        
                        </div>
                        
                        
                        
                        
                        
                        
                        
						 
                           <div class="col-sm-3 padiingmform mycolors">
               Description Transport Options for Student
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
							 
                        <textarea type="text" class="form-control formw cmfta" name="dtos"><?=$MoreInfo_INFETCH['dtos'];?></textarea>
                        
                        </div>
                        
                        
                        
                        
                           <div class="col-sm-3 padiingmform mycolors">
               Description Classrooms facility
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
							 
                        <textarea type="text" class="form-control formw cmfta" name="dcf"><?=$MoreInfo_INFETCH['dcf'];?></textarea>
                        
                        </div>
                        
                        
                        
                           <div class="col-sm-3 padiingmform mycolors">
               Description Other Facility you offer
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
							 
                        <textarea type="text" class="form-control formw cmfta" name="dofo"><?=$MoreInfo_INFETCH['dofo'];?></textarea>
                        
                        </div>
						
						   <div class="col-sm-12 padiingmform" style="text-align:center">
							 
							 
<?php 

if($MOReinfo_INfoC==1) {  ?>
                        <input type="submit" class="btn  btn-warning" name="trainermoreinfoEDIT" value="Save Profile">
                        
                        <?php  } else  { ?> 
						
						
						    <input type="submit" class="btn  btn-warning" name="trainermoreinfo" value="Save Profile">
						
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