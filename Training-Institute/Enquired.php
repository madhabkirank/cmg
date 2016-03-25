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
				   
				   
				   

		   
           <div class="col-md-9 col-sm-12" id="Profile">
		   
		     <div class="stud-top-left"><a href="Dashboard#Profile">Post</a></div>
			 <div class="senquiry"><?=$num_rows_POST1 = num_rows('cmg_post_chat',array('UMID_T' => $_SESSION['UMID'],'replyt_to' => 'trainer','read_status'=>0));?></div>
			 <div class="stud-top-right"><a href="Enquired#Profile">Enquiry</a></div>
			 <div class="clearfix"></div>
		   
		   
				      <div class="search-right">
                      
               
			
			<div id="tabs" class="tabs">
					







 <?php    if(isset($_GET['sharewith']))
						   {
							$general=$_GET['sharewith']; 
							$bgact='#3A5F6F'; $folooertext='Followers'; $bgactm='#fff';
							  
						   } else { $general= 'general'; $bgact1='#3A5F6F'; $bgactm1='#fff'; $folooertext='General'; }
						    ?>
			
			<div id="tabs" class="tabs">
				<nav>
					<ul>
						<li><a href="Enquired#Profile" style="background:<?=$bgact1;?>; color:<?=$bgactm1;?>;"  ><span><i class="fa fa-random"></i> Public</span> [

<?php  $dataFETCHsds = fetchDESCNN('cmg_create_post',array('UMID' => $_SESSION['UMID'],'sharewith' =>'general'));

$letstnoofpost=0;

foreach ($dataFETCHsds as  $dataFETCHVwww) {
	
$num_rows_POSTds = num_rows('cmg_post_chat',array('post_ID' => $dataFETCHVwww['id'],'replyt_to' => 'trainer','read_status'=>0));
$letstnoofpost=$letstnoofpost+$num_rows_POSTds;

} if($letstnoofpost<=0) { $ncolorb='#fff';} else { $ncolorb='#D87114'; } echo '<span style="color:'.$ncolorb.'">'.$letstnoofpost.'</span>'; ?>

]</a></li>
						<li><a href="Enquired.php?sharewith=followers#Profile" style="background:<?=$bgact;?>; color:<?=$bgactm;?>;"  ><span> <i class="fa fa-thumbs-o-up"></i> Followers</span> [

<?php  $dataFETCHddd= fetchDESCNN('cmg_create_post',array('UMID' => $_SESSION['UMID'],'sharewith' =>'Followers'));

$letstnoofpost=0;

foreach ($dataFETCHddd as  $dataFETCHVdd) {
	
$num_rows_POSTdd = num_rows('cmg_post_chat',array('post_ID' => $dataFETCHVdd['id'],'replyt_to' => 'trainer','read_status'=>0));
$letstnoofpost=$letstnoofpost+$num_rows_POSTdd;

}  if($letstnoofpost<=0) { $ncolorb1='#fff';} else { $ncolorb1='#D87114'; } echo '<span style="color:'.$ncolorb1.'">'.$letstnoofpost.'</span>'; ?>

]</a></li>
					</ul>
				</nav>
		












				<div class="content">
					<section id="section-1" style="padding:3em 6px;">
                        <h3>All Enquired  Post</h3>
						<!-- <h4><a href="#">Click here to view all Enquires</a></h4>  -->
						<div class="clearfix"></div>
						
                            
                              <?php
						   
						
						 $dataFETCH = fetchDESCNNAS('cmg_create_post',array('UMID' => $_SESSION['UMID'],'sharewith' => $general));



foreach ($dataFETCH  as  $dataFETCHV) {
	
	$num_rows_POST = num_rows('cmg_post_chat',array('post_ID' => $dataFETCHV['id'],'replyt_to' => 'trainer','read_status'=>0));
		$num_rows_POSTnew = num_rows('cmg_post_chat',array('post_ID' => $dataFETCHV['id'],'replyt_to' => 'trainer'));
	if($num_rows_POST>0)
	{
  $imge_category  = fetchsingle('cmg_registration',array('UMID' => $dataFETCHV['UMID']));
						   
						   ?>   
                              
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
					    <h3><?=$dataFETCH_StudentdatDATA['username'];?>  <span> <?=date("d/m/Y", strtotime($dataFETCHVEN['date'])).' '.$dataFETCHVEN['time'];?></span></h3>
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
                    <?php } } ?>									
					</section>
					
					
					
					
				</div><!-- /content -->
			</div><!-- /tabs -->
            
           

 </div>
				    	                        
				
            </div>
           
           				
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#services-->

<?php include("../controller/footer.php"); ?>
