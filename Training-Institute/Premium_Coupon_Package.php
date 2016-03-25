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
					   
                     
					  
                      
                 <div class="editprofileh mycolor"> Purchase Premium Coupon Package</div>
						   <div class="clearfix"></div>
						   
     
                          
                          <form action="" method="post" enctype="multipart/form-data">
                        <div class="mmformapart" style="background:url(../image/galleryimages1.png); height:433px;">
                      
                        
						
<div style="height: 388px;padding-top: 10px; text-align: center;  width: 90%; margin: 30px auto;background: rgba(255, 255, 255, 0.92);">
						
                       
                             

                                 
                        	 
                        
                             
                        
                         
 <div class="col-sm-3 padiingmform mycolors">
Choose Coupon Package
                        
 </div>
                        
                             <div class="col-sm-9 padiingmform">
<select name="couponid"  class="form-control formw couponid">
 <option >Choose Coupon Package</option>  
<?php 					
$galleryPackages=$conn->prepare("select * from cmg_coupon_admin WHERE `status`=1  ORDER BY `id` DESC ");
$galleryPackages->execute();

$galleryPackagesn= $galleryPackages->fetchAll();
foreach($galleryPackagesn as $galleryPackagesFETCH )
{
?>						
 <option value="<?=$galleryPackagesFETCH['id'];?>"><?=$galleryPackagesFETCH['p_name'];?></option>  
<?php } ?>        

</select>             
                        </div>
						
						
						 
		<div class="shocupondetails">				           

 
 
 
 
 </div>
 
 
 
 
 
 
  </div> </div>
<div style="text-align:center; padding:10px; font-size:20px; color: #355665;"> <br />Buy Promotional Package to add Brochure, Gallery-  <a href="Premium_Package" style="color:#FF9900;">Click Here to Buy</a></div>
						</form>
                        
                        
                        <div style="width:100%; margin:20px 0px;">
          
          <div style="text-align:center; padding:10px; font-size:20px; color: #355665;"> All Coupon Purchase Detaisl</div>
        <div style="width: 98%; font-weight:bold;height: 30px;margin: auto;     background: #F1ECEC;">
          
          <div style="width:140px; float:left; padding:3px;">Package Name</div>
           <div style="width:120px; float:left;  padding:3px;">Buying Date</div>
            <div style="width:90px; float:left;  padding:3px;">Exp. Day</div>
             <div style="width:90px; float:left;  padding:3px;">Price</div>
              <div style="width:120px; float:left;  padding:3px;">Total Coupon</div>
               <div style="width:140px; float:left;  padding:3px;">Remaining Coupon</div>
          
          </div>
       <?php 					
$exppackage=$conn->prepare("select * from cmg_coupon_purchse WHERE `UMID`='".$_SESSION['UMID']."' AND `status`=1  ORDER BY `id` DESC ");
$exppackage->execute();

$exppackage= $exppackage->fetchAll();
foreach($exppackage as $exppackageFETCG )
{ ?>
        <div style="width: 98%; color:#064C73; height: 30px;margin: auto;     background: #FBFBFB;">
          
          <div style="width:140px; height:30px; overflow:hidden; float:left; padding:3px;"><?=ucfirst($exppackageFETCG['p_name']);?></div>
           <div style="width:120px; float:left; height:30px; overflow:hidden;  padding:3px;"><?=$exppackageFETCG['buyingdate'];?></div>
            <div style="width:90px; float:left;  height:30px; overflow:hidden; padding:3px;"><?=$exppackageFETCG['exp_date'];?></div>
             <div style="width:90px; float:left; height:30px; overflow:hidden;  padding:3px;"><?=$exppackageFETCG['price'];?></div>
              <div style="width:120px; float:left;  height:30px; overflow:hidden; padding:3px;"><?=$exppackageFETCG['coupon_t'];?></div>
               <div style="width:140px; float:left; height:30px; overflow:hidden; padding:3px;"><?=$exppackageFETCG['remaining_coupon'];?></div>
          
          </div>
		  <?php } ?>  
          </div>
          
          </div>
                        
                        
                        
						</div>		
						</div>				
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#services-->

<?php include("../controller/footer.php"); ?>