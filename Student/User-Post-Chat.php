<?php ob_start();
 $UDS='../';  $M2='a'; echo '<input type="hidden" value="../" class="UID">';
include("../controller/header.php"); 
include('Student_Session.php');
include("controller/insert_SQL_Controller.php"); 
?>

    <section id="services" class="service-item">   
	   <div class="container">   
            <div class="row" > 
                
			<?php include('controller/student_leftmenu.php'); ?>
				   
				   
				   

		   
           <div class="col-md-9 col-sm-12" >
				      <div class="trainer-right">
					   
					    <h3 class="pleft">Post Chat Box</h3>
					<div class="backcl"><a href="Enquiry#Profile">Back</a></div>
						
					    <div class="clearfix"></div>
						
					 <?php
					  
					  $dataFETCH_Spost_General= singlefetch('cmg_create_post',array('id' => $_GET['Post_ID']));
					  
					   $dataFETCH_TrainerDATA= singlefetch('cmg_registration',array('UMID' => $dataFETCH_Spost_General['UMID']));




	
	?>	
				<div class="stud_msg">
				    <div class="col-md-2 col-sm-12"><img src="<?=$UDS;?>image/proimages/<?=$dataFETCH_TrainerDATA['pr_images'];?>" class="img-responsive"></div>
					<div class="col-md-10 col-sm-12">
					    <h3><?=$dataFETCH_TrainerDATA['institute_dname'];?>  <span> <?=$dataFETCH_Spost_General['time'].' '.$dataFETCH_Spost_General['date'];?></span></h3>
					  
                      <?=nl2br($dataFETCH_Spost_General['post_text']);?>
                      <br><br>
					   <?php if(!empty($dataFETCH_Spost_General['youtube_link']) && $dataFETCH_Spost_General['youtube_link']!=1) {  ?>

<div style="text-align:center">
							<iframe width="450" height="315" src="<?=$dataFETCH_Spost_General['youtube_link'];?>" frameborder="0" allowfullscreen></iframe></div>
                            
                            <?php } ?>
                            
                             <?php if(!empty($dataFETCH_Spost_General['attached_photos'])) { ?>
							<img width="450" height="315" src="<?=$UDS;?>image/postimages/<?=$dataFETCH_Spost_General['attached_photos'];?>" />
                            
                            <?php } ?>
							


					</div>
					
					<div class="clearfix"></div>
				</div><!-- Stud MSG -->		
				
				<hr>
				
                <?php
					  
$dataFETCH_PST_E_GEN= fetchASC('cmg_post_chat',array('post_ID' => $_GET['Post_ID'],'UMID_S' => $_SESSION['s-UMID']));

foreach ($dataFETCH_PST_E_GEN  as  $dataFETCH_P_G) {

if($dataFETCH_P_G['replyt_to']=='trainer')
{
	
	?>	<div class="stud_msg">
				
				<div style="padding:5px; border-left:3px solid #0661AC;">
					    <h3><?=$dataFETCH_P_G['time'].' '.$dataFETCH_P_G['date'];?>  <span> YOU </span></h3>
			<?=nl2br($dataFETCH_P_G['message']);?>
					 
					</div>
					
				</div>
                
				
                
                
                <?php }  else {  ?>
                <!-- Stud MSG -->		
				
                <div class="stud_msg">
				
				<div style="padding:5px;">
					    <h3><?=$dataFETCH_TrainerDATA['username'];?>  <span> <?=$dataFETCH_P_G['time'].' '.$dataFETCH_P_G['date'];?></span></h3>
			
					<?=nl2br($dataFETCH_P_G['message']);?> 
					</div>
					
				</div>
                
                <?php } }  ?>
				
			
                <div id="Sprofile"></div>
<div id="Profile"></div>
                
                <div style="height:60px; margin-top:30px; width:100%;">
                      
                      
                      <form action="" method="post">
                      
                      <div class="col-md-10"> 
                      <input type="hidden" name="UMID_T" value="<?=$dataFETCH_Spost_General['UMID'];?>">
                       <input type="hidden" name="replyt_to" value="trainer">
                        <input type="hidden" name="post_type" value="general">
                        <input type="hidden" name="post_ID" value="<?=$_GET['Post_ID'];?>">
                       
                       
                       <?php  $inactiveMember= num_rows('cmg_registration',array('UMID' =>$dataFETCH_Spost_General['UMID'],'status'=>1));

if($inactiveMember==1){ ?>


                       
<textarea  class="search-post" name="message" placeholder="Enter Post Details" style="height:60px; padding:4px" required ></textarea></div> 
								  <div class="col-md-2">
                                  <input type="submit" class="btn mybtn" name="post_general_enquiry"  value="SEND">
                                  </div>
                      
<?php } else { ?>

<p>This Institute is currently Detective Mode</p>

<?php }


$updatepost=$conn->prepare("UPDATE  `cmg_post_chat` SET `read_status`=1 WHERE `post_ID`='".$_GET['Post_ID']."' AND `replyt_to`='student' ");
$updatepost->execute();

 ?>

                      
                      </form>
                      
                      
                      </div>
					    
					  </div>		
					  </div>
           
           				
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#services-->

<?php include("../controller/footer.php"); ?>
