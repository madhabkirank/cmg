<?php ob_start();
 $UDS='../';  $M2='a'; echo '<input type="hidden" value="../" class="UID">';
include("../controller/header.php"); 
include('Institute_Session.php');
include("controller/insert_SQL_Controller.php"); 
?>

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
						   

		   
           <div class="col-md-9 col-sm-12" id="Profile" style="border: 1px solid #C7C6C6;">
		    <div class="stud-top-left"><a href="Dashboard#Profile" style="color:#fff">Posts from Trainers</a></div>
			  <div class="senquiry"><?=$letstnoofpost+$geengt?></div>
			 <div class="stud-top-right"><a href="Enquiry#Profile" style="color:#fff">Reply from Trainer to your Enquiry</a></div>
			 <div class="clearfix"></div>
		<br>
		<div id="tabs" class="tabs">
        <nav>
					<ul>
                    
<li><a href="Enquiry#Profile" style="background:<?=$bgact;?>; color:<?=$bgactm;?>;"  ><span> <i class="fa fa-thumbs-o-up"></i> Following Enquiry</span> [ <?php if($letstnoofpost>0) { $ncolorb1='#D87114';} else { $ncolorb1='#fff'; } echo '<span style="color:'.$ncolorb1.'">'.$letstnoofpost.'</span>'; ?> ]</a></li>
                    
						<li><a href="Enquiry.php?general=general#Profile" style="background:<?=$bgact1;?>; color:<?=$bgactm1;?>;"  ><span><i class="fa fa-random"></i> General Enquiry</span> [  <?php if($geengt>0) { $ncolorb1='#D87114';} else { $ncolorb1='#fff'; } echo '<span style="color:'.$ncolorb1.'">'.$geengt.'</span>'; ?> ]</a></li>
						
					</ul>
				</nav>
        </div>
		<input type='hidden' id='current_page' />
	<input type='hidden' id='show_per_page' />
		<div id='content'>
        <?php 

//$result = fetch('cmg_create_post',array('UMID' => '1CMG-S-5620c37109108' )); 

 if(isset($_GET['general']))
						   {

$a ="SELECT * FROM cmg_create_post WHERE sharewith='general'  ORDER BY id DESC";

						   } else {
							   
							   
							 $a ="SELECT cmg_create_post.post_text,cmg_create_post.id, cmg_create_post.time,cmg_create_post.date,cmg_create_post.UMID FROM cmg_create_post JOIN cmg_follow ON cmg_create_post.UMID = cmg_follow.UMID_T AND cmg_create_post.sharewith='followers' AND cmg_follow.UMID_S='".$_SESSION['s-UMID']."' AND cmg_follow.follow_status=1 ORDER BY cmg_create_post.id DESC";  
						   }

$query = $db->query($a);   
$result = $query->fetchAll();
foreach ($result as $value){
	 $newsetcheckpost= num_rows('cmg_post_chat',array('post_ID' => $value['id'],'UMID_S' => $_SESSION['s-UMID'],'replyt_to' => 'student'));
	 
	 if($newsetcheckpost>0)
	 {
	 $imge_category  = singlefetch('cmg_registration',array('UMID' => $value['UMID']));
?>







<div class="paginationset">

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
						
						      <a href="User-Post-Chat.php?Post_ID=<?=$value['id'];?>#Profile"> <button type="button" class="btn senquiry">Enquired</button></a>
						 </div>
						
						
						</div>
						
					<div class="clearfix"></div>
					
					</div>
					
      <?php
					  $dataFETCH_PST_E_GEN= fetchADESCM('cmg_post_chat',array('post_ID' => $value['id'],'UMID_S' => $_SESSION['s-UMID'],'replyt_to'=>'student'));

foreach ($dataFETCH_PST_E_GEN  as  $dataFETCH_P_G) { 
if($dataFETCH_P_G['replyt_to']=='trainer')
{ }  else {  ?>
                <div class="col-md-12">
				
				<div class="sender_post">
				    <div class="col-md-2 col-sm-12"> <img src="<?=$UDS;?>image/proimages/<?=$imge_category['pr_images'];?>" height="55" width="90" align="middle"></div>
					<div class="col-md-10 col-sm-12">
					    <h3><?=$imge_category['institute_dname'];?>  <span> <?=$dataFETCH_P_G['time'].' '.date("d/m/Y", strtotime($dataFETCH_P_G['date'])); ?></span></h3>
					  <?=$dataFETCH_P_G['message'];?>
					  <a href="User-Post-Chat.php?Post_ID=<?=$value['id'];?>#Profile">  <div class="reply" >&nbsp; Reply</div></a>
                      
                      <?php if($dataFETCH_P_G['read_status']==0)
					  {
						  ?> <a href="User-Post-Chat.php?Post_ID=<?=$value['id'];?>#Profile">  <div class="reply" style="background: #F67F15;" >New</div></a> <?php
					  } else { }  ?>
                      
                    
					</div>
				</div><!-- Sender Post-->



<!-- Modal -->








				
				</div>
                <?php } } ?>
                 
						<div class="clearfix"></div>
                        
				
					 <a href="User-Post-Chat.php?Post_ID=<?=$value['id'];?>#Profile"> Check All conversation</a>
					


		 </div>	
					
<?php }  } ?>
        <div class="clearfix"></div>
      <hr>
					</div>
				 	<div id='page_navigation'></div>	
					
					
					  </div>
           
           				
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#services-->

<?php include("../controller/footer.php"); ?>
