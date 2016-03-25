<?php include("../database/config.php");
  $db = $conn;    
$ipAddress=$_SERVER['REMOTE_ADDR'];
$date=date('Y-m-d');
$time=date('H:i:s');


// Tranier basic profile insert 
if(isset($_POST['trainerbasic']) && isset($_SESSION['UMID']))
  {
$membertype=$_POST['membertype'];
$instituename=$_POST['instituename'];
$yoe=$_POST['yoe'];
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
$country=trim($_POST['country']);
$city=trim($_POST['city']);
$rcity=trim($_POST['rcity']);
$pin=$_POST['pin'];
$about_IT=$_POST['about_IT'];

$Reg_basicDATA_ISQ=$conn->prepare("INSERT INTO `cmg_basic_inf0_ti`(`UMID`, `membertype`, `instituename`, `yoe`, `phone`, `altphonme`, `email`, `website`, `time_day`, `address`, `location`, `country`, `city`, `rcity`, `pin`, `about_IT`, `date`, `time`, `status`) VALUES ('".$_SESSION['UMID']."','$membertype', '$instituename', '$yoe', '$phone', '$altphonme', '$email', '$website', '$time_day', '$address', '$location', '$country', '$city', '$rcity','$pin', '$about_IT', '$date', '$time', 1)");

$Reg_basicDATA_ISQF=$Reg_basicDATA_ISQ->execute();
if ($Reg_basicDATA_ISQF) {
	
echo '<script>alert("Basic Info has been added Successfully!");window.location.href="redirect.php";</script>';
	
	} 
	

}


// Tranier basic profile EDIT
if(isset($_POST['trainerbasicEDIT']) && isset($_SESSION['UMID']))
  {
$membertype=$_POST['membertype'];
$instituename=$_POST['instituename'];
$yoe=$_POST['yoe'];
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
$country=trim($_POST['country']);
$city=trim($_POST['city']);
$rcity=trim($_POST['rcity']);
$pin=$_POST['pin'];
$about_IT=$_POST['about_IT'];

$Reg_basicDATA_ISQE=$conn->prepare("UPDATE `cmg_basic_inf0_ti` SET `membertype`='$membertype', `instituename`='$instituename', `yoe`='$yoe', `phone`='$phone', `altphonme`='$altphonme', `email`='$email', `website`='$website', `time_day`='$time_day', `address`='$address', `location`='$location', `country`='$country', `city`='$city', `rcity`='$rcity', `pin`='$pin', `about_IT`='$about_IT' WHERE UMID='".$_SESSION['UMID']."' ");

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
$description=str_replace("'","`",$_POST['description']);

$Reg_infraDATA_ISQ=$conn->prepare("INSERT INTO `cmg_infrastructure`(`UMID`, `no_of_trainer`, `accommodation`, `student_trained`, `tubelink`, `description`, `date`, `time`, `status`) VALUES ('".$_SESSION['UMID']."','$no_of_trainer', '$accommodation', '$student_trained', '$tubelink', '$description', '$date', '$time', 1)");

$Reg_infraDATA_ISQF=$Reg_infraDATA_ISQ->execute();
if ($Reg_infraDATA_ISQF) {
	
echo '<script>alert("Infrastucture Info has been added Successfully!");window.location.href="redirect.php";</script>';
	
	} 
	

}




// Tranier infrastucture profile EDIT 


