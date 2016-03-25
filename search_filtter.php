<?php $UDS='';   include('database/config.php'); 
include("controller/insert_SQL_Controller.php"); 

$dataall=str_replace("%27","'",$_SERVER['QUERY_STRING']);


//print_r($dataall);

$dataallNEW=explode('CMG',$dataall);

if (strpos($dataallNEW[0],',') !== false) {
 $Freshdata=explode(',PRC',$dataallNEW[0]);
} else {
$Freshdata=explode('PRC',$dataallNEW[0]);
}



$dataallwithR=explode(',',$Freshdata[0]);


$element_array =  implode(" AND ",$dataallwithR);
     
	 $pricesec=explode('-',$Freshdata[1]);
	 



 $serch_data=$_SESSION['category'];
$Loctaion_data=$_SESSION['location'];
   $hiddenvalue=$_SESSION['hiddenvalue'];
  
$membertype=$_SESSION['membertype'];
	
if(!empty($dataallNEW[1]) && !empty($dataallNEW[2])) 
{
 
   if($hiddenvalue=='1') 
  {
 

$Search_SQL=$conn->prepare("SELECT * FROM cmg_basic_inf0_ti a , cmg_courses b WHERE a.UMID=b.UMID AND a.city='".$_SESSION['currentcity']."' AND a.membertype='$membertype' AND a.location LIKE '$Loctaion_data%' AND b.coursename  LIKE  '$serch_data%' AND a.experiance BETWEEN '".$dataallNEW[1]."' AND '".$dataallNEW[2]."' AND a.status=1 GROUP BY a.UMID  ORDER BY a.score DESC "); 
  }
  elseif($hiddenvalue=='2') { 
  $Search_SQL=$conn->prepare("SELECT * FROM cmg_basic_inf0_ti a , cmg_registration b WHERE a.UMID=b.UMID AND a.city='".$_SESSION['currentcity']."'  AND b.Are_u_an='$membertype' AND b.status=1 AND b.email_verification=1 AND  b.institute_dname='$serch_data' AND a.location like '%$Loctaion_data%' AND a.experiance BETWEEN '".$dataallNEW[1]."' AND '".$dataallNEW[2]."' GROUP BY a.UMID ORDER BY a.score DESC ");
  }
  
    elseif($hiddenvalue==3 && !empty($Loctaion_data)) { 
$Search_SQL=$conn->prepare("SELECT * FROM cmg_basic_inf0_ti a , cmg_registration b WHERE a.UMID=b.UMID AND a.city='".$_SESSION['currentcity']."' AND b.Are_u_an='$membertype' AND b.status=1 AND b.email_verification=1 AND a.location like '%$Loctaion_data%' AND a.experiance BETWEEN '".$dataallNEW[1]."' AND '".$dataallNEW[2]."' GROUP BY a.UMID ORDER BY a.score DESC  ");
  }
   else { 
$Search_SQL=$conn->prepare("SELECT * FROM cmg_basic_inf0_ti a , cmg_registration b WHERE a.UMID=b.UMID AND a.city='".$_SESSION['currentcity']."' AND b.Are_u_an='$membertype' AND b.status=1 AND b.email_verification=1   AND a.location='null' AND a.experiance BETWEEN '".$dataallNEW[1]."' AND '".$dataallNEW[2]."' GROUP BY a.UMID ORDER BY a.score DESC  ");
  }
  
  
}
else {
	
	if($hiddenvalue=='1') 
  {
$Search_SQL=$conn->prepare("SELECT * FROM cmg_basic_inf0_ti a , cmg_courses b WHERE a.UMID=b.UMID AND a.city='".$_SESSION['currentcity']."' AND a.membertype='$membertype'  AND a.location LIKE '$Loctaion_data%' AND b.coursename  LIKE  '$serch_data%' AND a.status=1 GROUP BY a.UMID ORDER BY a.score DESC "); 
  }
  elseif($hiddenvalue=='2') { 
  $Search_SQL=$conn->prepare("SELECT * FROM cmg_basic_inf0_ti a , cmg_registration b WHERE a.UMID=b.UMID AND a.city='".$_SESSION['currentcity']."' AND b.Are_u_an='$membertype' AND b.status=1 AND b.email_verification=1 AND b.institute_dname='$serch_data' AND a.location like '%$Loctaion_data%' GROUP BY a.UMID ORDER BY a.score DESC ");
  }
  
    elseif($hiddenvalue==3 && !empty($Loctaion_data)) { 
$Search_SQL=$conn->prepare("SELECT * FROM cmg_basic_inf0_ti a , cmg_registration b WHERE a.UMID=b.UMID AND a.city='".$_SESSION['currentcity']."' AND b.Are_u_an='$membertype' AND b.status=1 AND b.email_verification=1 AND a.location like '%$Loctaion_data%' GROUP BY a.UMID  ORDER BY a.score DESC ");
  }
   else { 
$Search_SQL=$conn->prepare("SELECT * FROM cmg_basic_inf0_ti a , cmg_registration b WHERE a.UMID=b.UMID AND a.city='".$_SESSION['currentcity']."' AND b.Are_u_an='$membertype' AND b.status=1 AND b.email_verification=1 AND a.location='null' GROUP BY a.UMID  ORDER BY a.score DESC ");
  }
	
	
}


   
  
  
$Search_SQL->execute();
$Search_SQLR= $Search_SQL->fetchAll(); 


      

