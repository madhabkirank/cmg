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
					   
					    <h3 class="pleft">Messsage Chat Box</h3>
					
						
					    <div class="clearfix"></div>
						
					 <?php
					  $messageid=$_GET['Message_ID1'];  
					  
					  $Mess_Fetch= fetchsingle('cmg_message',array('id' => $messageid));
					  
					   $dataFETCH_TrainerDATA= fetchsingle('cmg_registration',array('UMID' => $Mess_Fetch['UMID_from']));




	
	?>	
				<div class="stud_msg">
				    <div class="col-md-2 col-sm-12"><img src="<?=$UDS;?>image/proimages/<?=$dataFETCH_TrainerDATA['pr_images'];?>" class="img-responsive"></div>
					<div class="col-md-10 col-sm-12">
					    <h3><?php   if(isset($_GET['Message_ID'])) { echo $dataFETCH_TrainerDATA['username']; } else {  echo 'You'; }?>  <span> <?=$Mess_Fetch['time'].' '.$Mess_Fetch['date'];?></span></h3>
					  
                      <?=$Mess_Fetch['message_text'];?>
                      
					
					</div>
					
					<div class="clearfix"></div>
				</div><!-- Stud MSG -->		
				
				<hr>
				
                <?php
					  
$dataFETCH_PST_E_GEN= fetchASC('cmg_message_chat',array('post_ID' => $messageid,'UMID_T' => $_SESSION['UMID']));

foreach ($dataFETCH_PST_E_GEN  as  $dataFETCH_P_G) {

if($dataFETCH_P_G['replyt_to']=='student')
{
	
	?>	<div class="stud_msg">
				
				<div style="padding:5px; border-left:3px solid #0661AC;">
					    <h3><?=$dataFETCH_P_G['time'].' '.$dataFETCH_P_G['date'];?>  <span> YOU </span></h3>
			<?=$dataFETCH_P_G['message'];?>
					 
					</div>
					
				</div>
                
				
                
                
                <?php }  else {  ?>
                <!-- Stud MSG -->		
				
                <div class="stud_msg">
				
				<div style="padding:5px;">
					    <h3><?=$dataFETCH_TrainerDATA['username'];?>  <span> <?=$dataFETCH_P_G['time'].' '.$dataFETCH_P_G['date'];?></span></h3>
			<?=$dataFETCH_P_G['message'];?>
					 
					</div>
					
				</div>
                
                <?php } }  ?>
				
			
                
                
                <div style="height:60px; margin-top:30px; width:100%;">
                      
                      
                      <form action="" method="post">
                      
                      <div class="col-md-10"> 
                      <input type="hidden" name="UMID_S" value="<?=$Mess_Fetch['UMID_to'];?>">
                       <input type="hidden" name="replyt_to" value="student">
                        <input type="hidden" name="post_type" value="general">
                        <input type="hidden" name="post_ID" value="<?=$messageid;?>">
                       
                       
                     <?php  $inactiveMember= num_rows('cmg_registration_s',array('UMID' =>$Mess_Fetch['UMID_to'],'status'=>1));

if($inactiveMember==1){ ?>
                       
                      <textarea  class="search-post" name="message" placeholder="Enter Post Details" style="height:60px;"> </textarea></div> 
								  <div class="col-md-2">
                                  <input type="submit" class="btn mybtn" name="message_general_enquiry"  value="SEND">
                                  </div>
                       <?php } else { ?>

<p>This Student Account currently Detective Mode</p>

<?php } ?>

                      
                      </form>
                      
                      
                      </div>
					    
					  </div>		
					  </div>
           
           				
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#services-->

<?php include("../controller/footer.php"); ?>
