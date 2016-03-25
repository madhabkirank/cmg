<?php ob_start();
 $UDS='../'; echo '<input type="hidden" value="../" class="UID">';   $M2='a';
include("../controller/header.php"); 
include('controller/Institute_Session.php');
include("controller/insert_SQL_Controller.php"); 




?>

	
	</script>
    <section id="services" class="service-item">   
	   <div class="container">   
            <div class="row" > 
                
			<?php include('controller/student_leftmenu.php'); ?>
				   
				   
				    <?php    if(isset($_GET['general']))
						   {
							$general=$_GET['general']; 
							$bgact1='#3A5F6F'; $bgactm1='#fff'; $folooertext='General'; 
							  
						   } else { $bgact='#3A5F6F'; $folooertext='Followers'; $bgactm='#fff'; }
						   
						   
						   


$geengt=0;
$dataset ="SELECT * FROM cmg_create_post WHERE sharewith='general'  ORDER BY id DESC";
$datasetd = $db->query($dataset);   
$result12 = $datasetd->fetchAll();
foreach ($result12 as $value12){

	$num_rows_POSTddd = num_rows('cmg_post_chat',array('UMID_S' => $_SESSION['s-UMID'],'post_ID' => $value12['id'],'replyt_to' => 'student','read_status'=>0));

$geengt=$geengt+$num_rows_POSTddd;


}

 $dataFETCHsdsd ="SELECT cmg_create_post.id FROM cmg_create_post JOIN cmg_follow ON cmg_create_post.UMID = cmg_follow.UMID_T AND cmg_create_post.sharewith='followers' AND cmg_follow.UMID_S='".$_SESSION['s-UMID']."' AND cmg_follow.follow_status=1 ORDER BY cmg_create_post.id DESC";
$query = $db->query($dataFETCHsdsd);   
$dataFETCHsddss = $query->fetchAll();

$letstnoofpost=0;

foreach ($dataFETCHsddss as  $dataFETCHVdd) {
	
$num_rows_POSTdd = num_rows('cmg_post_chat',array('UMID_S' => $_SESSION['s-UMID'],'post_ID' => $dataFETCHVdd['id'],'replyt_to' => 'student','read_status'=>0));
$letstnoofpost=$letstnoofpost+$num_rows_POSTdd;

}
  ?>

		   
           <div class="col-md-9 col-sm-12" id="Profile">
		   
		     <div class="stud-top-left"><a href="Dashboard#Profile" style="color:#fff">Posts from Trainers</a></div>
			  <div class="senquiry"><?=$letstnoofpost+$geengt?></div>
			 <div class="stud-top-right"><a href="Enquiry#Profile" style="color:#fff">Reply from Trainer to your Enquiry</a></div>
			
			 
			 <div class="clearfix"></div>
			 
				      <div class="trainer-right">
					   
					    <h3 style="color:#f67f15; text-align:center;">Posts from Trainer Followed</h3>

	
				
        </div>	
		
			<input type='hidden' id='current_page' />
	<input type='hidden' id='show_per_page' />
			<div id='content'>			

<?php 
 

