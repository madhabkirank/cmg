<?php  $UDS=''; include("controller/header.php"); 
echo '<input type="hidden" value="" class="UID">';
include("controller/insert_SQL_Controller.php"); 

?>
<style>.checkboxFive label {  font-family: 'Droid Sans', sans-serif; color:#686868; font-size:13px; letter-spacing:1px; padding-left:10px; word-wrap: normal; }
.checkbox {
        position: relative;
    display: block;
    margin-top: -14px;
    margin-bottom: 10px;
    margin-left: 157px; }
.checkbox label {
    min-height: 20px;
    padding-left: 30px;
    margin-bottom: 0;
    font-weight: 400;
    cursor: pointer;
}
.checkbox  input[type=checkbox] {
    position: absolute;
    top: 50%;
    margin-top: -6px;
    opacity: 0;
}

.checkbox input[type=checkbox]:checked ~ span {
  background-image: url(image/checkbox_check.png);
}
.checkbox span.inner {
    background-image: url(image/checkbox_uncheck.png);
    display: block;
    width: 43px;
    height: 20px;
    position: absolute;
    top: 50%;
    margin-top: -12px;
    cursor: pointer; border:1px solid #EAE9E9;
}
				</style>

  
    <section id="services" class="service-item">  
	   <div class="container">   
            <div class="row" >
			    <div class="col-md-3 col-sm-12 col-xs-12">
				
				  <div id="services"><h2>Advertisemnt</h2></div>
				
				<?php include('search_adv.php'); ?>				<br>
				
				 <div class="filter-bg" >
				    <h4>Search By Filter</h4>
				 					
					<h3>Filter<h3>				
					
                    <div id="filters">
 		<div class="filterblock checkboxFive">
	 		  <input id="check1" type="checkbox" name="check" value="placement='available'" class="category">
              <label  for="check1">Placement&nbsp;Support</label></span>
    	
	 	</div>

 		<div class="filterblock checkboxFive">
	 		  <input id="check2" type="checkbox" name="check" value="online_training='available'" class="category">
    		<label for="check2">Online</label>
	 	</div>

	 	<div class="filterblock checkboxFive">
	 		  <input id="check3" type="checkbox" name="check" value="hotel_a='available'" class="category">
    		<label for="check3">Hostel</label>
	 	</div>
        
        	<div class="filterblock checkboxFive">
	 		  <input id="check3" type="checkbox" name="check" value="labs='available'" class="category">
    		<label for="check3">Lab</label>
	 	</div>
         <h3>YOE</h3>  
					  
					
               
                      <input type="text" name="exp1" placeholder="0" class="exp valuexp1" style="height:22px;">
					  <input type="text" name="exp2" placeholder="100" class="exp valuexp2" style="height:22px;"> 
                      <br>
    
 	
                    <div class="checkbox">
              <label>
                <input id="expchecked"  type="checkbox" name="check" value="NOT" class="category"> 
                <span class="inner"></span>
              </label>
            </div>
		
	
		
	<div class="minwidset">Min</div><div class="minwidset">Max</div><div class="minwidset" style="width:50px">Apply</div>
 	
                    
		
                 
							  
					 
					  
					  <div class="clearfix"></div>
					  <!--
					  <h3>Price Range</h3> 

			  <p> <input id="check3" type="checkbox" name="check" value="PRC-10-1000" class="category pricemy">&nbsp;&nbsp; < Rs. 1000 </p> 
					  <p> <input id="check3" type="checkbox" name="check" value="PRC-1000-2500" class="category pricemy">&nbsp;&nbsp; Rs. 1000 to Rs. 2500</p>
					  <p> <input id="check3" type="checkbox" name="check" value="PRC-2500-5000" class="category pricemy">&nbsp;&nbsp; Rs. 2500 to Rs. 5000</p>
					  <p><input id="check3" type="checkbox" name="check" value="PRC-5000-10000" class="category pricemy"> &nbsp;&nbsp;Rs. 5000 to Rs. 10,000</p>
					  <p> <input id="check3" type="checkbox" name="check" value="PRC-10000-20000" class="category pricemy">&nbsp;&nbsp; Rs. 10,000 to Rs. 20,000</p>
					  <p><input id="check3" type="checkbox" name="check" value="PRC-20000-50000" class="category pricemy"> &nbsp;&nbsp;Rs. 20,000 to Rs. 50,000</p>   -->      
				</div>
				  
				 </div>
<br>
				 <div id="services"><h2>Premium Trainer</h2></div>
				
				
					<div class="col-sm-12" style="background:#efefef; padding:0px" >
                      <?php include('premimutrianr_search.php');?>
                   
                </div>
										  
					  
				</div><!--/#Left Side-->
				
			    <div class="col-md-9 col-sm-12 col-xs-12">
				  
                  <?php include('serach_top_banner.php');  $searchURL=explode("&sortby-like",$_SERVER['REQUEST_URI']); $_SESSION['search_url']= $searchURL[0] ?>
             
                  
				        
						
					<div class="col-md-9 col-sm-12 col-xs-12" style="padding-left:0px; margin-bottom:30px;">
					<div class="ser" id="SearchProfile">Sort By</div>
					<a href="<?=$_SESSION['search_url'];?>&sortby-like=DESC#SearchProfile"><img src="image/search-like.jpg" class="img-responsive ser-button" style=" margin-left: 20px;"></a> 
					<a href="<?=$_SESSION['search_url'];?>&sortby-follow=DESC#SearchProfile"><img src="image/search-follow.jpg" class="img-responsive ser-button"></a> 
					<a href="<?=$_SESSION['search_url'];?>&sortby-active=DESC#SearchProfile"><img src="image/search-activity.jpg" class="img-responsive ser-button"></a> 
                    
					


                    

<a href="<?=$_SESSION['search_url'];?>&sortby=ASC#SearchProfile"><img src="image/search-experience.jpg" class="img-responsive ser-button-last"></a>
                    
                    <?php if(isset($_GET['sortby']))
					{ $sortedvale='a.experiance '.$_GET['sortby'];  ?>
                    <div class="shortbynewkk"> <a href="<?=$_SESSION['search_url'];?>&sortby=ASC#SearchProfile" style="color:#050505"> Highest </a>&nbsp;&nbsp;&nbsp;
					<a href="<?=$_SESSION['search_url'];?>&sortby=DESC#SearchProfile" style="color:#050505"> Lowest</a> &nbsp;&nbsp;&nbsp; <a href="<?=$_SESSION['search_url'];?>&#SearchProfile" style="color:#050505"> Normal</a>
					</div>
                    <?php }  elseif(isset($_GET['sortby-active']))
					{ $sortedvale='a.post_nowek '.$_GET['sortby-active'];  ?>
                    <div class="shortbynewkk"> <a href="<?=$_SESSION['search_url'];?>&sortby-active=ASC#SearchProfile" style="color:#050505"> Highest </a>&nbsp;&nbsp;&nbsp;<a href="<?=$_SESSION['search_url'];?>&sortby-active=DESC#SearchProfile" style="color:#050505"> Lowest </a> &nbsp;&nbsp;&nbsp; <a href="<?=$_SESSION['search_url'];?>&#SearchProfile" style="color:#050505"> Normal</a></div>
                    <?php }  elseif(isset($_GET['sortby-follow']))
					{ $sortedvale='a.follow_no '.$_GET['sortby-follow'];  ?>
                    <div class="shortbynewkk"> <a href="<?=$_SESSION['search_url'];?>&sortby-follow=ASC#SearchProfile" style="color:#050505"> Highest </a>&nbsp;&nbsp;&nbsp;<a href="<?=$_SESSION['search_url'];?>&sortby-follow=DESC#SearchProfile" style="color:#050505"> Lowest </a> &nbsp;&nbsp;&nbsp; <a href="<?=$_SESSION['search_url'];?>&#SearchProfile" style="color:#050505"> Normal</a></div>
                    <?php }  elseif(isset($_GET['sortby-like']))
					{ $sortedvale='a.like_no '.$_GET['sortby-like'];  ?>
                    <div class="shortbynewkk"> <a href="<?=$_SESSION['search_url'];?>&sortby-like=ASC#SearchProfile" style="color:#050505"> Highest </a>&nbsp;&nbsp;&nbsp;<a href="<?=$_SESSION['search_url'];?>&sortby-like=DESC#SearchProfile" style="color:#050505"> Lowest </a> &nbsp;&nbsp;&nbsp; <a href="<?=$_SESSION['search_url'];?>&#SearchProfile" style="color:#050505"> Normal</a></div>
                    <?php } else {  $sortedvale='a.score DESC'; } ?>
                    

					<div class="clearfix"></div>
			<div style="float:left; width:100%; height:40px;" ><?=$_GET['category'];?> <?php if(!empty($_GET['location'])) {  echo 'in '.$_GET['location'];} ?>, <?=$_SESSION['currentcity'];?></div>		     				
          <div class="fillterserach"></div>  
 		
<div class="allprevius">
 	              <input type='hidden' id='current_page' />
	<input type='hidden' id='show_per_page' />          
   <div id='content' style=" height: auto;  float: left; width: 100%; padding-bottom: 50px;">                                     
<?php    


if(isset($_GET['submit']) || isset($_SESSION['category']) || !empty($_GET['category']) ||  !empty($_GET['location']))
{
	
	if(isset($_GET['category']) & !empty($_GET['category']))
	{


	$_SESSION['category']=$_GET['category'];
	$_SESSION['location']=$_GET['location'];
	$_SESSION['hiddenvalue']=$_GET['hiddenvalue'];
	$_SESSION['membertype']=$_GET['PTI'];
	$membertype=$_SESSION['membertype'];
	 $serch_data=$_SESSION['category'];
  $Loctaion_data=$_SESSION['location'];
  $hiddenvalue=$_SESSION['hiddenvalue'];
  
	
	} elseif(isset($_GET['hiddenvalue']) && isset($_GET['location']))
	{
	 $_SESSION['location']=$_GET['location'];
	 $_SESSION['hiddenvalue']=3;
	$Loctaion_data=$_SESSION['location'];
	  $hiddenvalue=$_SESSION['hiddenvalue'];
	  	$_SESSION['membertype']=$_GET['PTI'];
	$membertype=$_SESSION['membertype'];
	
	}
	
	elseif(isset($_SESSION['category']) && $_SESSION['hiddenvalue']!=3)  { 
 $serch_data=$_SESSION['category'];
  $Loctaion_data=$_SESSION['location'];
   $hiddenvalue=$_SESSION['hiddenvalue'];

	$membertype=$_SESSION['membertype'];
  

	}
	else {
	
	$Loctaion_data=$_SESSION['location'];
		$membertype=$_SESSION['membertype'];
	  $hiddenvalue=3;
	}
	
	

  if($hiddenvalue=='1') 
  {
$Search_SQL=$conn->prepare("SELECT * FROM cmg_basic_inf0_ti a , cmg_courses b WHERE a.UMID=b.UMID AND a.city='".$_SESSION['currentcity']."' AND a.membertype='$membertype' AND a.location LIKE '$Loctaion_data%' AND b.coursename  LIKE  '$serch_data%' AND a.status=1  GROUP BY a.UMID ORDER BY $sortedvale "); 
$serch_dataSE='selected';
  }
  elseif($hiddenvalue=='2') { 
  $Search_SQL=$conn->prepare("SELECT * FROM cmg_basic_inf0_ti a , cmg_registration b WHERE a.UMID=b.UMID AND a.city='".$_SESSION['currentcity']."' AND b.Are_u_an='$membertype' AND b.institute_dname='$serch_data' AND a.location like '%$Loctaion_data%' AND b.status=1 AND b.email_verification=1 GROUP BY a.UMID ORDER BY $sortedvale ");
  $serch_dataSE='';
  }
  
  elseif($hiddenvalue==3 && !empty($Loctaion_data)) { 
$Search_SQL=$conn->prepare("SELECT * FROM cmg_basic_inf0_ti a , cmg_registration b WHERE a.UMID=b.UMID AND a.city='".$_SESSION['currentcity']."' AND b.Are_u_an='$membertype' AND a.location like '%$Loctaion_data%' AND b.status=1 AND b.email_verification=1 GROUP BY a.UMID ORDER BY $sortedvale ");
 $serch_dataSE='';
  }
   else { 
$Search_SQL=$conn->prepare("SELECT * FROM cmg_basic_inf0_ti a , cmg_registration b WHERE a.UMID=b.UMID AND a.city='".$_SESSION['currentcity']."' AND b.Are_u_an='$membertype' AND a.location='null' AND b.status=1 AND b.email_verification=1 GROUP BY a.UMID ORDER BY $sortedvale ");
 $serch_dataSE='';
  }
   
   
  
  
$Search_SQL->execute();
$Search_SQLR= $Search_SQL->fetchAll(); 


       

foreach ($Search_SQLR as $Search_SQLRS) {                     
									    
 $imge_category  = fetchsingle('cmg_registration',array('UMID' => $Search_SQLRS['UMID']));	
 
 

									
                                    ?>    
                                        		  
						  <div class="col-md-4 col-xs-12 search_result">
                             
                             <div style="height:110px;"> 
							 <?php
										
										if(!empty($imge_category['pr_images']))
										{
											//if($Search_SQLRS['Are_u_an']=='Institute'){ $valu=9; }  else  { $valu=4;  }
										?>
                                        <img src="<?=$UDS;?>image/proimages/<?=$imge_category['pr_images'];?>" height="100" width="121" align="middle" >
                                        <?php } else {  ?>
                                        
                                          <img src="<?=$UDS;?>image/profilepic.jpg" class="img-responsive ser-img" align="middle">
                                          
                                          <?php }?>

						</div>
                               
							   <h5><?=ucfirst($Search_SQLRS['instituename']);?> </h5>
							   <h6><?=$Search_SQLRS['phone'];?></h6>
							   <h6><?=$Search_SQLRS['location'];?></h6>
							   <h6><b><?=$Search_SQLRS['city'];?></b></h6>
							  
							   <div class='selectBox' style="width:95%">
			                   
 <select  class="form-control formw chnagsoit"  style="width:100%; text-align:center;" name="course" required>
                        
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
					
				
					$nocourse=0;
foreach ($courselist as $courselistV) { $nocourse++; ?>
                    <option value="<?=$imge_category['u_url'];?>"><?=$courselistV['coursename'];?></option>
                    
                    
                    <?php  } if($hiddenvalue==1) { ?>
                          <option value="<?=$imge_category['u_url'];?>" <?=$serch_dataSE;?>><?=$serch_data;?></option>
                     
                         <?php } if($nocourse==0){ 
						 
						
						 echo '	<option> No Course</option>';
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
                          
                         // if($imge_category['verify_status']==1){ echo '<i class="fa fa-thumbs-o-up" title="Verified"></i> &nbsp;&nbsp;&nbsp;'; } ?> </span>
							   
					<div class="details"><a href="<?=$domainname;?>Trainer-Institue/Post/Profile/<?=$imge_category['u_url'];?>/#View">Click Here To See Details</a></div>
						  </div><!--/#Search Result-->
						  
								<?php } } ?>	
                                </div>
                               <div id='page_navigation' style="margin-top:50px;"></div>	
                             </div>   	  						  						  
						   
						 					    
					</div><!--/#All Search Result-->
					
					<div class="col-md-3 col-sm-12 col-xs-12 adv">
					   
					    <div id="services"><h2>Advertiesment</h2></div>
						<br>
						  <?php  include('search_advright.php'); ?>						
						
					</div><!--/#Advertisement-->
					
				</div><!--/#Right Side-->
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#services-->


    <?php include("controller/footer.php"); ?>