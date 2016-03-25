<?php $UDS=''; include("controller/header.php");

include("controller/insert_SQL_Controller.php"); 

 ?>


    <section id="services" class="service-item">
	   <div class="container">
          		 						

<style>
h4{     font-size: 13px;
    color: #3A5F6F;
    font-weight: bold;
} 
a{

    color: #A8C4D0;
    font-size: 13px;
}
</style>

<div class="row" style="width: 75%; margin: auto;text-align: justify;">
	      	
	      	<div class="span12">
	      		
	      		<div class="widget">
						
					<div class="widget-header">
						<i class="icon-pushpin"></i>
<h3 class="faqclass">Coupon Help</h3>
					</div> <!-- /widget-header -->
					
					<div class="widget-content">
					<div class="faq-container" >

<?php
				$cmg_alltext=$conn->prepare("select * from cmg_alltext WHERE `category`='Coupon_Help' AND `status`=1 ORDER BY 	`id` DESC ");
$cmg_alltext->execute();
$cmg_alltextF= $cmg_alltext->fetch();
				?>
              <?=$cmg_alltextF['text'];?>
</div>
						
						
					</div> <!-- /widget-content -->
						
				</div> <!-- /widget -->	
				
		    </div> <!-- /spa12 -->
		    
		    
		    
		    
	      	
	      	
	      	
	      </div>

        </div><!--/.container-->
    </section><!--/#services-->


   <?php include("controller/footer.php"); ?>