$a ="SELECT cmg_create_post.post_text,cmg_create_post.youtube_link,cmg_create_post.id, cmg_create_post.time,cmg_create_post.date,cmg_create_post.UMID FROM cmg_create_post JOIN cmg_follow ON cmg_create_post.UMID = cmg_follow.UMID_T AND cmg_create_post.sharewith='followers' AND cmg_follow.UMID_S='".$_SESSION['s-UMID']."' AND cmg_follow.follow_status=1 ORDER BY cmg_create_post.id DESC";
$query = $db->query($a);   
$result = $query->fetchAll();
foreach ($result as $value){
	 $newsetcheckpost= num_rows('cmg_post_chat',array('post_ID' => $value['id'],'UMID_S' => $_SESSION['s-UMID']));
	 
	 if($newsetcheckpost>0)
	 {
		 $enquierdtext='Enquired'; $ncolrbb="";
	 }else {
		 $enquierdtext='Enquiry'; $ncolrbb="#3A5F6F";
	 }
	 $imge_category  = singlefetch('cmg_registration',array('UMID' => $value['UMID']));
	
?>
						<!--/Trainern post--> 
					
					
					
					
					<div class="sespagination">
					
					
					
					
					
					<div class="search_post">
				      <div class="col-md-12 col-sm-12 col-xs-12 sptop">
					       <div class=" col-md-2 col-sm-12">
						  
                        <?php
                        if(!empty($imge_category['pr_images']))
										{
											
										?>
                                        <img src="<?=$domainname;?>image/proimages/<?=$imge_category['pr_images'];?>" class="img-responsive" align="middle" >
                                        <?php } else {  ?>
                                        
                                          <img src="<?=$domainname;?>image/profilepic.jpg" class="img-responsive ser-img" align="middle">
                                          
                                          <?php }?>
						
                           
						   </div>
						   <div class="col-md-5 col-sm-5 col-xs-12">
						   <h4> <?=$imge_category['institute_dname'];?></h4>
						     	   
                          
                          <?php if($imge_category['Are_u_an']=='Institute')
						  { echo '<i class="fa fa-home" title="Institute"></i> &nbsp;&nbsp;&nbsp;';} elseif($imge_category['Are_u_an']=='Trainer') { echo '<i class="fa fa-user" title="Trainer"></i> &nbsp;&nbsp;&nbsp;';} 
                          
                        //  if($trainer_details['verify_status']==1){ echo '<i class="fa fa-thumbs-o-up" title="Verified"></i> &nbsp;&nbsp;&nbsp;'; } ?> 
						</div>
						
						<div class="col-md-5 col-sm-5 col-xs-12">
						 <!-- <div class="search_enquiry1"><?=$num_rows_POST;?> New Enquiries</div> -->					  
						  <div class="search_post_time"><?=$value['time'] ?>- <?=date("d/m/Y", strtotime($value['date'])); ?></div>
						</div>
						
					  </div>
					  
					  <div class="col-md-12 col-sm-12" style="font-size:14px;text-align: justify; color: #8A8484;">
					    <?php if(!empty($value['youtube_link']) && $value['youtube_link']!=1) {  ?>

<div style="text-align:center">
							<iframe width="450" height="315" src="<?=$value['youtube_link'];?>" frameborder="0" allowfullscreen></iframe></div>
                            
                            <?php } ?>
                            
                             <?php if(!empty($value['attached_photos'])) { ?>
							<img width="450" height="315" src="<?=$UDS;?>image/postimages/<?=$value['attached_photos'];?>" />
                            
                            <?php } ?>
							<br>
					  
						<?=nl2br(substr($value['post_text'], 0, 500)); ?>
						
						
						<div class="showpostn<?=$value['id']?>" style="display:none">
<?=nl2br(substr($value['post_text'], 500, 500000)); ?> <br>
						  
							
							</div>
						<div class="search_post_txt">
						<br />
<img src="<?=$domainname;?>image/upd.png"  class="morevi" title='More' id='<?=$value['id']?>' style=" font-size: 25px;float: right; margin-right: -34px;color: #3A5F6F;"> &nbsp;&nbsp;
						      <a href="User-Post-Chat.php?Post_ID=<?=$value['id'];?>#Profile"> <button type="button" class="btn senquiry" style="background:<?=$ncolrbb;?>"><?=$enquierdtext;?></button></a>
						 </div>
						
						
						
						</div>
						
					<div class="clearfix"></div>
					
					</div>
					
				
					
					
					<hr>
					
					</div>
<?php } ?>


</div>



	<div id='page_navigation'></div>




					
									
						    
					  </div>		
					  </div>
           
           				
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#services-->

<?php include("../controller/footer.php"); ?>
