<?php ob_start();
 $UDS='../';  $M2='a'; echo '<input type="hidden" value="../" class="UID">';
include("../controller/header.php"); 
include('Institute_Session.php');
include("controller/insert_SQL_Controller.php"); 


  $dataFETCHNewSet = fetchDESCNN('cmg_create_post',array('status' =>1,'UMID' => $_SESSION['UMID']));
foreach ($dataFETCHNewSet  as  $dataFETCHVSETT) {
	
	$num_rows_POSTTT = num_rows('cmg_post_chat',array('post_ID' => $dataFETCHVSETT['id'],'replyt_to' => 'trainer','read_status'=>0));
	

	
$UpdatescoreSET=$conn->prepare("UPDATE `cmg_create_post` SET `order_to`='$num_rows_POSTTT' WHERE id='".$dataFETCHVSETT['id']."' ");

$UpdatescoreSETD=$UpdatescoreSET->execute();	

	}

?>

    <section id="services" class="service-item">   
	   <div class="container">   
            <div class="row" > 
                
			<?php include('controller/trainer_leftpart.php'); ?>
				   
				   
				   

		   
           <div class="col-md-9 col-sm-12" id="Profile">
		   
		     <div class="stud-top-left"><a href="Dashboard#Profile">Post</a></div>
			  <div class="senquiry"><?=$num_rows_POST1 = num_rows('cmg_post_chat',array('UMID_T' => $_SESSION['UMID'],'replyt_to' => 'trainer','read_status'=>0));?></div>
			 <div class="stud-top-right"><a href="Enquired#Profile">Enquiry</a></div>
			 <div class="clearfix"></div>
		   
		   
				      <div class="search-right">
                      
                      
                      <?php $INCK= fetchsingle('cmg_basic_inf0_ti',array('UMID' => $_SESSION['UMID']));
					  
					  if(empty($INCK['instituename']) && empty($INCK['phone']) && empty($INCK['membertype']) )  {?>
                      
                      <div class="hidenewdiv" >
                      
                      <div class="middledivn">
                      You Can create posts and promote your courses after you fill your basic profile
<br><a href="Basic-Profile"> Click Here to create your profile</a></div>
                      
                      </div>
                      
                      <?php } ?>
                      
                      
                      <form action="" method="post" enctype="multipart/form-data">
                      
                      
                      
					       <div class="search-top">
						   
						   <div class="search-top-inner">
						    
							  
							   <div class="col-md-5">
						       <div class="check-box" style="width:320px;">
							   
						<h3>Create a Post to </h3>
	
             
             <div class="top-margin" style="float:right;     margin-top: -25px;">
											<div class="radio Generalr" style=" margin-top: -3px;" >
											
											  <label>
<input type="radio" name="sharewith" value="general" checked="checked" >General <span class="inner"></span>   </label>
										 </div>
										 	<div class="radio Followersr">
										   <label>
<input type="radio" name="sharewith"   value="followers" > Followers  <span class="inner"></span>    </label>
											
                                          </div>
                                         </div>       <div class="clearfix"></div>
			        
			                      </div>
						   </div>
						   <div class="col-md-4" style="display:none">
                          <h3 style="display:none"> 
                                       <a  href='javascript:;' >
                                           Attached Your Photo     
                                            <input type="file" style='position:absolute;z-index:2;  top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="attached_photos" size="40"  onchange='$("#upload-file-info").html($(this).val());'>
                                        </a>
                                        &nbsp;
                                   
                               </h3>
                           
                           
                              <span  id="upload-file-info"></span>



</div>

<div class="col-md-3" style="width:352px">
						
							   
						<h3 class="uyoutubev cursor">Share Youtube Video</h3>
	
             <input type="text" style="width:326px; display:none"  class="showyoulink" name="youtube_link"  placeholder='Paste your Youtube Link'> 
              
			        
			                      </div>
						
                          
							  
						   
						  <div class="clearfix"></div>
						
						 
                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;( Your Post will display Under the city- <?=$INCK['city'];?> )	  
							  
