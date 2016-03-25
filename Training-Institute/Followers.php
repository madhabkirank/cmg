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
		   
		 
		   
				      <div class="search-right">
                      
                      
               <div class="trainer-right">
					   
					    <h3>Yours Followers</h3>
		
				<?php 
				
			
						$DataFolloW= fetchASC('cmg_follow',array('UMID_T' => $_SESSION['UMID'],'status'=>1));
				
			

foreach ($DataFolloW as $Search_SQLRS1) {                     
							
						    
 $imge_category  = fetchsingle('cmg_registration_s',array('UMID' => $Search_SQLRS1['UMID_S']));	
	
 
				 ?>
                
                
                
                
                
                <div class="col-md-4 col-xs-12 tainer-ser_result">
                             
                             <div style="height:110px;"> <?php
										
										if(!empty($imge_category['pr_images']))
										{
										
										?>
                                        <img src="<?=$UDS;?>image/proimages/<?=$imge_category['pr_images'];?>" style='width:100px; height:100px;' align="middle" style="padding-left: <?=$valu;?>px;">
                                        <?php } else {  ?>
                                        
                                          <img src="<?=$UDS;?>image/profilepic.jpg" class="img-responsive"  align="middle">
                                          
                                          <?php }?>

						</div>
                               
							   <h5><?=$imge_category['username'];?></h5>
							  
<div class="details"> <a data-toggle="modal" data-target="#myModalmessage" class="cursor sendamessage" >
                               
                               <input type="hidden" value="<?=$Search_SQLRS1['UMID_S'];?>#Followers" class="toid">
                               
                               <i class="fa fa-envelope font16"></i></a></div>
						  </div>
<?php } ?>
						  <!--/#Search Result-->
						  
        				  			  
						  <div class="clearfix"></div>
                         						  
			
						    
					  </div>       
                      
           
            
           

 </div>
				    	                        
				
            </div>
           
           				
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#services-->

<?php include("../controller/footer.php"); ?>
