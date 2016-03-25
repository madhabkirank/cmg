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
				   
				   
				   

		   
           <div class="col-md-9 col-sm-12">
				      <div class="trainer-right" id="profile">
					   
					    <h3 class="pleft">Message Box</h3>
                        <br>
                          <h5 class="pleft"><a href="Message#profile" style="color:#DF6C02" > Message From General [<?php echo $num_rows_POST = num_rows('cmg_message',array('UMID_from' => $_SESSION['s-UMID'],'category' => 'General','from_message'=>'trainer','new_status'=>0)); ?>] </a>&nbsp; <a href="Message_followers#profile" >Message From Followers[<?php echo $num_rows_POST = num_rows('cmg_message',array('UMID_from' => $_SESSION['s-UMID'],'category' => 'Followers','from_message'=>'trainer','new_status'=>0)); ?>]</a></h5>
						
						
						
					    <div class="clearfix"></div>
						<?php $toatlmessage=0;
						
$DataMessage=$conn->prepare("SELECT * FROM (SELECT * FROM cmg_message WHERE `UMID_from`='".$_SESSION['s-UMID']."' AND category='General' AND from_message='trainer' ORDER BY `id` DESC) cmg_message GROUP BY `UMID_to` ORDER BY `id` DESC ");
	
$DataMessage->execute();

$DataMessage= $DataMessage->fetchAll();	

						


foreach ($DataMessage as $DataMessageFE) {                     
	
		$toatlmessage++;		
			
$unreadmessage  = num_rows('cmg_message',array('UMID_to' => $DataMessageFE['UMID_to'],'UMID_from' => $_SESSION['s-UMID'],'from_message'=>'trainer','new_status'=>0,'category' => 'General'));
			 
$unreadmessagenew=num_rows('cmg_message',array('UMID_to' => $DataMessageFE['UMID_to'],'UMID_from' => $_SESSION['s-UMID'],'from_message'=>'trainer','category' => 'General'));			 			    
 $imge_category  = singlefetch('cmg_registration',array('UMID' => $DataMessageFE['UMID_to']));	
 
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
					    <h3><?=ucfirst($imge_category['institute_dname']);?> <span> <?=$DataMessageFE['date'];?> <?=$DataMessageFE['time'];?></span></h3>
					<?=ucfirst(nl2br($DataMessageFE['message_text']));?>
					     <?php if($unreadmessage>0){?><a href="User-Message-Chat-general.php?Message_ID=<?=$DataMessageFE['UMID_to'];?>#Sprofile"><div class="reply"> &nbsp; Reply</div></a> &nbsp;<a href="User-Message-Chat-general.php?Message_ID=<?=$DataMessageFE['UMID_to'];?>#Sprofile"><div class="reply" style="background:#DF6C02">&nbsp;<?=$unreadmessage;?> - Unread</div></a> <?php } else { ?> 
<a href="User-Message-Chat-general.php?Message_ID=<?=$DataMessageFE['UMID_to'];?>#Sprofile"><div class="reply"> &nbsp;<?=$unreadmessagenew;?> - Reply</div></a> &nbsp;
<?php } ?>
					</div>
					
					<div class="clearfix"></div>
				</div><!-- Stud MSG -->	
                	<hr>
                <?php }
				if($toatlmessage==0)
			{
			echo "<p style='text-align:center'>Your General Message box is empty.</p>";
			}
				
				
				 ?>	
				
			
				
			
					    
					  </div>		
					  </div>
           
           				
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#services-->

<?php include("../controller/footer.php"); ?>
