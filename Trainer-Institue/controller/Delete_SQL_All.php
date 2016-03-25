<?php include("../../database/config.php");

if(isset($_GET['branchesIDDELETE']))
{
	
	
$branchesIDDELETE=$conn->prepare("DELETE FROM `cmg_trainer_branches` WHERE id='".$_GET['branchesIDDELETE']."' ");
$branchesIDDELETE->execute();

echo '<script>alert("One Branches Deleted");window.location="../Branch-Create";</script>'; 
}


if(isset($_GET['compnayDDELETE']))
{
	
	
$compnayDDELETE=$conn->prepare("DELETE FROM `cmg_tieup_company` WHERE id='".$_GET['compnayDDELETE']."' ");
$compnayDDELETE->execute();

echo '<script>alert("One Company Deleted");window.location="../Tie-up-Company";</script>'; 
}


if(isset($_GET['studentplaceDDELETE']))
{
	
	
$studentplaceDDELETE=$conn->prepare("DELETE FROM `cmg_placed_student` WHERE id='".$_GET['studentplaceDDELETE']."' ");
$studentplaceDDELETE->execute();

echo '<script>alert("One Company Deleted");window.location="../Student-Placed";</script>'; 
}






?>