<?php include("../database/config.php");
$ipAddress=$_SERVER['REMOTE_ADDR'];
$date=date('Y-m-d');
$time=date('H:i:s');


// Tranier basic profile insert 
if(isset($_POST['trainerbasic']) && isset($_SESSION['UMID']) )
  {
if($_POST['URLTake']!=1)
{
$membertype=$_POST['membertype'];
$instituename=$_POST['instituename'];
$yoe=$_POST['yoe'];
$u_url=strtolower($_POST['urlname']);
$u_url=str_replace(' ','',$_POST['urlname']);
$experiance=date('Y')-$yoe;
$phone=$_POST['phone'];
$altphonme=$_POST['altphonme'];
$email=$_POST['email'];
$website=$_POST['website'];
$time1=$_POST['time1'];
$time2=$_POST['time2'];
$time3=$_POST['time3'];
$time4=$_POST['time4'];

$time_day=$time1." ".$time2." ".$time3." ".$time4;
$address=trim($_POST['address']);
$location=trim($_POST['location']);
$locationenter=trim($_POST['locationenter']);
$country=trim($_POST['country']);
$state=trim($_POST['state']);
$city=trim($_POST['city']);
$rcity=trim($_POST['rcity']);

$state=trim($_POST['state']);
if($city=='nocity' && !empty($rcity))
{$city=trim($_POST['rcity']);

$satateDATA_ISQ=$conn->prepare("INSERT INTO `cmg_city`(`satate_code`, `city`, `status`) VALUES ( '$state','$city',0)");

$satateDATA_ISQF=$satateDATA_ISQ->execute();

 }
 
 
 if(!empty($locationenter))
{$location=$_POST['locationenter'];

$locationenter=$conn->prepare("INSERT INTO `cmg_location`(`satate_code`, `location`, `status`) VALUES ( '$state','$location',0)");

$locationenterF=$locationenter->execute();

 }



$pin=$_POST['pin'];
$about_IT=$_POST['about_IT'];

/*	
$company_logo=$_FILES["bannerimages"]["name"];
$uploadedfile=$_FILES['bannerimages']['tmp_name'];
		if(isset($company_logo) && !empty($company_logo))
		{
		
$getExt = explode ('.', $company_logo);
$extension = $getExt[count($getExt)-1];

$rand_name= rand(0,999999999);
if($extension=="jpg" || $extension=="jpeg"  || $extension=="JPEG" || $extension=="JPG"  )
{$src = imagecreatefromjpeg($uploadedfile);}
else if($extension=="png" || $extension=="PNG" )
{$src = imagecreatefrompng($uploadedfile);}
else {$src = imagecreatefromgif($uploadedfile);}

$rand_name= rand(0,999999999);
$company_logof=$rand_name.".".$extension;

list($width,$height)=getimagesize($uploadedfile);


 

$newwidth='1200';
$newheight='240'; 


$tmp=imagecreatetruecolor($newwidth,$newheight);
imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);

$filenameUPlod=$UDS."image/proimages/".$company_logof;
	imagejpeg($tmp,$filenameUPlod,100);
imagedestroy($tmp);
imagedestroy($src);
	}
		
	
$company_logo1=$_FILES["profileimages"]["name"];
$uploadedfile1=$_FILES['profileimages']['tmp_name'];
		if(isset($company_logo1) && !empty($company_logo1))
		{
$getExt = explode ('.', $company_logo1);
$extension = $getExt[count($getExt)-1];

$rand_name= rand(0,999999999);
if($extension=="jpg" || $extension=="jpeg"  || $extension=="JPEG" || $extension=="JPG"  )
{$src = imagecreatefromjpeg($uploadedfile1);}
else if($extension=="png" || $extension=="PNG" )
{$src = imagecreatefrompng($uploadedfile1);}
else {$src = imagecreatefromgif($uploadedfile1);}

$rand_name= rand(0,999999999);
$company_logof1=$rand_name.".".$extension;

list($width,$height)=getimagesize($uploadedfile1);

 

$newwidth='200';
$newheight='240'; 


$tmp=imagecreatetruecolor($newwidth,$newheight);
imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);

$filenameUPlod1=$UDS."image/proimages/".$company_logof1;
imagejpeg($tmp,$filenameUPlod1,100);
imagedestroy($tmp);
imagedestroy($src);

		}
*/

$UPDATA_ISQE=$conn->prepare("UPDATE `cmg_registration` SET `Are_u_an`='$membertype',`institute_dname`='$instituename',`u_url`='$u_url'  WHERE UMID='".$_SESSION['UMID']."' ");

$UPDATA_ISQEF=$UPDATA_ISQE->execute();



$Reg_basicDATA_ISQ=$conn->prepare("INSERT INTO `cmg_basic_inf0_ti`(`UMID`, `membertype`, `instituename`, `yoe`, `phone`, `altphonme`, `email`, `website`, `time_day`, `address`, `location`, `country`,`state`, `city`, `rcity`, `pin`, `about_IT`, `date`, `time`, `status`,`bannerimages`,`experiance`) VALUES ('".$_SESSION['UMID']."','$membertype', '$instituename', '$yoe', '$phone', '$altphonme', '$email', '$website', '$time_day', '$address', '$location', '$country', '$state', '$city', '$rcity','$pin', '$about_IT', '$date', '$time', 1,'$company_logof','$experiance')");

$Reg_basicDATA_ISQF=$Reg_basicDATA_ISQ->execute();


if ($Reg_basicDATA_ISQF) {
	
echo '<script>alert("Basic Info has been added Successfully!"); window.location.href="redirect.php"; </script>';
	
	} 
	
	} else 
{

echo '<script>alert("Basic Profile NOT added, You should Change Profile URL"); window.location.href="redirect.php"; </script>';

}
	

}


