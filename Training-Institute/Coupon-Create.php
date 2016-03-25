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
				   
				 <?php  if($ccPackagesREN==0) { echo '<script>window.location="Premium_Coupon_Package";</script>';}  ?> 
				   

		   
           <div class="col-md-9 col-sm-12" id='Profile'>
				      <div class="trainer-right">
					    <h3 class="pleft">Creating  Coupon</h3>
						<a href='Premium_Coupon_Package'><button type="button" class="btn pright coupon-btn">View Coupons by Expiry</button></a>
						<div class="clearfix"></div>
						
					<div class="enquiry">
					
                        <form action="" method="post" enctype="multipart/form-data">
                            
                        <label>Coupon Title  
                            <input name="coupon_titel" id="titel" placeholder="Enter Coupon Title" type="text" class="required" required=""></label>
                            
                        <label>Discount Type 
                           <select class="required" name="discount_type" required>
                               <option value="/-">In Value</option>
                               <option value="%">In Percentage </option>
                            </select>
<br><br>( Please select Percentage Discount if you to show discount %. Please select value Discount if you want to show Rs discount )
                        </label>
                            
                        <label>Discount Value 
                            <input name="discount_value" id="value" placeholder="Enter Discount Value" pattern="[0-9]*" maxlength="8" min="0" type="text" class="required" required>   </label>
                         
                        <label>Date Of Validity 
                         
							
							<div style="float:right; ">
<div id="datepicker" class="input-group date" data-date-format="yyyy-mm-dd" style="width:300px">
    <input type="text" class="required" name="dov" value="<?php echo $dob;?>"  style="width:570px">
    <span class="input-group-addon" style="display:none"></span>
</div></div>
							
							</label>
                            
                        <label>Institude
                            <input name="institude" id="institude" placeholder="Enter Institude Name" type="text" class="required" required="">
                            </label>
                            
                       <label>Location
                            <input name="location" id="location" type="text" placeholder="Enter Location" class="required" required="">
                            </label>
                            
                        <label>Select Package 
                         <select name="packages"  class="required" >
                        <?php 					
$ccPackages=$conn->prepare("select * from cmg_coupon_purchse WHERE `remaining_coupon`>=1 AND `UMID`='".$_SESSION['UMID']."' AND `status`=1  ORDER BY `id` DESC ");
$ccPackages->execute();

$ccPackages= $ccPackages->fetchAll();
foreach($ccPackages as $ccPackagesFET )
{
?>						
	 <option value="<?php echo $ccPackagesFET['id'].'#'.$ccPackagesFET['remaining_coupon']; ?>"><?=$ccPackagesFET['p_name'];?> ( Remaing - <?=$ccPackagesFET['remaining_coupon']; ?> )</option> 
<?php } ?>  
                           
                            
                          
                            
                            </select>
                            
                        <label>Write The Coupon Description
                        <textarea name="c_description" id="requirement" rows="3" class="txt-required"></textarea></label><br>
                            
                       <label style="text-align:center; width:100%; color:red;">
                          <br> A coupon cannot be edited once it's created<br> A coupon can be disable from the Coupons Management Page<br><br>
                           <input name="Coupon_Submit" type="submit" value="Save Coupon" class="submit myButton"></label>
                            
                       </form>
					   
                    </div>
					    
					  </div>		
					  </div>
           
           				
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#services-->
<script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>
<link href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />

<script type="text/javascript">
$(function () {
  $("#datepicker").datepicker({ 
        autoclose: true, 
        todayHighlight: true
  });
});

</script>
<?php include("../controller/footer.php"); ?>
