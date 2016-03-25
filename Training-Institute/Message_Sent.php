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
				   
				   
				   

		   
           <div class="col-md-9 col-sm-12">
				      <div class="trainer-right">
					   
					    <h3 class="pleft">Message Box</h3><br>
						  <h5 class="pleft"><a href="Message">Trainer_Message </a>&nbsp; <a href="Message_Sent" style="color:#DF6C02">Sent_Message</a></h5>
						<!-- <select class="trainer-post1 stud_msg_right"><option>All</option><option>All</option></select> -->
						
					    <div class="clearfix"></div>
						<?php 
						
						
						$DataMessage= fetchDESCNN('cmg_message',array('UMID_from' => $_SESSION['UMID'],'from_message' => 'trainer'));
				
			

foreach ($DataMessage as $DataMessageFE) {                     
			 $Repytotal  = num_rows('cmg_message_chat',array('post_ID' => $DataMessageFE['id']));				
						    
 $imge_category  = fetchsingle('cmg_registration',array('UMID' => $DataMessageFE['UMID_from']));	
 
 ?>
						
				<div class="stud_msg">
				    <div class="col-md-2 col-sm-12">
                    
                   
                    
                    <?php
					
					if(!empty($imge_category['pr_images']))
										{
									
										?>
                                        <img src="<?=$UDS;?>image/proimages/<?=$imge_category['pr_images'];?>" height="55" width="90" align="middle">
                                        <?php } else {  ?>
                                        
                                          <img src="<?=$UDS;?>image/profilepic.jpg"  align="middle" height="75" width="111">
                                          
                                          <?php }?>
                    </div>
					<div class="col-md-10 col-sm-12">
					    <h3><?=ucfirst('You');?> <span> <?=$DataMessageFE['date'];?> <?=$DataMessageFE['time'];?></span></h3>
					<?=$DataMessageFE['message_text'];?>
					   <a href="User-Message-Chatsent.php?Message_ID1=<?=$DataMessageFE['id'];?>"><div class="reply"><?=$Repytotal;?> - Replay</div></a>
					</div>
					
					<div class="clearfix"></div>
				</div><!-- Stud MSG -->	
                	<hr>
                <?php } ?>	
				
			
				
			
					    
					  </div>		
					  </div>
           
           				
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#services-->

<?php include("../controller/footer.php"); ?>
