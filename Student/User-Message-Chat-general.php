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
				   
				   
				   

		   
           <div class="col-md-9 col-sm-12">
				      <div class="trainer-right">
					   
					    <h3 class="pleft">Messsage Chat Box</h3>
					<div class="backcl"><a href="Message#profile">Back</a></div>
						
					    <div class="clearfix"></div>
						
					 <?php
				
					
						
$DataMessage=$conn->prepare("SELECT * FROM cmg_message WHERE `UMID_from`='".$_SESSION['s-UMID']."' AND category='General' AND UMID_to='".$_GET['Message_ID']."'  ");
	
$DataMessage->execute();

$dataFETCH_PST_E_GEN= $DataMessage->fetchAll();	
				
				   $dataFETCH_TrainerDATA= singlefetch('cmg_registration',array('UMID' => $_GET['Message_ID']));
					  
foreach ($dataFETCH_PST_E_GEN  as  $dataFETCH_P_G) {


			if($dataFETCH_P_G['new_status']!=1 && $dataFETCH_P_G['from_message']=='trainer')
			{ $unred='<div class="unread" >UR</div>';
			} else {
				 $unred="";
			}	  
					
					  
					



if($dataFETCH_P_G['from_message']=='student')
{
	
	?>	<div class="stud_msg">
				
				<div style="padding:5px; border-left:3px solid #0661AC;">
					    <h3><?=$dataFETCH_P_G['time'].' '.$dataFETCH_P_G['date'];?>  <span> YOU </span></h3>
			<?=ucfirst($dataFETCH_P_G['message_text']);?>
					 <?=$unred;?>
					</div>
					
				</div>
                
				
                
                
                <?php }  else {  ?>
                <!-- Stud MSG -->		
				
                <div class="stud_msg">
				
				<div style="padding:5px;">
					    <h3><?=ucfirst($dataFETCH_TrainerDATA['institute_dname']);?>  <span> <?=$dataFETCH_P_G['time'].' '.$dataFETCH_P_G['date'];?></span></h3>
			<?=ucfirst(nl2br($dataFETCH_P_G['message_text']));?>
					  <?=$unred;?>
					</div>
					
				</div>
                
                <?php } }  ?>
				
			
                <div id="Sprofile"></div><div id="Profile"></div>
                
                <div style="height:60px; margin-top:30px; width:100%;">
                      
                      
                      <form action="" method="post">
                      
                      <div class="col-md-10"> 
                      <input type="hidden" name="toid" value="<?=$_GET['Message_ID'];?>#General">
                                          
                       
                       
                       <?php  $inactiveMember= num_rows('cmg_registration',array('UMID' =>$_GET['Message_ID'],'status'=>1));

if($inactiveMember==1){ ?>
                       
                      <textarea  class="search-post" name="messagebox" required placeholder="Type Your Message" style="height:60px;"></textarea></div> 
								  <div class="col-md-2">
                                  <input type="submit" class="btn mybtn" name="sendamessage"  value="SEND">
                                  </div>
                       <?php } else { ?>

<p>This Student Account currently Detective Mode</p>

<?php }

	
$cmg_messageUP=$conn->prepare("UPDATE `cmg_message` SET `new_status`=1 WHERE `UMID_from`='".$_SESSION['s-UMID']."' AND `UMID_to`='".$_GET['Message_ID']."' AND `from_message`='trainer' AND category='General' ");
$cmg_messageUPR=$cmg_messageUP->execute();


 ?>

                      
                      </form>
                      
                      
                      </div>
					    
					  </div>		
					  </div>
           
           				
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#services-->

<?php include("../controller/footer.php"); ?>
  
