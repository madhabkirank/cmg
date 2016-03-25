<?php include("../database/config.php");
$ipAddress=$_SERVER['REMOTE_ADDR'];
$date=date('Y-m-d');
$time=date('H:i:s');

$db = $conn;


//Fetch All Main Courses

$Maincourses_SQLF=$conn->prepare("select * from cmg_courses WHERE `UMID`='".$_SESSION['UMID']."' AND `maincourse`='CMGC-10'");
$Maincourses_SQLF->execute();
$Maincourses_SQLFETCH= $Maincourses_SQLF->fetch();




function fetch($table,$array){

      global $db; 
     
        foreach($array as $key=>$element){
        $element_array[] = "".$key."='".$element."'";   
      }
        $element_array =  implode(" AND ",$element_array); 
        $sql = "SELECT * FROM $table WHERE $element_array";
        $query = $db->query($sql);   
        return $result = $query->fetchAll();
}


function fetchDESCN($table,$array){

      global $db; 
     
        foreach($array as $key=>$element){
        $element_array[] = "".$key."='".$element."'";   
      }
        $element_array =  implode(" AND ",$element_array); 
        $sql = "SELECT * FROM $table WHERE $element_array ORDER BY id DESC";
        $query = $db->query($sql);   
        return $result = $query->fetchAll();
}





function fetch_table($table){
    global $db; 
     
     $sql = "SELECT * FROM $table ORDER BY id DESC";
    $query = $db->query($sql);   
    return $result = $query->fetchAll();
     
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


if(isset($_POST['review'])){

$message = str_replace("'","`",$_POST['message']);
$UMID_s = $_SESSION['s-UMID'];
$UMID = $_POST['trainermainiD'];
$array = array('message' => $message,'date'=>$date,'time'=>$time,'UIMD_s' => $UMID_s,'UMID' => $UMID,'status' => 1);

insert('cmg_reviews',$array);
echo '<script>alert("Your Review has been added Successfully!"); window.location="Review"; </script>';
}



if(isset($_POST['sendamessage']) && isset($_SESSION['s-UMID']))
  {
	 	 

$messagebox=str_replace("'","`",$_POST['messagebox']);
$UMID_to=explode('#',$_POST['toid']);



$Reg_MessageDATA_ISQ=$conn->prepare("INSERT INTO `cmg_message`(`UMID_from`, `UMID_to`, `message_text`, `from_message`, `date`, `time`, `status`,`category`) VALUES ('".$_SESSION['s-UMID']."','".$UMID_to[0]."','$messagebox','student', '$date', '$time', 1,'".$UMID_to[1]."')");

$Reg_MessageDATA_ISQF=$Reg_MessageDATA_ISQ->execute();
if ($Reg_MessageDATA_ISQF) {
	
echo '<script>alert("Message has been Sent Successfully!"); window.location="Review"; </script>';
	
	} 

	

}