<?php ob_start();
 $UDS='../'; echo '<input type="hidden" value="../" class="UID"'; $M1='a';
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
                Name *
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
							 
                        <input type="text" class="form-control formw"  readonly name="phone" value='<?=$_SESSION['username'];?>' >
                        
                        </div>
                        
                             <div class="col-sm-3 padiingmform mycolors">
                Email *
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
							 
                        <input type="text" class="form-control formw"  readonly name="phone" value='<?=$_SESSION['email'];?>' >
                        
                        </div>
                      
                        
                           <div class="col-sm-3 padiingmform mycolors">
                       I am *
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 <div class="top-margin">
											<div class="radio" style=" margin-top: -3px;" >
											<?php if ($BAsic_INFETCH['membertype']=='Institute') { $checked='checked'; }  else  { $checked1='checked'; }?>
											  <label>
<input type="radio" name="membertype" value="Trainer"  <?=$checked1?> >Trainer <span class="inner"></span>   </label>
										 </div>
										 	<div class="radio">
										   <label>
<input type="radio" name="membertype" class="selectclientAPI" value="Institute" <?=$checked?> > Institute  <span class="inner"></span>    </label>
											
                                          </div>
                                         </div>
						
                        
                        </div>
                        
                         
                           <div class="col-sm-3 padiingmform mycolors">
       Institute / Trainer Name *
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
							 
                        <input type="text" class="form-control formw" name="instituename" required value="<?=$BAsic_INFETCH['instituename'];?>")>
                        
                        </div>
						
						   <?php if(!empty($uploadimgaes['u_url'])) 
							 {
							 ?>
						
						   <div class="col-sm-3 padiingmform mycolors">
      Your Profile URL *
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
							
                    <a href="<?=$domainname."Trainer-Institue/Post/Profile/".$uploadimgaes['u_url']."/"?>" target="_blank"><?=$domainname."Trainer-Institue/Post/Profile/".$uploadimgaes['u_url']."/"?></a>
						  </div>
						
						<?php } else { ?>
						
						
						
						
						   <div class="col-sm-3 padiingmform mycolors">
       Profile URL <br>
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
						<input type="text" class="form-control formw urlname" autocomplete="off" name="urlname" placeholder='Your unique name ( Don`t Use space' required >
<span class="showurlhere"></span>
( Once entered cannot be changed ) <br>
						eg: http://coachmemguru.com/Trainer-Institue/yourname
						  </div>
						<?php } ?>
                        
                      						
						
						 
						  
                           <div class="col-sm-3 padiingmform mycolors">
             Year of Establishment * 
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
							 
                        <select type="text" class="form-control formw" name="yoe" required  > 
                        
                         <?php for($i=1850;$i<=date('Y');$i++)
						 { ?>
                        <option  value="<?=$i;?>"><?=$i;?></option>
						
                        <?php } ?>
                        
                        
                        <?php if(!empty($BAsic_INFETCH['yoe'])){ 
						 echo '	<option selected value="'.$BAsic_INFETCH['yoe'].'">'.$BAsic_INFETCH['yoe'].'</option>';
						} ?>
                        </select>
                        
                        </div>
						
						 
                           <div class="col-sm-3 padiingmform mycolors">
                Phone No. *
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
							 
                        <input type="text" class="form-control formw myphonecheck" required pattern="[0-9]*" maxlength="13" minlength="10" name="phone" value='<?=$BAsic_INFETCH['phone'];?>' >
                        
                        </div>
						
						
						 
                           <div class="col-sm-3 padiingmform mycolors">
               Alt. Mobile No.
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
							 
                        <input type="text" class="form-control formw" name="altphonme"  pattern="[0-9]*" maxlength="13" minlength="10" value='<?=$BAsic_INFETCH['altphonme'];?>'>
                        
                        </div>
						
						
						 
                           <div class="col-sm-3 padiingmform mycolors">
                Business Email *
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
							 
                        <input type="email" class="form-control formw" name="email" required value='<?=$BAsic_INFETCH['email'];?>' >
                        
                        </div>
						
						
						 
                           <div class="col-sm-3 padiingmform mycolors">
             Website
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
							 
                        <input type="url" class="form-control formw"  name="website" placeholder="http://example.com" value='<?=$BAsic_INFETCH['website'];?>' onblur="checkURL(this)" >
                        
                        </div>
						
						 
                           <div class="col-sm-3 padiingmform mycolors">
              Time
                        
                        </div>
                        
                             <div class="col-sm-3 padiingmform">
							 <?php $timeday=explode(' ',$BAsic_INFETCH['time_day']); if(!empty($BAsic_INFETCH['time_day'])) { $selected='selected'; } ?>
							 
                        <select  class="form-control formw1" name="time1">
                        
                         <?php for($i=1;$i<13;$i++)
						 { ?>
                        <option value="<?=$i;?>" ><?=$i;?></option>
                        
                        <?php } ?>

                        
                        <option <?=$selected; ?>value="<?=$timeday[0];?>"><?=$timeday[0];?></option>
                        
                        
                        </select>
                        <select  class="form-control formw1" name="time2">
                        
                        <option value="AM">AM</option>