// Tranier basic profile EDIT
if(isset($_POST['trainerbasicEDIT']) && isset($_SESSION['UMID']))
  {
$membertype=$_POST['membertype'];
$instituename=$_POST['instituename'];
$yoe=$_POST['yoe'];
$experiance=date('Y')-$yoe;
$phone=$_POST['phone'];
$altphonme=$_POST['altphonme'];
$email=$_POST['email'];
$website=$_POST['website'];
$time1=$_POST['time1'];
$time2=$_POST['time2'];
$time3=$_POST['time3'];
$time4=$_POST['time4'];

$time_day=$time1." ".$time2." ".$time3." ".$time4;
$address=trim($_POST['address']);
$location=trim($_POST['location']);
$locationenter=trim($_POST['locationenter']);
$country=trim($_POST['country']);
$city=trim($_POST['city']);
$rcity=trim($_POST['rcity']);

$state=trim($_POST['state']);
if($city=='nocity' && !empty($rcity))
{$city=trim($_POST['rcity']);

$satateDATA_ISQ=$conn->prepare("INSERT INTO `cmg_city`(`satate_code`, `city`, `status`) VALUES ( '$state','$city',0)");

$satateDATA_ISQF=$satateDATA_ISQ->execute();

 }
 
  if(!empty($locationenter))
{$location=$_POST['locationenter'];

$locationenter=$conn->prepare("INSERT INTO `cmg_location`(`satate_code`, `location`, `status`) VALUES ( '$state','$location',0)");

$locationenterF=$locationenter->execute();

 }
$pin=$_POST['pin'];
$about_IT=$_POST['about_IT'];

$UPDATA_ISQE=$conn->prepare("UPDATE `cmg_registration` SET `Are_u_an`='$membertype',`institute_dname`='$instituename' WHERE UMID='".$_SESSION['UMID']."' ");

$UPDATA_ISQEF=$UPDATA_ISQE->execute();


/*	
$company_logo=$_FILES["bannerimages"]["name"];
$uploadedfile=$_FILES['bannerimages']['tmp_name'];
		if(isset($company_logo) && !empty($company_logo))
		{
		
$getExt = explode ('.', $company_logo);
$extension = $getExt[count($getExt)-1];

$rand_name= rand(0,999999999);
if($extension=="jpg" || $extension=="jpeg"  || $extension=="JPEG" || $extension=="JPG"  )
{$src = imagecreatefromjpeg($uploadedfile);}
else if($extension=="png" || $extension=="PNG" )
{$src = imagecreatefrompng($uploadedfile);}
else {$src = imagecreatefromgif($uploadedfile);}

$rand_name= rand(0,999999999);
$company_logof=$rand_name.".".$extension;

list($width,$height)=getimagesize($uploadedfile);


 

$newwidth='1200';
$newheight='240'; 


$tmp=imagecreatetruecolor($newwidth,$newheight);
imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);

$filenameUPlod=$UDS."image/proimages/".$company_logof;
	imagejpeg($tmp,$filenameUPlod,100);
imagedestroy($tmp);
imagedestroy($src);
	}
		else { $company_logof=$_POST['bannerimagesE'];
			
		}
	
$company_logo1=$_FILES["profileimages"]["name"];
$uploadedfile1=$_FILES['profileimages']['tmp_name'];
		if(isset($company_logo1) && !empty($company_logo1))
		{
$getExt = explode ('.', $company_logo1);
$extension = $getExt[count($getExt)-1];

$rand_name= rand(0,999999999);
if($extension=="jpg" || $extension=="jpeg"  || $extension=="JPEG" || $extension=="JPG"  )
{$src = imagecreatefromjpeg($uploadedfile1);}
else if($extension=="png" || $extension=="PNG" )
{$src = imagecreatefrompng($uploadedfile1);}
else {$src = imagecreatefromgif($uploadedfile1);}

$rand_name= rand(0,999999999);
$company_logof1=$rand_name.".".$extension;

list($width,$height)=getimagesize($uploadedfile1);

 

$newwidth='200';
$newheight='240'; 


$tmp=imagecreatetruecolor($newwidth,$newheight);
imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);

$filenameUPlod1=$UDS."image/proimages/".$company_logof1;
	imagejpeg($tmp,$filenameUPlod1,100);
imagedestroy($tmp);
imagedestroy($src);

		}
		
		else {
		
		$company_logof1=$_POST['profileimagesE'];	
		}
		
	*/

$Reg_basicDATA_ISQE=$conn->prepare("UPDATE `cmg_basic_inf0_ti` SET `membertype`='$membertype', `instituename`='$instituename', `yoe`='$yoe', `phone`='$phone', `altphonme`='$altphonme', `email`='$email', `website`='$website', `time_day`='$time_day', `address`='$address', `location`='$location', `country`='$country', `state`='$state', `city`='$city', `rcity`='$rcity', `pin`='$pin', `about_IT`='$about_IT', `bannerimages`='$company_logof',`experiance`='$experiance' WHERE UMID='".$_SESSION['UMID']."' ");

$Reg_basicDATA_ISQEF=$Reg_basicDATA_ISQE->execute();
if ($Reg_basicDATA_ISQEF) {
	
echo '<script>alert("Basic Info has been Edited Successfully!");window.location.href="redirect.php";</script>';
	
	} 
	

}

//Fetch data of cmg_basic_inf0_ti

$BAsic_INfo=$conn->prepare("select * from cmg_basic_inf0_ti WHERE `UMID`='".$_SESSION['UMID']."'");
$BAsic_INfo->execute();
$BAsic_INfoC= $BAsic_INfo->rowCount();
$BAsic_INFETCH= $BAsic_INfo->fetch();








// Tranier infrastucture profile insert 


if(isset($_POST['trainerinfra']) && isset($_SESSION['UMID']))
  {
$no_of_trainer=$_POST['no_of_trainer'];
$accommodation=$_POST['accommodation'];
$student_trained=$_POST['student_trained'];
$tubelink=$_POST['tubelink'];

$youtuveexpl=explode('?v=',$tubelink);

if($youtuveexpl[1]!='' && !empty($youtuveexpl[1]))
{
$tubelink='https://www.youtube.com/embed/'.$youtuveexpl[1];
} 
elseif (preg_match('/youtube/',$_POST['tubelink']))
{
$tubelink=strip_tags($_POST['tubelink']);
}
else {
$tubelink=1;
}



$description=str_replace("'","`",$_POST['description']);

$Reg_infraDATA_ISQ=$conn->prepare("INSERT INTO `cmg_infrastructure`(`UMID`, `no_of_trainer`, `accommodation`, `student_trained`, `tubelink`, `description`, `date`, `time`, `status`) VALUES ('".$_SESSION['UMID']."','$no_of_trainer', '$accommodation', '$student_trained', '$tubelink', '$description', '$date', '$time', 1)");

$Reg_infraDATA_ISQF=$Reg_infraDATA_ISQ->execute();
if ($Reg_infraDATA_ISQF) {
	
echo '<script>alert("More About Info has been added Successfully!");window.location.href="redirect.php";</script>';
	
	} 
	

}




