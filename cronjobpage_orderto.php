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







  $dataFETCH = fetch('cmg_create_post',array('status' =>1));



foreach ($dataFETCH  as  $dataFETCHV) {
	
	$num_rows_POST = num_rows('cmg_post_chat',array('post_ID' => $dataFETCHV['id'],'replyt_to' => 'trainer','read_status'=>0));
	
	$Updatescore= update('cmg_create_post',array('order_to' => $num_rows_POST),array('id' => $dataFETCHV['id']));
	
	}
 










?>
