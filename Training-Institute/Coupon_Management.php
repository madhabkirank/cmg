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
		        	   
		              <div class="trainer-course">
					  
					  <div class="col-md-7"></div>
				<div class="col-md-5">
				  <a href="<?=$domainname;?>Coupon_Help" target="_blank"> <button type="button" class="btn help">Help</button></a>
				  <a href="Coupon-Create"> <button type="button" class="btn ad-crs">Create A Coupon</button></a>
				   <button type="button" class="btn plus">+</button>
				</div>
				   <div class="clearfix"></div>
				
					  <?php
					  
					  $dataFETCH_Coupon= fetchfeild('cmg_create_coupon',array('UMID' => $_SESSION['UMID']));



foreach ($dataFETCH_Coupon  as  $dataFETCH_Coupon) {
	
	  $expdaynew= fetchsingle('cmg_coupon_purchse',array('id' => $dataFETCH_Coupon['packages']));
	
	?>
					     <h3 style="margin:auto; text-align:center;"><?=ucfirst($dataFETCH_Coupon['coupon_titel']);?></h3>
					
						 <div class="clearfix"></div>
						 
						   <div class="trn-crs-main">
						   <div class='coupnadminnew'>
						       <?=$dataFETCH_Coupon['c_description'];?>
                               </div>
                               
                               	 <div class="btn trn-crs-btn coupondisname" >Rs. <?=$dataFETCH_Coupon['discount_value'];?><?=$dataFETCH_Coupon['discount_type'];?> Off</div>
                                 
                                   <div type="button" class="btn edit-crs" style="float:left; margin:15px 5px;"> 
                                   
                       <?php 
					 
					  $startdate=$dataFETCH_Coupon['date'];
					$todaydane=date('Y-m-d');
					  
					  $enddatenew = strtotime(date("Y-m-d", strtotime($startdate)) . " +".$expdaynew['exp_date']." day");
					 
					 if(strtotime($todaydane)<$enddatenew)
					 { 
					   
					   if($dataFETCH_Coupon['status']==1) { ?>              
<a href="controller/Delete_SQL_All.php?disable=<?=$dataFETCH_Coupon['id']?>&veryfy=0" onclick="return confirm('Are you sure you want to Disable?')"> Disable</a>
             
            <?php } elseif($dataFETCH_Coupon['status']==0) { ?>
            <a href="controller/Delete_SQL_All.php?disable=<?=$dataFETCH_Coupon['id']?>&veryfy=1" onclick="return confirm('Are you sure you want to Active?')"> Active</a>
            <?php } } else { ?>                       
                                <a > Expired</a>
                                <?php } ?>     
                                    </div>
                               <div class="col-md-9">
                               <div class="crs-detail" style="float:left"><?=$dataFETCH_Coupon['institude'];?> </div>
 <div class="crs-detail" style="float:left"> - <?=$dataFETCH_Coupon['location'];?></div>
  <div class="crs-detail" style="float:left"> &nbsp;&nbsp;&nbsp;
 <a data-toggle="modal" data-target="#myModal<?=$dataFETCH_Coupon['id'];?>"   class="cursor counnview">View Details</a></div>
                                 <div class="crs-detail" style="float:right">  Valid Upto- <?=$dataFETCH_Coupon['dov'];?></div>
							   </div>
							   
							   <div class="clearfix"></div>
							   
							
						   </div><!-- trn-crs-main -->
						   
						   
						   
                        <br><br>
						 <div id="myModal<?=$dataFETCH_Coupon['id'];?>" class="modal fade" >
    <div class="modal-dialog">
            <div class="modal-body">             
				<div class="row">			
					<!-- Article main content -->
					<article class="col-xs-12 maincontent" style="margin-top:160px">	
					
						<div class="col-md-12  col-sm-8 ">
							<div class="panel panel-default">
							
                         
                            
								<div class="panel-body">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									
									
									 <h3 style="float:left;"><?=$dataFETCH_Coupon['coupon_titel'];?></h3>
                                     <hr>

									 <div class="lightdetsil" ><br />
                                <?=trim(nl2br($dataFETCH_Coupon['c_description']));?><br />
                                      </div>
									
								</div>
							</div>
						</div>				
					</article>
					<!-- /Article -->
				</div>
            </div>
<!--        <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
        </div>
    </div>
							 
							<?php } ?> 
					
							
							 
						 
					  </div>
					     			    	                        
				</div>
           				
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#services-->

<?php include("../controller/footer.php"); ?>