// Tranier infrastucture profile EDIT 


if(isset($_POST['trainerinfmracEDIT']) && isset($_SESSION['UMID']))
  {
$no_of_trainer=$_POST['no_of_trainer'];
$accommodation=$_POST['accommodation'];
$student_trained=$_POST['student_trained'];
$tubelink=$_POST['tubelink'];

$youtuveexpl=explode('?v=',$tubelink);

if($youtuveexpl[1]!='' && !empty($youtuveexpl[1]))
{
$tubelink='https://www.youtube.com/embed/'.$youtuveexpl[1];
} elseif (preg_match('/youtube/',$_POST['tubelink']))
{
$tubelink=strip_tags($_POST['tubelink']);
}
else {
$tubelink=1;
}



$description=str_replace("'","`",$_POST['description']);

$Reg_infraDATA_ISQE=$conn->prepare("UPDATE `cmg_infrastructure`  SET  `no_of_trainer`='$no_of_trainer', `accommodation`='$accommodation', `student_trained`='$student_trained', `tubelink`='$tubelink', `description`='$description' WHERE `UMID`='".$_SESSION['UMID']."' ");

$Reg_infraDATA_ISQFE=$Reg_infraDATA_ISQE->execute();
if ($Reg_infraDATA_ISQFE) {
	
echo '<script>alert("More About Info has been Edit Successfully!");window.location.href="redirect.php";</script>';
	
	} 
	

}




//Fetch data of cmg_basic_inf0_ti

$Infra_INfo=$conn->prepare("select * from cmg_infrastructure WHERE `UMID`='".$_SESSION['UMID']."'");
$Infra_INfo->execute();
$Infra_INfoC= $Infra_INfo->rowCount();
$Infra_INfoFETCH= $Infra_INfo->fetch();




// Tranier more about  profile insert 


if(isset($_POST['trainermoreinfo']) && isset($_SESSION['UMID']))
  {
	  
	  $labs=$_POST['labs'];
	  $placement=$_POST['placement'];
	
$hotel_a=$_POST['hotel_a'];
$wifi=$_POST['wifi'];
$online_training=$_POST['online_training'];


$canteen=$_POST['canteen'];
$parking_place=$_POST['parking_place'];
$srooms=$_POST['srooms'];

	  
$washrooms=$_POST['washrooms'];
$water=$_POST['water'];
$grounds=$_POST['grounds'];
$sports_room=$_POST['sports_room'];


$dtos=str_replace("'","`",$_POST['dtos']);
$dcf=str_replace("'","`",$_POST['dcf']);
$dofo=str_replace("'","`",$_POST['dofo']);

$Reg_moreinfoDATA_ISQ=$conn->prepare("INSERT INTO `cmg_trainer_moreinfo`(`UMID`, `labs`,`placement`, `hotel_a`, `wifi`, `online_training`, `canteen`,`parking_place`,`srooms`,`washrooms`,`water`,`grounds`,`sports_room`,`dtos`,`dcf`,`dofo`, `date`, `time`, `status`) VALUES ('".$_SESSION['UMID']."', '$labs','$placement', '$hotel_a', '$wifi', '$online_training', '$canteen','$parking_place','$srooms','$washrooms','$water','$grounds','$sports_room','$dtos','$dcf','$dofo', '$date', '$time', 1)");

$Reg_moreinfoDATA_ISQF=$Reg_moreinfoDATA_ISQ->execute();
if ($Reg_moreinfoDATA_ISQF) {
	
echo '<script>alert("Infrastucture has been added Successfully!");window.location.href="redirect.php";</script>';
	
	} 
	

}




// Tranier infrastucture profile EDIT 


if(isset($_POST['trainermoreinfoEDIT']) && isset($_SESSION['UMID']))
  {
	  $labs=$_POST['labs'];
	   $placement=$_POST['placement'];
	  
$hotel_a=$_POST['hotel_a'];
$wifi=$_POST['wifi'];
$online_training=$_POST['online_training'];


$canteen=$_POST['canteen'];
$parking_place=$_POST['parking_place'];
$srooms=$_POST['srooms'];

	  
$washrooms=$_POST['washrooms'];
$water=$_POST['water'];
$grounds=$_POST['grounds'];
$sports_room=$_POST['sports_room'];


$dtos=str_replace("'","`",$_POST['dtos']);
$dcf=str_replace("'","`",$_POST['dcf']);
$dofo=str_replace("'","`",$_POST['dofo']);

$Reg_moreinfoDATA_ISQE=$conn->prepare("UPDATE  `cmg_trainer_moreinfo` SET  `labs`='$labs',`placement`='$placement', `hotel_a`='$hotel_a', `wifi`='$wifi', `online_training`='$online_training', `canteen`='$canteen',`parking_place`='$parking_place',`srooms`='$srooms',`washrooms`='$washrooms',`water`='$water',`grounds`='$grounds',`sports_room`='$sports_room',`dtos`='$dtos',`dcf`='$dcf',`dofo`='$dofo' WHERE `UMID`='".$_SESSION['UMID']."'");

$Reg_moreinfoDATA_ISQEF=$Reg_moreinfoDATA_ISQE->execute();
if ($Reg_moreinfoDATA_ISQEF) {
	
echo '<script>alert("Infrastucture has been Edit Successfully!");window.location.href="redirect.php";</script>';
	
	} 
	
	

}




//Fetch data of cmg_basic_inf0_ti

$MOReinfo_INfo=$conn->prepare("select * from cmg_trainer_moreinfo WHERE `UMID`='".$_SESSION['UMID']."'");
$MOReinfo_INfo->execute();
$MOReinfo_INfoC= $MOReinfo_INfo->rowCount();
$MoreInfo_INFETCH= $MOReinfo_INfo->fetch();








// Tranier Branches   profile insert 


