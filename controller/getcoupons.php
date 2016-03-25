<?php  include("../database/config.php"); ?>


<?php
$getcoupon=explode('CMGC',$_SERVER['QUERY_STRING']);



$USERCHEk=$conn->prepare("select * from cmg_registration_s WHERE `UMID`='".$getcoupon[0]."'");
$USERCHEk->execute();
$USERCHEkF= $USERCHEk->fetch();


$cmg_create_coupon=$conn->prepare("select * from cmg_create_coupon WHERE `id`='".$getcoupon[1]."'");
$cmg_create_coupon->execute();
$cmg_create_couponF= $cmg_create_coupon->fetch();


$TrainerD=$conn->prepare("select * from cmg_registration WHERE `UMID`='".$cmg_create_couponF['UMID']."'");
$TrainerD->execute();
$TrainerDFETCH= $TrainerD->fetch();



$name=$TrainerDFETCH['institute_dname'];
$from=$TrainerDFETCH['email'];
$subject = "Discount Coupon From CMG";
          
	
	
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=utf-8\r\n";
$headers .= "From: ".$name." <".$from.">\r\n";
$subject="Coupon Form CMG";

   $body='<table style="margin:0;padding:0;width:100%;border-collapse:collapse">
  <tbody><tr>
    <td style="margin:0;padding:0"></td>
    <td bgcolor="#FFFFFF" style="margin:0 auto;padding:0;border:1px solid #e5e5e5;display:block;max-width:600px;clear:both">
      <table bgcolor="#F2F2F2"style="margin:0;padding:0;width:100%">
        <tbody><tr>
          <td style="margin:0;padding:0"></td>
          <td style="margin:0;padding:0">
              <div style="max-width:600px;margin:0 auto;display:block;padding:10px 15px">
                <table style="margin:0;padding:0;width:100%">
                  <tbody><tr>
                    <td width="90" style="margin:0;padding:0;color:#fff;font-size:12px">
                      <a href="'.$domainname.'" style="color:#000; font-weight:bold;" target="_blank">
                        <img src="'.$domainname.'"image/logo.png"  alt="CMG" height="40" width="120">
                      </a>
                    </td>
                    <td align="right" style="margin:0;padding:0;font-family:&quot;Helvetica Neue&quot;,&quot;Helvetica&quot;,Helvetica,Arial,sans-serif;color:#fff;font-size:12px"></td>
                  </tr>
                </tbody></table>
              </div>

          </td>
          <td style="margin:0;padding:0"></td>
        </tr>
      </tbody></table>
      <div style="max-width:600px;margin:0 auto;display:block">
        <div style="padding:10px 15px">
          <table style="margin:0;padding:0;width:100%">
            <tbody><tr>
              <td style="margin:0;padding:20px 0;color:#4e4e4e;font-family:&quot;Helvetica Neue&quot;,&quot;Helvetica&quot;,Helvetica,Arial,sans-serif">
			  
			   <p><b>Congratulations!</b></p>
			 
			 
                  <p>Your Discount Coupon Detaisl is here:-</p>
				  <p> <b> Coupon Name </b> : '.$cmg_create_couponF['coupon_titel'].',</p>
				    <p> <b> Coupon Code </b> : '.$cmg_create_couponF['id'].'CMG-C- '.$cmg_create_couponF['coupon_titel'].',</p>
					  <p> <b> Validity Date </b> : '.$cmg_create_couponF['dov'].',</p>
					    <p> <b> Discount Amount </b> : Rs '.$cmg_create_couponF['discount_value'].''.$cmg_create_couponF['discount_type'].' OFF,</p>
						  <p> <b> Institue Name </b> : '.$name.'</p>
					
							 
							  
							<p>  <strong>Thanks,<br>
							  CMG Team</strong></p>
		


              </td>
            </tr>
          </tbody></table>
        </div>
        <table cellspacing="0" style="margin:0;padding:0;border-top:1px solid #e5e5e5;color:#7b7b7b;width:100%">
          <tbody><tr>
            <td bgcolor="#405364" style="margin:0;padding:0;font-size:10px">
              <div style="padding:5px 15px">
              <table style="margin:0;padding:0;width:100%">
                <tbody><tr>
                  <td style="margin:0;padding:0;font-family:&quot;Helvetica Neue&quot;,&quot;Helvetica&quot;,Helvetica,Arial,sans-serif;font-size:10px">
                    <a href="'.$domainname.'" style="padding:10px;color:#5ac7f2" target="_blank"><br>
                    &copy; 2015 CMG Pvt Ltd.</a>
                  </td>
                  <td align="right" style="margin:0;padding:0;font-family:&quot;Helvetica Neue&quot;,&quot;Helvetica&quot;,Helvetica,Arial,sans-serif;font-size:10px">
                    <h6 style="margin:0 0 5px 0;line-height:1.1;padding:0;font-weight:900;font-size:14px">Follow us and stay in touch</h6>
                  
                    <a href="#" style="color:#5ac7f2;text-decoration:none" target="_blank">
                      <img src="http://dialacoupon.com/images/t_i.png" width="24" height="24" alt="Twitter" style="max-width:100%;background:#7bbfe0">
                    </a>
                    <a href="https://www.facebook.com/irankmediia" style="color:#5ac7f2;text-decoration:none" target="_blank">
                      <img src="http://dialacoupon.com/images/f_i.png" width="24" height="24" alt="Facebook" style="max-width:100%;background:#6884c2">
                    </a>
                    <a href="#" style="color:#5ac7f2;text-decoration:none" target="_blank">
                      <img src="http://dialacoupon.com/images/i_i.png" width="24" height="24" alt="LinkedIn" style="max-width:100%;background:#4487c6">
                    </a>
                    <a href="#" style="color:#5ac7f2;text-decoration:none" target="_blank">
                      <img src="http://dialacoupon.com/images/g_i.png" width="24" height="24" alt="Google+" style="max-width:100%;background:#bd3034">
                    </a>
                  </td>
                </tr>
              </tbody></table>
              </div>
            </td>
          </tr>
        </tbody></table>
      </div>
    </td>
    <td style="margin:0;padding:0"></td>
  </tr>
</tbody></table>';

//$to="info@.irank@gmail.com";

$to =$USERCHEkF['email'];

mail($to,$subject,$body,$headers);


$c_code=$cmg_create_couponF['id'].'CMG-C- '.$cmg_create_couponF['coupon_titel'];
$coupnvalue='Rs'.$cmg_create_couponF['discount_value'].''.$cmg_create_couponF['discount_type'].' OFF';
$Reg_basicDATA_ISQ=$conn->prepare("INSERT INTO `cmg_get_coupon`(`UMID_T`, `UMID_S`, `coupon_ID`,`c_name`,`c_code`,`c_valid`,`c_value`, `date`, `time`, `status`) VALUES ('".$cmg_create_couponF['UMID']."','".$getcoupon[0]."','".$getcoupon[1]."','".$cmg_create_couponF['coupon_titel']."','$c_code','".$cmg_create_couponF['dov']."','$coupnvalue','$date', '$time',1)");

$Reg_basicDATA_ISQF=$Reg_basicDATA_ISQ->execute();





?>
Check Mail   
      
           
           
		  
			  