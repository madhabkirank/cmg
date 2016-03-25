<?php ob_start(); include("../database/config.php");
$_SESSION['myclassA']='style="display:none;"';
$_SESSION['myclassAI']='style="display:block;"';
//include('class-phpass.php');
$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
$membertype=$_POST['membertype'];
//$PassHASH=password_hash($password, PASSWORD_DEFAULT);
$PassHASH=$password;
$ipAddress=$_SERVER['REMOTE_ADDR'];
$regdate=date('Y-m-d');
$regtime=date('H:i:s');

// Cross check for user Exsit

if($membertype=='Trainer')
{

$USERCHEk=$conn->prepare("select * from cmg_registration WHERE `email`='$email'");
$USERCHEk->execute();
$USERCHEkF= $USERCHEk->fetch();
$USERCHEkFr= $USERCHEk->rowCount();
if($USERCHEkFr==0)
{



	$MTCODE='TI';


$MAXID_ST=$conn->prepare("select MAX(id) from cmg_registration");
$MAXID_ST->execute();

$MAXID_STEF= $MAXID_ST->fetch();

$UMID=$MAXID_STEF['MAX(id)']+"1"."CMG-".$MTCODE."-".uniqid();



$RegDATA_ISQ=$conn->prepare("INSERT INTO `cmg_registration`(`UMID`, `username`,`membertype`,`email`, `password`, `date`, `time`, `ipaddress`, `status`,`pr_images`) VALUES ('$UMID','$username','$membertype','$email','$PassHASH','$regdate','$regtime','$ipAddress',1,'demmo_imn.png')");

$RegDATA_ISQF=$RegDATA_ISQ->execute();
if ($RegDATA_ISQF) {
	
	$_SESSION['email']=$email;
$_SESSION['UMID']=$UMID;
$_SESSION['username']=$username;



$devmail=$email;
$from="support@cmg.com";
$name="CMG";

	
	
	
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
Hey, welcome to CMG! Before you get started, please confirm your email address by clicking the link below.</p>

<a rel="nofollow" href="'.$domainname.'verifyedmail.php?ID='.$_SESSION['UMID'].'" target="_blank">Click Here</a>
<p>

If you didn’t sign up for CMG, just ignore this message. If you have any questions or concerns, please contact us at support@cmg.com.
</p>
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


echo '<p style="text-align:center"> Active your account, go to your mail inbox</p>';
	echo '<script>alert("Successfully Registered, Please check your mail for activation");window.location="'.$domainname.'Training-Institute/Basic-Profile";</script>';
	
	} 
	
}

else { 
// echo "<h2>User Already Exists</h2>";

echo '<script>alert("User Already Exists");window.location="index.php";</script>';

}
}

 elseif($membertype=='Student')
{
	
	$USERCHEk=$conn->prepare("select * from cmg_registration_s WHERE `email`='$email'");
$USERCHEk->execute();
$USERCHEkF= $USERCHEk->fetch();
$USERCHEkFr= $USERCHEk->rowCount();
if($USERCHEkFr==0)
{
	
	
	$MTCODE='S';


$MAXID_ST=$conn->prepare("select MAX(id) from cmg_registration_s");
$MAXID_ST->execute();

$MAXID_STEF= $MAXID_ST->fetch();

$UMID=$MAXID_STEF['MAX(id)']+"1"."CMG-".$MTCODE."-".uniqid();



$RegDATA_ISQ=$conn->prepare("INSERT INTO `cmg_registration_s`(`UMID`, `username`,`membertype`,`email`, `password`, `date`, `time`, `ipaddress`, `status`,`pr_images`) VALUES ('$UMID','$username','$membertype','$email','$PassHASH','$regdate','$regtime','$ipAddress',1,'student_primg.png')");

$RegDATA_ISQF=$RegDATA_ISQ->execute();
if ($RegDATA_ISQF) {
	
	$_SESSION['s-email']=$email;
$_SESSION['s-UMID']=$UMID;
$_SESSION['s-username']=$username;
echo '<p style="text-align:center"> Click ok and Set your profile</p>';
	echo '<script>alert("Successfully Registered!");window.location="'.$domainname.'Student/Profile";</script>';

	} 
	
}



 else { 
 
 //echo "<h2>User Already Exists</h2>";

echo '<script>alert("User Already Exists");window.location="index.php";</script>';


 }

}
 ?>