if(isset($_POST['trainerBranches']) && isset($_SESSION['UMID']))
  {
	  
	  $barnchname=$_POST['barnchname'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$address=trim($_POST['address']);



$country=trim($_POST['country']);
$city=trim($_POST['city']);
if($city=='' && empty($city))
{
$city=trim($_POST['rcity']);

}

$location=trim($_POST['location']);
	
if($location=='' && empty($location))
{
$location=trim($_POST['rlocation']);

}
  
$state=trim($_POST['state']);
$pin=$_POST['pin'];


$Reg_TrainerbranchesDATA_ISQ=$conn->prepare("INSERT INTO `cmg_trainer_branches`(`UMID`,`barnchname`, `phone`, `email`, `address`, `location`, `country`, `city`,  `pin`, `date`, `time`, `status`,`state`) VALUES ('".$_SESSION['UMID']."', '$barnchname', '$phone', '$email', '$address', '$location','$country','$city','$pin','$date', '$time', 1,'$state')");

$Reg_TrainerbranchesDATA_ISQF=$Reg_TrainerbranchesDATA_ISQ->execute();
if ($Reg_TrainerbranchesDATA_ISQF) {
	
echo '<script>alert("Branch has been added Successfully!");window.location.href="redirect.php";</script>';
	
	} 
	

}



//Fetch data of trainer Branches all

$TBranches_SQLF=$conn->prepare("select * from cmg_trainer_branches WHERE `UMID`='".$_SESSION['UMID']."'");
$TBranches_SQLF->execute();

$TBranches_SQLFETCH= $TBranches_SQLF->fetchAll();








// Tranier Branches   profile insert 


if(isset($_POST['placemnt-corner-submit']) && isset($_SESSION['UMID']))
  {
	  
	 
$placment_support=$_POST['placment_support'];
$plcement_description=$_POST['plcement_description'];


$totalYNS=$_POST['totalYNS'];
$thisYNS=$_POST['thisYNS'];



$Reg_placment_cornerDATA_ISQ=$conn->prepare("INSERT INTO `cmg_placement_corner`(`UMID`,`placment_support`, `plcement_description`, `totalYNS`, `thisYNS`,`date`, `time`, `status`) VALUES ('".$_SESSION['UMID']."', '$placment_support', '$plcement_description', '$totalYNS', '$thisYNS', '$date', '$time', 1)");

$Reg_placment_cornerDATA_ISQF=$Reg_placment_cornerDATA_ISQ->execute();
if ($Reg_placment_cornerDATA_ISQF) {
	
echo '<script>alert("Placement Corner has been added Successfully!");window.location.href="redirect.php";</script>';
	
	} 
	

}




// Tranier infrastucture profile EDIT 


if(isset($_POST['placemnt-corner-EDIT']) && isset($_SESSION['UMID']))
  {
	 	 
$placment_support=$_POST['placment_support'];
$plcement_description=$_POST['plcement_description'];


$totalYNS=$_POST['totalYNS'];
$thisYNS=$_POST['thisYNS'];



$Reg_placment_cornerDATA_ISQedit=$conn->prepare("UPDATE `cmg_placement_corner` SET `placment_support`='$placment_support', `plcement_description`='$plcement_description', `totalYNS`='$totalYNS', `thisYNS`='$thisYNS' WHERE `UMID`='".$_SESSION['UMID']."' ");

$Reg_placment_cornerDATA_ISQeditF=$Reg_placment_cornerDATA_ISQedit->execute();
if ($Reg_placment_cornerDATA_ISQeditF) {
	
echo '<script>alert("Placement Corner has been Edit Successfully!");window.location.href="redirect.php";</script>';
	
	} 
	
	

}


//Fetch data of trainer Branches all

$PlacmentCorner_SQLF=$conn->prepare("select * from cmg_placement_corner WHERE `UMID`='".$_SESSION['UMID']."'");
$PlacmentCorner_SQLF->execute();
$PlacmentCorner_SQLFC= $PlacmentCorner_SQLF->rowCount();
$PlacmentCorner_SQLFETCH= $PlacmentCorner_SQLF->fetch();





// Tranier companymtieup_submit


if(isset($_POST['companymtieup_submit']) && isset($_SESSION['UMID']))
  {
	 	 

$company_name=$_POST['company_name'];
$company_logo=$_FILES["clogo"]["name"];
$uploadedfile=$_FILES['clogo']['tmp_name'];
if(isset($company_logo) && !empty($company_logo))

{
$getExt = explode ('.', $company_logo);
$extension = $getExt[count($getExt)-1];

$rand_name= rand(0,999999999);
if($extension=="jpg" || $extension=="jpeg"  || $extension=="JPEG" || $extension=="JPG"  )
{$src = imagecreatefromjpeg($uploadedfile);}
else if($extension=="png" || $extension=="PNG" )
{$src = imagecreatefrompng($uploadedfile);}
else {$src = imagecreatefromgif($uploadedfile);}

$rand_name= rand(0,999999999);
$company_logof=$rand_name.".".$extension;

list($width,$height)=getimagesize($uploadedfile);
$newwidth='137';
$newheight='60';


$tmp=imagecreatetruecolor($newwidth,$newheight);
imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);

$filenameUPlod=$UDS."image/company_logo/".$company_logof;
	imagejpeg($tmp,$filenameUPlod,100);
imagedestroy($tmp);
imagedestroy($src);
	}




$Reg_commpanytieDATA_ISQ=$conn->prepare("INSERT INTO `cmg_tieup_company`(`UMID`,`company_name`, `company_logo`, `date`, `time`, `status`) VALUES ('".$_SESSION['UMID']."', '$company_name', '$company_logof', '$date', '$time', 1)");

$Reg_commpanytieDATA_ISQF=$Reg_commpanytieDATA_ISQ->execute();
if ($Reg_commpanytieDATA_ISQF) {
	
echo '<script>alert("Company has been added Successfully!");window.location.href="redirect.php";</script>';
	
	} 

	

}



