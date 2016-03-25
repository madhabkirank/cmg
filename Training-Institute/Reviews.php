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
				   
				   
				   

		   
           <div class="col-md-9 col-sm-12" id='Profile'>
		   
		 
		   
				      <div class="trainer-right">
					   
					    <h3 class="pleft">Review (<?=$reviewsCOUNT;?>)</h3>
                       
						
						
					    <div class="clearfix"></div>
							<input type='hidden' id='current_page' />
	<input type='hidden' id='show_per_page' />
							<div id='content'>
						<?php 
						
			$dataFETCH_post_General= fetchDESCNN('cmg_reviews',array('UMID' => $_SESSION['UMID']));
foreach ($dataFETCH_post_General as $value) {
	if($value['status']==1)
	{$R_a='Report-Abuse'; $colornn='#E5AF0E';} else { $R_a='Report-Abused'; $colornn='#E50E0E';}
	
	
	
	
	$reviewstlike  = num_rows('cmg_review_like',array('reviw_id' => $value['id']));
	$trainer_details  = fetchsingle('cmg_registration_s',array('UMID' => $value['UIMD_s']));	
 
 ?>
						
				<div class="stud_msg">
				    <div class="col-md-2 col-sm-12">
                    
                  <img src="<?=$UDS;?>image/proimages/<?=$trainer_details['pr_images'];?>" height="55" width="90" align="middle"><br/>
                     <span><strong><?=ucfirst($trainer_details['username']);?></strong> <br>  </span> Review Id- <?=$value['id'];?>  
                                      
                    </div>
					<div class="col-md-10 col-sm-12" style="text-align:justify">
					 
					<?=nl2br($value['message']);?>                         <div style="display:none" class="reviewshow"></div> <br><br>
                       <?=$value['date'];?>  @ <?=$value['time'];?>
                        
                        <?php if($value['admin_s']==0)
	{?>
                      <div class="reply cursor abuse" style="background:<?=$colornn;?>" id='<?=$value['id'];?>'> &nbsp;&nbsp;<?=$R_a;?></div>
                      <?php } else { ?>  <div class="reply" style="background:#08732F" > &nbsp; &nbsp;Veryfied</div> <?php } ?>
                      
					  <div class="reply"> <?=$reviewstlike;?> Likes</div>
                     
					</div>
					
					<div class="clearfix"></div>
				</div><!-- Stud MSG -->	
                	
                <?php } ?>	
				
			
					</div>
				 	<div id='page_navigation'></div>
			 
					    
					  </div>
				    	                        
				
            </div>
           
           				
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#services-->

<?php include("../controller/footer.php"); ?>
