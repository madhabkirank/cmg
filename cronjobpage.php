<?php include('database/config.php');

$db = $conn;

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
	
	function num_rowsp($table,$array){
     
    global $db;
	$date_first=date('Y-m-d', time()-86400*7);
						   $date_2nd = date('Y-m-d');
	
    foreach($array as $key=>$element){
    $element_array[] = "".$key."='".$element."'";   
    }
    $element_array =  implode(" AND ",$element_array); 
    $sql = "SELECT * FROM $table WHERE $element_array AND date BETWEEN str_to_date('".$date_first."','%Y-%m-%d') AND str_to_date('".$date_2nd."','%Y-%m-%d')";
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


function fetchASC($array){

      global $conn; 
     
   
        $Main_SQLF = $conn->prepare("SELECT * FROM cmg_like_foollow_post WHERE status=1 ORDER BY `$array` ASC");
           
		$Main_SQLF->execute();

		
        return $Main_SQLFResult = $Main_SQLF->fetch();
}

function fetchDESC($array){

      global $conn; 
     
   
        $Main_SQLF = $conn->prepare("SELECT * FROM cmg_like_foollow_post WHERE status=1 ORDER BY `$array` DESC");
           
		$Main_SQLF->execute();

		
        return $Main_SQLFResult = $Main_SQLF->fetch();
}
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







 $cmg_registrationuPDATE= fetch('cmg_registration',array('status' => 1));


 
 
foreach ($cmg_registrationuPDATE  as  $cmg_registrationuPDATEf) {



	$like_no  = num_rows('cmg_like',array('UMID_T' => $cmg_registrationuPDATEf['UMID']));	
	

	 
		
	$follow_no  = num_rows('cmg_follow',array('UMID_T' => $cmg_registrationuPDATEf['UMID']));	
		
	$post_nowek  = num_rowsp('cmg_create_post',array('UMID' => $cmg_registrationuPDATEf['UMID']));	
	

	
$DDELETE=$conn->prepare("DELETE FROM `cmg_like_foollow_post` WHERE UMID='".$cmg_registrationuPDATEf['UMID']."' ");
$DDELETE->execute();

$InsertALL=insert('cmg_like_foollow_post',array('UMID' =>$cmg_registrationuPDATEf['UMID'],'like_no' =>$like_no,'follow_no' =>$follow_no,'post_nowek' =>$post_nowek,'date' =>$date,'time' =>$time,'status'=>1));


	
	
	}














 $MAXlike= fetchDESC('like_no'); $MAXliken=$MAXlike['like_no']; if($MAXliken==0) { $MAXliken=1; } else { $MAXliken=$MAXliken; }
 


  $MINlike= fetchASC('like_no'); $MINliken=$MINlike['like_no'];
 
  
   $MAXfollow= fetchDESC('follow_no'); $MAXfollown=$MAXfollow['follow_no']; if($MAXfollown==0) { $MAXfollown=1; } else { $MAXfollown=$MAXfollown; }

    $MINfollow= fetchASC('follow_no'); $MINfollown=$MINfollow['follow_no'];
	 $MAXpost= fetchDESC('post_nowek'); $MAXpostn=$MAXpost['post_nowek']; if($MAXpostn==0) { $MAXpostn=1; } else { $MAXpostn=$MAXpostn; } 
	  $MINpost= fetchASC('post_nowek'); $MINpostn=$MINpost['post_nowek'];
	  
 $cmg_registration= fetch('cmg_registration',array('status' => 1));
foreach ($cmg_registration  as  $cmg_registrationF) {

 $allCreteria= fetchsingle('cmg_like_foollow_post',array('UMID' => $cmg_registrationF['UMID']));

 $LCT=$allCreteria['like_no'];
$FCT=$allCreteria['follow_no'];
$PCT=$allCreteria['post_nowek'];

	
$score=(2*($LCT-$MINliken)/($MAXliken-$MINliken)+3*($FCT-$MINfollown)/($MAXfollown-$MINfollown)+5*($PCT-$MINpostn)/($MAXpostn-$MINpostn))*10;
	
$Updatescore= update('cmg_registration',array('score' => $score),array('UMID' => $cmg_registrationF['UMID']));
$Updatescore1= update('cmg_basic_inf0_ti',array('score' => $score,'like_no' => $LCT,'follow_no' => $FCT,'post_nowek' => $PCT),array('UMID' => $cmg_registrationF['UMID']));
	}




?>