if(isset($_POST['uploadimgae']) && isset($_SESSION['UMID']))
  {
	 	 
$company_logo=$_FILES["proimages"]["name"];
$uploadedfile=$_FILES['proimages']['tmp_name'];


		if(isset($company_logo) && !empty($company_logo))
		{
$getExt = explode ('.', $company_logo);
$extension = $getExt[count($getExt)-1];

$rand_name= rand(0,999999999);
if($extension=="jpg" || $extension=="jpeg"  || $extension=="JPEG" || $extension=="JPG"  )
{$src = imagecreatefromjpeg($uploadedfile);}
else if($extension=="png" || $extension=="PNG" )
{$src = imagecreatefrompng($uploadedfile);}
else {$src = imagecreatefromgif($uploadedfile);}

$rand_name= rand(0,999999999);
$company_logof=$rand_name.".".$extension;

list($width,$height)=getimagesize($uploadedfile);

 $whoru  = fetchsingle('cmg_registration',array('UMID' => $_SESSION['UMID']));
 
 if($whoru['Are_u_an']=='Trainer')
 {
$newwidth='97';
$newheight='111'; }
else {

$newwidth='160';
$newheight='75';
}


$tmp=imagecreatetruecolor($newwidth,$newheight);
imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);

$filenameUPlod=$UDS."image/proimages/".$company_logof;
	imagejpeg($tmp,$filenameUPlod,100);
imagedestroy($tmp);
imagedestroy($src);


		}


$UPDATA_ISQEI=$conn->prepare("UPDATE `cmg_registration` SET `pr_images`='$company_logof' WHERE UMID='".$_SESSION['UMID']."' ");

$UPDATA_ISQEIF=$UPDATA_ISQEI->execute();
if ($UPDATA_ISQEIF) {
	
echo '<script>alert("Images has been Uploaed Successfully!");window.location.href="redirect.php";</script>';
	
	} 

	

}




//Fetch data of cmg_tieup_company

$Commpanytie_SQLF=$conn->prepare("select * from cmg_tieup_company WHERE `UMID`='".$_SESSION['UMID']."'");
$Commpanytie_SQLF->execute();
$Commpanytie_SQLFETCH= $Commpanytie_SQLF->fetchAll();


// Tranier studentplaced


if(isset($_POST['studentplaced']) && isset($_SESSION['UMID']))
  {
	 	 

$studentname=$_POST['studentname'];
$companyname=$_POST['companyname'];
$YOP=$_POST['YOP'];

$company_logo=$_FILES["clogo"]["name"];//Stores the temporary uploaded image file
$uploadedfile=$_FILES['clogo']['tmp_name'];
		if(isset($company_logo) && !empty($company_logo))
		{
$getExt = explode ('.', $company_logo);
$extension = $getExt[count($getExt)-1];

$rand_name= rand(0,999999999);
if($extension=="jpg" || $extension=="jpeg"  || $extension=="JPEG" || $extension=="JPG"  )
{$src = imagecreatefromjpeg($uploadedfile);}
else if($extension=="png" || $extension=="PNG" )
{$src = imagecreatefrompng($uploadedfile);}
else {$src = imagecreatefromgif($uploadedfile);}

$rand_name= rand(0,999999999);
$company_logof=$rand_name.".".$extension;

list($width,$height)=getimagesize($uploadedfile);
$newwidth='137';
$newheight='60';


$tmp=imagecreatetruecolor($newwidth,$newheight);
imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);

$filenameUPlod=$UDS."image/company_logo/".$company_logof;
	imagejpeg($tmp,$filenameUPlod,100);
imagedestroy($tmp);
imagedestroy($src);

		}




$Reg_SplacedDATA_ISQ=$conn->prepare("INSERT INTO `cmg_placed_student`(`UMID`,`studentname`,`companyname`,`YOP`, `company_logo`, `date`, `time`, `status`) VALUES ('".$_SESSION['UMID']."', '$studentname','$companyname','$YOP', '$company_logof', '$date', '$time', 1)");

$Reg_SplacedDATA_ISQF=$Reg_SplacedDATA_ISQ->execute();
if ($Reg_SplacedDATA_ISQF) {
	
echo '<script>alert("Student Detaisl has been added Successfully!");window.location.href="redirect.php";</script>';
	
	} 

	

}


//Fetch data of cmg_tieup_company

$StudentPlace_SQLF=$conn->prepare("select * from cmg_placed_student WHERE `UMID`='".$_SESSION['UMID']."'");
$StudentPlace_SQLF->execute();
$StudentPlace_SQLFETCH= $StudentPlace_SQLF->fetchAll();




// Course Added


if(isset($_POST['courses_save']) && isset($_SESSION['UMID']))
  {
	 	 

$coursename=$_POST['coursename'];
$price=$_POST['price'];
$maincourse=$_POST['maincourse'];
$experince=$_POST['experince'];
$description_c=strip_tags($_POST['description_c']);
$c_duration=$_POST['c_duration'];


$Reg_CourseDATA_ISQ=$conn->prepare("INSERT INTO `cmg_courses`(`UMID`,`coursename`,`price`,`maincourse`, `description_c`, `date`, `time`, `status`,`experince`,`c_duration`) VALUES ('".$_SESSION['UMID']."', '$coursename','$price','$maincourse', '$description_c', '$date', '$time', 1,'$experince','$c_duration')");

$Reg_CourseDATA_ISQF=$Reg_CourseDATA_ISQ->execute();
if ($Reg_CourseDATA_ISQF) {
	
echo '<script>alert("Courses has been added Successfully!");window.location.href="redirect.php";</script>';
	
	} 

	

}

// Course Edit


if(isset($_POST['courses_EDIT']) && isset($_SESSION['UMID']))
  {
	 	 

$coursename=$_POST['coursename'];
$price=$_POST['price'];
$maincourse=$_POST['maincourse'];
$experince=$_POST['experince'];
$description_c=strip_tags($_POST['description_c']);
$mainid=$_POST['mainid'];
$c_duration=$_POST['c_duration'];

$EDI_CourseDATA_ISQ=$conn->prepare("UPDATE  `cmg_courses` SET `coursename`='$coursename',`price`='$price',`maincourse`='$maincourse',`experince`='$experince', `description_c`='$description_c',`c_duration`='$c_duration'  WHERE `UMID`='".$_SESSION['UMID']."' AND `id`='$mainid'");

$EDI_CourseDATA_ISQE=$EDI_CourseDATA_ISQ->execute();
if ($EDI_CourseDATA_ISQE) {
	
echo '<script>alert("Courses has been Edit Successfully!");window.location.href="redirect.php";</script>';
	
	} 

	

}





