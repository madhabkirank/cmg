<?php session_start(); include("../database/config.php");

$email=$_POST['email'];



// Cross check for user Exsit

if($_POST['membertypefoget']=='Student')
{
	$tblename='cmg_registration_s';

	
}

else {  
$tblename='cmg_registration';


 } 


$USERCHEk=$conn->prepare("select * from $tblename WHERE `email`='$email'  and `status`=1");
$USERCHEk->execute();
$USERCHEkF= $USERCHEk->rowCount();
$USERCHEkFF= $USERCHEk->fetch();

if($USERCHEkF==1)
{


$uniqueID=uniqid().'=CCCS'.$USERCHEkFF['id'].'=CCCS'.$tblename;


$devmail=$email;
$from="support@cmg.com";
$name="CMG";

	
	
	
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=utf-8\r\n";
$headers .= "From: ".$name." <".$from.">\r\n";
$subject="Password Rest";

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
                  <p><b>HI!</b>  </p>
				  <p> 

You are receiving this e-mail because you requested a password reset
for your user account at cmg.com</p>

Please go to the following page and choose a new password:
<a rel="nofollow" href="'.$domainname.'paswordresetLOGIN.php?mail='.$devmail.'&ID='.$uniqueID.'" target="_blank">Click Here</a>

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



mail($devmail,$subject,$body,$headers);

echo 'Check Your inbox or spam folder of '.$email;
}




	


 else { 
 
 echo '<span>The email ID  not found in member area</span>';
 }




 ?>

