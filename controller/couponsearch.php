<?php include("../database/config.php");
$cid=$_SERVER['QUERY_STRING'];
 					
$galleryPackages=$conn->prepare("select * from cmg_coupon_admin WHERE `id`='$cid' ");
$galleryPackages->execute();

$galleryPackagesFETCH= $galleryPackages->fetch();
          
                  
			?>	           
                      
<div class="col-sm-3 padiingmform mycolors"> Package Description </div>
<div class="col-sm-9 padiingmform"><textarea  class="form-control formw cmfta" name="pack_description" readonly style="height:60px;"> <?=$galleryPackagesFETCH['descrption'];?></textarea> </div>

<div class="col-sm-3 padiingmform mycolors"> Expiry Day </div>
<div class="col-sm-9 padiingmform"><input type="text" class="form-control formw cmfta" name="expiryday" readonly value="<?=$galleryPackagesFETCH['exp_date'];?> " > </div>

<div class="col-sm-3 padiingmform mycolors"> Price  </div>
<div class="col-sm-9 padiingmform"><input type="text" class="form-control formw cmfta" name="price" readonly value="<?=$galleryPackagesFETCH['Price'];?>" >  </div>
                     
		
<div class="col-sm-3 padiingmform mycolors"> No Of Coupon </div>
<div class="col-sm-9 padiingmform"><input type="text" class="form-control formw cmfta" name="noofcoupon" readonly value="<?=$galleryPackagesFETCH['coupon_t'];?>" >  </div>			 
					 
		<input type="hidden" class="form-control formw cmfta" name="packagename" readonly value="<?=$galleryPackagesFETCH['p_name'];?>" >			    
<div class="col-sm-12 padiingmform" style="text-align:center">
<input type="submit" class="btn  btn-warning" name="packagecouponbuy" value="Buy Now">
 </div>
 
 
 
 

 