//Fetch All Main Courses

$Maincourses_SQLF=$conn->prepare("select * from cmg_courses WHERE `UMID`='".$_SESSION['UMID']."' AND `maincourse`='CMGC-10'");
$Maincourses_SQLF->execute();
$Maincourses_SQLFETCH= $Maincourses_SQLF->fetchAll();


// Post Add


if(isset($_POST['psotvalue']) && isset($_SESSION['UMID']))
  {
	 	 

$post_text=str_replace("'","`",$_POST['post_text']);
$tags=$_POST['tags'];
$category_post=$_POST['category_post'];
$youtube_link=strip_tags($_POST['youtube_link']);


$youtuveexpl=explode('?v=',$youtube_link);

if($youtuveexpl[1]!='' && !empty($youtuveexpl[1]))
{
$youtube_link='https://www.youtube.com/embed/'.$youtuveexpl[1];
} elseif (preg_match('/youtube/',$_POST['youtube_link']))
{
$youtube_link=strip_tags($_POST['youtube_link']);
}
else {
$youtube_link=1;
}


$sharewith=strip_tags($_POST['sharewith']);

$post_ID=uniqid();
$attached_photos=$_FILES["attached_photos"]["name"];//Stores the temporary uploaded image file

		if(isset($attached_photos) && !empty($attached_photos))
		{
$getExt = explode ('.', $attached_photos);//returns array of file name after removing dot

$file_ext = $getExt[count($getExt)-1];//getting the extension of file

$rand_name = md5(time());//any one random name can be used

$rand_name= rand(0,999999999);

$attached_photosF=$rand_name.".".$file_ext;//combines random name and file extension

copy($_FILES['attached_photos']['tmp_name'], $UDS."image/postimages/".$attached_photosF);
		}

$Reg_POSTDATA_ISQ=$conn->prepare("INSERT INTO `cmg_create_post`(`UMID`, `post_text`, `tags`, `category_post`, `attached_photos`, `youtube_link`, `sharewith`, `date`, `time`, `status`,`post_ID`) VALUES ('".$_SESSION['UMID']."', '$post_text','$tags','$category_post', '$attached_photosF', '$youtube_link', '$sharewith', '$date', '$time', 1,'$post_ID')");

$Reg_POSTDATA_ISQF=$Reg_POSTDATA_ISQ->execute();
if ($Reg_POSTDATA_ISQF) {
	
echo '<script>alert("Post has been Create Successfully!");window.location.href="redirect.php";</script>';
	
	} 

	

}



if(isset($_POST['sendamessage']) && isset($_SESSION['UMID']))
  {
	 	 

$messagebox=str_replace("'","`",$_POST['messagebox']);
$UMID_to=explode('#',$_POST['toid']);



$Reg_MessageDATA_ISQ=$conn->prepare("INSERT INTO `cmg_message`( `UMID_to`, `UMID_from`, `message_text`, `from_message`, `date`, `time`, `status`,`category`) VALUES ('".$_SESSION['UMID']."', '".$UMID_to[0]."','$messagebox','trainer', '$date', '$time', 1,'".$UMID_to[1]."')");

$Reg_MessageDATA_ISQF=$Reg_MessageDATA_ISQ->execute();
if ($Reg_MessageDATA_ISQF) {
	
echo '<script>alert("Message has been Sent Successfully!");window.location.href="redirect.php";</script>';
	
	} 

	

}











function fetchfeild($table,$array){

      global $conn; 
     
        foreach($array as $key=>$element){
        $element_array[] = "".$key."='".$element."'";   
      }
        $element_array =  implode(" AND ",$element_array); 
        $Main_SQLF = $conn->prepare("SELECT * FROM $table WHERE $element_array");
           
		$Main_SQLF->execute();

		
        return $Main_SQLFResult = $Main_SQLF->fetchAll();
}


function fetchASC($table,$array){

      global $conn; 
     
        foreach($array as $key=>$element){
        $element_array[] = "".$key."='".$element."'";   
      }
        $element_array =  implode(" AND ",$element_array); 
        $Main_SQLF = $conn->prepare("SELECT * FROM $table WHERE $element_array ORDER BY id ASC");
           
		$Main_SQLF->execute();

		
        return $Main_SQLFResult = $Main_SQLF->fetchAll();
}


function fetchASCORD($table,$array,$order){

      global $conn; 
     
        foreach($array as $key=>$element){
        $element_array[] = "".$key."='".$element."'";   
      }
        $element_array =  implode(" AND ",$element_array); 
        $Main_SQLF = $conn->prepare("SELECT * FROM $table WHERE $element_array ORDER BY $order ASC");
           
		$Main_SQLF->execute();

		
        return $Main_SQLFResult = $Main_SQLF->fetchAll();
}
function fetchDESCNN($table,$array){

      global $conn; 
     
        foreach($array as $key=>$element){
        $element_array[] = "".$key."='".$element."'";   
      }
        $element_array =  implode(" AND ",$element_array); 
        $Main_SQLF = $conn->prepare("SELECT * FROM $table WHERE $element_array ORDER BY id DESC");
           
		$Main_SQLF->execute();

		
        return $Main_SQLFResult = $Main_SQLF->fetchAll();
}

function fetchDESCNNAS($table,$array){

      global $conn; 
     
        foreach($array as $key=>$element){
        $element_array[] = "".$key."='".$element."'";   
      }
        $element_array =  implode(" AND ",$element_array); 
        $Main_SQLF = $conn->prepare("SELECT * FROM $table WHERE $element_array ORDER BY order_to DESC");
           
		$Main_SQLF->execute();

		
        return $Main_SQLFResult = $Main_SQLF->fetchAll();
}

function fetchDESCNNGR($table,$array){

      global $conn; 
     
        foreach($array as $key=>$element){
        $element_array[] = "".$key."='".$element."'";   
      }
        $element_array =  implode(" AND ",$element_array); 
        $Main_SQLF = $conn->prepare("SELECT * FROM $table WHERE $element_array  GROUP BY `UMID_from` desc ");
           
		$Main_SQLF->execute();

		
        return $Main_SQLFResult = $Main_SQLF->fetchAll();
}


