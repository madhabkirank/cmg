<?php ob_start(); include('class.php');
?>
<div style=" padding:15px 0px; width:50%; margin:40px auto; border:1px solid #C9C9C9; text-align:center; border-radius:3px; line-height:20px;">
<a href="Post_Queue_Proces_Video.php">Some authentication problem coming form your Video Account, click here to Reprocess this Post  </a></div>
<div style="display:none">

<?php
$Post_Data = $data->singlefetch('tbl_post_video',array('post_id' =>$_SESSION['uiniVideo_psot_ID'],'APIKEY' =>$_SESSION['APIKEY']));

$Pltafrom_Data = $data->fetch('tbl_platform_select_video',array('post_id' =>$_SESSION['uiniVideo_psot_ID'],'APIKEY' =>$_SESSION['APIKEY'],'status_message'=>'scheduling'));

foreach ($Pltafrom_Data as $Pltafrom_Value) {
  $PltfromLogin_Data = $data->singlefetch('tbl_video_account',array('id' =>$Pltafrom_Value['account_id'],'APIKEY' =>$_SESSION['APIKEY'],'v_status'=>1));
    $num_rowsSET = $datamynew->num_rows('tbl_video_account',array('id' =>$Pltafrom_Value['account_id'],'APIKEY' =>$_SESSION['APIKEY'],'v_status'=>1));
  
  if($num_rowsSET>0)
  {
  
 if($Pltafrom_Value['plat_from']=='YouTube')
 {
	 


	
$youtubeOUT = $datamynew->update('tbl_video_account',array('v_status' =>0),array('id' =>$PltfromLogin_Data['id']));
include('allAPIfile/youtubeAPI.php');
$youtubeIN = $datamynew->update('tbl_video_account',array('v_status' =>1),array('id' =>$PltfromLogin_Data['id']));
	
	
	
	
	
	
	
    }
	
	elseif($Pltafrom_Value['plat_from']=='Dailymation')
 {
	 
$DailymationOUT = $datamynew->update('tbl_video_account',array('v_status' =>0),array('id' =>$PltfromLogin_Data['id']));
include('allAPIfile/DailymationAPI.php');
$DailymationIN = $datamynew->update('tbl_video_account',array('v_status' =>1),array('id' =>$PltfromLogin_Data['id']));
	 
 
 }
	
  }

else {
	
$setauthentication = $datamynew->update('tbl_platform_select_video',array('status_message' =>'Authentication Failed'),array('id' =>$Pltafrom_Value['id']));	

$RECmessage=$Pltafrom_Value['plat_from'].' Authentication Failed';	
$tbl_rec_activity = $datamynew->insert('tbl_rec_activity',array('APIKEY' =>$_SESSION['APIKEY'],'message' =>$RECmessage,'date' =>$date,'time' =>$time,'status' =>0));


}
}


header('location:Post_Queue_Video.php');
 ob_end_flush();
 ?>         
                
 

</div>