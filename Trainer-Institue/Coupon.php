<div style="display:block">
            	    <div>
                    <h3 class="pleft" >Discount Coupons</h3>
					
					<div class="clearfix"></div>
            
            			<?php 

$result = fetch('cmg_create_coupon', array('UMID' => $UMIDSProfile['UMID'],'status' =>1));
foreach ($result as  $dataFETCH_Coupon) {

 $expdaynew= fetchsingle('cmg_coupon_purchse',array('id' => $dataFETCH_Coupon['packages']));
  $startdate=$dataFETCH_Coupon['date'];
					$todaydane=date('Y-m-d');
					  
					  $enddatenew = strtotime(date("Y-m-d", strtotime($startdate)) . " +".$expdaynew['exp_date']." day");
					 
					 if(strtotime($todaydane)<$enddatenew && strtotime($todaydane)<strtotime($dataFETCH_Coupon['dov']))
					 { 
?>	

						 
					
					
					<div class="coupon-page">
                      <h4><?=ucfirst($dataFETCH_Coupon['coupon_titel']);?></h4>
                    <div class="coupon-post">
                        <div class="col-md-8 col-sm-8 col-xs-12" style="background:#FDFAF0">
                        <p>  <?=$dataFETCH_Coupon['c_description'];?></p>
                            <div class="cou-post-left"><?=$dataFETCH_Coupon['institude'];?></div> <div class="cou-post-left"> - <?=$dataFETCH_Coupon['location'];?></div>
                            <div class="cou-post-right">Valid  upto: <?=$dataFETCH_Coupon['dov'];?></div>
							<div class="cou-post-right"><a data-toggle="modal" data-target="#myModal<?=$dataFETCH_Coupon['id'];?>"   class="cursor counnview">View Coupon  Details</a> &nbsp;&nbsp;</div>
                        </div>
                        <div class="col-md-2 col-sm-2 col-xs-6 coupon-green">Rs <?=$dataFETCH_Coupon['discount_value'];?><?=$dataFETCH_Coupon['discount_type'];?> Off </div>
						
                         <?php if(isset($_SESSION['s-UMID']))
				{ ?>
                       
                       
                       
                        <div class="col-md-2 col-sm-2 col-xs-6 coupon-red getcoupons" id="<?=$_SESSION['s-UMID'].'CMGC'.$dataFETCH_Coupon['id']?>">GET COUPON</div>
                        
                        
                        
                        
                            <?php } elseif(isset($_SESSION['UMID'])) { ?>  
                            
<a onclick="return alert('Only Student Can Apply This')" class="cursor" style="text-decoration:none"> <div class="col-md-2 col-sm-2 col-xs-6 coupon-red">GET COUPON</div>
                     </a>        
                             <?php  } else { ?>
                               		   <a data-toggle="modal" data-target="#myModal_login" class="cursor" style="text-decoration:none"><div class="col-md-2 col-sm-2 col-xs-6 coupon-red">GET COUPON</div></a>
                             <?php } ?>
                        
                        <div class="clearfix"></div>
                        
                        </div>
                    
                    </div>
                    
         
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
                                <?=nl2br($dataFETCH_Coupon['c_description']);?><br />
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
						   
					
						 <?php } } ?>
           
                </div>
            
                </div><!--/Tab cointain 4 --> 
                
                
           