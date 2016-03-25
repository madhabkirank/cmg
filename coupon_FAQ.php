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
<h3 class="faqclass"  >Frequently Asked Questions</h3>
					</div> <!-- /widget-header -->
					
					<div class="widget-content">
					<div class="faq-container" >

<div class="faq-toc"><ol class="ollsi">

    <?php 
$i=1;
$dataFetch_institue= fetchASC('cmg_faq',array('status' =>  1));
foreach ($dataFetch_institue as $DFinstitue) {
	
	?>
<li><?=$i;?>. <a href="#faq-<?=$DFinstitue['id'];?>"><?=$DFinstitue['faq'];?></a></li>

<?php  $i++;}?>
<ol></div>
<ol class="faq-list ollsi">
	  <?php 
$j=1;
$dataFetch_institue1= fetchASC('cmg_faq',array('status' =>  1));
foreach ($dataFetch_institue1 as $DFinstitue1) {
	
	?>						
<li id="faq-<?=$DFinstitue1[id];?>"><div class="faq-icon"><div class="faq-number"><?=$j;?></div></div><div class="faq-text">
<h4><?=$DFinstitue1['faq'];?></h4>

<?=$DFinstitue1['text'];?>	
									
							</div></li>

<?php $j++; } ?>
							
							</ol></div>
						
						
					</div> <!-- /widget-content -->
						
				</div> <!-- /widget -->	
				
		    </div> <!-- /spa12 -->
		    
		    
		    
		    
	      	
	      	
	      	
	      </div>

        </div><!--/.container-->
    </section><!--/#services-->


   <?php include("controller/footer.php"); ?>