function fetchDESC($table,$array){

      global $conn; 
     
        foreach($array as $key=>$element){
        $element_array[] = "".$key."='".$element."'";   
      }
        $element_array =  implode(" AND ",$element_array); 
        $Main_SQLF = $conn->prepare("SELECT * FROM $table WHERE $element_array ORDER BY id DESC LIMIT 0,2");
           
		$Main_SQLF->execute();

		
        return $Main_SQLFResult = $Main_SQLF->fetchAll();
}

function fetchDESCNEGnn($table,$array){

      global $conn; 
     
        foreach($array as $key=>$element){
        $element_array[] = "".$key."='".$element."'";   
      }
        $element_array =  implode(" AND ",$element_array); 
        $Main_SQLF = $conn->prepare("SELECT * FROM (SELECT * FROM $table WHERE $element_array  ORDER BY `id` DESC ) $table GROUP BY `UMID_S` ORDER BY `read_status` ASC LIMIT 0,5 ");
           
		$Main_SQLF->execute();

		
        return $Main_SQLFResult = $Main_SQLF->fetchAll();
}

function fetchDESCNEG($table,$array){

      global $conn; 
     
        foreach($array as $key=>$element){
        $element_array[] = "".$key."='".$element."'";   
      }
        $element_array =  implode(" AND ",$element_array); 
        $Main_SQLF = $conn->prepare("SELECT * FROM (SELECT * FROM $table WHERE $element_array  ORDER BY `id` DESC ) $table GROUP BY `UMID_S` ORDER BY `read_status` ASC LIMIT 0,2 ");
           
		$Main_SQLF->execute();

		
        return $Main_SQLFResult = $Main_SQLF->fetchAll();
}



function fetchsingle($table,$array){

      global $conn; 
     
        foreach($array as $key=>$element){
        $element_array[] = "".$key."='".$element."'";   
      }
        $element_array =  implode(" AND ",$element_array); 
        $Main_SQLF = $conn->prepare("SELECT * FROM $table WHERE $element_array");
           
		$Main_SQLF->execute();

		
        return $Main_SQLFResult = $Main_SQLF->fetch();
}

	
	

function fetch_table($table){
    global $db; 
     
     $sql = "SELECT * FROM $table";
    $query = $db->query($sql);   
    return $result = $query->fetchAll();
     
    } 
	
	
	
	
	
	
	
	
	// Gallery add
	
	
	
	if(isset($_POST['gallery-submit']) && isset($_SESSION['UMID']))
  {
	 	 
$category=$_POST['category'];
$g_description=str_replace("'","`",$_POST['g_description']);






$company_logo=$_FILES["galleryimages"]["name"];
$uploadedfile=$_FILES['galleryimages']['tmp_name'];



		if(isset($company_logo) && !empty($company_logo))
		{
		
		
		
		
		
		$getExt = explode ('.', $company_logo);
$extension = $getExt[count($getExt)-1];

$rand_name= rand(0,999999999);
if($extension=="jpg" || $extension=="jpeg"  || $extension=="JPEG" || $extension=="JPG"  )
{$src = imagecreatefromjpeg($uploadedfile);}
else if($extension=="png" || $extension=="PNG" )
{$src = imagecreatefrompng($uploadedfile);}
else {$src = imagecreatefromgif($uploadedfile);}

$rand_name= rand(0,999999999);
$galleryimagesF=$rand_name.".".$extension;

list($width,$height)=getimagesize($uploadedfile);


$newwidth='500';
$newheight='300'; 


$tmp=imagecreatetruecolor($newwidth,$newheight);
imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);

$filenameUPlod=$UDS."image/gallery/".$galleryimagesF;
	imagejpeg($tmp,$filenameUPlod,100);
imagedestroy($tmp);
imagedestroy($src);
		
		

		} else { 
		
		$youtube_link=strip_tags($_POST['youtube_link']);

$youtuveexpl=explode('?v=',$youtube_link);

if($youtuveexpl[1]!='' && !empty($youtuveexpl[1]))
{
$galleryimagesF='https://www.youtube.com/embed/'.$youtuveexpl[1];
} 
elseif (preg_match('/youtube/',$_POST['youtube_link']))
{
$galleryimagesF=strip_tags($_POST['youtube_link']);
}
else {
$galleryimagesF=1;
}

		
	
		
		}

$Reg_galleryDATA_ISQ=$conn->prepare("INSERT INTO `cmg_gallery`(`UMID`, `category`, `imag_video`, `g_description`, `date`, `time`, `status`) VALUES ('".$_SESSION['UMID']."', '$category','$galleryimagesF','$g_description', '$date', '$time', 1)");

$Reg_galleryDATA_ISQF=$Reg_galleryDATA_ISQ->execute();
if ($Reg_galleryDATA_ISQF) {
	
echo '<script>alert("'.$category.' has been Uploaded Successfully!");window.location.href="redirect.php";</script>';
	
	} 

	

}



	// Coupon Add	
	
	
	if(isset($_POST['Coupon_Submit']) && isset($_SESSION['UMID']))
  {
	 	 
$coupon_titel=$_POST['coupon_titel'];
$discount_type=$_POST['discount_type'];
$discount_value=$_POST['discount_value'];
$dov=$_POST['dov'];
$location=$_POST['location'];
$institude=$_POST['institude'];

$packages=explode('#',$_POST['packages']);

$c_description=str_replace("'","`",$_POST['c_description']);




$Reg_CouponDATA_ISQ=$conn->prepare("INSERT INTO `cmg_create_coupon`(`UMID`, `coupon_titel`, `discount_type`, `discount_value`, `dov`, `institude`, `location`, `packages`, `c_description`, `date`, `time`, `status`) VALUES ('".$_SESSION['UMID']."', '$coupon_titel','$discount_type','$discount_value','$dov','$institude','$location','".$packages[0]."','$c_description', '$date', '$time', 1)");

$Reg_CouponDATA_ISQF=$Reg_CouponDATA_ISQ->execute();
if ($Reg_CouponDATA_ISQF) {
	
$remaning=$packages[1]-1;
$updaetdcoupon=$conn->prepare("UPDATE `cmg_coupon_purchse` SET `remaining_coupon`='$remaning' WHERE id='".$packages[0]."' ");

$updaetdcouponF=$updaetdcoupon->execute();	
echo '<script>alert("Copuon has been Added Successfully!");window.location.href="redirect.php";</script>';
	
	} 

	

}