foreach ($Search_SQLR as $Search_SQLRS) {                     
								    
 $imge_category  = fetchsingle('cmg_registration',array('UMID' => $Search_SQLRS['UMID']));	
 
 if(!empty($element_array))
 {
 $AvailabelSerch = $conn->prepare("SELECT * FROM cmg_trainer_moreinfo WHERE $element_array AND `UMID`='".$Search_SQLRS['UMID']."'");
$AvailabelSerch->execute();
$AvailabelSerchF= $AvailabelSerch->rowCount();
}
 else { $AvailabelSerchF=200000;}
if(!empty($pricesec[1]))
{
 $AvailabelSerchp = $conn->prepare("SELECT * FROM cmg_courses WHERE   `UMID`='".$Search_SQLRS['UMID']."' and price  BETWEEN '".$pricesec[1]."' AND '".$pricesec[2]."'");
$AvailabelSerchp->execute();
$AvailabelSerchpF= $AvailabelSerchp->rowCount();
} 
else { $AvailabelSerchpF=200000;}


	if	($AvailabelSerchF>=1 && $AvailabelSerchpF>=1 )
							{	
                                    ?>    
                                        		  
						  <div class="col-md-4 col-xs-12 search_result">
                             
                             <div style="height:110px;"> <?php
										
										if(!empty($imge_category['pr_images']))
										{
											//if($Search_SQLRS['Are_u_an']=='Institute'){ $valu=9; }  else  { $valu=4;  }
										?>
                                        <img src="<?=$UDS;?>image/proimages/<?=$imge_category['pr_images'];?>" height="100" width="121"  align="middle" >
                                        <?php } else {  ?>
                                        
                                          <img src="<?=$UDS;?>image/profilepic.jpg" class="img-responsive ser-img" align="middle">
                                          
                                          <?php }?>

						</div>
                               
							   <h5><?=ucfirst($Search_SQLRS['instituename']);?> </h5>
							   <h6><?=$Search_SQLRS['phone'];?></h6>
							   <h6><?=$Search_SQLRS['location'];?></h6>
							   <h6><?=$Search_SQLRS['city'];?></h6>
							  
							   <div class='selectBox' style="width:95%">
			                   
                                  <select  class="form-control formw"  onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);" style="width:100%; text-align:center;" name="course" required>
                        
                         <?php
					
					$courselist  = fetchASC('cmg_courses',array('UMID' => $Search_SQLRS['UMID']));
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
					
				
					
foreach ($courselist as $courselistV) { ?>
                                 <option value="<?=$domainname?>Trainer-Institue/Post/Profile/<?=$imge_category['u_url'];?>/Course-List"><?=$courselistV['coursename'];?></option>
                    
                    
                    <?php  }  if(!empty($serch_data) && $hiddenvalue==1){ ?>
                          <option selected="selected" value="<?=$domainname?>Trainer-Institue/Post/Profile/<?=$imge_category['u_url'];?>/Course-List"><?=$serch_data;?></option>
                        
                         <?php  } if(!empty($BAsic_INFETCH['country'])){ 
						 
						 $result11  = fetchsingle('cmg_country',array('id' => $BAsic_INFETCH['country']));
						 echo '	<option selected value="'.$result11['id'].'">'.$result11['country'].'</option>';
						} ?>
                        </select>
                               
		                       </div>
							  
							   <h6>YOE-<?=$Search_SQLRS['yoe'];?></h6>
							   	
                                
                                              
							    <div class="mylikediv" <?=$dispaly;?> >  <a data-toggle="modal" data-target="#myModal_login" class="cursor" style="text-decoration:none"> <?=$like;?> &nbsp; <i class="fa fa-thumbs-o-up"></i> &nbsp;&nbsp;&nbsp; <?=$follow;?>  &nbsp; <i class="fa fa-share-alt"></i> </a></div>
                                
                                
                                
                                
                                 <div class="mylikediv" <?=$dispalyA;?> > 
                               <input type="hidden" class="takefollow" value="<?=$Search_SQLRS['UMID'];?>">
                              
                                  <span class="likeshow" ><?=$like;?></span> &nbsp; <i class="fa fa-thumbs-o-up likenew" title="Like" style="color:<?=$actuveFL;?>"></i> &nbsp;&nbsp;&nbsp;  <span class="flollowshow" ><?=$follow;?></span>  &nbsp; <i title="Follow" class="fa fa-share-alt follownew" style="color:<?=$actuveF;?>">
                                 
                                 
                                 </i> </div>
                                 
                                 
                                 
                                 
                                
                                
                                  <span style="color:#A99B9B; font-size:14px" >
                          
                          <?php if($imge_category['Are_u_an']=='Institute')
						  { echo '<i class="fa fa-home" title="Institute"></i> &nbsp;&nbsp;&nbsp;';} elseif($imge_category['Are_u_an']=='Trainer') { echo '<i class="fa fa-user" title="Trainer"></i> &nbsp;&nbsp;&nbsp;';} 
                          
                         // if($imge_category['verify_status']==1){ echo '<i class="fa fa-thumbs-o-up" title="Verified"></i> &nbsp;&nbsp;&nbsp;'; } ?>
						  
						  
						   </span>
							   
							   <div class="details"><a href="<?=$domainname;?>Trainer-Institue/Post/Profile/<?=$imge_category['u_url'];?>/#View">Click Here To See Details</a></div>
						  </div><!--/#Search Result-->
						  
								<?php } } ?>	