<div class="col-md-10"> <textarea  class="search-post" name="post_text" placeholder="Enter Post Details"   required></textarea>
 
</div> 
								  <div class="col-md-2">
                                  <input type="submit" class="btn mybtn" name="psotvalue"  value="Post">
                                  </div>
							      <div class="clearfix"></div>
						  </div>
								  
								  <!--######-->
								  
						  <div class="search-top-inner">
								  <div class="col-md-9"> <input type="text" name='tags'  class="search-post1" placeholder="Enter tags describing your post - Eg: Java, Cricket, .Net, Cooking etc. Use comma to separate tags">
 <span style="font-size:14px;">Note: You could use html tags like <code>&lt;strong&gt;</code>title<code>&lt;/strong&gt;</code> to blod(<strong>title</strong>), Anchore tags like <code>&lt;a href="http://www.example.com"&gt;</code> Mylink <code>&lt;/a&gt;</code>  to post link (Mylink) etc.</span> </div> 
								  <div class="col-md-3 category_post"><select class="search-post1" name="category_post"><option value="none">Select Category to Post</option>
                                  <?php 
$dataFetch_institue1=$conn->prepare("select * from cmg_category WHERE `status`=1 ");
$dataFetch_institue1->execute();
$dataFetch_institue1F= $dataFetch_institue1->fetchAll();			

foreach ($dataFetch_institue1F as $DFinstitue1) {
	
	?><option value="<?=$DFinstitue1['category'];?>"><?=$DFinstitue1['category'];?></option>      <?php }?>
                                  </select>
                                  </div>
								  <div class="clearfix"></div>
						</div>
						
						         <!--######-->
								  
			            
								  
								    <!--######-->
									
																  
							  </div><!--search-top-->
                              
                              
                              
                              
                              
                              
                              
                              
                              </form>
                        
							  <?php    if(isset($_GET['sharewith']))
						   {
							$general=$_GET['sharewith']; 
							$bgact='#3A5F6F'; $folooertext='Followers'; $bgactm='#fff';
							  
						   } else { $general= 'general'; $bgact1='#3A5F6F'; $bgactm1='#fff'; $folooertext='General'; }
						    ?>
			
			<div id="tabs" class="tabs">
				<nav>
					<ul>
						<li><a href="Dashboard#Profile" style="background:<?=$bgact1;?>; color:<?=$bgactm1;?>;"  ><span><i class="fa fa-random"></i> Public</span> [

<?php  $dataFETCHsds = fetchDESCNN('cmg_create_post',array('UMID' => $_SESSION['UMID'],'sharewith' =>'general'));

$letstnoofpost=0;

foreach ($dataFETCHsds as  $dataFETCHVwww) {
	
$num_rows_POSTds = num_rows('cmg_post_chat',array('post_ID' => $dataFETCHVwww['id'],'replyt_to' => 'trainer','read_status'=>0));
$letstnoofpost=$letstnoofpost+$num_rows_POSTds;

} if($letstnoofpost<=0) { $ncolorb='#fff';} else { $ncolorb='#D87114'; } echo '<span style="color:'.$ncolorb.'">'.$letstnoofpost.'</span>'; ?>

]</a></li>
						<li><a href="Dashboard.php?sharewith=followers#Profile" style="background:<?=$bgact;?>; color:<?=$bgactm;?>;"  ><span> <i class="fa fa-thumbs-o-up"></i> Followers</span> [

<?php  $dataFETCHddd= fetchDESCNN('cmg_create_post',array('UMID' => $_SESSION['UMID'],'sharewith' =>'Followers'));

$letstnoofpost=0;

foreach ($dataFETCHddd as  $dataFETCHVdd) {
	
$num_rows_POSTdd = num_rows('cmg_post_chat',array('post_ID' => $dataFETCHVdd['id'],'replyt_to' => 'trainer','read_status'=>0));
$letstnoofpost=$letstnoofpost+$num_rows_POSTdd;

} if($letstnoofpost<=0) { $ncolorb1='#fff';} else { $ncolorb1='#D87114'; } echo '<span style="color:'.$ncolorb1.'">'.$letstnoofpost.'</span>'; ?>

]</a></li>
					</ul>
				</nav>
				<div class="content">
					<section id="section-1" style="padding:3em 6px;">
                        <h3>View recent enquiries from <?=$folooertext;?></h3>
						<!-- <h4><a href="#">Click here to view all Enquires</a></h4>  -->
						<div class="clearfix"></div>
						<input type='hidden' id='current_page' />
	<input type='hidden' id='show_per_page' />
						
                        	<div id='content'>
							
							      <?php
						   
						
						   $dataFETCH = fetchDESCNN('cmg_create_post',array('UMID' => $_SESSION['UMID'],'sharewith' => $general));