<option value="PM">PM</option>
                     <option <?=$selected; ?> value="<?=$timeday[1];?>"><?=$timeday[1];?></option>
                        </select>
                        </div>
                        
                               <div class="mycolorsnew">TO</div>
                           <div class="col-sm-3 padiingmform">
							 
							 
                       <select  class="form-control formw1" name="time3">   
                       
                       
                         <?php for($i=1;$i<13;$i++)
						 { ?>
                        <option value="<?=$i;?>" ><?=$i;?></option>
                        
                        <?php } ?>
                       
                       <option  <?=$selected; ?> value="<?=$timeday[2];?>"><?=$timeday[2];?></option>
                       
                    
                       
                       </select>
                       <select  class="form-control formw1" name="time4">    
                        <option value="AM">AM</option><option value="PM">PM</option><option  <?=$selected; ?> value="<?=$timeday[3];?>"><?=$timeday[3];?></option>
                    
                 
                   </select>
                        
                        </div>
                        
                        
                           
						
			
						
						
						 
                         						 
                           <div class="col-sm-3 padiingmform mycolors">
                 Country *
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
							 
                        <select  class="form-control formw countryselect" name="country" required>
                        
                          <option>Select Country</option>
                         <?php
					
					$result  = fetchASCORD('cmg_country',array('status' => '1'),'country');
foreach ($result as $value) { ?>
                    <option value="<?=$value['id'];?>"><?=$value['country'];?></option>
                    
                    
                    <?php  } ?>
                        
                        
                         <?php if(!empty($BAsic_INFETCH['country'])){ 
						 
						 $result11  = fetchsingle('cmg_country',array('id' => $BAsic_INFETCH['country']));
						 echo '	<option selected style="display:none;" value="'.$result11['id'].'">'.$result11['country'].'</option>';
						} ?>
                        </select>
                        
                        </div>
                        
                        
                        
                        <div class="col-sm-3 padiingmform mycolors ">
             State
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
							 
                        <select  class="form-control formw  show_state" name="state">
                        
                      
                        <option>Select State</option>
                        
                         <?php if(!empty($BAsic_INFETCH['state'])){ 
						  $result12  = fetchsingle('cm_state',array('id' => $BAsic_INFETCH['state']));
						 
						 echo '	<option selected value="'.$result12['id'].'">'.$result12['state'].'</option>';
						} ?>
                        </select>
                          (To change state select country first)
                        </div>
                        
                        
						
						 
                           <div class="col-sm-3 padiingmform mycolors">
                City
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
							 
                  <select  class="form-control formw show_city" name="city">
        
         <option value='nocity'>Select City</option>
                  
                   <?php if(!empty($BAsic_INFETCH['city'])){ 
						 echo '	<option selected value="'.$BAsic_INFETCH['city'].'">'.$BAsic_INFETCH['city'].'</option>';
						} ?>
                  </select>
                        (To change city select country first)
                        </div>
						
						 
                           <div class="col-sm-3 padiingmform mycolors">
                Enter City Name 
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
							<strong>( If City not in list ) </strong>
                        <input type="text" class="form-control formw clearitn" name="rcity" value='<?=$BAsic_INFETCH['rcity'];?>' >
                        
                        </div>


  <div class="col-sm-3 padiingmform mycolors">
                  Location 
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
							 
                        <input type="text" class="form-control formw takevlaueAUTO1"  autocomplete="off" name="location" value='<?=$BAsic_INFETCH['location'];?>' >
						(To change location select country first)

                         <div class="nsearch1" style="margin-left:0px; background:#F3F3F3; top:44px; height: auto;    max-height: 167px; "></div>
                        </div>
						
						
                          
                         <br>
                         
                        <div class="col-sm-3 padiingmform mycolors">
                 Enter Location 
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
							 <strong>( If location not in list ) </strong>
                        <input type="text" class="form-control formw clearitn"  autocomplete="off"  name="locationenter"  >
                       
                        
                        </div>
                        



							 
                           <div class="col-sm-3 padiingmform mycolors">
                 Address *
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
			    <textarea type="text" class="form-control formw cmfta clearitn" name="address" required  ><?=$BAsic_INFETCH['address'];?></textarea>
                        
                        </div>		
						 
                           <div class="col-sm-3 padiingmform mycolors">
                 Enter Pin code *
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
							 
                        <input type="text" class="form-control formw clearitn" name="pin" required pattern="[0-9]*" maxlength="6" min="5"  value='<?=$BAsic_INFETCH['pin'];?>'>
                        
                        </div>
                         <!--  
                         <div class="col-sm-3 padiingmform mycolors">
                 For Cover/Profile
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 ( Size w-1200px, H-240px :- Visible only in profile page )
							  <input type="hidden" name="bannerimagesE" value="<?=$BAsic_INFETCH['bannerimages'];?>">
                        <input type="file" class="form-control formw" name="bannerimages" >
						<br />
                        <?php if(!empty($BAsic_INFETCH['bannerimages']))
						{
						echo '<img src="'.$domainname.'image/proimages/'.$BAsic_INFETCH['bannerimages'].'" height="70" width="360" />';
						} ?>
						
						
                        </div>
                     
                       <!--  
                         <div class="col-sm-3 padiingmform mycolors">
                For Logo/Photo
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
                             ( Size w-200px, H-240px :- Visible only in profile page )
							 <input type="hidden" name="profileimagesE" value="<?=$BAsic_INFETCH['profileimages'];?>">
							 
                        <input type="file" class="form-control formw" name="profileimages" >
                        	<br />
                        <?php if(!empty($BAsic_INFETCH['profileimages']))
						{
						echo '<img src="'.$domainname.'image/proimages/'.$BAsic_INFETCH['profileimages'].'" height="70" width="70" />';
						} ?>
                        </div> -->
						
						 
                           <div class="col-sm-3 padiingmform mycolors">
                 About Institute
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
							 
                        <textarea type="text" class="form-control formw cmfta" name="about_IT"><?=$BAsic_INFETCH['about_IT'];?></textarea>
                        
                        </div>
						
						   <div class="col-sm-12 padiingmform" style="text-align:center">
							 
							 
