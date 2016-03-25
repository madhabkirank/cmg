<?php ob_start(); $UDS=''; include("controller/header.php"); if(isset($_GET['mail']) && isset($_GET['ID']) ) 
{
	
	$myID=explode('=CCCS',$_GET['ID']);
	$_SESSION['ID']=trim($myID[1]);

 ?>


<div style="    margin: auto;  width: 24%; background: #F9F8F8; padding: 20px;">
<h4> Reset Your Password</h4>
<form method="post" action="" enctype="multipart/form-data" >

<input type="hidden" name="email"  class="form-control" required="required"  value="<?php echo $_GET['mail']; ?>">
<input type="hidden" name="table"  class="form-control" required="required"  value="<?=$myID[2]; ?>">

<input type="password" name="newpass"  class="form-control" required="required" placeholder="Password" >

<input type="password" name="conpass"  class="form-control" required="required" placeholder="Confirm Password" > 


<div calss="take_in" style="text-align: right;"><input type="submit" value="Reset" name="paswordreset" class="btn  btn-warning"/></div>
</form>

            
</div>
<?php include("controller/footer.php"); ?>

<?php } 




if(isset($_POST['paswordreset']))
{
$user=trim($_POST['email']);
$table=trim($_POST['table']);
$newpass=trim($_POST['newpass']);
$conpass=trim($_POST['conpass']);


if($newpass==$conpass)
{

$UserCount=$conn->prepare("UPDATE $table SET `password`='$newpass' WHERE `email`='$user' AND  `id`='".$_SESSION['ID']."'");
$UserCount->execute();
echo '<script>alert("Successfully Password Updated");window.location="'.$domainname.'";</script>';	
session_destroy();

}
else {
echo '<script>alert("Passowrd Not Matching, Try Again");</script>';	

}  
}


?>