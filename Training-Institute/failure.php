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
					   
                     
					  
              
                                
                 <div class="editprofileh mycolor" style="    text-align: center"> Proceed To Payment Process</div>
						   <div class="clearfix"></div>
						   
                   
                          
 <div style="width:320px; margin:50px auto; font-size:18px; text-align:center">      
			  

<?php $status=$_POST["status"];
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
	       echo "Invalid Transaction. Please try again";
		   }
	   else {

         echo "<h3>Your order status is ". $status .".</h3>";
         echo "<h4>Your transaction id for this transaction is ".$txnid.". </h4>";
          

$adminmail=$_SESSION['email'];
$from="support@cmg.com";
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
Your purchase could not be completed in CMG. Your bank transaction id is '.$txnid.' for future reference.   </p>

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

		 } 
		
			?>  
                        
    </div>
                        
                        
                        
                        
                        
						</div>		
						</div>				
            </div><!--/.row-->
        </div><!--/.container-->
    </section><!--/#services-->

<?php include("../controller/footer.php"); ?>