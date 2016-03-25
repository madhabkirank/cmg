<?php ob_start(); include("../database/config.php");



$devmail=$_SESSION['email'];
$from="support@coachmeguru.com";
$name="Coach Me Guru";

	
	
	
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=utf-8\r\n";
$headers .= "From: ".$name." <".$from.">\r\n";
$subject="Confirm your email";

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
                 
				  <p> 
Hey, welcome to Coach Me Guru! Before you get started, please confirm your email address by clicking the link below.</p>

<a rel="nofollow" href="'.$domainname.'verifyedmail.php?ID='.$_SESSION['UMID'].'" target="_blank">Click Here</a>
<p>

If you didn’t sign up for Coach Me Guru, just ignore this message. If you have any questions or concerns, please contact us at support@coachmeguru.com.
</p>
 <p><br><br>Thank you,
<br> Coach Me Guru Team</p>

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


echo '<p style="text-align:center"> Activation Link sent to Your mail,Please active your account </p>';
	?>