<?php ob_start();
 $UDS='../';  $M2='a'; echo '<input type="hidden" value="../" class="UID">';
include("../controller/header.php"); 
include('Institute_Session.php');
include("controller/insert_SQL_Controller.php"); 
?>
<div id="Sprofile"></div>
    <section id="services" class="service-item">   
	   <div class="container">   
            <div class="row" > 
                
			<?php include('controller/student_leftmenu.php'); ?>
				   
				   
				   

		   
           <div class="col-md-9 col-sm-12">
		  			 
			 <div class="clearfix"></div>
			 
				      <div class="trainer-right">
					   
					    <h3>Trainers you are following</h3>
		
				<?php 
				
				
$DataFolloW= fetchASC('cmg_follow',array('UMID_S' => $_SESSION['s-UMID'],'status'=>1));
				

foreach ($DataFolloW as $Search_SQLRS1) {                     
							
							    
 $imge_category  = singlefetch('cmg_registration',array('UMID' => $Search_SQLRS1['UMID_T']));	
  $Search_SQLRS  = singlefetch('cmg_basic_inf0_ti',array('UMID' => $Search_SQLRS1['UMID_T']));	
 
				 ?>
                
                
                
                
                
                <div class="col-md-4 col-xs-12 tainer-ser_result">
                             
                             <div style="height:110px;"> <?php
										
										if(!empty($imge_category['pr_images']))
										{
											//if($Search_SQLRS['membertype']=='Institute'){ $valu=9; }  else  { $valu=4;  }
										?>
                                        <img src="<?=$UDS;?>image/proimages/<?=$imge_category['pr_images'];?>" align="middle" height="100" width="121">
                                        <?php } else {  ?>
                                        
                                          <img src="<?=$UDS;?>image/profilepic.jpg" class="img-responsive ser-img" align="middle">
                                          
                                          <?php }?>

						</div>
                               
							   <h5><?=$Search_SQLRS['instituename'];?></h5>
							   <h6><?=$Search_SQLRS['phone'];?></h6>
							   <h6><?=$Search_SQLRS['location'];?></h6>
							   <h6><?=$Search_SQLRS['city'];?></h6>
							  
							   <div class='selectBox' style="width:95%">
			                   
                         
                        
                         <?php
					
				
					
					$follow  = num_rows('cmg_follow',array('UMID_T' => $Search_SQLRS['UMID']));
					
					$follow1  = num_rows('cmg_follow',array('UMID_T' => $Search_SQLRS['UMID'],'UMID_S' => $_SESSION['s-UMID']));
					
					if($follow>=1)
					{$follow=$follow;  } else { $follow=0;  }
					
					if($follow1>=1)
					{ $actuveF='#2194d7'; } else {  $actuveF=''; }
					
					
						$like  = num_rows('cmg_like',array('UMID_T' => $Search_SQLRS['UMID']));
						
						$like1  = num_rows('cmg_like',array('UMID_T' => $Search_SQLRS['UMID'],'UMID_S' => $_SESSION['s-UMID']));
					
					if($like>=1)
					{$like=$like;  } else { $like=0;  }
					
					if($like1>=1)
					{$actuveFL='#2194d7'; } else { $actuveFL=''; }
					?>
                           <select  class="form-control formw" style="width:100%; text-align:center;" name="course" required>
                    <?php
				
						$courselist  = fetchASC('cmg_courses',array('UMID' => $Search_SQLRS['UMID']));
foreach ($courselist as $courselistV) { ?>
                    <option value="<?=$courselistV['id'];?>"><?=$courselistV['coursename'];?></option>
                    
                    
                    <?php  } ?>
                        
                        
                      
                        </select>
                         
                               
		                       </div>
							  
							   <h6>YOE-<?=$Search_SQLRS['yoe'];?></h6>
							   	
                                
                                              
<div class="mylikediv" <?=$dispaly;?> >  <a data-toggle="modal" data-target="#myModal_login" class="cursor" style="text-decoration:none"> <?=$like;?> &nbsp; <i class="fa fa-thumbs-o-up"></i> &nbsp;&nbsp;&nbsp; <?=$follow;?>  &nbsp; <i class="fa fa-share-alt"></i> </a></div>
                                
                                
                                
                                
                                 <div class="mylikediv" <?=$dispalyA;?> > 
                               <input type="hidden" class="takefollow" value="<?=$Search_SQLRS['UMID'];?>">
                              
                                  <span class="likeshow" ><?=$like;?></span> &nbsp; <i class="fa fa-thumbs-o-up likenew" title="Like" style="color:<?=$actuveFL;?>"></i> &nbsp;&nbsp;&nbsp;  <span class="flollowshow" ><?=$follow;?></span>  &nbsp; <i title="Follow" class="fa fa-share-alt follownew" style="color:<?=$actuveF;?>">
                                 
                                 
                                 </i> </div>
                                 
                                 
                                 
                                 
							   
							   <div class="details"><a href="<?=$domainname;?>Trainer-Institue/Post/Profile/<?=$imge_category['u_url'];?>/">Click Here To See Details</a> 
                               
                              <a data-toggle="modal" data-target="#myModalmessage" class="cursor sendamessage" >
                               
                               <input type="hidden" value="<?=$Search_SQLRS['UMID'];?>#Followers" class="toid">
                               
                               <i class="fa fa-envelope font16"></i></a></div>
						  </div>
<?php } ?>
						  <!--/#Search Result-->
						  
        				  			  
						  <div class="clearfix"></div>
                         						  
			
						    
					  </div>		
					  </div>
           
           				
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#services-->

<?php include("../controller/footer.php"); ?>
