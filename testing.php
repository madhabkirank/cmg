<?php include("database/config.php");

 $cmg_registration=$conn->prepare("SELECT * FROM  cmg_basic_inf0_ti    ");
$cmg_registration->execute();

$PrimumuTrainerF= $cmg_registration->fetchAll();

foreach ($PrimumuTrainerF as $PrimumuTrainer) {  

echo $PrimumuTrainer['city']."<br>";
}
?>