<?php 

if($BAsic_INfoC==1) {  ?>
                        <input type="submit" class="btn  btn-warning" name="trainerbasicEDIT" value="Save Profile">
                        
                        <?php  } else  { 

 if($activationLink['email_verification']!=1)
  {
  ?>
  
  <div class="activationlinkset">Active Your Account ( Check inbox/Spam in your mail ), <span class="spaAc">Resend Activation link</span></div>
  
  
  <?php } else { ?>
						



						
						    <input type="submit" class="btn  btn-warning" name="trainerbasic" value="Save Profile">









						
						<?php }  } ?>
                        
                        </div>
                           
                        
                        
						
                        
                         
                        
                        
                        </div>
						</form>
                        
                         <div id="popup_uploadc">
        <div class="form_uploadc">
            <span class="closec" onClick="close_popupc('popup_uploadc')">x</span>
            <h2 style="font-size:14px;">Upload Cover Photo</h2>
<p> (Size should be in between 1200x300 & 2400x600)
<br> (Image format should be JPEG)
<p>
            <form action="upload_photoC.php" method="post" enctype="multipart/form-data" target="upload_frame" onSubmit="submit_photoc()">
<div style="position:relative;">
                                        <a class="btn btn-primary" href="javascript:;">
                                            CHOOSE A FILE
                                            <input type="file" required="" style="position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:&quot;progid:DXImageTransform.Microsoft.Alpha(Opacity=0)&quot;;opacity:0;background-color:transparent;color:transparent;" name="photoc" id="photoc" class="file_inputc" size="40" onchange="$(&quot;#upload-file-infonn&quot;).html($(this).val());">
                                        </a>
                                        &nbsp;
                                        <span id="upload-file-infonn"></span>
                                </div>

             
                <div id="loading_progressc"></div>
                <input type="submit" value="Upload photo" id="upload_btnc">
            </form>
            <iframe name="upload_frame" class="upload_framec"></iframe>
        </div>
    </div>

    <!-- The popup for crop the uploaded photo -->
    <div id="popup_cropc">
        <div class="form_cropc">
            <span class="closec" onClick="close_popupc('popup_cropc')">x</span>
            <h2>Crop photo</h2>
            <!-- This is the image we're attaching the crop to -->
            <img id="cropboxc" style="height:auto; width:100%;"/>
            
            <!-- This is the form that our event handler fills -->
            <form>
                <input type="hidden" id="x1" name="x1" />
                <input type="hidden" id="y1" name="y1" />
                <input type="hidden" id="w1" name="w1" />
                <input type="hidden" id="h1" name="h1" />
                <input type="hidden" id="photo_urlc" name="photo_urlc" />
                <input type="button" value="Crop Cover Image" id="crop_btnc" onClick="crop_photoc()" />
            </form>
        </div>
    </div>


                        <div style="height:310px; margin-top:80px; width:100%; text-align:center; float:left;">
                        
                        <a onClick="show_popupc('popup_uploadc')" class="cursor" style="color:#FD7F1E; width:100%; background:#F3F3F3; padding:5px; text-align:center;">Upload Cover/Profile Photo</a><br>
                        
                        <?php if(!empty($uploadimgaes['cr_images']))
				{ ?>
				
				<img src="<?=$domainname;?>image/proimages/<?=$uploadimgaes['cr_images'];?>" style="width:70%; height: 145px;"></div>
				
				 <?php } else { ?>  <img src="<?=$domainname;?>image/proimages/132720947.jpg" style="width:70%; height: 145px;"></div> <?php } ?>
                 
                  <div class="editprofileh mycolor right" style="background:#F7F6F6;" >  <a style="color: #F0AD4E;" href="controller/Delete_SQL_All.php?DDELETEaccountIT=<?=$_SESSION['UMID']?>" onclick="return confirm('Are you sure you want to Remove?')">Delete Account </a> </div>
                 
                        </div>
                        


						</div>		
						</div>				
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#services-->

<?php include("../controller/footer.php"); ?>