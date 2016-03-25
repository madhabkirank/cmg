<?php ob_start();
 $UDS='../';  $M2='a'; echo '<input type="hidden" value="../" class="UID">'; 
include('../controller/header.php'); 
include("controller/insert_SQL_Controller.php"); 

if(isset($_GET['Profile']))
{ 
$getprifilena=explode('/',$_GET['Profile']);
$UMIDSProfile  = fetchsingle('cmg_registration',array('u_url' => $getprifilena[0],'status'=>1,'email_verification'=>1));
if(empty($UMIDSProfile))
{
header('location:'.$domainname);
}

}
else {
header('location:'.$domainname);
ob_end_flush();
}
$urlsetn=$_SERVER['REQUEST_URI'];
$includefile= end(explode('/', $urlsetn));
?>

<link rel="stylesheet" type="text/css" href="<?=$domainname;?>css/easy-responsive-tabs.css " />
<script src="<?=$domainname;?>js/easyResponsiveTabs.js"></script>


    <section id="services" class="service-item">
	   <div class="container">
            <div class="row" >
            
            
            <?php include('controller/top_header.php'); ?>
					<!--/.Coupon --> 		
							

        <div id="parentVerticalTab">
            <?php include('controller/side_menu.php'); ?>
            
        
            
            <div class="resp-tabs-container">
         
					<?php
			
			
			
				
				
				
				if(!empty($includefile)){
				include($includefile.'.php');
				} 
				else { include('Postinclude.php'); }
			
				
				?>
                
				</div>
                   
            </div>
        </div>
		<br />
        <div class="profileidc">Profile ID- <?php
		 $profileid=explode('CMG',$UMIDSProfile['UMID']); 
		if(strlen($profileid[0])==1) { echo "201600000".$profileid[0]; } 
		else { echo "20160000".$profileid[0]; } ?> </div>
	   <!-- Profile Contain --> 
	   
            </div><!--/.row-->
        </div><!--/.container-->
    </section>

<?php include("../controller/footer.php"); ?>