if(isset($_POST['trainerinfmracEDIT']) && isset($_SESSION['UMID']))
  {
$no_of_trainer=$_POST['no_of_trainer'];
$accommodation=$_POST['accommodation'];
$student_trained=$_POST['student_trained'];
$tubelink=$_POST['tubelink'];

$description=str_replace("'","`",$_POST['description']);
$Reg_infraDATA_ISQE=$conn->prepare("UPDATE `cmg_infrastructure`  SET  `no_of_trainer`='$no_of_trainer', `accommodation`='$accommodation', `student_trained`='$student_trained', `tubelink`='$tubelink', `description`='$description' WHERE `UMID`='".$_SESSION['UMID']."' ");

$Reg_infraDATA_ISQFE=$Reg_infraDATA_ISQE->execute();
if ($Reg_infraDATA_ISQFE) {
	
echo '<script>alert("Infrastucture Info has been Edit Successfully!");window.location.href="redirect.php";";</script>';
	
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

$Reg_moreinfoDATA_ISQ=$conn->prepare("INSERT INTO `cmg_trainer_moreinfo`(`UMID`, `labs`, `hotel_a`, `wifi`, `online_training`, `canteen`,`parking_place`,`srooms`,`washrooms`,`water`,`grounds`,`sports_room`,`dtos`,`dcf`,`dofo`, `date`, `time`, `status`) VALUES ('".$_SESSION['UMID']."', '$labs', '$hotel_a', '$wifi', '$online_training', '$canteen','$parking_place','$srooms','$washrooms','$water','$grounds','$sports_room','$dtos','$dcf','$dofo', '$date', '$time', 1)");

$Reg_moreinfoDATA_ISQF=$Reg_moreinfoDATA_ISQ->execute();
if ($Reg_moreinfoDATA_ISQF) {
	
echo '<script>alert("More Info has been added Successfully!");window.location.href="redirect.php";</script>';
	
	} 
	

}




// Tranier infrastucture profile EDIT 


if(isset($_POST['trainermoreinfoEDIT']) && isset($_SESSION['UMID']))
  {
	  $labs=$_POST['labs'];
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

$Reg_moreinfoDATA_ISQE=$conn->prepare("UPDATE  `cmg_trainer_moreinfo` SET  `labs`='$labs', `hotel_a`='$hotel_a', `wifi`='$wifi', `online_training`='$online_training', `canteen`='$canteen',`parking_place`='$parking_place',`srooms`='$srooms',`washrooms`='$washrooms',`water`='$water',`grounds`='$grounds',`sports_room`='$sports_room',`dtos`='$dtos',`dcf`='$dcf',`dofo`='$dofo' WHERE `UMID`='".$_SESSION['UMID']."'");

$Reg_moreinfoDATA_ISQEF=$Reg_moreinfoDATA_ISQE->execute();
if ($Reg_moreinfoDATA_ISQEF) {
	
echo '<script>alert("More Info has been Edit Successfully!");window.location.href="redirect.php";</script>';
	
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


$location=trim($_POST['location']);
$country=trim($_POST['country']);
$city=trim($_POST['city']);

	  
$rcity=trim($_POST['rcity']);
$pin=$_POST['pin'];


$Reg_TrainerbranchesDATA_ISQ=$conn->prepare("INSERT INTO `cmg_trainer_branches`(`UMID`,`barnchname`, `phone`, `email`, `address`, `location`, `country`, `city`, `rcity`, `pin`, `date`, `time`, `status`) VALUES ('".$_SESSION['UMID']."', '$barnchname', '$phone', '$email', '$address', '$location','$country','$city','$rcity','$pin','$date', '$time', 1)");

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
	
echo '<script>alert("Placment Corner has been added Successfully!");window.location.href="redirect.php";</script>';
	
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
	
echo '<script>alert("Placment Corner has been Edit Successfully!");window.location.href="redirect.php";</script>';
	
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
$company_logo=$_POST['company_logo'];

$company_logo=$_FILES["clogo"]["name"];//Stores the temporary uploaded image file

		if(isset($company_logo) && !empty($company_logo))
		{
$getExt = explode ('.', $company_logo);//returns array of file name after removing dot

$file_ext = $getExt[count($getExt)-1];//getting the extension of file

$rand_name = md5(time());//any one random name can be used

$rand_name= rand(0,999999999);

$company_logof=$rand_name.".".$file_ext;//combines random name and file extension

copy($_FILES['clogo']['tmp_name'], $UDS."image/company_logo/".$company_logof);

		}




$Reg_commpanytieDATA_ISQ=$conn->prepare("INSERT INTO `cmg_tieup_company`(`UMID`,`company_name`, `company_logo`, `date`, `time`, `status`) VALUES ('".$_SESSION['UMID']."', '$company_name', '$company_logof', '$date', '$time', 1)");

$Reg_commpanytieDATA_ISQF=$Reg_commpanytieDATA_ISQ->execute();
if ($Reg_commpanytieDATA_ISQF) {
	
echo '<script>alert("Company has been added Successfully!");window.location.href="redirect.php";</script>';
	
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
$company_logo=$_POST['company_logo'];

$company_logo=$_FILES["clogo"]["name"];//Stores the temporary uploaded image file

		if(isset($company_logo) && !empty($company_logo))
		{
$getExt = explode ('.', $company_logo);//returns array of file name after removing dot

$file_ext = $getExt[count($getExt)-1];//getting the extension of file

$rand_name = md5(time());//any one random name can be used

$rand_name= rand(0,999999999);

$company_logof=$rand_name.".".$file_ext;//combines random name and file extension

copy($_FILES['clogo']['tmp_name'], $UDS."image/company_logo/".$company_logof);

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
$description_c=strip_tags($_POST['description_c']);



$Reg_CourseDATA_ISQ=$conn->prepare("INSERT INTO `cmg_courses`(`UMID`,`coursename`,`price`,`maincourse`, `description_c`, `date`, `time`, `status`) VALUES ('".$_SESSION['UMID']."', '$coursename','$price','$maincourse', '$description_c', '$date', '$time', 1)");

$Reg_CourseDATA_ISQF=$Reg_CourseDATA_ISQ->execute();
if ($Reg_CourseDATA_ISQF) {
	
echo '<script>alert("Courses has been added Successfully!");window.location.href="redirect.php";</script>';
	
	} 

	

}


//Fetch All Main Courses

$Maincourses_SQLF=$conn->prepare("select * from cmg_courses WHERE `UMID`='".$_SESSION['UMID']."' AND `maincourse`='CMGC-10'");
$Maincourses_SQLF->execute();
$Maincourses_SQLFETCH= $Maincourses_SQLF->fetchAll();





//Srinivas code :




function update($table,$array,$array2){
    global $db;
    foreach($array as $key=>$element){
    $element_array[] = "".$key."='".$element."'";   
    }
    foreach($array2 as $key2=>$element2){
    $element_array2[] = "".$key2."='".$element2."'";    
    }
    $new_array = implode(",",$element_array);
    $new_array2 = implode(" AND ",$element_array2);
    $sql = "UPDATE $table SET $new_array WHERE $new_array2";
    $db->query($sql);
             
}   




function insert($table,$array){
 global $db;
    foreach($array as $key=>$element){
        $key_array[]= $key;
        $element_array[]= "'".$element."'";         
    }     
    $key_array =  implode(",",$key_array);
    $element_array =  implode(",",$element_array);        
    $sql = "INSERT INTO  $table  ($key_array) VALUES ($element_array)";
    $query = $db->query($sql);       
}


function num_rows($table,$array){
     
    global $db;
    foreach($array as $key=>$element){
    $element_array[] = "".$key."='".$element."'";   
    }
    $element_array =  implode(" AND ",$element_array); 
    $sql = "SELECT * FROM $table WHERE $element_array";
    $query = $db->query($sql);   
    $result = $query->fetchAll();
    return  count($result); 
 
    }


function fetch($table,$array){
    global $db; 
     
        foreach($array as $key=>$element){
        $element_array[] = "".$key."='".$element."'";   
    }
        $element_array =  implode(" AND ",$element_array); 
        $sql = "SELECT * FROM $table WHERE $element_array ORDER BY id DESC";
    $query = $db->query($sql);   
    return $result = $query->fetchAll();
     
    }
	
	function fetchASC($table,$array){
    global $db; 
     
        foreach($array as $key=>$element){
        $element_array[] = "".$key."='".$element."'";   
    }
        $element_array =  implode(" AND ",$element_array); 
        $sql = "SELECT * FROM $table WHERE $element_array ORDER BY id ASC";
    $query = $db->query($sql);   
    return $result = $query->fetchAll();
     
    }
	
		function fetchASCL($table,$array){
    global $db; 
     
        foreach($array as $key=>$element){
        $element_array[] = "".$key."='".$element."'";   
    }
        $element_array =  implode(" AND ",$element_array); 
        $sql = "SELECT * FROM $table WHERE $element_array LIMIT 0,1";
    $query = $db->query($sql);   
    return $result = $query->fetchAll();
     
    }


	function fetchADESC($table,$array){
    global $db; 
     
        foreach($array as $key=>$element){
        $element_array[] = "".$key."='".$element."'";   
    }
        $element_array =  implode(" AND ",$element_array); 
        $sql = "SELECT * FROM $table WHERE $element_array LIMIT 0,1";
    $query = $db->query($sql);   
    return $result = $query->fetchAll();
     
    }
	function fetchADESCM($table,$array){
    global $db; 
     
        foreach($array as $key=>$element){
        $element_array[] = "".$key."='".$element."'";   
    }
        $element_array =  implode(" AND ",$element_array); 
        $sql = "SELECT * FROM $table WHERE $element_array ORDER BY id DESC LIMIT 0,2";
    $query = $db->query($sql);   
    return $result = $query->fetchAll();
     
	}
	function singlefetch($table,$array){
    global $db; 
     
        foreach($array as $key=>$element){
        $element_array[] = "".$key."='".$element."'";   
    }
        $element_array =  implode(" AND ",$element_array); 
        $sql = "SELECT * FROM $table WHERE $element_array ORDER BY id DESC";
    $query = $db->query($sql);   
    return $result = $query->fetch();
     
    }

function query($a){

    $query = $db->query($a);   
    return $result = $query->fetchAll();

}


//post_enquiry_Chats

if(isset($_POST['post_general_enquiry']) && isset($_SESSION['s-UMID']))
{

  $UMID_T = $_POST['UMID_T'];
  $replyt_to = $_POST['replyt_to'];
  $post_type = $_POST['post_type'];
  $post_ID = $_POST['post_ID'];
  $message =str_replace("'","`",$_POST['message']);

 
  $array =  array('UMID_S'=>$_SESSION['s-UMID'],'UMID_T'=>$UMID_T,'replyt_to'=>$replyt_to,'post_type'=>$post_type,'post_ID'=>$post_ID,'message'=>$message,'date'=>$date,'time'=>$time,'staus'=>1);
  
  insert('cmg_post_chat',$array);
  
 echo '<script>alert("Post has been sent Successfully!"); window.location.href="redirect.php";</script>';
 
  
}


if(isset($_POST['message_general_enquiry']) && isset($_SESSION['s-UMID']))
{

  $UMID_T = $_POST['UMID_T'];
  $replyt_to = $_POST['replyt_to'];
  $post_type = $_POST['post_type'];
  $post_ID = $_POST['post_ID'];
  $message =str_replace("'","`",$_POST['message']);

 
  $array =  array('UMID_S'=>$_SESSION['s-UMID'],'UMID_T'=>$UMID_T,'replyt_to'=>$replyt_to,'post_type'=>$post_type,'post_ID'=>$post_ID,'message'=>$message,'date'=>$date,'time'=>$time,'staus'=>1);
  
  insert('cmg_message_chat',$array);
  
 echo '<script>alert("Message has been sent Successfully!");window.location.href="redirect.php";</script>';
 
  
}



if(isset($_POST['uploadimgaeST']) && isset($_SESSION['s-UMID']))
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


 

$newwidth='160';
$newheight='75'; 


$tmp=imagecreatetruecolor($newwidth,$newheight);
imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);

$filenameUPlod=$UDS."image/proimages/".$company_logof;
	imagejpeg($tmp,$filenameUPlod,100);
imagedestroy($tmp);
imagedestroy($src);
	}
		





$UPDATA_ISQEI=$conn->prepare("UPDATE `cmg_registration_s` SET `pr_images`='$company_logof' WHERE UMID='".$_SESSION['s-UMID']."' ");

$UPDATA_ISQEIF=$UPDATA_ISQEI->execute();
if ($UPDATA_ISQEIF) {
	
echo '<script>alert("Images has been Uploaed Successfully!");window.location.href="redirect.php";</script>';
	
	} 

	

}


if(isset($_POST['sendamessage']) && isset($_SESSION['s-UMID']))
  {
	 	 

$messagebox=str_replace("'","`",$_POST['messagebox']);
$UMID_to=explode('#',$_POST['toid']);



$Reg_MessageDATA_ISQ=$conn->prepare("INSERT INTO `cmg_message`(`UMID_from`, `UMID_to`, `message_text`, `from_message`, `date`, `time`, `status`,`category`) VALUES ('".$_SESSION['s-UMID']."','".$UMID_to[0]."','$messagebox','student', '$date', '$time', 1,'".$UMID_to[1]."')");

$Reg_MessageDATA_ISQF=$Reg_MessageDATA_ISQ->execute();
if ($Reg_MessageDATA_ISQF) {
	
echo '<script>alert("Message has been Sent Successfully!");window.location.href="redirect.php";</script>';
	
	} 

	

}  
