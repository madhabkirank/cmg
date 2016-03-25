<?php session_start();  error_reporting(0);
ini_alter('date.timezone','Asia/Calcutta');
$today=date('Y-m-d');
$IP=$_SERVER['REMOTE_ADDR'];
$date=date('Y-m-d');
$time=date('H:i:s');



$CSR =2;

if($CSR==2){

try {
     $conn = new PDO("mysql:host=localhost;dbname=demoproj_cmgdb", "demoproj_cmgdb", "cmg@hyd");
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
  }
	
	$domainname='http://demo.projectlaunch.in/cmgphp/';
	
	
	}   

else {
	

try {
   $conn = new PDO("mysql:host=localhost;dbname=cmgdb", "root", "");
    // set the PDO error mode to exception
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
  
  
  
    }
	
	$domainname='http://localhost/CMG/';
	
	}  
	
	
	
	if(isset($_SESSION['myclassA']))
	
	{
		
$dispaly='style="display:none;"';
$dispalyA='style="display:block;"';


		
	}
	else {
		$dispaly='style="display:block;"';
		$dispalyA='style="display:none;"';

	}
	
	
	
	
?>

