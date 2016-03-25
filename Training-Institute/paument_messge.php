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
				      <div class="search-right">
					   
                     
					  
              
                                
                 <div class="editprofileh mycolor" style="    text-align: center"> Proceed To Payment Process</div>
						   <div class="clearfix"></div>
						   
                   
                          
 <div style="width:320px; margin:50px auto; font-size:18px; text-align:center">      
			  

<?php if($_GET['message']=='Success')
{

echo 'Your payment completed successfully';
}
else {
echo 'Your payment not completed successfully';
}
		
			?>  
                        
    </div>
                        
                        
                        
                        
                        
						</div>		
						</div>				
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#services-->

<?php include("../controller/footer.php"); ?>