foreach ($dataFETCH  as  $dataFETCHV) {
	
$num_rows_POST = num_rows('cmg_post_chat',array('post_ID' => $dataFETCHV['id'],'replyt_to' => 'trainer','read_status'=>0));

$num_rows_POSTnew = num_rows('cmg_post_chat',array('post_ID' => $dataFETCHV['id'],'replyt_to' => 'trainer'));
	
$imge_category  = fetchsingle('cmg_registration',array('UMID' => $dataFETCHV['UMID']));
						   
						   ?>   
                              
             <div class="setforpage">        

   <div class="search_post">
				      <div class="col-md-12 col-sm-12 col-xs-12 sptop">
					       <div class=" col-md-2 col-sm-12">
						 <?php
						if(!empty($imge_category['pr_images']))
										{
									
										?>
                                        <img src="<?=$UDS;?>image/proimages/<?=$imge_category['pr_images'];?>" height="75" width="90" align="middle">
                                        <?php } else {  ?>
                                        
                                          <img src="<?=$UDS;?>image/profilepic.jpg"  align="middle" height="75" width="111">
                                          
                                          <?php }?>
						   </div>
						   <div class="col-md-5 col-sm-5 col-xs-12">
						     <h4><?=$imge_category['institute_dname'];?></h4>
						     	    <?php if($imge_category['Are_u_an']=='Institute')
						  { echo '<i class="fa fa-home" title="Institute"></i> &nbsp;&nbsp;&nbsp;';} elseif($imge_category['Are_u_an']=='Trainer') { echo '<i class="fa fa-user" title="Trainer"></i> &nbsp;&nbsp;&nbsp;';} 
                          
                        //  if($imge_category['verify_status']==1){ echo '<i class="fa fa-thumbs-o-up" title="Verified"></i> &nbsp;&nbsp;&nbsp;'; } ?>
						</div>
						
						<div class="col-md-5 col-sm-5 col-xs-12">
<div class="search_enquiry1"><?=$num_rows_POST;?> New Enquiries</div>						  
						  <div class="search_post_time"><?=$dataFETCHV['time']; ?> - <?=date("d/m/Y", strtotime($dataFETCHV['date'])); ?></div>
						</div>
						
					  </div>
					  
					  <div class="col-md-12 col-sm-12" style="font-size:14px;text-align: justify; color: #8A8484;">
  <?php if(!empty($dataFETCHV['youtube_link']) && $dataFETCHV['youtube_link']!=1) {  ?>

<div style="text-align:center">
							<iframe width="450" height="315" src="<?=$dataFETCHV['youtube_link'];?>" frameborder="0" allowfullscreen></iframe></div>
                            
                            <?php } ?>
                            
                             <?php if(!empty($dataFETCHV['attached_photos'])) { ?>
							<img width="450" height="315" src="<?=$UDS;?>image/postimages/<?=$dataFETCHV['attached_photos'];?>" />
                            
                            <?php } ?>

<br>
						<?=nl2br(substr($dataFETCHV['post_text'], 0, 500)); ?>
						
						<div class="showpostn<?=$dataFETCHV['id']?>" style="display:none">
<?=nl2br(substr($dataFETCHV['post_text'], 500, 500000)); ?>
						  
							
							</div>
						<div class="search_post_txt"><a href="controller/Delete_SQL_All.php?PostIDelete=<?=$dataFETCHV['id'];?>" onclick="return confirm('Are you sure you want to Remove?')">Delete</a>  </div>
						<img src="<?=$domainname;?>image/upd.png"  class="morevi" title='More' id='<?=$dataFETCHV['id']?>' style=" font-size: 25px;float: right; margin-right: -34px;color: #3A5F6F;"> &nbsp;&nbsp;
						
						
						</div>
						
					<div class="clearfix"></div>
					
					</div>
						
				   <!--/Search post--> 
					
                    
                    <?php
					
$dataFETCH_Enquiry_post = fetchDESCNEG('cmg_post_chat',array('post_ID' => $dataFETCHV['id'],'replyt_to' => 'trainer'));
	
foreach ($dataFETCH_Enquiry_post  as  $dataFETCHVEN) {
	
	$dataFETCH_StudentdatDATA= fetchsingle('cmg_registration_s',array('UMID' => $dataFETCHVEN['UMID_S']));
	$ForStudentT = num_rows('cmg_post_chat',array('post_ID' => $dataFETCHV['id'],'UMID_S' => $dataFETCHVEN['UMID_S'],'replyt_to' => 'trainer','read_status'=>0));

					?>
				<div class="col-md-12">
				
				<div class="sender_post">
				    <div class="col-md-2 col-sm-12"><img src="<?=$UDS;?>image/proimages/<?=$dataFETCH_StudentdatDATA['pr_images'];?>" class="img-responsivemnew"></div>
					<div class="col-md-10 col-sm-12">
					    <h3><?=$dataFETCH_StudentdatDATA['username'];?>  <span> <?=$dataFETCHVEN['date'].' '.$dataFETCHVEN['time'];?></span></h3>
					 <?=$dataFETCHVEN['message']."<br>"; 


					 if($ForStudentT>0)
					 {
					 ?>
					  
					   
					   <a href="User-Post-Chat.php?Post_ID=<?=$dataFETCHV['id'];?>&s-UMID=<?=$dataFETCHVEN['UMID_S'];?>#Profile"><div class="reply">&nbsp;&nbsp;Reply</div></a>
					    <a href="User-Post-Chat.php?Post_ID=<?=$dataFETCHV['id'];?>&s-UMID=<?=$dataFETCHVEN['UMID_S'];?>#Profile"><div class="reply" style="background:#E68E3C;"> &nbsp;&nbsp;<?=$ForStudentT;?>-New</div></a>
						<?php } else {
							$ForStudentTT = num_rows('cmg_post_chat',array('post_ID' => $dataFETCHV['id'],'UMID_S' => $dataFETCHVEN['UMID_S'],'replyt_to' => 'trainer'));
						 ?>
						
						  <a href="User-Post-Chat.php?Post_ID=<?=$dataFETCHV['id'];?>&s-UMID=<?=$dataFETCHVEN['UMID_S'];?>#Profile"><div class="reply">&nbsp;&nbsp;<?=$ForStudentTT ;?>-Reply</div></a>
						  <?php } ?>
						
					</div>
				</div><!-- Sender Post-->
				
				<!-- Sender Post-->
				
				</div><!-- Sender-->
				
			
					<?php }  if($num_rows_POSTnew>0)
					{ ?>
                    	<a href="All_Enquiry_Post.php?PostId=<?=$dataFETCHV['id'];?>#Profile">Total Enquires for this Post : <?=$num_rows_POSTnew;?> See all Enquiries</a>
                    
                    <?php } ?>
					<hr>
					</div>
					
                    <?php } ?>									


					</div>
				 	<div id='page_navigation'></div>

</section>
					
					
					
					
				</div><!-- /content -->
			</div><!-- /tabs -->
            
           

 </div>
				    	                        
				
            </div>
           
           				
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#services-->

<?php include("../controller/footer.php"); ?>