function insert($table,$array){
 global $conn;
    foreach($array as $key=>$element){
        $key_array[]= $key;
        $element_array[]= "'".$element."'";         
    }     
    $key_array =  implode(",",$key_array);
    $element_array =  implode(",",$element_array);        
    $sql = "INSERT INTO  $table  ($key_array) VALUES ($element_array)";
    $query = $conn->query($sql);       
}


if(isset($_POST['post_general_enquiry']) && isset($_SESSION['UMID']))
{

  $UMID_S = $_POST['UMID_S'];
  $replyt_to = $_POST['replyt_to'];
  $post_type = $_POST['post_type'];
  $post_ID = $_POST['post_ID'];
  $message =str_replace("'","`",$_POST['message']);

 
  $array =  array('UMID_T'=>$_SESSION['UMID'],'UMID_S'=>$UMID_S,'replyt_to'=>$replyt_to,'post_type'=>$post_type,'post_ID'=>$post_ID,'message'=>$message,'date'=>$date,'time'=>$time,'staus'=>1);
  
  insert('cmg_post_chat',$array);
  
 echo '<script>alert("Post has been sent Successfully!"); window.location.href="redirect.php";</script>';
 
  
}

function num_rows($table,$array){
     
    global $conn;
    foreach($array as $key=>$element){
    $element_array[] = "".$key."='".$element."'";   
    }
    $element_array =  implode(" AND ",$element_array); 
    $sql = "SELECT * FROM $table WHERE $element_array";
    $query = $conn->query($sql);   
    $result = $query->fetchAll();
    return  count($result); 
 
    }
	

	
	if(isset($_POST['message_general_enquiry']) && isset($_SESSION['UMID']))
{

 $messagebox=str_replace("'","`",$_POST['messagebox']);
$UMID_to=explode('#',$_POST['toid']);



$Reg_MessageDATA_ISQ=$conn->prepare("INSERT INTO `cmg_message`(`UMID_to`,`UMID_from`,  `message_text`, `from_message`, `date`, `time`, `status`,`category`) VALUES ('".$_SESSION['UMID']."', '".$UMID_to[0]."','$messagebox','trainer', '$date', '$time', 1,'".$UMID_to[1]."')");

$Reg_MessageDATA_ISQF=$Reg_MessageDATA_ISQ->execute();
if ($Reg_MessageDATA_ISQF) {
	
echo '<script>alert("Message has been Sent Successfully!");window.location.href="redirect.php";</script>';
 
  }
}


	if(isset($_POST['packagebuy']) && isset($_SESSION['UMID']))
{

unset($_SESSION['invoice_idC']);


  $image_t = $_POST['image_t'];
  $p_name = $_POST['p_name'];
  $package_id = $_POST['package_id'];
  $price = $_POST['price'];
  
  $exp_date = '2016-12-16';
  $buyingdate=date('Y-m-d');
  $invoice_id =uniqid();
$buyingstatus=1;
 
  $array =  array('UMID'=>$_SESSION['UMID'],'image_t'=>$image_t,'p_name'=>$p_name,'package_id'=>$package_id,'price'=>$price,'exp_date'=>$exp_date,'buyingdate'=>$buyingdate,'invoice_id'=>$invoice_id,'time'=>$time,'status'=>0,'buyingstatus'=>0);
  
$_SESSION['invoice_idG']=$invoice_id;
$_SESSION['price']=$price;
  insert('cmg_gallery_purchse',$array);
  
 echo '<script>window.location.href="Peyment.php";</script>';
 
  
}




if(isset($_POST['packagecouponbuy']) && isset($_SESSION['UMID']))
{
unset($_SESSION['invoice_idG']);
  $coupon_t = $_POST['noofcoupon'];
  $p_name = $_POST['packagename'];
  $package_id = $_POST['couponid'];
  
  $exp_date =$_POST['expiryday'];
  $price=$_POST['price'];
  $buyingdate=date('Y-m-d');
  $invoice_id =uniqid();
  //  put it zero when use paymnet get way
$buyingstatus=0;
 
  $array =  array('UMID'=>$_SESSION['UMID'],'coupon_t'=>$coupon_t,'p_name'=>$p_name,'package_id'=>$package_id,'exp_date'=>$exp_date,'buyingdate'=>$buyingdate,'invoice_id'=>$invoice_id,'time'=>$time,'status'=>0,'buyingstatus'=>0,'price'=>$price,'remaining_coupon'=>$coupon_t);
  
$_SESSION['invoice_idC']=$invoice_id;
$_SESSION['price']=$price;

  insert('cmg_coupon_purchse',$array);
  
 echo '<script>window.location.href="Peyment.php";</script>';
 
  
}




if(isset($_POST['broucher-submit']) && isset($_SESSION['UMID']))
  {
	 	 
$category=$_POST['category'];
$g_description=str_replace("'","`",$_POST['g_description']);
$galleryimages=$_FILES["galleryimages"]["name"];//Stores the temporary uploaded image file


		if(isset($galleryimages) && !empty($galleryimages))
		{
$getExt = explode ('.', $galleryimages);//returns array of file name after removing dot

$file_ext = $getExt[count($getExt)-1];//getting the extension of file

$rand_name = md5(time());//any one random name can be used

$rand_name= rand(0,999999999);

$galleryimagesF=$rand_name.".".$file_ext;//combines random name and file extension

copy($_FILES['galleryimages']['tmp_name'], $UDS."image/gallery/".$galleryimagesF);
		
		
		

$Reg_galleryDATA_ISQ=$conn->prepare("INSERT INTO `cmg_gallery`(`UMID`, `category`, `imag_video`, `g_description`, `date`, `time`, `status`) VALUES ('".$_SESSION['UMID']."', '$category','$galleryimagesF','$g_description', '$date', '$time', 1)");

$Reg_galleryDATA_ISQF=$Reg_galleryDATA_ISQ->execute();
if ($Reg_galleryDATA_ISQF) {
	
echo '<script>alert("Images has been Uploaded Successfully!");window.location.href="redirect.php";</script>';
	
	} 

	} 

}