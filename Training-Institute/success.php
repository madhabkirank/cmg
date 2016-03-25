<?php ob_start();
include("../database/config.php"); 

$status=$_POST["status"];
$firstname=$_POST["firstname"];
$amount=$_POST["amount"];
$txnid=$_POST["txnid"];
$posted_hash=$_POST["hash"];
$key=$_POST["key"];
$productinfo=$_POST["productinfo"];
$email=$_POST["email"];
$salt="tuOJb2Ujzg";

If (isset($_POST["additionalCharges"])) {
       $additionalCharges=$_POST["additionalCharges"];
        $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
        
                  }
	else {	  

        $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;

         }
		 $hash = hash("sha512", $retHashSeq);
		 
       if ($hash != $posted_hash) {
	   
	   if(isset($_SESSION['invoice_idG']))
	   {
	$updatepakage=$conn->prepare("UPDATE `cmg_gallery_purchse` SET `pur_message`='Failure' WHERE `UMID`='".$_SESSION['UMID']."' AND `invoice_id`='".$_SESSION['invoice_idG']."' ");
$updatepakage->execute();
} else {

$updatepakage=$conn->prepare("UPDATE `cmg_coupon_purchse` SET `pur_message`='Failure' WHERE `UMID`='".$_SESSION['UMID']."' AND `invoice_id`='".$_SESSION['invoice_idC']."' ");
$updatepakage->execute();
}



$adminmail=$_SESSION['email'];
$from="support@coachmeguru.com";
$name="CMG Payment";
	
	
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=utf-8\r\n";
$headers .= "From: ".$name." <".$from.">\r\n";
$subject="Your purchase has been failure";

   $body='<table style="margin:0;padding:0;width:100%;border-collapse:collapse">
  <tbody><tr>
    <td style="margin:0;padding:0"></td>
    <td bgcolor="#FFFFFF" style="margin:0 auto;padding:0;border:1px solid #e5e5e5;display:block;max-width:600px;clear:both">
      <table  style="margin:0;padding:0;width:100%">
        <tbody><tr>
          <td style="margin:0;padding:0"></td>
          <td style="margin:0;padding:0">
              <div style="max-width:600px;margin:0 auto;display:block;padding:10px 15px">
                <table style="margin:0;padding:0;width:100%">
                  <tbody><tr>
                    <td width="300" style="margin:0;padding:0;color:#0E0E0E;font-size:22px">
                   Coach Me Guru
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
                  <p><b>Hey there </b>  </p>
				  <p> 
Your purchase could not be completed in CMG. </p>

 <p><br><br>Thank you,
<br> CMG Team</p>

              </td>
            </tr>
          </tbody></table>
        </div>
       
      </div>
    </td>
    <td style="margin:0;padding:0"></td>
  </tr>
</tbody></table>';



mail($adminmail,$subject,$body,$headers);



header("location:paument_messge.php?message=Failure");
		   }
	   else {
if(isset($_SESSION['invoice_idG']))
	   {
$updatepakage=$conn->prepare("UPDATE `cmg_gallery_purchse` SET `transactin_d`='$txnid',`status`=1,`buyingstatus`=1,`pur_message`='Success' WHERE `UMID`='".$_SESSION['UMID']."' AND `invoice_id`='".$_SESSION['invoice_idG']."' ");
$updatepakage->execute();

} 
else {
$updatepakage=$conn->prepare("UPDATE `cmg_coupon_purchse` SET `transactin_d`='$txnid',`status`=1,`buyingstatus`=1,`pur_message`='Success' WHERE `UMID`='".$_SESSION['UMID']."' AND `invoice_id`='".$_SESSION['invoice_idC']."' ");
$updatepakage->execute();
}





$adminmail=$_SESSION['email'];
$from="support@coachmeguru.com";
$name="CMG Payment";
	
	
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=utf-8\r\n";
$headers .= "From: ".$name." <".$from.">\r\n";
$subject="Your purchase has been successful";

   $body='<table style="margin:0;padding:0;width:100%;border-collapse:collapse">
  <tbody><tr>
    <td style="margin:0;padding:0"></td>
    <td bgcolor="#FFFFFF" style="margin:0 auto;padding:0;border:1px solid #e5e5e5;display:block;max-width:600px;clear:both">
      <table  style="margin:0;padding:0;width:100%">
        <tbody><tr>
          <td style="margin:0;padding:0"></td>
          <td style="margin:0;padding:0">
              <div style="max-width:600px;margin:0 auto;display:block;padding:10px 15px">
                <table style="margin:0;padding:0;width:100%">
                  <tbody><tr>
                    <td width="300" style="margin:0;padding:0;color:#0E0E0E;font-size:22px">
                   Coach Me Guru
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
                  <p><b>Hey there </b>  </p>
				  <p> 
You have done successful payment in CMG. Your payment amount is Rs '.$amount.'. Your bank transaction id is '.$txnid.' for future reference. </p>

 <p><br><br>Thank you,
<br> CMG Team</p>

              </td>
            </tr>
          </tbody></table>
        </div>
       
      </div>
    </td>
    <td style="margin:0;padding:0"></td>
  </tr>
</tbody></table>';



mail($adminmail,$subject,$body,$headers);




            header("location:paument_messge.php?message=Success");
           
		   } 
		   
		   ob_end_flush();        
?>	