<?php include("../database/config.php");

$ipAddress=$_SERVER['REMOTE_ADDR'];
$date=date('Y-m-d');
$time=date('H:i:s');



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

function fetchDESC($table,$array){

      global $conn; 
     
        foreach($array as $key=>$element){
        $element_array[] = "".$key."='".$element."'";   
      }
        $element_array =  implode(" AND ",$element_array); 
        $Main_SQLF = $conn->prepare("SELECT * FROM $table WHERE $element_array ORDER BY id DESC");
           
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
    global $conn; 
     
     $sql = "SELECT * FROM $table";
    $query = $conn->query($sql);   
    return $result = $query->fetchAll();
     
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
