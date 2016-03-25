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
					   
                     
					  
                      
                 <div class="editprofileh mycolor"> Purchase Premium Package</div>
						   <div class="clearfix"></div>
						   
                    <?php 
					
					$galleryPackages=$conn->prepare("select * from cmg_gallery_admin where `status`=1  ORDER BY `id` DESC ");
$galleryPackages->execute();

$galleryPackagesFETCH= $galleryPackages->fetch();

?>
                          
                          <form action="" method="post" enctype="multipart/form-data">
                        <div class="mmformapart" style="background:url(../image/galleryimages.jpg) no-repeat; height:325px;">
                      
                        
						
<div style="height: 263px;padding-top: 10px; text-align: center;  width: 90%; margin: 30px auto;background: rgba(255, 255, 255, 0.92);">
						
                          <?php $gpurchase= num_rows('cmg_gallery_purchse',array('UMID' => $_SESSION['UMID'],'buyingstatus' =>1));
							 if($gpurchase==0) {  ?>     
                        	  <input type="hidden" value="<?=$galleryPackagesFETCH['image_t'];?>" name="image_t"   > 
							    <input type="hidden" value="<?=$galleryPackagesFETCH['id'];?>" name="package_id" > 
								 <input type="hidden" value="" name="exp_date" > 
                             
                        
                             
                        
                         
 <div class="col-sm-3 padiingmform mycolors">
Package Name
                        
 </div>
                        
                             <div class="col-sm-9 padiingmform">
						
<input type="text" readonly   class="form-control formw" name="p_name" value="<?=$galleryPackagesFETCH['p_name'];?>">                        
                        </div>
						
						
						 
						 
                           <div class="col-sm-3 padiingmform mycolors">
     Price
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
<input type="text" class="form-control formw cmfta" name="price" readonly value='<?=$galleryPackagesFETCH['price'];?>' > 
                        
                        </div>		           
                      
						 
                           <div class="col-sm-3 padiingmform mycolors">
      Package Description
                        
                        </div>
                        
                             <div class="col-sm-9 padiingmform">
							 
<textarea class="form-control formw cmfta" name="pack_description" readonly style="height:50px;"> <?=$galleryPackagesFETCH['descrption'];?></textarea>
                        
                        </div>
                        
                      
                             
						
						
						 
						
					
					
						
						 
                           
                        
                             
						
						 
						   <div class="col-sm-12 padiingmform" style="text-align:center">

                 
						
						
								    <input type="submit" class="btn  btn-warning" name="packagebuy" value="Buy Now">
						
			
						
			
						
                        
                        </div>
                           
                        <?php  } else { ?>
                        
                        
                    <div class="col-sm-12 padiingmform mycolors" style="text-align:center;">
You already purchased this Package <br>

<a href="Gallery" class="mycolors">Click to Uplaod Gallery</a>
                        
 </div>
 
 <?php } ?>
                        
						
                        </div>
                         
                        
                        
                        </div>
						
						<div style="text-align:center; padding:10px; font-size:20px; color: #355665;">Coupons for Promotion- <a href="Premium_Coupon_Package" style="color:#FF9900;">Click Here to Buy</a></div>
						</form>
                        
                        
                        
                        
                        
                        
						</div>		
						</div>				
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#services-->

<?php include("../controller/footer.php"); ?>