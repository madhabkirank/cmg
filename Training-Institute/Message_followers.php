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
		   
		 
		   
				      <div class="trainer-right" id="profile">
					   
					    <h3 class="pleft">Message Box</h3>
                        <br>
                        
						
						<h5 class="pleft"><a href="Message#profile"  > Message From General [<?php echo $num_rows_POST = num_rows('cmg_message',array('UMID_to' => $_SESSION['UMID'],'category' => 'General','from_message'=>'student','new_status'=>0)); ?>] </a>&nbsp; <a href="Message_followers#profile" style="color:#DF6C02" >Message From Followers [<?php echo $num_rows_POST = num_rows('cmg_message',array('UMID_to' => $_SESSION['UMID'],'category' => 'Followers','from_message'=>'student','new_status'=>0)); ?>]</a></h5>
						
					    <div class="clearfix"></div>
						<?php $toatlmessage=0;
						
$DataMessage=$conn->prepare("SELECT * FROM (SELECT * FROM cmg_message WHERE `UMID_to`='".$_SESSION['UMID']."' AND category='Followers' AND from_message='student' ORDER BY `id` DESC) cmg_message GROUP BY `UMID_from` ORDER BY `id` DESC ");
	
$DataMessage->execute();

$DataMessage= $DataMessage->fetchAll();	

						


foreach ($DataMessage as $DataMessageFE) {                     
	
		$toatlmessage++;		
			
$unreadmessage  = num_rows('cmg_message',array('UMID_to' => $_SESSION['UMID'],'UMID_from' => $DataMessageFE['UMID_from'],'from_message'=>'student','new_status'=>0,'category' => 'Followers',));
$unreadmessagenew  = num_rows('cmg_message',array('UMID_to' => $_SESSION['UMID'],'UMID_from' => $DataMessageFE['UMID_from'],'from_message'=>'student','category' => 'Followers',));
			 
			 			    
 $imge_category  = fetchsingle('cmg_registration_s',array('UMID' => $DataMessageFE['UMID_from']));	
 
 ?>
						
				<div class="stud_msg">
				    <div class="col-md-2 col-sm-12">
                    
                   
                    
                    <?php
					
					if(!empty($imge_category['pr_images']))
										{
									
										?>
                                        <img src="<?=$UDS;?>image/proimages/<?=$imge_category['pr_images'];?>" height="70" width="70" align="middle">
                                        <?php } else {  ?>
                                        
                                          <img src="<?=$UDS;?>image/profilepic.jpg"  align="middle" height="75" width="111">
                                          
                                          <?php }?>
                    </div>
					<div class="col-md-10 col-sm-12">
					    <h3><?=ucfirst($imge_category['username']);?> <span> <?=$DataMessageFE['date'];?> <?=$DataMessageFE['time'];?></span></h3>
					<?=ucfirst(nl2br($DataMessageFE['message_text']));?>
		  <?php if($unreadmessage>0){?>	<a href="User-Message-Chat.php?Message_ID=<?=$DataMessageFE['UMID_from'];?>#Profile"><div class="reply"> &nbsp; Reply</div></a> &nbsp;<a href="User-Message-Chat.php?Message_ID=<?=$DataMessageFE['UMID_from'];?>#Profile"><div class="reply" style="background:#DF6C02">&nbsp;<?=$unreadmessage;?> - Unread</div></a> <?php } else {  ?> 
		  			   <a href="User-Message-Chat.php?Message_ID=<?=$DataMessageFE['UMID_from'];?>#Profile"><div class="reply"> &nbsp; <?=$unreadmessagenew;?> - Reply</div></a> &nbsp;
					   
					   <?php } ?>
					</div>
					
					<div class="clearfix"></div>
				</div><!-- Stud MSG -->	
                	<hr>
                <?php }
				if($toatlmessage==0)
			{
			echo "<p style='text-align:center'>Your Followers Message box is empty.</p>";
			}
				
				
				 ?>	
				
			
				
			
					    
					  </div>
				    	                        
				
            </div>
           
           				
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#services-->

<?php include("../controller/footer.php"); ?>
