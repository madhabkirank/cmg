<?php ob_start();  include("../../database/config.php");
include('../Institute_Session.php');

if(isset($_GET['branchesIDDELETE']))
{
	
	
$branchesIDDELETE=$conn->prepare("DELETE FROM `cmg_trainer_branches` WHERE id='".$_GET['branchesIDDELETE']."' ");
$branchesIDDELETE->execute();

echo '<script>alert("One Branches Deleted");window.location="../Branch-Create#Profile";</script>'; 
}


if(isset($_GET['compnayDDELETE']))
{
	
	
$compnayDDELETE=$conn->prepare("DELETE FROM `cmg_tieup_company` WHERE id='".$_GET['compnayDDELETE']."' ");
$compnayDDELETE->execute();

echo '<script>alert("One Company Deleted");window.location="../Tie-up-Company#Profile";</script>'; 
}


if(isset($_GET['studentplaceDDELETE']))
{
	
	
$studentplaceDDELETE=$conn->prepare("DELETE FROM `cmg_placed_student` WHERE id='".$_GET['studentplaceDDELETE']."' ");
$studentplaceDDELETE->execute();

echo '<script>alert("One Company Deleted");window.location="../Student-Placed#Profile";</script>'; 
}




if(isset($_GET['CourseDElETE']))
{
	
	
$CourseDElETE=$conn->prepare("DELETE FROM `cmg_courses` WHERE id='".$_GET['CourseDElETE']."' ");
$CourseDElETE->execute();

echo '<script>alert("One Courses Deleted");window.location="../Courses#Profile";</script>'; 
}



if(isset($_GET['PostIDelete']))
{
	
	
$CourseDElETE=$conn->prepare("DELETE FROM `cmg_create_post` WHERE id='".$_GET['PostIDelete']."' ");
$CourseDElETE->execute();

$CourseDElETE1=$conn->prepare("DELETE FROM `cmg_post_chat` WHERE post_ID='".$_GET['PostIDelete']."' ");
$CourseDElETE1->execute();

echo '<script>alert("Post Deleted");window.location="../Dashboard#Profile";</script>'; 
}


if(isset($_GET['disable']))
{
	
	
$DDELETEaccount=$conn->prepare("UPDATE  `cmg_create_coupon` SET `status`='".$_GET['veryfy']."' WHERE id='".$_GET['disable']."' ");
$DDELETEaccount->execute();
echo '<script>alert("Your Coupon Status Changed");window.location="../Coupon_Management#Profile";</script>'; 

}


if(isset($_GET['gallerydelte']))
{
	
	
$CourseDElETE=$conn->prepare("DELETE FROM `cmg_gallery` WHERE id='".$_GET['gallerydelte']."' ");
$CourseDElETE->execute();

echo '<script>alert("Gallery Image Deleted");window.location="'.$_SESSION['URLSET'].'#Profile";</script>'; 
}

if(isset($_GET['gallerydelte1']))
{
	
	
$CourseDElETE=$conn->prepare("DELETE FROM `cmg_gallery` WHERE id='".$_GET['gallerydelte1']."' ");
$CourseDElETE->execute();

echo '<script>alert("Video Deleted");window.location="'.$_SESSION['URLSET'].'#Profile";</script>'; 
}

if(isset($_GET['gallerydelte2']))
{
	
	
$CourseDElETE=$conn->prepare("DELETE FROM `cmg_gallery` WHERE id='".$_GET['gallerydelte2']."' ");
$CourseDElETE->execute();

echo '<script>alert("Broucher Deleted");window.location="'.$_SESSION['URLSET'].'#Profile";</script>'; 
}


if(isset($_GET['DDELETEaccountIT']))
{
	
	
$registration=$conn->prepare("UPDATE  `cmg_registration` SET `status`=0 WHERE UMID='".$_GET['DDELETEaccountIT']."' ");
$registration->execute();

$cmg_basic_inf0_ti=$conn->prepare("UPDATE  `cmg_basic_inf0_ti` SET `status`=0 WHERE UMID='".$_GET['DDELETEaccountIT']."' ");
$cmg_basic_inf0_ti->execute();

//$cmg_create_post=$conn->prepare("UPDATE  `cmg_create_post` SET `status`=0 WHERE UMID='".$_GET['DDELETEaccountIT']."' ");
//$cmg_create_post->execute();

$cmg_follow=$conn->prepare("UPDATE  `cmg_follow` SET `status`=0 WHERE UMID_T='".$_GET['DDELETEaccountIT']."' ");
$cmg_follow->execute();





session_destroy();
echo '<script>alert("Your Account  Deleted");window.location="'.$domainname.'";</script>'; 

}

?>